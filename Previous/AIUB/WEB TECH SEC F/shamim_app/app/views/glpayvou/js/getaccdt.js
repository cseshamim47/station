$(function(){
	$('#row4').hide();
	
	if($('#xaccsource').val()=="Sub Account")
		$('#row4').show();
	else
		$('#row4').hide();
	
	var acc = "";		
	$('#xacc').blur(function(){ 
		debugger;
		acc = $(this).val();
		var url = baseuri+"glpayvou/getaccdtjson/"+acc;
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
		var url = baseuri+"glpayvou/getaccdtjson/"+acccr;
		
		$.get(url, function(o){ 
					$('#xacccrdesc').val(o[0].xdesc);
					$('#xacccrtype').val(o[0].xacctype);
					$('#xacccrusage').val(o[0].xaccusage);
					$('#xacccrsource').val(o[0].xaccsource);
			}, 'json');
	});
	
	$('#xaccsub').blur(function(){ 
		
		var accsub = $(this).val();
		var url = baseuri+"glpayvou/getsubaccdt/"+acc+"/"+accsub;
				
		$.get(url, function(o){ 
					$('#xaccsubdesc').val(o[0].xdesc);
			}, 'json');
	});
});;;