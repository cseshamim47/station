<?php
class Porpt extends Controller{
	
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
				if($menus["xsubmenu"]=="Purchase Reports")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/porpt/js/getaccdt.js');
								
		}
		
		public function index(){
			$this->view->rendermainmenu('porpt/index');
		}
		
		
		
		function porptmenu(){
			
			$menuarr = array(
			"Purchase Order Report" => array("Date wise Purchase Order"=>URL."porpt/datewisepo","Item wise Purchase Order"=>URL."porpt/itemwisepo","Supplier wise Purchase Order"=>URL."porpt/supwisepo"),
			"Purchase Report" => array("Datewise Purchase"=>URL."porpt/dwinvrcv","Itemwise Purchase"=>URL."porpt/iwinvrcv","Supplier wise Purchase"=>URL."porpt/supwiseinvrcv"),
			"Purchase Ledger" => array("Purchase Leder Report"=>URL."porpt/ledger"),
			
			);
			$menutable='<table class="table" style="width:100%"><tbody>';
			foreach($menuarr as $key=>$value){
				$menutable.='<tr><td>'.$key.'</td></tr>';
				$menutable.='<tr>';
					foreach($value as $k=>$val){
						$menutable.='<td><a style="width:100%" class="btn btn-info" href="'.$val.'" role="button"><span class="glyphicon glyphicon-open-file"></span>&nbsp;'.$k.'</a></td>';
					}
				$menutable.='</tr>';
				
			}
			
			$menutable.='</tbody></table>';
			$this->view->table = $menutable;
			$this->view->renderpage('porpt/porptmenu', false);
		}
		
		
		function doubleGroupTable($cols, $rows, $groupval=array(), $totalfield=array()){
		
			$row = $rows;
			$cl = count($cols);
			$val1="";
			$val2="";
			if(count($groupval)>0 && count($groupval)<3){
				$val1=$groupval[0];
				$val2=$groupval[1];
			}
			$grouprec = [];
			$sgrouprec = [];
			foreach($row as $gkey=>$gval){
				$keyval = $gval[$val1];
				$grouprec[$keyval][]=$gval;
				foreach ($grouprec[$keyval] as $skey=>$sval){
								$skeyval = $sval[$val2];
								$sgrouprec[$keyval][$skeyval]= $sval;
							}
			}
			
												
			$table = '';
			$total=0;
			
			$table.= '<table id="grouptable" class="table table-bordered table-striped" style="width:100%">';	
				$table.= '<thead>';
				foreach ($cols as $col){
					$table.= '<th>'.$col.'</th>';
				}
				$table.= '</thead>';
				$table.= '<tbody>';
					foreach($sgrouprec as $key=>$sval ){
						$subtotal=0; //print_r($sval[]); die;
						$table.= '<tr rowspan="'.count($cols).'">';
							$table.= '<td><strong>'. $key .'</strong></td>';
							for ($i=0; $i<count($cols)-1; $i++){
								$table.= '<td></td>';
							}
						$table.= '</tr>';
						
							foreach($sval as $sk=>$val ){
							$subtotal=0;
							$table.= '<tr rowspan="'.count($cols).'">';
								$table.= '<td></td><td><strong>'. $sk .'</strong></td>';
								for ($i=0; $i<count($cols)-2; $i++){
									$table.= '<td></td>';
								}
							$table.= '</tr>';
							$table.= '<tr><td></td><td></td>';
							foreach($val as $k=>$v ){
									
									if ($k <> $val1 && $k <> $val2){
										$alin = "";
										if($k=="xqty")
											$alin = 'style="background-color:gray; text-align:center; color:white;"';
										
										$table.= '<td '.$alin.'>'. $v .'</td>';
									}
								
							}
							$table.= '</tr>';
					}
					}
				$table.= '</tbody></table>';
				
			
			return $table;
			
		}

		

		function datewisepo(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'porpt/porptmenu">PO Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."porpt/datewisepo",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xgitem"=>"",
				"xproject"=>""
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xgitem-select_Item Group"=>'Type*~star_maxlength="50"',
								"xproject-select_Project"=>'Project_""',
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."porpt/showdatewisepo", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('porpt/porptfilter', false);
		
		}

		public function showdatewisepo(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'porpt/porptmenu">PO Reports</a></li>
							<li><a href="'.URL.'porpt/datewisepo">Report Filter Form</a></li>
							<li class="active">Purchase Order List</li>
						   </ul>';
		
						
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));

			$xgitem = $_POST['xgitem'];
			$project = $_POST['xproject'];

			$type = "All";
			if($xgitem !="")
				$type = $xgitem;
				
			$proj = "All";
			if($project !="")
				$proj = $project;
				
			$tblvalues=array();			
			
				$tblvalues = $this->model->dateWisePO($fdate, $tdate, $xgitem, $project);
				//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Date wise Purchase </br> Project : ".$proj.", Type : ".$type;
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array("0"=>"PO","1"=>"Supplier","2"=>"Name/Org","3"=>"Item Code",4=>"Item Name",5=>"Qty",6=>"Rate",7=>"Total"),
				"groupfield"=>"Date~xdate",
				"grouprecords"=>array(), //database records columns to show in group
				"detailsection"=>array("xponum","xsup","xorg","xitemcode","xitemdesc","xqty~center","xratepur~center","xtotal~right"),
				//"buttons"=>array("Show"=>URL."test/","Delete"=>URL."test/"),
				//"urlvals"=>array("id","phone"),
				"sumfields"=>array("xqty","xtotal"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('porpt/reportpage');
		}

		function itemwisepo(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'porpt/porptmenu">PO Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."porpt/itemwisepo",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xitemcode"=>"",
				"xdesc"=>"",
				"xgitem"=>"",
				"xproject"=>""
				);
				
				$fields = array(
				                array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xitemcode-group_".URL."itempicklist/picklist"=>'Item Code_""',
								"xdesc-text"=>'Desc_"" readonly'
								),
								array(
								"xgitem-select_Item Group"=>'Type*~star_maxlength="50"',
								"xproject-select_Project"=>'Project_""',
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."porpt/showitemwisepo", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('porpt/porptfilter', false);
		
		}

		public function showitemwisepo(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'porpt/porptmenu">PO Reports</a></li>
							<li><a href="'.URL.'porpt/itemwisepo">Report Filter Form</a></li>
							<li class="active">Purchase Order List</li>
						   </ul>';
		
			
			$xitemcode = "";
			if(isset($_POST["xitemcode"]))
				$xitemcode = $_POST["xitemcode"];
			$xdesc = "";
			if(isset($_POST["xdesc"]))
				$xdesc = $_POST["xdesc"];
						
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
			
			$xgitem = $_POST['xgitem'];
			$project = $_POST['xproject'];
			
			// $sup = "";
			// if(isset($_POST["xsup"]))
			// 	$sup = $_POST["xsup"];
			// $item = "";			
			// if(isset($_POST["xitemcode"]))
			// 	$item = $_POST["xitemcode"];
			$type = "All";
			if($xgitem !="")
				$type = $xgitem;
				
			$proj = "All";
			if($project !="")
				$proj = $project;
				
			$tblvalues=array();			
			
			$tblvalues = $this->model->itemWisePO($fdate, $tdate, $xitemcode, $xgitem, $project);
			//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Item wise Purchase Order For <br>Item Code : ".$xitemcode."; Item Name : ". $xdesc."</br> Project : ".$project.", Type : ".$type;
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array(0=>"PO Number",1=>"Supplier",2=>"Name/Org",3=>"Qty",4=>"Rate",5=>"Total"),
				"groupfield"=>"Date~xdate",
				"grouprecords"=>array(),
				"detailsection"=>array("xponum","xsup","xorg","xqty~center","xratepur~center","xtotal~right"),
				"sumfields"=>array("xqty","xtotal"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('porpt/reportpage');
		}

		function supwisepo(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'porpt/porptmenu">PO Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."porpt/supwisepo",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xsup"=>"",
				"xorg"=>"",
				"xgitem"=>"",
				"xproject"=>""
				);
				
				$fields = array(
				                array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xsup-group_".URL."suppliers/picklist"=>'Supplier_""',
								"xorg-text"=>'Org/Name_"" readonly'
								),
								array(
								"xgitem-select_Item Group"=>'Type*~star_maxlength="50"',
								"xproject-select_Project"=>'Project_""',
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."porpt/showsupwisepo", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('porpt/porptfilter', false);
		
		}

		public function showsupwisepo(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'porpt/porptmenu">PO Reports</a></li>
							<li><a href="'.URL.'porpt/supwisepo">Report Filter Form</a></li>
							<li class="active">Purchase Order List</li>
						   </ul>';
		
						
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
			$sup = "";
			if(isset($_POST["xsup"]))
				$sup = $_POST["xsup"];
			$org = "";			
			if(isset($_POST["xorg"]))
				$org = $_POST["xorg"];
				
			$xgitem = $_POST['xgitem'];
			$project = $_POST['xproject'];

			$type = "All";
			if($xgitem !="")
				$type = $xgitem;
				
			$proj = "All";
			if($project !="")
				$proj = $project;
				
			$tblvalues=array();			
			
				$tblvalues = $this->model->supWisePO($fdate, $tdate, $sup, $xgitem, $project);
				//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Supplier Wise Purchese<br>Supplier ID : ".$sup.", Org/Name : ".$org."</br> Project : ".$proj.", Type : ".$type;
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array(0=>"PO",1=>"Item Code",2=>"Item Name",3=>"Qty",4=>"Rate",5=>"Total"),
				"groupfield"=>"Date~xdate",
				"grouprecords"=>array(),
				"detailsection"=>array("xponum","xitemcode","xitemdesc","xqty~center","xratepur~center","xtotal~right"),
				"sumfields"=>array("xqty","xtotal"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('porpt/reportpage');
		}

		function dwinvrcv(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'porpt/porptmenu">Purchase Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."porpt/dwinvrcv",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xitemcode"=>"",
				"xitemdesc"=>"",
				"xgitem"=>"",
				"xproject"=>""
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
								"xproject-select_Project"=>'Project_""',
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."porpt/showdatewiseinvrcv", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('porpt/porptfilter', false);
		
		}
		
		function showdatewiseinvrcv(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'porpt/porptmenu">Purchase Reports</a></li>
							<li><a href="'.URL.'porpt/dwinvrcv">Report Filter Form</a></li>
							<li class="active">Datewise Purchase</li>
						   </ul>';
		
						
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));

			$xgitem = $_POST['xgitem'];
			$project = $_POST['xproject'];
				
			$tblvalues=array();		

			$item = $_POST['xitemcode'];		
			$cond = " and xitemcode='".$item."' ";
			if($item=="")
				$cond="";	

			$type = "All";
			if($xgitem !="")
				$type = $xgitem;

			$proj = "All";
			if($project !="")
				$proj = $project;

			$tblvalues = $this->model->getinvrcv($fdate, $tdate, $cond, $xgitem, $project);
				//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Datewise Purchase </br> Project : ".$proj.", Type : ".$type;
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
				
			$this->view->renderpage('porpt/reportpage');
		}

		function iwinvrcv(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'porpt/porptmenu">Purchase Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."porpt/iwinvrcv",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xitemcode"=>"",
				"xitemdesc"=>"",
				"xgitem"=>"",
				"xproject"=>""
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
								"xproject-select_Project"=>'Project_""',
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."porpt/showitemwiseinvrcv", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('porpt/porptfilter', false);
		
		}
		
		function showitemwiseinvrcv(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'porpt/porptmenu">Purchase Reports</a></li>
							<li><a href="'.URL.'porpt/iwinvrcv">Report Filter Form</a></li>
							<li class="active">Itemwise Purchase</li>
						   </ul>';
		
						
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));

			$xgitem = $_POST['xgitem'];
			$project = $_POST['xproject'];

			$type = "All";
			if($xgitem !="")
				$type = $xgitem;

			$proj = "All";
			if($project !="")
				$proj = $project;
				
			$tblvalues=array();		

			$item = $_POST['xitemcode'];		
			$cond = " and xitemcode='".$item."' ";
			if($item=="")
				$cond="";
	
			
			$tblvalues = $this->model->getinvrcv($fdate, $tdate, $cond, $xgitem, $project);
				//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Itemwise Purchase </br>Project : ".$proj.", Type : ".$proj;
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
				
			$this->view->renderpage('porpt/reportpage');
		}

		function supwiseinvrcv(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'porpt/porptmenu">PO Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."porpt/supwiseinvrcv",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xsup"=>"",
				"xorg"=>"",
				"xgitem"=>"",
				"xproject"=>""
				);
				
				$fields = array(
				                array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xsup-group_".URL."suppliers/picklist"=>'Supplier_""',
								"xorg-text"=>'Org/Name_"" readonly'
								),
								array(
								"xgitem-select_Item Group"=>'Type*~star_maxlength="50"',
								"xproject-select_Project"=>'Project_""',
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."porpt/showsupwiseinvrcv", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('porpt/porptfilter', false);
		
		}

		public function showsupwiseinvrcv(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'porpt/porptmenu">PO Reports</a></li>
							<li><a href="'.URL.'porpt/supwiseinvrcv">Report Filter Form</a></li>
							<li class="active">Purchase Order List</li>
						   </ul>';
		
						
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
			$sup = "";
			if(isset($_POST["xsup"]))
				$sup = $_POST["xsup"];
			$org = "";			
			if(isset($_POST["xorg"]))
				$org = $_POST["xorg"];
				
			$xgitem = $_POST['xgitem'];
			$project = $_POST['xproject'];

			$cond = " and xsup='".$sup."' ";
			if($sup=="")
				$cond="";

			$type = "All";
			if($xgitem !="")
				$type = $xgitem;
				
			$proj = "All";
			if($project !="")
				$proj = $project;
				
			$tblvalues=array();			
			
				$tblvalues = $this->model->getinvrcv($fdate, $tdate, $cond, $xgitem, $project);
				//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Supplier Wise ".$xgitem." Purchese<br>Supplier ID : ".$sup.", Org/Name : ".$org."</br>Project : ".$proj.", Type : ".$type;
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array(0=>"Date",1=>"Document Type",2=>"Document No",3=>"Itemcode",4=>"Item Name",5=>"Cost",6=>"Qty",7=>"Total"),
				"groupfield"=>"Suppliyer Code~xsup",
				"grouprecords"=>array("Suppliyer Name~xsupname"), //database records columns to show in group
				"detailsection"=>array("xdate","xdoctype","xtxnnum","xitemcode","xitemdesc","xstdcost","xqty","xtotal"),
				"buttons"=>array(),
				"urlvals"=>array(),
				"sumfields"=>array("xqty","xtotal"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('porpt/reportpage');
		}

		function ledger(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'porpt/porptmenu">GL Reports</a></li>
							<li class="active">Account Ledger</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."porpt/ledger",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xacc"=>"5005",
				"xaccdesc"=>"Purchases",
				"xgitem"=>"",
				"xsite"=>""	,
				"xvtype"=>"All"
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xacc-text"=>'Account_readonly_maxlength="20"',
								"xaccdesc-text"=>'Acc Desc_readonly',								
								),
								array(
								"xgitem-select_Item Group"=>'Type_maxlength="50"',
								"xsite-select_Project"=>'Project_""',
								"xvtype-radio_All_GRN_PAY"=>'Voucher Type_""'
								)
							);
				
				$dynamicForm = new Dynamicform("Account Ledger Report Filter",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."porpt/showledger", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('porpt/porptfilter', false);
		
		}

		public function showledger(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'porpt/porptmenu">GL Reports</a></li>
							<li><a href="'.URL.'porpt/ledger">Account Ledger</a></li>
							<li class="active">Ledger Report</li>
						   </ul>';
		
			$acc = "";
			$project = "";
			if(isset($_POST['xacc']))
				$acc = $_POST['xacc'];
			
			$accdesc = $_POST['xaccdesc'];
			
			if(isset($_POST['xsite']))
				$project = $_POST['xsite'];
			
			
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));

			$gitem = $_POST['xgitem'];
			$vtype = $_POST['xvtype'];

			$type = "All";
			if($xgitem !="")
				$type = $xgitem;
				
			$proj = "All";
			if($project !="")
				$proj = $project;
				
			$tblvalues=array();
			$btn = array(
				"Clear" => URL."porpt/ledger",
			);
			$acctype = "";	
			if(!empty($this->model->getAccType($acc)))
				$acctype=$this->model->getAccType($acc)[0]['xacctype'];
			
			
				$tblvalues = $this->model->getledger($fdate, $tdate, $acc, $project, $gitem, $vtype);
				
				$fields = array(
						"xdate-Date",
						"xbranch-Branch",
						"xvoucher-Voucher",
						"xnarration-Narration",
						"xprimedr-Dr. Amount",
						"xprimecr-Cr. Amount"
						);
			$table = new Accrpttable();
			
			$opbal = 0;
			$opbal = $this->model->getopbal($acc, $fdate, $project)[0]['xprime'];
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Account Ledger Report";
			if($project!="")
				$this->view->vrptname = "Account Ledger Report<br />Project : ".$proj.", Type : ".$type;
			$this->view->org=Session::get('sbizlong');
			
			$this->view->table = $table->ledgerTable($fields, $tblvalues, "xvoucher", $opbal, $acc, $accdesc,$acctype);
				
			$this->view->renderpage('porpt/reportpage');
		}


		
	}