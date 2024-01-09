$(function(){
	$('head').append('<style>body *{visibility: visible !important;} .table-sm>tbody>tr>td, .table-sm>tbody>tr>th, .table-sm>tfoot>tr>td, .table-sm>tfoot>tr>th, .table-sm>thead>tr>td, .table-sm>thead>tr>th {padding: 0;font-size:11px;border: 1px dotted #ddd !important;border-collapse: collapse;}</style>');
	$(document).on('click', '.printbtn',function(){
		
		$('#printdiv').hide();
		$('#printdiv').empty();
		
		var tr = $(this).parent().parent();
		var cus = tr.find('#xcus').val();
		var xdate = tr.find('#xdate').val();
		
		var url = baseuri+"installmentcollection/getstudentfees/"+cus+"/"+xdate;
		var tr ='';
		
// 		var div = "";		
// 		$.get(url, function(o){		

// 			var monthname = monthNumToName(xmonth);	
			
// 			div += '<div style="text-align:center;margin-top:-63px; line-height:1px;"><h3>'+bizname+'</h3>';
// 			div += '<p>'+bizadd+'</p>';
// 			div += '<p>Branch: '+branch+'</p></div>';
// 			div += '<div><table style="width:80%;text-align:left; margin: 0 auto; "><tr><td>Student ID</td><td>:&emsp;'+o[0].xstudentid+'</td><td>Name</td><td>:&emsp;'+o[0].xstuname+'</td><td>Class</td><td>:&emsp;'+o[0].xclass+'</td>';
// 			div += '<tr><td>Shift</td><td>:&emsp;'+o[0].xshift+'</td><td>Section</td><td>:&emsp;'+o[0].xsection+'</td><td>Roll</td><td>:&emsp;'+o[0].xroll+'</td></tr></table></div>';
// 			div += '<div style="margin-left:80px">Fees Detail For Month of '+monthname+' : </div>';
// 			div += '<table class="table-sm" style="width:80%; margin:0 auto;">';
// 			div += '<head><th style="">Head</th><th style="padding: 0;">Amount</th><th style="padding: 0;">Amount</th></head><tbody>';
// 			var total = 0;
// 			for(var i=0; i<o.length; i++){	
				
// 				if(o[i].xhead != 'Cash' && o[i].xhead != 'Fees Waiver'){
// 					div += '<tr><td>'+o[i].xhead+'</td><td>'+o[i].xamount+'</td><td></td></tr>';
// 					total += parseFloat(o[i].xamount);
// 				}
				
// 			}
// 			div += '</tbody>';
			
			
// 			for(var i=0; i<o.length; i++){	
							
				
// 				 if	(o[i].xhead == 'Fees Waiver'){
// 					div += '<tr><td>Waiver</td><td></td><td>'+o[i].xamount+'</td></tr>';
// 					total -= parseFloat(o[i].xamount); 	
// 				 }
// 			}
// 			div += '<tfoot><tr><td colspan="2" align="right"><strong>Total : </strong></td><td><strong>'+total+'</strong></td></tr>';
// 			div += '</tfoot></table>';
// 			div += '<table class="table-sm" style="width:80%; margin:0 auto;">';
// 			div += '<div style="margin-left:78px">Collection Detail :</div>';	
// 			var total = 0;
// 			var deu = 0;
// 			for(var i=0; i<o.length; i++){	
				
// 				if(o[i].xhead == 'Cash'){
// 					div += '<tr><td>'+o[i].xdate+'</td><td>'+o[i].xamount+'</td></tr>';
// 					total += parseFloat(o[i].xamount);
// 				}
// 					due = parseFloat(o[i].xbalance);
				
// 			}
// 			div += '</tbody>';
// 			div += '<tfoot><tr><td align="right"><strong>Total Collection : </strong></td><td><strong>'+total+'</strong></td></tr>';
// 			div += '<td align="right"><strong>Total Due : </strong></td><td><strong>'+due+'</strong></td></tr>';
// 			div += '</tfoot></table>';
// 			div += '<p style="margin-top: 35px;float:right; margin-right:100px; display: inline-block; border-top: 1px solid;font-size:11px;"><b>Authorities Singnature</b></p>';
			
// 			$('#printdiv').append(div);
// 			var printContents = document.getElementById('printdiv').innerHTML;
// 			var originalContents = document.body.innerHTML;

// 			 document.body.innerHTML = printContents;

// 			 window.print();

// 			 document.body.innerHTML = originalContents;
						
// 			}, 'json');			
			
// 	});
// });

// var months = [
//     'January', 'February', 'March', 'April', 'May',
//     'June', 'July', 'August', 'September',
//     'October', 'November', 'December'
//     ];

// function monthNumToName(monthnum) {
//     return months[monthnum - 1];
};
;;