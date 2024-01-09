<?php
	
	$bizid = "";
	$mainmenus=array();
	if (isset($_SESSION["sbizid"])){
		$bizid = $_SESSION["sbizid"];
		
		$menus = $_SESSION["mainmenus"];
		
			
			for($i=0; $i<count($menus); $i++){
				
				$mainmenus[$menus[$i]['xmenu']][]=$menus[$i]['xsubmenu'].",".$menus[$i]['xurl'];
			}
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
              <link rel="icon" href="<?php echo URL; ?>public/images/bizdir/100.png">
                  <title><?php echo APPNAME; ?></title>
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
		  <a class="navbar-brand" href="#"><strong><?php echo Session::get('sbizlong').' <span style="color:orange;"></span>'; ?></strong></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse dropdown">
          <ul class="nav navbar-nav navbar-right" id="navcolor">
            <li><a href="<?php echo URL.'profilemem/showuser/'.Session::get('suser'); ?>" data-toggle="tooltip" title="Change user profile here"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>Profile</a></li>
            <li><a href="<?php echo URL; ?>mainmenu/logoutmem/<?php echo $bizid; ?>" data-toggle="tooltip" title="Dashboard"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>Logout</a></li>
		  </ul>
        </div>
      </div>
    </nav>
	
	 <div class="container-fluid">
       
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
		<?php foreach ($mainmenus as $key=>$value){ $menuid = explode(' ', $key); ?>
          <ul class="nav nav-sidebar">
				
                <li class="active"><a data-toggle="collapse" href="#<?php echo $menuid[0];?>" title="Click to expand menu"><span id="ico" class="glyphicon"></span><?php echo $key; ?><span class="sr-only">(current)</span></a></li>
                    
						<div id="<?php echo $menuid[0];?>" class="panel-collapse collapse">
						<?php foreach($value as $subkey=>$submenu){ $menuurl = explode(',',$submenu)?>
								<li class="list-group-item"><a href="<?php echo URL.$menuurl[1]; ?>"><span class="glyphicon glyphicon-file" aria-hidden="true"></span><?php echo $menuurl[0]; ?></a></li>
						<?php } ?>
						</div>
										
          </ul>
		  
        <?php } ?>  
        </div>