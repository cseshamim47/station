$(function(){
	var dcls = "2";		
	$('#xsup').blur(function(){
		var sup = $(this).val();
		var url = baseuri+"suppliers/getsupplier/"+sup;
		//$('#xitemdesc').val(url);
		
		$.get(url, function(o){ 
					$('#xsupname').val(o[0].xorg);
			}, 'json');
	});
});;;