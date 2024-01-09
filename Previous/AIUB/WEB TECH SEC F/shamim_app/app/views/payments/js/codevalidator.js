$(function(){

})

// $('#paidbtn').click(function(){
// 	debugger;
// 	alert();
// 	return;
// });

function paidfunction(id){
	if($('#'+id).val() == ""){
		alert("Please enter Paid by!");
		e.preventDefault();
	}
}

$('#dynamicfrm').validate({
		errorPlacement: function (error, element) { 
		element.css('background', '#ffdddd'); 
		error.insertAfter(element); 
		} 
	});
;;