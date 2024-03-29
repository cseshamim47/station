<head>
	  <link rel="stylesheet" href="<?php echo URL; ?>public/append/jquery.appendGrid-1.7.1.css">
	  <link rel="stylesheet" href="<?php echo URL; ?>public/append/jquery-ui.structure.min.css">
	  <link rel="stylesheet" href="<?php echo URL; ?>public/append/jquery-ui.theme.min.css">
	  <link rel="stylesheet" href="<?php echo URL; ?>views/submittradepay/js/EasyAutocomplete/easy-autocomplete.css">
	  <link rel="stylesheet" href="<?php echo URL; ?>views/submittradepay/js/EasyAutocomplete/easy-autocomplete.themes.min.css">
	  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jqc-1.12.4/dt-1.10.18/r-2.2.2/sl-1.2.6/datatables.min.css"/>
	  <style>
		.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
			padding: 3px;
			line-height: 1;
			vertical-align: top;
			border-top: 1px solid #ddd;
		}
		.table>caption+thead>tr:first-child>td, .table>caption+thead>tr:first-child>th, .table>colgroup+thead>tr:first-child>td, .table>colgroup+thead>tr:first-child>th, .table>thead:first-child>tr:first-child>td, .table>thead:first-child>tr:first-child>th {
			border-top: 0;
			text-align: center;
		}
		.form-group {
			margin-bottom: 5px;
		}
		div.appendGrid table td.last {
			text-align: center;
			vertical-align: middle;
			white-space: nowrap;
			min-width: 0;
		}
		div.appendGrid table.head thead tr.columnHead td {
			width: auto;
			text-overflow: ellipsis;
			text-align: center;
		}
		input[type=checkbox], input[type=radio] {
			margin: 13px 0 0;
			margin-top: 1px\9;
			line-height: normal;
		}
		.panel {
			margin-bottom: -9px;
			background-color: #fff;
			border: 1px solid transparent;
			border-radius: 4px;
			-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
			box-shadow: 0 1px 1px rgba(0,0,0,.05);
		}
		.text-center{
			text-align:center;
		}
		</style>
</head>


<div id = "divtwo" style="">

<div id='processing'>
       <h1>Connecting...</h1>
</div>


<div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li id="tab-one" class="active"><a href="#tab_1" data-toggle="tab">Payment</a></li>
              <li id="tab-two"><a data-toggle="tab" id="disabled" onclick="loadSOTable('Created');" href="#tab_2">Payment List(Un-Confirmed)</a></li>
              <li id="tab-three"><a data-toggle="tab" id="disabled" onclick="loadSOTable('Pending');" href="#tab_3">Payment List(Pending)</a></li>
              <li id="tab-four"><a data-toggle="tab" id="disabled" onclick="loadSOTable('Confirmed');" href="#tab_4">Payment List(Confirmed)</a></li>
              <li id="tab-five"><a data-toggle="tab" id="disabled" onclick="loadSOTable('Canceled');" href="#tab_5">Payment List(Canceled)</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">


			<form class="form-horizontal" name="dotform" id="dotform" action="" method="post" enctype="multipart/form-data" novalidate="novalidate">
			  <div class="panel panel-info">
				<div class="panel-heading">
					<div style="text-align: center;">
						<strong>Supplier Payment Entry</strong>
					</div>
					<div style="text-align: center; color: red;">
						<strong>
							<span id="printlink"></span>
						</strong>
					</div>


					<div class="btn-group" role="group"><a href="<?php echo URL; ?>submittradepay" id="cls" class="btn btn-success"><span class="glyphicon glyphicon-leaf"></span>&nbsp;Clear</a><button type="submit" id="btnSubmit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span>&nbsp;Save</button><a href="javascript:void(0)" id="btnshow" class="btn btn-info"><span class="glyphicon glyphicon-save"></span>&nbsp;Show</a><span id="confirmbtn"></span>
					</div>


					</div>
			</div>





			<div class="" style = "">


<div id="row1" class="form-group"><label for="School" class="col-sm-2 control-label"></label><div class="col-sm-12"><div style="Background-color:#00a6cc; color:white"><strong>Bill Details</strong></div></div></div>

<div id="row0" class="form-group">
	<label for="xtxnnum" class="col-sm-2 control-label">TXN No.</label>
	<div class="col-sm-4" style = "margin-top: 7px;">
	<input type="text" class="form-control input-sm xtxnnum" id="xtxnnum" name="xtxnnum" value="" maxlength="100" placeholder="This Value is created by system">
	</div>
	<label for="xdate" class="col-sm-2 control-label">Date</label>
	<div class="col-sm-4" style = "margin-top: 7px;">
	<input type="text" class="form-control input-sm datepicker" id="xdate" name="xdate">
	</div>
</div>
<div id="row0" class="form-group">
	<!-- <input type="text" id = "xcusbal" name = "xcusbal" value = "" hidden /> -->
	<label for="xsup" class="col-sm-2 control-label" style="color:red;">Supplier ID*</label>
	<div class="col-md-4">
		<div class="input-group">
		<input type="text" class="form-control input-sm" id="xsup" name="xsup" value="" maxlength="20">
		<!-- <input type="text" class="form-control input-sm xsup" id="xsup" name="xsup" value="" maxlength="100"> -->
		<span class="input-group-btn">
			<button class="btn btn-default input-sm" type="button" title="Pick list for Supplier Code*" onclick="popupCenter('<?php echo URL; ?>jsondata/supplierpicklist', 'Item List', 750, 450);"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></button>
		</span>
		</div>
	</div>
	<label for="xorg" class="col-sm-2 control-label" style="color:red;">Supplier Name*</label>
	<div class="col-sm-4"><input type="text" class="form-control input-sm xorg" id="xorg" name="xorg" value="" maxlength="100" readonly="">
	</div>
</div>

<div id="row0" class="form-group">
	<label for="xponum" class="col-sm-2 control-label">PO Number</label>
	<div class="col-md-4">
		<div class="input-group">
		<input type="text" class="form-control input-sm" id="xponum" name="xponum" value="" maxlength="20">
		<span class="input-group-btn">
			<button class="btn btn-default input-sm" type="button" title="Pick list for Supplier Code*" onclick="popupCenter('<?php echo URL; ?>jsondata/popicklist', 'Item List', 750, 450);"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></button>
		</span>
		</div>
	</div>
	<label for="xpobal" class="col-sm-2 control-label">PO Balance</label>
	<div class="col-sm-4"><input type="text" class="form-control input-sm xpobal" id="xpobal" name="xpobal" value="" maxlength="100" readonly>
	</div>
</div>
<div id="row0" class="form-group">
	<label for="xamount" class="col-sm-2 control-label" style="color:red;">Pay Amount</label>
	<div class="col-sm-4"><input type="number" class="form-control input-sm xamount" id="xamount" name="xamount" value="0" maxlength="100">
	</div>
</div>


<!-- <div class = "row">
    <div class = "col-md-12">
        <div class="table-responsive" style="">
			<table style="margin-top:10px" width="100%" id="ItemTable">
			</table>
			<table class="table table-bordered" cellspacing="0" role="grid" aria-describedby="dtbl_info" style="width:1065px;font-weight:bold;"><tr><td align="right" style="">Total : </td><td style="width:130px; text-align:center;"><span id="subtotal">0</span></td><td></td></tr></tbody></table>
        </div>
    </div>
</div> -->




</div>






</form>











              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div id="Created" class="tab-content"></div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
				<div id="Pending" class="tab-content"></div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_4">
				<div id="Confirmed" class="tab-content"></div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_5">
				<div id="Canceled" class="tab-content"></div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>







<div id="ele1" class="a" style = "display:none">

</div>













