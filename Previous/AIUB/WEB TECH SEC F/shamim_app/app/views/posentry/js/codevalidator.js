$(function(){
	$('#dynamicfrm').validate({
			errorPlacement: function (error, element) { 
			element.css('background', '#ffdddd'); 
			error.insertAfter(element); 
			} 
		});
	$('#modalform').validate({});	

});
;;