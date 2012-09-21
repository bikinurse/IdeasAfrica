<?php
@session_start();
include_once('includes.php');
DBase::db_connect();

$company_id = is_user_company($_SESSION['id']);

if($company_id == 0){
	$sql = "insert into companies(user_id,date_added) values('".$_SESSION['id']."',now())";
	$result = mysql_query($sql);
	if($result){
		$company_id = mysql_insert_id();
		$_SESSION['company_id'] = $company_id;
	}else{
		//echo mysql_error();
	}
}else{
	//echo $company_id.'-company_id';
}
$company = DBase::table_row($company_id,'companies');

//print_r($company);
//echo "c".$company_id;
?>
<hr/>
<div class="row-fliud"  style="">
<div class="span1 step-holder">
<!--<h6>Steps</h6>
<hr/>-->
<div class="step step-active">1</div>
<div class="step">2</div>
<div class="step">3</div>
&nbsp;
</div>

<!--FORMS-->
<div class="span11 real_content">
<h1 style="color:#c0c0c0">Create Your Profile</h1>

<div class="">

<form class="form-horizontal">
<input type="hidden" name="t" value="companies" id="t" />
<input type="hidden" name="i" value="<?php echo $company_id?>" id="i" />
<!--Company Information-->
<fieldset>
<legend>
Company Information
</legend>
<div class="control-group">
<label class="control-label" for="name">
Company Name
</label>
<div class="controls">
<input type="text" class="input-xlarge autosave" id="name" value="<?php echo $company['name'] !=NULL ? $company['name']: "" ?>">
<p class="help-block">
Please enter the name of your company here, e.g. Facebook
</p>
</div>
</div>

<!--Logo Image Upload-->
<div class="control-group">
<label class="control-label" for="logo">
Logo
</label>
<div class="controls">
<?php if($company['logo'] !=NULL){
	?>
	<div id="ImageCenter">
	<div align="left"><a href="#" id="imgUpload"><i class="icon icon-pencil"></i> Edit Logo</a></div>
	<img src="./logos/<?php echo $company['logo']?>" height="150"/>
	</div>
	<?php
	
	}else{
	?>
	<div id="ImageCenter">
	<a href="#" class="btn " id="imgUpload"><i class="icon icon-upload"></i> Upload</a>
	<p class="help-block">
	Upload Logo image
	</p>
	</div>
	<?php
	
	}?>

</div>
</div>
<div class="control-group">
<label class="control-label" for="description">
Company Description
</label>
<div class="controls">
<textarea class="input-xlarge autosave" id="description"><?php echo $company['description'] !=NULL ? $company['description']: "" ?></textarea>
<!--
<p class="help-block">
E.g.
</p>
-->
</div>
</div>
<div class="control-group">
<label class="control-label" for="website">
Company Website
</label>
<div class="controls">
<input type="text" class="input-xlarge autosave" id="website" value="<?php echo $company['website'] !=NULL ? $company['website']: "" ?>">
<p class="help-block">
e.g. www.ideasafrica.com
</p>
</div>
</div>
<div class="control-group">
<label class="control-label" for="cities">
Location
</label>
<div class="controls">

<div id="cities_selected"  class="selected_content span9">
<?php
//Display already selected cities
thumbtail_list("company_cities where company_id='$company_id'", "map-marker");
?>
</div>


<input type="text" class="input-xlarge autocomplete" category="cities" id="cities" autocomplete="off" data-provide="typeahead"> <span class="btn addOptionsBtn" id="add_cities"><i class="icon icon-plus"></i> Add</span>
<p class="help-block">
</p>
</div>
</div>
<div class="control-group">
<label class="control-label" for="markets">
Target Market
</label>
<div class="controls">
<div id="markets_selected"  class="selected_content span9">
<?php
//Display already selected cities
thumbtail_list("company_markets where company_id='$company_id'", "tags");
?>
</div>

<input type="text" class="input-xlarge autocomplete" category="markets" id="markets"  autocomplete="off" data-provide="typeahead"> <span class="btn addOptionsBtn" id="add_markets"><i class="icon icon-plus"></i> Add</span>
<p class="help-block">
</p>
</div>
</div>
</fieldset>
<!--Why are you Here?-->
<fieldset>
<legend>
Funding needs
</legend>
<div class="control-group">
<label class="control-label" for="capital">
How much are you looking for?
</label>
<div class="controls">
<div class="input-prepend input-append">
<span class="add-on">$</span><input type="text" class="autosave" size="10" name="capital" id="capital"  value="<?php echo $company['capital'] !=NULL ? $company['capital']: "" ?>"   style="text-align:right;width:150px"><span class="add-on">.00</span>
</div>
</div>
</div>
<div class="control-group">
<label class="control-label" for="equity">
Equity
</label>
<div class="controls">
<div class="input-append">
<input type="text" class="autosave" size="4" id="equity" maxlength="2"  value="<?php echo $company['equity'] !=NULL ? $company['equity']: "" ?>" style="text-align:right;width:50px"><span class="add-on">%</span>
</div>
<p class="help-block">
How much are you willing to give out as equity.
</p>
</div>
</div>
</fieldset>	


<!--Other Needs-->
<fieldset>
<legend>
Other needs
</legend>
<div class="control-group">
<label class="control-label" for="needs">
What are your other needs?
</label>
<div class="controls">
<div id="needs_selected"   class="selected_content span9">
<?php
//Display already selected cities
thumbtail_list("company_needs where company_id='$company_id'", "asterisk");
?>
</div>

<input type="text" class="input-xlarge autocomplete" category="needs" id="needs" autocomplete="off" data-provide="typeahead"> <span class="btn addOptionsBtn" id="add_needs"><i class="icon icon-plus"></i> Add</span>
</div>
</div>

</fieldset>
<hr/>
<div class="control-group">
<div class="controls">
<label class="checkbox" for="terms">
<input type="checkbox" id="terms" name="terms"/>
I Agree to Ideas Africa terms and conditions
</label>
</div>
</div>
<div class="control-group">
<div class="controls">
<a href="./?n=z" class="btn btn-info span3" style="margin-left:0">Continue&nbsp;<i class="icon icon-step-forward"></i></a>
</div>
</div>
</form>


</div>

</div>

</div>