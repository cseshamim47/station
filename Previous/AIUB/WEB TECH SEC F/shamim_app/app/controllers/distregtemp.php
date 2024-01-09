<?php
class Distregtemp extends Controller{
	
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
				if($menus["xsubmenu"]=="Pre Retailer Registration")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/distjoin/js/bindt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"prefix"=>"",
			"xrdin"=>"",
			"xshort"=>"",
			"xorg"=>"",
			"xadd1"=>"",
			"xadd2"=>"",
			"xbillingadd"=>"",
			"xdeliveryadd"=>"",
			"xfname"=>"",
			"xmname"=>"",
			"xdob"=>$dt,
			"xcity"=>"",
			"xprovince"=>"",
			"xpostal"=>"",
			"xcountry"=>"",
			"xcontact"=>"",
			"xtitle"=>"",
			"xphone"=>"",
			"xcusemail"=>"",
			"xmobile"=>"",
			"xfax"=>"",
			"xweburl"=>"",
			"xnid"=>"",
			"xtaxno"=>"",
			"xtaxscope"=>"",
			"xgcus"=>"None",
			"xpricegroup"=>"",
			"xcustype"=>"",
			"xindustryseg"=>"",
			"xdiscountpct"=>"0",
			"xagent"=>"",
			"xcommisionpct"=>"0",
			"xcreditlimit"=>"0",
			"xcreditterms"=>"0",
			"zactive"=>"1",
			"xgender"=>"Male"
			);
			
			$this->fields = array(array(
							"xrdin-group_".URL."distreg/distributorpicklist"=>'RIN_maxlength="20"',
							"xorg-text"=>'Full Name*~star_maxlength="100"'
							),
						array(
							"xfname-text"=>'Fathers Name_maxlength="50"',
							"xmname-text"=>'Mothers Name_maxlength="50"'
							),
						array(
							"xadd1-text"=>'Present Address_maxlength="160"',
							"xadd2-text"=>'Parmanent Address_maxlength="160"'
							),
						array(
							"xpostal-text"=>'Postal Code_maxlength="50"',
							"xcity-select_Thana"=>'Police Station_maxlength="50"'							
							),
						array(
							"xprovince-select_District"=>'District_maxlength="100"',
							"xdob-datepicker"=>'DOB_""'
							),
						array(
							"xcusemail-text"=>'Email_maxlength="50" email="true"',
							"xmobile-text"=>'Mobile*~star_maxlength="50"'
							),
						array(
							"xnid-text"=>'NID*~star_maxlength="50"',
							"zactive-checkbox_1"=>'Active?_""'
							)
							,
						array(
							"xgender-radio_Male_Female"=>'_'
							)
						);
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."distregtemp/distributorentry",
		);	
		
		
		
			
			$this->view->rendermainmenu('distregtemp/index');
			
		}
		
		public function savedistributors(){
				if (!isset($_POST['xrdin'])){
					header ('location: '.URL.'distreg');
					exit;
				}
			
		$xdate = $_POST['xdob'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));		
		$cusauto =	Session::get('sbizcusauto');	
		//$prefix = $_POST['prefix'];	
		//$keyfieldval = $this->model->getKeyValue("mlminfo","xrdin","ABL-".Session::get('sbizcusauto')."-","4");
		$keyfieldval = $this->model->getRINNo("mlminfo","xrdin",Session::get('sbin'));	
				$form = new Form();
				$data = array();
				$success=0;
				$result = ""; 
				
				try{
					
				if($_POST['xnid']==""){
						throw new Exception("NID Not Found!");
					}
				$isNIDExists = $this->model->checkRinByNID($_POST['xnid']);
				if($isNIDExists){
						throw new Exception("Retailer exists! Cannot save.");
					}
				if($_POST['xmobile']==""){
						throw new Exception("Mobile Not Found!");
					}		
					
				if($cusauto=="NO"){
				$form	->post('xrdin')
						->val('minlength', 1)
						->val('maxlength', 20);
				}						
				
				
				$form	->post('xorg')
						->val('minlength', 4)
						->val('maxlength', 160)
						
						->post('xfname')
						->val('maxlength', 160)
						
						
						->post('xmname')
						->val('maxlength', 160)
						
						->post('xgender')
						
						->post('xadd1')
						->val('maxlength', 160)
						
						->post('xadd2')
						->val('maxlength', 160)
						
												
						->post('xcity')
						->val('maxlength', 50)
						
						->post('xprovince')
						
						->post('xpostal')
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
					$data['xrdin'] = $keyfieldval;	
				$data['bizid'] = Session::get('sbizid');
				$data['xdob'] = $date;
				$data['zemail'] = Session::get('suser');
				$data['cbin'] = Session::get('sbin');
				//print_r($data);die;				
				$success = $this->model->create($data);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				
				
				if($success>0)
					$this->result = "Retailer Registration Successfull";
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Register Retailer!";
				
				 $this->showentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		public function editdistributor($cus){
			
			if (!isset($_POST['xrdin'])){
					header ('location: '.URL.'distreg');
					exit;
				}
			$result = "";
			$xdate = $_POST['xdob'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
			$success=false;
			$form = new Form();
				$data = array();
				
				try{
					
				if($_POST['xnid']==""){
						throw new Exception("NID Not Found!");
					}
				if($_POST['xmobile']==""){
						throw new Exception("Mobile Not Found!");
					}	
				
				
				$form	->post('xrdin')
						->val('minlength', 1)
						->val('maxlength', 20)
						
				
						->post('xorg')
						->val('minlength', 4)
						->val('maxlength', 160)
						
						->post('xadd1')
						->val('maxlength', 160)
						
						->post('xadd2')
						->val('maxlength', 160)
						
						->post('xfname')
						->val('maxlength', 160)
						
						->post('xgender')
						
						
						->post('xmname')
						->val('maxlength', 160)
						
												
						->post('xcity')
						->val('maxlength', 50)
						
						->post('xprovince')
						
						->post('xpostal')
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
				$data['xdob'] = $date;
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
			"New" => URL."distregtemp/distributorentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($cus);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Retailer", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distregtemp/editdistributor/".$cus, "Edit",$tblvalues, URL."distregtemp/showpost");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('distregtemp/distributorentry');
		}
		
		
		
		public function showentry($cus, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."distregtemp/distributorentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($cus);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Retailer", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distregtemp/savedistributors", "Save",$tblvalues ,URL."distregtemp/showpost");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('distregtemp/distributorentry');
		}
		
		function renderTable(){
			$fields = array(
						"xrdin-RIN",
						"xorg-Organization/Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xcusemail-Email"
						);
			$table = new Datatable();
			$row = $this->model->getCustomersByLimit(" LIMIT 5");
			
			return $table->myTable($fields, $row, "xrdin", URL."distregtemp/showcustomer/");
			
			
		}
		
		function distributorlist(){
			$this->view->table = $this->itemTable();
			
			$this->view->renderpage('distregtemp/distributorlist', false);
		}
		
		function distributorpicklist(){
			$this->view->table = $this->customerPickTable();
			
			$this->view->renderpage('distregtemp/distributorpicklist', false);
		}
		
		function customerPickTable(){
			$fields = array(
						"xrdin-RIN",
						"xorg-Organization/Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xcusemail-Email"
						);
			$table = new Datatable();
			$row = $this->model->getCustomersByLimit();
			
			return $table->picklistTable($fields, $row, "xrdin");
		}
		
		function itemTable(){
			$fields = array(
						"xrdin-DIN",
						"xorg-Organization/Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xcusemail-Email"
						);
			$table = new Datatable();
			$row = $this->model->getCustomersByLimit();
			
			return $table->createTable($fields, $row, "xrdin", URL."distregtemp/showcustomer/");
		}
		
		function distributorentry(){
				
		$btn = array(
			"Clear" => URL."distregtemp/distributorentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Retailer",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distregtemp/savedistributors", "Save",$this->values, URL."distregtemp/showpost");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('distregtemp/distributorentry', false);
		}
		
		public function deletecustomer($cus){
			$where = "bizid=".Session::get('sbizid')." and xrdin='".$cus."'";
			$this->model->delete($where);
			$this->view->message = "";
			$this->customerlist();
		}
		
		public function showpost(){
			$cus = $_POST['xrdin'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."distregtemp/distributorentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($cus);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Distributor", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distregtemp/savecustomers", "Save",$tblvalues);
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('distregtemp/distributorentry');
		}
}