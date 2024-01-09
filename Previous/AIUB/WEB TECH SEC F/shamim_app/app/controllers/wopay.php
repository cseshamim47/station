<?php
class Wopay extends Controller{
	
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
			if($menus["xsubmenu"]=="Work Order Payment")
				$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/wopay/js/codevalidator.js','views/wopay/js/getaccdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"xtxnnum"=>"",
			"toname"=>"",
			"toorg"=>"",
			"wonum"=>"",
			"xwobal"=>"0.00",
			"xamount"=>"0.00",
			"xnote"=>"",
			"xprepay"=>"0.00",
			"xproject"=>"",
			"xcomment"=>"",
			"xdescription"=>"",
			"xqty"=>"1",
			"xunit"=>"0",
			"xprice"=>"0",
			"xremarks"=>""
			);
			
			$this->fields = array(
						array(
							"xtxnnum-text"=>'Txn No_maxlength="20" placeholder="It will be created automatically.." readonly',
							"xdate-datepicker" => 'Date_""'
							),
						array(
							"wonum-group_".URL."jsondata/wopicklist"=>'Work Order Number*~star_maxlength="20" readonly',
							"xwobal-text"=>'Total Work Order (TK)_maxlength="50" readonly'		
							),
						array(
							"toname-text"=>'To Name_maxlength="500" readonly',
							"toorg-text"=>'To Org_maxlength="500" readonly'
							),
						array(
							"xproject-text"=>'Project_maxlength="500" readonly',
							"xprepay-text"=>'Update Pay_maxlength="50" readonly'
							),
						array(
							"xamount-text_number"=>'Pay Amount*~star_number="true" minlength="1" maxlength="18" required'
							),
						array(
							"xnote-textarea"=>'Note_maxlength="5000"'
							),
						array(
							"xcomment-textarea"=>'Modify Comment_maxlength="500"'
							),
						array(
							"Payment Details-div"=>''													
							),
						array(
							"xdescription-textarea"=>'Description_maxlength="500"'
							),
						array(
							"xqty-text_number"=>'Quantity_number="true" minlength="1" maxlength="18"',
							"xprice-text_number"=>'Price_number="true" minlength="1" maxlength="18"',
							),
						array(
							"xunit-text"=>'Unit_maxlength="50"'
							),
						array(
							"xremarks-textarea"=>'Remarks_maxlength="300"'
							),
						);	
	}
		
	public function index(){
		$this->view->rendermainmenu('wopay/index');
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
		$cols = "";
		$vals = "";

		try{
		
			$form	->post('xtxnnum')

					->post('wonum')
					->val('minlength', 1)
					->val('maxlength', 20)
					
					->post('toname')
					
					->post('xproject')
					
					->post('xprepay')
					
					->post('xnote')
					
					->post('xamount')
					
					->post('xwobal')

					->post('xdescription')

					->post('xqty')

					->post('xunit')

					->post('xprice')

					->post('xremarks');
					
			$form	->submit();
			
			$data = $form->fetch();
			if($data['xtxnnum'] == ""){
				$keyfieldval = $this->model->getKeyValue("wopay","xtxnnum","WPAY-","5");
			}else{
				$keyfieldval = $data['xtxnnum'];
			}
				
				
			$data['bizid'] = Session::get('sbizid');
			$data['zemail'] = Session::get('suser');
			$data['xtxnnum'] = $keyfieldval;
			$data['xdate'] = $date;
			$data['xamt'] = $data['xqty']*$data['xprice'];
			
			if($data['xdescription']){
				$cols = "`zemail`,`xdate`,`xtxnnum`,`xdescription`,`xqty`,`xunit`,`xprice`,`xamount`,`xremarks`";
				$vals = "('". Session::get('suser') ."','". $data['xdate'] ."','". $keyfieldval ."','". $data['xdescription'] ."','". $data['xqty'] ."','". $data['xunit'] ."','". $data['xprice'] ."','". $data['xamt'] ."','". $data['xremarks'] ."')";
			}
				
			$success = $this->model->create($data, $cols, $vals);
			
			if(empty($success))
				$success=0;

		}catch(Exception $e){
			$this->result = $e->getMessage();
		}
		
		if($success>0)
			$this->result = 'Work Order Payment Created<br><a style="color:red" id="invnum" href="'.URL.'wopay/showinvoice/'.$keyfieldval.'">Click To Print Work Order Payment - '.$keyfieldval.'</a>';
		
		if($success == 0 && empty($this->result))
			$this->result = "Failed to Create Work Order Payment! Reason: Could be Duplicate Account Code or system error!";
		
		$this->showentry($keyfieldval, $this->result);
	}
		
	public function editsales(){
		$result = "";
		$cols = "";
		$vals = "";
		$dt = array();
		
		$xdate = $_POST['xdate'];
		$dt = str_replace('/', '-', $xdate);
		$date = date('Y-m-d', strtotime($dt));
		
		$success=false;
		$txnnum = $_POST['xtxnnum'];
		$form = new Form();
		$data = array();
		
		try{
			$form	->post('xtxnnum')

					->post('wonum')
					->val('minlength', 1)
					->val('maxlength', 20)
					
					->post('toname')
					
					->post('xproject')
					
					->post('xprepay')
					
					->post('xnote')
					
					->post('xamount')
					
					->post('xwobal')

					->post('xcomment')
					
					->post('xdescription')

					->post('xqty')

					->post('xunit')

					->post('xprice')

					->post('xremarks');
				
			$form	->submit();
			$data = $form->fetch();	
			
			$data['bizid'] = Session::get('sbizid');
			$data['xemail'] = Session::get('suser');
			$data['zutime'] = date("Y-m-d H:i:s");
			$data['xdate'] = $date;
			$data['xamt'] = $data['xqty']*$data['xprice'];

			if($data['xdescription']){
				$cols = "`zemail`,`xdate`,`xtxnnum`,`xdescription`,`xqty`,`xunit`,`xprice`,`xamount`,`xremarks`";
				$vals = "('". Session::get('suser') ."','". $data['xdate'] ."','". $txnnum ."','". $data['xdescription'] ."','". $data['xqty'] ."','". $data['xunit'] ."','". $data['xprice'] ."','". $data['xamt'] ."','". $data['xremarks'] ."')";
			}

			$getsuppay = $this->model->getSupplierPay($txnnum);
			if($getsuppay){
				$comment = $getsuppay[0]['xcomment'];
			}
			if($getsuppay[0]['xstatus'] == "Canceled" && $data['xcomment'] != ""){
				$comment .= "</br><b>Modified by: </b>".Session::get('suser').", <b>Date: </b>".date('d-m-Y h:i:s A')."</br><b>Comment: </b>".$data['xcomment'];
			}

			$data['xcomment'] = $comment;

			$success = $this->model->edit($data, $cols, $vals);
		}catch(Exception $e){
			$result = $e->getMessage();
		}
		if($result==""){
			if($success)
				$result = 'Updated Successfully<br><a style="color:red" id="invnum" href="'.URL.'wopay/showinvoice/'.$txnnum.'">Click To Print Work Order Payment - '.$txnnum.'</a>';
			else
				$result = "Edit failed!";
		}			
		$this->showentry($txnnum, $result);
	}
		
	public function showentry($txnnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."wopay/salesentry"
		);
		
		$tblvalues = $this->model->getSupplierPay($txnnum);
		$prevmodify = "";
		$conf="";
		$sv="";
		$svbtn = "Save";
		if(count($tblvalues)>0){	
			if($tblvalues[0]['xstatus']=="Created" || $tblvalues[0]['xstatus']=="Canceled"){
				$conf=array(URL."wopay/confirmpost", "Confirm");
				$sv=URL."wopay/editsales/";
			}else if($tblvalues[0]['xstatus']=="Pending"){
				$sv="";
				$conf=array(URL."wopay/cancelpost", "Cancel");
			}
			$prevmodify = $tblvalues[0]['xcomment'];
		}
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
				"xdate"=>$tblvalues[0]['xdate'],
				"xtxnnum"=>$tblvalues[0]['xtxnnum'],
				"xwobal"=>$tblvalues[0]['xwobal'],
				"wonum"=>$tblvalues[0]['wonum'],
				"toname"=>$tblvalues[0]['toname'],
				"xproject"=>$tblvalues[0]['xproject'],
				"xprepay"=>$tblvalues[0]['xprepay'],
				"xnote"=>$tblvalues[0]['xnote'],
				"toorg"=>$tblvalues[0]['toorg'],
				"xamount"=>$tblvalues[0]['xamount'],
				"xcomment"=>"",
				"xdescription"=>"",
				"xqty"=>"0",
				"xunit"=>"",
				"xprice"=>"0",
				"xremarks"=>""
			);
					
		if($result=="")
			$result = 'Work Order Payment Created<br><a style="color:red" id="invnum" href="'.URL.'wopay/showinvoice/'.$txnnum.'">Click To Print Work Order Payment - '.$txnnum.'</a>';
		
		//$this->view->balance = $this->model->getBalance("");
		//print_r($tblvalues); die;
		$dynamicForm = new Dynamicform("Work Order Payment", $btn, $result);		
		
		$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, $svbtn,$tblvalues ,URL."wopay/showpost",$conf);
		
		$this->view->table = $this->renderTable($tblvalues['xtxnnum']);
		$this->view->prevmodify = $prevmodify;
		$this->view->renderpage('wopay/salesentry');
	}
		
	function renderTable($ponum){
					
		$delbtn = "";
		$row = $this->model->getPayListByPO($ponum);
		//print_r($row);
		$table = '<table class="table table-striped table-bordered">';
			$table .='<thead>
						<th></th><th>Description</th><th>Quantity</th><th>Unit</th><th>Price</th><th>Amount</th><th>Remarks</th>
					</thead>';
					$total = 0;
					$table .='<tbody>';

					foreach($row as $key=>$val){
						$showurl = URL."wopay/deletewopaydt/".$val['xtxnnum']."/".$val['xsl'];
						$table .='<tr>';
						if($val['xstatus']=="Created"){
							$table.='<td><a class="btn btn-danger" id="btnshow" href="'.$showurl.'" role="button">Delete</a></td>';
						}else{
							$table .= "<td></td>";
						}
							$table .= "<td>".$val['xdescription']."</td>";
							$table .= "<td>".$val['xqty']."</td>";
							$table .= "<td>".$val['xunit']."</td>";
							// $table .= "<td>".$val['xstatus']."</td>";
							$table .='<td>'.$val['xprice'].'</td>';
							$table .='<td>'.$val['xamount'].'</td>';
							$table .='<td>'.$val['xremarks'].'</td>';
							$total+=$val['xamount'];
							
						$table .="</tr>";
					}
						$table .='<tr><td align="right" colspan="5"><strong>Total</strong></td>
						<td><strong>'.$total.'</strong></td></tr>';
							
			$table .="</tbody>";
		$table .= "</table>";
		
		return $table;
		
	}
		
		
	function solist($status){
		$rows = $this->model->getSalesList($status);
		$cols = array("xdate-Date","xtxnnum-Txn No","wonum-Work order No","xwobal-Total Work Order (TK)","toname-Name","xproject-Project","toorg-Org","xamount-Amount");
		$table = new Datatable();
		$this->view->table = $table->createTable($cols, $rows, "xtxnnum",URL."wopay/showentry/");
		$this->view->renderpage('wopay/solist', false);
	}

	function salesentry(){

		$btn = array(
			"Clear" => URL."wopay/salesentry"
		);
		
				
		$dynamicForm = new Dynamicform("Work Order Payment",$btn);		
		
		$this->view->dynform = $dynamicForm->createForm($this->fields, URL."wopay/savesales", "Save",$this->values, URL."wopay/showpost");
		
		
		$this->view->table = $this->renderTable("");
		
		$this->view->renderpage('wopay/salesentry', false);
	}
		
		
	public function showpost(){
		$txnnum = $_POST['xtxnnum'];
		$this->showentry($txnnum);
	}
				
	function confirmpost(){
		$txnnum = $_POST['xtxnnum'];
		$result = "";


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

		$this->model->confirm($postdata,$where);
		
		$tblvalues=array();
		$tblvalues = $this->model->getSupplierPay($txnnum);
		
		$result="Confirm Failed";
		
		if($tblvalues[0]['xstatus']!="Created"){
			$result = 'Confirmed!<br><a style="color:red" id="invnum" href="'.URL.'wopay/showinvoice/'.$txnnum.'">Click To Print Work Order Payment - '.$txnnum.'</a>';
		}
		$this->showentryForConfirm($txnnum, $result);
	}

	public function showentryForConfirm($txnnum, $result=""){
	
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."wopay/salesentry"
		);
		
		$tblvalues = $this->model->getSupplierPay($txnnum);
		$prevmodify = "";
		$conf="";
		$sv="";
		$svbtn = "Save";
		if(count($tblvalues)>0){	
			if($tblvalues[0]['xstatus']=="Created"){
				$conf=array(URL."wopay/confirmpost", "Confirm");
				$sv=URL."wopay/editsales/";
			}		
			if($tblvalues[0]['xstatus']!="Confirmed" && $tblvalues[0]['xstatus']!="Created"){
				$sv="";
				$conf=array(URL."wopay/cancelpost", "Cancel");
			}
			$prevmodify = $tblvalues[0]['xcomment'];
		}
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
				"xdate"=>$tblvalues[0]['xdate'],
				"xtxnnum"=>$tblvalues[0]['xtxnnum'],
				"xwobal"=>$tblvalues[0]['xwobal'],
				"wonum"=>$tblvalues[0]['wonum'],
				"toname"=>$tblvalues[0]['toname'],
				"xproject"=>$tblvalues[0]['xproject'],
				"xprepay"=>$tblvalues[0]['xprepay'],
				"xnote"=>$tblvalues[0]['xnote'],
				"toorg"=>$tblvalues[0]['toorg'],
				"xamount"=>$tblvalues[0]['xamount'],
				"xcomment"=>"",
				"xdescription"=>"",
				"xqty"=>"0",
				"xunit"=>"",
				"xprice"=>"0",
				"xremarks"=>""
			);
					
		if($result=="")
			$result = 'Work Order Payment Created<br><a style="color:red" id="invnum" href="'.URL.'wopay/showinvoice/'.$txnnum.'">Click To Print Work Order Payment - '.$txnnum.'</a>';

		$dynamicForm = new Dynamicform("Work Order Payment", $btn, $result);		
		
		$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, $svbtn,$tblvalues ,URL."wopay/showpost",$conf);
		//send mail
		// $approval = $this->model->getApproval("Work Order Payment");
		// if(!empty($approval)){
		// 	$res = "";
		// 	$sendMails = $this->model->getMails("Work Order Payment", $approval[0]['xstatus']);
		// 	$mailer = new Mailer();
		// 	$messagae = '<h4>Txn No : '.$txnnum.'</h4></br><p>To Approve this Work Order Payment <a href="'.URL.'billapproval/showreq/'.$txnnum.'">Click Here</a></p>';
		// 	$emails = "";
		// 	if(!empty($sendMails)){
		// 		foreach($sendMails as $key=>$value){
		// 			$emails .= $value['zaltemail'].",";	
		// 		}
		// 		$emails = rtrim($emails,",");
		// 	}
		// 	$res = $mailer->sendbyemail($emails, "Work Order Payment Submited by ".Session::get('suser'), $messagae, "");
		// }
		//end send mail
		$this->view->table = $this->renderTable($tblvalues['xtxnnum']);
		$this->view->prevmodify = $prevmodify;
		$this->view->renderpage('wopay/salesentry');
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

	function deletewopaydt($txnnum, $xsl){
		$tblvalues = $this->model->getPayListByPO($txnnum);
		$result = "Deleted Successful";
		if(count($tblvalues)>0){
		if($tblvalues[0]["xstatus"]=="Created")
			$result = $this->model->recdelete(" where xtxnnum='".$txnnum."' and xsl=".$xsl);
		}
		$this->showentry($txnnum, $result);
	}
	function showinvoice($txnnum=""){
		
		$this->view->reqmst = $this->model->getSupplierPay($txnnum);
		
		$this->view->renderpage('wopay/printinvoice');		
	}

	function getSupPay($txnnum){
		echo json_encode($this->model->getSupplierPay($txnnum));	
	}
}