<?php
class Imrpt extends Controller{
	
	private $values = array();
	private $fields = array();
	
	function __construct(){
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
			if($logged == false){
				Session::destroy();
				header('location: '.URL.'login');
				exit;
			}
			
		$usersessionmenu = 	Session::get('mainmenus');
		
		$iscode=0;
		foreach($usersessionmenu as $menus){
				if($menus["xsubmenu"]=="Inventory Reports")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/imrpt/js/getitemdt.js');
								
		}
		
		public function index(){
					
			
			$this->view->rendermainmenu('imrpt/index');
			
		}
		
		
		
		function imrptmenu(){
			
			$menuarr = array(
			0 => array("Inventory Receive"=>URL."imrpt/invrcv","Inventory Issue"=>URL."imrpt/invissue","Datewise Receive"=>URL."imrpt/dwinvrcv","Datewise Issue"=>URL."imrpt/dwinvissue"),
			1 => array("Itemwise Receive"=>URL."imrpt/iwinvrcv","Itemwise Issue"=>URL."imrpt/iwinvissue","Item Ledger"=>URL."imrpt/itemledger","Stock Report"=>URL."imrpt/stock"),
			2 => array("Daily Stock Summary"=>URL."imrpt/dwissrcv","Warehouse Stock"=>URL."imrpt/whstock"),			
			);
			$menutable='<table class="table" style="width:100%"><tbody>';
			foreach($menuarr as $key=>$value){
				$menutable.='<tr>';
					foreach($value as $k=>$val){
						$menutable.='<td><a style="width:100%" class="btn btn-primary" href="'.$val.'" role="button"><span class="glyphicon glyphicon-open-file"></span>&nbsp;'.$k.'</a></td>';
					}
				$menutable.='</tr>';
				
			}
			
			$menutable.='</tbody></table>';
			$this->view->table = $menutable;
			$this->view->renderpage('imrpt/imrptmenu', false);
		}
		
		function dwissrcv(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'imrpt/imrptmenu">Inventory Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."imrpt/dwissrcv",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xitemcode"=>"",
				"xitemdesc"=>"",
				"xgitem"=>"",
				"xproj"=>"",
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xitemcode-group_".URL."itempicklist/picklist"=>'Item Code_maxlength="20"',
								"xitemdesc-text"=>'Item Name_maxlength="100" readonly',
								),
							array(
								"xgitem-select_Item Group"=>'Type*~star_maxlength="50"',
								"xproj-select_Project"=>'Project*~star_maxlength="50"'
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."imrpt/showdwissrcv", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('imrpt/imrptfilter', false);
		
		}

		public function showdwissrcv(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'imrpt/imrptmenu">Inventory Reports</a></li>
							<li><a href="'.URL.'imrpt/dwissrcv">Report Filter Form</a></li>
							<li class="active">Inventoy Receive</li>
						   </ul>';
		
			
						   

			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
				
			$tblvalues=array();	
			$item = $_POST['xitemcode'];		
			$cond = " and xitemcode='".$item."' ";
			if($item=="")
				$cond="";	

			$gitem = $_POST['xgitem'];		
			$gwhere = " and (SELECT xgitem from seitem where vimtrn.bizid=seitem.bizid and vimtrn.xitemcode=seitem.xitemcode)='".$gitem."' ";
			if($gitem=="")
				$gwhere="";

			$proj = $_POST['xproj'];		
			$pwhere = " and xproj ='".$proj."' ";
			if($proj=="")
				$pwhere="";
			
			$tblvalues = $this->model->getinvissrcv($fdate, $tdate, $cond.$gwhere.$pwhere);
				//print_r($tblvalues);die;
			if($gitem!=""){
				if($gitem=="Store"){
					$this->view->xtype = $gitem;
					$this->view->doctitle = "DAILY STOCK SUMMARY STORE";
					$this->view->doccode = "STR/03/004-A";
				}else{// if($gitem=="General Store")
					$this->view->xtype = $gitem;
					$this->view->doctitle = "DAILY STOCK SUMMARY";
					$this->view->doccode = "STR/03/004";
				}
			}
			else{
				$this->view->xtype = "General Store & Store";
				$this->view->doctitle = "DAILY STOCK SUMMARY GENERAL STORE & STORE";
				$this->view->doccode = "STR/03/004 & STR/03/004-A";
			}
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->org=Session::get('sbizlong');
			$this->view->xproject = $proj;


			$tblsettings = array(
				"columns"=>array(0=>"Document Type",1=>"Document No",2=>"Item Code",3=>"Item Name",4=>"Cost",5=>"Receive",6=>"Issue"),
				"groupfield"=>"Date~xdate",
				"grouprecords"=>array(), //database records columns to show in group
				"detailsection"=>array("xdoctype","xtxnnum","xitemcode","xitemdesc","xstdcost~center","xqtydr~center","xqtycr~center"),
				"buttons"=>array(),
				"urlvals"=>array(),
				"sumfields"=>array("xqtydr","xqtycr"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('imrpt/issuereceiverpt');
		}

		function invrcv(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'imrpt/imrptmenu">Inventory Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."imrpt/invrcv",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xitemcode"=>"",
				"xitemdesc"=>"",
				"xgitem"=>"",
				"xproj"=>""
				);
				
				$fields = array(
					array(
						"xfdate-datepicker" => 'From_""',
						"xtdate-datepicker" => 'To_""',
						"xitemcode-group_".URL."itempicklist/picklist"=>'Item Code_maxlength="20"',
						"xitemdesc-text"=>'Item Name_maxlength="100" readonly',
					),
					array(
						"xgitem-select_Item Group"=>'Type*~star_maxlength="50"',
						"xproj-select_Project"=>'Project*~star_maxlength="50"'
						)
				);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."imrpt/showinvrcv", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('imrpt/imrptfilter', false);
		
		}

		public function showinvrcv(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'imrpt/imrptmenu">Inventory Reports</a></li>
							<li><a href="'.URL.'imrpt/invrcv">Report Filter Form</a></li>
							<li class="active">Inventoy Receive</li>
						   </ul>';
		
						
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
				
			$tblvalues=array();			
			
			$item = $_POST['xitemcode'];
			$proj = $_POST['xproj'];
			$cond = " and xitemcode='".$item."' ";
			$wproj = " and xproj='".$proj."' ";
			$project = $proj;
			if($item=="")
				$cond="";
				
			if($proj==""){
			$wproj="";
			$project = "All";
			}
			$gitem = $_POST['xgitem'];		
			$gwhere = " and (SELECT xgitem from seitem where vimtrn.bizid=seitem.bizid and vimtrn.xitemcode=seitem.xitemcode)='".$gitem."' ";
			if($gitem=="")
				$gwhere="";

			$tblvalues = $this->model->getinvrcv($fdate, $tdate, $cond.$gwhere,$wproj);
				//print_r($tblvalues);die;
			
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = $gitem." Inventory Receive </br> Project :".$project;
			$this->view->tabletitle = "";
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array(0=>"Date",1=>"Document Type",2=>"Document No",3=>"Item Code",4=>"Item Name",5=>"Cost",6=>"Qty",7=>"UOM",8=>"Total"),
				"buttons"=>array(),
				"urlvals"=>array(),
				"sumfields"=>array("xqty","xtotal"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->reportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('imrpt/reportpage');
		}

		function invissue(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'imrpt/imrptmenu">Inventory Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."imrpt/invissue",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xitemcode"=>"",
				"xitemdesc"=>"",
				"xgitem"=>""
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xitemcode-group_".URL."itempicklist/picklist"=>'Item Code_maxlength="20"',
								"xitemdesc-text"=>'Item Name_maxlength="100" readonly',
								),
							array(
								"xgitem-select_Item Group"=>'Type*~star_maxlength="50"'
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."imrpt/showinvissue", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('imrpt/imrptfilter', false);
		
		}

		public function showinvissue(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'imrpt/imrptmenu">Inventory Reports</a></li>
							<li><a href="'.URL.'imrpt/invissue">Report Filter Form</a></li>
							<li class="active">Inventoy Issue</li>
						   </ul>';
		
						
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
				
			$tblvalues=array();	

			$item = $_POST['xitemcode'];		
			$cond = " and xitemcode='".$item."' ";
			if($item=="")
				$cond="";
			
			$gitem = $_POST['xgitem'];		
			$gwhere = " and (SELECT xgitem from seitem where vimtrn.bizid=seitem.bizid and vimtrn.xitemcode=seitem.xitemcode)='".$gitem."' ";
			if($gitem=="")
				$gwhere="";
			
			$tblvalues = $this->model->getinvissue($fdate, $tdate, $cond.$gwhere);
				//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = $gitem." Inventory Issue";
			$this->view->tabletitle = "";
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array(0=>"Date",1=>"Document Type",2=>"Document No",3=>"Item Code",4=>"Item Name",5=>"Cost",6=>"Qty",7=>"UOM",8=>"Total"),
				"buttons"=>array(),
				"urlvals"=>array(),
				"sumfields"=>array("xqty","xtotal"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->reportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('imrpt/reportpage');
		}

		function dwinvrcv(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'imrpt/imrptmenu">Inventory Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."imrpt/dwinvrcv",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xitemcode"=>"",
				"xitemdesc"=>""
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xitemcode-group_".URL."itempicklist/picklist"=>'Item Code_maxlength="20"',
								"xitemdesc-text"=>'Item Name_maxlength="100" readonly',
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."imrpt/showdatewiseinvrcv", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('imrpt/imrptfilter', false);
		
		}
		
		function showdatewiseinvrcv(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'imrpt/imrptmenu">Inventory Reports</a></li>
							<li><a href="'.URL.'imrpt/dwinvrcv">Report Filter Form</a></li>
							<li class="active">Datewise Inventoy Receive</li>
						   </ul>';
		
						
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
				
			$tblvalues=array();		

			$item = $_POST['xitemcode'];		
			$cond = " and xitemcode='".$item."' ";
			if($item=="")
				$cond="";	

			$tblvalues = $this->model->getinvrcv($fdate, $tdate,$cond);
				//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Datewise Inventory Receive";
			$this->view->tabletitle = "";
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array(0=>"Document Type",1=>"Document No",2=>"Item Code",3=>"Item Name",4=>"Cost",5=>"Qty",6=>"Total"),
				"groupfield"=>"Date~xdate",
				"grouprecords"=>array(), //database records columns to show in group
				"detailsection"=>array("xdoctype","xtxnnum","xitemcode","xitemdesc","xstdcost","xqty","xtotal"),
				"buttons"=>array(),
				"urlvals"=>array(),
				"sumfields"=>array("xqty","xtotal"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('imrpt/reportpage');
		}

		function dwinvissue(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'imrpt/imrptmenu">Inventory Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."imrpt/dwinvissue",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xitemcode"=>"",
				"xitemdesc"=>""
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xitemcode-group_".URL."itempicklist/picklist"=>'Item Code_maxlength="20"',
								"xitemdesc-text"=>'Item Name_maxlength="100" readonly',
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."imrpt/showdatewiseinvissue", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('imrpt/imrptfilter', false);
		
		}

		function showdatewiseinvissue(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'imrpt/imrptmenu">Inventory Reports</a></li>
							<li><a href="'.URL.'imrpt/dwinvissue">Report Filter Form</a></li>
							<li class="active">Datewise Inventoy Issue</li>
						   </ul>';
		
						
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
				
			$tblvalues=array();			

			$item = $_POST['xitemcode'];		
			$cond = " and xitemcode='".$item."' ";
			if($item=="")
				$cond="";

			$tblvalues = $this->model->getinvissue($fdate, $tdate, $cond);
				//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Datewise Inventory Issue";
			$this->view->tabletitle = "";
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array(0=>"Document Type",1=>"Document No",2=>"Item Code",3=>"Item Name",4=>"Cost",5=>"Qty",6=>"Total"),
				"groupfield"=>"Date~xdate",
				"grouprecords"=>array(), //database records columns to show in group
				"detailsection"=>array("xdoctype","xtxnnum","xitemcode","xitemdesc","xstdcost","xqty","xtotal"),
				"buttons"=>array(),
				"urlvals"=>array(),
				"sumfields"=>array("xqty","xtotal"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('imrpt/reportpage');
		}
		
		function iwinvrcv(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'imrpt/imrptmenu">Inventory Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."imrpt/iwinvrcv",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xitemcode"=>"",
				"xitemdesc"=>""
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xitemcode-group_".URL."itempicklist/picklist"=>'Item Code_maxlength="20"',
								"xitemdesc-text"=>'Item Name_maxlength="100" readonly',
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."imrpt/showitemwiseinvrcv", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('imrpt/imrptfilter', false);
		
		}
		
		function showitemwiseinvrcv(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'imrpt/imrptmenu">Inventory Reports</a></li>
							<li><a href="'.URL.'imrpt/iwinvrcv">Report Filter Form</a></li>
							<li class="active">Itemwise Inventoy Receive</li>
						   </ul>';
		
						
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
				
			$tblvalues=array();		

			$item = $_POST['xitemcode'];		
			$cond = " and xitemcode='".$item."' ";
			if($item=="")
				$cond="";
	
			
			$tblvalues = $this->model->getinvrcv($fdate, $tdate, $cond);
				//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Itemwise Inventory Receive";
			$this->view->tabletitle = "";
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array(0=>"Date",1=>"Document Type",2=>"Document No",3=>"Cost",4=>"Qty",5=>"Total"),
				"groupfield"=>"Item Code~xitemcode",
				"grouprecords"=>array("Item Name~xitemdesc"), //database records columns to show in group
				"detailsection"=>array("xdate","xdoctype","xtxnnum","xstdcost","xqty","xtotal"),
				"buttons"=>array(),
				"urlvals"=>array(),
				"sumfields"=>array("xqty","xtotal"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('imrpt/reportpage');
		}

		function iwinvissue(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'imrpt/imrptmenu">Inventory Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."imrpt/iwinvissue",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xitemcode"=>"",
				"xitemdesc"=>""
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xitemcode-group_".URL."itempicklist/picklist"=>'Item Code_maxlength="20"',
								"xitemdesc-text"=>'Item Name_maxlength="100" readonly',
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."imrpt/showitemwiseinvissue", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('imrpt/imrptfilter', false);
		
		}

		function showitemwiseinvissue(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'imrpt/imrptmenu">Inventory Reports</a></li>
							<li><a href="'.URL.'imrpt/iwinvissue">Report Filter Form</a></li>
							<li class="active">Itemwise Inventoy Issue</li>
						   </ul>';
		
						
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
				
			$tblvalues=array();	

			$item = $_POST['xitemcode'];		
			$cond = " and xitemcode='".$item."' ";
			if($item=="")
				$cond="";
	
					
			
			$tblvalues = $this->model->getinvissue($fdate, $tdate, $cond);
				//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Itemwise Inventory Issue";
			$this->view->tabletitle = "";
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array(0=>"Date",1=>"Document Type",2=>"Document No",3=>"Cost",4=>"Qty",5=>"Total"),
				"groupfield"=>"Item Code~xitemcode",
				"grouprecords"=>array("Item Name~xitemdesc"), //database records columns to show in group
				"detailsection"=>array("xdate","xdoctype","xtxnnum","xstdcost","xqty","xtotal"),
				"buttons"=>array(),
				"urlvals"=>array(),
				"sumfields"=>array("xqty","xtotal"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('imrpt/reportpage');
		}

		function itemledger(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'imrpt/imrptmenu">Inventory Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."imrpt/itemledger",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xitemcode"=>"",
				"xitemdesc"=>""
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xitemcode-group_".URL."itempicklist/picklist"=>'Item Code_maxlength="20"',
								"xitemdesc-text"=>'Item Name_maxlength="100" readonly',
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."imrpt/showitemledger", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('imrpt/imrptfilter', false);
		
		}

		function showitemledger(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'imrpt/imrptmenu">Inventory Reports</a></li>
							<li><a href="'.URL.'imrpt/itemledger">Report Filter Form</a></li>
							<li class="active">Item Ledger</li>
						   </ul>';
		
			$item = $_POST['xitemcode'];			
			$itemdesc = $_POST['xitemdesc'];	

			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
				
			$tblvalues=array();			
			
			$tblvalues = $this->model->getinvdetail($fdate, $tdate, $item);
			
			$opbal = $this->model->getopbal($fdate, $item);
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Item Ledger";
			$this->view->org=Session::get('sbizlong');
			$this->view->tabletitle = "Item : ".$item."-".$itemdesc;
			$fields = array(
						"xdate-Date",
						"xdoctype-Ducument Type",
						"xtxnnum-Txn. No",
						"xcost-cost",
						"xqtydr-Receive",
						"xqtycr-Issue"
						);
			$table = new ReportingTable();
			$this->view->table = $table->itemledgerTable($fields, $tblvalues, "xitemcode", $opbal[0]["xbal"],$item,$itemdesc);
				
			$this->view->renderpage('imrpt/reportpage');
		}

		function stock(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'imrpt/imrptmenu">Inventory Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."imrpt/stock",
			);	
			
			$values = array(
				"xgitem"=>"",
				"xwh"=>""
				);
				
				$fields = array(array(
									"xgitem-select_Item Group"=>'Type*~star_maxlength="50"',
									"xwh-select_Warehouse"=>'Warehouse_maxlength="200"'
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."imrpt/showstock", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('imrpt/imrptfilter', false);
		
		}

		public function showstock(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'imrpt/imrptmenu">Inventory Reports</a></li>	
							<li><a href="'.URL.'imrpt/stock">Report Filter Form</a></li>	
							<li class="active">Stock Report</li>
						   </ul>';
		
			
			$gitem = $_POST['xgitem'];
			$xwh = $_POST['xwh'];
			$gwhere = " and (SELECT xgitem from seitem where vimstock.bizid=seitem.bizid and vimstock.xitemcode=seitem.xitemcode)='".$gitem."' ";
			if($gitem=="")
				$gwhere="";
			
			$tblvalues=array();			
			
			$tblvalues = $this->model->getImStockpt($gwhere,$xwh);
				//print_r($tblvalues);die;
			
			$this->view->vfdate = "NOO";
			$this->view->vtdate = "Z";
			$this->view->vrptname = $gitem." Stock Report";
			$this->view->tabletitle = "";
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array(0=>"Item Code",1=>"Item Name",2=>"PO",3=>"Stock In",4=>"P.Return",5=>"D.Return",6=>"Sales",7=>"Reject",8=>"Store Del",9=>"Av. Stock",10=>"UOM"),
				"groupfield"=>"Warehouse~xwh",
				"grouprecords"=>array(), //database records columns to show in group
				"detailsection"=>array("xitemcode","xdesc","xqtypo","qtygrn","qtyreturn","qtydret","qtyso","qtyreject","qtystoredel","xqty","xunitstk"),
				"buttons"=>array(),
				"urlvals"=>array(),
				"sumfields"=>array("xqtypo","qtygrn","balgrn","qtyreturn","qtydret","qtyso","qtyreject","qtystoredel","xqty"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('imrpt/reportpage');
		}


		function whstock(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'imrpt/imrptmenu">Inventory Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."imrpt/whstock",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				
				"xwh"=>"",
				
				);
				
				$fields = array(array(
								
								"xwh-select_Warehouse"=>'Warehouse_maxlength="20"'
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."imrpt/showwhstock", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('imrpt/imrptfilter', false);
		
		}

		public function showwhstock(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'imrpt/imrptmenu">Inventory Reports</a></li>
							<li><a href="'.URL.'imrpt/dwissrcv">Report Filter Form</a></li>
							<li class="active">Inventoy Receive</li>
						   </ul>';
		
			$wh = $_POST['xwh'];			
			
				
			$tblvalues=array();			
			
			$tblvalues = $this->model->getWarehouseStock(" and xwh='".$wh."' ");
				//print_r($tblvalues);die;
			
			$this->view->vfdate ="A";
			$this->view->vtdate = "Z";
			$this->view->vrptname = "Warehouse Stock For ".$wh;
			$this->view->tabletitle = "";
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array(0=>"Item Code",1=>"Item Name",2=>"Qty"),
				"buttons"=>array(),
				"urlvals"=>array(),
				"sumfields"=>array("xqty"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->reportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('imrpt/reportpage');
		}
		
		function descinsert(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'imrpt/imrptmenu">Inventory Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."imrpt/descinsert",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				
				"xwh"=>"",
				
				);
				
				$fields = array(array(
								
								"xwh-select_Warehouse"=>'Warehouse_maxlength="20"'
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."imrpt/showdescinsert", "Insert",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('imrpt/imrptfilter', false);
		
		}

		public function showdescinsert(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'imrpt/imrptmenu">Inventory Reports</a></li>
							<li><a href="'.URL.'imrpt/dwissrcv">Report Filter Form</a></li>
							<li class="active">Inventoy Receive</li>
						   </ul>';
		
			$wh = $_POST['xwh'];			
			
				
			$tblvalues=array();			
			
			$getbill = $this->model->getBill();
            //echo count($getbill);die;
			foreach($getbill as $key=>$value){
				//echo $value['xdocnum'];
				$alldt ="";
				$billdt = $this->model->getbilldt($value['xdocnum']);
				foreach($billdt as $k=>$v){
					$dt = $v['xdesc'];
					$alldt .= $dt.", ";
				}
				$alldt = substr($alldt, 0, -2);
				//echo $value['xdocnum']."-".$alldt."</br>";
				$this->model->updateVoucher($value['xdocnum'],$alldt);
				//die;
			}
			echo "Update Successfull";
			die;
			$tblvalues = $this->model->getWarehouseStock(" and xwh='".$wh."' ");
				//print_r($tblvalues);die;
			
			$this->view->vfdate ="A";
			$this->view->vtdate = "Z";
			$this->view->vrptname = "Warehouse Stock For ".$wh;
			$this->view->tabletitle = "";
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array(0=>"Item Code",1=>"Item Name",2=>"Qty"),
				"buttons"=>array(),
				"urlvals"=>array(),
				"sumfields"=>array("xqty"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->reportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('imrpt/reportpage');
		}
		
	}