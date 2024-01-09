$(function(){
	var dcls = "2";		
	$('#xitemcode').blur(function(){
		var itemcode = $(this).val();
		var url = baseuri+"jsondata/getItemNamePrice/"+itemcode;
		
		$.get(url, function(o){ 
					$('#xdesc').val(o[0].xdesc);
					$('#xratepur').val(parseFloat(o[0].xstdcost).toFixed(dcls));
			}, 'json');
							
	});
});;;