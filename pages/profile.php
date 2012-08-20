<?php include_once('assets/menu.php')?>

<div class="container "  style="margin-top:60px;">

<div class="load loading">
<img src="assets/img/loader.gif" /> Loading..
</div>
<div class="row-fluid">


<?php
if(isset($_GET['n']) && $_GET['n'] == 'z'){
	include_once('assets/forms/team.php');
	}else{
	include_once('assets/forms/ProfileForm.php');
}

?>


</div>
&nbsp;
</div>
