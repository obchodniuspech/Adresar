<?php
$_POST = array_map ( 'htmlspecialchars' , $_POST );
$_GET = array_map ( 'htmlspecialchars' , $_GET );
