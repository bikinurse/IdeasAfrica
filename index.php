<?php include_once("struct/header.php")?>
<?php 
/* If access tokens are not available redirect to connect page. */
if(!empty($_SESSION['username'])){  
	include_once("pages/signup.php");
}else{
	include_once("pages/home.php");
}
?>

<?php include_once("struct/footer.php")?>
