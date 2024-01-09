
          
		  <div class="panel panel-info">
            <div class="panel-heading">
                <div style="text-align: center;">
                    <h4><strong>Voucher Details</strong></h4> 
                </div>
                <a class="btn btn-info" id=""  href="<?php echo $this->backUrl ?>" role="button">Back</a>
                <a id="appbtn" class="btn btn-success" href="<?php echo $this->approveUrl ?>" role="button">Approve</a>
                <a id="canbtn" class="btn btn-danger" href="<?php echo $this->cencelUrl ?>" role="button">Cancel</a>
			</div>
            <div class="panel-body" >
             <h4><b>Voucher Number: </b><?php echo $this->reqmst[0]['xvoucher'] ?>; <b>Submit by: </b><?php echo $this->reqmst[0]['zemail'] ?>; <b>Project: </b><?php echo $this->reqmst[0]['xsite'] ?></h4>
				<?php echo $this->table;?>
			</div>
        </div>