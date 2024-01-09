$(function(){
	
	 $("#showmap").click(function() {
		var det = $("#finddate").val().replace("/","");
			det = det.replace("/","");		
		var usr = $("#user").val();
	var url = baseuri+"movementmap/getcusgeoloc/"+usr+"/"+det;
		
		$.get(url, function(o){
			//var myCenter = new google.maps.LatLng(51.508742,-0.120850);
  var mapCanvas = document.getElementById("map");
  //var mapOptions = {center: myCenter, zoom: 5};
  var map = new google.maps.Map(document.getElementById('map'), {
		zoom: 17,
		center: new google.maps.LatLng(Number(o[0].xlt),Number(o[0].xln)),
		mapTypeId: google.maps.MapTypeId.ROADMAP
	});
  var marker;
			$(o).each(function(i,e){
				
			var cHour = o[i].xtime.toString();  
			marker = new google.maps.Marker({
			position: new google.maps.LatLng(Number(o[i].xlt),Number(o[i].xln)),
			label : cHour,
			map: map
			});
			
		});		
		marker.setMap(map);	
			}, 'json');	
		
  	
	 });
 
});;;