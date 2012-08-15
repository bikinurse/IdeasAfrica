<?php
session_start();
include_once('../includes.php');
DBase::db_connect();

$info = @split('|',$_POST['info']);

$table = $info[0];
$field = $info[1];
$val = $info[2];
$id = $info[3];
DBase::update_by_id($table,$field,$val,$id);
?>
Saved!