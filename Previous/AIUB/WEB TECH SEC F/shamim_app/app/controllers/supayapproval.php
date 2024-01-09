<?php
class Supayapproval extends Controller{
	
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
				if($menus["xsubmenu"]=="Supplier Payments")
					$iscode=1;							
		}
    //echo $iscode;die;
		if($iscode==0)
			header('location: '.URL.'mainmenu');
		
		
			
		$this->view->js = array('public/js/datatable.js','public/js/printjs.js');
		
		
	}
		
	public function index($flag=""){
		
		$this->view->flag=$flag;
		$this->approvallist = $this->model->getApprovalForUser();
		//print_r($this->approvallist);die;
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$this->view->table = $this->renderTable();
		
		$this->view->rendermainmenu('supayapproval/index');	
	}
	
	function approve($reqnum){
		$flag="Access Denied";
		$status = "Confirmed";
		$appstatus = "Confirmed";

		$this->approvallist = $this->model->getApprovalForUser();
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$req = $this->model->getSingleReq($reqnum);
		//print_r($req);
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
					
					$sendMails = $this->model->getMails("Supplier Payment", $approval[0]['xstatus']);
					$mailer = new Mailer();
					$messagae = '<h4>Supplier Payment No : '.$reqnum.'</h4>';//</br><p>To Approve this TA/DA <a href="'.URL.'supayapproval/showreq/'.$reqnum.'">Click Here</a></p>
					$emails = "";
					if(!empty($sendMails)){
						foreach($sendMails as $key=>$value){
							$emails .= $value['zaltemail'].",";	
						}
						$emails = rtrim($emails,",");
					}
					$res = $mailer->sendbyemail($emails, "Supplier Payment Submited by ".$req[0]['zemail'], $messagae, "");
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
			    $flag="Supplier Payment No : ".$reqnum." - Approved Done";
			if(Session::get('suser')=='zahurul830@gmail.com' && $req[0]['xappstatus']=="Confirmed")
				$flag="Supplier Payment No : ".$reqnum." - Checked Done";
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
				$flag="Supplier Payment No : ".$reqnum." - Modified Done";
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
			$flag="Supplier Payment No : ".$reqnum." - Deleted Done";
		}
		$this->index($flag);
	}
		
	function renderTable($branch=""){
		$fields = array(
					"xdate-Date",
					"xtxnnum-Txn No",
					"xappstatus-Status",
					//"xemail-Previous Approvals",
					"zemail-Created By",
					"xgrnnum-GRN No",
					"xsup-Supplier ID",
					"xorg-Org",
					"xproj-Project",
					"totalbal-Total GRN Amount",
					"xpobal-GRN Balance",
					"xprepay-Update Pay",
					"xamount-Now Pay Amount"
					);
		$row = $this->model->getPur();
		//print_r($row); die;
		return $this->createTable($fields, $row, "xtxnnum", URL."supayapproval/showreq/", URL."supayapproval/approve/", URL."supayapproval/cancel/", URL."supayapproval/delete/");
	}

	function showreq($reqnum){
		$flag="Access Denied";
		$this->approvallist = $this->model->getApprovalForUser();
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');
		$this->view->backUrl=URL."supayapproval";
		$this->view->approveUrl=URL."supayapproval/approve/".$reqnum;
		$this->view->cencelUrl=URL."supayapproval/cancel/".$reqnum;
		$this->view->deleteUrl=URL."supayapproval/delete/".$reqnum;

		$reqmst = $this->model->getSingleReq($reqnum);
		//print_r($reqmst);
		if(!empty($reqmst)){
			$this->view->level = $this->model->getApprovalLevel($reqmst[0]['xdept'])[0]['xlevel'];
			$this->view->reqmst = $reqmst;
			$this->view->table=$this->renderGrnTable($reqmst[0]['xgrnnum']);
			$this->view->rendermainmenu('supayapproval/itemreceivelist');
		}else
			$this->index($flag);
	}

	function renderTable2($reqnum){
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
		
		$this->approvallist = $this->model->getApprovalForUser();
		$row = $this->model->getRequisitionByNum($reqnum);
		$billtotal = $this->model->billTotal($reqnum);
		
		return $table->myTable2("tada",$fields, $row, "xitemcode","","",$billtotal[0]['xtotal']);
	}
	public	function renderGrnTable($txnnum){
			
			$row = $this->model->getgrndt($txnnum); 
			
			$table = '<table class="table table-striped table-bordered">';
				$table .='<thead>
							<th>Sl.</th><th>Itemcode</th><th>Description</th><th style="text-align:right">Rate</th><th style="text-align:right">Qty</th><th>UOM</th><th style="text-align:right">Tax</th><th style="text-align:right">Total</th>
						</thead>';
						$totalqty = 0;
						$total = 0;
						$totaltax = 0;
						$totaldisc = 0;
						$table .='<tbody>';

						foreach($row as $key=>$val){

								$table .= "<td>".$val['xrow']."</td>";
								$table .= "<td>".$val['xitemcode']."</td>";
								$table .= "<td>".$val['xitemdesc']."</td>";
								$table .='<td align="right">'.round($val['xratepur'],2).'</td>';		
								$table .='<td align="right">'.round($val['xqtypur'],2).'</td>';
								$table .='<td>'.$val['xunitstk'].'</td>';
								$table .='<td align="right">'.$val['xtotaltax'].'</td>';
								//$table .='<td align="right">'.$val['xdisctotal'].'</td>';
								$subtotal = $val['xtotal']+$val['xtotaltax']-$val['xtotaldisc'];
								$table .='<td align="right">'.round($subtotal,2).'</td>';
								$total+=$subtotal;
								$totalqty+=	$val['xqtypur'];
								$totaltax +=$val['xtotaltax'];
								//$totaldisc+= $val['xdisctotal'];
								
							$table .="</tr>";
						}
							$table .='<tr><td align="right" colspan="4"><strong>Total</strong></td><td align="right"><strong>'.round($totalqty,2).'</strong></td><td></td><td align="right"><strong>'.$totaltax.'</strong></td><td align="right"><strong>'.round($total,2).'</strong></td></tr>';
							 	
					$table .="</tbody>";			
			$table .= "</table>";
			
			return $table;
		}

		public function createTable($fields, $row, $keyval, $actionurledit="", $actionurldelete="",$actionurlbtn2="", $actionurlbtn3="",$actionbtn="Approve",$actionbtn2="Modify",$actionbtn3="Delete"){
		
				
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