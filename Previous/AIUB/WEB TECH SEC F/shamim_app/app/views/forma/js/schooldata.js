$(function(){


	$('.datepicker').datepicker({
		format: "dd-mm-yyyy",
		autoclose: true,
		todayHighlight: true
	});
	$('.dtbl').DataTable();

	// var auto_refresh = setInterval(
	// 	function() {
	// 		$('#loadtweets').load(baseuri+'issuefreee/index').fadeIn("slow");
	// 	}, 10000); // refreshing after every 15000 milliseconds

$.ajaxSetup({cache:false});

	loadBookTable();
	//loadStaTable();
	//loadSOTable();




	$('#refreshbtn').click(function() {
		loadSOTable();
	});

	$('.testbtn').click(function(){
		debugger;
		//location.href='http://localhost:81/explore/issuefreee#tab_1';
		var num = this.id;
		showInvoice(num);

		// $("#tab-one").attr('', 'active');
		// $("#tab-two").attr('active', '');
		$("#tab-one").addClass('active');
		$("#tab-two").removeClass('active');
		$("#tab-three").removeClass('active');
		//$('#xsonum').val(num);
		//alert();
	});

	$('#btnSubmit').click(function(){
		debugger;
		var xwh = $('.whcls').val();
		var xpress = $('#xpress').val();
		if(xpress != null && xpress != ""){
			return confirm('Are you sure?');
		}
		// else if(xwh == null || xwh == ""){
		// 	alert("Please Select Warehouse");
		// 	return false;
		// }
		else if(xpress == null || xpress == ""){
			alert("Please Insert Press");
			return false;
		}
	})

	// $('#xcus').blur(function(){
	// 	debugger;
	// 	var cus = $(this).val();
	// 	var url = baseuri+"jsondata/getcustomer/"+cus;
	// 	$.get(url, function(o){ 
	// 				$('#xorg').val(o[0].xorg);
	// 		}, 'json');


	// 	var xcurl = baseuri+"jsondata/getcustomerbal/"+cus;
			
	// 	$.get(xcurl, function(o){ 
	// 				$('#xcusbal').val(o[0].xbal);
					
	// 		}, 'json');	
	
	// 		var bookc = false;
	// 		debugger;
	// 		if($('#xbook').prop("checked") == true){
	// 			bookc = true;
	// 		}

	// 		if(bookc == true){
	// 			debugger;
	// 			loadBookTable();
	// 			getClass(cus);

	// 		}else{
	// 			// $('#ItemTable').appendGrid('load', [{ 'xitemcode': '', 'xdesc': '', 'xcur': '', 'xmrp': '', 'xcurconversion': '', 'xdis': '', 'xqty': '' , 'xtotal': ''}]);
	// 		}
		
	// });
	// $('#xbook').click(function(){
	// 	if($(this).prop("checked") == true){
	// 		loadBookTable();
	// 		var cus = $('#xcus').val();
	// 		//getItemByCus(cus);
	// 		//alert(this.value);
	// 		getClass(cus);
	// 	}
	// 	else if($(this).prop("checked") == false){
	// 		$( "#appenddiv" ).empty();
	// 	}
	// });
	// $('#xsta').click(function(){
	// 	if($(this).prop("checked") == true){
	// 		loadStaTable();
	// 	}
	// 	else if($(this).prop("checked") == false){
	// 		$('#StaTable').appendGrid('load', [{ 'xitemcode': '', 'xdesc': '', 'xcur': '', 'xmrp': '', 'xcurconversion': '', 'xdis': '0', 'xqty': '' , 'xtotal': ''}]);
	// 	}
	// });
	$('#btnshow').click(function(){
		var sonum = $('#xsonum').val();
		
		showInvoice(sonum);
		
	});

	// $('#xpackcharge').change(function(){
	// 	getTotalSalesAmount();
	// });
	// $('#xtranscost').change(function(){
	// 	getTotalSalesAmount();
	// });
	// $('#xgrossdisc').change(function(){
	// 	getTotalSalesAmount();
	// });
});
function loadSOTable2(status){
	var url = baseuri+"jsondata/getFormaList/"+status;
		$.get(url, function(q){
			debugger;
	var div = '<table id="dtbl5" class="table table-bordered table-striped">'+
		'<thead>'+
		'<tr>'+
		'<th>Date</th>'+
		'<th>Order Number</th>'+
		'<th>Press Name</th>'+
		'<th>Show</th>'+
		'</tr>'+
		'</thead>'+
		'<tbody>';

		for(var i=0;i<q.length;i++){	
			div += '<tr role="row" class="odd">'+
			'<td class="sorting_1" style="padding: 12px;">'+q[i].xdate+'</td>'+
			'<td style="padding: 12px;">'+q[i].xordernum+'</td>'+
			'<td style="padding: 12px;">'+q[i].xpress+'</td>'+
			'<td><input type="button" href="#tab_1" data-toggle="tab" id="'+q[i].xordernum+'" value="Show" class="btn btn-info" onclick="clickfunction(\''+q[i].xordernum+'\');" aria-expanded="true">'+
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
	var url = baseuri+"jsondata/getForma/"+sonum;
		$.get(url, function(q){
			debugger; 
			if(q.length < 1){
				alert("Invoice is not found!");
				$('#xdate').val("");
				$('#xpress').val("");
				$('#xnotes').val("");
				return;
			}
			//var dt = parseJsonDate(q[0].xdate);
			if(q[0].xstatus == 'Created'){
				// $("#confirmbtn").empty();
				// $('<a href="javascript:void(0)" id="btnconf" onclick="btnconfclick();" class="btn btn-danger"><span class="glyphicon glyphicon-save"></span>&nbsp;Confirm</a>').appendTo("#confirmbtn");
				$("#printlink").empty();
				$('<a class="print-link no-print" style="text-align: center; color: red;" onclick="printdoc(\'#ele1\')">Print Order - '+sonum+'</a>').appendTo("#printlink");
			}else if(q[0].xstatus == 'Confirmed'){
				// $("#confirmbtn").empty();
				// $('<a href="javascript:void(0)" id="btncancel" onclick="btncancelclick();" class="btn btn-danger"><span class="glyphicon glyphicon-save"></span>&nbsp;Cencel Sales</a>').appendTo("#confirmbtn");
				$("#printlink").empty();
				$('<a class="print-link no-print" style="text-align: center; color: red;" onclick="printdoc(\'#ele1\')">Print Order - '+sonum+'</a>').appendTo("#printlink");
			}
			$('#xsonum').val(q[0].xordernum);
			$('#xdate').val(q[0].xdate);
			$('#xpress').val(q[0].xpress);
			$('#xnotes').val(q[0].xnotes);

		}, 'json');
		var utl = baseuri+"jsondata/getFormaItem/"+sonum;
		$.get(utl, function(q){ 
			var tqty = 0;
			var ttotal = 0;
			debugger;
			if(q.length > 0)
				$('#ItemTable').appendGrid('load', q);
			else
				$('#ItemTable').appendGrid('load', [{ 'xitemcode': '', 'xdesc': '', 'xlongdesc': '', 'xprintqty': '', 'xforma': '', 'xformaplate': '', 'xpapername': '', 'xpaperqty': '' , 'xboardname': '' , 'xboardname': '' , 'xboardqty': '' , 'xcoverplate': ''}]);

			for(var i=0; i<q.length; i++){
				tqty+=parseFloat(q[i].xqty);
				ttotal+=parseFloat(q[i].xtotal);
			}
			$('#subqty').text(tqty);
			$('#subtotal').text(ttotal);

		}, 'json');
}

function getChecked(){
	debugger;
	var cus = $('#xcus').val();
	var clsarr = "";
	$('input.frmchecked:checkbox:checked').each(function () {
		clsarr += "'"+($(this).val())+"',";
	});
	clsarr = clsarr.slice(0, -1);
	var conv = $('#xconvertfor').val();
	var dis = $('#xdiscfor').val();
	getItemByCus(cus,clsarr,conv,dis);
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

function getNetTotalSta(lid){
	var rate = $('#StaTable_xmrp_'+lid).val();
	var convert = $('#StaTable_xcurconversion_'+lid).val();
	var qty =  $('#StaTable_xqty_'+lid).val();
	var xdis =  $('#StaTable_xdis_'+lid).val();

	var stotal = (rate*convert);
	var stotaldis = (stotal*xdis)/100;
	var nprice = stotal - stotaldis;
	$('#StaTable_xnet_'+lid).val(nprice);
	$('#StaTable_xnetdis_'+lid).val(stotaldis);

	var total = ((rate*convert)*qty);
	var totaldis = (((rate*convert)*qty)*xdis)/100;
	var nettotal = total - totaldis;
	$('#StaTable_xtotal_'+lid).val(nettotal);
	$('#StaTable_xdistotal_'+lid).val(totaldis);
};

function getItemByCus(cus,clsarr,conv,dis){
	debugger;
	var utl = baseuri+"jsondata/getAllItem/"+cus+"/"+clsarr+"/"+conv+"/"+dis;
	$.get(utl, function(q){ 
		debugger;
		$('#ItemTable').appendGrid('load', q);
		
	}, 'json');
};
function getClass(cus){
	var url = baseuri+"jsondata/getclass/"+cus;
	$.get(url, function(o){ 
				debugger;
				$( "#appenddiv" ).empty();
				$( "#appenddiv" ).append( '<div id="row1" class="form-group"><label for="Class" class="col-sm-2 '+'control-label"></label><div class="col-sm-12"><div style="Background-color:#00a6cc; '+'color:white"><strong>Class</strong></div></div></div>'+
				'' );
				for(var i=0; i< o.length; i ++){
					$( "#appenddiv" ).append( '<label for="'+ o[i].xclass +'" class="col-sm-2 control-label">'+ o[i].xclass +'</label>'+
					'<div class="col-sm-1">'+
						'<div class="clscheck" id="clscheck"><label><input onclick="getChecked()" name="check_list[]" class="frmchecked" id="'+ o[i].xclass +'" value="'+ o[i].xclass +'" type="checkbox"></label>'+
						'</div>'+
					'</div>' );
				}
		}, 'json');
}

function deleteRow(tblname,lid){
	debugger;
	var sonum = $('#xsonum').val();
	var rownum = $('#'+tblname+'_xrow_'+lid).val();

	if(rownum != ""){
		var utl2 = baseuri+"forma/deleteRow/"+sonum+"/"+rownum;
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
		var utl2 = baseuri+"forma/confirmpost/"+sonum+"/"+disc+"/"+cus;
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
		var utl2 = baseuri+"forma/cancelpost/"+sonum+"/"+disc+"/"+cus;
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
        caption: 'Add Item for Forma & Cover Print',
        initRows: 10,
        columns: [
            { name: 'xitemcode', ctrlClass: '', display: 'Item Code', type: 'text', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '100px'} },
            { name: 'xdesc', ctrlClass: 'example-mail', display: 'Description(English)', type: 'text', ctrlAttr: { maxlength: 250 }, ctrlCss: { width: '220px'}, ctrlProp: {  },
			onChange: function (evt, rowIndex) {
				var sd = (event.target.id).replace(/[^0-9]/gi, '');
				var lid = parseInt(sd, 10);
				getItemdt(lid);
			}  },
            { name: 'xlongdesc', display: 'Description(Bangla)', type: 'text', ctrlAttr: { maxlength: 250 }, ctrlCss: { width: '180px'}, ctrlProp: {  },
			onClick: function (evt, rowIndex) {
				var sd = (event.target.id).replace(/[^0-9]/gi, '');
				var lid = parseInt(sd, 10);
				getItemdt(lid);

			}  },
            { name: 'xprintqty', display: 'Print Qty', ctrlClass: 'text-center bkqty', type: 'number', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '80px'}},
            { name: 'xforma', display: 'Forma', ctrlClass: 'text-center bkqty', type: 'number', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '50px'}},
            { name: 'xformaplate', display: 'Forma Plate', ctrlClass: 'text-center bkqty', type: 'number', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '75px'}},
            { name: 'xpapername', display: 'Paper Name', ctrlClass: 'text-center', type: 'text', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '100px'}},
            { name: 'xpaperqty', display: 'Paper Qty', ctrlClass: 'text-center', type: 'text', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '95px'}},
            { name: 'xboardname', display: 'Board Name', ctrlClass: 'text-center', type: 'text', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '85px'}},
            { name: 'xboardqty', display: 'Board Qty', ctrlClass: 'text-center', type: 'text', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '80px'}},
            { name: 'xcoverplate', display: 'Cover Plate', ctrlClass: 'text-center', type: 'number', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '80px'}},
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

function getItemdtSta(lid){
	debugger;
	var disc = 0;
	var exch = 0;
	var val = $('#StaTable_xdesc_'+lid).val();
	var res = val.split("*");
	if(res.length>1){
		var url = baseuri+"jsondata/getItem/"+res[1];
		$.get(url, function(o){ 
			debugger;
			$('#StaTable_xitemcode_'+lid).val(o[0].xitemcode);
			$('#StaTable_xlongdesc_'+lid).val(o[0].xlongdesc);
			$('#StaTable_xdesc_'+lid).val(o[0].xdesc);
			$('#StaTable_xcur_'+lid).val(o[0].xcur);
			$('#StaTable_xmrp_'+lid).val(o[0].xmrp);

			if(o[0].xcur == "BDT"){
				disc = parseFloat($('#xdiscfor').val());
				exch = parseFloat(o[0].xcurconversion);
				$('#StaTable_xcurconversion_'+lid).val(o[0].xcurconversion);
				$('#StaTable_xdis_'+lid).val($('#xdiscfor').val());
			}else if(o[0].xcur == "RS"){
				exch = parseFloat($('#xconvertfor').val());
				$('#StaTable_xcurconversion_'+lid).val($('#xconvertfor').val());
				$('#StaTable_xdis_'+lid).val('0');
			}else{
				exch = parseFloat(o[0].xcurconversion);
				$('#StaTable_xcurconversion_'+lid).val(o[0].xcurconversion);
				$('#StaTable_xdis_'+lid).val('0');
			}

			var total = (parseFloat(o[0].xmrp*exch));
			var totaldis = (total*disc)/100;
			var nprice = total - totaldis;
			$('#StaTable_xnet_'+lid).val(nprice);
			$('#StaTable_xnetdis_'+lid).val(totaldis);

			getNetTotalSta(lid);
			getTotalSalesAmount();

			}, 'json');
		}
}

function printdoc(id){

	var sonum = $('#xsonum').val();
	
	var utl = baseuri+"jsondata/getPrintOrder/"+sonum;
	$.get(utl, function(q){
		debugger;

		var div = '';

		var currentTime = new Date(q[0].xdate);
		var month = ("0" + (currentTime.getMonth() + 1)).slice(-2);
		var day = ("0" + currentTime.getDate()).slice(-2);
		var year = currentTime.getFullYear();
		var sdt = day + '/' + month + '/' + year;

		
		div += '<div class="main-div" style=""><div style="text-align:center"><strong align="center" style="font-size:25px;color:#7030A0!important">'+ q[0].xpress +'</strong><br /><strong align="center" style="border-bottom:1px solid">Order No. - '+q[0].xordernum+'</strong><br /><strong align="center" style="">Date: '+sdt+'</strong></div>';

		// var bookcount = 0;
		// for(var i=0;i<q.length;i++){
		// 	//if(q[i].xgitem == "Book"){
		// 		bookcount++;
		// 	//}
		// }
		//if(bookcount > 0){
			//div += '<div style="margin-top:0px;"><strong style="">Book : </strong></div>';
			div += '<table class="table table-bordered" cellspacing="0" width="100%" role="grid" aria-describedby="dtbl_info" style="width: 100%; font-size:11px;">'+
			'<thead><tr role="row"><th style="">S/L</th><th style="width:300px" >Description</th><th>Print Qty</th><th>Forma</th><th>Forma Plate</th><th>Paper Name</th><th>Paper Qty</th><th>Board Name</th><th>Board Qty</th><th>Cover Plate</th></tr></thead><tbody>';
			for(var i=0;i<q.length;i++){
				//if(1==1){
					//var tval = (parseFloat(q[i].xmrp)*parseFloat(q[i].xqty)*parseFloat(q[i].xcurconversion));
					div+='<tr role="row" class="odd"><tr>';
					div+='<td align="center">'+(i+1)+'</td>';
					if(q[i].xlongdesc=='' || q[i].xlongdesc==null)
						div+='<td align="left">'+q[i].xdesc+'</td>';
					else
						div+='<td align="left">'+q[i].xlongdesc+'</td>';
					div+='<td align="center">'+q[i].xprintqty+'</td>';
					div+='<td align="center">'+q[i].xforma+'</td>';
					div+='<td align="center">'+q[i].xformaplate+'</td>';
					div+='<td align="center">'+q[i].xpapername+'</td>';
					div+='<td align="center">'+q[i].xpaperqty+'</td>';
					div+='<td align="center">'+q[i].xboardname+'</td>';
					div+='<td align="center">'+q[i].xboardqty+'</td>';
					div+='<td align="center">'+q[i].xcoverplate+'</td>';
					//div+='<td align="center">'+((parseFloat(q[i].xmrp) * parseFloat(q[i].xcurconversion)) - (parseFloat(q[i].xdistotal) / parseFloat(q[i].xqty)))+'</td>';
					//div+='<td align="center" style="width:80px">'+q[i].xqty+'</td>';
					//div+='<td align="center">'+q[i].xtotal+'</td>';
					div+='</tr>';
					//bktotal += parseFloat(q[i].xtotal);
					//bkprice += parseFloat(q[i].xmrp);
					//bkqty += parseFloat(q[i].xqty);
					//bktval += parseFloat(q[i].xsubtotal);
					//bkdis += parseFloat(q[i].xdistotal);
				//}
			}


		div += '</div></div>';

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