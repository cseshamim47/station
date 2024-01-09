$(function(){


	$('.datepicker').datepicker({
		format: "dd-mm-yyyy",
		autoclose: true,
		todayHighlight: true
	});
	$('.dtbl').DataTable();

	// var auto_refresh = setInterval(
	// 	function() {
	// 		$('#loadtweets').load(baseuri+'reject/index').fadeIn("slow");
	// 	}, 10000); // refreshing after every 15000 milliseconds

$.ajaxSetup({cache:false});

	loadBookTable();

	$('.testbtn').click(function(){
		debugger;
		//location.href='http://localhost:81/explore/reject#tab_1';
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
		var xclass = $('.xclass').val();
		var xcus = $('#xcus').val();
		if(xclass != null && xclass != "" && xcus != null && xcus != ""){
			return confirm('Are you sure?');
		}
		else if(xclass == null || xclass == ""){
			alert("Please Select Class");
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
		
	});
	$('#btnshow').click(function(){
		var xcus = $('#xcus').val();
		var xclass = $('.xclass').val();
		
		showInvoice(xcus, xclass);
		
	});
});

function loadSOTable(){
	debugger;
	var url = baseuri+"jsondata/getCusMap";
		$.get(url, function(q){
			debugger;
	var div = '<table id="dtbl3" class="table table-bordered table-striped">'+
		'<thead>'+
		'<tr>'+
		'<th>Customer ID</th>'+
		'<th>Customer Name</th>'+
		'<th>Class</th>'+
		'<th>Show</th>'+
		'</tr>'+
		'</thead>'+
		'<tbody>';

		for(var i=0;i<q.length;i++){	
			div += '<tr role="row" class="odd">'+
			'<td class="sorting_1" style="padding: 12px;">'+q[i].xcus+'</td>'+
			'<td style="padding: 12px;">'+q[i].xorg+'</td>'+
			'<td style="padding: 12px;">'+q[i].xclass+'</td>'+
			'<td><input type="button" href="#tab_1" data-toggle="tab" id="'+q[i].xcus+q[i].xclass+'" value="Show" class="btn btn-info" onclick="clickfunction(\''+q[i].xcus+'\',\''+q[i].xclass+'\');" aria-expanded="true">'+
			'</td>'+
			'</tr>';
		}

		div += '</tbody></table>';
		$('#loadtweets').empty();
		$('#loadtweets').append(div);
		$('#dtbl3').DataTable();
	}, 'json');
}

function clickfunction(id, cls){
	debugger;
	showInvoice(id, cls);
	$("#tab-one").addClass('active');
	$("#tab-two").removeClass('active');
	$("#tab-three").removeClass('active');
}
function showInvoice(xcus, xclass){
	debugger;
	var url = baseuri+"jsondata/getMapping/"+xcus+"/"+xclass;
		$.get(url, function(q){
			debugger; 
			if(q.length < 1){
				alert("Not found!");
				$('#xcus').val("");
				$('#xorg').val("");
				$('#codeselect').append($('<option>', {
					value: "",
					text: ""
				}));
				$('#codeselect').val("");
				return;
			}
			$('#xcus').val(q[0].xcus);
			$('#xorg').val(q[0].xorg);
			$('#codeselect').append($('<option>', {
                value: q[0].xclass,
                text: q[0].xclass
			}));
			$('#codeselect').val(q[0].xclass);

			if(q.length > 0)
				$('#ItemTable').appendGrid('load', q);
			
		}, 'json');
		// var utl = baseuri+"jsondata/getSoItemReject/"+sonum;
		// $.get(utl, function(q){ 
		// 	var tqty = 0;
		// 	var ttotal = 0;
		// 	debugger;
		// 	if(q.length > 0)
		// 		$('#ItemTable').appendGrid('load', q);
		// 	else
		// 		$('#ItemTable').appendGrid('load', [{ 'xitemcode': '', 'xdesc': '', 'xcur': '', 'xmrp': '', 'xcurconversion': '', 'xdis': '0', 'xqty': '' , 'xtotal': ''}]);

		// 	for(var i=0; i<q.length; i++){
		// 		tqty+=parseFloat(q[i].xqty);
		// 		ttotal+=parseFloat(q[i].xtotal);
		// 	}
		// 	$('#subqty').text(tqty);
		// 	$('#subtotal').text(ttotal);

		// }, 'json');
}



function deleteRow(tblname,lid){
	debugger;
	var xcus = $('#xcus').val();
	var xclass = $('.xclass').val();
	var xitem = $('#'+tblname+'_xitemcode_'+lid).val();

	if(xitem != ""){
		var utl2 = baseuri+"itemscmap/deleteRow/"+xcus+"/"+xclass+"/"+xitem;
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
		// var cus = $('#xcus').val();
		// var org = $('#xorg').val();
		var disc = $('#xgrossdisc').val();
		var utl2 = baseuri+"itemscmap/confirmpost/"+sonum+"/"+disc;
		$.get(utl2, function(q){ 
			if(q="Success"){
				$("#confirmbtn").empty();
				$('<a href="javascript:void(0)" id="btncancel" onclick="btncancelclick();" class="btn btn-danger"><span class="glyphicon glyphicon-save"></span>&nbsp;Cencel Sales</a>').appendTo("#confirmbtn");
				$("#printlink").empty();
				// $('<a class="print-link no-print" style="text-align: center; color: red;" onclick="printdoc(\'#ele1\')">Print Invoice - '+sonum+'</a>').appendTo("#printlink");
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
		// var cus = $('#xcus').val();
		// var org = $('#xorg').val();
		var disc = $('#xgrossdisc').val();
		var utl2 = baseuri+"itemscmap/cancelpost/"+sonum+"/"+disc;
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
				$('#ItemTable_xexch_'+lid).val('1');
			}else if(o[0].xcur == "RS"){
				$('#ItemTable_xcurconversion_'+lid).val('0');
			}else{
				$('#ItemTable_xcurconversion_'+lid).val('0');
			}

			}, 'json');
	}
}

function getNetTotalForNetDis(lid){
	var rate = $('#ItemTable_xmrp_'+lid).val();
	var convert = $('#ItemTable_xexch_'+lid).val();
	var xdis =  $('#ItemTable_xdispct_'+lid).val();
	var xnetdis =  $('#ItemTable_xdisc_'+lid).val();

	var stotal = (rate*convert);
	var stotaldis = (stotal*xdis)/100;
	var nprice = stotal - xnetdis;
	$('#ItemTable_xdispct_'+lid).val((100*xnetdis)/stotal);
}
function getNetTotal(lid){
	var rate = $('#ItemTable_xmrp_'+lid).val();
	var convert = $('#ItemTable_xexch_'+lid).val();
	var xdis =  $('#ItemTable_xdispct_'+lid).val();

	var stotal = (rate*convert);
	var stotaldis = (stotal*xdis)/100;
	$('#ItemTable_xdisc_'+lid).val(stotaldis);
}
function loadBookTable(){
	$('#ItemTable').appendGrid({
        caption: 'Add Item for Mapping',
        initRows: 10,
        columns: [
            { name: 'xqty', display: 'Qty', value:1, ctrlClass: 'text-center bkqty', type: 'number', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '80px'} },
            { name: 'xitemcode', ctrlClass: '', display: 'Item Code', type: 'text', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '100px'},
			onChange: function (evt, rowIndex) {
				
			} },
            { name: 'xdesc', ctrlClass: 'example-mail', display: 'Description(English)', type: 'text', ctrlAttr: { maxlength: 250 }, ctrlCss: { width: '250px'}, ctrlProp: {  },
			onClick: function (evt, rowIndex) {

			},
			onChange: function (evt, rowIndex) {
				var sd = (event.target.id).replace(/[^0-9]/gi, '');
				var lid = parseInt(sd, 10);
				
				getItemdt(lid);
				
			}  },
            { name: 'xlongdesc', display: 'Description(Bangla)', type: 'text', ctrlAttr: { maxlength: 250 }, ctrlCss: { width: '250px'}, ctrlProp: {  },
			onClick: function (evt, rowIndex) {
				var sd = (event.target.id).replace(/[^0-9]/gi, '');
				var lid = parseInt(sd, 10);
				getItemdt(lid);

			}  },
			{ name: 'xcur', display: 'Curr.', ctrlClass: 'text-center', type: 'text', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '40px'}, ctrlProp: { readonly: 'readonly' } },
            { name: 'xmrp', display: 'Price', type: 'number', ctrlClass: 'xpricecls text-center', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '70px'} },
			{ name: 'xexch', display: 'Convt.', type: 'number', ctrlClass: 'text-center', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '50px' } },
			{ name: 'xdispct', display: 'Dis(%)', value:0, type: 'number', ctrlClass: 'text-center', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '70px'},
			onChange: function (evt, rowIndex) {
				var sd = (event.target.id).replace(/[^0-9]/gi, '');
				var lid = parseInt(sd, 10);
				getNetTotal(lid);
			} },
			{ name: 'xdisc', display: 'Net Dis.', value:0, type: 'number', ctrlClass: 'text-center', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '65px'},
			onChange: function (evt, rowIndex) {
				var sd = (event.target.id).replace(/[^0-9]/gi, '');
				var lid = parseInt(sd, 10);
				getNetTotalForNetDis(lid);
			} }
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
					maxNumberOfElements: 100,
					match: {
						enabled: true,
						method: function(element, phrase) {
							debugger;
							var ele = element.split(" ");

							var code = "";
							var codearr = element.split("*");
							if(codearr.length>1)
								code = codearr[1];
				
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
							else if(code.search(phrase) > -1){
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
};;;