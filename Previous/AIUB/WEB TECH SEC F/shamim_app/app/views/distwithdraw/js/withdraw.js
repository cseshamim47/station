$(function(){
	$('#row3').hide();
	$('#row4').hide();
	
	var hidentype = '';	
	$('input[name="xtype"]').change(function () {
		if($(this).val()=="Bank")
		{
			$('#row3').show();
			$('#row4').show();
			
		}else{
			$('#row3').hide();
			$('#row4').hide();
		} 
	});
	if($('#xtypehidden').val()=="Bank"){
		$('#row3').show();
		$('#row4').show();
	}
	if($('#xtypehidden').val()=="Cash"){
		$('#row3').hide();
		$('#row4').hide();
	}
	/*&$('#row3').hide();
	
	if($('#xaccsource').val()=="Sub Account")
		$('#row3').show();
	else
		$('#row3').hide();
	
	var acc = "";		
	$('#xacc').blur(function(){ 
		acc = $(this).val();
		var url = "http://localhost/amarbazarltd/gljvvou/getaccdt/"+acc;
		//$('#xitemdesc').val(url);
		
		$.get(url, function(o){ 
					$('#xaccdesc').val(o[0].xdesc);
					$('#xacctype').val(o[0].xacctype);
					$('#xaccusage').val(o[0].xaccusage);
					$('#xaccsource').val(o[0].xaccsource);
					if(o[0].xaccsource=="Sub Account")
						$('#row3').show();
					else
						$('#row3').hide();
			}, 'json');
	});
	$('#xaccsub').blur(function(){ 
		
		var accsub = $(this).val();
		var url = "http://localhost/amarbazarltd/gljvvou/getsubaccdt/"+acc+"/"+accsub;
				
		$.get(url, function(o){ 
					$('#xaccsubdesc').val(o[0].xdesc);
			}, 'json');
	});*/
});;;