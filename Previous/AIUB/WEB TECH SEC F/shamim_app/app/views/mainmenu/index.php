<?php 
$bizcur = $this->bizcur;

//---------------Sales--------------//
$consales=0; $unsales=0; $cansales=0;
if(!empty($this->tsales)){$consales=$this->tsales[0]['tsales'];}
if(!empty($this->tunconfirmedsales)){$unsales=$this->tunconfirmedsales[0]['tsales'];}
if(!empty($this->tcaneclsales)){$cansales=$this->tcaneclsales[0]['tsales'];}

//-------------PO--------------//
$conpo=0; $unpo=0; $canpo=0;
if(!empty($this->tpo)){$conpo=$this->tpo[0]['tpo'];}
if(!empty($this->tunconfirmedpo)){$unpo=$this->tunconfirmedpo[0]['tpo'];}
if(!empty($this->tcaneclpo)){$canpo=$this->tcaneclpo[0]['tpo'];}

//-------------Income------------//
$totalin=0; $prein=0; $curin=0; $todayin=0;
if(!empty($this->curmonthin)){if($this->curmonthin[0]['xamount']!=null){$curin=$this->curmonthin[0]['xamount'];}}
if(!empty($this->totalin)){if($this->totalin[0]['xamount']!=null){$totalin=$this->totalin[0]['xamount'];}}
if(!empty($this->premonthin)){if($this->premonthin[0]['xamount']!=null){$prein=$this->premonthin[0]['xamount'];}}
if(!empty($this->todayin)){if($this->todayin[0]['xamount']!=null){$todayin=$this->todayin[0]['xamount'];}}

//------------Expense----------------//
$totalcol=0; $precol=0; $curcol=0; $todaycol=0;
if(!empty($this->totalex)){if($this->totalex[0]['xamount']!=null){$totalcol=$this->totalex[0]['xamount'];}}
if(!empty($this->curmonthex)){if($this->curmonthex[0]['xamount']!=null){$curcol=$this->curmonthex[0]['xamount'];}}
if(!empty($this->premonthex)){if($this->premonthex[0]['xamount']!=null){$precol=$this->premonthex[0]['xamount'];}}
if(!empty($this->todayex)){if($this->todayex[0]['xamount']!=null){$todaycol=$this->todayex[0]['xamount'];}}

//-----------------Total Customer-------------//
$totalcus="";
if(!empty($this->totalcus)){$totalcus=$this->totalcus[0]['totalcus'];}

 ?>

<style type="text/css">
    .bg-red p {
        margin: 0 0 0px;
    }
    .bg-yellow p {
        margin: 0 0 0px;
    }
    .bg-aqua p {
        margin: 0 0 2px;
    }
    .bg-green p {
        margin: 0 0 2px;
    }
</style>
    <!-- Main content -->
    <section class="">
    <?php if(Session::get('srole')=="ROLE_ADMIN"){ ?>
     <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua" style="padding: 7px 0 7px 0;">
              <h4 style="margin-bottom: -5px;">Today's :</h4>
           <div class="inner">
              <p>Confirmed Sales : <?php echo $consales; ?></p>
              <p>Unconfirmed Sales : <?php echo $unsales; ?></p>
              <p>Canceled Sales : <?php echo $cansales; ?></p>
            </div>
            <div class="icon">
              <i class="fa fa-bar-chart"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green" style="padding: 7px 0 7px 0;">
              <h4 style="margin-bottom: -5px;">Today's :</h4>
           <div class="inner">
              <p>Confirmed PO : <?php echo $conpo; ?></p>
              <p>Unconfirmed PO : <?php echo $unpo; ?></p>
              <p>Canceled PO : <?php echo $canpo; ?></p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow" style="padding: 1px 0 0px 0;">
              <h4 style="margin-bottom: -5px;">Current Year :</h4>
           <div class="inner">
              <p>Total Income : <?php echo $totalin." ".$bizcur; ?></p>
              <p>Previous Month : <?php echo $prein." ".$bizcur; ?></p>
              <p>Current  Month : <?php echo $curin." ".$bizcur; ?></p>
              <p>Today Income : <?php echo $todayin." ".$bizcur; ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red" style="padding: 1px 0 0px 0;">
              <h4 style="margin-bottom: -5px;">Current Year :</h4>
           <div class="inner">
              <p>Total Expenses : <?php echo $totalcol." ".$bizcur; ?></p>
              <p>Previous Month : <?php echo $precol." ".$bizcur; ?></p>
              <p>Current  Month : <?php echo $curcol." ".$bizcur; ?></p>
              <p>Today Expenses : <?php echo $todaycol." ".$bizcur; ?></p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-angle-double-down"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Account Receivable</span>
              <span class="info-box-number"><?php if(!empty($this->accrec)){if(($this->accrec[0]['xamount'])!=null){
                    echo ($this->accrec[0]['xamount']);
                  }else{
                    echo "0";
                  }
              } ?><small><?php echo " ".$bizcur; ?></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-angle-double-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Account Payable</span>
              <span class="info-box-number"><?php if(!empty($this->accpay)){if(($this->accpay[0]['xamount'])!=null){
                    echo ($this->accpay[0]['xamount']);
                  }else{
                    echo "0";
                  }
              }  ?><small><?php echo " ".$bizcur; ?></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-database"></i></span>

            <div class="info-box-content">
              <span style="white-space: normal;" class="info-box-text">Total Stock In Amount</span>
              <span class="info-box-number"><?php echo " ".$this->stock[0]["xtotal"]; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Customer</span>
              <span class="info-box-number"><?php echo $totalcus ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Monthly Recap Report</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-6" id="saleschart">

                </div>
                <!-- /.col -->
                <div class="col-md-6" id="pochart">

                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 col-xs-8">
                  <div class="description-block border-right">
                    <h5 class="description-header"><?php echo $totalin." ".$bizcur; ?></h5>
                    <span class="description-text">TOTAL REVENUE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-xs-8">
                  <div class="description-block border-right">
                    <h5 class="description-header"><?php echo $totalcol." ".$bizcur; ?></h5>
                    <span class="description-text">TOTAL COST</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 col-xs-8">
                  <div class="description-block border-right">
                    <h5 class="description-header"><?php echo ($totalin-$totalcol)." ".$bizcur; ?></h5>
                    <span class="description-text">TOTAL PROFIT</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Top Ten Items</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="toptenitem" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Item Code</th>
                    <th>Description</th>
                    <th>Rate</th>
                    <th>Qty</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($this->topitem)){
                    foreach ($this->topitem as $key => $value) { ?>
                      <tr>
                        <td><?php echo $value['xitemcode'] ?></td>
                        <td><?php echo $value['xdesc'] ?></td>
                        <td><?php echo $value['xrate'] ?></td>
                        <td><?php echo $value['xqty'] ?></td>
                      </tr>
                   <?php } } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Top Ten Customers</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="toptencus" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Customer Code</th>
                    <th>Org</th>
                    <th>Address</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($this->topcus)){
                    foreach ($this->topcus as $key => $value) { ?>
                      <tr>
                        <td><?php echo $value['xcus'] ?></td>
                        <td><?php echo $value['xorg'] ?></td>
                        <td><?php echo $value['xadd1'] ?></td>
                        <td><?php echo $value['xtotal'] ?></td>
                      </tr>
                   <?php } } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <?php }else{ ?>
      <div class="row">
        
      </div>
      <div class="col-md-12">
          <div class="box box-success">
            <!-- <div class="box-header">
            </div> -->
            <div class="box-body">
              <div class="col-md-2">
              <img style="height: 120px;width: 135px;display: block;margin-left: auto;margin-right: auto" src="<?php echo URL;?>public/images/bizdir/100.jpg" alt="" />
              </div>
              <div class="col-md-10">
              <h2>WELCOME<br><?php echo Session::get('sbizlong') ?></h2>
              <!-- style="text-align:center" -->
              </div>
            </div>
          </div>
      </div>
      <?php } ?>
    </section>
    <!-- /.content -->

