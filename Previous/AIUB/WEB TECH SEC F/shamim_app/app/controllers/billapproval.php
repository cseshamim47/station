<?php
class Billapproval extends Controller{
	
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
				if($menus["xsubmenu"]=="Bill")
					$iscode=1;							
		}

		if($iscode==0)
			header('location: '.URL.'mainmenu');
		
		
			
		$this->view->js = array('public/js/datatable.js','public/js/printjs.js','views/glrpt/js/getaccdt.js','views/distreg/js/codevalidator.js');
		
		
	}
		
	public function index($flag=""){
		
		$this->view->flag=$flag;
		$this->approvallist = $this->model->getApprovalForUser();
		//print_r($approvallist);die;
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$this->view->table = $this->renderTable();
		
		$this->view->rendermainmenu('billapproval/index');	
	}
	
	function approve($reqnum){
		$flag="Access Denied";
		$status = "Confirmed";
		$appstatus = "Confirmed";

		$this->approvallist = $this->model->getApprovalForUser();
		//print_r($this->approvallist);die;
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$req = $this->model->getSingleReq($reqnum);
		//print_r($req);die;
		if(!empty($req)){
			$level = $req[0]['xlevel'] + 1;
			$dept = $req[0]['xdept'];
			$approval = $this->model->getApproval($dept, $level);
			$getStatus = $this->model->getApproval($dept, $req[0]['xlevel']);
			//print_r($approval);die;
			if(!empty($approval)){
				if($getStatus[0]['xstatus']=="Confirmed")
					$status = "Confirmed";
				else{
					$status = "Pending";
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
			//echo $updateCode;die;
			$this->model->confirmConcat($updateCode, $where);
			    $flag="Bill No : ".$reqnum." - Approved Done";
			if(Session::get('suser')=='zahurul830@gmail.com' && $req[0]['xappstatus']=="Confirmed")
				$flag="Bill No : ".$reqnum." - Checked Done";
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

				$flag="Bill No : ".$reqnum." - Modify Done";
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

			$flag="Bill No : ".$reqnum." - Deleted Done";
		}
		$this->index($flag);
	}
		
	function renderTable($branch=""){
		$fields = array(
					"xdate-Date",
					"xtxnnum-Bill No",
					"zemail-Created By",
					"xsup-Name",
					"xproject-Project",
					"xappstatus-Status",
					"xemail-Previous Approvals"
					);
		$row = $this->model->getPur();
		//print_r($row); die;
		return $this->createTable($fields, $row, "xtxnnum", URL."billapproval/showreq/", URL."billapproval/approve/", URL."billapproval/cancel/", URL."billapproval/delete/");
		
		
	}

	function showreq($reqnum){
		$flag="Access Denied";
		$this->approvallist = $this->model->getApprovalForUser();
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$this->view->backUrl=URL."billapproval";
		$this->view->approveUrl=URL."billapproval/approve/".$reqnum;
		$this->view->cencelUrl=URL."billapproval/cancel/".$reqnum;
		$this->view->deleteUrl=URL."billapproval/delete/".$reqnum;

		$reqmst = $this->model->getSingleReq($reqnum);
		//print_r($reqmst);
		if(!empty($reqmst)){
			$this->view->level = $this->model->getApprovalLevel($reqmst[0]['xdept'])[0]['xlevel'];
			$this->view->reqmst = $reqmst;
			$this->view->table=$this->renderTable2($reqnum);
			$this->view->rendermainmenu('billapproval/itemreceivelist');
		}else
			$this->index($flag);
	}

	function renderTable2($reqnum){
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
		$row = $this->model->getRequisitionByNum($reqnum);
		
		return $table->myTable2("",$fields, $row, "xitemcode","","",$billtotal[0]['xtotal']);
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
					$table.='<td><a id="delbtn" class="btn btn-danger" href="'.$actionurlbtn3.$value[$keyval].'" role="button">'.$actionbtn3.'</a></td>';
				$table.='</tr>';
			}
			$table.='</tbody>';
			$table.='</table></div>';
			
			return $table;	
		}
		
		
		function picklist(){
			$this->view->table = $this->imstockPickTable();
			
			$this->view->renderpage('billapproval/picklist', false);
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