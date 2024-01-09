
			<div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
			<?php echo $this->breadcrumb; ?>
			<div id="printdiv">
                <div style="text-align: center;">
                    <h4><strong><?php echo $this->org; ?></strong></h4>
					<h5><strong><?php echo $this->vrptname; ?></strong></h5>					
                </div>
                <hr>
                <div>
					<div style="float: left;  width: 33%">
					
							
							<p><strong>Date: </strong><?php echo $this->xdate; ?></p>
		                    <p><strong>PO No: </strong><?php echo $this->pono; ?></p>
							<p><strong>Supplier: </strong><?php echo $this->supplier; ?></p>
							
							<p><strong>Address: </strong><?php echo $this->supadd.". ".$this->supphone; ?></p>
							<p><strong>Correspondence To: </strong><?php echo $this->corto; ?></p>
							<p><strong>C. Add: </strong><?php echo $this->coradd; ?></p>
							<p><strong>C. Email: </strong><?php echo $this->coremail; ?></p>
							<p><strong>C. Phone: </strong><?php echo $this->corphone; ?></p>
	                </div>
	               <div style="float: left; text-align: center; width: 33%">
						<p><strong>Term: </strong><?php echo $this->shipterm; ?></p>
	                    	<p><strong>Ship Via: </strong><?php echo $this->shipvia; ?></p>
	                </div>

					<div style="float: right; text-align: left; width: 33%">					
	                	<div>
							<p><strong>LC No: </strong><?php echo $this->lcno; ?></p>
							<p><strong>LC Date: </strong><?php echo $this->lcdate;; ?></p>
						</div>
						<div>	
							<p><strong>PI No: </strong><?php echo $this->pino; ?></p><p>
							<strong>PI Date: </strong><?php echo $this->pidate; ?></p>
						</div>
						<div>
	                    	<p><strong>ETA: </strong><?php echo $this->eta; ?></p><p>
	                    	<strong>ETD: </strong><?php echo $this->etd; ?></p>
	                	</div>
	                	<div>
	                    	<p><strong>GHO Date: </strong><?php echo $this->ghodate; ?></p><p>
	                    	<strong>Delivery Date: </strong><?php echo $this->deldate; ?></p>
	                	</div>
	                </div>
            	</div>
				<div>
                    <table class="table table-bordered table-striped">
						<thead>
							<th>Sl.</th><th>Itemcode</th><th>Item Name</th><th style="text-align:right">Rate</th><th style="text-align:right">Qty</th><th>Unit</th><th style="text-align:right">Total</th><th></th>
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
								<td><?php echo $val['xcur']; ?></td>
							</tr>
						<?php } ?>	
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4" align="right"><strong>Total</strong></td><td align="right"><strong><?php echo $this->totqty; ?></strong></td><td></td><td align="right"><strong><?php echo $this->total; ?></strong></td><td><?php echo $this->cur; ?></td>
							</tr>
							<tr>
								<td colspan="8"><strong><?php echo $this->inword; ?></strong></td>
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
				<div style="float: left;border-top: 2px solid;margin-left: 45px;">
					Created By	
                </div>
				<div style="float: right;border-top: 2px solid;margin-right: 45px;">
					  Approved By				
                </div>	

			</div>
            
        	

