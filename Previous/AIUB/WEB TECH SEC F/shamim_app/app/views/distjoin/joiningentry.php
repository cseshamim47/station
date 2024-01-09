
	<?php echo $this->dynform;?>
	<div class="panel panel-info">
            <div class="panel-heading">
                <div style="text-align: center;">
                    <h4><strong>Genealogy Tree</strong></h4> 
                </div>
			</div>
            <div class="panel-body" >
				<?php echo $this->table;?>
			</div>
        </div>
	<div class="modal fade bs-example-modal-sm" id="loading" role="dialog">
	  <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
		  <img src="<?php echo URL;?>images/loader/preloader.gif" width="36" height="36" alt=""/>
		  <strong>Loading...<strong>
		</div>
	  </div>
	</div>
	