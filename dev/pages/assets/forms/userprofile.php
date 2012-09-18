<?php
$user = DBase::table_row($_SESSION['id'],"users");
?>
<div>
<hr/>
<div class="row-fluid">
<div class="span4">
&nbsp;
</div>
<div class="span8">

<input type="hidden" name="t" value="users" id="t" />
<input type="hidden" name="i" value="<?php echo $_SESSION['id']?>" id="i" />


<label><b>Name</b></label>
<input type="text" name="name" class="autosave" id="name" value="<?php echo $user['name']?>" style="height:25px; width:60%"/>

<label><b>phone</b></label>
<input type="text" name="phone" class="autosave" id="phone" value="<?php echo $user['phone']?>" style="height:25px; width:60%; width:60%"/>

<label><b>College</b></label>
<input type="text" name="college" class="autosave" id="college" value="<?php echo $user['college']?>" style="height:25px; width:60%"/>

<label><b>Work</b></label>
<input type="text" name="work" class="autosave" id="work" value="<?php echo $user['work']?>" style="height:25px; width:60%"/>

<label><b>Mini Bio</b></label>
<textarea name="mini_bio" class="autosave" id="mini_bio" style="width:60%"><?php echo $user['mini_bio']?></textarea>

<label>&nbsp;</label>
<button class="btn btn-primary">Save</button>
</div>


</div>


</div>