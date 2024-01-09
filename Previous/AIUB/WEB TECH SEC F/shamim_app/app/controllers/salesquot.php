<?php
class Salesquot extends Controller{
	
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
				if($menus["xsubmenu"]=="Sales Quotation")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/salesquot/js/getitemdt.js','views/salesquot/js/getaccdt.js','views/jsondata/js/bindt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"xquotnum"=>"",
			"xcus"=>"",
			"xorg"=>"",
			"xitemcode"=>"",
			"xitemdesc"=>"",
			"xqty"=>"0",
			"xrow"=>"0",
			"xrate"=>"0.000",
			"xgrossdisc"=>"0.000",
			"xnotes"=>"",
			"xdisc"=>"0.000",
			"xdiscpct"=>"0.000",
			"xrefquot"=>""
			);
			
			$this->fields = array(array(
							"Header Section-div"=>''													
							),array(
							"xquotnum-text"=>'Qutation No_maxlength="20"',
							"xdate-datepicker" => 'Date_""',
							"xrow-hidden"=>''
							),
						array(
							"xcus-group_".URL."jsondata/customerpicklist"=>'Customer Code*~star_maxlength="20"',
							"xorg-text"=>'Customer Name*~star_maxlength="100" readonly'
							),array(
							"Quotation Closing Section-div"=>''													
							),array(							
							"xgrossdisc-text_number"=>'Discount on total value_number="true" minlength="1" maxlength="18" required',							
							),
						array(							
							"xnotes-textarea"=>'Additional Notes_""'							
							),array(
							"Quotation Detail-div"=>''													
							),
						array(
							"xitemcode-group_".URL."itempicklist/picklist"=>'Item Code*~star_maxlength="20"',
							"xitemdesc-text"=>'Description_readonly'							
							),
						array(
							"xrate-text_number"=>'Rate_number="true" minlength="1" maxlength="18" required readonly',
							"xqty-text_digit"=>'Quantity*~star_number="true" minlength="1" maxlength="18" required'							
							),
						array(
							"xdiscpct-text_number"=>'Discount(%)_number="true" minlength="1" maxlength="18"',
							"xdisc-text_number"=>'Discount Amt_number="true" minlength="1" maxlength="18"',
							"xrefquot-hidden"=>''						
							)
						);
						
								
		}
		
		public function index(){
		
					
			$this->view->rendermainmenu('salesquot/index');
			
		}
		
		public function savequot(){
									
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
				$xyear = 0;
				$per = 0;
				
				$xquotnum = $_POST['xquotnum'];
				$keyfieldval="0";
				$form = new Form();
				$data = array();
				$success=0;
				$result = ""; 
						
				try{
					
				
				
				$form	->post('xitemcode')
						->val('minlength', 1)
						->val('maxlength', 20)
						
												
						->post('xcus')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xquotnum')
						->val('maxlength', 20)

						->post('xrefquot')
						->val('maxlength', 20)

						->post('xorg')
						
						->val('maxlength', 20)	

						->post('xnotes')						
						->val('maxlength', 20)
						
						->post('xgrossdisc')
				
						
						
						->post('xqty')
						
						->post('xdisc')
						
						->post('xrate');
						
				$form	->submit();
				
				
					
				
				$data = $form->fetch();
				
				
				if($data['xquotnum'] == "")
					$keyfieldval = $this->model->getKeyValue("soquot","xrefquot","QUOT","5");
				else
					$keyfieldval = $data['xquotnum'];
				
				
					
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['xsonum'] = $keyfieldval;

				$data['xdate'] = $date;
				$data['xbranch'] = Session::get('sbranch');
				$data['xquotnum'] = $keyfieldval;

				$itemdetail = $this->model->getItemMaster("xitemcode",$data['xitemcode']);

				
				$rownum = $this->model->getRow("soquotdet","xquotnum",$data['xquotnum'],"xrow");
				
				$cols = "`bizid`,`xquotnum`,`xrow`,`xitemcode`,`xitembatch`,`xqty`,`xdate`,`xrate`,`xtaxrate`,`xdisc`,`xexch`,`xcur`,`xtaxcode`,`xtaxscope`,`zemail`,`xunitsale`,`xcus`,`xyear`,`xper`,`xwh`,`xbranch`,`xproj`,`xtypestk`";
				
				$vals = "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $rownum ."','". $data['xitemcode'] ."','". $data['xitemcode'] ."',
				'". $data['xqty'] ."','". $date ."','". $data['xrate'] ."','0','". $data['xdisc'] ."','1','".Session::get('sbizcur')."','None','None','".$data['zemail']."','None','". $data['xcus'] ."',".$year.",".$month.",'".Session::get('sbranch')."','".Session::get('sbranch')."','".Session::get('sbranch')."','".$itemdetail[0]['xtypestk']."')";
				
				
				$success = $this->model->create($data, $cols, $vals);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				$quothist = $this->model->getQuotationHistory($data["xrefquot"]);
				if($success>0){
					$this->result = 'Sales Quotation Created<br/><a style="color:red" id="invnum" href="'.URL.'salesquot/showquot/'.$keyfieldval.'">Print Quotation - '.$keyfieldval.'</a><br/>';
					if(!empty($quothist)){
						foreach($quothist as $k=>$v){
							$this->result .= 'Quotation<br/><a style="color:red" id="invnum" href="'.URL.'salesquot/showquot/'.$v["xquotnum"].'">Print Quotation - '.$v["xquotnum"].'</a><br/>';
						}
					}
				}
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Sales Quotation! Reason: Could be Duplicate Code or system error!";
				
				 $this->showentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		public function editquot(){
			
			if (empty($_POST['xquotnum'])){
					header ('location: '.URL.'salesquot/quotationentry');
					exit;
				}
			$result = "";
			
			$hd = array();
			$dt = array();
			
				
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				
			$success=false;
			$quotnum = $_POST['xquotnum'];
			$form = new Form();
				$data = array();
				
				try{
				
				
				$form	->post('xitemcode')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xquotnum')		
						
						->post('xcus')
						->val('minlength', 1)
						->val('maxlength', 20)

						->post('xorg')						
						->val('maxlength', 20)						
				
						
						->post('xnotes')						
						->val('maxlength', 20)
						
						->post('xgrossdisc')
						
						->post('xqty')
						
						->post('xdisc')
						
						->post('xrate');
						
				$form	->submit();
				
			
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				$itemdetail = $this->model->getItemMaster("xitemcode",$data['xitemcode']);
								
				$hd = array (
					"xemail"=>Session::get('suser'),
					"zutime"=>date("Y-m-d H:i:s"),
					"xdate"=>$date,
					"xitemcode"=>$data['xitemcode'],
					"xcus"=>$data['xcus'],
					"xnotes"=>$data['xnotes'],
					"xgrossdisc"=>$data['xgrossdisc'],					
					"xquotnum"=>$data['xquotnum']
					
				);
				
				$dt = array (
					"xitemcode"=>$data['xitemcode'],
					"xqty"=>$data['xqty'],
					"xrate"=>$data['xrate'],
					"xdisc"=>$data['xdisc'],	
					"xtypestk"=>$itemdetail[0]['xtypestk'],
					"xdate"=>$date
				);
				
				$success = $this->model->edit($hd,$dt,$quotnum,$_POST['xrow']);
				
				//
				}catch(Exception $e){
					//echo $e->getMessage();die;
					$result = $e->getMessage();
					
				}
				//echo $result; die;
				if($result==""){
					if($success)
						$result = "Edited successfully"; 
					else
						$result = "Edit failed!";
				
				}
				
				 $this->showentry($quotnum, $result);
				
		
		}
		
		public function showquotation($quotnum, $row, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"New" => URL."salesquot/quotationentry"
		);
		
		$tblvalues = $this->model->getQuotation($quotnum);
		$tbldtvals = $this->model->getSingleQuotDt($quotnum, $row);
		//print_r($tbldtvals);die;
		$svbtn = "Update";
		$conf="";
		$sv=URL."salesquot/editquot";
		if(count($tblvalues)>0){	
			if($tblvalues[0]['xstatus']=="Created"){
				$conf=array("Confirm"=>URL."salesquot/confirmpost",
							"Approve"=>URL."salesquot/approvepost",
							
							);

			}
			if($tblvalues[0]['xstatus']=="Approved"){
				$conf=array(
							"Confirm"=>URL."salesquot/confirmpost",
							"Revise"=>URL."salesquot/createrevise",
							
							);
				$sv="";

			}
			if($tblvalues[0]['xstatus']=="Revised"){
				$conf=array("Confirm"=>URL."salesquot/confirmpost",
							"Approve"=>URL."salesquot/approvepost",
							
							);

			}			
			if($tblvalues[0]['xstatus']=="Confirmed"){
				$sv="";
				$conf=array("Cancel"=>URL."salesquot/cancelpost" );
				$milistone = $this->model->getQuotmilestone($quotnum); 
				if(count($milistone)>0){
					if(empty($milistone[0]['xsonum'])){
						$sv=URL."salesquot/createsales";
						$svbtn = "Create Sales";	
					}
				}
			}		
		}
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xquotnum"=>$tblvalues[0]['xquotnum'],					
					"xcus"=>$tblvalues[0]['xcus'],
					"xorg"=>$tblvalues[0]['xorg'],
					"xnotes"=>$tblvalues[0]['xnotes'],
					"xrefquot"=>$tblvalues[0]['xrefquot'],					
					"xgrossdisc"=>$tblvalues[0]['xgrossdisc'],
					"xitemcode"=>$tbldtvals[0]['xitemcode'],
					"xitemdesc"=>$tbldtvals[0]['xitemdesc'],
					"xqty"=>$tbldtvals[0]['xqty'],
					"xrow"=>$tbldtvals[0]['xrow'],
					"xrate"=>$tbldtvals[0]['xrate'],
					"xdiscpct"=>"0",
					"xdisc"=>$tbldtvals[0]['xdisc']
					);
		
			
		// form data
		
			
			$dynamicForm = new Dynamicformnew("Sales Quotation", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, $svbtn,$tblvalues, URL."salesquot/showpost",$conf);
			
			$this->view->table = $this->renderTable($quotnum);
			
			$this->view->renderpage('salesquot/quotationentry');
		}
		
		
		
		public function showentry($quotnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."salesquot/quotationentry"
		);
		
		$tblvalues = $this->model->getQuotation($quotnum);
		$svbtn = "Save";
		$conf="";
		$sv=URL."salesquot/savequot";
		if(count($tblvalues)>0){	
			if($tblvalues[0]['xstatus']=="Created"){
				$conf=array("Confirm"=>URL."salesquot/confirmpost",
							"Approve"=>URL."salesquot/approvepost",
							
							);

			}
			if($tblvalues[0]['xstatus']=="Approved"){
				$conf=array(
							"Confirm"=>URL."salesquot/confirmpost",
							"Revise"=>URL."salesquot/createrevise",
							
							);
				$sv="";

			}
			if($tblvalues[0]['xstatus']=="Revised"){
				$conf=array("Confirm"=>URL."salesquot/confirmpost",
							"Approve"=>URL."salesquot/approvepost",
							
							);

			}			
			if($tblvalues[0]['xstatus']=="Confirmed"){
				$sv="";
				$conf=array("Cancel"=>URL."salesquot/cancelpost" );
				$milistone = $this->model->getQuotmilestone($quotnum); 
				if(count($milistone)>0){
					if(empty($milistone[0]['xsonum'])){
						$sv=URL."salesquot/createsales";
						$svbtn = "Create Sales";	
					}
				}
			}		
		}
		$refquot = "";
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else{
			$refquot = $tblvalues[0]['xrefquot'];
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xquotnum"=>$tblvalues[0]['xquotnum'],
					"xcus"=>$tblvalues[0]['xcus'],
					"xorg"=>$tblvalues[0]['xorg'],
					"xnotes"=>$tblvalues[0]['xnotes'],
					"xgrossdisc"=>$tblvalues[0]['xgrossdisc'],
					"xrefquot"=>$tblvalues[0]['xrefquot'],
					"xitemcode"=>"",
					"xitemdesc"=>"",
					"xqty"=>"0",
					"xrow"=>"0",
					"xrate"=>"0",
					"xdiscpct"=>"0.000",
					"xdisc"=>"0.000"
					);
				}	
			$quothist = $this->model->getQuotationHistory($refquot); //print_r($quothist); die;		
			if($result==""){			

				if(!empty($quothist)){
						foreach($quothist as $k=>$v){
							$result .= '<a style="color:red" id="invnum" href="'.URL.'salesquot/showquot/'.$v["xquotnum"].'">Quotation - '.$v["xquotnum"].'</a><br/>';
							
						}
					}
			}
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicformnew("Sales Quotation", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, $svbtn,$tblvalues ,URL."salesquot/showpost",$conf,"","");
			
			$this->view->table = $this->renderTable($quotnum);
			
			$this->view->renderpage('salesquot/quotationentry');
		}
		
		function renderTable($quotnum){
			$tblvalues = $this->model->getQuotation($quotnum);
			$fields = array(
						"xrow-Sl",
						"xitemcode-Item Code",
						"xitemdesc-Description",
						"xqty-Quantity",
						"xrate-Rate",
						"xsalestotal-Total",
						"xdisctotal-Discount Total"
						);
			$table = new Datatable();
			$row = $this->model->getquotationdt($quotnum);
			
			$delbtn = "";
			if(count($tblvalues)>0){
			if($tblvalues[0]["xstatus"]=="Created")
				$delbtn = URL."salesquot/deletequot/".$quotnum."/";
			}
			return $table->myTable($fields, $row, "xrow", URL."salesquot/showquotation/".$quotnum."/", $delbtn);
			
			
		}
		
		
		function quotationlist($status){
			$rows = $this->model->getQuotationList($status);
			$cols = array("xdate-Date","xquotnum-Quotation No","xcus-Cusomer Code","xorg-Name");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xquotnum",URL."salesquot/showentry/",URL."salesquot/deletequotmst/".$status."/");
			$this->view->renderpage('salesquot/quotationlist', false);
		}
		
		function milestonelist(){
			$rows = $this->model->getAllQuotmilestone("Completed");
			$cols = array("xdate-Date","xquotnum-Quotation No","xcus-Cusomer Code","xorg-Name","xsonum-Sales Order");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xquotnum",URL."salesquot/showentry/");
			$this->view->renderpage('salesquot/quotationlist', false);
		}
		function milestonenotlist(){
			$rows = $this->model->getAllQuotmilestone("Not Completed");
			$cols = array("xdate-Date","xquotnum-Quotation No","xcus-Cusomer Code","xorg-Name");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xquotnum",URL."salesquot/showentry/");
			$this->view->renderpage('salesquot/quotationlist', false);
		}
		function quotationentry(){
				
		$btn = array(
			"Clear" => URL."salesquot/quotationentry"
		);

		// form data
		
		
			$dynamicForm = new Dynamicformnew("Sales Quotation",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."salesquot/savequot", "Save",$this->values, URL."salesquot/showpost");
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('salesquot/quotationentry', false);
		}
		
		
		public function showpost(){
		
		$quotnum = $_POST['xquotnum'];
			
		$tblvalues=array();
		
		$btn = array(
			"New" => URL."salesquot/quotationentry"
		);
		
		$tblvalues = $this->model->getQuotation($quotnum);
		$svbtn = "Save";
		$conf="";
		$sv=URL."salesquot/savequot";
		if(count($tblvalues)>0){	
			if($tblvalues[0]['xstatus']=="Created"){
				$conf=array("Confirm"=>URL."salesquot/confirmpost",
							"Approve"=>URL."salesquot/approvepost",
							
							);

			}
			if($tblvalues[0]['xstatus']=="Approved"){
				$conf=array(
							"Confirm"=>URL."salesquot/confirmpost",
							"Revise"=>URL."salesquot/createrevise",
							
							);
				$sv="";

			}
			if($tblvalues[0]['xstatus']=="Revised"){
				$conf=array("Confirm"=>URL."salesquot/confirmpost",
							"Approve"=>URL."salesquot/approvepost",
							
							);

			}			
			if($tblvalues[0]['xstatus']=="Confirmed"){
				$sv="";
				$conf=array("Cancel"=>URL."salesquot/cancelpost" );
				$milistone = $this->model->getQuotmilestone($quotnum); 
				if(count($milistone)>0){
					if(empty($milistone[0]['xsonum'])){
						$sv=URL."salesquot/createsales";
						$svbtn = "Create Sales";	
					}
				}
			}		
		}
		$refquot = "";
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else{
			$refquot = $tblvalues[0]['xrefquot'];
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xquotnum"=>$tblvalues[0]['xquotnum'],
					"xcus"=>$tblvalues[0]['xcus'],
					"xorg"=>$tblvalues[0]['xorg'],
					"xnotes"=>$tblvalues[0]['xnotes'],					
					"xgrossdisc"=>$tblvalues[0]['xgrossdisc'],
					"xrefquot"=>$tblvalues[0]['xrefquot'],
					"xitemcode"=>"",
					"xitemdesc"=>"",
					"xqty"=>"0",
					"xrow"=>"0",
					"xrate"=>"0",
					"xdisc"=>"0.000",
					"xdiscpct"=>"0.000"
					);
		}
			
		$result=="";
			
		$quothist = $this->model->getQuotationHistory($refquot); //print_r($quothist); die;		
					

				if(!empty($quothist)){
						foreach($quothist as $k=>$v){
							$result .= '<a style="color:red" id="invnum" href="'.URL.'salesquot/showquot/'.$v["xquotnum"].'">Quotation - '.$v["xquotnum"].'</a><br/>';
							
						}
					}
			
			
			
			$dynamicForm = new Dynamicformnew("Sales Quotation", $btn,$result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, $svbtn,$tblvalues, URL."salesquot/showpost",$conf);
			
			$this->view->table = $this->renderTable($quotnum);
			
			$this->view->renderpage('salesquot/quotationentry');
		}
		
		function showquot($quotation=""){
			
			$tblvalues = $this->model->getQuotation($quotation);
			//print_r($tblvalues);die;
			$this->view->xdate = $tblvalues[0]["xdate"];
			$this->view->xorg = $tblvalues[0]["xorg"];
			$this->view->xref = $tblvalues[0]["xquotnum"];
			$this->view->xaddress= $tblvalues[0]["xadd1"];
			$this->view->xphone = $tblvalues[0]["xphone"];
			$this->view->xnotes = $tblvalues[0]["xnotes"];
			$this->view->xgrossdisc = $tblvalues[0]["xgrossdisc"];
			
			$gtotal = 0;
			$gdisc =0;
			$detail = $this->model->getquotationdt($quotation);
			foreach($detail as $key=>$val){
				$gtotal += $val["xsalestotal"];
				$gdisc += $val["xdisctotal"];
			}
			$this->view->xgrossdisc = $tblvalues[0]["xgrossdisc"]+$gdisc;
			$cur = new Currency();
			$netotal = $gtotal-$tblvalues[0]["xgrossdisc"]+$gdisc;
			
			$this->view->inword= $cur->get_bd_amount_in_text($netotal);
			$this->view->rows=$this->model->getquotationdt($quotation);
			
			$this->view->renderpage('salesquot/quotation');
		}
		
		function confirmpost(){
				
				$quotnum = $_POST['xquotnum'];
				$disc = $_POST['xgrossdisc'];	
								
				$where = " bizid = ". Session::get('sbizid') ." and xquotnum = '". $quotnum ."'";
				
				$postdata=array(
					"xstatus" => "Confirmed",
					"xgrossdisc"=>$disc
					);	
				
				$this->model->confirm($postdata,$where);
				$tblvalues=array();
				$tblvalues = $this->model->getQuotation($quotnum);
				
				$result="Confirm Failed";
				
				if($tblvalues[0]['xstatus']=="Confirmed"){
					$result='Confirmed!<br/><a style="color:red" id="invnum" href="'.URL.'salesquot/showquot/'.$quotnum.'">Click To Print Quotation - '.$quotnum.'</a>';
				}
				$this->showentry($quotnum, $result);
		
		}

		function cancelpost(){
				
				$quotnum = $_POST['xquotnum'];
				$disc = $_POST['xgrossdisc'];	
								
				$where = " bizid = ". Session::get('sbizid') ." and xquotnum = '". $quotnum ."'";
				
				$postdata=array(
					"xstatus" => "Canceled"
					);	
				
				$this->model->confirm($postdata,$where);
				$tblvalues=array();
				$tblvalues = $this->model->getQuotation($quotnum);
				
				$result="Cancel Failed";
				
				if($tblvalues[0]['xstatus']=="Canceled"){
					$result='Qutaion Canceled!';
				}
				
				$this->showentry($quotnum, $result);
		
		}
		
		function deletequot($quot, $row){
			$tblvalues = $this->model->getQuotation($quot);
			$result = "";
			if(count($tblvalues)>0){
			if($tblvalues[0]["xstatus"]=="Created")
				$result = $this->model->recdelete(" where xquotnum='".$quot."' and xrow=".$row);
			}
			$this->showentry($quot, $result);
		}
		
		function deletequotmst($status,$quot){ 	
			$tblvalues = $this->model->getQuotmilestone($quot);
			$result = "";
			if(count($tblvalues)>0){ 
			if($tblvalues[0]["xstatus"]=="Created" || $tblvalues[0]["xstatus"]=="Confirmed" && empty($tblvalues[0]["xsonum"])){
				$result = $this->model->deletequot(" xquotnum='".$quot."'");
				
				}
			}
			$this->quotationlist($status);
		}
		
		function createsales(){
			$quotation = $_POST['xquotnum'];
			$yearoffset = Session::get('syearoffset');
			$dt = date("Y/m/d"); 
			$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
			$xyear = 0;
			$per = 0;	
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$per = $key;
					$xyear = $val;
				}	
				
			
			$voucher = $this->model->getKeyValue("somst","xvoucher","SINV".Session::get('suserrow')."-","6");
			$keyfieldval = $this->model->getKeyValue("somst","xsonum","SORD".Session::get('suserrow')."-","6");
			$tblvalues = $this->model->getQuotation($quotation);
			$detail = $this->model->getquotationitem($quotation);
			$data = array();
			$data['bizid']=Session::get('sbizid');
			$data['xsonum']=$keyfieldval;
			$data['xwh']=$tblvalues[0]['xwh'];
			$data['xbranch']=Session::get('sbranch');
			$data['xproj']=Session::get('sbranch');
			$data['xstatus']="Created";
			$data['xdate']=$date;
			$data['zemail']=Session::get('suser');
			$data['xcus']=$tblvalues[0]['xcus'];
			$data['xnotes']=$tblvalues[0]['xnotes'];
			$data['xquotnum']=$tblvalues[0]['xquotnum'];
			$data['xgrossdisc']=$tblvalues[0]['xgrossdisc'];
			$data['xyear']=$xyear;
			$data['xper']=$per;
			$data['xvoucher']=$voucher;
			
			
			$cols = "`bizid`,`xsonum`,`xquotnum`,`xrowquot`,`xrow`,`xitemcode`,`xitembatch`,`xqty`,`xdate`,`xrate`,`xwh`,`xbranch`,`xproj`,`xtaxrate`,`xdisc`,`xexch`,`xcur`,`xtaxcode`,`xtaxscope`,`zemail`,`xunitsale`,`xcus`,`xyear`,`xper`,`xcost`,xtypestk";
			
			$vals =	"";
			$i=0;
			foreach($detail as $key=>$value){
			
			$i++;	
				
				$vals .= "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $value['xquotnum'] ."',". $value['xrow'] .",". $i .",'". $value['xitemcode'] ."','". $value['xitemcode'] ."',
				'". $value['xqty'] ."','". $date ."','". $value['xrate'] ."','". $value['xwh'] ."','". Session::get('sbranch') ."','". Session::get('sbranch') ."','0','". $value['xdisc'] ."','1','BDT','None','None','".$value['zemail']."','None','". $value['xcus'] ."',".$xyear.",".$per.",'0','". $value['xtypestk'] ."'),";
				
			}
			
			$vals = rtrim($vals,",");
			
			$success = 0;
			
			$result = "";
			try{
			
			$success=$this->model->savesales($data,$cols,$vals);
			
			}catch(Exception $e){
				$$this->result = $e->getMessage();
			}
			if($success>0)
					$this->result = 'Sales Order Created<br><a style="color:red" id="invnum" href="'.URL.'sales/showinvoice/'.$keyfieldval.'">Click To Print Invoice - '.$keyfieldval.'</a><br/><a style="color:red" id="invnum" href="'.URL.'sales/showchalan/'.$keyfieldval.'">Click To Print Chalan - '.$keyfieldval.'</a>';
				
			if($success == 0 && empty($this->result))
				$this->result = "Failed to Create Sales Order! Reason: Could be Duplicate Account Code or system error!";
			
			header ('location: '.URL.'sales/showentry/'.$keyfieldval);
			exit();
		}

		function createrevise(){

				if($_POST['xquotnum']==""){
					return;
				}

				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
				$xyear = 0;
				$per = 0;
				$yearoffset = Session::get('syearoffset');
				$xyear = 0;
				$per = 0;	
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$per = $key;
					$xyear = $val;
				}	
				
				$xquotnum = $_POST['xquotnum'];
				$keyfieldval=$xquotnum;
				$form = new Form();
				$data = array();
				$success=0;
				$result = ""; 
						
				try{
					
				
				
				$form	->post('xcus')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xquotnum')
						->val('maxlength', 20)

						->post('xrefquot')
						->val('maxlength', 20)

						->post('xorg')
						
						->val('maxlength', 20)	

						->post('xnotes')						
						->val('maxlength', 20)
						
						->post('xgrossdisc');		
						
						
						
						
				$form	->submit();
				
				
					
				
				$data = $form->fetch();
				
				//
					$kv  = explode("-", $keyfieldval);
					//print_r($kv);echo count($kv); 
					if(count($kv)>1){
						$counter=$kv[1]+1;
						$keyfieldval = $kv[0]."-".$counter;
						
					}else{
						$keyfieldval = $data['xquotnum']."-1";
					}
				
				//echo $keyfieldval; die;
				$mstfields = "zemail,bizid,xquotnum,xlastquot,xrefquot,xdate,xstatus,xwh,xbranch,xproj,xcus,xnotes,xgrossdisc";

				$mstvalues =  "'" . Session::get('suser') . "'," . Session::get('sbizid') . ",'". $keyfieldval ."','". $xquotnum ."','". $_POST['xrefquot'] ."','". $date ."','Revised',
				'". Session::get('sbranch') ."','". Session::get('sbranch') ."','". Session::get('sbranch') ."','". $data['xcus'] ."','". $data['xnotes'] ."',".$data['xgrossdisc']."";
					
				$incols = "zemail,bizid,xquotnum,xdate,xcus,xrow,xitemcode,xitembatch,xwh,xbranch,xproj,xqty,xrate,xtaxrate,xdisc,xtaxcode,xtaxscope,xexch,xcur,xunitsale,xyear,xper,xtypestk";

				$frmcols = "zemail,bizid,'".$keyfieldval."',xdate,xcus,xrow,xitemcode,xitembatch,xwh,xbranch,xproj,xqty,xrate,xtaxrate,xdisc,xtaxcode,xtaxscope,xexch,xcur,xunitsale,xyear,xper,xtypestk";
				
				$success = $this->model->createrevise($mstfields, $mstvalues, $incols, $frmcols, "where xquotnum='".$xquotnum."'");
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				$quothist = $this->model->getQuotationHistory($data["xrefquot"]);
				if($success>0){
					
					if(!empty($quothist)){
						foreach($quothist as $k=>$v){
							$this->result .= '<a style="color:red" id="invnum" href="'.URL.'salesquot/showquot/'.$v["xquotnum"].'">Print Quotation - '.$v["xquotnum"].'</a><br/>';
						}
					}

					$where = " bizid = ". Session::get('sbizid') ." and xquotnum <> '". $keyfieldval ."' and xrefquot = '". $_POST["xrefquot"] ."'";	
				
					$postdt=array(
						"xstatus" => "Not Picked"
						);		
					$this->model->confirm($postdt, $where);
				}

					
				
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Sales Quotation! Reason: Could be Duplicate Code or system error!";
				
				 $this->showentry($keyfieldval, $this->result);
		}

		public function approvepost(){
			$quotnum=$_POST["xquotnum"];
			$refquotnum=$_POST["xrefquot"];
			$where = " bizid = ". Session::get('sbizid') ." and xquotnum = '". $quotnum ."'";
			$postdata=array(
					"xstatus" => "Approved"
					);
			$success = $this->model->confirm($postdata, $where);
			$result = "Approved!";
			$quothist = $this->model->getQuotationHistory($refquotnum); //print_r($quothist); die;
								
					if(!empty($quothist)){
						foreach($quothist as $k=>$v){
							$result .= ' <br/><a style="color:red" id="invnum" href="'.URL.'salesquot/showquot/'.$v["xquotnum"].'">Print Quotation - '.$v["xquotnum"].'</a>';
						}
					}else{
						$result .= ' <br/><a style="color:red" id="invnum" href="'.URL.'salesquot/showquot/'.$quotnum.'">Print Quotation - '.$quotnum.'</a><br/>';
					}
				
			
			$this->showentry($quotnum, $result);
		}
}