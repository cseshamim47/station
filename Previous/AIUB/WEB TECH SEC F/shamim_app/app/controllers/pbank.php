<?php
class Pbank extends Controller{
	
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
				if($menus["xsubmenu"]=="Point Bank")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/pbank/js/codevalidator.js');
		
		$this->values = array(
			
			"xcus"=>"",
			"xorg"=>"",
			"xadd1"=>"",
			"xmobile"=>"",
			"xmrno"=>"",
			"xpoint"=>""
			);
			
			$this->fields = array(array(
							"xcus-group_".URL."distreg/distributorpicklist"=>'DIN_maxlength="20"',
							"xorg-text"=>'Description_Readonly maxlength="100"'
							),
						array(
							"xadd1-text"=>'Address1_Readonly maxlength="160"',
							"xmobile-text"=>'Mobile_Readonly maxlength="50"'
							),
						array(
							"xmrno-text"=>'MR No_maxlength="50" email="true"',
							"xpoint-text"=>'Point_Readonly maxlength="50" '
							)
						);
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."pbank/pbankentry",
		);	
		
		
		// form data
		
			$dynamicForm = new Dynamicform("Point Bank",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."pbank/savepbank", "Save",$this->values,URL."pbank/showpost");
			
			$this->view->table = $this->renderTable();
			
			$this->view->rendermainmenu('pbank/index');
			
		}
		
		public function savedistributors(){
				if (!isset($_POST['xcus'])){
					header ('location: '.URL.'distreg');
					exit;
				}
		$cusauto =	Session::get('sbizcusauto');	
		$prefix = $_POST['prefix'];	
		$keyfieldval = $this->model->getKeyValue("secus","xcus",$prefix,"6");			
				$form = new Form();
				$data = array();
				$success=0;
				$result = ""; 
				try{
					
				if($cusauto=="NO"){
				$form	->post('xcus')
						->val('minlength', 1)
						->val('maxlength', 20);
				}						
				
				$form	->post('xshort')
						->val('maxlength', 20)
				
						->post('xorg')
						->val('minlength', 4)
						->val('maxlength', 160)
						
						->post('xadd1')
						->val('maxlength', 160)
						
						->post('xadd2')
						->val('maxlength', 160)
						
						->post('xbillingadd')
						->val('maxlength', 160)
						
						->post('xdeliveryadd')
						->val('maxlength', 160)
						
						->post('xcity')
						->val('maxlength', 50)
						
						->post('xprovince')
						
						->post('xpostal')
						->val('maxlength', 20)
						
						->post('xcountry')
						
						->post('xcontact')
						->val('maxlength', 50)
						
						->post('xtitle')
						->val('maxlength', 50)
						
						->post('xphone')
						->val('maxlength', 15)
						
						->post('xfax')
						->val('maxlength', 20)
						
						->post('xmobile')
						->val('maxlength', 14)
						
						->post('xcusemail')
						->val('maxlength', 100)
						
						
						
						->post('xnid')
						->val('maxlength', 20)
						
						
						
						->post('zactive');
						
				$form	->submit();
				
				$data = $form->fetch();
				if($cusauto=="YES")
					$data['xcus'] = $keyfieldval;	
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
					$this->result = "Distributor Registration Successfull";
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Register Distributor!";
				
				 $this->showentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		public function editdistributor($cus){
			
			if (!isset($_POST['xcus'])){
					header ('location: '.URL.'distreg');
					exit;
				}
			$result = "";
			
			$success=false;
			$form = new Form();
				$data = array();
				
				try{
					
					
				
				
				$form	->post('xcus')
						->val('minlength', 1)
						->val('maxlength', 20)
										
				
						->post('xshort')
						->val('maxlength', 20)
				
						->post('xorg')
						->val('minlength', 4)
						->val('maxlength', 160)
						
						->post('xadd1')
						->val('maxlength', 160)
						
						->post('xadd2')
						->val('maxlength', 160)
						
						->post('xbillingadd')
						->val('maxlength', 160)
						
						->post('xdeliveryadd')
						->val('maxlength', 160)
						
						->post('xcity')
						->val('maxlength', 50)
						
						->post('xprovince')
						
						->post('xpostal')
						->val('maxlength', 20)
						
						->post('xcountry')
						
						->post('xcontact')
						->val('maxlength', 50)
						
						->post('xtitle')
						->val('maxlength', 50)
						
						->post('xphone')
						->val('maxlength', 15)
						
						->post('xfax')
						->val('maxlength', 20)
						
						->post('xmobile')
						->val('maxlength', 14)
						
						->post('xcusemail')
						->val('maxlength', 100)
						
						
						
						->post('xnid')
						->val('maxlength', 20)
						
						
						->post('zactive');
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
				$success = $this->model->editCustomer($data, $cus);
				
				
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
				 $this->showcustomer($cus, $result);
				
		
		}
		
		public function showcustomer($cus="", $result=""){
		if($cus==""){
			header ('location: '.URL.'distreg');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."distreg/distributorentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($cus);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Distributor", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distreg/editdistributor/".$cus, "Edit",$tblvalues, URL."distreg/showpost");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('distreg/distributorentry');
		}
		
		
		
		public function showentry($cus, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."distreg/distributorentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($cus);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Distributor", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distreg/savedistributors", "Save",$tblvalues ,URL."distreg/showpost");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('distreg/distributorentry');
		}
		
		function renderTable(){
			$fields = array(
						"xcus-DIN",
						"xorg-Organization/Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xcusemail-Email"
						);
			$table = new Datatable();
			$row = $this->model->getCustomersByLimit(" LIMIT 5");
			
			return $table->myTable($fields, $row, "xcus", URL."distreg/showcustomer/");
			
			
		}
		
		function distributorlist(){
			$this->view->table = $this->itemTable();
			
			$this->view->renderpage('distreg/distributorlist', false);
		}
		
		function distributorpicklist(){
			$this->view->table = $this->customerPickTable();
			
			$this->view->renderpage('distreg/distributorpicklist', false);
		}
		
		function customerPickTable(){
			$fields = array(
						"xcus-DIN",
						"xorg-Organization/Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xcusemail-Email"
						);
			$table = new Datatable();
			$row = $this->model->getCustomersByLimit();
			
			return $table->picklistTable($fields, $row, "xcus");
		}
		
		function itemTable(){
			$fields = array(
						"xcus-DIN",
						"xorg-Organization/Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xcusemail-Email"
						);
			$table = new Datatable();
			$row = $this->model->getCustomersByLimit();
			
			return $table->createTable($fields, $row, "xcus", URL."distreg/showcustomer/", URL."distreg/deletecustomer/");
		}
		
		function pbankentry(){
				
		$btn = array(
			"Clear" => URL."pbank/pbankentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Point Bank",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."pbank/savepbank", "Save",$this->values, URL."pbank/showpost");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('pbank/pbankentry', false);
		}
		
		public function deletecustomer($cus){
			$where = "bizid=".Session::get('sbizid')." and xcus='".$cus."'";
			$this->model->delete($where);
			$this->view->message = "";
			$this->customerlist();
		}
		
		public function showpost(){
			$cus = $_POST['xcus'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."distreg/distributorentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($cus);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Distributor", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distreg/savecustomers", "Save",$tblvalues);
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('distreg/distributorentry');
		}
}