<?php
include(__DIR__."/errors.php");
include(__DIR__."/global.php");
include(__DIR__."/config.php");
if ($installed=="no") {
	include __DIR__."/install.php";
	exit;
}
include __DIR__.'/loginCheck.php';
include __DIR__.'/autoload.php';
include(__DIR__."/contacts.php");
include(__DIR__."/forms.php");
include(__DIR__."/switcher.php");