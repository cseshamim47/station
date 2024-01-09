$(function(){

	var gloTextVal = "";
	$("input[type='text']").on('focus', function() {
		//debugger;
		var num = $(this).attr("number");
		if(num=="true"){ 
			gloTextVal = $(this).attr("value");
			if(parseFloat($(this).val())==0){
				//debugger;
				$(this).val("");
			}
		}
	}).on('blur', function() {
		//debugger;
		var num = $(this).attr("number");
		if(num=="true"){
			var val = $(this).val();
			if(val == null || val == ""){
				//debugger;
				$(this).val(gloTextVal);
			}			
		}
	});
})
$('#dynamicfrm').validate({
		errorPlacement: function (error, element) { 
		element.css('background', '#ffdddd'); 
		error.insertAfter(element); 
		} 
	});
	
;;