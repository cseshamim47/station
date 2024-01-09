
function showitem(post)	{
	var xpost=post; 
		$.get(xpost, function(o){ 
					$('#ximreqnum').val(o[0].ximreqnum);
					$('#xitemcode').val(o[0].xitemcode);
					$('#xdesc').val(o[0].xitemdesc);
					$('#xqty').val(o[0].xbal);					
					$('#xrow').val(o[0].xrow);
			}, 'json');
};;