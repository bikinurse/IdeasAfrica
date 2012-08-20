<?php
class DBase{
	public static function db_connect(){

		//include("db.php");
		$db = mysql_connect('localhost','root','');
		
		if (!$db){
		
			die("Error! Could not connect to the database. ".mysql_error());
			exit;
		}
		$db_select = mysql_select_db('ideasafrica', $db);
		if (!$db_select){
			die("Error! Could not select the DBase. ".mysql_error());
		}
	}
	public static function db_tables(){
		$tables = array();
		$db = mysql_connect('localhost','root','');
		$sql = "show tables";
		$results = mysql_query($sql);
		while($r = mysql_fetch_array($results,MYSQL_NUM)){
			$tables[] = $r[0];
		}
		return $tables;
	}
	public static function db_tables_fields($table){
		$fields = array();
		$sql = "show columns from $table";
		$results = mysql_query($sql);
		while($r = mysql_fetch_array($results)){
			$fields[] = $r[0];
		}
		return $fields;
	}
	//function to test a Query. Returns results
	public static function test_query($results){
		if (!$results){
			die("Table could not be queried ".mysql_error());
		}
	}
	public static function create_table($tableName){
		/*CREATE TABLE `adoket`.`users` (
		`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY
		) ENGINE = MYISAM */
		$sql = "CREATE TABLE 'nailabc1_applications'.'users' ('id' INT NOT NULL AUTO_INCREMENT PRIMARY KEY) ENGINE = MYISAM ";
		$results = mysql_query($sql);
		if($results){
			return TRUE;
		}else{
			return mysql_error();
		}
	}
	public static function add_table_field($tableName,$fieldName,$fieldTye){
		if($fieldTye == 'VARCHAR')$fieldTye.='(100)';
		//ALTER TABLE `applications` ADD `takedToCustomer` BOOL NOT NULL ;
		$sql = "ALTER TABLE `$tableName` ADD `$fieldName` $fieldTye NOT NULL ";
		$results = mysql_query($sql);
		if($results){
			return TRUE;
		}else{
			return mysql_error();
		}
	}
	public static function db_disconnect(){
		mysql_close();
	}
	public static function table_row_ids($table){
		$ids = array();
		$sql = "select id from $table";
		$results = mysql_query($sql);
		while($r = mysql_fetch_array($results)){
			$ids[] = $r['id'];
		}
		if($results){
			return $ids;
		}else{
			return FALSE;
		}
	}
	public static function max($table,$field){
		$sql = "select max($field) as last_id from $table";
		$results = mysql_query($sql);
		return mysql_result($results,0,'last_id');
	}
	public static function table_row_by_name($table, $name){
		$sql = "select * from $table where name = '$name' limit 1";
		$results = mysql_query($sql);
		if($results){
			return mysql_fetch_assoc($results);
		}else{
			return FALSE;
		}
	}
	public static function table_row_by_username($table, $username){
		$sql = "select * from $table where username = '$username' limit 1";
		$results = mysql_query($sql);
		if($results){
			return mysql_fetch_assoc($results);
		}else{
			return FALSE;
		}
	}
	public static function table_row($id,$table){
		$sql = "select * from $table where id='$id' limit 1";
		$results = mysql_query($sql);
		if($results){
			return mysql_fetch_assoc($results);
		}else{
			return FALSE;
		}
	}
	public static function update_by_id($table, $dbFieldName, $val,$id){
		$sql = "update $table set $dbFieldName = '$val' where id='$id' limit 1";
		return (mysql_query($sql));
		//return ($sql);
	}
	public static function delete_by_id($table,$id){
		$sql = "delete from $table where id='$id'";
		return (mysql_query($sql));
	}
}
?>