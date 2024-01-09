<?php
class Customertemp extends Controller{
	
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
				if($menus["xsubmenu"]=="2 Customer From RIN")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/customers/js/codevalidator.js','views/distjointemp/js/rindt.js','views/distjoin/js/rindt.js');
		
		$this->values = array(
			"xrdin"=>"",
			"rinname"=>"",
			"xmobile"=>""
			);
			
			$this->fields = array(array(
							"xrdin-text"=>'RIN*~star_maxlength="20"',
							"rinname-text"=>'Name_maxlength="100" readonly'
							),
							array(
							"xmobile-text"=>'Mobile*~star_maxlength="20"'
							)
						);
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."customertemp/customerentry",
		);	
		
		
		// form data
		
			$dynamicForm = new Dynamicform("Customer",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."customertemp/savecustomers", "Save",$this->values,URL."customertemp/showpost");
			
			
			
			$this->view->rendermainmenu('customertemp/index');
			
		}
		
		public function savecustomers(){
				if (empty($_POST['xrdin'])){
					header ('location: '.URL.'customertemp/customerentry');
					exit;
				}
				
				$crcin ="";	
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				try{
					if($_POST['xrdin']=="" || empty($_POST['xrdin'])){
						throw new Exception("RIN not found!");
					}
				
				$form	->post('xrdin')
						->val('minlength', 1)
						->val('maxlength', 20)
										
				
						->post('xmobile')
						->val('minlength', 6)
						->val('maxlength', 20);
						
				$form	->submit();
				
				$data = $form->fetch();
				
				
				
				$retailer = $this->model->getSingleCustomer($data['xrdin']);
				
				//print_r($retailer); die;
				if(empty($retailer)){
						throw new Exception("RIN Not Found!");
					}
				
				if($retailer[0]['xmobile']!= $data['xmobile']){
						throw new Exception("Mobile and RIN not Matched!");
					}
				if($retailer[0]['xcus']!="" || !empty($retailer[0]['xcus'])){
						throw new Exception("Customer Exists!");
					}
				$agent = explode('@',$retailer[0]['zemail']);		
				$cin = explode('-',$retailer[0]['xrdin']);
				$crcin = "ABP"."-".$cin[1]."-".$cin[2];
				$data['xcus'] = $crcin;
				$data['xorg'] = $retailer[0]['xorg'];				
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = $agent[0];
				$data['xagent'] = $agent[0];
				$cols = "`bizid`, `xagent`, `xcus`, `xorg`, `zemail`,`xmobile`";			
				$vals = "(".Session::get('sbizid').",'".$agent[0]."','".$crcin."','".$retailer[0]['xorg']."','".$agent[0]."','".$retailer[0]['xmobile']."')";
				
				$success = $this->model->create($cols,$vals);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
							
				
				if($success>0){
					$this->result = "CIN No : ".$crcin." created!";
					$postdata=array(
						"xcus" => $crcin
						);
					$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xrdin='". $data['xrdin'] ."'";	
					$this->model->update($postdata, $where);	
				}
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to create CIN!";
				
				 $this->showentry($crcin, $this->result);
				 
				 
				
		}
		
				
		public function showentry($cus, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."customertemp/customerentry"
		);
		
		
			
			$dynamicForm = new Dynamicform("Customer", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."customertemp/savecustomers", "Save",$this->values );
			
			
			
			$this->view->renderpage('customertemp/customerentry');
		}
		
		
		function customerentry(){
				
		$btn = array(
			"Clear" => URL."customertemp/customerentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Customer",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."customertemp/savecustomers	", "Save",$this->values);
			
			
			
			$this->view->renderpage('customertemp/customerentry', false);
		}
		
		
}