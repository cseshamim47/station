<?php
class Cussatisfaction extends Controller{
	
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
				if($menus["xsubmenu"]=="Customer Satisfaction Assesment")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','public/js/imageshow.js','views/cussatisfaction/js/codevalidator.js', 'views/cussatisfaction/js/getitemdt.js');
		
		$this->values = array(
			"xcus"=>"",
			"xadd1"=>"",
			"xitemcode"=>"",
			"xquality"=>"",
			"xdelper"=>"",
			"xvalprod"=>"",
			"xservcar"=>"",
			"xcomment"=>"",
			"xname"=>"",
			"xtitle"=>"",
			"xmobile"=>"",
			"xphone"=>"",
			"xemail"=>"",
			"xcomment"=>"",
			"xconfidential"=>"",
			"xprepare"=>"",
			"xapprove"=>""
			);
			
		$this->fields = array(
						array(
							"xcus-group_".URL."jsondata/customerpicklist"=>'Customer*~star_maxlength="20"',
							"xitemcode-group_".URL."cussatisfaction/picklist"=>'Item Supplies_maxlength="50"'
							
							),
						array(
							"xadd1-textarea"=>'Address_maxlength="200"'
							),
						array(
							"xquality-select_Satisfaction Quality"=>'Quality_maxlength="60"',
							"xdelper-select_Delivery Performance"=>'Delivery Performance_maxlength="60"'
							),
						array(
							"xvalprod-select_Value of the Products"=>'Value of the Products_maxlength="60"',
							"xservcar-select_Service and Care"=>'Service & Care_maxlength="60"'
							),
						array(
							"xcomment-textarea"=>'Comment/Complain_maxlength="200"'
							),
						array(
							"xname-text"=>'Name_maxlength="50"',
							"xtitle-text"=>'Title_maxlength="50"'
							),
						array(
							"xmobile-text"=>'Mobile_maxlength="11"',
							"xphone-text"=>'Phone_maxlength="50"'
							),
						array(
							"xemail-text"=>'Email_maxlength="30"'
							),
							array(
								"xconfidential-checkbox_0"=>'If you would like to keep your name confidential, please click here_""'
							),		
						array(
							"xprepare-text"=>'Prepared By_maxlength="18"',
							"xapprove-text"=>'Approved By_maxlength="18"'
							)
						);	
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."cussatisfaction/itementry",
		);	
		
		
		// form data
		
			$dynamicForm = new Dynamicform("Customer Satisfaction Assesment",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."cussatisfaction/savecussatisfaction", "Save",$this->values,URL."cussatisfaction/showpost");
			
			$this->view->table = $this->renderTable();
			
			$this->view->rendermainmenu('cussatisfaction/index');
			
		}
		
		public function savecussatisfaction(){
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				try{						
				
				$form	->post('xcus')
						->val('maxlength', 30)
						
						->post('xadd1')
					
				
						->post('xitemcode')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('xquality')
						
						->post('xdelper')
						
						->post('xvalprod')
						
						->post('xservcar')
						
						->post('xcomment')
						
						->post('xname')
						
						->post('xtitle')
						
						->post('xmobile')
						
						->post('xphone')
						
						->post('xemail')
						
						->post('xconfidential')
						
						->post('xprepare')
						
						->post('xapprove');
						
				$form	->submit();
				
				$data = $form->fetch();
				
				//print_r($data); die;	
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
					$this->result = "Customer Satisfaction Assesment saved successfully";
				}
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to save Customer Satisfaction Assesment!";
				
				if($success>0)
				 $this->showentry($success, $this->result);
				else
				 $this->showentry(0, $this->result); 		
				 
				
		}
		
		public function edititem($id){
				
			$result = "";
			
			$success=false;
			$form = new Form();
				$data = array();
				
				try{
					
					
				
					$form	->post('xcus')
					->val('maxlength', 30)
					
					->post('xadd1')
				
			
					->post('xitemcode')
					->val('minlength', 1)
					->val('maxlength', 50)
					
					->post('xquality')
					
					->post('xdelper')
					
					->post('xvalprod')
					
					->post('xservcar')
					
					->post('xcomment')
					
					->post('xname')
					
					->post('xtitle')
					
					->post('xmobile')
					
					->post('xphone')
					
					->post('xemail')
					
					->post('xconfidential')
					
					->post('xprepare')
					
					->post('xapprove');
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
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
						"New" => URL."cussatisfaction/itementry"
					);
					
					$tblvalues = $this->model->getSingleItem($id);
					
					if(empty($tblvalues))
						$tblvalues=$this->values;
					else
						$tblvalues=$tblvalues[0];
						
					// form data
					
						
						$dynamicForm = new Dynamicform("Customer Satisfaction Assesment", $btn, $result);		
						
						$this->view->dynform = $dynamicForm->createForm($this->fields, URL."cussatisfaction/edititem/".$id, "Edit",$tblvalues, URL."cussatisfaction/showpost");
						
						$this->view->table = $this->renderTable();
						
						$this->view->renderpage('cussatisfaction/itementry');
		}
		
		
		
		public function showentry($id, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."cussatisfaction/itementry"
		);
		
		$tblvalues = $this->model->getSingleItem($id);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Customer Satisfaction Assesment", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."cussatisfaction/savecussatisfaction", "Save",$tblvalues ,URL."cussatisfaction/showpost");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('cussatisfaction/itementry');
		}
		
		function renderTable(){
			$fields = array(
						"xsl-SL",
						"xcus-Customer",
						"xitemcode-Item Supplies",
						"xquality-Quality",
						"xdelper-Delivery Performance",
						"xvalprod-Value of the products",
						"xservcar-Service & Care"
						);
			$table = new Datatable();
			$row = $this->model->getcussatisfactionByLimit(" LIMIT 5");
			
			return $table->myTable($fields, $row, "xsl", URL."cussatisfaction/showitem/");
			
			
		}
		
		function itemlist(){
			$this->view->table = $this->itemTable();
			
			$this->view->renderpage('cussatisfaction/itemlist', false);
		}

		function printindivisual(){
			$this->view->table = $this->printTable();
			
			$this->view->renderpage('cussatisfaction/itemlist', false);
		}
		
		function picklist(){
			$this->view->table = $this->itemPickTable();
			
			$this->view->renderpage('cussatisfaction/itempicklist', false);
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
			$row = $this->model->getcussatisfactionByLimit();
			
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
			$row = $this->model->getcussatisfactionByLimit();
			
			return $table->createTable($fields, $row, "xsl", URL."cussatisfaction/showitem/", URL."cussatisfaction/deleteitem/");
		}

		public function printTable(){
			$table = "";
			$row = $this->model->getcussatisfactionByLimit();
			$table.= '<div class="table-responsive"><table id="dtbl" class="table table-striped table-bordered" cellspacing="0" width="100%">';
			$table.= '<thead><tr>';
			$table.= '<th>Customer</th><th>Item</th><th>Quality</th><th>Delivery Performance</th><th>Value of the Products</th><th>Service & Care</th><th>Print</th></tr></thead>';
			$table.= '<tbody>';
			foreach($row as $k=>$v){
				$xsl = $v['xsl'];
				$button = URL.'cussatisfaction/printassesment/'.$xsl;
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
			$this->view->renderpage('cussatisfaction/printassesment', false);
		}
		
		function itementry(){
				
		$btn = array(
			"Clear" => URL."cussatisfaction/itementry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Customer Satisfaction Assesment",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."cussatisfaction/savecussatisfaction", "Save",$this->values, URL."cussatisfaction/showpost");
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('cussatisfaction/itementry', false);
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
			"New" => URL."cussatisfaction/itementry"
		);
		
		$tblvalues = $this->model->getSingleItem($id);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Item", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."cussatisfaction/savecussatisfaction", "Save",$tblvalues);
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('cussatisfaction/itementry');
		}
}