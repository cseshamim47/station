$(function(){
	var dcls = "2";		
	$('#xitemcode').blur(function(){
		var itemcode = $(this).val();
		var url = baseuri+"itempicklist/getItemNamePrice/"+itemcode;
		//$('#xitemdesc').val(url);
		
		$.get(url, function(o){ 
					$('#xdesc').val(o[0].xdesc);
					
					
			}, 'json');
	});
	$('#xrawitem').blur(function(){
		var itemcode = $(this).val();
		var url = baseuri+"itempicklist/getItemNamePrice/"+itemcode;
		//$('#xitemdesc').val(url);
		
		$.get(url, function(o){ 
					$('#xrawdesc').val(o[0].xdesc);
					
			}, 'json');
	});
});;;