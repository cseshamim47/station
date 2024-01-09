<?php
class Voucherapproval extends Controller{
	
	private $values = array();
	private $fields = array();
	private $valuesdt = array();
	private $fieldsdt = array();
	private $approvallist = array();
	
	
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
				if($menus["xsubmenu"]=="Voucher Approval")
					$iscode=1;							
		}

		if($iscode==0)
			header('location: '.URL.'mainmenu');
		
		$this->view->js = array('public/js/datatable.js');
	}
		
	public function index($flag=""){
		
		$this->view->flag=$flag;
		$this->approvallist = $this->model->getApprovalForUser("Voucher");
		//print_r($approvallist);die;
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$this->view->table = $this->renderTable();
		
		$this->view->rendermainmenu('voucherapproval/index');	
	}

	// function datewisepo(){
	// 	$dt = date("Y-m-d");
	// 	$xcat = "";
	// 	$fdate = $dt;
	// 	$tdate = $dt;
	// 	if(isset($_POST["xcat"]))
	// 		$xcat=$_POST["xcat"];

	// 	if(isset($_POST["xfdate"])){
	// 		$xfdate = $_POST['xfdate'];
	// 		$fdt = str_replace('/', '-', $xfdate);
	// 		$fdate = date('Y-m-d', strtotime($fdt));
	// 	}
	// 	if(isset($_POST["xtdate"])){
	// 		$xtdate = $_POST['xtdate'];
	// 		$tdt = str_replace('/', '-', $xtdate);
	// 		$tdate = date('Y-m-d', strtotime($tdt));
	// 	}
	// 	$this->view->breadcrumb = '';
	// 	$btn = array(
	// 		"Clear" => URL."allbill/datewisepo",
	// 	);	
		
	// 	$values = array(
	// 		"xfdate"=>$fdate,
	// 		"xtdate"=>$tdate,
	// 		"xcat"=>$xcat
	// 		);
			
	// 		$fields = array(
	// 				array(
	// 					"xfdate-datepicker" => 'From_""',
	// 					"xtdate-datepicker" => 'To_""',
	// 					"xcat-select_Approval Status"=>'Status_maxlength="50"'
	// 					)
	// 				);
		
	// 		$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
			
	// 		$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."voucherapproval/datewisepo", "Show",$values);
			
	// 		$this->view->table = $this->renderTable();//$fdate, $tdate, $xcat
			
	// 		$this->view->renderpage('voucherapproval/porptfilter', false);
	// }
	
	function approve($reqnum){
		$flag="Access Denied";
		$status = "Confirmed";
		$appstatus = "Confirmed";

		$this->approvallist = $this->model->getApprovalForUser("Voucher");
		//print_r($this->approvallist);die;
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$req = $this->model->getSingleReq($reqnum, $this->approvallist[0]['xstatus']);
		//print_r($req);
		if(!empty($req)){
			$approval = $this->model->getApproval("Voucher", $req[0]['xappstatus']);
			if(!empty($approval)){
				if($this->approvallist[0]['xstatus']=="Confirmed")
					$status = "Confirmed";
				else{
					$status = "Pending";

					$sendMails = $this->model->getMails("Voucher", $approval[0]['xstatus']);
					$mailer = new Mailer();
					$messagae = '<h4>Bill Number : '.$reqnum.'</h4></br><p>To Approve this bill <a href="'.URL.'voucherapproval/showreq/'.$reqnum.'">Click Here</a></p>';
					$emails = "";
					if(!empty($sendMails)){
						foreach($sendMails as $key=>$value){
							$emails .= $value['zaltemail'].",";	
						}
						$emails = rtrim($emails,",");
					}
					//$res = $mailer->sendbyemail($emails, "Vouchered by ".$req[0]['zemail'], $messagae, "");
				}
				$appstatus = $approval[0]['xstatus'];
			}
			$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '". $reqnum ."'";
			// $postdata=array(
			// 	"xstatus" => $status,
			// 	"xappstatus" => $appstatus,
			// 	"xemail" => "concat(xemail, '".$req[0]['xappstatus'].":".Session::get('suser')."')"
			// 	);	
			$updateCode = " xstatus='".$status."', xappstatus='".$appstatus."', xemail=concat(xemail, '".$req[0]['xappstatus'].":".Session::get('suser')."; ')";
			
			$this->model->confirmConcat($updateCode, $where);
			$flag="Bill No : ".$reqnum." - Approved Done";
		}
		$this->index($flag);
	}
	
	function cancel($reqnum){
		$flag="Access Denied";
		$this->approvallist = $this->model->getApprovalForUser("Voucher");
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$req = $this->model->getSingleReq($reqnum, $this->approvallist[0]['xstatus']);
		if(!empty($req)){
			$approval = $this->model->getApproval("Voucher", $req[0]['xappstatus']);
			$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '". $reqnum ."'";
			// $postdata=array(
			// 	"xstatus" => "Canceled",
			// 	"xappstatus" => "Canceled",
			// 	"xemail" => Session::get('suser')
			// );	
			$updateCode = " xstatus='Canceled', xappstatus='Canceled', xemail=concat(xemail, 'Cancel:".Session::get('suser')."; ')";			
			$this->model->confirmConcat($updateCode, $where);

			$flag="Bill No : ".$reqnum." - Canceled Done";
		}
		$this->index($flag);
	}		
		
	function renderTable($branch=""){
		$fields = array(
					"xdate-Date",
					"xvoucher-Voucher No",
					"zemail-Created By",
					"xnarration-Narration",
					"xsite-Project",
					"xemail-Previous Approvals"
					);
		$row = $this->model->getPur($this->approvallist[0]['xstatus']);
		//print_r($row); die;
		return $this->createTable($fields, $row, "xvoucher", URL."voucherapproval/showreq/", URL."voucherapproval/approve/", URL."voucherapproval/cancel/");
	}

	function showreq($reqnum){
		$flag="Access Denied";
		$this->approvallist = $this->model->getApprovalForUser("Voucher");
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$this->view->backUrl=URL."voucherapproval";
		$this->view->approveUrl=URL."voucherapproval/approve/".$reqnum;
		$this->view->cencelUrl=URL."voucherapproval/cancel/".$reqnum;

		$reqmst = $this->model->getSingleReq($reqnum, $this->approvallist[0]['xstatus']);
		if(!empty($reqmst)){
			$this->view->reqmst = $reqmst;

			$this->view->table=$this->renderTable2($reqnum);
			$this->view->rendermainmenu('voucherapproval/itemreceivelist');
		}else
			$this->index($flag);
	}

	function renderTable2($reqnum){
		$fields = array(
			"xrow-Sl",
			"xacc-Account",
			"xaccdesc-Account Description",
			"xaccsub-Sub Account",
			"xaccsubdesc-Sub Account Description",
			"xprimedr-Dr. Amount",
			"xprimecr-Cr. Amount"
			);
		$table = new Datatable();
		$row = $this->model->getvoucherdt($reqnum);
				
		//$billtotal = $this->model->billTotal($reqnum);
		//$this->approvallist = $this->model->getApprovalForUser("Voucher");
		//$row = $this->model->getRequisitionByNum($reqnum,$this->approvallist[0]['xstatus']);
		
		return $table->myTable($fields, $row, "xrow","","");
	}

		public function createTable($fields, $row, $keyval, $actionurledit="", $actionurldelete="",$actionurlbtn2="",$actionbtn="Approve",$actionbtn2="Cancel"){
		
				
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
			//if($actionurledit!="")
				$table.='<th></th>';
			//if($actionurldelete!="")
				$table.='<th></th>';
				$table.='<th></th>';
			$table.='</tr>';
			$table.='</thead>';
			$table.='<tbody>';
			
			foreach($row as $key=>$value){
				$table.='<tr>';
				foreach($value as $str){
					$keyofval =  array_search($str, $value); 
					$table.='<td>'.htmlentities($str).'</td>';
				}
				$t=time();
				//if($actionurledit!="")	
					$table.='<td><a class="btn btn-info" id="'.$value[$keyval].'"  href="'.$actionurledit.$value[$keyval].'/'.$t.'" role="button">Show</a></td>';
				//if($actionurldelete!="")
					$table.='<td><a id="appbtn" class="btn btn-success" href="'.$actionurldelete.$value[$keyval].'" role="button">'.$actionbtn.'</a></td>';
					$table.='<td><a id="canbtn" class="btn btn-danger" href="'.$actionurlbtn2.$value[$keyval].'" role="button">'.$actionbtn2.'</a></td>';
				$table.='</tr>';
			}
			$table.='</tbody>';
			$table.='</table></div>';
			
			return $table;	
		}
		
		
		function picklist(){
			$this->view->table = $this->imstockPickTable();
			
			$this->view->renderpage('voucherapproval/picklist', false);
		}
		
		function imstockPickTable(){
			
			$fields = array(
						"xwh-Warehouse",
						"xitemcode-Item Code",
						"xdesc-Item Name",
						"xqty-Stock",
						);
			$table = new Datatable();
			$row = $this->model->getItemList(" and xbranch = '". Session::get('sbranch') ."'");
			
			return $table->picklistTable($fields, $row, "xitemcode");
		}


		
				
}