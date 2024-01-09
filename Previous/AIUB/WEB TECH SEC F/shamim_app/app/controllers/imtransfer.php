<?php
class imtransfer extends Controller{
	
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
				if($menus["xsubmenu"]=="Inventory Transfer")
					$iscode=1;				
								
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/posentry/js/getitemdt.js','views/diststocktransfer/js/rindt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"ximptnum"=>"",
			"xwh"=>"",
			"xtxnwh"=>"",
			"xitemcode"=>"",
			"xdesc"=>"",
			"xqty"=>"0",
			"xrow"=>"0",
			"xstdcost"=>"0"
			);
			
			$this->fields = array(array(
							"ximptnum-text"=>'Transfer No_maxlength="20" readonly',
							"xdate-datepicker" => 'Date_""',
							"xrow-hidden"=>''
							),array(
							"xwh-select_Warehouse"=>'From Warehouse*~star_maxlength="20"',
							"xtxnwh-select_Warehouse"=>'To Warehouse*~star_maxlength="20"',
							),
						array(
							"xitemcode-group_".URL."itempicklist/itempicklist"=>'Item Code_""',
							"xdesc-text"=>'Description_readonly'							
							),
						array(							
							"xqty-text_digit"=>'Quantity*~star_number="true" minlength="1" maxlength="18" required'							
							),
						array(							
							"xrow-hidden"=>'',
							"xstdcost-hidden"=>''						
							)
						);
						
								
		}
		
		public function index(){
		
		
					
			$this->view->rendermainmenu('imtransfer/index');
			
		}
		
		public function save(){
					
				$xdate = $dt = date("Y/m/d");
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
				$xyear = 0;
				$per = 0;
				
				$txnnum = $_POST['ximptnum'];
				$keyfieldval="0";
				$form = new Form();
				$data = array();
				$success=0;
				$result = ""; 
				$itemdetail = $this->model->getItemDetail("xitemcode", $_POST['xitemcode']);
				
				try{
				
					
				$form	->post('xitemcode')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('ximptnum')

						->post('xwh')

						->post('xtxnwh')		
				
						
						->post('xqty')
						
						->post('xstdcost');
						
				$form	->submit();
				
				$data = $form->fetch();
				
				if($data['ximptnum'] == "")
					$keyfieldval = $this->model->getKeyValue("imtransfer","ximptnum","PT--".Session::get('suser')."-","5");
				else
					$keyfieldval = $data['ximptnum'];
					
				$stock = $this->model->getItemStock($data['xwh'], $data['xitemcode']);
				
				if(!empty($stock)){
					if($stock[0]['xbalance']<$data['xqty']){
						throw new Exception("Not enough stock!");
					}
				}else
					throw new Exception("Not enough stock!");

				if($_POST['xqty']<=0){
					throw new Exception("Product quantity must be greater than 0!");
				}
				if($_POST['xwh']==""){
					throw new Exception("Please select From warehouse!");
				}
				if($_POST['xtxnwh']==""){
					throw new Exception("Please select To warehouse!");
				}

				
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['ximptnum'] = $keyfieldval;
				$data['xdate'] = $date;
				$data['xbranch'] = Session::get('sbranch');
				$data['xproj'] = Session::get('sbranch');

				
				
				$rownum = $this->model->getRow("imtransferdet","ximptnum",$data['ximptnum'],"xrow");
				
				
				$cols = "`bizid`,`ximptnum`,`xrow`,`xitemcode`,`xitembatch`,`xqty`,`xdate`,`xstdcost`
				,`zemail`,`xwh`,`xyear`,`xper`,`xtxnwh`,`xdoctype`,`xsign`";
				
				$vals = "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $rownum ."','". $data['xitemcode'] ."','". $data['xitemcode'] ."',
				'". $data['xqty'] ."','". $date ."','". $data['xsalesprice'] ."','". $stno ."','". Session::get('suser') ."','". Session::get('suser') ."',
				'". $xyear ."','". $month ."','". $data['xrdinto'] ."','Product Transfer',-1)";
				
				 	
				$success = $this->model->create($data, $cols, $vals);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					$this->result = 'Product Transfered Successfully';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Product Transfer! Reason: Could be Duplicate Code or system error!";
				
				
				
				 $this->showentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		/*
		
		public function showdistreq($reqnum, $row, $result=""){
		if($reqnum=="" || $row==""){
			header ('location: '.URL.'diststocktransfer/distreqentry');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."diststocktransfer/distreqentry"
		);
		
		$tblvalues = $this->model->getImreq($reqnum);
		$tbldtvals = $this->model->getSingleReqDt($reqnum, $row);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"ximptnum"=>$tblvalues[0]['ximptnum'],
					"xrdin"=>$tblvalues[0]['xrdin'],
					"rinname"=>$tblvalues[0]['rinname'],
					"xitemcode"=>$tbldtvals[0]['xitemcode'],
					"xitemdesc"=>$tbldtvals[0]['xitemdesc'],
					"xqty"=>$tbldtvals[0]['xqty'],
					"xrow"=>$tbldtvals[0]['xrow'],
					"xrate"=>$tbldtvals[0]['xrate']
					);
			
		// form data
		$this->view->balance = $this->model->getBalance();
			
			$dynamicForm = new Dynamicform("Product Transfer", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields,  URL."diststocktransfer/savedistreq", "Save",$tblvalues, URL."diststocktransfer/showpost");
			
			$this->view->table = $this->renderTable($reqnum);
			
			$this->view->renderpage('diststocktransfer/distreqentry');
		}
		
		*/
		
		public function showentry($ptnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."diststocktransfer/ptnentry"
		);
		
		$tblvalues = $this->model->getImpt($ptnum);
		$status = "";
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else{
			$status = $tblvalues[0]['xstatus'];
			$tblvalues=array(
					"xptnno"=>$tblvalues[0]['xptnno'],
					"ximptnum"=>$tblvalues[0]['ximptnum'],
					"xrdinto"=>$tblvalues[0]['xrdin'],
					"rinname"=>$tblvalues[0]['rinname'],
					"xitemcodeosp"=>"",
					"xdesc"=>"",
					"xqty"=>"0",
					"xrow"=>"0",
					"xsalesprice"=>"0"
					);
						
		}
		$confirmurl = "";
		$saveurl = URL."diststocktransfer/savedistreq";
		$opbtn = "Save";
		if($status=="Created"){
			$confirmurl = URL."diststocktransfer/confirmrec";
			$saveurl = URL."diststocktransfer/savedistreq";
			$opbtn="Save";
		}
		if($status=="Confirmed"){
			$confirmurl = "";
			$saveurl = "";
			$opbtn="";
		}
		
			//print_r($tblvalues); die;
			$this->view->balance = $this->model->getBalance();
			
			
			
			$dynamicForm = new Dynamicform("Product Transfer", $btn, $result.'<a href='.URL.'diststocktransfer/printchalan/'.$ptnum.'>'.$ptnum.'</a>');		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, $opbtn,$tblvalues,"",$confirmurl);
			
			$this->view->table = $this->renderTable($ptnum);
			
			$this->view->renderpage('diststocktransfer/distreqentry');
		}
		
		function renderTable($ptnum){
			$fields = array(
						"xrow-Sl",
						"xitemcodeosp-Item Code",
						"xitemdesc-Description",
						"xqty-Quantity",
						"xsalesprice-Rate",
						"xsalestotal-Total"
						);
			$table = new Datatable();
			$row = $this->model->getimtransferdt($ptnum);
			
			return $table->myTable($fields, $row, "xrow");
			
			
		}
		
		
		function imptlist($status="Confirmed"){
			$rows = $this->model->getImptList($status); 
			$cols = array("xdate-Date","ximptnum-Transfer No");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "ximptnum",URL."diststocktransfer/showentry/");
			
			$this->view->renderpage('diststocktransfer/distreqlist', false);
		}
		function rcvlist($status=""){
			
			$rows = $this->model->getImptRcvList($status); 
			$cols = array("xdate-Date","ximptnum-Transfer No");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "ximptnum",URL."diststocktransfer/showreceive/");
			
			$this->view->renderpage('diststocktransfer/distreqlist', false);
		}
		
		function showreceive($dono){
			
			$rows = $this->model->printdo($dono);
			
			$rptname = "Delivery Chalan & Bill";
			
			$dono = "";
			$cusname = "";
			$dt = "";
			$rin = "";
			$totalqty = 0;
			$totalamt = 0;
			$status = "";
			foreach($rows as $key=>$value){
				$status = $value["xstatus"];
				$dono = $value["ximptnum"];
				$cusname = $value["rinname"];
				$dt = $value["xdate"];
				$rin = $value["xrdinto"];
				$totalqty += $value["xqty"];
				$totalamt += $value["xqty"]*$value["xsalesprice"];
			}
			$this->view->status = $status;
			$this->view->vrow = $rows;
			$this->view->org = Session::get("sbizlong");
			$this->view->vrptname = $rptname;
			$this->view->dono = $dono;
			$this->view->xrdin = $rin;
			$this->view->xorg = $cusname;
			$this->view->dt = $dt;
			$this->view->totqty = $totalqty;
			$this->view->totalamt = $totalamt;
						
			$this->view->renderpage('diststocktransfer/doreceive', false);
		}
		
		function printchalan($dono){
			
			$rows = $this->model->printdo($dono);
			
			$rptname = "Delivery Chalan & Bill";
			$dono = "";
			$cusname = "";
			$dt = "";
			$rin = "";
			$totalqty = 0;
			$totalamt = 0;
			foreach($rows as $key=>$value){
				
				$dono = $value["ximptnum"];
				$cusname = $value["rinname"];
				$dt = $value["xdate"];
				$rin = $value["xrdinto"];
				$totalqty += $value["xqty"];
				$totalamt += $value["xqty"]*$value["xsalesprice"];
			}
			
			$this->view->vrow = $rows;
			$this->view->org = Session::get("sbizlong");
			$this->view->vrptname = $rptname;
			$this->view->dono = $dono;
			$this->view->xrdin = $rin;
			$this->view->xorg = $cusname;
			$this->view->dt = $dt;
			$this->view->totqty = $totalqty;
			$this->view->totalamt = $totalamt;
						
			$this->view->renderpage('diststocktransfer/printdo', false);
		}
		
		function distreqentry($message){
				
		$btn = array(
			"Clear" => URL."diststocktransfer/ptnentry"
		);

		// form data
		
		$this->view->balance = $this->model->getBalance();
		
			$dynamicForm = new Dynamicform("Product Transfer",$btn,$message);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."diststocktransfer/savedistreq", "Save",$this->values);
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('diststocktransfer/distreqentry', false);
		}
		
		function ptnentry(){
				
		$btn = array(
			"Have PTN? Click" => URL."diststocktransfer/distreqentry/I Have PTN No."
		);

		// form data
			$this->view->balance = $this->model->getBalance();
		
			$dynamicForm = new Dynamicform("Product Transfer",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."diststocktransfer/createtxn", "Get PTN No",$this->values);
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('diststocktransfer/distreqentry', false);
		}
		
		
		
		public function createtxn(){
			
		$xdate = date("Y/m/d");
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date));	
			
			
				$form = new Form();
				$data = array();
				$success=0;
				$result = ""; 
				
				try{
					
				if($_POST['xrdinto']==""){
						throw new Exception("Please Enter RIN (Transfer to) No!");
					}
					
				$topupbal = $this->model->getBalance()-5;	
				if($topupbal<0){
						throw new Exception("Not sufficient balance! Please deposit first!");
					}		
				
				$rindt = $this->model->getrindt($_POST['xrdinto']);
				
				if(empty($rindt)){
					throw new Exception("Rin is not regidtered!");
				}
				
								
				$form	->post('xrdinto')
						->val('minlength', 4)
						->val('maxlength', 50);
						
						
				$form	->submit();
				
				$data = $form->fetch();
				
								
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
				
				if($this->sendotn($ttnno, Session::get('suser'))){	
					$success = $this->model->createttn($data);
					$this->result = "PTN No Created! SMS sent to your mobile. Please Check!";
				}else{
					$this->result = "SMS not sent. Couldn't create PTN!";
				}
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				
				 $this->distreqentry($this->result);
				 
				 
				
		}
		
		public function sendotn($otn, $torin){
						
						$sendsms = new Sendsms();
						$result = "";
						$mobile = $this->model->getmobileno();
						//echo $mobile[0]['xmobile']; die;
						$dbmobile = $mobile[0]['xmobile'];
						if (substr($dbmobile, 0, 1) === '+'){
							$dbmobile=str_replace("+","",$dbmobile);
						}
						if(strlen($dbmobile)==11){
							$dbmobile="88".$dbmobile;
						}
						
						$smstext = 'Your PTN Number is '.$otn.'. Enter this number for Product Transfer to RIN -'.$torin.'. BDT 5 has been deducted as processing fee from your account. Thanks by ABL'; //echo $tonum.' '.$smstext; die;
													
						//$sendsms->sendSingleSms("https://api.mobireach.com.bd/SendTextMessage", "pure", "Akashnil@1234", "8801833318683", $dbmobile, $smstext);
						return $sendsms->send_ayub_sms($smstext, $dbmobile);
					
		}
		
		public function confirmrec(){
				$message = " Confirmed!";
				$ptnum = $_POST['ximptnum'];
				$ptnno = $_POST['xptnno'];
				if(empty($this->model->getptnno($_POST['xptnno'])) || $_POST['xptnno']==""){
					$message = "Sorry! Its not a valid ptnno!";
				}else{					
					$where = " ximptnum='".$ptnum."' and zemail='". Session::get("suser") ."'";
					$this->model->confirm($where, $ptnno);
				}
			$this->showentry($ptnum, $message);
			
		}
		
		public function rcvconfirm(){
				
				$ptnum = $_POST['txnnum'];
				
									
					$where = " ximptnum='".$ptnum."' and xrdinto='". Session::get("suser") ."' and xstatusrcv='Open'";
					$this->model->confirmrcv($where, $ptnum);
				
			$this->showreceive("Open");
			
		}
}