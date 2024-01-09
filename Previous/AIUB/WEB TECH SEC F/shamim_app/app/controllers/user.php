<?php
class User extends Controller{
	
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
				if($menus["xsubmenu"]=="User Management")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','public/js/imageshow.js','views/items/js/codevalidator.js');
		
		$this->values = array(
			"zemail"=>"",
			"zpassword"=>"",
			//"xconfirm"=>"",
			"zrole"=>"",
			"xbranch"=>"",
			"zactive"=>"1",
			"zuserfullname"=>"",
			"zusermobile"=>"",
			"zuseradd"=>"",
			"zaltemail"=>"",
			"zcomments"=>"",
			"xpassconf"=>""
			);
		
		$this->fields = array(array(
							"zemail-text"=>'User Email_maxlength="100" email="true"',
							"zuserfullname-text"=>'Full User Name_minlength="4" maxlength="50"'
							),
						array(
							"zusermobile-text"=>'Mobile No_maxlength="14"',
							"zaltemail-text"=>'Alternate Email_maxlength="100" email="true"'
							),
						array(
							"zpassword-password"=>'Password_maxlength="256"',
							//"xconfirm-password"=>'Confirm Password_equalTo="#zpassword"',
							"xpassconf-password"=>'Confirm Password_equalTo="#zpassword"',
							),	
						array(
							"zuseradd-textarea"=>'Full Address_maxlength="250"'
							),
						array(
							"zcomments-textarea"=>'Comments_maxlength="250"'
							),	
						array(
							"zrole-select_zrole"=>'Role_""',
							"xbranch-select_Branch"=>'Branch_""'
							),
						array(
							"zactive-checkbox_1"=>'Active?_""'
							)		
						);
			
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."users/userentry",
		);	
		
		
		// form data
		
			$dynamicForm = new Dynamicform("User",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."user/saveusers", "Save",$this->values,URL."user/showpost","imagefield");
			
			//$this->view->table = $this->renderTable();
			
			$this->view->rendermainmenu('user/index');
			
		}
		
		public function saveusers(){
				if (!isset($_POST['zemail'])){
					header ('location: '.URL.'user');
					exit;
				}
		
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				try{
					
				$row = $this->model->rowplus("pausers", "xuserrow");
				
				$form	->post('zemail')
						->val('minlength', 3)
						->val('maxlength', 100)
										
				
						->post('zuserfullname')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('zusermobile')
						->val('maxlength', 14)
				
						->post('zaltemail')
						->val('maxlength', 100)
						
						
						->post('zpassword')
						->val('minlength', 6)
						->val('maxlength', 256)
						
						->post('zuseradd')
						->val('maxlength', 250)
						
						->post('zcomments')
						->val('maxlength', 250)
						
						->post('zrole')
						
						->post('xbranch')
						
						->post('zactive');
						
						
						
				$form	->submit();
				
				$data = $form->fetch();
					
				$data['bizid'] = Session::get('sbizid');
				$data['xuserrow'] = $row;
				$username = $data['zemail'];
				
				//print_r($data);die;				
				$success = $this->model->create($data);
				
				if ($_FILES['imagefield']["name"]){
						$imgupload = new ImageUpload();
						$imgupload->store_uploaded_image('images/management/','imagefield', 171, 181, $username);
					}
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				$user="";
				
				if($success>0){
					$this->result = "User saved successfully";
					$user=$_POST["zemail"];
				}
				if($success == 0 && empty($this->result))
					$this->result = "Failed to save user!";
				
				 $this->showentry($success, $this->result);
				 
				 
				
		}
		
		public function edituser($usersl){
			if (!isset($_POST['zemail'])){
					header ('location: '.URL.'user');
					exit;
				}
			$result = "";
			$user = $_POST['zemail'];
			$success=false;
			$form = new Form();
				$data = array();
				
				try{
				$form	->post('zemail')
						->val('minlength', 3)
						->val('maxlength', 100)
										
				
						->post('zuserfullname')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('zusermobile')
						->val('maxlength', 14)
				
						->post('zaltemail')
						->val('maxlength', 100)
						
						
						->post('zpassword')
						->val('minlength', 6)
						->val('maxlength', 250)
						
						->post('zuseradd')
						->val('maxlength', 250)
						
						->post('zcomments')
						->val('maxlength', 250)
						
						->post('zrole')
						
						->post('xbranch')
						
						->post('zactive');
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
				$success = $this->model->editUser($data, $usersl);
				
				
				}catch(Exception $e){
					//echo $e->getMessage();die;
					$result = $e->getMessage();
					
				}
				if($result==""){
				if($success){
					$result = "Edited successfully";
					$file = 'images/management/'.$user.'.jpg';
					if ($_FILES['imagefield']["name"]){
						if(file_exists($file))
							unlink($file); 
						
						$imgupload = new ImageUpload();
						$imgupload->store_uploaded_image('images/management/','imagefield', 171, 181, $user);
					}
				}
				else
					$result = "Edit failed!";
				
				}
				 $this->showuser($usersl, $result);
				
		
		}
		
		public function showuser($usersl="", $result=""){
		if($usersl==""){
			header ('location: '.URL.'user');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."user/userentry"
		);
		
		$tblvalues = $this->model->getSingleUser($usersl);
		//print_r($tblvalues);
		$user = "";
		if(empty($tblvalues)){
			$tblvalues=$this->values;
		}else{
			$tblvalues=$tblvalues[0];
			$tblvalues['zpassword']=$tblvalues['zpasshint'];
			$tblvalues['xpassconf']=$tblvalues['zpasshint'];		
					
			$user=$tblvalues['zemail'];
		}
		//print_r($tblvalues);
		//echo $user;
		$file = 'images/management/'.$user.'.jpg';
		//echo $file;die;
		
		$imagename = "";	
		if(file_exists($file))
			$imagename = '../../images/management/'.$user.'.jpg';
		else
			$imagename = '../../images/students/noimage.png';
		
		//echo $imagename;die;
		
		$this->view->filename = $imagename;
			
			$dynamicForm = new Dynamicform("User", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."user/edituser/".$usersl, "Edit",$tblvalues, URL."user/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('user/userentry');
		}
		
		
		
		public function showentry($usersl, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."user/userentry"
		);
		
		//echo $file;die;
		$tblvalues = $this->model->getSingleUser($usersl);
		$user = "";
		if(empty($tblvalues)){
			$tblvalues=$this->values;
		}else{
			$tblvalues=$tblvalues[0];
			$tblvalues['zpassword']=$tblvalues['zpasshint'];
			$tblvalues['xpassconf']=$tblvalues['zpassword'];
			$user = $tblvalues['zemail'];
		}
		//print_r($tblvalues);
		$file = 'images/management/'.$user.'.jpg';
		$imagename = "";	
		if(file_exists($file))
			$imagename = '../../images/management/'.$user.'.jpg';
		else
			$imagename = '../../images/students/noimage.png';
		
		//echo $imagename;die;
		
			$this->view->filename = $imagename;
			
			$dynamicForm = new Dynamicform("User", $btn, $result);		
			//print_r($this->fields);
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."user/saveusers", "Save",$tblvalues ,URL."user/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('user/userentry');
		}
		
		function renderTable(){
			$fields = array(
						"xusersl-SL",
						"zemail-User",
						"zuserfullname-Name",
						"zusermobile-Mobile",
						"xbranch-Branch",
						"zrole-Role"
						);
			$table = new Datatable();
			$row = $this->model->getUsersByLimit();
			
			return $table->myTable($fields, $row, "xusersl", URL."user/showuser/");
			
			
		}
		
		function userlist(){
			$this->view->table = $this->itemTable();
			
			$this->view->renderpage('user/userlist', false);
		}
				
		
		function itemTable(){
			$fields = array(
						"xusersl-SL",
						"zemail-User",
						"zuserfullname-Name",
						"zusermobile-Mobile",
						"zuseradd-Address",
						"zrole-Role"
						);
			$table = new Datatable();
			$row = $this->model->getUsersByLimit();
			
			return $table->createTable($fields, $row, "xusersl", URL."user/showuser/", URL."user/deleteuser/");
		}
		
		function userentry(){
				
		$btn = array(
			"Clear" => URL."user/userentry"
		);
		$imagename = '../images/students/noimage.png';
		$this->view->filename = $imagename;

		
			$dynamicForm = new Dynamicform("User",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."user/saveusers", "Save",$this->values, URL."user/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('user/userentry', false);
		}
		
		public function deleteuser($usersl){
			$where = "bizid=".Session::get('sbizid')." and xusersl='".$usersl."'";
			$this->model->delete($where);
			$this->view->message = "";
			$this->userlist();
		}
		
		public function showpost(){
			$user = $_POST['zemail'];
			//echo $user;
		$tblvalues=array();
		$btn = array(
			"New" => URL."user/userentry"
		);
		
		$tblvalues = $this->model->getSingleUserByEmail($user);
		$file = 'images/management/'.$user.'.jpg';
		$usersl = "";
		if(empty($tblvalues)){
			$tblvalues=$this->values;
		}else{
			$tblvalues=$tblvalues[0];
			$tblvalues['zpassword']=$tblvalues['zpasshint'];
			$tblvalues['xpassconf']=$tblvalues['zpassword'];
			$usersl=$tblvalues['xusersl'];
		}
		
		$imagename = "";	
		if(file_exists($file))
			$imagename = '../../'.$file;
		else
			$imagename = '../../images/students/noimage.png';
		
		$this->view->filename = $imagename;
			
			
			$dynamicForm = new Dynamicform("User", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."user/edituser/".$usersl, "Edit",$tblvalues, URL."user/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('user/userentry');
		}

		function picklist(){
			$this->view->table = $this->userPickTable();
			
			$this->view->renderpage('suppliers/supplierpicklist', false);
		}
		
		function userPickTable(){
			$fields = array(
						"zemail-User",
						"zuserfullname-Name",
						"zusermobile-Mobile",
						"zuseradd-Address",
						"zrole-Role"
						);
			$table = new Datatable();
			$row = $this->model->getUsersPiclist();
			
			return $table->picklistTable($fields, $row, "zemail");
		}
}