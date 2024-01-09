$(function(){
	var dcls = "2";		
	$('#xcus').blur(function(){
		var itemcode = $(this).val();
		var url = baseuri+"cussatisfaction/getCusDet/"+itemcode;
		//$('#xitemdesc').val(url);
		
		$.get(url, function(o){ 
					$('#xadd1').val(o[0].xadd1);
			}, 'json');
	});
});;;