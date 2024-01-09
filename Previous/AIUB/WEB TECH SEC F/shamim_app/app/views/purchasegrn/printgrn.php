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
<?php echo $this->breadcrumb; ?>
<div id="printdiv">




<div class="col-md-12">
	<table class="table table-bordered" style="text-align:center;">
	    <tr>
            <td align="center" colspan="3"><img style="height: 94px; width: 100%;" src="<?php echo URL;?>public/images/company_header.jpg" alt="" /></td>
        </tr>
		<tr>
			
			<td colspan="3"><b>Document Code: STR/03/001</b></td>
		</tr>
		<tr>
			<td colspan="3"><b>TITLE: Material Received</b></td>
		</tr>
		<tr>
			<td>Effective Date: 1/12/2017</td>
			<td>Revision Status: 00</td>
			<td>Page 1 of 1</td>
		</tr>
	</table>
	<table class="table table-bordered">
		<tr>
			<td>PO No: <?php echo $this->ponum ?></td>
			<td>GRN No: <?php echo $this->pono ?></td>
			<td>Project: <?php echo $this->proj ?></td>
			<td>Date: <?php echo date("d/m/Y", strtotime($this->xdate)) ?></td>
		</tr>
		<tr>
			<td>Supplier ID: <?php echo $this->supid ?></td>
			<td>Supplier Name: <?php echo $this->supplier ?></td>
			<td>Mobile: <?php echo $this->supmobile ?></td>
			<td>Phone: <?php echo $this->supphone ?></td>
		</tr>
	</table>
</div>





				<div class="col-md-12">
                    <table class="table table-bordered table-striped">
						<thead>
							<th>Sl.</th><th>Item Code</th><th style="text-align:center">Item Name</th><th style="text-align:center">Qty</th><th style="text-align:center">Rate</th><th style="text-align:center">Total</th>
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
								<td align="center"><?php echo $val['xqtypur']; ?></td>
								<td align="center"><?php echo $val['xratepur']; ?></td>
								<td align="right"><?php echo number_format($val['xtotal'],Session::get('sbizdecimals')); ?></td>
							</tr>
						<?php } ?>	
						</tbody>
						<tfoot>
							<tr>
								<td colspan="3" align="right"><strong>Total</strong></td><td align="center"><strong><?php echo $this->totqty; ?></strong></td><td></td><td align="right"><strong><?php echo number_format($this->total,Session::get('sbizdecimals')); ?></strong></td>
							</tr>
							<tr>
								<td colspan="7"><strong><?php echo $this->inword; ?></strong></td>
							</tr>
						</tfoot>
					</table>
						
                </div>
				<div class="signature" style="overflow: hidden;width: 100%;">
					<div class="col-md-12">
						<table class="table table-bordered">
							<tr>
								<td align="center">
								    </br>
                                    </br>
                                    <span>Store In-charge</span>
                                </td>
								<td align="center">
                                    <?php if($this->vrow[0]['xstatus'] == 'Confirmed'){ ?>
                                    <img style="height: 50px;width: 100px;" src="<?php echo URL;?>images/akramuzzaman@nnsel.com.png" alt="" />
                                    </br>
                                    <?php }else{ ?>
                                    </br>
                                    </br>
                                    <?php } ?>
                                    <span>Procurement Manager</span>
                                </td>
							</tr>
						</table>
					</div>
					<div class="col-md-12">
                    <img style="height: 94px; width: 100%;" src="<?php echo URL;?>public/images/company_footer.jpg" alt="" />
                    </div>
				</div>
			</div>
            
       

