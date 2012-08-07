var category = '';
$(function(){
	
	
	$('.autocomplete').bind('focus',function(){
		category = '';
			category = $(this)[0].getAttribute('category');
		//alert(Category);
		});
	$(".autocomplete").typeahead({
		source: function(typeahead,query){
			$.ajax({
				url: 'kernel/search.php',
				method:GET,
				dataType:JSON,
				data:'category='+category+'&term='+query,
				async:false,
				success:function(data){
					typeahead.process(data);
				}
				});
			
			},
		/*select: function(event,ui){
			//do something
			alert(Category);*/
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