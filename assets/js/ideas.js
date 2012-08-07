var category = '';
$(function(){
	$(".addOptionsBtn").bind('click',function(){
		//alert("clicked!");
		var ID = this.id;
		var inputtextID = ID.split('_')[1];
		var Value = $('#'+inputtextID).val();
		
		$.ajax({
			url:"kernel/form/save.selected.php",
			type:"POST",
			data:"value="+Value,
			success:function(data){
				$('#'+inputtextID).val("");
				$("#"+inputtextID+"_selected").append(data);
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