<?php
class Distjointemp extends Controller{
	
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
				if($menus["xsubmenu"]=="Prelaunch Placement")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distjointemp/js/codevalidator.js','views/distjointemp/js/bindt.js','views/distjointemp/js/rindt.js');
		
		$this->values = array(
			"upbin"=>"",
			"upname"=>"",
			"refbin"=>"",
			"refname"=>"",
			"leftbin"=>"",
			"rightbin"=>"",
			"xbintype"=>"Single",
			"side"=>"A",
			"xrdin"=>"",
			"rinname"=>""
			);
			
			$this->fields = array(array(
							"upbin-text"=>'Placement Bin*~star_maxlength="11"',
							"upname-text"=>'Upliner Name_readonly'
							),	
						array(
							"leftbin-text"=>'A BIN_readonly',
							"rightbin-text"=>'B BIN_readonly'
							),
						array(
							"refbin-text"=>'Reference Bin*~star_maxlength="11"',
							"refname-text"=>'Reference Name_readonly'
							),
						array(
							"xrdin-group_".URL."distregtemp/distributorpicklist"=>'Entry RIN*~star_maxlength="20"',
							"rinname-text"=>'Name_readonly'
							),
						array(
							"side-radio_A_B"=>'Team*~star_""',
							"xbintype-radio_Single_Turbo"=>'BIN Type'
							)
						);
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."distjointemp/joiningentry",
		);	
		
		
			
			$this->view->rendermainmenu('distjointemp/index');
			
		}
		
		public function savejoining(){
				/*if (empty($_POST['xrdin']) || empty($_POST['upbin']) || empty($_POST['upbc'])){
					header ('location: '.URL.'distjointemp/joiningentry');
					exit;
				}*/
		$cusauto =	Session::get('sbizcusauto');	
		//$prefix = $_POST['prefix'];
		
				$form = new Form();
				$data = array();
				$sucs=0;
				$success="";
				$result = ""; 
				try{
					
					$din = $this->model->getDistrislByDin($_POST['xrdin']);
					$bin = $this->model->getDistrislByBin($_POST['upbin']);
					$refbin = $this->model->getDistrislByBin($_POST['refbin']);
					$refdistrisl="";					
					//print_r($din); die;
					$binval = '0';
					if(Session::get('sbin')!=$_POST['upbin']){
						if(!$this->model->checkDownLine($_POST['upbin'], Session::get('sbin'))){
							throw new Exception("Only downline joining accepted!");
						}
					}
					
					if($_POST['refname']==""){
						throw new Exception("Reference Not Found!");
					}
					if(empty($bin)){
						throw new Exception("Upliner BIN Not Found!");
					}
					if(!empty($bin)){
						$binval = $bin[0]['distrisl'];
					}
					if(!empty($refbin)){
						$refdistrisl = $refbin[0]['distrisl'];
					}
					if(empty($refbin)){
						throw new Exception("No Reference Found!");
					}
					if(empty($din)){
						throw new Exception("Please First Register This Retailer!");
					}
					$bc = $this->model->getRow("mlmtree","distrisl",$din[0]["distrisl"],"bc");

					if($bc>3){
						throw new Exception("Maximum BIN exceeded!");
					}	
					
					if($_POST['leftbin']>0 && $_POST['side']=="A"){
						throw new Exception("Team A Full!");
					}	
					if($_POST['rightbin']>0 && $_POST['side']=="B"){
						throw new Exception("Team B Full!");
					}
					
					if($bin[0]['leftbin']>0 && $_POST['side']=="A"){
						throw new Exception("Team A Full!");
					}	
					if($bin[0]['rightbin']>0 && $_POST['side']=="B"){
						throw new Exception("Team B Full!");
					}
					
					
				$form	->post('upbin')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('refbin')
						->val('minlength', 1)
						->val('maxlength', 20)
				
						->post('xrdin')
						->val('minlength', 4)
						->val('maxlength', 160)
						
						->post('side');
						
						
						
				$form	->submit();
				
				$data = $form->fetch();
				
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['distrisl'] = $din[0]['distrisl'];
				$data['updistrisl'] = $binval;
				$data['upbc'] = $bin[0]['bc'];
				$data['refdistrisl'] = $refdistrisl;
				
				$data['bc'] = $bc;
				//print_r($data);die;				
				$success = $this->model->create($data, $_POST['xbintype']);
				
				if(empty($success))
					$sucs=0;
				else
					$sucs=1;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				
				
				if($sucs>0){
					$this->result = " BIN ".$success." Created Successfully";
					//$prnt=array("bin"=>$success,"distrisl"=>$din[0]['distrisl'],"side"=>$_POST['side']);
					//$this->model->updateParent($prnt, $_POST['upbin']);
				}
				if($sucs == 0 && empty($this->result))
					$this->result = "Failed to create BIN!";
				
				//echo $success.$this->result; die;
				 $this->showentry($success, $this->result);
				 
				 
				
		}
		
		
		public function showentry($bins, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."distjointemp/joiningentry"
		);
		
		//$tblvalues = $this->model->getSingleCustomer($cus);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Placement", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distjointemp/savejoining", "Save",$tblvalues );
			
			$this->view->table = $this->placementTable($bins);
			
			$this->view->renderpage('distjointemp/joiningentry');
		}
		
		function renderTable(){
			$fields = array(
						"bin-BIN",
						"xrdin-RIN",
						"xorg-Name",
						"bc-BC",
						"side-Team",
						"leftbin-A BIN",
						"leftrin-A RIN",
						"leftbinname-Name",
						"rightbin- B BIN",
						"rightrin-B RIN",
						"rightbinname-Name",
						"upbin-Up BIN",
						"uprin-Up RIN",
						"uplinername-Name",
						"upbc-Up BC"
						);
			$table = new Datatable();
			
			$row = $this->model->getTreeGeneology(Session::get('sbin'));
			//print_r($row); die;
			return $table->myTable($fields, $row, "bin");
			
			
		}
		
		function placementTable($bins){
			$fields = array(
						"bin-BIN",
						"xrdin-RIN",
						"xorg-Name",
						"bc-BC",
						"side-Team",
						"leftbin-A BIN",
						"leftrin-A RIN",
						"leftbinname-Name",
						"rightbin- B BIN",
						"rightrin-B RIN",
						"rightbinname-Name",
						"upbin-Up BIN",
						"uprin-Up RIN",
						"uplinername-Name",
						"upbc-Up BC"
						);
			$table = new Datatable();
			
			$row = $this->model->getTreePlacement($bins);
			//print_r($row); die;
			return $table->myTable($fields, $row, "bin");
			
			
		}
		
		function genealogylist(){
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('distjointemp/genealogylist', false);
		}
		
		function distributorpicklist(){
			$this->view->table = $this->customerPickTable();
			
			$this->view->renderpage('distreg/distributorpicklist', false);
		}
		
		
		function joiningentry(){
				
		$btn = array(
			"Clear" => URL."distjointemp/joiningentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Placement",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distjointemp/savejoining", "Save",$this->values);
			
			$this->view->table = "";
			
			$this->view->renderpage('distjointemp/joiningentry', false);
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
			"New" => URL."distjointemp/joiningentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($cus);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Retailer", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distjointemp/savejoining", "Save",$tblvalues);
			
			$this->view->table = "";
			
			$this->view->renderpage('distjointemp/joiningentry');
		}
		
		function bindt($bin){
			return $this->model->getBinDetail($bin);
		}
		
		function inforindt($rin){
			return $this->model->getInfoRinDetail($rin);
		}
		
}