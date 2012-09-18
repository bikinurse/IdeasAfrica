<?php include_once('assets/menu.php')?>
<div class="container "  style="margin-top:60px;">
<div class="load loading">
<img src="assets/img/loader.gif" /> Loading..
</div>
<div class="row-fluid">
<?php
if(isset($_GET['n']) && $_GET['n'] == 'z'){
	include_once('assets/forms/team.php');
	}elseif($_GET['n'] == 'w'){
	include_once('pages/assets/parts/welcome.php');
	}elseif($_GET['n'] == 'p'){
	include_once('assets/forms/ProfileForm.php');
	}elseif($_GET['n'] == 'i'){
	include_once('assets/forms/investorForm.php');
	}elseif($_GET['n'] == 'e'){
	include_once('assets/forms/userprofile.php');
	}elseif($_GET['n'] == 'u'){
	include_once('pages/assets/parts/people.php');
	}elseif($_GET['n'] == 'v'){
	include_once('pages/assets/parts/user.profile.php');
	}else{
	include_once('assets/forms/ProfileForm.php');
}
?>
</div>
&nbsp;
</div>
