<form name="photo" enctype="multipart/form-data" action="./kernel/logo.upload.php" method="post" id="logoUpload">
<input type="file" name="image" size="30" ><br/>
<a href="#" class="btn" id="preview">Preview</a>
</form>
<script type="text/javascript">
//<!--
$(function(){
	$('#preview').click(function(){
		$('#logoUpload').ajaxSubmit({
			success:function(data){
				$('#ImageCenter').html(data);
			}
			});
		});
	
	});
//-->
</script>
