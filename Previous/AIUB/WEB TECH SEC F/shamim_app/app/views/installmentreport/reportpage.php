
<style>
	
</style>
<div class="panel">
            <div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
			<?php echo $this->breadcrumb; ?>
			<div id="printdiv"> 
			<div class="panel-heading">			
			
                <div style="text-align: center;">
                    <h4 style="font-size: 40px;"><strong><?php echo $this->org; ?></strong></h4>
                    <h5 style="font-size: 14px;"><strong><?php echo $this->add1; ?></strong></h5>
					<h5 style="font-size: 20px;"><strong><?php echo $this->vrptname; ?></strong></h5>
					<h5><strong>From <?php echo $this->vfdate; ?> To <?php echo $this->vtdate; ?></strong></h5>	
                </div>
			</div>
            <div class="panel-body" >
            	<?php if($this->tabletitle != ""){ ?>
					<b style="font-size:16px;"><p style="margin-bottom:10px"><?php echo $this->tabletitle ?></p></b>
				<?php } ?>
				<?php echo $this->table;?>
			</div>
			</div>
        </div>

