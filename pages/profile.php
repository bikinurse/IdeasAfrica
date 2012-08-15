<?php include_once('assets/menu.php')?>

<div class="container contents">

<div class="load loading">
<img src="assets/img/loader.gif" /> Loading..
</div>
<div class="row-fluid">


<?php
if(isset($_GET['n'])){
	if($_GET['n'] == 'z'){
		include_once('assets/forms/team.php');
		}else{
		include_once('assets/forms/ProfileForm.php');
	}
}

?>


</div>
&nbsp;
</div>
