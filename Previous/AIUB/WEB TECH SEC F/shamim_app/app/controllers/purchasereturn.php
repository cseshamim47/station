<?php
class Purchasereturn extends Controller{
	
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
			if($menus["xsubmenu"]=="Purchase Return")
				$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/purchasereturn/js/getpoitemdt.js','views/suppliers/js/getsup.js','views/purchasereturn/js/getitemdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"xporeturnnum"=>"",
			"xsup"=>"",
			"xsupname"=>"",
			"xgrnnum"=>"",
			"xitemcode"=>"",
			"xitemdesc"=>"",
			"xqty"=>"0",
			"xextqty"=>"0",
			"xrow"=>"0",
			"xratepur"=>"0.00",
			"xtaxrate"=>"0.00",
			"xwh"=>""
			);
			
			$this->fields = array(
						array(
							"Purchase Detail-div"=>''													
							),
						array(							
							"xdate-datepicker" => 'Date_""'							
							),
						array(
							"xporeturnnum-text"=>'Return No_maxlength="20"'							
							),
						array(
							"xgrnnum-text"=>'GRN No_maxlength="20"'							
							),
						array(							
							"xsup-group_".URL."suppliers/picklist"=>'Supplier_""',						
							),
						array(							
							"xsupname-text"=>'Name_readonly'
							),
						array(
							"Item Detail-div"=>''													
							),
						array(
							"xitemcode-group_".URL."itempicklist/picklist"=>'Item Code*~star_maxlength="20"',														
							),
						array(
							"xitemdesc-text"=>'Description_readonly'						
							),
						array(
							"xqty-text_digit"=>'Qty*~star_number="true" minlength="1" maxlength="18" required'																				
							),
						array(
							"xextqty-text_digit"=>'Free Qty*~star_number="true" minlength="1" maxlength="18" required',														
							),
						array(
						"xratepur-text_number"=>'Rate*~star_number="true" minlength="1" maxlength="18" required',							
							"xrow-hidden"=>''
							),
						array(
						"xtaxrate-text_number"=>'Tax_number="true" minlength="1" maxlength="18" required'
							),
						array(
							"xwh-select_Warehouse"=>'Warehouse*~star_maxlength="50"'																		
							)	
						);
						
								
		}
		
		public function index(){		
		
		
					
			$this->view->rendermainmenu('purchasereturn/index');
			
		}
		
		
		public function save(){
				
				
					
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
				$yearoffset = Session::get('syearoffset');
				$txnnum = $_POST['xgrnnum'];
				$keyfieldval=$_POST['xporeturnnum'];
				$form = new Form();
				$data = array();
				$success=0;
				$result = ""; 
				
				//$restqty = $this->model->getSingleQty($_POST['xponum'], $_POST['xrow']);
				
				
				
				$xyear = 0;
				$xper = 0;
				//print_r($this->model->getYearPer($yearoffset,intval($month))); die;
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$xper = $key;
					$xyear = $val;
				}
				
				try{
					
					/*if(($restqty[0]['xqty']-$restqty[0]['xgrnqty'])-$_POST['xqty']<0){
						throw new Exception("Qty cannot be more than balance!");
					}
					
					if($_POST['xponum']=="" || empty($_POST['xponum'])){
						throw new Exception("Please Enter PO No!");
					}*/
					
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
						
						->post('xporeturnnum')					
						->val('maxlength', 20)
						
						->post('xgrnnum')
						
						->post('xsup')
						->val('minlength', 1)
						->val('maxlength', 20)

						->post('xsupname')
						->val('minlength', 1)
						->val('maxlength', 100)						
				
						->post('xwh')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('xrow')
						->val('minlength', 1)
						->val('maxlength', 5)
						
												
						->post('xqty')

						->post('xtaxrate')
						
						->post('xextqty')
						
						->post('xratepur');
						
				$form	->submit();
				
				$data = $form->fetch();

				
				if($data['xporeturnnum'] == "")
					$keyfieldval = $this->model->getKeyValue("poreturn","xporeturnnum","PRTN".Session::get('suserrow')."-","6");
				else
					$keyfieldval = $data['xporeturnnum'];

				$stock = $this->model->getItemStock($data['xitemcode'],$data['xwh']);

				if(!empty($stock)){
					if($stock[0]["xbalance"]<$data['xqty']){
						throw new Exception("Not enough stock! Available stock is ".$stock[0]['xbalance']."<br/>");
					}
				}else{
					throw new Exception("No stock detail found!");
				}
				
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['xporeturnnum'] = $keyfieldval;
				$data['xgrnnum'] = $txnnum;
				$data['xdate'] = $date;
				$data['xbranch'] = Session::get('sbranch');
				$data['xfinyear'] = $xyear;
				$data['xfinper'] = $xper;
				//print_r($data); die;
				$rownum = $data['xrow'];
				
				$row = $this->model->getRow("poreturndet","xporeturnnum",$data['xporeturnnum'], "xrow");

				$item = $this->model->getItemDetail($data['xitemcode']);
				
				$cols = "`bizid`,`xgrnnum`,`xporeturnnum`,`xrow`,`xitemcode`,`xitembatch`,`xqty`,`xextqty`,`xdate`,`xratepur`,`xstdcost`,`xwh`,`xbranch`,`xproj`,`xtaxrate`,`xdisc`,`xexch`,`xcur`,`xtaxcode`,`xtaxscope`,`zemail`,`xunitpur`,`xconversion`,`xunitstk`,`xrowtrn`,`xtypestk`";
				
				$vals = "(" . Session::get('sbizid') . ",'". $data['xgrnnum'] ."','". $keyfieldval ."','". $row ."','". $data['xitemcode'] ."','". $data['xitemcode'] ."',
				'". $data['xqty'] ."','". $data['xextqty'] ."','". $date ."','". $data['xratepur'] ."','". $data['xratepur'] ."','". $data['xwh'] ."','". $data['xwh'] ."','". $data['xwh'] ."','". $data['xtaxrate'] ."','0','1','".Session::get('sbizcur')."','None','".$item[0]['xunitpur']."','".$data['zemail']."','None','".$item[0]['xconversion']."','".$item[0]['xunitstk']."','".$rownum."','".$item[0]['xtypestk']."')";
				
					
				$success = $this->model->create($data, $cols, $vals);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					$this->result = 'Purchase Return Note Created</br><a style="color:red" id="invnum" href="'.URL.'purchase/printreturn/'.$keyfieldval.'">Click To Print Purchase Return Note - '.$keyfieldval.'</a>';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Purchase Return Note! Reason: Could be Duplicate Trunsaction Code or system error!";
				
				 $this->showreturnentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		public function edit(){
			
			
			$result = "";
			
			$hd = array();
			$dt = array();
			
				
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$month = date('m',strtotime($date)); 
				
			$success=false;
			$num = $_POST['xporetunnum'];
			$form = new Form();
				
				$xyear = 0;
				$xper = 0;
				$yearoffset = Session::get('syearoffset');
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$xper = $key;
					$xyear = $val;
				}
				$restqty = $this->model->getSingleQty($_POST['xgrnnum'], $_POST['xrow']);
				
				$data = array();
				
				try{
					
					
				if($_POST['xitemcode']=="" || $_POST['xitemcode']<0){
						throw new Exception("Please Enter Itemcode");
					}		
				if($_POST['xqty']=="" || $_POST['xqty']<=0){
						throw new Exception("Please Enter Quantity");
					}
					
				if($_POST['xwh']=="" || empty($_POST['xwh'])){
						throw new Exception("Please Enter Warehouse");
					}
				
				$form	->post('xitemcode')
						->val('minlength', 1)
						->val('maxlength', 20)
						
												
						->post('xsup')
						->val('minlength', 1)
						->val('maxlength', 20)

						->post('xsupname')
						->val('minlength', 1)
						->val('maxlength', 100)						
				
						->post('xwh')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('xrow')
						->val('minlength', 1)
						->val('maxlength', 5)
						
						
						->post('xqty')

						->post('xtaxrate')
						
						->post('xextqty')
						
						->post('xratepur');
						
				$form	->submit();
				
			
				
				$data = $form->fetch();	
				//print_r($data);die;

				$stock = $this->model->getItemStock($data['xitemcode'],$data['xwh']);

				if(!empty($stock)){
					if($stock[0]["xbalance"]<$data['xqty']){
						throw new Exception("Not enough stock! Available stock is ".$stock[0]['xbalance']."<br/>");
					}
				}else{
					throw new Exception("No stock detail found!");
				}
				
				$item = $this->model->getItemDetail($data['xitemcode']);

				$hd = array (
					"xemail"=>Session::get('suser'),
					"zutime"=>date("Y-m-d H:i:s"),
					"xdate"=>$date,
					"xitemcode"=>$data['xitemcode'],
					"xsup"=>$data['xsup'],
					"xwh"=>$data['xwh'],
					"xbranch"=>$data['xwh'],
					"xproj"=>$data['xwh'],
					"xfinyear" => $xyear,
					"xfinper" => $xper
					
				);
				
				$dt = array (
					"xitemcode"=>$data['xitemcode'],
					"xunitstk"=>$item[0]['xunitstk'],
					"xtypestk"=>$item[0]['xtypestk'],
					"xqty"=>$data['xqty'],
					"xextqty"=>$data['xextqty'],
					"xratepur"=>$data['xratepur'],
					"xstdcost"=>$data['xstdcost'],
					"xtaxrate"=>$data['xtaxrate'],
					"xwh"=>$data['xwh'],
					"xbranch"=>$data['xwh'],
					"xproj"=>$data['xwh'],
					"xdate"=>$date
				);
				
				$success = $this->model->edit($hd,$dt,$num,$_POST['xrow']);
				
				
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
				
				 $this->showgrnentry($grnnum, $result);
				
		
		}
		
		public function createreturnall($txnnum){
				
				$xdate = date("Y/m/d");
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$month = date('m',strtotime($date)); 
				$xyear = 0;
				$xper = 0;
				$yearoffset = Session::get('syearoffset');
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$xper = $key;
					$xyear = $val;
				}	
			
			$purchase = $this->model->getPurchase($txnnum);
			$keyfieldval="";
			$keyfieldval = $this->model->getKeyValue("poreturn","xporeturnnum","PRTN-".Session::get('suserrow')."-","6");
			
			$mstfields = "zemail,bizid,xgrnnum,xporeturnnum,xdate,xsup,xwh,xbranch,xproj,xstatus,xfinyear,xfinper";
			$mstvalues =  "'" . Session::get('suser') . "'," . Session::get('sbizid') . ",'". $keyfieldval ."','". $purchase[0]['xponum'] ."','". $date ."','". $purchase[0]['xsup'] ."',
				'". $purchase[0]['xwh'] ."','". $purchase[0]['xbranch'] ."','". $purchase[0]['xproj'] ."','Created','".$xyear."','".$xper."'";
			
			$incols = "zemail,bizid,xgrnnum,xponum,xrow,xdate,xitemcode,xitembatch,xqtypur,xextqty,xqty,xunitstk,xratepur,xstdcost,xtaxrate,xdisc,xwh,xbranch,xproj,xexch,xcur,xunitpur";
			$frmcols = "zemail,bizid,'".$keyfieldval."',xponum,xrow,xdate,xitemcode,xitembatch,xqty-xgrnqty as xqtypur,xqty as xextqty,xqty,xunitstk,xratepur,0 as xstdcost,xtaxrate,xdisc,xwh,xbranch,xproj,1 as xexch,'BDT' as xcur,xunitpur";
			$result = 0;
			$result = $this->model->creategrnall($mstfields, $mstvalues, $incols, $frmcols, "where xgrnnum='".$txnnum."' and xqty-xreturnqty>0");
			$msg = "Could not create Goods Return!";
			if($result>0)
				$msg = "Goods Return Note Created!";	
			
			$this->showreturnentry($keyfieldval);
		}
		
		
		public function show($txnnum, $row, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"New" => URL."purchasereturn/returnentry"
		);
		
		$tblvalues = $this->model->getReturn($txnnum);
		$tbldtvals = $this->model->getSingleReturnDt($txnnum, $row);
		$num = $tblvalues[0]['xgrnnum'];
		
		$status="";
		if(!empty($tblvalues))
			$status = $tblvalues[0]['xstatus']; //echo $status; die;
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xporeturnnum"=>$tblvalues[0]['xporeturnnum'],
					"xgrnnum"=>$tblvalues[0]['xgrnnum'],
					"xsup"=>$tblvalues[0]['xsup'],
					"xsupname"=>$tblvalues[0]['xorg'],
					"xsupdoc"=>$tblvalues[0]['xsupdoc'],
					"xwh"=>$tbldtvals[0]['xwh'],
					"xitemcode"=>$tbldtvals[0]['xitemcode'],
					"xitemdesc"=>$tbldtvals[0]['xitemdesc'],
					"xqty"=>$tbldtvals[0]['xqty'],
					"xextqty"=>$tbldtvals[0]['xextqty'],
					"xrow"=>$tbldtvals[0]['xrow'],
					"xratepur"=>$tbldtvals[0]['xratepur'],
					"xtaxrate"=>$tbldtvals[0]['xtaxrate'],
					"xwh"=>$tbldtvals[0]['xwh']
					);
			
		// form data
		$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Purchase Return Note", $btn, $result);
			
			$confurl = array();
			$saveurl = "";
			if($status=="Created"){
				$confurl = array(URL."purchasereturn/confirm","Confirm");
				$saveurl = URL."purchasereturn/edit/";
			}
			if($status=="Confirmed"){
				$confurl = array(URL."purchasereturn/cancel","Cancel");
				$saveurl="";
			}		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields,  $saveurl, "Update",$tblvalues, URL."purchasereturn/showpost",$confurl);
			
			$this->view->table = $this->renderTable($num);
			$this->view->grntable = $this->renderReturnTable($txnnum);
			
			$this->view->renderpage('purchasereturn/grnentry');
		}
		
		public function getsinglegrndt($txnnum, $row){
			$this->model->getSingleGrn($txnnum, $row);
		}
		
		public function showentry($txnnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."purchasereturn/returnentry"
		);
		if($result=="")
			$result='<a style="color:red" id="invnum" href="'.URL.'purchasereturn/printreturn/'.$txnnum.'">Click To Print Purchase Return Note- '.$txnnum.'</a>';
		$tblvalues = $this->model->getGrn($txnnum);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xporeturnnum"=>"",
					"xgrnnum"=>$tblvalues[0]['xgrnnum'],
					"xsup"=>$tblvalues[0]['xsup'],
					"xsupname"=>$tblvalues[0]['xorg'],					
					"xitemcode"=>"",
					"xitemdesc"=>"",
					"xqty"=>"0",
					"xextqty"=>"0",
					"xrow"=>"0",
					"xratepur"=>"0",
					"xtaxrate"=>"0",
					"xwh"=>""
					);
			$this->view->balance = "";
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Purchase Return Note", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."purchasereturn/save/", "Save",$tblvalues ,URL."purchasereturn/showpost");
			
			$this->view->table = $this->renderTable($txnnum);
			$this->view->grntable = "";
			$this->view->renderpage('purchasereturn/grnentry');
		}
		
		public function showreturnentry($txnnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."purchasereturn/returnentry"
		);
		if($result=="")
			$result='<a style="color:red" id="invnum" href="'.URL.'purchasereturn/printreturn/'.$txnnum.'">Click To Print Purchase Return Note - '.$txnnum.'</a>';
		$tblvalues = $this->model->getReturn($txnnum); //print_r($tblvalues);die;
		$num = "";
		$status="";
		if(!empty($tblvalues)){
			$num=$tblvalues[0]['xgrnnum'];
			$status=$tblvalues[0]['xstatus'];
		}
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xporeturnnum"=>$tblvalues[0]['xporeturnnum'],
					"xgrnnum"=>$tblvalues[0]['xgrnnum'],
					"xsup"=>$tblvalues[0]['xsup'],
					"xsupname"=>$tblvalues[0]['xorg'],					
					"xitemcode"=>"",
					"xitemdesc"=>"",
					"xqty"=>"0",
					"xextqty"=>"0",
					"xrow"=>"0",
					"xratepur"=>"0",
					"xtaxrate"=>"0",
					"xwh"=>""
					);
			$this->view->balance = "";
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Purchase Return Note", $btn, $result);		
			
			$confurl = array();
			$saveurl = "";
			if($status=="Created"){
				$confurl = array(URL."purchasereturn/confirm","Confirm");
				$saveurl = URL."purchasereturn/save/";
			}
			if($status=="Confirmed"){
				$confurl = array(URL."purchasereturn/cancel","Cancel");
				$saveurl="";
			}
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, $saveurl, "Save",$tblvalues ,URL."purchasereturn/showpost",$confurl);
			
			$this->view->table = $this->renderTable($num);
			$this->view->grntable = $this->renderReturnTable($txnnum);
			
			$this->view->renderpage('purchasereturn/grnentry');
		}
		
	public function confirm(){

				$voucher = "";
				$returnnum = $_POST['xporeturnnum'];				
				$sup = $_POST['xsup'];	
				$yearoffset = Session::get('syearoffset');
				$result = "";
				$postdata=array(
					"xstatus" => "Confirmed",
					"xvoucher"=>$voucher
					);				
				$where = " bizid = ". Session::get('sbizid') ." and xporeturnnum = '". $returnnum ."'";

				$rows = $this->model->getreturnForConfirm($returnnum);
				
				if(!empty($rows)){

				$glinterface = $this->model->glinterface();

				if(!empty($glinterface)){

					$xdate = date("Y/m/d");
					$dt = str_replace('/', '-', $xdate);
					$date = date('Y-m-d', strtotime($dt));
					$year = date('Y',strtotime($date));
					$month = date('m',strtotime($date)); 
						//glheader goes here
						$xyear = 0;
						$per = 0;
						//print_r($this->model->getYearPer($yearoffset,intval($month))); die;
						foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
								$per = $key;
								$xyear = $val;
							}
						$voucher = $this->model->getKeyValue("glheader","xvoucher","PRTN-","5");
						
						$data = array();

						$data['bizid'] = Session::get('sbizid');
						$data['zemail'] = Session::get('suser');
						$data['xnarration'] = "C/S! PR:".$returnnum." Sup: ".$sup."-".$_POST["xsupname"];						
						$data['xyear'] = $xyear;
						$data['xper'] = $per;
						$data['xvoucher'] = $voucher;
						$data['xdate'] = $date;
						$data['xstatusjv'] = 'Confirmed';
						$data['xbranch'] = Session::get('sbranch');;
						$data['xdoctype'] = "Purchase Return";
						$data['xdocnum'] = $returnnum;

						$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,
							`xexch`,`xprime`,xflag";

						$vals = "";	

						$i = 0;	
						foreach($glinterface as $key=>$val){
							$i++;
							$globalvar = new Globalvar();
							$amt = $globalvar->getFormula($rows,$val["xformula"]);
							
							if($val['xaction']=="Credit")
								$amt = "-".$amt;

							$acc = $this->model->getAcc($val['xacc']);
							$subacc = "";
							if($acc[0]['xaccsource']=="Supplier")
								$subacc = $rows[0]['xsup'];
							else
								$subacc = "";
							if($amt<>0)
								$vals .= "(" . Session::get('sbizid') . ",'". $voucher ."','". $i ."','". $val['xacc'] ."',
								'". $acc[0]['xacctype'] ."','". $acc[0]['xaccusage'] ."','". $acc[0]['xaccsource'] ."','". $subacc ."','".Session::get('sbizcur')."',
								'". $amt ."','1','". $amt ."','". $val['xaction'] ."'),";
						}

						$vals = rtrim($vals, ",");

						$success = $this->model->confirmgl($data, $cols, $vals);

						$this->model->confirm(" bizid=".Session::get('sbizid')." and xporeturnnum='".$_POST['xporeturnnum']."' and xstatus='Created'");

				}else{
					$this->model->confirm(" bizid=".Session::get('sbizid')." and xporeturnnum='".$_POST['xporeturnnum']."' and xstatus='Created'");
				}
				
				$tblvalues=array();
				$tblvalues = $this->model->getReturn($returnnum);
				
				$result="Confirm Failed";
				
				if($tblvalues[0]['xstatus']=="Confirmed"){
					$result='<a style="color:red" id="invnum" href="'.URL.'purchasereturn/printreturn/'.$returnnum.'">Click To Print Purchase Return Note - '.$returnnum.'</a>';
				}
			}
			
			
			$this->showreturnentry($_POST['xporeturnnum']);
		}

	public function cancel(){

			$voucher = "";
				$returnnum = $_POST['xporeturnnum'];				
				$sup = $_POST['xsup'];	
				$yearoffset = Session::get('syearoffset');
				$result = "";
				$postdata=array(
					"xstatus" => "Confirmed",
					"xvoucher"=>$voucher
					);				
				$where = " bizid = ". Session::get('sbizid') ." and xporeturnnum = '". $returnnum ."'";

				$rows = $this->model->getreturnForConfirm($returnnum);
				
				if(!empty($rows)){

				$glinterface = $this->model->glinterface();

				if(!empty($glinterface)){

					$xdate = date("Y/m/d");
					$dt = str_replace('/', '-', $xdate);
					$date = date('Y-m-d', strtotime($dt));
					$year = date('Y',strtotime($date));
					$month = date('m',strtotime($date)); 
						//glheader goes here
						$xyear = 0;
						$per = 0;
						
						foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
								$per = $key;
								$xyear = $val;
							}
						$voucher = $this->model->getKeyValue("glheader","xvoucher","PRTN-","5");
						
						$data = array();

						$data['bizid'] = Session::get('sbizid');
						$data['zemail'] = Session::get('suser');
						$data['xnarration'] = "CS! Cancelation Of PR:".$returnnum." By ".Session::get('suser')." Sup: ".$sup."-".$_POST["xsupname"];						
						$data['xyear'] = $xyear;
						$data['xper'] = $per;
						$data['xvoucher'] = $voucher;
						$data['xdate'] = $date;
						$data['xstatusjv'] = 'Confirmed';
						$data['xbranch'] = Session::get('sbranch');;
						$data['xdoctype'] = "Purchase Return";
						$data['xdocnum'] = $returnnum;

						$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,
							`xexch`,`xprime`,xflag";

						$vals = "";	

						$i = 0;	
						foreach($glinterface as $key=>$val){
							$i++;
							$globalvar = new Globalvar();
							$amt = $globalvar->getFormula($rows,$val["xformula"]);
							
							$flag = "";
							if($val['xaction']=="Credit"){
								$amt = $amt;
								$flag = "Debit";
							}else{
								$amt = "-".$amt;
								$flag = "Credit";
							}

							$acc = $this->model->getAcc($val['xacc']);
							$subacc = "";
							if($acc[0]['xaccsource']=="Supplier")
								$subacc = $rows[0]['xsup'];
							else
								$subacc = "";
							
							if($amt<>0)
								$vals .= "(" . Session::get('sbizid') . ",'". $voucher ."','". $i ."','". $val['xacc'] ."',
								'". $acc[0]['xacctype'] ."','". $acc[0]['xaccusage'] ."','". $acc[0]['xaccsource'] ."','". $subacc ."','".Session::get('sbizcur')."',
								'". $amt ."','1','". $amt ."','". $val['xaction'] ."'),";
						}

						$vals = rtrim($vals, ",");

						$success = $this->model->confirmgl($data, $cols, $vals);

						$this->model->cancel(" bizid=".Session::get('sbizid')." and xporeturnnum='".$_POST['xporeturnnum']."' and xstatus='Confirmed'");

				}else{
					$this->model->cancel(" bizid=".Session::get('sbizid')." and xporeturnnum='".$_POST['xporeturnnum']."' and xstatus='Confirmed'");
				}
				
				$tblvalues=array();
				$tblvalues = $this->model->getReturn($returnnum);
				
				$result="Cancel Failed";
				
				if($tblvalues[0]['xstatus']=="Confirmed"){
					$result='<a style="color:red" id="invnum" href="'.URL.'purchasereturn/printreturn/'.$returnnum.'">Click To Print Purchase Return Note - '.$returnnum.'</a>';
				}
			}
			
			
			$this->showreturnentry($_POST['xporeturnnum']);
		}	
			
	
	public	function renderTable($txnnum){
			$fields = array(
						"xrow-Sl",
						"xitemcode-Item Code",
						"xitemdesc-Description",
						"xqtypur-Qty",
						"xreturnqty-Return Qty",
						"xratepur-Rate",
						"xtotal-Total",	
						);
			$table = new Datatable();
			$row = $this->model->getgrndt($txnnum);
			
			return $table->myTableSubmit($fields, $row, "xrow", URL."purchasereturn/getsinglegrndt/".$txnnum."/");
						
		}
		
	public	function renderReturnTable($txnnum){
			$return = $this->model->getReturn($txnnum);
			$status = "";
			if(!empty($return))
				$status = $return[0]["xstatus"];
			
			$delurl = URL."purchasereturn/recdelete/".$txnnum."/";
			
			if($status=="Confirmed")
			{
				$delurl="";
			}			
			$fields = array(
						"xrow-Sl",
						"xitemcode-Item Code",
						"xitemdesc-Description",
						"xqtypur-Qty",
						"xratepur-Rate",
						"xtotal-Total",	
						);
			$table = new Datatable();
			$row = $this->model->getreturndt($txnnum);
			
			return $table->myTable($fields, $row, "xrow", URL."purchasereturn/show/".$txnnum."/",$delurl);
						
		}	
		
		
		function grnlist(){
			$rows = $this->model->getGrnList();
			$cols = array("xgrnnum-GRN No","xdate-Date","xsup-Supplier");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xgrnnum",URL."purchasereturn/showentry/",URL."purchasereturn/createreturnall/","Create Return");
			$this->view->renderpage('purchasereturn/purchaselist', false);
		}
		
		function returnlist($status){
			$rows = $this->model->getReturnList($status);
			$cols = array("xdate-Date","xporeturnnum-Return No","xgrnnum-GRN No","xsup-Supplier","xsupname-Name");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xporeturnnum",URL."purchasereturn/showreturnentry/");
			$this->view->renderpage('purchasereturn/purchaselist', false);
		}
		

		function returnentry(){
				
		$btn = array(
			"Clear" => URL."purchasereturn/returnentry"
		);

		// form data
		$this->view->balance = "";
		
			$dynamicForm = new Dynamicform("Purchase Return Note",$btn);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."purchasereturn/save", "Save",$this->values, URL."purchasereturn/showpost");
			
			
			$this->view->table = $this->renderTable("");
			$this->view->grntable = $this->renderReturnTable("");
			$this->view->renderpage('purchasereturn/grnentry', false);
		}
		
		
		public function showpost(){
		//echo 123;die;

		$txnnum = $_POST['xporeturnnum'];
			
		if($txnnum==""){
			$this->returnentry();
		}else
			$this->showreturnentry($txnnum);
		}

		function recdelete($returnnum, $row){
			$return = $this->model->getReturn($returnnum);
			$status = "";
			if(!empty($return))
				$status = $return[0]["xstatus"];
			if($status=="Created")
				$this->model->recdelete(" WHERE xporeturnnum='".$returnnum."' and xrow=".$row);
			
			$this->showreturnentry($returnnum);
		}
		
		function printreturn($returnno=""){
			
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li>Purchase Return Note</li>							
						   </ul>';
	   		
						
			$values = $this->model->getvreturndt($returnno);
			//print_r($values);die;
			
			
			$this->view->pono=$returnno;
			$xsup = "";
			$totqty = 0;
			$total = 0;
			$xdate="";
			$supplier="";
			$supadd="";
			$supphone="";
			$supmobile="";
			$divition="";
			$district="";
			$supdoc="";
			
			foreach($values as $key=>$val){
				$xdate=date("d-m-Y", strtotime($val['xdate']));
				$xsup = $val['xsup'];
				// $supplier=$val['xorg'];
				// $supadd=$val['xsupadd'];
				// $supphone=$val['xsupphone'];
				// $supdoc="";
				$totqty+=$val['xqty'];
				$total+=$val['xtotal'];
			}

			$supdetails = $this->model->getSupplier($xsup);
			$supplier=$supdetails[0]['xorg'];
			$supadd=$supdetails[0]['xadd1'];
			$supphone=$supdetails[0]['xphone'];
			$supmobile=$supdetails[0]['xmobile'];
			$divition=$supdetails[0]['xcity'];
			$district=$supdetails[0]['xprovince'];


			$this->view->xdate=$xdate;
			$this->view->supid=$xsup;
			$this->view->supplier=$supplier;
			$this->view->supadd=$supadd;
			$this->view->supphone=$supphone;
			$this->view->supmobile=$supmobile;
			$this->view->divition=$divition;
			$this->view->district=$district;
			$this->view->supdoc=$supdoc;			
			$this->view->totqty=$totqty;
			$this->view->total=$total;
			
			$cur = new Currency();
			$this->view->inword="In Words: ". $cur->get_bd_amount_in_text($total);
			$this->view->vrow = $values;
			
			$this->view->vrptname = "Purchase Return Note";
			$this->view->org=Session::get('sbizlong');
			
			$this->view->renderpage('purchasereturn/printreturn');		
		}
}