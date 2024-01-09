<?php
class Imchkse extends Controller{
	
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
				if($menus["xsubmenu"]=="1. Inventory Security Check")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
		
		$this->values = array(
				"prefix"=>"",
				"xdate"=>date("Y/m/d"),
				"ximchksenum"=>"",
				"xsup"=>"",
				"xdocnum"=>"",
				"xnote"=>""
			);
			
		$this->fields = array(array(
				"prefix-select_Security Check Prefix"=>'Prefix_maxlength="4"',
				"xdate-datepicker" => 'Date_""'
				),
				array(
				"ximchksenum-group_".URL."imchkse/picklist"=>'Security Check No_""',
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
			"Clear" => URL."imchkse/imchkseentry"
			);
			

			$dynamicform = new Dynamicform("IM Security Check",$btn);
			$dynamicdt = new Dynamicdetail(URL."imchkse/GetDtListings/", URL."imchkse/editdt/", URL."imchkse/deletedt/");	
			
			$this->view->dynform = $dynamicform->createForm($this->fields, URL."imchkse/saveimchkse", "Save",$this->values,URL."imchkse/showpost");

			$this->view->dynformdt = $dynamicdt->createForm($this->fieldsdt, URL."imchkse/insertDetail", "Save",$this->valuesdt,"ximchksenum","");	
			
			$this->view->rendermainmenu('imchkse/index');	
		}
		
		public function saveimchkse(){
			
			if(!isset($_POST['prefix'])){
				header ('location: '.URL.'imchkse');
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
				$keyfieldval = $this->model->getKeyValue("imchkse","ximchksenum",$prefix,"6");
				
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
				$data['ximchksenum'] = $keyfieldval;	
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
		
		public function editimchkse($ximchksenum=""){
			
			if(!isset($_POST['prefix'])){
				header ('location: '.URL.'imchkse');
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
				
				$success = $this->model->edit($data, $ximchksenum);
				
				if(empty($success))
					$success=0;
				}catch(Exception $e){
					$this->result = $e->getMessage();
				}
				
				if($success>0)
					$this->result = $ximchksenum." Edited successfully";
				
				if($success == 0 && empty($this->result))
					$this->result = $ximchksenum." Failed to edit!";
				
				 $this->showentry($ximchksenum, $this->result);
		}
		
		public function showentry($imchksenum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."imchkse/imchkseentry"
		);
		
		$tblgetvalues = $this->model->getSingleRecord($imchksenum);
		
		if(empty($tblgetvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblgetvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("IM Security Check", $btn, $result);		
			$dynamicdt = new Dynamicdetail(URL."imchkse/GetDtListings/", URL."imchkse/editdt/", URL."imchkse/deletedt/",URL."imchkse/editdetail");
			
			if(empty($tblgetvalues)){
				$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imchkse/saveimchkse", "Save",$tblvalues ,URL."imchkse/showpost");
				
				$this->view->dynformdt = $dynamicdt->createForm($this->fieldsdt, URL."imchkse/insertDetail", "Save",$this->valuesdt,"ximchksenum","");
			}else{
				$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imchkse/editimchkse/".$imchksenum, "Edit",$tblvalues ,URL."imchkse/showpost");
			
				$this->view->dynformdt = $dynamicdt->createForm($this->fieldsdt, URL."imchkse/insertDetail", "Save",$this->valuesdt,"ximchksenum",$imchksenum);
			}
			//$this->view->table = $this->renderTable();
			
			$this->view->rendermainmenu('imchkse/imchkseentry');
		}
		
		public function insertDetail(){
			 $rownum = $this->model->getRow("imchksedt","ximchksenum",$_POST['ximchksenum'],"xrow");
			
				$data=array();
				$data['xitemcode'] = $_POST['xitemcode'];
				$data['xqtychecked'] = $_POST['xqtychecked'];
				$data['xrow'] = $rownum;
				$data['xqtypassed'] = $_POST['xqtypassed'];
				$data['ximchksenum'] = $_POST['ximchksenum'];
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
		
		public function GetDtListings($imchksenum){
			$this->model->GetDtListings($imchksenum);
		}
		
		function picklist(){
			$this->view->table = $this->imchksePickTable();
			
			$this->view->renderpage('imchkse/imchksepicklist', false);
		}
		
		function imchksePickTable(){
			$fields = array(
						"ximchksenum-Security Check No",
						"xdate-Date",
						"xdocnum-Document",
						"xsup-Supplier"
						);
			$table = new Datatable();
			$row = $this->model->getImchkseByLimit();
			
			return $table->picklistTable($fields, $row, "ximchksenum");
		}
		
		function imchkseentry(){
				
		$btn = array(
			"Clear" => URL."imchkse/imchkseentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("IM Check Security", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imchkse/saveimchkse", "Save",$this->values, URL."imchkse/showpost");
			
			$dynamicdt = new Dynamicdetail(URL."imchkse/GetDtListings/", URL."imchkse/editdt/", URL."imchkse/deletedt/",URL."imchkse/editdetail");
			
			$this->view->dynformdt = $dynamicdt->createForm($this->fieldsdt, URL."imchkse/insertDetail", "Save",$this->valuesdt,"ximchksenum","");
			
			$this->view->rendermainmenu('imchkse/imchkseentry');
		}
		
		public function showpost(){
			
			$imchksenum = $_POST['ximchksenum'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."imchkse/imchkseentry"
		);
		
		$tblgetvalues = $this->model->getSingleRecord($imchksenum);
		
		if(empty($tblgetvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblgetvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("IM Check Security", $btn);		
			
			
			
			$dynamicdt = new Dynamicdetail(URL."imchkse/GetDtListings/", URL."imchkse/editdt/", URL."imchkse/deletedt/",URL."imchkse/editdetail/");
			
			if(empty($tblgetvalues)){
				$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imchkse/saveimchkse", "Save",$tblvalues, URL."imchkse/showpost");
				$this->view->dynformdt = $dynamicdt->createForm($this->fieldsdt, URL."imchkse/insertDetail", "Save",$this->valuesdt,"ximchksenum","");
			}else{
				$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imchkse/editimchkse/".$imchksenum, "Edit",$tblvalues, URL."imchkse/showpost");
				$this->view->dynformdt = $dynamicdt->createForm($this->fieldsdt, URL."imchkse/insertDetail", "Save",$this->valuesdt,"ximchksenum",$imchksenum);
			}
			
						
			$this->view->rendermainmenu('imchkse/imchkseentry');
		}
		
		public function editdt($ximchsenum, $xrow){
			$this->model->getSingleDetail($ximchsenum, $xrow);
		}
		
		
		
}