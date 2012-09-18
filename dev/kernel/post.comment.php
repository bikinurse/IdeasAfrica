<?php
session_start();
include_once('../includes.php');
DBase::db_connect();


$comment = mysql_real_escape_string($_GET['comment']);
$company_id = trim($_GET['id']);
$user_id = $_SESSION['id'];

$sql = "insert into company_comments(company_id,user_id,comment,time_performed) values ('$company_id','$user_id','$comment',now())";
$result = mysql_query($sql);

if($result){
	$sql = "insert into company_activities(user_id,activity_id,company_id,time_performed) values('$user_id','3','$company_id',now())";
	$result = mysql_query($sql);
	if(!$result){
		echo mysql_error();
	}else{
		echo "<li>".$comment."</li>";
	}
}else{
	echo mysql_error();
}

?><?php

?>