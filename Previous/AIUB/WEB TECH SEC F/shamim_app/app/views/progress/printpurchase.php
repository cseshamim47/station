
			<div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
			<?php echo $this->breadcrumb; ?>
			<div id="printdiv">
                <div style="text-align: center;">
                    <h4><strong><?php echo $this->org; ?></strong></h4>
					<h5><strong><?php echo $this->vrptname; ?></strong></h5>					
                </div>
				<div style="float: left;">
                    <p>PO No: <?php echo $this->pono; ?></p>
					<p>Supplier: <?php echo $this->supplier; ?></p>
					<p>Address: <?php echo $this->supadd.". ".$this->supphone; ?></p>
					<p>Supplier Ref: <?php echo $this->supdoc; ?></p>
                </div>
				<div style="float: right;">
                    <p>Date: <?php echo $this->xdate; ?></p>
					
                </div>
				<div>
                    <table class="table table-bordered table-striped">
						<thead>
							<th>Sl.</th><th>Itemcode</th><th>Description</th><th style="text-align:right">Rate</th><th style="text-align:right">Qty</th><th>Unit</th><th style="text-align:right">Total</th><th>Currency</th>
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
								<td align="right"><?php echo $val['xratepur']; ?></td>
								<td align="right"><?php echo $val['xqty']; ?></td>
								<td align="left"><?php echo $val['xunitpur']; ?></td>
								<td align="right"><?php echo $val['xtotal']; ?></td>
								<td align="left"><?php echo $val['xcur']; ?></td>
							</tr>
						<?php } ?>	
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4" align="right"><strong>Total</strong></td><td align="right"><strong><?php echo $this->totqty; ?></strong></td><td></td><td align="right"><strong><?php echo $this->total; ?></strong></td><td></td>
							</tr>
							<tr>
								<td colspan="6"><strong><?php echo $this->inword; ?></strong></td>
							</tr>
							<tr>	
								<td colspan="8"><p style="text-align:left;text-align: left;margin-left: 10px;margin-top: 10px;"><b style="color:#DC2A28!important;font-size:12px;font-family: Calibri;">Additional Notes :</b></p></td>
							</tr>
							<tr>
								<td colspan="8"><strong><p style="text-align:left;text-align: left;margin-left: 40px;margin-top: 10px;font-size:12px;font-family: Calibri;"><?php echo nl2br($this->note); ?></p></strong></td>
							</tr>
						</tfoot>
					</table>

					<div style="float: left;">
					
                    
					
                </div>
						
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
            
        	

