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
                    <h4><strong>Bill</strong></h4> 
                </div>
                <div class="col-md-12" style="background: #d9edf7;">
                    <?php echo $this->formHtml ?>
                </div>
			</div>
            <div class="panel-body" >
            <div id="printdiv">
                <div style="text-align:center;height:10.6in;width:8.3in; margin:0 auto;padding-top:30px">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tr>
                                <td rowspan="3" style="width:180px"><img style="height: 120px;width: 135px;" src="<?php echo URL;?>public/images/bizdir/100.jpg" alt="" /></td>
                                <td colspan="3"><b>Document Code: ACC/03/001</b></td>
                            </tr>
                            <tr>
                                <td colspan="3"><b>TITLE: BILL</b></td>
                            </tr>
                            <tr>
                                <td>Effective Date: 01/12/2017</td>
                                <td>Revision Status: 00</td>
                                <td>Page 01 of 01</td>
                            </tr>
                        </table>
                        <table class="ex-table">
                            <tr>
                                <td>Txn No: <?php echo $this->billmst[0]['xtxnnum'] ?></td>
                                <td>Name: <?php echo $this->billmst[0]['xsup'] ?></td>
                                <td>Project: <?php echo $this->billmst[0]['xproject'] ?></td>
                                <td>Date: <?php echo date("d/m/Y", strtotime($this->billmst[0]['xdate'])) ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <?php echo $this->table ?>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <!-- <tr style="height:70px">
                                <td align="left">Prepared By:</td>
                                <td align="left">Approved By:</td>
                                <td align="left">Re Approved By:</td>
                            </tr> -->
                            <tr>
                                <?php $apparray = explode(";", $this->billmst[0]['xemail']); ?>
                                <td>
                                    
                                    <img style="height: 50px;width: 100px;" src="<?php echo URL;?>images/<?php echo $this->billmst[0]['zemail'] ?>.png" alt="" />
                                    
                                    </br>
                                    <span>PREPARED</span>
                                </td>
                                <td>
                                    
                                    </br>
                                    <span>Department In charge</span>
                                </td>
                                <td>
                                    <?php if(!empty($apparray[0])){ ?>
                                    <img style="height: 50px;width: 100px;" src="<?php echo URL;?>images/<?php echo explode(":", $apparray[0])[1] ?>.png" alt="" />
                                    <?php } ?>
                                    </br>
                                    <span>Procurement Manager</span>
                                </td>
                                <td>
                                    <?php if(!empty($apparray[1])){ ?>
                                    <img style="height: 50px;width: 100px;" src="<?php echo URL;?>images/<?php echo explode(":", $apparray[1])[1] ?>.png" alt="" />
                                    <?php } ?>
                                    </br>
                                    <span>Director</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                </div>
        </div>
			</div>
        </div>