<?php
session_start();
include_once('../includes.php');
DBase::db_connect();

$table = trim($_POST['tbl']);
$id = trim($_POST['vid']);

DBase::delete_by_id($table,$id);
?>