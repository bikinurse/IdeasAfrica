<?php
if(isset($_SESSION['id']))
    $user_id = $_SESSION['id'];
else
    $user_id = 0;

if(isset($_SESSION['userInfo']))
    $userInfo = $_SESSION['user_info'];
else
    $userInfo = null;

$user_name = "Guest";
$authlink = "login=1";
$authlabel = "Login";
?>
<div class="navbar navbar-fixed-top">
<div class="navbar-inner ">
<div class="container" style="">
<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</a>
<!-- Brand -->
<a class="brand" href="http://dev.ideasafrica.com">IdeaAfrica
<!--<img src="assets/img/ideasafrica.png" height="40" style="padding:0;position:absolute;"/>-->
</a>
<!-- hidden at 940px or less -->
<div class="nav-collapse">
<ul class="nav">
<li><a href="./">Startups</a></li>
<!--<li><a href="./?n=u">People</a></li>-->
</ul>
<ul  class="nav pull-right">
<?php 
if($user_id == 0){
	?>
	<li><a href="./?&login=1">Login..</a></li>
	<li><a href="./?&signup=1" class=""><b>Join</b></a></li>
	<?php
	}else{
	include_once('includes.php');
	DBase::db_connect();
	$user = DBase::table_row($user_id,"users");
        if($user['oauth_provider'] == 'manual'){
            $user_name = $user['name'];
            $authlink = "logout=1";
            $authlabel = "Logout";
        }else{
            if($userInfo != null){
               $user_name = $userInfo->name;
               $authlink = "logout=1";
               $authlabel = "Logout";
            }
        }
	?>
	
	<li><a href="?person=<?=$user_id?>"> <?php echo $user_name ?></a></li>
	<li class="dropdown">
	<a class="dropdoen-toggle" data-toggle="dropdown" href="#">
	<img src="<?php echo $user['oauth_provider']=='manual'? "profilePic/".$user['profilePic'] : $userInfo->profile_image_url_https?>" height="25"/>
	<i class="caret"></i>
	</a>
	<ul class="dropdown-menu">
	<li>
	<?php
/*	$companies = DBase::table_row_ids("companies where user_id = '".$_SESSION['id']".'");
	$company_id = ($companies[0] != NULL) ? $companies[0] : 0;*/ 
	//echo $_SESSION['company_id'];
	if(is_user_company($user_id)){
	$company = DBase::table_row_by_user_id('companies',$user_id);
		echo "<a href='./?n=p'>Edit ".$company['name']."</a>";
		}else{
		echo "<a href='./?n=p'>Add a Startup</a>";
	}
	
	?></li>
	<li><a href="./?n=i">Become an Investor</a></li>
	<li><a href="./?n=e">Edit profile</a></li>
	<li class="divider"></li>
	<li><a href="./?<?=$authlink?>" ><b><?=$authlabel?></b></a></li>
	</ul>
	</li>
	<?php
}
?>
</ul>
</div>
</div>
</div>
</div>