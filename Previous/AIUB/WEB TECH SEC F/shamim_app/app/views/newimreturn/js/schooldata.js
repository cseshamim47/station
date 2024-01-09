$(function(){

	$('.datepicker').datepicker({
		format: "dd-mm-yyyy",
		autoclose: true,
		todayHighlight: true
	});
	$('.dtbl').DataTable();

$.ajaxSetup({cache:false});

	loadBookTable();




	$('#refreshbtn').click(function() {
		loadSOTable();
	});

	$('.testbtn').click(function(){
		debugger;
		var num = this.id;
		showInvoice(num);
		$("#tab-one").addClass('active');
		$("#tab-two").removeClass('active');
		$("#tab-three").removeClass('active');
	});

	$('#btnSubmit').click(function(){
		debugger;
		var xwh = $('.whcls').val();
		var xcus = $('#xcus').val();
		if(xwh != null && xwh != "" && xcus != null && xcus != ""){
			return confirm('Are you sure?');
		}
		else if(xwh == null || xwh == ""){
			alert("Please Select Warehouse");
			return false;
		}
		else if(xcus == null || xcus == ""){
			alert("Please Select Customer");
			return false;
		}
	})

	$('#xcus').blur(function(){
		debugger;
		var cus = $(this).val();
		var url = baseuri+"jsondata/getcustomer/"+cus;
		$.get(url, function(o){ 
					$('#xorg').val(o[0].xorg);
			}, 'json');


		var xcurl = baseuri+"jsondata/getcustomerbal/"+cus;
			
		$.get(xcurl, function(o){ 
					$('#xcusbal').val(o[0].xbal);
					
			}, 'json');	
		
	});
	$('#btnshow').click(function(){
		var sonum = $('#xsonum').val();
		
		showInvoice(sonum);
		
	});

	$('#xpackcharge').change(function(){
		getTotalSalesAmount();
	});
	$('#xtranscost').change(function(){
		getTotalSalesAmount();
	});
	$('#xgrossdisc').change(function(){
		getTotalSalesAmount();
	});
});

function loadSOTable(status){
	var url = baseuri+"jsondata/getSalesListFree/"+status;
		$.get(url, function(q){
			debugger;
	var div = '<table id="dtbl3" class="table table-bordered table-striped">'+
		'<thead>'+
		'<tr>'+
		'<th>Date</th>'+
		'<th>Invoice Number</th>'+
		'<th>Customer ID</th>'+
		'<th>Name</th>'+
		'<th>Show</th>'+
		'</tr>'+
		'</thead>'+
		'<tbody>';

		for(var i=0;i<q.length;i++){	
			div += '<tr role="row" class="odd">'+
			'<td class="sorting_1" style="padding: 12px;">'+q[i].xdate+'</td>'+
			'<td style="padding: 12px;">'+q[i].xsonum+'</td>'+
			'<td style="padding: 12px;">'+q[i].xcus+'</td>'+
			'<td style="padding: 12px;">'+q[i].xorg+'</td>'+
			'<td><input type="button" href="#tab_1" data-toggle="tab" id="'+q[i].xsonum+'" value="Show" class="btn btn-info" onclick="clickfunction(\''+q[i].xsonum+'\');" aria-expanded="true">'+
			'</td>'+
			'</tr>';
		}

		div += '</tbody></table>';
		$('#loadtweets').empty();
		$('#loadtweets').append(div);
		$('#dtbl3').DataTable();
	}, 'json');
}
function loadSOTable2(status){
	var url = baseuri+"jsondata/getSalesListFree/"+status;
		$.get(url, function(q){
			debugger;
	var div = '<table id="dtbl5" class="table table-bordered table-striped">'+
		'<thead>'+
		'<tr>'+
		'<th>Date</th>'+
		'<th>Invoice Number</th>'+
		'<th>Customer ID</th>'+
		'<th>Name</th>'+
		'<th>Show</th>'+
		'</tr>'+
		'</thead>'+
		'<tbody>';

		for(var i=0;i<q.length;i++){	
			div += '<tr role="row" class="odd">'+
			'<td class="sorting_1" style="padding: 12px;">'+q[i].xdate+'</td>'+
			'<td style="padding: 12px;">'+q[i].xsonum+'</td>'+
			'<td style="padding: 12px;">'+q[i].xcus+'</td>'+
			'<td style="padding: 12px;">'+q[i].xorg+'</td>'+
			'<td><input type="button" href="#tab_1" data-toggle="tab" id="'+q[i].xsonum+'" value="Show" class="btn btn-info" onclick="clickfunction(\''+q[i].xsonum+'\');" aria-expanded="true">'+
			'</td>'+
			'</tr>';
		}

		div += '</tbody></table>';
		$('#loadconfirmed').empty();
		$('#loadconfirmed').append(div);
		$('#dtbl5').DataTable();
	}, 'json');
}
function clickfunction(id){
	debugger;
	showInvoice(id);
	$("#tab-one").addClass('active');
	$("#tab-two").removeClass('active');
	$("#tab-three").removeClass('active');
}
function showInvoice(son){
	debugger;
	var sonum = son;
	var url = baseuri+"jsondata/getSoDtFree/"+sonum;
		$.get(url, function(q){
			debugger; 
			if(q.length < 1){
				alert("Invoice is not found!");
				$('#xdate').val("");
				$('#xcus').val("");
				$('#xorg').val("");
				$('#codeselect').append($('<option>', {
					value: "",
					text: ""
				}));
				$('#codeselect').val("");
				$('#xquotnum').val("");
				$('#xgrossdisc').val("");
				$('#xtotalprice').val("");
				$('#xnotes').val("");
				return;
			}
			if(q[0].xstatus == 'Created'){
				$("#confirmbtn").empty();
				$('<a href="javascript:void(0)" id="btnconf" onclick="btnconfclick();" class="btn btn-danger"><span class="glyphicon glyphicon-save"></span>&nbsp;Confirm</a>').appendTo("#confirmbtn");
				$("#printlink").empty();
				$('<a class="print-link no-print" style="text-align: center; color: red;" onclick="printdoc(\'#ele1\')">Print Invoice - '+sonum+'</a>').appendTo("#printlink");
			}else if(q[0].xstatus == 'Confirmed'){
				$("#confirmbtn").empty();
				$('<a href="javascript:void(0)" id="btncancel" onclick="btncancelclick();" class="btn btn-danger"><span class="glyphicon glyphicon-save"></span>&nbsp;Cencel Sales</a>').appendTo("#confirmbtn");
				$("#printlink").empty();
				$('<a class="print-link no-print" style="text-align: center; color: red;" onclick="printdoc(\'#ele1\')">Print Invoice - '+sonum+'</a>').appendTo("#printlink");
			}
			$('#xsonum').val(q[0].xsonum);
			$('#xdate').val(q[0].xdate);
			$('#xcus').val(q[0].xcus);
			$('#xorg').val(q[0].xorg);
			$('#codeselect').append($('<option>', {
                value: q[0].xwh,
                text: q[0].xwh
			}));
			$('#codeselect').val(q[0].xwh);
			$('#xquotnum').val(q[0].xquotnum);
			$('#xgrossdisc').val(q[0].xgrossdisc);
			$('#xtotalprice').val(q[0].xtotalprice);
			$('#xpackcharge').val(q[0].xpackcharge);
			$('#xtranscost').val(q[0].xtranscost);
			$('#xsubtotal').val(parseFloat(q[0].xtotalprice)+parseFloat(q[0].xpackcharge)+parseFloat(q[0].xtranscost));
			$('#xnetbill').val(parseFloat(q[0].xtotalprice)+parseFloat(q[0].xpackcharge)+parseFloat(q[0].xtranscost)-parseFloat(q[0].xgrossdisc));
			$('#xnotes').val(q[0].xnotes);
			$('#xrcvamt').val(q[0].xrcvamt);
			$('#xcusbal').val(q[0].xcusbal);

			
		}, 'json');
		var utl = baseuri+"jsondata/getSoItemFree/"+sonum;
		$.get(utl, function(q){ 
			var tqty = 0;
			var ttotal = 0;
			debugger;
			if(q.length > 0)
				$('#ItemTable').appendGrid('load', q);
			else
				$('#ItemTable').appendGrid('load', [{ 'xitemcode': '', 'xdesc': '', 'xcur': '', 'xmrp': '', 'xcurconversion': '', 'xdis': '0', 'xqty': '' , 'xtotal': ''}]);

			for(var i=0; i<q.length; i++){
				tqty+=parseFloat(q[i].xqty);
				ttotal+=parseFloat(q[i].xtotal);
			}
			$('#subqty').text(tqty);
			$('#subtotal').text(ttotal);

		}, 'json');
}

function getNetTotal(lid){
	var rate = $('#ItemTable_xmrp_'+lid).val();
	var convert = $('#ItemTable_xcurconversion_'+lid).val();
	var qty =  $('#ItemTable_xqty_'+lid).val();
	var xdis =  $('#ItemTable_xdis_'+lid).val();

	var stotal = (rate*convert);
	var stotaldis = (stotal*xdis)/100;
	var nprice = stotal - stotaldis;
	$('#ItemTable_xnet_'+lid).val(nprice);
	$('#ItemTable_xnetdis_'+lid).val(stotaldis);

	var total = ((rate*convert)*qty);
	var totaldis = (((rate*convert)*qty)*xdis)/100;
	var nettotal = total - totaldis;
	$('#ItemTable_xtotal_'+lid).val(nettotal);
	$('#ItemTable_xdistotal_'+lid).val(totaldis);
};
function getTotalSalesAmount(){
	var netotal = 0;
	var othercost = 0;
	var less = 0;
	if($('#xpackcharge').val() != ""){
		othercost += parseFloat($('#xpackcharge').val());
	}
	if($('#xtranscost').val() != ""){
		othercost += parseFloat($('#xtranscost').val());
	}
	if($('#xgrossdisc').val() != ""){
		less += parseFloat($('#xgrossdisc').val());
	}
	$(".totaltxt").each(function() {
		if($(this).val() != ""){
			netotal += parseFloat($(this).val());
		}
	});
	$('#xtotalprice').val(netotal);
	$('#xsubtotal').val(netotal+othercost);
	$('#xnetbill').val(netotal+othercost-less);

	//Book Table total qty and total amount calculate and show on footer
	var qty = 0;
	var total = 0;
	$(".bkqty").each(function() {
		if($(this).val() != ""){
			qty += parseFloat($(this).val());
		}
	});
	$(".bktotal").each(function() {
		if($(this).val() != ""){
			total += parseFloat($(this).val());
		}
	});
	$('#subqty').text(qty);
	$('#subtotal').text(total);

	//Stationary Table total qty and total amount calculate and show on footer
	var qtysta = 0;
	var totalsta = 0;
	$(".staqty").each(function() {
		if($(this).val() != ""){
			qtysta += parseFloat($(this).val());
		}
	});
	$(".statotal").each(function() {
		if($(this).val() != ""){
			totalsta += parseFloat($(this).val());
		}
	});
	$('#subqtysta').text(qtysta);
	$('#subtotalsta').text(totalsta);
}

function deleteRow(tblname,lid){
	debugger;
	var sonum = $('#xsonum').val();
	var rownum = $('#'+tblname+'_xrow_'+lid).val();

	if(rownum != ""){
		var utl2 = baseuri+"issuefree/deleteRow/"+sonum+"/"+rownum;
		$.get(utl2, function(q){
			debugger;
			alert(q);
			// if(q == 'Success')
			// 	alert(q);	
			// else
			// 	alert(q);	
		}, 'json');
	}
}

function btnconfclick(){
	debugger;
	if(confirm("Are you sure you want to Confirm this Invoice?")){
        var sonum = $('#xsonum').val();
		var cus = $('#xcus').val();
		var org = $('#xorg').val();
		var disc = $('#xgrossdisc').val();
		var utl2 = baseuri+"issuefree/confirmpost/"+sonum+"/"+disc+"/"+cus;
		$.get(utl2, function(q){ 
			if(q="Success"){
				$("#confirmbtn").empty();
				$('<a href="javascript:void(0)" id="btncancel" onclick="btncancelclick();" class="btn btn-danger"><span class="glyphicon glyphicon-save"></span>&nbsp;Cencel Sales</a>').appendTo("#confirmbtn");
				$("#printlink").empty();
				$('<a class="print-link no-print" style="text-align: center; color: red;" onclick="printdoc(\'#ele1\')">Print Invoice - '+sonum+'</a>').appendTo("#printlink");
				alert("This Invoice is Confirmed.");
			}			
		}, 'json');
    }
    else{
        return false;
    }
	
}

function btncancelclick(){
	debugger;
	if(confirm("Are you sure you want to Cancel this Invoice?")){
		var sonum = $('#xsonum').val();
		var cus = $('#xcus').val();
		var org = $('#xorg').val();
		var disc = $('#xgrossdisc').val();
		var utl2 = baseuri+"issuefree/cancelpost/"+sonum+"/"+disc+"/"+cus;
		$.get(utl2, function(q){ 
			if(q="Success"){
				$("#confirmbtn").empty();
				alert('Invoice Canceled Successfull');
			}			
		}, 'json');
	}else{
		return false;
	}
}

function getItemdt(lid,prefix=''){
	debugger;
	var val = $('#ItemTable_xdesc_'+lid).val();
	var exch = 0;
	var disc = 0;

	var res = val.split("*");
	if(res.length>1){
		var url = baseuri+"jsondata/getItem/"+res[1];
		$.get(url, function(o){ 
			debugger;
			$('#ItemTable_xitemcode_'+lid).val(o[0].xitemcode);
			$('#ItemTable_xlongdesc_'+lid).val(o[0].xlongdesc);
			$('#ItemTable_xdesc_'+lid).val(o[0].xdesc);
			$('#ItemTable_xcur_'+lid).val(o[0].xcur);
			$('#ItemTable_xmrp_'+lid).val(o[0].xmrp);
			if(o[0].xcur == "BDT"){
				disc = parseFloat($('#xdiscfor').val());
				exch = parseFloat(o[0].xcurconversion);
				$('#ItemTable_xcurconversion_'+lid).val(o[0].xcurconversion);
				$('#ItemTable_xdis_'+lid).val($('#xdiscfor').val());
			}else if(o[0].xcur == "RS"){
				exch = parseFloat($('#xconvertfor').val());
				$('#ItemTable_xcurconversion_'+lid).val($('#xconvertfor').val());
				$('#ItemTable_xdis_'+lid).val('0');
			}else{
				exch = parseFloat(o[0].xcurconversion);
				$('#ItemTable_xcurconversion_'+lid).val(o[0].xcurconversion);
				$('#ItemTable_xdis_'+lid).val('0');
			}

			var total = (parseFloat(o[0].xmrp*exch));
			var totaldis = (total*disc)/100;
			var nprice = total - totaldis;
			$('#ItemTable_xnet_'+lid).val(nprice);
			$('#ItemTable_xnetdis_'+lid).val(totaldis);

			getNetTotal(lid);
			getTotalSalesAmount();

			}, 'json');
	}
}

function loadBookTable(){
	$('#ItemTable').appendGrid({
        caption: 'Add Item for Issue',
        initRows: 10,
        columns: [
            { name: 'xitemcode', ctrlClass: '', display: 'Item Code', type: 'text', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '140px'},
			onChange: function (evt, rowIndex) {
				
			} },
            { name: 'xdesc', ctrlClass: 'example-mail', display: 'Description(English)', type: 'text', ctrlAttr: { maxlength: 230 }, ctrlCss: { width: '370px'}, ctrlProp: {  },
			onClick: function (evt, rowIndex) {

			},
			onChange: function (evt, rowIndex) {
				var sd = (event.target.id).replace(/[^0-9]/gi, '');
				var lid = parseInt(sd, 10);
				
				getItemdt(lid);
				
			}  },
            { name: 'xlongdesc', display: 'Description(Bangla)', type: 'text', ctrlAttr: { maxlength: 250 }, ctrlCss: { width: '320px'}, ctrlProp: {  },
			onClick: function (evt, rowIndex) {
				var sd = (event.target.id).replace(/[^0-9]/gi, '');
				var lid = parseInt(sd, 10);
				getItemdt(lid);

			}  },
			{ name: 'xcur', display: 'Curr.', ctrlClass: 'text-center', type: 'hidden', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '40px'} },
            { name: 'xmrp', display: 'Price', type: 'number', ctrlClass: 'xpricecls text-center', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '70px'},
			onChange: function (evt, rowIndex) {
				var sd = (event.target.id).replace(/[^0-9]/gi, '');
				var lid = parseInt(sd, 10);
				getNetTotal(lid);
				getTotalSalesAmount();
			} },
			{ name: 'xcurconversion', display: 'Convt.', type: 'hidden', ctrlClass: 'text-center', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '50px' },
			onChange: function (evt, rowIndex) {
				var sd = (event.target.id).replace(/[^0-9]/gi, '');
				var lid = parseInt(sd, 10);
				getNetTotal(lid);
				getTotalSalesAmount();
			} },
			{ name: 'xdis', display: 'Dis.', value:0, type: 'hidden', ctrlClass: 'text-center', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '40px'},
			onChange: function (evt, rowIndex) {
				var sd = (event.target.id).replace(/[^0-9]/gi, '');
				var lid = parseInt(sd, 10);
				getNetTotal(lid);
				getTotalSalesAmount();
			} },
			{ name: 'xnetdis', display: 'N.Dis.', value:0, type: 'hidden', ctrlClass: 'text-center', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '50px'}, ctrlProp: { readonly: 'readonly' } },
			{ name: 'xnet', display: 'N.Price', ctrlClass: 'text-center', type: 'hidden', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '60px'}, ctrlProp: { readonly: 'readonly' } },
            { name: 'xqty', display: 'Qty', ctrlClass: 'text-center bkqty', type: 'number', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '85px'},
			onChange: function (evt, rowIndex) {
				var sd = (event.target.id).replace(/[^0-9]/gi, '');
				var lid = parseInt(sd, 10);
				getItemdt(lid);
				getNetTotal(lid);
				getTotalSalesAmount();
				//getTotalQty();
			} },
			{ name: 'xtotal', display: 'Total', type: 'hidden', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '95px'}, ctrlClass : 'totaltxt text-center bktotal', ctrlProp: { readonly: 'readonly' } },
			{ name: 'xdistotal', display: 'xdistotal', type: 'hidden', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '110px'} },
			{ name: 'xrow', display: 'xrow', type: 'hidden', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '110px'} }
        ],
        buttonClasses: {
            remove: 'remove-button'
        },
        idPrefix: 'ItemTable',
        hideButtons: {
            removeLast: true,
			insert: true,
			moveUp: true,
			moveDown: true,
			//remove: true
        },
        afterRowAppended: function (caller, parentRowIndex, addedRowIndex) {
            // Copy data of `Year` from parent row to new added rows
			var options = {
				url: "jsondata/getItemData",
			
				getValue: "xitemcode",
			
				template: {
					type: "description",
					fields: {
						description: "xdesc"
					}
				},
			
				list: {
					match: {
						enabled: true,
						method: function(element, phrase) {
							debugger;
							var ele = element.split(" ");
							//var phr = phrase.split("");
				
							var arr = '';
							
							$.each(ele, function(key, value){
								arr += value.slice(0,1);
							});
								
				
							if(phrase.length < 0) return false;
							if(phrase.length == 0){
							  return element.split(" ")[0] === phrase;
							}
							if (arr.startsWith(phrase)){
							  return true;
							}
							// else if(element.search(phrase) > -1){
							// 	return true;
							// }
							 else {
							  return false;
							}
						  }
					}
				},
			
				requestDelay: 500
			};
			
			$(".example-mail").easyAutocomplete(options);
			$('.remove-button').click(function(){
				getTotalSalesAmount();
			});
        }
    });
};


function printdoc(id){

	var sonum = $('#xsonum').val();
	
	var utl = baseuri+"jsondata/getSalesItemsFree/"+sonum;
	$.get(utl, function(q){
		debugger;

		var total = 0;
		var bktotal = 0;
		var bkprice = 0;
		var bkqty = 0;
		var bktval = 0;
		var bkdis = 0;
		
		var sttotal = 0;
		var stprice = 0;
		var stqty = 0;
		var sttval = 0;
		var stdis = 0;
		var div = ''; 

		var currentTime = new Date(q[0].xdate);
		var month = ("0" + (currentTime.getMonth() + 1)).slice(-2);
		var day = ("0" + currentTime.getDate()).slice(-2);
		var year = currentTime.getFullYear();
		var sdt = day + '/' + month + '/' + year;

		
		div += '<div class="main-div" style="margin-top:100px;"><div style="text-align:center"><strong align="center" style="border-bottom:1px solid;">Specimen Invoice</strong></div><table class="table table-bordered" cellspacing="0" width="100%" role="grid" aria-describedby="dtbl_info" style="width: 100%; font-size:11px; margin-top:10px;"><tbody>';
		div += '<tr><td style="background-color:#d8d8d8!important;">Invoice No.</td><td>'+sonum+'</td><td style="background-color:#d8d8d8!important;">Customer\'s ID.</td><td>'+q[0].xcus+'</td><td style="background-color:#d8d8d8!important;">Invoice Date</td><td>'+sdt+'</td></tr>';
		div += '<tr><td style="background-color:#d8d8d8!important;">Customer\'s Name</td><td colspan="5">'+q[0].xorg+'</td></tr>';
		div += '<tr><td style="background-color:#d8d8d8!important;">Phone</td><td colspan="2">'+q[0].xphone+'</td><td style="background-color:#d8d8d8!important;">Mobile</td><td colspan="2">'+q[0].xmobile+'</td></tr>';
		div += '<tr><td style="background-color:#d8d8d8!important;">Address</td><td colspan="5">'+q[0].xadd1+'</td></tr>';
		div += '<tr><td style="background-color:#d8d8d8!important;">Divition</td><td colspan="2">'+q[0].xcity+'</td><td style="background-color:#d8d8d8!important;">District</td><td colspan="2">'+q[0].xprovince+'</td></tr>';
		div += '</tbody></table>';

		var bookcount = 0;
		for(var i=0;i<q.length;i++){
				bookcount++;
		}
		if(bookcount > 0){
			div += '<table class="table table-bordered" cellspacing="0" width="100%" role="grid" aria-describedby="dtbl_info" style="width: 100%; font-size:11px;">'+
			'<thead><tr role="row"><th style="width:100px;background-color: #95B72B!important;">Item Code</th><th style="width:300px;background-color: #95B72B!important;" >Item Name</th><th style="background-color: #95B72B!important;">Qty</th><th style="background-color: #95B72B!important;">Price</th><th style="background-color: #95B72B!important;">Total</th></tr></thead><tbody>';
			for(var i=0;i<q.length;i++){
				if(1==1){
					div+='<tr role="row" class="odd"><tr>';
					div+='<td align="left">'+q[i].xitemcode+'</td>';
					if(q[i].xlongdesc=='' || q[i].xlongdesc==null)
						div+='<td align="left">'+q[i].xdesc+'</td>';
					else
						div+='<td align="left">'+q[i].xlongdesc+'</td>';
					div+='<td align="center" style="width:80px">'+q[i].xqty+'</td>';
					div+='<td align="center">'+q[i].xrate+'</td>';
					div+='<td align="center">'+(parseFloat(q[i].xqty)*parseFloat(q[i].xrate))+'</td>';
					div+='</tr>';
					bktotal += (parseFloat(q[i].xqty)*parseFloat(q[i].xrate));
					bkqty += parseFloat(q[i].xqty);
				}
			}
			div+='<tr><td colspan="3" align="right">Sub Total : </td><td align="center">'+bkqty+'</td><td align="center">'+bktotal+'</td></tr></tbody></table>';
		}
		total = bktotal+sttotal;



		div += '<div class="signature" style="overflow: hidden;width: 100%;"><div style = "width:20%;float:left;text-align:center;margin-top:60px;overflow:hidden;"><p style="border-top: 1px solid;">Customer Signature</p></div><div style = "width:60%;float:left;text-align:center;margin-top:60px;">Prepared by : '+suser+'</div><div style = "width:20%;float:left;text-align:center;border-top: 1px solid;margin-top:60px;">Sales Manager</div></div>';


	'</div></div>';

		$(id).empty();
		$(id).append(div);
		$(id).show();
		jQuery(id).print({
			//Use Global styles
			globalStyles : false,
			//Add link with attrbute media=print
			//mediaPrint : false,
			//Custom stylesheet
			stylesheet : baseuri+"views/schoolsales/js/invoice.css",
			//Print in a hidden iframe
			//iframe : false,
			//Don't print this
			//noPrintSelector : ".avoid-this",
			//Add this at top
			//prepend : "Hello World!!!<br/>",
			//Add this on bottom
			//append : div,
			//Log to console when printing is done via a deffered callback
			deferred: $.Deferred().done(function() { console.log('Printing done', arguments); })
		});
		$(id).empty();
		$(id).hide();
	}, 'json');
};

function getText(amount){
	debugger;
	//var amount = $('#fnum').val();
	var atemp = amount.split(".");
	var str1 = '';
	var str2 = '';
	if(atemp.length>0){
		str1 = convertNumberToWords(atemp[0]);
		if(atemp.length>1)
			str2 = convertNumberToWords(atemp[1]);
	}
	if(str1 == '')
		str1 = 'Zero ';
	if(str2 != '')
		str2 = " and " + str2 + "Paisa";
	
    return str1 + "Taka"+ str2;
};

function convertNumberToWords(amount) {
    var words = new Array();
    words[0] = '';
    words[1] = 'One';
    words[2] = 'Two';
    words[3] = 'Three';
    words[4] = 'Four';
    words[5] = 'Five';
    words[6] = 'Six';
    words[7] = 'Seven';
    words[8] = 'Eight';
    words[9] = 'Nine';
    words[10] = 'Ten';
    words[11] = 'Eleven';
    words[12] = 'Twelve';
    words[13] = 'Thirteen';
    words[14] = 'Fourteen';
    words[15] = 'Fifteen';
    words[16] = 'Sixteen';
    words[17] = 'Seventeen';
    words[18] = 'Eighteen';
    words[19] = 'Nineteen';
    words[20] = 'Twenty';
    words[30] = 'Thirty';
    words[40] = 'Forty';
    words[50] = 'Fifty';
    words[60] = 'Sixty';
    words[70] = 'Seventy';
    words[80] = 'Eighty';
    words[90] = 'Ninety';
    amount = amount.toString();
    var atemp = amount.split(".");
    var number = atemp[0].split(",").join("");
    var n_length = number.length;
    var words_string = "";
    if (n_length <= 9) {
        var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        var received_n_array = new Array();
        for (var i = 0; i < n_length; i++) {
            received_n_array[i] = number.substr(i, 1);
        }
        for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
            n_array[i] = received_n_array[j];
        }
        for (var i = 0, j = 1; i < 9; i++, j++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                if (n_array[i] == 1) {
                    n_array[j] = 10 + parseInt(n_array[j]);
                    n_array[i] = 0;
                }
            }
        }
        value = "";
        for (var i = 0; i < 9; i++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                value = n_array[i] * 10;
            } else {
                value = n_array[i];
            }
            if (value != 0) {
                words_string += words[value] + " ";
            }
            if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Crores ";
            }
            if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Lakhs ";
            }
            if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Thousand ";
            }
            if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                words_string += "Hundred ";
            } else if (i == 6 && value != 0) {
                words_string += "Hundred ";
            }
        }
        words_string = words_string.split("  ").join(" ");
    }
    return words_string;
};;