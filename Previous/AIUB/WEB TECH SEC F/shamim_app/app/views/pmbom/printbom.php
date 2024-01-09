
			<div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
			<?php echo $this->breadcrumb; ?>
			<div id="printdiv">
                <div style="text-align: center;">
                    <h4><strong><?php echo $this->org; ?></strong></h4>
					<h5><strong><?php echo $this->vrptname; ?></strong></h5>					
                </div>
				<div style="float: left;">
                    <p>BOM Code: <?php echo $this->bomcode; ?></p>
					<p>Finished Item: <?php echo $this->finisheditem; ?></p>
					<p>Item Description: <?php echo $this->finisheditemdesc; ?></p>
					
                </div>
				
				<div>
                    <table class="table table-bordered table-striped">
						<thead>
							<th>Sl.</th><th>Itemcode</th><th>Description</th><th style="text-align:right">Qty</th><th>Unit</th><th style="text-align:right">Cost</th>
						</thead>
						<tbody>
						<?php foreach($this->vrow as $key=>$val){ ?>
							<tr>
								<td><?php echo $val['xrow']; ?></td>
								<td>
									<?php echo $val['xrawitem']; ?>
								</td>
								<td>
									<?php echo $val['xrawdesc']; ?>
								</td>
								
								<td align="right"><?php echo $val['xqty']; ?></td>
								<td ><?php echo $val['xunit']; ?></td>
								<td align="right"><?php echo $val['xstdcost']; ?></td>
							</tr>
						<?php } ?>	
						</tbody>
						<tfoot>
							<tr>
								<td colspan="3" align="right"><strong>Total</strong></td><td align="right"><strong><?php echo $this->totqty; ?></strong></td><td></td>
							<td align="right"><strong><?php echo $this->totcost; ?></strong></td></tr>
							
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
            
        

