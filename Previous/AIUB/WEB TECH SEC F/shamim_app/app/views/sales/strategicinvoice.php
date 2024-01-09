
		<div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
        <div id="printdiv" style="text-align:center;height:10.6in;width:8.3in; margin:0 auto;padding-top:30px">
			<div class="col-report-3" style="float: left;width:25%">
				<img style="height: 115px;width: 210px;margin-left: 30px;" src="<?php echo URL;?>public/images/bizdir/100.png" alt="" />
			</div>
			<div class="col-report-9" style="float:left;width:75%">
				<h2 style="margin-top: 0px;margin-bottom: 0px;font-size:25px;"><b><?php echo Session::get('sbizlong');?></b></h2>
				<p style="margin: 0px 0 0px;font-size:14px;">Taima building, 1st floor, Salhia street, Kuwait City, Kuwait</p>
				<p style="margin: 0px 0 0px;font-size:14px;">MAIL:info@strategic.con.kw, WEBSITE: www.strategic.com.kw</p>
				<p style="margin: 0px 0 0px;font-size:14px;">Phone: (+965)96663970</p>
				<table style="margin:25px;font-size:12px;font-family: Calibri;">
					<tr>
						<td><b><p style="text-align:left;margin-bottom: 5px;color:#DC2A28!important;">Date :</p></b></td>
						<td><p style="text-align:left;margin-bottom: 5px;"><?php echo $this->xdate;?></p></td>
						
					</tr>
					<tr>
						<td><b><p style="text-align:left;margin-bottom: 5px;color:#DC2A28!important;">Customer Name :</p></b></td>
						<td><p style="text-align:left;margin-bottom: 5px;"><?php echo $this->xorg;?></p></td>
						<td><b><p style="margin:0px 0px 0px 50px;color:#DC2A28!important;">REF :</p></b></td>
						<td><p style="text-align:left;margin-bottom: 0px;"><?php echo $this->xref;?></p></td>
					</tr>
					<tr>
						<td><b><p style="text-align:left;margin-bottom: 5px;color:#DC2A28!important;">Customer Address :</p></b></td>
						
					</tr>
					<tr>
						<td colspan="4" style="text-align:left"><?php echo $this->xaddress;?></td>
					</tr>
					<tr>
						<td><b><p style="text-align:left;margin-bottom: 5px;color:#DC2A28!important;">Amount :</p></b></td>
						<td><p style="text-align:left"><?php echo $this->inword;?></p></td>
					</tr>
					<tr>
						<td><b><p style="text-align:left;margin-bottom: 5px;color:#DC2A28!important;">Subject :</p></b></td>
						<td><p style="text-align:left"><strong>INVOICE</strong></p></td>
					</tr>
				</table>
			</div>
			<table style="width:90%;margin-left: 35px;text-align:right;font-size:12px;font-family: Calibri;">
				<tr style="border-bottom: 1px solid;">
					<th style="text-align:left;color:#DC2A28!important;">Model Number</th>
					<th style="text-align:left;color:#DC2A28!important;">Items</th>
					<th style="text-align:right;color:#DC2A28!important;">Quantity</th>
					<th style="text-align:right;color:#DC2A28!important;">Price Per Unit (KWD)</th>
					<th style="text-align:right;color:#DC2A28!important;">Total (KWD)</th>
				</tr>
				<?php $grosstot=0; 
					foreach ($this->rows as $key=>$values){					
					?>
				<tr style="border-bottom: 1px solid;">
					<td style="text-align:left"><?php echo $values["xitemcode"]; ?></td>
					<td style="text-align:left"><?php echo $values["xitemdesc"]; ?></td>
					<td><?php echo $values["xqty"]; ?></td>
					<td><?php echo number_format(floatval($values["xrate"]), Session::get('sbizdecimals'), '.', ''); ?></td>
					<td><?php echo number_format(floatval($values["xsalestotal"]), Session::get('sbizdecimals'), '.', ''); ?></td>
					<?php $grosstot+=$values["xsalestotal"]; $nettotal = $grosstot-$this->xgrossdisc;?>
				</tr>
					<?php } ?>
				<tr style="border-top: 1px solid;">
					<td></td>
					<td></td>
					<td></td>
					<td><b style="color:#DC2A28!important;">Total :</b></td>
					<td><?php echo number_format(floatval($grosstot), Session::get('sbizdecimals'), '.', ''); ?></td>
				</tr>
				<tr style="">
					<td></td>
					<td></td>
					<td></td>
					<td><b>Total Discount :</b></td>
					<td><?php echo number_format(floatval($this->xgrossdisc), Session::get('sbizdecimals'), '.', ''); ?></td>
				</tr>
				<tr style="border-bottom: 1px solid black;">
					<td></td>
					<td></td>
					<td></td>
					<td><b style="color:#DC2A28!important;">Grand Total :</b></td>
					<td><?php echo number_format(floatval($nettotal), Session::get('sbizdecimals'), '.', ''); ?></td>
				</tr>
			</table>
			<p style="text-align:left;text-align: left;margin-left: 40px;margin-top: 10px;"><b style="color:#DC2A28!important;font-size:12px;font-family: Calibri;">Additional Notes :</b></p>
			<p style="text-align:left;text-align: left;margin-left: 40px;margin-top: 10px;font-size:12px;font-family: Calibri;"><?php echo nl2br($this->xnotes); ?></p>
			<p style="text-align:left;text-align: left;margin-left: 40px;margin-top: 55px;float:left;border-top: 1px solid;font-size:12px;font-family: Calibri;"><b>Authorized Signature</b></p>
			<p style="text-align:left;text-align: left;margin-left: 40px;margin-top: 55px;float:right; display:inline;margin-right: 50px;border-top: 1px solid;font-size:12px;font-family: Calibri;"><b>Customer Signatory</b></p>
			
		</div>
		
		
        