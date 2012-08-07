<?php
session_start();
include_once('../../includes.php');
DBase::db_connect();

$value = trim($_POST['value']);



?>
<span class="alert alert-info"><?php echo $value?><i class="icon icon-trash"></i></span>&nbsp;
