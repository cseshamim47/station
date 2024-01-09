<?php
class Imsetor extends Controller{
	
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
				if($menus["xsubmenu"]=="Inventory Transfer")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
		
		$this->values = array(
				"prefix"=>"",
				"xdate"=>date("Y/m/d"),
				"ximsenum"=>"",
				"xbranch"=>"",
				"xtorbranch"=>"",
				"xitemcode"=>"",
				"xqty"=>"0.00",
				"xrow"=>"0"
			);
			
		$this->fields = array(array(
				"prefix-select_IM Transfer Prefix"=>'Prefix_maxlength="4"'
				),
				array(
				"ximsenum-group_".URL."imsetor/picklist"=>'IM Transfer No_readonly',
				"xdate-datepicker" => 'Date_""'
				),
				array(
				"xbranch-select_Branch"=>'From Warehouse*~star_maxlength="50"',
				"xtorbranch-text"=>'To Warehouse*~star_maxlength="50"'	
				),
				array(
				"xitemcode-group_".URL."imstock/picklist"=>'Item Code_""',
				"xqty-text_number"=>'Quantity_number="true" minlength="1" maxlength="18" required',
				"xrow-hidden"=>'_number="true" minlength="1"'
				)				
			);

		
			
		$this->view->js = array('public/js/datatable.js',
		'views/imchkse/js/codevalidator.js','public/js/showpost.js');
		
		
		}
		
		public function index(){
			
			$btn = array(
			"Clear" => URL."imsetor/imseentry"
			);

			$dynamicform = new Dynamicform("Inventory Transfer",$btn);

			$this->view->dynform = $dynamicform->createForm($this->fields, URL."imsetor/saveimsetor", "Save",$this->values,URL."imsetor/showpost");
			
			$this->view->rendermainmenu('imsetor/index');	
		}
		
		public function saveimsetor(){
			
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
				
				$nextrow = $row+1;
				$itemcode = $_POST['xitemcode'];
				$checkimBalance = $this->model->checkIMBalance($itemcode, $_POST['xbranch'], $_POST['xqty']);
				$itemdetail = $this->model->getItemDetail("xitemcode", $itemcode);
				
				
				try{
					if(empty($itemdetail)){
						throw new Exception("No Item found");
					}
					
					if($checkimBalance==0){
						throw new Exception("Not enough stock");
					}
				
				$form	->post('prefix')
				
						->post('xbranch')
						->val('maxlength', 100)
						->val('minlength', 1)
						
											
						->post('xtorbranch')
						->val('maxlength', 100)
						->val('minlength', 1)
						
												
						->post('xitemcode')
						->val('minlength', 1)
						
						->post('xqty')
						->val('checkdouble')
						->val('minlength', 1);
				
				$form	->submit();	
				
				$data = $form->fetch();		
				
								
				$cols = "`xprefix`,`bizid`,`ximsenum`,`xrow`,`xitemcode`,`xitemdesc`,`xcat`,`xbrand`,`xcolor`,`xsize`,
				`xsl`,`xsup`,`xsupdt`,`xwh`,`xtorwh`,`xbranch`,`xtorbranch`,`zemail`,`xstdcost`,`xstdprice`,`xqty`,
				`xuom`,`xdisc`,`xvatpct`,`xtxntype`,`xdocument`,`xdocumentrow`,`xstatus`,`xsign`,`xdate`,`xyear`,`xper`";
				
				$vals = "('". $data['prefix'] ."'," . Session::get('sbizid') . ",'". $keyfieldval ."','". $row ."',
				'". $itemdetail[0]['xitemcode'] ."','". $itemdetail[0]['xitemdesc'] ."','". $itemdetail[0]['xcat'] ."',
				'". $itemdetail[0]['xbrand'] ."','". $itemdetail[0]['xcolor'] ."','". $itemdetail[0]['xsize'] ."',
				'". $itemdetail[0]['xsl'] ."','". $itemdetail[0]['xsup'] ."','". $itemdetail[0]['xsupdt'] ."',
				'". $data['xbranch'] ."','". $data['xtorbranch'] ."','". $data['xbranch'] ."','". $data['xtorbranch'] ."',
				'". Session::get('suser') ."','". $itemdetail[0]['xstdcost'] ."','". $itemdetail[0]['xstdprice'] ."',
				'". $data['xqty'] ."','". $itemdetail[0]['xuom'] ."','". $itemdetail[0]['xdisc'] ."',
				'". $itemdetail[0]['xvatpct'] ."','Inventory Transfer','". $keyfieldval ."','". $row ."','Created','-1','". $date ."','". $year ."','". $month ."'),
				('". $data['prefix'] ."'," . Session::get('sbizid') . ",'". $keyfieldval ."','". $nextrow ."',
				'". $itemdetail[0]['xitemcode'] ."','". $itemdetail[0]['xitemdesc'] ."','". $itemdetail[0]['xcat'] ."',
				'". $itemdetail[0]['xbrand'] ."','". $itemdetail[0]['xcolor'] ."','". $itemdetail[0]['xsize'] ."',
				'". $itemdetail[0]['xsl'] ."','". $itemdetail[0]['xsup'] ."','". $itemdetail[0]['xsupdt'] ."',
				'". $data['xtorbranch'] ."','". $data['xbranch'] ."','". $data['xtorbranch'] ."','". $data['xbranch'] ."',
				'". Session::get('suser') ."','". $itemdetail[0]['xstdcost'] ."','". $itemdetail[0]['xstdprice'] ."',
				'". $data['xqty'] ."','". $itemdetail[0]['xuom'] ."','". $itemdetail[0]['xdisc'] ."',
				'". $itemdetail[0]['xvatpct'] ."','Transfer Receive','". $keyfieldval ."','". $row ."','Created','1','". $date ."','". $year ."','". $month ."')";
				
				$success = $this->model->create($cols, $vals);
				
				
				
				if(empty($success))
					$success=0;
				
				}catch(Exception $e){
					$this->result = $e->getMessage();
				}
				
				if($success>0)
					$this->result = " Inventory transfer success!";
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to transfer inventory!";
				
				$this->values = array(
				"prefix"=>"",
				"xdate"=>$date,
				"ximsenum"=>$keyfieldval,
				"xbranch"=>$_POST['xbranch'],
				"xtorbranch"=>$_POST['xtorbranch'],
				"xitemcode"=>$_POST['xitemcode'],
				"xqty"=>$_POST['xqty'],
				"xrow"=>$_POST['xrow']
				);
				
				 $this->showentrypost($keyfieldval, $this->values, $this->result);
		}
		
		
		
		public function showentrypost($imsenum, $thisvalue, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."imsetor/imseentry"
		);
		
				
			$dynamicForm = new Dynamicform("Inventory Transfer", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imsetor/saveimsetor", "Save",$thisvalue ,URL."imsetor/showpost");
			
			$this->view->table = $this->renderTable($imsenum);
			
			$this->view->renderpage('imsetor/imsetorentry');
		}
		
		public function showentry($imsenum, $row="", $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."imsetor/imseentry"
		);
		
		$tblgetvalues = $this->model->getSingleRecord($imsenum, $row);
		
		if(empty($tblgetvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblgetvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Inventory Transfer", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imsetor/editimsetor", "Update",$tblvalues ,URL."imsetor/showpost");
			
			$this->view->table = $this->renderTable($imsenum);
			
			$this->view->renderpage('imsetor/imsetorentry');
		}
		
		public function editsingle($imsenum, $xrow){
			$this->showentry($imsenum, $xrow);
			
		}
		
		public function deletesingle($imsenum, $xrow){
			$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximsenum = '". $imsenum."' and xdocumentrow = '". $xrow."' and xtxntype in ('Inventory Transfer', 'Transfer Receive')";
			$this->model->delete($where);
			$this->showentry($imsenum, $xrow);
		}
		
		public function editimsetor(){
			
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
				
				$row=$_POST['xrow'];
				
				
				if(!isset($keyfieldval) || trim($keyfieldval)==''){
					$keyfieldval = $this->model->getKeyValue("imsetxn","ximsenum",$prefix,"6");
					
				}
				if($row==0 || $row=="")
					$row = $rownum = $this->model->getRow("imsetxn","ximsenum",$_POST['ximsenum'],"xrow");
				$nextrow = $row + 1;
				
				$itemcode = $_POST['xitemcode'];
				$checkimBalance = $this->model->checkIMBalance($itemcode, $_POST['xbranch'], $_POST['xqty']);
				$itemdetail = $this->model->getItemDetail("xitemcode", $itemcode);
				
				
				try{
					if(empty($itemdetail)){
						throw new Exception("No Item found");
					}
					
					if($checkimBalance==0){
						throw new Exception("Not enough stock");
					}
				
				$form	->post('prefix')
				
						->post('xbranch')
						->val('maxlength', 100)
						->val('minlength', 1)
						
											
						->post('xtorbranch')
						->val('maxlength', 100)
						->val('minlength', 1)
						
												
						->post('xitemcode')
						->val('minlength', 1)
						
						->post('xqty')
						->val('checkdouble')
						->val('minlength', 1);
				
				$form	->submit();	
				
				$data = $form->fetch();		
				
								
				$cols = "`xprefix`,`bizid`,`ximsenum`,`xrow`,`xitemcode`,`xitemdesc`,`xcat`,`xbrand`,`xcolor`,`xsize`,
				`xsl`,`xsup`,`xsupdt`,`xwh`,`xtorwh`,`xbranch`,`xtorbranch`,`zemail`,`xstdcost`,`xstdprice`,`xqty`,
				`xuom`,`xdisc`,`xvatpct`,`xtxntype`,`xdocument`,`xdocumentrow`,`xstatus`,`xsign`,`xdate`,`xyear`,`xper`";
				
				$vals = "('". $data['prefix'] ."'," . Session::get('sbizid') . ",'". $keyfieldval ."','". $row ."',
				'". $itemdetail[0]['xitemcode'] ."','". $itemdetail[0]['xitemdesc'] ."','". $itemdetail[0]['xcat'] ."',
				'". $itemdetail[0]['xbrand'] ."','". $itemdetail[0]['xcolor'] ."','". $itemdetail[0]['xsize'] ."',
				'". $itemdetail[0]['xsl'] ."','". $itemdetail[0]['xsup'] ."','". $itemdetail[0]['xsupdt'] ."',
				'". $data['xbranch'] ."','". $data['xtorbranch'] ."','". $data['xbranch'] ."','". $data['xtorbranch'] ."',
				'". Session::get('suser') ."','". $itemdetail[0]['xstdcost'] ."','". $itemdetail[0]['xstdprice'] ."',
				'". $data['xqty'] ."','". $itemdetail[0]['xuom'] ."','". $itemdetail[0]['xdisc'] ."',
				'". $itemdetail[0]['xvatpct'] ."','Inventory Transfer','". $keyfieldval ."','". $row ."','Created','-1','". $date ."','". $year ."','". $month ."'),
				('". $data['prefix'] ."'," . Session::get('sbizid') . ",'". $keyfieldval ."','". $nextrow ."',
				'". $itemdetail[0]['xitemcode'] ."','". $itemdetail[0]['xitemdesc'] ."','". $itemdetail[0]['xcat'] ."',
				'". $itemdetail[0]['xbrand'] ."','". $itemdetail[0]['xcolor'] ."','". $itemdetail[0]['xsize'] ."',
				'". $itemdetail[0]['xsl'] ."','". $itemdetail[0]['xsup'] ."','". $itemdetail[0]['xsupdt'] ."',
				'". $data['xtorbranch'] ."','". $data['xbranch'] ."','". $data['xtorbranch'] ."','". $data['xbranch'] ."',
				'". Session::get('suser') ."','". $itemdetail[0]['xstdcost'] ."','". $itemdetail[0]['xstdprice'] ."',
				'". $data['xqty'] ."','". $itemdetail[0]['xuom'] ."','". $itemdetail[0]['xdisc'] ."',
				'". $itemdetail[0]['xvatpct'] ."','Transfer Receive','". $keyfieldval ."','". $row ."','Created','1','". $date ."','". $year ."','". $month ."')";
				
				$onduplicateupdt = " ON DUPLICATE KEY UPDATE
						xitemcode=VALUES(xitemcode), xitemdesc=VALUES(xitemdesc), xcat=VALUES(xcat), xbrand=VALUES(xbrand), 
						xcolor=VALUES(xcolor), xsize=VALUES(xsize), xsl=VALUES(xsl), xsup=VALUES(xsup), xsupdt=VALUES(xsupdt), 
						xcat=VALUES(xcat), xwh=VALUES(xwh),xtorwh=VALUES(xtorwh),xbranch=VALUES(xbranch),
						xtorbranch=VALUES(xtorbranch), xstdcost=VALUES(xstdcost), xstdprice=VALUES(xstdprice),
						xqty=VALUES(xqty), xuom=VALUES(xuom), xdisc=VALUES(xdisc), xvatpct=VALUES(xvatpct),
						xyear=VALUES(xyear),xper=VALUES(xper)";
				$success = $this->model->create($cols, $vals, $onduplicateupdt);
				
				
				
				if(empty($success))
					$success=0;
				
				}catch(Exception $e){
					$this->result = $e->getMessage();
				}
				
				if($success>0)
					$this->result = " Transfer updated success!";
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to update!";
				
				$this->values = array(
				"prefix"=>"",
				"xdate"=>$date,
				"ximsenum"=>$keyfieldval,
				"xbranch"=>$_POST['xbranch'],
				"xtorbranch"=>$_POST['xtorbranch'],
				"xitemcode"=>$_POST['xitemcode'],
				"xqty"=>$_POST['xqty'],
				"xrow"=>$_POST['xrow']
				);
				
				 $this->showentrypost($keyfieldval, $this->values, $this->result);
		}
		
		
		function renderTable($imsenum){
			$fields = array(
						"imsenum-IM Receive No",
						"xrow-Row",
						"xdate-Date",
						"xitemcode-Item Code",
						"xsl-Serial",
						"xitemdesc-Item Description",
						"xbranch-Branch",
						"xtorbranch-To Branch",
						"xqty-Quantity"
						);
			$table = new Datatable();
			$row = $this->model->getImTransfer($imsenum);
			//print_r($row); die;
			return $table->myTableExt($fields, $row, array("ximsenum", "xrow"), URL."imsetor/editsingle/", URL."imsetor/deletesingle/");
			
			
		}
		
		function picklist(){
			$this->view->table = $this->imtorPickTable();
			
			$this->view->renderpage('imsetor/picklist', false);
		}
		
		function imtorPickTable(){
			$fields = array(
						"ximsenum-IM Transfer No",
						"xdate-Date",
						"xsup-Supplier",
						"xbranch-From Branch",
						"xtorbranch-To Branch"
						);
			$table = new Datatable();
			$row = $this->model->getImtorByLimit();
			
			return $table->picklistTable($fields, $row, "ximsenum");
		}
		
		function imseentry(){
			
		$btn = array(
			"Clear" => URL."imsetor/imseentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Inventory Transfer", $btn);		
			
			if(empty($tblgetvalues)){
				$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imsetor/saveimsetor", "Save",$this->values ,URL."imsetor/showpost");
			}else{
				$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imsetor/editimsetor", "Edit",$this->values ,URL."imsetor/showpost");
			}
			
			$this->view->table = "";
						
			$this->view->renderpage('imsetor/imsetorentry');
		}
		
		public function showpost(){
			
		$imsenum = $_POST['ximsenum'];
		$xrow = $_POST['xrow'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."imsetor/imseentry"
		);
		
		$tblgetvalues = $this->model->getSingleRecord($imsenum, $xrow);
		//print_r($tblgetvalues);die;
		if(empty($tblgetvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblgetvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Inventory Transfer", $btn);		
			
			
			if(empty($tblgetvalues)){
				$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imsetor/saveimsetor", "Save",$tblvalues ,URL."imsetor/showpost");
			}else{
				$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imsetor/editimsetor", "Edit",$tblvalues ,URL."imsetor/showpost");
			}
			
			$this->view->table = $this->renderTable($imsenum);
						
			$this->view->renderpage('imsetor/imsetorentry');
		}
		
		function imsetorlist(){
			/*
			$this->values = array(
				
				"xfdate"=>date("Y/m/d"),
				"xtdate"=>date("Y/m/d")
				
			);
			
		$this->fields = array(
				array(
				"xfdate-datepicker" => 'From Date_""',
				"xtdate-datepicker" => 'To Date_""'
				),			
			);*/
			
			//$this->view->table = $this->torTable();
			
			//$this->view->renderpage('customers/customerlist', false);
		}
		
		function torTable(){
			/*
			$fields = array(
						"ximsenum-IM Transfer No",
						"xdate-Date",
						"xsup-Supplier",
						"xbranch-From Branch",
						"xtorbranch-To Branch",
						"xitemcode-Item Code",
						"xsl-Serial",
						"xitemdesc-Item Description",
						"xqty-Quantity"
						);
			
			$table = new Datatable();
			$row = $this->model->getCustomersByLimit();
			
			return $table->createTable($fields, $row, "xcus", URL."customers/showcustomer/", URL."customers/deletecustomer/");*/
		}
}