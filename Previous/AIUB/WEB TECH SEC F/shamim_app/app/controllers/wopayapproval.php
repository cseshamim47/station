<?php
class Wopayapproval extends Controller{
	
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
				if($menus["xsubmenu"]=="Work Order Payments")
					$iscode=1;							
		}

		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','public/js/printjs.js');
		
		
	}
		
	public function index($flag=""){
		
		$this->view->flag=$flag;
		$this->approvallist = $this->model->getApprovalForUser("Work Order Payment");
		//print_r($approvallist);die;
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$this->view->table = $this->renderTable();
		
		$this->view->rendermainmenu('wopayapproval/index');	
	}
	
	function approve($reqnum){
		$flag="Access Denied";
		$status = "Confirmed";
		$appstatus = "Confirmed";

		$this->approvallist = $this->model->getApprovalForUser();
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$req = $this->model->getSingleReq($reqnum);
		//print_r($req);die;
		if(!empty($req)){
			$level = $req[0]['xlevel'] + 1;
			$dept = $req[0]['xdept'];
			$approval = $this->model->getApproval($dept, $level);
			$getStatus = $this->model->getApproval($dept, $req[0]['xlevel']);
			//print_r($approval);
			if(!empty($approval)){
				if($getStatus[0]['xstatus']=="Confirmed")
					$status = "Confirmed";
				else{
					$status = "Pending";
					
					// $sendMails = $this->model->getMails("Work Order Payment", $approval[0]['xstatus']);
					// $mailer = new Mailer();
					// $messagae = '<h4>Work Order Payment No : '.$reqnum.'</h4></br><p>To Approve this TA/DA <a href="'.URL.'wopayapproval/showreq/'.$reqnum.'">Click Here</a></p>';
					// $emails = "";
					// if(!empty($sendMails)){
					// 	foreach($sendMails as $key=>$value){
					// 		$emails .= $value['zaltemail'].",";	
					// 	}
					// 	$emails = rtrim($emails,",");
					// }
					// $res = $mailer->sendbyemail($emails, "Work Order Payment Submited by ".$req[0]['zemail'], $messagae, "");
				}
				$appstatus = $approval[0]['xstatus'];
			}
			$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '". $reqnum ."'";
			if($req[0]['xemail']){
				$xemail = $req[0]['xemail']."; ".$req[0]['xappstatus'].":".Session::get('suser');
			}else{
				$xemail = $req[0]['xappstatus'].":".Session::get('suser');
			}
			$updateCode = " xstatus='".$status."', xappstatus='".$appstatus."', xemail='".$xemail."'";

			$this->model->confirmConcat($updateCode, $where);
			    $flag="Work Order Payment No : ".$reqnum." - Approved Done";
			if(Session::get('suser')=='zahurul830@gmail.com' && $req[0]['xappstatus']=="Confirmed")
				$flag="Work Order Payment No : ".$reqnum." - Checked Done";
		}
		$this->index($flag);
	}
	
	function cancel($reqnum){
		$flag="Access Denied";
		$comm = $_POST['comment'];
		if($comm == ""){
			$flag="Please Write Modification Type.";
		}else{
			$this->approvallist = $this->model->getApprovalForUser();
			if(empty($this->approvallist))
				header('location: '.URL.'mainmenu');

			$req = $this->model->getSingleReq($reqnum);
			if(!empty($req)){
				$comment = $req[0]["xcomment"];
				if($comm != ""){
					if($comment){
						$comment .= "</br>";
					}
					$comment .= "<b>Modify Request by: </b>".Session::get('suser').", <b>Date: </b>".date('d-m-Y h:i:s A')."</br><b>Comment: </b>".$comm;
				}
				$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '". $reqnum ."'";
				if($req[0]['xemail']){
					$xemail = $req[0]['xemail']."; Modify:".Session::get('suser');
				}else{
					$xemail = "Modify:".Session::get('suser');
				}
				$updateCode = " xstatus='Canceled', xcomment='".$comment."', xemail='".$xemail."'";			
				$this->model->confirmConcat($updateCode, $where);
				$flag="Work Order Payment No : ".$reqnum." - Modify Done";
			}
		}
		$this->index($flag);
	}

	function delete($reqnum){
		$flag="Access Denied";
		$this->approvallist = $this->model->getApprovalForUser();
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$req = $this->model->getSingleReq($reqnum);
		if(!empty($req)){
			$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '". $reqnum ."'";
			if($req[0]['xemail']){
				$xemail = $req[0]['xemail']."; Delete:".Session::get('suser');
			}else{
				$xemail = "Delete:".Session::get('suser');
			}
			$updateCode = " xstatus='Deleted', xpaystatus='Deleted', xemail='".$xemail."'";
			$this->model->confirmConcat($updateCode, $where);
			$flag="Work Order Payment No : ".$reqnum." - Delete Done";
		}
		$this->index($flag);
	}
		
	function renderTable($branch=""){
		$fields = array(
					"xdate-Date",
					"xtxnnum-Txn No",
					"xappstatus-Status",
					"xemail-Previous approvals",
					"zemail-Created by",
					"wonum-Work order No",
					"toname-Name",
					"toorg-Org",
					"xproject-Project",
					"woamount-Total work order amount",
					"wopay-Total pay amount",
					"xamount-Now pay amount",
					);
		$row = $this->model->getPur();
		//print_r($row); die;
		return $this->createTable($fields, $row, "xtxnnum", URL."wopayapproval/showreq/", URL."wopayapproval/approve/", URL."wopayapproval/cancel/", URL."wopayapproval/delete/");
	}

	function showreq($reqnum){
		$flag="Access Denied";
		$this->approvallist = $this->model->getApprovalForUser();
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');
		$this->view->backUrl=URL."wopayapproval";
		$this->view->approveUrl=URL."wopayapproval/approve/".$reqnum;
		$this->view->cencelUrl=URL."wopayapproval/cancel/".$reqnum;
		$this->view->deleteUrl=URL."wopayapproval/delete/".$reqnum;

		$reqmst = $this->model->getSupplierPay($reqnum);
		if(!empty($reqmst)){
			$this->view->level = $this->model->getApprovalLevel($reqmst[0]['xdept'])[0]['xlevel'];
			$this->view->reqmst = $reqmst;
			$this->view->table=$this->renderTable2($reqnum);
			$this->view->rendermainmenu('wopayapproval/itemreceivelist');
		}else
			$this->index($flag);
	}

	function renderTable2($reqnum){
		$fields = array(
					"xdate-DATE",
					"xdesc-DESCRIPTION",
					"xqty-QTY",
					"xunit-UNIT",
					"xprice-PRICE",
					"xremarks-REMARKS",
					"xamount-AMOUNT",
					);
		
		$this->approvallist = $this->model->getApprovalForUser();
		$row = $this->model->getRequisitionByNum($reqnum);
		
		return $this->myTable2($row);
	}

	public function myTable2($row){
		
		$field = array();
		$head = array();
		
		$total = 0.00;
		$table = '<div class="table-responsive"><table id="mytbl" class="table table-bordered table-striped" style="width:100%">';
		$table.='<thead style="font-size: 11px">';
		$table.='<tr>';
		$table.='<th>SL</th><th>DATE</th><th>DESCRIPTION</th><th>QTY</th><th>UNIT</th><th>PRICE</th><th>AMOUNT</th><th>REMARKS</th>';
		$table.='</tr>';
		$table.='</thead>';
		$table.='<tbody>';
		$total = 0;
		$sl = 0;
		foreach($row as $key=>$value){
			$sl++;
			$table.='<tr>';
			$table.='<td>'.$sl.'</td>';
			$table.='<td style="width:90px">'. date('d-m-Y', strtotime($value['xdate'])) .'</td>';
			$table.='<td>'.$value['xdescription'].'</td>';
			$table.='<td>'.$value['xqty'].'</td>';
			$table.='<td>'.$value['xunit'].'</td>';
			$table.='<td>'.$value['xprice'].'</td>';
			$table.='<td>'.$value['xamount'].'</td>';
			$table.='<td>'.$value['xremarks'].'</td>';
			$table.='</tr>';
			$total += $value['xamount'];
		}
		$table.='<tr>';
		$table.='<td colspan="6" class="text-right">Total</td><td>'.$total.'</td><td></td>';
		$table.='</tr>';
		$table.='</tbody>';
		$table.='</table></div>';
		return $table;
	}

	public function createTable($fields, $row, $keyval, $actionurledit="", $actionurldelete="",$actionurlbtn2="",$actionurlbtn3="",$actionbtn="Approve",$actionbtn2="Modify",$actionbtn3="Delete"){
	
			
		$head = array();
		foreach($fields as $str){
			$st=explode('-',$str);
			
			$head[] = $st[1];
		}
		if(Session::get('suser')=='zahurul830@gmail.com' && $row[0]['xappstatus']=="Confirmed")
			$actionbtn = "Checked";
			
		$table = '<div class="table-responsive"><table id="dtbl" class="table table-striped table-bordered" cellspacing="0" width="100%">';
		$table.='<thead>';
		$table.='<tr>';
		foreach($head as $hd){
			$table.='<th>'.$hd.'</th>';
		}
		if($actionurledit!="")
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
			if($actionurledit!="")	
				$table.='<td><a class="btn btn-info" id="'.$value[$keyval].'"  href="'.$actionurledit.$value[$keyval].'/'.$t.'" role="button">Show</a></td>';
			//if($actionurldelete!="")
				$table.='<td><a id="appbtn" class="btn btn-success" href="'.$actionurldelete.$value[$keyval].'" role="button">'.$actionbtn.'</a></td>';
				$table.='<td><a id="delbtn" class="btn btn-danger" href="'.$actionurlbtn3.$value[$keyval].'" role="button">'.$actionbtn3.'</a></td>';
			$table.='</tr>';
		}
		$table.='</tbody>';
		$table.='</table></div>';
		
		return $table;	
	}
				
}