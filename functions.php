<?php
function thumbtail_list($table,$icon,$stats){
	
	//table str
	
	$table_string = @split(' ',$table);
	
	$list_items = DBase::table_row_ids($table);
	$table_fields = DBase::db_tables_fields($table_string[0]);
	?>
	<ul class="thumbnails">
	<li style="margin:0"></li>
	<?php
	foreach($list_items as $list_item_id){
		$itemTable_strings = @split('_',$table_string[0]);
		$item_relation = DBase::table_row($list_item_id,$table_string[0]);
		
		$itemTable = $itemTable_strings[1];
		$item_id = $item_relation[$table_fields[2]];
		$item = DBase::table_row($item_id, $itemTable);
		?>
		<li class='span5 thumbnail'>
		<span class='close  del_select' tbl="<?php echo $table_string[0]?>" vid="<?php echo $list_item_id?>" data-dismiss='alert' type='button'><i class='icon icon-remove'></i></span>
		<i class="icon icon-<?php echo $icon?>"></i> <?php echo $item['name']?>
		<br/>
		<span class='greyed'><?php echo $stats?></span><br/>
		</li>
		<?
	}
	?>
	</ul>
	<?php
}
?>