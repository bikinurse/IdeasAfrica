<div class="container" style="margin-top:40px;">
<hr/><?php
$company_id = (int) $_GET['startup'];
$company = DBase::table_row($company_id,'companies');
//print_r($company);
//echo "c".$company_id;
?>
<div class="row-fluid">
<div class="span2"><img  src="logos/<?php echo $company['logo']!="" ? $company['logo']:"no-logo.png"?>" style="max-width:150px"/></div>
<div class="span8">
<?php echo $company['name']!=NULL ? "<h2>".$company['name']."</h2>":""?>
<?php echo $company['description']!=NULL ? "<span style='font-weight:bold'>".$company['description']."</span>":""?>
<?php
$markets = Insight::company_markets($company_id);
if($markets)
{
	$markets = implode(', ',$markets);
}
?>
<div class="greyed"><?php echo $markets;?></div>
<?php echo $company['website']!=NULL ? "<div><a href='http://".$company['website']."'>".$company['website']."</a></div>":""?>
</div>
<div class="span2" align="right">
<div class="NoofFollowers">
<span class="" id="folowers"style="font-size:3em" ><?php echo Insight::company_followers($_GET['startup'])?></span><br/>
<span class="greyed">Followers</span>
</div>
<?php
if(isset($_SESSION['id']))
{
	if(is_follower($_SESSION['id']))
	{
		?>
		<button class="btn span12 unfollow"  cid="<?php echo $_GET['startup']?>" id="unfollow" data-loading-text="Following..."><strong>Unfollow</strong></button>
		<?php
		}else{
		?>
		<button href="#" cid="<?php echo $_GET['startup']?>" class="btn span12 follow"><b>Follow</b></button>
		<?php
	}
	}else{
	?>
	<a href="#" class="btn"><b><span class="greyed">Please login to Follow</span></b></a>
	<?php
}
?>
</div>
</div>
<hr/>
<div class="row-fluid">
<div class="span9">
<div class="tabbable">

<ul class="nav nav-tabs">
<li><a data-toggle="tab" href="#product_tab">Product Description</a></li>
<li class="active"><a data-toggle="tab" href="#activity_tab" class="active">Activity</a></li>
<li><a data-toggle="tab" href="#followers_tab">Followers</a></li>
</ul>

<div class="tab-content">
<div class="tab-pane" id="product_tab">
<!--<h6>Product Description</h6>-->
<?php echo $company['productDescription']!=NULL ? "<span style=''>".$company['productDescription']."</span>":""?>
</div>
<div id="activity_tab" class="tab-pane active">
<!--Activity-->

<label for="comment">Post a comment</label>
<textarea name="comment" id="comment" class="span12"></textarea>
<button class="btn btn-primary"  <?php echo $_SESSION['id']==NULL? "disabled='disabled'":""?> id="post_comment" cid="<?php echo $_GET['startup']?>"><i class="icon icon-comment"></i> Post</button>
<hr/>



<div>
<?php
$company_activities = company_feeds($company_id);
print_r($company_activities);
$company_id = (int) $_GET['startup'];
/*$sql = "SELECT * FROM company_activities, company_comments WHERE company_activities.company_id ='$company_id' order by company_activities.time_performed, company_comments.time_performed desc";
$results = mysql_query($sql);
while($r = mysql_fetch_array($results)){
	print_r($r);
	echo "<b>".$company_id."</b><hr/>";
	//echo isset($r['activity_id'])? $r['activity_id']:$r['comment']."<hr/>";
	}*/
$activities = DBase::table_row_ids("company_activities a INNER JOIN company_comments b USING(company_id)");
//print_r($activities);
if(!empty($company_activities)){
	?>
	<?php
	foreach($company_activities as $activity_str){
		$a = explode('|',$activity_str);
		if($a[2] == 'a'){
			
			$activity = DBase::table_row($a[1],"company_activities");
			$activity_details = DBase::table_row($activity['activity_id'],"activities");
			}else{
			$activity = DBase::table_row($a[1],'company_comments');
		}
		//print_r($activity);
		$person = DBase::table_row($activity['user_id'],"users");
		$company = DBase::table_row($activity['company_id'],"companies");
		?>
		<!--<li><br/><img src="<?php echo $user['oauth_provider']=='manual'? "profilePic/".$user['profilePic'] : "https://api.twitter.com/1/users/profile_image?screen_name=".$user['username']."&size=mini"?>" height="25"> <b><a href="#"><?php echo $user['oauth_provider']=='manual'? $user['name'] : $userInfo->name;?></a>  <?php echo $activity_details['activity'];?> <a href="#"><?php echo $company['name']?></a></b></li>-->
		
		
		<div class="row-fluid" style="margin-top:5px;background:#f7f7f7">
		<div class="span3" align="right">
		<img src="<?php echo $person['oauth_provider']=='manual'? "profilePic/".$person['profilePic'] : "https://api.twitter.com/1/users/profile_image?screen_name=".$person['username']."&size=mini"?>" height="50"/>
		</div>
		<div class="span9">
		<b><?php echo $person['name'] != NULL? $person['name']:"";?></b>
		<p><?php echo $person['mini_bio'] != NULL? $person['mini_bio']:"";?></p>
		<div class="greyed">
		<?php echo $person['college'] != NULL? "went to ".$person['college']."&bull;":"";?>
		<?php echo $person['work'] != NULL? "works at ".$person['work']:"";?>
		</div>
		</div>
		</div>
		<?php
	}
	?>
	<?php
	}else{
	?>
	<h3>No Activities Yet</h3>
	<?php
}
?>
</div>
</div>
<div id="followers_tab" class="tab-pane">
<!--Comments-->
<?php
$followers = DBase::table_row_ids("company_followers where company_id = '$company_id'");
//print_r($followers);
if(!empty($followers))
{
	foreach($followers as $followers_id)
	{
		$following = DBase::table_row($followers_id,'company_followers');
		$person = DBase::table_row($following['user_id'],"users");
		?>
		<div class="row-fluid" style="margin-top:5px;background:#f7f7f7">
		<div class="span3" align="right">
		<img src="profilePic/user.png" height="50"/>
		</div>
		<div class="span9">
		<b><?php echo $person['name'] != NULL? $person['name']:"";?></b>
		<p><?php echo $person['mini_bio'] != NULL? $person['mini_bio']:"";?></p>
		<div class="greyed">
		<?php echo $person['college'] != NULL? "went to ".$person['college']."&bull;":"";?>
		<?php echo $person['work'] != NULL? "works at ".$person['work']:"";?>
		</div>
		</div>
		</div>
		<?php
	}
	}else{
	?>
	<h3>No followers yet</h3>
	<?php
}
?>
</div>
</div>
</div>
</div>
<div class="span3">
<h4><?php echo $company['name']!=NULL ? "".$company['name']."'s":""?> team</h4>
<br/>
<ul class="nav nav-list">
<li class="nav-header">Founders</li>
<li><a href="#">Sam Gichuru</a></li>
<li><a href="#">Ekiru Timothy</a></li>
<li class="nav-header">Investors</li>
<li><a href="#">Pedro Tornado</a></li>
<li><a href="#">Millan Maria</a></li>
<li class="nav-header">Referees</li>
<li><a href="#">Venturer Waititu</a></li>
<li><a href="#">Lodepe Missionary</a></li>
<li class="nav-header">Employees</li>
<li><a href="#">Sam Gichuru</a></li>
<li><a href="#">Ekiru Timothy</a></li>
</ul>
<?php
?>
</div>
</div>