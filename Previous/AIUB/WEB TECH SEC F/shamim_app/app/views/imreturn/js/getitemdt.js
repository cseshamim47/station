$(function(){

	var dcls = "2";		
	$('#xitemcode').blur(function(){
		var itemcode = $(this).val();
		var url = baseuri+"jsondata/getItemNamePrice/"+itemcode;
		
		$.get(url, function(o){ 
					$('#xdesc').val(o[0].xdesc);
					$('#xrate').val(parseFloat(o[0].xstdprice).toFixed(dcls));
			}, 'json');
							
	});
});;;