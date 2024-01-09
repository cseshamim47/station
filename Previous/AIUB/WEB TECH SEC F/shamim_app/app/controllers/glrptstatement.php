<?php
class Glrptstatement extends Controller{
	
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
				if($menus["xsubmenu"]=="GL Reports")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js');
								
		}

		function rcptnpayment(){
			
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li class="active">Receipt Payment Report</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."glrptstatement/rcptnpayment",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xsite"=>"",
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xsite-select_Project" => 'Project_""',
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."glrptstatement/showrcptnpay", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('glrpt/glrptfilter', false);
		
		}

		public function showrcptnpay(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li><a href="'.URL.'glrptstatement/rcptnpayment">Receipt Payment</a></li>
							<li class="active">Receipt Payment Report</li>
						   </ul>';
		
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
			
			$project = "";
			if(isset($_POST['xsite']))
				$project = $_POST['xsite'];
			
			$tblvalues=array();
			
			
				$tblvalues = $this->model->rcptpaybalopening($fdate, $project);
				$tblvaluesrcptpay = $this->model->tblvaluesrcptpay($fdate,$tdate, $project);
				$tblvaluesclosing = $this->model->rcptpaybalclosing($tdate, $project);
				
				$rcpttotal = 0;
				$paytotal = 0;

				$rcpt = 0;
				$pay = 0;

				$cashopbal = 0;
				$bankopbal = 0;

				$totalop = 0;

				$totalcl = 0;

				$cashclbal = 0;
				$bankclbal = 0;

				if(!empty($tblvalues)){
					foreach ($tblvalues as $key => $value) {
						if($value["xaccusage"]=="Cash"){
							$cashopbal = $value["xprime"];	
						}
						if($value["xaccusage"]=="Bank"){
							$bankopbal = $value["xprime"];	
						}
					}
				}

				$totalop = $cashopbal+$bankopbal;

				$rcpttotal = $totalop;

				if(!empty($tblvaluesclosing)){
					foreach ($tblvaluesclosing as $key => $value) {
						if($value["xaccusage"]=="Cash"){
							$cashclbal = $value["xprime"];	
						}
						if($value["xaccusage"]=="Bank"){
							$bankclbal = $value["xprime"];	
						}
					}
				}
				$totalcl = $cashclbal+$bankclbal;
				$paytotal = $totalcl;
				$table = '<table class="table" border="1" width="100%">';
					$table .= '<tr><td><strong>Receipt</strong></td><td><strong>Payment</strong></td></tr>';
					$table .= '<tr>';
						$table .= '<td>';
							$table .= '<table class="table table-responsive" width="100%">';
							$table .= '<tr>';
							$table .= '<td><strong>Opening Balance</strong></td>';
							$table .= '</tr>';
							$table .= '<tr>';
								$table .= '<td><strong>Cash In Hand :'.$cashopbal.'</strong></td>';
							$table .= '</tr>';
							$table .= '<tr>';
							$table .= '<td><strong>Cash At Bank :'.$bankopbal.'</strong><td></td><td><strong>'.$totalop.'</strong></td>';
							$table .= '</tr>';

								if(!empty($tblvaluesrcptpay)){
									foreach($tblvaluesrcptpay as $key=>$value){
										if($value["xprime"]<0){
											//$rcpttotal += $value["xprime"];
											$rcpt += $value["xprime"];
											$table .= '<tr>';
												$table .= '<td>'.$value["xacc"].'</td><td>'.$value["xaccdesc"].'</td><td>'.abs($value["xprime"]).'</td>';
											$table .= '</tr>';
										}
									}
									
								}
							$table .= '</table>';
						$table .= '</td>';
						$table .= '<td>';
							$table .= '<table class="table table-responsive" width="100%">';
								if(!empty($tblvaluesrcptpay)){
									foreach($tblvaluesrcptpay as $key=>$value){
										if($value["xprime"]>0){
											$paytotal += $value["xprime"];
											$pay += $value["xprime"];
											$table .= '<tr>';
												$table .= '<td>'.$value["xacc"].'</td><td>'.$value["xaccdesc"].'</td><td>'.$value["xprime"].'</td>';
											$table .= '</tr>';
										}
									}
									
								}
								$table .= '<tr>';
							$table .= '<td><strong>Closing Balance</strong></td>';
							$table .= '</tr>';
							$table .= '<tr>';
								$table .= '<td><strong>Cash In Hand :'.$cashclbal.'</strong></td>';
							$table .= '</tr>';
							$table .= '<tr>';
								$table .= '<td><strong>Cash At Bank :'.$bankclbal.'</strong></td><td></><td><strong>'.$totalcl.'</strong></td>';
							$table .= '</tr>';
							$table .= '</table>';
						$table .= '</td>';
					$table .= '</tr>';
					$table .= '<tr>';
					$table .= '<td><table width="100%"><tr align="right"><td>Total Receipt :</td><td></td><td>'.abs($rcpt).'</td></tr></table></td>';
					$table .= '<td><table width="100%"><tr align="right"><td>Total Payment :</td><td></td><td>'.$pay.'</td></tr></table></td>';
					$table .= '</tr>';
					$table .= '<tr>';
					$rcpttotal = $rcpttotal+abs($rcpt);
					$table .= '<td><table width="100%"><tr align="right"><td>Total :</td><td></td><td>'.abs($rcpttotal).'</td></tr></table></td>';
					$table .= '<td><table width="100%"><tr align="right"><td>Total :</td><td></td><td>'.$paytotal.'</td></tr></table></td>';
					
					$table .= '</tr>';					
				$table .= '</table>';


			$this->view->vfdate = "From: ".$xfdate;
			$this->view->vtdate = "To: ".$xtdate;
			$this->view->vrptname = "Receipt Payment Report";
			if($project!=""){
				$this->view->vrptname = "Receipt Payment Report<br />Project :".$project;
			}
			$this->view->org=Session::get('sbizlong');
			
			$this->view->table = $table;
				
			$this->view->renderpage('glrpt/reportpage');
		}
				
		function trialbal(){
			
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li class="active">Trial Balance Report</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."glrptstatement/trialbal",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xsite"=>"",
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xsite-select_Project" => 'Project_""',
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."glrptstatement/showtrialbal", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('glrpt/glrptfilter', false);
		
		}
		
		
		
		public function showtrialbal(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li><a href="'.URL.'glrptstatement/trialbal">Trial Balance</a></li>
							<li class="active">Trial Balance Report</li>
						   </ul>';
		
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
			
			$project = "";
			if(isset($_POST['xsite']))
				$project = $_POST['xsite'];
			
			$tblvalues=array();
			
			
				$tblvalues = $this->model->trialbalopening($fdate, $project);
				$tblvaluescur = $this->model->trialbalcur($fdate,$tdate, $project);
				
				$farr = array_merge($tblvalues,$tblvaluescur);
				
				$fields = array(
						"xacc-Account",
						"xaccdesc-Description",
						"opdramt-Debit",						
						"opcramt-Credit",
						"opdramtcur-Debit",
						"opcramtcur-Credit",
						"dramtcl-Debit",
						"cramtcl-Credit"
						);
			$totalpoint = "";			
			$this->view->vfdate = "From: ".$xfdate;
			$this->view->vtdate = "To: ".$xtdate;
			$this->view->vrptname = "Trial Balance";
			if($project!=""){
				$this->view->vrptname = "Trial Balance<br />Project :".$project;
			}
			$this->view->org=Session::get('sbizlong');
			
			$this->view->table = $this->accTable($fields, $farr);
				
			$this->view->renderpage('glrpt/reportpage');
		}
		/*
		function plstatement(){
			
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li class="active">Profit & Loss Statement Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."glrptstatement/plstatement",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xyear"=>"",
				"xper"=>"",
				"xsite"=>""
				);
				
				$fields = array(array(
								"xyear-text" => 'Year_""',
								"xper-text" => 'Period_""',
								"xsite-select_Project" => 'Project_""',
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."glrptstatement/showpl", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('glrpt/glrptfilter', false);
		
		}
		
		public function showpl(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li><a href="'.URL.'glrptstatement/plstatement">Profit & Loss Statement Filter</a></li>
							<li class="active">Profit & Loss Statement</li>
						   </ul>';
		
			$xyear = $_POST['xyear'];
			
			$xper = $_POST['xper'];
			
			$project = "";
			if(isset($_POST['xsite']))
				$project = $_POST['xsite'];
			
			$tblvaluesinc=array();
			$tblvaluescurinc=array();
			
			$tblvaluesexp=array();
			$tblvaluescurexp=array();
			
				$tblvaluesinc = $this->model->plopening($xyear, $xper, "Income", $project);
				$tblvaluescurinc = $this->model->plcur($xyear, $xper, "Income", $project);
				
				$tblvaluesexp = $this->model->plopening($xyear, $xper, "Expenditure", $project);
				$tblvaluescurexp = $this->model->plcur($xyear, $xper, "Expenditure", $project);
				
				$arrinc = array_merge($tblvaluesinc,$tblvaluescurinc);
				
				$arrexp = array_merge($tblvaluesexp,$tblvaluescurexp);
				
				$fields = array(
						"xacc-Account",
						"xaccdesc-Description",
						"opamt-Year Befor current Period",						
						"xcuramt-Current Period",
						"xclosing-Year to current Period"
						);
			$totalpoint = "";			
			$this->view->vfdate = "Year: ".$xyear;
			$this->view->vtdate = "Period: ".$xper;
			$this->view->vrptname = "Profit & Loss Statement";
			if($project!=""){
				$this->view->vrptname = "Profit & Loss Statement<br />Project :".$project;
			}
			$this->view->org=Session::get('sbizlong');
			
			$this->view->table = $this->accPlTable($fields, $arrinc, $arrexp);
				
			$this->view->renderpage('glrpt/reportpage');
		}*/

		function plstatementbydate(){
			
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li class="active">Profit & Loss Statement Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."glrptstatement/plstatementbydate",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xsite"=>"",
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xsite-select_Project" => 'Project_""',
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."glrptstatement/showplbydate", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('glrpt/glrptfilter', false);
		
		}
		
		public function showplbydate(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li><a href="'.URL.'glrptstatement/plstatementbydate">Profit & Loss Statement Filter</a></li>
							<li class="active">Profit & Loss Statement</li>
						   </ul>';
		
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
			
			$project = "";
			if(isset($_POST['xsite']))
				$project = $_POST['xsite'];
			
			$tblvaluesinc=array();
			$tblvaluescurinc=array();
			
			$tblvaluesexp=array();
			$tblvaluescurexp=array();
			
				$tblvaluesinc = $this->model->plopeningbydate($fdate, "Income", $project);
				$tblvaluescurinc = $this->model->plcurbydate($fdate, $tdate, "Income", $project);
				
				$tblvaluesexp = $this->model->plopeningbydate($fdate, "Expenditure", $project);
				$tblvaluescurexp = $this->model->plcurbydate($fdate, $tdate, "Expenditure", $project);
				
				$arrinc = array_merge($tblvaluesinc,$tblvaluescurinc);

				$stockop = $this->model->getopeningstock($fdate)[0]['opstock'];
				$stockcl = $this->model->getclosingstock()[0]['clstock'];
				$stocko = $stockop;
				$stockc = $stockcl;
				if($stockop>0)
					$stocko = $stockop*-1;
				if($stockcl>0)
					$stockc = $stockcl*-1;
				//echo $this->model->getopeningstock($fdate); die;
				$stockarrinc = array("xacc"=>"Stock","xaccdesc"=>"Closing","opamt"=>$stocko,"xcuramt"=>$stockc);

				$stockarrexp = array("xacc"=>"Stock","xaccdesc"=>"Opening","opamt"=>0,"xcuramt"=>$stockop);

				array_push($arrinc, $stockarrinc);
				

				$arrexp = array_merge($tblvaluesexp,$tblvaluescurexp);

				array_push($arrexp, $stockarrexp);
				
				$fields = array(
						"xacc-Account",
						"xaccdesc-Description",
						"opamt-Opening",						
						"xcuramt-Current Period",
						"xclosing-Closing"
						);
			$totalpoint = "";			
			$this->view->vfdate = "From: ".$xfdate;
			$this->view->vtdate = "To: ".$xtdate;
			$this->view->vrptname = "Profit & Loss Statement";
			if($project!=""){
				$this->view->vrptname = "Profit & Loss Statement<br />Project :".$project;
			}
			$this->view->org=Session::get('sbizlong');
			
			$this->view->table = $this->accPlTable($fields, $arrinc, $arrexp);
				
			$this->view->renderpage('glrpt/reportpage');
		}
		/*function balancesheet(){
			
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li class="active">Balance Sheet Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."glrptstatement/balancesheet",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xyear"=>"",
				"xper"=>"",
				);
				
				$fields = array(array(
								"xyear-text" => 'Year_""',
								"xper-text" => 'Period_""',
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."glrptstatement/showbalancesheet", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('glrpt/glrptfilter', false);
		
		}
		
		public function showbalancesheet(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li><a href="'.URL.'glrptstatement/balancesheet">Balance Sheet Filter</a></li>
							<li class="active">Balance Sheet Statement</li>
						   </ul>';
		
			$xyear = $_POST['xyear'];
			
			$xper = $_POST['xper'];
			
			$tblvaluesinc=array();
			$tblvaluescurinc=array();
			
			$tblvaluesexp=array();
			$tblvaluescurexp=array();
			
				$tblvaluesinc = $this->model->bsopening($xyear, $xper, "Asset");
				$tblvaluescurinc = $this->model->bscur($xyear, $xper, "Asset");
				
				$tblvaluesexp = $this->model->bsopening($xyear, $xper, "Liability");
				$tblvaluescurexp = $this->model->bscur($xyear, $xper, "Liability");
				
				$arrinc = array_merge($tblvaluesinc,$tblvaluescurinc);
				
				$arrexp = array_merge($tblvaluesexp,$tblvaluescurexp);
				$opprofit = $this->model->profitbf($xyear, $xper)[0]["pofitbf"];
				$clprofit = $this->model->profitcr($xyear, $xper)[0]["pofitcr"];
				$fields = array(
						"xacc-Account",
						"xaccdesc-Description",
						"opamt-Year Befor current Period",						
						"xcuramt-Current Period",
						"xclosing-Year to current Period"
						);
			$totalpoint = "";			
			$this->view->vfdate = "Year: ".$xyear;
			$this->view->vtdate = "Period: ".$xper;
			$this->view->vrptname = "Balance Sheet";
			$this->view->org=Session::get('sbizlong');
			
			$this->view->table = $this->accBsTable($fields, $arrinc, $arrexp, $opprofit, $clprofit);
				
			$this->view->renderpage('glrpt/reportpage');
		}*/
	function balancesheet(){
			
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li class="active">Balance Sheet Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."glrptstatement/balancesheet",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xsite"=>"",
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xsite-select_Project" => 'Project_""',
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."glrptstatement/showbalancesheet", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('glrpt/glrptfilter', false);
		
		}
		
		public function showbalancesheet(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li><a href="'.URL.'glrptstatement/balancesheet">Balance Sheet Filter</a></li>
							<li class="active">Balance Sheet Statement</li>
						   </ul>';
		
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
			
			$tblvaluesinc=array();
			$tblvaluescurinc=array();
			
			$tblvaluesexp=array();
			$tblvaluescurexp=array();
			
				$tblvaluesinc = $this->model->bsopening($fdate, "Asset");
				$tblvaluescurinc = $this->model->bscur($fdate, $tdate, "Asset");

				$stockop = $this->model->getopeningstock($fdate)[0]['opstock'];
				$stockcl = $this->model->getclosingstock()[0]['clstock'];
				
				$stockarrinc = array("xacc"=>"Stock","xaccdesc"=>"Closing","opamt"=>$stockop,"xcuramt"=>$stockcl);


				
				$tblvaluesexp = $this->model->bsopening($fdate, "Liability");
				$tblvaluescurexp = $this->model->bscur($fdate, $tdate, "Liability");
				
				$arrinc = array_merge($tblvaluesinc,$tblvaluescurinc);

				array_push($arrinc, $stockarrinc);
				
				$arrexp = array_merge($tblvaluesexp,$tblvaluescurexp);
				$opprofit = $this->model->profitbf($fdate);
				$clprofit = $this->model->profitcr($fdate, $tdate);
				$fields = array(
						"xacc-Account",
						"xaccdesc-Description",
						"opamt-Opening",						
						"xcuramt-Current Period",
						"xclosing-Closing"
						);
			$totalpoint = "";			
			$this->view->vfdate = "From ".$xfdate;
			$this->view->vtdate = "To ".$xtdate;
			$this->view->vrptname = "Balance Sheet";
			$this->view->org=Session::get('sbizlong');
			
			$this->view->table = $this->accBsTable($fields, $arrinc, $arrexp, $opprofit, $clprofit);
				
			$this->view->renderpage('glrpt/reportpage');
		}	
	public function shocusbal(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>							
							<li class="active">Customer Balance</li>
						   </ul>';
						   
				$tblsettings = array(
							"columns"=>array("0"=>"Customer Code",1=>"Name",2=>"Address",3=>"Mobile",4=>"Balance"),
							"buttons"=>array(),
							"urlvals"=>array(),
							"sumfields"=>array("xbal"),
							);		   
				
			$row = $this->model->customerbal();	
			$totalpoint = "";			
			$this->view->vfdate = "A";
			$this->view->vtdate = "Z";
			$this->view->vrptname = "Customer Balance Report";
			$this->view->org=Session::get('sbizlong');
			$table = new ReportingTable();
			$this->view->table = $table->reportingtbl($tblsettings, $row);
				
			$this->view->renderpage('glrpt/reportpage');
		}

		public function shosupbal(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>							
							<li class="active">Supplier Balance</li>
						   </ul>';
						   
				$tblsettings = array(
							"columns"=>array("0"=>"Supplier Code",1=>"Name",2=>"Address",3=>"Mobile",4=>"Balance"),
							"buttons"=>array(),
							"urlvals"=>array(),
							"sumfields"=>array("xbal"),
							);		   
				
			$row = $this->model->supplierbal();	
			$totalpoint = "";			
			$this->view->vfdate = "A";
			$this->view->vtdate = "Z";
			$this->view->vrptname = "Supplier Balance Report";
			$this->view->org=Session::get('sbizlong');
			$table = new ReportingTable();
			$this->view->table = $table->reportingtbl($tblsettings, $row);
				
			$this->view->renderpage('glrpt/reportpage');
		}	
	function rcptpay(){
			
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li class="active">Receipt & Payment Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."glrptstatement/rcptpay",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."glrptstatement/showrcptpay", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('glrpt/glrptfilter', false);
		
		}	
	public function showrcptpay(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li><a href="'.URL.'glrptstatement/rcptpay">Receipt & Payment Report Filter</a></li>							
							<li class="active">Receipt & Payment Report</li>
						   </ul>';
						   
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));		   
						   
				$tblvalues=array();
			
			
				$tblvalues = $this->model->trialbalopening($fdate);
				$tblvaluescur = $this->model->trialbalcur($fdate,$tdate);
				
				$farr = array_merge($tblvalues,$tblvaluescur);
				
				$fields = array(
						"xacc-Account",
						"xaccdesc-Description",
						"opdramt-Debit",						
						"opcramt-Credit",
						"opdramtcur-Debit",
						"opcramtcur-Credit",
						"dramtcl-Debit",
						"cramtcl-Credit"
						);
			$totalpoint = "";			
			$this->view->vfdate = "From: ".$xfdate;
			$this->view->vtdate = "To: ".$xtdate;
			$this->view->vrptname = "Trial Balance";
			$this->view->org=Session::get('sbizlong');
			
			$this->view->table = $this->accTable($fields, $farr);
				
			$this->view->renderpage('glrpt/reportpage');
		}	
	function accTable($fields, $row){
		
		$field = array();
		$head = array();
		foreach($fields as $str){
			$st=explode('-',$str);
			
			$head[] = $st[1];
		}
		
		$table = '<div class="table-responsive"><table class="table table-bordered table-striped" style="width:100%">';
		$table.='<thead>';
		$table.='<tr>';
		$table.='<th></th><th></th><th colspan="2">Opening Balance</th><th colspan="2">Current Period</th><th colspan="2">Colsing Balance</th>';
		$table.='</tr>';
		$table.='<tr>';
		
		foreach($head as $hd){
			$table.='<th>'.$hd.'</th>';
		}
		$table.='</tr>';
		$table.='</thead>';
		$table.='<tbody>'; 
		$groups = array();
			$key = "";
			
				foreach ($row as $value) {
					$key = $value['xacc'];
					if (!array_key_exists($key, $groups)) {
						$groups[$key] = array(
						    'xaccdesc' => $value['xaccdesc'],
							'opdramt' => number_format(floatval($value['opdramt']), 2, '.', ''),
							'opcramt' => number_format(floatval($value['opcramt']), 2, '.', ''),
							'opdramtcur' => number_format(floatval($value['opdramtcur']), 2, '.', ''),
							'opcramtcur' => number_format(floatval($value['opcramtcur']), 2, '.', ''),
							'dramtcl'=> number_format(floatval($value['opdramt']+$value['opdramtcur']), 2, '.', ''),
							'cramtcl'=> number_format(floatval($value['opcramt']+$value['opcramtcur']), 2, '.', ''),
						);
					} else {
						$groups[$key]['opdramt'] = $groups[$key]['opdramt'] + $value['opdramt'];
						$groups[$key]['opcramt'] = $groups[$key]['opcramt'] + $value['opcramt'];
						$groups[$key]['opdramtcur'] = $groups[$key]['opdramtcur'] + $value['opdramtcur'];
						$groups[$key]['opcramtcur'] = $groups[$key]['opcramtcur'] + $value['opcramtcur'];
						$groups[$key]['dramtcl'] = $groups[$key]['opdramt'] + $value['opdramtcur'];
						$groups[$key]['cramtcl'] = $groups[$key]['opcramt'] + $value['opcramtcur'];
					}
					
				}
		
		$opcramttot=0;		
		$opcramtcurtot=0;
		$cramtcltot=0;
		$opdramttot=0;
		$opdramtcurtot=0;
		$dramtcltot=0;
		
		foreach($groups as $key=>$value){
			$table.='<tr>';
			$table.='<td>'.htmlentities($key).'</td>';
			foreach($value as $k=>$str){				
				if($k=="opcramt" || $k=="opcramtcur" || $k=="cramtcl"){
					$table.='<td>'.htmlentities(abs($str)).'</td>';
					switch ($k){
						case "opcramt":
							$opcramttot+=$str;
							break;
						case "opcramtcur":
							$opcramtcurtot+=$str;
							break;
						case "cramtcl":
							$cramtcltot+=$str;
							break;	
						}
				}				
				else{
					$table.='<td>'.htmlentities($str).'</td>';
				}
				
				if($k=="opdramt" || $k=="opdramtcur" || $k=="dramtcl"){
					
					switch ($k){
						case "opdramt":
							$opdramttot+=$str;
							break;
						case "opdramtcur":
							$opdramtcurtot+=$str;
							break;
						case "dramtcl":
							$dramtcltot+=$str;
							break;	
						}
				}
			}
			
			
			$table.='</tr>';
		}
		$table.='<tr>';
			$table.='<td></td><td><strong>Total</strong></td><td><strong>'.$opdramttot.'</strong></td><td><strong>'.abs($opcramttot).'</strong></td><td><strong>'.$opdramtcurtot.'</strong></td><td><strong>'.abs($opcramtcurtot).'</strong></td><td><strong>'.$dramtcltot.'</strong></td><td><strong>'.abs($cramtcltot).'</strong></td>';
		$table.='</tr>';
		$table.='</tbody>';
		$table.='</table></div>'; 
		return $table;
	}

	function accPlTable($fields, $row, $rowexp){
		//Income section
		$field = array();
		$head = array();
		foreach($fields as $str){
			$st=explode('-',$str);
			
			$head[] = $st[1];
		}
		
		$table = '<div class="table-responsive"><table class="table table-bordered table-striped" style="width:100%">';
		$table.='<thead>';
		$table.='<tr style="background-color:#ddd;">';
		$table.='<th colspan="5">Income</th>';
		$table.='</tr>';
		$table.='<tr>';
		
		foreach($head as $hd){
			$table.='<th>'.$hd.'</th>';
		}
		$table.='</tr>';
		$table.='</thead>';
		$table.='<tbody>'; 
		$groups = array();
		
			$key = "";
			
			
				foreach ($row as $value) {
					$key = $value['xacc'];
					if (!array_key_exists($key, $groups)) {
						if($key=="Stock"){
							$groups[$key] = array(
							    'xaccdesc' => $value['xaccdesc'],
								'opamt' => $value['opamt'],
								'xcuramt' => $value['xcuramt'],							
								'amtcl'=> $value['xcuramt'],							
							);
						}else{
							$groups[$key] = array(
							    'xaccdesc' => $value['xaccdesc'],
								'opamt' => $value['opamt'],
								'xcuramt' => $value['xcuramt'],							
								'amtcl'=> $value['xcuramt']+$value['opamt'],							
							);
						}
					} else {
						$groups[$key]['opamt'] = $groups[$key]['opamt'] + $value['opamt'];
						$groups[$key]['xcuramt'] = $groups[$key]['xcuramt'] + $value['xcuramt'];
						$groups[$key]['amtcl'] = $groups[$key]['opamt'] + $groups[$key]['xcuramt'];		
					}
					
				}
		
		$opamttot=0;		
		$xcuramttot=0;
		$amtcltot=0;
		
		
		foreach($groups as $key=>$value){
			$table.='<tr>';
			$table.='<td>'.htmlentities($key).'</td>';
			foreach($value as $k=>$str){				
				if($k=="opamt" || $k=="xcuramt" || $k=="amtcl"){
					if($str>0)
						$table.='<td>('.htmlentities($str).')</td>';
					else
						$table.='<td>'.htmlentities(abs($str)).'</td>';
					switch ($k){
						case "opamt":
							$opamttot+=$str;
							break;
						case "xcuramt":
							$xcuramttot+=$str;
							break;
						case "amtcl":
							$amtcltot+=$str;
							break;	
						}
				}				
				else{
					$table.='<td>'.htmlentities($str).'</td>';
				}
				
				
			}
			
			
			$table.='</tr>';
		}
		$table.='<tr>';
			$table.='<td></td><td><strong>Total Income</strong></td><td><strong>'.abs($opamttot).'</strong></td><td><strong>'.abs($xcuramttot).'</strong></td><td><strong>'.abs($amtcltot).'</strong></td>';
		$table.='</tr>';
		$table.='<tr style="background-color:#ddd;">';
		$table.='<td colspan="5"><strong>Expenditure</strong></td>';
		$table.='</tr>';
		
		$groupexp = array();
			$keyexp = "";
			
				foreach ($rowexp as $value) {
					$key = $value['xacc'];
					if (!array_key_exists($key, $groupexp)) {
						$groupexp[$key] = array(
						    'xaccdesc' => $value['xaccdesc'],
							'opamt' => $value['opamt'],
							'xcuramt' => $value['xcuramt'],							
							'amtcl'=> $value['opamt']+$value['xcuramt'],							
						);
					} else {
						$groupexp[$key]['opamt'] = $groupexp[$key]['opamt'] + $value['opamt'];
						$groupexp[$key]['xcuramt'] = $groupexp[$key]['xcuramt'] + $value['xcuramt'];
						$groupexp[$key]['amtcl'] = $groupexp[$key]['opamt'] + $groupexp[$key]['xcuramt'];		
					}
					
				}
		
		$expopamttot=0;		
		$expxcuramttot=0;
		$expamtcltot=0;
		
		
		foreach($groupexp as $key=>$value){
			$table.='<tr>';
			$table.='<td>'.htmlentities($key).'</td>';
			foreach($value as $k=>$str){				
				if($k=="opamt" || $k=="xcuramt" || $k=="amtcl"){
					if($str<0)
						$table.='<td>('.htmlentities(abs($str)).')</td>';
					else
						$table.='<td>'.htmlentities($str).'</td>';
					switch ($k){
						case "opamt":
							$expopamttot+=$str;
							break;
						case "xcuramt":
							$expxcuramttot+=$str;
							break;
						case "amtcl":
							$expamtcltot+=$str;
							break;	
						}
				}				
				else{
					$table.='<td>'.htmlentities($str).'</td>';
				}
				
				
			}
			
			
			$table.='</tr>';
		}
		$opprofit = $expopamttot+$opamttot;
		$curprofit = $expxcuramttot+$xcuramttot;
		$clprofit = $expamtcltot+$amtcltot;
		
		$opcolor = "green";
		$curcolor = "green";
		$clcolor = "green";
		
		if($opprofit<=0){
			$opcolor = "green";
			$opprofit = abs($opprofit);
		}
		else{
			$opcolor = "red";
			$opprofit = "(".$opprofit.")";
		}
		if($curprofit<=0){
			$curcolor = "green";
			$curprofit = abs($curprofit);
		}
		else{
			$curcolor = "red";
			$curprofit = "(".$curprofit.")";
		}
		if($clprofit<=0){
			$clcolor = "green";
			$clprofit = abs($clprofit);
		}
		else{
			$clcolor = "red";
			$clprofit = "(".$clprofit.")";
		}
		
		
		
		$table.='<tr>';
			$table.='<td></td><td><strong>Profit & Loss</strong></td><td style="color:'.$opcolor.'"><strong>'.$opprofit.'</strong></td><td style="color:'.$curcolor.'"><strong>'.$curprofit.'</strong></td><td style="color:'.$clcolor.'"><strong>'.$clprofit.'</strong></td>';
		$table.='</tr>';
		$table.='<tr>';
			$table.='<td></td><td><strong>Total Expenditure</strong></td><td><strong>'.$expopamttot.'</strong></td><td><strong>'.$expxcuramttot.'</strong></td><td><strong>'.$expamtcltot.'</strong></td>';
		$table.='</tr>';
		$table.='</tbody>';
		$table.='</table></div>';
			
		return $table;
	}
	
	function accBsTable($fields, $row, $rowexp, $profitbf, $profitcr){
		//Income section
		$field = array();
		$head = array();
		foreach($fields as $str){
			$st=explode('-',$str);
			
			$head[] = $st[1];
		}
		
		$table = '<div class="table-responsive"><table class="table table-bordered table-striped" style="width:100%">';
		$table.='<thead>';
		$table.='<tr style="background-color:#ddd;">';
		$table.='<th colspan="5">Asset</th>';
		$table.='</tr>';
		$table.='<tr>';
		
		foreach($head as $hd){
			$table.='<th>'.$hd.'</th>';
		}
		$table.='</tr>';
		$table.='</thead>';
		$table.='<tbody>'; 
		$groups = array();
		
			$key = "";
			
			
				foreach ($row as $value) {
					$key = $value['xacc'];
					if (!array_key_exists($key, $groups)) {
						if($key=="Stock"){
							$groups[$key] = array(
							    'xaccdesc' => $value['xaccdesc'],
								'opamt' => $value['opamt'],
								'xcuramt' => $value['xcuramt'],							
								'amtcl'=> $value['xcuramt'],							
							);
						}else{
							$groups[$key] = array(
							    'xaccdesc' => $value['xaccdesc'],
								'opamt' => $value['opamt'],
								'xcuramt' => $value['xcuramt'],							
								'amtcl'=> $value['opamt']+$value['xcuramt'],							
							);
						}
					} else {
						$groups[$key]['opamt'] = $groups[$key]['opamt'] + $value['opamt'];
						$groups[$key]['xcuramt'] = $groups[$key]['xcuramt'] + $value['xcuramt'];
						$groups[$key]['amtcl'] = $groups[$key]['opamt'] + $groups[$key]['xcuramt'];		
					}
					
				}
		
		$opamttot=0;		
		$xcuramttot=0;
		$amtcltot=0;
		
		
		foreach($groups as $key=>$value){
			$table.='<tr>';
			$table.='<td>'.$key.'</td>';
			foreach($value as $k=>$str){				
				if($k=="opamt" || $k=="xcuramt" || $k=="amtcl"){
					if($str<0)
						$table.='<td>('.abs($str).')</td>';
					else
						$table.='<td>'.$str.'</td>';
					switch ($k){
						case "opamt":
							$opamttot+=$str;
							break;
						case "xcuramt":
							$xcuramttot+=$str;
							break;
						case "amtcl":
							$amtcltot+=$str;
							break;	
						}
				}				
				else{
					$table.='<td>'.$str.'</td>';
				}
				
				
			}
			
			
			$table.='</tr>';
		}
		$table.='<tr>';
			$table.='<td></td><td><strong>Total Asset</strong></td><td><strong>'.abs($opamttot).'</strong></td><td><strong>'.abs($xcuramttot).'</strong></td><td><strong>'.abs($amtcltot).'</strong></td>';
		$table.='</tr>';
		$table.='<tr style="background-color:#ddd;">';
		$table.='<td colspan="5"><strong>Liability</strong></td>';
		$table.='</tr>';
		
		$groupexp = array();
			$keyexp = "";
			
				foreach ($rowexp as $value) {
					$key = $value['xacc'];
					if (!array_key_exists($key, $groupexp)) {
						$groupexp[$key] = array(
						    'xaccdesc' => $value['xaccdesc'],
							'opamt' => $value['opamt'],
							'xcuramt' => $value['xcuramt'],							
							'amtcl'=> $value['opamt']+$value['xcuramt'],							
						);
					} else {
						$groupexp[$key]['opamt'] = $groupexp[$key]['opamt'] + $value['opamt'];
						$groupexp[$key]['xcuramt'] = $groupexp[$key]['xcuramt'] + $value['xcuramt'];
						$groupexp[$key]['amtcl'] = $groupexp[$key]['opamt'] + $groupexp[$key]['xcuramt'];		
					}
					
				}
		
		$expopamttot=0;		
		$expxcuramttot=0;
		$expamtcltot=0;
		
		
		foreach($groupexp as $key=>$value){
			$table.='<tr>';
			$table.='<td>'.$key.'</td>';
			foreach($value as $k=>$str){				
				if($k=="opamt" || $k=="xcuramt" || $k=="amtcl"){
					if($str>0)
						$table.='<td>('.$str.')</td>';
					else
						$table.='<td>'.abs($str).'</td>';
										
					switch ($k){
						case "opamt":
							$expopamttot+=$str;
							break;
						case "xcuramt":
							$expxcuramttot+=$str;
							break;
						case "amtcl":
							$expamtcltot+=$str;
							break;	
						}
				}				
				else{
					$table.='<td>'.$str.'</td>';
				}
				
				
			}
			
			
			$table.='</tr>';
		}
		
		$profitcls = $profitbf+$profitcr;
		
		$opcolor = "green";
		$curcolor = "green";
		$clcolor = "green";
		
		if($profitbf<=0){
			$opcolor = "green";
			
			$profitbf = abs($profitbf);
			 $expopamttot = $expopamttot-$profitbf;
		}
		else{
			$opcolor = "red";
			$expopamttot = $expopamttot+$profitbf;
			$profitbf = "(".$profitbf.")";
			
		}
		if($profitcr<=0){
			$curcolor = "green";			
			$profitcr = abs($profitcr);
			$expxcuramttot = $expxcuramttot-$profitcr;
			
		}
		else{
			$curcolor = "red";
			$expxcuramttot = $expxcuramttot+$profitcr;
			$profitcr = "(".$profitcr.")";
		}
		if($profitcls<=0){
			$clcolor = "green";
			
			$profitcls = abs($profitcls);
			$expamtcltot=$expamtcltot-$profitcls;
		}
		else{
			$clcolor = "red";
			$expamtcltot=$expamtcltot+$profitcls;
			$profitcls = "(".$profitcls.")";
		}
		
		
		
		$table.='<tr>';
			$table.='<td></td><td><strong>Profit & Loss</strong></td><td style="color:'.$opcolor.'"><strong>'.$profitbf.'</strong></td><td style="color:'.$curcolor.'"><strong>'.$profitcr.'</strong></td><td style="color:'.$clcolor.'"><strong>'.$profitcls.'</strong></td>';
		$table.='</tr>';
		$table.='<tr>';
			$table.='<td></td><td><strong>Total Liability</strong></td><td><strong>'.abs($expopamttot).'</strong></td><td><strong>'.abs($expxcuramttot).'</strong></td><td><strong>'.abs($expamtcltot).'</strong></td>';
		$table.='</tr>';
		$table.='</tbody>';
		$table.='</table></div>';
			
		return $table;
	}
		
	
	}