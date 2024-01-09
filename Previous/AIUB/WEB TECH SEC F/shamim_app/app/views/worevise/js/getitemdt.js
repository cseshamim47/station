$(function(){
    
    $('#xamount').change(function(){
		getTotalSalesAmount();
	});
	
	var dcls = "2";		
	$('#wonum').blur(function(){
		var wonum = $(this).val();
		var url = baseuri+"jsondata/getWoDtForWor/"+wonum;
		
		$.get(url, function(o){ 
					$('#xref').val(o[0].xref);
					$('#toname').val(o[0].toname);
					$('#toorg').val(o[0].toorg);
					$('#tomobile').val(o[0].tomobile);
					$('#xprevamount').val(o[0].xprevamount);
					$('#xsubject').val(o[0].xsubject);
					$('#xproject').val(o[0].xproject);
					$('#toadd').val(o[0].toadd);
					var total = parseFloat(o[0].xprevamount) + parseFloat($('#xamount').val());
					$('#xtotamount').val(total);
					
			}, 'json');
							
	});
});

function getTotalSalesAmount(){
	var prevamount = 0;
	var amount = 0;
	var totalamt = 0;
	if($('#xprevamount').val() != ""){
		prevamount = parseFloat($('#xprevamount').val());
	}
	if($('#xamount').val() != ""){
		amount = parseFloat($('#xamount').val());
	}
	totalamt = prevamount + amount;

	$('#xtotamount').val(totalamt);
};;