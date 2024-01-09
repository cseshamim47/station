<?php
class Holiday extends Controller{
	
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
				if($menus["xsubmenu"]=="Holiday Setup")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		// $this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/gljvvou/js/getaccdt.js');
		$dt = date("Y/m/d");
		
		$date = date('Y-m-d', strtotime($dt));
		$year = date('Y',strtotime($date));
		$month = date('M',strtotime($date));
		$this->values = array(
			"xholiday"=>"",
			"xfromdate"=>$dt,
			"xtodate"=>$dt,
			"xper"=>"",
			"xyear"=>$year,
			"xsl"=>"0"
			);
			
			$this->fields = array(
						array(
							"xholiday-text" => 'Holiday Type_minlength="1" required'
							),
						array(							
							"xfromdate-datepicker" => 'From Date_""',
							"xtodate-datepicker" => 'To Date_""'
							),
						array(
							"xper-select_Month"=>'Month_""',
							"xyear-select_Academic Year" => 'Year_""'
							),
						array(
							"xsl-hidden"=>'_""'
							)
						);
						
								
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."holiday/leaveapplyentry",
		);	
			$this->view->rendermainmenu('holiday/index');
			
		}
		
		public function saveholiday(){
				
				$xdate = date("Y/m/d");
				$dt = str_replace('/', '-', $xdate);
				$today = date('Y-m-d', strtotime($dt));

				$fdate = $_POST['xfromdate'];
				$fdt = str_replace('/', '-', $fdate);
				$fdate = date('Y-m-d', strtotime($fdt));
				$year = date('Y',strtotime($fdate));
				$month = date('m',strtotime($fdate));

				//echo $fdate .' - '; 

				$tdate = $_POST['xtodate'];
				$tdt = str_replace('/', '-', $tdate);
				$tdate = date('Y-m-d', strtotime($tdt));

				//echo $tdate.' - ';


				$form = new Form();
				$data = array();
				$success=0;
				$result = ""; 

				// $getdays = $this->model->getleavedays($year,$leavetype);
				// $getdayapp = $this->model->getleavedayapp($year,$leavetype);
				
				try{
					
				
				
				$form	->post('xholiday')
						->val('minlength', 1);	

						// ->post('xremark')
						// ->val('maxlength', 300);
						
						
				$form	->submit();
				
				$data = $form->fetch();

				$earlier = new DateTime($fdate);
				$later = new DateTime($tdate);
				$diff = $later->diff($earlier)->format("%a");
				
				//echo $diff;die;
				
				
				$data['xdate'] = $today;
				$data['xfromdate'] = $fdate;
				$data['xtodate'] = $tdate;
				$data['xnumdays'] = $diff+1;
				$data['xyear'] = $year;
				$data['xper'] = $month;
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');			
				

				$success = $this->model->create($data);
				
				if(empty($success))
					$success=0;

				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				
				if($success>0)
					$this->result = 'Holiday Entry successful';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Holiday Entry! Reason: Could be Duplicate Account Code or system error!";
				
				 $this->showentry($success, $this->result);
				 
				 
				
		}
		
		public function editholiday(){
			
			$fdate = $_POST['xfromdate'];
			$fdt = str_replace('/', '-', $fdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			$year = date('Y',strtotime($fdate));
			$month = date('m',strtotime($fdate)); 

			$tdate = $_POST['xtodate'];
			$tdt = str_replace('/', '-', $tdate);
			$tdate = date('Y-m-d', strtotime($tdt));

			$result = "";
			$success=false;
			$xsl = $_POST['xsl'];
			$form = new Form();
				$data = array();
				
				try{
				
				
				$form	->post('xholiday')
						->val('minlength', 1);
						
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				$earlier = new DateTime($fdate);
				$later = new DateTime($tdate);
				$diff = $later->diff($earlier)->format("%a");
				$data['xfromdate'] = $fdate;
				$data['xtodate'] = $tdate;
				$data['xnumdays'] = $diff+1;

				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");

				// $temp = $this->model->getSingleLeaveApply($xsl);
				// $report = $this->model->getSingleLeaveReport($xsl);

				
				$success = $this->model->editholiday($data,$xsl);
				
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
			"Clear" => URL."holiday/leaveapplyentry"
		);
		
		$tblvalues = $this->model->getLeaveApply($xsl);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(					
					"xholiday"=>$tblvalues[0]['xholiday'],
					"xfromdate"=>$tblvalues[0]['xfromdate'],
					"xtodate"=>$tblvalues[0]['xtodate'],
					"xper"=>$tblvalues[0]['xper'],
					"xyear"=>$tblvalues[0]['xyear'],
					"xsl"=>$tblvalues[0]['xsl']
					);
			
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Holiday Entry", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."holiday/editholiday", "Edit",$tblvalues);
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('holiday/leaveapplyentry');
		}
		
		function renderTable(){
			$fields = array("xsl-ID","xholiday-Holiday Type","xfromdate-From Days","xtodate-To Days","xnumdays-Days","xper-Month","xyear-Year");
			$table = new Datatable();
			$row = $this->model->getApplyByLimit(" LIMIT 5");
			
			return $table->myTable($fields, $row, "xsl", URL."holiday/showentry/");
		}
		
		function applylist(){
			$rows = $this->model->getLeaveApplyList();
			$cols = array("xsl-ID","xholiday-Holiday Type","xfromdate-From Days","xtodate-To Days","xnumdays-Days","xper-Month","xyear-Year");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xsl",URL."holiday/showentry/", URL."holiday/deleteholiday/");
			$this->view->renderpage('holiday/applylist', false);
		}
		
		
		function leaveapplyentry(){
				
		$btn = array(
			"Clear" => URL."holiday/leaveapplyentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Holiday",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."holiday/saveholiday", "Save",$this->values);
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('holiday/leaveapplyentry', false);
		}
		
		public function deleteholiday($row){
			//$tbldtvals = $this->model->getSinglePolicyDt($row);
			$where = "where bizid=".Session::get('sbizid')." and xsl='". $row ."'";
			$this->model->deleteholiday($where);
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