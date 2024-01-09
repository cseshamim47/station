$(document).ready(function (e) {
	var department = baseuri+"jsondata/getAccHead/Expenditure";
	var $dept = $("select[name='xcat']");
	$.get(department, function(o){
		console.log(o);
		for(var i = 0; i < o.length; i++){ 					
			$dept.append($('<option>', {value: o[i].xdesc, text: o[i].xdesc}));
		}
	}, 'json');

})