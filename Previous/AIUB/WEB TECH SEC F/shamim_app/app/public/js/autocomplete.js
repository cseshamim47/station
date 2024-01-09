function loadData(id,url){
	$( "#"+id ).autocomplete({
		source: function( request, response ) {
		  $.ajax( {
			url: baseuri+url+'/'+request.term,
			dataType: "json",
			success: function( data ) {
			  response( data );
			}
		  });
		},
		minLength: 2,
		select: function( event, ui ) {
		  selectItem(ui.item);
		}
	} );
};;