<?php
class Glchartsub extends Controller{
	
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
				if($menus["xsubmenu"]=="Sub Account")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js');
		
		$this->values = array(
			"xacc"=>"",
			"xaccsub"=>"",
			"xdesc"=>"",
			"sl"=>"0"
			);
			
			$this->fields = array(array(
							"xacc-group_".URL."glchart/glchartpicklistsub"=>'Account_maxlength="20" readonly'
							),
						array(
							"xaccsub-text"=>'Sub Acc_maxlength="50"'
							),
						array(
							"xdesc-text"=>'Description_maxlength="100"',
							"sl-hidden"=>'_number="true" minlength="1"'
							)
						);
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."glchartsub/glchartsubentry",
			
		);	
		
		
		// form data
		
			$dynamicForm = new Dynamicform("Sub Accounts",$btn);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."glchartsub/saveglchartsub", "Save",$this->values,URL."glchartsub/showpost");
			
			//$this->view->table = $this->renderTable();
			
			$this->view->rendermainmenu('glchartsub/index');
			
		}
		
		public function saveglchartsub(){
				if (!isset($_POST['xacc']) || empty($_POST['xacc']) || empty($_POST['xaccsub'])){
					header ('location: '.URL.'glchartsub/glchartsubentry');
					exit;
				}
				
						
				$form = new Form();
				$data = array();
				$success=0;
				$result = ""; 
				try{
					
				
				$form	->post('xacc')
						->val('minlength', 1)
						->val('maxlength', 20)
										
				
						->post('xaccsub')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('xdesc')
						->val('minlength', 1)
						->val('maxlength', 50);
						
						
				$form	->submit();
				
				$data = $form->fetch();
					
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				
				//print_r($data);die;				
				$success = $this->model->create($data);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				
				
				if($success>0)
					$this->result = "Sub Account Code Created";
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Sub Account Code!";
				
				 $this->showentry($data["xacc"],$data["xaccsub"], $this->result);
				 
				 
				
		}
		
		public function editglchartsub($sl){
			
			if (!isset($_POST['xaccsub']) || empty($_POST['xaccsub'])){
					header ('location: '.URL.'glchartsub');
					exit;
				}
				
			$result = "";
			$sl = $_POST['sl'];
			
			$success=false;
			$form = new Form();
				$data = array();
				
				try{
					
					
				
				
				$form	->post('xacc')
						->val('minlength', 1)
						->val('maxlength', 20)
										
				
						->post('xaccsub')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('xdesc')
						->val('minlength', 1)
						->val('maxlength', 50);
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
				
				$success = $this->model->editglchartsub($data, $sl);
				
				
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
				 $this->showglchartsub($data['xacc'], $data['xaccsub'], $result);
				
		
		}
		
		public function showglchartsub($acc,$accsub,$result=""){
		if($acc==""){
			header ('location: '.URL.'glchartsubentry');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."glchartsub/glchartsubentry"
		);
		
		$tblvalues = $this->model->getSingleglchartsub($acc, $accsub);
		
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Sub Accounts", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."glchartsub/editglchartsub/".$acc."/".$accsub, "Edit",$tblvalues, URL."glchartsub/showpost");
			
			$this->view->table = $this->renderTable($acc);
			
			$this->view->renderpage('glchartsub/glchartsubentry');
		}
		
		
		
		public function showentry($acc, $accsub, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."glchartsub/glchartsubentry"
		);
		
		$tblvalues = $this->model->getSingleglchartsub($acc, $accsub);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Sub Accounts", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."glchartsub/saveglchartsub", "Save",$tblvalues ,URL."glchartsub/showpost");
			
			$this->view->table = $this->renderTable($acc);
			
			$this->view->renderpage('glchartsub/glchartsubentry');
		}
		
		function renderTable($acc){
			$fields = array(
						"xacc-Account Code",
						"xaccsub-Sub Account",
						"xdesc-Description"
						);
			$table = new Datatable();
			$row = $this->model->getGlchartsubByLimit($acc);
			//print_r($row);die;
			return $table->createTable($fields, $row, "xaccsub", URL."glchartsub/showglchartsub/".$acc."/", URL."glchartsub/deletechartsub/".$acc."/");
			
			
		}
		
		function glchartsubpicklist($acc){
			$this->view->table = $this->glchartsubPickTable($acc);
			
			$this->view->renderpage('glchartsub/glchartsubpicklist', false);
		}
		
		function glchartsubPickTable($acc=""){
			$fields = array(
						"xaccsub-Sub Account",
						"xdesc-Account Description"
						);
			$table = new Datatable();
			$row = $this->model->getGlchartsublist($acc);
			
			return $table->picklistTable($fields, $row, "xaccsub");
		}
		
		function glcrchartsubpicklist($acc){
			$this->view->table = $this->glcrchartsubPickTable($acc);
			
			$this->view->renderpage('glchartsub/glchartsubpicklist', false);
		}
		
		function glcrchartsubPickTable($acc=""){
			$fields = array(
						"xaccsubcr-Sub Account",
						"xdesc-Account Description"
						);
			$table = new Datatable();
			$row = $this->model->getcrGlchartsublist($acc);
			
			return $table->picklistTable($fields, $row, "xaccsubcr");
		}
		
		
		
		function glchartsubentry(){
				
		$btn = array(
			"Clear" => URL."glchartsub/glchartsubentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Sub Accounts",$btn);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."glchartsub/saveglchartsub", "Save",$this->values, URL."glchartsub/showpost");
			
			
				$this->view->table="";
			
			
			$this->view->renderpage('glchartsub/glchartsubentry', false);
		}
		
		public function deletechartsub($acc, $accsub){
			$where = "bizid=".Session::get('sbizid')." and xacc='".$acc ."' and xaccsub='". $accsub ."'";
			$this->model->delete($where);
			$this->view->message = "";
			$this->showglchartsub($acc, $accsub);
		}
		
		public function showpost(){
			$acc = $_POST['xacc'];
			$accsub = $_POST['xaccsub'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."glchartsub/glchartsubentry"
		);
		
		$tblvalues = $this->model->getSingleglchartsub($acc, $accsub);
		
		if(empty($tblvalues)){
			$tblvalues=$this->values;
			$tblvalues["xacc"]=$acc;
		}
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Sub Accounts", $btn);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."glchartsub/saveglchartsub", "Save",$tblvalues, URL."glchartsub/showpost");
			if ($this->renderTable($acc)=="")
				$this->view->table="";
			else
				$this->view->table = $this->renderTable($acc);
			
			$this->view->renderpage('glchartsub/glchartsubentry');
		}
}