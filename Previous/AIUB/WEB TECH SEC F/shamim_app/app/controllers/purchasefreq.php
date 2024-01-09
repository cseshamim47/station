<?php
class Purchasefreq extends Controller{
	
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
				if($menus["xsubmenu"]=="PO From Requisition")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/purchasefreq/js/getreqitemdt.js','views/suppliers/js/getsup.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"xponum"=>"",
			"xsup"=>"",
			"xsupname"=>"",			
			"xitemcode"=>"",
			"xdesc"=>"",
			"xqty"=>"0",
			"xreqqty"=>"0",
			"xrow"=>"0",
			"xratepur"=>"0.00",
			"xwh"=>"0.00"
			);
			
			$this->fields = array(
						array(
							"Purchase Detail-div"=>''													
							),
						array(							
							"xdate-datepicker" => 'Date_""'							
							),
						array(
							"xponum-text"=>'PO No_maxlength="20"'							
							),
						array(							
							"xsup-text"=>'Supplier_readonly'							
							),
						array(							
							"xsupname-text"=>'Name_readonly'
							),
						array(
							"xwh-select_Warehouse"=>'Warehouse*~star_maxlength="50"'																		
							),
						array(
							"Item Detail-div"=>''													
							),
						array(
							"xitemcode-text"=>'Item Code_maxlength="20" readonly'														
							),
						array(
							"xdesc-text"=>'Description_readonly'						
							),
						array(
							"xreqqty-text_digit"=>'Demand Qty*~star_number="true" minlength="1" maxlength="18" required',														
							),
						array(
							"xqty-text_digit"=>'Qty*~star_number="true" minlength="1" maxlength="18" required'																				
							),
						array(
							"xratepur-text_number"=>'Rate*~star_number="true" minlength="1" maxlength="18" required readonly',							
							"xrow-hidden"=>''
							)	
						);
														
		}
		
		public function index(){		
		
		$btn = array(
			"Clear" => URL."purchasefreq/poentry",
		);	
		
					
			$this->view->rendermainmenu('purchasefreq/index');
			
		}
		
		
		public function savepo(){
				
				
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
				$yearoffset = Session::get('syearoffset');
				$txnnum = $_POST['xponum'];
				$keyfieldval=$_POST['xponum'];
				$form = new Form();
				$data = array();
				$success=0;
				$result = ""; 
				
				$restqty = $this->model->getSingleQty($_POST['xponum'], $_POST['xrow']);
				
				
				
				$xyear = 0;
				$xper = 0;
				//print_r($this->model->getYearPer($yearoffset,intval($month))); die;
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$xper = $key;
					$xyear = $val;
				}
				
				try{
					
					
				if($_POST['xsup']=="" || empty($_POST['xsup'])){
						throw new Exception("Please Enter Supplier!");
					}
				if($_POST['xitemcode']=="" || $_POST['xitemcode']<0){
						throw new Exception("Please Enter Itemcode!");
					}		
				if($_POST['xqty']=="" || $_POST['xqty']<=0){
						throw new Exception("Please Enter Quantity!");
					}
					
				if($_POST['xwh']=="" || empty($_POST['xwh'])){
						throw new Exception("Please Enter Warehouse!");
					}
					
				$form	->post('xitemcode')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xponum')
						->val('maxlength', 20)
						
												
						->post('xsup')
						->val('minlength', 1)
						->val('maxlength', 20)

						->post('xsupname')
						->val('minlength', 1)
						->val('maxlength', 150)						
				
						->post('xwh')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('xrow')
						->val('minlength', 1)
						->val('maxlength', 5)
						
						->post('xreqqty')		
						
						->post('xqty')
						
						
						
						->post('xratepur');
						
				$form	->submit();
				
				
					
				
				$data = $form->fetch();
				
				if($data['xponum'] == "")
					$keyfieldval = $this->model->getKeyValue("pomst","xponum","PO".Session::get('suserrow')."-","6");
				else
					$keyfieldval = $data['xponum'];
				
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['xponum'] = $keyfieldval;
				$data['xdate'] = $date;
				$data['xbranch'] = Session::get('sbranch');
				$data['xfinyear'] = $xyear;
				$data['xfinper'] = $xper;
				
				$rownum = $this->model->getRow("podet","xponum",$data['xponum'],"xrow");
				
				$item = $this->model->getItemDetail($data['xitemcode']);
				
				$rownum = $this->model->getRow("podet","xponum",$data['xponum'],"xrow");
				
				$cols = "`bizid`,`xponum`,`xrow`,`xitemcode`,`xitembatch`,xreqqty,`xqty`,`xdate`,`xratepur`,`xwh`,`xbranch`,`xproj`,`xtaxrate`,`xdisc`,`xexch`,`xcur`,`xtaxcode`,`xtaxscope`,`zemail`,`xunitpur`,`xconversion`,`xunitstk`";
				
				$vals = "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $rownum ."','". $data['xitemcode'] ."','". $data['xitemcode'] ."',
				'". $data['xreqqty'] ."','". $data['xqty'] ."','". $date ."','". $item[0]['xpricepur'] ."','". $data['xwh'] ."','". $data['xwh'] ."','". $data['xwh'] ."','0','0','1','BDT','None','None','".$data['zemail']."','".$item[0]['xunitpur']."','".$item[0]['xconversion']."','".$item[0]['xunitstk']."')";
				
									
				$success = $this->model->create($data, $cols, $vals);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					$this->result = 'Purchase Order Created</br><a style="color:red" id="invnum" href="'.URL.'purchase/printpo/'.$keyfieldval.'">Click To Print PO - '.$keyfieldval.'</a>';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Purchase Order! Reason: Could be Duplicate Trunsaction Code or system error!";
				
				 $this->showpoentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		public function editpo(){
			
			
			if (empty($_POST['xponum'])){
					header ('location: '.URL.'purchasefreq/poentry');
					exit;
				}
			$result = "";
			
			$hd = array();
			$dt = array();
			
				$yearoffset = Session::get('syearoffset');
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$month = date('m',strtotime($date)); 
				
				$xyear = 0;
				$xper = 0;
				
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$xper = $key;
					$xyear = $val;
				}
				
			$success=false;
			$ponum = $_POST['xponum'];
			$form = new Form();
				$data = array();
				
				try{
				
				
				$form	->post('xitemcode')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xponum')	
						
						->post('xsup')
						->val('minlength', 1)
						->val('maxlength', 20)

						->post('xsupname')
						->val('minlength', 1)
						->val('maxlength', 100)						
				
						->post('xwh')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						
						->post('xqty')
						
						->post('xratepur');
						
				$form	->submit();
				
			
				
				$data = $form->fetch();	
				
				$item = $this->model->getItem($data['xitemcode']);
						
				$hd = array (
					"xemail"=>Session::get('suser'),
					"zutime"=>date("Y-m-d H:i:s"),
					"xdate"=>$date,
					"xsup"=>$data['xsup'],
					"xwh"=>$data['xwh'],
					"xbranch"=>$data['xwh'],
					"xproj"=>$data['xwh'],
					"xsupdoc"=>"",
					"xfinyear" => $xyear,
					"xfinper" => $xper					
				);
				
				$dt = array (
					"xitemcode"=>$data['xitemcode'],
					"xqty"=>$data['xqty'],
					"xratepur"=>$data['xratepur'],
					"xwh"=>$data['xwh'],
					"xbranch"=>$data['xwh'],
					"xproj"=>$data['xwh'],
					"xdate"=>$date,
					"xunitpur"=>$item[0]['xunitpur'],
					"xconversion"=>$item[0]['xconversion'],
					"xunitstk"=>$item[0]['xunitstk']
				);
				
				$success = $this->model->edit($hd,$dt,$ponum,$_POST['xrow']);
				
				
				}catch(Exception $e){
					
					$result = $e->getMessage();
					
				}
				if($result==""){
				if($success)
					$result = "Edited successfully";
				else
					$result = "Edit failed!";				
				}
				
				 $this->showpoentry($ponum, $result.'<br /><a style="color:red" id="invnum" href="'.URL.'purchase/printpo/'.$ponum.'">Click To Print Voucher - '.$ponum.'</a>');
					
		
		}
		
		
		public function show($txnnum, $row, $result=""){
		if($txnnum=="" || $row==""){
			header ('location: '.URL.'purchasefreq/poentry');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."purchasefreq/poentry"
		);
		if($result=="")
			$result='<a style="color:red" id="invnum" href="'.URL.'purchase/printpo/'.$txnnum.'">Click To Print Voucher - '.$txnnum.'</a>';
		
		$tblvalues = $this->model->getPurchase($txnnum);
		$tbldtvals = $this->model->getSinglePurchaseDt($txnnum, $row);
		$sup = "";
		$status="";
		if(!empty($tblvalues)){
			$status = $tblvalues[0]['xstatus']; //echo $status; die;
			$sup = $tblvalues[0]['xsup'];
		}
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xponum"=>$tblvalues[0]['xponum'],
					"xsup"=>$tblvalues[0]['xsup'],
					"xsupname"=>$tblvalues[0]['xorg'],
					"xsupdoc"=>$tblvalues[0]['xsupdoc'],
					"xwh"=>$tblvalues[0]['xwh'],
					"xitemcode"=>$tbldtvals[0]['xitemcode'],
					"xdesc"=>$tbldtvals[0]['xdesc'],
					"xqty"=>$tbldtvals[0]['xqty'],
					"xreqqty"=>"0",
					"xrow"=>$tbldtvals[0]['xrow'],
					"xratepur"=>$tbldtvals[0]['xratepur']
					);
			
		// form data
		
			$confurl = URL."purchasefreq/confirmpo";
			$saveurl = URL."purchasefreq/editpo/";
			if($status=="Confirmed"){
				$confurl="";
				$saveurl="";
			}
		$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Purchase Order", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, $saveurl, "Update",$tblvalues, URL."purchasefreq/showpost");
			
			$this->view->table = $this->renderTable($sup);
			$this->view->potable = $this->renderPoTable($txnnum);;
			
			$this->view->renderpage('purchasefreq/poentry');
		}
		
		public function getsinglereq($itemcode){
			$this->model->getSingleQty($itemcode);
		}
		
		public function showentry($sup, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."purchasefreq/poentry"
		);
		
		$tblvalues = $this->model->getReqList($sup);
		$dt = date("Y/m/d");
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$dt,
					"xponum"=>"",
					"xsup"=>$tblvalues[0]['xsup'],
					"xsupname"=>$tblvalues[0]['xsupname'],					
					"xitemcode"=>"",
					"xdesc"=>"",
					"xqty"=>"0",
					"xreqqty"=>"0",
					"xrow"=>"0",
					"xratepur"=>"0",
					"xwh"=>""
					);
			$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Purchase Order From Requisition", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."purchasefreq/savepo/", "Save",$tblvalues ,URL."purchasefreq/showpost");
			
			$this->view->table = $this->renderTable($sup);
			$this->view->potable = "";
			$this->view->renderpage('purchasefreq/poentry');
		}
		
		public function showpoentry($txnnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."purchasefreq/poentry"
		);
		if($result=="")
			$result='<a style="color:red" id="invnum" href="'.URL.'purchase/printpo/'.$txnnum.'">Click To Print Voucher - '.$txnnum.'</a>';
		$tblvalues = $this->model->getPurchase($txnnum);
		$sup = "";
		$status="";
		if(!empty($tblvalues)){
			$status = $tblvalues[0]['xstatus'];
			$sup = $tblvalues[0]['xsup'];
		}
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xponum"=>$tblvalues[0]['xponum'],
					"xsup"=>$tblvalues[0]['xsup'],
					"xsupname"=>$tblvalues[0]['xorg'],
					"xsupdoc"=>$tblvalues[0]['xsupdoc'],
					"xwh"=>$tblvalues[0]['xwh'],
					"xitemcode"=>"",
					"xdesc"=>"",
					"xqty"=>"0",
					"xreqqty"=>"0",
					"xrow"=>"0",
					"xratepur"=>"0"
					);
			$this->view->balance = "";
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Purchase", $btn, $result);		
			$confurl = URL."purchasefreq/confirmpo";
			$saveurl = URL."purchasefreq/savepo/";
			if($status=="Confirmed"){
				$confurl="";
				$saveurl="";
			}
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, $saveurl, "Save",$tblvalues ,URL."purchasefreq/showpost",$confurl);
			
			$this->view->table = $this->renderTable($sup);
			$this->view->potable = $this->renderPoTable($txnnum);
			$this->view->renderpage('purchasefreq/poentry');
		}
		
	public function confirmpo(){
			
			$this->model->confirm(" bizid=".Session::get('sbizid')." and xponum='".$_POST['xponum']."' and xstatus='Created'");
			$this->showpoentry($_POST['xponum']);
		}
			
	
	public	function renderTable($sup){
		
			$fields = array(						
						"xitemcode-Item Code",
						"xitemdesc-Description",
						"xqty-Qty"	
						);
						
			$table = new Datatable();
			$row = $this->model->getreqdt($sup);
			
			return $table->myTableSubmit($fields, $row, "xitemcode", URL."purchasefreq/getsinglereq/");
						
		}
		
	public	function renderPoTable($txnnum){
			$pur = $this->model->getPurchase($txnnum);
			$status = "";
			if(!empty($pur))
				$status = $pur[0]["xstatus"];
			
			$delurl = URL."purchasefreq/recdelete/".$txnnum."/";
			
			if($status=="Confirmed")
			{
				$delurl="";
			}			
			
			$fields = array(
						"xrow-Sl",
						"xitemcode-Item Code",
						"xitemdesc-Description",
						"xqty-Quantity",
						"xratepur-Rate",
						"xtotal-Total"
						);
			$table = new Datatable();
			$row = $this->model->getpurchasedt($txnnum);
			
			return $table->myTable($fields, $row, "xrow", URL."purchasefreq/show/".$txnnum."/", $delurl);
						
		}	
		
		
		function reqlist(){
			$rows = $this->model->getReqList();
			$cols = array("xsup-Supplier Code","xsupname-Supplier Name");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xsup",URL."purchasefreq/showentry/");
			$this->view->renderpage('purchasefreq/list', false);
		}
		
		
		function polist(){
			$rows = $this->model->getPurchaseList("Confirmed");
			$cols = array("xdate-Date","xponum-PO No","xsup-Supplier","xsupname-Name","xsupdoc-Suplier Doc");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xponum",URL."purchasefreq/showpoentry/");
			$this->view->renderpage('purchasefreq/purchaselist', false);
		}
		function unconfirmedlist(){
			$rows = $this->model->getPurchaseList("Created");
			$cols = array("xdate-Date","xponum-PO No","xsup-Supplier","xsupname-Name","xsupdoc-Suplier Doc");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xponum",URL."purchasefreq/showpoentry/");
			$this->view->renderpage('purchasefreq/purchaselist', false);
		}
		
		
		function poentry(){
				
		$btn = array(
			"Clear" => URL."purchasefreq/poentry"
		);

		// form data
		$this->view->balance = "";
		
			$dynamicForm = new Dynamicform("Purchase Order From Requisition",$btn);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."purchasefreq/savepo", "Save",$this->values, URL."purchasefreq/showpost");
			
			
			$this->view->table = $this->renderTable("");
			$this->view->potable = $this->renderPoTable("");
			$this->view->renderpage('purchasefreq/poentry', false);
		}
		
		
		public function showpost(){
		//echo 123;die;
		$txnnum = $_POST['xponum'];
			
		$tblvalues=array();
		
		$btn = array(
			"New" => URL."purchasegrn/grnentryentry"
		);
		
		$tblvalues = $this->model->getPurchase($txnnum);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xponum"=>$tblvalues[0]['xponum'],
					"xgrnnum"=>"",
					"xsup"=>$tblvalues[0]['xsup'],
					"xsupname"=>$tblvalues[0]['xorg'],					
					"xitemcode"=>"",
					"xdesc"=>"",
					"xqty"=>"0",
					"xreqqty"=>"0",
					"xrow"=>"0",
					"xratepur"=>"0",
					"xwh"=>""
					);
			
		
			
		// form data
			$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Purchase Order", $btn);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."purchasefreq/savepo", "Save",$tblvalues, URL."purchasefreq/showpost");
			
			$this->view->table = $this->renderTable($txnnum);
			$this->view->potable = $this->renderPoTable("");
			
			$this->view->renderpage('purchasefreq/poentry');
		}
		
		function recdelete($ponum, $row){
			$po = $this->model->getPurchase($ponum);
			$status = "";
			if(!empty($po))
				$status = $po[0]["xstatus"];
			if($status=="Created")
				$this->model->recdelete(" WHERE xponum='".$ponum."' and xrow=".$row);
			
			$this->showpoentry($ponum);
		}
		
		
}