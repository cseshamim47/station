<?php
class Approval extends Controller{
	
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
			"xdept"=>"",
			"xuser"=>"",
			"xlevel"=>"",
			"xstatus"=>"",
			"xsl"=>"0",
			"zactive"=>"1"
			);
			
			$this->fields = array(array(
							"xdept-select_zrole"=>'Department_""',
							"xlevel-select_Approval Level"=>'Approval Level_maxlength="50"'
							),
						array(
							"xstatus-select_Approval Status"=>'Approval Status_maxlength="50"',
							"xuser-group_".URL."approval/userpicklist"=>'User_maxlength="100" readonly',
							),
						array(
							"zactive-checkbox_1"=>'Active?_""',
							"xsl-hidden"=>'_number="true" minlength="1"'
							)
						);
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."approval/glchartsubentry",
			
		);	
		
		
		// form data
		
			$dynamicForm = new Dynamicform("Approval",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."approval/saveglchartsub", "Save",$this->values,"");
			
			
			$this->view->rendermainmenu('approval/index');
			
		}
		
		public function saveglchartsub(){
				if (!isset($_POST['xuser']) || empty($_POST['xdept']) || empty($_POST['xlevel']) || empty($_POST['xstatus'])){
					header ('location: '.URL.'approval/glchartsubentry');
					exit;
				}
				
						
				$form = new Form();
				$data = array();
				$success=0;
				$result = ""; 
				try{
					
				
				$form	->post('xdept')
						->val('minlength', 1)

						->post('xuser')
						->val('minlength', 1)
						->val('maxlength', 100)
						
						->post('xlevel')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('xstatus')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('zactive');
						
						
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
					$this->result = "Approval Created";
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Approval!";
				
				 $this->showentry($success, $this->result);
				 
				 
				
		}
		
		public function editglchartsub($xsl){
			
			if (!isset($_POST['xsl']) || empty($_POST['xsl'])){
					header ('location: '.URL.'approval');
					exit;
				}
				
			$result = "";
			$xsl = $_POST['xsl'];
			
			$success=false;
			$form = new Form();
				$data = array();
				
				try{
					
					
				
				
			$form	->post('xuser')
					->val('minlength', 1)
					->val('maxlength', 100)
					
					->post('xlevel')
					->val('minlength', 1)
					->val('maxlength', 50)
					
					->post('xstatus')
					->val('minlength', 1)
					->val('maxlength', 50)
					
					->post('zactive');
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
				
				$success = $this->model->editglchartsub($data, $xsl);
				
				
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
				 $this->showapproval($xsl, $result);
				
		
		}
		
		public function showapproval($xsl,$result=""){
		if($xsl==""){
			header ('location: '.URL.'glchartsubentry');
			exit;
		}
		$dept = "";
		$tblvalues=array();
		$btn = array(
			"New" => URL."approval/glchartsubentry"
		);
		
		$tblvalues = $this->model->getSingleglAproval($xsl);

		if(!empty($tblvalues))
			$dept = $tblvalues[0]['xdept'];
		
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Approval", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."approval/editglchartsub/".$xsl, "Edit",$tblvalues, "");
			
			$this->view->table = $this->renderTable($dept);
			
			$this->view->renderpage('approval/glchartsubentry');
		}
		
		
		
		public function showentry($xsl, $result=""){
		
		$dept = "";
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."approval/glchartsubentry"
		);
		
		$tblvalues = $this->model->getSingleglAproval($xsl);

		if(!empty($tblvalues))
			$dept = $tblvalues[0]['xdept'];
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
		
		$dynamicForm = new Dynamicform("Approval", $btn, $result);		
		
		$this->view->dynform = $dynamicForm->createForm($this->fields, URL."approval/saveglchartsub", "Save",$tblvalues ,"");
			
		$this->view->table = $this->renderTable($dept);
		$this->view->renderpage('approval/glchartsubentry');
		}

		public function showdeptaprroval($dept){
		
			$tblvalues=array();
			$btn = array(
				"Clear" => URL."approval/glchartsubentry"
			);
			
			$tblvalues = $this->model->getDeptApproval($dept);
			
			if(empty($tblvalues))
				$tblvalues=$this->values;
			else
				$tblvalues=array(
					"xdept"=>$dept,
					"xuser"=>"",
					"xlevel"=>"",
					"xstatus"=>"",
					"xsl"=>"0",
					"zactive"=>"1"
					);
			
			$dynamicForm = new Dynamicform("Approval", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."approval/saveglchartsub", "Save",$tblvalues ,"");
				
			$this->view->table = $this->renderTable($dept);
			$this->view->renderpage('approval/glchartsubentry');
			}
		
		function renderTable($dept){
			$fields = array(
						"xsl-Txn",
						"xdept-Department",
						"xlevel-Level",
						"xstatus-Status",
						"xuser-User",
						"zactive-Active?"
						);
			$table = new Datatable();
			$row = $this->model->getApprovalByLimit($dept);
			//print_r($row);die;
			return $table->createTable($fields, $row, "xsl", URL."approval/showapproval/", URL."approval/deleteapproval/");
			
			
		}
		
		function userpicklist(){
			$this->view->table = $this->userPickTable();
			
			$this->view->renderpage('approval/glchartsubpicklist', false);
		}
		
		function userPickTable(){
			$fields = array(
						"xuser-User",
						"zuserfullname-Full Name",
						"zusermobile-Mobile"
						);
			$table = new Datatable();
			$row = $this->model->getUserList();
			
			return $table->picklistTable($fields, $row, "xuser");
		}
		
		function approvalshow(){
			$rows = $this->model->getDeptWiseApproval();
			//print_r($rows);
			$cols = array("xdept-Department","xlevel-Level","xstatus-Status","xuser-User");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xdept",URL."approval/showdeptaprroval/");
			$this->view->renderpage('approval/glchartsublist', false);
		}
		
		function glchartsubentry(){
				
		$btn = array(
			"Clear" => URL."approval/glchartsubentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Approval",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."approval/saveglchartsub", "Save",$this->values, "");
			$this->view->table = "";
			$this->view->renderpage('approval/glchartsubentry', false);
		}
		
		public function deleteapproval($xsl){
			$where = " where bizid=".Session::get('sbizid')." and xsl='".$xsl ."'";
			$this->model->delete($where);
			$this->view->message = "";
			$this->showapproval($xsl);
		}
		function approvallist(){
			$rows = $this->model->getApprovalForList();
			$cols = array("Department","Level","Status","User");
			$table = new Datatable();
			$this->view->table = $table->singleGroupTable($cols, $rows, "xdept");
			$this->view->renderpage('approval/glchartsublist', false);
		}
}