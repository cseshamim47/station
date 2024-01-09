<?php
class Distbaltransfer extends Controller{
	
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
				if($menus["xsubmenu"]=="9 Balance Transfer")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/jsondata/js/bindt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xsl"=>"",
			"xdate"=>$dt,
			"xrdin"=>"",
			"rinname"=>""
			);
			
			$this->fields = array(array(
							"xsl-text"=>'Trunsaction No_""',
							"xdate-datepicker"=>'Date*~star_""'
							),
							array(
							"xrdin-text"=>'To RIN*~star_maxlength="20"',
							"rinname-text"=>'Full Name*~star_maxlength="100"'
							)
						);
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."distreg/distbalentry",
		);	
		
		$this->view->rendermainmenu('distbaltransfer/index');
			
		}
		public function sendotn($otn, $torin){
						
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
						
						$smstext = 'Your TTN Number is '.$otn.'. Enter this number for amount transfer to RIN -'.$torin.'. BDT 5 has been deducted as processing fee from your account. Thanks by ABL'; //echo $tonum.' '.$smstext; die;
													
						$sendsms->sendSingleSms("https://api.mobireach.com.bd/SendTextMessage", "pure", "Akashnil@1234", "8801833318683", $dbmobile, $smstext);
						
		}
		public function createtxn(){
							
		$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date));	
			
			
				$form = new Form();
				$data = array();
				$success=0;
				$result = ""; 
				
				try{
					
				if($_POST['xrdin']==""){
						throw new Exception("Please Enter RIN No!");
					}
					
				$topupbal = $this->model->getBalance()-5;	
				if($topupbal<0){
						throw new Exception("Not sufficient balance! Please deposit first!");
					}		
					
				$rindt = $this->model->getrindt($_POST['xrdin']);
				
				if(empty($rindt)){
					throw new Exception("Rin is not regidtered!");
				}
				
				if(!$this->model->checkDownLine($rindt[0]['bin'], Session::get('sbin'))){
						if(!$this->model->checkDownLine(Session::get('sbin'),$rindt[0]['bin'])){
					
							throw new Exception("Only downline or upline transfer accepted!");
						}
						
					}
				
				$form	->post('xrdin')
						->val('minlength', 4)
						->val('maxlength', 50);
						
						
				$form	->submit();
				
				$data = $form->fetch();
				
				if(empty($this->model->getRin($data['xrdin']))){
						throw new Exception("RIN Not Found!");
					}
				
				$ttnno = rand();
				$stno = $this->model->getStatementNo();
				$data['xdocno'] = $ttnno;
				$data['stno'] = $stno;
				$data['bizid'] = Session::get('sbizid');
				$data['xdate'] = $date;
				$data['zemail'] = Session::get('suser');
				$data['xamount'] = "5";
				$data['xyear'] = $year;
				$data['xper'] = $month;
				//print_r($data);die;				
				$success = $this->model->createttn($data);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				
				
				if($success>0){
					$this->result = "TTN No Created! Check your mobile sms for TTN no!";
					$this->sendotn($ttnno, $data['xrdin']);
				}
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create TTN!";
				
				 $this->showentry($success, $this->result);
				 
				 
				
		}
		
		public function confirm(){
							
		$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date));	
			
			
				$form = new Form();
				$data = array();
				$success=0;
				$result = ""; 
				
				try{
					
				if($_POST['xrdin']==""){
						throw new Exception("Please Enter RIN No!");
					}
				if($_POST['xamount']<=0){
						throw new Exception("Amount should be greater than 0!");
					}			
				
				
				
				$form	->post('xsl')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('xrdin')
						->val('minlength', 1)
						
						->post('xamount')
						->val('checkdouble')
						->val('minlength', 1)
						
						->post('xdocno')						
						->val('minlength', 1);
						
						
				$form	->submit();
				
				$data = $form->fetch();
				
				$topupbal = $this->model->getBalance()-($data['xamount']);	
				if($topupbal<0){
						throw new Exception("Not sufficient balance! Please deposit first!");
					}
				
				if(empty($this->model->getRin($data['xrdin']))){
						throw new Exception("RIN Not Found!");
					}
				$ttndt = $this->model->getttndt($data['xdocno']);
				if(empty($ttndt)){
					throw new Exception("Invalid TTN No!");
				}
				$data['bizid'] = Session::get('sbizid');
				$data['xdate'] = $date;
				$data['zemail'] = Session::get('suser');
				$data['xyear'] = $year;
				$data['xper'] = $month;
				$stno = $this->model->getStatementNo();
				$cols = "stno,bizid,xdate,xemail,xrdin,zemail,xyear,xper,xamount,xtxntype,xsign,xdocno,xdoctype";
				
				$vals = "(".$stno.",'". Session::get('sbizid') ."','".$date."','".$ttndt[0]['xemail']."','".$ttndt[0]['xrdin']."','".Session::get('suser')."',".$year.",".$month.",".$data['xamount'].",'Balance Transfer','-1',".$data['xdocno'].",'Balance Transfer'),
				(".$stno.",'". Session::get('sbizid') ."','".$date."','".$ttndt[0]['xrdin']."','".$ttndt[0]['xemail']."','".Session::get('suser')."',".$year.",".$month.",".$data['xamount'].",'Transfer Receive','1',".$data['xdocno'].",'Balance Transfer')";
								
				$success = $this->model->confirmtxn($cols, $vals);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				
				
				if($success>0){
					$this->result = "Balance Transfer Done!";
					$this->model->updatestatus(" xsl=".$ttndt[0]['xsl']);
				}
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Transfer Balance!";
				
				 $this->showentry($success, $this->result);
				 
				 
				
		}
		
		public function showtxn($txn="", $result=""){
		if($txn==""){
			header ('location: '.URL.'distbal/distbalentry');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."distbal/distbalentry"
		);
		
		$tblvalues = $this->model->getSingleBal($txn);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform('Balance Transfer.<span style="color:red;"></span><span style="color:red;"> Your balance is : '.$this->model->getBalance().'</span>', $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distreg/editdistributor/".$cus, "Edit",$tblvalues);
			
			$this->view->table = $this->renderTable($txn);
			
			$this->view->renderpage('distreg/distributorentry');
		}
		
		
		
		public function showentry($cus, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."distbaltransfer/distbaltransferentry"
		);
		$confirmurl=URL."distbaltransfer/createtxn";
		$confirmbtn = "Save";
		$tblvalues = $this->model->getSingleBal($cus);
		if($cus!=0){
		$this->values["xdocno"]="";
		$this->values["xamount"]="0";
		
		$this->fields[2] = array(
							"xdocno-text"=>'TTN No_""',
							"xamount-text"=>'Amount_number="true" minlength="1" maxlength="18" required'							
							);
		$confirmurl=URL."distbaltransfer/confirm";
		$confirmbtn = "Confirm";
		}
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
			$dynamicForm = new Dynamicform('Balance Transfer.<span style="color:red;"></span><span style="color:red;"> Your balance is : '.$this->model->getBalance().'</span>', $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $confirmurl, $confirmbtn,$tblvalues );
			
			$this->view->table = $this->renderTable($cus);
			
			$this->view->renderpage('distbaltransfer/distbaltransferentry');
		}
		
		function renderTable($sl=""){
			
			$fields = array(
						"xsl-Trunsaction No",
						"xdate-Date",						
						"xemail-Transfered To",
						"rinname-Name",
						"xamount-Amount"
						);
			$table = new Datatable();
			$row = $this->model->getAddedList($sl);
			
			return $table->myTable($fields, $row, "xsl");
			
			
		}
		
		function baltransferlist(){
			$this->view->table = $this->balTable();
			
			$this->view->renderpage('distbal/distballist', false);
		}
		
		function balTable(){
			$fields = array(
						"xsl-Trunsaction No",
						"xemail-To Transfer",
						"xdate-Date"
						);
			$table = new Datatable();
			$row = $this->model->getUnConList();
			
			return $table->createTable($fields, $row, "xsl",URL."distbaltransfer/showentry/");
		}
		function balconfirmlist(){
			$this->view->table = $this->balcofirmTable();
			
			$this->view->renderpage('distbaltransfer/confirmlist', false);
		}
		
		function balcofirmTable(){
			$fields = array(
						"xsl-Trunsaction No",
						"xdate-Date",						
						"xemail-Transfered To",
						"rinname-Name",
						"xamount-Amount"
						);
			$table = new Datatable();
			$row = $this->model->getTransferList();
			
			return $table->createTable($fields, $row, "xsl");
		}
		
		function distbaltransferentry(){
				
		$btn = array(
			"Clear" => URL."distbaltransfer/distbaltransferentry"
		);

		
			$dynamicForm = new Dynamicform('Balance Transfer.<span style="color:red;"></span><span style="color:red;"> Your balance is : '.$this->model->getBalance().'</span>',$btn);		
				
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distbaltransfer/createtxn", "Save",$this->values);
			
			$this->view->table = "";
			
			$this->view->renderpage('distbaltransfer/distbaltransferentry', false);
		}
		
		public function deletecustomer($cus){
			$where = "bizid=".Session::get('sbizid')." and xrdin='".$cus."'";
			$this->model->delete($where);
			$this->view->message = "";
			$this->customerlist();
		}
		
		public function showpost(){
			$txn = $_POST['xsl'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."distbal/distbalentry"
		);
		
		$tblvalues = $this->model->getSingleBal($txn);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
		
		
			
			$dynamicForm = new Dynamicform("Retailer Balance", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distbal/savedistbal", "Save",$tblvalues);
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('distbal/distbalentry');
		}
		
		function inforindt($rin){
			return $this->model->getInfoRinDetail($rin);
		}
		function getvouamount($vou){
			return $this->model->getVoucherDetail($vou);
		}
}