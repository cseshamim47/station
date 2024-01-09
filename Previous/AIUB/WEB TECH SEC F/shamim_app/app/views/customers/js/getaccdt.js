$(function(){
	var dcls = "2";		
	$('#xplatcode').blur(function(){
		var platcode = $(this).val();
		var url = baseuri+"jsondata/getPlatDetails/"+platcode;
		
		$.get(url, function(o){ 
					$('#xdesc').val(o[0].xdesc);
					$('#xlevel').val(o[0].xlevel);
					$('#xplattype').val(o[0].xtype);
					$('#xsqurefit').val(o[0].xsqurefit);
					$('#xrate').val(o[0].xmrp);
					//$('#xrate').val(parseFloat(o[0].xstdcost).toFixed(dcls));
			}, 'json');
							
	});
});;;