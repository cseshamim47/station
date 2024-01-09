<?php
class Glinterface extends Controller{
	
	function __construct(){
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
			if($logged == false){
				Session::destroy();
				header('location: '.URL.'glinterface');
				exit;
			}
		
			
		//add page related java scripts/jquery in array. Only rendered on this page load	
		$this->view->js = array('public/js/datatable.js','views/codes/js/codevalidator.js');
		}
		/*
		* $codetype is key for all the code creation
		* reneder table and shared by all the functions
		* $firstparam is the field header to be render
		* $secondparam is array of data selected from db
		* $thirdparam is for edit or delete url id
		* $fourthparam is base url for edit OPTIONAL
		* $fifthparam is base url for delete OPTIONAL
		**/
		function renderTable($codetype){
			$fields = array(
						"xsl-Interface Code",
						"xacc-Account Code",
						"xdesc-Description",
						"xaction-Event",
						"xformula-Furmula",
						);
			$table = new Datatable();
			$row = $this->model->getAllcodes($codetype, $fields);
			
			return $table->createTable($fields, $row, "xacc", URL."glinterface/showcode/".$codetype."/", URL."glinterface/deletecode/".$codetype."/");
			
			
		}
		
		//render index page
		public function index($codetp=""){
			
		$usersessionmenu = 	Session::get('mainmenus');
		$iscode=0;
		foreach($usersessionmenu as $menus){
				if($menus["xsubmenu"]==$codetp)
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
		
			
			$this->view->codetype = $codetp;
			
			$this->view->table = $this->renderTable($codetp);
			$this->view->rendermainmenu('glinterface/index');
		}
		//show code by code type and code
		public function showcode($codetp="", $code=""){
			
			
			$this->view->codetype = $codetp;
			
			$xacc = "";
			$xaction = "";
			$xformula = "";
			
			foreach ($this->model->getCode($codetp, $code) as $key=>$value){
				$xacc = $value['xacc'];
				$xaction = $value['xaction'];
				$xformula = $value['xformula'];
			}
			
			$this->view->xacc = $xacc;
			$this->view->xaction = $xaction;
			$this->view->xformula = $xformula;
			$this->view->rendermainmenu('glinterface/codedit');
		}
		//create new code
		public function create(){
				$form = new Form();
				$data = array();
				
				try{
				$form	->post('xtypeinterface')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('xacc')
						->val('minlength', 1)
						->val('maxlength', 50)

						->post('xformula')
						->val('minlength', 1)
						->val('maxlength', 50)
				
						->post('xaction')
						->val('minlength', 1)
						->val('maxlength', 150);
				
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data); die;	
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
								
				$success = $this->model->create($data);
					
				
				}catch(Exception $e){
					
					$this->view->message = $e->getMessage();
					
				}
				$this->view->codetype = $_POST['xtypeinterface'];
				$this->view->table = $this->renderTable($_POST['xtypeinterface']);
				$this->view->rendermainmenu('glinterface/index');
				//header('location: '. URL .'code/index/'.$_POST['xcodetype'].'/'.$this->msg);
		}
		//update new code
		public function edit(){
				$form = new Form();
				$data = array();
				
				try{
				$form	->post('xtypeinterface')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('xacc')
						->val('minlength', 1)
						->val('maxlength', 50)

						->post('xformula')
						->val('minlength', 1)
						->val('maxlength', 50)
				
						->post('xaction')
						->val('minlength', 1)
						->val('maxlength', 150);
				
						
				$form	->submit();
				
				$data = $form->fetch();	
					
				$data['bizid'] = Session::get('sbizid');
								
				$where = "bizid=".Session::get('sbizid')." and xacc='".$data['xacc']."' and xtypeinterface='".$data['xtypeinterface']."'";
				$this->model->update($data, $where);
					
				
				}catch(Exception $e){
					
					$this->view->message = $e->getMessage();
					
				}
				$this->view->codetype = $data['xtypeinterface'];
				$this->view->table = $this->renderTable($data['xtypeinterface']);
				$this->view->rendermainmenu('glinterface/index');
				
			}
		
	public function deletecode($codetp, $code){
			$where = " where bizid=".Session::get('sbizid')." and xcodetype='". $codetp ."' and xcode='". $code ."'";
			$this->model->deletecode($where);
			$this->view->codetype = $codetp;
			$this->view->table = $this->renderTable($codetp);
			$this->view->rendermainmenu('codes/index');
	}
			
}