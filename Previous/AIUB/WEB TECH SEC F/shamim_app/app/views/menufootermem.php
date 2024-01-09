</div>
    </div>
   
    
    <script src="<?php echo URL; ?>public/js/jquery.min.js"></script>
    <script src="<?php echo URL; ?>public/bootstrap/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<script src="<?php echo URL; ?>public/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo URL; ?>public/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo URL; ?>public/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo URL; ?>public/js/jquery.validate.js"></script>
	
	
	<?php 
		if(isset($this->js)){
			foreach($this->js as $js){
				echo '<script src="'.URL.$js.'"></script>';
			}
		}
	?>
	<script>
	
			//to stay current tab after page refresh
			/*$(function() { 
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
			});*/
		$(function() { 
				// for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
					
				$('a[data-toggle="collapse"]').on("click", function(){
					
					localStorage.setItem('lastMenu', $(this).attr('href'));
					
				});
				var lMenu = localStorage.getItem('lastMenu');
				
				$(lMenu).collapse('show');
				
			});
			
		/*$(function () {
                $('.datepicker').datepicker({
                    format: "dd/mm/yyyy",
					todayHighlight: true,
					"autoclose": true
                });  
				$(".datepicker").datepicker("setDate", new Date());
				
            });*/
			
		function loadIframe(iframeName, url) {
			var $iframe = $('#' + iframeName);
			if ( $iframe.length ) {
				$iframe.attr('src',url);   
				return false;
			}
			
			return true;
		}
		/*$(function(){
			//$('#itemcode').text("test");
			
			var itemcode = $('#itemcode').text();
			if(!itemcode){
				//to disable tab
				document.getElementById('disabled').style.pointerEvents = 'none';
				document.getElementById('disabled').style.color = 'gray';
			}else{
				//to enable tab
				document.getElementById('disabled').style.color = 'black';
				document.getElementById('id').style.pointerEvents = 'auto'; 
			}
			
		});*/
		
		function AdjustIframeHeightOnLoad() { 
		document.getElementById("helpframe").style.height = document.getElementById("helpframe").contentWindow.document.body.scrollHeight + "px"; 
		}
		
		function AdjustIframeHeight(i) { 
		document.getElementById("helpframe").style.height = parseInt(i) + "px"; 
		}
		
		 //	window.parent.document.getElementById('#target');
		
		
	</script>
	<script src="<?php echo URL; ?>public/js/collapse.js"></script>

    </body>
</html>
