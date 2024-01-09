$(function(){

	$('#xcus').blur(function(){
		var cus = $(this).val();
		var url = baseuri+"jsondata/getcustomer/"+cus;
				
		$.get(url, function(o){ 
					$('#xorg').val(o[0].xorg);
					$('#xadd1').val(o[0].xadd1);
					
			}, 'json');
		});
	//  $('#row4').hide();
	// if($('#xtype').val()=="Multiple Month"){
	// 	$('#row4').show();
	// }else if($('#xtype').val()!="Multiple Month"){
	// 	$('#row4').hide();
	// }
	// var xtype = "";		
	// $('#xtype').blur(function(){ 	
	
	// 	xtype = $(this).val();
	// 	var url = xtype;
	// 	//$('#xitemdesc').val(url);
		
	// 	$.get(url, function(o){ 
	// 				if(o.xtype=="Multiple Month"){
	// 					$('#row4').show();					
	// 				}
					
	// 		}, 'json');
	// });
});;;