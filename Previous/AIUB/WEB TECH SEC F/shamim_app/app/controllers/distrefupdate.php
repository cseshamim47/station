<?php
class Distrefupdate extends Controller{
	
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
				if($menus["xsubmenu"]=="Reference Update")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distrefupdate/js/codevalidator.js','views/distrefupdate/js/bindt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"bin"=>"",
			"xorg"=>"",
			"refbin"=>"",
			"refname"=>""
			);
			
			$this->fields = array(
						array(
							"bin-text"=>'BIN*~star_maxlength="50"',
							"xorg-text"=>'Full Name_maxlength="100" readonly'							
							),
						array(
							"refbin-text"=>'Ref. BIN*~star_maxlength="50"',
							"refname-text"=>'Ref. Full Name_maxlength="100" readonly'
							)
							
						);
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."distrefupdate/distributorentry",
		);	
		
			
			$this->view->rendermainmenu('distrefupdate/index');
			
		}
		
		
		
		public function updateref(){
			
			$result = "";
			
			$success=false;
			$form = new Form();
				$data = array();
				
				try{
					
				if($_POST['bin']==""){
						throw new Exception("BIN Not Found!");
					}
				if($_POST['refbin']==""){
						throw new Exception("Ref. BIN Not Found!");
					}	
				
				$form	->post('bin')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('refbin')
						->val('minlength', 1)
						->val('maxlength', 20);
						
				$form	->submit();
			
				$data = $form->fetch();	
				//print_r($data);die;
				$data['distrisl'] = $this->model->getbindt($data['refbin'])[0]['distrisl'];
				
				$success = $this->model->editRef($data);
				
				
				}catch(Exception $e){
					
					$result = $e->getMessage();
					
				}
				if($result==""){
				if($success)
					$result = " Reference updated successfully";
				else
					$result = " Reference update failed!";
				
				}
				 $this->refentry($data['refbin'].$result);		
		
		}
				
				
		function refentry($result=""){
				
		$btn = array(
			"Clear" => URL."distrefupdate/refentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Rreference",$btn,$result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distrefupdate/updateref", "Update",$this->values);
			
			
			
			$this->view->renderpage('distrefupdate/refentry', false);
		}
		
		function bindt($bin){
			return $this->model->getBinDetail($bin);
		}
		
}