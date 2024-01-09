<?php
class Tadaapproval extends Controller{
	
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
				if($menus["xsubmenu"]=="TA/DA Approval")
					$iscode=1;							
		}

		if($iscode==0)
			header('location: '.URL.'mainmenu');
		
		
			
		$this->view->js = array('public/js/datatable.js','public/js/printjs.js');
		
		
	}
		
	public function index($flag=""){
		
		$this->view->flag=$flag;
		$this->approvallist = $this->model->getApprovalForUser("TA/DA Submit");
		//print_r($approvallist);die;
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$this->view->table = $this->renderTable();
		
		$this->view->rendermainmenu('tadaapproval/index');	
	}
	
	function approve($reqnum){
		$flag="Access Denied";
		$status = "Confirmed";
		$appstatus = "Confirmed";

		$this->approvallist = $this->model->getApprovalForUser("TA/DA Submit");
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$req = $this->model->getSingleReq($reqnum, $this->approvallist[0]['xstatus']);
		//print_r($req);
		if(!empty($req)){
			$approval = $this->model->getApproval("TA/DA Submit", $req[0]['xappstatus']);
			if(!empty($approval)){
				if($this->approvallist[0]['xstatus']=="Confirmed")
					$status = "Confirmed";
				else{
					$status = "Pending";
					
					$sendMails = $this->model->getMails("TA/DA Submit", $approval[0]['xstatus']);
					$mailer = new Mailer();
					$messagae = '<h4>TA/DA No : '.$reqnum.'</h4></br><p>To Approve this TA/DA <a href="'.URL.'tadaapproval/showreq/'.$reqnum.'">Click Here</a></p>';
					$emails = "";
					if(!empty($sendMails)){
						foreach($sendMails as $key=>$value){
							$emails .= $value['zaltemail'].",";	
						}
						$emails = rtrim($emails,",");
					}
					//$res = $mailer->sendbyemail($emails, "TA/DA Submited by ".$req[0]['zemail'], $messagae, "");
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
			$flag="Bill No : ".$reqnum." - Approved Done";
		}
		$this->index($flag);
	}
	
	function cancel($reqnum){
		$flag="Access Denied";
		$this->approvallist = $this->model->getApprovalForUser("TA/DA Submit");
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$req = $this->model->getSingleReq($reqnum, $this->approvallist[0]['xstatus']);
		if(!empty($req)){
			$approval = $this->model->getApproval("TA/DA Submit", $req[0]['xappstatus']);
			$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '". $reqnum ."'";
			// $postdata=array(
			// 	"xstatus" => "Canceled",
			// 	"xappstatus" => "Canceled",
			// 	"xemail" => Session::get('suser')
			// 	);	
			$updateCode = " xstatus='Canceled', xappstatus='Canceled', xemail=concat(xemail, '; Modify:".Session::get('suser')."; ')";			
			$this->model->confirmConcat($updateCode, $where);
			$flag="Bill No : ".$reqnum." - Modify Done";
		}
		$this->index($flag);
	}

	function delete($reqnum){
		$flag="Access Denied";
		$this->approvallist = $this->model->getApprovalForUser("TA/DA Submit");
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$req = $this->model->getSingleReq($reqnum, $this->approvallist[0]['xstatus']);
		if(!empty($req)){
			$approval = $this->model->getApproval("TA/DA Submit", $req[0]['xappstatus']);
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
					"xemail-Previous Approvals"
					);
		$row = $this->model->getPur($this->approvallist[0]['xstatus']);
		//print_r($row); die;
		return $this->createTable($fields, $row, "xtxnnum", URL."tadaapproval/showreq/", URL."tadaapproval/approve/", URL."tadaapproval/cancel/", URL."tadaapproval/delete/");
		
		
	}

	function showreq($reqnum){
		$flag="Access Denied";
		$this->approvallist = $this->model->getApprovalForUser("TA/DA Submit");
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');
		$this->view->backUrl=URL."tadaapproval";
		$this->view->approveUrl=URL."tadaapproval/approve/".$reqnum;
		$this->view->deleteUrl=URL."tadaapproval/delete/".$reqnum;
		$this->view->cencelUrl=URL."tadaapproval/cancel/".$reqnum;

		$reqmst = $this->model->getSingleReq($reqnum, $this->approvallist[0]['xstatus']);
		if(!empty($reqmst)){
			$this->view->reqmst = $reqmst;
			$this->view->table=$this->renderTable2($reqnum);
			$this->view->rendermainmenu('tadaapproval/itemreceivelist');
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
		
		$this->approvallist = $this->model->getApprovalForUser("TA/DA Submit");
		$row = $this->model->getRequisitionByNum($reqnum,$this->approvallist[0]['xstatus']);
		$billtotal = $this->model->billTotal($reqnum);
		
		return $table->myTable2("tada",$fields, $row, "xitemcode","","",$billtotal[0]['xtotal']);
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
			
			$this->view->renderpage('tadaapproval/picklist', false);
		}


		
				
}