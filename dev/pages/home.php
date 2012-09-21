<?php

include_once("assets/menu.php");
include_once('includes.php');
DBase::db_connect();

//$user_id = $_SESSION['id'];
//echo $user_id;
/* $companies = DBase::table_row_ids("companies where id='$user_id'");

  $company = count($companies)>0 ? DBase::table_row($companies[0],'companies'): FALSE; */
if(isset($_GET['n'])){
    include_once('profile.php');
}elseif(isset($_GET['startup'])){
    include_once('pages/assets/parts/startup.php');
}elseif(isset($_GET['people'])){
    include_once ('pages/assets/parts/people.php');
}elseif(isset($_GET['person'])){
    include_once ('pages/assets/parts/person.php');
}elseif(isset($_GET['login'])){
    include_once('pages/assets/forms/login.php');
}elseif(isset($_GET['signup'])){
    include_once('pages/assets/forms/signup.php');
}else{
include_once('pages/assets/parts/startups.php');
}
?>
