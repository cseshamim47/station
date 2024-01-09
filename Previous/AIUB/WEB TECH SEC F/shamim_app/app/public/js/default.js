$(document).ready(function(){
		$sel = $('.jqueryselect').children('#prefixcode');
		var urlid = $sel.parent('.jqueryselect').children('#codetype').val();
		var sz = $sel.children('option').size();
		var url = baseuri+"appcodes/getCodeByType/"+urlid; //alert(url);
		var $this = $sel;
		if(sz < 2){
			$.get(url, function(o){ 
				
				for(var i = 0; i < o.length; i++){
					$sel.append($('<option>', {value: o[i].xcode, text: o[i].xcode}));
				}
			}, 'json');
		}
});

$(function(){
	
	$('.jqueryselect').children('#codeselect').click(function(){
		
		var urlid = $(this).parent('.jqueryselect').children('#codetype').val();
		var sz = $(this).children('option').size();
		var url = baseuri+"appcodes/getCodeByType/"+urlid;
			
		var $this = $(this);
		if(sz < 2){
			$.get(url, function(o){ 
				$this.append($('<option>', {value: '', text: ''}));
				for(var i = 0; i < o.length; i++){
					if(urlid=="zrole"){
						
						$this.append($('<option>', {value: o[i].zrole, text: o[i].zrole}));
					}
					else{
						
						$this.append($('<option>', {value: o[i].xcode, text: o[i].xcode}));
					}
				}
			}, 'json');
		}
	});
	
		

	$('.frmcheck').on('change', function() {
			$(this).parent().parent().children().children('#checkval').val(this.checked ? "1" : "0");
		});  
		
	
});
;;