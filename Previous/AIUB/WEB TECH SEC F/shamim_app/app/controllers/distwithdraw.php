<?php
class Distwithdraw extends Controller{
	
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
				if($menus["xsubmenu"]=="8 Withdrawal Request")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distwithdraw/js/withdraw.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"xpaynreqnum"=>"",
			"xnote"=>"",
			"xtype"=>"Cash",
			"xamount"=>"0",
			"xbank"=>"",
			"xaccount"=>"",
			"xtypehidden"=>"",
			"xbnkbr"=>""
			);
			
			$this->fields = array(array(
							"xpaynreqnum-text"=>'Txn No_maxlength="20"',
							"xdate-datepicker" => 'Date_""'
							),
						array(
							"xnote-textarea"=>'Note_maxlength="250"'													
							),
						array(
							"xtype-radio_Cash_Bank"=>'Withdrawal Type_maxlength="20"',
							"xamount-text_digit"=>'Amount*~star_number="true" minlength="1" maxlength="18" required'					
							),
						array(
							"xbank-select_Bank"=>'Bank_maxlength="20"',
							"xaccount-text"=>'Account No_maxlength="20"',
							"xtypehidden-hidden"=>'_'	
							)
							,
						array(
							"xbnkbr-text"=>'Bank Branch_maxlength="20"',										
							)
						);
														
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."distwithdraw/withdrawentry",
		);	
		
					
			$this->view->rendermainmenu('distwithdraw/index');
			
		}
		
		public function savewithdraw(){
												
				$xdate = date("Y/m/d");
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
				$xyear = 0;
				$per = 0;
				$stno = $this->model->getStatementNo();
				
				$keyfieldval="0";
				$form = new Form();
				$data = array();
				$success=0;
				$result = ""; 
				
				try{
					if($_POST['xtype']=="Bank"){
						if($_POST['xbank']=="" || $_POST['xaccount']=="" || $_POST['xbnkbr']=="")
							throw new Exception("Please enter bank and account info!");
					}
					
				
				$form	->post('xnote')
						->val('maxlength', 200)
						
						->post('xtype')						
				
						->post('xamount')
						->val('maxlength', 250)
						
						->post('xbank')
						
						->post('xaccount')
						
						->post('xbnkbr');
						
				$form	->submit();
				
				$data = $form->fetch();
				
				if($stno==0){
						throw new Exception("Satement not started yet! Please wait...");
					}
				
				
				$bal = $this->model->getBalance() - ($data['xamount']);
				
				if($bal<=0){
					throw new Exception("Balance not available!");
				}
				$otnno = $stno.rand();
				$data['xotn'] = $otnno;
				$data['xrdin'] = Session::get('suser');
				$data['stno'] = $stno;	
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['xdate'] = $date;
				$data['xbranch'] = Session::get('sbranch');
							
					
				$success = $this->model->create($data);
				
				
				
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0){
					$this->result = 'Withdrawal Request Created';
					if($data['xtype']=="Cash"){
						
						$this->sendotn($otnno);	
					}
				}
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Withdrawal Request! Reason: Could be Duplicate Account Code or system error!";
				
				 $this->showentry($success, $this->result);
				 
				 
				
		}
		
		public function editdistreq(){
			
			if (empty($_POST['xpaynreqnum'])){
					header ('location: '.URL.'distwithdraw/withdrawentry');
					exit;
				}
			$result = "";
			
			$hd = array();
			$dt = array();
			
				
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				
			$success=false;
			$num = $_POST['xpaynreqnum'];
			$form = new Form();
				$data = array();
				
				try{
				
				
				$form	->post('xnote')
						->val('maxlength', 200)
										
				
						->post('xbank')
						->val('maxlength', 20)
							
						->post('xaccount')
						->val('maxlength', 20)
						
						
						
						->post('xtype')
						->val('minlength', 1);
						
				$form	->submit();
				
				
				
				$data = $form->fetch();	
				//print_r($data);die;$otnno = rand();
				if($_POST['xtypehidden']=="Cash"){
						$data['xbank'] = "";	
						$data['xaccount'] = "";
						
						}
				
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
					
				
				$success = $this->model->edit($data,$num);
				
				
				}catch(Exception $e){
					//echo $e->getMessage();die;
					$result = $e->getMessage();
					
				}
				if($result==""){
				if($success)
					$result = "Edited successfully";
				else
					$result = "Edit failed!";
				
				}
				
				 $this->showentry($num, $result);
				
		
		}
		
		public function sendotn($otn){
						
						$sendsms = new Sendsms();
						
						$mobile = $this->model->getmobileno();
						//echo $mobile[0]['xmobile']; die;
						$dbmobile = $mobile[0]['xmobile'];
						if (substr($dbmobile, 0, 1) === '+'){
							$dbmobile=str_replace("+","",$dbmobile);
						}
						if(strlen($dbmobile)==11){
							$dbmobile="88".$dbmobile;
						}
						
						$smstext = 'Your WTN Number is '.$otn.'. Please keep this number safe for cash withdrawal. Thanks by ABL'; //echo $tonum.' '.$smstext; die;
													
						$sendsms->sendSingleSms("https://api.mobireach.com.bd/SendTextMessage", "pure", "Akashnil@1234", "8801833318683", $dbmobile, $smstext);
						
		}
		
		public function show($num, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"New" => URL."distwithdraw/distreqentry"
		);
		
		$tblvalues = $this->model->getTxn($num);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else{
			$tblvalues=$tblvalues[0];
			$tblvalues['xtypehidden']=$tblvalues['xtype'];
		}
		// form data
		$this->view->balance = $this->model->getBalance();
			
			$dynamicForm = new Dynamicform("Withdrawal Request", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields,  URL."distwithdraw/editdistreq", "Update",$tblvalues, URL."distwithdraw/showpost");
			
			$this->view->table = $this->renderTable($num);
			
			$this->view->renderpage('distwithdraw/withdrawentry');
		}
		
		
		
		public function showentry($num, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."distwithdraw/withdrawentry"
		);
			$type = $_POST['xtype'];
			$tblvalues=array(
					"xdate"=>$_POST['xdate'],
					"xpaynreqnum"=>$_POST['xpaynreqnum'],
					"xnote"=>$_POST['xnote'],
					"xtype"=>$type,
					"xamount"=>"0",
					"xbank"=>"",
					"xaccount"=>"",
					"xbnkbr"=>"",
					"xtypehidden"=>$type
					);
			$this->view->balance = $this->model->getBalance();
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("WithdrawalRequest", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distwithdraw/savewithdraw", "Withdraw",$tblvalues ,URL."distwithdraw/showpost");
			
			$this->view->table = $this->renderTable($num);
			
			$this->view->renderpage('distwithdraw/withdrawentry');
		}
		
		function renderTable(){
			$fields = array(
						"xpaynreqnum-Txn. Number",
						"xdate-Date",
						"xtype-Cash/Bank",
						"xbank-Bank",
						"xaccount-Account Number",
						"xamount-Amount"
						);
			$table = new Datatable();
			$row = $this->model->getList(" LIMIT 5");
			//print_r($row); die;
			return $table->myTable($fields, $row, "xpaynreqnum", URL."distwithdraw/show/");
			
			
		}
		
		
		function withdrawlist(){
			$rows = $this->model->getList();
			$cols = array("xpaynreqnum-Txn. Number",
						"xdate-Date",
						"xtype-Cash/Bank",
						"xbank-Bank",
						"xaccount-Account Number",
						"xamount-Amount");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xpaynreqnum",URL."distwithdraw/show/");
			$this->view->renderpage('distwithdraw/withdrawlist', false);
		}
		
		
		function withdrawentry(){
				
		$btn = array(
			"Clear" => URL."distwithdraw/withdrawentry"
		);

		// form data
		$this->view->balance = $this->model->getBalance();
		
			$dynamicForm = new Dynamicform("Withdrawal Request",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distwithdraw/savewithdraw", "Withdraw",$this->values, URL."distwithdraw/showpost");
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('distwithdraw/withdrawentry', false);
		}
		
		
		public function showpost(){
		//echo 123;die;
		$num = $_POST['xpaynreqnum'];
			
		$tblvalues=array();
		
		$btn = array(
			"New" => URL."distwithdraw/distreqentry"
		);
		
		$tblvalues = $this->model->getTxn($num);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
			$this->view->balance = $this->model->getBalance();
			
			$dynamicForm = new Dynamicform("Withdrawal Request", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distwithdraw/savewithdraw", "Withdraw",$tblvalues, URL."distwithdraw/showpost");
			
			$this->view->table = $this->renderTable($num);
			
			$this->view->renderpage('distwithdraw/distreqentry');
		}
		
}