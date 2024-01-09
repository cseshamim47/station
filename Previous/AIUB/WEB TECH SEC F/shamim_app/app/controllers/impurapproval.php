<?php
class Impurapproval extends Controller{
	
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
				if($menus["xsubmenu"]=="Purchase Requisitions")
					$iscode=1;							
		}

		if($iscode==0)
			header('location: '.URL.'mainmenu');
		
		
			
		$this->view->js = array('public/js/datatable.js','public/js/printjs.js');
		
		
	}
		
	public function index($flag=""){
		
		$this->view->flag=$flag;
		//$this->approvallist = $this->model->getApprovalForUser();
		//print_r($approvallist);die;
		if(Session::get('suser')=='akramuzzaman@nnsel.com' || Session::get('suser')=='falgunimahmud@nnsel.com'){
			$this->view->table = $this->renderTable();
			$this->view->rendermainmenu('impurapproval/index');
		}else{
			header('location: '.URL.'mainmenu');
		}
	}
	
	function approve($reqnum){
		$flag="Access Denied";

		//$this->approvallist = $this->model->getApprovalForUser();
		if(Session::get('suser') != 'akramuzzaman@nnsel.com' && Session::get('suser') != 'falgunimahmud@nnsel.com'){
			header('location: '.URL.'mainmenu');
		}

		if(Session::get('suser')=='akramuzzaman@nnsel.com'){
			$appstatus = "1st Approval";
		}elseif(Session::get('suser')=='falgunimahmud@nnsel.com'){
			$appstatus = "Confirmed";
		}

		$req = $this->model->getSingleReq($reqnum, $appstatus);
		//print_r($req);
		if(!empty($req)){

			if(Session::get('suser')=='akramuzzaman@nnsel.com'){
				$appstatus = "Confirmed";
				$status = "Pending";
			}elseif(Session::get('suser')=='falgunimahmud@nnsel.com'){
				$appstatus = "Confirmed";
				$status = "Confirmed";
			}
			// $level = $req[0]['xlevel'] + 1;
			// $dept = $req[0]['xdept'];
			// $approval = $this->model->getApproval($dept, $level);
			// $getStatus = $this->model->getApproval($dept, $req[0]['xlevel']);
			// if(!empty($approval)){
			// 	if($getStatus[0]['xstatus']=="Confirmed")
			// 		$status = "Confirmed";
			// 	else
			// 		$status = "Pending";
			// 	$appstatus = $approval[0]['xstatus'];
			// }
			$where = " bizid = ". Session::get('sbizid') ." and ximreqnum = '". $reqnum ."'";
			if($req[0]['xemail']){
				$xemail = $req[0]['xemail']."; ".$req[0]['xappstatus'].":".Session::get('suser');
			}else{
				$xemail = $req[0]['xappstatus'].":".Session::get('suser');
			}
			$updateCode = " xstatus='".$status."', xappstatus='".$appstatus."', xemail='".$xemail."'";
			//echo $updateCode;die;
			$this->model->confirmConcat($updateCode, $where);
			    $flag="Requisition No : ".$reqnum." - Approved Done";
		}
		$this->index($flag);
	}
	
	function cancel($reqnum){
		$flag="Access Denied";
		$comm = $_POST['comment'];
		if($comm == ""){
			$flag="Please Write Modification Type.";
		}else{
			//$this->approvallist = $this->model->getApprovalForUser();
			if(Session::get('suser') != 'akramuzzaman@nnsel.com' && Session::get('suser') != 'falgunimahmud@nnsel.com'){
				header('location: '.URL.'mainmenu');
			}

			if(Session::get('suser')=='akramuzzaman@nnsel.com'){
				$appstatus = "1st Approval";
			}elseif(Session::get('suser')=='falgunimahmud@nnsel.com'){
				$appstatus = "Confirmed";
			}

			$req = $this->model->getSingleReq($reqnum, $appstatus);
			if(!empty($req)){
				$comment = $req[0]["xcomment"];
				if($comm != ""){
					if($comment){
						$comment .= "</br>";
					}
					$comment .= "<b>Modify Request by: </b>".Session::get('suser').", <b>Date: </b>".date('d-m-Y h:i:s A')."</br><b>Comment: </b>".$comm;
				}
				$where = " bizid = ". Session::get('sbizid') ." and ximreqnum = '". $reqnum ."'";
				if($req[0]['xemail']){
					$xemail = $req[0]['xemail']."; Modify:".Session::get('suser');
				}else{
					$xemail = "Modify:".Session::get('suser');
				}
				$updateCode = " xstatus='Canceled', xcomment='".$comment."', xemail='".$xemail."'";			
				$this->model->confirmConcat($updateCode, $where);
				$flag="Requisition No : ".$reqnum." - Modified Done";
			}
		}
		$this->index($flag);
	}

	function delete($reqnum){
		$flag="Access Denied";
		//$this->approvallist = $this->model->getApprovalForUser();
		if(Session::get('suser') != 'akramuzzaman@nnsel.com' && Session::get('suser') != 'falgunimahmud@nnsel.com'){
			header('location: '.URL.'mainmenu');
		}

		if(Session::get('suser')=='akramuzzaman@nnsel.com'){
			$appstatus = "1st Approval";
		}elseif(Session::get('suser')=='falgunimahmud@nnsel.com'){
			$appstatus = "Confirmed";
		}

		$req = $this->model->getSingleReq($reqnum, $appstatus);
		if(!empty($req)){
			$where = " bizid = ". Session::get('sbizid') ." and ximreqnum = '". $reqnum ."'";
			if($req[0]['xemail']){
				$xemail = $req[0]['xemail']."; Delete:".Session::get('suser');
			}else{
				$xemail = "Delete:".Session::get('suser');
			}
			$updateCode = " xstatus='Deleted', xpaystatus='Deleted', xemail='".$xemail."'";			
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
					"xtype-Requisition Type",
					"xappstatus-Status",
					"xemail-Previous Approvals"
					);
		if(Session::get('suser')=='akramuzzaman@nnsel.com'){
			$appstatus = "1st Approval";
		}elseif(Session::get('suser')=='falgunimahmud@nnsel.com'){
			$appstatus = "Confirmed";
		}			
		$row = $this->model->getPur($appstatus);
		//print_r($row); die;
		return $this->createTable($fields, $row, "ximreqnum", URL."impurapproval/showreq/", URL."impurapproval/approve/", URL."impurapproval/cancel/", URL."impurapproval/delete/");
		
		
	}

	function showreq($reqnum){
		$flag="Access Denied";
		//$this->approvallist = $this->model->getApprovalForUser();
		if(Session::get('suser') != 'akramuzzaman@nnsel.com' && Session::get('suser') != 'falgunimahmud@nnsel.com'){
			header('location: '.URL.'mainmenu');
		}
		$this->view->backUrl=URL."impurapproval";
		$this->view->approveUrl=URL."impurapproval/approve/".$reqnum;
		$this->view->cencelUrl=URL."impurapproval/cancel/".$reqnum;
		$this->view->deleteUrl=URL."impurapproval/delete/".$reqnum;
		
		$tblvalues = $this->model->getReq($reqnum);
		$this->view->reqmst = $this->model->getImreq($reqnum);
		//print_r($tblvalues);
		$this->view->xdate = $tblvalues[0]["xdate"];
		$this->view->xtype = $tblvalues[0]["xtype"];
		$this->view->reqnum = $reqnum;
		$this->view->xproject = $tblvalues[0]["xproject"];
		
		$this->view->table = $this->renderTableForPrint($reqnum);

		//$this->view->table=$this->renderTable2($reqnum);
		$this->view->rendermainmenu('impurapproval/itemreceivelist');
	}
	function renderTableForPrint($imreqnum){
		$tblvalues = $this->model->getImreq($imreqnum);

		$row = $this->model->getimreqdt($imreqnum);
		$delbtn = "";
		if(count($tblvalues)>0){
		if($tblvalues[0]["xstatus"]=="Created" || $tblvalues[0]["xstatus"]=="Canceled")
			$delbtn = URL."distreqgen/deldistreq/".$imreqnum."/";
		}
		
		$table = '<table class="table table-striped table-bordered">';
			$table .='<thead>
						<th style="text-align:center">Sl.</th><th style="text-align:center">Itemcode</th><th style="text-align:center">Description</th><th style="text-align:right">Rate</th><th style="text-align:right">Qty</th><th>UOM</th><th style="text-align:right">Total</th>
					</thead>';
					$totalqty = 0;
					$total = 0;
					$totaltax = 0;
					$totaldisc = 0;
					$table .='<tbody>';

					foreach($row as $key=>$val){
						$showurl =  URL."distreqgen/showdistreq/".$imreqnum."/".$val['xrow'];
						$table .='<tr>';

							$table .= "<td>".$val['xrow']."</td>";
							$table .= "<td>".$val['xitemcode']."</td>";
							$table .= "<td>".$val['xitemdesc']."</td>";
							$table .='<td align="right">'.round($val['xrate'],2).'</td>';		
							$table .='<td align="right">'.round($val['xqty'],2).'</td>';
							$table .='<td>'.$val['xunitstk'].'</td>';
							$subtotal = $val['xsalestotal'];
							$table .='<td align="right">'.round($subtotal,2).'</td>';
							$total+=$subtotal;
							$totalqty+=	$val['xqty'];
							
						$table .="</tr>";
					}
						$cur = new Currency();
						$inword= $cur->get_bd_amount_in_text($total);
						$table .='<tr><td colspan="3"><b>In Word:</b> '.$inword.'</td><td align="right"><strong>Total</strong></td><td align="right"><strong>'.round($totalqty,2).'</strong></td><td></td><td align="right"><strong>'.round($total,2).'</strong></td></tr>';
						
						$table .='<tr><td colspan="7"><b>Note: </b>'.$tblvalues[0]["xnote"].'</td></tr>';

				$table .="</tbody>";			
		$table .= "</table>";
		
		return $table;
		
		
	}	

	function renderTable2($reqnum){
		$fields = array(
					"ximreqnum-Req. No",
					"xitemcode-Item Code",
					"xdesc-Item Name",
					"xqty-Qty",
					"xunitstk-UOM",
					"xemail-Previous Approvals"
					);
		$table = new Datatable();
		if(Session::get('suser')=='akramuzzaman@nnsel.com'){
			$appstatus = "1st Approval";
		}elseif(Session::get('suser')=='falgunimahmud@nnsel.com'){
			$appstatus = "Confirmed";
		}
		//$this->approvallist = $this->model->getApprovalForUser();
		$row = $this->model->getRequisitionByNum($reqnum, $appstatus);
		
		return $table->myTable($fields, $row, "xitemcode");
	}

		public function createTable($fields, $row, $keyval, $actionurledit="", $actionurldelete="",$actionurlbtn2="",$actionurlbtn3="",$actionbtn="Approve",$actionbtn2=" Modify",$actionbtn3="Delete"){
		
				
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
			
			$this->view->renderpage('impurapproval/picklist', false);
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