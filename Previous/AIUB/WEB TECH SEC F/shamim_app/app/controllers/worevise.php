<?php
class Worevise extends Controller{
	
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
				if($menus["xsubmenu"]=="Work Order Revise")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/worevise/js/getitemdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"wornum"=>"",
			"wonum"=>"",
			"xref"=>"",
			"toname"=>"",
			"toorg"=>"",
			"tomobile"=>"",
			"toadd"=>"",
			"xsubject"=>"",
			"xnotes"=>"",
			"xamount"=>"0.00",
			"xprevamount"=>"0.00",
			"xtotamount"=>"0.00",
			"xproject"=>""
			);
			
			$this->fields = array(
						array(
							"wornum-text"=>'Txn Number_maxlength="20" readonly',
							"xdate-datepicker" => 'Date_""'
						),
						array(
							"wonum-group_".URL."jsondata/wopicklist"=>'Work Order Number*~star_maxlength="20" readonly',
							"xref-text"=>'Ref_maxlength="250" readonly'
							
						),
						array(
							"toname-text"=>'To Name_maxlength="100" readonly',
							"toorg-text"=>'To Org_maxlength="250" readonly',
						),
						array(
							"tomobile-text"=>'To Mobile_maxlength="100" readonly',
							"xsubject-text"=>'Subject_maxlength="100" readonly',
						),
						array(
							"xprevamount-text_number"=>'Previous Amount_number="true" minlength="1" maxlength="18" readonly',
							"xproject-text"=>'Project*~star_maxlength="50" readonly'
						),
						array(
							"xamount-text_number"=>'Revise Amount*~star_number="true" minlength="1" maxlength="18"',
							"xtotamount-text_number"=>'Total Amount_number="true" minlength="1" maxlength="18" readonly'
						),
						array(
							"toadd-textarea"=>'Address_maxlength="250" readonly'
						),
						array(
							"xnotes-textarea"=>'Note_maxlength="250"'
						)
					);
						
								
		}
		
		public function index(){
			$this->view->rendermainmenu('worevise/index');
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
					
					if($_POST['wonum']==""){
						throw new Exception("Please Enter Work Order Number!");
					}

					if($_POST['xproject']=="" || empty($_POST['xproject'])){
						throw new Exception("Please Select Project!");
					}
							
				$form	->post('wonum')
						->val('minlength', 1)

						->post('xref')
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
			
						->post('xprevamount')
						
						->post('xamount');
						
				$form	->submit();
				
				$data = $form->fetch();

				$keyfieldval = $this->model->getKeyValue("worevise","wornum","WOR-","6");
				
				// if($_POST['xamount']<=0){
				// 	throw new Exception("Amount must be greater than 0!");
				// }
				
				
				
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['wornum'] = $keyfieldval;
				$data['xdate'] = $date;
				$data['xbranch'] = Session::get('sbranch');
				
				$success = $this->model->create($data);
				
				if(empty($success))
					$success=0;
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					$this->result = 'Work Order Revise Successful';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Revise Work Order! Reason: Could be Duplicate Account Code or system error!";
				
				$this->showentry($keyfieldval, $this->result);
		}
		
		public function edit(){
			
			if(empty($_POST['wornum'])){
					header ('location: '.URL.'worevise/distreqentry');
					exit;
				}
			$result = "";
			
			$hd = array();
			$dt = array();
			
				
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				
			$success=false;
			$ptnum = $_POST['wornum'];
			$form = new Form();
				$data = array();
				
				try{
					
					if($_POST['wonum']==""){
						throw new Exception("Please Enter Work Order Number!");
					}

					if($_POST['xproject']=="" || empty($_POST['xproject'])){
						throw new Exception("Please Select Project!");
					}
					
					$form	->post('wonum')
							->val('minlength', 1)

							->post('xref')
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
							
							->post('xprevamount')
				
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
			header ('location: '.URL.'worevise/distreqentry');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."worevise/distreqentry"
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
				"xprevamount"=> $tblvalues[0]['xprevamount'],
				"xtotamount"=> $tblvalues[0]['xtotamount'],
				"wonum"=> $tblvalues[0]['wonum'],
				"xdate"=> $tblvalues[0]['xdate']
			);
		

		// form data
			
			$dynamicForm = new Dynamicform("Work Order Revise", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields,  URL."worevise/edit", "Update",$tblvalues, URL."worevise/showpost");
			
			$this->view->table = $this->renderTable($ptnum);
			
			$this->view->renderpage('worevise/distreqentry');
		}
		
		
		
		public function showentry($ptnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."worevise/distreqentry"
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
				"xprevamount"=> $tblvalues[0]['xprevamount'],
				"xtotamount"=> $tblvalues[0]['xtotamount'],
				"wornum"=> $tblvalues[0]['wornum'],
				"wonum"=> $tblvalues[0]['wonum'],
				"xdate"=> $tblvalues[0]['xdate']
			);
						
		}
		$confirmurl = "";
		$saveurl = URL."worevise/savedistreq";
		$opbtn = "Save";
		if($status=="Created"){
			$confirmurl = array(URL."worevise/confirmrec", "Confirm");
			$saveurl = URL."worevise/edit";
			$opbtn="Edit";
		}
		if($status=="Confirmed"){
			$confirmurl = array(URL."worevise/cancelrec", "Cancel");
			$saveurl = "";
			$opbtn="";
			$result = $result.'<br><a style="color:red" id="invnum" href="'.URL.'worevise/showinvoice/'.$ptnum.'">Click To Print Work Order Revise - '.$ptnum.'</a>';
		}
		
						
			$dynamicForm = new Dynamicform("Work Order Revise", $btn, $result);	//.'</br><a href='.URL.'worevise/printchalan/'.$ptnum.'>Click to print - '.$ptnum.'</a>'	
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, $opbtn,$tblvalues,URL."worevise/showpost",$confirmurl);
			
			$this->view->table = $this->renderTable($ptnum);
			
			$this->view->renderpage('worevise/distreqentry');
		}
		
		function renderTable($ptnum){
			$fields = array(
						"wornum-Txn Number",
						"wonum-WO Number",
						"xdate-Date",
						"toname-To Name",
						"toogr-To Org",
						"xamount-Revise Amount"
						);
			$table = new Datatable();
			$row = $this->model->getworevise('LIMIT 5');
			
			return $table->myTable($fields, $row, "wornum",URL."worevise/showentry/");
		}
		
		
		function imptlist($status){
			$rows = $this->model->getworeviseList($status); 
			$cols = array("wornum-Txn Number","wonum-WO Number","xdate-Date","toname-To Name","toorg-To Ogr","xamount-Revise Amount");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "wornum",URL."worevise/showentry/");
			
			$this->view->renderpage('worevise/distreqlist', false);
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
			
						
			$this->view->renderpage('worevise/printchalan', false);
		}
		
		function distreqentry(){
				
		$btn = array(
			"Clear" => URL."worevise/distreqentry"
		);

		
			$dynamicForm = new Dynamicform("Work Order Revise",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."worevise/savedistreq", "Save",$this->values, URL."worevise/showpost");
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('worevise/distreqentry', false);
		}
		
		
		
		public function confirmrec(){
			if(!isset($_POST["wornum"])){
				header ('location: '.URL.'worevise/distreqentry');
				exit;
			}
			$ptnum = $_POST['wornum'];
			$tblvalues = $this->model->getImpt($ptnum);
			$message = "Could not Confirmed!";
			if(!empty($tblvalues)){
				if($tblvalues[0]["xstatus"]=="Created"){
		
					$this->model->confirm($ptnum);

					//$res = $this->model->getChartSub($tblvalues[0]["wonum"]);
					//echo count($res);die;
					// if(count($res)>0){
					// 	if($tblvalues[0]["xamount"]!=0){
					// 		$xdate = date("Y/m/d");
					// 		$dt = str_replace('/', '-', $xdate);
					// 		$date = date('Y-m-d', strtotime($dt));
					// 		$year = date('Y',strtotime($date));
					// 		$month = date('m',strtotime($date)); 
					// 		$yearoffset = Session::get('syearoffset');
					// 			//glheader goes here
					// 		$xyear = 0;
					// 		$per = 0;
					// 		foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					// 			$per = $key;
					// 			$xyear = $val;
					// 		}
					// 		$voucher = $this->model->getKeyValue("glheader","xvoucher","GRNV-","5");
					// 		$data = array();

					// 		$data['bizid'] = Session::get('sbizid');
					// 		$data['zemail'] = Session::get('suser');
					// 		$data['xnarration'] = "C/S Work Order:".$ptnum." Org: ".$tblvalues[0]["toorg"];						
					// 		$data['xyear'] = $xyear;
					// 		$data['xper'] = $per;
					// 		$data['xvoucher'] = $voucher;
					// 		$data['xdate'] = $date;
					// 		$data['xstatusjv'] = 'Confirmed';
					// 		$data['xbranch'] = Session::get('sbranch');;
					// 		$data['xdoctype'] = "Work Order Revise";
					// 		$data['xdocnum'] = $ptnum;

					// 		$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,
					// 			`xexch`,`xprime`,xflag";

					// 		$vals = "";	
					// 		$vals .= "(" . Session::get('sbizid') . ",'". $voucher ."','1','5007','Asset','Ledger','None','','".Session::get('sbizcur')."','". $tblvalues[0]["xamount"] ."','1','". $tblvalues[0]["xamount"] ."','Debit'),(" . Session::get('sbizid') . ",'". $voucher ."','2','9000','Liability','AP','Sub Account','". $tblvalues[0]["wonum"] ."','".Session::get('sbizcur')."','-". $tblvalues[0]["xamount"] ."','1','-". $tblvalues[0]["xamount"] ."','Credit')";
					// 		//print_r($vals);die;
					// 		$success = $this->model->confirmgl($data, $cols, $vals);
					// 	}
					// }


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
			if(!isset($_POST["wornum"])){
				header ('location: '.URL.'worevise/distreqentry');
				exit;
			}
			$ptnum = $_POST['wornum'];

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

			$where = " where bizid=".Session::get('sbizid')." and wornum='".$ptnum."' and xrow=".$rw;

			$result = $this->model->dbdelete($where);

			
			$this->showentry($ptnum, "Deleted Successfully!");
			
		}

		public function showpost(){
		
			$ptnum = $_POST['wornum'];
			$this->showentry($ptnum);
		
		}

		function showinvoice($wonum=""){
			
			$this->view->reqmst = $this->model->getWorkOrderPrint($wonum);
			
			$this->view->renderpage('worevise/printinvoice');		
		}
		
}