<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);



if(!file_exists("./app/config.php"))
{
	include "./app/install.php";
	exit;
}

$pageContent = "";
$pageTitle = "";
$pageTitleSub = "";
$pageContentTable = "";
$pageContentButton = "";

include "./app/include.php";

//echo "Vse zatim funguje";


$loader = new \Twig\Loader\FilesystemLoader('./assets/theme/');
$twig = new \Twig\Environment($loader, [
	//'cache' => HOMEDIR.'/assets/theme/cache',
	'debug' => true,
]);

//echo $_GET['id'];

	echo $twig->render($page2Render.'.html', [
		'BASE_URL' => BASE_URL, 
		'pageTitle' => $pageTitle, 
		'pageTitleSub' => $pageTitleSub, 
		'pageContent' => $pageContent, 
		'pageContentTable' => $pageContentTable,
		"pageContentButton"=> $pageContentButton,
		'menuActive' => $page2Render,
	]);


/*
$loader1 = new \Twig\Loader\ArrayLoader([
	'base.html' => '{% block content %}{% endblock %}',
]);
$loader2 = new \Twig\Loader\ArrayLoader([
	'index.html' => '{% extends "base.html" %}{% block content %}Hello {{ name }}{% endblock %}',
	'base.html'  => 'Will never be loaded',
]);

$loader = new \Twig\Loader\ChainLoader([$loader1, $loader2]);

$twig = new \Twig\Environment($loader);
*/