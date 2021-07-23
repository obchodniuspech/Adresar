<?php

	// errory pouzivane v aplikaci
	// not used yet
	
	class Errors {
		
		function error($type) {
			switch ($type) {
				default:
					$eText = "Nastala neznámá chyba";	
					$level = "3";
				break;
				case "already_exist":
					$eText = "Kontakt již existuje a nelze jej proto uložit.";	
					$level = "3";
				break;
			}
			return $eText;
		}
		
	}
	