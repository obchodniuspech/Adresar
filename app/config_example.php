<?php
// Default configs
define("BASE_URL", "https://mastered-monkey.com/Adresar/");


// Elastic Search
define("ELASTIC", false);

// MySQL credentials
define("DB_SERVER", "localhost");
define("DB_USER", "xxxx");
define("DB_PASS", "xxxx");
define("DB_DATABASE", "xxxx");
define("DB_PORT", "3306");

$installed = "yes";

$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);
$mysqli->set_charset('utf8');

if($mysqli->connect_error) {
	  exit('Error connecting to database'); //Should be a message a typical user could understand in production
}