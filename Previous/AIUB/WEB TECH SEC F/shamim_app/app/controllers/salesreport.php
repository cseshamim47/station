<?php
class Salesreport extends Controller{
	
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
				if($menus["xsubmenu"]=="Sales Report")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/salesreport/js/getaccdt.js');
								
		}
		
		public function index(){
					
			
			$this->view->rendermainmenu('salesreport/index');
			
		}
		
		
		
		function porptmenu(){
			
			$menuarr = array(
			0 => array("Date wise Sales"=>URL."salesreport/datewisesales","Customar wise Sales"=>URL."salesreport/cuswisesales","All Item Sales"=>URL."salesreport/allitemsales","Item wise Sales"=>URL."salesreport/itemwisesales")
			);
			$menutable='<table class="table" style="width:100%"><tbody>';
			foreach($menuarr as $key=>$value){
				$menutable.='<tr>';
					foreach($value as $k=>$val){
						$menutable.='<td><a style="width:100%" class="btn btn-info" href="'.$val.'" role="button"><span class="glyphicon glyphicon-open-file"></span>&nbsp;'.$k.'</a></td>';
					}
				$menutable.='</tr>';
				
			}
			
			$menutable.='</tbody></table>';
			$this->view->table = $menutable;
			$this->view->renderpage('salesreport/porptmenu', false);
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
				
		function itemwisesales(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'salesreport/porptmenu">Sales Reports</a></li>
							<li class="active">Item wise sales</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."salesreport/itemwisesales",
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
								"xitemcode-group_".URL."itempicklist/picklist"=>'Item_""',
								"xdesc-text" => 'Item Name_"" readonly'
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."salesreport/showitemwisesales", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('salesreport/porptfilter', false);
		
		}
		public function showitemwisesales(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'salesreport/porptmenu">Sales Reports</a></li>
							<li><a href="'.URL.'salesreport/itemwisesales">Report Filter Form</a></li>
							<li class="active">Item Wise Sales</li>
						   </ul>';
		
						
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
			$xdesc = "";
			if(isset($_POST["xdesc"]))
				$xdesc = $_POST["xdesc"];
			$item = "";			
			if(isset($_POST["xitemcode"]))
				$item = $_POST["xitemcode"];
				
			$tblvalues=array();
			
			$tblvalues = $this->model->getItemWiseSales($fdate, $tdate, $item);
			//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Sales of Item Code : ".$item.'; Item Name : '.$xdesc;
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array("0"=>"Item Code",1=>"Rate",2=>"Qty",3=>"Discount",4=>"Total"),
				"groupfield"=>"Date~xdate",
				"detailsection"=>array("xitemcode","xrate","xqty","xdisctotal","xtotal"),
				"sumfields"=>array("xqty","xtotal"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
				
			$this->view->renderpage('salesreport/reportpage');
		}

		function allitemsales(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'salesreport/porptmenu">Sales Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."salesreport/allitemsales",
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
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."salesreport/showallitemsales", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('salesreport/porptfilter', false);
		
		}

		public function showallitemsales(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'salesreport/porptmenu">Sales Reports</a></li>
							<li><a href="'.URL.'salesreport/allitemsales">Report Filter Form</a></li>
							<li class="active">All Items Sales</li>
						   </ul>';
		
						
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
				
			$tblvalues=array();			
			
			$tblvalues = $this->model->getAllItemSales($fdate, $tdate);
			//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "All Items Sales";
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array("0"=>"Item Code",1=>"Rate",2=>"Qty",3=>"Discount",4=>"Total"),
				"groupfield"=>"Date~xdate",
				"detailsection"=>array("xitemcode","xrate","xqty","xdisctotal","xtotal"),
				"sumfields"=>array("xqty","xtotal"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('salesreport/reportpage');
		}

		function datewisesales(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'salesreport/porptmenu">Sales Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."salesreport/datewisesales",
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
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."salesreport/showdatewisesales", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('salesreport/porptfilter', false);
		
		}

		public function showdatewisesales(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'salesreport/porptmenu">Sales Reports</a></li>
							<li><a href="'.URL.'salesreport/datewisesales">Report Filter Form</a></li>
							<li class="active">Date Wise Sales</li>
						   </ul>';
		
						
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
				
			$tblvalues=array();			
			
			$tblvalues = $this->model->getInvoiceWiseSales($fdate, $tdate);
			//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Date wise Sales";
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array("0"=>"Item Code",1=>"Rate",2=>"Qty",3=>"Discount",4=>"Total"),
				"groupfield"=>"Date~xdate",
				"grouprecords"=>array("Invoice Number~xsonum"), //database records columns to show in group
				"detailsection"=>array("xitemcode","xrate","xqty","xdisctotal","xtotal"),
				//"buttons"=>array("Show"=>URL."test/","Delete"=>URL."test/"),
				//"urlvals"=>array("id","phone"),
				"sumfields"=>array("xqty","xtotal"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('salesreport/reportpage');
		}

		function cuswisesales(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'salesreport/porptmenu">Sales Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."salesreport/cuswisesales",
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
								"xcus-group_".URL."jsondata/customerpicklist"=>'Customer_""',
								"xorg-text"=>'Org/Name_"" readonly'
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."salesreport/showcuswisesales", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('salesreport/porptfilter', false);
		
		}

		public function showcuswisesales(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'salesreport/porptmenu">Sales Reports</a></li>
							<li><a href="'.URL.'salesreport/cuswisesales">Report Filter Form</a></li>
							<li class="active">Sales List</li>
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
			
				$tblvalues = $this->model->getCusWiseSales($fdate, $tdate, $cus);
				//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Sales Order by Customer ID : ".$cus.", Org/Name : ".$org;
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array("0"=>"Item Code",1=>"Rate",2=>"Qty",3=>"Discount",4=>"Total"),
				"groupfield"=>"Date~xdate",
				"grouprecords"=>array("Invoice Number~xsonum"),
				"detailsection"=>array("xitemcode","xrate","xqty","xdisctotal","xtotal"),
				"sumfields"=>array("xqty","xtotal"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('salesreport/reportpage');
		}


		
	}