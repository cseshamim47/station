<?php
class Cuscomplain extends Controller{
	
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
				if($menus["xsubmenu"]=="Customer Complain")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','public/js/imageshow.js','views/cuscomplain/js/codevalidator.js', 'views/cuscomplain/js/getitemdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"xcus"=>"",
			"xcomplain"=>"",
			"xremark"=>""
			);
			
		$this->fields = array(
						array(
							"xcus-group_".URL."jsondata/customerpicklist"=>'Customer*~star_maxlength="20"',
							"xdate-datepicker"=>'Date*~star_""'
							
							),
						array(
							"xcomplain-textarea"=>'Complain_maxlength="500"'
							),
						array(
							"xremark-text"=>'Remark_maxlength="200"'
							)
						);	
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."cuscomplain/itementry",
		);	
		
		
		// form data
		
			$dynamicForm = new Dynamicform("Customer Complain",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."cuscomplain/savecuscomplain", "Save",$this->values,URL."cuscomplain/showpost");
			
			$this->view->table = $this->renderTable();
			
			$this->view->rendermainmenu('cuscomplain/index');
			
		}
		
		public function savecuscomplain(){
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				try{						
				
				$form	->post('xcus')
					
						->post('xcomplain')
						->val('maxlength', 500)
						
						->post('xremark');
						
				$form	->submit();
				
				$data = $form->fetch();
				
				//print_r($data); die;	
				$data['xdate']= $date;
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				//print_r($data);die;				
				$success = $this->model->create($data);
				
				if(empty($success))
					$success=0;
				
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				
				
				if($success>0){
					$this->result = "Customer Complain saved successfully";
				}
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to save Customer Complain!";
				
				if($success>0)
				 $this->showentry($success, $this->result);
				else
				 $this->showentry(0, $this->result); 		
				 
				
		}
		
		public function edititem($id){
			$xdate = $_POST['xdate'];
			$dt = str_replace('/', '-', $xdate);
			$date = date('Y-m-d', strtotime($dt));	
			$result = "";
			
			$success=false;
			$form = new Form();
				$data = array();
				
				try{
					
					
				
					$form
					
					->post('xcomplain')
				
			
					->post('xremark');
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				$data['xdate'] = $date;
				$success = $this->model->editItem($data, $id);
				
				
				}catch(Exception $e){
					//echo $e->getMessage();die;
					$result = $e->getMessage();
					
				}
				//var_dump($_POST); die;
				if($result==""){
				if($success){
					$result = "Edited successfully";
				}
				else
					$result = "Edit failed!";
				
				}
				 $this->showitem($id, $result);
				
		
		}
		
		public function showitem($id="", $result=""){
		
					$tblvalues=array();
					$btn = array(
						"New" => URL."cuscomplain/itementry"
					);
					
					$tblvalues = $this->model->getSingleItem($id);
					
					if(empty($tblvalues))
						$tblvalues=$this->values;
					else
						$tblvalues=$tblvalues[0];
						
					// form data
					
						
						$dynamicForm = new Dynamicform("Customer Complain", $btn, $result);		
						
						$this->view->dynform = $dynamicForm->createForm($this->fields, URL."cuscomplain/edititem/".$id, "Edit",$tblvalues, URL."cuscomplain/showpost");
						
						$this->view->table = $this->renderTable();
						
						$this->view->renderpage('cuscomplain/itementry');
		}
		
		
		
		public function showentry($id, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."cuscomplain/itementry"
		);
		
		$tblvalues = $this->model->getSingleItem($id);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Customer Complain", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."cuscomplain/savecuscomplain", "Save",$tblvalues ,URL."cuscomplain/showpost");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('cuscomplain/itementry');
		}
		
		function renderTable(){
			$fields = array(
						"xsl-SL",
						"xdate-Date",
						"xcus-Customer",
						"xcomplain-Complain",
						"xremark-Remark"
						);
			$table = new Datatable();
			$row = $this->model->getcuscomplainByLimit(" LIMIT 5");
			
			return $table->myTable($fields, $row, "xsl", URL."cuscomplain/showitem/");
			
			
		}
		
		function itemlist(){
			$this->view->table = $this->itemTable();
			
			$this->view->renderpage('cuscomplain/itemlist', false);
		}

		function printindivisual(){
			$this->view->table = $this->printTable();
			
			$this->view->renderpage('cuscomplain/itemlist', false);
		}
		
		function picklist(){
			$this->view->table = $this->itemPickTable();
			
			$this->view->renderpage('cuscomplain/itempicklist', false);
		}

		function getCusDet($rin){
			$this->model->getCusDet($rin);
		}
		
		function itemPickTable(){
			$fields = array(
						"xitemcode-Item Code",
						"xitemcodealt-Alternate Code",
						"xdesc-Description",
						"xstdprice-Price",
						"xsource-Item Source"	
						);
			$table = new Datatable();
			$row = $this->model->getcuscomplainByLimit();
			
			return $table->picklistTable($fields, $row, "xitemcode");
		}
		
		function itemTable(){
			$fields = array(
						"xsl-SL",
						"xcus-Customer",
						"xitemcode-Item",
						"xquality-Quality",
						"xdelper-Delivery Performance",
						"xvalprod-Value of the Product",
						"xservcar-Service & Care"
						);
			$table = new Datatable();
			$row = $this->model->getcuscomplainByLimit();
			
			return $table->createTable($fields, $row, "xsl", URL."cuscomplain/showitem/", URL."cuscomplain/deleteitem/");
		}

		public function printTable(){
			$table = "";
			$row = $this->model->getcuscomplainByLimit();
			$table.= '<div class="table-responsive"><table id="dtbl" class="table table-striped table-bordered" cellspacing="0" width="100%">';
			$table.= '<thead><tr>';
			$table.= '<th>Customer</th><th>Item</th><th>Quality</th><th>Delivery Performance</th><th>Value of the Products</th><th>Service & Care</th><th>Print</th></tr></thead>';
			$table.= '<tbody>';
			foreach($row as $k=>$v){
				$xsl = $v['xsl'];
				$button = URL.'cuscomplain/printassesment/'.$xsl;
				$table.= '<tr>';
				$table.= '<td>'.$v['xcus'].'</td>';
				$table.= '<td>'.$v['xitemcode'].'</td>';
				$table.= '<td>'.$v['xquality'].'</td>';
				$table.= '<td>'.$v['xdelper'].'</td>';
				$table.= '<td>'.$v['xvalprod'].'</td>';
				$table.= '<td>'.$v['xservcar'].'</td>';
				$table.='<td><a class="btn btn-info" id="'.$xsl.'"  href="'.$button.'" role="button">Print</a></td>';
				$table.= '</tr>';
			}
			$table.= '</tbody></table></div>';
			return $table;
		}

		public function printassesment($xsl){
			$this->view->renderpage('cuscomplain/printassesment', false);
		}
		
		function itementry(){
				
		$btn = array(
			"Clear" => URL."cuscomplain/itementry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Customer Complain",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."cuscomplain/savecuscomplain", "Save",$this->values, URL."cuscomplain/showpost");
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('cuscomplain/itementry', false);
		}
		
		public function deleteitem($id){
			$where = "bizid=".Session::get('sbizid')." and xsl =".$id;
			$this->model->delete($where);
			$this->view->message = "";
			$this->itemlist();
		}
		
		public function showpost(){
			$id = $_POST['xitemcode'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."cuscomplain/itementry"
		);
		
		$tblvalues = $this->model->getSingleItem($id);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Item", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."cuscomplain/savecuscomplain", "Save",$tblvalues);
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('cuscomplain/itementry');
		}
}