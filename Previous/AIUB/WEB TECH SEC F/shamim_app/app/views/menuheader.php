<?php
	$iconarray=array(
		"Inbox"=>"fa fa-envelope",
		"General Settings"=>"fa fa-codepen",
		"Core Settings"=>"fa fa-plus-circle",
		"GL Settings"=>"fa fa-calculator",
		"GL Interface"=>"fa fa-eye",
		"Gneneral Ledger"=>"fa fa-eye",
		"Inventory"=>"fa fa-stack-exchange",
		"Installment"=>"fa fa-credit-card",
		"Purchase"=>"fa fa-shopping-cart",
		"Manufacturing"=>"fa fa-industry",
		"Reports"=>"fa fa-align-left",
		"Sales"=>"fa fa-cubes",
		"Payroll"=>"fa fa-paypal",
		"Students"=>"fa fa-graduation-cap",
		"User Roles"=>"fa fa-user-plus",
		"SMS"=>"fa fa-envelope",
		"Routine"=>"fa fa-hourglass-half",
		"Specimen"=>"fa fa-link",
		"Reject"=>"fa fa-window-close-o",
		"Book List & Forma"=>"fa fa-book",
		"Store"=>"fa fa-archive",
		"Approval/Check"=>"fa fa-hand-stop-o",
		"Bill & TA/DA"=>"fa fa-gg-circle",
		"Human Resource"=>"fa fa-group",
		"Off Day & Holiday"=>"fa fa-plus",
		"Attendance"=>"fa fa-yelp",
		"Attendance Report"=>"fa fa-gg-circle",
		"Bill & TA/DA Reports"=>"fa fa-bar-chart",
		"CRM"=>"fa fa-users",
		
	);
	$bizid = "";
	$mainmenus=array();
	if (isset($_SESSION["sbizid"])){
		$bizid = $_SESSION["sbizid"];
		
		$menus = $_SESSION["mainmenus"];
		
			
			for($i=0; $i<count($menus); $i++){
				
				$mainmenus[$menus[$i]['xmenu']][]=$menus[$i]['xsubmenuindex'].",".$menus[$i]['xsubmenu'].",".$menus[$i]['xurl'];
				
			}
	}
	
?>
<!DOCTYPE html>
<html lang="en">
    <head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta http-Equiv="Cache-Control" Content="no-cache">
      <meta http-Equiv="Pragma" Content="no-cache">
      <meta http-Equiv="Expires" Content="0">
	  <link rel="icon" href="<?php echo URL; ?>public/images/bizdir/dotbd_logo.png">
		  <title><?php echo APPNAME; ?></title>
	  <!-- Tell the browser to be responsive to screen width -->
	  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	  <link rel="icon" href="<?php echo URL; ?>public/images/icon/pvoice.ico">
	  <!-- Bootstrap 3.3.7 -->
	  <link rel="stylesheet" href="<?php echo URL; ?>public/theme/bower_components/bootstrap/dist/css/bootstrap.min.css">
	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="<?php echo URL; ?>public/theme/bower_components/font-awesome/css/font-awesome.min.css">
	  <!-- Ionicons -->
	  <link rel="stylesheet" href="<?php echo URL; ?>public/theme/bower_components/Ionicons/css/ionicons.min.css">
	  <!-- Theme style -->
	  <link rel="stylesheet" href="<?php echo URL; ?>public/theme/dist/css/AdminLTE.min.css">
	  <!-- AdminLTE Skins. Choose a skin from the css/skins
		   folder instead of downloading all of them to reduce the load. -->
	  <link rel="stylesheet" href="<?php echo URL; ?>public/theme/dist/css/skins/_all-skins.min.css">
	  <!-- jvectormap -->
	  <link rel="stylesheet" href="<?php echo URL; ?>public/theme/bower_components/jvectormap/jquery-jvectormap.css">
	  <!-- Date Picker -->
	  <link rel="stylesheet" href="<?php echo URL; ?>public/theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	  <!-- Daterange picker -->
	  <link rel="stylesheet" href="<?php echo URL; ?>public/theme/bower_components/bootstrap-daterangepicker/daterangepicker.css">
	  <!-- bootstrap wysihtml5 - text editor -->
	  <link rel="stylesheet" href="<?php echo URL; ?>public/theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

	  <script>
		function myFunction() {
			var url = window.location;
			// Will only work if string in href matches with location
			$('.treeview-menu li a[href="' + url + '"]').parent().addClass('active');
			// Will also work for relative and absolute hrefs
			$('.treeview-menu li a').filter(function() {
				return this.href == url;
			}).parent().parent().parent().addClass('active');
		}
	  </script>
	  <script>
			<?php

			  $uri = URL;
			  $bizname = Session::get('sbizlong');
			  $branch = Session::get('sbranch');
				$bizadd = Session::get('sbizadd');
			  $suser = Session::get('suser');
			  $bizdecimals = Session::get('sbizdecimals');
			  
			  echo "var baseuri = '{$uri}';";
			  echo "var bizname = '{$bizname}';";
			  echo "var branch = '{$branch}';";
			  echo "var bizadd = '{$bizadd}';";
			  echo "var suser = '{$suser}';";
			  echo "var bizdecimals = '{$bizdecimals}';";

			?>
		</script>

	  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	  <!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	  <![endif]-->

	  <!-- Google Font -->
	  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">	 
    </head>
    <body class="hold-transition skin-blue sidebar-mini" onload="myFunction();">
	  <div class="wrapper">
		  <header class="main-header">
			<!-- Logo -->
			<a href="<?php echo URL; ?>/mainmenu" class="logo">
			  <!-- mini logo for sidebar mini 50x50 pixels -->
			  <span class="logo-mini"><b>NN</b>SEL</span>
			  <!-- logo for regular state and mobile devices -->
			  <span class="logo-lg">NNSEL</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
			  <!-- Sidebar toggle button-->
			  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
				<span class="sr-only">Toggle navigation</span>
			  </a>

			  <div class="navbar-custom-menu pull-left">
				<ul class="nav navbar-nav">
					<ul class="nav navbar-nav">
					  <!-- User Account: style can be found in dropdown.less -->
					  <li class="">
							<span>
								<div class="row">
								<div class="col-md-1">
									<img style="height: 30px;margin: 10px 0px 0px 0px;" src="<?php echo URL;?>public/images/bizdir/100.jpg" alt="" />
								</div>
								<div class="col-md-11">
									<p style="margin: 24px 0 0 0;color: #fff;font-weight: 600;font-size: 30px;line-height: 0px;">
									<?php echo Session::get('sbizlong'); ?>
									</p>
								</div>
								</div>
							</span>
						
					  </li>
					</ul>
				</ul>
			  </div>
			  <div class="navbar-custom-menu">	

				<?php					
					$id = Session::get('suser');
					$file='images/management/'.$id .'.jpg';
				    $imagename = "";	
					if(file_exists($file))
						$imagename = $file;
					else
						$imagename = 'images/products/noimage.jpg'; 
					?>
				  
				<ul class="nav navbar-nav">
				  <!-- User Account: style can be found in dropdown.less -->
				  <li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					  <?php $file="" ?>
					  <img src="<?php echo URL; ?><?php echo $imagename ?>" class="user-image" alt="User Image">
					  <span class="hidden-xs"><?php echo Session::get('suser') ?></span>
					</a>
					<ul class="dropdown-menu">
					   <!-- User image -->
					  <li class="user-header">
						<img src="<?php echo URL; ?><?php echo $imagename ?>" class="img-circle" alt="User Image">
						<p><?php echo Session::get('suser') ?></p>
					  </li>	
					  <!-- Menu Footer-->
					  <li class="user-footer">
					  <?php if (Session::get('srole')=="DEFAULT"){?>
						<div class="pull-left">
						  <a href="<?php echo URL.'profilemem/showuser/'.Session::get('suser'); ?>" class="btn btn-default btn-flat">Profile</a>
						</div>
						<div class="pull-right">
						  <a href="<?php echo URL; ?>mainmenu/logoutmem/<?php echo $bizid; ?>" class="btn btn-default btn-flat">Sign out</a>
						</div>
						<?php } else {?>
						<div class="pull-left">
						  <a href="<?php echo URL.'profile/showuser/'.Session::get('suser'); ?>" class="btn btn-default btn-flat">Profile</a>
						</div>
						<div class="pull-right">
						  <a href="<?php echo URL; ?>mainmenu/logout/<?php echo $bizid; ?>" class="btn btn-default btn-flat">Sign out</a>
						</div>
						<?php } ?>
					  </li>
					</ul>
				  <!-- Control Sidebar Toggle Button -->
				  <li>
					<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
				  </li>
				</ul>
			  </div>
			</nav>
		  </header>
	  
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
			  <!-- sidebar menu: : style can be found in sidebar.less -->
			  <div class="user-panel">
				<div class="pull-left image">
				  <img src="<?php echo URL; ?><?php echo $imagename ?>" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
				  <p><?php echo Session::get('suser') ?></p>
				  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			  </div>
			  <ul class="sidebar-menu" data-widget="tree">
			  <?php $i=0; foreach ($mainmenus as $key=>$value){ $menuid = explode(' ', $key); $i++; ?>
				  <?php if($i<2){ ?>
					<li><a href="<?php echo URL; ?>mainmenu"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
				  <?php } ?>
				<li class="treeview">
				  <a href="#">
					<i class="<?php echo $iconarray[$key]; ?>"></i> <span><?php echo $key;?></span>
					<span class="pull-right-container">
					  <i class="fa fa-angle-left pull-right"></i>
					</span>
				  </a>
				  <ul class="treeview-menu">
				  <?php asort($value); foreach($value as $subkey=>$submenu){ $menuurl = explode(',',$submenu);?>
					<li class="" onclick="myFunction()"><a href="<?php echo URL.$menuurl[2]; ?>"><i class="fa fa-circle-o"></i> <?php echo $menuurl[1]; ?></a></li>
				  <?php } ?> 
				  </ul>
				</li>
			  <?php } ?>  
			  </ul>
			</section>
			<!-- /.sidebar -->
		</aside>
	  
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Main content -->
			<section class="content">
		
		
	

	
	 