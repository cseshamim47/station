<?php
class Imreturn extends Controller{
	
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
				if($menus["xsubmenu"]=="Delivery Return")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/imreturn/js/getreqitemdt.js','views/imreturn/js/getitemdt.js','views/imreturn/js/getaccdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"xreqdelnum"=>"",
			"xcus"=>"",
			"xorg"=>"",
			"xdoreturnnum"=>"",	
			"xitemcode"=>"",
			"xdesc"=>"",
			"xqty"=>"0",
			"xrow"=>"0",
			"xwh"=>"",
			"xrate"=>"0",
			"xtaxrate"=>"0"
			);
			
			$this->fields = array(
						array(
							"Purchase Detail-div"=>''													
							),
						array(							
							"xdate-datepicker" => 'Date_""'							
							),
						array(							
							"xdoreturnnum-text"=>'Return No_maxlength="20" readonly'	
							),
						array(
							"xreqdelnum-text"=>'DO No_maxlength="20"'							
							),
						array(							
							"xcus-group_".URL."jsondata/customerpicklist"=>'Customer Code*~star_maxlength="20"',
							),
						array(							
							"xorg-text"=>'Name_readonly'
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
							"xqty-text_number"=>'Qty*~star_number="true" minlength="1" maxlength="18" required',
								
							),
						array(
							"xrate-text_number"=>'Rate_number="true" minlength="1" maxlength="18" required',
							"xrow-hidden"=>''	
							)
							,
						array(
							"xtaxrate-text_number"=>'Tax_number="true" minlength="1" maxlength="18" required',
							
							)
						);
														
		}
		
		public function index(){		
				
			$this->view->rendermainmenu('imreturn/index');
			
		}
		
		
		public function save(){
				
				
			$xdate = $_POST['xdate'];
			$dt = str_replace('/', '-', $xdate);
			$date = date('Y-m-d', strtotime($dt));
			$year = date('Y',strtotime($date));
			$month = date('m',strtotime($date)); 
			$yearoffset = Session::get('syearoffset');
			$txnnum = $_POST['xdoreturnnum'];
			$keyfieldval=$_POST['xdoreturnnum'];
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
			if($_POST['xrate']=="" || $_POST['xrate']<=0){
					throw new Exception("Please Enter Rate!");
				}	
				
			if($_POST['xwh']=="" || empty($_POST['xwh'])){
					throw new Exception("Please Enter Warehouse!");
				}
				
			$form	->post('xitemcode')
					->val('minlength', 1)
					->val('maxlength', 20)
					
					->post('xreqdelnum')
					->val('maxlength', 20)
					
					->post('xdoreturnnum')
					->val('maxlength', 20)
											
					->post('xcus')
					->val('minlength', 1)
					->val('maxlength', 20)

					->post('xorg')
					->val('minlength', 1)
					->val('maxlength', 100)						
			
					->post('xwh')
					->val('minlength', 1)
					->val('maxlength', 50)
					
					->post('xrow')
					->val('minlength', 1)
					->val('maxlength', 5)
											
					->post('xrate')

					->post('xtaxrate')

					
					->post('xqty');
					
			$form	->submit();
			
			
				
			
			$data = $form->fetch();
			
		if($data['xdoreturnnum'] == "")
			$keyfieldval = $this->model->getKeyValue("imdoreturn","xdoreturnnum","SRTN-","6");
			else
				$keyfieldval = $data['xdoreturnnum'];
			
			$data['bizid'] = Session::get('sbizid');
			$data['zemail'] = Session::get('suser');
			$data['xdoreturnnum'] = $keyfieldval;
			$data['xdate'] = $date;
			$data['xbranch'] = Session::get('sbranch');
			$data['xfinyear'] = $xyear;
			$data['xfinper'] = $xper;
			$data['xdodate'] = $date;
			
			$rownum = $data['xrow'];
			$row = $this->model->getRow("imdoreturn","xdoreturnnum",$data['xdoreturnnum'], "xrow");
			$item = $this->model->getItemDetail($data['xitemcode']);


			$itemcost = $this->model->getItemcost($data['xitemcode']);
			

			$cost = $item[0]['xstdcost'];
			
			if(!empty($itemcost)){
				$cost = $itemcost[0]['avgcost'];
			}	
			
			
			$cols = "`bizid`,`xdoreturnnum`,`xreqdelnum`,`xcus`,`xrow`,`xitemcode`,`xitembatch`,`xqty`,`xdate`,`xratepur`,`xwh`,`xbranch`,`xproj`,`xunit`,`zemail`,`xrowtrn`,`xtaxrate`,`xrate`,`xtypestk`,`xstdcost`";
			
			$vals = "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $data['xreqdelnum'] ."','". $data['xcus'] ."','". $row ."','". $data['xitemcode'] ."','". $data['xitemcode'] ."',
			'". $data['xqty'] ."','". $date ."','". $item[0]['xpricepur'] ."','". $data['xwh'] ."','". $data['xwh'] ."','". $data['xwh'] ."','".$item[0]['xunitstk']."','".Session::get('suser')."','".$rownum."','". $data['xtaxrate'] ."','". $data['xrate'] ."','".$item[0]['xtypestk']."',".$cost.")";
			
								
			$success = $this->model->create($data, $cols, $vals);
			
			if(empty($success))
				$success=0;
			
			
			}catch(Exception $e){
				
				$this->result = $e->getMessage();
				
			}
			
			if($success>0)
				$this->result = '<a style="color:red" id="invnum" href="'.URL.'imreturn/printreturn/'.$keyfieldval.'">Click To Print Delivery Return - '.$keyfieldval.'</a>';
			
			if($success == 0 && empty($this->result))
				$this->result = "Failed to Create Delivery Return! Reason: Could be Duplicate Trunsaction Code or system error!";
			
			$this->showreturnentry($keyfieldval, $this->result);
		}
		
		public function edit(){
			
			
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
			$num = $_POST['xdoreturnnum'];
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
						
						
						->post('xrate')

						->post('xtaxrate')

						->post('xqty');
						
						
				$form	->submit();
				
			
				
				$data = $form->fetch();	
				
				$item = $this->model->getItemDetail($data['xitemcode']);


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
					"xwh"=>$data['xwh'],
					"xbranch"=>$data['xwh'],
					"xproj"=>$data['xwh'],
					"xfinyear" => $xyear,
					"xfinper" => $xper					
				);
				
				$dt = array (
					"xitemcode"=>$data['xitemcode'],
					"xqty"=>$data['xqty'],
					"xrate"=>$data['xrate'],
					"xtaxrate"=>$data['xtaxrate'],
					"xratepur"=>$item[0]['xpricepur'],
					"xstdcost"=>$item[0]['xstdcost'],
					"xwh"=>$data['xwh'],
					"xbranch"=>$data['xwh'],
					"xproj"=>$data['xwh'],
					"xdate"=>$date,
					"xunit"=>$item[0]['xunitpur'],
					"xtypestk"=>$item[0]['xtypestk']
				);
				
				$success = $this->model->edit($hd,$dt,$num,$_POST['xrow'],$_POST['xitemcode']);
				
				
				}catch(Exception $e){
					
					$result = $e->getMessage();
					
				}
				if($result==""){
				if($success)
					$result = "Edited successfully";
				else
					$result = "Edit failed!";				
				}
				
				 $this->showreturnentry($num, $result.'<br /><a style="color:red" id="invnum" href="'.URL.'imreturn/printreturn/'.$num.'">Click To Print Delivery Return - '.$num.'</a>');
					
		
		}
		
		
		public function show($txnnum, $row, $result=""){
		if($txnnum=="" || $row==""){
			header ('location: '.URL.'imreturn/returnentry');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."imreturn/returnentry"
		);
		if($result=="")
			$result='<a style="color:red" id="invnum" href="'.URL.'imreturn/printreturn/'.$txnnum.'">Click To Print Delivery Return - '.$txnnum.'</a>';
		
		$tblvalues = $this->model->getReturn($txnnum);
		$tbldtvals = $this->model->getSingleReturnDt($txnnum, $row);
		
		$status="";
		if(!empty($tblvalues)){
			$status = $tblvalues[0]['xstatus']; //echo $status; die;
			
		}
		$donum = "";
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else{
			$donum = $tblvalues[0]['xreqdelnum'];
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xreqdelnum"=>$tblvalues[0]['xreqdelnum'],
					"xcus"=>$tblvalues[0]['xcus'],
					"xorg"=>$tblvalues[0]['xorg'],
					"xwh"=>$tblvalues[0]['xwh'],
					"xdoreturnnum"=>$tbldtvals[0]['xdoreturnnum'],
					"xitemcode"=>$tbldtvals[0]['xitemcode'],
					"xdesc"=>$tbldtvals[0]['xdesc'],
					"xqty"=>$tbldtvals[0]['xqty'],
					"xrate"=>$tbldtvals[0]['xrate'],
					"xtaxrate"=>$tbldtvals[0]['xtaxrate'],
					"xrow"=>$tbldtvals[0]['xrow']
					);
		}
			
		// form data
			$confurl = array();
			$saveurl = "";
			if($status=="Created"){
				$confurl = array(URL."imreturn/confirm", "Confirm");
				$saveurl = URL."imreturn/edit/";
			}
			if($status=="Confirmed"){
				$confurl = array(URL."imreturn/cancel", "Cancel");
				$saveurl="";
			}
		$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Delivery Return", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, $saveurl, "Update",$tblvalues, URL."imreturn/showpost");
			
			$this->view->table = $this->renderTable($txnnum);
			$this->view->potable = $this->renderReturnTable($txnnum);;
			
			$this->view->renderpage('imreturn/doentry');
		}
		
		public function getsinglereq($sl){
			$this->model->getSingleQty($sl);
		}
		
		public function showentry($txnnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."imreturn/returnentry"
		);
		
		$tblvalues = $this->model->getReturnheader($txnnum); //print_r($tblvalues); die;
		$dt = date("Y/m/d");
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$dt,
					"xreqdelnum"=>$tblvalues[0]['xsonum'],
					"xdoreturnnum"=>"",
					"xcus"=>$tblvalues[0]['xcus'],
					"xorg"=>$tblvalues[0]['xorg'],
					"xwh"=>"",
					"ximreqnum"=>"",
					"xitemcode"=>"",
					"xdesc"=>"",
					"xqty"=>"0",
					"xrate"=>"0",
					"xtaxrate"=>"0",
					"xrow"=>"0"
					);
			$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Delivery Return", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."imreturn/save/", "Save",$tblvalues ,URL."imreturn/showpost");
			
			$this->view->table = $this->renderTable($txnnum);
			$this->view->potable = "";
			$this->view->renderpage('imreturn/doentry');
		}
		
		public function showreturnentry($txnnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."imreturn/returnentry"
		);
		if($result=="")
			$result='<a style="color:red" id="invnum" href="'.URL.'imreturn/printreturn/'.$txnnum.'">Click To Print Delivery Return - '.$txnnum.'</a>';
		$tblvalues = $this->model->getReturn($txnnum);
		$reqdelnum = "";
		$status="";
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else{
			$reqdelnum = $tblvalues[0]['xreqdelnum'];
			$status=$tblvalues[0]['xstatus'];
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xreqdelnum"=>$tblvalues[0]['xreqdelnum'],
					"xdoreturnnum"=>$tblvalues[0]['xdoreturnnum'],
					"xcus"=>$tblvalues[0]['xcus'],
					"xorg"=>$tblvalues[0]['xorg'],
					"xwh"=>$tblvalues[0]['xwh'],
					"ximreqnum"=>"",
					"xitemcode"=>"",
					"xdesc"=>"",
					"xqty"=>"0",
					"xrate"=>"0",
					"xtaxrate"=>"0",
					"xrow"=>"0"
					);
		}
			$this->view->balance = "";
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Delivery Return", $btn, $result);		
			$confurl = array();
			$saveurl = "";
			if($status=="Created"){
				$confurl = array(URL."imreturn/confirm", "Confirm");
				$saveurl = URL."imreturn/edit/";
			}
			if($status=="Confirmed"){
				$confurl = array(URL."imreturn/cancel", "Cancel");
				$saveurl="";
			}
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, $saveurl, "Save",$tblvalues ,URL."imreturn/showpost",$confurl);
			
			$this->view->table = $this->renderTable($reqdelnum);
			$this->view->potable = $this->renderReturnTable($txnnum);
			$this->view->renderpage('imreturn/doentry');
		}
		
	public function confirm(){

			$voucher = "";
				$retunnum = $_POST['xdoreturnnum'];
				
				$cus = $_POST['xcus'];	
				$yearoffset = Session::get('syearoffset');
				$result = "";
				$postdata=array(
					"xstatus" => "Confirmed"
					);				
				$where = " bizid = ". Session::get('sbizid') ." and xdoreturnnum = '". $retunnum ."'";

				$rows = $this->model->getreturnForConfirm($retunnum);

				if(!empty($rows)){

				$glinterface = $this->model->gldoreturninterface();

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
						$voucher = $this->model->getKeyValue("glheader","xvoucher","DORN-","5");
						
						$data = array();

						$data['bizid'] = Session::get('sbizid');
						$data['zemail'] = Session::get('suser');
						$data['xnarration'] = "C/S DR:".$retunnum." Cus: ".$cus."-".$_POST["xorg"];
						$data['xyear'] = $xyear;
						$data['xper'] = $per;
						$data['xvoucher'] = $voucher;
						$data['xdate'] = $date;
						$data['xstatusjv'] = 'Confirmed';
						$data['xbranch'] = Session::get('sbranch');;
						$data['xdoctype'] = "Delivery Return";
						$data['xdocnum'] = $retunnum;

						$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,
							`xexch`,`xprime`,xflag";

						$vals = "";	
						$globalvar = new Globalvar();
						$i = 0;	
						foreach($glinterface as $key=>$val){
							$i++;
							$amt = $globalvar->getFormula($rows,$val["xformula"]);
							
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

						$this->model->confirm(" bizid=".Session::get('sbizid')." and xdoreturnnum='".$_POST['xdoreturnnum']."' and xstatus='Created'");

				}else{
					$this->model->confirm(" bizid=".Session::get('sbizid')." and xdoreturnnum='".$_POST['xdoreturnnum']."' and xstatus='Created'");
				}
				
				$tblvalues=array();
				$tblvalues = $this->model->getReturn($retunnum);
				
				$result="Confirm Failed";
				
				if($tblvalues[0]['xstatus']=="Confirmed"){
					$result='<a style="color:red" id="invnum" href="'.URL.'imreturn/printreturn/'.$retunnum.'">Click To Print Delivery Return - '.$retunnum.'</a>';
				}
			}
			
			
			$this->showreturnentry($_POST['xdoreturnnum']);
		}

	public function cancel(){

			$voucher = "";
				$retunnum = $_POST['xdoreturnnum'];
				
				$cus = $_POST['xcus'];	
				$yearoffset = Session::get('syearoffset');
				$result = "";
				$postdata=array(
					"xstatus" => "Canceled"
					);				
				$where = " bizid = ". Session::get('sbizid') ." and xdoreturnnum = '". $retunnum ."'";

				$rows = $this->model->getreturnForConfirm($retunnum);

				if(!empty($rows)){

				$glinterface = $this->model->gldoreturninterface();

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
						$voucher = $this->model->getKeyValue("glheader","xvoucher","CDRN-","6");
						
						$data = array();

						$data['bizid'] = Session::get('sbizid');
						$data['zemail'] = Session::get('suser');
						$data['xnarration'] = "Created by system! Cancelation Of Delivery Return:".$retunnum." Customer: ".$cus."-".$_POST["xorg"];
						$data['xyear'] = $xyear;
						$data['xper'] = $per;
						$data['xvoucher'] = $voucher;
						$data['xdate'] = $date;
						$data['xstatusjv'] = 'Confirmed';
						$data['xbranch'] = Session::get('sbranch');;
						$data['xdoctype'] = "Delivery Return Cancel";
						$data['xdocnum'] = $retunnum;

						$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,
							`xexch`,`xprime`,xflag";

						$vals = "";	
						$globalvar = new Globalvar();
						$i = 0;	
						foreach($glinterface as $key=>$val){
							$i++;
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

						$this->model->cancel(" bizid=".Session::get('sbizid')." and xdoreturnnum='".$_POST['xdoreturnnum']."' and xstatus='Confirmed'");

				}else{
					$this->model->cancel(" bizid=".Session::get('sbizid')." and xdoreturnnum='".$_POST['xdoreturnnum']."' and xstatus='Confirmed'");
				}
				
				$tblvalues=array();
				$tblvalues = $this->model->getReturn($retunnum);
				
				$result="Cancel Failed";
				
				if($tblvalues[0]['xstatus']=="Confirmed"){
					$result='<a style="color:red" id="invnum" href="'.URL.'imreturn/printreturn/'.$retunnum.'">Click To Print Delivery Return - '.$retunnum.'</a>';
				}
			}
			
			
			$this->showreturnentry($_POST['xdoreturnnum']);
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
			$row = $this->model->getreqdt($txnnum); //print_r($row); //die;
			
			return $table->myTableSubmit($fields, $row, "sosl", URL."imreturn/getsinglereq/");
						
		}
		
	public	function renderReturnTable($txnnum){
			$pur =$this->model->getReturn($txnnum);
			$status = "";
			if(!empty($pur))
				$status = $pur[0]["xstatus"];
			
			$delurl = URL."imreturn/recdelete/".$txnnum."/";
			
			if($status=="Confirmed")
			{
				$delurl="";
			}			
			
			$fields = array(
						"xrow-Sl",
						"xitemcode-Item Code",
						"xitemdesc-Description",
						"xqty-Quantity"						
						);
			$table = new Datatable();
			$row = $this->model->getreturndt($txnnum);
			
			return $table->myTable($fields, $row, "xrow", URL."imreturn/show/".$txnnum."/", $delurl);
						
		}	
		
		
		function reqlist(){
			$rows = $this->model->getReqList();
			$cols = array("xsonum-DO No","xdate-Date","xcus-Customer No","xorg-Name");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xsonum",URL."imreturn/showentry/");
			$this->view->renderpage('imreturn/list', false);
		}
		
		
		function dolist(){
			$rows = $this->model->getReturnList("Confirmed");
			$cols = array("xdate-Date","xreqdelnum-DO No","xdoreturnnum-Return No","xcus-Customer No","xorg-Name");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xdoreturnnum",URL."imreturn/showreturnentry/");
			$this->view->renderpage('imreturn/deliverylist', false);
		}
		function unconfirmedlist(){
			$rows = $this->model->getReturnList("Created");
			$cols = array("xdate-Date","xreqdelnum-DO No","xdoreturnnum-Return No","xcus-Customer No","xorg-Name");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xdoreturnnum",URL."imreturn/showreturnentry/");
			$this->view->renderpage('imreturn/deliverylist', false);
		}
		
		
		function returnentry(){
				
		$btn = array(
			"Clear" => URL."imreturn/returnentry"
		);

		// form data
		$this->view->balance = "";
		
			$dynamicForm = new Dynamicform("Delivery Return",$btn);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."imreturn/save", "Save",$this->values, URL."imreturn/showpost");
			
			
			$this->view->table = $this->renderTable("");
			$this->view->potable = $this->renderReturnTable("");
			$this->view->renderpage('imreturn/doentry', false);
		}
		
		
		public function showpost(){
			$txnnum = $_POST['xdoreturnnum'];
			$this->showreturnentry($txnnum);
		}
		
		function recdelete($txnnum, $row){
			$do = $this->model->getDelivery($txnnum);
			$status = "";
			if(!empty($do))
				$status = $do[0]["xstatus"];
			if($status=="Created")
				$this->model->recdelete(" WHERE xreqdelnum='".$txnnum."' and xrow=".$row);
			
			$this->showreturnentry($txnnum);
		}
		function printreturn($returnno=""){
			
			$values = $this->model->getvreturndt($returnno);
			//print_r($values);die;
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li>Delivery Return</li>							
						   </ul>';
			
			$this->view->dono=$returnno;
			$totqty = 0;			
			$xdate="";
			$xrdin="";
			$xorg="";
			$xadd="";
			$xmobile="";
			$phone="";
			$divition="";
			$district="";
			$totalam = 0;
			
			
			foreach($values as $key=>$val){
				$xdate=$val['xdate'];
				$xcus=$val['xcus'];
				// $xorg=$val['xorg'];
				// $xadd=$val['xadd'];
				// $xmobile=$val['xmobile'];				
				$totqty+=$val['xqty'];
				$totalam+=($val['xqty']*$val['xrate']);
				
			}
			$cusdetail = $this->model->getCustomer($xcus);
			$xorg=$cusdetail[0]['xorg'];
			$xadd=$cusdetail[0]['xadd1'];
			$xmobile=$cusdetail[0]['xmobile'];
			$phone=$cusdetail[0]['xphone'];
			$divition=$cusdetail[0]['xcity'];
			$district=$cusdetail[0]['xprovince'];

			$this->view->xdate=date("d-m-Y", strtotime($xdate));
			$this->view->cusid=$xcus;
			$this->view->supplier=$xorg;
			$this->view->supadd=$xadd;
			$this->view->supphone=$phone;
			$this->view->supmobile=$xmobile;
			$this->view->divition=$divition;
			$this->view->district=$district;
			$this->view->totalam=$totalam;
					
			$this->view->totqty=$totqty;
			
			
			$cur = new Currency();
			
			$this->view->vrow = $values;
			
			$this->view->vrptname = "Delivery Return";
			$this->view->org=Session::get('sbizlong');
			$this->view->add=Session::get('sbizadd');
			
			$this->view->renderpage('imreturn/printreturn');		
		}
		
}