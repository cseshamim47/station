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
		  <div class="panel panel-info">
            <div class="panel-heading">
                <div style="text-align: center;">
                    <h4><strong>INVOICE</strong></h4> 
                </div>
			</div>
            <div class="panel-body" >
            <div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
            <div id="printdiv">
                <div style="text-align:center;height:10.6in;width:8.3in; margin:0 auto;padding-top:30px">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tr>
                                <td rowspan="3" style="width:180px"><img style="height: 120px;width: 135px;" src="<?php echo URL;?>public/images/bizdir/100.jpg" alt="" /></td>
                                <td colspan="3"><b>STR/03/005</b></td>
                            </tr>
                            <tr>
                                <td colspan="3"><b>TITLE: INVOICE</b></td>
                            </tr>
                            <tr>
                                <td>Effective Date: 01/12/2017</td>
                                <td>Revision Status: 00</td>
                                <td>Page 01 of 01</td>
                            </tr>
                        </table>
                        <table class="ex-table">
                            <tr>
                                <td><strong>From: </strong><?php echo $this->xtxnwh ?></td>
                                <td><strong>To: </strong><?php echo $this->xwh ?></td>
                                <td style="width: 150px"><strong>DATE: </strong><?php echo date('d-m-Y', strtotime($this->dt)) ?></td>
                            </tr>
							<tr>
                                <td><strong>INVOICE NO: </strong><?php echo $this->txnno ?></td>
                                <td><strong>VEHICLES: </strong></td>
                                <td><strong>NO: </strong></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-12">
					<div class="table-responsive">
					<table id="mytbl" class="table table-bordered table-striped" style="width:100%">
					<thead>
						<tr>
							<th>SL.No</th><th>CODE</th><th>PRODUCT</th><th>QUALITY</th><th>QUANTITY</th><th>REMARKS</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$sl = 0;
						$total =0;
						foreach($this->vrow as $val){
							$sl +=1;
							$total +=$val['xqty'];
						?>
							<tr>
							<td><?php echo $sl ?></td>
							<td><?php echo $val['xitemcode']; ?></td>
							<td><?php echo $val['xitemdesc']; ?></td>
							<td></td>
							<td align="right"><?php echo $val['xqty']; ?></td>
							<td></td>
						</tr>
						<tr>
							<td></td><td></td><td></td><td>Total</td>
							<td align="right"><?php echo $total; ?></td>
							<td></td>
						</tr>
						<?php
						} 
						?>
					</tbody>
					</table>
					</div>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    
                                    </br>
                                    </br>
                                    <span>RECEIVER</span>
                                </td>
                                <td>
                                   
                                    </br>
                                    <span>SECURITY IN CHARGEE</span>
                                </td>
                                <td>
                                    
                                    </br>
                                    <span>SITE ENGINIEER</span>
                                </td>
                                <td>
                                   
                                    </br>
                                    <span>PROCUREMENT MANAGER</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                </div>
			</div>
			</div>
        </div>