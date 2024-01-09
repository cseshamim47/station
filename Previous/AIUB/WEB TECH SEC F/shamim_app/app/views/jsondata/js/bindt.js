$(function(){
	
	 
        $('#helpframe').on('load', function () {
            $('#loader1').hide();
        });
   
		
	$('#upbin').blur(function(){ 
		var upbin = $(this).val();
		var url = baseuri+"distjoin/bindt/"+upbin;
		//$('#xitemdesc').val(url);
		$('#loading').modal('show');
		$.get(url, function(o){ 
					$('#upname').val(o[0].xorg);
					$('#leftbin').val(o[0].leftbin);
					$('#rightbin').val(o[0].rightbin);
					
			}, 'json');
		$('#loading').modal('hide');	
	});
	
	$('#refbin').blur(function(){
		var refbin = $(this).val();
		var url = baseuri+"distjoin/bindt/"+refbin;
		//$('#xitemdesc').val(url);
		$('#loading').modal('show');
		$.get(url, function(o){ 
					$('#refname').val(o[0].xorg);
			}, 'json');
		$('#loading').modal('hide');	
	});
	
	$('#xrdin').blur(function(){
		var xrdin = $(this).val();
		var url = baseuri+"jsondata/inforindt/"+xrdin;
		$('#loading').modal('show');		
		$.get(url, function(o){ 
					$('#rinname').val(o[0].xorg);
					$('#xospbal').val(o[0].xospbal);
			}, 'json');
		$('#loading').modal('hide');
	});
});;;