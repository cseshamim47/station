<?php  
class Commissionpaid extends Controller{
	
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
				if($menus["xsubmenu"]=="Commission Paid")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/commissionpaid/js/codevalidator.js','views/commissionpaid/js/printinvoice.js','views/commissionpaid/js/getaccdt.js');
		$dt = date("Y/m/d");
		$date = date('Y-m-d', strtotime($dt));
		$year = date('Y',strtotime($date));
		$per = date('m',strtotime($date));
		//echo $per;die;
		$this->values = array(			
			"xdate"=>$dt,
			"xagent"=>"",
			"xshort"=>"",			
			"xadd1"=>"",
			"xphone"=>"",		
			"xcommtype"=>"",
			"xnarration"=>"",
			"xamount"=>"0",
			"xcomnum"=>""
			);
			
			$this->fields = array(
						array(
							"xdate-datepicker" => 'Date_""',
							),
						array(
							"xagent-group_".URL."agent/picklist"=>'Agent Code*~star_maxlength="50"',
							"xshort-text"=>'Agent Name*~star_maxlength="100" readonly',
							"xcomnum-hidden"=>''
							),
						array(
							"xadd1-text"=>'Address_maxlength="160" readonly',
							"xphone-text"=>'Mobile_maxlength="160" readonly',
							),
						array(
							"xnarration-textarea"=>'Narration_maxlength="160"',
							),
						array(
							"xcommtype-select_Commission Type"=>'Commission Type_maxlength="160"',
							"xamount-text_number"=>'Amount_number="true" minlength="1" maxlength="18" required'
							)
						);
		}
		 
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."commissionpaid/stuenrollentry",
		);	
		
		
			$this->view->rendermainmenu('commissionpaid/index');
			
		}
		
		public function savecollection(){
				$dt = $_POST['xdate'];
				$dte = str_replace('/', '-', $dt);
				$date = date('Y-m-d', strtotime($dte));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date));
				$agent = $_POST['xagent'];
				$keyfieldval="0";
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				
				//print_r($amount); die;
				
				//echo $studentid." ".$year." ".$feesamt; die;
				

				try{

					if(!is_numeric($_POST['xamount'])){
					throw new Exception("Not a valid number!");
					}

					if($_POST['xamount']<=0){
						throw new Exception("0 or less amount. Could not save!");
					}

					$form	->post('xagent')
							->val('minlength', 1)
							->val('maxlength', 20)
						
							->post('xnarration')

							->post('xcommtype')

							->post('xamount');
						
					$form	->submit();
					
					$data = $form->fetch();	

					$keyfieldval = $this->model->getKeyValue("commission","xcomnum","COM-","6");
									
					$data['xdate']= $date;
					$data['bizid'] = Session::get('sbizid');
					$data['zemail'] = Session::get('suser');
					$data['xbranch'] = Session::get('sbranch');
					$data['xper'] = $month;
					$data['xyear'] = $year;
					$success = $this->model->create($data);

				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				
				
				if($success>0)
					//$colsl = $this->model->getColsl()[0]['xcollectionno'];
					$this->result = "Commission Paid Created";
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Created Commission Paid!";
				
				 $this->showentry($keyfieldval, $this->result);
				 
				 
				
		}

		public function editcomission($comnum){
			
			
				$result = "";
				$dt = $_POST['xdate'];
				$dte = str_replace('/', '-', $dt);
				$date = date('Y-m-d', strtotime($dte));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date));
				
			$success=false;
			$form = new Form();
				$data = array();
				
				try{

					if(!is_numeric($_POST['xamount'])){
					throw new Exception("Not a valid number!");
					}

					if($_POST['xamount']<=0){
						throw new Exception("0 or less amount. Could not save!");
					}
					
			
				$form	->post('xagent')
							->val('minlength', 1)
							->val('maxlength', 20)
						
							->post('xnarration')

							->post('xcommtype')

							->post('xamount');
						
						 
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
				$data['xdate']= $date;
				$data['xper'] = $month;
				$data['xyear'] = $year;
				
				$success = $this->model->editCommission($data, $comnum);
				
				
				}catch(Exception $e){
					//echo $e->getMessage();die;
					$result = $e->getMessage();
					//echo $result;
				}
				if($result==""){
				if($success)
					$result = "Edited successfully";
				else
					$result = "Edit failed!";
				
				}
				 $this->showentry($comnum, $result);
				
		
		}



		public function confirmcollection(){
				$dt = $_POST['xdate'];
				$dte = str_replace('/', '-', $dt);
				$date = date('Y-m-d', strtotime($dte));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date));

				$agent = $_POST['xagent'];
				$voucher="";
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				$comnum = $_POST['xcomnum'];
				//print_r($comnum);die;
				$getagent = $this->model->getAgent($agent);

				$rows = $this->model->getInsColldt($comnum);

				$glinterface = $this->model->glsalesinterface();
				//print_r($glinterface);die;
				if(!empty($glinterface)){
					$voucher = $this->model->getKeyValue("glheader","xvoucher","COMV-","6");
					$data = array();

						$data['bizid'] = Session::get('sbizid');
						$data['zemail'] = Session::get('suser');
						$data['xnarration'] = "Payment to agent:".$agent." ;".$getagent[0]['xshort']."-".$getagent[0]['xadd1'];
						$data['xyear'] = $year;
						$data['xper'] = $month;
						$data['xvoucher'] = $voucher;
						$data['xdate'] = $date;
						$data['xstatusjv'] = 'Confirmed';
						$data['xbranch'] = Session::get('sbranch');
						$data['xdoctype'] = "Commission Paid Voucher";
						$data['xdocnum'] = "";

						$postdata=array(
						"xstatus" => "Confirmed",			
						"xvoucher" => $voucher,			
						);
						
						$where = " bizid = ". Session::get('sbizid') ." and xcomnum='".$comnum."'";


						$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,`xexch`,`xprime`,xflag,xremarks";

						$vals = "";	

						$i = 0;	
						$globalvar = new Globalvar();
						foreach($glinterface as $key=>$val){
							$i++;
							$amt = $globalvar->getFormula($rows,$val["xformula"]);
							
							if($val['xaction']=="Credit")
								$amt = "-".$amt;

							$acc = $this->model->getAcc($val['xacc']);
							
							if($amt<>0)
									$vals .= "(" . Session::get('sbizid') . ",'". $voucher ."','". $i ."','". $val['xacc'] ."','". $acc[0]['xacctype'] ."','". $acc[0]['xaccusage'] ."','". $acc[0]['xaccsource'] ."','". $agent ."','".Session::get('sbizcur')."','". $amt ."','1','". $amt ."','". $val['xaction'] ."',''),";
						}

					$vals = rtrim($vals, ",");
 					
					$success = $this->model->confirmgl($data, $cols, $vals);
					$this->model->colupdate($postdata, $where);
					
				}

				if($success>0){
					$result = "Commission Paid Confirmed";
				}else{
					$result = "Failed to Confirmed Commission Paid!";
				}
				
				 $this->showconfirm($comnum, $result);
		}

		public function showconfirm($comnum, $result){
		$dt = date("Y/m/d");
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."commissionpaid/collectionentry"
		);
		
		$tblvalues = $this->model->getSingleEnroll($comnum);

		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xagent"=>$tblvalues[0]['xagent'],
					"xnarration"=>$tblvalues[0]['xnarration'],
					"xcommtype"=>$tblvalues[0]['xcommtype'],
					"xamount"=>$tblvalues[0]['xamount'],
					"xshort"=>$tblvalues[0]['xshort'],			
					"xadd1"=>$tblvalues[0]['xadd1'],
					"xphone"=>$tblvalues[0]['xphone'],
					"xcomnum"=>$comnum
					);
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Commission Paid", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, "", "",$tblvalues ,URL."commissionpaid/showpost");
			
			$this->view->renderpage('commissionpaid/installmententry');
		}


		public function showentry($comnum, $result=""){
		$dt = date("Y/m/d");
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."commissionpaid/collectionentry"
		);
		
		$tblvalues = $this->model->getSingleEnroll($comnum);

		$conf=array(URL."commissionpaid/confirmcollection", "Confirm");

		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xagent"=>$tblvalues[0]['xagent'],
					"xnarration"=>$tblvalues[0]['xnarration'],
					"xcommtype"=>$tblvalues[0]['xcommtype'],
					"xamount"=>$tblvalues[0]['xamount'],
					"xshort"=>$tblvalues[0]['xshort'],			
					"xadd1"=>$tblvalues[0]['xadd1'],
					"xphone"=>$tblvalues[0]['xphone'],
					"xcomnum"=>$comnum
					);
		// form data
		
			
			$dynamicForm = new Dynamicform("Commision Paid", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, "", "",$tblvalues ,URL."commissionpaid/showpost", $conf);
			
			$this->view->renderpage('commissionpaid/installmententry');
		}

		public function editshow($comnum, $result=""){
		$dt = date("Y/m/d");
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."commissionpaid/collectionentry"
		);

		$tblvalues = $this->model->getSingleEnroll($comnum);

		$conf="";
		if($tblvalues[0]['xstatus']=='Created'){
		$conf=array(URL."commissionpaid/confirmcollection", "Confirm");
		}
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xagent"=>$tblvalues[0]['xagent'],
					"xnarration"=>$tblvalues[0]['xnarration'],
					"xcommtype"=>$tblvalues[0]['xcommtype'],
					"xamount"=>$tblvalues[0]['xamount'],
					"xshort"=>$tblvalues[0]['xshort'],			
					"xadd1"=>$tblvalues[0]['xadd1'],
					"xphone"=>$tblvalues[0]['xphone'],
					"xcomnum"=>$comnum
					);
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Commission Paid", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, "", "",$tblvalues ,URL."commissionpaid/showpost", $conf);
			
			$this->view->renderpage('commissionpaid/installmententry');
		}
		
		
		
		function renderTable($enid){
			$fields = array(
						"xper-Month",
						"xstudentid-Student ID",
						"xstuname-Student Name",
						"xbalance-Fees"
						);
			$table = new Datatable();
			$bizid=Session::get('sbizid');

			$branch=Session::get('sbranch');
			//echo $branch;die;
			$row = $this->model->getfeesdt($enid);
			//print_r($row);die;
			$action = URL."commissionpaid/savecollection";
			
			$table = "";
			$totaldue = 0;
			$table .= '<table class="table table-bordered table-striped table-responsive" style="width:100%">';
				$table .= '<thead><th>Date</th><th>Installment ID</th><th>Ins.Sl</th><th>Customer Code</th><th>Agent Code</th><th>Agent Commission</th><th>Due Amount</th><th>Collection Amount</th><th>Action</th></thead>';
				$table .= '<tbody>';
					foreach($row as $key=>$values){
						$table .= '<tr>';
						$table .= '<form class="form-horizontal" name="dynamicfrm" id="dynamicfrm" action="'.$action.'" method="post" enctype="multipart/form-data">';
							foreach($values as $k=>$v){
								//print_r($v);die;
								$table .= '<td><input class="form-control input-sm" type="text" id="'.$k.'ro" name="'.$k.'ro" value="'.$v.'" readonly></td>';								
							}
							$table .= '<td><input class="form-control input-sm" number="true" type="text" name="'.$k.'" value="'.$v.'"></td><td><input class="form-control input-sm" type="submit" value="Save"></td>';
						$table .= '</form>';
						$table .= '</tr>';
						$totaldue += $values["xamount"];
					}
					$table .= '<tr>';
					$table .= '<td></td><td></td><td></td><td></td><td></td><td><strong>Total Due</strong></td><td><strong>'.$totaldue.'</strong></td><td></td><td></td>';
					$table .= '</tr>';
				$table .= '</tbody>';
			$table .= '</table>';
			
			$table .= '
				<section>
					<div id="printdiv" style="display:none"></div>
					
				</section>
					';
			

			return $table;
			
			
		}
		
	
		function collectionentry(){
				
		$btn = array(
			"Clear" => URL."commissionpaid/collectionentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Commission Paid",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."commissionpaid/savecollection","Save",$this->values, URL."commissionpaid/showpost");
			
			$this->view->table = "";
			
			$this->view->renderpage('commissionpaid/collectionentry', false);
		}
		
		
		public function showpost(){
			$comnum = $_POST['xcomnum'];
			$dt = date("Y/m/d");
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."commissionpaid/collectionentry"
		);
		
		$tblvalues = $this->model->getSingleEnroll($comnum);
		//print_r($tblvalues);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xagent"=>$tblvalues[0]['xagent'],
					"xnarration"=>$tblvalues[0]['xnarration'],
					"xcommtype"=>$tblvalues[0]['xcommtype'],
					"xamount"=>$tblvalues[0]['xamount'],
					"xshort"=>$tblvalues[0]['xshort'],			
					"xadd1"=>$tblvalues[0]['xadd1'],
					"xphone"=>$tblvalues[0]['xphone'],
					"xcomnum"=>$comnum
					);

			$dynamicForm = new Dynamicform("Commission Paid", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."commissionpaid/editcomission/".$comnum, "Edit",$tblvalues,URL."commissionpaid/showpost");
			
			$this->view->table = "";
			
			$this->view->renderpage('commissionpaid/collectionentry');
		}

		function inslist($status){
			$rows = $this->model->getInsList($status);
			//print_r($rows);die;
			$cols = array("xcomnum-Commission No.","xdate-Date","xagent-Agent","xamount-Amount");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xcomnum",URL."commissionpaid/editshow/");
			$this->view->renderpage('commissionpaid/collectionlist', false);
		}
		
		function getstudentfees($cus, $xdate){
			$this->model->getheadcollection($cus, $xdate);
		}
}