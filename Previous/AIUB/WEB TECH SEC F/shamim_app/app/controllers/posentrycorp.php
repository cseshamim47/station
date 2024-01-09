<?php
class Posentrycorp extends Controller{
	
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
				if($menus["xsubmenu"]=="Corporate POS")
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
				"xitemcode"=>"",
				"xrdin"=>"",
				"xdesc"=>"",
				"xqty"=>"0.00",
				"xsalesprice"=>"0.00",
				"xpoint"=>"0",
				"xrow"=>"1",
				"xsup"=>"",
				"xoutlet"=>""
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
				"ximsenum-group_".URL."posentrycorp/picklist"=>'Invoice No_readonly'
				
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
				"xsup-group_".URL."jsondata/supplierpicklist"=>'Company_maxlength="20"'
				
				),
				array(
				"xoutlet-group_".URL."jsondata/outletbysuppick"=>'Outlet Code_""'
				
				),
				array(
				"xitemcode-group_".URL."itempicklist/corpitempicklist"=>'Item Code_""'
				
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
		
			
		$this->view->js = array('public/js/datatable.js','views/posentrycorp/js/modalentry.js',
		'views/posentrycorp/js/codevalidator.js','views/posentrycorp/js/getitemdt.js','public/js/showpost.js','views/jsondata/js/cusdt.js');
		
		
		}
		
		public function index(){
			
			
			$this->view->rendermainmenu('posentrycorp/index');	
		}
		
		public function savesales(){
			
			if(empty($_POST['xdesc']) || empty($_POST['xqty'])){
				header ('location: '.URL.'posentrycorp/salesentry');
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
				$prefix = "CPOS-".Session::get('sbin')."-";
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
				
				$itemcode = $_POST['xitemcode'];
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
					if($_POST['xsup'] == "" || empty($_POST['xqty'])){
						throw new Exception("Company Name Not Found!");
					}
					if($_POST['xoutlet'] == "" || empty($_POST['xoutlet'])){
						throw new Exception("Outlet Not Found!");
					}
					if($_POST['xsalesprice'] < 1 || empty($_POST['xsalesprice'])){
						throw new Exception("Rate Not Found!");
					}
					if($_POST['xpoint'] < 1 || empty($_POST['xpoint'])){
						throw new Exception("Point Not Found!");
					}
					if($_POST['xcusdt'] == ""|| empty($_POST['xcusdt'])){
						throw new Exception("No customer enetered!");
					}
					if($_POST['xdesc'] == "" || empty($_POST['xdesc'])){
						throw new Exception("No item enetered!");
					}
				$form	->post('xitemcode')
						->val('minlength', 1)
						
						->post('xsup')
						->val('maxlength', 20)
				
						->post('xoutlet')
						->val('maxlength', 20)
						
						->post('xcus')
						->val('maxlength', 100)
				
						->post('xcusdt')
						->val('maxlength', 100)
								
												
						->post('xdesc')
						->val('minlength', 1)
						
						->post('xrdin')
						->val('minlength', 12)
						->val('maxlength', 100)
						
						
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

				$topupbal = $this->model->getBalance()-($data['xsalesprice']*$data['xqty']);	
				if($topupbal<0){
						throw new Exception("Not sufficient balance! Please deposit first!");
					}
					if($data['xcus']==""){
						throw new Exception("No Customer Found!");
					}
					/*$bal = $imbalance-$data['xqty'];				
					if($bal<=0){
						throw new Exception("Not enough stock");
					}*/
					if($itemdetail[0]['xsource']!="Corporate"){
						throw new Exception("Not a Corporate item!");
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
					'". $data['xitemcode'] ."','". $data['xdesc'] ."','". $itemdetail[0]['xcat'] ."',
					'". $itemdetail[0]['xbrand'] ."','". $itemdetail[0]['xcolor'] ."','". $itemdetail[0]['xsize'] ."',
					'". $itemdetail[0]['xitemcodealt'] ."','". $data['xsup'] ."','".$data['xoutlet']."',
					'". $data['xcus'] ."','". $data['xcusdt'] ."','". $xrdin[0] ."','". $xrdin[0] ."',
					'". Session::get('suser') ."','". $itemdetail[0]['xstdcost'] ."','". $itemdetail[0]['xmrp'] ."',
					'". $data['xqty'] ."','". $itemdetail[0]['xmrp'] ."','". $itemdetail[0]['xunitsale'] ."','0',
					'". $vatpct ."','Corporate Sales','". $keyfieldval ."','". $row ."','Created','-1','". $date ."','". $year ."','". $month ."','". $itemdetail[0]['xdp'] ."',". $spotcom .",'". $data['xrdin'] ."',". $stno .",'10')";
				
				
				
				$success = $this->model->create($cols, $vals);
				
				
				
				if(empty($success))
					$success=0;
				
				}catch(Exception $e){
					$this->result = $e->getMessage();
				}
				
				if($success>0)
					$this->result = '<a id="invnum" href="'.URL.'posentrycorp/createpdf/'.$keyfieldval.'">'.$keyfieldval.'</a> Item added success!';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to add item!";
				
				$this->values = array(
				"xdate"=>$date,
				"ximsenum"=>$keyfieldval,
				"xsup"=>$_POST['xsup'],
				"xoutlet"=>$_POST['xoutlet'],
				"xcus"=>$_POST['xcus'],
				"xcusdt"=>$_POST['xcusdt'],
				"xitemcode"=>$_POST['xitemcode'],
				"xrdin"=>$_POST['xrdin'],
				"xdesc"=>$_POST['xdesc'],
				"xqty"=>$_POST['xqty'],
				"xsalesprice"=>$_POST['xsalesprice'],
				"xpoint"=>$_POST['xpoint'],
				"xrow"=>$_POST['xrow']
				);
				
				 $this->showentrypost($keyfieldval, $this->values, $this->result);
		}
		
		public function showentrypost($imsenum, $thisvalue, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."posentrycorp/salesentry"
		);
		if($result=="")
			$result='<a id="invnum" href="'.URL.'posentrycorp/createpdf">'.$imsenum.'</a>';
			//$this->view->tr = $this->collectionTable($imsenum);	
			$dynamicForm = new Dynamicform('<span style="color:red;">Corporate</span> POS Entry! <span style="color:red;">Balance : '.$this->model->getBalance().'</span>', $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."posentrycorp/savesales", "Save",$thisvalue ,URL."posentrycorp/showpost");
			//$this->view->modalform = $dynamicForm->onlyModal($this->modalfields, URL."posentry/insertcollection",$this->modalvals);
			
			//$this->view->banks = $this->model->getBanks();
			$this->view->table = $this->renderTable($imsenum);
			
			$this->view->renderpage('posentrycorp/salesentry');
		}
		
		public function showentry($imsenum, $row="1", $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."posentrycorp/salesentry"
		);
		$tblgetvalues = $this->model->getSingleRecord($imsenum, $row);
		if($result=="")
			$result='<a id="invnum" href="'.URL.'posentrycorp/createpdf/'.$imsenum.'">'.$imsenum.'</a>';
		
		//$keynum = $tblgetvalues[0]['ximsenum'];
		
		if(empty($tblgetvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblgetvalues[0];
			
		
			
		// form data
			//$this->view->tr = $this->collectionTable($imsenum);
			
			$dynamicForm = new Dynamicform('<span style="color:red;">Corporate</span> POS Entry! <span style="color:red;">Balance : '.$this->model->getBalance().'</span>', $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."posentrycorp/savesales", "Save",$tblvalues ,URL."posentrycorp/showpost");
			//$this->view->modalform = $dynamicForm->onlyModal($this->modalfields, URL."posentry/insertcollection",$this->modalvals);
			//$this->view->banks = $this->model->getBanks();
			$this->view->table = $this->renderTable($imsenum);
			
			$this->view->renderpage('posentrycorp/salesentry');
		}
		public function editunconinvoice($imsenum){
			$this->showentry($imsenum);
			
		}
		
		
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
			
			$this->view->renderpage('posentrycorp/picklist', false);
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
			"Clear" => URL."posentrycorp/salesentry"
		);
		
		// form data
		
			$dynamicForm = new Dynamicform('<span style="color:red;">Corporate</span> POS Entry! <span style="color:red;">Balance : '.$this->model->getBalance().'</span>', $btn);		
			
			$this->view->tr="";
			
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."posentrycorp/savesales", "Save",$this->values ,URL."posentrycorp/showpost");
			
			$this->view->table = "";
						
			$this->view->renderpage('posentrycorp/salesentry');
		}
		
		public function showpost(){
			
		$imsenum = $_POST['ximsenum'];
		$xrow = $_POST['xrow'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."posentrycorp/salesentry"
		);
		
		$tblgetvalues = $this->model->getSingleRecord($imsenum, $xrow);
		//print_r($tblgetvalues);die;
		if(empty($tblgetvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblgetvalues[0];
			
			
		// form data
			//$this->view->tr = $this->collectionTable($imsenum);
			
			$dynamicForm = new Dynamicform('<span style="color:red;">Corporate</span> POS Entry! <span style="color:red;">Balance : '.$this->model->getBalance().'</span>', $btn, '<a id="invnum" href="'.URL.'posentrycorp/createpdf/'.$imsenum.'">'.$imsenum.'</a>');		
			
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."posentrycorp/savesales", "Save",$tblvalues ,URL."posentrycorp/showpost");
			//$this->view->modalform = $dynamicForm->onlyModal($this->modalfields, URL."posentry/insertcollection",$this->modalvals);
			//$this->view->banks = $this->model->getBanks();
			$this->view->table = $this->renderTable($imsenum);
						
			$this->view->renderpage('posentrycorp/salesentry');
		}
		
		function unconinvoicelist(){
						
			$this->view->table = $this->renderUnconfirmedList();
			
			$this->view->renderpage('posentrycorp/unconinvoicelist');	
		}
		
		function renderUnconfirmedList(){
			$fields = array(
						"ximsenum-Invoice No",
						"xdate-Date",
						"xcus-Customer",
						"xcusdt-Customer Detail"
						);
			$table = new Datatable();
			$row = $this->model->getUnconfirmedList("",$this->branch);
			//print_r($row); die;
			return $table->createTable($fields, $row, "ximsenum", URL."posentrycorp/editunconinvoice/");
			
			
		}
		function deliveredlist(){
						
			$this->view->table = $this->renderUnconfirmedList();
			
			$this->view->renderpage('posentrycorp/unconinvoicelist');	
		}
		
		function renderdeliveredList(){
			$fields = array(
						"ximsenum-Invoice No",
						"xdate-Date",
						"xcus-Customer",
						"xcusdt-Customer Detail"
						);
			$table = new Datatable();
			$row = $this->model->getUnconfirmedList("Delivered",$this->branch);
			//print_r($row); die;
			return $table->createTable($fields, $row, "ximsenum", URL."posentrycorp/editunconinvoice/");
			
			
		}
		public function getItemNamePrice($itemcode){
			$this->model->getItemInfoForSale("xitemcode", $itemcode);
		}
		
		public function createpdf($imsenum){
			
			$pdf = new Createpdf('P', 'mm', 'A4' );
			$pdf->AliasNbPages();
			$pdf->AddPage();
			
			$invseco = $this->model->getSalesNCollection($imsenum);
			//$invcaca = $this->model->getCollections($imsenum);
			//print_r($invseco); die;
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
				if($invseco[$i]['xtxntype']=="Corporate Sales"){	
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
}