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
    <div class="panel-body">
        <div style="float: right;"><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</a></div>
        <div id="printdiv">
            <div style="text-align:center;height:10.6in;width:8.3in; margin:0 auto;padding-top:30px">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            <td align="center" colspan="3"><img style="height: 94px; width: 743px;" src="<?php echo URL; ?>public/images/company_header.jpg" alt="" /></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center"><b>Document Code: ACC/03/001</b></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center"><b>TITLE: BILL</b></td>
                        </tr>
                        <tr>
                            <td align="center">Effective Date: 01/12/2017</td>
                            <td align="center">Revision Status: 00</td>
                            <td align="center">Page 01 of 01</td>
                        </tr>
                    </table>
                    <table class="ex-table">
                        <tr>
                            <td>Txn No: <?php echo $this->billmst[0]['xtxnnum'] ?></td>
                            <td>Name: <?php echo $this->billmst[0]['xsup'] ?></td>
                            <td>Mobile: <?php echo $this->billmst[0]['xmobile'] ?></td>
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
                        <tr>
                            <?php
                            $apparray = explode(";", $this->billmst[0]['xemail']);
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
                                <?php if (!empty($this->billmst[0]['paidby']) && $this->billmst[0]['paidby'] != "") { ?>
                                    <img style="height: 50px;width: 80px;" src="<?php echo URL; ?>images/<?php echo $this->billmst[0]['paidby'] ?>.png" alt="" />
                                    </br>
                                <?php } else { ?>
                                    </br>
                                    </br>
                                <?php } ?>
                                <span>Accountant</span>
                            </td>
                            <td align="center">
                                <img style="height: 50px;width: 80px;" src="<?php echo URL; ?>images/<?php echo $this->billmst[0]['zemail'] ?>.png" alt="" />
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