$(document).ready(function(){
	$('#dtbl').dataTable({
		"pageLength": 50,
		"order": [[ 0, "desc" ]]	
	});
	$('#cls').click(function(){
		$('#xcode').val('');
		$('#xdesc').val('');
	});
	
	$('.table #delbtn').click(function(){
		var x=window.confirm("Are you sure?")
		if (x)
			return true
		else
			return false
	}); 
});

;;