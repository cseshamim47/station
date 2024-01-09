<?php
class Gljvsingle extends Controller{
	
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
				if($menus["xsubmenu"]=="JV Single Entry")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/gljvsingle/js/getaccdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xprefix"=>"",
			"xdate"=>$dt,
			"xvoucher"=>"",	
			"xnarration"=>"",	
			"xacc"=>"",
			"xaccdesc"=>"",
			"xacctype"=>"",
			"xaccusage"=>"",
			"xaccsource"=>"",
			"xacccr"=>"",
			"xacccrdesc"=>"",
			"xacccrtype"=>"",
			"xacccrusage"=>"",
			"xacccrsource"=>"",
			"xaccsub"=>"",
			"xaccsubdesc"=>"",
			"xcus"=>"",
			"xorg"=>"",
			"xsup"=>"",
			"xsuporg"=>"",
			"xaccsubcr"=>"",
			"xaccsubdesccr"=>"",
			"xcuscr"=>"",
			"xorgcr"=>"",
			"xsupcr"=>"",
			"xsuporgcr"=>"",
			"xcur"=>"BDT",
			"xprime"=>"0",
			"xsite"=>""
			);
			
			$this->fields = array(array(
							"prefix-select_GL Prefix"=>'Voucher Type_maxlength="4"',
							"xdate-datepicker" => 'Date_""',
							"xvoucher-group_".URL."gljvsingle/glsinglepicklist"=>'Voucher No_maxlength="20"',
							"xsite-select_Project"=>'Project_maxlength="20"',
							),array(
							
							"xnarration-textarea"=>'Narration_maxlength="160"',
							),
						array(
							"xacc-group_".URL."glchart/glchartpicklist"=>'Debit Account_maxlength="20"',
							"xaccdesc-text"=>'Account Desc_readonly',
							"xacctype-hidden"=>'',
							"xaccusage-hidden"=>'',
							"xaccsource-hidden"=>''
							),
						array(
							"xaccsub-group_".URL."glchart/glchartpicklist"=>'Sub Account*~star_maxlength="20"',
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
							"xacccr-group_".URL."gljvsingle/glcrchartpicklist"=>'Credit Account_maxlength="20"',
							"xacccrdesc-text"=>'Account Desc_readonly',
							"xacccrtype-hidden"=>'',
							"xacccrusage-hidden"=>'',
							"xacccrsource-hidden"=>''
							),
						array(
							"xaccsubcr-group_".URL."glchart/glchartpicklist"=>'Sub Account*~star_maxlength="20"',
							"xaccsubdesccr-text"=>'Sub Description*~star_readonly'
							),
						array(
							"xcuscr-group_".URL."jsondata/customercrpicklist"=>'Customer Code*~star_maxlength="20"',
							"xorgcr-text"=>'Customer Name*~star_maxlength="100" readonly'
							),
						array(
							"xsupcr-group_".URL."jsondata/suppliercrpicklist"=>'Supplier Code*~star_maxlength="20"',
							"xsuporgcr-text"=>'Name*~star_maxlength="100" readonly'
							),
						array(
							"xprime-text_number"=>'Balance_number="true" minlength="1" maxlength="18" required',
							"xcur-select_Currency"=>'Currency'
							)
						);
						
								
		}
		
		public function index(){
		
		
			$this->view->rendermainmenu('gljvsingle/index');
			
		}
		
		public function saveglsingle(){
				
				$prefix = "JV--".Session::get('suserrow');
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
				$fsubacc="";
				$fsubacccr="";	
				if($_POST['xaccsource']=="Sub Account")
					$fsubacc = 	$_POST['xaccsub'];
				if($_POST['xaccsource']=="Customer")
					$fsubacc = 	$_POST['xcus'];
				if($_POST['xaccsource']=="Supplier")
					$fsubacc = 	$_POST['xsup'];	
				
				if($_POST['xacccrsource']=="Sub Account")
					$fsubacccr = 	$_POST['xaccsubcr'];
				if($_POST['xacccrsource']=="Customer")
					$fsubacccr = 	$_POST['xcuscr'];
				if($_POST['xacccrsource']=="Supplier")
					$fsubacccr = 	$_POST['xsupcr'];	
				
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
					if($_POST['xacccrsource']=="Sub Account") {
						$sccsub = $this->model->getSubacc($_POST['xaccsubcr']);
						if(count($sccsub)==0)
							throw new Exception("Invalid Subaccount code for credit account!");
					}
					if($_POST['xacccrsource']=="Customer") {
						$cus = $this->model->getCustomer($_POST['xcuscr']);
						if(count($cus)==0)
							throw new Exception("Invalid Customer code for credit account!");
					}					
					if($_POST['xacccrsource']=="Supplier"){
						$sup = $this->model->getSupplier($_POST['xsupcr']);
						if(count($sup)==0)
							throw new Exception("Invalid Supplier code for credit account!");
					}
				$form	->post('xacccr')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xacccrtype')
						
						->post('xacccrusage')
						
						->post('xacccrsource')
				
						->post('xnarration')
				
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
				
				if($data['xprime']<=0){
					throw new Exception("Amount Cannot be 0 or less!");
				}
				
								
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
				$data['xdoctype'] = "GL Single Entry";				
				$data['xdocnum'] = $keyfieldval;
				
				
				
				$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,
				`xexch`,`xprime`,xflag";
				
				$vals = "(" . Session::get('sbizid') . ",'". $keyfieldval ."','1','". $data['xacc'] ."',
				'". $data['xacctype'] ."','". $data['xaccusage'] ."','".$data['xaccsource']."','". $fsubacc ."','". $data['xcur'] ."',
				'". $data['xprime'] ."','1','". $data['xprime'] ."','Debit'),
				(" . Session::get('sbizid') . ",'". $keyfieldval ."','2','". $data['xacccr'] ."',
				'". $data['xacccrtype'] ."','". $data['xacccrusage'] ."','". $data['xacccrsource'] ."','". $fsubacccr ."','". $data['xcur'] ."',
				'-". $data['xprime'] ."','1','-". $data['xprime'] ."','Credit')";
				
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
			"Clear" => URL."gljvsingle/glsingleentry"
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
					"xacc"=>"",
					"xaccdesc"=>"",
					"xacctype"=>"",
					"xaccusage"=>"",
					"xaccsource"=>"",
					"xacccr"=>"",
					"xacccrdesc"=>"",
					"xacccrtype"=>"",
					"xacccrusage"=>"",
					"xacccrsource"=>"",
					"xaccsub"=>"",
					"xaccsubdesc"=>"",
					"xcus"=>"",
					"xorg"=>"",
					"xsup"=>"",
					"xsuporg"=>"",
					"xaccsubcr"=>"",
					"xaccsubdesccr"=>"",
					"xcuscr"=>"",
					"xorgcr"=>"",
					"xsupcr"=>"",
					"xsuporgcr"=>"",
					"xcur"=>"BDT",
					"xprime"=>"0"
					);
			
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Voucher", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createFormVoucher($this->fields, URL."gljvsingle/saveglsingle", "Save",$tblvalues ,URL."glopening/showpost");
			
			$this->view->table = $this->renderTable($voucher);
			
			$this->view->renderpage('gljvsingle/glsingleentry');
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
		function glcrchartpicklist(){
			$this->view->table = $this->glchartPickTable();
			
			$this->view->renderpage('glchart/glchartpicklist', false);
		}
		function glchartPickTable(){
			$fields = array(
						"xacccr-Account Code",
						"xdesc-Account Description",
						"xacctype-Account Type",
						"xaccusage-Use Of The Account",
						"xaccsource-Account Source"
						);
			$table = new Datatable();
			$row = $this->model->getGlchartByLimit();
			
			return $table->picklistTable($fields, $row, "xacccr");
		}
		function glsinglepicklist(){
			$this->view->table = $this->glsinglePickTable();
			
			$this->view->renderpage('glchart/glchartpicklist', false);
		}
		
		function glsinglePickTable(){
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
			$this->view->renderpage('gljvsingle/glsinglevoulist', false);
		}
		
		
		function glsingleentry(){
				
		$btn = array(
			"Clear" => URL."gljvsingle/glsingleentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Opening Balance",$btn);		
			
			$this->view->dynform = $dynamicForm->createFormVoucher($this->fields, URL."gljvsingle/saveglsingle", "Save",$this->values, URL."gljvsingle/showpost");
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('gljvsingle/glsingleentry', false);
		}
		
		
		public function showpost(){
		
		$voucher = $_POST['xvoucher'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."gljvsingle/glsingleentry"
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
					"xacc"=>"",
					"xaccdesc"=>"",
					"xacctype"=>"",
					"xaccusage"=>"",
					"xaccsource"=>"",
					"xacccr"=>"",
					"xacccrdesc"=>"",
					"xacccrtype"=>"",
					"xacccrusage"=>"",
					"xacccrsource"=>"",
					"xaccsub"=>"",
					"xaccsubdesc"=>"",
					"xcus"=>"",
					"xorg"=>"",
					"xsup"=>"",
					"xsuporg"=>"",
					"xaccsubcr"=>"",
					"xaccsubdesccr"=>"",
					"xcuscr"=>"",
					"xorgcr"=>"",
					"xsupcr"=>"",
					"xsuporgcr"=>"",
					"xcur"=>"BDT",
					"xprime"=>"0"
					);
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Voucher Entry", $btn, '<a style="color:red" id="invnum" href="'.URL.'glrpt/glpayvoucher/'.$voucher.'">Click To Print Voucher - '.$voucher.'</a>');		
			
			$this->view->dynform = $dynamicForm->createFormVoucher($this->fields, URL."gljvsingle/saveglsingle", "Save",$tblvalues, URL."gljvsingle/showpost");
			
			$this->view->table = $this->renderTable($voucher);
			
			$this->view->renderpage('gljvsingle/glsingleentry');
		}
		
	
	}