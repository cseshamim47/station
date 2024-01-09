<?php 
class Distreq extends Controller{
	
	private $values = array();
	private $fields = array();
	
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
				if($menus["xsubmenu"]=="Store Purchase Requisition")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreq/js/codevalidator.js','views/distreq/js/getitemdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"ximreqnum"=>"",
			"xnote"=>"",
			"xitemcode"=>"",
			"xitemdesc"=>"",
			"xqty"=>"0",
			"xrow"=>"0",
			"xrate"=>"0.00",
			"xunitstk"=>"",
			"xproject"=>"",
			"xpur"=>"",
			"xwh"=>"",
			"xcomment"=>""
			);
			
			$this->fields = array(
				array(
					"ximreqnum-text"=>'Requisition No_maxlength="20"',
					"xdate-datepicker" => 'Date_""',
					"xrow-hidden"=>''
					),
				array(
					"xnote-textarea"=>'Note_maxlength="250"'													
					),
				array(
					"xproject-select_Project"=>'Project*~star',
					"xpur-select_Purpose"=>'Purpose*~star'
					),
				array(
					"xwh-select_Warehouse"=>'Warehouse*~star_maxlength="50"',
					"xunitstk-text"=>'UOM_readonly'	
					),
				array(
					"xitemcode-group_".URL."itempicklist/picklistGroup/Store"=>'Item Code*~star_maxlength="20"',
					"xitemdesc-text"=>'Description_readonly'
					),
				array(
					"xrate-text_number"=>'Ref. value_number="true" minlength="1" maxlength="18" required',
					"xqty-text_digit"=>'Quantity*~star_number="true" minlength="1" maxlength="18" required'
					),
				array(
					"xcomment-textarea"=>'Modify Comment_maxlength="500"'
					),
				);
						
								
		}
		
		public function index(){
		
		
			$btn = array(
				"Clear" => URL."distreq/distreqentry",
			);	
			
						
				$this->view->rendermainmenu('distreq/index');
				
			}
			
			public function savedistreq(){
					
									
					$xdate = $_POST['xdate'];
					$dt = str_replace('/', '-', $xdate);
					$date = date('Y-m-d', strtotime($dt));
					$year = date('Y',strtotime($date));
					$month = date('m',strtotime($date)); 
					$xyear = 0;
					$per = 0;
					
					$xvoucher = $_POST['ximreqnum'];
					$keyfieldval="0";
					$form = new Form();
					$data = array();
					$success=0;
					$result = ""; 
					try{
					// if($_POST['xrate']<=0){
					// 	throw new Exception("Product rate must be greater than 0!");
					// }
					if(empty($xvoucher)){
						if(empty($_POST['xitemcode'])){
							throw new Exception("Item not found!");
						}
					}
					$itemdetail = $this->model->getItemDetail("xitemcode", $_POST['xitemcode']);
					if($itemdetail){
						if($itemdetail[0]['xgitem'] != "Store"){
							throw new Exception("You are not permitted to add this item!");
						}

						if($_POST['xqty']<=0){
							throw new Exception("Product quantity must be greater than 0!");
						}
					}
	
					$form	->post('xitemcode')
							->val('maxlength', 20)
							
							->post('ximreqnum')						
					
							->post('xnote')
							->val('maxlength', 250)
							
							->post('xqty')
							
							->post('xrate')

							->post('xproject')
	
							->post('xpur')

							->post('xwh')

							->post('xcomment');
							
					$form	->submit();
					
					$data = $form->fetch();
					
					if($data['ximreqnum'] == "")
						$keyfieldval = $this->model->getKeyValue("imreq","ximreqnum","REQ-","5");
					else
						$keyfieldval = $data['ximreqnum'];
						
					$data['bizid'] = Session::get('sbizid');
					$data['zemail'] = Session::get('suser');
					$data['ximreqnum'] = $keyfieldval;
					$data['xdate'] = $date;
					$data['xbranch'] = Session::get('sbranch');
					
					if($itemdetail){
						$rownum = $this->model->getRow("imreqdet","ximreqnum",$data['ximreqnum'],"xrow");

						$cols = "`bizid`,`ximreqnum`,`xrow`,`xitemcode`,`xqty`,`xdate`,`xrate`,`zemail`,`xyear`,`xper`,`xpur`";
						
						$vals = "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $rownum ."','". $data['xitemcode'] ."','". $data['xqty'] ."','". $date ."','". $data['xrate'] ."','". Session::get('suser') ."','". $xyear ."','". $month ."','". $data['xpur'] ."')";
						
							
						$success = $this->model->create($data, $cols, $vals);
					}else{

						$getreqdt = $this->model->getImreq($xvoucher);
						if($getreqdt){
							$comment = $getreqdt[0]['xcomment'];
						}
						if($getreqdt[0]['xstatus'] == "Canceled" && $data['xcomment'] != ""){
							$comment .= "</br><b>Modified by: </b>".Session::get('suser').", <b>Date: </b>".date('d-m-Y h:i:s A')."</br><b>Comment: </b>".$data['xcomment'];
						}

						$data['xcomment'] = $comment;
						$keyfieldval = $xvoucher;
						$success = $this->model->updateMst($data, $xvoucher);
					}
					
					
					if(empty($success))
						$success=0;
					
					
					}catch(Exception $e){
						
						$this->result = $e->getMessage();
						
					}
					
					if($success>0)
						$this->result = 'Purchase Requisition Created';
					
					if($success == 0 && empty($this->result))
						$this->result = "Failed to Create Purchase Requisition! Reason: Could be Duplicate Account Code or system error!";
					
					 $this->showentry($keyfieldval, $this->result);
					 
					 
					
			}
			
			public function editdistreq(){
				
				if (empty($_POST['ximreqnum'])){
						header ('location: '.URL.'distreq/distreqentry');
						exit;
					}
				$result = "";
				
				$hd = array();
				$dt = array();
				
					
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
					
				$success=false;
				$imreqnum = $_POST['ximreqnum'];
				$form = new Form();
					$data = array();
					
					try{
						$itemdetail = $this->model->getItemDetail("xitemcode", $_POST['xitemcode']);
						if(empty($itemdetail)){
							throw new Exception("Item not found!");
						}
						if($itemdetail[0]['xgitem'] != "Store"){
							throw new Exception("You are not permitted to add this item!");
						}
					
					
					$form	->post('xitemcode')
							->val('minlength', 1)
							->val('maxlength', 20)
											
					
							->post('xnote')
							->val('maxlength', 250)
							
							->post('xqty')
							
							->post('xrate')

							->post('xproject')
	
							->post('xpur')

							->post('xwh')

							->post('xcomment');
							
					$form	->submit();
					
				
					
					$data = $form->fetch();	
					//print_r($data);die;

					$getreqdt = $this->model->getImreq($imreqnum);
					if($getreqdt){
						$comment = $getreqdt[0]['xcomment'];
					}
					if($getreqdt[0]['xstatus'] == "Canceled" && $data['xcomment'] != ""){
						$comment .= "</br><b>Modified by: </b>".Session::get('suser').", <b>Date: </b>".date('d-m-Y h:i:s A')."</br><b>Comment: </b>".$data['xcomment'];
					}

					$data['xcomment'] = $comment;
					
									
					$hd = array (
						"xemail"=>Session::get('suser'),
						"zutime"=>date("Y-m-d H:i:s"),
						"xdate"=>$date,
						"xnote"=>$data['xnote'],
						"xproject"=>$data['xproject'],
						"xwh"=>$data['xwh'],
						"xcomment"=>$data['xcomment']
					);
					
					$dt = array (
						"xitemcode"=>$data['xitemcode'],
						"xqty"=>$data['xqty'],
						"xrate"=>$data['xrate'],
						"xpur"=>$data['xpur'],
						"xdate"=>$date,
					);
					
					$success = $this->model->edit($hd,$dt,$imreqnum,$_POST['xrow']);
					
					
					}catch(Exception $e){
						//echo $e->getMessage();die;
						$result = $e->getMessage();
						
					}
					if($result==""){
					if($success)
						$result = "Edited successfully";
					else
						$result = "Edit failed!";
					
					}
					
					 $this->showentry($imreqnum, $result);
					
			
			}
			
		public function showdistreq($reqnum, $row, $result=""){
			if($reqnum=="" || $row==""){
				header ('location: '.URL.'distreq/distreqentry');
				exit;
			}
			$tblvalues=array();
			$btn = array(
				"New" => URL."distreq/distreqentry"
			);
			
			$tblvalues = $this->model->getImreq($reqnum);
			$tbldtvals = $this->model->getSingleReqDt($reqnum, $row);
	
			$conf="";
			$sv="";
			$prevmodify = "";
			if(count($tblvalues)>0){	
				if($tblvalues[0]['xstatus']=="Created" || $tblvalues[0]['xstatus']=="Canceled"){
					$conf=array(URL."distreq/confirmpost", "Confirm");
					$sv=URL."distreq/editdistreq";
				}		
				if($tblvalues[0]['xstatus']=="Pending"){
					$sv="";
					$conf=array(URL."distreq/cancelpost", "Cancel");
				}
				$prevmodify = $tblvalues[0]['xcomment'];
			}
			
			if(empty($tblvalues))
				$tblvalues=$this->values;
			else
				$tblvalues=array(
						"xdate"=>$tblvalues[0]['xdate'],
						"ximreqnum"=>$tblvalues[0]['ximreqnum'],
						"xnote"=>$tblvalues[0]['xnote'],
						"xproject"=>$tblvalues[0]['xproject'],
						"xwh"=>$tblvalues[0]['xwh'],
						"xitemcode"=>$tbldtvals[0]['xitemcode'],
						"xitemdesc"=>$tbldtvals[0]['xitemdesc'],
						"xqty"=>$tbldtvals[0]['xqty'],
						"xunitstk"=>$tbldtvals[0]['xunitstk'],
						"xrow"=>$tbldtvals[0]['xrow'],
						"xrate"=>$tbldtvals[0]['xrate'],
						"xpur"=>$tbldtvals[0]['xpur'],
						"xcomment"=>""
						);
				
			// form data
			
				
			$dynamicForm = new Dynamicform("PO Requisition", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, "Update",$tblvalues, URL."distreq/showpost", $conf);
			
			$this->view->table = $this->renderTable($reqnum);
			$this->view->prevmodify = $prevmodify;
			$this->view->renderpage('distreq/distreqentry');
		}
			
			
			
		public function showentry($reqnum, $result=""){
			
			$tblvalues=array();
			$btn = array(
				"Clear" => URL."distreq/distreqentry"
			);
			
			$tblvalues = $this->model->getImreq($reqnum);
	
			$conf="";
			$sv="";
			$prevmodify = "";
			if(count($tblvalues)>0){	
				if($tblvalues[0]['xstatus']=="Created" || $tblvalues[0]['xstatus']=="Canceled"){
					$conf=array(URL."distreq/confirmpost", "Confirm");
					$sv=URL."distreq/savedistreq";
				}		
				if($tblvalues[0]['xstatus']=="Pending"){
					$sv="";
					$conf=array(URL."distreq/cancelpost", "Cancel");
				}
				$prevmodify = $tblvalues[0]['xcomment'];
			}
			
			if(empty($tblvalues))
				$tblvalues=$this->values;
			else
				$tblvalues=array(
						"xdate"=>$tblvalues[0]['xdate'],
						"ximreqnum"=>$tblvalues[0]['ximreqnum'],
						"xnote"=>$tblvalues[0]['xnote'],
						"xwh"=>$tblvalues[0]['xwh'],
						"xitemcode"=>"",
						"xitemdesc"=>"",
						"xqty"=>"0",
						"xunitstk"=>"",
						"xrow"=>"0",
						"xrate"=>"0",
						"xproject"=>$tblvalues[0]['xproject'],
						"xpur"=>"",
						"xcomment"=>""
						);
				
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("PO Requisition", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, "Save",$tblvalues ,URL."distreq/showpost", $conf);
			
			$this->view->table = $this->renderTable($reqnum);
			$this->view->prevmodify = $prevmodify;
			$this->view->renderpage('distreq/distreqentry');
		}
			
		function renderTable($imreqnum){
			$tblvalues = $this->model->getImreq($imreqnum);

			$row = $this->model->getimreqdt($imreqnum);
			$delbtn = "";
			if(count($tblvalues)>0){
			if($tblvalues[0]["xstatus"]=="Created" || $tblvalues[0]["xstatus"]=="Canceled")
				$delbtn = URL."distreq/deldistreq/".$imreqnum."/";
			}
			
			$table = '<table class="table table-striped table-bordered">';
				$table .='<thead>
							<th></th><th></th><th>Sl.</th><th>Itemcode</th><th>Description</th><th style="text-align:right">Rate</th><th style="text-align:right">Qty</th><th>UOM</th><th style="text-align:right">Total</th>
						</thead>';
						$totalqty = 0;
						$total = 0;
						$totaltax = 0;
						$totaldisc = 0;
						$table .='<tbody>';

						foreach($row as $key=>$val){
							$showurl =  URL."distreq/showdistreq/".$imreqnum."/".$val['xrow'];
							$table .='<tr>';
							
							$table.='<td><a class="btn btn-info" id="btnshow" href="'.$showurl.'" role="button">Show</a></td>';
							if($delbtn!="")
								$table.='<td><a id="delbtn" class="btn btn-danger" href="'.$delbtn."/".$val['xrow'].'" role="button">Delete</a></td>';
							else
								$table.='<td></td>';

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
							$table .='<tr><td align="right" colspan="6"><strong>Total</strong></td><td align="right"><strong>'.$totalqty.'</strong></td><td></td><td align="right"><strong>'.$total.'</strong></td></tr>';
									
					$table .="</tbody>";			
			$table .= "</table>";
			
			return $table;
				
				
		}		
			
		function imreqlist($status){
			$rows = $this->model->getImreqList($status);
			$cols = array("xdate-Date","ximreqnum-Requisition No","xappstatus-Pending Level","zemail-Create By","xemail-Purpose","xcomment-Approve/Cancel By");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "ximreqnum",URL."distreq/showentry/");
			$this->view->renderpage('distreq/distreqlist', false);
		}
			
		function distreqentry(){
					
			$btn = array(
				"Clear" => URL."distreq/distreqentry"
			);
	
			// form data
			
			$dynamicForm = new Dynamicform("Requisition",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distreq/savedistreq", "Save",$this->values, URL."distreq/showpost");
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('distreq/distreqentry', false);
		}
			
			
		public function showpost(){
		
			$imreqnum = $_POST['ximreqnum'];
			$result = "";
				
			$tblvalues=array();
			
			$btn = array(
				"New" => URL."distreq/distreqentry"
			);
			
			$tblvalues = $this->model->getImreq($imreqnum);
	
			$conf="";
			$sv="";
			$prevmodify = "";
			if(count($tblvalues)>0){	
				if($tblvalues[0]['xstatus']=="Created"){
					$conf=array(URL."distreq/confirmpost", "Confirm");
					$sv=URL."distreq/savedistreq";
					$result='Created!<br/><a style="color:red" id="invnum" href="'.URL.'distreq/showquot/'.$imreqnum.'">Click To Print Requisition - '.$imreqnum.'</a>';
				}		
				if($tblvalues[0]['xstatus']=="Pending"){
					$sv="";
					$conf=array(URL."distreq/cancelpost", "Cancel");
					$result='Pending!<br/><a style="color:red" id="invnum" href="'.URL.'distreq/showquot/'.$imreqnum.'">Click To Print Requisition - '.$imreqnum.'</a>';
				}		
				if($tblvalues[0]['xstatus']=="Confirmed"){
					$sv="";
					$conf=array(URL."distreq/cancelpost", "Cancel");
					$result='Confirmed!<br/><a style="color:red" id="invnum" href="'.URL.'distreq/showquot/'.$imreqnum.'">Click To Print Requisition - '.$imreqnum.'</a>';
				}
				$prevmodify = $tblvalues[0]['xcomment'];
			}
			
			if(empty($tblvalues))
				$tblvalues=$this->values;
			else
				$tblvalues=array(
						"xdate"=>$tblvalues[0]['xdate'],
						"ximreqnum"=>$tblvalues[0]['ximreqnum'],
						"xnote"=>$tblvalues[0]['xnote'],
						"xwh"=>$tblvalues[0]['xwh'],
						"xitemcode"=>"",
						"xitemdesc"=>"",
						"xqty"=>"0",
						"xrow"=>"0",
						"xrate"=>"0",
						"xunitstk"=>"",
						"xproject"=>$tblvalues[0]['xproject'],
						"xpur"=>"",
						"xcomment"=>""
						);
				
			$dynamicForm = new Dynamicform("Requisition", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, "Save",$tblvalues, URL."distreq/showpost", $conf);
			
			$this->view->table = $this->renderTable($imreqnum);
			$this->view->prevmodify = $prevmodify;
			$this->view->renderpage('distreq/distreqentry');
		}
			
	
		function deldistreq($imreqnum, $rw){

			$where = " where bizid=".Session::get('sbizid')." and ximreqnum='".$imreqnum."' and xrow=".$rw;

			$result = $this->model->dbdelete($where);
			
			$this->showentry($imreqnum, "Deleted Successfully!");
			
		}
	
		function confirmpost(){
				
			$status = "Confirmed";
			$appstatus = "1st Approval";
			$reqnum = $_POST['ximreqnum'];
			
			//$approval = $this->model->getApproval();
			// print_r($approval);die;
			
			// if(!empty($approval)){
			// 	$status = "Pending";
			// 	$appstatus = $approval[0]['xstatus'];
			// }
							
			$where = " bizid = ". Session::get('sbizid') ." and ximreqnum = '". $reqnum ."'";

			$tblvalues=array();
			$tblvalues =  $this->model->getImreq($reqnum);
			if($tblvalues[0]['xappstatus']){
				$appstatus = $tblvalues[0]['xappstatus'];
			}
			$postdata=array(
				"xstatus" => "Pending",
				"xdept" => Session::get('srole'),
				"xappstatus" => $appstatus,
				);	
			
			$this->model->confirm($postdata,$where);
			
			$result="Confirm Failed";
			
			if($tblvalues[0]['xstatus'] != "Created"){
				$result='Confirmed!<br/><a style="color:red" id="invnum" href="'.URL.'distreq/showquot/'.$reqnum.'">Click To Print PO Requisition - '.$reqnum.'</a>';
			}
			$this->showentryforconfirm($reqnum, $result);
		
		}
			
		public function showentryforconfirm($reqnum, $result=""){
			
			$tblvalues=array();
			$btn = array(
				"Clear" => URL."distreq/distreqentry"
			);
			
			$tblvalues = $this->model->getImreq($reqnum);

			$conf="";
			$sv="";
			$prevmodify = "";
			if(count($tblvalues)>0){	
				if($tblvalues[0]['xstatus']=="Created" || $tblvalues[0]['xstatus']=="Canceled"){
					$conf=array(URL."distreq/confirmpost", "Confirm");
					$sv=URL."distreq/savedistreq";
				}		
				if($tblvalues[0]['xstatus']=="Pending"){
					$sv="";
					$conf=array(URL."distreq/cancelpost", "Cancel");
				}
				$prevmodify = $tblvalues[0]['xcomment'];
			}
			
			if(empty($tblvalues))
				$tblvalues=$this->values;
			else
				$tblvalues=array(
						"xdate"=>$tblvalues[0]['xdate'],
						"ximreqnum"=>$tblvalues[0]['ximreqnum'],
						"xnote"=>$tblvalues[0]['xnote'],
						"xwh"=>$tblvalues[0]['xwh'],
						"xitemcode"=>"",
						"xitemdesc"=>"",
						"xqty"=>"0",
						"xunitstk"=>"",
						"xrow"=>"0",
						"xrate"=>"0",
						"xproject"=>$tblvalues[0]['xproject'],
						"xpur"=>"",
						"xcomment"=>""
						);
			
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("PO Requisition", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, "Save",$tblvalues ,URL."distreq/showpost", $conf);

			//send mail
			// 	$approval = $this->model->getApproval("Purchase Requisition");
			// 	if(!empty($approval)){
			// 		$res = "";
			// 		$sendMails = $this->model->getMails("Purchase Requisition", $approval[0]['xstatus']);
			// 		$mailer = new Mailer();
			// 		$messagae = '<h4>Txn No : '.$reqnum.'</h4></br><p>To Approve this Purchase Requisition <a href="'.URL.'impurapproval/showreq/'.$reqnum.'">Click Here</a></p>';
			// 		$emails = "";
			// 		if(!empty($sendMails)){
			// 			foreach($sendMails as $key=>$value){
			// 				$emails .= $value['zaltemail'].",";	
			// 			}
			// 			$emails = rtrim($emails,",");
			// 		}
			// 		$res = $mailer->sendbyemail($emails, "Purchase Requisition Submited by ".Session::get('suser'), $messagae, "");
			// 	}
				//end send mail
			
			$this->view->table = $this->renderTable($reqnum);
			$this->view->prevmodify = $prevmodify;
			$this->view->renderpage('distreq/distreqentry');
		}
	
		function cancelpost(){
				
			$reqnum = $_POST['ximreqnum'];
			
							
			$where = " bizid = ". Session::get('sbizid') ." and ximreqnum = '". $reqnum ."'";
			
			$postdata=array(
				"xstatus" => "Deleted"
				);	
			
			$this->model->confirm($postdata,$where);
			$tblvalues=array();
			$tblvalues =  $this->model->getImreq($reqnum);
			
			$result="Cancel Failed";
			
			if($tblvalues[0]['xstatus']=="Deleted"){
				$result='PO Requisition Canceled!<br/><a style="color:red" id="invnum" href="'.URL.'distreq/showquot/'.$reqnum.'">Click To Print PO Requisition - '.$reqnum.'</a>';
			}
			$this->showentry($reqnum, $result);
		}
			
		function showquot($reqnum=""){

			$tblvalues = $this->model->getReq($reqnum);
			$this->view->reqmst = $this->model->getImreq($reqnum);
			//print_r($tblvalues);
			$this->view->xdate = $tblvalues[0]["xdate"];
			$this->view->xtype = "Store";
			$this->view->reqnum = $reqnum;
			$this->view->xproject = $tblvalues[0]["xproject"];
			
			$this->view->table = $this->renderTableForPrint($reqnum);
			
			$this->view->renderpage('distreq/quotation');
		}
					
		function renderTableForPrint($imreqnum){
			$tblvalues = $this->model->getImreq($imreqnum);

			$row = $this->model->getimreqdt($imreqnum);
			$delbtn = "";
			if(count($tblvalues)>0){
			if($tblvalues[0]["xstatus"]=="Created" || $tblvalues[0]["xstatus"]=="Canceled")
				$delbtn = URL."distreq/deldistreq/".$imreqnum."/";
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
							$showurl =  URL."distreq/showdistreq/".$imreqnum."/".$val['xrow'];
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

		function getStoreReq($txnnum){
			echo json_encode($this->model->getImreq($txnnum));	
		}
}