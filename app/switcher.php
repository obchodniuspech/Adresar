<?php

if(isset($_GET['action'])) {
	$action = $_GET['action'];
}	

if(isset($action)) {
	switch ($action) {
	
		default:
		
		break;
	
		case "new":
			echo "New contact";
		break;
	
	}	
}
