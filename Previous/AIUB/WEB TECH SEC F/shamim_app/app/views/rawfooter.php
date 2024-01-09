
   <script src="<?php echo URL; ?>public/js/jquery.min.js"></script>
    <script src="<?php echo URL; ?>public/bootstrap/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<script src="<?php echo URL; ?>public/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo URL; ?>public/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo URL; ?>public/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo URL; ?>public/js/jquery.validate.js"></script>
	<script src="<?php echo URL; ?>public/js/default.js"></script>
	
	
	
	<?php 
		if(isset($this->js)){
			foreach($this->js as $js){
				echo '<script src="'.URL.$js.'"></script>';
			}
		}
	?>
	<script>
				
			$(function() { 
				// for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
				$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
					// save the latest tab; use cookies if you like 'em better:
					localStorage.setItem('lastTab', $(this).attr('href'));
				});

				// go to the latest tab, if it exists:
				var lastTab = localStorage.getItem('lastTab');
				if (lastTab) {
					$('[href="' + lastTab + '"]').tab('show');
				}
			});
		$(function () {
			
                $('.datepicker').datepicker({
                    format: "dd/mm/yyyy",
					todayHighlight: true,
					"autoclose": true,
					changeMonth: true,
					changeYear: true
					
                });  
				//$(".datepicker").datepicker("setDate", new Date());
				
            });
			
		function loadIframe(iframeName, url) {
		     var random=(new Date()).getTime() + Math.floor(Math.random() * 1000000);
		     var furl = url+"/"+random; 
			var $iframe = $('#' + iframeName);
			if ( $iframe.length ) {
				$iframe.attr('src',furl); 
			
				return false;
			}
		
			return true;
		}
		
		function popupCenter(url, title, w, h) {
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
        }
		function post_value(xval, kval){
			var kv = kval;
			if (window.opener != null && !window.opener.closed) {
				var oval = xval;
				window.opener.document.getElementById(kv).value=oval;
				window.opener.document.getElementById(kv).focus();
				var modalcode = window.opener.$('#exampleModal').attr('class');
				if(modalcode!=""){
					window.opener.$('#exampleModal').find('#'+kv).val(oval);
				}		
				//alert(oval);
			}
		window.close();
		}
		
		function showPost(post){
			var xpost=post;
			
			  $("#dynamicfrm").attr("action", xpost);
			  $("#dynamicfrm").submit();
			
		}
		
		
		/*$(function(){
			$('a').click(function(){
				 alert($(this).attr("id"));
			 });
				//window.parent.$("#result").text("testint");
			
		});*/
	</script>

    </body>
</html>