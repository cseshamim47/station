
$(function(){ 
	$('#row4').hide();
	$('#row5').hide();

	if($('#xrcvby').val()=="Bank"){
		$('#row4').show();
		$('#row5').show();
	}else if($('#xrcvby').val() != "Bank"){
		$('#row4').hide();
		$('#row5').hide();
	}

	var acccr = "";		
	$('#xacccr').blur(function(){ 	
	
		acccr = $(this).val();
		var url = baseuri+"gljvvou/getaccdt/"+acccr;
		//$('#xitemdesc').val(url);
		
		$.get(url, function(o){ 
					$('#xacccrdesc').val(o[0].xdesc);
					$('#xacccrtype').val(o[0].xacctype);
					$('#xacccrusage').val(o[0].xaccusage);
					$('#xacccrsource').val(o[0].xaccsource);
					
			}, 'json');
	});
});
function changeValue() {
	if (document.getElementById('xrcvby').checked == true) {
        document.getElementById('row4').style.display = 'none';
        document.getElementById('row5').style.display = 'none';
    }else{
		document.getElementById('row4').style.display = 'block';
        document.getElementById('row5').style.display = 'block';
	}
  };;