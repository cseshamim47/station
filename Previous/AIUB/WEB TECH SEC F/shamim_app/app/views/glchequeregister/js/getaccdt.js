$(function(){
	$('#row3').hide();
	$('#row4').hide();
	$('#row5').hide();
	$('#row7').hide();
	$('#row8').hide();
	$('#row9').hide();
	if($('#xaccsource').val()=="Sub Account"){
		$('#row3').show();
		$('#row4').hide();
		$('#row5').hide();
	}else if($('#xaccsource').val()=="Customer"){
		$('#row3').hide();
		$('#row4').show();
		$('#row5').hide();
	}else if($('#xaccsource').val()=="Supplier"){
		$('#row3').hide();
		$('#row4').hide();
		$('#row5').show();
	}else if($('#xaccsource').val()!="Customer" && $('#xaccsource').val()!="Sub Account" && $('#xaccsource').val()!="Supplier"){
		$('#row3').hide();
		$('#row4').hide();
		$('#row5').hide();
	}
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
					if(o[0].xaccsource=="Sub Account"){
						$('#row3').show();
						$('#row4').hide();
						$('#row5').hide();						
					}else if(o[0].xaccsource=="Customer"){
						$('#row3').hide();
						$('#row4').show();
						$('#row5').hide();
					}else if(o[0].xaccsource=="Supplier"){
						$('#row3').hide();
						$('#row4').hide();
						$('#row5').show();
					}
					
			}, 'json');
	});
	
	if($('#xacccrsource').val()=="Sub Account"){
		$('#row7').show();
		$('#row8').hide();
		$('#row9').hide();
	}else if($('#xacccrsource').val()=="Customer"){
		$('#row7').hide();
		$('#row8').show();
		$('#row9').hide();
	}else if($('#xacccrsource').val()=="Supplier"){
		$('#row7').hide();
		$('#row8').hide();
		$('#row9').show();
	}else if($('#xacccrsource').val()!="Customer" && $('#xacccrsource').val()!="Sub Account" && $('#xacccrsource').val()!="Supplier"){
		$('#row7').hide();
		$('#row8').hide();
		$('#row9').hide();
	}
	var acccr = "";		
	$('#xacccr').blur(function(){ 	
	
		acccr = $(this).val();
		var url = baseuri+"gljvvou/getaccdt/"+acccr;
		//$('#xitemdesc').val(url);
		
		$.get(url, function(o){ 
					$('#xacccrdesc').val(o[0].xdesc);
					$('#xacccrtype').val(o[0].xacctype);
					$('#xacccrusage').val(o[0].xaccusage);
					$('#xacccrsource').val(o[0].xaccsource);
					if(o[0].xaccsource=="Sub Account"){
						$('#row7').show();
						$('#row8').hide();
						$('#row9').hide();						
					}else if(o[0].xaccsource=="Customer"){
						$('#row7').hide();
						$('#row8').show();
						$('#row9').hide();
					}else if(o[0].xaccsource=="Supplier"){
						$('#row7').hide();
						$('#row8').hide();
						$('#row9').show();
					}
					
			}, 'json');
	});
	
	$('#xaccsub').blur(function(){ 
		
		var accsub = $(this).val();
		var url = baseuri+"gljvvou/getsubaccdt/"+acc+"/"+accsub;
				
		$.get(url, function(o){ 
					$('#xaccsubdesc').val(o[0].xdesc);
			}, 'json');
	});
	
	$('#xcus').blur(function(){
		var cus = $(this).val();
		var url = baseuri+"jsondata/getcustomer/"+cus;
				
		$.get(url, function(o){ 
					$('#xorg').val(o[0].xorg);
					
			}, 'json');
		
	});
	$('#xsup').blur(function(){
		var sup = $(this).val();
		var url = baseuri+"jsondata/getsupplier/"+sup;
				
		$.get(url, function(o){ 
					$('#xsuporg').val(o[0].xorg);
					
			}, 'json');
		
	});
	
	$('#xaccsubcr').blur(function(){ 
		
		var accsub = $(this).val();
		var url = baseuri+"gljvvou/getsubaccdt/"+acccr+"/"+accsub;
				
		$.get(url, function(o){ 
					$('#xaccsubdesccr').val(o[0].xdesc);
			}, 'json');
	});
	
	$('#xcuscr').blur(function(){
		var cus = $(this).val();
		var url = baseuri+"jsondata/getcustomer/"+cus;
				
		$.get(url, function(o){ 
					$('#xorgcr').val(o[0].xorg);
					
			}, 'json');
		
	});
	$('#xsupcr').blur(function(){
		var sup = $(this).val();
		var url = baseuri+"jsondata/getsupplier/"+sup;
				
		$.get(url, function(o){ 
					$('#xsuporgcr').val(o[0].xorg);
					
			}, 'json');
		
	});
});;;