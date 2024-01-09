$(function(){
	$('#row4').hide();
	
	if($('#xaccsource').val()=="Sub Account")
		$('#row4').show();
	else
		$('#row4').hide();
	
	var acc = "";		
	$('#xacc').blur(function(){ 
		acc = $(this).val();
		var url = "http://210.4.76.70:90/xyzcompany/gljvvou/getaccdt/"+acc;
		//$('#xitemdesc').val(url);
		
		$.get(url, function(o){ 
					$('#xaccdesc').val(o[0].xdesc);
					$('#xacctype').val(o[0].xacctype);
					$('#xaccusage').val(o[0].xaccusage);
					$('#xaccsource').val(o[0].xaccsource);
					if(o[0].xaccsource=="Sub Account")
						$('#row4').show();
					else
						$('#row4').hide();
			}, 'json');
	});
	var acccr = "";
	$('#xacccr').blur(function(){ 
		acccr = $(this).val();
		var url = "http://210.4.76.70:90/xyzcompany/gljvvou/getaccdt/"+acccr;
		
		$.get(url, function(o){ 
					$('#xacccrdesc').val(o[0].xdesc);
					$('#xacccrtype').val(o[0].xacctype);
					$('#xacccrusage').val(o[0].xaccusage);
					$('#xacccrsource').val(o[0].xaccsource);
			}, 'json');
	});
	
	$('#xcus').blur(function(){
		var cus = $(this).val();
		var url = baseuri+"jsondata/getcustomer/"+cus;
				
		$.get(url, function(o){ 
					$('#xorg').val(o[0].xorg);
					
			}, 'json');
		
	});
	
	$('#xitemcode').blur(function(){
		var item = $(this).val();
		var url = baseuri+"jsondata/getItem/xitemcode/"+item;
				
		$.get(url, function(o){ 
					$('#xdesc').val(o[0].xdesc);
					
			}, 'json');
		
	});
});;;