<?php
class Glpayvou extends Controller{
	
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
				if($menus["xsubmenu"]=="Debit Voucher")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/glpayvou/js/getaccdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
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
			"xcur"=>"BDT",
			"xsite"=>"",
			"xprime"=>"0"
			);
			
			$this->fields = array(array(
							"xvoucher-group_".URL."glpayvou/glpayvoupicklist"=>'Voucher No_maxlength="20"',
							"xdate-datepicker" => 'Date_""',
							"xsite-select_Project"=>'Project_maxlength="20"',
							),
						array(
							"xnarration-textarea"=>'Narration_maxlength="160"'
							),
						array(
							"xacccr-group_".URL."jsondata/glchartpicklistcr"=>'Account_maxlength="20"',
							//"xacccr-group_".URL."glchart/glchartpicklist"=>'Account_maxlength="20"',
							"xacccrdesc-text"=>'Account Desc_readonly',
							"xacccrtype-hidden"=>'',
							"xacccrusage-hidden"=>'',
							"xacccrsource-hidden"=>''
							),
						array(
							"xacc-group_".URL."jsondata/glchartpicklist"=>'Pay Account_maxlength="20"',
							"xaccdesc-text"=>'Pay Account Desc_readonly',
							"xacctype-hidden"=>'',
							"xaccusage-hidden"=>'',
							"xaccsource-hidden"=>''
							),	
						array(
							"xaccsub-group_".URL."jsondata/glchartpicklist"=>'Sub Account_maxlength="20"',
							"xaccsubdesc-text"=>'Sub Description_readonly'
							),
						array(
							"xprime-text_number"=>'Amount_number="true" minlength="1" maxlength="18" required',
							"xcur-select_Currency"=>'Currency'
							)
						);
						
								
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."glpayvou/glpayvouentry",
		);	
		
		
		// form data
		
			$dynamicForm = new Dynamicform("Payment Voucher",$btn);		
			
			$this->view->dynform = $dynamicForm->createFormVoucher($this->fields, URL."glpayvou/saveglpayvou", "Save",$this->values,URL."glpayvou/showpost");
			
			$this->view->table = $this->renderTable("");
			
			$this->view->rendermainmenu('glpayvou/index');
			
		}
		
		public function saveglpayvou(){
				if (empty($_POST['xacc']) || empty($_POST['xprime'])){
					header ('location: '.URL.'glpayvou/glpayvouentry');
					exit;
				}
				$prefix = "PAY-".Session::get('suserrow');
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

				$dbaccusage = "";
				if(isset($_POST["xacccr"])){
					$acc = $_POST["xacccr"];
					$accdt = $this->model->getAccDt($acc);

					if(!empty($accdt)){
						$dbaccusage = $accdt[0]["xaccusage"];
					}
				}
				
				try{
					
					if($dbaccusage=="")
						throw new Exception("Cash or Bank usage not found!");
					if($dbaccusage!="Cash" && $dbaccusage!="Bank")
						throw new Exception("Cash or Bank usage not matched!");

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
						//->val('minlength', 1)
						->val('maxlength', 250)
						
						
						->post('xacctype')
						
						->post('xaccusage')
						
						->post('xaccsource')
						
						
						->post('xaccsub')
				
						->post('xprime')
						->val('minlength', 1)
						->val('maxlength', 18)
						
						
						->post('xcur')
						->val('maxlength', 20);
						
						
				$form	->submit();
				
				$data = $form->fetch();
				
				if($data['xcur']=="")
					$data['xcur']="BDT";
				
				
				$prime = $data['xprime'];
				
				
				$keyfieldval = $this->model->getKeyValue("glheader","xvoucher",$prefix,"6");
				
				if($data['xaccsource'] == "Sub Account" && $data['xaccsub']==""){
					throw new Exception("Sub Account Code Not Found!");
				}

				if($data['xaccsource'] == "Supplier"){
					throw new Exception("Operation is not allowed! Please Use Trade Payment!");
				}
					
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['xyear'] = $xyear;
				$data['xper'] = $per;
				$data['xvoucher'] = $keyfieldval;
				$data['xdate'] = $date;
				$data['xbranch'] = Session::get('sbranch');;
				$data['xdoctype'] = "Payment Voucher";
				$data['xdocnum'] = $keyfieldval;
				$data['xacccrusage'] = $dbaccusage;
				$data['xstatusjv'] = 'Confirmed';
				
				
				$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,
				`xexch`,`xprime`,xflag";
				
				$vals = "(" . Session::get('sbizid') . ",'". $keyfieldval ."','1','". $data['xacc'] ."',
				'". $data['xacctype'] ."','". $data['xaccusage'] ."','". $data['xaccsource'] ."','". $data['xaccsub'] ."','". $data['xcur'] ."','". $prime ."','1','". $prime ."','Debit'),
				(" . Session::get('sbizid') . ",'". $keyfieldval ."','2','". $data['xacccr'] ."','". $data['xacccrtype'] ."','". $data['xacccrusage'] ."','". $data['xacccrsource'] ."','','". $data['xcur'] ."','-". $prime ."','1','-". $prime ."','Credit')";
				
				//print_r($data);die;				
				$success = $this->model->create($data, $cols, $vals);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					//$this->result = 'Voucher Created</br><br/><a style="color:red" id="invnum" href="'.URL.'glrpt/glvoucher/Payment/'.$keyfieldval.'">Click To Print Voucher - '.$keyfieldval.'</a>';
					$this->result = 'Voucher Created</br><br/><a style="color:red" id="invnum" href="'.URL.'glrpt/isovoucher/Payment/'.$keyfieldval.'">Click To Print Voucher - '.$keyfieldval.'</a>';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Voucher! Reason: Could be Duplicate Transaction or system error!";
				
				 $this->showentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		
		public function showentry($voucher, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."gljvvou/gljvvouentry"
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
					"xacc"=>"",
					"xaccdesc"=>"",
					"xacctype"=>"",
					"xaccusage"=>"",
					"xaccsource"=>"",
					"xrow"=>"0",
					"xaccsub"=>"",
					"xaccsubdesc"=>"",
					"xcur"=>"BDT",
					"xprime"=>"0",
					"xprimecr"=>"0"
					);
			
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Payment Voucher", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createFormVoucher($this->fields, URL."glpayvou/saveglpayvou", "Save",$tblvalues ,URL."glpayvou/showpost");
			
			$this->view->table = $this->renderTable($voucher);
			
			$this->view->renderpage('glpayvou/glpayvouentry');
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
		
		function glpayvoupicklist(){
			$this->view->table = $this->glpayvouPickTable();
			
			$this->view->renderpage('glchart/glchartpicklist', false);
		}
		
		function glpayvouPickTable(){
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
		
		
		function glpayvouentry(){
				
		$btn = array(
			"Clear" => URL."glpayvou/glpayvouentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Payment Voucher",$btn);		
			
			$this->view->dynform = $dynamicForm->createFormVoucher($this->fields, URL."glpayvou/saveglpayvou", "Save",$this->values, URL."glpayvou/showpost");
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('glpayvou/glpayvouentry', false);
		}
		
		
		public function showpost(){
		
		$voucher = $_POST['xvoucher'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."glpayvou/glpayvouentry"
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
					"xacc"=>"",
					"xaccdesc"=>"",
					"xacctype"=>"",
					"xaccusage"=>"",
					"xaccsource"=>"",
					"xrow"=>"0",
					"xaccsub"=>"",
					"xaccsubdesc"=>"",
					"xcur"=>"BDT",
					"xprime"=>"0",
					"xprimecr"=>"0"
					);
			
		
			
		// form data
		
			$dynamicForm = new Dynamicform("Payment Voucher Entry", $btn, '<br/><a style="color:red" id="invnum" href="'.URL.'glrpt/isovoucher/Payment/'.$voucher.'">Click To Print Voucher - '.$voucher.'</a>');		
			//$dynamicForm = new Dynamicform("Payment Voucher Entry", $btn, '<br/><a style="color:red" id="invnum" href="'.URL.'glrpt/glvoucher/Payment/'.$voucher.'">Click To Print Voucher - '.$voucher.'</a>');		
			
			$this->view->dynform = $dynamicForm->createFormVoucher($this->fields, URL."glpayvou/saveglpayvou", "Save",$tblvalues, URL."glpayvou/showpost");
			
			$this->view->table = $this->renderTable($voucher);
			
			$this->view->renderpage('glpayvou/glpayvouentry');
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