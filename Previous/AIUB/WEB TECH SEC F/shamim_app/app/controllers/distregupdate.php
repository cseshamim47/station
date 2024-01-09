<?php
class Distregupdate extends Controller{
	
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
				if($menus["xsubmenu"]=="RIN Update")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distregupdate/js/codevalidator.js','views/distjoin/js/bindt.js','views/jsondata/js/cusdt.js');
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
			"xcus"=>"",
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
			"xgender"=>"Male",
			"xbank"=>"",
			"xacc"=>""
			);
			
			$this->fields = array(array(
							"xrdin-text"=>'RIN_maxlength="20"',
							"xcus-text"=>'Customer Code_maxlength="20"'
							),
						array(
							"xorg-text"=>'Full Name*~star_maxlength="100" readonly',
							"xnid-text"=>'NID*~star_maxlength="50"'
							),
						array(
							"xfname-text"=>'Fathers Name*~star_maxlength="50"',
							"xmname-text"=>'Mothers Name*~star_maxlength="50"'
							),
						array(
							"xadd1-text"=>'Present Address*~star_maxlength="160"',
							"xadd2-text"=>'Parmanent Address*~star_maxlength="160"'
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
							"xbank-select_Bank"=>'Bank*~star_maxlength="100"',
							"xacc-text"=>'Account No*~star_maxlength="50"'
							),
						array(
							"xgender-radio_Male_Female"=>'_',
							"zactive-checkbox_1"=>'Active?_""'
							)
							
						);
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."distregupdate/distributorentry",
		);	
		
			
			$this->view->rendermainmenu('distregupdate/index');
			
		}
		
		
		
		public function editdistributor(){
			
			if (!isset($_POST['xrdin'])){
					header ('location: '.URL.'distregupdate');
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
						
						->post('xcus')
						->val('maxlength', 160)
				
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
						
						->post('xbank')
						->val('maxlength', 20)
						
						->post('xacc')
						->val('maxlength', 20)
						
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
				
				$success = $this->model->editCustomer($data);
				
				
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
				 $this->showcustomer($data["xrdin"], $result);		
		
		}
		
		public function showcustomer($cus="", $result=""){
		if($cus==""){
			header ('location: '.URL.'distregupdate/distributorentry');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."distregupdate/distributorentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($cus);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Retailer", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distregupdate/editdistributor", "Update",$tblvalues, URL."distregupdate/showpost");
			
			
			
			$this->view->renderpage('distregupdate/distributorentry');
		}
		
		
		
		public function showentry($cus, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."distregupdate/distributorentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($cus);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Retailer", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distregupdate/editdistributor", "Update",$tblvalues ,URL."distregupdate/showpost");
			
			
			
			$this->view->renderpage('distregupdate/distributorentry');
		}
		
				
				
		function distributorentry(){
				
		$btn = array(
			"Clear" => URL."distregupdate/distributorentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Retailer",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distregupdate/editdistributor", "Update",$this->values, URL."distregupdate/showpost");
			
			
			
			$this->view->renderpage('distregupdate/distributorentry', false);
		}
		
		
		public function showpost(){
		$cus = $_POST['xrdin'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."distregupdate/distributorentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($cus);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Distributor", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distregupdate/editdistributor", "Update",$tblvalues);
			
			
			
			$this->view->renderpage('distregupdate/distributorentry');
		}
}