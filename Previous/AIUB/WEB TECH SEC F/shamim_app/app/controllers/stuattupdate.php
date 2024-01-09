<?php
class Stuattupdate extends Controller{
	
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
				if($menus["xsubmenu"]=="Attendance Update")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js', 'views/studentmst/js/codevalidator.js');
		
		
		}
		
		public function index(){

			$this->view->rendermainmenu('stuattupdate/index');
			
		}

		function attfilter($result=""){
			
			
			$btn = array(
			"Clear" => URL."stuattupdate/attfilter"
		);
		$dt = date("Y/m/d");
		$values = array(
				"xfacultyid"=>"",
				"xdate"=>$dt
				);
				
		$fields = array(
					array(
						"xfacultyid-group_".URL."stuemployee/stufacultypicklist"=>'Employee ID_""',
						"xdate-datepicker" => 'Date_""'	
						)
					);
			
				$dynamicForm = new Dynamicform("Employee Filter",$btn, $result);		
				
				$this->view->dynform = $dynamicForm->createForm($fields, URL."stuattupdate/attstudent", "Show",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('stuattupdate/glrptfilter', false);
		}

		function attstudent($stuid = "", $date = ""){
			
			
		if (isset($_POST['xfacultyid']))
			$stuid = $_POST['xfacultyid'];	
		if (isset($_POST['xdate']))
			$date = $_POST['xdate'];
			$tdt = str_replace('/', '-', $date);
			$tdate = date('Y-m-d', strtotime($tdt));
			$attflag = "";
			$atten = $this->model->getAttendance($stuid, $tdate);
			if(!empty($atten)){
				$attflag = $atten[0]["xattflag"];
			}

		$btn = array(
			"Back" => URL."stuattupdate/attfilter"
		);
			$values = array(
					"xfacultyid"=>$stuid,
					"xdate"=>$tdate,
					"xattflag"=>$attflag
					);
					
			$fields = array(
						array(
							"xfacultyid-text"=>'Student ID_maxlength="50" readonly',
							"xdate-text"=>'Date_maxlength="50" readonly'
							),
						array(
							"xattflag-select_Present Type-Present"=>'Present?_""'
							)
						);
			$dynamicForm = new Dynamicform("Update", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($fields, URL."stuattupdate/updateatt", "Update",$values);
			
			$this->view->table = "";
			
			$this->view->renderpage('stuattupdate/attform', false);

		}

		public function updateatt(){
			
			$result = "";
			
			$success=false;
			$form = new Form();
				$data = array();
				
				try{
			
				$form	->post('xfacultyid')
						->val('minlength', 1)
						->val('maxlength', 20)

						->post('xdate')
						->val('minlength', 1)
						->val('maxlength', 20)

						->post('xattflag')
						->val('minlength', 1)
						->val('maxlength', 20);
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				// $data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				// $data['zutime'] = date("Y-m-d H:i:s");
				$success = $this->model->updateAtt($data);
				
				
				}catch(Exception $e){
					//echo $e->getMessage();die;
					$result = $e->getMessage();
					
				}
				if($result==""){
				if($success){
					$result = "Update successfully";
				}
				else
					$result = "Update failed!";
				
				}
				 $this->attfilter($result);
				
		
		}
		
		
}