<?php
session_start();
include_once('../includes.php');
DBase::db_connect();


$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

if($name != NULL || $email != NULL || $password != NULL){
	
	$sql = "insert into users(oauth_provider,profilePic,name,email,password) values ('manual','user.png','$name','$email',md5('$password'))";
	$result = mysql_query($sql);
	
	$id = mysql_insert_id();
	if($result){
		$_SESSION['id'] = $id;
		header('location: ../?&n=w');
		
		}else{
		echo mysql_error();
	}
}