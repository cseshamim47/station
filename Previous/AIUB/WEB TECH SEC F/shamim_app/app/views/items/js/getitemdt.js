$(function(){
	var dcls = "2";		
	$('#xitemcode').blur(function(){
		debugger;
		var itemcode = $(this).val();
		var url = baseuri+"itempicklist/getItemNamePrice/"+itemcode;
		//$('#xitemdesc').val(url);
		
		$.get(url, function(o){ 
					$('#xdesc').val(o[0].xdesc);
					$('#xrate').val(parseFloat(o[0].xstdprice).toFixed(dcls));
					$('#xratepur').val(parseFloat(o[0].xpricepur).toFixed(dcls));
			}, 'json');
	});
	// $('#xstdcostper').change(function(){
	// 	debugger;
	// 	var valper = $(this).val();
	// 	var mrp = $('#xmrp').val();
	// 	var dis = (mrp*valper)/100;
	// 	var cost = mrp - dis;
	// 	$('#xstdcost').val(cost);
	// });
	// $('#xstdpriceper').change(function(){
	// 	debugger;
	// 	var valper = $(this).val();
	// 	var mrp = $('#xmrp').val();
	// 	var dis = (mrp*valper)/100;
	// 	var cost = mrp - dis;
	// 	$('#xstdprice').val(cost);
	// });
	// $('#xmrp').change(function(){
	// 	debugger;
	// 	var costper = $('#xstdcostper').val();
	// 	var priceper = $('#xstdpriceper').val();
	// 	var mrp =  $(this).val();

	// 	var costdis = (mrp*costper)/100;
	// 	var pricedis = (mrp*priceper)/100;

	// 	var costtotal = mrp - costdis;
	// 	var pricetotal = mrp - pricedis;
		
	// 	$('#xstdcost').val(costtotal);
	// 	$('#xstdprice').val(pricetotal);
	// });
	// $('#disabled').click(function(){
	// 	debugger;
	// 	var tess = $('#helpframe').contents().find('#xlongdesc').val();
	// 	//var itemll = $('#xlongdesc').val();
	// })
});;;