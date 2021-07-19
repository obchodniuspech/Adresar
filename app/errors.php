<?php

	// errory pouzivane v aplikaci
	class Errors {
		
		function error($type) {
			switch ($type) {
				case "already_exists":
					$eText = "Kontakt již existuje";	
					return $eText;
				break;
			}
			
		}
		
	}