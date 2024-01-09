// $(function(){
// 	$('#xitemcode').blur(function(){
// 		getPO(this.value);
// 	});
// 	var obj = document.getElementsByName('xwh');
// 	$(obj).on('change', function() {
// 		alert( $(this).find(":selected").val() );
// 	});
// })
function showitem(post)	{
	debugger;
	var xpost=post; 
	$.get(xpost, function(o){ 
				debugger;
				$('#xitemcode').val(o[0].xitemcode);
				$('#xdesc').val(o[0].xitemdesc);
				$('#xqty').val(o[0].xbal);
				$('#xrow').val(o[0].xrow);
				$(document.getElementsByName('xwh')).empty();
				$(document.getElementsByName('xwh')).append($('<option>', {value: o[0].xwh, text: o[0].xwh}));
				$(document.getElementsByName('xwh')).val(o[0].xwh);
				
		}, 'json');
}

// function getPO(code){
// 	debugger;
// 	var url=baseuri+'jsondata/getPO/'+code;
// 	var obj = document.getElementsByName('xwh');
// 	$.get(url, function(response){ 
// 		debugger;
// 		$(obj).empty();
// 		$(obj).append($('<option>', {
// 			value: '0',
// 			text: 'Select'
// 		}));
// 		for (var i = 0; i < response.length; i++) {
// 			var opt = new Option(response[i].xponum, response[i].xponum);
// 			$(obj).append(opt);
// 		}
// 	}, 'json');
// };;