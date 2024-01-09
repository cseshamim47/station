 
			<div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
			<?php echo $this->breadcrumb; ?>
			<div id="printdiv">
                <div style="text-align: center;">
                    <h2><strong><?php echo $this->org; ?></strong></h2>
					<h5><strong><?php echo Session::get('sbizadd'); ?></strong></h5><br/><br/>			
                </div>
				<div style="text-align: center;">                    
					<h4><strong><table style="margin: auto; float: center;" border="1"><tbody><tr><td><?php echo $this->vrptname; ?></td></tr></tbody></table></strong></h4>
					<br/><br/><br/>	
                </div>
				<div style="float: left;">
                    <p>Delivery Chalan No: <?php echo $this->dono; ?></p>
					<p>Customer: <?php echo $this->xcus."-".$this->xorg;  ?></p>
					<p>Address: <?php echo $this->xadd.". Mobile: ".$this->xmobile; ?></p>
					
                </div>
				<div style="float: right;">
                    <p>Date: <?php echo $date = date('d/m/Y', strtotime($this->xdate)); ?></p>
					
                </div>
				<div>
                    <table class="table table-bordered table-striped">
						<thead>
							<th>Sl.</th><th>Itemcode</th><th>Description</th><th style="text-align:right">Rate</th><th style="text-align:right">Qty</th><th>UOM</th><th style="text-align:right">Tax</th><th style="text-align:right">Discount</th><th style="text-align:right">Total</th>
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
								<td align="right"><?php echo $val['xrate']; ?></td>
								<td align="right"><?php echo $val['xqty']; ?></td>
								<td align="right"><?php echo $val['xunit']; ?></td>
								<td align="right"><?php echo $val['xtaxamt']; ?></td>
								<td align="right"><?php echo $val['xdiscamt']; ?></td>
								<?php $tot = ($val['xqty']*$val['xrate'])+$val['xtaxamt']-$val['xdiscamt'];?>
								<td align="right"><?php echo $tot; ?></td>
							</tr>
						<?php } ?>	
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4" align="right"><strong>Total</strong></td><td align="right"><strong><?php echo $this->totqty; ?></strong></td><td></td><td align="right"><strong><?php echo $this->taxamt; ?></strong></td><td align="right"><strong><?php echo $this->discamt; ?></strong></td><td align="right"><strong><?php echo $this->total; ?></strong></td>
							</tr>
							<tr>
								<td colspan="8" align="right"><strong>Fixed Discount</strong></td><td align="right"><strong><?php echo $this->grossdisc; ?></strong></td>
							</tr>
							<?php $nettotal = $this->total-$this->grossdisc; ?>
							<tr>
								<td colspan="8" align="right"><strong>Net Total</strong></td><td align="right"><strong><?php echo $nettotal; ?></strong></td>
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
				<div style="float: left;width: 33%;text-align:center; ">
					Created By_____________	
                </div>
				<div style="float: left;width: 33%; text-align:center;">
					Checked By_____________	
                </div>
				<div style="float: left;width: 33%; text-align:center">
					  Approved By_____________
										
                </div>	
			</div>
            
        

