<?php
session_start();
include_once('../includes.php');
DBase::db_connect();


$startup = $_GET['id'];
$user_id = $_SESSION['id'];

$sql ="delete from company_followers where user_id = '$user_id' and company_id = '$startup' limit 1";
$result = mysql_query($sql);

if($result){
//echo $startup;
$sql ="delete from company_activities where user_id = '$user_id' and company_id = '$startup' and activity_id = '2' limit 1";
$result = mysql_query($sql);
	echo Insight::company_followers($_GET['startup']);
	
}else{
	echo mysql_error();
}
?>