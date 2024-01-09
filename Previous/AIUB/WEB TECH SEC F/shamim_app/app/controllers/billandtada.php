<?php
class Billandtada extends Controller{
	
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
				if($menus["xsubmenu"]=="Approved Bill & TA/DA List")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
		
		
			
		$this->view->js = array('public/js/datatable.js','views/glrpt/js/getaccdt.js','views/distreg/js/codevalidator.js');
		}
		
		public function index(){
			
			//$this->view->table = $this->renderTable();
			
			$this->view->rendermainmenu('billandtada/index');	
		}

		
		function datewisepo(){
			$doctype = "";
			if(isset($_POST["xdoctype"]))
				$doctype=$_POST["xdoctype"];

			$this->view->breadcrumb = '';
			$btn = array(
				"Clear" => URL."billandtada/datewisepo",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xdoctype"=>$doctype
				);
				
				$fields = array(array(
								"xdoctype-select_Bill or TADA"=>'Type_maxlength="50"'
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."billandtada/datewisepo", "Show",$values);
				
				$this->view->table = $this->renderTable("", $doctype);
				
				$this->view->renderpage('billandtada/porptfilter', false);
		
		}
		function renderTable($branch="", $doctype){
			$fields = array(
						"xdoctype-Type",
						"xdate-Date",
						"xtxnnum-Txn Num",
						"xproject-Project",
						"zemail-Creted By",
						"total-Total Amount"
						);
			//$table = new Datatable();
			$row = $this->model->getBillTada($branch, $doctype);
			//print_r($row); die;
			return $this->createTable($fields, $row, "xtxnnum", "txnpaid/");
		}

		function datewisepaid(){
			$doctype = "";
			if(isset($_POST["xdoctype"]))
				$doctype=$_POST["xdoctype"];

			$this->view->breadcrumb = '';
			$btn = array(
				"Clear" => URL."billandtada/datewisepaid",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xdoctype"=>$doctype
				);
				
				$fields = array(array(
								"xdoctype-select_Bill or TADA"=>'Type_maxlength="50"'
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."billandtada/datewisepaid", "Show",$values);
				
				$this->view->table = $this->renderTablePaid("", $doctype);
				
				$this->view->renderpage('billandtada/porptfilter', false);
		
		}
		function renderTablePaid($branch="", $doctype){
			$fields = array(
						"xdoctype-Type",
						"xdate-Date",
						"xtxnnum-Txn Num",
						"xproject-Project",
						"zemail-Creted By",
						"total-Total Amount",
						"xvoucher-Voucher"
						);
			//$table = new Datatable();
			$row = $this->model->getBillTadaPaid($branch, $doctype);
			//print_r($row); die;
			return $this->createTablePaid($fields, $row, "xtxnnum", "txnpaid/");
		}

		public function txnpaid($txn, $doctype){
			$tableName = "";
			if($doctype == "Bill")
				$tableName = "billmst";
			else if($doctype == "TADA")
				$tableName = "tadamst";

			// $mailer = new Mailer();
			// $res = $mailer->sendbyemail("sujondbs@gmail.com", "Test Email", "For Confirm bill click", "");
			// print_r($res);die;
			
			$this->model->UpdateBillOrTada($txn, $tableName);
			
			$this->datewisepo();
		}

		public function paid(){
			 //echo $_POST['xacccr'];die;
			// $this->datewisepo();
			//echo $_POST['type'];die;
			if($_POST['xacccr']!=""){

				$xdate = date("Y/m/d");
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 

				$prefix = "PAY-".Session::get('suserrow');
				$keyfieldval = $this->model->getKeyValue("glheader","xvoucher",$prefix,"6");

				$accdetail = $this->model->getAccDetail($_POST['xacccr']);
				//print_r($accdetail);die;
				if(!empty($accdetail))
					if($_POST['type']=="Bill"){
						$billmst = $this->model->getBillMst($_POST['xtxnnum']); 
						//print_r($billmst);die;

						if(!empty($billmst)){
							$alldt ="";
							$billdt = $this->model->getBillDt($_POST['xtxnnum']);
							//print_r($billdt);die;
							foreach($billdt as $k=>$v){
								$dt = $v['xdesc'];
								$alldt .= $dt.", ";
							}
							$alldt = substr($alldt, 0, -2);

							$data = array();
							$data['bizid'] = Session::get('sbizid');
							$data['xvoucher'] = $keyfieldval;
							$data['xnarration'] = $billmst[0]['xtxnnum'].", Paid to-".$billmst[0]['xsup'].", Project-".$billmst[0]['xproject'];
							$data['xlong'] = $alldt;
							$data['xyear'] = $year;
							$data['xper'] = $month;
							$data['xbranch'] = Session::get('sbranch');
							$data['xdoctype'] = "Payment Voucher";
							$data['xdocnum'] = $billmst[0]['xtxnnum'];
							$data['xsite'] = $billmst[0]['xproject'];
							$data['xdate'] = $date;
							$data['zemail'] = Session::get('suser');
							$data['xstatusjv'] = 'Confirmed';
							$data['xemail'] = $billmst[0]['xemail'];
							$data['xmanager'] = $billmst[0]['zemail'];

							$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,`xexch`,`xprime`,xflag";
							
							$row = 1;
							$total = 0;
							$vals = "";
							foreach($billdt as $key=>$val){
								$acccode = explode("~", $val['xcat'])[1];
								$acc = $this->model->getAccDetail($acccode);
								//echo $acccode;
								$vals .= "(" . Session::get('sbizid') . ",'". $keyfieldval ."','".$row."','". $acccode ."','". $acc[0]['xacctype'] ."','". $acc[0]['xaccusage'] ."','". $acc[0]['xaccsource'] ."','','BDT','". ($val['xprice']*$val['xqty']) ."','1','". ($val['xprice']*$val['xqty']) ."','Debit'),";
								$row++;
								$total+=($val['xprice']*$val['xqty']);
							}
							$vals .= "(" . Session::get('sbizid') . ",'". $keyfieldval ."','".$row."','". $accdetail[0]['xacc'] ."','".$accdetail[0]['xacctype'] ."','". $accdetail[0]['xaccusage'] ."','". $accdetail[0]['xaccsource'] ."','','BDT','-". $total ."','1','-". $total ."','Credit')";

							$success = $this->model->create($data, $cols, $vals);
							if(empty($success))
								$success=0;
							if($success>0)
								$this->model->UpdateBillOrTada($billmst[0]['xtxnnum'], "billmst");
						}

					}else if($_POST['type']=="TADA"){
						$tadamst = $this->model->getTadaMst($_POST['xtxnnum']); 
						//print_r($tadamst);
						if(!empty($tadamst)){
						    $alldt ="";
							$tadadt = $this->model->getTadaDt($_POST['xtxnnum']);
							foreach($tadadt as $k=>$v){
								$dt = $v['xdesc'];
								$alldt .= $dt.", ";
							}
							$alldt = substr($alldt, 0, -2);

							$data = array();
							$data['bizid'] = Session::get('sbizid');
							$data['xvoucher'] = $keyfieldval;
							$data['xnarration'] = $tadamst[0]['xtxnnum'].", Paid to-".$tadamst[0]['xsup'].", Project-".$tadamst[0]['xproject'];
							$data['xlong'] = $alldt;
							$data['xyear'] = $year;
							$data['xper'] = $month;
							$data['xbranch'] = Session::get('sbranch');
							$data['xdoctype'] = "Payment Voucher";
							$data['xdocnum'] = $tadamst[0]['xtxnnum'];
							$data['xsite'] = $tadamst[0]['xproject'];
							$data['xdate'] = $date;
							$data['zemail'] = Session::get('suser');
							$data['xstatusjv'] = 'Confirmed';
							$data['xemail'] = $tadamst[0]['xemail'];
							$data['xmanager'] = $tadamst[0]['zemail'];

							$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,
							`xexch`,`xprime`,xflag";
							
							$row = 1;
							$total = 0;
							$vals = "";

							$vals .= "(" . Session::get('sbizid') . ",'". $keyfieldval ."','1','6007','Expenditure','Ledger','None','','BDT','".$tadamst[0]['total']."','1','".$tadamst[0]['total']."','Debit'),";
							$vals .= "(" . Session::get('sbizid') . ",'". $keyfieldval ."','2','". $accdetail[0]['xacc'] ."','".$accdetail[0]['xacctype'] ."','". $accdetail[0]['xaccusage'] ."','". $accdetail[0]['xaccsource'] ."','','BDT','-". $tadamst[0]['total'] ."','1','-". $tadamst[0]['total'] ."','Credit')";

							$success = $this->model->create($data, $cols, $vals);
							if(empty($success))
								$success=0;
							if($success>0)
								$this->model->UpdateBillOrTada($tadamst[0]['xtxnnum'], "tadamst");
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
			$table.='<form method="post" action='.URL.'billandtada/paid>';
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
			$table.='<td><a class="btn btn-primary" href="'.URL.'billandtada/show/'.$type.'/'.$value[$keyval].'" role="button">Show</a></td>';
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
			$table.='<td><a class="btn btn-primary" href="'.URL.'billandtada/show/'.$type.'/'.$value[$keyval].'" role="button">Show</a></td>';
			$table.='<td><a class="btn btn-primary" href="'.URL.'glrpt/isovoucher/Payment/'.$value['xvoucher'].'" role="button">Show Voucher</a></td>';
			$table.='</tr>';
			$incre++;
		}
		$table.='</tbody>';
		$table.='</table></div>';
		
		return $table;	
	}

		function show($type, $reqnum){
			$backUrl=URL."billandtada/datewisepo";
			$popupUrl = URL."jsondata/glchartpicklistcr";

			$formHtml = '<div class="col-md-2"><a class="btn btn-info" href="'.$backUrl.'" role="button">Back</a></div>';
			$formHtml .= '<form method="post" action='.URL.'billandtada/paid><input type="hidden" name="xtxnnum" value="'.$reqnum.'">';
			$formHtml .= '<input type="hidden" name="type" value="'.$type.'">';
			$formHtml .= '<div class="col-md-2"><label>Paid By</label></div><div class="col-md-6"><div class="input-group">'.
					'<input type="text" class="form-control input-sm" id="xacccr" name="xacccr" value="" maxlength="20"><span class="input-group-btn">'.
					'<button class="btn btn-default input-sm" type="button" title="Pick list for School Code*" onclick="popupCenter(\''.$popupUrl.'\', \'Item List\', 750, 450);"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></button>'.
				'</span>'.
			'</div></div>';
			$formHtml .= '<div class="col-md-2"><button type="submit" class="btn btn-danger" id="delbtn">Paid</button></div></form>';

			
	
			if($type == "Bill"){
				$billmst = $this->model->getSingleBill($reqnum);
				if($billmst[0]['xpaystatus']=="Pending")
					$this->view->formHtml = $formHtml;
				else
					$this->view->formHtml = "";
				$this->view->level = $this->model->getApprovalLevel($billmst[0]['xdept'])[0]['xlevel'];
				$this->view->billmst = $billmst;
				$this->view->table=$this->renderTableBill($reqnum);
				$this->view->renderpage('billandtada/billshow', false);
			}else if($type == "TADA"){
				$tadamst = $this->model->getSingleTADA($reqnum);
				if($tadamst[0]['xpaystatus']=="Pending")
					$this->view->formHtml = $formHtml;
				else
					$this->view->formHtml = "";
				$this->view->level = $this->model->getApprovalLevel($tadamst[0]['xdept'])[0]['xlevel'];
				$this->view->tadamst = $tadamst;
				$this->view->table=$this->renderTableTADA($reqnum);
				$this->view->renderpage('billandtada/tadashow', false);
			}
		}
		function renderTableBill($reqnum){
			$fields = array(
						"xrow-SL.NO",
						"xdate-DATE",
						"xcat-CATEGORY",
						"xdesc-DESCRIPTION",
						"xquality-QUALITY",
						"xprice-UNIT PRICE IN TAKA",
						"xqty-QUANTITY",
						"xtotal-AMOUNT	",
						"xremarks-REMARKS"
						);
			$table = new Datatable();
			$billtotal = $this->model->billTotal($reqnum);
					
			$row = $this->model->getBillByNum($reqnum);
			
			return $table->myTable2("",$fields, $row, "xitemcode","","",$billtotal[0]['xtotal']);
		}
		function renderTableTADA($reqnum){
			$fields = array(
						"xrow-SL.NO",
						"xdate-DATE",
						"xdesc-DESCRIPTION",
						"xby-BY",
						"xday-DAY",
						"xperson-PERSON",
						"xamount-AMOUNT"
						);
			$table = new Datatable();
			
			//$this->approvallist = $this->model->getApprovalForUser("TA/DA Submit");
			$row = $this->model->getTADAByNum($reqnum);
			$billtotal = $this->model->TADATotal($reqnum);
			
			return $table->myTable2("tada",$fields, $row, "xitemcode","","",$billtotal[0]['xtotal']);
		}
				
}
