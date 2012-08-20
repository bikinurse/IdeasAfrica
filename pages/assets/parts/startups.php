
<ul class="thumbnails">
<?php
$count = 12;

for($i=1; $i<9+1;$i++){
	?>
	<li class="span2">
	<div class="thumbnail">
	<div style="height:150px;"><img  src="logos/ideasafrica.logo.jpg" align="middle" style="max-width:150px"/></div>
	
	<div class="greyed">
	The Native Creative<br/>
	100 Followers, Nairobi
	</div>
	</div>
	</li>
	
	<?php
}
if($count > 9){
	?>
	
	<li class="span2">
	<h2>&nbsp;</h2>
	<div class="">
	<img src="logos/arrow-right.png"/>
	</div>
	</li>
	<?php
}
?>
</ul>