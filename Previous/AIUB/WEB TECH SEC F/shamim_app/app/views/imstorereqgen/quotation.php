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
						<td rowspan="3" style="width:180px"><img style="height: 120px;width: 135px;" src="<?php echo URL;?>public/images/bizdir/100.jpg" alt="" /></td>
						<td colspan="3"><b>Document Code: STR/03/002</b></td>
					</tr>
					<tr>
						<td colspan="3"><b>TITLE: Store Requisition Form</b></td>
					</tr>
					<tr>
						<td>Effective Date: 1/12/2017</td>
						<td>Revision Status: 00</td>
						<td>Page 1 of 1</td>
					</tr>
				</table>
				<table class="ex-table">
					<tr>
						<td>Type: <?php echo $this->xtype ?></td>
						<td>Project: <?php echo $this->xproject ?></td>
						<td>Date: <?php echo date("d/m/Y", strtotime($this->xdate)) ?></td>
					</tr>
				</table>
			</div>
			<div class="col-md-12">
				<?php echo $this->table ?>
			</div>
			<div class="col-md-12">
				<table class="table table-bordered">
					<tr style="height:40px">
						<td align="left"></td>
						<td align="left"></td>
						<td align="left"></td>
						<td align="left"></td>
					</tr>
					<tr>
						<td>Received by</td>
						<td>Department In Charge</td>
						<td>Procurement Manager</td>
						<td>Managing Director</td>
					</tr>
				</table>
			</div>
			
		</div>
		
		
        