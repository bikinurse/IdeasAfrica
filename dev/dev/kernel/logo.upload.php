<?php
session_start();
include_once("../includes.php");
DBase::db_connect();
error_reporting(E_ALL);
$dir_dest = '../logos';
$company_id = $_SESSION['company_id'];
$handle = new upload($_FILES['image']);
if ($handle->uploaded)
{
	$handle->Process($dir_dest);
	$msg = NULL;
	// we check if everything went OK
	if ($handle->processed)
	{
		$sql = "update companies set logo='".$handle->file_dst_name."' where id='$company_id'";
		mysql_query($sql);
		?>
		<script type="text/javascript">
		$(function()
		{
			});
		</script>
		<img src="./logos/<?php echo $handle->file_dst_name?>" height="150"/>
		<?php
		} else {
		// one error occured
		$msg = 'Error: ' . $handle->error;
	}
	// we delete the temporary files
	$handle-> Clean();
}
else {
	$msg = "Error: " . $handle->error;
}
?>