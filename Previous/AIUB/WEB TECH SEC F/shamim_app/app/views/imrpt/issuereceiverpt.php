
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
 <div class="panel">
 	<div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
			<?php echo $this->breadcrumb; ?>
 	<div id="printdiv">
	 <div class="col-md-12">
				<table class="table table-bordered" style="text-align:center;">
					<tr>
						<td rowspan="3" style="width:180px"><img style="height: 120px;width: 135px;" src="<?php echo URL;?>public/images/bizdir/100.jpg" alt="" /></td>
						<td colspan="3"><b>Document Code: <?php echo $this->doccode ?></b></td>
					</tr>
					<tr>
						<td colspan="3"><b>TITLE: <?php echo $this->doctitle ?></b></td>
					</tr>
					<tr>
						<td>Effective Date: 1/12/2017</td>
						<td>Revision Status: 00</td>
						<td>Page 1 of 1</td>
					</tr>
				</table>
				<table class="ex-table" style="text-align:left;">
					<tr>
						<td>Type: <?php echo $this->xtype ?></td>
						<td>Date: <?php echo $this->vfdate ?> To <?php echo $this->vtdate ?></td>
						<td>Project: <?php echo $this->xproject ?></td><td></td>
					</tr>
				</table>
			</div>
            <div class="panel-body" >
				<?php echo $this->table;?>
				
				<table class="ex-table" style="margin-top:40px">
					<tr>
						<!-- <td align="left">Prepared By:</td> -->
						<td align="left">Procurement Manager</td>
						<td align="right">Approved</td>
					</tr>
					<!-- <tr>
						<td>Department In charge</td>
						<td>Procurement Manager</td>
						<td>Director</td>
					</tr> -->
				</table>
			</div>
		</div>
        </div>

		