<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 0");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include("../app/include.php");

$contacts = new Contacts($mysqli);

$_POST = array_map ( 'htmlspecialchars' , $_POST );
$_GET = array_map ( 'htmlspecialchars' , $_GET );

$action = $_POST['action'];

switch ($action) {
	default:
		echo "Nothing sent.";
		exit;	
	break;
	case "saveNew":
		$contacts->saveNew($_POST);
	break;
	case "delete":
		$contacts->delete($_POST['id']);
	break;
}