$(function(){

	$("#divloc").on('click', '#showlocations', function () { 
	 //$("#showlocations").click(function() {
	    
	    $('#mytbl tbody > tr').remove(); 
		var det = $("#finddate").val().replace("/","");
			det = det.replace("/","");		
		var usr = $("#user").val();
	var xurl = baseuri+"movementmap/getcusgeoloc/"+usr+"/"+det;
		
		$.get(xurl, function(o){
					  
			$(o).each(function(i,e){
			var tr = '<tr>'+
                        '<td class="no">' + o[i].xtime.toString() + '</td>';
                        	
			
			var clt = o[i].xlt.toString();
			var cln = o[i].xln.toString();	
			var locurl = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+Number(clt)+","+Number(cln)+"&key=AIzaSyBCJ93b725sUO4Hn4vG9vreEcZdT25-NdM";
			
			$.get(locurl, function(o){
				
				tr += '<td class="no">' + o['results'][0].formatted_address + '</td>';
				$('#mytbl').append(tr);
				
			}, 'json');
			
			
			
		});		
		
			}, 'json');	
  	    
	 });
	
 
});;;