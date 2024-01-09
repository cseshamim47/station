<style>
	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 4px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
	.table>thead>tr>th{
		background-color: #95B72B!important;
	}
</style>
           
				<div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
					<?php echo $this->breadcrumb; ?>
				<div id="printdiv">






		<div class="main-div" style="margin-top:100px;"><div style="text-align:center"><strong align="center" style="border-bottom:1px solid;">Delivery Return</strong></div><table class="table table-bordered" cellspacing="0" width="100%" role="grid" aria-describedby="dtbl_info" style="width: 100%; font-size:12px; margin-top:10px;">
		<tr><td style="background-color:#d8d8d8!important;width: 100px;">Invoice No.</td><td><?php echo $this->dono; ?></td><td style="background-color:#d8d8d8!important;width: 80px;">Customer ID</td><td><?php echo $this->cusid; ?></td><td style="background-color:#d8d8d8!important;width: 85px;">Invoice Date</td><td><?php echo $this->xdate; ?></td></tr>
		<tr><td style="background-color:#d8d8d8!important;">Customer Name</td><td colspan="3"><?php echo $this->supplier; ?></td><td style="background-color:#d8d8d8!important;">Phone</td><td colspan=""><?php echo $this->supphone; ?></td></tr>
		<tr><td style="background-color:#d8d8d8!important;">Divition</td><td><?php echo $this->divition; ?></td><td style="background-color:#d8d8d8!important;">District</td><td><?php echo $this->district; ?></td><td style="background-color:#d8d8d8!important;">Mobile</td><td colspan=""><?php echo $this->supmobile; ?></td></tr>
		<tr><td style="background-color:#d8d8d8!important;">Address</td><td colspan="5"><?php echo $this->supadd?></td></tr></table>



				<div>
                    <table class="table table-bordered table-striped">
						<thead>
							<th>Sl.</th><th>Itemcode</th><th style="text-align:center">Item Name</th><th style="text-align:center">Qty</th><th style="text-align:center">Price</th><th style="text-align:center">Total</th>
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
								<td align="center"><?php echo $val['xqty']; ?></td>
								<td align="center"><?php echo $val['xrate']; ?></td>
								<td align="right"><?php echo number_format(($val['xrate']*$val['xqty']),Session::get('sbizdecimals')); ?></td>
								
							</tr>
						<?php } ?>	
						</tbody>
						<tfoot>
							<tr>
								<td colspan="3" align="right"><strong>Total</strong></td><td align="center"><strong><?php echo $this->totqty; ?></strong><td></td><td align="right"><strong><?php echo number_format($this->totalam,Session::get('sbizdecimals')); ?></td></strong></td>
							</tr>
							
						</tfoot>
					</table>
						
                </div>
				<div class="signature" style="overflow: hidden;width: 100%;"><div style = "width:20%;float:left;text-align:center;margin-top:60px;overflow:hidden;"><p style="border-top: 1px solid;">Created By</p></div><div style = "width:60%;float:left;text-align:center;margin-top:60px;">Prepared by : <?php echo Session::get('suser')?></div><div style = "width:20%;float:left;text-align:center;border-top: 1px solid;margin-top:60px;">Approved By</div></div>	
			</div>
            
       

