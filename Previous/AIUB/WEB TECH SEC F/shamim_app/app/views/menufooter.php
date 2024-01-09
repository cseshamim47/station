</section>
<!-- /.content -->
  </div>
	<!-- /.content-wrapper -->
	<footer class="main-footer">
		<div class="pull-right hidden-xs">
		  <b>Version</b> 1.2
		</div>
		<strong>Copyright &copy; 2017-2018 <a href="https://dotbdsolutions.com">Dot BD Solutions</a>.</strong> All rights
		reserved.
	</footer>
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Create the tabs -->
		<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
		  <!-- Home tab content -->
		  <div class="tab-pane" id="control-sidebar-home-tab">

		  </div>
		  <!-- Settings tab content -->
		  <div class="tab-pane" id="control-sidebar-settings-tab">
			
		  </div>
		  <!-- /.tab-pane -->
		</div>
	</aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
 
<!-- jQuery 3 -->
<script src="<?php echo URL; ?>public/theme/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<!-- <script src="<?php echo URL; ?>public/theme/bower_components/jquery-ui/jquery-ui.min.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo URL; ?>public/theme/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo URL; ?>public/theme/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo URL; ?>public/theme/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo URL; ?>public/theme/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo URL; ?>public/theme/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo URL; ?>public/theme/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo URL; ?>public/theme/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo URL; ?>public/theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo URL; ?>public/theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo URL; ?>public/theme/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo URL; ?>public/theme/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo URL; ?>public/theme/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo URL; ?>public/theme/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo URL; ?>public/theme/dist/js/demo.js"></script>
<!-- Old Js -->
<script src="<?php echo URL; ?>public/js/jquery.dataTables.min.js"></script>
<script src="<?php echo URL; ?>public/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo URL; ?>public/js/jquery.validate.js"></script>



<script src="<?php echo URL; ?>public/theme/extra/highcharts.js"></script>
<script src="<?php echo URL; ?>public/theme/extra/highcharts-more.js"></script>
<script src="<?php echo URL; ?>public/theme/extra/exporting.js"></script>
	
	
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
		     var random=(new Date()).getTime() + Math.floor(Math.random() * 1000000);
		     var furl = url+"/"+random; 
			var $iframe = $('#' + iframeName);
			if ( $iframe.length ) {
				$iframe.attr('src',furl); 
			
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
