<?php
class Glchequeregister extends Controller{
	
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
				if($menus["xsubmenu"]=="Cheque Register")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/glchequeregister/js/getaccdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xsl"=>"0",
			"xdate"=>$dt,			
			"xchequeno"=>"",
			"xchequedate"=>$dt,
			"xcleardate"=>$dt,
			"xnarration"=>"",	
			"xacc"=>"",
			"xaccdesc"=>"",
			"xacctype"=>"",
			"xaccusage"=>"",
			"xaccsource"=>"",
			"xacccr"=>"",
			"xacccrdesc"=>"",
			"xacccrtype"=>"",
			"xacccrusage"=>"",
			"xacccrsource"=>"",
			"xaccsub"=>"",
			"xaccsubdesc"=>"",
			"xcus"=>"",
			"xorg"=>"",
			"xsup"=>"",
			"xsuporg"=>"",
			"xaccsubcr"=>"",
			"xaccsubdesccr"=>"",
			"xcuscr"=>"",
			"xorgcr"=>"",
			"xsupcr"=>"",
			"xsuporgcr"=>"",
			"xcur"=>"BDT",
			"xprime"=>"0",
			"xsite"=>"",
			"xoptype"=>"Receive",
			);
			
			$this->fields = array(array(
							"xdate-datepicker" => 'Date_""',
							"xchequedate-datepicker" => 'Cheque Date_""',
							"xchequeno-text"=>'Cheque No_',
							"xsite-select_Project"=>'Project_maxlength="20"',
							),array(
							
							"xnarration-textarea"=>'Narration_maxlength="160"',
							),
						array(
							"xacc-group_".URL."glchart/glchartpicklist"=>'Debit Account_maxlength="20"',
							"xaccdesc-text"=>'Account Desc_readonly',
							"xacctype-hidden"=>'',
							"xaccusage-hidden"=>'',
							"xaccsource-hidden"=>''
							),
						array(
							"xaccsub-group_".URL."glchart/glchartpicklist"=>'Sub Account*~star_maxlength="20"',
							"xaccsubdesc-text"=>'Sub Description*~star_readonly'
							),
						array(
							"xcus-group_".URL."jsondata/customerpicklist"=>'Customer Code*~star_maxlength="20"',
							"xorg-text"=>'Customer Name*~star_maxlength="100" readonly'
							),
						array(
							"xsup-group_".URL."jsondata/supplierpicklist"=>'Supplier Code*~star_maxlength="20"',
							"xsuporg-text"=>'Name*~star_maxlength="100" readonly'
							),
						array(
							"xacccr-group_".URL."glchequeregister/glcrchartpicklist"=>'Credit Account_maxlength="20"',
							"xacccrdesc-text"=>'Account Desc_readonly',
							"xacccrtype-hidden"=>'',
							"xacccrusage-hidden"=>'',
							"xacccrsource-hidden"=>''
							),
						array(
							"xaccsubcr-group_".URL."glchart/glchartpicklist"=>'Sub Account*~star_maxlength="20"',
							"xaccsubdesccr-text"=>'Sub Description*~star_readonly'
							),
						array(
							"xcuscr-group_".URL."jsondata/customercrpicklist"=>'Customer Code*~star_maxlength="20"',
							"xorgcr-text"=>'Customer Name*~star_maxlength="100" readonly'
							),
						array(
							"xsupcr-group_".URL."jsondata/suppliercrpicklist"=>'Supplier Code*~star_maxlength="20"',
							"xsuporgcr-text"=>'Name*~star_maxlength="100" readonly'
							),
						array(
							"xprime-text_number"=>'Balance_number="true" minlength="1" maxlength="18" required',
							"xcur-select_Currency"=>'Currency'
							)
						,
						array(
							
							"xoptype-radio_Receive_Payment"=>'',
							"xsl-hidden"=>''
							)
						);
						
								
		}
		
		public function index(){
		
		
			$this->view->rendermainmenu('glchequeregister/index');
			
		}
		
		public function savecheque(){
				
				
				
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));

				$xchequedate = $_POST['xchequedate'];
				$chqdt = str_replace('/', '-', $xchequedate);
				$chequedate = date('Y-m-d', strtotime($chqdt));
						
				
				
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				$fsubacc="";
				$fsubaccdesc="";
				$fsubacccr="";
				$fsubacccrdesc="";	
				if($_POST['xaccsource']=="Sub Account")
					$fsubacc = 	$_POST['xaccsub'];
				if($_POST['xaccsource']=="Customer")
					$fsubacc = 	$_POST['xcus'];
				if($_POST['xaccsource']=="Supplier")
					$fsubacc = 	$_POST['xsup'];	
				
				if($_POST['xacccrsource']=="Sub Account")
					$fsubacccr = 	$_POST['xaccsubcr'];
				if($_POST['xacccrsource']=="Customer")
					$fsubacccr = 	$_POST['xcuscr'];
				if($_POST['xacccrsource']=="Supplier")
					$fsubacccr = 	$_POST['xsupcr'];	
				
				try{
					if($_POST['xaccsource']=="Sub Account") {
						$sccsub = $this->model->getSubacc($_POST['xaccsub']);
						$fsubaccdesc=$_POST['xaccsubdesc'];
						if(count($sccsub)==0)
							throw new Exception("Invalid Subaccount code!");
					}
					if($_POST['xaccsource']=="Customer") {
						$fsubaccdesc=$_POST['xorg'];
						$cus = $this->model->getCustomer($_POST['xcus']);
						if(count($cus)==0)
							throw new Exception("Invalid Customer code!");
					}					
					if($_POST['xaccsource']=="Supplier"){
						$fsubaccdesc=$_POST['xsuporg'];
						$sup = $this->model->getSupplier($_POST['xsup']);
						if(count($sup)==0)
							throw new Exception("Invalid Supplier code!");
					}
					if($_POST['xacccrsource']=="Sub Account") {
						$fsubacccrdesc = $_POST['xaccsubdesccr'];
						$sccsub = $this->model->getSubacc($_POST['xaccsubcr']);
						if(count($sccsub)==0)
							throw new Exception("Invalid Subaccount code for credit account!");
					}
					if($_POST['xacccrsource']=="Customer") {
						$fsubacccrdesc = $_POST['xorgcr'];
						$cus = $this->model->getCustomer($_POST['xcuscr']);
						if(count($cus)==0)
							throw new Exception("Invalid Customer code for credit account!");
					}					
					if($_POST['xacccrsource']=="Supplier"){
						$fsubacccrdesc = $_POST['xsuporgcr'];
						$sup = $this->model->getSupplier($_POST['xsupcr']);
						if(count($sup)==0)
							throw new Exception("Invalid Supplier code for credit account!");
					}
				$form	->post('xacccr')
						->val('minlength', 1)
						->val('maxlength', 20)

						->post('xacccrdesc')
						
						->post('xacccrtype')
						
						->post('xacccrusage')
						
						->post('xacccrsource')
				
						->post('xnarration')
				
						->post('xacc')
						->val('minlength', 1)
						->val('maxlength', 20)

						->post('xaccdesc')
						
						->post('xoptype')
						
						->post('xacctype')
						
						->post('xaccusage')
						
						->post('xaccsource')
						
						->post('xchequeno')
				
						->post('xsite')
												
						->post('xnarration')
				
						->post('xprime')
						->val('minlength', 1)
						->val('maxlength', 18)
						->val('checkdouble')
						
						
						->post('xcur')
						->val('maxlength', 20);
						
						
				$form	->submit();
				
				$data = $form->fetch();

				if($data['xoptype']=="Receive" && $data['xaccusage']<>"Bank")
					throw new Exception("Select Bank to Debit Account!");
				if($data['xoptype']=="Payment" && $data['xacccrusage']<>"Bank")
					throw new Exception("Select Bank to Credit Account!");

				
				$balinterim = "-";
				$typeinterim = "";
				$bal = "";
				$type = "";
				
				if($data['xprime']<=0){
					throw new Exception("Amount Cannot be 0 or less!");
				}
				
								
				if($data['xcur']=="")
					$data['xcur']="BDT";
				
				
								
					
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');				
				$data['xdate'] = $date;
				$data['xchequedate'] = $chequedate;
				$data['xbranch'] = Session::get('sbranch');				
				$data['xstatus'] = "Created";
				$data['xaccsub'] = $fsubacc;
				$data['xaccsubdesc'] = $fsubaccdesc;
				$data['xaccsubcr'] = $fsubacccr;
				$data['xaccsubdesccr'] = $fsubacccrdesc;
				
				
							
				$success = $this->model->create($data);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					$this->result = 'Cheque Registered!';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Register cheque! Reason: Could be Duplicate Transaction or system error!";
				//echo $success; die;
				 $this->chequeentry($this->result);
				 
				 
				
		}


		public function editcheque(){
				
				
				
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));

				$xchequedate = $_POST['xchequedate'];
				$chqdt = str_replace('/', '-', $xchequedate);
				$chequedate = date('Y-m-d', strtotime($chqdt));
						
				
				
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				$fsubacc="";
				$fsubaccdesc="";
				$fsubacccr="";
				$fsubacccrdesc="";	
				if($_POST['xaccsource']=="Sub Account")
					$fsubacc = 	$_POST['xaccsub'];
				if($_POST['xaccsource']=="Customer")
					$fsubacc = 	$_POST['xcus'];
				if($_POST['xaccsource']=="Supplier")
					$fsubacc = 	$_POST['xsup'];	
				
				if($_POST['xacccrsource']=="Sub Account")
					$fsubacccr = 	$_POST['xaccsubcr'];
				if($_POST['xacccrsource']=="Customer")
					$fsubacccr = 	$_POST['xcuscr'];
				if($_POST['xacccrsource']=="Supplier")
					$fsubacccr = 	$_POST['xsupcr'];	
				
				try{

					if($_POST['xsl']<1)
						throw new Exception("Could not execute! No transaction found!");

					if($_POST['xaccsource']=="Sub Account") {
						$sccsub = $this->model->getSubacc($_POST['xaccsub']);
						$fsubaccdesc=$_POST['xaccsubdesc'];
						if(count($sccsub)==0)
							throw new Exception("Invalid Subaccount code!");
					}
					if($_POST['xaccsource']=="Customer") {
						$fsubaccdesc=$_POST['xorg'];
						$cus = $this->model->getCustomer($_POST['xcus']);
						if(count($cus)==0)
							throw new Exception("Invalid Customer code!");
					}					
					if($_POST['xaccsource']=="Supplier"){
						$fsubaccdesc=$_POST['xsuporg'];
						$sup = $this->model->getSupplier($_POST['xsup']);
						if(count($sup)==0)
							throw new Exception("Invalid Supplier code!");
					}
					if($_POST['xacccrsource']=="Sub Account") {
						$fsubacccrdesc = $_POST['xaccsubdesccr'];
						$sccsub = $this->model->getSubacc($_POST['xaccsubcr']);
						if(count($sccsub)==0)
							throw new Exception("Invalid Subaccount code for credit account!");
					}
					if($_POST['xacccrsource']=="Customer") {
						$fsubacccrdesc = $_POST['xorgcr'];
						$cus = $this->model->getCustomer($_POST['xcuscr']);
						if(count($cus)==0)
							throw new Exception("Invalid Customer code for credit account!");
					}					
					if($_POST['xacccrsource']=="Supplier"){
						$fsubacccrdesc = $_POST['xsuporgcr'];
						$sup = $this->model->getSupplier($_POST['xsupcr']);
						if(count($sup)==0)
							throw new Exception("Invalid Supplier code for credit account!");
					}
				$form	->post('xacccr')
						->val('minlength', 1)
						->val('maxlength', 20)

						->post('xacccrdesc')
						
						->post('xacccrtype')
						
						->post('xacccrusage')
						
						->post('xacccrsource')
				
						->post('xnarration')
				
						->post('xacc')
						->val('minlength', 1)
						->val('maxlength', 20)

						->post('xaccdesc')
						
						->post('xoptype')
						
						->post('xacctype')
						
						->post('xaccusage')
						
						->post('xaccsource')
						
						->post('xchequeno')
				
						->post('xsite')
												
						->post('xnarration')
				
						->post('xprime')
						->val('minlength', 1)
						->val('maxlength', 18)
						->val('checkdouble')
						
						->post('xsl')

						->post('xcur')
						->val('maxlength', 20);
						
						
				$form	->submit();
				
				$data = $form->fetch();
				
				$balinterim = "-";
				$typeinterim = "";
				$bal = "";
				$type = "";
				
				if($data['xprime']<=0){
					throw new Exception("Amount Cannot be 0 or less!");
				}
				
								
				if($data['xcur']=="")
					$data['xcur']="BDT";
				
				
								
					
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');				
				$data['xdate'] = $date;
				$data['xchequedate'] = $chequedate;
				$data['xbranch'] = Session::get('sbranch');				
				$data['xstatus'] = "Created";
				$data['xaccsub'] = $fsubacc;
				$data['xaccsubdesc'] = $fsubaccdesc;
				$data['xaccsubcr'] = $fsubacccr;
				$data['xaccsubdesccr'] = $fsubacccrdesc;
				
				
							
				$success = $this->model->edit($data);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					$this->result = 'Cheque updated!';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to update cheque! Reason: Could be Duplicate Transaction or system error!";
				//echo $success; die;
				 $this->chequeentry($success, $this->result);
				 
				 
				
		}
		
		
		public function showentry($txn, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."glchequeregister/chequeentry"
		);
		
		$tblvalues = $this->model->getChequeRegister($txn);
		//print_r($tblvalues); die;
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else{
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xchequeno"=>$tblvalues[0]['xchequeno'],
					"xchequedate"=>$tblvalues[0]['xchequedate'],
					"xsl"=>$tblvalues[0]['xsl'],
					"xnarration"=>$tblvalues[0]['xnarration'],
					"xsite"=>$tblvalues[0]['xsite'],
					"xacc"=>$tblvalues[0]['xacc'],
					"xaccdesc"=>$tblvalues[0]['xaccdesc'],
					"xacctype"=>$tblvalues[0]['xacctype'],
					"xaccusage"=>$tblvalues[0]['xaccusage'],
					"xaccsource"=>$tblvalues[0]['xaccsource'],
					"xacccr"=>$tblvalues[0]['xacccr'],
					"xacccrdesc"=>$tblvalues[0]['xacccrdesc'],
					"xacccrtype"=>$tblvalues[0]['xacccrtype'],
					"xacccrusage"=>$tblvalues[0]['xacccrusage'],
					"xacccrsource"=>$tblvalues[0]['xacccrsource'],
					"xcur"=>$tblvalues[0]['xcur'],
					"xprime"=>$tblvalues[0]['xprime'],
					"xaccsub"=>$tblvalues[0]['xaccsub'],
					"xaccsubdesc"=>$tblvalues[0]['xaccsubdesc'],
					"xaccsubcr"=>$tblvalues[0]['xaccsubcr'],
					"xaccsubdesccr"=>$tblvalues[0]['xaccsubdesccr'],
					"xcus"=>"",
					"xorg"=>"",					
					"xsup"=>"",
					"xsuporg"=>"",
					"xcuscr"=>"",
					"xorgcr"=>"",					
					"xsupcr"=>"",
					"xsuporgcr"=>"",
					"xoptype"=>$tblvalues[0]['xoptype'],						
					);
		

		if($tblvalues['xaccsource']=="Customer"){
			$tblvalues["xcus"]=$tblvalues["xaccsub"];
			$tblvalues["xorg"]=$tblvalues["xaccsubdesc"];
		}
		if($tblvalues['xaccsource']=="Sub Account"){
			$tblvalues["xaccsub"]=$tblvalues["xaccsub"];
			$tblvalues["xaccsubdesc"]=$tblvalues["xaccsubdesc"];
		}
		if($tblvalues['xaccsource']=="Supplier"){
			$tblvalues["xsup"]=$tblvalues["xaccsub"];
			$tblvalues["xsuporg"]=$tblvalues["xaccsubdesc"];
		}

		if($tblvalues['xacccrsource']=="Customer"){
			$tblvalues["xcuscr"]=$tblvalues["xaccsubcr"];
			$tblvalues["xorgcr"]=$tblvalues["xaccsubdesccr"];
			
		}
		if($tblvalues['xacccrsource']=="Sub Account"){
			$tblvalues["xaccsubcr"]=$tblvalues["xaccsubcr"];
			$tblvalues["xaccsubdesccr"]=$tblvalues["xaccsubdesccr"];
		}
		if($tblvalues['xacccrsource']=="Supplier"){
			$tblvalues["xsupcr"]=$tblvalues["xaccsubcr"];
			$tblvalues["xsuporgcr"]=$tblvalues["xaccsubdesccr"];
		}
	}
			
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Cheque Register", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createFormVoucher($this->fields, URL."glchequeregister/editcheque", "Update",$tblvalues);
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('glchequeregister/chequeentry');
		}

		function bounced($sl=0){

			$postdata=array(
			"xstatus" => "Bounced"			
			);
			
		$where = " bizid = ". Session::get('sbizid') ." and xsl = ". $sl ;
		$this->model->recupdate("glchequereg",$postdata, $where);	
		$this->chequeentry();
		}

		function confirm($sl=0){
			$rows = $this->model->getChequeRegister($sl);
				
				$yearoffset = Session::get('syearoffset');
				$xdate = date("Y/m/d");
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
				$xyear = 0;
				$per = 0;
				
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$per = $key;
					$xyear = $val;
				}
				$data = array();
				if(!empty($rows)){
					$prefix = "CLPA";
					if($rows[0]['xoptype']=="Receive"){
						$prefix = "CLRC";
					}
					
					$keyfieldval = $this->model->getKeyValue("glheader","xvoucher",$prefix,"6");
					$data = array(
						'bizid'=>Session::get('sbizid'),
						'zemail' => Session::get('suser'),
						'xyear' => $xyear,
						'xper' => $per,
						'xvoucher' => $keyfieldval,
						'xdate' => $date,
						'xbranch' => Session::get('sbranch'),
						'xdoctype' => "Clearing Cheque",				
						'xdocnum' => $rows[0]['xsl'],
						'xnarration' => $rows[0]['xnarration'],
						'xsite' => $rows[0]['xsite'],
					);

					$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,
				`xexch`,`xprime`,xflag";
				
				$vals = "(" . Session::get('sbizid') . ",'". $keyfieldval ."','1','". $rows[0]['xacc'] ."','". $rows[0]['xacctype'] ."','". $rows[0]['xaccusage'] ."','".$rows[0]['xaccsource']."','". $rows[0]['xaccsub'] ."','". $rows[0]['xcur'] ."',
				'". $rows[0]['xprime'] ."','1','". $rows[0]['xprime'] ."','Debit'),
				(" . Session::get('sbizid') . ",'". $keyfieldval ."','2','". $rows[0]['xacccr'] ."',
				'". $rows[0]['xacccrtype'] ."','". $rows[0]['xacccrusage'] ."','". $rows[0]['xacccrsource'] ."','". $rows[0]['xaccsubcr'] ."','". $rows[0]['xcur'] ."',
				'-". $rows[0]['xprime'] ."','1','-". $rows[0]['xprime'] ."','Credit')";

				$success=0;
				$success = $this->model->confirmcheque($data, $cols, $vals);

					if($success>0){

						$postdata=array(
						"xstatus" => "Cleared",
						"xvoucher" => $keyfieldval,			
						);
						
					$where = " bizid = ". Session::get('sbizid') ." and xsl = ". $sl ;
					
					$this->model->recupdate("glchequereg",$postdata, $where);	
					

					}


				}

				$this->chequeentry();
		}
		
		function renderTable(){
			$tblsettings = array(
							"columns"=>array(0=>"SL",1=>"Date",2=>"Cheque No",3=>"Cheque Date",4=>"Paid To Code",5=>"Paid To Name",6=>"Received From Code",7=>"Received From Name",8=>"Account Credited",9=>"Account Debited",10=>"Amount"),
							"buttons"=>array("Show"=>URL."glchequeregister/showentry/","Cleared"=>URL."glchequeregister/confirm/","Bounced"=>URL."glchequeregister/bounced/"),
							"urlvals"=>array("xsl"),
							"sumfields"=>array(),
							);

			
			$table = new ReportingTable();
			$row = $this->model->getChequeRegisterAll("'Created'");
			return $table->reportingtbl($tblsettings,$row);
			
			
			
		}
			
		
		function chequeentry($result=""){
				
		$btn = array(
			"Clear" => URL."glchequeregister/chequeentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Cheque Register",$btn, $result);		
			
			$this->view->dynform = $dynamicForm->createFormVoucher($this->fields, URL."glchequeregister/savecheque", "Save",$this->values);
			
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('glchequeregister/chequeentry', false);
		}
		
		
		function glcrchartpicklist(){
			$this->view->table = $this->glchartPickTable();
			
			$this->view->renderpage('glchart/glchartpicklist', false);
		}
		function glchartPickTable(){
			$fields = array(
						"xacccr-Account Code",
						"xdesc-Account Description",
						"xacctype-Account Type",
						"xaccusage-Use Of The Account",
						"xaccsource-Account Source"
						);
			$table = new Datatable();
			$row = $this->model->getGlchartByLimit();
			
			return $table->picklistTable($fields, $row, "xacccr");
		}
		
	
	}