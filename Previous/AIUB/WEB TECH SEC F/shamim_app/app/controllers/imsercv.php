<?php
class Imsercv extends Controller{
	
	private $values = array();
	private $fields = array();
	private $valuesdt = array();
	private $fieldsdt = array();
	
	
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
				if($menus["xsubmenu"]=="Inventory Receive")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
		
		$this->values = array(
				"prefix"=>"",
				"xdate"=>date("Y/m/d"),
				"ximsenum"=>"",
				"xsup"=>"",
				"xdocnum"=>"",
				"xbranch"=>"",
				"xitemcode"=>"",
				"xsl"=>"",
				"xitemdesc"=>"",
				"xcat"=>"",
				"xcolor"=>"",
				"xsize"=>"",
				"xbrand"=>"",
				"xqty"=>"0.00",
				"xuom"=>"",
				"xvatpct"=>"0.00",
				"xstdcost"=>"0.00",
				"xstdprice"=>"0.00",
				"xpoint"=>"0.00",
				"xspotcom"=>"0.00"
			);
			
		$this->fields = array(array(
				"prefix-select_IM Receive Prefix"=>'Prefix_maxlength="4"',
				"xdate-datepicker" => 'Date_""'
				),
				array(
				"ximsenum-group_".URL."imsercv/picklist"=>'IM Receive No_readonly',
				"xitemcode-text"=>'Item Code*~star_maxlength="20"'
				),
				array(
				"xsl-text"=>'Alternate Item Code_""',
				"xsup-select_Supplier"=>'Supplier_""'
				),
				array(
				"xdocnum-text"=>'Document No_""',
				"xbranch-select_Branch"=>'Branch_maxlength="50"'	
				),
				array(
				"xbrand-select_Item Brand"=>'Brand_maxlength="50"',
				"xcat-select_Item Category"=>'Category_maxlength="50"'
				)
				,
				array(
				"xitemdesc-text"=>'Item Description*~star_maxlength="250"',
				"xuom-select_UOM"=>'UOM*~star_maxlength="250" required'
				),
				array(
				"xcolor-select_Color"=>'Color_maxlength="50"',
				"xsize-select_Item Size"=>'Size_maxlength="50"'
				),
				array(
				"xqty-text_number"=>'Quantity*~star_number="true" minlength="1" maxlength="18" required',
				"xvatpct-text_number"=>'VAT (%)_number="true" minlength="1" maxlength="18" required'
				),
				array(
				"xstdprice-text_number"=>'Price*~star_number="true" minlength="1" maxlength="18" required',
				"xstdcost-text_number"=>'Cost*~star_number="true" minlength="1" maxlength="18" required'
				),
				array(
				"xpoint-text_number"=>'Point*~star_number="true" minlength="1" maxlength="5" required',
				"xspotcom-text_number"=>'Spot Com*~star_number="true" minlength="1" maxlength="18" required'
				)
			);

		
			
		$this->view->js = array('public/js/datatable.js',
		'views/imchkse/js/codevalidator.js','public/js/showpost.js');
		
		
		}
		
		public function index(){
			
			$btn = array(
			"Clear" => URL."imsercv/imseentry"
			);

			$dynamicform = new Dynamicform("Inventory Receive",$btn);

			$this->view->dynform = $dynamicform->createForm($this->fields, URL."imsercv/saveimsercv", "Save",$this->values,URL."imsercv/showpost");
			
			$this->view->rendermainmenu('imsercv/index');	
		}
		
		public function saveimsercv(){
			
			if(!isset($_POST['prefix'])){
				header ('location: '.URL.'imsetxn');
					exit;
			}
				//date formating for mysql
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date));
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				$prefix = $_POST['prefix'];	
				
				$keyfieldval = $_POST['ximsenum'];
				
				if(!isset($keyfieldval) || trim($keyfieldval)==''){
					
					$keyfieldval = $this->model->getKeyValue("imsetxn","ximsenum",$prefix,"6");
					
				}
				$row = $rownum = $this->model->getRow("imsetxn","ximsenum",$_POST['ximsenum'],"xrow");
				$itemcode = $_POST['xitemcode'];
				try{
					
				$form	->post('prefix')
				
						->post('xsup')
						->val('maxlength', 100)
						
						->post('xdocnum')
						->val('maxlength', 100)
						
						->post('xsl')
						
						
						->post('xbranch')
						->val('maxlength', 100)
						->val('minlength', 1)
						
						
						->post('xitemdesc')
						->val('maxlength', 150)
						
						->post('xcat')
						
						->post('xbrand')
						
						->post('xcolor')
						
						->post('xsize')
						
						->post('xpoint')
						
						->post('xspotcom')
						
						->post('xbranch')
						
						->post('xstdcost')
						->val('checkdouble')
						
						->post('xstdprice')
						->val('checkdouble')
						
						->post('xqty')
						->val('checkdouble')
						
						->post('xuom')
						
						
						->post('xvatpct')
						->val('checkdouble');
						
				
				$form	->submit();	
				
				$data = $form->fetch();
				
				$data['xwh'] = $_POST['xbranch'];
				$data['xdisc'] = 0;
				$data['xdate'] = $date; 
				$data['xrow'] = $row;
				$data['ximsenum'] = $keyfieldval;
				$data['xitemcode'] = $itemcode;
				$data['xtxntype'] = "Inventory Receive";
				$data['xyear'] = $year;
				$data['xper'] = $month;
				$data['xsign'] = "1";
				$data['xstatus'] = "Created";				
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				
				$success = $this->model->create($data);
				
				if(empty($success))
					$success=0;
				}catch(Exception $e){
					$this->result = $e->getMessage();
				}
				
				if($success>0)
					$this->result = " Item added to inventory success!";
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to add inventory!";
				
				$this->values = array(
				"prefix"=>"",
				"xdate"=>$date,
				"ximsenum"=>$keyfieldval,
				"xsup"=>$_POST['xsup'],
				"xdocnum"=>$_POST['xdocnum'],
				"xbranch"=>$_POST['xbranch'],
				"xitemcode"=>$itemcode,
				"xsl"=>$_POST['xsl'],
				"xitemdesc"=>$_POST['xitemdesc'],
				"xcat"=>$_POST['xcat'],
				"xcolor"=>$_POST['xcolor'],
				"xsize"=>$_POST['xsize'],
				"xbrand"=>$_POST['xbrand'],
				"xqty"=>$_POST['xqty'],
				"xuom"=>$_POST['xuom'],
				"xvatpct"=>$_POST['xvatpct'],
				"xstdcost"=>$_POST['xstdcost'],
				"xstdprice"=>$_POST['xstdprice'],
				"xpoint"=>$_POST['xpoint'],
				"xspotcom"=>$_POST['xspotcom']
				);
				
				 $this->showentrydata($keyfieldval, $this->values, $this->result);
		}
		
		public function editsingle($imsenum, $xitemcode){
			$this->showentry($imsenum, $xitemcode);
			
		}
		
		public function deletesingle($imsenum, $itemcode){
			$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximsenum = '". $imsenum."' and xitemcode = '". $itemcode."' and xtxntype='Inventory Receive'";
			$this->model->delete($where);
			$this->showentry($imsenum, $itemcode);
		}
		
		public function editimsercv(){
			
			if(!isset($_POST['ximsenum']) && !isset($_POST['xitemcode'])){
				header ('location: '.URL.'imsercv');
					exit;
			}
			
			$txnnum = $_POST['ximsenum'];
			$xitemcode = $_POST['xitemcode'];
			
				//date formating for mysql
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date));
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				
				
				try{
					
				$form	->post('xsup')
						->val('maxlength', 100)
						
						->post('xdocnum')
						->val('maxlength', 100)
						
						->post('xsl')
						
						
						->post('xbranch')
						->val('maxlength', 100)
						->val('minlength', 1)
						
												
						->post('xitemdesc')
						->val('maxlength', 150)
						
						->post('xcat')
						
						->post('xbrand')
						
						->post('xcolor')
						
						->post('xsize')
						
						
						->post('xbranch')
						
						->post('xstdcost')
						->val('checkdouble')
						
						->post('xstdprice')
						->val('checkdouble')
						
						->post('xqty')
						->val('checkdouble')
						
						->post('xuom')
											
						
						->post('xvatpct')
						->val('checkdouble');
				
				$form	->submit();	
				
				$data = $form->fetch();		
				
				$data['xwh'] = $_POST['xbranch'];
				$data['xdate'] = $date; 
				$data['xitemcode'] = $xitemcode; 
				$data['xtxntype'] = "Inventory Receive";
				$data['xyear'] = $year;
				$data['xper'] = $month;			
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				
				$success = $this->model->edit($data, $txnnum, $xitemcode);
				
				if(empty($success))
					$success=0;
				}catch(Exception $e){
					$this->result = $e->getMessage();
				}
				
				if($success>0)
					$this->result = "Edited successful";
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to edit!";
				
				$this->values = array(
				"prefix"=>"",
				"xdate"=>$date,
				"ximsenum"=>$_POST['ximsenum'],
				"xsup"=>$_POST['xsup'],
				"xdocnum"=>$_POST['xdocnum'],
				"xbranch"=>$_POST['xbranch'],
				"xitemcode"=>$_POST['xitemcode'],
				"xsl"=>$_POST['xsl'],
				"xitemdesc"=>$_POST['xitemdesc'],
				"xcat"=>$_POST['xcat'],
				"xcolor"=>$_POST['xcolor'],
				"xsize"=>$_POST['xsize'],
				"xbrand"=>$_POST['xbrand'],
				"xqty"=>$_POST['xqty'],
				"xuom"=>$_POST['xuom'],
				"xvatpct"=>$_POST['xvatpct'],
				"xstdcost"=>$_POST['xstdcost'],
				"xstdprice"=>$_POST['xstdprice'],
				"xpoint"=>$_POST['xpoint'],
				"xspotcom"=>$_POST['xspotcom']
				);
				
				 $this->showentrydata($txnnum, $this->values, $this->result);
		}
		
		public function showentrydata($imsenum, $formvalues, $result=""){
		
			$btn = array(
			"Clear" => URL."imsercv/imseentry"
			);
			
			$dynamicForm = new Dynamicform("Inventory Receive", $btn, $result);		
			
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imsercv/saveimsercv", "Save",$formvalues ,URL."imsercv/showpost");
			
			$this->view->table = $this->renderTable($imsenum);
			
			$this->view->renderpage('imsercv/imseentry');
		}
		
		public function showentry($imsenum, $itemcode="", $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."imsercv/imseentry"
		);
		
		$tblgetvalues = $this->model->getSingleRecord($imsenum, $itemcode);
		
		if(empty($tblgetvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblgetvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Inventory Receive", $btn, $result);		
			
			if(empty($tblgetvalues)){
				$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imsercv/saveimsercv", "Save",$tblvalues ,URL."imsercv/showpost");
			}else{
				$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imsercv/editimsercv", "Edit",$tblvalues ,URL."imsercv/showpost");
			}
			$this->view->table = $this->renderTable($imsenum);
			
			$this->view->renderpage('imsercv/imseentry');
		}
		function renderTable($imsenum){
			$fields = array(
						"imsenum-IM Receive No",
						"xrow-Row",
						"xdate-Date",
						"xitemcode-Item Code",
						"xsl-Serial",
						"xitemdesc-Item Description",
						"xqty-Quantity",
						"xstdcost-Cost",
						"xwh-Warehouse",
						"xbranch-Branch"
						);
			$table = new Datatable();
			$row = $this->model->getImSeReceive($imsenum);
			//print_r($row); die;
			return $table->myTableExt($fields, $row, array("ximsenum", "xitemcode"), URL."imsercv/editsingle/", URL."imsercv/deletesingle/");
			
			
		}
		
		function picklist(){
			$this->view->table = $this->imchksePickTable();
			
			$this->view->renderpage('imsercv/picklist', false);
		}
		
		function imchksePickTable(){
			$fields = array(
						"ximsenum-IM Receive No",
						"xdate-Date",
						"xsup-Supplier"
						);
			$table = new Datatable();
			$row = $this->model->getImseByLimit();
			
			return $table->picklistTable($fields, $row, "ximsenum");
		}
		
		function imseentry(){
			
		$btn = array(
			"Clear" => URL."imsercv/imseentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Inventory Receive", $btn);		
			
			if(empty($tblgetvalues)){
				$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imsercv/saveimsercv", "Save",$this->values ,URL."imsercv/showpost");
			}else{
				$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imsercv/editimsercv", "Edit",$this->values ,URL."imsercv/showpost");
			}
			
			$this->view->table = "";
						
			$this->view->renderpage('imsercv/imseentry');
		}
		
		public function showpost(){
			
		$imsenum = $_POST['ximsenum'];
		$itemcode = $_POST['xitemcode'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."imsercv/imseentry"
		);
		
		$tblgetvalues = $this->model->getSingleRecord($imsenum, $itemcode);
		//print_r($tblgetvalues);die;
		if(empty($tblgetvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblgetvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Inventory Receive", $btn);		
			
			
			if(empty($tblgetvalues)){
				$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imsercv/saveimsercv", "Save",$tblvalues ,URL."imsercv/showpost");
			}else{
				$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imsercv/editimsercv", "Edit",$tblvalues ,URL."imsercv/showpost");
			}
			
			$this->view->table = $this->renderTable($imsenum);
						
			$this->view->renderpage('imsercv/imseentry');
		}
		
		public function itemreceive(){
			
			
		}
		
		function imsercvlist(){
						
			$this->view->table = $this->renderItemReceive();
			
			$this->view->renderpage('imsercv/imsercvlist');	
		}
		
		function renderItemReceive($branch=""){
			$fields = array(
						"ximsenum-Receive No",
						"xdate-date",
						"xitemcode-Item Code",
						"xsl-Serial",
						"xitemdesc-Item Description",
						"xsup-Supplier",
						"xwh-Warehouse",
						"xbranch-Branch",
						"xstdcost-Cost",
						"xqty-Quantity"
						);
			$table = new Datatable();
			$row = $this->model->getItemReceiveList($branch);
			//print_r($row); die;
			return $table->createTable($fields, $row, "xitemcode");
			
			
		}
		
}