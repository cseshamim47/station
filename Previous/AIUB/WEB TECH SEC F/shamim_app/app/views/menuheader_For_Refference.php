<?php
	
	$bizid = "";
	if (isset($_SESSION["sbizid"])){
		$bizid = $_SESSION["sbizid"];
	}
	
?>
<!DOCTYPE html>
<html lang="en">
    <head>
              <meta charset="utf-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
              <meta name="description" content="">
              <meta name="author" content="">
              <link rel="icon" href="<?php echo URL; ?>public/images/icon/pvoice.ico">
                  <title>PureAPP</title>
              <!-- Bootstrap core CSS -->
              <link rel="stylesheet" href="<?php echo URL; ?>public/bootstrap/bootstrap-3.3.7-dist/css/bootstrap.min.css">
			  
              <!-- Custom styles for this template -->
              <link href="<?php echo URL; ?>public/css/dashboard.css" rel="stylesheet">
              <link href="<?php echo URL; ?>public/css/signin.css" rel="stylesheet">
              <link href="<?php echo URL; ?>public/css/sticky-footer-navbar.css" rel="stylesheet">
			  <link href="<?php echo URL; ?>public/css/navbarcustom.css" rel="stylesheet">
              <link href="<?php echo URL; ?>public/css/dataTables.bootstrap.min.css" rel="stylesheet">
			  <link href="<?php echo URL; ?>public/css/bootstrap-datepicker.css" rel="stylesheet">
			  <link href="<?php echo URL; ?>public/css/font-awesome.css" rel="stylesheet">
			  <link href="<?php echo URL; ?>public/css/button.css" rel="stylesheet">
    </head>
    <body>
	<nav class="navbar navbar-inverse navbar-fixed-top navbar-custom">
      <div class="container-fluid">
        <div class="navbar-header" id="navcolor">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">PureAPP</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse dropdown">
          <ul class="nav navbar-nav navbar-right" id="navcolor">
            <li><a href="#" data-toggle="tooltip" title="Core Settings"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Settings</a></li>
            <li><a href="#" data-toggle="tooltip" title="Change user profile here"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Profile</a></li>
            <li><a href="<?php echo URL; ?>mainmenu/logout/<?php echo $bizid; ?>" data-toggle="tooltip" title="Dashboard"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>Logout</a></li>
		  </ul>
        </div>
      </div>
    </nav>
	
	 <div class="container-fluid">
       
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
		  <?php foreach ($this->mainmenus as $menu) ?>
                <li class="active"><a data-toggle="collapse" href="#collapsems" title="Click to expand menu"><span id="ico" class="glyphicon"></span>Master Satup<span class="sr-only">(current)</span></a></li>
                    <div id="collapsems" class="panel-collapse collapse">
                            <li class="list-group-item"><a href="<?php echo URL; ?>items"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Item Master</a></li>
                            <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Customer Master</a></li>
                            <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Supplier Master</a></li>
                            <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>GL Interface</a></li>
                    </div>
          </ul>
          <ul class="nav nav-sidebar">
                <li class="active"><a data-toggle="collapse" href="#collapsepur" title="Click to expand menu"><span id="ico" class="glyphicon"></span>Purchase<span class="sr-only">(current)</span></a></li>
                    <div id="collapsepur" class="panel-collapse collapse">
                            <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Purchase Requisition</a></li>
                            <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Requisition Approval</a></li>
                            <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Purchase Order</a></li>
                            <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Goods Receipt Note</a></li>
                            <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Purchase Reports</a></li>
                    </div>
          </ul>
          <ul class="nav nav-sidebar">
                    <li class="active"><a data-toggle="collapse" href="#collapsegl" title="Click to expand menu"><span id="ico" class="glyphicon"></span>General Ledger <span class="sr-only">(current)</span></a></li>
                    <div id="collapsegl" class="panel-collapse collapse">
                            <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Journal Voucher</a></li>
                            <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Receipt Voucher</a></li>
                            <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Payment Voucher</a></li>
                            <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Cash & Bank Transfer</a></li>
                            <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>GL Reports</a></li>
                    </div>
          </ul>
          <ul class="nav nav-sidebar">
              <li class="active"><a data-toggle="collapse" href="#collapsesales" title="Click to expand menu"><span id="ico" class="glyphicon"></span>Sales <span class="sr-only">(current)</span></a></li>
                    <div id="collapsesales" class="panel-collapse collapse">
                            <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Quotation</a></li>
                            <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Sales Order</a></li>
                            <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Delivery Order</a></li>
                            <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Sales Reports</a></li>
                    </div>
          </ul>
           <ul class="nav nav-sidebar">
              <li class="active"><a data-toggle="collapse" href="#collapseinv" title="Click to expand menu"><span id="ico" class="glyphicon"></span>Inventory <span class="sr-only">(current)</span></a></li>
                    <div id="collapseinv" class="panel-collapse collapse">
							<li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Security Check</a></li>
							<li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Quality Check</a></li>
                            <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Inventory Issue</a></li>
                            <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Inventory Receipt</a></li>
                            <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Inventory transfer</a></li>
                            <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Inventory Reports</a></li>
                    </div>
          </ul>
          <ul class="nav nav-sidebar">
              <li class="active"><a data-toggle="collapse" href="#collapseur" title="Click to expand menu"><span id="ico" class="glyphicon"></span>User & Role<span class="sr-only">(current)</span></a></li>
                    <div id="collapseur" class="panel-collapse collapse">
                            <li class="list-group-item"><a  href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Create User</a></li>
                            <li class="list-group-item"><a  href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Create User Role</a></li>                            
                    </div>
          </ul>
          <ul class="nav nav-sidebar">
              <li class="active"><a data-toggle="collapse" href="#collapseaps" title="Click to expand menu"><span id="ico" class="glyphicon"></span>Code Settings <span class="sr-only">(current)</span></a></li>
                    <div id="collapseaps" class="panel-collapse collapse">
                            <li class="list-group-item"><a href="<?php echo URL; ?>code/index/<?php echo rawurlencode("Item Category"); ?>"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Item Category</a></li>
                            <li class="list-group-item"><a href="<?php echo URL; ?>code/index/<?php echo rawurlencode("Item Group"); ?>"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Item Group</a></li>
                            <li class="list-group-item"><a href="<?php echo URL; ?>code/index/<?php echo rawurlencode("Item Class"); ?>"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Item Class</a></li>
                            <li class="list-group-item"><a href="<?php echo URL; ?>code/index/<?php echo rawurlencode("Item Brand"); ?>"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Item Brand</a></li>
							<li class="list-group-item"><a href="<?php echo URL; ?>code/index/<?php echo rawurlencode("Tax Code Purchase"); ?>"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Purchase Tax Code</a></li>
							<li class="list-group-item"><a href="<?php echo URL; ?>code/index/<?php echo rawurlencode("Tax Code Sales"); ?>"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Sales Tax Code</a></li>
							<li class="list-group-item"><a href="<?php echo URL; ?>code/index/<?php echo rawurlencode("Country"); ?>"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Country</a></li>
							<li class="list-group-item"><a href="<?php echo URL; ?>code/index/<?php echo rawurlencode("District"); ?>"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>District</a></li>
							<li class="list-group-item"><a href="<?php echo URL; ?>code/index/<?php echo rawurlencode("UOM"); ?>"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>UOM</a></li>
							<li class="list-group-item"><a href="<?php echo URL; ?>menu/itemsettings"><span class="glyphicon glyphicon-file" aria-hidden="true"></span>Item Settings</a></li>
                    </div>
          </ul>
		  
        </div>