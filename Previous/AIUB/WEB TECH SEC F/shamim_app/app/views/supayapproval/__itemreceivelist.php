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
<div class="col-sm-12 col-md-12 main">
          
		  <div class="panel panel-info">
            <div class="panel-heading">
                <div style="text-align: center;">
                    <h4><strong>Supplier Payment</strong></h4> 
                </div>
                <a class="btn btn-info" id=""  href="<?php echo $this->backUrl ?>" role="button">Back</a>
                <a id="appbtn" class="btn btn-success" href="<?php echo $this->approveUrl ?>" role="button">Approve</a>
                <a id="canbtn" class="btn btn-warning" href="<?php echo $this->cencelUrl ?>" role="button">Modify</a>
                <a id="delbtn" class="btn btn-danger" href="<?php echo $this->deleteUrl ?>" role="button">Delete</a>
			</div>
            <div class="panel-body" >


            <div style="float: right;"><button class="btn btn-primary" onclick="test();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</button></div>
			<div id="printdiv">
                <div class="div-print" style="height:10.6in;width:8.3in; margin:0 auto;padding-top:30px">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tr>
                                <td rowspan="3" style="width:180px"><img style="height: 120px;width: 135px;" src="<?php echo URL;?>public/images/bizdir/100.jpg" alt="" /></td>
                                <td colspan="3"><b>PUR : 03/008</b></td>
                            </tr>
                            <tr>
                                <td colspan="3"><b>TITLE: Supplier Payment</b></td>
                            </tr>
                            <tr>
                                <td>Effective Date: 01/12/2017</td>
                                <td>Revision Status: 01</td>
                                <td>Page 01 of 01</td>
                            </tr>
                        </table>
                        <table class="ex-table">
                            <tr>
                                <td><b>Txn No: </b><?php echo $this->reqmst[0]['xtxnnum'] ?></td>
                                <td><b>GRN Number: </b><?php echo $this->reqmst[0]['xgrnnum'] ?></td>
                                <td><b>Date: </b><?php echo date("d/m/Y", strtotime($this->reqmst[0]['xdate'])) ?></td>
                            </tr>
                        </table>
                        <table class="ex-table">
                            <tr>
                                <td style="border: 1px solid;"><b>Supplier: </b><?php echo $this->reqmst[0]['xsup'] ?> - <?php echo $this->reqmst[0]['xorg'] ?></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid;"><b>Description: </b><?php echo $this->reqmst[0]['xnote'] ?></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid;"><b>Now Pay Amount: </b><?php echo $this->reqmst[0]['xamount'] ?> BDT</td>
                            </tr>
                        </table>
                    </div>
                    <!-- <div class="col-md-12">
                        <table id="mytbl" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL.NO</th>
                                    <th>DATE</th>
                                    <th>DESCRIPTION</th>
                                    <th>BY</th>
                                    <th>DAY</th>
                                    <th>PERSON</th>
                                    <th>AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> -->
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
                    
                </div>
        </div>

			</div>
        </div>
		  
</div>