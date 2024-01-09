 <div class="panel" >
            <div class="panel-heading" width="70%">
			<div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
			<?php echo $this->breadcrumb; ?>
                <div style="text-align: center;">
                    <h4><strong><?php echo $this->org; ?></strong></h4>
									
                </div>
				<div style="text-align: center;">                    
					<h4><strong><?php echo $this->vrptname; ?></strong></h4>					
                </div>
				<div style="float: left;">
                    <p>Delivery Chalan No: <?php echo $this->dono; ?></p>
					<p>Customer: <?php echo $this->xrdin."-".$this->xorg;  ?></p>
					<p>Address: <?php echo $this->xadd.". ".$this->xmobile; ?></p>
					
                </div>
				<div style="float: right;">
                    <p>Date: <?php echo $date = date('d/m/Y', strtotime($this->xdate)); ?></p>
					
                </div>
				<div>
                    <table class="table table-bordered table-striped">
						<thead>
							<th>Sl.</th><th>Itemcode</th><th>Description</th><th style="text-align:right">Qty</th>
						</thead>
						<tbody>
						<?php foreach($this->vrow as $key=>$val){ ?>
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
					Created By_____________	
                </div>
				<div style="float: right;">
					  Approved By_____________
										
                </div>	
			</div>
            
        </div>

