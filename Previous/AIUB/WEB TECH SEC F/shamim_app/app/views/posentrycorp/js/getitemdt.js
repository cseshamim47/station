$(function(){
	var dcls = "2";		
	$('#xitemcode').blur(function(){
		$('#loading').modal('show');
		var itemcode = $(this).val();
		var url = baseuri+"posentry/getItemNamePrice/"+itemcode;
		//$('#xitemdesc').val(url);
		
		$.get(url, function(o){ 
					$('#xdesc').val(o[0].xdesc);
					$('#xsalesprice').val(parseFloat(o[0].xmrp).toFixed(dcls));
					$('#xpoint').val(o[0].xdp);
			}, 'json');
			$('#loading').modal('hide');
	});
	
});;;