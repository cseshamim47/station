<?php 
class Empdutytime extends Controller{
	
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
				if($menus["xsubmenu"]=="Employee Duty Time")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		// $this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/gljvvou/js/getaccdt.js');
		
		$this->values = array(
			"xoftime"=>"",
			"xetime"=>"",
			"xptime"=>"",
			"xmaxetime"=>"",
			"xshift"=>"",
			"xsl"=>"0"
			);
			
			$this->fields = array(
						array(
							"xoftime-text" => 'Office Time_""',
							"xetime-text" => 'Exit Time_""'
							),
						array(							
							"xptime-text" => 'Present Time_""',
							"xmaxetime-text" => 'Maximum Exit Time_""'
							),
						array(
							"xshift-select_Shift"=>'Shift_maxlength="30"'
							),
						array(
							"xsl-hidden"=>'_""'
							)
						);
						
								
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."empdutytime/leaveapplyentry",
		);	
			$this->view->rendermainmenu('empdutytime/index');
			
		}
		
		public function saveleaveapply(){
				
				$form = new Form();
				$data = array();
				$oftime = $_POST['xoftime'];
				$etime = $_POST['xetime'];
				$ptime = $_POST['xptime'];
				$maxetime = $_POST['xmaxetime'];
				$shift = $_POST['xshift'];
				$success=0;
				$result = ""; 

				// $getdays = $this->model->getdutytime($oftime,$etime,$ptime,$maxetime,$shift);
				
				
				try{
					
					
					
				
				$form	->post('xoftime')
						->val('minlength', 1)
						
						->post('xetime')
						->val('minlength', 1)
							
						->post('xptime')
						->val('minlength', 1)	

						->post('xmaxetime')
						->val('minlength', 1)

						->post('xshift')
						->val('maxlength', 30);
						
						
				$form	->submit();
				
				$data = $form->fetch();

				$data['bizid'] = Session::get('sbizid');

				$success = $this->model->create($data);
				
				if(empty($success))
					$success=0;

				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				
				if($success>0)
					$this->result = 'Time Entry successful';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Time! Reason: Could be Duplicate Account Code or system error!";
				
				 $this->showentry($success, $this->result);
				 
				 
				
		}
		
		public function editSetTime(){
			
			$result = "";
			$success=false;
			$xsl = $_POST['xsl'];
			$form = new Form();
				$data = array();
				
				try{
				
				
				$form	->post('xoftime')
						->val('minlength', 1)
						
						->post('xetime')
						->val('minlength', 1)
							
						->post('xptime')
						->val('minlength', 1)	

						->post('xmaxetime')
						->val('minlength', 1)

						->post('xshift')
						->val('maxlength', 30);

				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				
				$data['bizid'] = Session::get('sbizid');

				$success = $this->model->editSetTime($data,$xsl);
				
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
				
				 $this->showentry($xsl, $result);
				
		
		}
		
		
		public function showentry($xsl, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."empdutytime/leaveapplyentry"
		);
		
		$tblvalues = $this->model->getSetTime($xsl);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else

			$tblvalues=array(					
					"xoftime"=>$tblvalues[0]['xoftime'],
					"xetime"=>$tblvalues[0]['xetime'],
					"xptime"=>$tblvalues[0]['xptime'],
					"xmaxetime"=>$tblvalues[0]['xmaxetime'],
					"xshift"=>$tblvalues[0]['xshift'],
					"xsl"=>$tblvalues[0]['xsl']
					);
			
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Duty Time", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."empdutytime/editSetTime", "Edit",$tblvalues);
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('empdutytime/leaveapplyentry');
		}
		

		function renderTable(){
			$fields = array("xsl-ID","xoftime-Office Time","xetime-Exit Time","xptime-Present Time","xmaxetime-Maximum Exit Time","xshift-Shift");
			$table = new Datatable();
			$row = $this->model->getSetTimeLimit(" LIMIT 5");
			
			return $table->myTable($fields, $row, "xsl", URL."empdutytime/showentry/");
		}

		function applylist(){
			$rows = $this->model->getSetTimeList();
			$cols = array("xsl-ID","xoftime-Office Time","xetime-Exit Time","xptime-Present Time","xmaxetime-Maximum Exit Time","xshift-Shift");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xsl",URL."empdutytime/showentry/", URL."empdutytime/deleteleaveapply/");
			$this->view->renderpage('empdutytime/applylist', false);
		}
		
		
		function leaveapplyentry(){
				
		$btn = array(
			"Clear" => URL."empdutytime/leaveapplyentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Duty Time",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."empdutytime/saveleaveapply", "Save",$this->values);
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('empdutytime/leaveapplyentry', false);
		}
		
		public function deleteleaveapply($row){
			//$tbldtvals = $this->model->getSinglePolicyDt($row);
			$where = "where bizid=".Session::get('sbizid')." and xsl='". $row ."'";
			$this->model->deleteTime($where);
			$this->view->message = "";
			 
			$this->applylist();
		}
		
		public function deletepack($pack){
			$where = "where bizid=".Session::get('sbizid')." and xpackage='". $pack ."' and xbranch='". Session::get('sbranch') ."'";
			$this->model->delete($where);
			$this->view->message = "";
			$this->salarypacklist();
		}
	
		function stufacultypickliste(){
				$this->view->table = $this->facultyPickTablee();
				
				$this->view->renderpage('stuemployee/stufacultypicklist', false);
			}
		
		function facultyPickTablee(){
			$fields = array(
						"xrevealer-Employee ID",
						"xname-Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xemail-Email"
						);
			$table = new Datatable();
			$row = $this->model->getFacultyByLimite();
			
			return $table->picklistTable($fields, $row, "xrevealer");
		}

		
}