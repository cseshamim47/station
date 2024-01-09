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
	<div class="panel-body">
		<div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
		<?php echo $this->breadcrumb; ?>
			<div id="printdiv"  style="text-align:center;height:10.6in;width:8.3in; margin:0 auto;padding-top:30px">

				<div class="col-md-12">
					<table class="table table-bordered" style="text-align:center;">
						<tr>
							<td align="center" colspan="3"><img style="height: 94px; width: 743px;" src="<?php echo URL;?>public/images/company_header.jpg" alt="" /></td>
						</tr>
						<tr>
							<td colspan="3"><b>PUR : 03/006</b></td>
						</tr>
						<tr>
							<td colspan="3"><b>TITLE: Supply Order</b></td>
						</tr>
						<tr>
							<td align="center">Effective Date: 1/12/2017</td>
							<td align="center">Revision Status: 01</td>
							<td align="center">Page 1 of 1</td>
						</tr>
					</table>
					<table  class="ex-table">
						<tr>
							<td align="center"><b>Ref: </b><?php echo $this->supdoc ?></td>
							<td align="center"><b>PO No: </b><?php echo $this->pono ?></td>
							<td align="center"><b>Project: </b><?php echo $this->xproject ?></td>
							<td align="center"><b>Date: </b><?php echo date("d/m/Y", strtotime($this->xdate)) ?></td>
						</tr>
						<tr>
							<td align="center"><b>Supplier ID: </b><?php echo $this->supid ?></td>
							<td align="center"><b>Supplier Name: </b><?php echo $this->supplier ?></td>
							<td align="center"><b>Mobile: </b><?php echo $this->supmobile ?></td>
							<td align="center"><b>Phone: </b><?php echo $this->supphone ?></td>
						</tr>
					</table>
				</div>

		
				<div class="col-md-12">
                    <table class="table table-bordered table-striped">
						<thead>
							<th>Sl.</th><th>Itemcode</th><th style="text-align:center">Item Name</th><th style="text-align:center">Qty</th><th style="text-align:center; width: 82px;">Rate</th><th style="text-align:center">Total</th>
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
								<td align="center"><?php echo $val['xratepur']; ?></td>
								<td align="right"><?php echo number_format($val['xtotal'],Session::get('sbizdecimals')); ?></td>
							</tr>
						<?php } ?>	
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4" align="right"><strong>Total</strong></td><td align="center"><strong><?php echo $this->totqty; ?></strong></td><td align="right"><strong><?php echo number_format($this->total,Session::get('sbizdecimals')); ?></strong></td>
							</tr>
							<tr>
								<td colspan="8"><strong><?php echo $this->inword; ?></strong></td>
							</tr>
							<tr>	
								<td colspan="8"><p style="text-align:left;text-align: left;margin-left: 10px;margin-top: 10px;"><b style="font-size:12px;font-family: Calibri;">Additional Notes : <?php echo nl2br($this->note); ?></b></p></td>
							</tr>
						</tfoot>
					</table>
                </div>
				<div class="col-md-12">
					<img style="height: 94px; width: 100%;" src="<?php echo URL;?>public/images/company_footer.jpg" alt="" />
				</div>
		</div>
	</div>
            
        	

