
<div class="col-sm-12 col-md-12 main">
          
		  <div class="panel panel-info">
            <div class="panel-heading">
                <div style="text-align: center;">
                    <h4><strong>Requisition Item List</strong></h4> 
                </div>
                <a class="btn btn-info" id=""  href="<?php echo $this->backUrl ?>" role="button">Back</a>
                <a id="appbtn" class="btn btn-success" href="<?php echo $this->approveUrl ?>" role="button">Approve</a>
                <a id="canbtn" class="btn btn-warning" href="<?php echo $this->cencelUrl ?>" role="button">Modify</a>
                <a id="delbtn" class="btn btn-danger" href="<?php echo $this->deleteUrl ?>" role="button">Delete</a>
			</div>
            <div class="panel-body" >
				<?php echo $this->table;?>
			</div>
        </div>
		  
</div>