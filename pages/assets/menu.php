<div class="navbar navbar-fixed-top">
	<div class="navbar-inner ">
		<div class="container">
			<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<!-- Brand -->
			<a class="brand" href="#">
				<img src="assets/img/ideasafrica.png" height="40" style="padding:0;position:absolute;"/>
			</a>
			<!-- hidden at 940px or less -->
			<div class="nav-collapse">
				<ul  class="nav pull-right">
				<?php 
					if(empty($_SESSION['username'])){  
						?>
						<li><a href="./twitter_login.php">Login</a></li>
						<li><a href="./twitter_login.php">Join</a></li>
						<?php
						}else{
						?>
						
						<li><a href="./logout.php">Logout(<?php echo $userInfo->name;?>)</a></li>
						<li><img src="<?php echo $userInfo->profile_image_url_https?>" height="30"/> </li>
						<?php
					}
					?>
				</ul>
			</div>
		</div>
	</div>
</div>