
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
Please enter the name of your company here, e.g. Facebook
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
<div id="cities_selected"  class="selected_content"></div>
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
<div id="markets_selected"  class="selected_content"></div>
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
<span class="add-on">$</span>
<input type="text" class="" size="10" name="capital" id="capital"  style="text-align:right;width:150px">
<span class="add-on">.00</span>
</div>
</div>
</div>
<div class="control-group">
<label class="control-label" for="equity">
Equity
</label>
<div class="controls">
<div class="input-append">
<input type="text" class="" size="4" id="equity" maxlength="2" style="text-align:right;width:50px">
<span class="add-on">%</span>
</div>
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
<label class="control-label" for="needs">
What are your other needs?
</label>
<div class="controls">
<div id="needs_selected"   class="selected_content"   ></div>
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
<button class="btn btn-info span3" disabled="disabled" style="margin-left:0"><i class="icon icon-hdd"></i>&nbsp;&nbsp;Save and Continue</button>
</div>
</div>
</form>


</div>

</div>
