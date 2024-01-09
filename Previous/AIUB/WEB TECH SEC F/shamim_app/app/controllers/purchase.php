<?php
class Purchase extends Controller{
	
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
				if($menus["xsubmenu"]=="Local Purchase Order")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/schoolsales/js/jquery-ui-1.12.1.min.js','public/theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js','views/purchase/js/getitemdt.js','views/suppliers/js/getsup.js','public/js/autocomplete.js','views/purchase/js/data.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"xponum"=>"",
			"xsup"=>"",
			"xsupname"=>"",
			"xwh"=>"",
			"xsupdoc"=>"",
			"xitemcode"=>"",
			"xnote"=>"",
			"xdesc"=>"",
			"xqty"=>"0",
			"xrow"=>"0",
			"xratepur"=>"0.00",
			"ximreqnum"=>"",
			"xproj"=>"",
			"xgitem"=>"",
			"xpur"=>""
			);
			
			$this->fields = array(
						array(
							"Purchase Detail-div"=>''													
							),
						array(
							"xponum-text"=>'PO No_maxlength="20"',
							"xdate-datepicker" => 'Date_""'							
							),
						array(
							"xsup-group_".URL."suppliers/picklist"=>'Supplier*~star_""',
							"xsupname-text"=>'Name_readonly'
							),
						array(
							"xwh-select_Warehouse"=>'Warehouse*~star_maxlength="50"',
							"xsupdoc-text"=>'Ref_maxlength="50"'														
							),
						array(
							"ximreqnum-text"=>'Req. No_maxlength="20"',
							"xproj-select_Project"=>'Project*~star_maxlength="50"',
							),
						array(
    						"xgitem-select_Item Group"=>'Type*~star_maxlength="50"',
    						),
						array(							
							"xnote-textarea"=>'Additional Notes_""'							
							),
						array(
							"Item Detail-div"=>''													
							),
						array(
							"xitemcode-group_".URL."itempicklist/picklist"=>'Item Code_maxlength="20"',
							"xdesc-text"=>'Description_readonly'							
							),
						array(
							"xpur-select_Purpose"=>'Purpose*~star',
							"xratepur-text_number"=>'Rate*~star_number="true" minlength="1" maxlength="18" required'
							),
						array(
							"xqty-text_number"=>'Quantity*~star_number="true" minlength="1" maxlength="18" required',
							"xrow-hidden"=>''
							)
						
						);
						
								
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."purchase/purchaseentry",
		);	
		
					
			$this->view->rendermainmenu('purchase/index');
			
		}
		
		public function savepurchase(){
				if (empty($_POST['xitemcode']) || empty($_POST['xdesc']) || empty($_POST['xqty'])){
					header ('location: '.URL.'purchase/purchaseentry');
					exit;
				}
								
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
				$yearoffset = Session::get('syearoffset');
				$txnnum = $_POST['xponum'];
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

						->post('xnote')
						->val('maxlength', 1000)
						
						->post('xgitem')
						->val('maxlength', 50)
						
						->post('xsupdoc')						
						->val('maxlength', 50)
						
						->post('ximreqnum')						
						->val('maxlength', 20)
						
						->post('xproj')						
						->val('maxlength', 50)
						
						->post('xqty')
						
						->post('xratepur')

						->post('xpur');
						
				$form	->submit();
				
				
					
				
				$data = $form->fetch();
				
				
				$item = $this->model->getItem($data['xitemcode']);
				
				if($data['xponum'] == "")
					$keyfieldval = $this->model->getKeyValue("pomst","xponum","PORD-","6");
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
				
				$cols = "`bizid`,`xponum`,`xrow`,`xitemcode`,`xitembatch`,`xqty`,`xdate`,`xratepur`,`xwh`,`xbranch`,`xproj`,`xpur`,`xtaxrate`,`xdisc`,`xexch`,`xcur`,`xtaxcode`,`xtaxscope`,`zemail`,`xunitpur`,`xconversion`,`xunitstk`,`xtypestk`";
				
				$vals = "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $rownum ."','". $data['xitemcode'] ."','". $data['xitemcode'] ."',
				'". $data['xqty'] ."','". $date ."','". $data['xratepur'] ."','". $data['xwh'] ."','". $data['xwh'] ."','". $data['xwh'] ."','".$data['xpur']."','0','0','1','".Session::get('sbizcur')."','None','None','".$data['zemail']."','".$item[0]['xunitpur']."','".$item[0]['xconversion']."','".$item[0]['xunitstk']."','".$item[0]['xtypestk']."')";
				
					
				$success = $this->model->create($data, $cols, $vals);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					$this->result = 'Purchase Order Created</br><a style="color:red" id="invnum" href="'.URL.'purchase/printpo/'.$keyfieldval.'">Click To Print Purchase Order - '.$keyfieldval.'</a>';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Purchase Order! Reason: Could be Duplicate Trunsaction Code or system error!";
				
				 $this->showreq($keyfieldval, $this->result);
				 
				 
				
		}
		
		public function editpurchase(){
			
			if (empty($_POST['xponum'])){
					header ('location: '.URL.'purchase/purchaseentry');
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
				//print_r($this->model->getYearPer($yearoffset,intval($month))); die;
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

						->post('xnote')
						->val('maxlength', 1000)
						
						->post('xgitem')
						->val('maxlength', 50)
						
						->post('xsupdoc')
						->val('maxlength', 50)
						
						->post('ximreqnum')
						->val('maxlength', 50)
						
						->post('xproj')
						->val('maxlength', 50)
						
						->post('xqty')
						
						->post('xratepur')

						->post('xpur');
						
				$form	->submit();
				
			
				
				$data = $form->fetch();	
				//print_r($data);die;
				$item = $this->model->getItem($data['xitemcode']);
						
				$hd = array (
					"xemail"=>Session::get('suser'),
					"zutime"=>date("Y-m-d H:i:s"),
					"xdate"=>$date,
					"xsup"=>$data['xsup'],
					"xwh"=>$data['xwh'],
					"xbranch"=>$data['xwh'],
					"xproj"=>$data['xwh'],
					"xnote"=>$data['xnote'],
					"xsupdoc"=>$data['xsupdoc'],
					"ximreqnum"=>$data['ximreqnum'],
					"xproj"=>$data['xproj'],
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
					"xunitstk"=>$item[0]['xunitstk'],
					"xtypestk"=>$item[0]['xtypestk'],
					"xpur"=> $data['xpur']
				);
				
				$success = $this->model->edit($hd,$dt,$ponum,$_POST['xrow']);
				
				
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
				
				 $this->showreq($ponum, $result.'<br /><a style="color:red" id="invnum" href="'.URL.'purchase/printpo/'.$ponum.'">Click To Print Purchase - '.$ponum.'</a>');
				
		
		}
		
		public function show($txnnum, $row, $result=""){
		if($txnnum=="" || $row==""){
			header ('location: '.URL.'purchase/purchaseentry');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."purchase/purchaseentry"
		);
		if($result=="")
			$result='<a style="color:red" id="invnum" href="'.URL.'purchase/printpo/'.$txnnum.'">Click To Print Purchase - '.$txnnum.'</a>';
		
		$tblvalues = $this->model->getPurchase($txnnum);
		$tbldtvals = $this->model->getSinglePurchaseDt($txnnum, $row);
		//print_r($tbldtvals);die;
		$status="";
		$reqnum = $txnnum;
		if(!empty($tblvalues)){
			$status = $tblvalues[0]['xstatus']; //echo $status; die;
			$reqnum = $tblvalues[0]['ximreqnum'];
		}
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xponum"=>$tblvalues[0]['xponum'],
					"xsup"=>$tblvalues[0]['xsup'],
					"xsupname"=>$tblvalues[0]['xsupname'],
					"xsupdoc"=>$tblvalues[0]['xsupdoc'],
					"ximreqnum"=>$tblvalues[0]['ximreqnum'],
					"xproj"=>$tblvalues[0]['xproj'],
					"xwh"=>$tblvalues[0]['xwh'],
					"xgitem"=>$tblvalues[0]['xtype'],
					"xnote"=>$tblvalues[0]['xnote'],
					"xitemcode"=>$tbldtvals[0]['xitemcode'],
					"xdesc"=>$tbldtvals[0]['xdesc'],
					"xqty"=>$tbldtvals[0]['xqty'],
					"xrow"=>$tbldtvals[0]['xrow'],
					"xratepur"=>$tbldtvals[0]['xratepur'],
					"xpur"=> $tbldtvals[0]['xpur']
					);
			
		// form data
			$confurl = array();
			$saveurl = "";
			if($status=="Created"){
				$confurl = array(URL."purchase/confirmpur", "Confirm");
				$saveurl = URL."purchase/editpurchase/";
			}
			if($status=="Confirmed"){
				$confurl = array(URL."purchase/cancelpur", "Cancel");
				$saveurl="";
			}
		$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Purchase Order", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, "Update",$tblvalues, URL."purchase/showpost");
			
			$this->view->table = $this->renderTable($txnnum);
			$this->view->reqtable =  $this->renderTableReq($reqnum);
			
			$this->view->renderpage('purchase/purchaseentry');
		}
		
		
		
		public function showentry($txnnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."purchase/purchaseentry"
		);
		if($result=="")
			$result='<a style="color:red" id="invnum" href="'.URL.'purchase/printpo/'.$txnnum.'">Click To Print Purchase - '.$txnnum.'</a>';
		$tblvalues = $this->model->getPurchase($txnnum);
		$status="";
		if(!empty($tblvalues))
			$status = $tblvalues[0]['xstatus'];
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xponum"=>$tblvalues[0]['xponum'],
					"xsup"=>$tblvalues[0]['xsup'],
					"xsupname"=>$tblvalues[0]['xsupname'],
					"xsupdoc"=>$tblvalues[0]['xsupdoc'],
					"ximreqnum"=>$tblvalues[0]['ximreqnum'],
					"xproj"=>$tblvalues[0]['xproj'],
					"xwh"=>$tblvalues[0]['xwh'],
					"xgitem"=>$tblvalues[0]['xtype'],
					"xnote"=>$tblvalues[0]['xnote'],
					"xitemcode"=>"",
					"xdesc"=>"",
					"xqty"=>"0",
					"xrow"=>"0",
					"xratepur"=>"0",
					"xpur"=>""
					);
			$this->view->balance = "";
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Purchase", $btn, $result);		
			$confurl = array();
			$saveurl = "";
			if($status=="Created"){
				$confurl = array(URL."purchase/confirmpur", "Confirm");
				$saveurl = URL."purchase/savepurchase/";
			}
			if($status=="Confirmed"){
				$confurl = array(URL."purchase/cancelpur", "Cancel");
				$saveurl="";
			}
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, "Save",$tblvalues ,URL."purchase/showpost",$confurl);
			
			$this->view->table = $this->renderTable($txnnum);
			$this->view->reqtable = $this->renderTableReq($txnnum);
			
			$this->view->renderpage('purchase/purchaseentry');
		}
		public function showreq($txnnum, $result=""){
			
		$dt = date('Y/m/d');
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."purchase/purchaseentry"
		);
		//if($result=="")
			//$result='<a style="color:red" id="invnum" href="'.URL.'purchase/printpo/'.$txnnum.'">Click To Print Purchase - '.$txnnum.'</a>';
		$tblvalues = $this->model->getPurchase($txnnum);
		$status="";
		$reqnum=$txnnum;
		$proj = "";
		$gitem = "";
		$wh = "";
		if(!empty($tblvalues)){
			$status = $tblvalues[0]['xstatus'];
			$reqnum = $tblvalues[0]['ximreqnum'];
		}
		if(empty($tblvalues)){
			$reqmst = $this->model->getImreq($reqnum);
			if(!empty($reqmst)){
				$proj = $reqmst[0]['xproject'];
				$gitem = $reqmst[0]['xtype'];
				$wh = $reqmst[0]['xwh'];
			}
			$tblvalues=array(
				"xdate"=>$dt,
				"xponum"=>"",
				"xsup"=>"",
				"xsupname"=>"",
				"xsupdoc"=>"",
				"ximreqnum"=>$reqnum,
				"xproj"=>$proj,
				"xwh"=>$wh,
				"xgitem"=>$gitem,
				"xnote"=>"",
				"xitemcode"=>"",
				"xdesc"=>"",
				"xqty"=>"0",
				"xrow"=>"0",
				"xratepur"=>"0",
				"xpur"=>""
				);
			}
		else
			$tblvalues=array(
				"xdate"=>$tblvalues[0]['xdate'],
				"xponum"=>$tblvalues[0]['xponum'],
				"xsup"=>$tblvalues[0]['xsup'],
				"xsupname"=>$tblvalues[0]['xsupname'],
				"xsupdoc"=>$tblvalues[0]['xsupdoc'],
				"ximreqnum"=>$tblvalues[0]['ximreqnum'],
				"xproj"=>$tblvalues[0]['xproj'],
				"xwh"=>$tblvalues[0]['xwh'],
				"xgitem"=>$tblvalues[0]['xtype'],
				"xnote"=>$tblvalues[0]['xnote'],
				"xitemcode"=>"",
				"xdesc"=>"",
				"xqty"=>"0",
				"xrow"=>"0",
				"xratepur"=>"0",
				"xpur"=>""
				);
			$this->view->balance = "";
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Purchase", $btn, $result);			
			$confurl = array();
			$saveurl = "";
			if($status=="Created"){
				$confurl = array(URL."purchase/confirmpur", "Confirm");
				$saveurl = URL."purchase/savepurchase/";
			}
			if($status=="Confirmed"){
				$confurl = array(URL."purchase/cancelpur", "Cancel");
				$saveurl="";
			}
			if($status==""){
				$confurl = array();
				$saveurl=URL."purchase/savepurchase";
			}
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, "Save",$tblvalues ,URL."purchase/showpost",$confurl);
			
			$this->view->table = $this->renderTable($txnnum);
			$this->view->reqtable = $this->renderTableReq($reqnum);
			
			$this->view->renderpage('purchase/purchaseentry');
		}

		public	function renderTableReq($txnnum){
			$fields = array(
						"xrow-Sl",
						"xitemcode-Item Code",
						"xitemdesc-Description",
						"xqty-Req Qty",
						"xpoqty-PO Qty",
						"xratepur-Ref. value"
						);
			$table = new Datatable();
			$row = $this->model->getReqItemList($txnnum);
			return $table->myTableSubmit($fields, $row, "xrow", URL."purchase/getsinglereq/".$txnnum."/");
						
		}
		
		public function getsinglereq($txnnum, $row){
			$this->model->getSingleReq($txnnum, $row);
		}
		
		public function confirmpur(){
			
			$this->model->confirm(" bizid=".Session::get('sbizid')." and xponum='".$_POST['xponum']."' and xstatus='Created'");
			$this->showreq($_POST['xponum']);
		}

		public function cancelpur(){
			
			$this->model->cancel(" bizid=".Session::get('sbizid')." and xponum='".$_POST['xponum']."' and xstatus='Confirmed'");
			$this->showreq($_POST['xponum']);
		}
		
		function renderTable($txnnum){

			$pur = $this->model->getPurchase($txnnum);
			$status = "";
			if(!empty($pur))
				$status = $pur[0]["xstatus"];
			
			$delbtn = "";
			if(count($pur)>0){
			if($pur[0]["xstatus"]=="Created")
				$delbtn = URL."purchase/recdelete/".$txnnum."/";
				
			}
			
			$row = $this->model->getvpodt($txnnum);
			
			$table = '<table class="table table-striped table-bordered">';
				$table .='<thead>
							<th></th><th></th><th>Sl.</th><th>Itemcode</th><th>Description</th><th style="text-align:right">Rate</th><th style="text-align:right">Qty</th><th>UOM</th><th style="text-align:right">Total</th>
						</thead>';
						$totalqty = 0;
						$total = 0;
						$totaltax = 0;
						$totaldisc = 0;
						$table .='<tbody>';

						foreach($row as $key=>$val){
							$showurl = URL."purchase/show/".$txnnum."/".$val['xrow'];
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
								$table .='<td align="right">'.$val['xqty'].'</td>';
								$table .='<td>'.$val['xunitpur'].'</td>';
								//$table .='<td align="right">'.$val['xtaxtotal'].'</td>';
								//$table .='<td align="right">'.$val['xdisctotal'].'</td>';
								$subtotal = $val['xtotal']+$val['xtotaltax']-$val['xtotaldisc'];
								$table .='<td align="right">'.$subtotal.'</td>';
								$total+=$subtotal;
								$totalqty+=	$val['xqty'];
								//$totaltax +=$val['xtaxtotal'];
								//$totaldisc+= $val['xdisctotal'];
								
							$table .="</tr>";
						}
							$table .='<tr><td align="right" colspan="6"><strong>Total</strong></td><td align="right"><strong>'.$totalqty.'</strong></td><td></td><td align="right"><strong>'.$total.'</strong></td></tr>';
							/*$net=0;
							if(!empty($row)){
								$table .='<tr><td align="right" colspan="8"><strong>Fixed Discount</strong></td><td align="right"><strong>'.$row[0]["xgrossdisc"].'</strong></td></tr>';
								
								//$net = $total-$row[0]["xgrossdisc"];
							}
							$table .='<tr><td align="right" colspan="8"><strong>Net Total</strong></td><td align="right"><strong>'.$net.'</strong></td></tr>';*/
							 	
					$table .="</tbody>";			
			$table .= "</table>";
			
			return $table;
			
			/*$pur = $this->model->getPurchase($txnnum);
			$status = "";
			if(!empty($pur))
				$status = $pur[0]["xstatus"];
			
			$delurl = URL."purchase/recdelete/".$txnnum."/";
			
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
			
			return $table->myTable($fields, $row, "xrow", URL."purchase/show/".$txnnum."/", $delurl);
			*/
			
		}
		
		
		function polist(){
			$rows = $this->model->getPurchaseList("Confirmed");
			$cols = array("xdate-Date","xponum-PO No","xsup-Supplier","xsupname-Name","xsupdoc-Suplier Doc","xwh-Warehouse","xproj-Project","xpur-Purpose");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xponum",URL."purchase/showreq/");
			$this->view->renderpage('purchase/purchaselist', false);
		}
		function unconfirmedlist(){
			$rows = $this->model->getPurchaseList("Created");
			$cols = array("xdate-Date","xponum-PO No","xsup-Supplier","xsupname-Name","xsupdoc-Suplier Doc","xwh-Warehouse","xproj-Project","xpur-Purpose");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xponum",URL."purchase/showreq/");
			$this->view->renderpage('purchase/purchaselist', false);
		}
		function requisitionlist($type){
			$rows = $this->model->getRequisionList("Confirmed",$type);
			$cols = array("ximreqnum-Requisition No","xdate-Date","xproject-Project","xwh-Warehouse","xpur-Purpose","zemail-Created by");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "ximreqnum",URL."purchase/showreq/");
			//,URL."purchasegrn/createpoall/","Create PO"
			$this->view->renderpage('purchase/purchaselist', false);
		}
		
		function purchaseentry(){
				
			$btn = array(
				"Clear" => URL."purchase/purchaseentry"
			);

			// form data
			$this->view->balance = "";
			$this->view->reqtable = "";
		
			$dynamicForm = new Dynamicform("Purchase Order",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."purchase/savepurchase", "Save",$this->values, URL."purchase/showpost");
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('purchase/purchaseentry', false);
		}
		
		
		public function showpost(){
		$dt = date('d-m-Y');
		$txnnum = $_POST['xponum'];
			
		$tblvalues=array();
		
		$btn = array(
			"New" => URL."purchase/purchaseentry"
		);
		
		$tblvalues = $this->model->getPurchase($txnnum);

		
		$status="";
		$reqnum=$txnnum;
		if(!empty($tblvalues)){
			$status = $tblvalues[0]['xstatus'];
			$reqnum = $tblvalues[0]['ximreqnum'];
		}
		if(empty($tblvalues)){
			//$reqmst = $this->model->getImreq($reqnum);
			$tblvalues=array(
				"xdate"=>$dt,
				"xponum"=>"",
				"xsup"=>"",
				"xsupname"=>"",
				"xsupdoc"=>"",
				"ximreqnum"=>$reqnum,
				"xproj"=>"",
				"xwh"=>"",
				"xgitem"=>"",
				"xnote"=>"",
				"xitemcode"=>"",
				"xdesc"=>"",
				"xqty"=>"0",
				"xrow"=>"0",
				"xratepur"=>"0",
				"xpur"=>""
				);
			}
		else
			$tblvalues=array(
				"xdate"=>$tblvalues[0]['xdate'],
				"xponum"=>$tblvalues[0]['xponum'],
				"xsup"=>$tblvalues[0]['xsup'],
				"xsupname"=>$tblvalues[0]['xsupname'],
				"xsupdoc"=>$tblvalues[0]['xsupdoc'],
				"ximreqnum"=>$tblvalues[0]['ximreqnum'],
				"xproj"=>$tblvalues[0]['xproj'],
				"xwh"=>$tblvalues[0]['xwh'],
				"xgitem"=>$tblvalues[0]['xtype'],
				"xnote"=>$tblvalues[0]['xnote'],
				"xitemcode"=>"",
				"xdesc"=>"",
				"xqty"=>"0",
				"xrow"=>"0",
				"xratepur"=>"0",
				"xpur"=>""
				);
			
		
			
		// form data
			$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Purchase Order", $btn,'<a style="color:red" id="invnum" href="'.URL.'purchase/printpo/'.$txnnum.'">Click To Print Purchase - '.$txnnum.'</a>');
			$confurl = array();
			$saveurl = "";
			if($status=="Created"){		
				$confurl = array(URL."purchase/confirmpur", "Confirm");
				$saveurl = URL."purchase/savepurchase/";
			}
			if($status=="Confirmed"){
				$confurl = array(URL."purchase/cancelpur", "Cancel");
				$saveurl="";
			}
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, "Save",$tblvalues ,URL."purchase/showpost",$confurl);
			
			$this->view->table = $this->renderTable($txnnum);
			$this->view->reqtable = $this->renderTableReq($reqnum);
			
			$this->view->renderpage('purchase/purchaseentry');
		}
		function recdelete($ponum, $row){
			$grn = $this->model->getPurchase($ponum);
			$status = "";
			if(!empty($grn))
				$status = $grn[0]["xstatus"];
			if($status=="Created")
				$this->model->recdelete(" WHERE xponum='".$ponum."' and xrow=".$row);
			
			$this->showreq($ponum);
		}
		function printpo($pono=""){
			
			$values = $this->model->getvpodt($pono);
			//print_r($values);die;
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li>Purchase Order</li>							
						   </ul>';
			
			$this->view->pono=$pono;
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
			$note = "";
			$xproject = "";
			
			foreach($values as $key=>$val){
				//print_r($val);
				$xdate=date("d-m-Y", strtotime($val['xdate']));;
				$xsup = $val['xsup'];
				$xproject = $val['xproj'];
				// $supplier=$val['xorg'];
				// $supadd=$val['xsupadd'];
				// $supphone=$val['xsupphone'];
				$supdoc=$val['xsupdoc'];
				$note=$val['xnote'];
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
			$this->view->note=$note;
			$this->view->supdoc=$supdoc;			
			$this->view->totqty=$totqty;
			$this->view->total=$total;
			$this->view->xproject=$xproject;
			
			$cur = new Currency();
			$this->view->inword="In Words: ". $cur->get_bd_amount_in_text($total);
			$this->view->vrow = $values;
			
			$this->view->vrptname = "Purchase Order";
			$this->view->org=Session::get('sbizlong');
			
			$this->view->renderpage('purchase/printpurchase');		
		}



		
		// public function createpoall($txnnum){
		// 	$pomilesone = $this->model->checkMilestone($txnnum);
			
		// 	if($pomilesone[0]['xmilestone']=="Milestone Completed"){
		// 		header ('location: '.URL.'purchase/purchaseentry');
		// 		exit;
		// 	}
			
		// 	$xdate = date("Y/m/d");
		// 	$dt = str_replace('/', '-', $xdate);
		// 	$date = date('Y-m-d', strtotime($dt));
		// 	$month = date('m',strtotime($date)); 
		// 	$xyear = 0;
		// 	$xper = 0;
		// 	$yearoffset = Session::get('syearoffset');
		// 	foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
		// 		$xper = $key;
		// 		$xyear = $val;
		// 	}	
			
		// 	$purchase = $this->model->getpurchasebytxn($txnnum);
		// 	$detail = $this->model->getpurchasedtbytxn($txnnum);
		// 	$keyfieldval="";
		// 	$keyfieldval = $this->model->getKeyValue("pogrnmst","xgrnnum","GRN0","6");

		// 	$data=array();
			
		// 	$data['zemail']=Session::get('suser');
		// 	$data['bizid']=Session::get('sbizid');
		// 	$data['xgrnnum']=$keyfieldval;
		// 	$data['xponum']=$purchase[0]['xponum'];
		// 	$data['xdate']=$date;
		// 	$data['xsup']=$purchase[0]['xsup'];
		// 	$data['xwh']=$purchase[0]['xwh'];
		// 	$data['xbranch']=$purchase[0]['xbranch'];
		// 	$data['xproj']=$purchase[0]['xproj'];
		// 	$data['xstatus']='Created';
		// 	$data['xfinyear']=$xyear;
		// 	$data['xfinper']=$xper;

			
		// 	$cols = "zemail,bizid,xgrnnum,xponum,xrowtrn,xrow,xdate,xitemcode,xitembatch,xqtypur,xextqty,xqty,xunitstk,xratepur,xstdcost,xtaxrate,xdisc,xwh,xbranch,xproj,xexch,xcur,xunitpur,xtypestk,xconversion";
		// 	$vals =	"";
		// 	$i=0;
		// 	foreach($detail as $key=>$value){

		// 	//$itemcost = $this->model->getItemcost($value['xitemcode']);
		// 		$pocost = array();
				
		// 		$pocost = $this->model->getpocost($value["xponum"],$value['xitemcode']);
		// 		//print_r($pocost); die;
		// 		$valrate = $value["xratepur"];
		// 		$valexch = $value["xexch"];
		// 		$rate = $valrate*$valexch;
				
		// 		//$pqty = $value["xqty"];
		// 		$pcost = $valrate*$valexch;
		// 		if(!empty($pocost)){
		// 			//$poqty = $pocost[0]['xqty'];
		// 			$pcost = $pocost[0]['xpocost'];
		// 		}
		// 		$cost = $pcost;
				
		// 	$i++;	
		// 		$grnqt = $value['xqty']-$value['xgrnqty'];
				
		// 		$vals .= "('".$value['zemail']."'," . Session::get('sbizid') . ",'". $keyfieldval ."','". $value['xponum'] ."',". $value['xrow'] .",". $i .",'". $date ."','". $value['xitemcode'] ."','". $value['xitemcode'] ."',
		// 			". $grnqt .",'0',". $value['xqty'] .",'". $value['xunitstk'] ."',". $rate .",".$cost.",'". $value['xtaxrate'] ."','". $value['xdisc'] ."','". $value['xwh'] ."','". Session::get('sbranch') ."','". Session::get('sbranch') ."','1','". Session::get('sbizcur') ."','". $value['xunitpur'] ."','". $value['xtypestk'] ."','". $value['xconversion'] ."'),";
				
		// 	}
		// 	//echo $vals; die;
		// 	$vals = rtrim($vals,",");
			
		// 	$success = 0;
			
		// 	$result = "";

		// 	try{
			
		// 	$success=$this->model->creategrnall($data,$cols,$vals);
			
		// 	}catch(Exception $e){
		// 		$$this->result = $e->getMessage();
		// 	}

		// 	if($success>0)
		// 		$result = 'Goods Receipt Note Created</br><a style="color:red" id="invnum" href="'.URL.'purchase/printpo/'.$keyfieldval.'">Click To Print GRN - '.$keyfieldval.'</a>';;	
			
		// 	$this->showgrnentry($keyfieldval, $result);
		// }
}