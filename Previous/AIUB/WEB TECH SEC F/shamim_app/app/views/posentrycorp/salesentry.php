
	<div class="row">
		 <div class="col-sm-5">
			<?php echo $this->dynform; ?>
			<?php //echo $this->modalform; ?>
		  </div>
		  <div class="col-sm-7">
				  <div class="panel panel-info">
					<div class="panel-heading">
						<div style="text-align: center;">
							<h4><strong>Items Added</strong></h4> 
						</div>
					</div>
					<div class="panel-body" >
						<?php echo $this->table;?>
					</div>
					<!--<div class="panel-footer">
							<h3>Total Receivable : <strong><span id="invtotal" style="color:red">0.00</span></strong></h3>
							
					</div>
					<div class="panel-footer">
					<div class="btn-group" role="group">
					<button id="Cash" data-id=""  data-toggle="modal" data-target="#exampleModal" class="btn btn-danger bank">Cash</button>
					
					</div>
					
				</div>
				
				<div class="panel-footer">
					<table id="tbldetail" class="table table-bordered table-hover">
						  <thead style="background-color: powderblue; color:blue">
							<th>Row</th><th>Collection Type</th><th>Amount</th><th></th>
						  </thead>
						  <tbody>
						  <?php //echo $this->tr; ?>
						  </tbody>
					 </table>
				</div>-->
		</div>
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