<?php
session_start();
include_once('includes.php');
DBase::db_connect();

foreach($_POST as $field=>$value){
	$$field = mysql_real_escape_string($value);
	//echo $field." => ".$value."<br/>";
}
$user = DBase::table_row_ids("users where email = '$email' and password=md5('$password')");
//print_r($user);

if(!empty($user)){
	$_SESSION['id'] = $user[0];
	//echo $user[0];
	$companies = DBase::table_row_ids("companies where user_id = '{$_SESSION['id']}'");
	//print_r($companies[0]);	
	
	$company_id = ($companies[0] != NULL) ? $companies[0] : 0; 
	
	$_SESSION['company_id'] = $company_id;
	//echo $company_id;
	header('location: ./');
	}else{
	header('location: ./?&error=Login error');
}
?>