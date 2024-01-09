<?php
class Glopening extends Controller{
	
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
				if($menus["xsubmenu"]=="Opening Balance")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/glopening/js/getaccdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"xvoucher"=>"",			
			"xacc"=>"",
			"xaccdesc"=>"",
			"xacctype"=>"",
			"xaccusage"=>"Ledger",
			"xaccsource"=>"",
			"xacccr"=>"2035",
			"xacccrdesc"=>"Profit And Loss Appropriation Account",
			"xacccrtype"=>"Liability",
			"xacccrusage"=>"Ledger",
			"xacccrsource"=>"None",
			"xaccsub"=>"",
			"xaccsubdesc"=>"",
			"xcus"=>"",
			"xorg"=>"",
			"xsup"=>"",
			"xsuporg"=>"",
			"xcur"=>"BDT",
			"xprime"=>"0",
			"xsite"=>""
			);
			
			$this->fields = array(array(
							"xvoucher-group_".URL."glopening/glopeningpicklist"=>'Voucher No_maxlength="20"',
							"xdate-datepicker" => 'Date_""',
							"xsite-select_Project"=>'Project_maxlength="20"',
							),
						array(
							"xacccr-text"=>'Account_maxlength="20" readonly',
							"xacccrdesc-text"=>'Account Desc_readonly',
							"xacccrtype-hidden"=>'',
							"xacccrusage-hidden"=>'',
							"xacccrsource-hidden"=>''
							),
						array(
							"xacc-group_".URL."jsondata/glchartpicklist"=>'Opening  Account_maxlength="20"',
							"xaccdesc-text"=>'Account Desc_readonly',
							"xacctype-hidden"=>'',
							"xaccusage-hidden"=>'',
							"xaccsource-hidden"=>''
							),
						array(
							"xaccsub-group_".URL."jsondata/glchartpicklist"=>'Sub Account*~star_maxlength="20"',
							"xaccsubdesc-text"=>'Sub Description*~star_readonly'
							),
						array(
							"xcus-group_".URL."jsondata/customerpicklist"=>'Customer Code*~star_maxlength="20"',
							"xorg-text"=>'Customer Name*~star_maxlength="100" readonly'
							),
						array(
							"xsup-group_".URL."jsondata/supplierpicklist"=>'Supplier Code*~star_maxlength="20"',
							"xsuporg-text"=>'Name*~star_maxlength="100" readonly'
							),
						array(
							"xprime-text_number"=>'Balance_number="true" minlength="1" maxlength="18" required',
							"xcur-select_Currency"=>'Currency'
							)
						);
						
								
		}
		
		public function index(){
		
		
		
			$this->view->rendermainmenu('glopening/index');
			
		}
		
		public function saveglopening(){
				
				$prefix = "OB--".Session::get('suserrow');
				$yearoffset = Session::get('syearoffset');
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
				$xyear = 0;
				$per = 0;
				//print_r($this->model->getYearPer($yearoffset,intval($month))); die;
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$per = $key;
					$xyear = $val;
				}
				$xvoucher = $_POST['xvoucher'];
				$keyfieldval="0";
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				$fsubacc="None";	
				if($_POST['xaccsource']=="Sub Account")
					$fsubacc = 	$_POST['xaccsub'];
				if($_POST['xaccsource']=="Customer")
					$fsubacc = 	$_POST['xcus'];
				if($_POST['xaccsource']=="Supplier")
					$fsubacc = 	$_POST['xsup'];	
				try{
					if($_POST['xaccsource']=="Sub Account") {
						$sccsub = $this->model->getSubacc($_POST['xaccsub']);
						if(count($sccsub)==0)
							throw new Exception("Invalid Subaccount code!");
					}
					if($_POST['xaccsource']=="Customer") {
						$cus = $this->model->getCustomer($_POST['xcus']);
						if(count($cus)==0)
							throw new Exception("Invalid Customer code!");
					}					
					if($_POST['xaccsource']=="Supplier"){
						$sup = $this->model->getSupplier($_POST['xsup']);
						if(count($sup)==0)
							throw new Exception("Invalid Supplier code!");
					}
				
				$form	->post('xacccr')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xacccrtype')
						
						->post('xacccrusage')
						
						->post('xacccrsource')
				
				
				
						->post('xacc')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xvoucher')						
				
						->post('xsite')
						
						->post('xacctype')
						
						->post('xaccusage')
						
						->post('xaccsource')
						
												
						->post('xsuporg')
				
						->post('xprime')
						->val('minlength', 1)
						->val('maxlength', 18)
						->val('checkdouble')
						
						
						->post('xcur')
						->val('maxlength', 20);
						
						
				$form	->submit();
				
				$data = $form->fetch();
				
				$balinterim = "-";
				$typeinterim = "";
				$bal = "";
				$type = "";
				
				if($data['xprime']>0){
					$type = "Debit";	
					$typeinterim = "Credit";
					$bal =	$data['xprime'];
					$balinterim .= $data['xprime'];
				}else if($data['xprime']<0){
					$type = "Credit";	
					$typeinterim = "Debit";
					$bal =	$data['xprime'];
					$balinterim = abs($data['xprime']);
				}else{
					throw new Exception("Balance Cannot be 0!");
				}
				
				
			if($data['xacc']=='9000')
				$data['xnarration'] = "Opening Balance for : ".$_POST['xaccsub']."-".$_POST['xaccsubdesc'];
			else
				$data['xnarration'] = "Opening Balance for : ".$data['xacc']."-".$_POST['xaccdesc'];
				
				
				if($data['xcur']=="")
					$data['xcur']="BDT";
				
				
				
				
				
				$keyfieldval = $this->model->getKeyValue("glheader","xvoucher",$prefix,"6");
				
				
				
					
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['xyear'] = $xyear;
				$data['xper'] = $per;
				$data['xvoucher'] = $keyfieldval;
				$data['xdate'] = $date;
				$data['xbranch'] = Session::get('sbranch');
				$data['xdoctype'] = "Opening Balance";				
				$data['xdocnum'] = $keyfieldval;
				$data['xstatusjv'] = 'Confirmed';
				
				
				
				$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,
				`xexch`,`xprime`,xflag";
				
				$vals = "(" . Session::get('sbizid') . ",'". $keyfieldval ."','1','". $data['xacc'] ."',
				'". $data['xacctype'] ."','". $data['xaccusage'] ."','".$data['xaccsource']."','". $fsubacc ."','". $data['xcur'] ."',
				'". $bal ."','1','". $bal ."','".$type."'),
				(" . Session::get('sbizid') . ",'". $keyfieldval ."','2','". $data['xacccr'] ."',
				'". $data['xacccrtype'] ."','". $data['xacccrusage'] ."','". $data['xacccrsource'] ."','','". $data['xcur'] ."',
				'". $balinterim ."','1','". $balinterim ."','".$typeinterim."')";
				
				//echo "insert into ".$cols." ".$vals;die;
				//print_r($vals);die;				
				$success = $this->model->create($data, $cols, $vals);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					$this->result = 'Voucher Created</br><a style="color:red" id="invnum" href="'.URL.'glrpt/glvoucher/Journal/'.$keyfieldval.'">Click To Print Voucher - '.$keyfieldval.'</a>';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Voucher! Reason: Could be Duplicate Transaction or system error!";
				
				 $this->showentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		
		public function showentry($voucher, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."glopening/glopeningentry"
		);
		
		$tblvalues = $this->model->getVoucherHeader($voucher);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xvoucher"=>$tblvalues[0]['xvoucher'],
					"xnarration"=>$tblvalues[0]['xnarration'],
					"xsite"=>$tblvalues[0]['xsite'],
					"xacccr"=>"9040",
					"xacccrdesc"=>"Profit And Loss Appropriation Account",
					"xacccrtype"=>"Liability",
					"xacccrusage"=>"Ledger",
					"xacccrsource"=>"None",
					"xacc"=>"",
					"xaccdesc"=>"",
					"xacctype"=>"",
					"xaccusage"=>"",
					"xaccsource"=>"",
					"xrow"=>"0",
					"xaccsub"=>"",
					"xaccsubdesc"=>"",
					"xcus"=>"",
					"xorg"=>"",
					"xsup"=>"",
					"xsuporg"=>"",
					"xcur"=>"BDT",
					"xprime"=>"0",
					"xprimecr"=>"0"
					);
			
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Opening Balance", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createFormVoucher($this->fields, URL."glopening/saveglopening", "Save",$tblvalues ,URL."glopening/showpost");
			
			$this->view->table = $this->renderTable($voucher);
			
			$this->view->renderpage('glopening/glopeningentry');
		}
		
		function renderTable($voucher){
			$fields = array(
						"xrow-Sl",
						"xacc-Account",
						"xaccdesc-Account Description",
						"xaccsub-Sub Account",
						"xaccsubdesc-Sub Account Description",
						"xprimedr-Dr. Amount",
						"xprimecr-Cr. Amount"
						);
			$table = new Datatable();
			$row = $this->model->getvoucherdt($voucher);
			
			return $table->myTable($fields, $row, "xrow");
			
			
		}
		
		function glopeningpicklist(){
			$this->view->table = $this->glopeningPickTable();
			
			$this->view->renderpage('glchart/glchartpicklist', false);
		}
		
		function glopeningPickTable(){
			$fields = array("xdate-Date","xvoucher-Voucher No","xnarration-Narration","xdoctype-Document Type","xdocno-Document No");
			$table = new Datatable();
			$row = $this->model->getVoucherList();
			
			return $table->picklistTable($fields, $row, "xvoucher");
		}
		
		function voucherlist(){
			$rows = $this->model->getVoucherList();
			$cols = array("xdate-Date","xvoucher-Voucher No","xnarration-Narration","xdoctype-Document Type","xdocno-Document No");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xvoucher");
			$this->view->renderpage('gljvvou/gljvvoulist', false);
		}
		
		
		function glopeningentry(){
				
		$btn = array(
			"Clear" => URL."glopening/glopeningentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Opening Balance",$btn);		
			
			$this->view->dynform = $dynamicForm->createFormVoucher($this->fields, URL."glopening/saveglopening", "Save",$this->values, URL."glopening/showpost");
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('glopening/glopeningentry', false);
		}
		
		
		public function showpost(){
		
		$voucher = $_POST['xvoucher'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."glrpayvoutrade/glrpayvouentry"
		);
		
		$tblvalues = $this->model->getVoucherHeader($voucher);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xvoucher"=>$tblvalues[0]['xvoucher'],
					"xnarration"=>$tblvalues[0]['xnarration'],
					"xsite"=>$tblvalues[0]['xsite'],
					"xacccr"=>"9040",
					"xacccrdesc"=>"Profit And Loss Appropriation Account",
					"xacccrtype"=>"Liability",
					"xacccrusage"=>"Ledger",
					"xacccrsource"=>"None",
					"xacc"=>"",
					"xaccdesc"=>"",
					"xacctype"=>"",
					"xaccusage"=>"",
					"xaccsource"=>"",
					"xrow"=>"0",
					"xaccsub"=>"",
					"xaccsubdesc"=>"",
					"xcus"=>"",
					"xorg"=>"",
					"xsup"=>"",
					"xsuporg"=>"",
					"xcur"=>"BDT",
					"xprime"=>"0",
					"xprimecr"=>"0"
					);
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Payment Voucher Entry", $btn, '<a style="color:red" id="invnum" href="'.URL.'glrpt/glpayvoucher/'.$voucher.'">Click To Print Voucher - '.$voucher.'</a>');		
			
			$this->view->dynform = $dynamicForm->createFormVoucher($this->fields, URL."glrpayvoutrade/saveglrpayvou", "Save",$tblvalues, URL."glrpayvoutrade/showpost");
			
			$this->view->table = $this->renderTable($voucher);
			
			$this->view->renderpage('glrpayvoutrade/glrpayvouentry');
		}
		
		function getaccdtjson($acc){
			$where = " bizid=".Session::get('sbizid')." and xacc = ". $acc;
			$this->model->getAccDtJson($where);
		}
		function getsubaccdt($acc, $subacc){
			$where = " bizid=".Session::get('sbizid')." and xacc = '". $acc ."' and xaccsub = '". $subacc ."'";
			$this->model->getSubAccDt($where);
		}
		
	
	}