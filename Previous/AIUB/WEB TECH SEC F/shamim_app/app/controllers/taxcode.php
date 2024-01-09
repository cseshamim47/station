<?php
class Taxcode extends Controller{
	
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
				if($menus["xsubmenu"]=="Tax Setup")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/suppliers/js/codevalidator.js');
		
		$this->values = array(
			"xtaxcode"=>"",
			"xtaxcodealt"=>"",
			"xtaxpct"=>"0.0",
			"xsl"=>"0"
			);
			
	$this->fields = array(array(
							"xtaxcode-text"=>'Tax Code_maxlength="20"',
							"xtaxcodealt-text"=>'Alternate Code_maxlength="20"'
							),
						array(
							"xtaxpct-text"=>'Tax PCT_maxlength="20"'
							),
						array(
							"xsl-hidden"=>'_""'
							)
						);		
		}
		
		public function index(){
		
		
		
			
			$this->view->rendermainmenu('taxcode/index');
			
		}

		function taxentry(){
				
		$btn = array(
			"Clear" => URL."taxcode/taxentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Tax",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."taxcode/savetax	", "Save",$this->values);
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('taxcode/taxentry', false);
		}
		
		public function savetax(){			
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				try{						
				
				$form	->post('xtaxcode')
						->val('maxlength', 20)
				
						->post('xtaxcodealt')
						->val('maxlength', 20)
						
						->post('xtaxpct')
						->val('maxlength', 20);
						
				$form	->submit();
				
				$data = $form->fetch();	
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				//print_r($data);die;				
				$success = $this->model->create($data);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				
				
				if($success>0)
					$this->result = "Tax saved successfully";
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to save Tax!";
				
				 $this->showentry($success, $this->result);
				 
		}

		public function showentry($taxid, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."taxcode/taxentry"
		);
		
		$tblvalues = $this->model->getSingleTax($taxid);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
			$dynamicForm = new Dynamicform("Tax", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."taxcode/savetax	", "Save",$this->values);
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('taxcode/taxentry');
		}
		
		public function edittaxcode(){

			$xsl = $_POST['xsl'];
			$result = "";			
			$success=false;
			$form = new Form();
				$data = array();
				
				try{		
				
				$form	->post('xtaxcode')
						->val('maxlength', 20)
				
						->post('xtaxcodealt')
						->val('maxlength', 20)
						
						->post('xtaxpct')
						->val('maxlength', 20);
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
				$success = $this->model->editTex($data, $xsl);
				
				
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
				 $this->showtax($xsl, $result);				
		
		}
		
		public function showtax($taxid="", $result=""){
		$tblvalues=array();
		$btn = array(
			"New" => URL."taxcode/taxentry"
		);
		
		$tblvalues = $this->model->getSingleTax($taxid);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Tax", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."taxcode/edittaxcode", "Edit",$tblvalues );
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('taxcode/taxentry');
		}
		
		function renderTable(){
			$fields = array(
						"xsl-Serial",
						"xtaxcode-Tax Code",
						"xtaxcodealt-Tax Code ALT",
						"xtaxpct-Tax PCT"
						);
			$table = new Datatable();
			$row = $this->model->getTaxByLimit();
			
			return $table->myTable($fields, $row, "xsl", URL."taxcode/showtax/", URL."taxcode/deletetax/");
			
			
		}
		public function deletetax($sl){
			$where = " where bizid=".Session::get('sbizid')." and xsl=".$sl;
			$this->model->delete($where);
			$this->view->message = "";
			$this->taxentry();
		}
		
		
		/*public function showpost(){
			$taxid = $_POST['xsl'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."suppliers/supplierentry"
		);
		
		$tblvalues = $this->model->getSingleTax($taxid);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Tax", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."taxcode/edittax", "Edit",$tblvalues);
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('taxcode/texentry');
		}*/
}