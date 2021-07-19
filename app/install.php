<?php
include "./app/forms.php";

$_POST = array_map ( 'htmlspecialchars' , $_POST );
$folders = array("assets/theme/cache/","app/config.php");


if ($_POST) {
	
	
	if(touch($_POST['BASE_FOLDER']."app/config.php")) {
		echo "soubor byl vytvořen";
	}
	else {
		echo "soubor bude nutné vytvořit manuálně";exit;
	}

	$file = fopen($_POST['BASE_FOLDER']."app/config.php","w+");
	$configFile = <<<EOT
	<?php
	// Default configs
	define("BASE_URL", "{$_POST['BASE_URL']}");
	
	
	// Elastic Search
	define("ELASTIC", false);
	
	// MySQL credentials
	define("DB_SERVER", "{$_POST['DB_SERVER']}");
	define("DB_USER", "{$_POST['DB_USER']}");
	define("DB_PASS", "{$_POST['DB_PASS']}");
	define("DB_DATABASE", "{$_POST['DB_DATABASE']}");
	define("DB_PORT", "{$_POST['DB_PORT']}");
	
	
	\$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);
	
	if(\$mysqli->connect_error) {
		  exit('Error connecting to database'); //Should be a message a typical user could understand in production
	}
	EOT;
	
	if(fwrite($file,$configFile)) {
		$pageContent = "Konfigurační soubor byl vytvořen, nyní prosím vytvořte databázi s příslušným názvem a importujte do ní soubor install.sql";
	}
	else {
		$pageContent = "Konfigurační soubor se bohužel nepodařilo automaticky vytvořit. Zkopírujte prosím následující kód a vložte jej jako soubor \"config.php\" do složky /app/config.php";
		$pageContent.= "<pre><code>
		<p>&lt;p&gt;&lt;?php // Default configs define(&amp;quot;BASE_URL&amp;quot;, &amp;quot;http://localhost:8888/adresar_blueghost/Adresar_BlueGhost/&amp;quot;);&lt;/p&gt;</p>
			
			<p>&lt;p&gt; // Elastic Search define(&amp;quot;ELASTIC&amp;quot;, false);&lt;/p&gt;</p>
			
			<p>&lt;p&gt;// MySQL credentials define(&amp;quot;DB_SERVER&amp;quot;, &amp;quot;localhost&amp;quot;); define(&amp;quot;DB_USER&amp;quot;, &amp;quot;adresarDemo&amp;quot;); define(&amp;quot;DB_PASS&amp;quot;, &amp;quot;password&amp;quot;); define(&amp;quot;DB_DATABASE&amp;quot;, &amp;quot;adresarDemo&amp;quot;); define(&amp;quot;DB_PORT&amp;quot;, &amp;quot;8889&amp;quot;);&lt;/p&gt;</p>
			
			<p>&lt;p&gt; &amp;mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE, DB_PORT);&lt;/p&gt;</p>
			
			<p>&lt;p&gt;if(&amp;-&gt;connect_error) { &nbsp;exit(&#39;Error connecting to database&#39;); //Should be a message a typical user could understand in production }&lt;/p&gt;</p>
			
		</code></pre>";
	}
	fclose($file);
	
	
	
	
}

else {
	
	
	$form = new Form;
	
	$baseUrl = str_replace("index.php", "", "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	
	$writableCheck = "";
	foreach ($folders AS $folder) {
		$folder = __DIR__."/../".$folder;		
		if (is_writable($folder)) {
			$result = 'OK';
		} else {
			$result = 'Soubor/složka nemá správná oprávnění!';
		}
		$writableCheck.= "<tr><td>$folder</td><td>$result</td></tr>";
	}
	
	$pageContent = "<h2>Kontrola oprávnění pro soubory a složky</h2><table class='table table-striped'>$writableCheck</table>";
	
	
	
	$pageContent.= $form->create(
		array(
			"method"=>"post",
			"action"=>htmlspecialchars($_SERVER['PHP_SELF']),
		), array(
			array(
				"type"=>"text",
				"name"=>"BASE_URL",
				"id"=>"BASE_URL",
				"placeholder"=>"Base URL",
				"class"=>"form-control",
				"value"=>$baseUrl,
				"required"=>"required",
			),
			array(
				"type"=>"text",
				"name"=>"BASE_FOLDER",
				"id"=>"BASE_FOLDER",
				"placeholder"=>"Base Folder",
				"class"=>"form-control",
				"value"=>__DIR__."/../",
				"required"=>"required",
			),
			array(
				"type"=>"text",
				"name"=>"DB_SERVER",
				"id"=>"DB_SERVER",
				"placeholder"=>"DB_SERVER",
				"class"=>"form-control",
				"value"=>"",
				"required"=>"required",
			),
			array(
				"type"=>"text",
				"name"=>"DB_USER",
				"id"=>"DB_USER",
				"placeholder"=>"DB_USER",
				"class"=>"form-control",
				"value"=>"",
				"required"=>"required",
			),
			array(
				"type"=>"text",
				"name"=>"DB_PASS",
				"id"=>"DB_PASS",
				"placeholder"=>"DB_PASS",
				"class"=>"form-control",
				"value"=>"",
				"required"=>"required",
			),
			array(
				"type"=>"text",
				"name"=>"DB_DATABASE",
				"id"=>"DB_DATABASE",
				"placeholder"=>"DB_DATABASE",
				"class"=>"form-control",
				"value"=>"",
			),
			array(
				"type"=>"text",
				"name"=>"DB_PORT",
				"id"=>"DB_PORT",
				"placeholder"=>"DB_PORT",
				"class"=>"form-control",
				"value"=>"8889",
			),
			array(
				"type"=>"button",
				"name"=>"submit",
				"id"=>"contactSave",
				"placeholder"=>"Instalovat Adresář",
				"class"=>"btn btn-primary	",
				"value"=>"",
			),
		));	
	
}




?>


  



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">


<html>
<head>
<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,300,700" rel="stylesheet">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Adresář - Michal Pešat - Instalace</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class="container">
	<div class="row" style="margin-top: 50px;margin-bottom: 50px;">
		<div class="col-md-12 text-center">
			<h1 class="display-1">Dobrý den</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			<?php
				echo $pageContent;
				
				
			?>
		</div>
	</div>
</div>

</body>
</html>
