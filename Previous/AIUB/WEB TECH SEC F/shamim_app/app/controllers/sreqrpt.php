<?php
class Sreqrpt extends Controller{
	
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
				if($menus["xsubmenu"]=="Store Requisition Reports")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/glrpt/js/getaccdt.js');
								
		}
		
		public function index(){
			$this->view->rendermainmenu('sreqrpt/index');
		}
		
		
		
		function porptmenu(){
			
			$menuarr = array(
			0 => array("Date wise Store Requisition"=>URL."sreqrpt/datewisereq","Item wise Store Requisition"=>URL."sreqrpt/itemwisereq","Project & Purpose wise Store Requisition"=>URL."sreqrpt/propurreq"),
			
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
			$this->view->renderpage('sreqrpt/porptmenu', false);
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

		

		function datewisereq(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'sreqrpt/porptmenu">Requisition Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."sreqrpt/datewisereq",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xgitem"=>""
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xgitem-select_Item Group"=>'Type*~star_maxlength="50"'
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."sreqrpt/showdatewisereq", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('sreqrpt/porptfilter', false);
		
		}

		public function showdatewisereq(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'sreqrpt/porptmenu">Requisition Reports</a></li>
							<li><a href="'.URL.'sreqrpt/datewisereq">Report Filter Form</a></li>
							<li class="active">Store Requisition List</li>
						   </ul>';
		
						
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));

			$xgitem = $_POST['xgitem'];
				
			$tblvalues=array();			
			
				$tblvalues = $this->model->dateWiseReq($fdate, $tdate, $xgitem);
				//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Date wise ".$xgitem." Store Requisition";
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array("0"=>"Req. No","1"=>"Item Code",2=>"Item Description",3=>"Qty",4=>"UOM",5=>"Warehouse","6"=>"Project","7"=>"Purpose"),
				"groupfield"=>"Date~xdate",
				"grouprecords"=>array(), //database records columns to show in group
				"detailsection"=>array("ximreqnum","xitemcode","xitemdesc","xqty~center","xunitstk","xwh~center","xproject","xpur"),
				//"buttons"=>array("Show"=>URL."test/","Delete"=>URL."test/"),
				//"urlvals"=>array("id","phone"),
				"sumfields"=>array("xqty"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('sreqrpt/reportpage');
		}
		

		function propurreq(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'sreqrpt/porptmenu">Requisition Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."sreqrpt/propurreq",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xgitem"=>"",
				"xproject"=>"",
				"xpur"=>"",
				);
				
				$fields = array(array(
									"xfdate-datepicker" => 'From_""',
									"xtdate-datepicker" => 'To_""',
									"xproject-select_Project"=>'Project*~star_maxlength="50"',
									"xpur-select_Purpose"=>'Purpose*~star_maxlength="50"'
								),array(
									"xgitem-select_Item Group"=>'Type*~star_maxlength="50"',
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."sreqrpt/showpropurreq", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('sreqrpt/porptfilter', false);
		
		}

		public function showpropurreq(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'sreqrpt/porptmenu">Requisition Reports</a></li>
							<li><a href="'.URL.'sreqrpt/propurreq">Report Filter Form</a></li>
							<li class="active">Store Requisition List</li>
						   </ul>';
		
						
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));

			$whe = "";
			$pri = "";
			$tblsettings = array();

			$xgitem = $_POST['xgitem'];
			$xproject = $_POST['xproject'];
			$xpur = $_POST['xpur'];

			if($xgitem!=""){
				$whe.=" and xtype='".$xgitem."' ";
				// $tblsettings = array(
				// 	"columns"=>array("0"=>"Req. No","1"=>"Item Code",2=>"Item Description",3=>"Qty",4=>"UOM",5=>"Ref. Value","6"=>"Project","7"=>"Purpose"),
				// 	"groupfield"=>"Date~xdate",
				// 	"grouprecords"=>array(), //database records columns to show in group
				// 	"detailsection"=>array("ximreqnum","xitemcode","xitemdesc","xqty~center","xunitstk","xrate~center","xproject","xpur"),
				// 	"sumfields"=>array("xqty"),
				// 	);
			}
			if($xproject!=""){
				$whe.=" and xproject='".$xproject."' ";
				$pri.="<br>Project : ".$xproject;
				// $tblsettings = array(
				// 	"columns"=>array("0"=>"Req. No","1"=>"Item Code",2=>"Item Description",3=>"Qty",4=>"UOM",5=>"Ref. Value","6"=>"Project","7"=>"Purpose"),
				// 	"groupfield"=>"Date~xdate",
				// 	"grouprecords"=>array(), //database records columns to show in group
				// 	"detailsection"=>array("ximreqnum","xitemcode","xitemdesc","xqty~center","xunitstk","xrate~center","xproject","xpur"),
				// 	"sumfields"=>array("xqty"),
				// 	);
			}
			if($xpur!=""){
				$whe.=" and xpur='".$xpur."' ";
				$pri.="<br>Purpose : ".$xpur;
				// $tblsettings = array(
				// 	"columns"=>array("0"=>"Req. No","1"=>"Item Code",2=>"Item Description",3=>"Qty",4=>"UOM",5=>"Ref. Value","6"=>"Project","7"=>"Purpose"),
				// 	"groupfield"=>"Date~xdate",
				// 	"grouprecords"=>array(), //database records columns to show in group
				// 	"detailsection"=>array("ximreqnum","xitemcode","xitemdesc","xqty~center","xunitstk","xrate~center","xproject","xpur"),
				// 	"sumfields"=>array("xqty"),
				// 	);
			}
			$tblsettings = array(
				"columns"=>array("0"=>"Req. No","1"=>"Item Code",2=>"Item Description",3=>"Qty",4=>"UOM",5=>"Warehouse","6"=>"Project","7"=>"Purpose"),
				"groupfield"=>"Date~xdate",
				"grouprecords"=>array(), //database records columns to show in group
				"detailsection"=>array("ximreqnum","xitemcode","xitemdesc","xqty~center","xunitstk","xwh~center","xproject","xpur"),
				"sumfields"=>array("xqty"),
				);
			$tblvalues=array();			
			
			$tblvalues = $this->model->propurreq($fdate, $tdate, $whe);
				//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Date wise ".$xgitem." Requisition".$pri;
			$this->view->org=Session::get('sbizlong');
			
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('sreqrpt/reportpage');
		}

		function itemwisereq(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'sreqrpt/porptmenu">Requisition Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."sreqrpt/itemwisereq",
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
								"xitemcode-group_".URL."itempicklist/picklist"=>'Item Code_""',
								"xdesc-text"=>'Desc_"" readonly'
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."sreqrpt/showitemwisereq", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('sreqrpt/porptfilter', false);
		
		}

		public function showitemwisereq(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'sreqrpt/porptmenu">Requisition Reports</a></li>
							<li><a href="'.URL.'sreqrpt/itemwisereq">Report Filter Form</a></li>
							<li class="active">Store Requisition List</li>
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
				
			$tblvalues=array();			
			
			$tblvalues = $this->model->itemWiseReq($fdate, $tdate, $xitemcode);
			//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Item wise Store Requisition For <br>Item Code : ".$xitemcode."; Item Name : ". $xdesc;
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array("0"=>"Req. No",1=>"Qty",2=>"UOM",3=>"Warehouse","4"=>"Project","5"=>"Purpose"),
				"groupfield"=>"Date~xdate",
				"grouprecords"=>array(),
				"detailsection"=>array("ximreqnum","xqty~center","xunitstk","xwh~center","xproject","xpur"),
				"sumfields"=>array("xqty"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('sreqrpt/reportpage');
		}

		function supwisepo(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'sreqrpt/porptmenu">Requisition Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."sreqrpt/supwisepo",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xsup"=>"",
				"xorg"=>""
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xsup-group_".URL."suppliers/picklist"=>'Supplier_""',
								"xorg-text"=>'Org/Name_"" readonly'
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."sreqrpt/showsupwisepo", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('sreqrpt/porptfilter', false);
		
		}

		public function showsupwisepo(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'sreqrpt/porptmenu">Requisition Reports</a></li>
							<li><a href="'.URL.'sreqrpt/supwisepo">Report Filter Form</a></li>
							<li class="active">Store Requisition List</li>
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
				
			$tblvalues=array();			
			
				$tblvalues = $this->model->supWisePO($fdate, $tdate, $sup);
				//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Supplier Wise Purchese<br>Supplier ID : ".$sup.", Org/Name : ".$org;
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
				
			$this->view->renderpage('sreqrpt/reportpage');
		}


		
	}