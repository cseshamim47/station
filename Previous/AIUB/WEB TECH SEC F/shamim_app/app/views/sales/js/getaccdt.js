$(function(){
	
	
	$('#xcus').blur(function(){
		var cus = $(this).val();
		var url = baseuri+"jsondata/getcustomer/"+cus;
				
		$.get(url, function(o){ 
					$('#xorg').val(o[0].xorg);
					
			}, 'json');
			
		var xcurl = baseuri+"jsondata/getcustomerbal/"+cus;
				
		$.get(xcurl, function(o){ 
					$('#xcusbal').val(o[0].xbal);
					
			}, 'json');		
		
	});
	
	$('#xdiscpct').blur(function(){
		var discpct = $(this).val();
		var rate = $('#xrate').val();
		var discamt = (discpct*rate)/100;		
		$('#xdisc').val(discamt);	
		
	});
	
	$('#xdisc').blur(function(){
		var disc = $(this).val();
		var rate = $('#xrate').val();
		var discpct = parseFloat((disc*100)/rate) || 0;	
		$('#xdiscpct').val(discpct.toFixed(3));	
		
	});
});;;