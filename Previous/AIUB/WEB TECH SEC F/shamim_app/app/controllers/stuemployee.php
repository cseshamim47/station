<?php
class Stuemployee extends Controller{
	
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
				if($menus["xsubmenu"]=="Add Employee")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','public/js/imageshow.js','views/customers/js/codevalidator.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"prefix"=>"",
			"xfacultyid"=>"",
			"xname"=>"",
			"xdob"=>$dt,
			"xnationality"=>"",
			"xreligion"=>"",
			"xgender"=>"Male",
			"xadd1"=>"",
			"xadd2"=>"",
			"xdesignation"=>"",
			"xbg"=>"",
			"xnid"=>"",
			"xfname"=>"",
			"xmobile"=>"",
			"xfacemail"=>"",
			"xsscyear"=>"",
			"xsscgroup"=>"",
			"xsscresult"=>"",
			"xhscyear"=>"",
			"xhscgroup"=>"",
			"xhscresult"=>"",
			"xgraduateyear"=>"",
			"xgraduategroup"=>"",
			"xgraduateresult"=>"",
			"xpostgraduateyear"=>"",
			"xpostgraduatesub"=>"",
			"xpostgraduateresult"=>"",
			"xsscboard"=>"",
			"xhscboard"=>"",
			"xuniversity"=>"",
			"xpostuniversity"=>"",
			"xsalarytype"=>"",
			"xpackage"=>"",
			"xsalary"=>0.0,
			"xid"=>"",
			"xjoindate"=>$dt,
			"xreporto"=>"",
			"xapproveby"=>"",
			"xgemp"=>"",
			"xshift"=>"",
			"xsennum"=>0,
			"xactive"=>"1"
			);
			
			$this->fields = array(
						array(
							"Parsonal Information-div"=>''
							),
						array(
							"prefix-select_Employee Prefix"=>'Prefix_""',
							"xgemp-select_Employee Group"=>'Employee Group_maxlength="100"'
							),
						array(
							"xfacultyid-group_".URL."stuemployee/stufacultypicklist"=>'Employee ID_""',
							"xname-text"=>'Name~star_maxlength="100"'
							),		
						array(
							"xfname-text"=>'Fathers Name_maxlength="50"',
							"xdesignation-select_Designation"=>'Designation_maxlength="50"'
							),
						array(
							"xdob-datepicker" => 'Date Of Birth_""',
							"xnationality-select_Nationality"=>'Nationality_maxlength="160"'
							),
						array(
							"xreligion-select_Religion"=>'Religion_maxlength="160"',
							"xgender-radio_Male_Female"=>'Gender_""'
							),
						array(
							"xadd1-text"=>'Present Address_maxlength="50"',
							"xadd2-text"=>'Parmanent Address_maxlength="50"'
							),
						array(
							"xbg-select_Blood Group"=>'Blood Group_maxlength="50"',
							"xnid-text"=>'NID_maxlength="50"'
							),
						array(
							"xmobile-text"=>'Mobile_maxlength="20"',
							"xfacemail-text"=>'Email_maxlength="100"'
							),
						array(
							"xjoindate-datepicker" => 'Joining Date_""',
							"xid-text"=>'Card Number_maxlength="30"'
							),		
						array(
							"xshift-select_Shift"=>'Shift_maxlength="30"',
							"xsennum-text"=>'Seniority Number_maxlength="11"'
							),
						array(
							"Academic Information-div"=>''													
							),
						array(
							"xsscyear-text_Year"=>'SSC Year_maxlength="4"',
							"xsscgroup-text"=>'SSC Group_maxlength="50"'
							),
						array(
							"xsscresult-text"=>'SSC Result_maxlength="50"',
							"xsscboard-text"=>'SSC Board_maxlength="50"'
							),
						array(
							"xhscyear-text_Year"=>'HSC Year_maxlength="4"',
							"xhscgroup-text"=>'HSC Group_maxlength="50"'							
							),
						array(
							"xhscresult-text"=>'HSC Result_maxlength="50"',
							"xhscboard-text"=>'HSC Board_maxlength="50"'
							),
						array(
							"xgraduateyear-text_Year"=>'Graduation Year_maxlength="4"',
							"xgraduategroup-text"=>'Graduation Subject_maxlength="50"'
							),
						array(
							"xgraduateresult-text"=>'Graduation Result_maxlength="50"',
							"xuniversity-text"=>'University_maxlength="250"'
							),		
						array(
							"xpostgraduateyear-text_Year"=>'Post Graduation Year_maxlength="4"',
							"xpostgraduatesub-text"=>'Post Graduation Subject_maxlength="50"'							
							),		
						array(
							"xpostgraduateresult-text"=>'Post Graduation Result_maxlength="50"',
							"xpostuniversity-text"=>'University_maxlength="250"'
							),
						array(
							"Financial Information-div"=>''													
							),
						array(
							"xsalarytype-select_Salary Type" => 'Salary Type_maxlength="50"',
							"xpackage-select_Salary Package Name" => 'Salary Package_maxlength="50"'
							),
						array(
							"xsalary-text"=>'Salary_maxlength="50"'
							),
						array(
							"Leave Policy Information-div"=>''
							),
						array(
							"xreporto-group_".URL."stuemployee/stufacultypickliste"=>'Reporting To_""',
							"xapproveby-group_".URL."stuemployee/stufacultypicklistap"=>'Approve By_""',
							),
						array(
							"xactive-checkbox_1"=>'Active?_""'
							)
						);
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."stuemployee/stufacultyentry",
		);	
		
		
		// form data
		
			$dynamicForm = new Dynamicform("Employee",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."stuemployee/savefaculty", "Save",$this->values,URL."stuemployee/showpost","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->rendermainmenu('stuemployee/index');
			
		}
		
		public function savefaculty(){
				if (empty($_POST['xname'])){
					header ('location: '.URL.'stuemployee/stufacultyentry');
					exit;
				}
				
				$xdob = $_POST['xdob'];
				$dt = str_replace('/', '-', $xdob);
				$dob = date('Y-m-d', strtotime($dt));
				
				$xjdate = $_POST['xjoindate'];
				$jdt = str_replace('/', '-', $xjdate);
				$jdate = date('Y-m-d', strtotime($jdt));
				
				$prefix = $_POST["prefix"];
				$keyfieldval = $this->model->getKeyValue("edfaculty","xfacultyid",$prefix,"6");
				 
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				try{
					
								
				$form	->post('xname')
						->val('minlength', 4)
						->val('maxlength', 100)										
						
						->post('xnationality')
						->val('maxlength', 50)
						
						->post('xreligion')
						->val('maxlength', 50)
						
						->post('xgender')
						
						
						->post('xadd1')
						->val('maxlength', 250)
						
						->post('xadd2')
						->val('maxlength', 250)
						
						->post('xbg')
						->val('maxlength', 20)
						
						->post('xnid')
						->val('maxlength', 20)
						
						->post('xfname')
						->val('maxlength', 100)
						
						->post('xdesignation')
						->val('maxlength', 50)
						
						->post('xmobile')
						->val('maxlength', 50)
						
						->post('xfacemail')
						->val('maxlength', 100)
						
						->post('xsscyear')
						->val('maxlength', 20)
						
						->post('xsscgroup')
						->val('maxlength', 100)
						
						->post('xsscresult')
						->val('maxlength', 100)
						
						->post('xhscyear')
						->val('maxlength', 50)
						
						->post('xhscgroup')
						->val('maxlength', 100)
						
						->post('xhscresult')
						->val('maxlength', 100)
						
						->post('xgraduateyear')
						->val('maxlength', 50)
						
						->post('xgraduategroup')
						->val('maxlength', 100)
						
						->post('xgraduateresult')
						->val('maxlength', 100)
						
						->post('xpostgraduateyear')
						->val('maxlength', 50)
						
						->post('xpostgraduatesub')
						->val('maxlength', 100)
						
						->post('xpostgraduateresult')
						->val('maxlength', 100)
						
						->post('xsscboard')
						->val('maxlength', 50)
						
						->post('xhscboard')
						->val('maxlength', 50)
						
						->post('xuniversity')
						->val('maxlength', 250)
						
						->post('xpostuniversity')
						->val('maxlength', 250)
						
						->post('xsalarytype')
						->val('maxlength', 50)
						
						->post('xpackage')
						->val('maxlength', 50)
						
						->post('xsalary')
						->val('maxlength', 50)
						
						->post('xid')
						->val('maxlength', 30)
						
						->post('xshift')
						->val('maxlength', 30)

						->post('xreporto')
						->val('maxlength', 20)
						
						->post('xapproveby')
						->val('maxlength', 20)
						
						->post('xgemp')
						->val('maxlength', 100)
						
						->post('xsennum')
						->val('maxlength', 11)
						
						->post('xactive');
						
						
						
				$form	->submit();
				
				$data = $form->fetch();
				
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['xbranch'] = Session::get('sbranch');
				$data['xdob'] = $dob;
				$data['xjoindate'] = $jdate;
				$data['xfacultyid'] = $keyfieldval;
				//print_r($data);die;				
				$success = $this->model->create($data);
				
				if ($_FILES['imagefield']["name"]){
						$imgupload = new ImageUpload();
						$imgupload->store_uploaded_image('images/teachers/','imagefield', 171, 181, $keyfieldval);
					}
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				
				
				if($success>0)
					$this->result = "Employee saved successfully";
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to save Employee!";
				
				 $this->showentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		public function editfaculty($tchr){
			
			if (empty($_POST['xfacultyid'])){
					header ('location: '.URL.'stuemployee/stufacultyentry');
					exit;
				}
			$result = "";
			
			$xdob = $_POST['xdob'];
				$dt = str_replace('/', '-', $xdob);
				$dob = date('Y-m-d', strtotime($dt));
				
			$xjdate = $_POST['xjoindate'];
				$jdt = str_replace('/', '-', $xjdate);
				$jdate = date('Y-m-d', strtotime($jdt));
			
			$success=false;
			$form = new Form();
				$data = array();
				
				try{
			
				$form	->post('xname')
						->val('minlength', 4)
						->val('maxlength', 100)											
						
						->post('xnationality')
						->val('maxlength', 50)
						
						->post('xreligion')
						->val('maxlength', 20)
						
						->post('xgender')						
						
						->post('xadd1')
						->val('maxlength', 250)
						
						->post('xadd2')
						->val('maxlength', 250)
						
						->post('xbg')
						->val('maxlength', 20)
						
						->post('xnid')
						->val('maxlength', 20)
						
						->post('xfname')
						->val('maxlength', 100)
						
						->post('xdesignation')
						->val('maxlength', 50)
						
						->post('xmobile')
						->val('maxlength', 50)
						
						->post('xfacemail')
						->val('maxlength', 100)
						
						->post('xsscyear')
						
						
						->post('xsscgroup')
						->val('maxlength', 30)
						
						->post('xsscresult')
						->val('maxlength', 30)
						
						->post('xhscyear')						
						
						->post('xhscgroup')
						->val('maxlength', 30)
						
						->post('xhscresult')
						->val('maxlength', 30)
						
						->post('xgraduateyear')
						
						
						->post('xgraduategroup')
						->val('maxlength', 30)
						
						->post('xgraduateresult')
						->val('maxlength', 30)
						
						->post('xpostgraduateyear')						
						
						->post('xpostgraduatesub')
						->val('maxlength', 30)
						
						->post('xpostgraduateresult')
						->val('maxlength', 30)
						
						->post('xsscboard')
						->val('maxlength', 50)
						
						->post('xhscboard')
						->val('maxlength', 50)
						
						->post('xuniversity')
						->val('maxlength', 250)
						
						->post('xpostuniversity')
						->val('maxlength', 250)
						
						->post('xsalarytype')
						->val('maxlength', 50)
						
						->post('xpackage')
						->val('maxlength', 50)
						
						->post('xsalary')
						->val('maxlength', 50)
						
						->post('xid')
						->val('maxlength', 30)

						->post('xshift')
						->val('maxlength', 30)
						
						->post('xreporto')
						->val('maxlength', 20)
						
						->post('xapproveby')
						->val('maxlength', 20)
						
						->post('xgemp')
						->val('maxlength', 100)
						
						->post('xsennum')
						->val('maxlength', 11)
						
						->post('xactive');
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['xbranch'] = Session::get('sbranch');
				$data['zutime'] = date("Y-m-d H:i:s");
				$data['xdob'] = $dob;
				$data['xjoindate'] = $jdate;
				$success = $this->model->editFaculty($data, $tchr);
				
				
				}catch(Exception $e){
					//echo $e->getMessage();die;
					$result = $e->getMessage();
					
				}
				if($result==""){
				if($success){
					$result = "Edited successfully";
					$file = 'images/teachers/'.$tchr.'.jpg';
					if ($_FILES['imagefield']["name"]){
						if(file_exists($file))
							unlink($file); 
						
						$imgupload = new ImageUpload();
						$imgupload->store_uploaded_image('images/teachers/','imagefield', 171, 181, $tchr);
					}
				}
				else
					$result = "Edit failed!";
				
				}
				 $this->showfaculty($tchr, $result);
				
		
		}
		
		public function showfaculty($tchr="", $result=""){
		if($tchr==""){
			header ('location: '.URL.'stuemployee/stufacultyentry');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."stuemployee/stufacultyentry"
		);
		
		$tblvalues = $this->model->getSingleFaculty($tchr);
		//print_r($tblvalues); die;
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		$file = 'images/teachers/'.$tchr.'.jpg';
		
		$imagename = "";	
		if(file_exists($file))
			$imagename = '../../'.$file;
		else
			$imagename = '../../images/teachers/noimage.png';
		
		$this->view->filename = $imagename;
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Employee", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."stuemployee/editfaculty/".$tchr, "Edit",$tblvalues, URL."stuemployee/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('stuemployee/stufacultyentry');
		}
		
		
		
		public function showentry($tchr, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."stuemployee/stufacultyentry"
		);
		$file = 'images/teachers/'.$tchr.'.jpg';
		$tblvalues = $this->model->getSingleFaculty($tchr);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
		$imagename = "";	
		if(file_exists($file))
			$imagename = '../../'.$file;
		else
			$imagename = '../../images/teachers/noimage.png';
		
		$this->view->filename = $imagename;	
		// form data
		
			
			$dynamicForm = new Dynamicform("Employee", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."stuemployee/editfaculty/".$tchr, "Edit",$tblvalues ,URL."stuemployee/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('stuemployee/stufacultyentry');
		}
		
		function renderTable(){
			$fields = array(
						"xsennum-Seniority Num",
						"xfacultyid-Employee ID",
						"xname-Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xemail-Email"
						);
			$table = new Datatable();
			$row = $this->model->getFacultyByLimit(" LIMIT 5");
			
			return $table->myTable($fields, $row, "xfacultyid", URL."stuemployee/showfaculty/");
			
			
		}
		
		function facultylist(){
			$this->view->getemp = $this->model->getFacultyAll();
			
			$this->view->renderpage('stuemployee/stufacultylist', false);
		}
		
		function stufacultypicklist(){
			$this->view->table = $this->facultyPickTable();
			
			$this->view->renderpage('stuemployee/stufacultypicklist', false);
		}
		
		function facultyPickTable(){
			$fields = array(
						
						"xsennum-Seniority Num",
						"xfacultyid-Employee ID",
						"xname-Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xemail-Email"
						);
			$table = new Datatable();
			$row = $this->model->getFacultyByLimit();
			
			return $table->picklistTable($fields, $row, "xfacultyid");
		}
		
		function stufacultypickliste(){
			$this->view->table = $this->facultyPickTablee();
			
			$this->view->renderpage('stuemployee/stufacultypicklist', false);
		}
		
		function facultyPickTablee(){
			$fields = array(
						"xreporto-Employee ID",
						"xname-Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xemail-Email"
						);
			$table = new Datatable();
			$row = $this->model->getFacultyByLimite();
			
			return $table->picklistTable($fields, $row, "xreporto");
		}
		
		function stufacultypicklistap(){
			$this->view->table = $this->facultyPickTableap();
			
			$this->view->renderpage('stuemployee/stufacultypicklist', false);
		}
		
		function facultyPickTableap(){
			$fields = array(
						"xapproveby-Employee ID",
						"xname-Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xemail-Email"
						);
			$table = new Datatable();
			$row = $this->model->getFacultyByLimitap();
			
			return $table->picklistTable($fields, $row, "xapproveby");
		}
		
		function itemTable(){
			$fields = array(
						"xsennum-Seniority Num",
						"xfacultyid-Employee ID",
						"xname-Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xemail-Email"
						);
			$table = new Datatable();
			$row = $this->model->getFacultyByLimit();
			
			return $table->createTable($fields, $row, "xfacultyid", URL."stuemployee/showfaculty/", URL."stuemployee/deletefaculty/");
		}
		
		function stufacultyentry(){
				
		$btn = array(
			"Clear" => URL."stuemployee/stufacultyentry"
		);
		$imagename = '../images/students/noimage.png';
			
			$this->view->filename = $imagename;
		// form data
		
			$dynamicForm = new Dynamicform("Employee",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."stuemployee/savefaculty", "Save",$this->values, URL."stuemployee/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('stuemployee/stufacultyentry', false);
		}
		
		public function deletefaculty($tchr){
			$where = "bizid=".Session::get('sbizid')." and xdesig='employee' and xfacultyid='".$tchr."' and xbranch = '". Session::get('sbranch') ."'";
			$this->model->delete($where);
			$this->view->message = "";
			$this->facultylist();
		}
		
		public function showpost(){
			$tchr = $_POST['xfacultyid'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."stuemployee/stufacultyentry"
		);
		
		$tblvalues = $this->model->getSingleFaculty($tchr);
		$file = 'images/teachers/'.$tchr.'.jpg';
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		$imagename = "";	
		if(file_exists($file))
			$imagename = '../../'.$file;
		else
			$imagename = '../../images/teachers/noimage.png';
		
		$this->view->filename = $imagename;
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Employee", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."stuemployee/savefaculty", "Save",$tblvalues,"","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('stuemployee/stufacultyentry');
		}
}