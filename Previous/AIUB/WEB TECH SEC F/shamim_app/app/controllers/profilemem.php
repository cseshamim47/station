<?php
class Profilemem extends Controller{
	
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
			
		
			
		$this->view->js = array('public/js/datatable.js','views/items/js/codevalidator.js');
		
		$this->values = array(
			"xrdin"=>"",
			"zoldpassword"=>"",
			"xpassword"=>"",
			"xconfirm"=>"",
			"xorg"=>"",
			"xmobile"=>"",
			"xadd1"=>"",
			"xcusemail"=>""
			);
		
		$this->fields = array(array(
							"xrdin-text"=>'User_maxlength="100"',
							"xorg-text"=>'Full User Name_minlength="4" maxlength="50"'
							),
						array(
							"xmobile-text"=>'Mobile No_maxlength="14"',
							"xcusemail-text"=>'Email_maxlength="100" email="true"'
							),
						array(
							"xpassword-password"=>'New Password_maxlength="256"',
							"xconfirm-password"=>'Confirm New Password_equalTo="#xpassword"'
							),
						array(
							"zoldpassword-password"=>'Old Password_maxlength="250"'
							),		
						array(
							"xadd1-textarea"=>'Full Address_maxlength="250"'
							)		
						);
			
		}
		
		
		
		public function edituser($user){
			
			if (empty($_POST['xrdin'])){
					header ('location: '.URL.'profilemem/showuser/'.Session::get('suser'));
					exit;
				}
			$result = "";
			
			$success=false;
			$form = new Form();
				$data = array();
				$tblvalues = $this->model->getSingleUser($user);
				//print_r($tblvalues);die;
				$oldpostpass = Hash::create('sha256',$_POST['zoldpassword'],HASH_KEY);
				$oldpass = $tblvalues[0]['xpassword'];
				
				try{
					
					if($oldpostpass != $oldpass)
						throw new Exception("Current password did not matched!");
					
					
				$form	->post('xrdin')
						->val('minlength', 7)
						->val('maxlength', 100)
						
										
				
						->post('xorg')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('xmobile')
						->val('maxlength', 14)
				
						->post('xcusemail')
						->val('maxlength', 100)
						->val('checkemail')
						
						
						->post('xpassword')
						->val('minlength', 5)
						->val('maxlength', 250)
						
						->post('xadd1')
						->val('maxlength', 250);
						
						
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
				$success = $this->model->editUser($data, $user);
				//ABL-10938-0095 yzeSYGE8 
				//mypass jutaPU%A
				
				}catch(Exception $e){
					//echo $e->getMessage();die;
					$result = $e->getMessage();
					
				}
				if($result==""){
				if($success)
					$result = "Profile updated successfully";
				else
					$result = "Profile update failed!";
				
				}
				 $this->showuser($user, $result);
				
		
		}
		
		public function showuser($user="", $result=""){
		if($user!=Session::get('suser')){
			header ('location: '.URL.'profilemem/showuser/'.Session::get('suser'));
			exit;
		}
		$tblvalues=array();
		$btn = array(
		);
		
		$tblvalues = $this->model->getSingleUser($user);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else{
			$tblvalues=$tblvalues[0];
			$tblvalues['zoldpassword']="";
		}
			$dynamicForm = new Dynamicform("User Profile", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."profilemem/edituser/".$user, "Update",$tblvalues);
			
			
			
			$this->view->rendermainmenumem('profile/userentry');
		}
		
		
		
		public function showentry($user, $result=""){
		
		$tblvalues=array();
		$btn = array(
			);
		
		$tblvalues = $this->model->getSingleUser($user);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else{
			$tblvalues=$tblvalues[0];
			$tblvalues['zoldpassword']="";
		}
			
			
			$dynamicForm = new Dynamicform("User Profile", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."profilemem/editusers", "Save",$tblvalues );
			
			
			
			$this->view->rendermainmenu('profilemem/userentry');
		}
		
		
		public function showpost(){
			$user = $_POST['xrdin'];
			
		$tblvalues=array();
		$btn = array(
			
		);
		
		$tblvalues = $this->model->getSingleUser($user);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else{
			$tblvalues=$tblvalues[0];
			$tblvalues['zoldpassword']="";
		}
			
			$dynamicForm = new Dynamicform("User Profile", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."profilemem/editusers", "Update",$tblvalues);
			
			
			
			$this->view->rendermainmenu('profilemem/userentry');
		}
}