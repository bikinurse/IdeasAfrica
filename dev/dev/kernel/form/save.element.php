<?php
session_start();
include_once('../../includes.php');
DBase::db_connect();

//Save Data
DBase::update_by_id($element['dbTable'],$element['dbFieldName'],$val,$user_id);

?>