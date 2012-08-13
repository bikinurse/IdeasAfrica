<?php
session_start();
include_once('../../includes.php');
DBase::db_connect();

//Basic posted and re-created details
$value = trim($_POST['value']);
$table_category = trim($_POST['category']);
$table = "company_".$table_category;


//Since we receive only the value we have to look for the real details from the DB
$value_details = DBase::table_row_by_name($table_category,$value);

//We have to get the correct table field that store the data
$table_fields = DBase::db_tables_fields($table);


//Check if the value already exists
$existing_value = DBase::table_row_ids("$table where company_id = '1' and ".$table_fields[2]."='".$value_details['id']."'");
//print_r($existing_value);


if(count($existing_value)==0){
	
	$sql = "insert into $table (company_id,".$table_fields[2].") values('1','".$value_details['id']."')";
	
	$result = mysql_query($sql);
	$id = mysql_insert_id();
	if($result){
		?>
		<span class="alert alert-info selected" id="<?php echo $id?>_<?php echo $table?>"><?php echo $value?>&nbsp;&nbsp;&nbsp;&nbsp;
		<i class="icon-remove del_select"  tbl="<?php echo $table?>" vid="<?php echo $id?>"></i>
		
		</span>
		<?php
		}else{
		?>
		<span class="alert alert-error selected"><?php print_r($value_details) /*echo mysql_error()*/;?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
		<?php
	}
}
?>
<script type="text/javascript">
//<!--
$(function(){
	$(".del_select").bind('click',function(){
		var vid = $(this)[0].getAttribute('vid');
		var tbl = $(this)[0].getAttribute('tbl');
		
		$.ajax({
			url:"kernel/delete.php",
			type:"POST",
			data:"vid="+vid+"&tbl="+tbl
			});
		$('#'+vid+'_'+tbl).fadeOut('slow');
		});
	});
//-->
</script>
