<?php
class Imstorereqgen extends Controller{
	
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
				if($menus["xsubmenu"]=="General Store Requisition")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/imstorereqgen/js/getitemdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"ximreqnum"=>"",
			"xnote"=>"",
			"xdeliveryto"=>"",
			"xitemcode"=>"",
			"xitemdesc"=>"",
			"xqty"=>"0",
			"xrow"=>"0",
			//"xrate"=>"0.00"
			"xwh"=>"",
			"xproject"=>"",
			"xpur"=>"",
			"xunitstk"=>"",
			);
			
			$this->fields = array(array(
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
							"xitemcode-group_".URL."itempicklist/picklistGroup/General Store"=>'Item Code*~star_maxlength="20"',
							"xitemdesc-text"=>'Description_readonly'							
							),
						array(
							"xwh-select_Warehouse"=>'Warehouse*~star_maxlength="20"',
							"xunitstk-text"=>'UOM_readonly'
							),
						array(
							"xqty-text_digit"=>'Quantity*~star_number="true" minlength="1" maxlength="18" required',
							"xdeliveryto-text"=>'Delivery To_maxlength="300"'
							)
						);
						
								
		}
		
		public function index(){
		
			$btn = array(
				"Clear" => URL."imstorereqgen/distreqentry",
			);			
			$this->view->rendermainmenu('imstorereqgen/index');
		}
		
		public function savedistreq(){
				
						
				$xyear = 0;
				$per = 0;		
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
				
				$xvoucher = $_POST['ximreqnum'];
				$keyfieldval="0";
				$form = new Form();
				$data = array();
				$success=0;
				$result = ""; 
				$itemdetail = $this->model->getItemDetail("xitemcode", $_POST['xitemcode']);
				try{
				// if($_POST['xrate']<=0){
				// 	throw new Exception("Product rate must be greater than 0!");
				// }	
				if($_POST['xqty']<=0){
					throw new Exception("Product quantity must be greater than 0!");
				}
				if(empty($itemdetail)){
					throw new Exception("Item not found!");
				}	
				if($itemdetail[0]['xgitem'] != "General Store"){
					throw new Exception("You are not permitted to add this item!");
				}			
				$form	->post('xitemcode')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('ximreqnum')						
				
						->post('xnote')
						->val('maxlength', 250)
						
						->post('xdeliveryto')
						->val('maxlength', 300)
						
						->post('xwh')
						
						->post('xqty')

						->post('xproject')

						->post('xpur');
						
						//->post('xrate');
						
				$form	->submit();
				
				$data = $form->fetch();
				
				if($data['ximreqnum'] == "")
					$keyfieldval = $this->model->getKeyValue("imstorereq","ximreqnum","SQ-","5");
				else
					$keyfieldval = $data['ximreqnum'];

				
					
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['ximreqnum'] = $keyfieldval;
				$data['xdate'] = $date;
				$data['xbranch'] = Session::get('sbranch');
				
				
				
				$rownum = $this->model->getRow("imstorereqdet","ximreqnum",$data['ximreqnum'],"xrow");
				
				$cols = "`bizid`,`ximreqnum`,`xrow`,`xitemcode`,`xqty`,`xdate`,`zemail`,`xyear`,`xper`,`xwh`,`xpur`";
				
				$vals = "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $rownum ."','". $data['xitemcode'] ."','". $data['xqty'] ."','". $date ."','". Session::get('suser') ."','". $year ."','". $month ."', '". $data['xwh'] ."','". $data['xpur'] ."')";
				
					
				$success = $this->model->create($data, $cols, $vals);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					$this->result = 'General Store Requisition Created';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create General Store Requisition! Reason: Could be Duplicate Account Code or system error!";
				
				 $this->showentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		public function editdistreq(){
			
			if (empty($_POST['ximreqnum'])){
					header ('location: '.URL.'imstorereqgen/distreqentry');
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
					if($itemdetail[0]['xgitem'] != "General Store"){
						throw new Exception("You are not permitted to add this item!");
					}
				
				$form	->post('xitemcode')
						->val('minlength', 1)
						->val('maxlength', 20)
										
				
						->post('xnote')
						->val('maxlength', 250)
						
						->post('xdeliveryto')
						->val('maxlength', 300)
						
						->post('xqty')
						
						->post('xwh')

						->post('xproject')

						->post('xpur');
						
						//->post('xrate');
						
				$form	->submit();
				
			
				
				$data = $form->fetch();	
				//print_r($data);die;
				
								
				$hd = array (
					"xemail"=>Session::get('suser'),
					"zutime"=>date("Y-m-d H:i:s"),
					"xdate"=>$date,
					"xnote"=>$data['xnote'],
					"xdeliveryto"=>$data['xdeliveryto'],
					"xproject"=>$data['xproject'],				
				);
				
				$dt = array (
					"xitemcode"=>$data['xitemcode'],
					"xqty"=>$data['xqty'],
					"xwh"=>$data['xwh'],
					"xpur"=>$data['xpur'],
					//"xrate"=>$data['xrate'],
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
			header ('location: '.URL.'imstorereqgen/distreqentry');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."imstorereqgen/distreqentry"
		);
		
		$tblvalues = $this->model->getImreq($reqnum);
		$tbldtvals = $this->model->getSingleReqDt($reqnum, $row);

		$conf="";
		$sv="";
		if(count($tblvalues)>0){	
			if($tblvalues[0]['xstatus']=="Created" || $tblvalues[0]['xstatus']=="Canceled"){
				$conf=array(URL."imstorereqgen/confirmpost", "Confirm");
				$sv=URL."imstorereqgen/editdistreq";
			}		
			if($tblvalues[0]['xstatus']=="Confirmed" || $tblvalues[0]['xstatus']=="Pending"){
				$sv="";
				$conf=array(URL."imstorereqgen/cancelpost", "Cancel");
			}		
		}
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"ximreqnum"=>$tblvalues[0]['ximreqnum'],
					"xnote"=>$tblvalues[0]['xnote'],
					"xdeliveryto"=>$tblvalues[0]['xdeliveryto'],
					"xitemcode"=>$tbldtvals[0]['xitemcode'],
					"xitemdesc"=>$tbldtvals[0]['xitemdesc'],
					"xwh"=>$tbldtvals[0]['xwh'],
					"xqty"=>$tbldtvals[0]['xqty'],
					"xrow"=>$tbldtvals[0]['xrow'],
					"xproject"=>$tblvalues[0]['xproject'],
					"xpur"=>$tbldtvals[0]['xpur'],
					"xunitstk"=>$tbldtvals[0]['xunitstk'],
					//"xrate"=>$tbldtvals[0]['xrate']
					);
			
		// form data
		
			
			$dynamicForm = new Dynamicform("General Store Requisition", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, "Update",$tblvalues, URL."imstorereqgen/showpost", $conf);
			
			$this->view->table = $this->renderTable($reqnum);
			
			$this->view->renderpage('imstorereqgen/distreqentry');
		}
		
		
		
		public function showentry($reqnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."imstorereqgen/distreqentry"
		);
		
		$tblvalues = $this->model->getImreq($reqnum);

		$conf="";
		$sv="";
		if(count($tblvalues)>0){	
			if($tblvalues[0]['xstatus']=="Created" || $tblvalues[0]['xstatus']=="Canceled"){
				$conf=array(URL."imstorereqgen/confirmpost", "Confirm");
				$sv=URL."imstorereqgen/savedistreq";
			}		
			if($tblvalues[0]['xstatus']=="Confirmed" || $tblvalues[0]['xstatus']=="Pending"){
				$sv="";
				$conf=array(URL."imstorereqgen/cancelpost", "Cancel");
			}		
			// if($tblvalues[0]['xstatus']!="Created" && $tblvalues[0]['xstatus']!="Canceled"){
			// 	$sv="";
			// 	$conf=array(URL."imstorereqgen/cancelpost", "Cancel");
			// }		
		}
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"ximreqnum"=>$tblvalues[0]['ximreqnum'],
					"xnote"=>$tblvalues[0]['xnote'],
					"xdeliveryto"=>$tblvalues[0]['xdeliveryto'],
					"xitemcode"=>"",
					"xitemdesc"=>"",
					"xqty"=>"0",
					"xwh"=>"",
					"xrow"=>"0",
					"xproject"=>$tblvalues[0]['xproject'],
					"xpur"=>"",
					"xunitstk"=>"",
					//"xrate"=>"0"
					);
			
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("General Store Requisition", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, "Save",$tblvalues ,URL."imstorereqgen/showpost", $conf);
			
			$this->view->table = $this->renderTable($reqnum);
			
			$this->view->renderpage('imstorereqgen/distreqentry');
		}
		
		function renderTable($imreqnum){
			$tblvalues = $this->model->getImreq($imreqnum);
			$fields = array(
					"xrow-Sl",
					"xitemcode-Item Code",
					"xitemdesc-Description",
					"xqty-Quantity",
					"xunitstk-UOM",
					"xwh-Warehouse",
						//"xsalestotal-Total"
						);
			$table = new Datatable();
			$row = $this->model->getimreqdt($imreqnum);
			$delbtn = "";
			if(count($tblvalues)>0){
			if($tblvalues[0]["xstatus"]=="Created")
				$delbtn = URL."imstorereqgen/deldistreq/".$imreqnum."/";
			}
			
			return $table->myTable($fields, $row, "xrow", URL."imstorereqgen/showdistreq/".$imreqnum."/", $delbtn);
			
			
		}		
		
		function imreqlist($status){
			$rows = $this->model->getImreqList($status);
			$cols = array("xdate-Date","ximreqnum-Requisition No","xappstatus-Pending Level","xemail-Approve/Cancel By","xproject-Project","xnote-Note");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "ximreqnum",URL."imstorereqgen/showentry/");
			$this->view->renderpage('imstorereqgen/distreqlist', false);
		}		
		
		function distreqentry(){
				
		$btn = array(
			"Clear" => URL."imstorereqgen/distreqentry"
		);

		// form data
		
		
			$dynamicForm = new Dynamicform("Requisition",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."imstorereqgen/savedistreq", "Save",$this->values, URL."imstorereqgen/showpost");
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('imstorereqgen/distreqentry', false);
		}
		
		
		public function showpost(){
		//echo 123;die;
		$imreqnum = $_POST['ximreqnum'];
			
		$tblvalues=array();
		
		$btn = array(
			"New" => URL."imstorereqgen/distreqentry"
		);
		
		$tblvalues = $this->model->getImreq($imreqnum);

		$conf="";
		$sv="";
		if(count($tblvalues)>0){	
			if($tblvalues[0]['xstatus']=="Created"){
				$conf=array(URL."imstorereqgen/confirmpost", "Confirm");
				$sv=URL."imstorereqgen/savedistreq";
			}		
			if($tblvalues[0]['xstatus']=="Confirmed"){
				$sv="";
				$conf=array(URL."imstorereqgen/cancelpost", "Cancel");
			}		
		}
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"ximreqnum"=>$tblvalues[0]['ximreqnum'],
					"xnote"=>$tblvalues[0]['xnote'],
					"xdeliveryto"=>$tblvalues[0]['xdeliveryto'],
					"xitemcode"=>"",
					"xitemdesc"=>"",
					"xqty"=>"0",
					"xwh"=>"",
					"xrow"=>"0",
					"xproject"=>$tblvalues[0]['xproject'],
					"xpur"=>"",
					"xunitstk"=>"",
					//"xrate"=>"0"
					);
			
		
			
		// form data
		$result='<a style="color:red" id="invnum" href="'.URL.'imstorereqgen/showquot/'.$imreqnum.'">Click To Print General Store Requisition - '.$imreqnum.'</a>';
			
		$dynamicForm = new Dynamicform("Requisition", $btn, $result);		
		
		$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, "Save",$tblvalues, URL."imstorereqgen/showpost", $conf);
		
		$this->view->table = $this->renderTable($imreqnum);
		
		$this->view->renderpage('imstorereqgen/distreqentry');
		}

		function showquot($reqnum=""){

			$tblvalues = $this->model->getReq($reqnum);
			//print_r($tblvalues);
			$this->view->xdate = $tblvalues[0]["xdate"];
			$this->view->xtype = "General Store";
			$this->view->xproject = $tblvalues[0]["xproject"];
			$this->view->reqmst = $tblvalues;
			
			$this->view->table = $this->renderTableForPrint($reqnum);
			
			$this->view->renderpage('imstorereq/quotation');
		}

		function renderTableForPrint($imreqnum){

			$row = $this->model->getimreqdt($imreqnum);
			
			$table = '<table class="table table-striped table-bordered">';
				$table .='<thead>
							<th style="text-align:center">Sl.</th><th style="text-align:center">Itemcode</th><th style="text-align:center">Description</th><th style="text-align:right">Qty</th><th>UOM</th><th style="text-align:center">Warehouse</th>
						</thead>';
						$totalqty = 0;
						$total = 0;
						$totaltax = 0;
						$totaldisc = 0;
						$table .='<tbody>';

						foreach($row as $key=>$val){
							$table .='<tr>';

								$table .= "<td>".$val['xrow']."</td>";
								$table .= "<td>".$val['xitemcode']."</td>";
								$table .= "<td>".$val['xitemdesc']."</td>";		
								$table .='<td align="right">'.$val['xqty'].'</td>';
								$table .='<td align="left">'.$val['xunitstk'].'</td>';
								$table .='<td>'.$val['xwh'].'</td>';
								$totalqty+=	$val['xqty'];
								
							$table .="</tr>";
						}
							$cur = new Currency();
							$inword= $cur->get_bd_amount_in_text($total);
							//$table .='<tr><td align="right"><strong>Total</strong></td><td></td><td align="right"><strong>'.$total.'</strong></td></tr>';
							 	
					$table .="</tbody>";			
			$table .= "</table>";
			
			return $table;
			
			
		}	
		

		function deldistreq($imreqnum, $rw){

			$where = " where bizid=".Session::get('sbizid')." and ximreqnum='".$imreqnum."' and xrow=".$rw;

			$result = $this->model->dbdelete($where);

			
			$this->showentry($imreqnum, "Deleted Successfully!");
			
		}

		function confirmpost(){
			$status = "Confirmed";
			$appstatus = "Confirmed";
			$reqnum = $_POST['ximreqnum'];
			
			// $approval = $this->model->getApproval("General Store Requisition");
			// // print_r($approval);die;
			 
			// if(!empty($approval)){
			// 	$status = "Pending";
			// 	$appstatus = $approval[0]['xstatus'];
			// }
			$where = " bizid = ". Session::get('sbizid') ." and ximreqnum = '". $reqnum ."'";
			$postdata=array(
				"xstatus" => "Pending",
				"xdept" => Session::get('srole'),
				"xappstatus" => "Confirmed",
				"xemail" => ''
				);	
			$this->model->confirm($postdata,$where);
			$tblvalues=array();
			$tblvalues =  $this->model->getImreq($reqnum);
			
			$result="Confirm Failed";
			
			if($tblvalues[0]['xstatus']!="Created"){
				$result='Confirmed!<br/><a style="color:red" id="invnum" href="'.URL.'imstorereqgen/showquot/'.$reqnum.'">Click To Print General Store Requisition - '.$reqnum.'</a>';
			}
			$this->showentry($reqnum, $result);
		}

		function cancelpost(){
				
				$reqnum = $_POST['ximreqnum'];
				$where = " bizid = ". Session::get('sbizid') ." and ximreqnum = '". $reqnum ."'";
				
				$postdata=array(
					"xstatus" => "Canceled",
					"xappstatus" => "Canceled"
					);	
				
				$this->model->confirm($postdata,$where);
				$tblvalues=array();
				$tblvalues =  $this->model->getImreq($reqnum);
				
				$result="Cancel Failed";
				
				if($tblvalues[0]['xstatus']=="Canceled"){
					$result='General Store Requisition Canceled!<br/><a style="color:red" id="invnum" href="'.URL.'imstorereqgen/showquot/'.$reqnum.'">Click To Print General Store Requisition - '.$reqnum.'</a>';
				}
				$this->showentry($reqnum, $result);
		
		}
}