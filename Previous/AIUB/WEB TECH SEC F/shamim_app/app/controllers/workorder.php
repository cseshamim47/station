<?php
class Workorder extends Controller{
	
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
				if($menus["xsubmenu"]=="Work Order")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/workorder/js/getitemdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"wonum"=>"",
			"xref"=>"",
			"toname"=>"",
			"toorg"=>"",
			"tomobile"=>"",
			"toadd"=>"",
			"xsubject"=>"",
			"xnotes"=>"",
			"xamount"=>"0.00",
			"xproject"=>""
			);
			
			$this->fields = array(
						array(
							"wonum-text"=>'Txn Number_maxlength="20" readonly',
							"xdate-datepicker" => 'Date_""'
						),
						array(
							"xref-text"=>'Ref_maxlength="250"',
							"toname-text"=>'To Name_maxlength="100"'
						),
						array(
							"toorg-text"=>'To Org_maxlength="250"',
							"tomobile-text"=>'To Mobile_maxlength="100"'
						),
						array(
							"xsubject-text"=>'Subject_maxlength="100"',
							"xamount-text_number"=>'Total Amount*~star_number="true" minlength="1" maxlength="18"',
						),
						array(
							"xproject-select_Project"=>'Project*~star_maxlength="50"'
						),
						array(
							"toadd-textarea"=>'Address_maxlength="250"'
						),
						array(
							"xnotes-textarea"=>'Note_maxlength="250"'
						)
					);
						
								
		}
		
		public function index(){
			$this->view->rendermainmenu('workorder/index');
		}
		
		public function savedistreq(){

					
				$xdate = $dt = date("Y/m/d");
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				
				$keyfieldval="0";
				$form = new Form();
				$data = array();
				$success=0;
				$result = ""; 
				
				try{
				
					if($_POST['xproject']=="" || empty($_POST['xproject'])){
						throw new Exception("Please Select Project!");
					}
							
				$form	->post('xref')
						->val('maxlength', 250)
						
						->post('toname')
						->val('maxlength', 100)
						
						->post('toorg')
						->val('maxlength', 250)
						
						->post('tomobile')
						->val('maxlength', 100)
						
						->post('xsubject')
						->val('maxlength', 100)
						
						->post('xproject')
						
						->post('toadd')
						->val('maxlength', 250)

						->post('xnotes')
						->val('maxlength', 250)
			
						->post('xamount');
						
				$form	->submit();
				
				$data = $form->fetch();

				$keyfieldval = $this->model->getKeyValue("workorder","wonum","WO-","6");
				
				// if($_POST['xamount']<=0){
				// 	throw new Exception("Amount must be greater than 0!");
				// }
				
				
				
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['wonum'] = $keyfieldval;
				$data['xdate'] = $date;
				$data['xbranch'] = Session::get('sbranch');
				
				$success = $this->model->create($data);
				
				if(empty($success))
					$success=0;
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					$this->result = 'Work Order Created Successful';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Work Order! Reason: Could be Duplicate Account Code or system error!";
				
				$this->showentry($keyfieldval, $this->result);
		}
		
		public function edit(){
			
			if(empty($_POST['wonum'])){
					header ('location: '.URL.'workorder/distreqentry');
					exit;
				}
			$result = "";
			
			$hd = array();
			$dt = array();
			
				
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				
			$success=false;
			$ptnum = $_POST['wonum'];
			$form = new Form();
				$data = array();
				
				try{
					
					if($_POST['xproject']=="" || empty($_POST['xproject'])){
						throw new Exception("Please Select Project!");
					}
					$form	->post('xref')
							->val('maxlength', 250)
							
							->post('toname')
							->val('maxlength', 100)
							
							->post('toorg')
							->val('maxlength', 250)
							
							->post('tomobile')
							->val('maxlength', 100)
							
							->post('xsubject')
							->val('maxlength', 100)
						
							->post('xproject')
							
							->post('toadd')
							->val('maxlength', 250)

							->post('xnotes')
							->val('maxlength', 250)
				
							->post('xamount');
						
						
				$form	->submit();
				$data = $form->fetch();	
				
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
				$data['xdate'] = $date;
				$success = $this->model->edit($data, $ptnum);
				
				
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
				
				 $this->showentry($ptnum, $result);
		}
		
		
		public function showitem($ptnum, $row, $result=""){
		if($ptnum=="" || $row==""){
			header ('location: '.URL.'workorder/distreqentry');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."workorder/distreqentry"
		);
		
		$tblvalues = $this->model->getImpt($ptnum);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
				"xref" => $tblvalues[0]['xref'],
				"toname" => $tblvalues[0]['toname'],
				"toorg" => $tblvalues[0]['toorg'],
				"tomobile" => $tblvalues[0]['tomobile'],
				"xsubject" => $tblvalues[0]['xsubject'],
				"xproject" => $tblvalues[0]['xproject'],
				"toadd"=> $tblvalues[0]['toadd'],
				"xnotes"=> $tblvalues[0]['xnotes'],
				"xamount"=> $tblvalues[0]['xamount'],
				"wonum"=> $tblvalues[0]['wonum'],
				"xdate"=> $tblvalues[0]['xdate']
			);
		

		// form data
			
			$dynamicForm = new Dynamicform("Stock Transfer", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields,  URL."workorder/edit", "Update",$tblvalues, URL."workorder/showpost");
			
			$this->view->table = $this->renderTable($ptnum);
			
			$this->view->renderpage('workorder/distreqentry');
		}
		
		
		
		public function showentry($ptnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."workorder/distreqentry"
		);
		
		$tblvalues = $this->model->getImpt($ptnum);
		$status = "";
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else{
			$status = $tblvalues[0]['xstatus'];
			$tblvalues=array(
				"xref" => $tblvalues[0]['xref'],
				"toname" => $tblvalues[0]['toname'],
				"toorg" => $tblvalues[0]['toorg'],
				"tomobile" => $tblvalues[0]['tomobile'],
				"xsubject" => $tblvalues[0]['xsubject'],
				"xproject" => $tblvalues[0]['xproject'],
				"toadd"=> $tblvalues[0]['toadd'],
				"xnotes"=> $tblvalues[0]['xnotes'],
				"xamount"=> $tblvalues[0]['xamount'],
				"wonum"=> $tblvalues[0]['wonum'],
				"xdate"=> $tblvalues[0]['xdate']
			);
						
		}
		$confirmurl = "";
		$saveurl = URL."workorder/savedistreq";
		$opbtn = "Save";
		if($status=="Created"){
			$confirmurl = array(URL."workorder/confirmrec", "Confirm");
			$saveurl = URL."workorder/edit";
			$opbtn="Edit";
		}
		if($status=="Confirmed"){
			$confirmurl = array(URL."workorder/cancelrec", "Cancel");
			$saveurl = "";
			$opbtn="";
			$result = $result.'<br><a style="color:red" id="invnum" href="'.URL.'workorder/showinvoice/'.$ptnum.'">Click To Print Work Order - '.$ptnum.'</a>';
		}
						
			$dynamicForm = new Dynamicform("Work Order", $btn, $result);	//.'</br><a href='.URL.'workorder/printchalan/'.$ptnum.'>Click to print - '.$ptnum.'</a>'	
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, $opbtn,$tblvalues,URL."workorder/showpost",$confirmurl);
			
			$this->view->table = $this->renderTable($ptnum);
			
			$this->view->renderpage('workorder/distreqentry');
		}
		
		function renderTable($ptnum){
			$fields = array(
						"wonum-Txn Number",
						"xdate-Date",
						"toname-To Name",
						"toogr-To Org",
						"xamount-Amount"
						);
			$table = new Datatable();
			$row = $this->model->getWorkOrder('LIMIT 5');
			
			return $table->myTable($fields, $row, "wonum",URL."workorder/showentry/");
		}
		
		
		function imptlist($status){
			$rows = $this->model->getWorkOrderList($status); 
			$cols = array("wonum-Txn Number","xdate-Date","toname-To Name","toorg-To Ogr","xamount-Amount");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "wonum",URL."workorder/showentry/");
			
			$this->view->renderpage('workorder/distreqlist', false);
		}
		
		
				
		function printchalan($ptnum){
			
			$rows = $this->model->printchalan($ptnum);
			
			$rptname = "Transfer Chalan";
			$txnno = "";
			$xwh = "";
			$dt = "";
			$xtxnwh = "";
			$totalqty = 0;
			
			foreach($rows as $key=>$value){
				
				
				$xwh = $value["xwh"];
				$dt = $value["xdate"];
				$xtxnwh = $value["xtxnwh"];
				$totalqty += $value["xqty"];
				
			}
			
			$this->view->vrow = $rows;
			$this->view->org = Session::get("sbizlong");
			$this->view->vrptname = $rptname;
			$this->view->txnno = $ptnum;
			$this->view->xtxnwh = $xtxnwh;
			$this->view->xwh = $xwh;
			$this->view->dt = $dt;
			$this->view->totqty = $totalqty;
			
						
			$this->view->renderpage('workorder/printchalan', false);
		}
		
		function distreqentry(){
				
		$btn = array(
			"Clear" => URL."workorder/distreqentry"
		);

		
			$dynamicForm = new Dynamicform("Product Transfer",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."workorder/savedistreq", "Save",$this->values, URL."workorder/showpost");
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('workorder/distreqentry', false);
		}
		
		
		
		public function confirmrec(){
			if(!isset($_POST["wonum"])){
				header ('location: '.URL.'workorder/distreqentry');
				exit;
			}
			$ptnum = $_POST['wonum'];
			$tblvalues = $this->model->getImpt($ptnum);
			$message = "Could not Confirmed!";
			if(!empty($tblvalues)){
				if($tblvalues[0]["xstatus"]=="Created"){

					//create a sub account for work order
					$data = array();
					$data['bizid'] = Session::get('sbizid');
					$data['xacc'] = "9000";
					$data['xaccsub'] = $ptnum;
					$data['xdesc'] = $tblvalues[0]["toorg"];
					$data['zemail'] = Session::get('suser');			
					$this->model->confirm($ptnum);

					$res = $this->model->createChartSub($data);
				// 	if($res>0){
				// 		if($tblvalues[0]["xamount"]!=0){
				// 			$xdate = date("Y/m/d");
				// 			$dt = str_replace('/', '-', $xdate);
				// 			$date = date('Y-m-d', strtotime($dt));
				// 			$year = date('Y',strtotime($date));
				// 			$month = date('m',strtotime($date)); 
				// 			$yearoffset = Session::get('syearoffset');
				// 				//glheader goes here
				// 			$xyear = 0;
				// 			$per = 0;
				// 			foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
				// 				$per = $key;
				// 				$xyear = $val;
				// 			}
				// 			$voucher = $this->model->getKeyValue("glheader","xvoucher","GRNV-","5");
				// 			$data = array();

				// 			$data['bizid'] = Session::get('sbizid');
				// 			$data['zemail'] = Session::get('suser');
				// 			$data['xnarration'] = "C/S Work Order:".$ptnum." Org: ".$tblvalues[0]["toorg"];						
				// 			$data['xyear'] = $xyear;
				// 			$data['xper'] = $per;
				// 			$data['xvoucher'] = $voucher;
				// 			$data['xdate'] = $date;
				// 			$data['xstatusjv'] = 'Confirmed';
				// 			$data['xbranch'] = Session::get('sbranch');;
				// 			$data['xdoctype'] = "Work Order";
				// 			$data['xsite'] = $tblvalues[0]["xproject"];
				// 			$data['xdocnum'] = $ptnum;

				// 			$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,
				// 				`xexch`,`xprime`,xflag";

				// 			$vals = "";	
				// 			$vals .= "(" . Session::get('sbizid') . ",'". $voucher ."','1','5007','Asset','Ledger','None','','".Session::get('sbizcur')."','". $tblvalues[0]["xamount"] ."','1','". $tblvalues[0]["xamount"] ."','Debit'),(" . Session::get('sbizid') . ",'". $voucher ."','2','9000','Liability','AP','Sub Account','".$ptnum."','".Session::get('sbizcur')."','-". $tblvalues[0]["xamount"] ."','1','-". $tblvalues[0]["xamount"] ."','Credit')";

				// 			$success = $this->model->confirmgl($data, $cols, $vals);
				// 		}
				// 	}


					$message = " Confirmed!";		
				}else if($tblvalues[0]["xstatus"]=="Confirmed"){
					$message = "Already Confirmed!";
				}else{
					$message = "Document Canceled!";
				}
			}
			$this->showentry($ptnum, $message);
		}
		public function cancelrec(){
			if(!isset($_POST["wonum"])){
				header ('location: '.URL.'workorder/distreqentry');
				exit;
			}
			$ptnum = $_POST['wonum'];

			$tblvalues = $this->model->getImpt($ptnum);
			$message = "Could not Cancel document!";
			if(!empty($tblvalues)){
				if($tblvalues[0]["xstatus"]=="Confirmed"){
					$message = "Document Canceled!";					
					$this->model->cancel($ptnum);
				}else if($tblvalues[0]["xstatus"]=="Canceled"){
					$message = "Already Canceled!";
				}
			}
				
				
			$this->showentry($ptnum, $message);
			
		}
		function deleteitem($ptnum, $rw){

			$where = " where bizid=".Session::get('sbizid')." and wonum='".$ptnum."' and xrow=".$rw;

			$result = $this->model->dbdelete($where);

			
			$this->showentry($ptnum, "Deleted Successfully!");
			
		}

		public function showpost(){
		
			$ptnum = $_POST['wonum'];
			$this->showentry($ptnum);
		
		}
		function showinvoice($wonum=""){
			
			$this->view->reqmst = $this->model->getWorkOrderPrint($wonum);
			
			$this->view->renderpage('workorder/printinvoice');		
		}
		
}