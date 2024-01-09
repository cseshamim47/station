$(function(){
	
	var acc = "";		
	$('#xacc').blur(function(){ 
		acc = $(this).val();
		var url = baseuri+"gljvvou/getaccdt/"+acc;
		//$('#xitemdesc').val(url);
		
		$.get(url, function(o){ 
					$('#xaccdesc').val(o[0].xdesc);
					$('#xacctype').val(o[0].xacctype);
					$('#xaccusage').val(o[0].xaccusage);
					$('#xaccsource').val(o[0].xaccsource);
					
			}, 'json');
	});
	var acccr = "";
	$('#xacccr').blur(function(){ 
		acccr = $(this).val();
		var url = baseuri+"gljvvou/getaccdt/"+acccr;
		
		$.get(url, function(o){ 
					$('#xacccrdesc').val(o[0].xdesc);
					$('#xacccrtype').val(o[0].xacctype);
					$('#xacccrusage').val(o[0].xaccusage);
					$('#xacccrsource').val(o[0].xaccsource);
			}, 'json');
	});
	
	
	$('#xaccsub').blur(function(){
		var xrdin = $(this).val();
		var url = baseuri+"glrcptvoutrade/inforindt/"+xrdin;
				
		$.get(url, function(o){ 
					$('#xaccsubdesc').val(o[0].xorg);
					
			}, 'json');
		
	});
	$('#xcus').blur(function(){
		var cus = $(this).val();
		var url = baseuri+"jsondata/getcustomer/"+cus;
				
		$.get(url, function(o){ 
					$('#xorg').val(o[0].xorg);
					
			}, 'json');
		
	});
});;;