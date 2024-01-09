
function showitem(post)	{
	var xpost=post; 		
		$.get(xpost, function(o){ 
				
					$('#xitemcode').val(o[0].xitemcode);
					$('#xdesc').val(o[0].xitemdesc);
					$('#xreqqty').val(o[0].xqty);
					$('#xratepur').val(o[0].xratepur);
				
			}, 'json');
};;