<?php
class Issuefreerpt extends Controller{
	
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
				if($menus["xsubmenu"]=="Specimen Reports")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/glrpt/js/getaccdt.js');
								
		}
		
		public function index(){
					
			
			$this->view->rendermainmenu('issuefreerpt/index');
			
		}
		
		
		
		function sorptmenu(){
			
			// $menuarr = array(
			// 	0 => array("Date wise Sales Order"=>URL."issuefreerpt/datewiseso","Item wise Sales Order"=>URL."issuefreerpt/itemwiseso","Customerwise Sales Order"=>URL."issuefreerpt/cuswiseso","Mobile Order Retailer"=>URL."issuefreerpt/retailerorder",),
			// 	1 => array("Mobile Order Dealer"=>URL."issuefreerpt/dealerorder","Mobile Order MRP"=>URL."issuefreerpt/mrporder","Retailer Return"=>URL."issuefreerpt/retailerreturn","Dealer Return"=>URL."issuefreerpt/dealerreturn"),
			// 	1 => array("Employee Touched Point"=>URL."issuefreerpt/toucedcus")
				
			// 	);
			$menuarr = array(
			0 => array("Date wise Specimen"=>URL."issuefreerpt/datewiseso","Item wise Specimen"=>URL."issuefreerpt/itemsales","Customerwise Specimen"=>URL."issuefreerpt/cuswiseso")
			
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
			$this->view->renderpage('issuefreerpt/sorptmenu', false);
		}


		function datewiseso(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'issuefreerpt/sorptmenu">Specimen Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."issuefreerpt/datewiseso",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""'
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."issuefreerpt/showdatewiseso", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('issuefreerpt/sorptfilter', false);
		
		}

		public function showdatewiseso(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'issuefreerpt/sorptmenu">Specimen Reports</a></li>
							<li><a href="'.URL.'issuefreerpt/datewiseso">Report Filter Form</a></li>
							<li class="active">Sales Orders</li>
						   </ul>';
		
						
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
				
			$tblvalues=array();			
			
			$tblvalues = $this->model->dateWiseso($fdate, $tdate);
				//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Date Wise Specimen";
			$this->view->tabletitle = "";
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array("0"=>"Invoice Num","1"=>"Customer","2"=>"Name/Org","3"=>"Item Code",4=>"Item Name",5=>"Qty",6=>"Cost",7=>"Price",8=>"Total Cost"),
				"groupfield"=>"Date~xdate",
				"grouprecords"=>array(), //database records columns to show in group
				"detailsection"=>array("xsonum","xcus","xorg","xitemcode","xitemdesc","xqty~center","xcost~center","xrate~center","xcosttotal~center"),
				//"buttons"=>array("Show"=>URL."test/","Delete"=>URL."test/"),
				//"urlvals"=>array("id","phone"),
				"sumfields"=>array("xqty","xcosttotal"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('issuefreerpt/reportpage');
		}

		

		function itemsales(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'issuefreerpt/sorptmenu">Specimen Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."issuefreerpt/itemsales",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xitemcode"=>"",
				"xdesc"=>""
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xitemcode-group_".URL."jsondata/bookPickList"=>'Item Code_""',
								"xdesc-text"=>'Desc_"" readonly'
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."issuefreerpt/showitemsales", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('issuefreerpt/sorptfilter', false);
		
		}
		public function showitemsales(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'issuefreerpt/sorptmenu">Specimen Reports</a></li>
							<li><a href="'.URL.'issuefreerpt/itemsales">Report Filter Form</a></li>
							<li class="active">Item Sales</li>
						   </ul>';
		
						
			$xitemcode = $_POST['xitemcode'];
			$xdesc = $_POST['xdesc'];

			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
				
			$tblvalues=array();			
			
			$tblvalues = $this->model->itemsales($fdate, $tdate, $xitemcode);
				//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Item Specimen Report";
			$this->view->tabletitle = "Item Code : ".$xitemcode.", Item Name : ".$xdesc;
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array("0"=>"Invoice",1=>"Name/Org",2=>"Notes",3=>"Qty",4=>"Cost",5=>"Price",6=>"Total Cost"),
				"groupfield"=>"Date~xdate",
				"grouprecords"=>array(), //database records columns to show in group
				"detailsection"=>array("xsonum~left","xorg~left","xnotes","xqty~center","xcost~center","xrate~center","xcosttotal~center"),
				//"buttons"=>array("Show"=>URL."test/","Delete"=>URL."test/"),
				//"urlvals"=>array("id","phone"),
				"sumfields"=>array("xqty","xcosttotal"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('issuefreerpt/reportpage');
		}

		function cuswiseso(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'issuefreerpt/sorptmenu">Specimen Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."issuefreerpt/cuswiseso",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xcus"=>"",
				"xorg"=>""
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xcus-group_".URL."customers/picklist"=>'Customer_""',
								"xorg-text"=>'Org/Name_"" readonly'
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."issuefreerpt/showcuswiseso", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('issuefreerpt/sorptfilter', false);
		
		}

		public function showcuswiseso(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'issuefreerpt/sorptmenu">Specimen Reports</a></li>
							<li><a href="'.URL.'issuefreerpt/cuswiseso">Report Filter Form</a></li>
							<li class="active">Sales Orders</li>
						   </ul>';
		
						
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
			$cus = "";
			if(isset($_POST["xcus"]))
				$cus = $_POST["xcus"];
			$org = "";			
			if(isset($_POST["xorg"]))
				$org = $_POST["xorg"];
				
			$tblvalues=array();			
			
				$tblvalues = $this->model->cuswiseso($fdate, $tdate, $cus);
				//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Customer Wise Specimen";
			$this->view->tabletitle = "Customer ID : ".$cus.", Org/Name : ".$org;
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array(0=>"Order No",1=>"Item Code",2=>"Item Name",3=>"Qty",4=>"Cost",5=>"Price",6=>"Total Cost"),
				"groupfield"=>"Date~xdate",
				"grouprecords"=>array(),
				"detailsection"=>array("xsonum","xitemcode","xitemdesc","xqty~center","xcost~center","xrate~center","xcosttotal~center"),
				"sumfields"=>array("xqty","xcosttotal"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('issuefreerpt/reportpage');
		}
		
		
		
	}