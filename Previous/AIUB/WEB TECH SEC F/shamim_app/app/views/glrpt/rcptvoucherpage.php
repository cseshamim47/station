 <div class="panel" >
            <div class="panel-heading" width="70%">
			<div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
			<?php echo $this->breadcrumb; ?>
                <div style="text-align: center;">
                    <h4><strong><?php echo $this->org; ?></strong></h4>
					<h5><strong><?php echo $this->vrptname; ?></strong></h5>					
                </div>
				<div style="float: left;">
                    <p>Voucher No: <?php echo $this->voucher; ?></p>
					<p>Receipt Method: <?php echo $this->paymethod; ?></p>
					
                </div>
				<div style="float: right;">
                    <p>Date: <?php echo $this->xdate; ?></p>
					<p>Cheque No: <?php echo $this->xcheque; ?></p>						
                </div>
				<div>
                    <table class="table">
						<tbody>
							<tr>
								<td>Receive From: <?php echo $this->payto; ?></td>
							</tr>
							<tr>
								<td>Being: <?php echo $this->xnarration; ?></td>
								
							</tr>
							<tr>
								<td>Amount: <?php echo abs($this->xprime); ?></td>
							</tr>
							
						</tbody>
						<tfoot>
							<tr style="background-color:button-info">
								<td colspan="4"><?php echo $this->inword; ?></td>
							</tr>
						</tfoot>
					</table>
						
                </div>
				<br/>
				<br/>
				<div style="float: left; width: 33%;">
					Approved By_____________	
                </div>
				<div style="float: left;width: 33%; text-align:center">
					Received By_____________	
                </div>
				<div style="float: right;width: 33%; text-align:right">
					  Paid By_____________
										
                </div>
			</div>
            
        </div>

