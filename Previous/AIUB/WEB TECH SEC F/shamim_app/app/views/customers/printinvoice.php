<style>
				.table-bordered {
					border: 1px solid #000;
				}
				.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
					padding: 4px;
					line-height: 1.2;
					vertical-align: top;
					border-top: 1px solid #ddd;
				}
				
				.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
					border: 1px solid #000;
				}
</style>
			<div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
			<?php echo $this->breadcrumb; ?>
			<div id="printdiv">
                <div style="text-align: center;">
                   
                </div>
				<div style="text-align: center;">                    
					
                </div>
				
				
				<div>
                    <table class="table table-bordered table-striped" style="font-size: 17px;">
						</br>
						</br>
						</br>
						</br>
						</br>
						</br>
						</br>
						</br>
						</br>
					<div style="float: left; margin-bottom: 20px;">
                    		<p style="font-size: 20px; border: 1px solid #000;">&nbsp;No: <?php echo $this->cus; ?>&nbsp;</p>
					
                	</div>
						<tbody>
						
							<tr>
								<td><strong>1.Name of Cutomer</strong></td>
								
								<td colspan="7"><?php echo $this->name; ?></td>
							</tr>
							<tr>
								<td><strong>2.Name of Father/Husband</strong></td>
							
								<td colspan="7"><?php echo $this->fname; ?></td>
							</tr>
							<tr>
								<td><strong>3.Mothers Name</strong></td>
								
								<td colspan="7"><?php echo $this->mname; ?></td>
							</tr>
							<tr>
								<td><strong>4.Present Address</strong></td>
								
								<td colspan="7"><?php echo $this->pradd; ?></td>
							</tr>
							<tr>
								<td><strong>5.Permanent Address</strong></td>
								
								<td colspan="7"><?php echo $this->paradd; ?></td>
							</tr>
							<tr>
								<td><strong>6.Occupation</strong></td>
							
								<td colspan="2"><?php echo $this->occupation; ?></td>
								<td style="text-align:center"><strong>Nationality </strong></td>
								<td colspan="4"><?php echo $this->nationality; ?></td>
							</tr>
							<tr>
								<td><strong>7.Date of Birth</strong></td>
							
								<td colspan="2"><?php echo date('d-m-Y', strtotime($this->dob)); ?></td>
								<td style="text-align:center"><strong>NID </strong></td>
								<td colspan="4"><?php echo $this->nid; ?></td>
							</tr>
							<tr>
								<td><strong>8.Mobile</strong></td>
							
								<td colspan="2"><?php echo $this->xmobile; ?></td>
								<td style="text-align:center"><strong>Religion </strong></td>
								<td colspan="4"><?php echo $this->religion; ?></td>
							</tr>
							<tr>
								<td><strong>9.Name of Nominee</strong></td>
							
								<td colspan="7"><?php echo $this->noname; ?></td>
							</tr>
							<tr>
								<td></td>
							
								<td><strong>Relation </strong></td>
								<td><?php echo $this->norelation; ?></td>
								<td style="text-align:center"><strong>Date Of Birth </strong></td>
								<td colspan="4"><?php echo date('d-m-Y', strtotime($this->noage)); ?></td>
							</tr>
							<tr>
								<td><strong>10.Name of Father/ Husband</strong></td>
							
								<td colspan="7"><?php echo $this->nofather; ?></td>
							</tr>
							<tr>
								<td><strong>11.Address</strong></td>
							
								<td colspan="7"><?php echo $this->noadd; ?></td>
							</tr>
							<tr>
								<td><strong>12.Name of Project</strong></td>
							
								<td colspan="7">NN SERVICE & ENGINEERING</td>
							</tr>
							<tr>
								<td><strong>15.Rules of Sales Agreement</strong></td>
							
								<td colspan="2">Installment</td>
								<td colspan="1" style="text-align:center"><strong>Month </strong></td>
								<td colspan="4"><?php echo $this->insmonth; ?></td>
							</tr>
						</tbody>
						
					</table>
					</div>
					<div>
					<table class="table table-bordered table-striped" style="font-size: 17px;">
					<thead>
					<tr><th colspan="6" class="text-center">Sales Detail</th></tr>
					<tr>
						<th class="text-center">SL</th>
						<th class="text-center">Flat Code</th>
						<th class="text-center">Level</th>
						<th class="text-center">Type</th>
						<th class="text-center">Squrefit</th>
						<th class="text-center">Rate</th>
					</tr>
					</thead>
					<tbody>
							<tr>
							<?php 
							$totrate = 0;
							foreach($this->salesdt as $key=>$val){
									$totrate += $val['xrate'];
								?>
								<td style="text-align: center;"><?php echo $val['xrow']; ?></td>
								<td style="text-align: center;"><?php echo $val['xplatcode']; ?></td>
								<td style="text-align: center;"><?php echo $val['xlevel']; ?></td>
								<td style="text-align: center;"><?php echo $val['xplattype']; ?></td>
								<td style="text-align: center;"><?php echo $val['xsqurefit']; ?></td>
								<td style="text-align: center;"><?php echo $val['xrate']; ?></td>
								
							</tr>
							<?php } ?>
							<tr>
								<td colspan="5" class="text-right"><strong>Total Price</strong></td>
							
								<td class="text-center"><?php echo $totrate; ?></td>
							</tr>
							<tr>
								<td colspan="6"  class="text-right">In Words :<?php echo $this->totalinword; ?></td>
							</tr>
							<tr>
								<td colspan="5" class="text-right"><strong>Booking Payment</strong></td>
							
								<td class="text-center"><?php echo $this->bookpay; ?></td>
							</tr>
							<tr>
								<td colspan="6" class="text-right">In Words :<?php echo $this->bookinword; ?></td>
							</tr>
							<tr>
								<td colspan="2" class="text-center"><strong>Cheque No </strong></td>
								<td><?php echo $this->chequeno; ?></td>
								<td style="text-align:center"><strong>Date </strong></td>
								<td colspan="4" class="text-center"><?php echo date('d-m-Y', strtotime($this->chequedate)); ?></td>
							</tr>
							
						
						</tbody>
						
					</table>
						
                </div>
				
			</div>
            
        

