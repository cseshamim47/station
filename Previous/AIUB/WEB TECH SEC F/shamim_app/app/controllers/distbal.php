<?php
class Distbal extends Controller{
	
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
				if($menus["xsubmenu"]=="Balance Receive")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/distbal/js/rindt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xsl"=>"",
			"xdate"=>$dt,
			"xrdin"=>"",
			"rinname"=>"",
			"xdocno"=>"",
			"xamount"=>"0"
			);
			
			$this->fields = array(array(
							"xsl-text"=>'Trunsaction No_""',
							"xdate-datepicker"=>'Date*~star_""'
							),
							array(
							"xrdin-text"=>'RIN*~star_maxlength="20"',
							"rinname-text"=>'Full Name*~star_maxlength="100"'
							),
						array(
							"xdocno-text"=>'Document No_maxlength="50"',
							"xamount-text_number"=>'Amount*~star_number="true" minlength="1" maxlength="18" readonly required'
							)
						);
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."distreg/distbalentry",
		);	
		
		$this->view->rendermainmenu('distbal/index');
			
		}
		
		public function savedistbal(){
							
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
				
				$form	->post('xrdin')
						->val('minlength', 4)
						->val('maxlength', 50)
						
						->post('xamount')
						->val('checkdouble')
						->val('minlength', 1);
						
				$form	->submit();
				
				$data = $form->fetch();
				
				if(empty($this->model->getRin($data['xrdin']))){
						throw new Exception("RIN Not Found!");
					}
				
				$data['bizid'] = Session::get('sbizid');
				$data['xdate'] = $date;
				$data['zemail'] = Session::get('suser');
				$data['xyear'] = $year;
				$data['xper'] = $month;
				//print_r($data);die;				
				$success = $this->model->create($data);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				
				
				if($success>0)
					$this->result = "Retailer Balance uploaded!";
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Upload Balance!";
				
				 $this->showentry($success, $this->result);
				 
				 
				
		}
		
		/*public function editdistbal($txn){
			
			if (!empty($_POST['xrdin']) || !empty($_POST['xamount'])){
					header ('location: '.URL.'distbal/distbalentry');
					exit;
				}
			$result = "";
			$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date));
			$success=false;
			$form = new Form();
				$data = array();
				
				try{
				
				
				$form	->post('xrdin')
						->val('minlength', 4)
						->val('maxlength', 50)
						
						->post('xamount')
						->val('checkdouble')
						->val('minlength', 1);
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				$data['xdate'] = $date;
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
				$success = $this->model->editospbal($data, $cus);
				
				
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
				 $this->showcustomer($txn, $result);
				
		
		}*/
		
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
		
			
			$dynamicForm = new Dynamicform("Retailer Balance", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distreg/editdistributor/".$cus, "Edit",$tblvalues);
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('distreg/distributorentry');
		}
		
		
		
		public function showentry($cus, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."distbal/distbalentry"
		);
		
		$tblvalues = $this->model->getSingleBal($cus);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Retailer Balance", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distbal/savedistbal", "Save",$tblvalues );
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('distbal/distbalentry');
		}
		
		function renderTable(){
			$fields = array(
						"xsl-Trunsaction No",
						"xrdin-RIN",
						"xamount-Amount",
						"xdate-Date"
						);
			$table = new Datatable();
			$row = $this->model->getBalanceByLimit(" LIMIT 5");
			
			return $table->myTable($fields, $row, "xsl");
			
			
		}
		
		function distballist(){
			$this->view->table = $this->balTable();
			
			$this->view->renderpage('distbal/distballist', false);
		}
		
		function balTable(){
			$fields = array(
						"xsl-Trunsaction No",
						"xrdin-RIN",
						"xamount-Amount",
						"xdate-Date"
						);
			$table = new Datatable();
			$row = $this->model->getBalanceByLimit();
			
			return $table->createTable($fields, $row, "xsl");
		}
		
		function distbalentry(){
				
		$btn = array(
			"Clear" => URL."distbal/distbalentry"
		);

		
			$dynamicForm = new Dynamicform("Retailer Balance",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distbal/savedistbal", "Save",$this->values);
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('distbal/distbalentry', false);
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