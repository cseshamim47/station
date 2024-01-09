$(function(){
	
	 
	$('#xcus').blur(function(){
		$('#loading').modal('show');
		var xcus = $(this).val();
		var url = baseuri+"jsondata/getcustomer/"+xcus;
				
		$.get(url, function(o){ 
					$('#xcusdt').val(o[0].xorg);
					$('#xorg').val(o[0].xorg);
					
			}, 'json');
		
	});
});;;