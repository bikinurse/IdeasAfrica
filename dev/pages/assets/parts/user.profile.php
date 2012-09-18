<?php
$user= DBase::table_row($_SESSION['id'],"users");
$company_id = $_SESSION['company_id'];

?>
<div class="container" style="">

<hr/>
<?php //print_r($user);?>
<div class="row-fluid">


<div class="span2">
<div align="right"><a href="./?n=z"><i class="icon icon-pencil"></i> Edit</a></div><br/>
<img src="<?php echo $user['oauth_provider']=='manual'? "profilePic/".$user['profilePic'] : $userInfo->profile_image_url_https?>"><br/>
<h6><?php echo $user['oauth_provider']=='manual'? $user['name'] : $userInfo->name;?></h6>

<span class="greyed"><?php echo $user['college']!=NULL ? "Went to ".$user['college']:""?> </span><br/>
<?php echo $user['mini_bio']!=NULLm? $user['mini_bio']:""?><br/>

<span class="greyed"><?php echo $user['work']!=NULL ? "Worked at ".$user['work']:""?></span>
</div>


<div class="span10">
<div align="right"><a href="./?n=p"><i class="icon icon-pencil"></i> Edit</a></div>
<?php



$company = DBase::table_row($company_id,'companies');

?>
<div class="row-fluid">
<div class="span3"><img  src="logos/<?php echo $company['logo']!="" ? $company['logo']:"no-logo.png"?>" style="max-width:150px"/></div>
<div class="span9">
<?php echo $company['name']!=NULL ? "<h2>".$company['name']."</h2>":""?>
<?php echo $company['description']!=NULL ? "<span style='font-weight:bold'>".$company['description']."</span>":""?>

<?php

$markets = Insight::company_markets($company_id);
if($markets){
	$markets = implode(', ',$markets);
}
?>
<div class="greyed"><?php echo $markets;?></div>
</div>
</div>
<hr/>

<div class="">
<input type="hidden" name="t" value="companies" id="t" />
<input type="hidden" name="i" value="<?php echo $company_id?>" id="i" />
<label for="productDescription">Please enter a description of your product</label>
<textarea name="productDescription" id="productDescription" class="input-xxlarge autosave"><?php echo $company['productDescription']!=NULL ? $company['productDescription']:""?></textarea>

<div class="">
<br/><br/>
<h6>Resent Activities</h6>
<?php
$activities = DBase::table_row_ids("company_activities where company_id='$company_id'");

if(!empty($activities)){
	?>
	<div >
	<?php
	foreach($activities as $activity_id){
		$activity = DBase::table_row($activity_id,"company_activities");
		$activity_details = DBase::table_row($activity['activity_id'],"activities");
		$user = DBase::table_row($activity['user_id'],"users");
		$company = DBase::table_row($activity['company_id'],"companies");
		?>
		<li style="margin-top:10px"><img src="https://api.twitter.com/1/users/profile_image?screen_name=<?php echo $user['username']?>&size=mini "> <b><a href="#"><?php echo $userInfo->name;?></a>  <?php echo $activity_details['activity'];?> <a href="#"><?php echo $company['name']?></a></b></li>
		<?php
	}
	?>
	</ul>
	<?php
}
?>
</div>
</div>

<?php



?>

</div>
</div>
</div>
</div>





<!--






<div class="container" style="margin-top:40px;">

<hr/>
<?php //print_r($user);?>
<div class="row-fluid">


<div class="span2">
<img src="https://api.twitter.com/1/users/profile_image?screen_name=<?php echo $_SESSION['username'];?>&size=bigger "/><br/>
<h6><?php echo $userInfo->name;?>y</h6>

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

-->