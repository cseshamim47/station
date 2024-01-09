
function showitem(post)	{
	var xpost=post; 
		$.get(xpost, function(o){ 
					
					$('#xitemcode').val(o[0].xitemcode);
					$('#xdesc').val(o[0].xitemdesc);
					$('#xqty').val(o[0].xbal);					
					$('#xrow').val(o[0].sosl);
					$('#xrate').val(o[0].xrate);
			}, 'json');
};;