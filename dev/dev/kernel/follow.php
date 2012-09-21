<?php
session_start();
include_once('../includes.php');
DBase::db_connect();


$company_id = trim($_GET['id']);
$user_id = $_SESSION['id'];

$sql = "insert into company_followers(company_id,user_id) values ('$company_id','$user_id')";
$result = mysql_query($sql);

if($result){
	$sql = "insert into company_activities(user_id,activity_id,company_id,time_performed) values('$user_id','2','$company_id',now())";
	$result = mysql_query($sql);
	if(!$result){
		echo mysql_error();
	}
}else{
	echo mysql_error();
}

?>