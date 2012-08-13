<?php
session_start();
include_once('../../includes.php');
DBase::db_connect();

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$team_id = trim($_POST['team_id']);
$company_id = 1;

$sql = "insert into company_teams(company_id,name,email,team_id,date_added) values ('$company_id','$name','$email','$team_id',now())";
$result = mysql_query($sql);

$vid = mysql_insert_id();
/*×*/
if($result){
	
	?>
	<li class='span5 thumbnail'>
	<span class='close remove_team' vid="<?php echo $vid?>" data-dismiss='alert' type='button'><i class='icon icon-remove'></i></span>
	<i class="icon icon-user"></i> <?php echo $name;?>
	<br/>
	<span class='greyed'>Not Confirmed</span><br/>
	</li>
	
	<?php
	
	}else{
	?>
	<li class="span5">
	<div class="alert alert-error">
	<span class='close' vid="" data-dismiss='alert' type='button'><i class='icon icon-remove'></i></span>
	<i class="icon icon-warning-sign"></i> Error while saving data
	</div>
	</li>
	<?php
}
?>
<script type="text/javascript">
//<!--
$(function(){
	$(".remove_team").bind('click',function(){
		var vid = $(this)[0].getAttribute('vid');
		var tbl = 'company_teams';
		
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