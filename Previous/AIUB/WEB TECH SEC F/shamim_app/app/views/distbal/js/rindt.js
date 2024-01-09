$(function(){
	
		
	$('#xrdin').blur(function(){
		var xrdin = $(this).val();
		var url = baseuri+"distbal/inforindt/"+xrdin;
				
		$.get(url, function(o){ 
					$('#rinname').val(o[0].xorg);
					
			}, 'json');
		
	});
	$('#xdocno').blur(function(){
		var docno = $(this).val();
		var url = baseuri+"distbal/getvouamount/"+docno;
				
		$.get(url, function(o){ 
					$('#xamount').val(Math.abs(o[0].xprime));
					
			}, 'json');
		
	});
	
});;;