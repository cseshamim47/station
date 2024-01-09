<div class="row">
	  <div>
	  	<div class="col-xs-6 col-md-3" style="float: right; text-align: center;">
		  	<strong><?php echo "Agent Image"; ?></strong>
			<a href="#" class="thumbnail">
			  <img id="objimage" src="<?php echo $this->filename1; ?>">
			</a>
		</div>

	  </div>
  </div>
	<?php echo $this->dynform;?>
	<div class="panel panel-info">
            <div class="panel-heading">
                <div style="text-align: center;">
                    <h4><strong>Last 5 Records</strong></h4> 
                </div>
			</div>
            <div class="panel-body" >
				<?php echo $this->table;?>
			</div>
        </div>
	
	