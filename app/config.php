<?php
// Default configs
define("BASE_URL", "http://localhost:8888/adresar_blueghost/Adresar_BlueGhost/");


// Elastic Search
define("ELASTIC", false);

// MySQL credentials
define("DB_SERVER", "localhost");
define("DB_USER", "adresarDemo");
define("DB_PASS", "password");
define("DB_DATABASE", "adresarDemo");
define("DB_PORT", "3306");

$installed = "yes";

$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);
$mysqli->set_charset('utf8');

if($mysqli->connect_error) {
	  exit('Error connecting to database'); //Should be a message a typical user could understand in production
}