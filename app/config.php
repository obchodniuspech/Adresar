<?php
$_POST = array_map ( 'htmlspecialchars' , $_POST );
$_GET = array_map ( 'htmlspecialchars' , $_GET );

// Default configs
define("BASE_URL", "http://localhost:8888/adresar_blueghost/Adresar_BlueGhost/");


// Elastic Search
define("ELASTIC", false);

// MySQL credentials
define("DB_SERVER", "localhost");
define("DB_USER", "adresarDemo");
define("DB_PASS", "password");
define("DB_DATABASE", "adresarDemo");


//$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);
$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);

if($mysqli->connect_error) {
	  exit('Error connecting to database'); //Should be a message a typical user could understand in production
}
//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
