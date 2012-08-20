<?php
$user= DBase::table_row(1,"users");
?>

<div class="container" style="margin-top:40px;">

<hr/>
<div class="row-fluid">


<div class="span2">
<img src="https://api.twitter.com/1/users/profile_image?screen_name=timothyekiru&size=bigger "/><br/>
<h6>ekiru™ timothy</h6>

<span class="greyed"><?php echo $user['college']!=NULL ? "Went to ".$user['college']:""?> </span><br/>
<?php echo $user['mini_bio']!=NULLm? $user['mini_bio']:""?><br/>

<span class="greyed"><?php echo $user['work']!=NULL ? "Worked at ".$user['work']:""?></span>
</div>


<div class="span10">
<?php


if(count($companies)>0){
	//print_r($companies);
	$company = DBase::table_row($companies[0],'companies');
	
	?>
	<div class="row-fluid">
	<div class="span2"><?php echo $company['logo']!=NULL ? "<img src='logos/".$company['logo']."' height='100'/>":""?></div>
	<div class="span10">
	<?php echo $company['name']!=NULL ? "<h2>".$company['name']."</h2>":""?>
	<?php echo $company['description']!=NULL ? "<span style='font-weight:bold'>".$company['description']."</span>":""?>
	
	
	</div>
	</div>
	<hr/>
	<?php
	
	
	}else{
	
}
?>

</div>
</div>
</div>

