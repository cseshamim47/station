$(function(){

	$('#row6').hide();
	var txnnum = $('#xtxnnum').val();
	if(txnnum){
		var url = baseuri+"wopay/getSupPay/"+txnnum;
		$.get(url, function(o){
			if(o[0].xstatus == "Canceled"){
				$('#row6').show();
			}else{
				$('#row6').hide();
			}
		}, 'json');
	}

	$('#xsup').blur(function(){
		var sup = $(this).val();
		var url = baseuri+"suppliers/getsupplier/"+sup;
		
		$.get(url, function(o){ 
					$('#xorg').val(o[0].xorg);
			}, 'json');
	});

	$('#wonum').blur(function(){
		var wonum = $(this).val();
		var url = baseuri+"jsondata/getWoBal/"+wonum;
		
		$.get(url, function(o){
				$('#toname').val(o[0].toname);
				$('#toorg').val(o[0].toorg);
				$('#xwobal').val(o[0].xwobal);
				$('#xproject').val(o[0].xproject);
				$('#xprepay').val(o[0].xprepay);
			}, 'json');
	});
});;;