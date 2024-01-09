<?php
class Distjoin extends Controller{
	
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
				if($menus["xsubmenu"]=="6 Placement")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distjoin/js/codevalidator.js','views/distjoin/js/bindt.js');
		
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
			"rinname"=>"",
			"xpoint"=>"0",
			"xrintype"=>"Regular"
			);
			
			$this->fields = array(array(
							"xrdin-group_".URL."distreg/distributorpicklist"=>'Entry RIN*~star_maxlength="20"',
							"rinname-text"=>'Name_readonly'
							),
						array(
							"xpoint-text"=>'Point*~star_maxlength="10" readonly',
							"xrintype-radio_Primary_Regular"=>'RIN Type'
							),array(
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
							"side-radio_A_B"=>'Team*~star_""',
							"xbintype-radio_Single_Turbo_S Turbo"=>'BIN Type'
							)
						);
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."distjoin/joiningentry",
		);	
		
		
		
			$this->view->rendermainmenu('distjoin/index');
			
		}
		
		public function savejoining(){
				/*if (empty($_POST['xrdin']) || empty($_POST['upbin']) || empty($_POST['upbc'])){
					header ('location: '.URL.'distjoin/joiningentry');
					exit;
				}*/
		$cusauto =	Session::get('sbizcusauto');	
		//$prefix = $_POST['prefix'];
				$stno = $this->model->getStatementNo();
				$form = new Form();
				$data = array();
				$sucs=0;
				$success="";
				$result = ""; 
				try{
					
					$din = $this->model->getDistrislByDin($_POST['xrdin']);
					$bin = $this->model->getDistrislByBin($_POST['upbin']);
					$refbin = $this->model->getDistrislByBin($_POST['refbin']);
					$point = $this->model->getPoint($din[0]['xcus']);
					$binpoint = 0;
					$refdistrisl="";					
					//print_r($din); die;
					$binval = '0';
					if(Session::get('sbin')!=$_POST['upbin']){
						if(!$this->model->checkDownLine($_POST['upbin'], Session::get('sbin'))){
							throw new Exception("Only downline joining accepted!");
						}
					}
					if($stno==0){
						throw new Exception("Satement not started yet! Please wait...");
					}
					if($point==0 || $point<100 || $point==""){
						throw new Exception("No point to placement");
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

					/*if($bc>15){
						throw new Exception("Maximum BIN exceeded!");
					}	*/
					
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
					if($din[0]['xcus']=="" || empty($din[0]['xcus'])){
						throw new Exception("CIN Not Registered!");
					}
					if($_POST['xrintype']=="" || empty($_POST['xrintype'])){
						throw new Exception("CIN Not Registered!");
					}
					
					switch($_POST['xrintype']){
						
						case "Primary":
							if($_POST['xbintype']=="Single"){
								if($point<100){
									throw new Exception("100 Points required for placement!");
								}else{
									$binpoint=100;
								}
							}
							if($_POST['xbintype']=="Turbo"){
								if($point<300){
									throw new Exception("300 Points required for placement!");
								}else{
									$binpoint=100;
								}
							}
							if($_POST['xbintype']=="S Turbo"){
								if($point<700){
									throw new Exception("700 Points required for placement!");
								}else{
									$binpoint=100;
								}
							}							
							break;
						case "Regular":
							if($_POST['xbintype']=="Single"){
								if($point<500){
									throw new Exception("500 Points required for placement!");
								}else{
									$binpoint=500;
								}
							}
							if($_POST['xbintype']=="Turbo"){
								if($point<1500){
									throw new Exception("1500 Points required for placement!");
								}else{
									$binpoint=500;
								}
							}
							if($_POST['xbintype']=="S Turbo"){
								if($point<3500){
									throw new Exception("3500 Points required for placement!");
								}else{
									$binpoint=500;
								}
							}	
							break;	
						
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
				$data['newentry'] = 1;
				$data['binstatus'] = $_POST['xrintype'];
				$data['xcus'] = $din[0]['xcus'];
				$data['xpoint'] = $binpoint;
				$data['binpoint'] = $binpoint;
				$data['refdistrisl'] = $refdistrisl;
				$data['stno'] = $stno;
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
			"Clear" => URL."distjoin/joiningentry"
		);
		
		//$tblvalues = $this->model->getSingleCustomer($cus);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Placement", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distjoin/savejoining", "Save",$tblvalues,URL."distjoin/showpost");
			
			$this->view->table = $this->placementTable($bins);
			
			$this->view->renderpage('distjoin/joiningentry');
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
			
			$this->view->renderpage('distjoin/genealogylist', false);
		}
		
		function distributorpicklist(){
			$this->view->table = $this->customerPickTable();
			
			$this->view->renderpage('distreg/distributorpicklist', false);
		}
		
		
		function joiningentry(){
				
		$btn = array(
			"Clear" => URL."distjoin/joiningentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Placement",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distjoin/savejoining", "Save",$this->values,URL."distjoin/showpost");
			
			$this->view->table = "";
			
			$this->view->renderpage('distjoin/joiningentry', false);
		}
		
		public function deletecustomer($cus){
			$where = "bizid=".Session::get('sbizid')." and xrdin='".$cus."'";
			$this->model->delete($where);
			$this->view->message = "";
			$this->customerlist();
		}
		
		public function showpost(){
			if (empty($_POST['xrdin'])){
					header ('location: '.URL.'distjoin/joiningentry');
					exit;
				}
			$cus = $_POST['xrdin'];
			
		
		$btn = array(
			"New" => URL."distjoin/joiningentry"
		);
		
		$tblvalues = $this->model->getDistrislByDin($cus);
		$point=0;
		if(count($tblvalues)>0)
			$point = $this->model->getPoint($tblvalues[0]['xcus']);
		$vals=array();
		if(empty($tblvalues))
			$vals=array(
						"upbin"=>"",
						"upname"=>"",
						"refbin"=>"",
						"refname"=>"",
						"leftbin"=>"",
						"rightbin"=>"",
						"xbintype"=>"Single",
						"side"=>"A",
						"xrdin"=>"",
						"rinname"=>"",
						"xpoint"=>"0",
						"xrintype"=>"Regular"						
						);
		else
			$vals=array(
						"upbin"=>"",
						"upname"=>"",
						"refbin"=>"",
						"refname"=>"",
						"leftbin"=>"",
						"rightbin"=>"",
						"xbintype"=>"Single",
						"side"=>"A",
						"xrdin"=>$tblvalues[0]['xrdin'],
						"rinname"=>$tblvalues[0]['xorg'],
						"xpoint"=>round($point,2),
						"xrintype"=>"Regular"
						);
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Retailer", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distjoin/savejoining", "Save",$vals,URL."distjoin/showpost");
			
			$this->view->table = "";
			
			$this->view->renderpage('distjoin/joiningentry');
		}
		
		function bindt($bin){
			return $this->model->getBinDetail($bin);
		}
		
		function inforindt($rin){
			return $this->model->getInfoRinDetail($rin);
		}
		
}