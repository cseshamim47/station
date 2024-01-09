<?php
class Glrpt extends Controller{
	
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
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/glrpt/js/getaccdt.js');
								
		}
		
		public function index(){
					
			
			$this->view->rendermainmenu('glrpt/index');
			
		}
		
		
		
		function glrptmenu(){
			
			$menuarr = array(
			"Ledger" => array("Account Ledger"=>URL."glrpt/ledger","Subsidiary Ledger"=>URL."glrpt/subledger","Customer Ledger"=>URL."glrpt/customerledger","Supplier Ledger"=>URL."glrpt/supplierledger"),
			"Receivable & Payable" => array("Account Receivable"=>URL."glrpt/incexpledger/Acounts Receivable","Accounts Payable"=>URL."glrpt/incexpledger/Accounts Payable","Customer Balance"=>URL."glrptstatement/shocusbal","Supplier Balance"=>URL."glrptstatement/shosupbal"),
			"Statements" => array("Trial Balance"=>URL."glrptstatement/trialbal","Income Statement"=>URL."glrptstatement/plstatementbydate","Balance Sheet"=>URL."glrptstatement/balancesheet"),		
			"Books" => array("Receipt Payment"=>URL."glrptstatement/rcptnpayment","Cash Book"=>URL."glrpt/cashbook","Bank Book"=>URL."glrpt/bankbook","Day Book"=>URL."glrpt/daybook"),
			"Income & Expenditure" => array("Expenditure"=>URL."glrpt/incexpledger/Expenditure","Income"=>URL."glrpt/incexpledger/Income"),
			);
			$menutable='<table class="table" style="width:100%"><tbody>';
			foreach($menuarr as $key=>$value){
			    $menutable.='<tr><td><h4>'.$key.'</h4></td></tr>';
				$menutable.='<tr>';
					foreach($value as $k=>$val){
						$menutable.='<td><a style="width:100%" class="btn btn-primary" href="'.$val.'" role="button"><span class="glyphicon glyphicon-open-file"></span>&nbsp;'.$k.'</a></td>';
					}
				$menutable.='</tr>';
				
			}
			$menutable.='</tbody></table>';
			$this->view->table = $menutable;
			$this->view->renderpage('glrpt/glrptmenu', false);
		}
		function daybook(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li class="active">Day Book</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."glrpt/dayBook",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xacc"=>"",
				"xaccdesc"=>"",	
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xacc-group_".URL."glchart/glchartpicklist"=>'Account_maxlength="20"',
								"xaccdesc-text"=>'Acc Desc_readonly'
								),
								array(
								
								),
								array(
								
								)
							);
			
				$dynamicForm = new Dynamicform("Day Book Report Filter",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnForm($fields, URL."glrpt/showDayBook", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('glrpt/glrptfilter', false);
		
		}
		public function showDayBook(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li><a href="'.URL.'glrpt/daybook">Day Book</a></li>
							<li class="active">Day Book Report</li>
						   </ul>';
		
			$acc = $_POST['xacc'];
			
			$accdesc = $_POST['xaccdesc'];
			
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
				
			$tblvalues=array();
			$btn = array(
				"Clear" => URL."glrpt/daybook",
			);	
			
				$tblvalues = $this->model->dayBook($fdate, $tdate, $acc);
				
				$fields = array(
						"xdate-Date",
						"xvoucher-Voucher",
						"xacc-Account",
						"xaccsub-SubAccount",
						"xnarration-Narration",
						"xprimedr-Dr. Amount",
						"xprimecr-Cr. Amount"
						);
			$table = new Accrpttable();
			
			$opbal = 0;
			$opbal = $this->model->getopbal($acc, $fdate)[0]['xprime'];
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Day Book Report";
			$this->view->org=Session::get('sbizlong');
			
			$this->view->table = $table->generalTable($fields, $tblvalues, "xvoucher", $opbal, $acc, $accdesc);
				
			$this->view->renderpage('glrpt/reportpage');
		}

		function cashbook(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li class="active">Cash Book</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."glrpt/cashbook",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,				
				"xsite"=>""	
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xsite-select_Project"=>'Project_""'																
								),
								array(								
								
								)
								,
								array(								
								
								)
								,
								array(								
								
								)
							);
				
				$dynamicForm = new Dynamicform("Cash Book Report Filter",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnForm($fields, URL."glrpt/showcashbook", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('glrpt/glrptfilter', false);
		
		}

		public function showcashbook(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li><a href="'.URL.'glrpt/cashbook">Cash Book</a></li>
							<li class="active">Cash Book</li>
						   </ul>';
		
			$acc = "";
			$project = "";
			
			$xfdate = $_POST['xfdate'];
			
			if(isset($_POST['xsite']))
				$project = $_POST['xsite'];
			
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
				
			$tblvalues=array();
			$btn = array(
				"Clear" => URL."glrpt/cashbook",
			);
			
			
				$tblvalues = $this->model->getcashbankbook($fdate, $tdate,"Cash", $project);
				//print_r($tblvalues); die;
				$fields = array(
						"xdate-Date",
						"xbranch-Branch",
						"xvoucher-Voucher",
						"xnarration-Narration",
						"xprimedr-Dr. Amount",
						"xprimecr-Cr. Amount"
						);
			$table = new Accrpttable();
			$acc=""; 
			$opbal = 0;
			$opbal = $this->model->getopbalcashbank("Cash", $fdate, $project);
			$acc=""; $accdesc="";$acctype="";
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Cash Book";
			if($project!="")
				$this->view->vrptname = "Account Ledger Report<br />Project :".$project;
			$this->view->org=Session::get('sbizlong');
			
			$this->view->table = $table->cashbankbook( $tblvalues, $opbal, "xacc");

							
			$this->view->renderpage('glrpt/reportpage');
		}
		function bankbook(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li class="active">Bank Book</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."glrpt/bankbook",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,				
				"xsite"=>""	
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xsite-select_Project"=>'Project_""'																
								),
								array(								
								
								)
								,
								array(								
								
								)
								,
								array(								
								
								)
							);
				
				$dynamicForm = new Dynamicform("Bank Book Report Filter",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnForm($fields, URL."glrpt/showbankbook", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('glrpt/glrptfilter', false);
		
		}

		public function showbankbook(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li><a href="'.URL.'glrpt/bankbook">Bank Book</a></li>
							<li class="active">Bank Book</li>
						   </ul>';
		
			$acc = "";
			$project = "";
			
			$xfdate = $_POST['xfdate'];
			
			if(isset($_POST['xsite']))
				$project = $_POST['xsite'];
			
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
				
			$tblvalues=array();
			$btn = array(
				"Clear" => URL."glrpt/bankbook",
			);
			
			
				$tblvalues = $this->model->getcashbankbook($fdate, $tdate,"Bank", $project);
				//print_r($tblvalues); die;
				$fields = array(
						"xdate-Date",
						"xbranch-Branch",
						"xvoucher-Voucher",
						"xnarration-Narration",
						"xprimedr-Dr. Amount",
						"xprimecr-Cr. Amount"
						);
			$table = new Accrpttable();
			$acc=""; 
			$opbal = 0;
			$opbal = $this->model->getopbalcashbank("Bank", $fdate, $project);
			$acc=""; $accdesc="";$acctype="";
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Bank Book";
			if($project!="")
				$this->view->vrptname = "Account Ledger Report<br />Project :".$project;
			$this->view->org=Session::get('sbizlong');
			
			$this->view->table = $table->cashbankbook( $tblvalues, $opbal, "xacc");
				
			$this->view->renderpage('glrpt/reportpage');
		}

		function ledger(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li class="active">Account Ledger</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."glrpt/ledger",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xacc"=>"",
				"xaccdesc"=>"",
				"xsite"=>""	
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xacc-group_".URL."glchart/glchartpicklist"=>'Account_maxlength="20"',
								"xaccdesc-text"=>'Acc Desc_readonly',								
								),
								array(								
								"xsite-select_Project"=>'Project_""'
								)
							);
				
				$dynamicForm = new Dynamicform("Account Ledger Report Filter",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnForm($fields, URL."glrpt/showledger", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('glrpt/glrptfilter', false);
		
		}
		
		function glpayvoucher($voucher){
			
			//$amtinwords = new AmountInWords();
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glpayvou/glpayvouentry">Payment Voucher</a></li>
							<li class="active">Payment Voucher</li>
						   </ul>';
		
			$vou = $voucher;
			
			$values = $this->model->getvoucher($vou);
			//print_r($values);die;
			$paymethod="";
			$xdate="";
			$xcheque="";
			
			$payto="";
			$xprime="";
			$xnarration="";
			
			foreach($values as $key=>$val){
				if($val['xflag']=="Credit"){
					$paymethod=$val['xaccusage'];
					$xdate=$val['xdate'];
					//$xcheque=$val['xcheque'];
				}
				if($val['xflag']=="Debit"){
					$payto=$val['xaccsubdesc'];
					$xprime=$val['xprime'];
					$xnarration=$val['xnarration'];
				}
			}
			
			$this->view->voucher=$vou;
			$this->view->paymethod=$paymethod;
			$this->view->xdate=$xdate;
			$this->view->xcheque=$xcheque;
			
			$this->view->payto=$payto;
			$this->view->xprime=$xprime;
			$this->view->xnarration=$xnarration;
			//$inword=new toWords($xprime);
			$cur = new Currency();
			$this->view->inword="In Words: ". $cur->get_bd_amount_in_text($xprime);
			
			
			$this->view->vrptname = "Payment Voucher";
			$this->view->org=Session::get('sbizlong');
			
			$this->view->renderpage('glrpt/payvoucherpage');		
		}
		function glrcptvoucher($voucher){
			
			
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrcptvou/glrcptvouentry">Receipt Voucher</a></li>
							<li class="active">Receipt Voucher</li>
						   </ul>';
		
			$vou = $voucher;
			
			$values = $this->model->getvoucher($vou);
			//print_r($values);die;
			$paymethod="";
			$xdate="";
			$xcheque="";
			
			$payto="";
			$xprime="";
			$xnarration="";
			
			foreach($values as $key=>$val){
				if($val['xflag']=="Debit"){
					$paymethod=$val['xaccusage'];
					$xdate=$val['xdate'];
					//$xcheque=$val['xcheque'];
				}
				if($val['xflag']=="Credit"){
					$payto=$val['xaccsubdesc'];
					$xprime=$val['xprime'];
					$xnarration=$val['xnarration'];
				}
			}
			
			$this->view->voucher=$vou;
			$this->view->paymethod=$paymethod;
			$this->view->xdate=$xdate;
			$this->view->xcheque=$xcheque;
			
			$this->view->payto=$payto;
			$this->view->xprime=$xprime;
			$this->view->xnarration=$xnarration;
			//$amtinwords = new AmountInWords();
			//$inword=new toWords($xprime);
			$cur = new Currency();
			$this->view->inword="In Words: ". $cur->get_bd_amount_in_text(abs($xprime));
			
			
			$this->view->vrptname = "Receipt Voucher";
			$this->view->org=Session::get('sbizlong');
			
			$this->view->renderpage('glrpt/rcptvoucherpage');		
		}
		
		function glvoucher($type,$voucher){
			
			
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'gljvvou/gljvvouentry">'.$type.' Voucher</a></li>
							<li class="active">'.$type.' Voucher</li>
						   </ul>';
		
			$vou = $voucher;
			
			$values = $this->model->getjournal($voucher);
			//print_r($values);die;
			
			
			$this->view->voucher=$vou;
			$totdr = 0;
			$totcr = 0;
			$xdate="";
			$narration="";
			$project = "";
			foreach($values as $key=>$val){
				$xdate=$val['xdate'];
				$narration=$val['xnarration'];
				$totdr+=$val['xprimedr'];
				$totcr+=$val['xprimecr'];
				$project = $val['xsite'];
			}
			$this->view->vproject=$project;
			if($project!="")
				$this->view->vproject="Project :".$project;
			
			$this->view->xdate=$xdate;
			$this->view->narration=$narration;			
			$this->view->totprimedr=$totdr;
			$this->view->totprimecr=$totcr;
			//$inword=new toWords($totdr);
			$cur = new Currency();
			$this->view->inword="In Words: ". $cur->get_bd_amount_in_text($totdr);
			$this->view->vrow = $values;
			
			$this->view->vrptname = $type." Voucher";
			$this->view->org=Session::get('sbizlong');
			
			$this->view->renderpage('glrpt/voucherpage');		
		}
		
		function subledger(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li class="active">Sub Account Ledger</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."glrpt/subledger",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xacc"=>"",
				"xaccdesc"=>"",
				"xaccsub"=>"",
				"xaccsubdesc"=>"",
				"xsite"=>""	
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xacc-group_".URL."glchart/glchartpicklist"=>'Account_maxlength="20"',
								"xaccdesc-text"=>'Acc Desc_readonly'
								),
							array(
								"xaccsub-group_".URL."glchart/glchartpicklist"=>'Sub Account_maxlength="20"',
								"xaccsubdesc-text"=>'Sub Description_readonly',
								"xsite-select_Project"=>'Project_""'
								)
							);
			
				$dynamicForm = new Dynamicform("Subsidiary Account Ledger Report Filter",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnForm($fields, URL."glrpt/showsubledger", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('glrpt/glrptfilter', false);
		}
		
		function customerledger(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li class="active">Customer Ledger</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."glrpt/customerledger",
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
								"xcus-group_".URL."jsondata/customerpicklist"=>'Customer Code_maxlength="20"',
								"xorg-text"=>'Cusotomer_maxlength="100"'
								)
							);
			
				$dynamicForm = new Dynamicform("Customer Ledger Report Filter",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."glrpt/showcusledger", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('glrpt/glrptfilter', false);
		
		}
		
		function supplierledger(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li class="active">Supplier Ledger</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."glrpt/supplierledger",
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
								"xsup-group_".URL."suppliers/picklist"=>'Supplier Code_maxlength="20"',
								"xorg-text"=>'Supplier_maxlength="100"'
								)
							);
			
				$dynamicForm = new Dynamicform("Supplier Ledger Report Filter",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."glrpt/showsupledger", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('glrpt/glrptfilter', false);
		
		}
		
		function incexpledger($type){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li class="active">'.$type.' Ledger</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."glrpt/incexpledger/".$type,
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
				
				$dynamicForm = new Dynamicform($type." Report Filter",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."glrpt/getexpinc/".$type, "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('glrpt/glrptfilter', false);
		
		}
		
		public function showledger(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li><a href="'.URL.'glrpt/ledger">Account Ledger</a></li>
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
				
			$tblvalues=array();
			$btn = array(
				"Clear" => URL."glrpt/ledger",
			);
			$acctype = "";	
			if(!empty($this->model->getAccType($acc)))
				$acctype=$this->model->getAccType($acc)[0]['xacctype'];
			
			
				$tblvalues = $this->model->getledger($fdate, $tdate, $acc, $project);
				
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
				$this->view->vrptname = "Account Ledger Report<br />Project :".$project;
			$this->view->org=Session::get('sbizlong');
			
			$this->view->table = $table->ledgerTable($fields, $tblvalues, "xvoucher", $opbal, $acc, $accdesc,$acctype);
				
			$this->view->renderpage('glrpt/reportpage');
		}
		public function showsubledger(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li><a href="'.URL.'glrpt/subledger">Sub Account Ledger</a></li>
							<li class="active">Subsidiary Ledger Report</li>
						   </ul>';
		
			$acc = "";
			
			$accdesc = "";
			
			$accsub = "";
			
			$accsubdesc = "";
			
			$project = "";
			
			if(isset($_POST['xacc']))
				$acc = $_POST['xacc'];
			if(isset($_POST['xaccdesc']))
				$accdesc = $_POST['xaccdesc'];
			if(isset($_POST['xaccsub']))
				$accsub = $_POST['xaccsub'];
			if(isset($_POST['xaccsubdesc']))
				$accsubdesc = $_POST['xaccsubdesc'];
			
			if(isset($_POST['xsite']))
				$project = $_POST['xsite'];
			
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
				
			$tblvalues=array();
			$btn = array(
				"Clear" => URL."glrpt/subledger",
			);	
			
			$acctype = "";	
			if(!empty($this->model->getAccType($acc)))
				$acctype=$this->model->getAccType($acc)[0]['xacctype'];
			
				$tblvalues = $this->model->getsubledger($fdate, $tdate, $acc, $accsub, $project);
				
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
			$opbal = $this->model->getsubopbal($acc,$accsub, $fdate, $project)[0]['xprime'];
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			
			$this->view->vrptname = "Subsiadiary Account Ledger Report";
			if($project!="")
				$this->view->vrptname = "Subsiadiary Account Ledger Report<br/>Project :".$project;
			$this->view->org=Session::get('sbizlong');
			
			$this->view->table = $table->ledgerTable($fields, $tblvalues, "xvoucher", $opbal, $accsub, $accsubdesc,$acctype);
				
			$this->view->renderpage('glrpt/reportpage');
		}
		
		public function showcusledger(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li><a href="'.URL.'glrpt/customerledger">Customer Ledger</a></li>
							<li class="active">Customer Ledger Report</li>
						   </ul>';
		
			$cus = $_POST['xcus'];
			
			$org = $_POST['xorg'];
			
			
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
				
			$tblvalues=array();
			$btn = array(
				"Clear" => URL."glrpt/customerledger",
			);	
			
				$tblvalues = $this->model->getcussupledger($fdate, $tdate, $cus, "Customer");
				
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
			$opbal = $this->model->getcusopbal($cus,$fdate)[0]['xprime'];
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Customer Ledger Report";
			$this->view->org=Session::get('sbizlong');
			
			$this->view->table = $table->ledgerTable($fields, $tblvalues, "xvoucher", $opbal, $cus, $org,"Customer");
				
			$this->view->renderpage('glrpt/reportpage');
		}
		
		public function showsupledger(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li><a href="'.URL.'glrpt/supplierledger">Supplier Ledger</a></li>
							<li class="active">Supplier Ledger Report</li>
						   </ul>';
		
			$sup = $_POST['xsup'];
			
			$org = $_POST['xorg'];
			
			
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
				
			$tblvalues=array();
			$btn = array(
				"Clear" => URL."glrpt/supplierledger",
			);	
			
				$tblvalues = $this->model->getcussupledger($fdate, $tdate, $sup, "Supplier");
				
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
			$opbal = $this->model->getsupopbal($sup,$fdate)[0]['xprime'];
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Supplier Ledger Report";
			$this->view->org=Session::get('sbizlong');
			
			$this->view->table = $table->ledgerTable($fields, $tblvalues, "xvoucher", $opbal, $sup, $org,"Supplier");
				
			$this->view->renderpage('glrpt/reportpage');
		}


		function getexpinc($type){
			
			$claus = "";
			if($type=="Accounts Payable")
				$claus="xaccusage='AP'";
			if($type=="Acounts Receivable")
				$claus="xaccusage='AR'";
			if($type=="Expenditure")
				$claus="xacctype='Expenditure'";	
			if($type=="Income")
				$claus="xacctype='Income'";	
			
			$project = ""; 

			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'glrpt/glrptmenu">GL Reports</a></li>
							<li><a href="'.URL.'glrpt/incexpledger/'.$type.'">'.$type.' Ledger</a></li>
							<li class="active">'.$type.' Report</li>
						   </ul>';
			
			if(isset($_POST['xsite']))
				$project = $_POST['xsite'];
			
			if($project!="")
				$project = " and xsite='".$_POST['xsite']."'";
			
			
			$acc = "";
			$project = "";
			
			$xfdate = $_POST['xfdate'];
			
			if(isset($_POST['xsite']))
				$project = $_POST['xsite'];
			
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
				
			$tblvalues=array();
			$btn = array(
				"Clear" => URL."glrpt/incexpledger/".$type,
			);
			
			
				$tblvalues = $this->model->getArApExpInc($fdate, $tdate,$claus, $project);
				//print_r($tblvalues); die;
				$fields = array(
						"xdate-Date",
						"xbranch-Branch",
						"xvoucher-Voucher",
						"xnarration-Narration",
						"xlong-Description",
						"xprimedr-Dr. Amount",
						"xprimecr-Cr. Amount"
						);
			$table = new Accrpttable();
			$acc=""; 
			$opbal = 0;
			$opbal = $this->model->getOpArApExpInc($claus, $fdate, $project);
			$acc=""; $accdesc="";$acctype="";
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = $type;
			if($project!="")
				$this->view->vrptname = "Account Ledger Report<br />Project :".$project;
			$this->view->org=Session::get('sbizlong');
			
			$this->view->table = $table->apacincexp( $tblvalues, $opbal, "xacc", $type);
				
			$this->view->renderpage('glrpt/reportpage');
		}
		
		
		
		
		
		
		function myTabledt($fields, $row){
		
		$field = array();
		$head = array();
		foreach($fields as $str){
			$st=explode('-',$str);
			
			$head[] = $st[1];
		}
		
		$table = '<div class="table-responsive"><table class="table table-bordered table-striped" style="width:100%">';
		$table.='<thead>';
		$table.='<tr>';
		foreach($head as $hd){
			$table.='<th>'.$hd.'</th>';
		}
				
		$com = 0;
		$tax = 0;
		$tot = 0;
		
		
		$table.='</tr>';
		$table.='</thead>';
		$table.='<tbody>'; 
		foreach($row as $key=>$value){
			$table.='<tr>';
			foreach($value as $k=>$str){
				if($k == "xcom")
					$com+=$str;
				if($k == "xtax")
					$tax+=$str;
				if($k == "xtotal")
					$tot+=$str;
				
				$table.='<td>'.htmlentities($str).'</td>';
			}
			
			
			$table.='</tr>';
		}
		$table.='</tbody>';
		$table.='<tfoot>';
		$table.='<tr>';
		$table.='<td><strong>Total</strong></td><td></td><td></td><td><strong></strong></td><td><strong>'.$com.'</strong></td><td><strong>'.$tax.'</strong><td><strong>'.$tot.'</strong></td>';
		$table.='</tr>';
		$table.='</tfoot>';
		$table.='</table></div>';
		return $table;
	}		

	//Creadit/Debit Voucher---------------
	
	function isovoucher($type,$voucher){
		
		
		$this->view->breadcrumb = '<ul class="breadcrumb">
						<li><a href="'.URL.'gljvvou/gljvvouentry">'.$type.' Voucher</a></li>
						<li class="active">'.$type.' Voucher</li>
					   </ul>';
	
		$vou = $voucher;
		
		$values = $this->model->getjournal($voucher);
		//print_r($values);die;
		$doccode = "";
		$doctitle = "";
		if($type=="Payment"){	
			$doccode = "Document Code: Acc/03/006";
			$doctitle = "TITLE: Debit Voucher";
		}else if($type=="Receipt"){	
			$doccode = "Document Code: Acc/03/007";
			$doctitle = "TITLE: Credit Voucher";
		}
		$this->view->doccode = $doccode;
		$this->view->doctitle = $doctitle;
		
		$this->view->voucher=$vou;
		$totdr = 0;
		$totcr = 0;
		$xdate="";
		$narration="";
		$project = "";
		foreach($values as $key=>$val){
			$xdate=$val['xdate'];
			$narration=$val['xnarration'];
			$totdr+=$val['xprimedr'];
			$totcr+=$val['xprimecr'];
			$project = $val['xsite'];
		}
		$this->view->vproject=$project;
		if($project!="")
			$this->view->vproject="Project :".$project;
		
		$this->view->xdate=$xdate;
		$this->view->narration=$narration;			
		$this->view->totprimedr=$totdr;
		$this->view->totprimecr=$totcr;
		//$inword=new toWords($totdr);
		$cur = new Currency();
		$this->view->inword="In Words: ". $cur->get_bd_amount_in_text($totdr);
		$this->view->vrow = $values;
		
		$this->view->vrptname = $type." Voucher";
		$this->view->tabletitle = "";
		$this->view->org=Session::get('sbizlong');
		
		$this->view->renderpage('glrpt/isovoucherpage');		
	}

}