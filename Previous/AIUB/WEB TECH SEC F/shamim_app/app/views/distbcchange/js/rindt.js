$(function(){
	
	 
        $('#helpframe').on('load', function () {
            $('#loader1').hide();
        });
   
		
		
	$('#xrdin').blur(function(){
		var xrdin = $(this).val();
		var url = baseuri+"distjoin/inforindt/"+xrdin;
		$('#loading').modal('show');		
		$.get(url, function(o){ 
					$('#rinname').val(o[0].xorg);
			}, 'json');
		$('#loading').modal('hide');
	});
});;;