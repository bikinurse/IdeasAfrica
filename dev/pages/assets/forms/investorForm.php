<?php
$user_id = $_SESSION['id'];
?>
<div>
<h1>Investor</h1>

<hr/>

<form class="form-horizontal">
<input type="hidden" name="t" value="investor" id="t" />
<input type="hidden" name="i" value="<?php echo $_SESSION['id']?>" id="i" />


<div class="control-group">
<label class="control-label" for="startup">
Startup
</label>
<div id="startup" class="controls">

<div id="startups_selected"  class="selected_content span9">
<?php
//Display already selected cities
thumbtail_list("investor_startups where user_id='$user_id'", "map-marker");
?>
</div>


<input type="text" class="input-xlarge autocomplete" category="companies" id="startups" autocomplete="off" data-provide="typeahead"> <span class="btn addOptionsBtn" id="add_startups"><i class="icon icon-plus"></i> Add</span>
<p class="help-block">
</p>
</div>
</div>

<div class="control-group">
<label class="control-label" for="cities">
Location
</label>
<div id="cities" class="controls">

<div id="cities_selected"  class="selected_content span9">
<?php
//Display already selected cities
thumbtail_list("investor_cities where user_id='$user_id'", "map-marker");
?>
</div>


<input type="text" class="input-xlarge autocomplete" category="cities" id="cities" autocomplete="off" data-provide="typeahead"> <span class="btn addOptionsBtn" id="add_cities"><i class="icon icon-plus"></i> Add</span>
<p class="help-block">
</p>
</div>
</div>


<div class="control-group">
<label class="control-label" for="markets">Target Market</label>
<div class="controls">
<div id="markets_selected"  class="selected_content span9">
<?php
//Display already selected cities
thumbtail_list("investor_markets where user_id='$company_id'", "tags");
?>
</div>

<input type="text" class="input-xlarge autocomplete" category="markets" id="markets"  autocomplete="off" data-provide="typeahead"> <span class="btn addOptionsBtn" id="add_markets"><i class="icon icon-plus"></i> Add</span>
<p class="help-block">
</p>
</div>
</div>

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
<a href="#" class="btn btn-info span3">Continue&nbsp;...</a>
</div>
</div>
</form>
</div>