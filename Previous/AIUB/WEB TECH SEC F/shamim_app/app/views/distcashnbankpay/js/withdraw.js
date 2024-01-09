$(function(){
	
	var acc = "";		
	$('#xotn').blur(function(){ 
		acc = $(this).val();
		var url = baseuri+"distcashnbankpay/getwithdraw/"+acc;
			
		$.get(url, function(o){ 
					$('#xrdin').val(o[0].xrdin);
					$('#xamount').val(o[0].xamount);
					
			}, 'json');
	});
	
});;;