<?php
class Pmfgr extends Controller{
	
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
				if($menus["xsubmenu"]=="Finished Goods Receive")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/pmfgr/js/getitemdt.js');
		$dt = date("Y/m/d");
		$this->values = array(			
			"xdate"=>$dt,
			"xexpdate"=>$dt,
			"xfgrnum"=>"",
			"xitemcode"=>"",
			"xdesc"=>"",
			"xrawwh"=>"",
			"xfwh"=>"",
			"xqty"=>"0"
			);
			
			$this->fields = array(
						array(
							"xdate-datepicker" => 'Date_""',
							"xfgrnum-text"=>'Production Number_maxlength="20" readonly'
							),
						array(
							"xitemcode-group_".URL."itempicklist/picklist"=>'Item Code*~star_maxlength="20" readonly',
							"xdesc-text"=>'Description*~star_readonly'													
							),
						array(
							"xrawwh-select_Warehouse"=>'Raw Warehouse*~star_maxlength="20"',
							"xfwh-select_Warehouse"=>'Finish Warehouse*~star_maxlength="20"',							
							),
						array(
							"xexpdate-datepicker" => 'Expiry Date_""',								
							"xqty-text_digit"=>'Quantity*~star_number="true" minlength="1" maxlength="18" required'
							)
						);
						
								
		}
		
		public function index(){
		
					
			$this->view->rendermainmenu('pmfgr/index');
			
		}
		
		public function save(){
				
								
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));

				$xexpdate = $_POST['xdate'];
				$expdt = str_replace('/', '-', $xexpdate);
				$expdate = date('Y-m-d', strtotime($expdt));

				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
				$yearoffset = Session::get('syearoffset');
				$txnnum = "";
				$keyfieldval="0";
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
					
				
				$form	->post('xitemcode')
						->val('minlength', 1)
						->val('maxlength', 20)

						->post('xfgrnum')

						->post('xrawwh')
						->val('minlength', 1)
						->val('maxlength', 50)

						->post('xfwh')
						->val('minlength', 1)
						->val('maxlength', 50)

						->post('xqty');
						
				$form	->submit();					
				
				$data = $form->fetch();
				
				
				$totalcost = 0;
				//$item = $this->model->getItem($data['xitemcode']);

				$bom = $this->model->getBom($data['xitemcode']);

				if(empty($bom))
					throw new Exception("Bill Of Material Not Found!");

				
				$bomdt = $this->model->getvbomdt($data['xitemcode']);
				$nostockitem = "";
				foreach($bomdt as $key=>$val){
					$totalcost+=$val['xstdcost'];

					

					if($val['xitemtype']=="Raw Material"){
						$stockdt = $this->model->getItemStock($data['xrawwh'],$val['xrawitem']);

						if(!empty($stockdt)){
							$totqty=$data['xqty']*$val['xqty'];
							if($stockdt[0]['xqty'] < $totqty){
								$nostockitem .= $val['xrawitem'].",";
							}
						}else
							$nostockitem .= $val['xrawitem'].",";
					}
					
				}

				if($nostockitem!=""){
					$nostockitem=rtrim($nostockitem,",");
					throw new Exception("Item code - ".$nostockitem." --> Stock not found!");
				}


				if($totalcost<=0)
					throw new Exception("Item cost is 0! Could not create!");
				
				$keyfieldval = $this->model->getKeyValue("pmfgrmst","xfgrnum","FGR-","6");
				
				
					
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['xfgrnum'] = $keyfieldval;
				$data['xitemcode'] = $data['xitemcode'];
				$data['xqty'] = $data['xqty'];
				$data['xfwh'] = $data['xfwh'];
				$data['xrawwh'] = $data['xrawwh'];
				$data['xstdcost'] = $totalcost;
				$data['xdate'] = $date;
				$data['xexpdate'] = $date;
				$data['xbranch'] = Session::get('sbranch');
				$data['xfinyear'] = $xyear;
				$data['xfinper'] = $xper;			
				//print_r($data); die;
								
				$cols = "`bizid`,`xdate`,`xfgrnum`,`xrow`,`xrawitem`,`xitembatch`,`xwh`,`xbranch`,`xproj`,`xqty`,`xstdcost`,`xunit`,`xcur`,`xitemtype`,`zemail`";
				$vals="";
				foreach($bomdt as $key=>$val){
					$vals .= "(" . Session::get('sbizid') . ",'". $date ."','". $keyfieldval ."','". $val['xrow'] ."','". $val['xrawitem'] ."','',
				'". $data['xrawwh'] ."','" . Session::get('sbranch') . "','" . Session::get('sbranch') . "','". $val['xqty'] ."','". $val['xstdcost'] ."','". $val['xunit'] ."','','". $val['xitemtype'] ."','" . Session::get('suser') . "'),";	
				}

				$vals = rtrim($vals,',');
				
				
					
				$success = $this->model->create($data, $cols, $vals);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					$this->result = 'Bill Of Material Created</br><a style="color:red" id="invnum" href="'.URL.'pmbomcost/printbom/'.$keyfieldval.'">Click To Print Bill Of Material - '.$keyfieldval.'</a>';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Bill Of Material! Reason: Could be Duplicate Trunsaction Code or system error!";
				//echo $this->result; die;
				 $this->showentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		public function edit(){
			
			$result = "";
			
			$hd = array();
			$dt = array();
			
				$yearoffset = Session::get('syearoffset');
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));

				$xexpdate = $_POST['xdate'];
				$expdt = str_replace('/', '-', $xexpdate);
				$expdate = date('Y-m-d', strtotime($expdt));

				$month = date('m',strtotime($date)); 
				
				$xyear = 0;
				$xper = 0;
				//print_r($this->model->getYearPer($yearoffset,intval($month))); die;
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$xper = $key;
					$xyear = $val;
				}
				
			$success=false;
			$xfgrnum = $_POST['xfgrnum'];
			$form = new Form();
			$data = array();
				
				try{
				
				
				$form	->post('xitemcode')
						->val('minlength', 1)
						->val('maxlength', 20)

						->post('xfgrnum')

						->post('xrawwh')
						->val('minlength', 1)
						->val('maxlength', 50)

						->post('xfwh')
						->val('minlength', 1)
						->val('maxlength', 50)

						->post('xqty');

				$form	->submit();
				
			
				
				$data = $form->fetch();	



				$bom = $this->model->getBom($data['xitemcode']);

				if(empty($bom))
					throw new Exception("Bill Of Material Not Found!");

				
				$bomdt = $this->model->getvbomdt($data['xitemcode']);
				$nostockitem = "";
				foreach($bomdt as $key=>$val){
									

					if($val['xitemtype']=="Raw Material"){
						$stockdt = $this->model->getItemStock($data['xrawwh'],$val['xrawitem']);

						if(!empty($stockdt)){
							$totqty=$data['xqty']*$val['xqty'];
							if($stockdt[0]['xqty'] < $totqty){
								$nostockitem .= $val['xrawitem'].",";
							}
						}else
							$nostockitem .= $val['xrawitem'].",";
					}
					
				}

				if($nostockitem!=""){
					$nostockitem=rtrim($nostockitem,",");
					throw new Exception("Item code - ".$nostockitem." --> Stock not found!");
				}


				
				
				//print_r($data);die;
				$item = $this->model->getItem($data['xitemcode']);
						
				

					$data['xdate'] = $date;
					$data['xexpdate'] = $date;
					
					$data['xfinyear'] = $xyear;
					$data['xfinper'] = $xper;
				
				$dt = array (
					
					"xrawwh"=>$data['xrawwh'],
					
				);
				
				$success = $this->model->edit($data,$dt, $data['xfgrnum']);
				
				
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
				
				 $this->showentry($data['xfgrnum'], $result.'<br /><a style="color:red" id="invnum" href="'.URL.'pmfgr/printfgr/'.$data['xfgrnum'].'">Click To Print Finished Goods Receive - '.$data['xfgrnum'].'</a>');
				
		
		}
		
		public function show($txnnum, $result=""){
		if($txnnum==""){
			header ('location: '.URL.'pmfgr/fgrentry');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."pmfgr/fgrentry"
		);
		if($result=="")
			$result='<a style="color:red" id="invnum" href="'.URL.'pmfgr/printfgr/'.$txnnum.'">Click To Print Finished Good Receive - '.$txnnum.'</a>';
		
		$tblvalues = $this->model->getFgr($txnnum);
		
		$status="";
		if(!empty($tblvalues))
			$status = $tblvalues[0]['xstatus']; //echo $status; die;
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xfgrnum"=>$tblvalues[0]['xfgrnum'],
					"xitemcode"=>$tblvalues[0]['xitemcode'],
					"xdesc"=>$tblvalues[0]['xdesc'],
					"xfwh"=>$tblvalues[0]['xwh'],
					"xrawwh"=>$tblvalues[0]['xrawwh'],
					"xqty"=>$tblvalues[0]['xqty'],
					"xexpdate"=>$tblvalues[0]['xexpdate'],
					);
			
			$confurl = array();
			$saveurl = "";
			if($status=="Created"){
				$confurl = array(URL."pmfgr/confirm","Confirm");
				$saveurl = URL."pmfgr/edit/";
			}
			if($status=="Confirmed"){
				$confurl = array(URL."pmfgr/cancel","Cancel");
				$saveurl="";
			}
			
			
		$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Finished Goods Receive", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, "Update",$tblvalues, URL."pmfgr/showpost", $confurl);
			
			$this->view->table = $this->renderTable($txnnum);
			
			$this->view->renderpage('pmfgr/fgrentry');
		}
		
		
		
		public function showentry($txnnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."pmfgr/fgrentry"
		);
		if($result=="")
			$result='<a style="color:red" id="invnum" href="'.URL.'pmfgr/printfgr/'.$txnnum.'">Click To Finished Goods Receive - '.$txnnum.'</a>';
		$tblvalues = $this->model->getFgr($txnnum);
		$confurl = array();
		$saveurl = "";
		$status="";
		if(!empty($tblvalues))
			$status = $tblvalues[0]['xstatus']; //echo $status; die;
		if(empty($tblvalues)){
			$tblvalues=$this->values;
			$confurl = "";
		}
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xfgrnum"=>$tblvalues[0]['xfgrnum'],
					"xitemcode"=>$tblvalues[0]['xitemcode'],
					"xdesc"=>$tblvalues[0]['xdesc'],
					"xfwh"=>$tblvalues[0]['xwh'],
					"xrawwh"=>$tblvalues[0]['xrawwh'],
					"xqty"=>$tblvalues[0]['xqty'],
					"xexpdate"=>$tblvalues[0]['xexpdate'],
					);
			
		
		
			
			if($status=="Created"){
				$confurl = array(URL."pmfgr/confirm","Confirm");
				$saveurl = URL."pmfgr/edit/";
			}
			if($status=="Confirmed"){
				$confurl = array(URL."pmfgr/cancel","Cancel");
				$saveurl="";
			}
			
			
			$dynamicForm = new Dynamicform("Finished Goods Receive", $btn, $result);
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, "Save",$tblvalues ,URL."pmfgr/showpost",$confurl);
			
			$this->view->table = $this->renderTable($txnnum);
			
			$this->view->renderpage('pmfgr/fgrentry');
		}
		
		
		
		function renderTable($txnnum){
			
			$pur = $this->model->getFgr($txnnum);
			$status = "";
			if(!empty($pur))
				$status = $pur[0]["xstatus"];
			
			$delurl = URL."pmfgr/recdelete/";
			
			if($status=="Confirmed")
			{
				$delurl="";
			}			
			
			$fields = array(
						"xdate-Date",
						"xfgrnum-Production No",						
						"xitemcode-Item Code",
						"xdesc-Description",
						"xstdcost-Cost",
						"xqty-Qty",						
						);
			$table = new Datatable();
			$row = $this->model->getFgrAll("Created");
			
			return $table->myTable($fields, $row, "xfgrnum", URL."pmfgr/show/".$txnnum."/", $delurl);
			
			
		}
		
		public function confirm(){
			
			$this->model->confirm(" bizid=".Session::get('sbizid')." and xfgrnum='".$_POST['xfgrnum']."' and xstatus='Created'");
			$this->showentry($_POST['xfgrnum']);
		}

		public function cancel(){
			
			$this->model->cancel(" bizid=".Session::get('sbizid')." and xfgrnum='".$_POST['xfgrnum']."' and xstatus='Confirmed'");
			$this->showentry($_POST['xfgrnum']);
		}
		
		function confirmedlist(){
			$rows = $this->model->getFgrAll("Confirmed");
			$cols = array(
						"xdate-Date",
						"xfgrnum-Production No",						
						"xitemcode-Item Code",
						"xdesc-Description",
						"xstdcost-Cost",
						"xqty-Qty",						
						);
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xfgrnum",URL."pmfgr/showentry/");
			$this->view->renderpage('pmfgr/fgrlist', false);
		}
		
		
		function fgrentry(){
				
		$btn = array(
			"Clear" => URL."pmfgr/fgrentry"
		);

		// form data
		$this->view->balance = "";
		
			$dynamicForm = new Dynamicform("Finished Goods Receive",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."pmfgr/save", "Save",$this->values, URL."pmfgr/showpost");
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('pmfgr/fgrentry', false);
		}
		
		
		public function showpost(){
		//echo 123;die;
		$txnnum = $_POST['xbomcode'];
			
		$tblvalues=array();
		
		$btn = array(
			"New" => URL."pmfgr/fgrentry"
		);
		
		$tblvalues = $this->model->getBom($txnnum);
		$status="";
		if(!empty($tblvalues))
			$status = $tblvalues[0]['xstatus'];
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xbomcode"=>$tblvalues[0]['xbomcode'],					
					"xitemcode"=>$tblvalues[0]['xitemcode'],
					"xdesc"=>$tblvalues[0]['xdesc'],
					"xrawitem"=>"",	
					"xunit"=>"",					
					"xstdcost"=>"0",
					"xrow"=>"0",
					);
			
		
			
		// form data
			$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Finshed Goods Receive", $btn,'<a style="color:red" id="invnum" href="'.URL.'pmfgr/printfgr/'.$txnnum.'">Click To Print Finshed Goods Receive - '.$txnnum.'</a>');		
			
			$confurl = array();
			$saveurl = "";
			if($status=="Created"){
				$confurl = array(URL."pmfgr/confirm","Confirm");
				$saveurl = URL."pmfgr/edit/";
			}
			if($status=="Confirmed"){
				$confurl = array(URL."pmfgr/cancel","Cancel");
				$saveurl="";
			}
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, "Save",$tblvalues ,URL."pmfgr/showpost",$confurl);
			
			$this->view->table = $this->renderTable($txnnum);
			
			$this->view->renderpage('pmfgr/bomentry');
		}

		function recdelete($fgrnum=""){
			$grn = $this->model->getFgr($fgrnum);
			$status = "";
			if(!empty($grn))
				$status = $grn[0]["xstatus"];
			if($status=="Created")
				$this->model->recdelete(" WHERE xfgrnum='".$fgrnum."'");
			
			$this->showentry($fgrnum);
		}

		function printfgr($fgrnum=""){
			
			$values = $this->model->getFgr($fgrnum);
			//print_r($values);die;
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li>Finshed Goods Receive</li>							
						   </ul>';
			
			$bomcode="";

			$dt = $this->model->getvbomdt($values[0]["xitemcode"]);
			$this->view->date=$values[0]["xdate"];
			//print_r($dt); die;
			$totqty = 0;
			$totcost = 0;
			$finisheditem="";
			
			$finisheditemdesc="";
			
			foreach($dt as $key=>$val){

				$bomcode=$val["xbomcode"];
				
				$finisheditem=$val['xitemcode'];
				$finisheditemdesc=$val['xitemdesc'];
				
				$totqty+=$val['xqty']*$values[0]["xqty"];
				$totcost+=$val['xstdcost'];
			}

			$this->view->bomcode=$bomcode;
			$this->view->finisheditem=$finisheditem;

			$this->view->finisheditemdesc=$finisheditemdesc;

			$this->view->finishedqty=$values[0]["xqty"];

			$this->view->finishedcost=$values[0]["xstdcost"];
				
			$this->view->totqty=$totqty;
			
			$this->view->totcost=$totcost;
			
			$this->view->vrow = $dt;
			
			$this->view->vrptname = "Finshed Goods Receive From Production";
			$this->view->org=Session::get('sbizlong');
			
			$this->view->renderpage('pmfgr/printfgr');		
		}
}