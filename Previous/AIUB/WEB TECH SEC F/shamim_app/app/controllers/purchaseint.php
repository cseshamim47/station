<?php
class Purchaseint extends Controller{
	
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
				if($menus["xsubmenu"]=="International Purchase Order")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/items/js/getitemdt.js','views/suppliers/js/getsup.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"xlcdate"=>"",
			"xghodate"=>"",
			"xdeldate"=>"",
			"xetd"=>"",
			"xeta"=>"",
			"xpidate"=>"",
			"xpino"=>"",
			"xshipterm"=>"",
			"xshipvia"=>"",
			"xponum"=>"",
			"xlcno"=>"",
			"xsup"=>"",
			"xsupname"=>"",
			"xcorto"=>"",
			"xcoradd"=>"",
			"xcorphone"=>"",
			"xcoremail"=>"",
			"xwh"=>"",
			"xcur"=>"",
			"xsupdoc"=>"",
			"xitemcode"=>"",
			"xnote"=>"",
			"xdesc"=>"",
			"xqty"=>"0",
			"xrow"=>"0",
			"xratepur"=>"0.00",
			"xexch"=>"1.00",
			"xcorto"=>"",
			"xcoradd"=>"",
			"xcoremail"=>"",
			"xcorphone"=>"",
			);
			
			$this->fields = array(
						array(
							"Purchase Detail-div"=>'',

							),
						array(
							"xponum-text"=>'PO No_maxlength="20"',
							"xdate-datepicker" => 'Date_""',						
							),
						array(
							"xlcno-text"=>'LC No*~star_maxlength="50"',
							"xlcdate-datepicker" => 'LC Date_""'							
							),
						array(
							"xpino-text"=>'PI No*~star_maxlength="50"',
							"xpidate-datepicker" => 'PI Date_""',							
							),
						array(
							"xghodate-datepicker" => 'Goods HO Date_""',	
							"xdeldate-datepicker" => 'Delivery Date_""',							
							),
						array(
							"xetd-datepicker" => 'ETD_""',	
							"xeta-datepicker" => 'ETA_""',							
							),
						array(
							"xsup-group_".URL."suppliers/picklist"=>'Supplier_""',
							"xsupname-text"=>'Name_readonly'
							),
						array(
							"xshipterm-select_Shipping Term"=>'Ship Term_maxlength="50"',
							"xshipvia-select_Ship Via"=>'Ship Via_maxlength="50"',
							),
						array(
							"xcorto-text"=>'Correspondence To_maxlength="50"',
							"xcoradd-text"=>'Address_maxlength="100"'
							),
						array(
							"xcoremail-text"=>'C. Email_maxlength="100"',
							"xcorphone-text"=>'C. Phone_maxlength="20"'
							),
						array(
							"xwh-select_Warehouse"=>'Warehouse*~star_maxlength="50"',
							"xsupdoc-text"=>'Document No*~star_maxlength="50"'														
							),
						array(
							"xcur-select_Currency"=>'Currency*~star_maxlength="50"',
							"xexch-text"=>'Exchange Rate*~star_maxlength="50"'														
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
							"xratepur-text_number"=>'Rate*~star_number="true" minlength="1" maxlength="18" required',
							"xqty-text_digit"=>'Quantity*~star_number="true" minlength="1" maxlength="18" required',
							"xrow-hidden"=>''
							)
						);
						
								
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."purchaseint/purchaseentry",
		);	
		
					
			$this->view->rendermainmenu('purchaseint/index');
			
		}
		
		public function savepurchase(){
				if (empty($_POST['xitemcode']) || empty($_POST['xdesc']) || empty($_POST['xqty'])){
					header ('location: '.URL.'purchaseint/purchaseentry');
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

						->post('xpino')

						
						->post('xshipterm')

						->post('xshipvia')

						->post('xcur')

						->post('xexch')

						->post('xpidate')

						
						->post('xlcno')

						->post('xlcdate')

						->post('xghodate')

						->post('xdeldate')															

						->post('xetd')

						->post('xeta')	
						
						->post('xsup')
						->val('minlength', 1)
						->val('maxlength', 20)

						->post('xsupname')
						->val('minlength', 1)
						->val('maxlength', 100)

						->post('xcorto')
						
						->post('xcoradd')

						->post('xcoremail')

						->post('xcorphone')

						->post('xwh')
						->val('minlength', 1)
						->val('maxlength', 50)

						->post('xnote')
						->val('maxlength', 1000)
						
						->post('xsupdoc')						
						->val('maxlength', 50)
						
						->post('xqty')
						
						->post('xratepur');
						
				$form	->submit();
				
				
					
				
				$data = $form->fetch();
				
				
				$item = $this->model->getItem($data['xitemcode']);
				
				if($data['xponum'] == "")
					$keyfieldval = $this->model->getKeyValue("pomst","xponum","INPO","6");
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
				
				$cols = "`bizid`,`xponum`,`xrow`,`xitemcode`,`xitembatch`,`xqty`,`xdate`,`xratepur`,`xwh`,`xbranch`,`xproj`,`xtaxrate`,`xdisc`,`xexch`,`xcur`,`xtaxcode`,`xtaxscope`,`zemail`,`xunitpur`,`xconversion`,`xunitstk`,`xtypestk`";
				
				$vals = "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $rownum ."','". $data['xitemcode'] ."','". $data['xitemcode'] ."',
				'". $data['xqty'] ."','". $date ."','". $data['xratepur'] ."','". $data['xwh'] ."','". $data['xwh'] ."','". $data['xwh'] ."','0','0',".$data['xexch'].",'".$data['xcur']."','None','None','".$data['zemail']."','".$item[0]['xunitpur']."','".$item[0]['xconversion']."','".$item[0]['xunitstk']."','".$item[0]['xtypestk']."')";
				
					
				$success = $this->model->create($data, $cols, $vals);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					$this->result = 'Purchase Order Created</br><a style="color:red" id="invnum" href="'.URL.'purchaseint/printpo/'.$keyfieldval.'">Click To Print Purchase Order - '.$keyfieldval.'</a>';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Purchase Order! Reason: Could be Duplicate Trunsaction Code or system error!";
				
				 $this->showentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		public function editpurchase(){
			
			if (empty($_POST['xponum'])){
					header ('location: '.URL.'purchaseint/purchaseentry');
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

						->post('xpino')

						
						->post('xshipterm')

						->post('xshipvia')

						->post('xcur')

						->post('xexch')

						->post('xpidate')

						
						->post('xlcno')

						->post('xlcdate')

						->post('xghodate')

						->post('xdeldate')															

						->post('xetd')

						->post('xeta')	

						->post('xcorto')
						
						->post('xcoradd')

						->post('xcoremail')

						->post('xcorphone')
						
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
						
						->post('xsupdoc')						
						->val('maxlength', 50)
						
						->post('xqty')
						
						->post('xratepur');
						
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
					"xfinyear" => $xyear,
					"xfinper" => $xper,
					"xlcno" => $data['xlcno'],
					"xlcdate" => $data['xlcdate'],
					"xpino" => $data['xpino'],
					"xpidate" => $data['xpidate'],
					"xghodate" => $data['xghodate'],
					"xdeldate" => $data['xdeldate'],
					"xetd" => $data['xetd'],
					"xeta" => $data['xeta'],
					"xcur" => $data['xcur'],
					"xexch" => $data['xexch'],
					"xcorto" => $data['xcorto'],
					"xcoradd" => $data['xcoradd'],
					"xcoremail" => $data['xcoremail'],
					"xcorphone" => $data['xcorphone'],
					"xshipterm" => $data['xshipterm'],
					"xshipvia" => $data['xshipvia'],
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
					"xtypestk"=>$item[0]['xtypestk']
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
				
				 $this->showentry($ponum, $result.'<br /><a style="color:red" id="invnum" href="'.URL.'purchaseint/printpo/'.$ponum.'">Click To Print Voucher - '.$ponum.'</a>');
				
		
		}
		
		public function show($txnnum, $row, $result=""){
		if($txnnum=="" || $row==""){
			header ('location: '.URL.'purchaseint/purchaseentry');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."purchaseint/purchaseentry"
		);
		if($result=="")
			$result='<a style="color:red" id="invnum" href="'.URL.'purchaseint/printpo/'.$txnnum.'">Click To Print Voucher - '.$txnnum.'</a>';
		
		$tblvalues = $this->model->getPurchase($txnnum); 
		$tbldtvals = $this->model->getSinglePurchaseDt($txnnum, $row);
		$status="";
		if(!empty($tblvalues))
			$status = $tblvalues[0]['xstatus']; //echo $status; die;
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xponum"=>$tblvalues[0]['xponum'],
					"xsup"=>$tblvalues[0]['xsup'],
					"xsupname"=>$tblvalues[0]['xsupname'],
					"xsupdoc"=>$tblvalues[0]['xsupdoc'],
					"xwh"=>$tblvalues[0]['xwh'],
					"xnote"=>$tblvalues[0]['xnote'],
					"xpino"=>$tblvalues[0]['xpino'],
					"xpidate"=>$tblvalues[0]['xpidate'],
					"xlcno"=>$tblvalues[0]['xlcno'],
					"xlcdate"=>$tblvalues[0]['xlcdate'],
					"xghodate"=>$tblvalues[0]['xghodate'],
					"xdeldate"=>$tblvalues[0]['xdeldate'],
					"xetd"=>$tblvalues[0]['xetd'],
					"xeta"=>$tblvalues[0]['xeta'],
					"xshipterm"=>$tblvalues[0]['xshipterm'],
					"xshipvia"=>$tblvalues[0]['xshipvia'],
					"xcur"=>$tblvalues[0]['xcur'],
					"xexch"=>$tblvalues[0]['xexch'],
					"xcorto"=>$tblvalues[0]['xcorto'],
					"xcoremail"=>$tblvalues[0]['xcoremail'],
					"xcoradd"=>$tblvalues[0]['xcoradd'],
					"xcorphone"=>$tblvalues[0]['xcorphone'],
					"xitemcode"=>$tbldtvals[0]['xitemcode'],
					"xdesc"=>$tbldtvals[0]['xdesc'],
					"xqty"=>$tbldtvals[0]['xqty'],
					"xrow"=>$tbldtvals[0]['xrow'],
					"xratepur"=>$tbldtvals[0]['xratepur']
					);
			
		// form data
			$confurl = array();
			$saveurl = "";
			if($status=="Created"){
				$confurl = array(URL."purchaseint/confirmpur", "Confirm");
				$saveurl = URL."purchaseint/editpurchase/";
			}
			if($status=="Confirmed"){
				$confurl = array(URL."purchaseint/cancelpur", "Cancel");
				$saveurl="";
			}
		$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("International Purchase Order", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, "Update",$tblvalues, URL."purchaseint/showpost");
			
			$this->view->table = $this->renderTable($txnnum);
			
			$this->view->renderpage('purchaseint/purchaseentry');
		}
		
		
		
		public function showentry($txnnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."purchaseint/purchaseentry"
		);
		if($result=="")
			$result='<a style="color:red" id="invnum" href="'.URL.'purchaseint/printpo/'.$txnnum.'">Click To Print Voucher - '.$txnnum.'</a>';
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
					"xwh"=>$tblvalues[0]['xwh'],
					"xnote"=>$tblvalues[0]['xnote'],
					"xpino"=>$tblvalues[0]['xpino'],
					"xpidate"=>$tblvalues[0]['xpidate'],
					"xlcno"=>$tblvalues[0]['xlcno'],
					"xlcdate"=>$tblvalues[0]['xlcdate'],
					"xghodate"=>$tblvalues[0]['xghodate'],
					"xdeldate"=>$tblvalues[0]['xdeldate'],
					"xetd"=>$tblvalues[0]['xetd'],
					"xeta"=>$tblvalues[0]['xeta'],
					"xshipterm"=>$tblvalues[0]['xshipterm'],
					"xshipvia"=>$tblvalues[0]['xshipvia'],
					"xcur"=>$tblvalues[0]['xcur'],
					"xexch"=>$tblvalues[0]['xexch'],
					"xcorto"=>$tblvalues[0]['xcorto'],
					"xcoremail"=>$tblvalues[0]['xcoremail'],
					"xcoradd"=>$tblvalues[0]['xcoradd'],
					"xcorphone"=>$tblvalues[0]['xcorphone'],
					"xitemcode"=>"",
					"xdesc"=>"",
					"xqty"=>"0",
					"xrow"=>"0",
					"xratepur"=>"0"
					);
			$this->view->balance = "";
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("International Purchase Order", $btn, $result);		
			$confurl = array();
			$saveurl = "";
			if($status=="Created"){
				$confurl = array(URL."purchaseint/confirmpur", "Confirm");
				$saveurl = URL."purchaseint/savepurchase/";
			}
			if($status=="Confirmed"){
				$confurl = array(URL."purchaseint/cancelpur", "Cancel");
				$saveurl="";
			}
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, "Save",$tblvalues ,URL."purchaseint/showpost",$confurl);
			
			$this->view->table = $this->renderTable($txnnum);
			
			$this->view->renderpage('purchaseint/purchaseentry');
		}
		
		public function confirmpur(){
			
			$this->model->confirm(" bizid=".Session::get('sbizid')." and xponum='".$_POST['xponum']."' and xstatus='Created'");
			$this->showentry($_POST['xponum']);
		}

		public function cancelpur(){
			
			$this->model->cancel(" bizid=".Session::get('sbizid')." and xponum='".$_POST['xponum']."' and xstatus='Confirmed'");
			$this->showentry($_POST['xponum']);
		}
		
		function renderTable($txnnum){

			$pur = $this->model->getPurchase($txnnum);
			$status = "";
			if(!empty($pur))
				$status = $pur[0]["xstatus"];
			
			$delbtn = "";
			if(count($pur)>0){
			if($pur[0]["xstatus"]=="Created")
				$delbtn = URL."purchaseint/recdelete/".$txnnum."/";
				
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
							$showurl = URL."purchaseint/show/".$txnnum."/".$val['xrow'];
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
			$cols = array("xdate-Date","xponum-PO No","xsup-Supplier","xsupname-Name","xsupdoc-Suplier Doc");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xponum",URL."purchaseint/showentry/");
			$this->view->renderpage('purchaseint/purchaselist', false);
		}
		function unconfirmedlist(){
			$rows = $this->model->getPurchaseList("Created");
			$cols = array("xdate-Date","xponum-PO No","xsup-Supplier","xsupname-Name","xsupdoc-Suplier Doc");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xponum",URL."purchaseint/showentry/");
			$this->view->renderpage('purchaseint/purchaselist', false);
		}
		
		function purchaseentry(){
				
		$btn = array(
			"Clear" => URL."purchaseint/purchaseentry"
		);

		// form data
		$this->view->balance = "";
		
			$dynamicForm = new Dynamicform("International Purchase Order",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."purchaseint/savepurchase", "Save",$this->values, URL."purchaseint/showpost");
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('purchaseint/purchaseentry', false);
		}
		
		
		public function showpost(){
		//echo 123;die;
		$txnnum = $_POST['xponum'];
			
		$tblvalues=array();
		
		$btn = array(
			"New" => URL."purchaseint/purchaseentry"
		);
		
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
					"xwh"=>$tblvalues[0]['xwh'],
					"xnote"=>$tblvalues[0]['xnote'],
					"xpino"=>$tblvalues[0]['xpino'],
					"xpidate"=>$tblvalues[0]['xpidate'],
					"xlcno"=>$tblvalues[0]['xlcno'],
					"xlcdate"=>$tblvalues[0]['xlcdate'],
					"xghodate"=>$tblvalues[0]['xghodate'],
					"xdeldate"=>$tblvalues[0]['xdeldate'],
					"xetd"=>$tblvalues[0]['xetd'],
					"xeta"=>$tblvalues[0]['xeta'],
					"xshipterm"=>$tblvalues[0]['xshipterm'],
					"xshipvia"=>$tblvalues[0]['xshipvia'],
					"xcur"=>$tblvalues[0]['xcur'],
					"xexch"=>$tblvalues[0]['xexch'],
					"xcorto"=>$tblvalues[0]['xcorto'],
					"xcoremail"=>$tblvalues[0]['xcoremail'],
					"xcoradd"=>$tblvalues[0]['xcoradd'],
					"xcorphone"=>$tblvalues[0]['xcorphone'],
					"xitemcode"=>"",
					"xdesc"=>"",
					"xqty"=>"0",
					"xrow"=>"0",
					"xratepur"=>"0"
					);
			
		
			
		// form data
			$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("International Purchase Order", $btn,'<a style="color:red" id="invnum" href="'.URL.'purchaseint/printpo/'.$txnnum.'">Click To Print Voucher - '.$txnnum.'</a>');
			$confurl = array();
			$saveurl = "";
			if($status=="Created"){		
				$confurl = array(URL."purchaseint/confirmpur", "Confirm");
				$saveurl = URL."purchaseint/savepurchase/";
			}
			if($status=="Confirmed"){
				$confurl = array(URL."purchaseint/cancelpur", "Cancel");
				$saveurl="";
			}
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, "Save",$tblvalues ,URL."purchaseint/showpost",$confurl);
			
			$this->view->table = $this->renderTable($txnnum);
			
			$this->view->renderpage('purchaseint/purchaseentry');
		}
		function recdelete($ponum, $row){
			$grn = $this->model->getPurchase($ponum);
			$status = "";
			if(!empty($grn))
				$status = $grn[0]["xstatus"];
			if($status=="Created")
				$this->model->recdelete(" WHERE xponum='".$ponum."' and xrow=".$row);
			
			$this->showentry($ponum);
		}
		function printpo($pono=""){
			
			$values = $this->model->getvpodt($pono);
			//print_r($values);die;
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li>Purchase Order</li>							
						   </ul>';
			
			$this->view->pono=$pono;
			$totqty = 0;
			$total = 0;
			$xdate="";
			$supplier="";
			$supadd="";
			$supphone="";
			$supdoc="";
			$note = "";
			$lcno = "";
			$lcdate = "";
			$pino = "";
			$pidate = "";
			$ghodate = "";
			$deldate = "";
			$eta = "";
			$etd = "";
			$shipterm = "";
			$shipvia = "";
			$corto = "";
			$coradd = "";
			$coremail = "";
			$cormobile = "";
			$cur = "";
			
			foreach($values as $key=>$val){
				$xdate=$val['xdate'];
				$supplier=$val['xorg'];
				$supadd=$val['xsupadd'];
				$supphone=$val['xsupphone'];
				$supdoc=$val['xsupdoc'];
				$cur = $val['xcur'];
				$lcno = $val['xlcno'];
				$lcdate = $val['xlcdate'];
				$pino = $val['xpino'];
				$pidate = $val['xpidate'];
				$ghodate = $val['xghodate'];
				$deldate = $val['xdeldate'];
				$eta = $val['xeta'];
				$etd = $val['xetd'];
				$shipterm = $val['xshipterm'];
				$shipvia = $val['xshipvia'];
				$corto = $val['xcorto'];
				$coradd = $val['xcoradd'];
				$coremail = $val['xcoremail'];
				$corphone = $val['xcorphone'];
				$note=$val['xnote'];
				$totqty+=$val['xqty'];
				$total+=$val['xtotal'];
			}
			$this->view->xdate=$xdate;
			$this->view->supplier=$supplier;
			$this->view->supadd=$supadd;
			$this->view->supphone=$supphone;
			$this->view->supdoc=$supdoc;
			$this->view->cur=$cur;			
			$this->view->totqty=$totqty;
			$this->view->total=$total;
			$this->view->note=$note;
			$this->view->lcno=$lcno;
			$this->view->lcdate=$lcdate;
			$this->view->pino=$pino;
			$this->view->pidate=$pidate;
			$this->view->ghodate=$ghodate;
			$this->view->deldate=$deldate;
			$this->view->eta=$eta;
			$this->view->etd=$etd;
			$this->view->shipterm=$shipterm;
			$this->view->shipvia=$shipvia;
			$this->view->corto=$corto;
			$this->view->coradd=$coradd;
			$this->view->coremail=$coremail;
			$this->view->corphone=$corphone;
		
			$cur = new Currency();
			$this->view->inword="In Words: ". $cur->get_bd_amount_in_text($total);
			$this->view->vrow = $values;
			
			$this->view->vrptname = "Purchase Order";
			$this->view->org=Session::get('sbizlong');
			
			$this->view->renderpage('purchaseint/printpurchase');		
		}
}