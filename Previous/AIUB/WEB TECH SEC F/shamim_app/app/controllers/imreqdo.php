<?php
class Imreqdo extends Controller{
	
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
				if($menus["xsubmenu"]=="Delivery Order")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/imreqdo/js/getreqitemdt.js','views/imreqdo/js/getitemdt.js','views/imreqdo/js/getaccdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"xreqdelnum"=>"",
			"xcus"=>"",
			"xorg"=>"",
			"xgrossdisc"=>"0",
			"xsonum"=>"",	
			"xitemcode"=>"",
			"xdesc"=>"",
			"xqty"=>"0",
			"xrate"=>"0",
			"xrow"=>"0",
			"xtaxrate"=>"0",
			"xdisc"=>"0",	
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
							"xreqdelnum-text"=>'DO No_maxlength="20"'							
							),
						array(							
							"xsonum-text"=>'Order No_maxlength="20" readonly'	
							),
						array(							
							"xcus-group_".URL."jsondata/customerpicklist"=>'Customer Code*~star_maxlength="20"',
							),
						array(							
							"xorg-text"=>'Name_readonly'
							),
						array(							
							"xgrossdisc-text_digit"=>'Gross Discount_number="true" minlength="1" maxlength="18" required',
							),
						array(
							"xwh-select_Warehouse"=>'Warehouse*~star_maxlength="50"'																		
							),
						array(
							"Item Detail-div"=>''													
							),
						array(
							"xitemcode-group_".URL."itempicklist/picklist"=>'Item Code*~star_maxlength="20"',							
							),
						array(
							"xdesc-text"=>'Description_readonly'						
							),
						array(
							"xqty-text_digit"=>'Qty*~star_number="true" minlength="1" maxlength="18" required',
							"xrow-hidden"=>''	
							),
						array(
							"xrate-text_digit"=>'Rate_number="true" minlength="1" maxlength="18" required',
							
							),
						array(
							"xtaxrate-text_digit"=>'Tax/VAT_number="true" minlength="1" maxlength="18" required',
							
							),
						array(
							"xdisc-text_digit"=>'Discount_number="true" minlength="1" maxlength="18" required',							
							)
						);
														
		}
		
		public function index(){		
		
		$btn = array(
			"Clear" => URL."imreqdo/doentry",
		);	
		
					
			$this->view->rendermainmenu('imreqdo/index');
			
		}
		
		
		public function savedo(){
				
				
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
				$yearoffset = Session::get('syearoffset');
				$txnnum = $_POST['xreqdelnum'];
				$keyfieldval=$_POST['xreqdelnum'];
				$form = new Form();
				$data = array();
				$success=0;
				$result = ""; 
								
				
				$xyear = 0;
				$xper = 0;
				//print_r($this->model->getYearPer($yearoffset,intval($month))); die;
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$xper = $key;
					$xyear = $val;
				}
				
				try{
					
					
				if($_POST['xcus']=="" || empty($_POST['xcus'])){
						throw new Exception("Please Enter RIN!");
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
						
						->post('xreqdelnum')
						->val('maxlength', 20)
						
						->post('xsonum')
						->val('maxlength', 20)
												
						->post('xcus')
						->val('minlength', 1)
						->val('maxlength', 20)

						->post('xorg')
						->val('minlength', 1)
						->val('maxlength', 100)	

						->post('xgrossdisc')					
				
						->post('xwh')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('xrow')
						->val('minlength', 1)
						->val('maxlength', 5)
												
						->post('xqty')

						->post('xrate')

						->post('xtaxrate')
						
						->post('xdisc');

						
				$form	->submit();
				
				
					
				
				$data = $form->fetch();
				

				$itemdetail = $this->model->getItemDetail($data['xitemcode']);
				
				$itemcost = $this->model->getItemcost($data['xitemcode']);
				

				$cost = $itemdetail[0]['xstdcost'];
				
				if(!empty($itemcost)){
					
					$cost = $itemcost[0]['avgcost'];
				}	


				if($data['xreqdelnum'] == "")
					$keyfieldval = $this->model->getKeyValue("imreqdelmst","xreqdelnum","RQDO".Session::get('suserrow')."-","6");
				else
					$keyfieldval = $data['xreqdelnum'];

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
				$data['xreqdelnum'] = $keyfieldval;
				$data['xdate'] = $date;
				$data['xbranch'] = Session::get('sbranch');				
				$data['xfinyear'] = $xyear;
				$data['xfinper'] = $xper;
				$data['xsalesdate'] = $date;
				
				$rownum = $data['xrow'];

				
				$row = $this->model->getRow("imreqdeldet","xreqdelnum",$data['xreqdelnum'], "xrow");
				$item = $this->model->getItemDetail($data['xitemcode']);
				
				
				$cols = "`bizid`,`xreqdelnum`,`xsonum`,`xcus`,`xrow`,`xitemcode`,`xitembatch`,`xqty`,`xdate`,`xratepur`,`xwh`,`xbranch`,`xproj`,`xunit`,`zemail`,`xrowtrn`,`xstdcost`,`xtaxrate`,`xdisc`,`xrate`,`xtypestk`";
				
				$vals = "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $data['xsonum'] ."','". $data['xcus'] ."','". $row ."','". $data['xitemcode'] ."','". $data['xitemcode'] ."',
				'". $data['xqty'] ."','". $date ."','". $item[0]['xpricepur'] ."','". $data['xwh'] ."','". $data['xwh'] ."','". $data['xwh'] ."','".$item[0]['xunitstk']."','".Session::get('suser')."','".$rownum."','".$cost."','". $data['xtaxrate'] ."','". $data['xdisc'] ."','". $data['xrate'] ."','".$item[0]['xtypestk']."')";
				
									
				$success = $this->model->create($data, $cols, $vals);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					$this->result = 'Delivery Order Created</br><a style="color:red" id="invnum" href="'.URL.'imreqdo/printdo/'.$keyfieldval.'">Print Delivery Order - '.$keyfieldval.'</a></br><a style="color:red" id="invnum" href="'.URL.'imreqdo/printchalan/'.$keyfieldval.'">Print Delivery Chalan - '.$keyfieldval.'</a>';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Delivery Order! Reason: Could be Duplicate Trunsaction Code or system error!";
				
				 $this->showdoentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		public function editdo(){
			
			
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
			$donum = $_POST['xreqdelnum'];
			$form = new Form();
				$data = array();
				
				try{
				
				
				$form	->post('xitemcode')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xreqdelnum')	
						
						->post('xcus')
						->val('minlength', 1)
						->val('maxlength', 20)

						->post('xorg')
						->val('minlength', 1)
						->val('maxlength', 100)						
				
						->post('xwh')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('xgrossdisc')

						->post('xqty')

						->post('xrate')

						->post('xtaxrate')
						
						->post('xdisc');
						
						
				$form	->submit();
				
			
				
				$data = $form->fetch();	
				
				$item = $this->model->getItem($data['xitemcode']);


				$stock = $this->model->getItemStock($data['xitemcode'],$data['xwh']);

				if(!empty($stock)){
					if($stock[0]["xbalance"]<$data['xqty']){
						throw new Exception("Not enough stock! Available stock is ".$stock[0]['xbalance']."<br/>");
					}
				}else{
					throw new Exception("No stock detail found!");
				}


				
				$itemcost = $this->model->getItemcost($data['xitemcode']);
				

				$cost = $item[0]['xstdcost'];
				
				if(!empty($itemcost)){
					
					$cost = $itemcost[0]['avgcost'];
				}	
						
				$hd = array (
					"xemail"=>Session::get('suser'),
					"zutime"=>date("Y-m-d H:i:s"),
					"xdate"=>$date,
					"xcus"=>$data['xcus'],
					"xgrossdisc"=>$data['xgrossdisc'],
					"xwh"=>$data['xwh'],
					"xbranch"=>$data['xwh'],
					"xproj"=>$data['xwh'],
					"xfinyear" => $xyear,
					"xfinper" => $xper					
				);
				
				$dt = array (
					"xitemcode"=>$data['xitemcode'],
					"xqty"=>$data['xqty'],
					"xtaxrate"=>$data['xtaxrate'],
					"xdisc"=>$data['xdisc'],
					"xrate"=>str_replace(",","",$data['xrate']),
					"xratepur"=>$item[0]['xpricepur'],
					"xwh"=>$data['xwh'],
					"xbranch"=>$data['xwh'],
					"xproj"=>$data['xwh'],
					"xdate"=>$date,
					"xstdcost"=>$cost,
					"xunit"=>$item[0]['xunitpur'],
					"xtypestk"=>$item[0]['xtypestk']
				);
				
				$success = $this->model->edit($hd,$dt,$donum,$_POST['xrow'],$_POST['xitemcode']);
				
				
				}catch(Exception $e){
					
					$result = $e->getMessage();
					
				}
				if($result==""){
				if($success)
					$result = "Edited successfully";
				else
					$result = "Edit failed!";				
				}
				
				 $this->showdoentry($donum, $result.'<br /><a style="color:red" id="invnum" href="'.URL.'imreqdo/printdo/'.$donum.'">Print Delivery Order - '.$donum.'</a><br/><a style="color:red" id="invnum" href="'.URL.'imreqdo/printchalan/'.$donum.'">Print Delivery Chalan - '.$donum.'</a>');
					
		
		}
		
		
		public function show($txnnum, $row, $result=""){
		if($txnnum=="" || $row==""){
			header ('location: '.URL.'imreqdo/doentry');
			exit;
		}

		if($result=="")
			$result='<a style="color:red" id="invnum" href="'.URL.'imreqdo/printdo/'.$txnnum.'">Print Delivery Order - '.$txnnum.'</a><br/><a style="color:red" id="invnum" href="'.URL.'imreqdo/printchalan/'.$txnnum.'">Print Delivery Chalan - '.$txnnum.'</a>';	

		$tblvalues=array();
		$btn = array(
			"New" => URL."imreqdo/doentry"
		);
		
		
		$tblvalues = $this->model->getDelivery($txnnum);
		$tbldtvals = $this->model->getSingleDeliveryDt($txnnum, $row);
		
		$status="";
		if(!empty($tblvalues)){
			$status = $tblvalues[0]['xstatus']; //echo $status; die;
			
		}
		$sonum="";
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else{
			$sonum=$tbldtvals[0]['xsonum'];
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xreqdelnum"=>$tblvalues[0]['xreqdelnum'],
					"xcus"=>$tblvalues[0]['xcus'],
					"xorg"=>$tblvalues[0]['xorg'],
					"xgrossdisc"=>$tblvalues[0]['xgrossdisc'],
					"xwh"=>$tblvalues[0]['xwh'],
					"xsonum"=>$tbldtvals[0]['xsonum'],
					"xitemcode"=>$tbldtvals[0]['xitemcode'],
					"xdesc"=>$tbldtvals[0]['xdesc'],
					"xqty"=>$tbldtvals[0]['xqty'],
					"xrate"=>$tbldtvals[0]['xrate'],
					"xtaxrate"=>$tbldtvals[0]['xtaxrate'],
					"xdisc"=>$tbldtvals[0]['xdisc'],
					"xrow"=>$tbldtvals[0]['xrow']
					);
		}
			
		// form data
			$confurl = "";
			$saveurl = "";
			if($status=="Created"){
				$confurl = array(URL."imreqdo/confirmdo", "Confirm");
				$saveurl = URL."imreqdo/editdo/";
			}
			if($status=="Confirmed"){
				$confurl = array(URL."imreqdo/canceldo", "Cancel");
				$saveurl="";
			}
		$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Delivery Order", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, $saveurl, "Update",$tblvalues, URL."imreqdo/showpost");
			
			$this->view->table = $this->renderTable($sonum);
			$this->view->potable = $this->renderDoTable($txnnum);;
			
			$this->view->renderpage('imreqdo/doentry');
		}
		
		public function getsinglereq($sl){
			$this->model->getSingleQty($sl);
		}
		
		public function showentry($txnnum, $result=""){

		
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."imreqdo/doentry"
		);
		
		$tblvalues = $this->model->getSalesheader($txnnum);
		$dt = date("Y/m/d");
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$dt,
					"xreqdelnum"=>"",
					"xsonum"=>$tblvalues[0]['xsonum'],
					"xcus"=>$tblvalues[0]['xcus'],
					"xorg"=>$tblvalues[0]['xorg'],
					"xgrossdisc"=>$tblvalues[0]['xgrossdisc'],
					"xwh"=>"",
					"ximreqnum"=>"",
					"xitemcode"=>"",
					"xdesc"=>"",
					"xqty"=>"0",
					"xrate"=>"0",
					"xtaxrate"=>"0",
					"xdisc"=>"0",
					"xrow"=>"0"
					);
			$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Delivery Order From Requisition", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."imreqdo/savedo/", "Save",$tblvalues ,URL."imreqdo/showpost");
			
			$this->view->table = $this->renderTable($txnnum);
			$this->view->potable = "";
			$this->view->renderpage('imreqdo/doentry');
		}
		
		public function showdoentry($txnnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."imreqdo/doentry"
		);
		if($result=="")
			$result='<a style="color:red" id="invnum" href="'.URL.'imreqdo/printdo/'.$txnnum.'">Print Delivery Order - '.$txnnum.'</a><br/><a style="color:red" id="invnum" href="'.URL.'imreqdo/printchalan/'.$txnnum.'">Print Delivery Chalan - '.$txnnum.'</a>';
		$tblvalues = $this->model->getDelivery($txnnum);
		$sonum = "";
		$status="";
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else{
			$sonum = $tblvalues[0]['xsonum'];
			$status=$tblvalues[0]['xstatus'];
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xreqdelnum"=>$tblvalues[0]['xreqdelnum'],
					"xsonum"=>$tblvalues[0]['xsonum'],
					"xcus"=>$tblvalues[0]['xcus'],
					"xorg"=>$tblvalues[0]['xorg'],
					"xgrossdisc"=>$tblvalues[0]['xgrossdisc'],
					"xwh"=>$tblvalues[0]['xwh'],
					"ximreqnum"=>"",
					"xitemcode"=>"",
					"xdesc"=>"",
					"xqty"=>"0",
					"xrate"=>"0",
					"xtaxrate"=>"0",
					"xdisc"=>"0",
					"xrow"=>"0"
					);
		}
			$this->view->balance = "";
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Delivery Chalan", $btn, $result);		
			$confurl = "";
			$saveurl = "";
			if($status=="Created"){
				$confurl = array(URL."imreqdo/confirmdo", "Confirm");
				$saveurl = URL."imreqdo/savedo";
			}
			if($status=="Confirmed"){
				$confurl = array(URL."imreqdo/canceldo", "Cancel");
				$saveurl="";
			}
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, $saveurl, "Save",$tblvalues ,URL."imreqdo/showpost",$confurl);
			
			$this->view->table = $this->renderTable($sonum);
			$this->view->potable = $this->renderDoTable($txnnum);
			$this->view->renderpage('imreqdo/doentry');
		}
		
	public function confirmdo(){

				$voucher = "";
				$donum = $_POST['xreqdelnum'];
				$disc = $_POST['xgrossdisc'];
				$cus = $_POST['xcus'];	
				$yearoffset = Session::get('syearoffset');
				$result = "";
				$postdata=array(
					"xstatus" => "Confirmed",
					"xgrossdisc"=>$disc
					);				
				$where = " bizid = ". Session::get('sbizid') ." and xreqdelnum = '". $donum ."'";

				$rows = $this->model->getdoForConfirm($donum);

				if(!empty($rows)){

				$glinterface = $this->model->gldointerface();

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
						$voucher = $this->model->getKeyValue("glheader","xvoucher","DOVU".Session::get('suserrow')."-","6");
						
						$data = array();

						$data['bizid'] = Session::get('sbizid');
						$data['zemail'] = Session::get('suser');
						$data['xnarration'] = "Created by system! Delivery Order:".$donum." Customer: ".$cus."-".$_POST["xorg"];
						$data['xyear'] = $xyear;
						$data['xper'] = $per;
						$data['xvoucher'] = $voucher;
						$data['xdate'] = $date;
						$data['xstatusjv'] = 'Confirmed';
						$data['xbranch'] = Session::get('sbranch');;
						$data['xdoctype'] = "Delivery Order";
						$data['xdocnum'] = $donum;

						$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,
							`xexch`,`xprime`,xflag";

						$vals = "";	
						$globalvar = new Globalvar();
						$i = 0;	
						foreach($glinterface as $key=>$val){
							$i++;
							$amt = $globalvar->getFormula($rows,$val["xformula"], $rows[0]['xgrossdisc']);
							
							if($val['xaction']=="Credit")
								$amt = "-".$amt;

							$acc = $this->model->getAcc($val['xacc']);
							$subacc = "";
							if($acc[0]['xaccsource']=="Customer")
								$subacc = $rows[0]['xcus'];
							else
								$subacc = "";
							if($amt<>0)
								$vals .= "(" . Session::get('sbizid') . ",'". $voucher ."','". $i ."','". $val['xacc'] ."',
								'". $acc[0]['xacctype'] ."','". $acc[0]['xaccusage'] ."','". $acc[0]['xaccsource'] ."','". $subacc ."','".Session::get('sbizcur')."',
								'". $amt ."','1','". $amt ."','". $val['xaction'] ."'),";
						}

						$vals = rtrim($vals, ",");

						$success = $this->model->confirmgl($data, $cols, $vals);

						$this->model->confirm(" bizid=".Session::get('sbizid')." and xreqdelnum='".$_POST['xreqdelnum']."' and xstatus='Created'");

				}else{
					$this->model->confirm(" bizid=".Session::get('sbizid')." and xreqdelnum='".$_POST['xreqdelnum']."' and xstatus='Created'");
				}
				
				$tblvalues=array();
				$tblvalues = $this->model->getDelivery($donum);
				
				$result="Confirm Failed";
				
				if($tblvalues[0]['xstatus']=="Confirmed"){
					$result='Confirmed!<a style="color:red" id="invnum" href="'.URL.'imreqdo/printdo/'.$donum.'">Print Delivery Order - '.$donum.'</a><br/><a style="color:red" id="invnum" href="'.URL.'imreqdo/printchalan/'.$donum.'">Print Delivery Chalan - '.$donum.'</a>';
				}
			}
			
			
			$this->showdoentry($_POST['xreqdelnum']);
		}

	public function canceldo(){

			$voucher = "";
				$donum = $_POST['xreqdelnum'];
				$disc = $_POST['xgrossdisc'];
				$cus = $_POST['xcus'];	
				$yearoffset = Session::get('syearoffset');
				$result = "";
				$postdata=array(
					"xstatus" => "Confirmed",
					"xgrossdisc"=>$disc
					);				
				$where = " bizid = ". Session::get('sbizid') ." and xreqdelnum = '". $donum ."'";

				$rows = $this->model->getdoForConfirm($donum);

				if(!empty($rows)){

				$glinterface = $this->model->gldointerface();

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
						$voucher = $this->model->getKeyValue("glheader","xvoucher","DOVU".Session::get('suserrow')."-","6");
						
						$data = array();

						$data['bizid'] = Session::get('sbizid');
						$data['zemail'] = Session::get('suser');
						$data['xnarration'] = "Created by system! Delivery Order:".$donum." Customer: ".$cus."-".$_POST["xorg"];
						$data['xyear'] = $xyear;
						$data['xper'] = $per;
						$data['xvoucher'] = $voucher;
						$data['xdate'] = $date;
						$data['xstatusjv'] = 'Confirmed';
						$data['xbranch'] = Session::get('sbranch');;
						$data['xdoctype'] = "Delivery Order";
						$data['xdocnum'] = $donum;

						$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,
							`xexch`,`xprime`,xflag";

						$vals = "";	
						$globalvar = new Globalvar();
						$i = 0;	
						foreach($glinterface as $key=>$val){
							$i++;
							$amt = $globalvar->getFormula($rows,$val["xformula"], $rows[0]['xgrossdisc']);
							
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
							if($acc[0]['xaccsource']=="Customer")
								$subacc = $rows[0]['xcus'];
							else
								$subacc = "";
							if($amt<>0)
								$vals .= "(" . Session::get('sbizid') . ",'". $voucher ."','". $i ."','". $val['xacc'] ."',
								'". $acc[0]['xacctype'] ."','". $acc[0]['xaccusage'] ."','". $acc[0]['xaccsource'] ."','". $subacc ."','".Session::get('sbizcur')."',
								'". $amt ."','1','". $amt ."','". $val['xaction'] ."'),";
						}

						$vals = rtrim($vals, ",");

						$success = $this->model->confirmgl($data, $cols, $vals);

						$this->model->cancel(" bizid=".Session::get('sbizid')." and xreqdelnum='".$_POST['xreqdelnum']."' and xstatus='Confirmed'");

				}else{
					$this->model->cancel(" bizid=".Session::get('sbizid')." and xreqdelnum='".$_POST['xreqdelnum']."' and xstatus='Confirmed'");
				}
				
				$tblvalues=array();
				$tblvalues = $this->model->getDelivery($donum);
				
				$result="Cancel Failed";
				
				if($tblvalues[0]['xstatus']=="Confirmed"){
					$result='Cancel Done!<a style="color:red" id="invnum" href="'.URL.'imreqdo/printdo/'.$donum.'">Print Delivery Order - '.$donum.'</a><br/><a style="color:red" id="invnum" href="'.URL.'imreqdo/printchalan/'.$donum.'">Print Delivery Chalan - '.$donum.'</a>';
				}
			}
			
			
			$this->showdoentry($_POST['xreqdelnum']);
		}	
			
	
	public	function renderTable($txnnum){
		
			$fields = array(												
						"sosl-Txn",						
						"xitemcode-Item Code",
						"xitemdesc-Description",
						"xqty-Qty",
						"xdoqty-DO Qty"	
						);
						
			$table = new Datatable();
			$row = $this->model->getreqdt($txnnum);
			
			return $table->myTableSubmit($fields, $row, "sosl", URL."imreqdo/getsinglereq/");
						
		}
		
	public	function renderDoTable($txnnum){
			$pur = $this->model->getDelivery($txnnum);
			$status = "";
			if(!empty($pur))
				$status = $pur[0]["xstatus"];
			
			$delurl = URL."imreqdo/recdelete/".$txnnum."/";
			
			if($status=="Confirmed")
			{
				$delurl="";
			}
			//$tblvalues = $this->model->getDelivery($txnnum);
			$row = $this->model->getdeliverydt($txnnum);
			
			$table = '<table class="table table-striped table-bordered">';
				$table .='<thead>
							<th></th><th></th><th>Sl.</th><th>Itemcode</th><th>Description</th><th style="text-align:right">Rate</th><th style="text-align:right">Qty</th><th>UOM</th><th style="text-align:right">Tax</th><th style="text-align:right">Discount</th><th style="text-align:right">Total</th>
						</thead>';
						$totalqty = 0;
						$total = 0;
						$totaltax = 0;
						$totaldisc = 0;
						$table .='<tbody>';

						foreach($row as $key=>$val){
							$showurl = URL."imreqdo/show/".$txnnum."/".$val['xrow'];
							$table .='<tr>';
							
							$table.='<td><a class="btn btn-info" id="btnshow" href="'.$showurl.'" role="button">Show</a></td>';
							if($delurl!="")
								$table.='<td><a id="delbtn" class="btn btn-danger" href="'.$delurl."/".$val['xrow'].'" role="button">Delete</a></td>';
							else
								$table.='<td></td>';

								$table .= "<td>".$val['xrow']."</td>";
								$table .= "<td>".$val['xitemcode']."</td>";
								$table .= "<td>".$val['xitemdesc']."</td>";
								$table .='<td align="right">'.$val['xrate'].'</td>';		
								$table .='<td align="right">'.$val['xqty'].'</td>';
								$table .='<td>'.$val['xunit'].'</td>';
								$table .='<td align="right">'.$val['xtaxamt'].'</td>';
								$table .='<td align="right">'.$val['xdiscamt'].'</td>';
								$table .='<td align="right">'.$val['xtotal'].'</td>';
								$total+=$val['xtotal'];
								$totalqty+=	$val['xqty'];
								$totaltax +=$val['xtaxamt'];
								$totaldisc+= $val['xdiscamt'];
								
							$table .="</tr>";
						}
							$table .='<tr><td align="right" colspan="6"><strong>Total</strong></td><td align="right"><strong>'.$totalqty.'</strong></td><td></td><td align="right"><strong>'.$totaltax.'</strong></td><td align="right"><strong>'.$totaldisc.'</strong></td><td align="right"><strong>'.$total.'</strong></td></tr>';
							$net=0;
							if(!empty($row)){
								$table .='<tr><td align="right" colspan="10"><strong>Fixed Discount</strong></td><td align="right"><strong>'.$row[0]["xgrossdisc"].'</strong></td></tr>';
								
								$net = $total-$row[0]["xgrossdisc"];
							}
							$table .='<tr><td align="right" colspan="10"><strong>Net Total</strong></td><td align="right"><strong>'.$net.'</strong></td></tr>';
							 	
					$table .="</tbody>";			
			$table .= "</table>";
			
			return $table;
		}	
		
		
		function reqlist(){
			$rows = $this->model->getReqList();
			$cols = array("xsonum-Sales Order","xdate-Date","xcus-Customer No","xorg-Name");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xsonum",URL."imreqdo/showentry/",URL."imreqdo/createdelivery/","Create DO All");
			$this->view->renderpage('imreqdo/list', false);
		}
		
		
		function dolist(){
			$rows = $this->model->getDeliveryList("Confirmed");
			$cols = array("xdate-Date","xreqdelnum-DO No","xsonum-Order No","xcus-Customer No","xorg-Name");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xreqdelnum",URL."imreqdo/showdoentry/");
			$this->view->renderpage('imreqdo/deliverylist', false);
		}
		function unconfirmedlist(){
			$rows = $this->model->getDeliveryList("Created");
			$cols = array("xdate-Date","xreqdelnum-DO No","xsonum-Order No","xcus-Customer No","xorg-Name");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xreqdelnum",URL."imreqdo/showdoentry/");
			$this->view->renderpage('imreqdo/deliverylist', false);
		}
		
		
		function doentry(){
				
		$btn = array(
			"Clear" => URL."imreqdo/doentry"
		);

		// form data
		$this->view->balance = "";
		
			$dynamicForm = new Dynamicform("Delivery Chalan From Requisition",$btn);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."imreqdo/savedo", "Save",$this->values, URL."imreqdo/showpost");
			
			
			$this->view->table = $this->renderTable("");
			$this->view->potable = $this->renderDoTable("");
			$this->view->renderpage('imreqdo/doentry', false);
		}
		
		
		public function showpost(){
			
			$txnnum = $_POST['xreqdelnum'];
			$this->showdoentry($txnnum);
		}
		
		function recdelete($txnnum, $row){
			$do = $this->model->getDelivery($txnnum);
			$status = "";
			if(!empty($do))
				$status = $do[0]["xstatus"];
			if($status=="Created")
				$this->model->recdelete(" WHERE xreqdelnum='".$txnnum."' and xrow=".$row);
			
			$this->showdoentry($txnnum);
		}
		function printdo($dono=""){
			
			$values = $this->model->getvdodt($dono);
			//print_r($values);die;
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li>Delivery Order</li>							
						   </ul>';
			
			$this->view->dono=$dono;
			$totqty = 0;			
			$xdate="";
			$xcus="";
			$xorg="";
			$xadd="";
			$xmobile="";
			$grossdisc=0;
			
			$taxamt = 0;
			$discamt = 0;
			$total = 0;
			
			foreach($values as $key=>$val){
				$xdate=$val['xdate'];
				$xcus=$val['xcus'];
				$xorg=$val['xorg'];
				$xadd=$val['xadd'];
				$xmobile=$val['xmobile'];				
				$totqty+=$val['xqty'];
				$taxamt+=$val['xtaxamt'];
				$discamt+=$val['xdiscamt'];
				$total +=($val['xqty']*$val['xrate'])+$val['xtaxamt']-$val['xdiscamt'];
				$grossdisc=$val['xgrossdisc'];	
			}
			$this->view->xdate=$xdate;
			$this->view->xcus=$xcus;
			$this->view->xorg=$xorg;
			$this->view->xadd=$xadd;
			$this->view->xmobile=$xmobile;
			$this->view->grossdisc=$grossdisc;
			$this->view->taxamt=$taxamt;
			$this->view->discamt=$discamt;
			$this->view->total=$total;
					
			$this->view->totqty=$totqty;
			
			
			$cur = new Currency();
			
			$this->view->vrow = $values;
			
			$this->view->vrptname = "Delivery Order";
			$this->view->org=Session::get('sbizlong');
			$this->view->add=Session::get('sbizadd');
			
			$this->view->renderpage('imreqdo/printdo');		
		}

		function printchalan($dono=""){
			
			$values = $this->model->getvdodt($dono);
			//print_r($values);die;
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li>Delivery Chalan</li>							
						   </ul>';
			
			$this->view->dono=$dono;
			$totqty = 0;			
			$xdate="";
			$xcus="";
			$xorg="";
			$xadd="";
			$xmobile="";
			
			
			foreach($values as $key=>$val){
				$xdate=$val['xdate'];
				$xcus=$val['xcus'];
				$xorg=$val['xorg'];
				$xadd=$val['xadd'];
				$xmobile=$val['xmobile'];				
				$totqty+=$val['xqty'];
				
			}
			$this->view->xdate=$xdate;
			$this->view->xcus=$xcus;
			$this->view->xorg=$xorg;
			$this->view->xadd=$xadd;
			$this->view->xmobile=$xmobile;
			
					
			$this->view->totqty=$totqty;
			
			
			$cur = new Currency();
			
			$this->view->vrow = $values;
			
			$this->view->vrptname = "Delivery Chalan";
			$this->view->org=Session::get('sbizlong');
			$this->view->add=Session::get('sbizadd');
			
			$this->view->renderpage('imreqdo/printchalan');		
		}

		function createdelivery($txnnum){
			$sonum = $txnnum;
			$yearoffset = Session::get('syearoffset');
			$dt = date("Y/m/d"); 
			$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
			$xyear = 0;
			$per = 0;	
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$per = $key;
					$xyear = $val;
				}	
				
			
			//$voucher = $this->model->getKeyValue("imreqdelmst","xvoucher","SINV".Session::get('suserrow')."-","6");
			$keyfieldval = $this->model->getKeyValue("imreqdelmst","xreqdelnum","SODO","6");
			$tblvalues = $this->model->getSales($sonum);
			$detail = $this->model->getvsalesdt($sonum);
			$data = array();
			$data['bizid']=Session::get('sbizid');
			$data['xreqdelnum']=$keyfieldval;			
			$data['xwh']=$tblvalues[0]['xwh'];
			$data['xbranch']=Session::get('sbranch');
			$data['xproj']=Session::get('sbranch');
			$data['xstatus']="Created";
			$data['xdate']=$date;
			$data['xsalesdate']=$tblvalues[0]['xdate'];
			$data['zemail']=Session::get('suser');
			$data['xcus']=$tblvalues[0]['xcus'];
			
			$data['xsonum']=$tblvalues[0]['xsonum'];
			$data['xgrossdisc']=$tblvalues[0]['xgrossdisc'];
			$data['xfinyear']=$xyear;
			$data['xfinper']=$per;
			
			
			
			$cols = "`bizid`,`xreqdelnum`,`xsonum`,`xrowtrn`,`xrow`,`xitemcode`,`xitembatch`,`xqty`,`xdate`,`xrate`,`xratepur`,`xwh`,`xbranch`,`xproj`,`xtaxrate`,`xdisc`,`xexch`,`xcur`,`xtaxcode`,`xtaxscope`,`zemail`,`xunit`,`xcus`,`xstdcost`,`xtypestk`";
			
			$vals =	"";
			$i=0; //print_r($detail); die;
			foreach($detail as $key=>$value){
			$itemcost = $this->model->getItemcost($value['xitemcode']);
				

				$cost = 0;
				
				if(!empty($itemcost)){
					
					$cost = $itemcost[0]['avgcost'];
				}	
			$i++;	
				
				$vals .= "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $value['xsonum'] ."',". $value['xrow'] .",". $i .",'". $value['xitemcode'] ."','". $value['xitemcode'] ."',
				'". $value['xqty'] ."','". $date ."','". $value['xrate'] ."','0','". $value['xwh'] ."','". Session::get('sbranch') ."','". Session::get('sbranch') ."','". $value['xtaxrate'] ."','". $value['xdisc'] ."',". $value['xexch'] .",'". $value['xcur'] ."','". $value['xtaxcode'] ."','". $value['xtaxscope'] ."','".$value['zemail']."','". $value['xunitsale'] ."','". $value['xcus'] ."',".$cost.",'". $value['xtypestk'] ."'),";
				
			}
			
			$vals = rtrim($vals,",");
			
			$success = 0;
			
			$result = "";
			try{
			
			$success=$this->model->savedelivery($data,$cols,$vals);
			
			}catch(Exception $e){
				$$this->result = $e->getMessage();
			}
			if($success>0)
					$this->result = 'Delivery Order Created</br><a style="color:red" id="invnum" href="'.URL.'imreqdo/printdo/'.$keyfieldval.'">Print Delivery Order - '.$keyfieldval.'</a></br><a style="color:red" id="invnum" href="'.URL.'imreqdo/printchalan/'.$keyfieldval.'">Print Delivery Chalan - '.$keyfieldval.'</a>';
				
			if($success == 0 && empty($this->result))
				$this->result = "Failed to Create Sales Order! Reason: Could be Duplicate Account Code or system error!";
			
			header ('location: '.URL.'imreqdo/showdoentry/'.$keyfieldval);
		}
		
}