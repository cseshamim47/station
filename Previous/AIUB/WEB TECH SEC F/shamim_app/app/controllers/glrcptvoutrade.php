<?php
class Glrcptvoutrade extends Controller{
	
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
				if($menus["xsubmenu"]=="Trade Receipt")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/glrcptvoutrade/js/getaccdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"xvoucher"=>"",
			"xnarration"=>"",
			"xacc"=>"1010",
			"xaccdesc"=>"Trade Receivable",
			"xacctype"=>"Asset",
			"xaccusage"=>"AR",
			"xaccsource"=>"Customer",
			"xacccr"=>"",
			"xacccrdesc"=>"",
			"xacccrtype"=>"",
			"xacccrusage"=>"",
			"xacccrsource"=>"",
			"xcus"=>"",
			"xorg"=>"",
			"xcur"=>"BDT",
			"xsite"=>"",
			"xprime"=>"0"
			);
			
			$this->fields = array(array(
							"xvoucher-group_".URL."glrcptvoutrade/glrcptvoupicklist"=>'Voucher No_maxlength="20"',
							"xdate-datepicker" => 'Date_""',
							"xsite-select_Project"=>'Project_maxlength="20"',
							),
						array(
							"xnarration-textarea"=>'Narration_maxlength="100"'
							),
						array(
							"xacc-text"=>'Account_readonly maxlength="20"',
							"xaccdesc-text"=>'Account Desc_readonly',
							"xacctype-hidden"=>'',
							"xaccusage-hidden"=>'',
							"xaccsource-hidden"=>''
							),
						array(
							"xacccr-group_".URL."jsondata/glchartpicklistcr"=>'Receive Account_maxlength="20"',
							"xacccrdesc-text"=>'Account Desc_readonly',
							"xacccrtype-hidden"=>'',
							"xacccrusage-hidden"=>'',
							"xacccrsource-hidden"=>''
							),
						array(
							"xcus-group_".URL."jsondata/customerpicklist"=>'Customer Code*~star_maxlength="20"',
							"xorg-text"=>'Customer Name*~star_maxlength="100" readonly'
							),
						array(
							"xprime-text_number"=>'Amount_number="true" minlength="1" maxlength="18" required',
							"xcur-select_Currency"=>'Currency'
							)
						);
						
								
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."glrcptvoutrade/glrcptvouentry",
		);	
		
		
		// form data
		
			$dynamicForm = new Dynamicform("Receipt Voucher",$btn);		
			
			$this->view->dynform = $dynamicForm->createFormVoucher($this->fields, URL."glrcptvoutrade/saveglrcptvou", "Save",$this->values,URL."glrcptvoutrade/showpost");
			
			$this->view->table = $this->renderTable("");
			
			$this->view->rendermainmenu('glrcptvoutrade/index');
			
		}
		
		public function saveglrcptvou(){
				if (empty($_POST['xacc']) || empty($_POST['xprime'])){
					header ('location: '.URL.'glrcptvoutrade/glrcptvouentry');
					exit;
				}
				$prefix = "TRCV".Session::get('suserrow');
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
				
				try{
					if($_POST['xaccsource']=="Customer") {
						$cus = $this->model->getCustomer($_POST['xcus']);
						if(count($cus)==0)
							throw new Exception("Invalid Customer code!");
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
				
						->post('xnarration')
						
						
						
						->post('xacctype')
						
						->post('xaccusage')
						
						->post('xaccsource')
						
						
						->post('xcus')
						
						->post('xorg')
				
						->post('xprime')
						->val('minlength', 1)
						->val('maxlength', 18)
						
						
						->post('xcur')
						->val('maxlength', 20);
						
						
				$form	->submit();
				
				$data = $form->fetch();
				
				$data['xnarration'] = "Received from customer: ".$data['xcus']."-".$data['xorg']." ".$data['xnarration'];
				
				if($data['xcur']=="")
					$data['xcur']="BDT";
				
				
				$prime = $data['xprime'];
				
				if($data['xvoucher'] == "")
					$keyfieldval = $this->model->getKeyValue("glheader","xvoucher",$prefix,"6");
				else
					$keyfieldval = $data['xvoucher'];
				
				if($data['xaccsource'] == "Customer" && $data['xcus']==""){
					throw new Exception("Customer Code Not Found!");
				}
					
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['xyear'] = $xyear;
				$data['xper'] = $per;
				$data['xvoucher'] = $keyfieldval;
				$data['xdate'] = $date;
				$data['xbranch'] = Session::get('sbranch');;
				$data['xdoctype'] = "Trade Receipt";				
				$data['xdocnum'] = $keyfieldval;
				
				
				
				$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,
				`xexch`,`xprime`,xflag";
				
				$vals = "(" . Session::get('sbizid') . ",'". $keyfieldval ."','1','". $data['xacc'] ."',
				'". $data['xacctype'] ."','". $data['xaccusage'] ."','Customer','". $data['xcus'] ."','". $data['xcur'] ."',
				'-". $prime ."','1','-". $prime ."','Credit'),
				(" . Session::get('sbizid') . ",'". $keyfieldval ."','2','". $data['xacccr'] ."',
				'". $data['xacccrtype'] ."','". $data['xacccrusage'] ."','". $data['xacccrsource'] ."','','". $data['xcur'] ."',
				'". $prime ."','1','". $prime ."','Debit')";
				
				//print_r($vals);die;				
				$success = $this->model->create($data, $cols, $vals);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					$this->result = 'Voucher Created</br><a style="color:red" id="invnum" href="'.URL.'glrpt/glrcptvoucher/'.$keyfieldval.'">Click To Print Voucher - '.$keyfieldval.'</a>';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Voucher! Reason: Could be Duplicate Transaction or system error!";
				
				 $this->showentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		
		public function showentry($voucher, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."glrcptvoutrade/glrcptvouentry"
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
					"xacccr"=>"",
					"xacccrdesc"=>"",
					"xacccrtype"=>"",
					"xacccrusage"=>"",
					"xacccrsource"=>"",
					"xacc"=>"3000",
					"xaccdesc"=>"Trade Receivable",
					"xacctype"=>"Asset",
					"xaccusage"=>"AR",
					"xaccsource"=>"Customer",
					"xrow"=>"0",
					"xcus"=>"",
					"xorg"=>"",
					"xcur"=>"BDT",
					"xprime"=>"0",
					"xprimecr"=>"0"
					);
			
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Receipt Voucher", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createFormVoucher($this->fields, URL."glrcptvoutrade/saveglrcptvou", "Save",$tblvalues ,URL."glrcptvoutrade/showpost");
			
			$this->view->table = $this->renderTable($voucher);
			
			$this->view->renderpage('glrcptvoutrade/glrcptvouentry');
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
		
		function glrcptvoupicklist(){
			$this->view->table = $this->glrcptvouPickTable();
			
			$this->view->renderpage('glchart/glchartpicklist', false);
		}
		
		function glrcptvouPickTable(){
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
		
		
		function glrcptvouentry(){
				
		$btn = array(
			"Clear" => URL."glrcptvoutrade/glrcptvouentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Receipt Voucher",$btn);		
			
			$this->view->dynform = $dynamicForm->createFormVoucher($this->fields, URL."glrcptvoutrade/saveglrcptvou", "Save",$this->values, URL."glrcptvoutrade/showpost");
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('glrcptvoutrade/glrcptvouentry', false);
		}
		
		
		public function showpost(){
		
		$voucher = $_POST['xvoucher'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."glrcptvoutrade/glrcptvouentry"
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
					"xacccr"=>"",
					"xacccrdesc"=>"",
					"xacccrtype"=>"",
					"xacccrusage"=>"",
					"xacccrsource"=>"",
					"xacc"=>"9905",
					"xaccdesc"=>"Trade Receivable",
					"xacctype"=>"Asset",
					"xaccusage"=>"AR",
					"xaccsource"=>"Customer",
					"xrow"=>"0",
					"xcus"=>"",
					"xorg"=>"",
					"xcur"=>"BDT",
					"xprime"=>"0",
					"xprimecr"=>"0"
					);
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Receipt Voucher Entry", $btn, '<a style="color:red" id="invnum" href="'.URL.'glrpt/glrcptvoucher/'.$voucher.'">Click To Print Receipt - '.$voucher.'</a>');		
			
			$this->view->dynform = $dynamicForm->createFormVoucher($this->fields, URL."glrcptvoutrade/saveglrcptvou", "Save",$tblvalues, URL."glrcptvoutrade/showpost");
			
			$this->view->table = $this->renderTable($voucher);
			
			$this->view->renderpage('glrcptvoutrade/glrcptvouentry');
		}
		
	
	}