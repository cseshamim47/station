
function showitem(post)	{
	var xpost=post; 
		$.get(xpost, function(o){ 
					debugger;
					$('#xitemcode').val(o[0].xitemcode);
					$('#xdesc').val(o[0].xitemdesc);
					$('#xqty').val(o[0].xbal);	
					$('#xrate').val(o[0].xrate);					
					$('#xrow').val(o[0].xrow);
					
			}, 'json');
};;