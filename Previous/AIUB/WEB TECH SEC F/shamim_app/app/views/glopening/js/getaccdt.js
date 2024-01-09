$(function(){
	$('#row3').hide();
	$('#row4').hide();
	$('#row5').hide();
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
		var url = baseuri+"glopening/getaccdtjson/"+acc;
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
	
	
	
	$('#xaccsub').blur(function(){ 
		
		var accsub = $(this).val();
		var url = baseuri+"glopening/getsubaccdt/"+acc+"/"+accsub;
				
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
});;;