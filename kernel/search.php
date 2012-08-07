<?php
session_start();
include_once('../includes.php');
DBase::db_connect();

$key = trim(strip_tags($_POST['term']));//retrieve the search term that autocomplete sends
$table = trim(strip_tags($_POST['category']));//retrieve the table

$qstring = "SELECT name as value,id FROM $table WHERE name LIKE '%".$key."%'";
$result = mysql_query($qstring);//query the database for entries containing the term
if($result){
	
while ($row = mysql_fetch_array($result,MYSQL_ASSOC)){
		$row['value']=htmlentities(stripslashes($row['value']));
		$row['id']=(int)$row['id'];
		$row_set[] = $row;
}
echo json_encode($row_set);//format the array into json data
}else{
	echo mysql_error();
}
?>