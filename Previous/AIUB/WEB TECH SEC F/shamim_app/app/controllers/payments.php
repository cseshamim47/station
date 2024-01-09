<?php
class Payments extends Controller{
	
	private $values = array();
	private $fields = array();
	private $valuesdt = array();
	private $fieldsdt = array();
	
	
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
				if($menus["xsubmenu"]=="Approved Payments")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
		
		
			
		$this->view->js = array('public/js/datatable.js','views/glrpt/js/getaccdt.js','views/distreg/js/codevalidator.js');
		}
		
		public function index(){
			
			//$this->view->table = $this->renderTable();
			
			$this->view->rendermainmenu('payments/index');	
		}

		
		function datewisepo(){
			$doctype = "";
			if(isset($_POST["xdoctype"]))
				$doctype=$_POST["xdoctype"];

			$this->view->breadcrumb = '';
			$btn = array(
				"Clear" => URL."payments/datewisepo",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xdoctype"=>$doctype
				);
				
				$fields = array(array(
								"xdoctype-select_Payment Type"=>'Type_maxlength="50"'
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."payments/datewisepo", "Show",$values);
				
				$this->view->table = $this->renderTable("", $doctype);
				
				$this->view->renderpage('payments/porptfilter', false);
		
		}
		
		
		function renderTable($branch="", $doctype){
			$fields = array(
						"xdoctype-Type",
						"xdate-Date",
						"xtxnnum-Txn Num",
						"zemail-Creted By",
						"paidto-Name / Sup ID",
						"xorg-Org",
						"xamount-Total Amount"
						);
			//$table = new Datatable();
			$row = $this->model->getPayments($branch, $doctype);
			//print_r($row); die;
			return $this->createTable($fields, $row, "xtxnnum", "txnpaid/");
		}

		function datewisepaid(){
			$doctype = "";
			if(isset($_POST["xdoctype"]))
				$doctype=$_POST["xdoctype"];

			$this->view->breadcrumb = '';
			$btn = array(
				"Clear" => URL."payments/datewisepaid",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xdoctype"=>$doctype
				);
				
				$fields = array(array(
								"xdoctype-select_Payment Type"=>'Type_maxlength="50"'
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."payments/datewisepaid", "Show",$values);
				
				$this->view->table = $this->renderTablePaid("", $doctype);
				
				$this->view->renderpage('payments/porptfilter', false);
		
		}
		
		
		function renderTablePaid($branch="", $doctype){
			$fields = array(
						"xdoctype-Type",
						"xdate-Date",
						"xtxnnum-Txn Num",
						"zemail-Creted By",
						"paidto-Name / Sup ID",
						"xorg-Org",
						"xamount-Total Amount",
						"xvoucher-Voucher"
						);
			//$table = new Datatable();
			$row = $this->model->getPaymentsPaid($branch, $doctype);
			//print_r($row); die;
			return $this->createTablePaid($fields, $row, "xtxnnum", "txnpaid/");
		}
		// public function txnpaid($txn, $doctype){
		// 	$tableName = "";
		// 	if($doctype == "Bill")
		// 		$tableName = "billmst";
		// 	else if($doctype == "TADA")
		// 		$tableName = "tadamst";

		// 	// $mailer = new Mailer();
		// 	// $res = $mailer->sendbyemail("sujondbs@gmail.com", "Test Email", "For Confirm bill click", "");
		// 	// print_r($res);die;
			
		// 	$this->model->updatePayment($txn, $tableName);
			
		// 	$this->datewisepo();
		// }

		public function paid(){
			if($_POST['xacccr']!=""){

				$xdate = date("Y/m/d");
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 

				$prefix = "PAY-".Session::get('suserrow');
				$keyfieldval = $this->model->getKeyValue("glheader","xvoucher",$prefix,"6");

				$accdetail = $this->model->getAccDetail($_POST['xacccr']);
				if(!empty($accdetail))
					if($_POST['type']=="Supplier Payment"){
						$supayment = $this->model->getSupayment($_POST['xtxnnum']); 
						//print_r($grn[0]['xproj']);die;
						if(!empty($supayment)){
							$grn = $this->model->getgrn($supayment[0]['xgrnnum']);

							$data = array();
							$data['bizid'] = Session::get('sbizid');
							$data['xvoucher'] = $keyfieldval;
							$data['xnarration'] = "Payment for : ".$supayment[0]['xgrnnum']."-".$grn[0]['xorg'];
							$data['xyear'] = $year;
							$data['xper'] = $month;
							$data['xbranch'] = Session::get('sbranch');
							$data['xdoctype'] = "Payment Voucher";
							$data['xdocnum'] = $supayment[0]['xtxnnum'];
							$data['xsite'] = $grn[0]['xproj'];
							$data['xdate'] = $date;
							$data['zemail'] = Session::get('suser');
							$data['xstatusjv'] = 'Confirmed';
							$data['xemail'] = $supayment[0]['xemail'];
							$data['xmanager'] = $supayment[0]['zemail'];

							$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,`xexch`,`xprime`,xflag";
							
							$row = 1;
							$total = 0;
							$vals = "";

							$vals .= "(" . Session::get('sbizid') . ",'". $keyfieldval ."','1','2001','Liability','AP','Supplier','".$grn[0]['xsup']."','BDT','".$supayment[0]['xamount']."','1','".$supayment[0]['xamount']."','Debit'),";

							$vals .= "(" . Session::get('sbizid') . ",'". $keyfieldval ."','2','". $accdetail[0]['xacc'] ."','".$accdetail[0]['xacctype'] ."','". $accdetail[0]['xaccusage'] ."','". $accdetail[0]['xaccsource'] ."','','BDT','-". $supayment[0]['xamount'] ."','1','-". $supayment[0]['xamount'] ."','Credit')";

							$success = $this->model->create($data, $cols, $vals);
							if(empty($success))
								$success=0;
							if($success>0)
								$this->model->updatePayment($supayment[0]['xtxnnum'], "supplierpay");
						}

					}else if($_POST['type']=="Work Order Payment"){
						$wopayment = $this->model->getWoPayment($_POST['xtxnnum']); 

						if(!empty($wopayment)){
							$wo = $this->model->getwo($wopayment[0]['wonum']);
							//print_r($wo[0]['xproject']);die;
							$data = array();
							$data['bizid'] = Session::get('sbizid');
							$data['xvoucher'] = $keyfieldval;
							$data['xnarration'] = "Payment for : ".$wopayment[0]['wonum']."-".$wo[0]['toorg'].", WOE-".$wo[0]['xamount'];
							$data['xyear'] = $year;
							$data['xper'] = $month;
							$data['xbranch'] = Session::get('sbranch');
							$data['xdoctype'] = "Payment Voucher";
							$data['xdocnum'] = $wopayment[0]['xtxnnum'];
							$data['xsite'] = $wo[0]['xproject'];
							$data['xdate'] = $date;
							$data['zemail'] = Session::get('suser');
							$data['xstatusjv'] = 'Confirmed';
							$data['xemail'] = $wopayment[0]['xemail'];
							$data['xmanager'] = $wopayment[0]['zemail'];

							$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,`xexch`,`xprime`,xflag";
							
							$row = 1;
							$total = 0;
							$vals = "";

							$vals .= "(" . Session::get('sbizid') . ",'". $keyfieldval ."','1','9000','Expenditure','Ledger','Sub Account','".$wo[0]['wonum']."','BDT','".$wopayment[0]['xamount']."','1','".$wopayment[0]['xamount']."','Debit'),";

							$vals .= "(" . Session::get('sbizid') . ",'". $keyfieldval ."','2','". $accdetail[0]['xacc'] ."','".$accdetail[0]['xacctype'] ."','". $accdetail[0]['xaccusage'] ."','". $accdetail[0]['xaccsource'] ."','','BDT','-". $wopayment[0]['xamount'] ."','1','-". $wopayment[0]['xamount'] ."','Credit')";

							$success = $this->model->create($data, $cols, $vals);
							if(empty($success))
								$success=0;
							if($success>0)
								$this->model->updatePayment($wopayment[0]['xtxnnum'], "wopay");
						}
				}
			header('location: '.URL.'glrpt/isovoucher/Payment/'.$keyfieldval);
		}
		$this->datewisepo();
	}

	public function createTable($fields, $row, $keyval, $actionurledit="", $actionurldelete="",$actionbtn="Delete"){
	
			
		$head = array();
		foreach($fields as $str){
			$st=explode('-',$str);
			
			$head[] = $st[1];
		}
		$table = '<div class="table-responsive"><table id="dtbl" class="table table-striped table-bordered" cellspacing="0" width="100%">';
		$table.='<thead>';
		$table.='<tr>';
		foreach($head as $hd){
			$table.='<th>'.$hd.'</th>';
		}
		if($actionurledit!="")
			$table.='<th>Paid by</th>';
		if($actionurldelete!="")
			$table.='<th></th>';
		$table.='<th></th><th></th>';
		$table.='</tr>';
		$table.='</thead>';
		$table.='<tbody>';
		$incre=1;
		foreach($row as $key=>$value){
			$type = '';
			$table.='<tr>';
			$table.='<form method="post" action='.URL.'payments/paid>';
			foreach($value as $str){
				$strhidden = '';
				$keyofval =  array_search($str, $value); 
					switch ($keyofval){
						case "xtxnnum":
							$strhidden = '<input type="hidden" name="xtxnnum" value="'.$str.'">';
							break;
						case "xdoctype":
							$strhidden = '<input type="hidden" name="type" value="'.$str.'">';
							$type = $str;
							break;
						// case "paidto":
						// 	$strhidden = '<input type="hidden" name="paidto" value="'.$str.'">';
						// 	break;
						case "xqty":
							$str = number_format(floatval($str), 0, '.', '');
							break;
						case "xbal":
							$str = number_format(floatval($str), 0, '.', '');
							break;
						case "xtotcost":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;		
						case "xstdcost":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xstdprice":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xvatpct":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xvatamt":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xdisc":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;		
						default:
							$str = $str;
				}
				$table.='<td>'.$strhidden.htmlentities($str).'</td>';
			}
				$table.='<td><div class="input-group">'.
				'<input type="text" class="form-control input-sm" id="xacccr'.$incre.'" name="xacccr" value="" maxlength="20"><span class="input-group-btn">'.
					'<button class="btn btn-default input-sm" type="button" title="Pick list for School Code*" id="pupupdp" onclick="dod(\'xacccr'.$incre.'\');"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></button>'.
				'</span></div></td>';
			$t=time();
			if($actionurledit!="")	
				$table.='<td><button type="submit" class="btn btn-danger"  id="delbtn">Paid</button></td>';
			if($actionurldelete!="")
				$table.='<td><a id="delbtn" class="btn btn-danger" href="'.$actionurldelete.$value[$keyval].'" role="button">'.$actionbtn.'</a></td>';
			$table.='</form>';
			$table.='<td><a class="btn btn-primary" href="'.URL.'payments/show/'.$type.'/'.$value[$keyval].'" role="button">Show</a></td>';
			$table.='</tr>';
			$incre++;
		}
		$table.='</tbody>';
		$table.='</table></div>';
		
		return $table;	
	}
	public function createTablePaid($fields, $row, $keyval, $actionurledit="", $actionurldelete="",$actionbtn="Delete"){
	
			
		$head = array();
		foreach($fields as $str){
			$st=explode('-',$str);
			
			$head[] = $st[1];
		}
		$table = '<div class="table-responsive"><table id="dtbl" class="table table-striped table-bordered" cellspacing="0" width="100%">';
		$table.='<thead>';
		$table.='<tr>';
		foreach($head as $hd){
			$table.='<th>'.$hd.'</th>';
		}
		// if($actionurledit!="")
		// 	$table.='<th>Paid by</th>';
		// if($actionurldelete!="")
		// 	$table.='<th></th>';
		$table.='<th></th><th></th>';
		$table.='</tr>';
		$table.='</thead>';
		$table.='<tbody>';
		$incre=1;
		foreach($row as $key=>$value){
			$type = '';
			$table.='<tr>';
			//$table.='<form method="post" action='.URL.'payments/paid>';
			foreach($value as $str){
				$strhidden = '';
				$keyofval =  array_search($str, $value); 
					switch ($keyofval){
						case "xtxnnum":
							$strhidden = '<input type="hidden" name="xtxnnum" value="'.$str.'">';
							break;
						case "xdoctype":
							$strhidden = '<input type="hidden" name="type" value="'.$str.'">';
							$type = $str;
							break;
						// case "paidto":
						// 	$strhidden = '<input type="hidden" name="paidto" value="'.$str.'">';
						// 	break;
						case "xqty":
							$str = number_format(floatval($str), 0, '.', '');
							break;
						case "xbal":
							$str = number_format(floatval($str), 0, '.', '');
							break;
						case "xtotcost":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;		
						case "xstdcost":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xstdprice":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xvatpct":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xvatamt":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;
						case "xdisc":
							$str = number_format(floatval($str), $this->decimals, '.', '');
							break;		
						default:
							$str = $str;
				}
				$table.='<td>'.htmlentities($str).'</td>';
			}
				// $table.='<td><div class="input-group">'.
				// '<input type="text" class="form-control input-sm" id="xacccr'.$incre.'" name="xacccr" value="" maxlength="20"><span class="input-group-btn">'.
				// 	'<button class="btn btn-default input-sm" type="button" title="Pick list for School Code*" id="pupupdp" onclick="dod(\'xacccr'.$incre.'\');"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></button>'.
				// '</span></div></td>';
			$t=time();
			// if($actionurledit!="")	
			// 	$table.='<td><button type="submit" class="btn btn-danger"  id="delbtn">Paid</button></td>';
			// if($actionurldelete!="")
			// 	$table.='<td><a id="delbtn" class="btn btn-danger" href="'.$actionurldelete.$value[$keyval].'" role="button">'.$actionbtn.'</a></td>';
			// $table.='</form>';
			$table.='<td><a class="btn btn-primary" href="'.URL.'payments/show/'.$type.'/'.$value[$keyval].'" role="button">Show</a></td>';
			$table.='<td><a class="btn btn-primary" href="'.URL.'glrpt/isovoucher/Payment/'.$value['xvoucher'].'" role="button">Show Voucher</a></td>';
			$table.='</tr>';
			$incre++;
		}
		$table.='</tbody>';
		$table.='</table></div>';
		
		return $table;	
	}

		function show($type, $reqnum){
			$backUrl=URL."payments/datewisepo";
			$popupUrl = URL."jsondata/glchartpicklistcr";

			$formHtml = '<div class="col-md-2"><a class="btn btn-info" href="'.$backUrl.'" role="button">Back</a></div>';
			$formHtml .= '<form method="post" action='.URL.'payments/paid><input type="hidden" name="xtxnnum" value="'.$reqnum.'">';
			$formHtml .= '<input type="hidden" name="type" value="'.$type.'">';
			$formHtml .= '<div class="col-md-2"><label>Paid By</label></div><div class="col-md-6"><div class="input-group">'.
					'<input type="text" class="form-control input-sm" id="xacccr" name="xacccr" value="" maxlength="20"><span class="input-group-btn">'.
					'<button class="btn btn-default input-sm" type="button" title="Pick list for School Code*" onclick="popupCenter(\''.$popupUrl.'\', \'Item List\', 750, 450);"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></button>'.
				'</span>'.
			'</div></div>';
			$formHtml .= '<div class="col-md-2"><button type="submit" class="btn btn-danger" id="delbtn">Paid</button></div></form>';
	
			if($type == "Work Order Payment"){
				$billmst = $this->model->getWorkOrder($reqnum);
				if($billmst[0]['xpaystatus']=="Pending")
					$this->view->formHtml = $formHtml;
				else
					$this->view->formHtml = "";
				$this->view->billmst = $billmst;
				$this->view->table=$this->renderTableBill($reqnum);
				$this->view->renderpage('payments/billshow', false);
			}else if($type == "Supplier Payment"){
				$tadamst = $this->model->getSupplier($reqnum);
				if($tadamst[0]['xpaystatus']=="Pending")
					$this->view->formHtml = $formHtml;
				else
					$this->view->formHtml = "";
				$this->view->tadamst = $tadamst;
				$this->view->table=$this->renderTableTADA($reqnum);
				$this->view->renderpage('payments/tadashow', false);
			}
		}
		function renderTableBill($reqnum){
			$fields = array(
						"xdate-DATE",
						"wonum-WO. NO",
						"xnote-NOTE",
						"xamount-AMOUNT"
						);
			$table = new Datatable();
			$billtotal = $this->model->billTotal($reqnum);
					
			$row = $this->model->getWoDetails($reqnum);
			
			return $table->myTable2("wopay",$fields, $row, "xitemcode","","",$row[0]['xamount']);
		}
		function renderTableTADA($reqnum){
			$fields = array(
						"xdate-DATE",
						"xgrnnum-GRN NO",
						"xnote-NOTE",
						"xamount-AMOUNT"
						);
			$table = new Datatable();
			
			//$this->approvallist = $this->model->getApprovalForUser("TA/DA Submit");
			$row = $this->model->getSupPayment($reqnum);
			$billtotal = $this->model->TADATotal($reqnum);
			
			return $table->myTable2("wopay",$fields, $row, "xitemcode","","",$row[0]['xamount']);
		}
				
}

