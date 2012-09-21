<?php
$people = DBase::table_row_ids('users');
?>
<div>
<h1>People</h1>
<hr/>

<?php
foreach($people as $person_id){
$person = DBase::table_row($person_id,"users");
	?>
	<div class="row-fluid" style="margin-top:5px;background:#f7f7f7">
	<div class="span3" align="right">
	<img src="profilePic/user.png" height="50"/>
	</div>
	<div class="span4">
	<b><a href="?person=<?=$person['id']?>"><?php echo $person['name'] != NULL? $person['name']:"";?></a></b>
	<p><?php echo $person['mini_bio'] != NULL? $person['mini_bio']:"";?></p>
	<div class="greyed">
	<?php echo $person['college'] != NULL? "went to ".$person['college']."&bull;":"";?>
	<?php echo $person['work'] != NULL? "works at ".$person['work']:"";?>
	</div>
	</div>
	</div>
	<?php
}

?>
</div>