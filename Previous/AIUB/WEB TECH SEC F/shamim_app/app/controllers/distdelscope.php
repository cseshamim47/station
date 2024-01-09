<?php
class Distdelscope extends Controller{
	
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
				if($menus["xsubmenu"]=="Delivery Confirmation")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/imreqdo/js/getreqitemdt.js','views/suppliers/js/getsup.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"xsl"=>"",
			"xreqdelnum"=>"",
			"xrdin"=>"",
			"xorg"=>"",
			"xadd1"=>"",
			"xmobile"=>"",			
			"xdeldocnum"=>"",
			"xdelorg"=>""
			);
			
			$this->fields = array(
						array(							
							"xdate-datepicker" => 'Date_""'							
							),
						array(
							"xsl-text"=>'Delivery Conf. No_maxlength="20"'							
							),
						array(
							"xreqdelnum-text"=>'DO No_maxlength="20"'							
							),
						array(							
							"xrdin-text"=>'RIN_readonly'							
							),
						array(							
							"xorg-text"=>'Name_readonly'
							),
						array(
							"xadd1-text"=>'Address_readonly'																		
							),
						array(
							"xmobile-text"=>'Mobile_readonly'																		
							),
						array(							
							"xdelorg-text"=>'Delivery Company_maxlength="120"'	
							),
						array(							
							"xdeldocnum-text"=>'Doc No_maxlength="120"'	
							)
						);
														
		}
		
		public function index(){		
		
		$btn = array(
			"Clear" => URL."distdelscope/doentry",
		);	
		
					
			$this->view->rendermainmenu('distdelscope/index');
			
		}
		
		
		public function savedo(){
				
				
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
				$yearoffset = Session::get('syearoffset');
				$txnnum = $_POST['xreqdelnum'];
				$keyfieldval=$_POST['xreqdelnum'];
				$form = new Form();
				$data = array();
				$success=0;
				$result = ""; 
								
				
				$xyear = 0;
				$xper = 0;
				
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$xper = $key;
					$xyear = $val;
				}
				
				try{
					
					
				if($_POST['xdeldocnum']=="" || empty($_POST['xdelorg'])){
						throw new Exception("Please Enter Delivery Company And Document No!");
					}
				if($_POST['xreqdelnum']=="" || $_POST['xrdin']==""){
						throw new Exception("Please select a DO Number!");
					}		
				
					
				$form	->post('xreqdelnum')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xrdin')
						->val('maxlength', 20)
						
						->post('xorg')
						->val('minlength', 1)
						->val('maxlength', 100)						
				
						->post('xadd1')
						->val('maxlength', 250)
						
						->post('xmobile')
						->val('maxlength', 50)
												
						->post('xdelorg')
						->val('minlength', 1)
						->val('maxlength', 100)
						
						->post('xdeldocnum')
						->val('minlength', 1)
						->val('maxlength', 50);
						
						
				$form	->submit();
				
				
					
				
				$data = $form->fetch();
				
				
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['xdate'] = $date;
				
													
				$success = $this->model->create($data);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					$this->result = 'Delivery Confirmation Done!';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Delivery Confirmation! Reason: Could be Duplicate Trunsaction Code or system error!";
				
				 $this->showdoentry($success, $this->result);
				 
				 
				
		}
		
		public function editdo(){
			
			
			$result = "";
			
			$hd = array();
			$dt = array();
			
				$yearoffset = Session::get('syearoffset');
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$month = date('m',strtotime($date)); 
				
				$xyear = 0;
				$xper = 0;
				
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$xper = $key;
					$xyear = $val;
				}
				
			$success=false;
			$xsl = $_POST['xsl'];
			$form = new Form();
				$data = array();
				
				try{
				
				if($_POST['xdeldocnum']=="" || empty($_POST['xdelorg'])){
						throw new Exception("Please Enter Delivery Company And Document No!");
					}
				if($_POST['xreqdelnum']=="" || $_POST['xrdin']==""){
						throw new Exception("Please select a DO Number!");
					}		
				
					
				$form	->post('xsl')
						->val('minlength', 1)
						
						->post('xreqdelnum')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xrdin')
						->val('maxlength', 20)
						
						->post('xorg')
						->val('minlength', 1)
						->val('maxlength', 100)						
				
						->post('xadd1')
						->val('maxlength', 250)
						
						->post('xmobile')
						->val('maxlength', 50)
												
						->post('xdelorg')
						->val('minlength', 1)
						->val('maxlength', 100)
						
						->post('xdeldocnum')
						->val('minlength', 1)
						->val('maxlength', 50);
						
						
				$form	->submit();
				
				$data = $form->fetch();	
								
				$success = $this->model->edit($data);
				
				
				}catch(Exception $e){
					
					$result = $e->getMessage();
					
				}
				if($result==""){
				if($success)
					$result = "Edited successfully";
				else
					$result = "Edit failed!";				
				}
				
				 $this->showdoentry($xsl, $result);
					
		
		}
		
		
		public function show($txnnum, $result=""){
		if($txnnum==""){
			header ('location: '.URL.'distdelscope/doentry');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."distdelscope/doentry"
		);
		
		$tblvalues = $this->model->getDelivery($txnnum);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xsl"=>"",
					"xdate"=>$tblvalues[0]['xdate'],
					"xreqdelnum"=>$tblvalues[0]['xreqdelnum'],
					"xrdin"=>$tblvalues[0]['xrdin'],
					"xorg"=>$tblvalues[0]['xorg'],
					"xadd1"=>$tblvalues[0]['xadd1'],
					"xmobile"=>$tblvalues[0]['xmobile'],
					"xdeldocnum"=>"",
					"xdelorg"=>""
					);
			
		// form data
		
			$confurl = "";
			$saveurl = URL."distdelscope/savedo";
			
		$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Delivery Confirmation", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, $saveurl, "Save",$tblvalues, URL."distdelscope/showpost");
			
			$this->view->table = $this->renderTable();
			$this->view->potable = "";
			
			$this->view->renderpage('distdelscope/doentry');
		}
		
		
		public function showentry($txn, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."distdelscope/doentry"
		);
		
		$tblvalues = $this->model->getdeliverydt($txn);
		$dt = date("Y/m/d");
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xsl"=>$tblvalues[0]['xsl'],
					"xdate"=>$tblvalues[0]['xdate'],
					"xreqdelnum"=>$tblvalues[0]['xreqdelnum'],
					"xrdin"=>$tblvalues[0]['xrdin'],
					"xorg"=>$tblvalues[0]['xorg'],
					"xadd1"=>$tblvalues[0]['xadd1'],
					"xmobile"=>$tblvalues[0]['xmobile'],
					"xdeldocnum"=>$tblvalues[0]['xdeldocnum'],
					"xdelorg"=>$tblvalues[0]['xdelorg']
					);
			$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Delivery Chalan From Requisition", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."distdelscope/editdo", "Update",$tblvalues ,URL."imreqdo/showpost");
			
			$this->view->table = $this->renderTable();
			$this->view->potable = $this->renderDoTable($txn);
			$this->view->renderpage('distdelscope/doentry');
		}
		
		public function showdoentry($txnnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."distdelscope/doentry"
		);
		
		$xrdin = "";
		$status="";
		
		
			$tblvalues=array(
					"xsl"=>"",
					"xdate"=>"",
					"xreqdelnum"=>"",
					"xrdin"=>"",
					"xorg"=>"",
					"xadd1"=>"",
					"xmobile"=>"",
					"xdeldocnum"=>"",
					"xdelorg"=>""
					);
			$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Delivery Confirmation", $btn, $result);		
			$confurl = "";
			$saveurl = URL."distdelscope/savedo/";
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, $saveurl, "Save",$tblvalues ,URL."imreqdo/showpost",$confurl);
			
			$this->view->table = $this->renderTable();
			$this->view->potable = $this->renderDoTable($txnnum);
			$this->view->renderpage('distdelscope/doentry');
		}
		
	
			
	
	public	function renderTable(){
		
			$fields = array(
						"xreqdelnum-Delivery Number",						
						"xrdin-RIN",
						"xorg-Name",
						"xmobile-Mobile"
						);
						
			$table = new Datatable();
			$row = $this->model->getdeldt();
			
			return $table->myTable($fields, $row, "xreqdelnum", URL."distdelscope/show/");
						
		}
		
	public	function renderDoTable($txnnum){
			
			$status = "";
					
			
			$fields = array(
						"xsl-Delivery Conf. No",
						"xdate-Date",
						"xreqdelnum-Delivery Number",						
						"xrdin-RIN",
						"xorg-Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xdelorg-Delivery Company",
						"xdeldocnum-Delivery Document Number"		
						);
			$table = new Datatable();
			$row = $this->model->getdeliverydt($txnnum);
			
			return $table->myTable($fields, $row, "xsl", URL."distdelscope/showentry/");
						
		}	
		
		
		
		
		function doconflist(){
			$rows = $this->model->getDeliveryConfList();
			$cols = array("xdate-Date","xsl-Del. Conf. No","xreqdelnum-DO No","xrdin-RIN","xorg-Name","xdeldocnum-Delivery Document Number","xdeldocnum-Delivery Document Number");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xsl",URL."distdelscope/showdoentry/");
			$this->view->renderpage('distdelscope/doconflist', false);
		}
		
		
		
		function doentry(){
				
		$btn = array(
			"Clear" => URL."distdelscope/doentry"
		);

		// form data
		$this->view->balance = "";
		
			$dynamicForm = new Dynamicform("Delivery Confirmation",$btn);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."distdelscope/savedo", "Save",$this->values, URL."distdelscope/showpost");
			
			
			$this->view->table = $this->renderTable();
			$this->view->potable = $this->renderDoTable("");
			$this->view->renderpage('distdelscope/doentry', false);
		}
		
		
		public function showpost(){
			
			$txnnum = $_POST['xsl'];
			$this->showdoentry($txnnum);
		}
		
		
		
}