$(function(){
	var dcls = "2";		
	$('#xitemcode').blur(function(){
		var itemcode = $(this).val();
		var url = baseuri+"jsondata/getItemNamePrice/"+itemcode;
		
		$.get(url, function(o){ 
					$('#xitemdesc').val(o[0].xdesc);
					$('#xrate').val(parseFloat(o[0].xstdcost).toFixed(dcls));
					$('#xunitstk').val(o[0].xunitstk);
			}, 'json');
							
	});
});;;