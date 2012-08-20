<?php include_once("assets/menu.php");
include_once('includes.php');
DBase::db_connect();

$user_id = 1;//$_SESSION['id'];
//echo $user_id;
$companies = DBase::table_row_ids("companies where id='$user_id'");


$company = count($companies)>0 ? DBase::table_row($companies[0],'companies'): FALSE;
if($company && $company['published']){
	include_once('assets/parts/user.profile.php');
	}else{
	include_once('profile.php');
	
}
?>
