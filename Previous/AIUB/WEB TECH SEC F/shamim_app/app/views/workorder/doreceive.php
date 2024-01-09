 <div class="panel" >
			 <div class="panel-heading" width="70%">
			 <?php if ($this->status!="Confirmed"){?>
			<div style="float: right;">
			<form name="dynamicfrm" id="dynamicfrm" action="<?php echo URL; ?>diststocktransfer/rcvconfirm" method="post" enctype="multipart/form-data">
			<input type="hidden" name="txnnum" value="<?php echo $this->dono; ?>">
			<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>Confirm</button>
			 </form></div><?php }?>
			<br/>
            <br/>
			<br/>
			<br/>		
               
				<div style="float: left;">
                    <p>Delivery Chalan No: <?php echo $this->dono; ?></p>
					<p>Customer: <?php echo $this->xrdin."-".$this->xorg;  ?></p>
					
					
                </div>
				<div style="float: right;">
                    <p>Date: <?php echo $date = date('d/m/Y', strtotime($this->dt)); ?></p>
					
                </div>
				<div>
                    <table class="table table-bordered table-striped">
						<thead>
							<th>Sl.</th><th>Itemcode</th><th>Description</th><th style="text-align:right">Rate</th><th style="text-align:right">Qty</th><th style="text-align:right">Total</th>
						</thead>
						<tbody>
						<?php foreach($this->vrow as $val){ ?>
							<tr>
								<td><?php echo $val['xrow']; ?></td>
								<td>
									<?php echo $val['xitemcodeosp']; ?>
								</td>
								<td>
									<?php echo $val['xitemdesc']; ?>
								</td>
								<td align="right"><?php echo $val['xsalesprice']; ?></td>
								<td align="right"><?php echo $val['xqty']; ?></td>
								<td align="right"><?php echo $val['xqty']*$val['xsalesprice']; ?></td>
							</tr>
						<?php } ?>	
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4" align="right"><strong>Total</strong></td><td align="right"><strong><?php echo $this->totqty; ?></strong></td><td align="right"><strong><?php echo $this->totalamt; ?></strong></td>
							</tr>
							
						</tfoot>
					</table>
						
                </div>
				
			</div>
            
        </div>

