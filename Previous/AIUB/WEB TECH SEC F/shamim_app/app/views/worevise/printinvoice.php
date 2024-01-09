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
                    <h4><strong>Work Order Revise</strong></h4> 
                </div>
			</div>
        <div class="panel-body" >
		<div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
        <div id="printdiv">
            <div style="text-align:center;height:10.6in;width:8.3in; margin:0 auto;padding-top:30px">
			<div class="col-md-12">
				<table class="table table-bordered">
                    <tr>
                        <td align="center" colspan="3"><img style="height: 94px; width: 743px;" src="<?php echo URL;?>public/images/company_header.jpg" alt="" /></td>
                    </tr>
					<tr>
						<td colspan="3"><b>PUR : 03/008-A</b></td>
					</tr>
					<tr>
						<td colspan="3"><b>TITLE: Work Order</b></td>
					</tr>
					<tr>
						<td align="center">Effective Date: 01/12/2017</td>
						<td align="center">Revision Status: 00</td>
						<td align="center">Page 01 of 01</td>
					</tr>
				</table>
				<table class="ex-table">
					<tr>
						<td><b>Revise NO: </b><?php echo $this->reqmst[0]['wornum'] ?></td>
						<td><b>WO Number: </b><?php echo $this->reqmst[0]['wonum'] ?></td>
						<td><b>Project: </b><?php echo $this->reqmst[0]['xproject'] ?></td>
						<td><b>Date: </b><?php echo date("d/m/Y", strtotime($this->reqmst[0]['xdate'])) ?></td>
					</tr>
				</table>
				<table class="ex-table" style="text-align: left">
					<tr>
						<td style="border: 1px solid;"><b>Ref: </b><?php echo $this->reqmst[0]['toname'] ?></td>
						<td style="border: 1px solid;"><b>Name: </b><?php echo $this->reqmst[0]['toorg'] ?></td>
					</tr>
                    <tr>
						<td style="border: 1px solid;"><b>Org: </b><?php echo $this->reqmst[0]['toorg'] ?></td>
						<td style="border: 1px solid;"><b>Mobile: </b><?php echo $this->reqmst[0]['tomobile'] ?></td>
					</tr>
                    <tr>
						<td colspan="2" style="border: 1px solid;"><b>Subject: </b><?php echo $this->reqmst[0]['xsubject'] ?></td>
					</tr>
					<tr>
						<td colspan="2" style="border: 1px solid;"><b>Address: </b><?php echo $this->reqmst[0]['toadd'] ?></td>
					</tr>
                    <tr>
						<td colspan="2" style="border: 1px solid;"><b>Note: </b><?php echo $this->reqmst[0]['xnotes'] ?></td>
					</tr>
					<tr>
						<td colspan="2" style="border: 1px solid;"><b>Total Amount: </b><?php echo $this->reqmst[0]['xamount'] ?> BDT</td>
					</tr>
				</table>
			</div>
			<div class="col-md-12">
                        <table class="table table-bordered">
                            <tr>
                                <?php $apparray = explode(";", $this->reqmst[0]['xemail']); ?>
                                <td>
                                    
                                    </br>
                                    </br>
                                    <span>Received By</span>
                                </td>
                                <td>
                                    <?php if(!empty($this->reqmst[0]['paidby']) && $this->reqmst[0]['paidby']!=""){ ?>
                                    <img style="height: 50px;width: 100px;" src="<?php echo URL;?>images/<?php echo $this->reqmst[0]['paidby'] ?>.png" alt="" />
                                    </br>
                                    <?php }else{ ?>
                                    </br>
                                    </br>
                                    <?php } ?>
                                    <span>Accountant</span>
                                </td>
                                <td>
                                    <img style="height: 50px;width: 100px;" src="<?php echo URL;?>images/<?php echo $this->reqmst[0]['zemail'] ?>.png" alt="" />
                                    </br>
                                    <span>Department Executive</span>
                                </td>
                                <td>
                                    <?php if(!empty($apparray[0])){ ?>
                                    <img style="height: 50px;width: 100px;" src="<?php echo URL;?>images/<?php echo explode(":", $apparray[0])[1] ?>.png" alt="" />
                                    </br>
                                    <?php }else{ ?>
                                    </br>
                                    </br>
                                    <?php } ?>
                                    <span>Procurement Manager</span>
                                </td>
                                <td>
                                    <?php if(!empty($apparray[1])){ ?>
                                    <img style="height: 50px;width: 100px;" src="<?php echo URL;?>images/<?php echo explode(":", $apparray[1])[1] ?>.png" alt="" />
                                    </br>
                                    <?php }else{ ?>
                                    </br>
                                    </br>
                                    <?php } ?>
                                    <span>Director</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-12">
                    <img style="height: 94px; width: 100%;" src="<?php echo URL;?>public/images/company_footer.jpg" alt="" />
                    </div>
                </div>
            </div>
		</div>
    </div>
		
		
        