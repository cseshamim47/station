<?php

class Posreturn extends Controller{
	
	private $values = array();
	private $fields = array();
	private $valuesdt = array();
	private $fieldsdt = array();
	private $branch="";
	
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
				if($menus["xsubmenu"]=="POS Entry")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
		
		$this->branch = Session::get('sbranch');
		$dt = date("Y/m/d");
		//echo $dt; die;
		$this->values = array(
				"xdate"=>$dt,
				"ximsenum"=>"",
				"xreturnimsenum"=>"",
				"xitemcode"=>"",
				"xitemdesc"=>"",
				"xqty"=>"0.00",
				"xrow"=>"0"
			);
			
		$this->fields = array(array(
				"ximsenum-group_".URL."posreturn/picklist"=>'Return No_readonly',
				"xdate-datepicker" => 'Date_""'
				),
				array(
				"xreturnimsenum-text"=>'Invoice No_""',
				"xitemcode-group_".URL."imstock/picklist"=>'Item Code_""'
				),
				array(
				"xitemdesc-text"=>'Description_""',
				"xqty-text_number"=>'Quantity_number="true" minlength="1" maxlength="18" required',
				"xrow-hidden"=>'_number="true" minlength="1"'
				),
			);

		
			
		$this->view->js = array('public/js/datatable.js',
		'views/posentry/js/codevalidator.js','views/posentry/js/getitemdt.js','public/js/showpost.js');
		
		
		}
		
		public function index(){
			
			//phpinfo();
			$this->view->rendermainmenu('posreturn/index');	
		}
		
		public function savereturn(){
			
			if(!isset($_POST['xitemcode']) && !isset($_POST['xitemdesc']) && !isset($_POST['xqty'])){
				header ('location: '.URL.'posreturn');
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
				$prefix = Session::get('suserrow');
				//gets is inventory checks, if Yes it will check else not	
				$chkinv= Session::get('schkinv');	
				
				$keyfieldval = $_POST['ximsenum'];
				
					
				
				if(!isset($keyfieldval) || trim($keyfieldval)==''){
					$keyfieldval = $this->model->getKeyValue("imsetxn","ximsenum",$prefix,"6");
					
				}
				//echo $keyfieldval;die;
				$row = $this->model->getRow("imsetxn","ximsenum",$_POST['ximsenum'],"xrow");
				
				
				//checks was the item sold?
				$chkitem = $this->model->checkItemInvoice($_POST['xreturnimsenum'],$_POST['xitemcode']);
				
				
				//checks was the item returned?
				$chkinvitem = $this->model->checkReturn("imsetxn",array("sum"=>array("xqty*xsign_xqty"))," where xrecflag='Live' and xtxntype in ('Sales', 'Sales Return') and xdocument='". $_POST['xreturnimsenum'] ."' and xitemcode='". $_POST['xitemcode'] ."'");
				
				$nextrow = $row + 1;
				
				$itemcode = $_POST['xitemcode'];
				
				$itemdetail = $this->model->getItemDetail("xitemcode", $itemcode);
				
				
				try{
					
										
					if($chkinvitem[0]['xqty']>=0)
						throw new Exception("Can not return. No quantity left to return!");
					
					$balqty = abs($chkinvitem[0]['xqty']);
					
					if($balqty<$_POST['xqty'])
						throw new Exception("You cannot return more than available quantity of this invoice!");
					
					
					if($chkinvitem[0]['xqty']>=0)
						throw new Exception("Can not return. No quantity left to return!");
					
															
					if(empty($itemdetail)){
						throw new Exception("Item not found!");
					}
				
				
				$form	->post('xitemcode')
						->val('maxlength', 100)
				
																		
						->post('xitemdesc')
						->val('minlength', 1)
						
						->post('xreturnimsenum')
						->val('minlength', 1)
						
						->post('xqty')
						->val('checkdouble')
						->val('minlength', 1);
						
				$form	->submit();	
				
				$data = $form->fetch();		
				
				$vals ="";
				//echo $chkinv; die;
				
				
				$cols = "`xprefix`,`bizid`,`ximsenum`,`xrow`,`xitemcode`,`xitemdesc`,`xcat`,`xbrand`,`xcolor`,`xsize`,
				`xsl`,`xsup`,`xsupdt`,`xcus`,`xcusdt`,`xwh`,`xbranch`,`zemail`,`xstdcost`,`xstdprice`,`xqty`,`xsalesprice`,
				`xuom`,`xdisc`,`xvatpct`,`xtxntype`,`xdocument`,`xdocumentrow`,`xreturnimsenum`,`xstatus`,`xsign`,`xdate`,`xyear`,`xper`";
				
					$vals = "('". $prefix ."'," . Session::get('sbizid') . ",'". $keyfieldval ."','". $nextrow ."',
					'". $itemcode ."','". $data['xitemdesc'] ."','". $chkitem[0]['xcat'] ."',
					'" . Session::get('sbizshort') . "','". $chkitem[0]['xcolor'] ."','". $chkitem[0]['xsize'] ."',
					'". $itemdetail[0]['xsl'] ."','". $chkitem[0]['xsup'] ."','". $chkitem[0]['xsupdt'] ."',
					'". $chkitem[0]['xcus'] ."','". $chkitem[0]['xcusdt'] ."','". $this->branch ."','". $this->branch ."',
					'". Session::get('suser') ."','0','". $itemdetail[0]['xsalesprice'] ."',
					'". $data['xqty'] ."','". $chkitem[0]['xsalesprice'] ."','','". $chkitem[0]['xdisc'] ."',
					'". $chkitem[0]['xvatpct'] ."','Sales Return','". $data['xreturnimsenum'] ."','". $row ."','". $data['xreturnimsenum'] ."','Created','1','". $date ."','". $year ."','". $month ."')";
				
				
				
				$success = $this->model->create($cols, $vals);
				
				
				
				if(empty($success))
					$success=0;
				
				}catch(Exception $e){
					$this->result = $e->getMessage();
				}
				
				if($success>0)
					$this->result = " Item return success!";
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to return!";
				
				$this->values = array(
				"xdate"=>$date,
				"ximsenum"=>$keyfieldval,
				"xreturnimsenum"=>$_POST['xreturnimsenum'],
				"xitemcode"=>$_POST['xitemcode'],
				"xitemdesc"=>$_POST['xitemdesc'],
				"xqty"=>$_POST['xqty'],
				"xrow"=>$_POST['xrow']
				);
				
				 $this->showentrypost($keyfieldval, $this->values, $this->result);
		}
		
		
		
		public function showentrypost($imsenum, $thisvalue, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."posreturn/returnentry"
		);
		
				
			$dynamicForm = new Dynamicform("Return Entry", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."posreturn/returnentry", "Save",$thisvalue ,URL."posreturn/showpost");
			
			$this->view->table = $this->renderTable($imsenum);
			
			$this->view->renderpage('posreturn/returnentry');
		}
		
		public function showentry($imsenum, $row="", $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."poereturn/returnentry"
		);
		
		$tblgetvalues = $this->model->getSingleRecord($imsenum, $row);
		
		if(empty($tblgetvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblgetvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Return Entry", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."posreturn/editreturnentry", "Update",$tblvalues ,URL."posreturn/showpost");
			
			$this->view->table = $this->renderTable($imsenum);
			
			$this->view->renderpage('posreturn/returnentry');
		}
		
		public function editsingle($imsenum, $xrow){
			$this->showentry($imsenum, $xrow);
			
		}
		
		public function deletesingle($imsenum, $xrow){
			$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximsenum = '". $imsenum."' and xrow = '". $xrow."' and xtxntype='Sales Return'";
			$this->model->delete($where);
			$this->showentry($imsenum, $xrow);
		}
		
		public function editunconinvoice($imsenum){
			$this->showentry($imsenum);
			
		}
		
		public function deleteunconinvoice($imsenum){
			$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximsenum = '". $imsenum."' and xtxntype='Sales Return'";
			$this->model->delete($where);
			$this->unconinvoicelist();
		}
		
		public function editreturnentry(){
			
			if(!isset($_POST['xitemcode']) && !isset($_POST['ximsenum']) && !isset($_POST['xrow'])){
				header ('location: '.URL.'posreturn');
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
			
				$chkinv= Session::get('schkinv');		
				
				
				$keyfieldval = $_POST['ximsenum'];
				
				$row=$_POST['xrow'];
								
				$itemcode = $_POST['xitemcode'];
												
				//checks was the item sold?
				$chkitem = $this->model->checkItemInvoice($_POST['xreturnimsenum'],$_POST['xitemcode']);
				
				
				//checks was the item returned?
				$chkinvitem = $this->model->checkReturn("imsetxn",array("sum"=>array("xqty*xsign_xqty"))," where xrecflag='Live' and ximsenum='". $_POST['xreturnimsenum'] ."' and xitemcode='". $_POST['xitemcode'] ."'");
				
								
				$itemdetail = $this->model->getItemDetail("xitemcode", $itemcode);
				
				try{
						
					
					$balqty = abs($chkinvitem[0]['xqty']);
					
					$qty = $balqty - $chkitem[0]['xqty'];
					
					$qty = abs($qty);
					
					
					if($qty<$_POST['xqty'])
						throw new Exception("You cannot return more than available quantity of this invoice!");
					
																				
					if(empty($itemdetail)){
						throw new Exception("Item not found!");
					}
				
				$form	->post('xitemcode')
						->val('maxlength', 100)
				
																		
						->post('xitemdesc')
						->val('minlength', 1)
						
						->post('xreturnimsenum')
						->val('minlength', 1)
						
						->post('xqty')
						->val('checkdouble')
						->val('minlength', 1);
				
				$form	->submit();	
				
				$data = $form->fetch();	
					
				
				$data['xitemcode'] = $data['xitemcode'];
				$data['xitemdesc'] = $data['xitemdesc'];
				$data['xcat'] = $chkitem[0]['xcat'];
				$data['xbrand'] = $chkitem[0]['xbrand'];
				$data['xcolor'] = $chkitem[0]['xcolor'];
				$data['xsize'] = $chkitem[0]['xsize'];
				$data['xsl'] = $chkitem[0]['xsl'];
				$data['xsup'] = $chkitem[0]['xsup'];
				$data['xsupdt'] = $chkitem[0]['xsupdt'];
				$data['xwh'] = $this->branch;
				$data['xbranch'] = $this->branch;
				$data['xstdcost'] = $chkitem[0]['xstdcost'];
				$data['xstdprice'] = $chkitem[0]['xsalesprice'];
				$data['xsalesprice'] = $chkitem[0]['xsalesprice'];
				$data['xupdstdcost'] = $chkitem[0]['xstdcost'];
				$data['xupdstdprice'] = $chkitem[0]['xstdprice'];
				$data['xupdqty'] = $data['xqty'];
				$data['xupdsalesprice'] = $chkitem[0]['xsalesprice'];
				$data['xuom'] = $chkitem[0]['xuom'];
				$data['xvatpct'] = $chkitem[0]['xvatpct'];
				$data['xdocument'] = $data['xreturnimsenum'];
				$data['xdate'] = $date;
				$data['xyear'] = $year;
				$data['xper'] = $month;			
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				
				$success = $this->model->edit($data, $keyfieldval, $_POST['xrow']);
				
				
				
				if(empty($success))
					$success=0;
				
				}catch(Exception $e){
					$this->result = $e->getMessage();
				}
				
				if($success>0)
					$this->result = " Updated success!";
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to update!";
				
				$this->values = array(
				"xdate"=>$date,
				"ximsenum"=>$keyfieldval,
				"xreturnimsenum"=>$_POST['xreturnimsenum'],
				"xitemcode"=>$_POST['xitemcode'],
				"xitemdesc"=>$_POST['xitemdesc'],
				"xqty"=>$_POST['xqty'],
				"xrow"=>$_POST['xrow']
				);
				
				 $this->showentrypost($keyfieldval, $this->values, $this->result);
		}
		
		
		function renderTable($imsenum){
			$fields = array(
						"imsenum-Return No",
						"xreturnimsenum-Return From",
						"xrow-Row",
						"xitemcode-Item Code",
						"xsl-Serial",
						"xitemdesc-Item Description",
						"xqty-Quantity",
						"xsalesprice-Rate",
						"xdisc-Discount",
						"xvat-VAT",
						"xtotal-Total"
						);
			$table = new Datatable();
			$row = $this->model->getReturnByInv($imsenum, $this->branch);
			//print_r($row); die;
			return $table->myTableExt($fields, $row, array("ximsenum", "xrow"), URL."posreturn/editsingle/", URL."posreturn/deletesingle/");
			
			
		}
		
		function picklist(){
			$this->view->table = $this->posInvoicePickTable();
			
			$this->view->renderpage('posreturn/picklist', false);
		}
		
		function posInvoicePickTable(){
			$fields = array(
						"ximsenum-Invoice No",
						"xdate-Date",
						"xcus-Customer",
						"xcusdt-Customer Detail"
						);
			$table = new Datatable();
			$row = $this->model->posInvoicePickTable($this->branch);
			
			return $table->picklistTable($fields, $row, "ximsenum");
		}
		
		function returnentry(){
			
		$btn = array(
			"Clear" => URL."posreturn/returnentry"
		);
		
		// form data
		
			$dynamicForm = new Dynamicform("Return Entry", $btn);		
			
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."posreturn/savereturn", "Save",$this->values ,URL."posreturn/showpost");
			
			
			$this->view->table = "";
						
			$this->view->renderpage('posreturn/returnentry');
		}
		
		public function showpost(){
			
		$imsenum = $_POST['ximsenum'];
		$xrow = $_POST['xrow'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."posreturn/returnentry"
		);
		
		$tblgetvalues = $this->model->getSingleRecord($imsenum, $xrow);
		//print_r($tblgetvalues);die;
		if(empty($tblgetvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblgetvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("POS Entry", $btn);		
			
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."posreturn/savereturn", "Save",$tblvalues ,URL."posreturn/showpost");
			
			
			$this->view->table = $this->renderTable($imsenum);
						
			$this->view->renderpage('posreturn/returnentry');
		}
		
		function unconinvoicelist(){
						
			$this->view->table = $this->renderUnconfirmedList();
			
			$this->view->renderpage('posentry/unconinvoicelist');	
		}
		
		function renderUnconfirmedList(){
			$fields = array(
						"ximsenum-Invoice No",
						"xdate-Date",
						"xcus-Customer",
						"xcusdt-Customer Detail"
						);
			$table = new Datatable();
			$row = $this->model->getUnconfirmedList("Created",$this->branch);
			//print_r($row); die;
			return $table->createTable($fields, $row, "ximsenum", URL."posreturn/editunconinvoice/", URL."posreturn/deleteunconinvoice/");
			
			
		}
		
		public function getItemNamePrice($itemcode){
			$this->model->getItemInfoForSale("xitemcode", $itemcode);
		}
}