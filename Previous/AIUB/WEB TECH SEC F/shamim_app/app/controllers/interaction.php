<?php
class Interaction extends Controller{
	
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
				if($menus["xsubmenu"]=="Interaction Entry")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','public/js/imageshow.js','views/interaction/js/codevalidator.js','views/interaction/js/getitemdt.js');
		$dt = date("Y/m/d");
		
		$date = date('Y-m-d', strtotime($dt));
		$this->values = array(
			"xinteractiontype"=>"",
			"xdate"=>$date,
			"xoppersl"=>"",
			"xlead"=>"",
			"xfeedback"=>"",
			"xremarks"=>""
			);
			
			$this->fields = array(array(
							"xinteractiontype-text"=>'Interaction Type_maxlength="200"',
							"xdate-datepicker" => 'Date_""',
							),
						array(
							"xoppersl-group_".URL."interaction/picklist"=>'Oppertunity No_maxlength="20"',
							"xlead-text"=>'Lead ID_maxlength="20" readonly'
							),		
						array(
							"xfeedback-text"=>'Feedback_maxlength="200"',
							),
						array(
							"xremarks-textarea"=>'Remaks_maxlength="160"'
							)
						);
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."interaction/customerentry",
		);	
		
		
		// form data
		
			$dynamicForm = new Dynamicform("Interaction",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."interaction/saveinteraction", "Save",$this->values,URL."interaction/showpost");
			
			$this->view->table = $this->renderTable();
			
			$this->view->rendermainmenu('interaction/index');
			
		}
		
		public function saveinteraction(){
					
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				try{

					if(empty($_POST['xlead'])){
						throw new Exception("Please Enter Lead ID");
					}
											
				
				$form	->post('xdate')
						->val('maxlength', 20)
				
						->post('xinteractiontype')
						->val('maxlength', 200)
						
						->post('xoppersl')
						->val('maxlength', 20)
						
						->post('xlead')
						->val('maxlength', 20)
						
						->post('xremarks')
						->val('maxlength', 160)
						
						->post('xfeedback')
						->val('maxlength', 200);
						
						
						
				$form	->submit();
				
				$data = $form->fetch();
				//if($cusauto=="YES")
				$xdate = $data['xdate'];	
				$dt = str_replace('/', '-', $xdate);
				$data['xdate']= date('Y-m-d', strtotime($dt));	
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				//print_r($data);die;				
				$success = $this->model->create($data);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				
				
				if($success>0){
					$this->result = "Interaction saved successfully";
				}
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to save Interaction!";
				
				 $this->showentry($success, $this->result);
				 
				 
				
		}
		
		public function editcustomer($interaction){
			//echo "hi"; die;
			// if (!isset($_POST['xinteraction'])){
			// 		header ('location: '.URL.'interaction');
			// 		exit;
			// 	}
			$result = "";
			
			$success=false;
			$form = new Form();
				$data = array();
				
				try{
					
					if(empty($_POST['xlead'])){
						throw new Exception("Please Enter Lead ID");
					}
				
				
				$form	->post('xdate')
						->val('maxlength', 20)
				
						->post('xinteractiontype')
						->val('maxlength', 200)
						
						->post('xremarks')
						->val('maxlength', 160)
						
						->post('xfeedback')
						->val('maxlength', 200);
							
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				$xdate = $data['xdate'];	
				$dt = str_replace('/', '-', $xdate);
				$data['xdate']= date('Y-m-d', strtotime($dt));
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$success = $this->model->editCustomer($data, $interaction);
				
				
				}catch(Exception $e){
					//echo $e->getMessage();die;
					$result = $e->getMessage();
					
				}
				if($result==""){
				if($success){
					$result = "Edited successfully";
				}
				else
					$result = "Edit failed!";
				
				}
				 $this->showcustomer($interaction, $result);
				
		
		}
		
		public function showcustomer($interaction="", $result=""){
		if($interaction==""){
			header ('location: '.URL.'interaction');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."interaction/customerentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($interaction);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Interaction", $btn, $result);
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."interaction/editcustomer/".$interaction, "Edit",$tblvalues);
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('interaction/customerentry');
		}
		
		
		
		public function showentry($interaction, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."interaction/customerentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($interaction);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("interaction", $btn, $result);	
		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."interaction/editcustomer/".$interaction, "Edit",$tblvalues);
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('interaction/customerentry');
		}
		
		function renderTable(){
			$fields = array(
						"xdate-Date",
						"xintsl-Interaction No",
						"xinteractiontype-Interaction Type",
						"xlead-Lead ID",
						"xfeedback-Feddback",
						"xremarks-Remarks"
						);
			$table = new Datatable();
			$row = $this->model->getinteractionByLimit(" LIMIT 5");
			
			return $table->myTable($fields, $row, "xintsl", URL."interaction/showcustomer/");
			
			
		}
		
		function customerlist(){
			$this->view->table = $this->itemTable();
			
			$this->view->renderpage('interaction/customerlist', false);
		}
		
		function picklist(){
			$this->view->table = $this->interactionPickTable();
			
			$this->view->renderpage('interaction/customerpicklist', false);
		}
		
		function interactionPickTable(){
			$fields = array(
						"xoppersl-Oppertunity No",
						"xlead-Lead ID",
						"xexprevenew-Expected Revenue",
						"xsalesman-Sales Man"
						);
			$table = new Datatable();
			$row = $this->model->getOppertunity();
			
			return $table->picklistTable($fields, $row, "xoppersl");
		}
		
		function itemTable(){
			$fields = array(
				"xdate-Date",
				"xintsl-Interaction No",
				"xinteractiontype-Interaction Type",
				"xlead-Lead ID",
				"xfeedback-Feddback",
				"xremarks-Remarks"
				);
			$table = new Datatable();
			$row = $this->model->getinteractionByLimit();
			
			return $table->myTable($fields, $row, "xintsl", URL."interaction/showcustomer/");
		}
		
		function allinteraction(){
			$fields = array(
						"xinteraction-interaction No",
						"xorg-Organization/Name",
						"xadd-Address",
						"xmobile-Mobile",
						"xcustype-interaction Type"
						);
			$table = new Datatable();
			$row = $this->model->getinteractionByLimit();
			$btn = '<div><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button">
			<span class="glyphicon glyphicon-print"></span>&nbsp;Print</a>
			</div><div id="printdiv"><div style="text-align:center">'.Session::get('sbizlong').'<br/>interaction List</div><hr/>';
			$this->view->table=$btn.$table->myTable($fields, $row, "xinteraction")."</div>";
			$this->view->renderpage('interaction/customerlist', false);
		}
		
		function customerentry(){
				
		$btn = array(
			"Clear" => URL."interaction/customerentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Interaction",$btn);		
			
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."interaction/saveinteraction	", "Save",$this->values);
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('interaction/customerentry', false);
		}
		
		public function deletecustomer($interaction){
			$where = "bizid=".Session::get('sbizid')." and xintsl=".$interaction;
			$this->model->delete($where);
			$this->view->message = "";
			$this->customerlist();
		}

		function getDetails($intsl){
			//echo $intsl; die;
			$this->model->getDetails($intsl);
		}
		
		public function showpost(){
			$interaction = $_POST['xinteraction'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."interaction/customerentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($interaction);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("interaction", $btn);
			$file = 'images/interaction/cussm/'.$cus.'.jpg';
		
		$imagename = "";	
		if(file_exists($file))
			$imagename = '../../'.$file;
		else
			$imagename = '../../images/products/noimage.jpg';
			
			$this->view->filename = $imagename;
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."interaction/saveinteraction", "Save",$tblvalues,URL."interaction/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('interaction/customerentry');
		}
		
		function createopbal(){
			
			$mstdata = array(
			"bizid"=>"100",
			"xvoucher"=>"OP--000001",
			"xnarration"=>"Customer Opening Balance",
			"xyear"=>"2017",
			"xper"=>"11",
			"xstatusjv"=>"Created",
			"xbranch" => "Head Office",
			"xdoctype" => "Opening Balance",
			"xdocnum" => "OP--000001",
			"xdate" => "2018-05-20",
			"xsite" => "",
			"zemail"=>"System"
			);
			
						
			$amt  = 0;
			$amtnot = 0;
			$data = $this->data();
			foreach ($data as $key=>$val){
				if($val>0)
					$amt += $val;
				if($val<0)
					$amtnot += $val;
				
			}
			
		//$checkval = " bizid = " . $data['bizid'] . " and xvoucher ='" . $data['xvoucher'] ."'";
			$i=1;
				$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,
				`xexch`,`xprime`,xflag";
				$vals = "(100,'OP--000001',".$i.",'2035',
					'Liability','Ledger','None','','BDT',
					'-". $amt ."','1','-". $amt ."','Credit'),";
				$i+=1;
				$vals .= "(100,'OP--000001',".$i.",'2035',
					'Liability','Ledger','None','','BDT',
					'". abs($amtnot) ."','1','". abs($amtnot) ."','Debit'),";	
					
				foreach ($data as $key=>$val){
				$i++;
					if($val>0){
					
					$vals .= "(100,'OP--000001',".$i.",'1010',
					'Asset','AR','Customer','". $key ."','BDT',
					'". $val ."','1','". $val ."','Debit'),";
					}
					
					if($val<0){
					
					$vals .= "(100,'OP--000001',".$i.",'1010',
					'Asset','AR','Customer','". $key ."','BDT',
					'". $val ."','1','". $val ."','Credit'),";
					}
					
				}
				
				$vals = rtrim($vals,",");
				//echo $vals; die;
				echo $this->model->createopeningbal($mstdata, $cols, $vals);
		}
		
		
		
}