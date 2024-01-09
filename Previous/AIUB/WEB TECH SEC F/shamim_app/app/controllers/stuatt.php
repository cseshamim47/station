<?php
class Stuatt extends Controller{
	
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
				if($menus["xsubmenu"]=="Employee Attendance")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js');
		$dt = date("Y/m/d");		
		$date = date('Y-m-d', strtotime($dt));
		$year = date('Y',strtotime($date));
		$month = date('M',strtotime($date));
		$this->values = array(
			// "xclass"=>"",
			// "xsection"=>"",
			// "xshift"=>"",
			// "xyear"=>$year
			);
			
			
		$this->fields = array(
				array(
					// "xclass-select_Class" => 'Class_""',
					// "xsection-select_Section" => 'Section_""',
					// "xshift-select_Shift" => 'Shift_""',
					// "xyear-select_Academic Year" => 'Year_""'
					)		
				);
		}
		
		public function index(){
			$btn = array(
				"Clear" => URL."stuatt/studentlist",
			);
			$this->view->rendermainmenu('stuatt/index');
			
		}
		
		public function saveatt(){
				if (empty($_POST)){
					header ('location: '.URL.'stuatt/stuattentry');
					exit;
				}
				//var_dump($_POST); die;
				/* $class = $_POST['xclass'][0];
				$section = $_POST['xsection'][0];
				$shift = $_POST['xshift'][0]; */
				$xdate = $_POST['xdate'][0];
				
				
				
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
				
				
				$success=0;
				$result = ""; 
				
				try{
					
					// if(!empty($this->model->getAttended($date))){
					// 		throw new Exception("Already attendance done!");
					// 	}
				
				//echo count($_POST['xfacultyid'])."</br>";
				$cols = "`xdate`,`bizid`,`xid`,`zemail`,`xbranch`,`xstudentid`,`xattflag`,`xyear`,`xper`,`xtype`,`xdatetime`,`xtime`";
				
				$vals = "";
				for($i=0; $i<count($_POST['xfacultyid']); $i++){
					$emp = $this->model->getEmp($_POST['xfacultyid'][$i]);
					$datetime = date('Y-m-d H:i:s',strtotime($_POST['xtime'][$i],strtotime($date)));

					if($_POST['xtime'][$i] != null && $_POST['xtime'][$i] != ""){
						$vals .= "('".$date."',".Session::get('sbizid').",'".$emp[0]["xid"]."','".Session::get('suser')."','".Session::get('sbranch')."','".$_POST['xfacultyid'][$i]."','Present',".$year.",".$month.",'Employee','".$datetime."','".$_POST['xtime'][$i]."'),";
					}
				}
				
				$vals = rtrim($vals,',');
				
				$onduplicateupdt = "";
				
				$success = $this->model->create( $cols, $vals, $onduplicateupdt);
				
				if(empty($success))
					$success=0;
				}catch(Exception $e){
					$this->result = $e->getMessage();
				}
				
				if($success>0)
					$this->result = 'Employee Attendance Done';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Attendance! Reason: Could be Duplicate Account Code or system error!";
				
				 $this->showentry($date, $this->result);
		}

		public function showentry($xdate, $result=""){
		
		$tblvalues=array();
		$btn = array(
			
		);
		$dt = date("Y/m/d");
		
		$date = date('Y-m-d', strtotime($dt));
		$year = date('Y',strtotime($date));	
				
		$frmvalues=array(
					// "xclass"=>$class,
					// "xsection"=>$section,
					// "xshift"=>$shift,
					// "xyear"=>$year
					);
			$fld = array(array(
					// "xdate~datepicker~".$dt => 'Date_""',
					// "xclass~hidden~".$class => '_""',
					// "xsection~hidden~".$section => '_""',
					// "xshift~hidden~".$shift => '_""'
					));
						
			$this->view->org=Session::get('sbizlong');
			// $this->view->vclass = $class;
			// $this->view->vsection = $section;
			// $this->view->vshift = $shift;
			// $this->view->vyear = $year;

			$dynamicForm = new Dynamicform("Students List For Attendance",array(), $result);

			$this->view->dynform = $dynamicForm->createFourColumnForm($this->fields, URL."stuatt/studentlist", "Show",$frmvalues);

			$students=$this->model->getAttended($xdate);
			
		  	$this->view->arrform=$this->renderTable($students);
			
			$this->view->renderpage('stuatt/stuattentry', false);
		}
		
		function renderTable($row){
			$fields = array(
						"Employee ID-Student ID",
						"xname-Name",
						"xattflag-Present?"	
						);
			$table = new Datatable();
			return $this->myTable($fields, $row, "xsl", URL."stuatt/editatt/");
		}
		
		function studentlist(){
			/* if(empty($_POST['xclass']) || empty($_POST['xsection']) || empty($_POST['xshift'])){
				header ('location: '.URL.'stuatt/stuattentry');
				exit;
			} */
			//$testtime = "10:18:20";

			$dhakadt = new DateTime('now', new DateTimezone('Asia/Dhaka'));
			$dhaka = $dhakadt->format("Y-m-d H:i:s");

			

			$dt = date("Y-m-d H:i:s");

			$time = date('H:i:s', strtotime($dhaka));
			
			/* $class = $_POST['xclass'];
			$section = $_POST['xsection'];
			$shift = $_POST['xshift'];
			$year = $_POST['xyear'];
			
			$frmvalues=array(
					"xclass"=>$class,
					"xsection"=>$section,
					"xshift"=>$shift,
					"xyear"=>$year
					); */
			
			$employee=$this->model->getEmployees();
			//print_r($students);die;
			$fld = array(array("xdate~datepicker~".$dt => 'Date_""'
								));
			//, "xattflag~select_Present Type~Present"=>'Present?_""'
			for($i=0; $i<count($employee); $i++){
				array_push($fld,array("xfacultyid~text~".$employee[$i]['xfacultyid']=>'ID_readonly', "xname~text~".$employee[$i]['xname']=>'Name_readonly',"xtime~timepicker~".$time=>'Time_'));				
			}
			//print_r($fld);die;
			$this->view->org=Session::get('sbizlong');
			
			$dynamicForm = new Dynamicform("Employee List For Attendance",array());

			//$this->view->dynform = $dynamicForm->createFourColumnForm($this->fields, URL."stuatt/studentlist", "Show","");	
			
			$this->view->arrform = $dynamicForm->createArrayFormAtt($fld, URL."stuatt/saveatt", "Submit");
			
			$this->view->renderpage('stuatt/stuattentry', false);
		}
		
		
		function stuattentry(){
				
		$btn = array(
			"Clear" => URL."stuatt/stuattentry"
		);
		//print_r($this->fields);die;
		// form data
		
			$dynamicForm = new Dynamicform("Filter Students",$btn);		
			
			$this->view->dynform = $dynamicForm->createFourColumnForm($this->fields, URL."stuatt/studentlist", "Show",$this->values);
			
			$this->view->arrform="";
			
			$this->view->renderpage('stuatt/stuattentry', false);
		}
		
		public function deleteplan($plan){
			$where = "bizid=".Session::get('sbizid')." and xplan='". $plan ."' and xbranch='". Session::get('sbranch') ."'";
			$this->model->delete($where);
			$this->view->message = "";
			$this->feesplanlist();
		}

		
		public function myTable($fields, $row, $keyval, $actionurl){
		
		$field = array();
		$head = array();
		foreach($fields as $str){
			$st=explode('-',$str);
			
			$head[] = $st[1];
		}
		
		$table = '<table class="table table-bordered table-striped" style="width:100%">';
		$table.='<thead>';
		$table.='<tr>';
		foreach($head as $hd){
			$table.='<th>'.$hd.'</th>';
		}
		
		$table.='</tr>';
		$table.='</thead>';
		$table.='<tbody>';
		foreach($row as $key=>$value){
			$table.='<tr>';
			foreach($value as $str){
				
				$table.='<td>'.$str.'</td>';
			}
			$table.='</tr>';
		}
		$table.='</tbody>';
		$table.='</table>';
		return $table;
	}
}