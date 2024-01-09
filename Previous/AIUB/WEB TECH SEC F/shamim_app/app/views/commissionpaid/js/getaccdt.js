$(function(){ 
	$('#xagent').blur(function(){
		var agent = $(this).val();
		var url = baseuri+"jsondata/getagent/"+agent;
				
		$.get(url, function(o){ 
					$('#xshort').val(o[0].xshort);
					$('#xadd1').val(o[0].xadd1);
					$('#xphone').val(o[0].xphone);
					
			}, 'json');
		
	});
	

});;;