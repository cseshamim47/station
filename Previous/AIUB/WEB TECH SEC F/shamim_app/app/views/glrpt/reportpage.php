<div class="panel">
	<div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
	<?php echo $this->breadcrumb; ?>
	<div id="printdiv"> 
		<div class="panel-heading">	
			<div style="text-align: center;">
				<img src="<?php echo URL;?>public/images/company_header.jpg" width="100%" height="100">
				<h5><strong><?php echo $this->vrptname; ?></strong></h5>
				<h5><strong>From <?php echo $this->vfdate; ?> To <?php echo $this->vtdate; ?></strong></h5>	
			</div>
		</div>
		<div class="panel-body" >
			<?php echo $this->table;?>
		</div>
		<div style="text-align: center;">
			<img src="<?php echo URL;?>public/images/company_footer.jpg" width="100%" height="80">
		</div>
	</div>
</div>
