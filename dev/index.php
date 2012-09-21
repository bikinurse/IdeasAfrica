<?php

/* get the name of the base url */
$host = $_SERVER['HTTP_HOST']=='localhost'?'http://'.$_SERVER['HTTP_HOST'].'/dev/':$_SERVER['HTTP_HOST'];

!defined('HOST')?define('HOST', $host):'';

include_once("struct/header.php");

include_once("pages/home.php");

include_once("struct/footer.php");

?>
