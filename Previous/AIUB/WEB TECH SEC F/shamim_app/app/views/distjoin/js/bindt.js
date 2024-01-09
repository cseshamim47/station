$(function(){
	
	 
        $('#helpframe').on('load', function () {
            $('#loader1').hide();
        });
   
		
	$('#upbin').blur(function(){ 
	$('#loading').modal('show');
		var upbin = $(this).val();
		var url = baseuri+"distjoin/bindt/"+upbin;
		//$('#xitemdesc').val(url);
		
		$.get(url, function(o){ 
					$('#upname').val(o[0].xorg);
					$('#leftbin').val(o[0].leftbin);
					$('#rightbin').val(o[0].rightbin);
					
			}, 'json');
		$('#loading').modal('hide');	
	});
	
	$('#refbin').blur(function(){
		$('#loading').modal('show');
		var refbin = $(this).val();
		var url = baseuri+"distjoin/bindt/"+refbin;
		//$('#xitemdesc').val(url);
		
		$.get(url, function(o){ 
					$('#refname').val(o[0].xorg);
			}, 'json');
		$('#loading').modal('hide');	
	});
	
	
});;;