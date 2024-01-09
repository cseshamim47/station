<div class="panel">
	<div style="float: right;margin-top: -40px;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
	<ul class="breadcrumb" style="margin: -40px 0px 5px 0px;">
		<!-- <li><a href="'.URL.'showroutine/routinlist">Filter</a></li> -->
		<li class="active">Routine</li>
	</ul>
	<div id="printdiv">
		<div class="panel-heading">		
			<div style="text-align: center;">
				<h4><strong><?php echo $this->org; ?></strong></h4>
				<h5><strong>Class Routine</strong></h5>
				<h5><strong><?php echo $this->class; ?></strong></h5>
			</div>
		</div>
		<div class="panel-body table-responsive" style="padding: 0px;" >
	 		<?php echo $this->table;?>
	 	</div>
	</div>
</div>