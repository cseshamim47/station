$(function(){
	
	$('#bin').blur(function(){ 
	
		var bin = $(this).val(); 
		var url = baseuri+"distbcchange/bindt/"+bin;
		
		$.get(url, function(o){ 
					$('#binname').val(o[0].xorg);					
			}, 'json');
		
	});
	$('#xrdin').blur(function(){
		var xrdin = $(this).val();
		var url = baseuri+"distbcchange/inforindt/"+xrdin;
			
		$.get(url, function(o){ 
					$('#rinname').val(o[0].xorg);
			}, 'json');
		
	});
});;;