<?php
class Progress extends Controller{
	
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
				if($menus["xsubmenu"]=="Work Progress")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js', 'views/progress/js/getitemdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xpronum"=>"",
			"xquotnum"=>"",
			"xdate"=>$dt,
			"xprogresstype"=>"",
			"xlead"=>"",
			"xprogresspct"=>"0.00",
			"xfeedback"=>"",
			"xremarks"=>"",
			"xrow"=>"0"
			);
			
			$this->fields = array(
						array(
							"Header Section-div_"=>''													
							),
						
						array(
							"xpronum-text"=>'Progress No_maxlength="20"',
							"xdate-datepicker" => 'Date_""',
							"xrow-hidden"=>''						
							),
						array(
							"xquotnum-group_".URL."progress/picklist"=>'Order No_maxlength="20"',
							"xlead-text"=>'Lead ID_maxlength="20" readonly'
							),
						array(
							"Detail Section-div_"=>''													
							),
							array(
								"xprogresstype-select_Progress Type"=>'Progress Type_maxlength="20"',
								"xprogresspct-text_number"=>'Progress Percentage_number="true" minlength="1" maxlength="18"'
								),		
						array(
							"xfeedback-text"=>'Feedback_maxlength="200"',
							"xremarks-text"=>'Remaks_maxlength="160"'
							)
						);
						
								
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."progress/progressentry",
		);	
		
					
			$this->view->rendermainmenu('progress/index');
			
		}
		
		public function saveprogress(){
								
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$txnnum = $_POST['xpronum'];
				$keyfieldval="0";
				$form = new Form();
				$data = array();
				$success=0;
				$result = ""; 
				
				try{
					
				
				$form ->post('xdate')
					->val('maxlength', 20)
			
					->post('xquotnum')
					->val('maxlength', 200)

					->post('xpronum')
					
					->post('xprogresstype')
					->val('maxlength', 20)
					
					->post('xlead')
					->val('maxlength', 20)
					->post('xprogresspct')
					->post('xremarks')
					->val('maxlength', 160)
					
					->post('xfeedback')
					->val('maxlength', 200);
						
				$form	->submit();
				
				
					
				
				$data = $form->fetch();
				
				
				if($data['xpronum'] == "")
					$keyfieldval = $this->model->getKeyValue("crmworkprogressmst","xpronum","PORG-","6");
				else
					$keyfieldval = $data['xpronum'];
				
					
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['xpronum'] = $keyfieldval;
				$data['xdate'] = $date;			
				
				$rownum = $this->model->getRow("crmworkprogress","xpronum",$data['xpronum'],"xrow");
				
				$cols = "`bizid`,`xpronum`,`xrow`,`zemail`,`xdate`,`xprogresstype`,`xprogresspct`,`xlead`,`xquotnum`,`xremarks`,`xfeedback`";
				
				$vals = "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $rownum ."','". $data['zemail'] ."','". $data['xdate'] ."',
				'". $data['xprogresstype'] ."','". $data['xprogresspct'] ."','". $data['xlead'] ."','". $data['xquotnum'] ."','". $data['xremarks'] ."','". $data['xfeedback'] ."')";

				$totpct = $this->model->getTotalPct($data['xquotnum'], $data['xprogresstype'], $data['xpronum'])[0]['xtot'];
				$totpct += $data['xprogresspct'];
				if($totpct< 100){
					$success = $this->model->create($data, $cols, $vals);
				}else if($totpct == 100){
					$updateflag = $this->model->updateFlag($data['xpronum']);
					if($updateflag > 0){
						$success = $this->model->create($data, $cols, $vals);
					}else{
						throw new Exception("Could not save work progress!");
					}
					
				}else{
					throw new Exception("Percentage exceeds limit!");
				}
					
				
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					$this->result = 'Work Progress Created';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Work Progress! Reason: Could be Duplicate Trunsaction Code or system error!";
				
				 $this->showentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		public function editprogress(){
			
			if (empty($_POST['xpronum'])){
					header ('location: '.URL.'progress/progressentry');
					exit;
				}
			$result = "";
			
			$hd = array();
			$dt = array();
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				
			$success=false;
			$ponum = $_POST['xpronum'];
			$form = new Form();
				$data = array();
				
				try{
				
				
						$form ->post('xdate')
							->val('maxlength', 20)
					
							->post('xquotnum')
							->val('maxlength', 200)

							->post('xpronum')
							
							->post('xprogresstype')
							->val('maxlength', 20)
							
							->post('xlead')
							->val('maxlength', 20)
							->post('xprogresspct')
							->post('xremarks')
							->val('maxlength', 160)
							
							->post('xfeedback')
							->val('maxlength', 200);
						
				$form	->submit();
				
			
				
				$data = $form->fetch();	
				//print_r($data);die;
						
				$hd = array (
					"xemail"=>Session::get('suser'),
					"zutime"=>date("Y-m-d H:i:s")
					
				);
				
				$dt = array (
					"xprogresspct"=>$data['xprogresspct'],
					"xremarks"=>$data['xremarks'],
					"xfeedback"=>$data['xfeedback']
				);
				
				$success = $this->model->edit($hd,$dt,$ponum,$_POST['xrow']);
				
				
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
				
				 $this->showentry($ponum, $result);
				
		
		}
		
		public function show($txnnum, $row, $result=""){
		if($txnnum=="" || $row==""){
			header ('location: '.URL.'progress/progressentry');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."progress/progressentry"
		);
		
		$tblvalues = $this->model->getprogress($txnnum);
		$tbldtvals = $this->model->getSingleprogressDt($txnnum, $row);
		$status="";
		if(!empty($tblvalues))
			$status = $tblvalues[0]['xstatus']; //echo $status; die;
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xpronum"=>$tblvalues[0]['xpronum'],
					"xquotnum"=>$tblvalues[0]['xquotnum'],
					"xlead"=>$tblvalues[0]['xlead'],
					"xprogresstype"=>$tbldtvals[0]['xprogresstype'],
					"xprogresspct"=>$tbldtvals[0]['xprogresspct'],
					"xfeedback"=>$tbldtvals[0]['xfeedback'],
					"xremarks"=>$tbldtvals[0]['xremarks'],
					"xrow"=>$tbldtvals[0]['xrow']
					);
			
		// form data
			//$confurl = array();
			$saveurl = "";
			if($status=="Created"){
				//$confurl = array(URL."progress/confirmpur", "Confirm");
				$saveurl = URL."progress/editprogress/";
			}
			if($status=="Completed"){
				//$confurl = array(URL."progress/cancelpur", "Cancel");
				$saveurl="";
			}
		$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Work Progress", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, "Update",$tblvalues, URL."progress/showpost");
			
			$this->view->table = $this->renderTable($txnnum);
			
			$this->view->renderpage('progress/progressentry');
		}
		
		
		
		public function showentry($txnnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."progress/progressentry"
		);
		
		$tblvalues = $this->model->getprogress($txnnum);
		$status="";
		if(!empty($tblvalues))
			$status = $tblvalues[0]['xstatus'];
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xpronum"=>$tblvalues[0]['xpronum'],
					"xquotnum"=>$tblvalues[0]['xquotnum'],
					"xlead"=>$tblvalues[0]['xlead'],
					"xprogresstype"=>"",
					"xprogresspct"=>"0.00",
					"xfeedback"=>"",
					"xremarks"=>"",
					"xrow"=>"0"
					);
			$this->view->balance = "";
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Progress", $btn, $result);		
			//$confurl = array();
			$saveurl = "";
			if($status=="Created"){
				//$confurl = array(URL."progress/confirmpur", "Confirm");
				$saveurl = URL."progress/saveprogress/";
			}
			if($status=="Completed"){
				//$confurl = "";
				$saveurl="";
			}
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, "Save",$tblvalues ,URL."progress/showpost");
			
			$this->view->table = $this->renderTable($txnnum);
			
			$this->view->renderpage('progress/progressentry');
		}
		
		public function confirmpur(){
			
			$this->model->confirm(" bizid=".Session::get('sbizid')." and xponum='".$_POST['xponum']."' and xstatus='Created'");
			$this->showentry($_POST['xponum']);
		}

		public function cancelpur(){
			
			$this->model->cancel(" bizid=".Session::get('sbizid')." and xponum='".$_POST['xponum']."' and xstatus='Confirmed'");
			$this->showentry($_POST['xponum']);
		}

		function picklist(){
			$this->view->table = $this->workprogressPickTable();
			
			$this->view->renderpage('workprogress/customerpicklist', false);
		}
		
		function workprogressPickTable(){
			$fields = array(
						"xquotnum-Order No",
						"xlead-Lead ID",
						"xdate-Date"
						);
			$table = new Datatable();
			$row = $this->model->getOppertunity();
			
			return $table->picklistTable($fields, $row, "xquotnum");
		}
		
		function renderTable($txnnum){

			$pur = $this->model->getprogress($txnnum);
			$status = "";
			if(!empty($pur))
				$status = $pur[0]["xstatus"];
			
			$delbtn = "";
			if(count($pur)>0){
			if($pur[0]["xstatus"]=="Created")
				$delbtn = URL."progress/recdelete/".$txnnum."/";
				
			}
			
			$row = $this->model->getvpodt($txnnum);
			
			$table = '<table class="table table-striped table-bordered">';
				$table .='<thead>
							<th></th><th></th><th>Sl.</th><th>Type</th><th>Percentage</th><th>Order No</th><th>Lead ID</th><th>Feedback</th><th>Remarks</th>
						</thead>';
						$table .='<tbody>';

						foreach($row as $key=>$val){
							$showurl = URL."progress/show/".$txnnum."/".$val['xrow'];
							$table .='<tr>';
							
							$table.='<td><a class="btn btn-info" id="btnshow" href="'.$showurl.'" role="button">Show</a></td>';
							if($delbtn!="")
								$table.='<td><a id="delbtn" class="btn btn-danger" href="'.$delbtn."/".$val['xrow'].'" role="button">Delete</a></td>';
							else
								$table.='<td></td>';

								$table .= "<td>".$val['xrow']."</td>";
								$table .= "<td>".$val['xprogresstype']."</td>";
								$table .= "<td>".$val['xprogresspct']."</td>";
								$table .='<td>'.$val['xquotnum'].'</td>';		
								$table .='<td>'.$val['xlead'].'</td>';
								$table .='<td>'.$val['xfeedback'].'</td>';
								$table .='<td>'.$val['xremarks'].'</td>';
								//$table .='<td>'.$val['xdisctotal'].'</td>';
								// $subtotal = $val['xtotal']+$val['xtotaltax']-$val['xtotaldisc'];
								// $table .='<td>'.$subtotal.'</td>';
								// $table .='<td>'.$val['xcur'].'</td>';
								// $total+=$subtotal;
								// $totalqty+=	$val['xqty'];
								//$totaltax +=$val['xtaxtotal'];
								//$totaldisc+= $val['xdisctotal'];
								
							$table .="</tr>";
						}
							// $table .='<tr><td align="right" colspan="6"><strong>Total</strong></td><td align="right"><strong>'.$totalqty.'</strong></td><td></td><td align="right"><strong>'.$total.'</strong></td><td></td></tr>';
							/*$net=0;
							if(!empty($row)){
								$table .='<tr><td align="right" colspan="8"><strong>Fixed Discount</strong></td><td align="right"><strong>'.$row[0]["xgrossdisc"].'</strong></td></tr>';
								
								//$net = $total-$row[0]["xgrossdisc"];
							}
							$table .='<tr><td align="right" colspan="8"><strong>Net Total</strong></td><td align="right"><strong>'.$net.'</strong></td></tr>';*/
							 	
					$table .="</tbody>";			
			$table .= "</table>";
			
			return $table;
			
			/*$pur = $this->model->getprogress($txnnum);
			$status = "";
			if(!empty($pur))
				$status = $pur[0]["xstatus"];
			
			$delurl = URL."progress/recdelete/".$txnnum."/";
			
			if($status=="Confirmed")
			{
				$delurl="";
			}			
			
			$fields = array(
						"xrow-Sl",
						"xitemcode-Item Code",
						"xitemdesc-Description",
						"xqty-Quantity",
						"xratepur-Rate",
						"xtotal-Total"
						);
			$table = new Datatable();
			$row = $this->model->getprogressdt($txnnum);
			
			return $table->myTable($fields, $row, "xrow", URL."progress/show/".$txnnum."/", $delurl);
			*/
			
		}

		function getDetails($intsl){
			//echo $intsl; die;
			$this->model->getDetails($intsl);
		}
		
		
		function polist(){
			$rows = $this->model->getprogressList("Completed");
			$cols = array("xdate-Date","xpronum-WP No","xquotnum-Order No","xlead-Lead ID");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xpronum",URL."progress/showentry/");
			$this->view->renderpage('progress/progresslist', false);
		}
		function unconfirmedlist(){
			$rows = $this->model->getprogressList("Created");
			$cols = array("xdate-Date","xpronum-WP No","xquotnum-Order No","xlead-Lead ID");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xpronum",URL."progress/showentry/");
			$this->view->renderpage('progress/progresslist', false);
		}
		
		function progressentry(){
				
		$btn = array(
			"Clear" => URL."progress/progressentry"
		);

		// form data
		$this->view->balance = "";
		
			$dynamicForm = new Dynamicform("Work Progress",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."progress/saveprogress", "Save",$this->values, URL."progress/showpost");
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('progress/progressentry', false);
		}
		
		
		public function showpost(){
		//echo 123;die;
		$txnnum = $_POST['xpronum'];
			
		$tblvalues=array();
		
		$btn = array(
			"New" => URL."progress/progressentry"
		);
		
		$tblvalues = $this->model->getprogress($txnnum);
		$status="";
		if(!empty($tblvalues))
			$status = $tblvalues[0]['xstatus'];
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
						"xdate"=>$tblvalues[0]['xdate'],
						"xpronum"=>$tblvalues[0]['xpronum'],
						"xquotnum"=>$tblvalues[0]['xquotnum'],
						"xlead"=>$tblvalues[0]['xlead'],
						"xprogresstype"=>"",
						"xprogresspct"=>"0.00",
						"xfeedback"=>"",
						"xremarks"=>"",
						"xrow"=>"0"
					);
			
		
			
		// form data
			$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Work Progress", $btn);
			//$confurl = array();
			$saveurl = "";
			if($status=="Created"){		
				//$confurl = array(URL."progress/confirmpur", "Confirm");
				$saveurl = URL."progress/saveprogress/";
			}
			if($status=="Completed"){
				//$confurl = array(URL."progress/cancelpur", "Cancel");
				$saveurl="";
			}
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, "Save",$tblvalues ,URL."progress/showpost");
			
			$this->view->table = $this->renderTable($txnnum);
			
			$this->view->renderpage('progress/progressentry');
		}
		function recdelete($ponum, $row){
			$grn = $this->model->getprogress($ponum);
			$status = "";
			if(!empty($grn))
				$status = $grn[0]["xstatus"];
			if($status=="Created")
				$this->model->recdelete(" WHERE xpronum='".$ponum."' and xrow=".$row);
			
			$this->showentry($ponum);
		}
		function printpo($pono=""){
			
			$values = $this->model->getvpodt($pono);
			//print_r($values);die;
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li>progress Order</li>							
						   </ul>';
			
			$this->view->pono=$pono;
			$totqty = 0;
			$total = 0;
			$xdate="";
			$supplier="";
			$supadd="";
			$supphone="";
			$supdoc="";
			$note = "";
			
			
			foreach($values as $key=>$val){
				$xdate=$val['xdate'];
				$supplier=$val['xorg'];
				$supadd=$val['xsupadd'];
				$supphone=$val['xsupphone'];
				$supdoc=$val['xsupdoc'];
				
				$note=$val['xnote'];
				$totqty+=$val['xqty'];
				$total+=$val['xtotal'];
			}
			$this->view->xdate=$xdate;
			$this->view->supplier=$supplier;
			$this->view->supadd=$supadd;
			$this->view->supphone=$supphone;
			$this->view->supdoc=$supdoc;			
			$this->view->totqty=$totqty;
			$this->view->total=$total;
			$this->view->note=$note;
			
			
			$cur = new Currency();
			$this->view->inword="In Words: ". $cur->get_bd_amount_in_text($total);
			$this->view->vrow = $values;
			
			$this->view->vrptname = "progress Order";
			$this->view->org=Session::get('sbizlong');
			
			$this->view->renderpage('progress/printprogress');		
		}
}