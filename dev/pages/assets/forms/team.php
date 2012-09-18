<?php
@session_start();
include_once('includes.php');
DBase::db_connect();

$company_id = $_SESSION['company_id'];

$user = DBase::table_row($_SESSION['id'],'users');

?>

<div class="span1 step-holder">
<!--<h6>Steps</h6>
<hr/>-->
<div class="step">1</div>
<div class="step step-active">2</div>
<div class="step">3</div>
&nbsp;
</div>

<!--FORMS-->
<div class="span11 real_content">
<h1 style="color:#c0c0c0">Me and my team</h1>

<div class="">
<?php //echo $_SESSION['company_id']."h"?>
<form class="form-horizontal">
<input type="hidden" name="t" value="users" id="t" />
<input type="hidden" name="i" value="<?php echo $_SESSION['company_id']?>" id="i" />
<!--About me-->
<fieldset>
<legend>About Me</legend>

<div class="control-group">
<label class="control-label" for="college">College</label>
<div class="controls">
<input type="text" class="input-xlarge autosave" value="<?php echo $user['college'] !=NULL ? $user['college']: "" ?>" id="college">
<p class="help-block">Please enter the name of the College you attended here, e.g. <i>The University of Nairobi</i></p>
</div>
</div>


<div class="control-group">
<label class="control-label " for="work">Work</label>
<div class="controls">
<input type="text" class="input-xlarge autosave" value="<?php echo $user['work'] !=NULL ? $user['work']: "" ?>" id="work">
<p class="help-block">Please enter a place you have worked here, e.g. <i>Google</i></p>
</div>
</div>

<div class="control-group">
<label class="control-label " for="mini_bio">Mini-Bio</label>
<div class="controls">
<textarea class="input-xlarge autosave"  id="mini_bio"><?php echo $user['mini_bio'] !=NULL ? $user['mini_bio']: "" ?></textarea>
<p class="help-block"><!--Please enter the name of the College you attended here, e.g. <i>The University of Nairobi</i>--></p>
</div>
</div>

</fieldset>


<!--My Team-->
<fieldset>
<legend>My team</legend>

<!--Founders-->
<div class="control-group">
<label class="control-label" for="founders">Founders</label>

<div class="controls" id="founders">

<div id="founder_selected"   class="selected_content span9">
<?php
//Display already selected cities
thumbtail_list("company_teams where company_id='$company_id' and team_id ='1'", "user");
?>
</div>
<!--<div class="span9">
<ul id="founder_added" class="thumbnails"><li style="margin:0"></li></ul>
</div>-->

<div class="row-fluid inModal" id="founders_inModal">
<div class="span4 inPop">
<label><i class="icon icon-user"></i> Name</label>
<input type="text" id="founder_name"/>
</div>
<div class="span4 inPop"  style="margin-left:0; padding-right:5px;">

<label><i class="icon icon-envelope"></i> Email <span class="greyed">for Confirmation</span></label>
<input type="text" id="founder_email"/>

</div>
<br/>
<div class="span3">
<span class="btn addTeam" id="add_founder" team="1"><i class="icon icon-plus"></i> Add</span>
<br/>
<span class="close_inModal span_link">Cancel</span>

</div>
</div>

<br/>
<span class="open_inModal span_link"><i class="icon icon-plus-sign"></i> Add Founder</span>
</div>
</div>

<!--Employees-->
<div class="control-group">
<label class="control-label" for="employees">Employees</label>
<div class="controls" id="employees">

<div id="employee_selected"   class="selected_content span9">
<?php
//Display already selected cities
thumbtail_list("company_teams where company_id='$company_id' and team_id ='2'", "user");
?>
</div>
<!--<div class="span9">
<ul id="employee_added" class="thumbnails"><li style="margin:0"></li></ul>
</div>-->

<div class="row-fluid inModal" id="employees_inModal">
<div class="span4 inPop">
<label><i class="icon icon-user"></i> Name</label>
<input type="text" id="employee_name"/>
</div>
<div class="span4 inPop"  style="margin-left:0; padding-right:5px;">

<label><i class="icon icon-envelope"></i> Email <span class="greyed">for Confirmation</span></label>
<input type="text" id="employee_email"/>

</div>
<br/>
<div class="span3">
<span class="btn addTeam" id="add_employee" team="2"><i class="icon icon-plus"></i> Add</span>
<br/>
<span class="close_inModal span_link">Cancel</span>

</div>
</div>

<br/>
<span class="open_inModal span_link"><i class="icon icon-plus-sign"></i> Add Employee</span>
</div>
</div>



<!--Previous Investors-->
<div class="control-group">
<label class="control-label" for="investors">Investors</label>

<div class="controls" id="investors">

<div id="investor_selected"   class="selected_content span9">
<?php
//Display already selected cities
thumbtail_list("company_teams where company_id='$company_id' and team_id='3'", "user");
?>
</div>
<!--<div class="span9">
<ul id="investor_added" class="thumbnails"><li style="margin:0"></li></ul>
</div>-->


<div class="row-fluid inModal" id="investors_inModal">
<div class="span4 inPop">
<label><i class="icon icon-user"></i> Name</label>
<input type="text" id="investor_name"/>
</div>
<div class="span4 inPop"  style="margin-left:0; padding-right:5px;">

<label><i class="icon icon-envelope"></i> Email <span class="greyed">for Confirmation</span></label>
<input type="text" id="investor_email"/>

</div>
<br/>
<div class="span3">
<span class="btn addTeam" id="add_investor" team="3"><i class="icon icon-plus"></i> Add</span>
<br/>
<span class="close_inModal span_link">Cancel</span>

</div>
</div>

<br/>
<span class="open_inModal span_link"><i class="icon icon-plus-sign"></i> Add Investor</span>
</div>
</div>


<!--Referees-->
<div class="control-group">
<label class="control-label" for="referees">Referees</label>

<div class="controls" id="referees">

<div id="referee_selected"   class="selected_content span9">
<?php
//Display already selected cities
thumbtail_list("company_teams where company_id='$company_id' and team_id ='4'", "user","10 startups");
?>
</div>
<!--<div class="span9">
<ul id="referee_added" class="thumbnails"><li style="margin:0"></li></ul>
</div>-->

<div class="row-fluid inModal" id="referees_inModal">
<div class="span4 inPop">
<label><i class="icon icon-user"></i> Name</label>
<input type="text" id="referee_name"/>
</div>
<div class="span4 inPop"  style="margin-left:0; padding-right:5px;">

<label><i class="icon icon-envelope"></i> Email <span class="greyed">for Confirmation</span></label>
<input type="text" id="referee_email"/>

</div>
<br/>
<div class="span3">
<span class="btn addTeam" id="add_referee" team="4"><i class="icon icon-plus"></i> Add</span>
<br/>
<span class="close_inModal span_link">Cancel</span>

</div>
</div>

<br/>
<span class="open_inModal span_link"><i class="icon icon-plus-sign"></i> Add Referee</span>
</div>
</div>


<!--Incubator-->
<div class="control-group">
<label class="control-label" for="incubator">Incubator</label>
<div class="controls" id="incubator">
<select name="incubator">
<option value="1">Nailab Incubator, Nairobi
</select>
</div>
</div>


</fieldset>
<hr/>
<div class="control-group">
<div class="controls">
<a href="./n=v" class="btn btn-info span3" id="" cid="<?php echo $company_id?>" style="margin-left:0"><i class="icon icon-hdd"></i>&nbsp;&nbsp;Preview</a>
</div>
</div>
</form>
&nbsp;
</div>
</div>