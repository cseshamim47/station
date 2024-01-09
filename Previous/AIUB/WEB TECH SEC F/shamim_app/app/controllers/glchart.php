<?php
class Glchart extends Controller{
	
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
				if($menus["xsubmenu"]=="Chart Of Accounts")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js');
		
		$this->values = array(
			"xacc"=>"",
			"xdesc"=>"",
			"xacclevel1"=>"",
			"xacclevel2"=>"",
			"xacclevel3"=>"",
			"xacctype"=>"Asset",
			"xaccusage"=>"Ledger",
			"xaccsource"=>"None"
			);
			
			$this->fields = array(array(
							"xacc-group_".URL."glchart/glchartpicklist"=>'Account Code_maxlength="20"',
							"xacctype-radio_Asset_Liability_Income_Expenditure"=>'Account Type'
							),
						array(
							"xdesc-text"=>'Account Description_maxlength="100"',
							"xaccusage-radio_AP_AR_Cash_Bank_Ledger"=>'Use Of The Account'
							),
						array(
							"xacclevel1-select_Acc Level1"=>'Acc Level1_maxlength="100"',
							"xaccsource-radio_Supplier_Customer_None_Sub Account"=>'Account Source'
							),
						array(
							"xacclevel2-select_Acc Level2"=>'Acc Level2_maxlength="100"'
							),
						array(
							"xacclevel3-select_Acc Level3"=>'Acc Level3_maxlength="100"'
							)
						);
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."glchart/glchartentry",
		);	
		
		
		// form data
		
			$dynamicForm = new Dynamicform("Chart Of Accounts",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."glchart/saveglchart", "Save",$this->values,URL."glchart/showpost");
			
			$this->view->table = $this->renderTable();
			
			$this->view->rendermainmenu('glchart/index');
			
		}
		
		public function saveglchart(){
				if (!isset($_POST['xacc']) || empty($_POST['xacc'])){
					header ('location: '.URL.'glchart/glchartentry');
					exit;
				}
				
				$accusage = $_POST['xaccusage'];
				$accsource = $_POST['xaccsource'];
				
		
				$form = new Form();
				$data = array();
				$success=0;
				$result = ""; 
				try{
					
				
				$form	->post('xacc')
						->val('minlength', 1)
						->val('maxlength', 20)
										
				
						->post('xdesc')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('xacctype')
						
						->post('xaccusage')
						
				
						->post('xacclevel1')
						->val('maxlength', 100)
						
						->post('xacclevel2')
						->val('maxlength', 100)
						
						->post('xacclevel3')
						->val('maxlength', 100);
						
				$form	->submit();
				
				$data = $form->fetch();
					
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['xaccsource'] = $accsource;
				//print_r($data);die;				
				$success = $this->model->create($data);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				
				
				if($success>0)
					$this->result = "Account Code Created";
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Account Code! Reason: Could be Duplicate Account Code or system error!";
				
				 $this->showentry($data["xacc"], $this->result);
				 
				 
				
		}
		
		public function editglchart($acc){
			
			if (!isset($_POST['xacc'])){
					header ('location: '.URL.'glchart');
					exit;
				}
			$result = "";
			$accusage = $_POST['xaccusage'];
			$accsource = $_POST['xaccsource'];
				
			$success=false;
			$form = new Form();
				$data = array();
				
				try{
					
					
				
				
				$form	->post('xacc')
						->val('minlength', 1)
						->val('maxlength', 20)
										
				
						->post('xdesc')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('xacctype')
						
						->post('xaccusage')
						
				
						->post('xacclevel1')
						->val('maxlength', 100)
						
						->post('xacclevel2')
						->val('maxlength', 100)
						
						->post('xacclevel3')
						->val('maxlength', 100);
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
				$data['xaccsource'] = $accsource;
				$success = $this->model->editglchart($data, $acc);
				
				
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
				 $this->showglchart($acc, $result);
				
		
		}
		
		public function showglchart($acc="", $result=""){
		if($acc==""){
			header ('location: '.URL.'glchart');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."glchart/glchartentry"
		);
		
		$tblvalues = $this->model->getSingleglchart($acc);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Chart Of Accounts", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."glchart/editglchart/".$acc, "Edit",$tblvalues, URL."glchart/showpost");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('glchart/glchartentry');
		}
		
		
		
		public function showentry($acc, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."glchart/glchartentry"
		);
		
		$tblvalues = $this->model->getSingleglchart($acc);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Chart Of Accounts", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."glchart/saveglchart", "Save",$tblvalues ,URL."glchart/showpost");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('glchart/glchartentry');
		}
		
		function renderTable(){
			$fields = array(
						"xacc-Account Code",
						"xdesc-Account Description",
						"xacctype-Account Type",
						"xaccusage-Use Of The Account",
						"xaccsource-Account Source"
						);
			$table = new Datatable();
			$row = $this->model->getGlchartByLimit();
			
			return $table->createTable($fields, $row, "xacc", URL."glchart/showglchart/", URL."glchart/deleteglchart/");
			
			
		}
		
		function glchartpicklistcr(){
			$this->view->table = $this->glchartPickTablecr();
			
			$this->view->renderpage('glchart/glchartpicklistcr', false);
		}
		
		
		function glchartpicklist(){
			$this->view->table = $this->glchartPickTable();
			
			$this->view->renderpage('glchart/glchartpicklist', false);
		}

		function glchartpicklistsub(){
			$this->view->table = $this->glchartPickTableSub();
			
			$this->view->renderpage('glchart/glchartpicklist', false);
		}
		
		function glchartpicklistexp(){
			$this->view->table = $this->glchartPickTableexp();
			
			$this->view->renderpage('glchart/glchartpicklist', false);
		}
		
		function glchartpicklistinc(){
			$this->view->table = $this->glchartPickTableinc();
			
			$this->view->renderpage('glchart/glchartpicklist', false);
		}
		
		function glchartPickTablecr(){
			$fields = array(
						"xacccr-Account Code",
						"xdesc-Account Description",
						"xacctype-Account Type",
						"xaccusage-Use Of The Account",
						"xaccsource-Account Source"
						);
			$table = new Datatable();
			$row = $this->model->getGlchartcrByLimit();
			
			return $table->picklistTable($fields, $row, "xacccr");
		}
		
		function glchartPickTable(){
			$fields = array(
						"xacc-Account Code",
						"xdesc-Account Description",
						"xacctype-Account Type",
						"xaccusage-Use Of The Account",
						"xaccsource-Account Source"
						);
			$table = new Datatable();
			$row = $this->model->getGlchartByLimit();
			
			return $table->picklistTable($fields, $row, "xacc");
		}
		function glchartPickTableSub(){
			$fields = array(
						"xacc-Account Code",
						"xdesc-Account Description",
						"xacctype-Account Type",
						"xaccusage-Use Of The Account",
						"xaccsource-Account Source"
						);
			$table = new Datatable();
			$row = $this->model->getGlchartsubByLimit();
			
			return $table->picklistTable($fields, $row, "xacc");
		}
		function glchartPickTableexp(){
			$fields = array(
						"xacc-Account Code",
						"xdesc-Account Description",
						"xacctype-Account Type",
						"xaccusage-Use Of The Account",
						"xaccsource-Account Source"
						);
			$table = new Datatable();
			$row = $this->model->getGlchartexpByLimit();
			
			return $table->picklistTable($fields, $row, "xacc");
		}
		
		function glchartPickTableinc(){
			$fields = array(
						"xacc-Account Code",
						"xdesc-Account Description",
						"xacctype-Account Type",
						"xaccusage-Use Of The Account",
						"xaccsource-Account Source"
						);
			$table = new Datatable();
			$row = $this->model->getGlchartincByLimit();
			
			return $table->picklistTable($fields, $row, "xacc");
		}
		
		function glchartlist(){
			$rows = $this->model->getGlchartByLimit();
			$cols = array("Account Type","Account Code","Account Description","Account Usage","Account Source");
			$table = new Datatable();
			$this->view->table = $table->singleGroupTable($cols, $rows, "xacctype");
			$this->view->renderpage('glchart/glchartlist', false);
		}
		function glchartsublist(){
			$rows = $this->model->getGlchartSubList();
			$cols = array("Account Code","Description","Sub Account","Description");
			$table = new Datatable();
			$this->view->table = $this->singleGroupTable($cols, $rows, "xacc");
			$this->view->renderpage('glchart/glchartlist', false);
		}
		function singleGroupTable($cols, $rows, $groupval, $totalfield=""){
		
			$row = $rows;
			$cl = count($cols);
			$grouprec = [];
			foreach($row as $gkey=>$gval){
				$keyval = $gval[$groupval];
				$grouprec[$keyval][]=$gval;
			}
									
			$table = '';
			$total=0;
			
			$table.= '<table id="grouptable" class="table table-bordered table-striped" style="width:100%">';	
				$table.= '<thead>';
				foreach ($cols as $col){
					$table.= '<th>'.$col.'</th>';
				}
				$table.= '</thead>';
				$table.= '<tbody>';
					foreach($grouprec as $key=>$val ){
						$subtotal=0;
						$table.= '<tr rowspan="5">';
							$table.= '<td><strong>'. $key ."-".$val[0]['xaccdesc'].'</strong></td>';
							for ($i=0; $i<count($cols)-1; $i++){
								$table.= '<td></td>';
							}
						$table.= '</tr>';
						
							foreach($val as $k=>$v ){
								$table.= '<tr>';
								//$table.= '<td></td><td>'. $v['xacc'] .'</td><td>'. $v['xdesc'] .'</td><td>'. $v['xaccusage'] .'</td><td>'. $v['xaccsource'] .'</td>';
								$table.= '<td></td>'; 
								if($totalfield!=""){
										$total += $v[$totalfield];
										$subtotal += $v[$totalfield];
									}
								foreach($v as $td){
									
									if ($td <> $v[$groupval])
										$table.= '<td>'. $td .'</td>';
									
								}
								$table.= '</tr>';
							}
							
						
					}
				$table.= '</tbody>';
				
			$table.= '</table>';
			
			return $table;
			
		}
		
		function glchartentry(){
				
		$btn = array(
			"Clear" => URL."glchart/glchartentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Chart Of Accounts",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."glchart/saveglchart", "Save",$this->values, URL."glchart/showpost");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('glchart/glchartentry', false);
		}
		
		public function deleteglchart($acc){
			$where = "bizid=".Session::get('sbizid')." and xacc='".$acc ."'";
			$this->model->delete($where);
			$this->view->message = "";
			$this->showglchart($acc);
		}
		
		public function showpost(){
			$acc = $_POST['xacc'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."glchart/glchartentry"
		);
		
		$tblvalues = $this->model->getSingleglchart($acc);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Chart Of Accounts", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."glchart/saveglchart", "Save",$tblvalues, URL."glchart/showpost");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('glchart/glchartentry');
		}
}