$(function(){
	
	var tot = 0;
	tot = $('#gtotal').val();
	$('#invtotal').text(tot);
	if ($('#invtotal').text()=="0.00")
		$('.bank').attr('disabled',true);
	
	
	$('.bank').click(function(){ 
		$('.xcardamt').val("0");
		$('.xcashamt').val("0");
		$('.xdisc').val("0");
		var type = $(this).attr('id');
		if(type=='Cash'){
			$('.xcardamt').hide();
			$('.xdisc').hide();
			$('.xcashamt').show();
		}
		if(type!='Cash' && type!='Discount'){
			$('.xcardamt').show();
			$('.xcashamt').hide();
			$('.xdisc').hide();
		}
		if(type=='Discount'){
			$('.xdisc').show();
			$('.xcardamt').hide();
			$('.xcashamt').hide();
		}
		
		$('#xbank').val(type);
		
		$('#imsenum').val($('#invnum').text());
		
		$('#invdate').val($('#xdate').val());
	});
	
	
		
	
	$('#btnrowentry').click(function(){
		
		var murl = $('#modalform').attr('action');
		var data = $('#modalform').serialize();
		var rowCount = $('#tbldetail tr').length;
		
		$.ajax({
    		type: "POST",
			url: murl,
			data: data,
        		success: function(msg){
					$("#exampleModal").modal('hide');	
 		        }
			})
			.done(function (o) { 
            var json = $.parseJSON(o);
			var str = "";
				$(json).each(function(i,val){ 
					var tr = '<tr id="row-'+ val.xrow +'" style="color:red;">';
					if(val.xbank=="Discount"){
						var prevtot = $('#invtotal').text();
						var afterdisc = prevtot-val.xamt;
						$('#invtotal').text(afterdisc);
					}
						
					$.each(val,function(k,v){
						if(!isNaN(v))
							if ((v+"").match(/^\d+$/))
								tr += '<td><strong>'+ v +'</strong></td>';
							else
								tr += '<td><strong>'+ parseFloat(v).toFixed(2) +'</strong></td>';
						else
							tr += '<td><strong>'+ v +'</strong></td>';
						       
					});
					tr += '<td><button id="btndel" data-id="'+ val.xrow +'" class="btn btn-danger">X</button></td></tr>';
					
					
						$('#tbldetail > tbody').append(tr);
					
				});
				
            }, 'json');
			
		return false;
	});
	
});;;