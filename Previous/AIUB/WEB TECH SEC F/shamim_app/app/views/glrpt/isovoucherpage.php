<style>
.ex-table {
	width: 100%;
	max-width: 100%;
	margin-bottom: 20px;
}
.ex-table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
line-height: 1.42857;
vertical-align: top;
padding: 8px;
}
.table-bordered, .ex-table{
	margin-bottom: 5px;
}
</style>

<div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
        <div id="printdiv" style="text-align:center;height:10.6in;width:8.3in; margin:0 auto;padding-top:30px">
			<div class="col-md-12">
				<table class="table table-bordered">
				    <tr>
                        <td align="center" colspan="3"><img style="height: 94px; width: 743px;" src="<?php echo URL;?>public/images/company_header.jpg" alt="" /></td>
                    </tr>
					<tr>
						<td colspan="3" align="center"><b><?php echo $this->doccode; ?></b></td>
					</tr>
					<tr>
						<td colspan="3" align="center"><b><?php echo $this->doctitle; ?></b></td>
					</tr>
					<tr>
						<td align="center">Effective Date: 1/12/2017</td>
						<td align="center">Revision Status: 00</td>
						<td align="center">Page 1 of 1</td>
					</tr>
				</table>
				<table class="ex-table">
					<tr>
						<td colspan="2"><b>Voucher No: <?php echo $this->voucher; ?></b></td>
						<td colspan="2"><b>Date: <?php echo $this->xdate; ?></b></td>
					</tr>
				</table>
			</div>
			<div class="col-md-12">
                    <!-- <table class="table table-bordered table-striped">
						<tbody>
						<tr style="text-align:left">
							<td>Head of Account :</td>
							<td>Amount</td>
							<td>Ps.</td>
						</tr>
						<tr style="text-align:left">
							<td>Received from Mr./Ms./Mrs. :</td>
							<td rowspan="3"></td>
							<td rowspan="3"></td>
						</tr>
						<tr style="text-align:left">
							<td>Received by :</td>
						</tr>
						<tr style="text-align:left">
							<td>On account of :</td>
						</tr>

							
						</tbody>
					</table> -->
						

					<table class="table table-bordered table-striped">
						<thead>
							<th>Sl.</th><th>Description</th><th style="text-align:right">Debit Amount</th><th style="text-align:right">Credit Amount</th>
						</thead>
						<tbody style="text-align:left">
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
							<tr style="text-align:left">
								<td colspan="4"><strong><?php echo $this->inword; ?></strong></td>
							</tr>
							<tr style="text-align:left">
								<td colspan="4"><strong>Narration: <?php echo $this->narration; ?></strong></td>
							</tr>
						</tfoot>
					</table>
					</div>
			<div class="col-md-12">
				<table class="table table-bordered">
					<tr>
						<?php 
						$apparray = explode(";", $this->vrow[0]['xemail']); 
						?>
						<td colspan="6" align="center">
						<?php 
						$i = 0;
						foreach($apparray as $key=>$value){
							$signarray = explode(":", $value);
							if($signarray[0] == " Confirmed" && $signarray[1] == "zahurul830@gmail.com"){
								$i++;
						?>
							<img style="height: 50px;width: 100px;" src="<?php echo URL;?>images/<?php echo $signarray[1] ?>.png" alt="" />
							</br>
						<?php } } if($i == 0){ ?>
						</br>
						</br>
						<?php } ?>
						<span>Checked by AGM(Admin & Accounts)</span>
						</td>
					</tr>
					<tr>
						
						<td>
							
							</br>
							</br>
							<span>Received By</span>
						</td>
						<td align="center">
							<?php if(!empty($this->vrow[0]['zemail']) && $this->vrow[0]['zemail']!=""){ ?>
							<img style="height: 50px;width: 80px;" src="<?php echo URL;?>images/<?php echo $this->vrow[0]['zemail'] ?>.png" alt="" />
							</br>
							<?php }else{ ?>
							</br>
							</br>
							<?php } ?>
							<span>Accountant</span>
						</td>
						<td align="center">
							<img style="height: 50px;width: 80px;" src="<?php echo URL;?>images/<?php echo $this->vrow[0]['xmanager'] ?>.png" alt="" />
							</br>
							<span>Dept. Executive</span>
						</td>
						<?php if(count($apparray) == 4){ ?>
						<td align="center">
							<?php if(!empty($apparray[0])){ ?>
							<img style="height: 50px;width: 80px;" src="<?php echo URL;?>images/<?php echo explode(":", $apparray[0])[1] ?>.png" alt="" />
							</br>
							<?php }else{ ?>
							</br>
							</br>
							<?php } ?>
							<span>Dept. In-Charge</span>
						</td>
						<?php } ?>
						<td align="center">
						<?php 
							$i = 0;
						foreach($apparray as $key=>$value){
							$signarray = explode(":", $value);
							if($signarray[1] == "akramuzzaman@nnsel.com"){
								$i++;
						?>
							<img style="height: 50px;width: 80px;" src="<?php echo URL;?>images/<?php echo $signarray[1] ?>.png" alt="" />
							
						<?php } } if($i == 0){ ?>
						</br>
						</br>
						<?php } ?>
						</br>
							<span>Procurement Manager</span>
						</td>
						<td align="center">
						<?php 
							$i = 0;
						foreach($apparray as $key=>$value){
							$signarray = explode(":", $value);
							if($signarray[1] == "falgunimahmud@nnsel.com"){
								$i++;
						?>
							<img style="height: 50px;width: 80px;" src="<?php echo URL;?>images/<?php echo $signarray[1] ?>.png" alt="" />
							
						<?php } } if($i == 0){ ?>
						</br>
						</br>
						<?php } ?>
						</br>
							<span>Director</span>
						</td>
						
					</tr>
				</table>
			</div>
			<div class="col-md-12">
				<img style="height: 94px; width: 100%;" src="<?php echo URL;?>public/images/company_footer.jpg" alt="" />
			</div>
		</div>

