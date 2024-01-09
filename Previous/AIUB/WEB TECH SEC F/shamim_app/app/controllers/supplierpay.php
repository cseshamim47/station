<?php
class Supplierpay extends Controller{
	
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
			if($menus["xsubmenu"]=="Supplier Payment")
				$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/supplierpay/js/codevalidator.js','views/supplierpay/js/getaccdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"xtxnnum"=>"",
			"xsup"=>"",
			"xorg"=>"",
			"xgrnnum"=>"",
			"xpobal"=>"0.00",
			"xamount"=>"0.00",
			"xnote"=>"",
			"xprepay"=>"0.00",
			"xcomment"=>""
			);
			
			$this->fields = array(
				array(
					"xtxnnum-text"=>'Txn No_maxlength="20"',
					"xdate-datepicker" => 'Date_""'
					),
				array(
					"xgrnnum-group_".URL."jsondata/grnpicklist"=>'GRN Number*~star_maxlength="20"',
					"xpobal-text"=>'GRN Balance_maxlength="50" readonly'		
					),
				array(
					"xsup-group_".URL."jsondata/supplierpicklist"=>'Supplier ID*~star_maxlength="20"',
					"xorg-text"=>'Org_maxlength="500" readonly'
					),
				array(
					"xamount-text_number"=>'Pay Amount*~star_number="true" minlength="1" maxlength="18" required',
					"xprepay-text"=>'Update Pay_maxlength="50" readonly'
					),
				array(
					"xnote-textarea"=>'Description_maxlength="500"'
					),
				array(
					"xcomment-textarea"=>'Modify Comment_maxlength="500"'
					),
				);	
		}
		
		public function index(){
			$this->view->rendermainmenu('supplierpay/index');
		}
		
		public function savesales(){	
			$xdate = $_POST['xdate'];
			$dt = str_replace('/', '-', $xdate);
			$date = date('Y-m-d', strtotime($dt));
			$keyfieldval="0";
			$form = new Form();
			$data = array();
			$success=0;
			$result = "";
			try{
			
			
				$form	->post('xgrnnum')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xsup')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xamount')

						->post('xprepay')

						->post('xnote')
						->val('maxlength', 300)
						
						->post('xpobal')

						->post('xcomment');
						
				$form	->submit();
				
				$data = $form->fetch();
				$keyfieldval = $this->model->getKeyValue("supplierpay","xtxnnum","SPAY-","5");
					
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['xtxnnum'] = $keyfieldval;
				$data['xdate'] = $date;			
					
				$grn = $this->model->getgrn($data['xgrnnum']);
				if(!empty($grn)){
					$grnbal = $this->model->getGrnBal($data['xgrnnum']);
					if($grnbal[0]['xgrnbal']>=$data['xamount']){
						$success = $this->model->create($data);
					}else{
						$this->result = "Failed to Create Supplier Payment! Paid amount is greater than balance";
					}
				}else{
					$this->result = "Failed to Create Supplier Payment! GRN not found";
				}
				
				if(empty($success))
					$success=0;

			}catch(Exception $e){
				$this->result = $e->getMessage();
			}
			
			if($success>0)
				$this->result = 'Supplier Payment Created<br><a style="color:red" id="invnum" href="'.URL.'supplierpay/showinvoice/'.$keyfieldval.'">Click To Print Supplier Payment - '.$keyfieldval.'</a>';
			
			if($success == 0 && empty($this->result))
				$this->result = "Failed to Create Supplier Payment! Reason: Could be Duplicate Account Code or system error!";
			
				$this->showentry($keyfieldval, $this->result);
		}
		
		public function editsales(){
			$result = "";
			$comment = "";
			$dt = array();
			
			$xdate = $_POST['xdate'];
			$dt = str_replace('/', '-', $xdate);
			$date = date('Y-m-d', strtotime($dt));
			
			$success=false;
			$txnnum = $_POST['xtxnnum'];
			$form = new Form();
			$data = array();
			
			try{
				$form	->post('xgrnnum')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xsup')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xamount')

						->post('xprepay')

						->post('xnote')
						->val('maxlength', 300)
						
						->post('xpobal')

						->post('xcomment');
					
				$form	->submit();
				$data = $form->fetch();	
				
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
				$data['xdate'] = $date;

				$getsuppay = $this->model->getSupplierPay($txnnum);
				if($getsuppay){
					$comment = $getsuppay[0]['xcomment'];
				}
				if($getsuppay[0]['xstatus'] == "Canceled" && $data['xcomment'] != ""){
					$comment .= "</br><b>Modified by: </b>".Session::get('suser').", <b>Date: </b>".date('d-m-Y h:i:s A')."</br><b>Comment: </b>".$data['xcomment'];
				}

				$data['xcomment'] = $comment;
				$grn = $this->model->getgrn($data['xgrnnum']);
				if(!empty($grn)){
					$grnbal = $this->model->getGrnBal($data['xgrnnum']);
					if($grnbal[0]['xgrnbal']>=$data['xamount']){
						$success = $this->model->edit($data, $txnnum);
					}else{
						$result = "Edit failed!! Paid amount greater is than balance";
					}
				}else{
					$result = "Edit failed!! GRN not found";
				}

				
			}catch(Exception $e){
				$result = $e->getMessage();
			}
			if($result==""){
				if($success)
					$result = 'Edited Successfully<br><a style="color:red" id="invnum" href="'.URL.'supplierpay/showinvoice/'.$txnnum.'">Click To Print Supplier Payment - '.$txnnum.'</a>';
				else
					$result = "Edit failed!";
			}			
			$this->showentry($txnnum, $result);
		}
		
		
		
	public function showentry($txnnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."supplierpay/salesentry"
		);
		
		$tblvalues = $this->model->getSupplierPay($txnnum);
		
		$conf="";
		$sv="";
		$svbtn = "Edit";
		$prevmodify = "";
		if(count($tblvalues)>0){
			if($tblvalues[0]['xstatus']=="Created" || $tblvalues[0]['xstatus']=="Canceled"){
				$conf=array(URL."supplierpay/confirmpost", "Confirm");
				$sv=URL."supplierpay/editsales/";
			}else if($tblvalues[0]['xstatus']=="Pending"){
				$sv="";
				$conf=array(URL."supplierpay/cancelpost", "Cancel");
			}
			$prevmodify = $tblvalues[0]['xcomment'];
		}
		if(empty($tblvalues)){
			$tblvalues=$this->values;
			$svbtn = "Save";
			$sv = URL."supplierpay/savesales";
		}else{
			$tblvalues=array(
				"xdate"=>$tblvalues[0]['xdate'],
				"xtxnnum"=>$tblvalues[0]['xtxnnum'],
				"xpobal"=>$tblvalues[0]['xpobal'],
				"xprepay"=>$tblvalues[0]['xprepay'],
				"xnote"=>$tblvalues[0]['xnote'],
				"xgrnnum"=>$tblvalues[0]['xgrnnum'],
				"xsup"=>$tblvalues[0]['xsup'],
				"xorg"=>$tblvalues[0]['xorg'],
				"xamount"=>$tblvalues[0]['xamount'],
				"xcomment"=>""
			);
		}
					
		if($result=="")
			$result = 'Supplier Payment Created<br><a style="color:red" id="invnum" href="'.URL.'supplierpay/showinvoice/'.$txnnum.'">Click To Print Supplier Payment - '.$txnnum.'</a>';
		
		//$this->view->balance = $this->model->getBalance("");
		//print_r($tblvalues); die;
		$dynamicForm = new Dynamicform("Supplier Payment", $btn, $result);		
		
		$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, $svbtn, $tblvalues ,URL."supplierpay/showpost",$conf);
		
		$this->view->tablegrn = $this->renderGrnTable($tblvalues['xgrnnum']);
		$this->view->table = $this->renderTable($tblvalues['xgrnnum']);
		$this->view->prevmodify = $prevmodify;
		
		$this->view->renderpage('supplierpay/salesentry');
	}
		
	public function showgrnentry($grnnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."supplierpay/salesentry"
		);
		$prevmodify = "";
		$tblvalues = $this->model->getGrnBalDt($grnnum);
		//print_r($tblvalues);die;
		
		if(empty($tblvalues)){
			$tblvalues=$this->values;
		}else{
			$tblvalues=array(
				"xdate"=>"",
				"xtxnnum"=>"",
				"xpobal"=>$tblvalues[0]['xgrnbal'],
				"xprepay"=>$tblvalues[0]['xprepay'],
				"xnote"=>"",
				"xgrnnum"=>$tblvalues[0]['xgrnnum'],
				"xsup"=>$tblvalues[0]['xsup'],
				"xorg"=>$tblvalues[0]['xorg'],
				"xamount"=>"0.00",
				"xcomment"=>""
			);

			$prevmodify = $tblvalues[0]['xcomment'];
		}
					
		$dynamicForm = new Dynamicform("Supplier Payment", $btn, $result);		
		
		$this->view->dynform = $dynamicForm->createForm($this->fields, URL."supplierpay/savesales", "Save",$tblvalues, URL."supplierpay/showpost");
		
		$this->view->tablegrn = $this->renderGrnTable($tblvalues['xgrnnum']);
		$this->view->table = $this->renderTable($tblvalues['xgrnnum']);
		$this->view->prevmodify = $prevmodify;
		$this->view->renderpage('supplierpay/salesentry');
	}
		
		function renderTable($ponum){
						
			$delbtn = "";
			$row = $this->model->getPayListByPO($ponum);
			
			$table = '<table class="table table-striped table-bordered">';
				$table .='<thead>
							<th></th><th>Date</th><th>Txn No</th><th>GRN Number</th><th>Project</th><th>GRN Balance</th><th>Supplier ID</th><th>Org</th><th>Amount</th>
						</thead>';
						$total = 0;
						$table .='<tbody>';

						foreach($row as $key=>$val){
							$showurl = URL."supplierpay/showentry/".$val['xtxnnum'];
							$table .='<tr>';
							
							$table.='<td><a class="btn btn-info" id="btnshow" href="'.$showurl.'" role="button">Show</a></td>';
							// if($val['xstatus']=="Created")
							// 	$table.='<td><a id="delbtn" class="btn btn-danger" href="'.URL.'supplierpay/deletesales/'.$val['xtxnnum'].'" role="button">Delete</a></td>';
							// else
							// 	$table.='<td></td>';

								$table .= "<td>".$val['xdate']."</td>";
								$table .= "<td>".$val['xtxnnum']."</td>";
								$table .= "<td>".$val['xgrnnum']."</td>";
								$table .= "<td>".$val['xproj']."</td>";
								$table .='<td>'.$val['xpobal'].'</td>';		
								$table .='<td>'.$val['xsup'].'</td>';
								$table .='<td>'.$val['xorg'].'</td>';
								$table .='<td align="right">'.$val['xamount'].'</td>';
								$total+=$val['xamount'];
								
							$table .="</tr>";
						}
							$table .='<tr><td align="right" colspan="7"><strong>Total</strong></td>
							<td align="right"><strong>'.$total.'</strong></td></tr>';
							 	
					$table .="</tbody>";			
			$table .= "</table>";
			
			return $table;
			
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
								$table .='<td align="right">'.$val['xratepur'].'</td>';		
								$table .='<td align="right">'.$val['xqtypur'].'</td>';
								$table .='<td>'.$val['xunitstk'].'</td>';
								$table .='<td align="right">'.$val['xtotaltax'].'</td>';
								//$table .='<td align="right">'.$val['xdisctotal'].'</td>';
								$subtotal = $val['xtotal']+$val['xtotaltax']-$val['xtotaldisc'];
								$table .='<td align="right">'.$subtotal.'</td>';
								$total+=$subtotal;
								$totalqty+=	$val['xqtypur'];
								$totaltax +=$val['xtotaltax'];
								//$totaldisc+= $val['xdisctotal'];
								
							$table .="</tr>";
						}
							$table .='<tr><td align="right" colspan="4"><strong>Total</strong></td><td align="right"><strong>'.$totalqty.'</strong></td><td></td><td align="right"><strong>'.$totaltax.'</strong></td><td align="right"><strong>'.$total.'</strong></td></tr>';
							 	
					$table .="</tbody>";			
			$table .= "</table>";
			
			return $table;
		}
		
		function solist($status){
			$rows = $this->model->getSalesList($status);
			$cols = array("xdate-Date","xtxnnum-Txn No","xgrnnum-GRN Number","xproj-Project","xpobal-GRN Balance","xsup-Supplier ID","xorg-Org","xamount-Amount");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xtxnnum",URL."supplierpay/showentry/");
			$this->view->renderpage('supplierpay/solist', false);
		}

		function salesentry(){

		$btn = array(
			"Clear" => URL."supplierpay/salesentry"
		);
			
					
			$dynamicForm = new Dynamicform("Supplier Payment",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."supplierpay/savesales", "Save",$this->values, URL."supplierpay/showpost");
			
			$this->view->tablegrn = $this->renderGrnTable("");
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('supplierpay/salesentry', false);
		}
		
		
		public function showpost(){
			$txnnum = $_POST['xtxnnum'];
			$grnnum = $_POST['xgrnnum'];

			if ($txnnum != "") {
				$this->showentry($txnnum);
			}elseif($grnnum != ""){
				$this->showgrnentry($grnnum);
			}

			
		}
				
		function confirmpost(){
			$txnnum = $_POST['xtxnnum'];
			$result = "";
			$success = 0;
			$status = "Confirmed";
			$appstatus = "Confirmed";
			$approval = $this->model->getApproval();
			if(!empty($approval)){
				$status = "Pending";
				$appstatus = $approval[0]['xstatus'];
			}
			$tblvalues = $this->model->getSupplierPay($txnnum);
			if($tblvalues[0]['xappstatus']){
				$appstatus = $tblvalues[0]['xappstatus'];
			}
			$postdata=array(
				"xstatus" => $status,
				"xdept" => Session::get('srole'),
				"xappstatus" => $appstatus
			);				
			$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '". $txnnum ."'";

			$success = $this->model->confirm($postdata,$where);

			if($success){
				$result = 'Confirmed!<br><a style="color:red" id="invnum" href="'.URL.'supplierpay/showinvoice/'.$txnnum.'">Click To Print Supplier Payment - '.$txnnum.'</a>';
			}else{
				$result="Confirm Failed";
			}

			$this->showentryForConfirm($txnnum, $result);
		}

		public function showentryForConfirm($txnnum, $result=""){
		
			$tblvalues=array();
			$btn = array(
				"Clear" => URL."supplierpay/salesentry"
			);
			
			$tblvalues = $this->model->getSupplierPay($txnnum);
			$prevmodify = "";
			$conf="";
			$sv="";
			$svbtn = "Edit";
			if(count($tblvalues)>0){	
				if($tblvalues[0]['xstatus']=="Created"){
					$conf=array(URL."supplierpay/confirmpost", "Confirm");
					$sv=URL."supplierpay/editsales/";
				}		
				if($tblvalues[0]['xstatus']!="Confirmed" && $tblvalues[0]['xstatus']!="Created"){
					$sv="";
					$conf=array(URL."supplierpay/cancelpost", "Cancel");
				}
				$prevmodify = $tblvalues[0]['xcomment'];
			}
			if(empty($tblvalues)){
				$tblvalues=$this->values;
			}else{
				$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xtxnnum"=>$tblvalues[0]['xtxnnum'],
					"xpobal"=>$tblvalues[0]['xpobal'],
					"xprepay"=>$tblvalues[0]['xprepay'],
					"xnote"=>$tblvalues[0]['xnote'],
					"xgrnnum"=>$tblvalues[0]['xgrnnum'],
					"xsup"=>$tblvalues[0]['xsup'],
					"xorg"=>$tblvalues[0]['xorg'],
					"xamount"=>$tblvalues[0]['xamount'],
					"xcomment"=>""
				);
			}
				
						
			if($result=="")
				$result = 'Supplier Payment Created<br><a style="color:red" id="invnum" href="'.URL.'supplierpay/showinvoice/'.$txnnum.'">Click To Print Supplier Payment - '.$txnnum.'</a>';
			
			//$this->view->balance = $this->model->getBalance("");
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Supplier Payment", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, $svbtn,$tblvalues ,URL."supplierpay/showpost",$conf);
			//send mail
			// $approval = $this->model->getApproval("Supplier Payment");
			// if(!empty($approval)){
			// 	$res = "";
			// 	$sendMails = $this->model->getMails("Supplier Payment", $approval[0]['xstatus']);
			// 	$mailer = new Mailer();
			// 	$messagae = '<h4>Txn No : '.$txnnum.'</h4></br><p>To Approve this Supplier Payment <a href="'.URL.'supayapproval/showreq/'.$txnnum.'">Click Here</a></p>';
			// 	$emails = "";
			// 	if(!empty($sendMails)){
			// 		foreach($sendMails as $key=>$value){
			// 			$emails .= $value['zaltemail'].",";	
			// 		}
			// 		$emails = rtrim($emails,",");
			// 	}
			// 	$res = $mailer->sendbyemail($emails, "Supplier Payment Submited by ".Session::get('suser'), $messagae, "");
			// }
			//end send mail
			$this->view->tablegrn = $this->renderGrnTable($tblvalues['xgrnnum']);
			$this->view->table = $this->renderTable($tblvalues['xgrnnum']);
			$this->view->prevmodify = $prevmodify;
			$this->view->renderpage('supplierpay/salesentry');
		}

		function cancelpost(){
			$txnnum = $_POST['xtxnnum'];
			$result = "";
			$postdata=array(
				"xstatus" => "Deleted"
				);				
			$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '". $txnnum ."'";

			$this->model->confirm($postdata,$where);
			
			$tblvalues=array();
			$tblvalues = $this->model->getSupplierPay($txnnum);
			
			$result="Cancel Failed";
			
			if($tblvalues[0]['xstatus']=="Canceled"){
				$result = 'Payment Cancel Done';
			}
			$this->showentry($txnnum, $result);
		
		}

		function deletesales($txnnum){
			$tblvalues = $this->model->getSupplierPay($txnnum);
			$result = "Deleted Successful";
			if(count($tblvalues)>0){
			if($tblvalues[0]["xstatus"]=="Created")
				$result = $this->model->recdelete(" where xtxnnum='".$txnnum."'");
			}
			$this->showentry($txnnum, $result);
		}
		function showinvoice($txnnum){
			
			$this->view->reqmst = $this->model->getSupplierPay($txnnum);
			
			$this->view->renderpage('supplierpay/printinvoice');		
		}

		function getSupPay($txnnum){
			echo json_encode($this->model->getSupplierPay($txnnum));	
		}
}