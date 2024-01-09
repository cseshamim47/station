<style>
    .ex-table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 20px;
    }

    .ex-table>tbody>tr>td,
    .table>tbody>tr>th,
    .table>tfoot>tr>td,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>thead>tr>th {
        line-height: 1.42857;
        vertical-align: top;
        padding: 8px;
    }

    .table-bordered,
    .ex-table {
        margin-bottom: 5px;
    }

    .panel-info>.panel-heading {
        background-color: white;
        border-color: white;
    }
</style>
<?php
$apprbutname = "Approve";
if (Session::get('suser') == 'zahurul830@gmail.com' && $this->reqmst[0]['xappstatus'] == "Confirmed")
    $apprbutname = "Checked";
?>
<div class="col-sm-12 col-md-12 main">

    <div class="panel panel-info">
        <div class="panel-heading">
            <div style="text-align: center;">
                <h4><strong>Supplier Payment</strong></h4>
            </div>
            <div class="col-md-12">
                <?php if ($this->reqmst[0]['xcomment']) { ?>
                    <h4>Previous Modified details</h4>
                    <div><?php echo $this->reqmst[0]['xcomment']; ?></div>
                    <hr>
                <?php } ?>
                <table class="table table-bordered table-striped table-responsive" style="width:100%">
                    <tr>
                        <form class="form-horizontal" name="dynamicfrm" id="dynamicfrm" action="<?php echo $this->cencelUrl ?>" method="post" enctype="multipart/form-data">
                            <td>
                                <input class="form-control" type="text" name="comment" placeholder="Write Modification Type...." value="" width="180">
                            </td>
                            <td>
                                <input class="btn btn-warning" type="submit" value="Modify" width="10">
                            </td>
                        </form>
                    </tr>
                </table>
                <a class="btn btn-info" id="" href="<?php echo $this->backUrl ?>" role="button">Back</a>
                <a id="appbtn" class="btn btn-success" href="<?php echo $this->approveUrl ?>" role="button"><?php echo $apprbutname ?></a>
                <a id="delbtn" class="btn btn-danger" href="<?php echo $this->deleteUrl ?>" role="button">Delete</a>
            </div>
        </div>
        <div class="panel-body">

            <div style="float: right;"><button class="btn btn-primary" onclick="test();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</button></div>
            <div id="printdiv">
                <div class="div-print" style="height:10.6in;width:8.3in; margin:0 auto;padding-top:30px">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tr>
                                <td align="center" colspan="3"><img style="height: 94px; width: 743px;" src="<?php echo URL; ?>public/images/company_header.jpg" alt="" /></td>
                            </tr>
                            <tr>

                                <td colspan="3" align="center"><b>PUR : 03/008</b></td>
                            </tr>
                            <tr>
                                <td colspan="3" align="center"><b>TITLE: Supplier Payment</b></td>
                            </tr>
                            <tr>
                                <td align="center">Effective Date: 01/12/2017</td>
                                <td align="center">Revision Status: 01</td>
                                <td align="center">Page 01 of 01</td>
                            </tr>
                        </table>
                        <table class="ex-table">
                            <tr>
                                <td><b>Txn No: </b><?php echo $this->reqmst[0]['xtxnnum'] ?></td>
                                <td><b>GRN Number: </b><?php echo $this->reqmst[0]['xgrnnum'] ?></td>
                                <td><b>Project: </b><?php echo $this->reqmst[0]['xproj'] ?></td>
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
                    <div class="col-md-12">
                        <?php echo $this->table ?>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tr>
                                <?php
                                $apparray = explode(";", $this->reqmst[0]['xemail']);
                                ?>
                                <td colspan="6" align="center">
                                    <?php
                                    $i = 0;
                                    foreach ($apparray as $key => $value) {
                                        $signarray = explode(":", $value);
                                        if ($signarray[0] == "Confirmed" && $signarray[1] == "zahurul830@gmail.com") {
                                            $i++;
                                    ?>
                                            <img style="height: 50px;width: 100px;" src="<?php echo URL; ?>images/<?php echo $signarray[1] ?>.png" alt="" />
                                            </br>
                                        <?php }
                                    }
                                    if ($i == 0) { ?>
                                        </br>
                                        </br>
                                    <?php } ?>
                                    <span>Checked by AGM(Admin & Accounts)</span>
                                </td>
                            </tr>
                            <tr>

                                <td>

                                    </br>
                                    </br>
                                    <span>Received By</span>
                                </td>
                                <td align="center">
                                    <?php if (!empty($this->reqmst[0]['paidby']) && $this->reqmst[0]['paidby'] != "") { ?>
                                        <img style="height: 50px;width: 80px;" src="<?php echo URL; ?>images/<?php echo $this->reqmst[0]['paidby'] ?>.png" alt="" />
                                        </br>
                                    <?php } else { ?>
                                        </br>
                                        </br>
                                    <?php } ?>
                                    <span>Accountant</span>
                                </td>
                                <td align="center">
                                    <img style="height: 50px;width: 80px;" src="<?php echo URL; ?>images/<?php echo $this->reqmst[0]['zemail'] ?>.png" alt="" />
                                    </br>
                                    <span>Dept. Executive</span>
                                </td>
                                <?php if ($this->level == 4) { ?>
                                    <td align="center">
                                        <?php if (!empty($apparray[0])) { ?>
                                            <img style="height: 50px;width: 80px;" src="<?php echo URL; ?>images/<?php echo explode(":", $apparray[0])[1] ?>.png" alt="" />
                                            </br>
                                        <?php } else { ?>
                                            </br>
                                            </br>
                                        <?php } ?>
                                        <span>Dept. In-Charge</span>
                                    </td>
                                <?php } ?>
                                <td align="center">
                                    <?php
                                    $i = 0;
                                    foreach ($apparray as $key => $value) {
                                        $signarray = explode(":", $value);
                                        if (!empty(trim($signarray[0]," ")) && trim($signarray[0]," ") != "Modify" && trim($signarray[0]," ") != "Delete" && trim($signarray[1]," ") == "akramuzzaman@nnsel.com") {
                                            $i++;
                                    ?>
                                            <img style="height: 50px;width: 80px;" src="<?php echo URL; ?>images/<?php echo trim($signarray[1]," ") ?>.png" alt="" />

                                        <?php }
                                    }
                                    if ($i == 0) { ?>
                                        </br>
                                        </br>
                                    <?php } ?>
                                    </br>
                                    <span>Procurement Manager</span>
                                </td>
                                <td align="center">
                                    <?php
                                    $i = 0;
                                    foreach ($apparray as $key => $value) {
                                        $signarray = explode(":", $value);
                                        if (!empty(trim($signarray[0]," ")) && trim($signarray[0]," ") != "Modify" && trim($signarray[0]," ") != "Delete" && trim($signarray[1]," ") == "falgunimahmud@nnsel.com") {
                                            $i++;
                                    ?>
                                            <img style="height: 50px;width: 80px;" src="<?php echo URL; ?>images/<?php echo trim($signarray[1]," ") ?>.png" alt="" />

                                        <?php }
                                    }
                                    if ($i == 0) { ?>
                                        </br>
                                        </br>
                                    <?php } ?>
                                    </br>
                                    <span>Director</span>
                                </td>

                            </tr>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <img style="height: 94px; width: 100%;" src="<?php echo URL; ?>public/images/company_footer.jpg" alt="" />
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>