
			<div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
			<?php echo $this->breadcrumb; ?>
			<div id="printdiv">
                <div style="text-align: center;">
                    <h4><strong><?php echo $this->org; ?></strong></h4>
					<h5><strong><?php echo $this->vrptname; ?></strong></h5>					
                </div>
				<div style="float: left;">
                    <p>PO: <?php echo $this->ponum; ?></p>
					
                </div>
				
				<div>
                    <table class="table table-bordered table-striped">
						<thead>
							<th>Sl.</th><th>Cost Head</th><th style="text-align:right">amount</th>
						</thead>
						<tbody>
						<?php foreach($this->vrow as $key=>$val){ ?>
							<tr>
								<td><?php echo $val['xsl']; ?></td>
								<td>
									<?php echo $val['xcosthead']; ?>
								</td>
								<td align="right">
									<?php echo $val['xamount']; ?>
								</td>
								
							</tr>
						<?php } ?>	
						</tbody>
						<tfoot>
							<tr>
								<td colspan="2" align="right"><strong>Total</strong></td>
							<td align="right"><strong><?php echo $this->totamount; ?></strong></td></tr>
							
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
            
        

