
			 
			<div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
			<div id="printdiv">
                <div style="text-align: center;">
                    <h2><strong><?php echo $this->org; ?></strong></h2>
                    <h5><strong><?php echo session::get('sbizadd'); ?></strong></h5><br/><br/>
					<br/><br/>			
                </div>
				
				<div style="text-align: center;">                    
					<h4><strong><table style="margin: auto; float: center;" border="1"><tbody><tr><td><?php echo $this->vrptname; ?></td></tr></tbody></table></strong></h4>
					
                </div>
				
              
				<div style="float: left;">
                    <p>Transfer Chalan No: <?php echo $this->txnno; ?></p>
										
					 <p>From Warehouse: <?php echo $this->xwh; ?></p>
					 <p>To Warehouse: <?php echo $this->xtxnwh; ?></p>
                </div>
				<div style="float: right;">
                    <p>Date: <?php echo $date = date('d/m/Y', strtotime($this->dt)); ?></p>
					
                </div>
				<div>
                    <table class="table table-bordered table-striped">
						<thead>
							<th>Sl.</th><th>Itemcode</th><th>Description</th><th style="text-align:right">Qty</th>
						</thead>
						<tbody>
						<?php foreach($this->vrow as $val){ ?>
							<tr>
								<td><?php echo $val['xrow']; ?></td>
								<td>
									<?php echo $val['xitemcode']; ?>
								</td>
								<td>
									<?php echo $val['xitemdesc']; ?>
								</td>
								
								<td align="right"><?php echo $val['xqty']; ?></td>
								
							</tr>
						<?php } ?>	
						</tbody>
						<tfoot>
							<tr>
								<td colspan="3" align="right"><strong>Total</strong></td><td align="right"><strong><?php echo $this->totqty; ?></strong></td>
							</tr>
							
						</tfoot>
					</table>
						
                </div>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<div style="float: left;">
					Delivered By_____________	
                </div>
				<div style="float: right;">
					 Approved By_____________
										
                </div>	
			</div>
       
        

