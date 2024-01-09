 <div class="panel">
    <div class="panel-heading">
	<div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
	<?php echo $this->breadcrumb; ?>
        <div style="text-align: center;">
            <h4><strong><?php echo $this->org; ?></strong></h4>
			<h5><strong>Process Student Attendance</strong></h5>
			<h5><strong>Class: <?php echo $this->vclass; ?>  Section:<?php echo $this->vsection; ?>  Shift:<?php echo $this->vshift; ?>  Year:<?php echo $this->vyear; ?></strong></h5>	
        </div>
	</div>
    <div class="panel-body" >
		<?php echo $this->arrform;?>
	</div>
</div>
