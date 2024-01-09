$(function(){		
	$('#xquotnum').blur(function(){
		var oppersl = $(this).val();
		var url = baseuri+"progress/getDetails/"+oppersl;
		//console.log(url);
		$.get(url, function(o){
					$('#xlead').val(o[0].xcus);
			}, 'json');
							
	});
});;;