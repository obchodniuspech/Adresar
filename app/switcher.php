<?php

if(isset($_GET['action'])) {
	$action = $_GET['action'];
}	
else {
	$action = "index";
}

if (isset($_GET['id']) && $_GET['id']!="") {
	$action = "contactDetail";
}



$form = new Form;
$contacts = new Contacts($mysqli);


if(isset($action)) {
	switch ($action) {
	
		default:
			$pageTitle = "Kontakty";
			$pageTitleSub = "Přehled kontaktů";
			$pageContentTable = $contacts->overview();
			$pageContentButton = '<div class="col-md-12 text-end"><a href="'.BASE_URL.'?action=new"><button class="btn btn-primary">+ Přidat kontakt</button></a></div>';
			//$contacts = $contacts->overview();
			//print_r($contacts->overview());

		break;
	
		case "new":
			$pageTitle = "Kontakty";
			$pageTitleSub = "Nový kontakt";
			$pageContent = $form->create(
			array(
				"method"=>"post",
				"action"=>"./"
			), array(
				array(
					"type"=>"text",
					"name"=>"name",
					"id"=>"name",
					"placeholder"=>"Jméno",
					"class"=>"form-control",
					"value"=>"",
					"required"=>"required",
				),
				array(
					"type"=>"text",
					"name"=>"surname",
					"id"=>"surname",
					"placeholder"=>"Příjmení",
					"class"=>"form-control",
					"value"=>"",
					"required"=>"required",
				),
				array(
					"type"=>"text",
					"name"=>"phone",
					"id"=>"phone",
					"placeholder"=>"Telefon",
					"class"=>"form-control",
					"value"=>"",
					"required"=>"required",
				),
				array(
					"type"=>"text",
					"name"=>"email",
					"id"=>"email",
					"placeholder"=>"E-mail",
					"class"=>"form-control",
					"value"=>"",
					"required"=>"required",
				),
				array(
					"type"=>"textarea",
					"name"=>"note",
					"id"=>"note",
					"placeholder"=>"Poznámka",
					"class"=>"form-control",
					"value"=>"",
				),
				array(
					"type"=>"button",
					"name"=>"submit",
					"id"=>"contactSave",
					"placeholder"=>"Uložit kontakt",
					"class"=>"btn btn-primary	",
					"value"=>"",
				),
			));
		break;
	
	}	
}
