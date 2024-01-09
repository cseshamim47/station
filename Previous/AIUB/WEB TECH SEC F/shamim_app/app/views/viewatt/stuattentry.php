<div class="row">
		 <div class="col-sm-12">
			<?php echo $this->dynform;?>
		</div>
</div>
<div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
	<ul class="breadcrumb">
		<li class="active">Daily Attendance Report</li>
	</ul>
<div id="printdiv">
<div class="panel-body">
    <div class="table-responsive">
	    <?php echo $this->atttable;?>
    </div>
</div>
</div>
	