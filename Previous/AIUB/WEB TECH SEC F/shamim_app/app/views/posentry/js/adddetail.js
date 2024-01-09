$(function(){
            $('#add').click(function(){
                addnewrow();
            });
            $('body').delegate('.remove','click', function(){
                $(this).parent().parent().remove();
                
                var r = 1;

                $('.detail tr').each(function(i,e){
                    $(this).find('.no').html(r);
                    r++;    
                });
                
            });
            $('.detail').delegate('.xqty,.xrate,.xvat,.xdisc','keyup', function(){ 
                var tr = $(this).parent().parent();
                var qty = tr.find('.xqty').val();
                var rate = tr.find('.xrate').val();
				var vat = tr.find('.xvat').val();               
                var discount = tr.find('.xdisc').val();
                var amt = ((qty*rate)+(qty*rate*vat)/100)-(qty*rate*discount)/100; 
                tr.find('.xtotal').val(amt);
                total();
            });
        });

        function total(){
            var t = 0;
            $('.xtotal').each(function(i,e){
               var amt = $(this).val()-0;
               t += amt;     
            });
            $('.total').html(t);
        }

        function addnewrow(){
            var n = ($('.detail tr').length-0)+1;
			var vtr = $('.detail tr').html();
            /*var tr = '<tr>'+
                        '<td class="no">' + n + '</td>'+
                        '<td><input type="text" class="form-control productname" name="productname[]"></td>'+
                        '<td><input type="text" class="form-control quantity" name="quantity[]"></td>'+
                        '<td><input type="text" class="form-control price" name="price[]"></td>'+
                        '<td><input type="text" class="form-control discount" name="discount[]"></td>'+
                        '<td><input type="text" class="form-control amount" name="amount[]"></td>'+
                        '<td><a href="#" class="remove">Delete</a></td>'+
                    '</tr>';*/
                    //$('.price').attr('disabled',true);
                    //$('.amount').attr('disabled',true);
          $('.detail').append('<tr>'+vtr+'</tr>');
        };
$(document).ready(function(){
$("li").find("#ico").html('<span class="glyphicon glyphicon-folder-close"></span>&nbsp;');
  $(".collapse").on("hide.bs.collapse", function(){
    $(this).parent().find("#ico").html('<span class="glyphicon glyphicon-folder-close"></span>&nbsp;');
  });
  $(".collapse").on("show.bs.collapse", function(){
    $(this).parent().find("#ico").html('<span class="glyphicon glyphicon-folder-open"></span>&nbsp;');
  });
}); ;;