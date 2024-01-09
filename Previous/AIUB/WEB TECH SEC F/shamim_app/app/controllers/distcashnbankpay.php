<?php
class Distcashnbankpay extends Controller{
	
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
				if($menus["xsubmenu"]=="Cash Payment")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distcashnbankpay/js/withdraw.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"xpaynum"=>"",
			"xamount"=>"0",
			"xotn"=>"",
			"xrdin"=>""
			);
			
			$this->fields = array(array(
							"xpaynum-text"=>'Txn No_maxlength="20"',
							"xdate-datepicker" => 'Date_""'
							),
						array(
							"xotn-text"=>'WTN_maxlength="20"',
							"xrdin-text"=>'RIN*~star_maxlength="20" readonly'					
							),
						array(
							"xamount-text_digit"=>'Amount*~star_number="true" minlength="1" maxlength="18" required readonly'					
							)
						);
														
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."distcashnbankpay/withdrawentry",
		);	
		
					
			$this->view->rendermainmenu('distcashnbankpay/index');
			
		}
		
		public function save(){
												
				$xdate = $_POST['xdate'];
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
				$form	->post('xotn')
						->val("digit")
						
						->post('xrdin')						
				
						->post('xamount')
						->val('maxlength', 5);
						
												
				$form	->submit();
				
				$data = $form->fetch();
				
				if($stno==0){
						throw new Exception("Satement not started yet! Please wait...");
					}
				
				
				$otndt = $this->model->getWithdrawReq($data['xotn']);
				
				$amount = "0";
				$rdin="";
				
				if(!empty($otndt)){
					$amount = $otndt[0]['xamount'];
					$rdin=$otndt[0]['xrdin'];
				}else{
					throw new Exception("No record found with this WTN!");
				}
				
				if($amount<=0){
					throw new Exception("No Commission available!");
				}
				if($rdin==""){
					throw new Exception("No RIN Found!");
				}
				$data['xrdin'] = $rdin;	
				$data['xamount'] = $amount;	
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
					$this->result = 'Payment Done!';
					
				}
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Payment! Reason: Could be Duplicate Account Code or system error!";
				
				 $this->showentry($success, $this->result);
				 
				 
				
		}
				
		public function getwithdraw($otn){
			$this->model->getWithdrawReqjson($otn);			
		}
		public function showentry($num, $result=""){
		
		
		$btn = array(
			"Clear" => URL."distcashnbankpay/withdrawentry"
		);
			
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Cash Payment", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distcashnbankpay/save", "Pay",$this->values );
			
			$this->view->table = $this->renderTable($num);
			
			$this->view->renderpage('distcashnbankpay/withdrawentry');
		}
		
		function renderTable(){
			$fields = array(
						"xpaynum-Txn. Number",
						"xdate-Date",
						"xrdin-RIN",
						"xorg-Name",
						"xamount-Amount"
						);
			$table = new Datatable();
			$row = $this->model->getList();
			//print_r($row); die;
			return $table->myTable($fields, $row, "xpaynum");
			
			
		}
		
		
		function withdrawlist(){
			$rows = $this->model->getList();
			$cols = array("xpaynum-Txn. Number",
						"xdate-Date",
						"xrdin-RIN",
						"xorg-Name",
						"xamount-Amount");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xpaynum");
			$this->view->renderpage('distcashnbankpay/withdrawlist', false);
		}
		
		
		function withdrawentry(){
				
		$btn = array(
			"Clear" => URL."distcashnbankpay/withdrawentry"
		);

		// form data
		$this->view->balance = $this->model->getBalance();
		
			$dynamicForm = new Dynamicform("Cah Payment",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distcashnbankpay/save", "Pay",$this->values);
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('distcashnbankpay/withdrawentry', false);
		}
		
		
		
}