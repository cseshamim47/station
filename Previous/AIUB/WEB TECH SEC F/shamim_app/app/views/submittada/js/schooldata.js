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

	$.getJSON(baseuri+"/jsondata/getWarehouse/Bill Category", function(result) {
		debugger;
		var subval = '';
		subval += '{"":"{Select}",';
		for (var i = 0; i < result.length; i++) {
			subval += '"'+result[i].xcode +'":"'+ result[i].xcode+'",';
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
		if(xproject != null && xproject != "" && xsup != null && xsup != ""){
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
	var url = baseuri+"submittada/getBillList/"+status;
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
	var url = baseuri+"submittada/getBillMst/"+sonum;
		$.get(url, function(q){
			debugger; 
			if(q.length < 1){
				alert("TA/DA is not found!");
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
				$('<a class="print-link no-print" style="text-align: center; color: red;" onclick="printdoc(\'#ele1\')">Click to Print TA/DA - '+sonum+'</a>').appendTo("#printlink");
			}else if(q[0].xstatus == 'Confirmed' || q[0].xstatus == 'Pending'){
				$("#confirmbtn").empty();
				$('<a href="javascript:void(0)" id="btncancel" onclick="btncancelclick();" class="btn btn-danger"><span class="glyphicon glyphicon-save"></span>&nbsp;Cancel TA/DA</a>').appendTo("#confirmbtn");
				$("#printlink").empty();
				$('<a class="print-link no-print" style="text-align: center; color: red;" onclick="printdoc(\'#ele1\')">Click to Print TA/DA - '+sonum+'</a>').appendTo("#printlink");
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

		var utl = baseuri+"submittada/getBillDet/"+sonum;
		$.get(utl, function(q){ 
			var ttotal = 0;
			debugger;
			if(q.length > 0)
				$('#ItemTable').appendGrid('load', q);
			else
				$('#ItemTable').appendGrid('load', [{ 'xdate': '', 'xdesc': '', 'xby': '', 'xday': '', 'xperson': '', 'xamount': ''}]);

			for(var i=0; i<q.length; i++){
				ttotal+=parseFloat(q[i].xamount);
			}
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

function deleteRow(tblname,lid){
	debugger;
	var sonum = $('#xtxnnum').val();
	var rownum = $('#'+tblname+'_xrow_'+lid).val();

	if(rownum != ""){
		var utl2 = baseuri+"submittada/deleteRow/"+sonum+"/"+rownum;
		$.get(utl2, function(q){
			debugger;
			alert(q);	
		}, 'json');
	}
}

function btnconfclick(){
	debugger;
	if(confirm("Are you sure you want to Confirm this TA/DA?")){
		$('#processing').show();
        var sonum = $('#xtxnnum').val();
		var utl2 = baseuri+"submittada/confirmpost/"+sonum;
		$.get(utl2, function(q){ 
			$('#processing').hide();
			if(q="Success"){
				$("#confirmbtn").empty();
				$('<a href="javascript:void(0)" id="btncancel" onclick="btncancelclick();" class="btn btn-danger"><span class="glyphicon glyphicon-save"></span>&nbsp;Cancel TA/DA</a>').appendTo("#confirmbtn");
				$("#printlink").empty();
				alert("This TA/DA is Confirmed.");
			}			
		}, 'json');
    }
    else{
        return false;
    }
}

function btncancelclick(){
	debugger;
	if(confirm("Are you sure you want to Cancel this TA/DA?")){
		var sonum = $('#xtxnnum').val();
		var utl2 = baseuri+"submittada/cancelpost/"+sonum;
		$.get(utl2, function(q){ 
			if(q="Success"){
				$("#confirmbtn").empty();
				alert('TA/DA Canceled Successfull');
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
            { name: 'xdesc', ctrlClass: 'example-mail', display: 'Description', type: 'text', ctrlAttr: { maxlength: 250 }, ctrlCss: { width: '420px'} },
            { name: 'xby', display: 'BY', ctrlClass: 'text-center', type: 'text', ctrlAttr: { maxlength: 50 }, ctrlCss: { width: '130px'} },
			{ name: 'xday', display: 'Day', type: 'text', ctrlAttr: { maxlength: 50 }, ctrlCss: { width: '100px'}, ctrlClass : 'text-center' },
            { name: 'xperson', display: 'Person', ctrlClass: 'text-center', type: 'text', ctrlAttr: { maxlength: 50 }, ctrlCss: { width: '120px'} },
			{ name: 'xamount', display: 'Amount', type: 'number', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '130px'}, ctrlClass : 'totaltxt text-center bktotal',
			onChange: function (evt, rowIndex) {
				getTotalSalesAmount();
			} },
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
				url: "submittada/getItemData",
			
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
	
	var utl = baseuri+"submittada/getBillForPrint/"+sonum;
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
		div += '<img src="'+baseuri+'public/images/tada.jpg">';
		
			div += '<table class="table table-bordered" cellspacing="0" width="100%" role="grid" aria-describedby="dtbl_info" style="width: 100%; font-size:13px;">'+
			'<thead><tr style="text-align: left;font-size:13px;"><td style="text-align: left;font-size:13px;" colspan="3">Name: '+q[0].xsup+'</td><td style="text-align: left;font-size:13px;" colspan="2">Project: '+q[0].xproject+'</td><td style="text-align: left;" colspan="3">Date: '+q[0].mstdate+'</td></tr><tr role="row"><th style="text-align:center;">SL.NO</th><th style="text-align:center;">DATE</th><th style="width:300px;text-align:center;" >DESCRIPTION</th><th style="text-align:center;">BY</th><th style="text-align:center;">DAY</th> <th style="text-align:center;">PERSON</th> <th style="text-align:center;">AMOUNT</th> </tr></thead><tbody>';
			for(var i=0;i<q.length;i++){
				div+='<tr role="row" class="odd"><tr>';
				div+='<td align="left" style="font-size:15px;">'+(i+1)+'</td>';
				div+='<td align="center" style="font-size:15px;">'+q[i].xdate+'</td>';
				div+='<td align="center" style="font-size:15px;">'+q[i].xdesc+'</td>';
				div+='<td align="center" style="font-size:15px;">'+q[i].xby+'</td>';
				div+='<td align="center" style="font-size:15px;">'+q[i].xday+'</td>';
				div+='<td align="center" style="font-size:15px;">'+q[i].xperson+'</td>';
				div+='<td align="center" style="font-size:15px;">'+q[i].xamount+'</td>';
				div+='</tr>';
				bktotal += parseFloat(q[i].xamount);
			}
			div+='<tr><td colspan="5"><b>IN Word: '+getText(bktotal.toString())+'</b></td><td align="right"><b>Total : </b></td><td align="center"><b>'+bktotal+'</b></td></tr></tbody></table>';


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