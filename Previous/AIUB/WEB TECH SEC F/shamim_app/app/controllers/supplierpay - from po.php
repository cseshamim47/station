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
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/supplierpay/js/getaccdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"xtxnnum"=>"",
			"xsup"=>"",
			"xorg"=>"",
			"xponum"=>"",
			"xpobal"=>"0.00",
			"xamount"=>"0.00"
			);
			
			$this->fields = array(
						array(
							"xtxnnum-text"=>'Txn No_maxlength="20"',
							"xdate-datepicker" => 'Date_""'
							),
						array(
							"xponum-group_".URL."jsondata/grnpicklist"=>'PO Number*~star_maxlength="20"',
							"xpobal-text"=>'PO Balance_maxlength="50" readonly'		
							),
						array(
							"xsup-group_".URL."jsondata/supplierpicklist"=>'Supplier ID*~star_maxlength="20"',
							"xorg-text"=>'Org*~star_maxlength="100" readonly'
							),
						array(
							"xamount-text_number"=>'Pay Amount_number="true" minlength="1" maxlength="18" required'
							)
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
			
			
				$form	->post('xponum')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xsup')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xamount')
						
						->post('xpobal');
						
				$form	->submit();
				
				
					
				
				$data = $form->fetch();
				$keyfieldval = $this->model->getKeyValue("supplierpay","xtxnnum","SPAY-","5");
					
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['xtxnnum'] = $keyfieldval;
				$data['xdate'] = $date;			
					
				$success = $this->model->create($data);
				
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
			$dt = array();
			
			$xdate = $_POST['xdate'];
			$dt = str_replace('/', '-', $xdate);
			$date = date('Y-m-d', strtotime($dt));
			
			$success=false;
			$txnnum = $_POST['xtxnnum'];
			$form = new Form();
			$data = array();
			
			try{
				$form	->post('xponum')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xsup')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xamount')
						
						->post('xpobal');
					
				$form	->submit();
				$data = $form->fetch();	
				
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
				$data['xdate'] = $date;
				$success = $this->model->edit($data, $txnnum);
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
		if(count($tblvalues)>0){	
			if($tblvalues[0]['xstatus']=="Created" || $tblvalues[0]['xstatus']=="Canceled"){
				$conf=array(URL."supplierpay/confirmpost", "Confirm");
				$sv=URL."supplierpay/editsales/";
			}else if($tblvalues[0]['xstatus']=="Pending"){
				$sv="";
				$conf=array(URL."supplierpay/cancelpost", "Cancel");
			}		
		}
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
				"xdate"=>$tblvalues[0]['xdate'],
				"xtxnnum"=>$tblvalues[0]['xtxnnum'],
				"xpobal"=>$tblvalues[0]['xpobal'],
				"xponum"=>$tblvalues[0]['xponum'],
				"xsup"=>$tblvalues[0]['xsup'],
				"xorg"=>$tblvalues[0]['xorg'],
				"xamount"=>$tblvalues[0]['xamount']
			);
					
			if($result=="")
				$result = 'Supplier Payment Created<br><a style="color:red" id="invnum" href="'.URL.'supplierpay/showinvoice/'.$txnnum.'">Click To Print Supplier Payment - '.$txnnum.'</a>';
			
			//$this->view->balance = $this->model->getBalance("");
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Supplier Payment", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, $svbtn,$tblvalues ,URL."supplierpay/showpost",$conf);
			
			$this->view->table = $this->renderTable($tblvalues['xponum']);
			
			$this->view->renderpage('supplierpay/salesentry');
		}
		
		function renderTable($ponum){
						
			$delbtn = "";
			$row = $this->model->getPayListByPO($ponum);
			
			$table = '<table class="table table-striped table-bordered">';
				$table .='<thead>
							<th></th><th>Date</th><th>Txn No</th><th>PO Number</th><th>PO Balance</th><th>Supplier ID</th><th>Org</th><th>Amount</th>
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
								$table .= "<td>".$val['xponum']."</td>";
								// $table .= "<td>".$val['xstatus']."</td>";
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
		
		
		function solist($status){
			$rows = $this->model->getSalesList($status);
			$cols = array("xdate-Date","xtxnnum-Txn No","xponum-PO Number","xpobal-PO Balance","xsup-Supplier ID","xorg-Org","xamount-Amount");
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
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('supplierpay/salesentry', false);
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
			$approval = $this->model->getApproval("Supplier Payment");
			if(!empty($approval)){
				$status = "Pending";
				$appstatus = $approval[0]['xstatus'];
			}



			$postdata=array(
				"xstatus" => $status,
				"xappstatus" => $appstatus
				);				
			$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '". $txnnum ."'";

			$this->model->confirm($postdata,$where);
			
			$tblvalues=array();
			$tblvalues = $this->model->getSupplierPay($txnnum);
			
			$result="Confirm Failed";
			
			if($tblvalues[0]['xstatus']!="Created"){
				$result = 'Confirmed!<br><a style="color:red" id="invnum" href="'.URL.'supplierpay/showinvoice/'.$txnnum.'">Click To Print Supplier Payment - '.$txnnum.'</a>';
			}
			$this->showentryForConfirm($txnnum, $result);
		}

		public function showentryForConfirm($txnnum, $result=""){
		
			$tblvalues=array();
			$btn = array(
				"Clear" => URL."supplierpay/salesentry"
			);
			
			$tblvalues = $this->model->getSupplierPay($txnnum);
			
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
			}
			if(empty($tblvalues))
				$tblvalues=$this->values;
			else
				$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xtxnnum"=>$tblvalues[0]['xtxnnum'],
					"xpobal"=>$tblvalues[0]['xpobal'],
					"xponum"=>$tblvalues[0]['xponum'],
					"xsup"=>$tblvalues[0]['xsup'],
					"xorg"=>$tblvalues[0]['xorg'],
					"xamount"=>$tblvalues[0]['xamount']
				);
						
				if($result=="")
					$result = 'Supplier Payment Created<br><a style="color:red" id="invnum" href="'.URL.'supplierpay/showinvoice/'.$txnnum.'">Click To Print Supplier Payment - '.$txnnum.'</a>';
				
				//$this->view->balance = $this->model->getBalance("");
				//print_r($tblvalues); die;
				$dynamicForm = new Dynamicform("Supplier Payment", $btn, $result);		
				
				$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, $svbtn,$tblvalues ,URL."supplierpay/showpost",$conf);
				//send mail
				$approval = $this->model->getApproval("Supplier Payment");
				if(!empty($approval)){
					$res = "";
					$sendMails = $this->model->getMails("Supplier Payment", $approval[0]['xstatus']);
					$mailer = new Mailer();
					$messagae = '<h4>Txn No : '.$txnnum.'</h4></br><p>To Approve this Supplier Payment <a href="'.URL.'billapproval/showreq/'.$txnnum.'">Click Here</a></p>';
					$emails = "";
					if(!empty($sendMails)){
						foreach($sendMails as $key=>$value){
							$emails .= $value['zaltemail'].",";	
						}
						$emails = rtrim($emails,",");
					}
					$res = $mailer->sendbyemail($emails, "Supplier Payment Submited by ".Session::get('suser'), $messagae, "");
				}
				//end send mail
				$this->view->table = $this->renderTable($tblvalues['xponum']);
				
				$this->view->renderpage('supplierpay/salesentry');
			}

		function cancelpost(){
			$txnnum = $_POST['xtxnnum'];
			$result = "";
			$postdata=array(
				"xstatus" => "Canceled"
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
		function showinvoice($txnnum=""){
			
			$values = $this->model->getPayListByPO($txnnum);
			//print_r($values);die;
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li>Sales Invoice</li>							
						   </ul>';
			
			$this->view->sono=$txnnum;
			$totqty = 0;			
			$xdate="";
			$xcus="";
			$xcusbal="";
			$xrcvamt="";
			$xorg="";
			$xadd="";
			$xmobile="";
			$grossdisc=0;
			
			$taxamt = 0;
			$discamt = 0;
			$total = 0;
			
			foreach($values as $key=>$val){
				$xdate=$val['xdate'];
				$xcus=$val['xcus'];
				$xcusbal=$val['xcusbal'];
				$xrcvamt=$val['xrcvamt'];
				$xorg=$val['xorg'];
				$xadd=$val['xadd'];
				$xmobile=$val['xmobile'];				
				$totqty+=$val['xqty'];
				$taxamt+=$val['xtaxtotal'];
				$discamt+=$val['xdisctotal'];
				$total +=($val['xqty']*$val['xrate'])+$val['xtaxtotal']-$val['xdisctotal'];
				$grossdisc=$val['xgrossdisc'];	
			}
			$this->view->xdate=$xdate;
			$this->view->cus=$xcus;
			$this->view->cusbal=$xcusbal;
			$this->view->rcvamt=$xrcvamt;
			$this->view->xorg=$xorg;
			$this->view->xadd=$xadd;
			$this->view->xmobile=$xmobile;
			$this->view->grossdisc=$grossdisc;
			$this->view->taxamt=$taxamt;
			$this->view->discamt=$discamt;
			$this->view->total=$total;
					
			$this->view->totqty=$totqty;
			
			
			$cur = new Currency();
			
			$this->view->vrow = $values;
			
			$this->view->vrptname = "Invoice/Bill";
			$this->view->org=Session::get('sbizlong');
			$this->view->add=Session::get('sbizadd');
			
			$this->view->renderpage('supplierpay/printinvoice');		
		}
}