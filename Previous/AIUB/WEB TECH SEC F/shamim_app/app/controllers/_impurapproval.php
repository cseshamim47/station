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
				if($menus["xsubmenu"]=="Purchase Requisition Approval")
					$iscode=1;							
		}

		if($iscode==0)
			header('location: '.URL.'mainmenu');
		
		
			
		$this->view->js = array('public/js/datatable.js','public/js/printjs.js');
		
		
	}
		
	public function index($flag=""){
		
		$this->view->flag=$flag;
		$this->approvallist = $this->model->getApprovalForUser("Purchase Requisition");
		//print_r($approvallist);die;
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$this->view->table = $this->renderTable();
		
		$this->view->rendermainmenu('impurapproval/index');	
	}
	
	function approve($reqnum){
		$flag="Access Denied";
		$status = "Confirmed";
		$appstatus = "Confirmed";

		$this->approvallist = $this->model->getApprovalForUser("Purchase Requisition");
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$req = $this->model->getSingleReq($reqnum, $this->approvallist[0]['xstatus']);
		//print_r($req);
		if(!empty($req)){
			$approval = $this->model->getApproval("Purchase Requisition", $req[0]['xappstatus']);
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
		$this->approvallist = $this->model->getApprovalForUser("Purchase Requisition");
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$req = $this->model->getSingleReq($reqnum, $this->approvallist[0]['xstatus']);
		if(!empty($req)){
			$approval = $this->model->getApproval("Purchase Requisition", $req[0]['xappstatus']);
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
		$this->approvallist = $this->model->getApprovalForUser("Purchase Requisition");
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');

		$req = $this->model->getSingleReq($reqnum, $this->approvallist[0]['xstatus']);
		if(!empty($req)){
			$approval = $this->model->getApproval("Purchase Requisition", $req[0]['xappstatus']);
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
					"xtype-Requisition Type",
					"xemail-Previous Approvals"
					);
		$row = $this->model->getPur($this->approvallist[0]['xstatus']);
		//print_r($row); die;
		return $this->createTable($fields, $row, "ximreqnum", URL."impurapproval/showreq/", URL."impurapproval/approve/", URL."impurapproval/cancel/", URL."impurapproval/delete/");
		
		
	}

	function showreq($reqnum){
		$flag="Access Denied";
		$this->approvallist = $this->model->getApprovalForUser("Purchase Requisition");
		if(empty($this->approvallist))
			header('location: '.URL.'mainmenu');
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
							$table .='<td align="right">'.$val['xrate'].'</td>';		
							$table .='<td align="right">'.$val['xqty'].'</td>';
							$table .='<td>'.$val['xunitstk'].'</td>';
							$subtotal = $val['xsalestotal'];
							$table .='<td align="right">'.$subtotal.'</td>';
							$total+=$subtotal;
							$totalqty+=	$val['xqty'];
							
						$table .="</tr>";
					}
						$cur = new Currency();
						$inword= $cur->get_bd_amount_in_text($total);
						$table .='<tr><td colspan="3"><b>In Word:</b> '.$inword.'</td><td align="right"><strong>Total</strong></td><td align="right"><strong>'.$totalqty.'</strong></td><td></td><td align="right"><strong>'.$total.'</strong></td></tr>';
							 
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
		
		$this->approvallist = $this->model->getApprovalForUser("Purchase Requisition");
		$row = $this->model->getRequisitionByNum($reqnum,$this->approvallist[0]['xstatus']);
		
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