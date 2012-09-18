var category = '';
$(function(){
	
	//image Upload
	$('#imgUpload').bind('click',function(){
		$.ajax({
			url:'pages/assets/forms/image.upload.php',
			success:function(data){
				$('#ImageCenter').html(data);	
			}
			});
		
		});
	
	$('.autosave').bind('blur',function(){
		var t = $('#t').val();
		var FE_id = this.id;
		var val = $(this).val();
		var i = $('#i').val();
		$.ajax({
			url:'kernel/autosave.php?info='+t+'|'+FE_id+'|'+val+'|'+i,
			success:function(data){
				
				//$('#bar').html(percentage+'%');
				$(this).after(data);
			}
			});
		});
	$('#publish').bind('click',function(){
		var c_id = $(this)[0].getAttribute('cid');
		$.ajax({
			url:'kernel/autosave.php?info=companies|published|1|'+c_id,
			success:function(data){
				window.location = './';
			}
			});
	});
	$('.follow').bind('click',function(){
		var c_id = $(this)[0].getAttribute('cid');
		$.ajax({
			url:'kernel/follow.php?id='+c_id,
			success:function(data){
				window.location = './?&startup='+c_id;
				//$('#NoofFollowers').html(data);
			}
			});
	});
	
	$('#post_comment').bind('click',function(){
		var comment = $('#comment').val();
		var c_id = $(this)[0].getAttribute('cid');
		$.ajax({
			url:'kernel/post.comment.php?comment='+comment+'&cid='+c_id,
			success:function(data){
				$('#activity_feeds').prepend(data);
			}
			});
	});
	$('.unfollow').bind('click',function(){
		var c_id = $(this)[0].getAttribute('cid');
		$.ajax({
			url:'kernel/unfollow.php?id='+c_id,
			success:function(data){
				window.location = './?&startup=1';
				//$('#folowers').html(data);
			}
			});
	});
	
	
	$('.addTeam').bind('click',function(){
		var team = this.id.split('_')[1];
		var team_id = $(this)[0].getAttribute('team');
		var name = $('#'+team+'_name').val();
		var email = $('#'+team+'_email').val();
		$.ajax({
			url:"kernel/form/save.team.php",
			type:"POST",
			data:"name="+name+"&email="+email+"&team_id="+team_id,
			success:function(data){
				$('#'+team+'_selected ul').fadeIn('slow').append(data);
				$('#'+team+'_name').val('');
				$('#'+team+'_email').val('');
			}
			});
		});
	$(".del_select").bind('click',function(){
		var vid = $(this)[0].getAttribute('vid');
		var tbl = $(this)[0].getAttribute('tbl');
		
		$.ajax({
			url:"kernel/delete.php",
			type:"POST",
			data:"vid="+vid+"&tbl="+tbl
			});
		/*$('#'+vid+'_'+tbl).fadeOut('slow');*/
		});
	
	$('.inModal').hide();
	$('.open_inModal').bind('click',function(){
		$('.inModal').hide();
		$('.open_inModal').fadeIn();
		$('#'+this.parentNode.id+'_inModal').fadeIn('slow');
		$(this).hide();
		});
	$('.close_inModal').bind('click',function(){
		$('.inModal').hide();
		$('.open_inModal').fadeIn();
		});
	$(".addOptionsBtn").bind('click',function(){
		//alert("clicked!");
		var ID = this.id;
		var inputtextID = ID.split('_')[1];
		var Value = $('#'+inputtextID).val();
		
		$.ajax({
			url:"kernel/form/save.selected.php",
			type:"POST",
			data:"value="+Value+"&category="+inputtextID,
			success:function(data){
				$('#'+inputtextID).val("");
				$("#"+inputtextID+"_selected .thumbnails").append(data);
			}
			});
		
		});
	
	$('.autocomplete').bind('focus',function(){
		category = '';
		category = $(this)[0].getAttribute('category');
		//alert(Category);
		});
	$(".autocomplete").typeahead({
		source: function(typeahead,query){
			$.ajax({
				url: 'kernel/search.php',
				type:"POST",
				dataType:"JSON",
				data:'category='+category+'&term='+query,
				async:false,
				success:function(data){
					typeahead.process(data);
				}
				});
			
		}
		});
	
	$('textarea').autogrow();
	
	
	//AJAX BIND LOAD INDICATORS
	$('.loading').hide();
	$(".loading").bind("ajaxSend", function(){
		$(this).show();
		}).bind("ajaxComplete", function(){
		$(this).hide();
		});
});