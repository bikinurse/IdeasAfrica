<?php
class Insight{
	public static function percentage_complete($user_id){
		$tableFields = DBase::db_tables_fields('applications');
		$empty_fields = self::fields_added($user_id);
		
		return floor($empty_fields/29 * 100);
	}
	public static function fields_added($user_id){
	$filled = 0;
	$field = DBase::table_row($user_id,'applications');
	foreach($field as $dbField=>$value){
//		if($value != NULL || $value=='0' || $value =='000-00-00'|| strlen($value) < 100){
		if( (int)strlen($value) > 1){
			$filled ++;
		}
	}
		return $filled;
	}
	public static function form_inputs($formName){
		$inputs = DBase::table_row_ids("forms where formName = '$formName'");
		return count($inputs);
	}
}
?>