$(function(){
	var dcls = $('#decimal').val();
	var hiddenval = $('#headerhidden').val();
	if(hiddenval=="")
		$("#dtadd").prop('disabled',true);
	
		
		var keyname = $('#headerhidden').attr('name');
		var keyval = $('#'+keyname).val();
		
		var url = $('#geturl').val();
		
		var editurl = $('#editurl').val();
		
		var urlforedit = editurl+keyval;
		var urlwithid = "";
		
		$.get(url+keyval, function(o){
		//alert(o[0].xitemcode);
			for(var j = 0; j < o.length; j++){
				//alert(Object.keys(o[j]));
				var arr = Object.keys(o[j]);
				var tr = '<tr id="row-'+ o[j].xrow +'">';
					for(var i=0; i<arr.length; i++){
						if(!isNaN(o[j][arr[i]]))
							if ((o[j][arr[i]]+"").match(/^\d+$/))
								tr += '<td>'+ o[j][arr[i]] +'</td>';
							else
								tr += '<td>'+ parseFloat(o[j][arr[i]]).toFixed(dcls) +'</td>';
						else
							tr += '<td>'+ o[j][arr[i]] +'</td>';	
					} 
				tr += '<td><button id="btneditdt" data-id="'+ o[j].xrow +'"  data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Edit</button></td></tr>';
				//alert(tr);	
				$('#tbldetail > tbody').append(tr);
				
			}
			
		}, 'json');
		
			
	
    $('#frmdynamicdt').submit(function(e){
		e.preventDefault();
		if($(this).valid() == false){
			return;
		}	
		
        var url = $(this).attr('action');
        var data = $(this).serialize();
					
        //alert(data);
        $.post(url, data, function(o){
			//alert(Object.keys(o[0]).length);
			var arr = Object.keys(o[0]);
			var tr = '<tr id="row-'+ o[0].xrow +'">';
			for(var i=0; i<arr.length; i++){
				if(!isNaN(o[0][arr[i]]))
					if ((o[0][arr[i]]+"").match(/^\d+$/))
						tr += '<td>'+ o[0][arr[i]] +'</td>';
					else
						tr += '<td>'+ parseFloat(o[0][arr[i]]).toFixed(dcls) +'</td>';
				else
					tr += '<td>'+ o[0][arr[i]] +'</td>';	
			}
			tr += '<td><button id="btneditdt"  data-toggle="modal" data-target="#exampleModal" data-id="'+ o[0].xrow +'" class="btn btn-primary">Edit</button></td></tr>';
			//alert(tr);	
            $('#tbldetail > tbody').append(tr);
			
						
        },'json');

        return false;
		
    });
	
	
	$(document).on('click', '#btneditdt', function(){
						
		var id = $(this).attr('data-id');
		urlwithid = urlforedit+'/'+id;
		$('#modalform').find('[id="txnnum"]').val(keyval).end();
		$('#modalform').find('[id="txnrow"]').val(id).end();
		$.get(urlwithid, function(o){
			
			var arr = Object.keys(o[0]);
			for(var i=0; i<arr.length; i++){
				if(!isNaN(o[0][arr[i]]))
					if ((o[0][arr[i]]+"").match(/^\d+$/))
						   $('#modalform').find('[name="'+ arr[i] +'"]').val(o[0][arr[i]]).end();
						else
							$('#modalform').find('[name="'+ arr[i] +'"]').val(parseFloat(o[0][arr[i]]).toFixed(dcls)).end();
				else 
					$('#modalform').find('[name="'+ arr[i] +'"]').val(o[0][arr[i]]).end();
						
			}
		}, 'json');	
		
		$('#exampleModal').on('show.bs.modal', function (event) {
		
		});		
	});
	
	
	
	$('#btnrowupdate').click(function(){
		var trow = $('#txnrow').val();
		
		var murl = $('#modalform').attr('action');
		var data = $('#modalform').serialize();
		var rowCount = $('#tbldetail tr').length;
		$('#tbldetail #row-'+trow).remove();
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
					var tr = '<tr id="row-'+ val.xrow +'">';
					$.each(val,function(k,v){
						if(!isNaN(v))
							if ((v+"").match(/^\d+$/))
								tr += '<td>'+ v +'</td>';
							else
								tr += '<td>'+ parseFloat(v).toFixed(dcls) +'</td>';
						else
							tr += '<td>'+ v +'</td>';
						       
					});
					tr += '<td><button id="btneditdt"  data-toggle="modal" data-target="#exampleModal" data-id="'+ val.xrow +'" class="btn btn-primary">Edit</button></td></tr>';
					
					
						$('#tbldetail > tbody').append(tr);
					/*if(rowCount>1){
						
						//$('#row-'+trow).before(tr);
						$(this).parents('tr').next().find('tr').attr('id').before(tr);
					}
					*/
				});
			
            }, 'json');
		return false;
	});
	
});;;