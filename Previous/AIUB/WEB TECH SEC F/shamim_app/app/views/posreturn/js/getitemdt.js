$(function(){
	$('#xitemcode').blur(function(){
		var itemcode = $(this).val();
		var url = "http://localhost/matrashop/posentry/getItemNamePrice/"+itemcode;
		//$('#xitemdesc').val(url);
		$.get(url, function(o){ 
					$('#xitemdesc').val(o[0].xitemdesc);
					$('#xsalesprice').val(o[0].xstdprice);
			}, 'json');
	});
});;;