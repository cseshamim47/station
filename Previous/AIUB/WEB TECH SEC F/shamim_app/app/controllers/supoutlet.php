<?php
class Supoutlet extends Controller{
	
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
				if($menus["xsubmenu"]=="Outlet Setup")
					$iscode=1;							
		}	
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/suppliers/js/codevalidator.js');
		
		$this->values = array(
			"xoutletsl"=>"",
			"xsup"=>"",
			"xoutlet"=>"",
			"xdesc"=>"",
			"xadd1"=>"",
			"xdistrict"=>"",
			"xthana"=>"",
			"xmobile"=>"",
			"xphone"=>"",
			"xemail"=>"",
			"xsuffix"=>""
			);
			
	$this->fields = array(array(
							"xsup-group_".URL."suppliers/picklist"=>'Supplier Code*~star_maxlength="20"',
							"xsuffix-text"=>'Suffix_maxlength="6"',
							"xoutletsl-hidden"=>'_'
							),
						array(
							"xoutlet-text"=>'Outlet Code*~star_maxlength="20"',
							"xdesc-text"=>'Description_maxlength="20"'
							),
						array(
							"xdistrict-select_District"=>'District_maxlength="50"',
							"xthana-select_Thana"=>'Thana_maxlength="100"'
							),
						array(
							"xadd1-text"=>'Address*~star_maxlength="160"',
							"xmobile-text"=>'Mobile_maxlength="13"'
							),
						array(
							"xphone-text"=>'Phone_maxlength="13"',
							"xemail-text"=>'Email_maxlength="100"'
							)	
						);		
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."supoutlet/outletentry",
		);	
	
		$this->view->rendermainmenu('supoutlet/index');
			
		}
		
		public function saveoutlet(){
								
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				try{
					
				
				$form	->post('xsup')
						->val('minlength', 1)
						->val('maxlength', 20)
										
				
						->post('xsuffix')
						->val('maxlength', 6)
						
										
						->post('xoutlet')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xdesc')
						->val('maxlength', 50)
						
						->post('xadd1')
						->val('maxlength', 160)
						
												
						->post('xdistrict')
						->val('maxlength', 50)
						
						->post('xthana')
						
						->post('xmobile')
						->val('maxlength', 13)
						
						->post('xphone')
						
							
						->post('xemail')
						->val('maxlength', 100);
						
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
					$this->result = "Outlet saved successfully";
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to save Outlet!";
				
				 $this->showentry($success, $this->result);
				 
				 
				
		}
		
		public function editoutlet(){
			
			
			$result = "";
			
			$success=false;
			$form = new Form();
				$data = array();
				
				try{
									
				
				
				$form	->post('xsup')
						->val('minlength', 1)
						->val('maxlength', 20)
										
				
						->post('xsuffix')
						->val('maxlength', 6)
						
						->post('xoutletsl')
						->val('minlength', 1)
						
				
						->post('xoutlet')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xdesc')
						->val('maxlength', 50)
						
						->post('xadd1')
						->val('maxlength', 160)
						
												
						->post('xdistrict')
						->val('maxlength', 50)
						
						->post('xthana')
						
						->post('xmobile')
						->val('maxlength', 13)
						
						->post('xphone')
						
							
						->post('xemail')
						->val('maxlength', 100);
						
						
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
				$success = $this->model->editOutlet($data);
				
				
				}catch(Exception $e){
					
					$result = $e->getMessage();					
				}
				if($result==""){
				if($success)
					$result = "Edited successfully";
				else
					$result = "Edit failed!";
				
				}
				 $this->showoutlet($data['xoutletsl'], $result);
				
		
		}
		
		public function showoutlets($sup="", $result=""){
		
		$tblvalues=array();
		$btn = array(
			"New" => URL."supoutlet/outletentry"
		);
		
		$tblvalues = $this->model->getSupOutlets($sup);
		//print_r($tblvalues); die;
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Outlet", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."supoutlet/saveoutlet/", "Save",$tblvalues, URL."suppliers/showpost");
			
			$this->view->table = $this->renderTable($sup);
			
			$this->view->renderpage('supoutlet/outletentry');
		}
		
		public function showoutlet($outletsl, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."supoutlet/outletentry"
		);
		
		$tblvalues = $this->model->getSingleOutlet($outletsl);
		$sup = "";
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else{
			$tblvalues=$tblvalues[0];
			$sup=$tblvalues["xsup"];
		}
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Outlet", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."supoutlet/editoutlet", "Update",$tblvalues ,URL."supoutlet/showpost");
			
			$this->view->table = $this->renderTable($sup);
			
			$this->view->renderpage('supoutlet/outletentry');
		}
		
		public function showentry($outletsl, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."supoutlet/outletentry"
		);
		
		$tblvalues = $this->model->getSingleOutlet($outletsl);
		$sup = "";
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else{
			$tblvalues=$tblvalues[0];
			$sup=$tblvalues["xsup"];
		}
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Outlet", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."supoutlet/saveoutlet", "Save",$tblvalues ,URL."supoutlet/showpost");
			
			$this->view->table = $this->renderTable($sup);
			
			$this->view->renderpage('supoutlet/outletentry');
		}
		
		function renderTable($sup=""){
			$fields = array(
						"xoutletsl-Sl",
						"xoutlet-Outlet",
						"xdesc-Description",
						"xmobile-Mobile",
						"xadd1-Address"
						);
			$table = new Datatable();
			$row = $this->model->getOutlets($sup);
			
			return $table->myTable($fields, $row, "xoutletsl", URL."supoutlet/showoutlet/");
			
			
		}
		
		function supplierlist(){
			$this->view->table = $this->supplierTable();
			
			$this->view->renderpage('suppliers/supplierlist', false);
		}
		
		
		
		function supplierTable(){
			$fields = array(
						"xsup-Supplier Code"
						);
			$table = new Datatable();
			$row = $this->model->getSuppliersByLimit();
			
			return $table->createTable($fields, $row, "xsup", URL."supoutlet/showoutlets/");
		}
		
		function outletentry(){
				
		$btn = array(
			"Clear" => URL."supoutlet/outletentry"
		);

			$dynamicForm = new Dynamicform("Outlet",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."supoutlet/saveoutlet", "Save",$this->values, URL."supoutlet/showpost");
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('supoutlet/outletentry', false);
		}
		
				
		public function showpost(){
			$sup = $_POST['xsup'];
			
		
		$btn = array(
			"New" => URL."supoutlet/outletentry"
		);
		
		
			$tblvalues=$this->values;
			
			$tblvalues["xsup"]=$sup;
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Outlet", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."supoutlet/saveoutlet", "Save",$tblvalues);
			
			$this->view->table = $this->renderTable($sup);
			
			$this->view->renderpage('supoutlet/outletentry');
		}
}