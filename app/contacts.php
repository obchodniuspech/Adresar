<?php

class Contacts {
	
	private $mysqli;
	
	function __construct($mysqli) {
		$this->con = $mysqli;
	}
	
	function overview() {
		$query = $this->con->query("SELECT * FROM `adresar`");
		$vysledek = $query->fetch_all(MYSQLI_ASSOC);
		return $vysledek;
	}
	
	
	function saveCheckDontExist($url) {
		$check = $this->con->query("SELECT * FROM `adresar` WHERE url= '$url'");
		$results = $check->num_rows;
		if ($results>0) {
			return false;
		}
		else {return true;}
	}
	
	function saveCheckDontExistFromName($name) {
		$url = $this->createUrl($name);
		$check = $this->con->query("SELECT * FROM `adresar` WHERE url= '$url'");
		$results = $check->num_rows;
		if ($results>0) {
			echo "yes";
		}
		else {
			echo "no";
		}
	}
	
	function saveNew($dPost) {
		//print_r($dPost);
		global $errors;

		if($stmt = $this->con->prepare("INSERT INTO `adresar` (name,surname,email,phone,note,url) VALUES (?,?,?,?,?,?) ")) {
			$url = $this->createUrl($dPost['name']." ".$dPost['surname']);
			if($this->saveCheckDontExist($url)) {
				$stmt->bind_param('ssssss', $dPost['name'], $dPost['surname'], $dPost['email'], $dPost['phone'], $dPost['note'],$url);
				$stmt->execute();
				if($stmt->affected_rows === 0) exit('No rows updated'); 
				else {
					//echo $sql->affected_rows." rows updated";
				}
				$last_id = $stmt->insert_id;
			}
			else {
				$lastId = $errors->error("already_exist");
			}
			
			$stmt->close();
		}
		else {
			$error = $this->con->errno . ' ' . $this->con->error;
			echo $error;
		}
		
		return $lastId;
	}
	
	function saveEdit($dPost) {
		//print_r($dPost);
		
		global $errors;

		if($stmt = $this->con->prepare("UPDATE `adresar` SET name=?, surname=?, email=?, phone=?, note=?, url=? WHERE id=?")) {
			$url = $this->createUrl($dPost['name']." ".$dPost['surname']);
			$stmt->bind_param('ssssssi', $dPost['name'], $dPost['surname'], $dPost['email'], $dPost['phone'], $dPost['note'],$url,$dPost['id']);
			$stmt->execute();
			if($stmt->affected_rows === 0) exit('No rows updated'); 
			else {
				//echo $sql->affected_rows." rows updated";
			}
			$last_id = $stmt->insert_id;
			$stmt->close();
		}
		else {
			$error = $this->con->errno . ' ' . $this->con->error;
			echo $error;
		}
		
		return $lastId;
	}
	
	function delete($id) {
		if($stmt = $this->con->prepare("DELETE FROM `adresar` WHERE id=$id")) {
			$stmt->execute();
			$stmt->close();
		}
		else {
			$error = $this->con->errno . ' ' . $this->con->error;
			echo $error;
		}
	}
	
	function edit($url) {
		$query = $this->con->query("SELECT * FROM `adresar` WHERE url= '$url'");
		$vysledek = $query->fetch_all(MYSQLI_ASSOC);
		return $vysledek[0];
	}
	
	function createUrl($titulek) {
		static $convertTable = array (
			'??' => 'a', '??' => 'A', '??' => 'a', '??' => 'A', '??' => 'c',
			'??' => 'C', '??' => 'd', '??' => 'D', '??' => 'e', '??' => 'E',
			'??' => 'e', '??' => 'E', '??' => 'e', '??' => 'E', '??' => 'i',
			'??' => 'I', '??' => 'i', '??' => 'I', '??' => 'l', '??' => 'L',
			'??' => 'l', '??' => 'L', '??' => 'n', '??' => 'N', '??' => 'n',
			'??' => 'N', '??' => 'o', '??' => 'O', '??' => 'o', '??' => 'O',
			'??' => 'r', '??' => 'R', '??' => 'r', '??' => 'R', '??' => 's',
			'??' => 'S', '??' => 's', '??' => 'S', '??' => 't', '??' => 'T',
			'??' => 'u', '??' => 'U', '??' => 'u', '??' => 'U', '??' => 'u',
			'??' => 'U', '??' => 'y', '??' => 'Y', '??' => 'y', '??' => 'Y',
			'??' => 'z', '??' => 'Z', '??' => 'z', '??' => 'Z',
		);
		$titulek = strtolower(strtr($titulek, $convertTable));
		$titulek = preg_replace('/[^a-zA-Z0-9]+/u', '-', $titulek);
		$titulek = str_replace('--', '-', $titulek);
		$titulek = trim($titulek, '-');
		return $titulek;
	}
	
	function _xml2array ( $xmlObject, $out = array () ){
		foreach ( (array) $xmlObject as $index => $node )
			$out[$index] = ( is_object ( $node ) ) ? _xml2array ( $node ) : $node;
	
		return $out;
	}
	
	
}