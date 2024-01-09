<?php
class Imstorereqapproval extends Controller{
	
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
				if($menus["xsubmenu"]=="Store Requisition Approval")
					$iscode=1;							
		}

		if($iscode==0)
			header('location: '.URL.'mainmenu');
		
		
			
		$this->view->js = array('public/js/datatable.js');
		
		
	}
		
	public function index($flag=""){
		
		$this->view->flag=$flag;
		$this->approvallist = $this->model->getApprovalForUser();
		//print_r($approvallist);die;
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$this->view->table = $this->renderTable();
		
		$this->view->rendermainmenu('imstorereqapproval/index');	
	}
	
	function approve($reqnum){
		$flag="Access Denied";
		$status = "Confirmed";
		$appstatus = "Confirmed";

		$this->approvallist = $this->model->getApprovalForUser();
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$req = $this->model->getSingleReq($reqnum, $this->approvallist[0]['xstatus']);
		//print_r($req);
		if(!empty($req)){
			$approval = $this->model->getApproval("Store Requisition", $req[0]['xappstatus']);
			if(!empty($approval)){
				if($this->approvallist[0]['xstatus']=="Confirmed")
					$status = "Confirmed";
				else
					$status = "Pending";
				$appstatus = $approval[0]['xstatus'];
			}
			$where = " bizid = ". Session::get('sbizid') ." and ximreqnum = '". $reqnum ."'";
			// $postdata=array(
			// 	"xstatus" => $status,
			// 	"xappstatus" => $appstatus,
			// 	"xemail" => Session::get('suser')
			// 	);	
			$updateCode = " xstatus='".$status."', xappstatus='".$appstatus."', xemail=concat(xemail, '".$req[0]['xappstatus'].":".Session::get('suser')."; ')";
		
			$this->model->confirmConcat($updateCode, $where);
			$flag="Requisition No : ".$reqnum." - Approved Done";
		}
		$this->index($flag);
	}
	
	function cancel($reqnum){
		$flag="Access Denied";
		$this->approvallist = $this->model->getApprovalForUser();
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$req = $this->model->getSingleReq($reqnum, $this->approvallist[0]['xstatus']);
		if(!empty($req)){
			$approval = $this->model->getApproval("Store Requisition", $req[0]['xappstatus']);
			$where = " bizid = ". Session::get('sbizid') ." and ximreqnum = '". $reqnum ."'";
			// $postdata=array(
			// 	"xstatus" => "Canceled",
			// 	"xappstatus" => "Canceled",
			// 	"xemail" => Session::get('suser')
			// 	);	
			$updateCode = " xstatus='Canceled', xappstatus='Canceled', xemail=concat(xemail, '; Modify:".Session::get('suser')."; ')";			
			$this->model->confirmConcat($updateCode, $where);
			$flag="Requisition No : ".$reqnum." - Modified Done";
		}
		$this->index($flag);
	}

	function delete($reqnum){
		$flag="Access Denied";
		$this->approvallist = $this->model->getApprovalForUser();
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$req = $this->model->getSingleReq($reqnum, $this->approvallist[0]['xstatus']);
		if(!empty($req)){
			$approval = $this->model->getApproval("Store Requisition", $req[0]['xappstatus']);
			$where = " bizid = ". Session::get('sbizid') ." and ximreqnum = '". $reqnum ."'";
			// $postdata=array(
			// 	"xstatus" => "Canceled",
			// 	"xappstatus" => "Canceled",
			// 	"xemail" => Session::get('suser')
			// 	);	
			$updateCode = " xstatus='Deleted', xappstatus='Deleted', xemail=concat(xemail, '; Delete:".Session::get('suser')."; ')";			
			$this->model->confirmConcat($updateCode, $where);
			$flag="Requisition No : ".$reqnum." - Deleted Done";
		}
		$this->index($flag);
	}
		
	function renderTable($branch=""){
		$fields = array(
					"xdate-Date",
					"ximreqnum-Requisition No",
					"zemail-Created By",
					"xemail-Previous Approvals"
					);
		$row = $this->model->getStoreReq($this->approvallist[0]['xstatus']);
		//print_r($row); die;
		return $this->createTable($fields, $row, "ximreqnum", URL."imstorereqapproval/showreq/", URL."imstorereqapproval/approve/", URL."imstorereqapproval/cancel/", URL."imstorereqapproval/delete/");
		
		
	}

	function showreq($reqnum){
		$flag="Access Denied";
		$this->approvallist = $this->model->getApprovalForUser();
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');
		$this->view->backUrl=URL."imstorereqapproval";
		$this->view->approveUrl=URL."imstorereqapproval/approve/".$reqnum;
		$this->view->cencelUrl=URL."imstorereqapproval/cancel/".$reqnum;
		$this->view->deleteUrl=URL."imstorereqapproval/delete/".$reqnum;

		$this->view->table=$this->renderTable2($reqnum);
		$this->view->rendermainmenu('imstorereqapproval/itemreceivelist');
	}

	function renderTable2($reqnum){
		$fields = array(
					"ximreqnum-Req. No",
					"xitemcode-Item Code",
					"xdesc-Item Name",
					"xwh-Warehouse",
					"xqty-Qty",
					"xemail-Previous Approvals"
					);
		$table = new Datatable();
		
		$this->approvallist = $this->model->getApprovalForUser();
		$row = $this->model->getRequisitionByNum($reqnum,$this->approvallist[0]['xstatus']);
		
		return $table->myTable($fields, $row, "xitemcode");
	}

		public function createTable($fields, $row, $keyval, $actionurledit="", $actionurldelete="",$actionurlbtn2="",$actionurlbtn3="",$actionbtn="Approve",$actionbtn2="Modify",$actionbtn3="Delete"){
		
				
			$head = array();
			foreach($fields as $str){
				$st=explode('-',$str);
				
				$head[] = $st[1];
			}
			$table = '<div class=""><table id="dtbl" class="table table-striped table-bordered" cellspacing="0" width="100%">';
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
			
			$this->view->renderpage('imstorereqapproval/picklist', false);
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