$(function(){
	$('#xsup').blur(function(){
		var sup = $(this).val();
		var url = baseuri+"suppliers/getsupplier/"+sup;
		//$('#xitemdesc').val(url);
		
		$.get(url, function(o){ 
					$('#xorg').val(o[0].xorg);
			}, 'json');
	});

	$('#xponum').blur(function(){
		var ponum = $(this).val();
		var url = baseuri+"jsondata/getPoBal/"+ponum;
		
		$.get(url, function(o){ 
			debugger;
					$('#xsup').val(o[0].xsup);
					$('#xorg').val(o[0].xorg);
					$('#xpobal').val(o[0].xpobal);
			}, 'json');
	});
});;;