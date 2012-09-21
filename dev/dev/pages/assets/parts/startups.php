
<div class="container" style="margin-top:40px;">
<hr/>
<ul class="thumbnails">
<?php
$companies = DBase::table_row_ids("companies where published='1'");
$count = count($companies);

//print_r($companies);


foreach($companies as $company_id){
	$company = DBase::table_row($company_id,'companies');
	$followers = Insight::company_followers($company_id);
	$cities = Insight::company_cities($company_id);
	if(isset($_SESSION['id'])){
		$user = DBase::table_row($_SESSION['id'],"users");
	}
	if($cities){
		$locations = implode(', ',$cities);
	}
	?>
	<li class="span2">
	<div class="thumbnail">
	<div style="height:150px;" align="center">
	<?php
	if(isset($_SESSION['id']) && is_user_company($_SESSION['id']) == $company_id){

		?>
		<a href="./?&n=v"><img  src="logos/<?php echo $company['logo']!="" ? $company['logo']:"no-logo.png"?>" style="max-width:150px"/></a>
		<?php
		}else{
		?>
		<a href="./?&startup=<?php echo $company_id?>">
		<img  src="logos/<?php echo $company['logo']!="" ? $company['logo']:"no-logo.png"?>" style="max-width:150px"/>
		</a>
		<?php
	}
	?>
	</div>
	
	<div class="greyed">
	<strong><?php echo $company['name']?></strong><br/>
	<?php echo $followers?> Followers,<br/>
	<?php echo $locations?>
	</div>
	</div>
	</li>
	
	<?php
	$cities = NULL;
}
if($count > 9){
	?>
	
	<li class="span2">
	<h2>&nbsp;</h2>
	<div class="">
	<img src="logos/arrow-right.png"/>
	</div>
	</li>
	<?php
}
?>
</ul>
</div>