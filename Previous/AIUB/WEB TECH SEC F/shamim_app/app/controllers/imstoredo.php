<?php
class Imstoredo extends Controller{
	
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
				if($menus["xsubmenu"]=="Store Delivery")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/imstoredo/js/getreqitemdt.js','views/imstoredo/js/getitemdt.js','views/imstoredo/js/getaccdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"xreqdelnum"=>"",
			"ximreqnum"=>"",	
			"xitemcode"=>"",
			"xdesc"=>"",
			"xqty"=>"0",
			"xrow"=>"0",
			"xwh"=>"",
			"xproj"=>"",
			"xdeliveryto"=>""
			);
			
			$this->fields = array(
						array(
							"Delivery Detail-div"=>''													
							),
						array(							
							"xdate-datepicker" => 'Date_""'							
							),
						array(
							"xreqdelnum-text"=>'DO No_maxlength="20"'							
							),
						array(							
							"ximreqnum-text"=>'Req. No_maxlength="20" readonly'	
							),
						array(							
							"xproj-select_Project"=>'Project*~star_maxlength="50"'
							),
						array(							
							"xdeliveryto-text"=>'Delivery To_maxlength="300" readonly'
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
							"xwh-select_Warehouse"=>'Warehouse*~star_maxlength="50"'
							),
						);
														
		}
		
		public function index(){		
		
		$btn = array(
			"Clear" => URL."imstoredo/doentry",
		);	
		
					
			$this->view->rendermainmenu('imstoredo/index');
			
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
						
						->post('ximreqnum')
						->val('maxlength', 20)					
				
						->post('xwh')
						->val('minlength', 1)
						->val('maxlength', 50)
				
						->post('xproj')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('xrow')
						->val('minlength', 1)
						->val('maxlength', 5)
												
						->post('xqty');

						
				$form	->submit();
				
				$data = $form->fetch();
				

				$itemdetail = $this->model->getItemDetail($data['xitemcode']);
				$itemcost = $this->model->getItemcost($data['xitemcode']);

				$cost = $itemdetail[0]['xstdcost'];
				
				if(!empty($itemcost)){
					$cost = $itemcost[0]['avgcost'];
				}	

				if($data['xreqdelnum'] == "")
					$keyfieldval = $this->model->getKeyValue("imstoredelmst","xreqdelnum","SQDO-","6");
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
				
				$rownum = $data['xrow'];

				
				$row = $this->model->getRow("imstoredeldet","xreqdelnum",$data['xreqdelnum'], "xrow");
				$item = $this->model->getItemDetail($data['xitemcode']);
				
				
				$cols = "`bizid`,`xreqdelnum`,`ximreqnum`,`xrow`,`xitemcode`,`xitembatch`,`xqty`,`xdate`,`xwh`,`xbranch`,`xunit`,`zemail`,`xrowtrn`,`xstdcost`,`xtypestk`";
				
				$vals = "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $data['ximreqnum'] ."','". $row ."','". $data['xitemcode'] ."','". $data['xitemcode'] ."',
				'". $data['xqty'] ."','". $date ."','". $data['xwh'] ."','". Session::get('sbranch') ."','".$item[0]['xunitstk']."','".Session::get('suser')."','".$rownum."','".$cost."','".$item[0]['xtypestk']."')";
				
									
				$success = $this->model->create($data, $cols, $vals);
				
				if(empty($success))
					$success=0;

				}catch(Exception $e){
					$this->result = $e->getMessage();
				}
				
				if($success>0)
					$this->result = 'Delivery Created</br><a style="color:red" id="invnum" href="'.URL.'imstoredo/printchalan/'.$keyfieldval.'">Print Delivery - '.$keyfieldval.'</a>';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Delivery! Reason: Could be Duplicate Trunsaction Code or system error!";
				
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
				
						->post('xwh')
						->val('minlength', 1)
						->val('maxlength', 50)
				
						->post('xproj')
						->val('minlength', 1)
						->val('maxlength', 50)

						->post('xqty');
						
						
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
					"xwh"=>$data['xwh'],
					"xbranch"=>$data['xwh'],
					"xproj"=>$data['xproj'],
					"xfinyear" => $xyear,
					"xfinper" => $xper					
				);
				
				$dt = array (
					"xitemcode"=>$data['xitemcode'],
					"xqty"=>$data['xqty'],
					"xwh"=>$data['xwh'],
					"xbranch"=>$data['xwh'],
					//"xproj"=>$data['xwh'],
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
				
				 $this->showdoentry($donum, $result.'<br /><a style="color:red" id="invnum" href="'.URL.'imstoredo/printchalan/'.$donum.'">Print Delivery - '.$donum.'</a>');
					
		
		}
		
		
		public function show($txnnum, $row, $result=""){
		if($txnnum=="" || $row==""){
			header ('location: '.URL.'imstoredo/doentry');
			exit;
		}

		if($result=="")
			$result='<a style="color:red" id="invnum" href="'.URL.'imstoredo/printchalan/'.$txnnum.'">Print Delivery - '.$txnnum.'</a>';	

		$tblvalues=array();
		$btn = array(
			"New" => URL."imstoredo/doentry"
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
			$sonum=$tbldtvals[0]['ximreqnum'];
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xreqdelnum"=>$tblvalues[0]['xreqdelnum'],
					"xwh"=>$tbldtvals[0]['xwh'],
					"ximreqnum"=>$tblvalues[0]['ximreqnum'],
					"xproj"=>$tblvalues[0]['xproj'],
					"xdeliveryto"=>$tblvalues[0]['xdeliveryto'],
					"xitemcode"=>$tbldtvals[0]['xitemcode'],
					"xdesc"=>$tbldtvals[0]['xdesc'],
					"xqty"=>$tbldtvals[0]['xqty'],
					"xrow"=>$tbldtvals[0]['xrow']
					);
		}
			
		// form data
			$confurl = "";
			$saveurl = "";
			if($status=="Created"){
				$confurl = array(URL."imstoredo/confirmdo", "Confirm");
				$saveurl = URL."imstoredo/editdo/";
			}
			if($status=="Confirmed"){
				$confurl = array(URL."imstoredo/canceldo", "Cancel");
				$saveurl="";
			}
		$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Delivery", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, $saveurl, "Update",$tblvalues, URL."imstoredo/showpost");
			
			$this->view->table = $this->renderTable($sonum);
			$this->view->potable = $this->renderDoTable($txnnum);;
			
			$this->view->renderpage('imstoredo/doentry');
		}
		
		public function getsinglereq($req, $row){
			$this->model->getSingleQty($req, $row);
		}
		
		public function showentry($txnnum, $result=""){

		
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."imstoredo/doentry"
		);
		
		$tblvalues = $this->model->getReqheader($txnnum);
		$dt = date("Y/m/d");
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$dt,
					"xreqdelnum"=>"",
					"ximreqnum"=>$tblvalues[0]['ximreqnum'],
					"xproj"=>$tblvalues[0]['xproject'],
					"xdeliveryto"=>$tblvalues[0]['xdeliveryto'],
					"xwh"=>"",
					"xitemcode"=>"",
					"xdesc"=>"",
					"xqty"=>"0",
					"xrow"=>"0"
					);
			$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Delivery From Requisition", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."imstoredo/savedo/", "Save",$tblvalues ,URL."imstoredo/showpost");
			
			$this->view->table = $this->renderTable($txnnum);
			$this->view->potable = "";
			$this->view->renderpage('imstoredo/doentry');
		}
		
		public function showdoentry($txnnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."imstoredo/doentry"
		);
		if($result=="")
			$result='<a style="color:red" id="invnum" href="'.URL.'imstoredo/printchalan/'.$txnnum.'">Print Delivery - '.$txnnum.'</a>';
		$tblvalues = $this->model->getDelivery($txnnum);
		//print_r($tblvalues);
		$sonum = "";
		$status="";
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else{
			$sonum = $tblvalues[0]['ximreqnum'];
			$status=$tblvalues[0]['xstatus'];
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xreqdelnum"=>$tblvalues[0]['xreqdelnum'],
					"xproj"=>$tblvalues[0]['xproj'],
					"xdeliveryto"=>$tblvalues[0]['xdeliveryto'],
					"ximreqnum"=>$sonum,
					"xwh"=>"",
					"xitemcode"=>"",
					"xdesc"=>"",
					"xqty"=>"0",
					"xrow"=>"0"
					);
		}
			$this->view->balance = "";
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Delivery", $btn, $result);		
			$confurl = "";
			$saveurl = "";
			if($status=="Created"){
				$confurl = array(URL."imstoredo/confirmdo", "Confirm");
				$saveurl = URL."imstoredo/savedo";
			}
			if($status=="Confirmed"){
				$confurl = array(URL."imstoredo/canceldo", "Cancel");
				$saveurl="";
			}
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, $saveurl, "Save",$tblvalues ,URL."imstoredo/showpost",$confurl);
			
			$this->view->table = $this->renderTable($sonum);
			$this->view->potable = $this->renderDoTable($txnnum);
			$this->view->renderpage('imstoredo/doentry');
		}
		
	public function confirmdo(){

			$donum = $_POST['xreqdelnum'];	
			$result = "";

			$this->model->confirm(" bizid=".Session::get('sbizid')." and xreqdelnum='".$_POST['xreqdelnum']."' and xstatus='Created'");
			
			$tblvalues=array();
			$tblvalues = $this->model->getDelivery($donum);
			
			$result="Confirm Failed";
			
			if($tblvalues[0]['xstatus']=="Confirmed"){
				$result='Confirmed!<a style="color:red" id="invnum" href="'.URL.'imstoredo/printchalan/'.$donum.'">Print Delivery - '.$donum.'</a>';
			}
				
				
			$this->showdoentry($_POST['xreqdelnum']);
		}

	public function canceldo(){

			$voucher = "";
			$donum = $_POST['xreqdelnum'];
			$result = "";

			$this->model->cancel(" bizid=".Session::get('sbizid')." and xreqdelnum='".$donum."' and xstatus='Confirmed'");
			
			$tblvalues=array();
			$tblvalues = $this->model->getDelivery($donum);
			
			$result="Cancel Failed";
			
			if($tblvalues[0]['xstatus']=="Confirmed"){
				$result='Cancel Done!<a style="color:red" id="invnum" href="'.URL.'imstoredo/printchalan/'.$donum.'">Print Delivery - '.$donum.'</a>';
			}
			$this->showdoentry($_POST['xreqdelnum']);
		}
			
	
	public	function renderTable($txnnum){
			$fields = array(												
						"xrow-Txn",						
						"xitemcode-Item Code",
						"xitemdesc-Description",
						"xqty-Qty",
						"xdoqty-DO Qty"	
						);
						
			$table = new Datatable();
			$row = $this->model->getreqdt($txnnum);
			
			return $table->myTableSubmit($fields, $row, "xrow", URL."imstoredo/getsinglereq/".$txnnum."/");
						
		}
		
	public	function renderDoTable($txnnum){
			$pur = $this->model->getDelivery($txnnum);
			$status = "";
			if(!empty($pur))
				$status = $pur[0]["xstatus"];
			
			$delurl = URL."imstoredo/recdelete/".$txnnum."/";
			
			if($status=="Confirmed")
			{
				$delurl="";
			}
			//$tblvalues = $this->model->getDelivery($txnnum);
			$row = $this->model->getdeliverydt($txnnum);
			
			$table = '<table class="table table-striped table-bordered">';
				$table .='<thead>
							<th></th><th></th><th>Sl.</th><th>Itemcode</th><th>Description</th><th style="text-align:right">Qty</th><th>UOM</th>
						</thead>';
						$totalqty = 0;
						$total = 0;
						$totaltax = 0;
						$totaldisc = 0;
						$table .='<tbody>';

						foreach($row as $key=>$val){
							$showurl = URL."imstoredo/show/".$txnnum."/".$val['xrow'];
							$table .='<tr>';
							
							$table.='<td><a class="btn btn-info" id="btnshow" href="'.$showurl.'" role="button">Show</a></td>';
							if($delurl!="")
								$table.='<td><a id="delbtn" class="btn btn-danger" href="'.$delurl."/".$val['xrow'].'" role="button">Delete</a></td>';
							else
								$table.='<td></td>';

								$table .= "<td>".$val['xrow']."</td>";
								$table .= "<td>".$val['xitemcode']."</td>";
								$table .= "<td>".$val['xitemdesc']."</td>";		
								$table .='<td align="right">'.$val['xqty'].'</td>';
								$table .='<td>'.$val['xunit'].'</td>';
								$totalqty+=	$val['xqty'];
								
							$table .="</tr>";
						}
							$table .='<tr><td align="right" colspan="5"><strong>Total</strong></td>
							<td align="right"><strong>'.$totalqty.'</strong></td><td></td>
							</tr>';
							 	
					$table .="</tbody>";			
			$table .= "</table>";
			
			return $table;
		}	
		
		
		function reqlist($type){
			$rows = $this->model->getReqList($type);
			$cols = array("xdate-Date","ximreqnum-Requisition No","zemail-Created By","xdeliveryto- Delivery To");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "ximreqnum",URL."imstoredo/showentry/",URL."imstoredo/createdelivery/","Create DO All");
			$this->view->renderpage('imstoredo/list', false);
		}
		
		
		function dolist(){
			$rows = $this->model->getDeliveryList("Confirmed");
			$cols = array("xdate-Date","xreqdelnum-DO No","ximreqnum-Requisition No");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xreqdelnum",URL."imstoredo/showdoentry/");
			$this->view->renderpage('imstoredo/deliverylist', false);
		}
		function unconfirmedlist(){
			$rows = $this->model->getDeliveryList("Created");
			$cols = array("xdate-Date","xreqdelnum-DO No","ximreqnum-Requisition No");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xreqdelnum",URL."imstoredo/showdoentry/");
			$this->view->renderpage('imstoredo/deliverylist', false);
		}
		
		
		function doentry(){
				
		$btn = array(
			"Clear" => URL."imstoredo/doentry"
		);

		// form data
		$this->view->balance = "";
		
			$dynamicForm = new Dynamicform("Delivery From Requisition",$btn);		
			
			$this->view->dynform = $dynamicForm->createSingleLayForm($this->fields, URL."imstoredo/savedo", "Save",$this->values, URL."imstoredo/showpost");
			
			
			$this->view->table = $this->renderTable("");
			$this->view->potable = $this->renderDoTable("");
			$this->view->renderpage('imstoredo/doentry', false);
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
							<li>Delivery</li>							
						   </ul>';
			
			$this->view->dono=$dono;
			$totqty = 0;			
			$xdate="";
			$xadd="";
			$xmobile="";
			$grossdisc=0;
			
			$taxamt = 0;
			$discamt = 0;
			$total = 0;
			
			foreach($values as $key=>$val){
				$xdate=$val['xdate'];
				$xadd=$val['xadd'];
				$xmobile=$val['xmobile'];				
				$totqty+=$val['xqty'];
				$taxamt+=$val['xtaxamt'];
				$discamt+=$val['xdiscamt'];	
			}
			$this->view->xdate=$xdate;
			$this->view->xadd=$xadd;
			$this->view->xmobile=$xmobile;
			$this->view->grossdisc=$grossdisc;
			$this->view->taxamt=$taxamt;
			$this->view->discamt=$discamt;
			$this->view->total=$total;
					
			$this->view->totqty=$totqty;
			
			
			$cur = new Currency();
			
			$this->view->vrow = $values;
			
			$this->view->vrptname = "Delivery";
			$this->view->org=Session::get('sbizlong');
			$this->view->add=Session::get('sbizadd');
			
			$this->view->renderpage('imstoredo/printdo');		
		}

		function printchalan($dono=""){
			
			$values = $this->model->getvdodt($dono);
			//print_r($values);die;
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li>Delivery</li>							
						   </ul>';
			
			$this->view->dono=$dono;
			$totqty = 0;			
			$xdate="";
			
			
			foreach($values as $key=>$val){
				$xdate=$val['xdate'];				
				$totqty+=$val['xqty'];
				
			}
			$this->view->xdate=$xdate;
			
					
			$this->view->totqty=$totqty;
			
			
			$cur = new Currency();
			
			$this->view->vrow = $values;
			
			$this->view->vrptname = "Delivery";
			$this->view->org=Session::get('sbizlong');
			$this->view->add=Session::get('sbizadd');
			
			$this->view->renderpage('imstoredo/printchalan');		
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
				
			$keyfieldval = $this->model->getKeyValue("imstoredelmst","xreqdelnum","SQDO-","6");
			$tblvalues = $this->model->getRequisition($sonum);
			$detail = $this->model->getRequisitiondt($sonum);
			$data = array();
			$data['bizid']=Session::get('sbizid');
			$data['xreqdelnum']=$keyfieldval;
			$data['xbranch']=Session::get('sbranch');
			$data['xproj']=$tblvalues[0]['xproject'];
			$data['xstatus']="Created";
			$data['xdate']=$date;
			$data['zemail']=Session::get('suser');
			
			$data['ximreqnum']=$tblvalues[0]['ximreqnum'];
			$data['xfinyear']=$xyear;
			$data['xfinper']=$per;
			
			
			
			$cols = "`bizid`,`xreqdelnum`,`ximreqnum`,`xrow`,`xitemcode`,`xitembatch`,`xqty`,`xdate`,`xwh`,`xbranch`,`xproj`,`xunit`,`zemail`,`xrowtrn`,`xstdcost`,`xtypestk`";
			
			$vals =	"";
			$i=0; //print_r($detail); die;
			$stockerr = "Stock Not Available For ";
			foreach($detail as $key=>$value){
				$stock = $this->model->getItemStock($value['xitemcode'],$value['xwh']);

				if(!empty($stock)){
					if($stock[0]["xbalance"]<$value['xqty']){
						//throw new Exception("Not enough stock! Available stock is ".$stock[0]['xbalance']."<br/>");
						$stockerr .= $value['xitemcode'].",";
					}else{
						if($value['xqty']>0){	
							$itemcost = $this->model->getItemcost($value['xitemcode']);
							$cost = 0;
							if(!empty($itemcost)){
								$cost = $itemcost[0]['avgcost'];
							}	
							$i++;	
								
							$vals .= "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $value['ximreqnum'] ."',". $i .",'". $value['xitemcode'] ."','". $value['xitemcode'] ."','". $value['xqty'] ."','". $date ."','". $value['xwh'] ."','". Session::get('sbranch') ."','". $value['xproject'] ."','". $value['xunitstk'] ."','".$value['zemail']."','". $value['xrow'] ."',".$cost.",'". $value['xtypestk'] ."'),";
						}
					}
				}else{
					//throw new Exception("No stock detail found!");
					$stockerr .= $value['xitemcode'].",";
				}
			}
			
			$vals = rtrim($vals,",");
			
			$success = 0;
			
			$result = "";
			try{
				$success=$this->model->savedelivery($data,$cols,$vals);			
			}catch(Exception $e){
				$this->result = $e->getMessage();
			}//<a style="color:red" id="invnum" href="'.URL.'imstoredo/printdo/'.$keyfieldval.'">Print Store Delivery - '.$keyfieldval.'</a></br>
			if($success>0)
					$this->result = $stockerr.'<br>Delivery Created</br><a style="color:red" id="invnum" href="'.URL.'imstoredo/printchalan/'.$keyfieldval.'">Print Store Delivery - '.$keyfieldval.'</a>';
				
			if($success == 0 && empty($this->result))
				$this->result = "Failed to Create Sales Order! Reason: Could be Duplicate Account Code or system error!";
			
			$this->showdoentry($keyfieldval,$this->result);
			//header ('location: '.URL.'imstoredo/showdoentry/'.$keyfieldval.'/'.$this->result);
		}
		
}