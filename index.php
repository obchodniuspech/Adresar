<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

include "./app/include.php";

//echo "Vse zatim funguje";


$loader = new \Twig\Loader\FilesystemLoader(HOMEDIR.'/assets/theme/');
$twig = new \Twig\Environment($loader, [
	//'cache' => HOMEDIR.'/assets/theme/cache',
	'debug' => true,
]);

echo $twig->render('index.html', ['the' => 'variables', 'go' => 'here']);

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