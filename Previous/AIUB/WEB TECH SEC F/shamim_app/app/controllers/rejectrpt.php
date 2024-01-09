<?php
class Rejectrpt extends Controller{
	
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
				if($menus["xsubmenu"]=="Reject Reports")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/glrpt/js/getaccdt.js');
								
		}
		
		public function index(){
					
			
			$this->view->rendermainmenu('rejectrpt/index');
			
		}
		
		
		
		function sorptmenu(){
			$menuarr = array(
			0 => array("Date wise Reject"=>URL."rejectrpt/datewiseso","Item wise Reject"=>URL."rejectrpt/itemsales")
			
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
			$this->view->renderpage('rejectrpt/sorptmenu', false);
		}


		function datewiseso(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'rejectrpt/sorptmenu">Reject Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."rejectrpt/datewiseso",
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
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."rejectrpt/showdatewiseso", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('rejectrpt/sorptfilter', false);
		
		}

		public function showdatewiseso(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'rejectrpt/sorptmenu">Reject Reports</a></li>
							<li><a href="'.URL.'rejectrpt/datewiseso">Report Filter Form</a></li>
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
			$this->view->vrptname = "Date Wise Reject";
			$this->view->tabletitle = "";
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array("0"=>"Reject No","1"=>"Item Code",2=>"Item Name",3=>"Qty",4=>"Cost",5=>"Total Cost"),
				"groupfield"=>"Date~xdate",
				"grouprecords"=>array(), //database records columns to show in group
				"detailsection"=>array("xsonum","xitemcode","xitemdesc","xqty~center","xcost~center","xcosttotal~center"),
				//"buttons"=>array("Show"=>URL."test/","Delete"=>URL."test/"),
				//"urlvals"=>array("id","phone"),
				"sumfields"=>array("xqty","xcosttotal"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('rejectrpt/reportpage');
		}

		

		function itemsales(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'rejectrpt/sorptmenu">Reject Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."rejectrpt/itemsales",
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
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."rejectrpt/showitemsales", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('rejectrpt/sorptfilter', false);
		
		}
		public function showitemsales(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'rejectrpt/sorptmenu">Reject Reports</a></li>
							<li><a href="'.URL.'rejectrpt/itemsales">Report Filter Form</a></li>
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
			$this->view->vrptname = "Item Reject Report<br><p style='margin-top:10px'>Item Code : ".$xitemcode."</p>";
			$this->view->tabletitle = "Item Name : ".$xdesc;
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array(0=>"Reject No",1=>"Qty",2=>"Cost",3=>"Total Cost"),
				"groupfield"=>"Date~xdate",
				"grouprecords"=>array(), //database records columns to show in group
				"detailsection"=>array("xsonum~left","xqty~center","xcost~center","xcosttotal~center"),
				//"buttons"=>array("Show"=>URL."test/","Delete"=>URL."test/"),
				//"urlvals"=>array("id","phone"),
				"sumfields"=>array("xqty","xcosttotal"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('rejectrpt/reportpage');
		}

		function cuswiseso(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'rejectrpt/sorptmenu">PO Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."rejectrpt/cuswiseso",
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
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."rejectrpt/showcuswiseso", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('rejectrpt/sorptfilter', false);
		
		}

		public function showcuswiseso(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'rejectrpt/sorptmenu">Specimen Reports</a></li>
							<li><a href="'.URL.'rejectrpt/cuswiseso">Report Filter Form</a></li>
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
			$this->view->vrptname = "Customer Wise Sales Order<br>Customer ID : ".$cus.", Org/Name : ".$org;
			$this->view->tabletitle = "";
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array(0=>"Order No",1=>"Item Code",2=>"Item Name",3=>"Qty"),
				"groupfield"=>"Date~xdate",
				"grouprecords"=>array(),
				"detailsection"=>array("xsonum","xitemcode","xitemdesc","xqty~center"),
				"sumfields"=>array("xqty"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('rejectrpt/reportpage');
		}
		
		
		
	}