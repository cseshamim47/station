<?php
class Oppertunity extends Controller{
	
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
				if($menus["xsubmenu"]=="Oppertunity Entry")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','public/js/imageshow.js','views/oppertunity/js/codevalidator.js');
		$dt = date("Y/m/d");
		
		$date = date('Y-m-d', strtotime($dt));
		$this->values = array(
			"xlead"=>"",
			"xcldate"=>$date,
			"xexprevenew"=>"0.00",
			"xremarks"=>""
			
			);
			
			$this->fields = array(array(
							"xcldate-datepicker" => 'Expected Closing Date_""'
							),
						array(
							"xlead-group_".URL."oppertunity/picklist"=>'Lead ID_maxlength="20"',
							"xexprevenew-text_number"=>'Expected Revenew_number="true" minlength="1" maxlength="18"'
						),
						array(
							"xremarks-textarea"=>'Remarks_maxlength="500"'
							)	
						);
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."oppertunity/customerentry",
		);	
		
		
		// form data
		
			$dynamicForm = new Dynamicform("Oppertunity",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."oppertunity/saveoppertunity", "Save",$this->values);
			
			$this->view->table = $this->renderTable();
			
			$this->view->rendermainmenu('oppertunity/index');
			
		}
		
		public function saveoppertunity(){
				// if (!isset($_POST['xoppertunity'])){
				// 	header ('location: '.URL.'oppertunity');
				// 	exit;
		
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				try{
											
				
				$form	->post('xcldate')
						->val('maxlength', 20)
				
						->post('xlead')
						->val('minlength', 4)
						->val('maxlength', 160)
						
						->post('xexprevenew')
						->val('maxlength', 160)
						
						->post('xremarks')
						->val('maxlength', 500);
						
						
						
				$form	->submit();
				
				$data = $form->fetch();
				//if($cusauto=="YES")
				//$data['xcldate'] = date('Y-m-d', strtotime($data['xcldate']));
				$xdate = $data['xcldate'];	
				$dt = str_replace('/', '-', $xdate);
				$data['xcldate']= date('Y-m-d', strtotime($dt));
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				//print_r($data);die;				
				$success = $this->model->create($data);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				
				
				if($success>0){
					$this->result = "oppertunity saved successfully";
				}
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to save oppertunity!";
				
				 $this->showentry($success, $this->result);
				 
				 
				
		}
		
		public function editcustomer($oppertunity){
			//echo "hi"; die;
			
			$result = "";
			
			$success=false;
			$form = new Form();
				$data = array();
				
				try{
					
					
				
				
						$form->post('xcldate')
							->val('maxlength', 20)
					
							->post('xlead')
							->val('minlength', 4)
							->val('maxlength', 160)
							
							->post('xexprevenew')
							->val('maxlength', 160)
							
							->post('xremarks')
							->val('maxlength', 500);
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				$xdate = $data['xcldate'];	
				$dt = str_replace('/', '-', $xdate);
				$data['xcldate']= date('Y-m-d', strtotime($dt));
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$success = $this->model->editCustomer($data, $oppertunity);
				
				
				}catch(Exception $e){
					//echo $e->getMessage();die;
					$result = $e->getMessage();
					
				}
				if($result==""){
				if($success){
					$result = "Edited successfully";
					
				}
				else
					$result = "Edit failed!";
				
				}
				 $this->showcustomer($oppertunity, $result);
				
		
		}
		
		public function showcustomer($oppertunity="", $result=""){
		
		$tblvalues=array();
		$btn = array(
			"New" => URL."oppertunity/customerentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($oppertunity);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Oppertunity", $btn, $result);
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."oppertunity/editcustomer/".$oppertunity, "Edit",$tblvalues);
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('oppertunity/customerentry');
		}
		
		
		
		public function showentry($oppertunity, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."oppertunity/customerentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($oppertunity);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		$saveurl = URL."oppertunity/saveoppertunity";
		$savebtn = "Save";
			if($result == "oppertunity saved successfully"){
				$saveurl = URL."oppertunity/editcustomer/".$oppertunity;
				$savebtn = "Edit";
			}
			
			$dynamicForm = new Dynamicform("Oppertunity", $btn, $result);	
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, $savebtn,$tblvalues);
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('oppertunity/customerentry');
		}
		
		function renderTable(){
			$fields = array(
						"xoppersl-SL",
						"xlead-Lead ID",
						"xexprevenew-Expected Revenew",
						"xcldate-Closing Date",
						"xremarks-Remarks"
						);
			$table = new Datatable();
			$row = $this->model->getoppertunityByLimit(" LIMIT 5");
			
			return $table->myTable($fields, $row, "xoppersl", URL."oppertunity/showcustomer/");
			
			
		}
		
		function customerlist(){
			$this->view->table = $this->itemTable();
			
			$this->view->renderpage('oppertunity/customerlist', false);
		}
		
		function picklist(){
			$this->view->table = $this->oppertunityPickTable();
			
			$this->view->renderpage('oppertunity/customerpicklist', false);
		}
		
		function oppertunityPickTable(){
			$fields = array(
						"xlead-Lead ID",
						"xorg-Organization/Name",
						"xmobile-Mobile"
						);
			$table = new Datatable();
			$row = $this->model->getLead();
			
			return $table->picklistTable($fields, $row, "xlead");
		}
		
		function itemTable(){
				$fields = array(
					"xoppersl-SL",
					"xlead-Lead ID",
					"xexprevenew-Expected Revenew",
					"xcldate-Closing Date",
					"xremarks-Remarks"
					);
			$table = new Datatable();
			$row = $this->model->getoppertunityByLimit();
			//print_r($row); die;
			return $table->createTable($fields, $row, "xoppersl", URL."oppertunity/showcustomer/");
		}
		
		function alloppertunity(){
			$fields = array(
						"xoppertunity-oppertunity No",
						"xorg-Organization/Name",
						"xadd-Address",
						"xmobile-Mobile",
						"xcustype-oppertunity Type"
						);
			$table = new Datatable();
			$row = $this->model->getoppertunityByLimit();
			$btn = '<div><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button">
			<span class="glyphicon glyphicon-print"></span>&nbsp;Print</a>
			</div><div id="printdiv"><div style="text-align:center">'.Session::get('sbizlong').'<br/>oppertunity List</div><hr/>';
			$this->view->table=$btn.$table->myTable($fields, $row, "xoppertunity")."</div>";
			$this->view->renderpage('oppertunity/customerlist', false);
		}
		
		function customerentry(){
				
		$btn = array(
			"Clear" => URL."oppertunity/customerentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Oppertunity",$btn);		
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."oppertunity/saveoppertunity	", "Save",$this->values);
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('oppertunity/customerentry', false);
		}
		
		public function deletecustomer($oppertunity){
			$where = "bizid=".Session::get('sbizid')." and xoppertunity='".$oppertunity."'";
			$this->model->delete($where);
			$this->view->message = "";
			$this->customerlist();
		}
		
		public function showpost(){
			$oppertunity = $_POST['xoppertunity'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."oppertunity/customerentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($oppertunity);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("oppertunity", $btn);
			$file = 'images/oppertunity/cussm/'.$oppertunity.'.jpg';
		
		$imagename = "";	
		if(file_exists($file))
			$imagename = '../../'.$file;
		else
			$imagename = '../../images/products/noimage.jpg';
			
			$this->view->filename = $imagename;
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."oppertunity/saveoppertunity", "Save",$tblvalues,URL."oppertunity/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('oppertunity/customerentry');
		}
		
		function createopbal(){
			
			$mstdata = array(
			"bizid"=>"100",
			"xvoucher"=>"OP--000001",
			"xnarration"=>"Customer Opening Balance",
			"xyear"=>"2017",
			"xper"=>"11",
			"xstatusjv"=>"Created",
			"xbranch" => "Head Office",
			"xdoctype" => "Opening Balance",
			"xdocnum" => "OP--000001",
			"xdate" => "2018-05-20",
			"xsite" => "",
			"zemail"=>"System"
			);
			
						
			$amt  = 0;
			$amtnot = 0;
			$data = $this->data();
			foreach ($data as $key=>$val){
				if($val>0)
					$amt += $val;
				if($val<0)
					$amtnot += $val;
				
			}
			
		//$checkval = " bizid = " . $data['bizid'] . " and xvoucher ='" . $data['xvoucher'] ."'";
			$i=1;
				$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,
				`xexch`,`xprime`,xflag";
				$vals = "(100,'OP--000001',".$i.",'2035',
					'Liability','Ledger','None','','BDT',
					'-". $amt ."','1','-". $amt ."','Credit'),";
				$i+=1;
				$vals .= "(100,'OP--000001',".$i.",'2035',
					'Liability','Ledger','None','','BDT',
					'". abs($amtnot) ."','1','". abs($amtnot) ."','Debit'),";	
					
				foreach ($data as $key=>$val){
				$i++;
					if($val>0){
					
					$vals .= "(100,'OP--000001',".$i.",'1010',
					'Asset','AR','Customer','". $key ."','BDT',
					'". $val ."','1','". $val ."','Debit'),";
					}
					
					if($val<0){
					
					$vals .= "(100,'OP--000001',".$i.",'1010',
					'Asset','AR','Customer','". $key ."','BDT',
					'". $val ."','1','". $val ."','Credit'),";
					}
					
				}
				
				$vals = rtrim($vals,",");
				//echo $vals; die;
				echo $this->model->createopeningbal($mstdata, $cols, $vals);
		}
		
		
		
}