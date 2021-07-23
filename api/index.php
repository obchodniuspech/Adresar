<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 0");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include("../app/include.php");

$errors = new Errors;
$contacts = new Contacts($mysqli);


$action = $_POST['action'];

switch ($action) {
	default:
		echo "Nothing sent.";
		exit;	
	break;
	case "saveNew":
		$result = $contacts->saveNew($_POST);
		if(is_numeric($result)){echo "okey";} else {echo $result;}
	break;
	case "saveEdit":
		$contacts->saveEdit($_POST);
	break;
	case "delete":
		$contacts->delete($_POST['id']);
	break;
	case "saveCheckDontExistFromName":
		$contacts->saveCheckDontExistFromName($_POST['name']);
	break;
}