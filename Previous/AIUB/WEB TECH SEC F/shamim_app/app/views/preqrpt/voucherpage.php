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
					<p>Narration: <?php echo $this->narration; ?></p>
                </div>
				<div style="float: right;">
                    <p>Date: <?php echo $this->xdate; ?></p>
                </div>
				<div>
                    <table class="table table-bordered table-striped">
						<thead>
							<th>Sl.</th><th>Description</th><th style="text-align:right">Debit Amount</th><th style="text-align:right">Credit Amount</th>
						</thead>
						<tbody>
						<?php foreach($this->vrow as $key=>$val){ ?>
							<tr>
								<td><?php echo $val['xrow']; ?></td>
								<td>
									<?php echo "Account: ".$val['xacc']." ".$val['xaccdesc']."<br />"; if($val['xaccsub']!="") echo "Sub Account: ".$val['xaccsub']." ".$val['xaccsubdesc']."<br />"; if($val['xcheque']!="") echo "Cheque No: ".$val['xcheque']; ?>
								</td>
								<td align="right"><?php echo $val['xprimedr']; ?></td>
								<td align="right"><?php echo $val['xprimecr']; ?></td>
							</tr>
						<?php } ?>	
						</tbody>
						<tfoot>
							<tr>
								<td colspan="2" align="right"><strong>Total</strong></td><td align="right"><strong><?php echo $this->totprimedr; ?></strong></td><td align="right"><strong><?php echo $this->totprimecr; ?></strong></td>
							</tr>
							<tr>
								<td colspan="4"><strong><?php echo $this->inword; ?></strong></td>
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
					Approved By_____________	
                </div>
				<div style="float: right;">
					  Paid By_____________
										
                </div>	
			</div>
            
        </div>

