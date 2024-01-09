<?php
class Installment extends Controller{
	
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
				if($menus["xsubmenu"]=="Installment Schedule")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/customers/js/codevalidator.js','views/stuenroll/js/studentenroll.js','views/installment/js/getaccdt.js');
		$dt = date("Y/m/d");
		$date = date('Y-m-d', strtotime($dt));
		$year = date('Y',strtotime($date));
		$this->values = array(
			"xinsnum"=>"",
			"xdate"=>$dt,
			"xcus"=>"",
			"xorg"=>"",
			"xquotnum"=>"",		
			"xadd1"=>"",			
			"xpct"=>"0",
			"xtype"=>"At A Time",
			"xagent"=>"",
			"xagentcom"=>"0.00",
			"xamount"=>"0",
			"xmonthint"=>"",
			"xmonth"=>"",
			"xhead"=>"",
			"xinssl"=>"0"
			);
			
			$this->fields = array(
						array(
							"xinsnum-group_".URL."installment/picklist"=>'Installment No_maxlength="20" readonly',
							"xdate-datepicker" => 'Date_""'
							),					
						array(
							"xcus-group_".URL."customers/picklist"=>'Customer Code*~star_maxlength="20"',
							"xorg-text"=>'Customer Name*~star_maxlength="100" readonly'					
							),
						array(							
							"xadd1-text"=>'Address_readonly',
							"xquotnum-text"=>'Quotation No_maxlength="50"'
							),
						array(							
							"xagent-group_".URL."agent/picklist"=>'Agent_maxlength="50"',
							"xagentcom-text_number"=>'Agent Commission(%)_number="true" minlength="1" maxlength="18"'
							),
						array(
							"xamount-text"=>'Amount_number="true" minlength="1" maxlength="18"',
							"xtype-radio_At A Time_Multiple Month"=>'_readonly',
							"xinssl-hidden"=>'_""'
							),
						array(
							"xmonthint-text"=>'Month Interval_maxlength="50"',
							"xmonth-text"=>'Month Number_maxlength="50"'
							)
						);
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."installment/stuextraentry",
		);	
		
		
		// form data
		
			$dynamicForm = new Dynamicform("Installment Schedule",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."installment/saveextra", "Save",$this->values,URL."installment/showpost");
			
			//$this->view->table = $this->renderTable();
			
			$this->view->rendermainmenu('installment/index');
			
		}
		
		public function saveextra(){
				
				$xmonth = $_POST['xmonth'];
				//echo $xmonth;die;
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date));
				//echo $month; die;
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				try{
					
					if(empty($_POST['xcus'])){
						throw new Exception("Select Customer!");
					}
								
				$form	->post('xcus')
						->val('minlength', 1)
						->val('maxlength', 20)
				
						->post('xinsnum')

						->post('xtype')

						->post('xagent')
						->val('maxlength', 20)
						
						->post('xagentcom')
						->val('checkdouble')
						
						->post('xmonthint')

						->post('xmonth')
						
						->post('xquotnum')
						
						->post('xamount')
						->val('checkdouble')
						->val('minlength', 1);
						
				$form	->submit();
				
				$data = $form->fetch();
				//if($data['xinsnum'] == "")
				$keyfieldval = $this->model->getKeyValue("installmentmst","xinsnum","INS-","6");
				//else
				//$keyfieldval = $data['xinsnum'];
				//print_r($keyfieldval);die;
				$inssl = $this->model->getRow("installmentmst","xinsnum",$keyfieldval,"xinssl");
				//print_r($inssl);die;
				$cols = "bizid,xcus,xagent,xagentcom,xquotnum,xinssl,xdate,xinsnum,xpct,xamount,zemail,xbranch,xyear,xper";
				$vals ="";
				if (empty($data['xmonth']) || empty($data['xamount'])) {
					throw new Exception("Please Enter Month and Amount!");
				}
				$amt = $data['xamount']/$data['xmonth'];

				if($data['xtype']=='Multiple Month' && $xmonth>1){
					$invm = $data['xmonthint'];
					for($i=1; $i<=$xmonth; $i++){
						$dte = date('Y-m-d', strtotime($date.'+'.$invm.' month'));
						$mnth = date('n',strtotime($dte));
						$yar = date('Y',strtotime($dte));
						$vals .= "(" . Session::get('sbizid') . ",'". $data['xcus'] ."','". $data['xagent'] ."','". $data['xagentcom'] ."','". $data['xquotnum'] ."','".$inssl."', '".$dte."', '". $keyfieldval ."','0','". $amt ."','". Session::get('suser') ."','". Session::get('sbranch') ."',
						'". $yar ."','". $mnth ."'),";
						$invm = $invm+$data['xmonthint'];
						$inssl++;
					}
				}else{
						$vals = "(" . Session::get('sbizid') . ",'". $data['xcus'] ."','". $data['xagent'] ."','". $data['xagentcom'] ."','". $data['xquotnum'] ."','".$inssl."','". $date ."', '". $keyfieldval ."','0','". $data['xamount'] ."','". Session::get('suser') ."','". Session::get('sbranch') ."',
						'". $year ."','". $month ."')";
				}
				// $file = fopen("C:/Users/kamrul/Desktop/testdoc.txt","w");
				// echo fwrite($file,$vals);
				// fclose($file);die;
				$success = $this->model->create($cols, rtrim($vals,","));
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				
				
				if($success>0)
					$this->result = "Installment Create successfully";
				
				if($success == 0 && empty($this->result))
					$this->result = "Installment Create failed!";
				
				 $this->showentry($keyfieldval, $this->result);
				 
		}
		
		public function editwaver(){
			
			
			$result = "";
			
				$xdate = $_POST['xdate'];
				//echo $xdate;die;
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				//echo $date;die;
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date));
				
			$success=false;
			$form = new Form();
				$data = array();
				
				try{
					if(empty($_POST['xcus'])){
						throw new Exception("Select Customer!");
					}
			
				$form	->post('xcus')
						->val('minlength', 1)
						->val('maxlength', 20)
				
						->post('xinsnum')

						->post('xtype')

						->post('xagent')
						->val('maxlength', 20)
						
						->post('xagentcom')
						->val('checkdouble')
					
						->post('xquotnum')
						
						->post('xamount')
						->val('checkdouble')
						->val('minlength', 1);
						
						 
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['xcus'] = $_POST['xcus'];
				$data['xinsnum'] = $_POST['xinsnum'];
				$data['xquotnum'] = $_POST['xquotnum'];
				$data['xamount'] = $_POST['xamount'];
				$data['xyear'] = $year;
				$data['xper'] = $month;
				$data['xdate'] =$date;
				
				$data['zutime'] = date("Y-m-d H:i:s");
				
				
				$success = $this->model->editWaver($data, $_POST['xinssl']);
				
				
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
				 $this->showaver($data['xinsnum'], $_POST['xinssl'], $result);
				
		
		}
		
		public function showaver($enid="", $inssl, $result=""){
		if($enid==""){
			header ('location: '.URL.'installment/stuextraentry');
			exit;
		}
		//echo $inssl;die;
		$tblvalues=array();
		$btn = array(
			"New" => URL."installment/stuextraentry"
		);
		
		$tblvalues = $this->model->getInstallmentdata($enid, $inssl);
		//print_r($tblvalues); die;
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(					
					"xinsnum"=>$tblvalues[0]['xinsnum'],
					"xcus"=>$tblvalues[0]['xcus'],
					"xdate"=>$tblvalues[0]['xdate'],
					"xquotnum"=>$tblvalues[0]['xquotnum'],
					"xagent"=>$tblvalues[0]['xagent'],
					"xagentcom"=>$tblvalues[0]['xagentcom'],
					"xmonthint"=>"",
					"xtype"=>"At A Time",	
					"xamount"=>$tblvalues[0]['xamount'],
					"xorg"=>$tblvalues[0]['xorg'],
					"xadd1"=>$tblvalues[0]['xadd1'],
					"xmonth"=>"",
					"xinssl"=>$tblvalues[0]['xinssl']
					);
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Installment Schedule", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."installment/editwaver/".$enid, "Edit",$tblvalues, URL."installment/showpost");
			
			$this->view->table = $this->renderTable($tblvalues['xinsnum']);
			
			$this->view->renderpage('installment/stuextraentry');
		}		
		public function showentry($seid, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."installment/stuextraentry"
		);
		
		
			$tblvalues=array(					
					"xinsnum"=>$seid,
					"xcus"=>"",
					"xdate"=>"",
					"xquotnum"=>"",
					"xagent"=>"",
					"xagentcom"=>"0.00",
					"xmonthint"=>"",
					"xtype"=>"At A Time",	
					"xamount"=>"",
					"xorg"=>"",
					"xadd1"=>"",
					"xmonth"=>"",
					"xinssl"=>"0"
					);
			
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Installment Schedule", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."installment/saveextra", "Save",$tblvalues, URL."installment/showpost");
			
			$this->view->table = $this->renderTable($seid);
			
			$this->view->renderpage('installment/stuextraentry');
		}
		
		function renderTable($seid){
			$insdt = $this->model->getInstallment($seid);
			//print_r($insdt);die;
			$status = "";
			if(!empty($insdt))
				$status = $insdt[0]["xrecflag"];
			
			$delbtn = "";
			if(count($insdt)>0){
			if($insdt[0]["xrecflag"]=="Live")
				$delbtn = URL."installment/deletewaver/".$seid."/";
				
			}
			
			$row = $this->model->getInstallmentdt($seid);
			
			$table = '<table class="table table-striped table-bordered">';
				$table .='<thead>
							<th>Edit</th><th>Delete</th><th>Sl.</th><th>Date</th><th>Installment No</th><th>Customer Code</th><th>Name</th><th>Agent Code</th><th>Name</th><th>Com.(%)</th><th style="text-align:right">Ins. Amount</th>
						</thead>';
						$totalqty = 0;
						$totalextqty = 0;
						$total = 0;
						$totaltax = 0;
						$totaldisc = 0;
						$table .='<tbody>';

						foreach($row as $key=>$val){
							$showurl = URL."installment/showaver/".$seid."/".$val['xinssl'];
							$table .='<tr>';
							
							$table.='<td><a class="btn btn-info" id="btnshow" href="'.$showurl.'" role="button">Show</a></td>';
							if($delbtn!="")
								$table.='<td><a id="delbtn" class="btn btn-danger" href="'.$delbtn."/".$val['xinssl'].'" role="button">Delete</a></td>';
							else
								$table.='<td></td>';

								$table .= "<td>".$val['xinssl']."</td>";
								$table .= "<td>".$val['xdate']."</td>";
								$table .= "<td>".$val['xinsnum']."</td>";
								$table .="<td>".$val['xcus']."</td>";		
								$table .='<td>'.$val['xorg'].'</td>';
								$table .='<td>'.$val['xagent'].'</td>';
								$table .='<td>'.$val['xagname'].'</td>';
								$table .='<td>'.$val['xagentcom'].'</td>';
								$table .='<td align="right">'.number_format(floatval($val['xamount']), 2, '.', '').'</td>';
								
							$table .="</tr>";
						}
							
					$table .="</tbody>";			
			$table .= "</table>";
			
			return $table;
			
			
		}
		
		
		function inslist(){
			$rows = $this->model->getInsList();
			$cols = array("xdate-Date","xinsnum-Installment No","xcus-Customer Code","xshort-Name","xadd1-Address", "xmobile-Mobile");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xinsnum", URL."installment/showentry/");
			$this->view->renderpage('installment/extrastulist', false);
		}
		
		
		
		function stuextraentry(){
				
		$btn = array(
			"Clear" => URL."installment/stuextraentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Installment Schedule",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."installment/saveextra", "Save",$this->values, URL."installment/showpost");
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('installment/stuextraentry', false);
		}
		
		public function deletewaver($enid, $inssl){
			//$stid=$this->model->getInstallmentdata($enid, $inssl)[0]['xstudentid'];
			$where = " where bizid=".Session::get('sbizid')." and xinsnum='".$enid."' and xinssl='".$inssl."' and xbranch = '". Session::get('sbranch') ."'";
			$this->model->delete($where);
			$this->view->message = "";
			$this->showentry($enid, $result="");
		}
		
		public function showpost(){
			$enid = $_POST['xstudentid'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."installment/stuextraentry"
		);
		
		$tblvalues = $this->model->getPlanDt($enid);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(					
					"xstudentid"=>$tblvalues[0]['xstudentid'],
					"xstuname"=>$tblvalues[0]['xstuname'],
					"xclass"=>$tblvalues[0]['xclass'],
					"xpct"=>"0",
					"xtype"=>"Periodically",	
					"xamount"=>"0",
					"xhead"=>"",
					"xmonth"=>"",
					"xextraid"=>$tblvalues[0]['xextraid']
					);
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Installment Schedule", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."installment/saveextra", "Save",$tblvalues, URL."installment/showpost");
			
			$this->view->table = $this->renderTable($enid);
			
			$this->view->renderpage('installment/stuextraentry');
		}
		public function getStudentEn($id){
			$this->model->getStudentEn($id);
		}

		function picklist(){
			$this->view->table = $this->installmentPickTable();
			
			$this->view->renderpage('installment/customerpicklist', false);
		}
		
		function installmentPickTable(){
			$fields = array(
						"xinsnum-Installment No",
						"xcus-Customer Code",
						"xorg-Name",
						"xadd1-Address",
						"xmobile-Mobile"
						);
			$table = new Datatable();
			$row = $this->model->getInstallmentByLimit();
			
			return $table->picklistTable($fields, $row, "xinsnum");
		}
}