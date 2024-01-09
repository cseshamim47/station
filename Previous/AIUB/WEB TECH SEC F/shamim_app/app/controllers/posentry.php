<?php
class Posentry extends Controller{
	
	private $values = array();
	private $fields = array();
	private $valuesdt = array();
	private $fieldsdt = array();
	private $branch="";
	private $modalvals = array();
	private $modalfields = array();
	
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
				if($menus["xsubmenu"]=="OSP POS")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
		
		$this->branch = Session::get('sbranch');
		$dt = date("Y/m/d");
		
		$this->values = array(
				"xdate"=>$dt,
				"ximsenum"=>"",
				"xcus"=>"",
				"xcusdt"=>"",
				"xitemcodeosp"=>"",
				"xrdin"=>"",
				"xdesc"=>"",
				"xqty"=>"0.00",
				"xsalesprice"=>"0.00",
				"xpoint"=>"0",
				"xrow"=>"1"
			);
			
		$this->modalvals = array(
				"imsenum"=>"",
				"invdate"=>"",
				"xbank"=>"",
				"xcashamt"=>"0",
				"xcardamt"=>"0",
				"xdisc"=>"0"
			);	
		
		$this->modalfields = array(
				"imsenum-text"=>'Invoice No_readonly',
				"invdate-text"=>'Date_readonly',
				"xbank-text"=>'Type_readonly',
				"xcashamt-text_number"=>'Cash Amount_number="true" minlength="1" maxlength="18" required',
				"xcardamt-text_number"=>'Bank Amount_number="true" minlength="1" maxlength="18" required',
				"xdisc-text_number"=>'Discount_number="true" minlength="1" maxlength="18" required'
			);				
			
		/*$this->fields = array(array(
				"ximsenum-group_".URL."posentry/picklist"=>'Invoice No_readonly',
				"xdate-datepicker" => 'Date_""'
				),
				array(
				"xcus-text"=>'Customer_""',
				"xcusdt-text"=>'Customer Detail_""'	
				),
				array(
				"xitemcode-group_".URL."imstock/picklist"=>'Item Code_""',
				"xsl-text"=>'Alternate Item Code_""'
				),
				array(
				"xitemdesc-text"=>'Description_""',
				"xqty-text_number"=>'Quantity_number="true" minlength="1" maxlength="18" required'
				),
				array(
				"xsalesprice-text_number"=>'Rate_number="true" minlength="1" maxlength="18" required',
				"xdisc-text"=>'Discount_number="true" minlength="1" maxlength="18" required',
				"xrow-hidden"=>'_number="true" minlength="1"'
				)
			);*/
			
		$this->fields = array(array(
				"ximsenum-group_".URL."posentry/picklist"=>'Invoice No_readonly'
				
				),
				array(
				
				"xdate-datepicker" => 'Date_""'
				),
				array(
				"xcus-group_".URL."customers/picklist"=>'Customer Code_maxlength="20"'
				
				),array(
				
				"xcusdt-text"=>'Name_readonly'	
				),
				array(
				
				"xrdin-text"=>'Ref. RIN_""'
				),
				array(
				"xitemcodeosp-group_".URL."itempicklist/ospitempicklist"=>'Item Code_""'
				
				),
				array(
				"xdesc-text"=>'Description_readonly'
				
				),
				array(
				
				"xqty-text_number"=>'Quantity_number="true" minlength="1" maxlength="18" required'
				),
				array(
				"xsalesprice-text_number"=>'Rate_number="true" minlength="1" maxlength="18" readonly required'
				
				),
				array(
				"xpoint-text"=>'Point_number="true" minlength="1" maxlength="18" readonly required',
				"xrow-hidden"=>'_number="true" minlength="1"'
				)
			);
		
			
		$this->view->js = array('public/js/datatable.js','views/posentry/js/modalentry.js',
		'views/posentry/js/codevalidator.js','views/posentry/js/getitemdt.js','public/js/showpost.js','views/jsondata/js/cusdt.js');
		
		
		}
		
		public function index(){
			
			
			$this->view->rendermainmenu('posentry/index');	
		}
		
		public function savesales(){
			
			if(empty($_POST['xdesc']) || empty($_POST['xqty'])){
				header ('location: '.URL.'posentry/salesentry');
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
				$prefix = "RPOS-".Session::get('sbin')."-";
				//gets is inventory checks, if Yes it will check else not	
				$chkinv= Session::get('schkinv');	
				
				$keyfieldval = $_POST['ximsenum'];
				$stno = $this->model->getStatementNo();
				
				if(!isset($keyfieldval) || trim($keyfieldval)==''){
					$keyfieldval = $this->model->getKeyValue("imsetxn","ximsenum",$prefix,"6");
					
				}
				
				$xrdin = explode ('@',Session::get('suser'));	
				
				//echo $keyfieldval;die;
				$row = $this->model->getRow("imsetxn","ximsenum",$_POST['ximsenum'],"xrow");
				
				$nextrow = $row + 1;
				
				$itemcode = $_POST['xitemcodeosp'];
				$imbalance = $this->model->getIMBalance($itemcode, $xrdin[0]);
				$itemdetail = $this->model->getItemDetail("xitemcode", $itemcode);
				$vatpct = 0;
				if(!empty($itemdetail))
					$vatpct = $itemdetail[0]["xvatpct"];
				
				if($vatpct==0)
					$vatpct = Session::get('svatpct');	
					
				
				
				try{
					
				if($stno==0){
						throw new Exception("Satement not started yet! Please wait...");
					}
				if(empty($itemdetail)){
						throw new Exception("Item not found!");
					}		
				if($_POST['xqty'] < 1 || empty($_POST['xqty'])){
						throw new Exception("Qty Not Found!");
					}
				if($_POST['xsalesprice'] < 1 || empty($_POST['xsalesprice'])){
						throw new Exception("Rate Not Found!");
					}
					if($_POST['xpoint'] <= 0 || empty($_POST['xpoint'])){
						throw new Exception("Point Not Found!");
					}	
				if($_POST['xcusdt'] == ""|| empty($_POST['xcusdt'])){
						throw new Exception("No customer enetered!");
					}
				if($_POST['xdesc'] == "" || empty($_POST['xdesc'])){
						throw new Exception("No item enetered!");
					}					
				$form	->post('xitemcodeosp')
						->val('minlength', 1)
				
				
						->post('xcus')
						->val('maxlength', 100)
				
						->post('xcusdt')
						->val('maxlength', 100)
						
						->post('xrdin')
						->val('minlength', 12)
						->val('maxlength', 100)
								
												
						->post('xdesc')
						->val('minlength', 1)
						
												
						->post('xqty')
						->val('checkdouble')
						->val('minlength', 1)
						
						->post('xsalesprice')
						->val('checkdouble')
						->val('minlength', 1)
						
						->post('xpoint')
						->val('checkdouble')
						->val('maxlength', 4);
				
				$form	->submit();	
				
				$data = $form->fetch();		
				
					$bal = $imbalance-$data['xqty'];				
					if($bal<0){
						throw new Exception("Not enough stock");
					}
					if($itemdetail[0]['xsource']!="OSP"){
						throw new Exception("Not an OSP item!");
					}
				if(empty($this->model->getSingleRin($data['xrdin']))){
						throw new Exception("Ref. RIN not found!");
					}
				if(empty($this->model->getSingleCustomer($data['xcus']))){
						throw new Exception("Customer not found!");
					}	
				$spotcom = ($itemdetail[0]['xdp']*1)*$data['xqty'];
				$vals ="";
				//echo $chkinv; die;
				$cols = "`xprefix`,`bizid`,`ximsenum`,`xrow`,`xitemcode`,`xdesc`,`xcat`,`xbrand`,`xcolor`,`xsize`,
				`xsl`,`xsup`,`xsupdt`,`xcus`,`xcusdt`,`xwh`,`xbranch`,`zemail`,`xstdcost`,`xstdprice`,`xqty`,`xsalesprice`,
				`xuom`,`xdisc`,`xvatpct`,`xtxntype`,`xdocument`,`xdocumentrow`,`xstatus`,`xsign`,`xdate`,`xyear`,`xper`,`xpoint`,`xspotcom`,`xrdin`,`stno`,`xsrctaxpct`";
				
					$vals = "('". $prefix ."'," . Session::get('sbizid') . ",'". $keyfieldval ."','". $row ."',
					'". $data['xitemcodeosp'] ."','". $data['xdesc'] ."','". $itemdetail[0]['xcat'] ."',
					'". $itemdetail[0]['xbrand'] ."','". $itemdetail[0]['xcolor'] ."','". $itemdetail[0]['xsize'] ."',
					'". $itemdetail[0]['xitemcodealt'] ."','". $itemdetail[0]['xsup'] ."','',
					'". $data['xcus'] ."','". $data['xcusdt'] ."','". $xrdin[0] ."','". $xrdin[0] ."',
					'". Session::get('suser') ."','". $itemdetail[0]['xstdcost'] ."','". $itemdetail[0]['xmrp'] ."',
					'". $data['xqty'] ."','". $itemdetail[0]['xmrp'] ."','". $itemdetail[0]['xunitsale'] ."','0',
					'". $vatpct ."','Sales','". $keyfieldval ."','". $row ."','Created','-1','". $date ."','". $year ."','". $month ."','". $itemdetail[0]['xdp'] ."',". $spotcom .",'". $data['xrdin'] ."',". $stno .",'10')";
				
				
				
				$success = $this->model->create($cols, $vals);
				
				
				
				if(empty($success))
					$success=0;
				
				}catch(Exception $e){
					$this->result = $e->getMessage();
				}
				
				if($success>0)
					$this->result = '<a id="invnum" href="'.URL.'posentry/createpdf/'.$keyfieldval.'">'.$keyfieldval.'</a> Item added success!';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to add item!";
				
				$this->values = array(
				"xdate"=>$date,
				"ximsenum"=>$keyfieldval,
				"xcus"=>$_POST['xcus'],
				"xcusdt"=>$_POST['xcusdt'],
				"xitemcodeosp"=>$_POST['xitemcodeosp'],
				"xrdin"=>$_POST['xrdin'],
				"xdesc"=>$_POST['xdesc'],
				"xqty"=>$_POST['xqty'],
				"xsalesprice"=>$_POST['xsalesprice'],
				"xpoint"=>$_POST['xpoint'],
				"xrow"=>$_POST['xrow']
				);
				
				 $this->showentrypost($keyfieldval, $this->values, $this->result);
		}
		/*
		public function insertcollection(){
			$rownum = $this->model->getRow("imsetxncash","ximsenum",$_POST['imsenum'],"xrow");
			$xrdin = explode ('@',Session::get('suser'));	
				$xdate = $_POST['invdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date));
				$data=array();
						
						$data['bizid']=Session::get('sbizid');
						$data['ximsenum']=$_POST['imsenum'];
						$data['xcus']="";
						$data['xcusdt']="";
						$data['xcashamt']=$_POST['xcashamt'];
						$data['xcardamt']=$_POST['xcardamt'];
						$data['xdisc']=$_POST['xdisc'];
						$data['xbank']=$_POST['xbank'];
						$data['xtxntype']="OSP Collection";
						$data['xdocument']=$_POST['imsenum'];
						$data['xdocumentrow']=$rownum;
						$data['xstatus']="Created";
						$data['xsign']="1";
						$data['xdate']=$date;
						$data['xyear']=$year;
						$data['xper']=$month;
						$data['xrow']=$rownum;
						$data['zemail'] = Session::get('suser');
						$data['xwh']=$xrdin[0];
						$data['xbranch']=$xrdin[0];
						$data['xprefix'] = Session::get('suserrow');
					
				
				$this->model->insertCollection($data);	
		}
		*/
		public function showentrypost($imsenum, $thisvalue, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."posentry/salesentry"
		);
		if($result=="")
			$result='<a id="invnum" href="'.URL.'posentry/createpdf">'.$imsenum.'</a>';
			//$this->view->tr = $this->collectionTable($imsenum);	
			$dynamicForm = new Dynamicform('<span style="color:red;">OSP</span> POS Entry', $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."posentry/savesales", "Save",$thisvalue ,URL."posentry/showpost");
			//$this->view->modalform = $dynamicForm->onlyModal($this->modalfields, URL."posentry/insertcollection",$this->modalvals);
			
			//$this->view->banks = $this->model->getBanks();
			$this->view->table = $this->renderTable($imsenum);
			
			$this->view->renderpage('posentry/salesentry');
		}
		
		public function showentry($imsenum, $row="1", $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."posentry/salesentry"
		);
		$tblgetvalues = $this->model->getSingleRecord($imsenum, $row);
		if($result=="")
			$result='<a id="invnum" href="'.URL.'posentry/createpdf/'.$imsenum.'">'.$imsenum.'</a>';
		
		//$keynum = $tblgetvalues[0]['ximsenum'];
		
		if(empty($tblgetvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblgetvalues[0];
			
		
			
		// form data
			//$this->view->tr = $this->collectionTable($imsenum);
			
			$dynamicForm = new Dynamicform('<span style="color:red;">OSP</span> POS Entry', $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."posentry/savesales", "Save",$tblvalues ,URL."posentry/showpost");
			//$this->view->modalform = $dynamicForm->onlyModal($this->modalfields, URL."posentry/insertcollection",$this->modalvals);
			//$this->view->banks = $this->model->getBanks();
			$this->view->table = $this->renderTable($imsenum);
			
			$this->view->renderpage('posentry/salesentry');
		}
		public function editunconinvoice($imsenum){
			$this->showentry($imsenum);
			
		}
		/*
		public function getcollection($imsenum){
			return $this->model->getCollections($imsenum);
		}
		
		public function editsingle($imsenum, $xrow){
			$this->showentry($imsenum, $xrow);
			
		}
		
		public function deletesingle($imsenum, $xrow){
			$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximsenum = '". $imsenum."' and xdocumentrow = '". $xrow."' and xtxntype in ('Sales', 'Inventory Receive')";
			$this->model->delete($where);
			$this->showentry($imsenum, $xrow);
		}
		
				
		public function deleteunconinvoice($imsenum){
			$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximsenum = '". $imsenum."' and xtxntype in ('Sales', 'Inventory Receive')";
			$this->model->delete($where);
			$this->unconinvoicelist();
		}
		
		public function editposentry(){
			header ('location: '.URL.'posentry/salesentry');
			
			if(!isset($_POST['xitemcode']) && !isset($_POST['ximsenum']) && !isset($_POST['xrow'])){
				header ('location: '.URL.'posentry/salesentry');
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
												
				$itemdetail = $this->model->getItemDetail("xitemcode", $itemcode);
				$xrdin = explode ('@',Session::get('suser'));	
				$checkimBalance = $this->model->getIMBalance($itemcode, $xrdin[0]);
				
				try{
					
					if(empty($itemdetail)){
						throw new Exception("Item not found!");
					}
										
					if($checkimBalance==0 && $chkinv=="Yes"){
						throw new Exception("Not enough stock");
					}
				
				$form	->post('xcus')
						->val('maxlength', 100)
				
						->post('xcusdt')
						->val('maxlength', 100)
						
						->post('xitemcode')
						->val('minlength', 1)						
												
						->post('xdesc')
						->val('minlength', 1)
						
						->post('xsl')
						
						
						->post('xqty')
						->val('checkdouble')
						->val('minlength', 1)
						
						->post('xsalesprice')
						->val('checkdouble')
						->val('minlength', 1)
						
						->post('xpoint')
						->val('digit')
						->val('maxlength', 4);
				
				$form	->submit();	
				
				$data = $form->fetch();		
				$xrdin = explode ('@',Session::get('suser'));
				
				$data['xcat'] = $itemdetail[0]['xcat'];
				$data['xbrand'] = $itemdetail[0]['xbrand'];
				$data['xcolor'] = $itemdetail[0]['xcolor'];
				$data['xsize'] = $itemdetail[0]['xsize'];
				$data['xsl'] = $data['xsl'];
				$data['xsup'] = $itemdetail[0]['xsup'];
				$data['xsupdt'] = "";
				$data['xwh'] = $xrdin[0];
				$data['xbranch'] = $xrdin[0];
				$data['xstdcost'] = $itemdetail[0]['xstdcost'];
				$data['xstdprice'] = $data['xsalesprice'];
				$data['xsalesprice'] = $data['xsalesprice'];
				$data['xupdstdcost'] = $itemdetail[0]['xstdcost'];
				$data['xupdstdprice'] = $itemdetail[0]['xstdprice'];
				$data['xupdqty'] = "0";
				$data['xupdsalesprice'] = "0";
				$data['xuom'] = $itemdetail[0]['xunitsale'];
				$data['xvatpct'] = $itemdetail[0]['xvatpct'];
				$data['xdate'] = $date;
				$data['xyear'] = $year;
				$data['xper'] = $month;			
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				
				$success = $this->model->edit($data, $keyfieldval, $itemcode, $_POST['xrow']);
				
				
				
				if(empty($success))
					$success=0;
				
				}catch(Exception $e){
					$this->result = $e->getMessage();
				}
				
				if($success>0)
					$this->result = '<a id="invnum" href="'.URL.'posentry/createpdf/'.$keyfieldval.'">'.$keyfieldval.'</a> Updated success!';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to update!";
				
				$this->values = array(
				"xdate"=>$date,
				"ximsenum"=>$keyfieldval,
				"xcus"=>$_POST['xcus'],
				"xcusdt"=>$_POST['xcusdt'],
				"xitemcode"=>$_POST['xitemcode'],
				"xsl"=>$_POST['xsl'],
				"xdesc"=>$_POST['xdesc'],
				"xqty"=>$_POST['xqty'],
				"xsalesprice"=>$_POST['xsalesprice'],
				"xpoint"=>$_POST['xpoint'],
				"xrow"=>$_POST['xrow']
				);
				
				 $this->showentrypost($keyfieldval, $this->values, $this->result);
		}
		*/
		
		function renderTable($imsenum){
			$fields = array(
						"xrow-Sl",
						"xdesc-Item Description",
						"xqty-Qty",
						"xsalesprice-Rate",
						"xdisc-Disc",
						"xpoint-Point",
						"xtotal-Total"
						);
			$table = new Datatable();
			$row = $this->model->getSalesByInv($imsenum);
			
			//print_r($row); die;
			return $table->InvoiceTableExt($fields, $row, array("ximsenum", "xrow"));
			
			
		}
		
		function picklist(){
			$this->view->table = $this->posInvoicePickTable();
			
			$this->view->renderpage('posentry/picklist', false);
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
		
		function salesentry(){
			
		$btn = array(
			"Clear" => URL."posentry/salesentry"
		);
		
		// form data
		
			$dynamicForm = new Dynamicform('<span style="color:red;">OSP</span> POS Entry', $btn);		
			
			$this->view->tr="";
			
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."posentry/savesales", "Save",$this->values ,URL."posentry/showpost");
			//$this->view->modalform = $dynamicForm->onlyModal($this->modalfields, URL."posentry/insertcollection",$this->modalvals);
	
			//$this->view->banks = $this->model->getBanks();
			$this->view->table = "";
						
			$this->view->renderpage('posentry/salesentry');
		}
		
		public function showpost(){
			
		$imsenum = $_POST['ximsenum'];
		$xrow = $_POST['xrow'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."posentry/salesentry"
		);
		
		$tblgetvalues = $this->model->getSingleRecord($imsenum, $xrow);
		//print_r($tblgetvalues);die;
		if(empty($tblgetvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblgetvalues[0];
			
			
		// form data
			//$this->view->tr = $this->collectionTable($imsenum);
			
			$dynamicForm = new Dynamicform('<span style="color:red;">OSP</span> POS Entry', $btn, '<a id="invnum" href="'.URL.'posentry/createpdf/'.$imsenum.'">'.$imsenum.'</a>');		
			
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."posentry/savesales", "Save",$tblvalues ,URL."posentry/showpost");
			//$this->view->modalform = $dynamicForm->onlyModal($this->modalfields, URL."posentry/insertcollection",$this->modalvals);
			//$this->view->banks = $this->model->getBanks();
			$this->view->table = $this->renderTable($imsenum);
						
			$this->view->renderpage('posentry/salesentry');
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
			return $table->createTable($fields, $row, "ximsenum", URL."posentry/editunconinvoice/");
			
			
		}
		/*
		private function collectionTable($imsenum){
		$obj = json_decode($this->getcollection($imsenum), true); 
		$tr="";
		foreach($obj as $value){ 
			$tr .= '<tr id="row-'.$value["xrow"].'" style="color:red;">';
				$tr .= '<td><strong>'.$value["xrow"].'</strong></td>';
				$tr .= '<td><strong>'.$value["xbank"].'</strong></td>';
				$tr .= '<td><strong>'.number_format($value["xamt"], Session::get("sbizdecimals"), '.','').'</strong></td>';
				$tr .= '<td><button id="btneditdt" data-id="'.$value["xrow"].'"  data-toggle="modal" data-target="#exampleModal" class="btn btn-danger">X</button></td></tr>';
		}
		return $tr;
		}
		*/
		public function getItemNamePrice($itemcode){
			$this->model->getItemInfoForSale("xitemcode", $itemcode);
		}
		
		public function createpdf($imsenum){
			
			$pdf = new Createpdf('P', 'mm', 'A4' );
			$pdf->AliasNbPages();
			$pdf->AddPage();
			
			$invseco = $this->model->getSalesNCollection($imsenum);
			//$invcaca = $this->model->getCollections($imsenum);
			
			$data=array();
			$invdate = date('d-m-Y');
			$discount = 0;
			$cash = 0;
			$card = 0;
			$xchange = 0;
			$cus = "";
			$cusdt = "";
			$header = array("SL","Item Description","Qty", "Rate/Unit", "Point", "Discount", "Total");
			for($i=0; $i<count($invseco); $i++){
								
				if($i==0){
					$invdate = date('d-m-Y', strtotime($invseco[$i]['xdate']));
					$cus = $invseco[$i]['xcus'];
					$cusdt = $invseco[$i]['xcusdt'];
				}
			}
			
			$pdf->Line(10, 25, 210-10, 25);
			$pdf->SetFont('Times','',10);
			$pdf->SetTextColor(32);
			$pdf->Cell(0,5,"Invoice No : ".$imsenum,0,0,'L');
			$pdf->Cell(-45,5,"Date : ".$invdate,0,1,'C');
			
			$pdf->Ln(5);
			$pdf->Cell(0,5,"Invoice To : ".$cus,0,0,'L');
			$pdf->Ln(5);
			$pdf->Cell(0,5,"Add/Phone : ".$cusdt,0,0,'L');
			$pdf->Ln(15);
			$indx = 0;
			for($i=0; $i<count($invseco); $i++){
				if($invseco[$i]['xtxntype']=="Sales"){	
					$data[$indx]= array($invseco[$i]['xdesc'],$invseco[$i]['xqty'],$invseco[$i]['xsalesprice'],$invseco[$i]['xpoint'],$invseco[$i]['xtotdisc'],$invseco[$i]['xtotprice']);
					$indx++;
				}
				if($invseco[$i]['xtxntype']=="Collection" && $invseco[$i]['xbank']=="Discount")
					$discount+=$invseco[$i]['xdisc'];
				if($invseco[$i]['xtxntype']=="Collection"){
					$cash+=$invseco[$i]['xcashamt'];
					$card+=$invseco[$i]['xcardamt'];
					//$xchange+=$invseco[$i]['xchangeamt'];
				}
				
				
			}
			
			$pdf->pdfInvoice($header, $data, $discount, $cash, $card, $xchange);
			
	
			$pdf->Output();
			
		}
		
		/*function sendsms(){
			$sendsms = new Sendsms();
			echo $sendsms->sendSingleSms("https://bmpws.robi.com.bd/ApacheGearWS/SendTextMessage", "pure", "D2kpass@)!&", "8801833318683", "8801621177777", "Test sms from Amarbazarltd");
		}*/
		
		
}