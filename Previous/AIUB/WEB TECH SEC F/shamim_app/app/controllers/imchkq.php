<?php
class Imchkq extends Controller{
	
	private $values = array();
	private $fields = array();
	private $valuesdt = array();
	private $fieldsdt = array();
	
	
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
				if($menus["xsubmenu"]=="2. Inventory Quality Check")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
		
		$this->values = array(
				"prefix"=>"",
				"xdate"=>date("Y/m/d"),
				"ximchkqnum"=>"",
				"xsup"=>"",
				"xdocnum"=>"",
				"xnote"=>""
			);
			
		$this->fields = array(array(
				"prefix-select_Quality Check Prefix"=>'Prefix_maxlength="4"',
				"xdate-datepicker" => 'Date_""'
				),
				array(
				"ximchkqnum-group_".URL."imchkq/picklist"=>'Quality Check No_""',
				"xsup-group_".URL."suppliers/picklist"=>'Supplier_""'
				),
				array(
				"xdocnum-text"=>'Document No_""'				
				),
				array(
				"xnote-textarea"=>'Note_""'
				)
				);

		$this->valuesdt = array(
				"xitemcode"=>"",
				"xqtychecked"=>"0",
				"xqtypassed"=>"0",
				"xunit"=>"",
				"xnote"=>""
			);

			$this->fieldsdt = array(
				"xitemcode-group_".URL."items/picklist"=>'Item Code_maxlength="20"',
				"xqtychecked-text_number" => 'Quantity_number="true"',
				"xqtypassed-text_number" => 'Quantity Passed_number="true"',
				"xunit-select_UOM"=>'Unit_maxlength="50"',
				"xnote-text"=>'Note for not passed_maxlength="160"'				
				);			
			
		$this->view->js = array('public/js/datatable.js','public/js/default.js','public/js/header.detail.js',
		'views/imchkse/js/codevalidator.js','public/js/showpost.js');
		
		
		}
		
		public function index(){
			
			$btn = array(
			"Clear" => URL."imchkq/imchkqentry"
			);
			

			$dynamicform = new Dynamicform("IM Quality Check",$btn);
			$dynamicdt = new Dynamicdetail(URL."imchkq/GetDtListings/", URL."imchkq/editdt/", URL."imchkq/deletedt/");	
			
			$this->view->dynform = $dynamicform->createForm($this->fields, URL."imchkq/saveimchkq", "Save",$this->values,URL."imchkq/showpost");

			$this->view->dynformdt = $dynamicdt->createForm($this->fieldsdt, URL."imchkq/insertDetail", "Save",$this->valuesdt,"ximchkqnum","");	
			
			$this->view->rendermainmenu('imchkq/index');	
		}
		
		public function saveimchkq(){
			
			if(!isset($_POST['prefix'])){
				header ('location: '.URL.'imchkq');
					exit;
			}
				//date formating for mysql
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				$prefix = $_POST['prefix'];	
				$keyfieldval = $this->model->getKeyValue("imchkq","ximchkqnum",$prefix,"6");
				
				try{
					
				$form	->post('xsup')
						->val('maxlength', 100)
						
						->post('xdocnum')
						->val('maxlength', 100)
						
						->post('xnote')
						->val('maxlength', 160);
				
				$form	->submit();	
				
				$data = $form->fetch();		
				
				$data['xdate'] = $date; 
				$data['ximchkqnum'] = $keyfieldval;	
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				
				$success = $this->model->create($data);
				
				if(empty($success))
					$success=0;
				}catch(Exception $e){
					$this->result = $e->getMessage();
				}
				
				if($success>0)
					$this->result = $keyfieldval." Created successfully";
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to create!";
				
				 $this->showentry($keyfieldval, $this->result);
		}
		
		public function editimchkq($ximchkqnum=""){
			
			if(!isset($_POST['prefix'])){
				header ('location: '.URL.'imchkq');
					exit;
			}
				//date formating for mysql
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				
				
				try{
					
				$form	->post('xsup')
						->val('maxlength', 100)
						
						->post('xdocnum')
						->val('maxlength', 100)
						
						->post('xnote')
						->val('maxlength', 160);
				
				$form	->submit();	
				
				$data = $form->fetch();		
				
				$data['xdate'] = $date; 
					
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
				
				$success = $this->model->edit($data, $ximchkqnum);
				
				if(empty($success))
					$success=0;
				}catch(Exception $e){
					$this->result = $e->getMessage();
				}
				
				if($success>0)
					$this->result = $ximchkqnum." Edited successfully";
				
				if($success == 0 && empty($this->result))
					$this->result = $ximchkqnum." Failed to edit!";
				
				 $this->showentry($ximchkqnum, $this->result);
		}
		
		public function showentry($imchkqnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."imchkq/imchkqentry"
		);
		
		$tblgetvalues = $this->model->getSingleRecord($imchkqnum);
		
		if(empty($tblgetvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblgetvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("IM Quality Check", $btn, $result);		
			$dynamicdt = new Dynamicdetail(URL."imchkq/GetDtListings/", URL."imchkq/editdt/", URL."imchkq/deletedt/",URL."imchkq/editdetail");
			
			if(empty($tblgetvalues)){
				$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imchkse/saveimchkq", "Save",$tblvalues ,URL."imchkq/showpost");
				
				$this->view->dynformdt = $dynamicdt->createForm($this->fieldsdt, URL."imchkq/insertDetail", "Save",$this->valuesdt,"ximchkqnum","");
			}else{
				$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imchkq/editimchkq/".$imchkqnum, "Edit",$tblvalues ,URL."imchkq/showpost");
			
				$this->view->dynformdt = $dynamicdt->createForm($this->fieldsdt, URL."imchkq/insertDetail", "Save",$this->valuesdt,"ximchkqnum",$imchkqnum);
			}
			//$this->view->table = $this->renderTable();
			
			$this->view->rendermainmenu('imchkq/imchkqentry');
		}
		
		public function insertDetail(){
			 $rownum = $this->model->getRow("imchkqdt","ximchkqnum",$_POST['ximchkqnum'],"xrow");
			
				$data=array();
				$data['xitemcode'] = $_POST['xitemcode'];
				$data['xqtychecked'] = $_POST['xqtychecked'];
				$data['xrow'] = $rownum;
				$data['xqtypassed'] = $_POST['xqtypassed'];
				$data['ximchkqnum'] = $_POST['ximchkqnum'];
				$data['xunit'] = $_POST['xunit'];
				$data['xnote'] = $_POST['xnote'];	
				$data['bizid'] = Session::get('sbizid');
				
					
				$this->model->insertDetail($data);	
		}
		
		public function editdetail(){
			if (!isset($_POST['txnnum']) || !isset($_POST['txnrow'])){
				
			}
			
			$txnnum = $_POST['txnnum'];
			$txnrow = $_POST['txnrow'];
			
				$data=array();
				$data['xitemcode'] = $_POST['xitemcode'];
				$data['xqtychecked'] = $_POST['xqtychecked'];
				$data['xqtypassed'] = $_POST['xqtypassed'];
				$data['xunit'] = $_POST['xunit'];
				$data['xnote'] = $_POST['xnote'];	
						
					
				$this->model->editDetail($data, $txnnum, $txnrow);
					
					
		}
		
		public function GetDtListings($imchkqnum){
			$this->model->GetDtListings($imchkqnum);
		}
		
		function picklist(){
			$this->view->table = $this->imchksePickTable();
			
			$this->view->renderpage('imchkq/imchkqpicklist', false);
		}
		
		function imchksePickTable(){
			$fields = array(
						"ximchkqnum-Quality Check No",
						"xdate-Date",
						"xdocnum-Document",
						"xsup-Supplier"
						);
			$table = new Datatable();
			$row = $this->model->getImchkseByLimit();
			
			return $table->picklistTable($fields, $row, "ximchkqnum");
		}
		
		function imchkqentry(){
				
		$btn = array(
			"Clear" => URL."imchkq/imchkqentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("IM Check Quality", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imchkq/saveimchkq", "Save",$this->values, URL."imchkq/showpost");
			
			$dynamicdt = new Dynamicdetail(URL."imchkq/GetDtListings/", URL."imchkq/editdt/", URL."imchkq/deletedt/",URL."imchkq/editdetail");
			
			$this->view->dynformdt = $dynamicdt->createForm($this->fieldsdt, URL."imchkq/insertDetail", "Save",$this->valuesdt,"ximchkqnum","");
			
			$this->view->rendermainmenu('imchkq/imchkqentry');
		}
		
		public function showpost(){
			
			$imchkqnum = $_POST['ximchkqnum'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."imchkq/imchkqentry"
		);
		
		$tblgetvalues = $this->model->getSingleRecord($imchkqnum);
		//print_r($tblgetvalues); die;
		if(empty($tblgetvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblgetvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("IM Check Quality", $btn);		
			
			
			
			$dynamicdt = new Dynamicdetail(URL."imchkq/GetDtListings/", URL."imchkq/editdt/", URL."imchkq/deletedt/",URL."imchkq/editdetail/");
			
			if(empty($tblgetvalues)){
				$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imchkq/saveimchkq", "Save",$tblvalues, URL."imchkq/showpost");
				$this->view->dynformdt = $dynamicdt->createForm($this->fieldsdt, URL."imchkq/insertDetail", "Save",$this->valuesdt,"ximchkqnum","");
			}else{
				$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imchkq/editimchkq/".$imchkqnum, "Edit",$tblvalues, URL."imchkq/showpost");
				$this->view->dynformdt = $dynamicdt->createForm($this->fieldsdt, URL."imchkq/insertDetail", "Save",$this->valuesdt,"ximchkqnum",$imchkqnum);
			}
			
						
			$this->view->rendermainmenu('imchkq/imchkqentry');
		}
		
		public function editdt($ximchqnum, $xrow){
			$this->model->getSingleDetail($ximchqnum, $xrow);
		}
		
		
		
}