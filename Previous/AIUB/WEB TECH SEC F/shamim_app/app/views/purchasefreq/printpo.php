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
                    <p>GRN No: <?php echo $this->pono; ?></p>
					<p>Supplier: <?php echo $this->supplier; ?></p>
					<p>Address: <?php echo $this->supadd.". ".$this->supphone; ?></p>
					<p>Ref: <?php echo $this->supdoc; ?></p>
                </div>
				<div style="float: right;">
                    <p>Date: <?php echo $this->xdate; ?></p>
					
                </div>
				<div>
                    <table class="table table-bordered table-striped">
						<thead>
							<th>Sl.</th><th>Itemcode</th><th>Item Name</th><th style="text-align:right">Qty</th><th style="text-align:right">Total</th>
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
								<td align="right"><?php echo $val['xqtypur']; ?></td>
								<td align="right"><?php echo $val['xtotal']; ?></td>
							</tr>
						<?php } ?>	
						</tbody>
						<tfoot>
							<tr>
								<td colspan="3" align="right"><strong>Total</strong></td><td align="right"><strong><?php echo $this->totqty; ?></strong></td><td align="right"><strong><?php echo $this->total; ?></strong></td>
							</tr>
							<tr>
								<td colspan="5"><strong><?php echo $this->inword; ?></strong></td>
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
				<div style="float: left;border-top: 2px solid;margin-left: 45px;">
					Created By	
                </div>
				<div style="float: right;border-top: 2px solid;margin-right: 45px;">
					  Approved By				
                </div>	
			</div>
            
        </div>

