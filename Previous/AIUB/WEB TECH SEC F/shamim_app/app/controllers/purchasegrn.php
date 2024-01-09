<?php 
class Purchasegrn extends Controller{
	
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
				if($menus["xsubmenu"]=="Goods Receipt Note")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/purchasegrn/js/getpoitemdt.js','views/suppliers/js/getsup.js','views/purchasegrn/js/getitemdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"xponum"=>"",
			"xsup"=>"",
			"xsupname"=>"",
			"xgrnnum"=>"",
			"xitemcode"=>"",
			"xdesc"=>"",
			"xqty"=>"0",
			"xextqty"=>"0",
			"xrow"=>"0",
			"xratepur"=>"0.00",
			"xtaxrate"=>"0.00",
			"xwh"=>"",
			"xproj"=>"",
			"xgitem"=>"",
			"xpur"=>""
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
							"xgrnnum-text"=>'GRN No_maxlength="20"'							
							),
						array(							
							"xsup-group_".URL."suppliers/picklist"=>'Supplier_""',						
							),
						array(							
							"xsupname-text"=>'Name_readonly'
							),
						array(
							"xproj-select_Project"=>'Project*~star_maxlength="50"',
							),
						array(
							"xgitem-select_Item Group"=>'Type*~star_maxlength="50"',
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
							"xqty-text_digit"=>'Qty*~star_number="true" minlength="1" maxlength="18" required'																				
							),
						array(
							"xratepur-text_number"=>'Rate*~star_number="true" minlength="1" maxlength="18" required',				
							),
						array(
							"xwh-select_Warehouse"=>'Warehouse*~star_maxlength="50"'
							),
						array(
							"xpur-select_Purpose"=>'Purpose*~star',
							"xextqty-hidden"=>'',														
							),
						array(
							"xtaxrate-hidden"=>'',			
							"xrow-hidden"=>''
							),
						);
						
								
		}
		
		public function index(){		
		
		$btn = array(
			"Clear" => URL."purchasegrn/grnentry",
		);	
		
					
			$this->view->rendermainmenu('purchasegrn/index');
			
		}
		
		
		public function savegrn(){
				
				
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
				$yearoffset = Session::get('syearoffset');
				$txnnum = $_POST['xponum'];
				$keyfieldval=$_POST['xgrnnum'];
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
						
						->post('xponum')					
						->val('maxlength', 20)
						
						->post('xproj')					
						->val('maxlength', 50)
						
						->post('xgitem')					
						->val('maxlength', 50)
						
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
						
						->post('xextqty')
						
						->post('xratepur')

						->post('xpur');
						
				$form	->submit();
				
				
					
				
				$data = $form->fetch();
				
				if($data['xgrnnum'] == "")
					$keyfieldval = $this->model->getKeyValue("pogrnmst","xgrnnum","GRN-","6");
				else
					$keyfieldval = $data['xgrnnum'];

				//$itemcost = $this->model->getItemcost($data['xitemcode']);
				$pocost = array();
				
				$pocost = $this->model->getpocost($data["xponum"],$data['xitemcode']);
				//print_r($pocost); die;
				$valrate = $data["xratepur"];
				$valexch = 1;

				$pcost = $valrate*$valexch;
				if(!empty($pocost)){
					$valexch = $pocost[0]['xexch'];
					$pcost = $pocost[0]['xpocost'];
				}
				$rate = $valrate*$valexch;
				$cost = $pcost;
				/*$costcal = 0;
				$entrycosttotal = 0;
				$totalqty = 0;
				if(!empty($itemcost)){
					$costcal = $itemcost[0]['avgcost']*$itemcost[0]['totalqty'];
					$entrycosttotal = $pqty*$pcost;
					$totalqty = $itemcost[0]['totalqty']+$pqty;
					$cost = ($costcal+$entrycosttotal)/$totalqty;
				}*/
				
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['xgrnnum'] = $keyfieldval;
				$data['xdate'] = $date;
				$data['xbranch'] = Session::get('sbranch');
				$data['xfinyear'] = $xyear;
				$data['xfinper'] = $xper;
				
				//print_r($data); die;
				$rownum = $data['xrow'];

				if($rownum==0)
					$rownum = $this->model->getRow("pogrndet","xgrnnum",$data['xgrnnum'],"xrow");
				
				$item = $this->model->getItemDetail($data['xitemcode']);
				
				$cols = "`bizid`,`xponum`,`xgrnnum`,`xrow`,`xitemcode`,`xitembatch`,`xqtypur`,`xextqty`,`xdate`,`xratepur`,`xwh`,`xbranch`,`xproj`,`xpur`,`xtaxrate`,`xdisc`,`xexch`,`xcur`,`xtaxcode`,`xtaxscope`,`zemail`,`xunitpur`,`xconversion`,`xunitstk`,`xstdcost`,`xtypestk`";
				
				$vals = "(" . Session::get('sbizid') . ",'". $data['xponum'] ."','". $keyfieldval ."','". $rownum ."','". $data['xitemcode'] ."','". $data['xitemcode'] ."',
				'". $data['xqty'] ."','". $data['xextqty'] ."','". $date ."','". $data['xratepur'] ."','". $data['xwh'] ."','". $data['xwh'] ."','". $data['xproj'] ."','". $data['xpur'] ."','0','0','1','".Session::get('sbizcur')."','None','".$item[0]['xunitpur']."','".$data['zemail']."','None','".$item[0]['xconversion']."','".$item[0]['xunitstk']."','".$cost."','".$item[0]['xtypestk']."')";
				
					
				$success = $this->model->create($data, $cols, $vals);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					$this->result = 'Goods Receipt Note Created</br><a style="color:red" id="invnum" href="'.URL.'purchase/printpo/'.$keyfieldval.'">Click To Print GRN - '.$keyfieldval.'</a>';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create GRN! Reason: Could be Duplicate Trunsaction Code or system error!";
				
				 $this->showgrnentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		public function editgrn(){
			
			if (empty($_POST['xgrnnum'])){
					header ('location: '.URL.'purchasegrn/grnentry');
					exit;
				}
			$result = "";
			
			$hd = array();
			$dt = array();
			
				
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$month = date('m',strtotime($date)); 
				
			$success=false;
			$grnnum = $_POST['xgrnnum'];
			$form = new Form();
				
				$xyear = 0;
				$xper = 0;
				$yearoffset = Session::get('syearoffset');
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$xper = $key;
					$xyear = $val;
				}
				$restqty = $this->model->getSingleQty($_POST['xponum'], $_POST['xrow']);
				
				$data = array();
				
				try{
					
					if($_POST['xgrnnum']=="" || empty($_POST['xgrnnum'])){
						throw new Exception("Please Enter GRN No");
					}
				
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

						->post('xponum')

						->post('xproj')
						->val('maxlength', 50)
						
						->post('xgitem')					
						->val('maxlength', 50)

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
						
						->post('xextqty')
						
						->post('xratepur')

						-post('xpur');
						
				$form	->submit();
				
			
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				//$itemcost = $this->model->getItemcost($data['xitemcode']);
				
				$pocost = array();
				
				$pocost = $this->model->getpocost($data["xponum"],$data['xitemcode']);
				//print_r($pocost); die;
				$valrate = $data["xratepur"];
				$valexch = 1;

				$pcost = $valrate*$valexch;
				if(!empty($pocost)){
					$valexch = $pocost[0]['xexch'];
					$pcost = $pocost[0]['xpocost'];
				}
				$rate = $valrate*$valexch;
				$cost = $pcost;
				/*$costcal = 0;
				$entrycosttotal = 0;
				$totalqty = 0;
				if(!empty($itemcost)){
					$costcal = $itemcost[0]['avgcost']*$itemcost[0]['totalqty'];
					$entrycosttotal = $pqty*$pcost;
					$totalqty = $itemcost[0]['totalqty']+$pqty;
					$cost = ($costcal+$entrycosttotal)/$totalqty;
				}*/
						
				$hd = array (
					"xemail"=>Session::get('suser'),
					"zutime"=>date("Y-m-d H:i:s"),
					"xdate"=>$date,
					"xitemcode"=>$data['xitemcode'],
					"xsup"=>$data['xsup'],
					"xwh"=>$data['xwh'],
					"xbranch"=>$data['xwh'],
					"xproj"=>$data['xproj'],
					"xgitem"=>$data['xgitem'],
					"xfinyear" => $xyear,
					"xfinper" => $xper
					
				);
				
				$dt = array (
					"xitemcode"=>$data['xitemcode'],
					"xqty"=>$data['xqty'],
					"xextqty"=>$data['xextqty'],
					"xratepur"=>$data['xratepur'],
					"xwh"=>$data['xwh'],
					"xbranch"=>$data['xwh'],
					"xproj"=>$data['xproj'],
					"xpur"=>$data['xpur'],
					"xdate"=>$date,
					"xstdcost"=>$cost
				);
				
				$success = $this->model->edit($hd,$dt,$grnnum,$_POST['xrow']);
				
				
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
		
		public function creategrnall($txnnum){
			$pomilesone = $this->model->checkMilestone($txnnum);
			
			if($pomilesone[0]['xmilestone']=="Milestone Completed"){
				header ('location: '.URL.'purchasegrn/grnentry');
				exit;
			}
			
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
			
			$purchase = $this->model->getpurchasebytxn($txnnum);
			$detail = $this->model->getpurchasedtbytxn($txnnum);
			$keyfieldval="";
			$keyfieldval = $this->model->getKeyValue("pogrnmst","xgrnnum","GRN-","6");

			$data=array();
			
			$data['zemail']=Session::get('suser');
			$data['bizid']=Session::get('sbizid');
			$data['xgrnnum']=$keyfieldval;
			$data['xponum']=$purchase[0]['xponum'];
			$data['xproj']=$purchase[0]['xproj'];
			$data['xdate']=$date;
			$data['xsup']=$purchase[0]['xsup'];
			$data['xwh']=$purchase[0]['xwh'];
			$data['xbranch']=$purchase[0]['xbranch'];
			$data['xproj']=$purchase[0]['xproj'];
			$data['xtype']=$purchase[0]['xtype'];
			$data['xstatus']='Created';
			$data['xfinyear']=$xyear;
			$data['xfinper']=$xper;

			
			$cols = "zemail,bizid,xgrnnum,xponum,xrowtrn,xrow,xdate,xitemcode,xitembatch,xqtypur,xextqty,xqty,xunitstk,xratepur,xstdcost,xtaxrate,xdisc,xwh,xbranch,xproj,xpur,xexch,xcur,xunitpur,xtypestk,xconversion";
			$vals =	"";
			$i=0; //print_r($detail); die;
			foreach($detail as $key=>$value){

			//$itemcost = $this->model->getItemcost($value['xitemcode']);
				$pocost = array();
				
				$pocost = $this->model->getpocost($value["xponum"],$value['xitemcode']);
				//print_r($pocost); die;
				$valrate = $value["xratepur"];
				$valexch = $value["xexch"];
				$rate = $valrate*$valexch;
				
				//$pqty = $value["xqty"];
				$pcost = $valrate*$valexch;
				if(!empty($pocost)){
					//$poqty = $pocost[0]['xqty'];
					$pcost = $pocost[0]['xpocost'];
				}
				$cost = $pcost;
				/*$costcal = 0;
				$entrycosttotal = 0;
				$totalqty = 0;
				if(!empty($itemcost)){
					$costcal = $itemcost[0]['avgcost']*$itemcost[0]['totalqty'];
					$entrycosttotal = $pqty*$pcost;
					$totalqty = $itemcost[0]['totalqty']+$pqty;
					$cost = ($costcal+$entrycosttotal)/$totalqty;
				}*/
				
			$i++;	
				$grnqt = $value['xqty']-$value['xgrnqty'];
				
				$vals .= "('".$value['zemail']."'," . Session::get('sbizid') . ",'". $keyfieldval ."','". $value['xponum'] ."',". $value['xrow'] .",". $i .",'". $date ."','". $value['xitemcode'] ."','". $value['xitemcode'] ."',". $grnqt .",'0',". $value['xqty'] .",'". $value['xunitstk'] ."',". $rate .",".$cost.",'". $value['xtaxrate'] ."','". $value['xdisc'] ."','". $value['xwh'] ."','". Session::get('sbranch') ."','". $value['xproj'] ."','". $value['xpur'] ."','1','". Session::get('sbizcur') ."','". $value['xunitpur'] ."','". $value['xtypestk'] ."','". $value['xconversion'] ."'),";
				
			}
			//echo $vals; die;
			$vals = rtrim($vals,",");
			
			$success = 0;
			
			$result = "";

			try{
			
			$success=$this->model->creategrnall($data,$cols,$vals);
			
			}catch(Exception $e){
				$$this->result = $e->getMessage();
			}

			if($success>0)
				$result = 'Goods Receipt Note Created</br><a style="color:red" id="invnum" href="'.URL.'purchase/printpo/'.$keyfieldval.'">Click To Print GRN - '.$keyfieldval.'</a>';;	
			
			$this->showgrnentry($keyfieldval, $result);
		}
		
		
		public function show($txnnum, $row, $result=""){
		if($txnnum=="" || $row==""){
			header ('location: '.URL.'purchase/purchaseentry');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."purchasegrn/grnentry"
		);
		
		$tblvalues = $this->model->getgrn($txnnum);
		$tbldtvals = $this->model->getSingleGrnDt($txnnum, $row);
		$ponum = $tblvalues[0]['xponum'];
		
		$status="";
		if(!empty($tblvalues))
			$status = $tblvalues[0]['xstatus']; //echo $status; die;
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xponum"=>$tblvalues[0]['xponum'],
					"xproj"=>$tblvalues[0]['xproj'],
					"xgitem"=>$tblvalues[0]['xtype'],
					"xgrnnum"=>$tblvalues[0]['xgrnnum'],
					"xsup"=>$tblvalues[0]['xsup'],
					"xsupname"=>$tblvalues[0]['xorg'],
					"xsupdoc"=>$tblvalues[0]['xsupdoc'],
					"xwh"=>$tbldtvals[0]['xwh'],
					"xitemcode"=>$tbldtvals[0]['xitemcode'],
					"xdesc"=>$tbldtvals[0]['xitemdesc'],
					"xqty"=>$tbldtvals[0]['xqtypur'],
					"xextqty"=>$tbldtvals[0]['xextqty'],
					"xrow"=>$tbldtvals[0]['xrow'],
					"xratepur"=>$tbldtvals[0]['xratepur'],
					"xtaxrate"=>$tbldtvals[0]['xtaxrate'],
					"xwh"=>$tbldtvals[0]['xwh'],
					"xpur"=>$tbldtvals[0]['xpur']
					);
			
		// form data
		$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Goods Receive Note", $btn, $result);
			
			$confurl = array();
			$saveurl = "";
			if($status=="Created"){
				$confurl = array(URL."purchasegrn/confirmgrn","Confirm");
				$saveurl = URL."purchasegrn/editgrn/";
			}
			if($status=="Confirmed"){
				$confurl = array(URL."purchasegrn/cancelgrn","Cancel");
				$saveurl="";
			}		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields,  $saveurl, "Update",$tblvalues, URL."purchasegrn/showpost",$confurl);
			
			$this->view->table = $this->renderTable($ponum);
			$this->view->grntable = $this->renderGrnTable($txnnum);
			
			$this->view->renderpage('purchasegrn/grnentry');
		}
		
		public function getsinglepodt($txnnum, $row){
			$this->model->getSinglePurchase($txnnum, $row);
		}
		
		public function showentry($txnnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."purchasegrn/grnentry"
		);
		if($result=="")
			$result='<a style="color:red" id="invnum" href="'.URL.'purchasegrn/printgrn/'.$txnnum.'">Click To Print GRN - '.$txnnum.'</a>';
		$tblvalues = $this->model->getpurchase($txnnum);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xponum"=>$tblvalues[0]['xponum'],
					"xproj"=>$tblvalues[0]['xproj'],
					"xgitem"=>$tblvalues[0]['xtype'],
					"xgrnnum"=>"",
					"xsup"=>$tblvalues[0]['xsup'],
					"xsupname"=>$tblvalues[0]['xorg'],					
					"xitemcode"=>"",
					"xdesc"=>"",
					"xqty"=>"0",
					"xextqty"=>"0",
					"xrow"=>"0",
					"xratepur"=>"0",
					"xtaxrate"=>"0",
					"xwh"=>"",
					"xpur"=>""
					);
			$this->view->balance = "";
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Goods Receipt Note", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."purchasegrn/savegrn/", "Save",$tblvalues ,URL."purchasegrn/showpost");
			
			$this->view->table = $this->renderTable($txnnum);
			$this->view->grntable = "";
			$this->view->renderpage('purchasegrn/grnentry');
		}
		
		public function showgrnentry($txnnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."purchasegrn/grnentry"
		);
		
		$result='<a style="color:red" id="invnum" href="'.URL.'purchasegrn/printgrn/'.$txnnum.'">Click To Print GRN - '.$txnnum.'</a>';
		$tblvalues = $this->model->getgrn($txnnum); //print_r($tblvalues);die;
		$ponum = $txnnum;
		$status="";
		if(!empty($tblvalues)){
			$ponum=$tblvalues[0]['xponum'];
			$status=$tblvalues[0]['xstatus'];
		}
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xponum"=>$tblvalues[0]['xponum'],
					"xproj"=>$tblvalues[0]['xproj'],
					"xgitem"=>$tblvalues[0]['xtype'],
					"xgrnnum"=>$tblvalues[0]['xgrnnum'],
					"xsup"=>$tblvalues[0]['xsup'],
					"xsupname"=>$tblvalues[0]['xorg'],					
					"xitemcode"=>"",
					"xdesc"=>"",
					"xqty"=>"0",
					"xextqty"=>"0",
					"xrow"=>"0",
					"xratepur"=>"0",
					"xtaxrate"=>"0",
					"xwh"=>"",
					"xpur"=>""
					);
			$this->view->balance = "";
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Goods Receipt Note", $btn, $result);		
			
			$confurl = array();
			$saveurl = "";
			if($status=="Created"){
				$confurl = array(URL."purchasegrn/confirmgrn","Confirm");
				$saveurl = URL."purchasegrn/savegrn/";
			}
			if($status=="Confirmed"){
				$confurl = array(URL."purchasegrn/cancelgrn","Cancel");
				$saveurl="";
			}
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, $saveurl, "Save",$tblvalues ,URL."purchasegrn/showpost",$confurl);
			
			$this->view->table = $this->renderTable($ponum);
			$this->view->grntable = $this->renderGrnTable($txnnum);
			
			$this->view->renderpage('purchasegrn/grnentry');
		}
		
	public function confirmgrn(){
			
				$voucher = "";
				$grnnum = $_POST['xgrnnum'];				
				$sup = $_POST['xsup'];	
				$yearoffset = Session::get('syearoffset');
				$result = "";
				$postdata=array(
					"xstatus" => "Confirmed",
					"xvoucher"=>$voucher
					);				
				$where = " bizid = ". Session::get('sbizid') ." and xgrnnum = '". $grnnum ."'";

				$rows = $this->model->getgrnForConfirm($grnnum);
				//print_r($rows); die;
				if(!empty($rows)){

				$glinterface = $this->model->glgrninterface();

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
						$voucher = $this->model->getKeyValue("glheader","xvoucher","GRNV-","5");
						
						$data = array();

						$data['bizid'] = Session::get('sbizid');
						$data['zemail'] = Session::get('suser');
						$data['xnarration'] = "C/S GRN:".$grnnum." Sup: ".$sup."-".$_POST["xsupname"];						
						$data['xyear'] = $xyear;
						$data['xper'] = $per;
						$data['xvoucher'] = $voucher;
						$data['xdate'] = $date;
						$data['xstatusjv'] = 'Confirmed';
						$data['xbranch'] = Session::get('sbranch');;
						$data['xdoctype'] = "Goods Receipt Note";
						$data['xdocnum'] = $grnnum;
						$data['xsite'] = $rows[0]['xproj'];

						$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,
							`xexch`,`xprime`,xflag";

						$vals = "";	

						$i = 0;	
						$globalvar = new Globalvar(); 
						foreach($glinterface as $key=>$val){
							$i++;
							
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

						$this->model->confirm(" bizid=".Session::get('sbizid')." and xgrnnum='".$_POST['xgrnnum']."' and xstatus='Created'");

				}else{
					$this->model->confirm(" bizid=".Session::get('sbizid')." and xgrnnum='".$_POST['xgrnnum']."' and xstatus='Created'");
				}
				
				$tblvalues=array();
				$tblvalues = $this->model->getgrn($grnnum);
				
				$result="Confirm Failed";
				
				if($tblvalues[0]['xstatus']=="Confirmed"){
					$result='Goods Receipt Note Confirmed</br><a style="color:red" id="invnum" href="'.URL.'purchase/printpo/'.$grnnum.'">Click To Print GRN - '.$grnnum.'</a>';
				}
			}
			
			
			$this->showgrnentry($_POST['xgrnnum']);
		}

	public function cancelgrn(){

			$voucher = "";
				$grnnum = $_POST['xgrnnum'];				
				$sup = $_POST['xsup'];	
				$yearoffset = Session::get('syearoffset');
				$result = "";
				$postdata=array(
					"xstatus" => "Canceled",
					"xvoucher"=>$voucher
					);				
				$where = " bizid = ". Session::get('sbizid') ." and xgrnnum = '". $grnnum ."'";

				$rows = $this->model->getgrnForConfirm($grnnum);
				//print_r($rows); die;
				if(!empty($rows)){

				$glinterface = $this->model->glgrninterface();

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
						$voucher = $this->model->getKeyValue("glheader","xvoucher","GCLV-","5");
						
						$data = array();

						$data['bizid'] = Session::get('sbizid');
						$data['zemail'] = Session::get('suser');
						$data['xnarration'] = "C/S Cancelation of GRN:".$grnnum." By ".Session::get('suser')." Sup: ".$sup."-".$_POST["xsupname"];						
						$data['xyear'] = $xyear;
						$data['xper'] = $per;
						$data['xvoucher'] = $voucher;
						$data['xdate'] = $date;
						$data['xstatusjv'] = 'Confirmed';
						$data['xbranch'] = Session::get('sbranch');;
						$data['xdoctype'] = "Goods Receipt Note";
						$data['xdocnum'] = $grnnum;
						$data['xsite'] = $rows[0]['xproj'];

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

						$this->model->cancel(" bizid=".Session::get('sbizid')." and xgrnnum='".$_POST['xgrnnum']."' and xstatus='Confirmed'");

				}else{
					$this->model->cancel(" bizid=".Session::get('sbizid')." and xgrnnum='".$_POST['xgrnnum']."' and xstatus='Confirmed'");
				}
				
				$tblvalues=array();
				$tblvalues = $this->model->getgrn($grnnum);
				
				$result="Cancel Failed";
				
				if($tblvalues[0]['xstatus']=="Confirmed"){
					$result='Goods Receipt Note Confirmed</br><a style="color:red" id="invnum" href="'.URL.'purchase/printpo/'.$grnnum.'">Click To Print GRN - '.$grnnum.'</a>';
				}
			}
			
			
			$this->showgrnentry($_POST['xgrnnum']);
		}	
			
	
	public	function renderTable($txnnum){
			$fields = array(
						"xrow-Sl",
						"xitemcode-Item Code",
						"xitemdesc-Description",
						"xqty-Qty",
						"xgrnqty-GRN Qty",
						"xratepur-Rate",
						"xtotal-Total",	
						);
			$table = new Datatable();
			$row = $this->model->getpurchasedt($txnnum);
			
			return $table->myTableSubmit($fields, $row, "xrow", URL."purchasegrn/getsinglepodt/".$txnnum."/");
						
		}
		
	public	function renderGrnTable($txnnum){
			
		$grn = $this->model->getgrn($txnnum);
			$status = "";
			if(!empty($grn))
				$status = $grn[0]["xstatus"];
			
			$delbtn = "";
			if(count($grn)>0){
			if($grn[0]["xstatus"]=="Created")
				$delbtn = URL."purchasegrn/recdelete/".$txnnum."/";
				
			}
			
			$row = $this->model->getgrndt($txnnum); 
			
			$table = '<table class="table table-striped table-bordered">';
				$table .='<thead>
							<th></th><th></th><th>Sl.</th><th>Itemcode</th><th>Description</th><th style="text-align:right">Rate</th><th style="text-align:right">Qty</th><th>UOM</th><th style="text-align:right">Tax</th><th style="text-align:right">Total</th>
						</thead>';
						$totalqty = 0;
						$total = 0;
						$totaltax = 0;
						$totaldisc = 0;
						$table .='<tbody>';

						foreach($row as $key=>$val){
							$showurl = URL."purchasegrn/show/".$txnnum."/".$val['xrow'];
							$table .='<tr>';
							
							$table.='<td><a class="btn btn-info" id="btnshow" href="'.$showurl.'" role="button">Show</a></td>';
							if($delbtn!="")
								$table.='<td><a id="delbtn" class="btn btn-danger" href="'.$delbtn."/".$val['xrow'].'" role="button">Delete</a></td>';
							else
								$table.='<td></td>';

								$table .= "<td>".$val['xrow']."</td>";
								$table .= "<td>".$val['xitemcode']."</td>";
								$table .= "<td>".$val['xitemdesc']."</td>";
								$table .='<td align="right">'.$val['xratepur'].'</td>';		
								$table .='<td align="right">'.$val['xqtypur'].'</td>';
								$table .='<td>'.$val['xunitstk'].'</td>';
								$table .='<td align="right">'.$val['xtotaltax'].'</td>';
								//$table .='<td align="right">'.$val['xdisctotal'].'</td>';
								$subtotal = $val['xtotal']+$val['xtotaltax']-$val['xtotaldisc'];
								$table .='<td align="right">'.$subtotal.'</td>';
								$total+=$subtotal;
								$totalqty+=	$val['xqtypur'];
								$totaltax +=$val['xtotaltax'];
								//$totaldisc+= $val['xdisctotal'];
								
							$table .="</tr>";
						}
							$table .='<tr><td align="right" colspan="6"><strong>Total</strong></td><td align="right"><strong>'.$totalqty.'</strong></td><td></td><td align="right"><strong>'.$totaltax.'</strong></td><td align="right"><strong>'.$total.'</strong></td></tr>';
							/*$net=0;
							if(!empty($row)){
								$table .='<tr><td align="right" colspan="8"><strong>Fixed Discount</strong></td><td align="right"><strong>'.$row[0]["xgrossdisc"].'</strong></td></tr>';
								
								//$net = $total-$row[0]["xgrossdisc"];
							}
							$table .='<tr><td align="right" colspan="8"><strong>Net Total</strong></td><td align="right"><strong>'.$net.'</strong></td></tr>';*/
							 	
					$table .="</tbody>";			
			$table .= "</table>";
			
			return $table;

			/*$grn = $this->model->getgrn($txnnum);
			$status = "";
			if(!empty($grn))
				$status = $grn[0]["xstatus"];
			
			$delurl = URL."purchasegrn/recdelete/".$txnnum."/";
			
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
			$row = $this->model->getgrndt($txnnum);
			
			return $table->myTable($fields, $row, "xrow", URL."purchasegrn/show/".$txnnum."/",$delurl);
						*/
		}	
		
		
		function polist(){
			$rows = $this->model->getPurchaseList();
			$cols = array("xponum-PO No","xsup-Supplier","xsupname-Name","xproj-Project","xwh-Warehouse","xpur-Purpose");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xponum",URL."purchasegrn/showentry/",URL."purchasegrn/creategrnall/","Create GRN");
			$this->view->renderpage('purchasegrn/purchaselist', false);
		}
		
		
		
		function grnlist($status){
			$rows = $this->model->getGrnList($status);
			$cols = array("xdate-Date","xgrnnum-GRN No","xponum-PO No","xsup-Supplier","xsupname-Name","xsupdoc-Suplier Doc","xproj-Project","xwh-Warehouse","xpur-Purpose");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xgrnnum",URL."purchasegrn/showgrnentry/");
			$this->view->renderpage('purchasegrn/purchaselist', false);
		}
		
		function grnentry(){
				
		$btn = array(
			"Clear" => URL."purchasegrn/grnentry"
		);

		// form data
		$this->view->balance = "";
		
			$dynamicForm = new Dynamicform("Goods Receipt Note",$btn);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."purchasegrn/savegrn", "Save",$this->values, URL."purchasegrn/showpost");
			
			
			$this->view->table = $this->renderTable("");
			$this->view->grntable = $this->renderGrnTable("");
			$this->view->renderpage('purchasegrn/grnentry', false);
		}
		
		public function showpost(){
		
		$txnnum=$_POST["xgrnnum"];
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."purchasegrn/grnentry"
		);
		
		$result ='<a style="color:red" id="invnum" href="'.URL.'purchasegrn/printgrn/'.$txnnum.'">Click To Print GRN - '.$txnnum.'</a>';
		$tblvalues = $this->model->getgrn($txnnum); //print_r($tblvalues);die;
		$ponum = $txnnum;
		$status="";
		if(!empty($tblvalues)){
			$ponum=$tblvalues[0]['xponum'];
			$status=$tblvalues[0]['xstatus'];
		}
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xponum"=>$tblvalues[0]['xponum'],
					"xproj"=>$tblvalues[0]['xproj'],
					"xgitem"=>$tblvalues[0]['xtype'],
					"xgrnnum"=>$tblvalues[0]['xgrnnum'],
					"xsup"=>$tblvalues[0]['xsup'],
					"xsupname"=>$tblvalues[0]['xorg'],					
					"xitemcode"=>"",
					"xdesc"=>"",
					"xqty"=>"0",
					"xextqty"=>"0",
					"xrow"=>"0",
					"xratepur"=>"0",
					"xtaxrate"=>"0",
					"xwh"=>"",
					"xpur"=>""
					);
			$this->view->balance = "";
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Goods Receipt Note", $btn, $result);		
			
			$confurl = array();
			$saveurl = "";
			if($status=="Created"){
				$confurl = array(URL."purchasegrn/confirmgrn","Confirm");
				$saveurl = URL."purchasegrn/savegrn/";
			}
			if($status=="Confirmed"){
				$confurl = array(URL."purchasegrn/cancelgrn","Cancel");
				$saveurl="";
			}
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, $saveurl, "Save",$tblvalues ,URL."purchasegrn/showpost",$confurl);
			
			$this->view->table = $this->renderTable($ponum);
			$this->view->grntable = $this->renderGrnTable($txnnum);
			
			$this->view->renderpage('purchasegrn/grnentry');
		}
		
		function recdelete($grnnum, $row){
			$grn = $this->model->getgrn($grnnum);
			$status = "";
			if(!empty($grn))
				$status = $grn[0]["xstatus"];
			if($status=="Created")
				$this->model->recdelete(" WHERE xgrnnum='".$grnnum."' and xrow=".$row);
			
			$this->showgrnentry($grnnum);
		}
		
		function printgrn($grnno=""){
			
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li>Goods receipt Note</li>							
						   </ul>';		
						
			$values = $this->model->getvgrndt($grnno);
			//print_r($values);die;
			
			
			$this->view->pono=$grnno;
			$xsup="";
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
			$ponum="";
			$totaltax=0;
			$proj="";
			
			foreach($values as $key=>$val){
				$xdate=$val['xdate'];
				$xsup=$val['xsup'];
				$proj=$val['xproj'];
				// $supplier=$val['xorg'];
				// $supadd=$val['xsupadd'];
				// $supphone=$val['xsupphone'];
				$supdoc=$val['xsupdoc'];
				$ponum=$val['xponum'];
				$totqty+=$val['xqtypur'];
				$total+=$val['xtotal'];
				$totaltax +=$val['xtotaltax'];
				
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
			$this->view->ponum=$ponum;				
			$this->view->totqty=$totqty;
			$this->view->tottax=$totaltax;
			$this->view->total=$total;
			$this->view->proj=$proj;

			
			$cur = new Currency();
			$this->view->inword="In Words: ". $cur->get_bd_amount_in_text($total);
			$this->view->vrow = $values;
			
			$this->view->vrptname = "Goods Receipt Note";
			$this->view->org=Session::get('sbizlong');
			
			$this->view->renderpage('purchasegrn/printgrn');		
		}
}