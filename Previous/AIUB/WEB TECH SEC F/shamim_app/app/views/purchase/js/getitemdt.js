$(function(){
	var dcls = "2";		
	$('#xitemcode').blur(function(){
		var itemcode = $(this).val();
		var url = baseuri+"itempicklist/getItemNamePrice/"+itemcode;
		//$('#xitemdesc').val(url);
		
		$.get(url, function(o){ 
					$('#xdesc').val(o[0].xdesc);
					$('#xrate').val(parseFloat(o[0].xstdprice).toFixed(dcls));
					$('#xratepur').val(parseFloat(o[0].xstdcost).toFixed(dcls));
			}, 'json');
	});
	$('#xstdcostper').change(function(){
		debugger;
		var valper = $(this).val();
		var mrp = $('#xmrp').val();
		var dis = (mrp*valper)/100;
		var cost = mrp - dis;
		$('#xstdcost').val(cost);
	});
	$('#xstdpriceper').change(function(){
		debugger;
		var valper = $(this).val();
		var mrp = $('#xmrp').val();
		var dis = (mrp*valper)/100;
		var cost = mrp - dis;
		$('#xstdprice').val(cost);
	});
	$('#xmrp').change(function(){
		debugger;
		var costper = $('#xstdcostper').val();
		var priceper = $('#xstdpriceper').val();
		var mrp =  $(this).val();

		var costdis = (mrp*costper)/100;
		var pricedis = (mrp*priceper)/100;

		var costtotal = mrp - costdis;
		var pricetotal = mrp - pricedis;
		
		$('#xstdcost').val(costtotal);
		$('#xstdprice').val(pricetotal);
	});
});

function showitem(post)	{
	var xpost=post;		
		$.get(xpost, function(o){
			debugger;
					$('#xitemcode').val(o[0].xitemcode);
					$('#xdesc').val(o[0].xitemdesc);
					$('select[name ="xpur"]').find(":selected").text(o[0].xpur);
					$('select[name ="xpur"]').find(":selected").val(o[0].xpur);
					$('#xqty').val(o[0].xqty);
					$('#xratepur').val(o[0].xrate);
					$('#xrow').val(o[0].xrow);
			}, 'json');
			
	
};;