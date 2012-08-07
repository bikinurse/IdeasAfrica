


<form class="form-horizontal">
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
<input type="text" class="input-xlarge" id="name">
<p class="help-block">
Please enter the name pf your company here, e.g. Facebook
</p>
</div>
</div>
<div class="control-group">
<label class="control-label" for="logo">
Logo
</label>
<div class="controls">
<input type="file" class="input-xlarge" id="logo">
<p class="help-block">
Upload Logo image
</p>
</div>
</div>
<div class="control-group">
<label class="control-label" for="description">
Company Description
</label>
<div class="controls">
<textarea class="input-xlarge" id="description"></textarea>
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
<input type="text" class="input-xlarge" id="website">
<p class="help-block">
e.g. http://www.ideasafrica.com
</p>
</div>
</div>
<div class="control-group">
<label class="control-label" for="cities">
Location
</label>
<div class="controls">
<div id="cities_selected"  style="margin-bottom:15px;"></div>
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
<div id="markets_selected"  style="margin-bottom:15px;"></div>
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
<label class="control-label" for="Raising">
How much are you looking for?
</label>
<div class="controls">
<input type="text" class="input-xlarge" id="Raising">
</div>
</div>
<div class="control-group">
<label class="control-label" for="Raising">
Equity
</label>
<div class="controls">
<input type="text" class="input-xlarge" id="Raising">
<p class="help-block">
How much are you willing to give out as equity.
</p>
</div>
</div>
</fieldset>			<!--Other Needs-->
<fieldset>
<legend>
Other needs
</legend>
<div class="control-group">
<label class="control-label" for="otherNeeds">
What are your other needs?
</label>
<div class="controls">
<div id="otherNeeds_selected"  style="margin-bottom:15px;"></div>
<input type="text" class="input-xlarge autocomplete" category="needs" id="otherNeeds" autocomplete="off" data-provide="typeahead"> <span class="btn addOptionsBtn" id="add_otherNeeds"><i class="icon icon-plus"></i> Add</span>
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
<button class="btn btn-info span3" disabled="disabled" style="margin-left:0"><i class="icon icon-hdd"></i>Save</button>
</div>
</div>
</form>
