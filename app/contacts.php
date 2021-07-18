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
	
	function saveNew($dPost) {
		//print_r($dPost);
		if($stmt = $this->con->prepare("INSERT INTO `adresar` (name,surname,email,phone,note,url) VALUES (?,?,?,?,?,?) ")) {
			$url = "url-adresa";
			$stmt->bind_param('ssssss', $dPost['name'], $dPost['surname'], $dPost['email'], $dPost['phone'], $dPost['note'],$url);
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
	
}