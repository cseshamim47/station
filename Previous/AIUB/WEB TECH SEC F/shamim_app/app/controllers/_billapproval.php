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
				if($menus["xsubmenu"]=="Bill Approval")
					$iscode=1;							
		}

		if($iscode==0)
			header('location: '.URL.'mainmenu');
		
		
			
		$this->view->js = array('public/js/datatable.js','public/js/printjs.js');
		
		
	}
		
	public function index($flag=""){
		
		$this->view->flag=$flag;
		$this->approvallist = $this->model->getApprovalForUser("Bill Submit");
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

		$this->approvallist = $this->model->getApprovalForUser("Bill Submit");
		//print_r($this->approvallist);die;
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$req = $this->model->getSingleReq($reqnum, $this->approvallist[0]['xstatus']);
		//print_r($req);
		if(!empty($req)){
			$approval = $this->model->getApproval("Bill Submit", $req[0]['xappstatus']);
			if(!empty($approval)){
				if($this->approvallist[0]['xstatus']=="Confirmed")
					$status = "Confirmed";
				else{
					$status = "Pending";

					$sendMails = $this->model->getMails("Bill Submit", $approval[0]['xstatus']);
					$mailer = new Mailer();
					$messagae = '<h4>Bill Number : '.$reqnum.'</h4></br><p>To Approve this bill <a href="'.URL.'billapproval/showreq/'.$reqnum.'">Click Here</a></p>';
					$emails = "";
					if(!empty($sendMails)){
						foreach($sendMails as $key=>$value){
							$emails .= $value['zaltemail'].",";	
						}
						$emails = rtrim($emails,",");
					}
					//$res = $mailer->sendbyemail($emails, "Bill Submited by ".$req[0]['zemail'], $messagae, "");
				}
				$appstatus = $approval[0]['xstatus'];
			}
			$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '". $reqnum ."'";
			// $postdata=array(
			// 	"xstatus" => $status,
			// 	"xappstatus" => $appstatus,
			// 	"xemail" => "concat(xemail, '".$req[0]['xappstatus'].":".Session::get('suser')."')"
			// 	);	
			$updateCode = "";

			if($req[0]['xappstatus']=="1st Approval")
				$updateCode = " xstatus='".$status."', xappstatus='".$appstatus."', xemail=concat(xemail, '".$req[0]['xappstatus'].":".Session::get('suser')."')";
			else
				$updateCode = " xstatus='".$status."', xappstatus='".$appstatus."', xemail=concat(xemail, '; ".$req[0]['xappstatus'].":".Session::get('suser')."')";
			
			$this->model->confirmConcat($updateCode, $where);
			$flag="Bill No : ".$reqnum." - Approved Done";
		}
		$this->index($flag);
	}
	
	function cancel($reqnum){
		$flag="Access Denied";
		$this->approvallist = $this->model->getApprovalForUser("Bill Submit");
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$req = $this->model->getSingleReq($reqnum, $this->approvallist[0]['xstatus']);
		if(!empty($req)){
			$approval = $this->model->getApproval("Bill Submit", $req[0]['xappstatus']);
			$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '". $reqnum ."'";
			// $postdata=array(
			// 	"xstatus" => "Canceled",
			// 	"xappstatus" => "Canceled",
			// 	"xemail" => Session::get('suser')
			// );	
			$updateCode = " xstatus='Canceled', xappstatus='Canceled', xemail=concat(xemail, ' ;Modify:".Session::get('suser')."; ')";			
			$this->model->confirmConcat($updateCode, $where);

			$flag="Bill No : ".$reqnum." - Modify Done";
		}
		$this->index($flag);
	}

	function delete($reqnum){
		$flag="Access Denied";
		$this->approvallist = $this->model->getApprovalForUser("Bill Submit");
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$req = $this->model->getSingleReq($reqnum, $this->approvallist[0]['xstatus']);
		if(!empty($req)){
			$approval = $this->model->getApproval("Bill Submit", $req[0]['xappstatus']);
			$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '". $reqnum ."'";
			// $postdata=array(
			// 	"xstatus" => "Canceled",
			// 	"xappstatus" => "Canceled",
			// 	"xemail" => Session::get('suser')
			// );	
			$updateCode = " xstatus='Deleted', xappstatus='Deleted', xpaystatus='Deleted', xemail=concat(xemail, ' ;Delete:".Session::get('suser')."; ')";
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
					"xemail-Previous Approvals"
					);
		$row = $this->model->getPur($this->approvallist[0]['xstatus']);
		//print_r($row); die;
		return $this->createTable($fields, $row, "xtxnnum", URL."billapproval/showreq/", URL."billapproval/approve/", URL."billapproval/cancel/", URL."billapproval/delete/");
		
		
	}

	function showreq($reqnum){
		$flag="Access Denied";
		$this->approvallist = $this->model->getApprovalForUser("Bill Submit");
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$this->view->backUrl=URL."billapproval";
		$this->view->approveUrl=URL."billapproval/approve/".$reqnum;
		$this->view->cencelUrl=URL."billapproval/cancel/".$reqnum;
		$this->view->deleteUrl=URL."billapproval/delete/".$reqnum;

		$reqmst = $this->model->getSingleReq($reqnum, $this->approvallist[0]['xstatus']);
		//print_r($reqmst);
		if(!empty($reqmst)){
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
					"xdesc-DESCRIPTION",
					"xquality-QUALITY",
					"xprice-UNIT PRICE IN TAKA",
					"xqty-QUANTITY",
					"xtotal-AMOUNT	",
					"xremarks-REMARKS"
					);
		$table = new Datatable();
		$billtotal = $this->model->billTotal($reqnum);
				
		$this->approvallist = $this->model->getApprovalForUser("Bill Submit");
		$row = $this->model->getRequisitionByNum($reqnum,$this->approvallist[0]['xstatus']);
		
		return $table->myTable2("",$fields, $row, "xitemcode","","",$billtotal[0]['xtotal']);
	}

		public function createTable($fields, $row, $keyval, $actionurledit="", $actionurldelete="",$actionurlbtn2="",$actionurlbtn3="",$actionbtn="Approve",$actionbtn2="Modify",$actionbtn3="Delete"){
		
				
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