<!-- <head>
	<link rel="stylesheet" href="<?php echo URL; ?>public/css/autocomplete.css">
</head>	 -->
<div class="row">
		 <div class="col-sm-6" style="padding-right: 5px;">
			<?php echo $this->dynform; ?>			
		  </div>
		  <div class="col-sm-6" style="padding-left: 5px;">
			<div class="panel panel-info">
			<div class="panel-heading">
				<div style="text-align: center;">
					<h4><strong>Requisition Detail</strong></h4> 
				</div>
			</div>
			<div class="panel-body" >
				<?php echo $this->reqtable;?>
			</div>
					
		</div>
	</div>
	</div>

	<div class="panel panel-info">
            <div class="panel-heading">
                <div style="text-align: center;">
                    <h4><strong>Purchase Detail</strong></h4> 
                </div>
			</div>
            <div class="panel-body" >
				<?php echo $this->table;?>
			</div>
        </div>
	
	