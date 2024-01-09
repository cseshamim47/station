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
				if($menus["xsubmenu"]=="Supplier Payment Approval")
					$iscode=1;							
		}
    //echo $iscode;die;
		if($iscode==0)
			header('location: '.URL.'mainmenu');
		
		
			
		$this->view->js = array('public/js/datatable.js','public/js/printjs.js');
		
		
	}
		
	public function index($flag=""){
		
		$this->view->flag=$flag;
		$this->approvallist = $this->model->getApprovalForUser("Supplier Payment");
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

		$this->approvallist = $this->model->getApprovalForUser("Supplier Payment");
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$req = $this->model->getSingleReq($reqnum, $this->approvallist[0]['xstatus']);
		//print_r($req);
		if(!empty($req)){
			$approval = $this->model->getApproval("Supplier Payment", $req[0]['xappstatus']);
			//print_r($approval);
			if(!empty($approval)){
				if($this->approvallist[0]['xstatus']=="Confirmed")
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

			$updateCode = "";
			if($req[0]['xappstatus']=="1st Approval")
				$updateCode = " xstatus='".$status."', xappstatus='".$appstatus."', xemail=concat(xemail, '".$req[0]['xappstatus'].":".Session::get('suser')."')";
			else
				$updateCode = " xstatus='".$status."', xappstatus='".$appstatus."', xemail=concat(xemail, '; ".$req[0]['xappstatus'].":".Session::get('suser')."')";
		
			$this->model->confirmConcat($updateCode, $where);
			$flag="Supplier Payment No : ".$reqnum." - Approved Done";
		}
		$this->index($flag);
	}
	
	function cancel($reqnum){
		$flag="Access Denied";
		$this->approvallist = $this->model->getApprovalForUser("Supplier Payment");
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$req = $this->model->getSingleReq($reqnum, $this->approvallist[0]['xstatus']);
		if(!empty($req)){
			$approval = $this->model->getApproval("Supplier Payment", $req[0]['xappstatus']);
			$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '". $reqnum ."'";
			$updateCode = " xstatus='Canceled', xappstatus='Canceled', xemail=concat(xemail, '; Modify:".Session::get('suser')."; ')";			
			$this->model->confirmConcat($updateCode, $where);
			$flag="Supplier Payment No : ".$reqnum." - Modified Done";
		}
		$this->index($flag);
	}

	function delete($reqnum){
		$flag="Access Denied";
		$this->approvallist = $this->model->getApprovalForUser("Supplier Payment");
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$req = $this->model->getSingleReq($reqnum, $this->approvallist[0]['xstatus']);
		if(!empty($req)){
			$approval = $this->model->getApproval("Supplier Payment", $req[0]['xappstatus']);
			$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '". $reqnum ."'";
			$updateCode = " xstatus='Deleted', xappstatus='Deleted', xemail=concat(xemail, '; Delete:".Session::get('suser')."; ')";			
			$this->model->confirmConcat($updateCode, $where);
			$flag="Supplier Payment No : ".$reqnum." - Deleted Done";
		}
		$this->index($flag);
	}
		
	function renderTable($branch=""){
		$fields = array(
					"xdate-Date",
					"xtxnnum-Txn No",
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
		$row = $this->model->getPur($this->approvallist[0]['xstatus']);
		//print_r($row); die;
		return $this->createTable($fields, $row, "xtxnnum", URL."supayapproval/showreq/", URL."supayapproval/approve/", URL."supayapproval/cancel/", URL."supayapproval/delete/");
	}

	function showreq($reqnum){
		$flag="Access Denied";
		$this->approvallist = $this->model->getApprovalForUser("Supplier Payment");
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');
		$this->view->backUrl=URL."supayapproval";
		$this->view->approveUrl=URL."supayapproval/approve/".$reqnum;
		$this->view->cencelUrl=URL."supayapproval/cancel/".$reqnum;
		$this->view->deleteUrl=URL."supayapproval/delete/".$reqnum;

		$reqmst = $this->model->getSingleReq($reqnum, $this->approvallist[0]['xstatus']);
		//print_r($reqmst);
		if(!empty($reqmst)){
			$this->view->reqmst = $reqmst;
			$this->view->table=$this->renderTable2($reqnum);
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
		
		$this->approvallist = $this->model->getApprovalForUser("Supplier Payment");
		$row = $this->model->getRequisitionByNum($reqnum,$this->approvallist[0]['xstatus']);
		$billtotal = $this->model->billTotal($reqnum);
		
		return $table->myTable2("tada",$fields, $row, "xitemcode","","",$billtotal[0]['xtotal']);
	}

		public function createTable($fields, $row, $keyval, $actionurledit="", $actionurldelete="",$actionurlbtn2="", $actionurlbtn3="",$actionbtn="Approve",$actionbtn2="Modify",$actionbtn3="Delete"){
		
				
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
				$table.='<th></th>';
			//if($actionurldelete!="")
				$table.='<th></th>';
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
					$table.='<td><a id="canbtn" class="btn btn-warning" href="'.$actionurlbtn2.$value[$keyval].'" role="button">'.$actionbtn2.'</a></td>';
					$table.='<td><a id="delbtn" class="btn btn-danger" href="'.$actionurlbtn3.$value[$keyval].'" role="button">'.$actionbtn3.'</a></td>';
				$table.='</tr>';
			}
			$table.='</tbody>';
			$table.='</table></div>';
			
			return $table;	
		}
		
		
		function picklist(){
			$this->view->table = $this->imstockPickTable();
			
			$this->view->renderpage('supayapproval/picklist', false);
		}


		
				
}