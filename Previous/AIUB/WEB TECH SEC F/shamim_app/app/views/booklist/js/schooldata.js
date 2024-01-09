$(function(){


	$('.datepicker').datepicker({
		format: "dd-mm-yyyy",
		autoclose: true,
		todayHighlight: true
	});
	$('.dtbl').DataTable();

$.ajaxSetup({cache:false});

	$.getJSON(baseuri+"/jsondata/getSubject", function(result) {
		debugger;
		var subval = '';
		var clsval = '';
		subval += '{"":"{Select}",';
		clsval += '{"":"{Select}",';
		for (var i = 0; i < result.length; i++) {
			if(result[i].xcodetype == "Subject")
				subval += '"'+result[i].xcode +'":"'+ result[i].xcode+'",';
			else if(result[i].xcodetype == "Class")
				clsval += '"'+result[i].xcode +'":"'+ result[i].xcode+'",';
		}
		subval = subval.slice(0, -1);
		clsval = clsval.slice(0, -1);
		subval += '}';
		clsval += '}';

		var tmpData = JSON.parse(subval);
		var tmpData2 = JSON.parse(clsval);
		loadBookTable(tmpData,tmpData2);
	});

	$('#btnSubmit').click(function(){
		debugger;
		//var xwh = $('.whcls').val();
		var xcus = $('#xcus').val();
		if(xcus != null && xcus != ""){
			return confirm('Are you sure?');
		}
		// else if(xwh == null || xwh == ""){
		// 	alert("Please Select Warehouse");
		// 	return false;
		// }
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


		// var xcurl = baseuri+"jsondata/getcustomerbal/"+cus;
			
		// $.get(xcurl, function(o){ 
		// 			$('#xcusbal').val(o[0].xbal);
					
		// 	}, 'json');	
	
		// 	var bookc = false;
		// 	debugger;
		// 	if($('#xbook').prop("checked") == true){
		// 		bookc = true;
		// 	}

		// 	if(bookc == true){
		// 		debugger;
		// 		loadBookTable();
		// 		getClass(cus);

		// 	}else{
		// 		// $('#ItemTable').appendGrid('load', [{ 'xitemcode': '', 'xdesc': '', 'xcur': '', 'xmrp': '', 'xcurconversion': '', 'xdis': '', 'xqty': '' , 'xtotal': ''}]);
		// 	}
		
	});
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
});

function loadSOTable(status){
	debugger;
	var url = baseuri+"jsondata/getBookListTable/"+status;
		$.get(url, function(q){
			debugger;
	var div = '<table id="dtbl3" class="table table-bordered table-striped">'+
		'<thead>'+
		'<tr>'+
		'<th>Date</th>'+
		'<th>Document Number</th>'+
		'<th>Customer ID</th>'+
		'<th>Name</th>'+
		'<th>Show</th>'+
		'</tr>'+
		'</thead>'+
		'<tbody>';

		for(var i=0;i<q.length;i++){	
			div += '<tr role="row" class="odd">'+
			'<td class="sorting_1" style="padding: 12px;">'+q[i].xdate+'</td>'+
			'<td style="padding: 12px;">'+q[i].xdocnum+'</td>'+
			'<td style="padding: 12px;">'+q[i].xcus+'</td>'+
			'<td style="padding: 12px;">'+q[i].xorg+'</td>'+
			'<td><input type="button" href="#tab_1" data-toggle="tab" id="'+q[i].xdocnum+'" value="Show" class="btn btn-info" onclick="clickfunction(\''+q[i].xdocnum+'\');" aria-expanded="true">'+
			'</td>'+
			'</tr>';
		}

		div += '</tbody></table>';
		$('#loadtweets').empty();
		$('#loadtweets').append(div);
		$('#dtbl3').DataTable();
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
	var url = baseuri+"jsondata/getBooklist/"+sonum;
		$.get(url, function(q){
			debugger; 
			if(q.length < 1){
				alert("Invoice is not found!");
				//$('#xsonum').val("");
				$('#xdate').val("");
				$('#xcus').val("");
				$('#xorg').val("");
				$('#xnotes').val("");
				return;
			}
			//var dt = parseJsonDate(q[0].xdate);
			if(q[0].xstatus == 'Created'){
				// $("#confirmbtn").empty();
				// $('<a href="javascript:void(0)" id="btnconf" onclick="btnconfclick();" class="btn btn-danger"><span class="glyphicon glyphicon-save"></span>&nbsp;Confirm</a>').appendTo("#confirmbtn");
				$("#printlink").empty();
				$('<a class="print-link no-print" style="text-align: center; color: red;" onclick="printdoc(\'#ele1\')">Print Invoice - '+sonum+'</a>').appendTo("#printlink");
			}else if(q[0].xstatus == 'Confirmed'){
				// $("#confirmbtn").empty();
				// $('<a href="javascript:void(0)" id="btncancel" onclick="btncancelclick();" class="btn btn-danger"><span class="glyphicon glyphicon-save"></span>&nbsp;Cencel Sales</a>').appendTo("#confirmbtn");
				$("#printlink").empty();
				$('<a class="print-link no-print" style="text-align: center; color: red;" onclick="printdoc(\'#ele1\')">Print Invoice - '+sonum+'</a>').appendTo("#printlink");
			}
			$('#xsonum').val(sonum);
			$('#xdate').val(q[0].xdate);
			$('#xcus').val(q[0].xcus);
			$('#xorg').val(q[0].xorg);
			$('#xnotes').val(q[0].xnotes);
						
		}, 'json');
		var utl = baseuri+"jsondata/getBooklistDt/"+sonum;
		$.get(utl, function(q){ 
			var dataload = [];
			debugger;
			if(q.length > 0){
				var subjectout = '';
				var classout = '';
				var arr = [];
				for(var i=0;i<q.length;i++){
					if((subjectout == q[i].xsubject && classout == q[i].xclass) || subjectout == ''){
						subjectout = q[i].xsubject;
						classout = q[i].xclass;
						arr.push({
							xitemcode: q[i].xitemcode, xdesc: q[i].xdesc, xbrand: q[i].xbrand, xqty: q[i].xqty, xmrp: q[i].xmrp, xdispct: q[i].xdispct, xcurconversion: q[i].xcurconversion, xschoolpur: q[i].xschoolpur, xschoolsale: q[i].xschoolsale, xdisc: q[i].xdisc, xrow: q[i].xrow
						});
					}else{
						dataload.push({
							'xsubjectname': subjectout,
							'xclass': classout,
							'SubGridData': arr
						});
						subjectout = q[i].xsubject;
						classout = q[i].xclass;
						arr = [];
						arr.push({
							xitemcode: q[i].xitemcode, xdesc: q[i].xdesc, xbrand: q[i].xbrand, xqty: q[i].xqty, xmrp: q[i].xmrp, xdispct: q[i].xdispct, xcurconversion: q[i].xcurconversion, xschoolpur: q[i].xschoolpur, xschoolsale: q[i].xschoolsale, xdisc: q[i].xdisc, xrow: q[i].xrow
						});
					}
				}
				dataload.push({
					'xsubjectname': subjectout,
					'xclass': classout,
					'SubGridData': arr
				});
				$('#tblAppendGrid').appendGrid('load', dataload);
				//$('#ItemTable').appendGrid('load', q);
			}
			// else
			// 	$('#ItemTable').appendGrid('load', [{ 'xitemcode': '', 'xdesc': '', 'xcur': '', 'xmrp': '', 'xcurconversion': '', 'xdis': '0', 'xqty': '' , 'xtotal': ''}]);

		}, 'json');
}



function deleteRow(tblname,lid){
	debugger;
	var sonum = $('#xsonum').val();
	var rownum = $('#'+tblname+'_xrow_'+lid).val();

	if(rownum != ""){
		var utl2 = baseuri+"booklist/deleteRow/"+sonum+"/"+rownum;
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
		var utl2 = baseuri+"booklist/confirmpost/"+sonum+"/"+disc+"/"+cus;
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
		var utl2 = baseuri+"booklist/cancelpost/"+sonum+"/"+disc+"/"+cus;
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

function loadBookTable(subval,subval2){
	debugger;
	
	$('#tblAppendGrid').appendGrid({
        caption: 'Book List',
        initRows: 5,
        hideButtons: {
            removeLast: true,
			insert: true,
			moveUp: true,
			moveDown: true,
			//remove: true
        },
        columns: [
            { name: 'xsubjectname', ctrlClass: 'select-sizing', display: 'Subject Name', type: 'select',ctrlOptions: subval },{ name: 'xclass', ctrlClass: 'select-sizing', display: 'Class', type: 'select',ctrlOptions: subval2 }
        ],
        useSubPanel: true,
        subPanelBuilder: function (cell, uniqueIndex) {
            // Create a table object and add to sub panel
            var subgrid = $('<table></table>').attr('id', 'tblSubGrid_' + uniqueIndex).appendTo(cell);
            // Optional. Add a class which is the CSS scope specified when you download jQuery UI
            subgrid.addClass('alternate');
            // Initial the sub grid
            subgrid.appendGrid({
                initRows: 3,
                hideRowNumColumn: true,
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
						//getTotalSalesAmount();
					});
				},
			columns: [
				{ name: 'xitemcode', display: 'Book Code', ctrlCss: { 'width': '120px'} },
				{ name: 'xdesc', ctrlClass: 'example-mail', display: 'Description', ctrlCss: { 'width': '270px', 'text-align': 'left' },
				onChange: function (evt, rowIndex) {
					var sd = (event.target.id).match(/\d+/g).map(Number);
					getItemdtSta(sd);
				} },
				{ name: 'xbrand', display: 'Author', ctrlCss: { 'width': '220px'},
				onClick: function (evt, rowIndex) {
					var sd = (event.target.id).match(/\d+/g).map(Number);
					getItemdtSta(sd);
				} },
				{ name: 'xqty', display: 'Qty', type: 'number', ctrlCss: { 'width': '60px', 'text-align': 'center' },
				onChange: function (evt, rowIndex) {
					var sd = (event.target.id).match(/\d+/g).map(Number);
					getItemdtSta(sd);
				} },
				{ name: 'xmrp', display: 'Face Val', type: 'number', ctrlCss: { 'width': '60px', 'text-align': 'center' },
				onChange: function (evt, rowIndex) {
					var sd = (event.target.id).match(/\d+/g).map(Number);
					getItemdtSta(sd);
				} },
				{ name: 'xdispct', display: 'Dis.', type: 'number', ctrlCss: { 'width': '60px', 'text-align': 'center' },
				onChange: function (evt, rowIndex) {
					var sd = (event.target.id).match(/\d+/g).map(Number);
					getItemdtSta(sd);
				} },
				{ name: 'xcurconversion', display: 'Convt.', type: 'number', ctrlCss: { 'width': '60px', 'text-align': 'center' },
				onChange: function (evt, rowIndex) {
					var sd = (event.target.id).match(/\d+/g).map(Number);
					getItemdtSta(sd);
				} },
				{ name: 'xschoolpur', display: 'Sc. Pur', type: 'number', ctrlCss: { 'width': '60px', 'text-align': 'center' } },
				{ name: 'xschoolsale', display: 'Sc. Sale', type: 'number', ctrlCss: { 'width': '60px', 'text-align': 'center' },
				onChange: function (evt, rowIndex) {
					var sd = (event.target.id).match(/\d+/g).map(Number);
					getItemdtSta(sd);
				} },
				{ name: 'xrow', display: 'xrow', type: 'hidden', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '110px'} },
				{ name: 'xdisc', display: 'xdisc', type: 'hidden', ctrlAttr: { maxlength: 100 }, ctrlCss: { width: '110px'} }
                ]
            });
        },
        subPanelGetter: function (uniqueIndex) {
            // Return the sub grid value inside sub panel for `getAllValue` and `getRowValue` methods
            return $('#tblSubGrid_' + uniqueIndex).appendGrid('getAllValue', true);
        },
        rowDataLoaded: function (caller, record, rowIndex, uniqueIndex) {
            // Check SubGridData exist in the record data
            if (record.SubGridData) {
                // Fill the sub grid
                $('#tblSubGrid_' + uniqueIndex, caller).appendGrid('load', record.SubGridData);
            }
        }
	});
};

function getItemdtSta(lid){
	debugger;
	var disc = 0;
	var exch = 0;
	var val = $('#tblSubGrid_'+lid[0]+'_xdesc_'+lid[1]).val();
	var res = val.split("*");
	if(res.length>1){
		var url = baseuri+"jsondata/getItem/"+res[1];
		$.get(url, function(o){ 
			debugger;
			$('#tblSubGrid_'+lid[0]+'_xbrand_'+lid[1]).val(o[0].xbrand);
			$('#tblSubGrid_'+lid[0]+'_xitemcode_'+lid[1]).val(o[0].xitemcode);
			//$('#tblSubGrid_'+lid[0]+'_xlongdesc_'+lid[1]).val(o[0].xlongdesc);
			$('#tblSubGrid_'+lid[0]+'_xdesc_'+lid[1]).val(o[0].xdesc);
			//$('#tblSubGrid_'+lid[0]+'_xcur_'+lid[1]).val(o[0].xcur);
			$('#tblSubGrid_'+lid[0]+'_xmrp_'+lid[1]).val(o[0].xmrp);

			if(o[0].xcur == "BDT"){
				disc = parseFloat($('#xdiscfor').val());
				exch = parseFloat(o[0].xcurconversion);
				$('#tblSubGrid_'+lid[0]+'_xcurconversion_'+lid[1]).val(o[0].xcurconversion);
				$('#tblSubGrid_'+lid[0]+'_xdispct_'+lid[1]).val($('#xdiscfor').val());
			}else if(o[0].xcur == "RS"){
				exch = parseFloat($('#xconvertfor').val());
				$('#tblSubGrid_'+lid[0]+'_xcurconversion_'+lid[1]).val($('#xconvertfor').val());
				$('#tblSubGrid_'+lid[0]+'_xdispct_'+lid[1]).val('0');
			}else{
				exch = parseFloat(o[0].xcurconversion);
				$('#tblSubGrid_'+lid[0]+'_xcurconversion_'+lid[1]).val(o[0].xcurconversion);
				$('#tblSubGrid_'+lid[0]+'_xdispct_'+lid[1]).val('0');
			}
			var qty = $('#tblSubGrid_'+lid[0]+'_xqty_'+lid[1]).val();
			var total = (parseFloat(o[0].xmrp*exch));
			var totaldis = (total*disc)/100;
			var nprice = total - totaldis;
			$('#tblSubGrid_'+lid[0]+'_xschoolpur_'+lid[1]).val(nprice);
			$('#tblSubGrid_'+lid[0]+'_xdisc_'+lid[1]).val(totaldis);
			//$('#StaTable_xnetdis_'+lid).val(totaldis);

			// getNetTotalSta(lid);
			// getTotalSalesAmount();

			}, 'json');
		}else{
			exch = parseFloat($('#tblSubGrid_'+lid[0]+'_xcurconversion_'+lid[1]).val());
			disc = parseFloat($('#tblSubGrid_'+lid[0]+'_xdispct_'+lid[1]).val());
			var qty = $('#tblSubGrid_'+lid[0]+'_xqty_'+lid[1]).val();
			var total = parseFloat($('#tblSubGrid_'+lid[0]+'_xmrp_'+lid[1]).val())*exch;
			var totaldis = (total*disc)/100;
			var nprice = total - totaldis;
			$('#tblSubGrid_'+lid[0]+'_xschoolpur_'+lid[1]).val(nprice);
			$('#tblSubGrid_'+lid[0]+'_xdisc_'+lid[1]).val(totaldis);
		}
}


function printdoc(id){

	var sonum = $('#xsonum').val();
	
	var utl = baseuri+"jsondata/getBookListReport/"+sonum;
	$.get(utl, function(q){
		debugger;
		var div = '';

		var currentTime = new Date(q[0].xdate);
		var month = ("0" + (currentTime.getMonth() + 1)).slice(-2);
		var day = ("0" + currentTime.getDate()).slice(-2);
		var year = currentTime.getFullYear();
		var sdt = day + '/' + month + '/' + year;

		
		div += '<div class="main-div" style=""><div style="text-align:center"><strong align="center" style="font-size:25px;color:#7030A0!important">'+ q[0].xorg +'</strong><br /><strong align="center" style="">Book List-'+year+'</strong></div>';


		if(q.length > 0){
			var dataload = [];
			debugger;
			if(q.length > 0){
				var classout = '';
				var clstotalpur = 0;
				var clstotalsale = 0;
				var arr = [];
				for(var i=0;i<q.length;i++){
					if((classout == q[i].xclass) || classout == ''){
						classout = q[i].xclass;
						clstotalpur += parseFloat(q[i].xschoolpur);
						clstotalsale += parseFloat(q[i].xschoolsale);
						arr.push({
							xitemcode: q[i].xitemcode, xdesc: q[i].xdesc, xbrand: q[i].xbrand, xqty: q[i].xqty, xmrp: q[i].xrate, xdispct: q[i].xdispct, xcurconversion: q[i].xexch, xschoolpur: q[i].xschoolpur, xschoolsale: q[i].xschoolsale, xdisc: q[i].xdisc, xrow: q[i].xrow, xsubject: q[i].xsubject, xlongdesc: q[i].xlongdesc
						});
					}else{
						dataload.push({
							'xclass': classout,
							'clstotalpur': clstotalpur,
							'clstotalsale': clstotalsale,
							'SubGridData': arr
						});
						classout = q[i].xclass;
						clstotalpur = parseFloat(q[i].xschoolpur);
						clstotalsale = parseFloat(q[i].xschoolsale);
						arr = [];
						arr.push({
							xitemcode: q[i].xitemcode, xdesc: q[i].xdesc, xbrand: q[i].xbrand, xqty: q[i].xqty, xmrp: q[i].xrate, xdispct: q[i].xdispct, xcurconversion: q[i].xexch, xschoolpur: q[i].xschoolpur, xschoolsale: q[i].xschoolsale, xdisc: q[i].xdisc, xrow: q[i].xrow, xsubject: q[i].xsubject, xlongdesc: q[i].xlongdesc
						});
					}
				}
				dataload.push({
					'xclass': classout,
					'clstotalpur': clstotalpur,
					'clstotalsale': clstotalsale,
					'SubGridData': arr
				});
			}


			if($(this).prop("checked") == true){
				
			}
			for(var i=0;i<dataload.length;i++){
				div += '<div style="margin-top:0px; text-align:center;"><strong style="">Class : '+dataload[i].xclass+'</strong></div>';
				div += '<table class="table table-bordered" cellspacing="0" width="100%" role="grid" aria-describedby="dtbl_info" style="width: 100%; font-size:11px;">'+
				'<thead><tr role="row" style="background-color: #92D050!important"><th>Subject</th>';
				
				if($('#cbdesc').prop("checked") == true)
					div += '<th style="width:300px" >Description</th>';
				if($('#cbauthor').prop("checked") == true)
					div += '<th>Author/Publication</th>';
				if($('#cbqty').prop("checked") == true)
					div += '<th>Qty</th>';
				if($('#cbfaceval').prop("checked") == true)
					div += '<th>Face Value</th>';
				if($('#cbconvt').prop("checked") == true)
					div += '<th>Convt</th>';
				if($('#cbdis').prop("checked") == true)
					div += '<th>Dis(%)</th>';
				//if($('#cbscpur').prop("checked") == true)
					div += '<th>School Purchase</th>';
				//if($('#cbscsale').prop("checked") == true)
					div += '<th>School Sale</th>';
				
				div += '</tr></thead><tbody>';
				var count = 0;
				var subj = '';
				$.each( dataload[i].SubGridData, function( key, value ) {
					var b = countElement(value.xsubject, dataload[i].SubGridData);
					div+='<tr role="row" class="odd">';

					if(subj != value.xsubject || subj == ''){
						div+='<td align="left" rowspan="'+b+'">'+value.xsubject+'</td>';
					}
					if($('#cbdesc').prop("checked") == true){
						if(value.xlongdesc == '' || value.xlongdesc==null)
							div+='<td align="left">'+value.xdesc+'</td>';
						else
							div+='<td align="left">'+value.xlongdesc+'</td>';
					}
					if($('#cbauthor').prop("checked") == true)
						div+='<td align="left">'+value.xbrand+'</td>';
					if($('#cbqty').prop("checked") == true)
						div+='<td align="center">'+value.xqty+'</td>';
					if($('#cbfaceval').prop("checked") == true)
						div+='<td align="center">'+value.xmrp+'</td>';
					if($('#cbconvt').prop("checked") == true)
						div+='<td align="center">'+value.xcurconversion+'</td>';
					if($('#cbdis').prop("checked") == true)
						div+='<td align="center">'+value.xdispct+'</td>';
					//if($('#cbscpur').prop("checked") == true)
						div+='<td align="center">'+value.xschoolpur+'</td>';
					//if($('#cbscsale').prop("checked") == true)
						div+='<td align="center">'+value.xschoolsale+'</td>';
						
					div+='</tr>';
					count++;
					subj = value.xsubject;
				  });
				  debugger;
				var len = $(".frmcheck:checked").length;
				div+='<tr><td colspan="'+(parseInt(len)+1)+'" align="right">Total : </td>';
				//if($('#cbscpur').prop("checked") == true)
					div+='<td align="center">'+(dataload[i].clstotalpur).toFixed(2)+'</td>';
				//if($('#cbscsale').prop("checked") == true)
					div+='<td align="center">'+(dataload[i].clstotalsale).toFixed(2)+'</td></tr>';
				div+='</tbody></table>';
			}
		}


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
function countElement(item,array) {
	//debugger;
    var count = 0;
    $.each(array, function(i,v) { if (v.xsubject === item) count++; });
    return count;
};
function classTotal(item,array) {
	//debugger;
    var count = 0;
    $.each(array, function(i,v) { if (v.xsubject === item) count++; });
    return count;
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