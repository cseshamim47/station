<head>
	  <link rel="stylesheet" href="<?php echo URL; ?>public/append/jquery.appendGrid-1.7.1.css">
	  <link rel="stylesheet" href="<?php echo URL; ?>public/append/jquery-ui.structure.min.css">
	  <link rel="stylesheet" href="<?php echo URL; ?>public/append/jquery-ui.theme.min.css">
	  <link rel="stylesheet" href="<?php echo URL; ?>views/booklist/js/EasyAutocomplete/easy-autocomplete.css">
	  <link rel="stylesheet" href="<?php echo URL; ?>views/booklist/js/EasyAutocomplete/easy-autocomplete.themes.min.css">
	  <link rel="stylesheet" href="<?php echo URL; ?>public/theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
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
		.select-sizing{
			height: 26px;
    		width: 250px;
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
              <li id="tab-one" class="active"><a href="#tab_1" data-toggle="tab">Book List Entry</a></li>
              <li id="tab-two"><a data-toggle="tab" id="disabled" onclick="loadSOTable('Created');" href="#tab_2">All List</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">


			<form class="form-horizontal" name="dotform" id="dotform" action="" method="post" enctype="multipart/form-data" novalidate="novalidate">
			  <div class="panel panel-info">
				<div class="panel-heading">
					<div style="text-align: center;">
						<strong>Book List Entry</strong>
					</div>
					<div style="text-align: center; color: red;">
						<strong>
							<span id="printlink"></span>
						</strong>
					</div>


					<div class="btn-group" role="group"><a href="<?php echo URL; ?>booklist" id="cls" class="btn btn-success"><span class="glyphicon glyphicon-leaf"></span>&nbsp;Clear</a><button type="submit" id="btnSubmit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span>&nbsp;Save</button><a href="javascript:void(0)" id="btnshow" class="btn btn-info"><span class="glyphicon glyphicon-save"></span>&nbsp;Show</a><span id="confirmbtn"></span>
					</div>


					</div>
			</div>





			<div class="" style = "">


<div id="row1" class="form-group"><label for="School" class="col-sm-2 control-label"></label><div class="col-sm-12"><div style="Background-color:#00a6cc; color:white"><strong>Book List Details</strong></div></div></div>

<div id="row0" class="form-group">
	<label for="xorg" class="col-sm-2 control-label">Document No.</label>
	<div class="col-sm-4" style = "margin-top: 7px;"><input type="text" class="form-control input-sm xsonum" id="xsonum" name="xsonum" value="" maxlength="100">
	</div>
	<label for="xdate" class="col-sm-2 control-label">Date</label>
	<div class="col-sm-4"><div class="datepicker input-group date "><input type="text" class="form-control valid" name="xdate" value="<?php echo date("d-m-Y") ?>" readonly="" aria-invalid="false"><span class="input-group-addon">
		<span class="glyphicon glyphicon-calendar"></span>
	</span>
	</div></div>
</div>

<div id="row0" class="form-group">
	<!-- <input type="text" id = "xcusbal" name = "xcusbal" value = "" hidden /> -->
	<label for="xcus" class="col-sm-2 control-label" style="color:red;">Customer Code*</label>
	<div class="col-sm-4">
		<div class="input-group">
		<input type="text" class="form-control input-sm" id="xcus" name="xcus" value="" maxlength="20"><span class="input-group-btn">
			<button class="btn btn-default input-sm" type="button" title="Pick list for School Code*" onclick="popupCenter('<?php echo URL; ?>jsondata/schoolpicklist', 'Item List', 750, 450);"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></button>
		</span>
		</div>
	</div>
	<label for="xorg" class="col-sm-2 control-label" style="color:red;">Customer Name*</label>
	<div class="col-sm-4"><input type="text" class="form-control input-sm xorg" id="xorg" name="xorg" value="" maxlength="100" readonly="">
	</div>
</div>

<div id="row0" style="display:none" class="form-group">
	<label for="xwh" class="col-sm-2 control-label" style="color:red;">Warehouse*</label>
	<div class="jqueryselect col-sm-4" id=""><select class="form-control input-sm whcls" id="codeselect" name="xwh"></select><input type="hidden" id="codetype" value="Warehouse"></div>
	<label for="xbook" class="col-sm-2 control-label">Book</label>
	<div class="col-sm-4">
		<div class="clscheck" id="clscheck">
			<label>
				<input class="frmcheck" id="xbook" value="Book" type="checkbox">
			</label>
		</div>
	</div>
	
	<label for="xquotnum" style="display:none" class="col-sm-2 control-label">Quotation No</label><div class="col-sm-4"><input type="text" style="display:none" class="form-control input-sm xquotnum" id="xquotnum" name="xquotnum" value="" maxlength="50"></div>
</div>

<div id="appenddiv">

</div>
<div id="row5" class="form-group"><label for="Invoice Closing Section" class="col-sm-2 control-label"></label><div class="col-sm-12"><div style="Background-color:#00a6cc; color:white"><strong>Additional Details</strong></div></div></div>
<div id="row7" class="form-group"><label for="xnotes" class="col-sm-2 control-label">Additional Notes</label><div class="col-sm-10"><textarea class="form-control error" rows="2" id="xnotes" name="xnotes" ""=""></textarea></div></div>

<div id="row6" style="" class="form-group"><label for="xconvertfor" class="col-sm-2 control-label">Convert Rate</label><div class="col-sm-4"><input type="text" class="form-control input-sm number" id="xconvertfor" name="xconvertfor" value="0.00" number="true" minlength="1" maxlength="18" required="" aria-required="true"></div><label for="xdiscfor" class="col-sm-2 control-label">Discount</label><div class="col-sm-4"><input type="text" class="form-control input-sm number valid" id="xdiscfor" name="xdiscfor" value="0.00" number="true" minlength="1" maxlength="18" required="" aria-required="true" aria-invalid="false"></div></div>

<div id="row5" class="form-group"><label for="Invoice Closing Section" class="col-sm-2 control-label"></label><div class="col-sm-12"><div style="Background-color:#00a6cc; color:white"><strong>Which columns will be print?</strong></div></div></div>
<table style="width:100%">
	<tr>
		<!-- <td><label for="cbbookcode" class="col-sm-2 control-label">Book_Code</label></td> -->
		<!-- <td><input class="frmcheck" id="cbbookcode" value="Book" type="checkbox" checked></td> -->
		<td><input class="frmcheck" id="cbdesc" value="Book" type="checkbox" checked></td>
		<td><label for="cbdesc" class="col-sm-2 control-label">Description</label></td>
		<td><input class="frmcheck" id="cbauthor" value="Book" type="checkbox" checked></td>
		<td><label for="cbauthor" class="col-sm-2 control-label">Author</label></td>
		<td><input class="frmcheck" id="cbqty" value="Book" type="checkbox" checked></td>
		<td><label for="cbqty" class="col-sm-2 control-label">Qty</label></td>
		<td><input class="frmcheck" id="cbfaceval" value="Book" type="checkbox" checked></td>
		<td><label for="cbfaceval" class="col-sm-2 control-label">Face_Value</label></td>
		<td><input class="frmcheck" id="cbdis" value="Book" type="checkbox" checked></td>
		<td><label for="cbdis" class="col-sm-2 control-label">Dis</label></td>
		<td><input class="frmcheck" id="cbconvt" value="Book" type="checkbox" checked></td>
		<td><label for="cbconvt" class="col-sm-2 control-label">Convt</label></td>
		<!-- <td><label for="cbscpur" class="col-sm-2 control-label">Sc._Pur</label></td>
		<td><input class="frmcheck" id="cbscpur" value="Book" type="checkbox" checked></td>
		<td><label for="cbscsale" class="col-sm-2 control-label">Sc._Sale</label></td>
		<td><input class="frmcheck" id="cbscsale" value="Book" type="checkbox" checked></td> -->
	</tr>
</table>

<div class = "row">
    <!-- <div class = "col-md-2">
    </div> -->
    <div class = "col-md-12">
        <div class="table-responsive" style="">
			  
			<table id="tblAppendGrid">
			</table>
			<table style="margin-top:10px" width="100%" id="ItemTable">
			</table>
        </div>
    </div>
</div>




</div>






</form>











              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div id="loadtweets" class="tab-content">
				
					
				
				</div>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
				<div id="loadconfirmed" class="tab-content">

				</div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>





<!-- <div class="ui-widget">
<label for="tags" style="float:left; margin-right:5px; font-size:12px; margin-top:10px; margin-left:55px; text-align:right;">Search Engines:</label>
<input type="text" placeholder="Search for engine..." id="tags" style="width:150px; padding:3px; margin:9px 0 0 0; float:right;" />
</div> -->






<div id="ele1" class="a" style = "display:none">

</div>














