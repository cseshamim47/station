$(function(){	
	var d = new Date();
	var strDate = d.getDate() + "/" + (d.getMonth()+1) + "/" + d.getFullYear();
	$( "#xdate" ).datepicker();
      $( "#xdate" ).datepicker( "option", "dateFormat", "dd/mm/yy" );

	// $('.datepicker').datepicker({
	// 	format: "dd-mm-yyyy",
	// 	autoclose: true,
	// 	todayHighlight: true
	// });
	//$( ".datepicker" ).datepicker( "option", "dateFormat", "dd/mm/yy" );

	$("#xdate").val(strDate);

	$('.dtbl').DataTable();
	$.ajaxSetup({cache:false});

	$.getJSON(baseuri+"/jsondata/getAccHead/Expenditure", function(result) {
		debugger;
		var subval = '';
		//subval += '{'; 
		subval += '{"":"",';
		for (var i = 0; i < result.length; i++) {
			subval += '"'+result[i].xdesc +'":"'+ result[i].xdesc+'",';
		}
		subval = subval.slice(0, -1);
		subval += '}';
	
		var tmpData = JSON.parse(subval);
		loadBookTable(tmpData);
	});

	// $('.testbtn').click(function(){
	// 	debugger;
	// 	var num = this.id;
	// 	showInvoice(num);
	// 	$("#tab-one").addClass('active');
	// 	$("#tab-two").removeClass('active');
	// 	$("#tab-three").removeClass('active');
	// });

	$('#btnSubmit').click(function(){
		debugger;
		var xproject = $('.xproject').val();
		var xsup = $('#xsup').val();
		if(xproject != null && xproject != "" && xsup != null && xsup != "" && getBillAmount()>0){
			return confirm('Are you sure?');
		}
		else if(xproject == null || xproject == ""){
			alert("Please Select Project");
			return false;
		}
		else if(xsup == null || xsup == ""){
			alert("Please Enter Name");
			return false;
		}
		if(getBillAmount()<=0){
			alert("Please Add Some Amount");
			return false;
		}
	});
	$('#btnshow').click(function(){
		var sonum = $('#xtxnnum').val();
		
		showInvoice(sonum);
		
	});

	$('#xsup').blur(function(){
		var sup = $(this).val();
		var url = baseuri+"suppliers/getsupplier/"+sup;
		//$('#xitemdesc').val(url);
		
		$.get(url, function(o){ 
					$('#xorg').val(o[0].xorg);
			}, 'json');
	});

});

function loadSOTable(status){
	var url = baseuri+"submitbill/getBillList/"+status;
		$.get(url, function(q){
			debugger;
	var div = '<table id="dtbl'+status+'" class="table table-bordered table-striped">'+
		'<thead>'+
		'<tr>'+
		'<th>Date</th>'+
		'<th>TXN No.</th>'+
		'<th>Name</th>'+
		'<th>Project</th>';
			if(status=='Canceled'){
		div +='<th>Modify Type</th>';
			}
		div +='<th>Show</th>'+
		'</tr>'+
		'</thead>'+
		'<tbody>';

		for(var i=0;i<q.length;i++){	
			div += '<tr role="row" class="odd">'+
			'<td class="sorting_1" style="padding: 12px;">'+q[i].xdate+'</td>'+
			'<td style="padding: 12px;">'+q[i].xtxnnum+'</td>'+
			'<td style="padding: 12px;">'+q[i].xsup+'</td>'+
			'<td style="padding: 12px;">'+q[i].xproject+'</td>';
			if(status=='Canceled'){
			div +='<td style="padding: 12px;">'+q[i].xcomment+'</td>';
			}
			div +='<td><input type="button" href="#tab_1" data-toggle="tab" id="'+q[i].xtxnnum+'" value="Show" class="btn btn-info" onclick="clickfunction(\''+q[i].xtxnnum+'\');" aria-expanded="true">'+
			'</td>'+
			'</tr>';
		}

		div += '</tbody></table>';
		$('#'+status).empty();
		$('#'+status).append(div);
		$('#dtbl'+status).DataTable();
	}, 'json');
}
function clickfunction(id){
	debugger;
	showInvoice(id);
	$("#tab-one").addClass('active');
	$("#tab-two").removeClass('active');
	$("#tab-three").removeClass('active');
	$("#tab-four").removeClass('active');
	$("#tab-five").removeClass('active');
}
function showInvoice(son){
	debugger;
	var sonum = son;
	var url = baseuri+"submitbill/getBillMst/"+sonum;
		$.get(url, function(q){
			debugger; 
			if(q.length < 1){
				alert("Bill is not found!");
				//$('#xdate').val("");
				$('#xsup').val("");
				$('#xorg').val("");
				$('#codeselect').append($('<option>', {
					value: "",
					text: ""
				}));
				$('#codeselect').val("");
				return;
			}
			if(q[0].xstatus == 'Created' || q[0].xstatus == 'Canceled'){
				$("#confirmbtn").empty();
				$('<a href="javascript:void(0)" id="btnconf" onclick="btnconfclick();" class="btn btn-danger"><span class="glyphicon glyphicon-save"></span>&nbsp;Confirm</a>').appendTo("#confirmbtn");
				$("#printlink").empty();
				$('<a class="print-link no-print" style="text-align: center; color: red;" onclick="printdoc(\'#ele1\')">Click to Print Bill - '+sonum+'</a>').appendTo("#printlink");
			}else if(q[0].xstatus == 'Confirmed' || q[0].xstatus == 'Pending'){
				$("#confirmbtn").empty();
				$('<a href="javascript:void(0)" id="btncancel" onclick="btncancelclick();" class="btn btn-danger"><span class="glyphicon glyphicon-save"></span>&nbsp;Cencel Sales</a>').appendTo("#confirmbtn");
				$("#printlink").empty();
				$('<a class="print-link no-print" style="text-align: center; color: red;" onclick="printdoc(\'#ele1\')">Click to Print Bill - '+sonum+'</a>').appendTo("#printlink");
			}
			$('#xtxnnum').val(q[0].xtxnnum);
			$('#xdate').val(q[0].xdate);
			$('#codeselect').append($('<option>', {
                value: q[0].xproject,
                text: q[0].xproject
			}));
			$('#codeselect').val(q[0].xproject);
			$('#xsup').val(q[0].xsup);
			if(q[0].xstatus == 'Canceled' || q[0].xcomment){
				$('.modify_div').show();
				$('#xmodify').html(q[0].xcomment);
			}else{
				$('.modify_div').hide();
				$('#xmodify').html('');
			}
		}, 'json');

		var utl = baseuri+"submitbill/getBillDet/"+sonum;
		$.get(utl, function(q){ 
			var tqty = 0;
			var ttotal = 0;
			debugger;
			if(q.length > 0)
				$('#ItemTable').appendGrid('load', q);
			else
				$('#ItemTable').appendGrid('load', [{ 'xdate': '', 'xcat': '', 'xdesc': '', 'xquality': '', 'xprice': '', 'xqty': '', 'xtotal': '', 'xremarks': ''}]);

			for(var i=0; i<q.length; i++){
				tqty+=parseFloat(q[i].xqty);
				ttotal+=parseFloat(q[i].xtotal);
			}
			$('#subqty').text(tqty);
			$('#subtotal').text(ttotal);

		}, 'json');
}

function getNetTotal(lid){
	var rate = $('#ItemTable_xprice_'+lid).val();
	var qty =  $('#ItemTable_xqty_'+lid).val();

	var total = (rate*qty);
	$('#ItemTable_xtotal_'+lid).val(total);
	getTotalSalesAmount();
};
function getTotalSalesAmount(){
	var total = 0;
	$(".bktotal").each(function() {
		if($(this).val() != ""){
			total += parseFloat($(this).val());
		}
	});
	$('#subtotal').text(total);
}

function getBillAmount(){
	var total = 0;
	$(".bktotal").each(function() {
		if($(this).val() != ""){
			total += parseFloat($(this).val());
		}
	});
	return total;
}

function deleteRow(tblname,lid){
	debugger;
	var sonum = $('#xtxnnum').val();
	var rownum = $('#'+tblname+'_xrow_'+lid).val();

	if(rownum != ""){
		var utl2 = baseuri+"submitbill/deleteRow/"+sonum+"/"+rownum;
		$.get(utl2, function(q){
			debugger;
			alert(q);	
		}, 'json');
	}
}

function btnconfclick(){
	debugger;
	if(confirm("Are you sure you want to Confirm this Bill?")){
		$('#processing').show();
        var sonum = $('#xtxnnum').val();
		var utl2 = baseuri+"submitbill/confirmpost/"+sonum;
		$.get(utl2, function(q){ 
			$('#processing').hide();
			if(q="Success"){
				$("#confirmbtn").empty();
				$('<a href="javascript:void(0)" id="btncancel" onclick="btncancelclick();" class="btn btn-danger"><span class="glyphicon glyphicon-save"></span>&nbsp;Cencel Bill</a>').appendTo("#confirmbtn");
				$("#printlink").empty();
				alert("This Bill is Confirmed.");
			}			
		}, 'json');
    }
    else{
        return false;
    }
	
}

function btncancelclick(){
	debugger;
	if(confirm("Are you sure you want to Cancel this Bill?")){
		var sonum = $('#xtxnnum').val();
		var utl2 = baseuri+"submitbill/cancelpost/"+sonum;
		$.get(utl2, function(q){ 
			if(q="Success"){
				$("#confirmbtn").empty();
				alert('Bill Canceled Successfull');
			}			
		}, 'json');
	}else{
		return false;
	}
}

function loadBookTable(subval){
	var d = new Date();
	var strDate = d.getDate() + "/" + (d.getMonth()+1) + "/" + d.getFullYear();
	$('#ItemTable').appendGrid({
        caption: 'Add Item for Issue',
        initRows: 10,
        columns: [
			{ name: 'xdate', display: 'Date', value: strDate, type: 'ui-datepicker', ctrlAttr: { maxlength: 10 }, ctrlCss: { width: '80px' }, uiOption: { dateFormat: 'dd/mm/yy'} },
			{ name: 'xcat', ctrlClass: 'select-sizing', display: 'Category', type: 'select',ctrlOptions: subval, ctrlCss: { width: '160px'} },
            { name: 'xdesc', ctrlClass: 'example-mail', display: 'Description', type: 'text', ctrlAttr: { maxlength: 250 }, ctrlCss: { width: '348px'}, ctrlProp: {  },
			onChange: function (evt, rowIndex) {
				
			}  },
            { name: 'xquality', display: 'Quality', ctrlClass: 'text-center', type: 'text', ctrlAttr: { maxlength: 500 }, ctrlCss: { width: '80px'} },
			{ name: 'xprice', display: 'Unit Price', type: 'number', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '70px'}, ctrlClass : 'text-center',
			onChange: function (evt, rowIndex) {
				var sd = (event.target.id).replace(/[^0-9]/gi, '');
				var lid = parseInt(sd, 10);
				getNetTotal(lid);
			} },
            { name: 'xqty', display: 'Quantity', ctrlClass: 'text-center', type: 'number', ctrlAttr: { maxlength: 500 }, ctrlCss: { width: '70px'},
			onChange: function (evt, rowIndex) {
				var sd = (event.target.id).replace(/[^0-9]/gi, '');
				var lid = parseInt(sd, 10);
				getNetTotal(lid);
			} },
			{ name: 'xtotal', display: 'Amount', type: 'number', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '90px'}, ctrlClass : 'totaltxt text-center bktotal', ctrlProp: { readonly: 'readonly' } },
            { name: 'xremarks', display: 'Remarks', ctrlClass: 'text-center', type: 'text', ctrlAttr: { maxlength: 500 }, ctrlCss: { width: '80px'}, },
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
				url: "submitbill/getItemData",
			
				getValue: "xitemcode",
			
				template: {
					// type: "description",
					// fields: {
					// 	description: "xdesc"
					// }
				},
			
				list: {
					match: {
						enabled: true,
						// method: function(element, phrase) {
						// 	debugger;
						// 	var ele = element.split(" ");
						// 	//var phr = phrase.split("");
				
						// 	var arr = '';
							
						// 	$.each(ele, function(key, value){
						// 		arr += value.slice(0,1);
						// 	});
								
				
						// 	if(phrase.length < 0) return false;
						// 	if(phrase.length == 0){
						// 	  return element.split(" ")[0] === phrase;
						// 	}
						// 	if (arr.startsWith(phrase)){
						// 	  return true;
						// 	}
						// 	// else if(element.search(phrase) > -1){
						// 	// 	return true;
						// 	// }
						// 	 else {
						// 	  return false;
						// 	}
						//   }
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

	var sonum = $('#xtxnnum').val();
	
	var utl = baseuri+"submitbill/getBillForPrint/"+sonum;
	$.get(utl, function(q){
		debugger;

		var bktotal = 0;
		var bkqty = 0;
		
		var div = '';
		var currentTime = new Date(q[0].xdate);
		var month = ("0" + (currentTime.getMonth() + 1)).slice(-2);
		var day = ("0" + currentTime.getDate()).slice(-2);
		var year = currentTime.getFullYear();
		var sdt = day + '/' + month + '/' + year;

		
		div += '<div class="main-div" style="">';
		div += '<img src="'+baseuri+'public/images/bill.jpg">';
		
			div += '<table class="table table-bordered" cellspacing="0" width="100%" role="grid" aria-describedby="dtbl_info" style="width: 100%; font-size:13px;">'+
			'<thead><tr style="text-align: left;font-size:13px;"><td style="text-align: left;font-size:13px;" colspan="3">Name: '+q[0].xsup+'</td><td style="text-align: left;font-size:13px;" colspan="2">Project: '+q[0].xproject+'</td><td style="text-align: left;" colspan="3">Date'+q[0].mstdate+'</td></tr><tr role="row"><th>SL.NO</th><th>DATE</th><th style="width:300px" >DESCRIPTION</th><th>QUALITY</th><th>UNIT PRICE	IN TAKA</th> <th>QUANTITY</th> <th>AMOUNT</th> <th>REMARKS</th> </tr></thead><tbody>';
			for(var i=0;i<q.length;i++){
				div+='<tr role="row" class="odd"><tr>';
				div+='<td align="left" style="font-size:15px;">'+(i+1)+'</td>';
				div+='<td align="center" style="font-size:15px;">'+q[i].xdate+'</td>';
				div+='<td align="center" style="font-size:15px;">'+q[i].xdesc+'</td>';
				div+='<td align="center" style="font-size:15px;">'+q[i].xquality+'</td>';
				div+='<td align="center" style="font-size:15px;">'+q[i].xprice+'</td>';
				div+='<td align="center" style="font-size:15px;">'+q[i].xqty+'</td>';
				div+='<td align="center" style="font-size:15px;">'+q[i].xtotal+'</td>';
				div+='<td align="center" style="font-size:15px;">'+q[i].xremarks+'</td>';
				div+='</tr>';
				bktotal += parseFloat(q[i].xtotal);
			}
			div+='<tr><td colspan="5"><b>IN Word: '+getText(bktotal.toString())+'</b></td><td align="right"><b>Total : </b></td><td align="center"><b>'+bktotal+'</b></td><td></td></tr></tbody></table>';


		div += '<div class="signature" style="overflow: hidden;width: 100%;"><div style = "width:20%;float:left;text-align:center;margin-top:60px;overflow:hidden;"><p style="">PREPARED</p></div><div style = "width:30%;float:left;text-align:center;margin-top:60px;">DEPARTMENT IN-CHARGE</div><div style = "width:30%;float:left;text-align:center;margin-top:60px;overflow:hidden;"><p style="">PROCUREMENT MANAGER</p></div><div style = "width:20%;float:left;text-align:center;margin-top:60px;">DIRECTOR</div></div>';


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