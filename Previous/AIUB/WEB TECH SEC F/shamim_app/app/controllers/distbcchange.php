<?php
class Distbcchange extends Controller{
	
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
				if($menus["xsubmenu"]=="BC Transfer")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distjoin/js/codevalidator.js','views/distbcchange/js/bindt.js');
		
		$this->values = array(
			"bin"=>"",
			"binname"=>"",
			"xrdin"=>"",
			"rinname"=>""			
			);
			
			$this->fields = array(array(
							"xrdin-text"=>'Transfer To RIN*~star_maxlength="20"',
							"rinname-text"=>'Name_readonly'
							),array(
							"bin-text"=>'Transfer BIN*~star_maxlength="11"',
							"binname-text"=>'Name_readonly'
							)
						);
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."distbcchange/changeentry",
		);	
			
		
			$this->view->rendermainmenu('distbcchange/index');
			
		}
		
		public function savejoining(){
				
		
				$stno = $this->model->getStatementNo();
				$form = new Form();
				$data = array();
				$sucs=0;
				$success="";
				$result = ""; 
				
				
				try{
					
					$rindt=$this->model->getDistrislByDin($_POST["xrdin"]);
		
					$bindt=$this->model->getDistrislByBin($_POST["bin"]);
					
					
					
					$bc = $this->model->getRow("mlmtree","distrisl",$rindt[0]["distrisl"],"bc");
									
					
					
				$form	->post('bin')
						->val('minlength', 1)
						->val('maxlength', 20)
												
				
						->post('xrdin')
						->val('minlength', 4)
						->val('maxlength', 160);
						
						
						
				$form	->submit();
				
				$data = $form->fetch();
								
								
				$success = $this->model->create($bindt,$bc,$rindt[0]["distrisl"]);
				
				if(empty($success))
					$sucs=0;
				else
					$sucs=1;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				
				
				if($sucs>0){
					$this->result = " BIN Transfered Successfully";
					
				}
				if($sucs == 0 && empty($this->result))
					$this->result = "Failed to transfer BIN!";
				
				
				 $this->showentry($success, $this->result);
				 
				 
				
		}
		
		
		public function showentry($bins, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."distbcchange/changeentry"
		);
		
		
		
		
			$dynamicForm = new Dynamicform("Placement", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distbcchange/savejoining", "Transfer",$this->values);
			
			$this->view->table = "";
			
			$this->view->renderpage('distbcchange/changeentry');
		}
		
		
		
		
		function changeentry(){
				
		$btn = array(
			"Clear" => URL."distbcchange/changeentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Business Center Transfer",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distbcchange/savejoining", "Transfer",$this->values);
			
			
			$this->view->renderpage('distbcchange/changeentry', false);
		}
		
		
		
		function bindt($bin){
			return $this->model->getBinDetail($bin);
		}
		
		function inforindt($rin){
			return $this->model->getInfoRinDetail($rin);
		}
		
}