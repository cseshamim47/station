<?php
class Profile extends Controller{
	
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
			"zemail"=>"",
			"zoldpassword"=>"",
			"zpassword"=>"",
			"xconfirm"=>"",
			"zuserfullname"=>"",
			"zusermobile"=>"",
			"zuseradd"=>"",
			"zaltemail"=>""
			);
		
		$this->fields = array(array(
							"zemail-text"=>'Email_maxlength="100" email="true"',
							"zuserfullname-text"=>'Full User Name_minlength="4" maxlength="50"'
							),
						array(
							"zusermobile-text"=>'Mobile No_maxlength="14"',
							"zaltemail-text"=>'Alternate Email_maxlength="100" email="true"'
							),
						array(
							"zpassword-password"=>'New Password_maxlength="256"',
							"xconfirm-password"=>'Confirm New Password_equalTo="#zpassword"'
							),
						array(
							"zoldpassword-password"=>'Old Password_maxlength="250"'
							),		
						array(
							"zuseradd-textarea"=>'Full Address_maxlength="250"'
							)		
						);
			
		}
		
		
		
		public function edituser($user){
			
			if (!isset($_POST['zemail'])){
					header ('location: '.URL.'user');
					exit;
				}
			$result = "";
			
			$success=false;
			$form = new Form();
				$data = array();
				$tblvalues = $this->model->getSingleUser($user);
				//print_r($tblvalues);die;
				$oldpostpass = Hash::create('sha256',$_POST['zoldpassword'],HASH_KEY);
				$oldpass = $tblvalues[0]['zpassword'];
				
				try{
					
					if($oldpostpass != $oldpass)
						throw new Exception("Current password did not matched!");
					
					
				$form	->post('zemail')
						->val('minlength', 7)
						->val('maxlength', 100)
						->val('checkemail')
										
				
						->post('zuserfullname')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('zusermobile')
						->val('maxlength', 14)
				
						->post('zaltemail')
						->val('maxlength', 100)
						
						
						->post('zpassword')
						->val('minlength', 5)
						->val('maxlength', 250)
						
						->post('zuseradd')
						->val('maxlength', 250);
						
						
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
				$success = $this->model->editUser($data, $user);
				
				
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
				 $this->showuser($user, $result);
				
		
		}
		
		public function showuser($user="", $result=""){
		if($user!=Session::get('suser')){
			header ('location: '.URL.'profile/showuser/'.Session::get('suser'));
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
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."profile/edituser/".$user, "Update",$tblvalues);
			
			
			
			$this->view->rendermainmenu('profile/userentry');
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
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."profile/editusers", "Save",$tblvalues );
			
			
			
			$this->view->rendermainmenu('profile/userentry');
		}
		
		
		public function showpost(){
			$user = $_POST['zemail'];
			
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
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."profile/editusers", "Update",$tblvalues);
			
			
			
			$this->view->rendermainmenu('profile/userentry');
		}
}