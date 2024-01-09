$(function(){		
	$('#xoppersl').blur(function(){
		var oppersl = $(this).val();
		var url = baseuri+"interaction/getDetails/"+oppersl;
		//console.log(url);
		$.get(url, function(o){
					$('#xlead').val(o[0].xlead);
			}, 'json');
							
	});
});;;