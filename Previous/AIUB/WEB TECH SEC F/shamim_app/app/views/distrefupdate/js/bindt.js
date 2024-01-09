$(function(){
	$('#bin').blur(function(){
		
		var bin = $(this).val();
		var url = baseuri+"distrefupdate/bindt/"+bin;
		
		$.get(url, function(o){ 
					$('#xorg').val(o[0].xorg);
			}, 'json');
		
	});
	 	
	$('#refbin').blur(function(){
		
		var refbin = $(this).val();
		var url = baseuri+"distrefupdate/bindt/"+refbin;
		
		$.get(url, function(o){ 
					$('#refname').val(o[0].xorg);
			}, 'json');
		
	});
	
	
});;;