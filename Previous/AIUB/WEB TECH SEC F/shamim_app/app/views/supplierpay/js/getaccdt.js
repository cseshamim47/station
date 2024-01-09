$(function(){

	$('#row5').hide();
	var txnnum = $('#xtxnnum').val();
	if(txnnum){
		var url = baseuri+"supplierpay/getSupPay/"+txnnum;
		$.get(url, function(o){
			if(o[0].xstatus == "Canceled"){
				$('#row5').show();
			}else{
				$('#row5').hide();
			}
		}, 'json');
	}

	$('#xsup').blur(function(){
		var sup = $(this).val();
		var url = baseuri+"suppliers/getsupplier/"+sup;
		//$('#xitemdesc').val(url);
		
		$.get(url, function(o){ 
					$('#xorg').val(o[0].xorg);
			}, 'json');
	});

	$('#xgrnnum').blur(function(){
		var grnnum = $(this).val();
		var url = baseuri+"jsondata/getGrnBal/"+grnnum;
		
		$.get(url, function(o){ 
					$('#xsup').val(o[0].xsup);
					$('#xorg').val(o[0].xorg);
					$('#xpobal').val(o[0].xgrnbal);
					$('#xprepay').val(o[0].xprepay);
			}, 'json');
	});
});