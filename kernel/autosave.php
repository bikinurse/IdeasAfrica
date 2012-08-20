<?php
session_start();
include_once('../includes.php');
DBase::db_connect();

$info = explode('|',$_GET['info']);
//echo $_GET['info'];

$table = $info[0];
$field = $info[1];
$val = $info[2];
$id = $info[3];

//print_r($info);
if(!DBase::update_by_id($table,$field,$val,$id)){
	echo mysql_error();
	}else{
	?>
	Saved!
	<?php
}
//echo DBase::update_by_id($table,$field,$val,$id)
?>