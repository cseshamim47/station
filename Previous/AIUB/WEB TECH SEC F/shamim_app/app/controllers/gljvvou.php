<?php
class Gljvvou extends Controller{
	
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
				if($menus["xsubmenu"]=="Journal Voucher")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/gljvvou/js/getaccdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"xvoucher"=>"",
			"xnarration"=>"",
			"xacc"=>"",
			"xaccdesc"=>"",
			"xacctype"=>"",
			"xaccusage"=>"",
			"xaccsource"=>"",
			"xrow"=>"0",
			"xaccsub"=>"",
			"xaccsubdesc"=>"",
			"xcur"=>"BDT",
			"xprime"=>"0",
			"xprimecr"=>"0",
			"xcus"=>"",
			"xorg"=>"",
			"xsup"=>"",
			"xsuporg"=>"",
			"xsite"=>"",
			"prefix"=>""
			);
			
			$this->fields = array(array(
								"prefix-select_GL Prefix"=>'Voucher Type_maxlength="4"',
								"xdate-datepicker" => 'Date_""',
								"xvoucher-group_".URL."gljvvou/gljvvoupicklist"=>'Voucher No_maxlength="20"',
							"xsite-select_Project"=>'Project_maxlength="20"',
							),
						array(
							
							"xnarration-textarea"=>'Narration_maxlength="160"',
							),
						array(
							"xacc-group_".URL."jsondata/glchartpicklist"=>'Account_maxlength="20"',
							"xaccdesc-text"=>'Account Desc_readonly',
							"xacctype-hidden"=>'',
							"xaccusage-hidden"=>'',
							"xaccsource-hidden"=>'',
							"xrow-hidden"=>''
							),
						array(
							"xaccsub-group_".URL."jsondata/glchartpicklist"=>'Sub Account*~star_maxlength="20"',
							"xaccsubdesc-text"=>'Sub Description_readonly'
							),
						array(
							"xcus-group_".URL."jsondata/customerpicklist"=>'Customer Code*~star_maxlength="20"',
							"xorg-text"=>'Customer Name*~star_maxlength="100"'
							),
						array(
							"xsup-group_".URL."jsondata/supplierpicklist"=>'Supplier Code*~star_maxlength="20"',
							"xsuporg-text"=>'Supplier Name*~star_maxlength="100"'
							),
						array(
							"xprime-text_number"=>'Amount Dr._number="true" minlength="1" maxlength="18" required',
							"xprimecr-text_number"=>'Amount Cr._number="true" minlength="1" maxlength="18" required',
							),
						array(
							"xcur-select_Currency"=>'Currency'
							)
						);
						
								
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."gljvvou/gljvvouentry",
		);	
		
		
		// form data
		
			$dynamicForm = new Dynamicform("GL Voucher",$btn);		
			
			$this->view->dynform = $dynamicForm->createFormVoucher($this->fields, URL."gljvvou/savegljvvou", "Save",$this->values,URL."gljvvou/showpost");
			
			$this->view->table = $this->renderTable("");
			
			$this->view->rendermainmenu('gljvvou/index');
			
		}
		
		public function savegljvvou(){
				if (empty($_POST['xacc']) || empty($_POST['xprime'])){
					header ('location: '.URL.'gljvvou/gljvvouentry');
					exit;
				}
				$prefix = $_POST['prefix'].Session::get('suserrow');
				$yearoffset = Session::get('syearoffset');
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
				$xyear = 0;
				$per = 0;
				//print_r($this->model->getYearPer($yearoffset,intval($month))); die;
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$per = $key;
					$xyear = $val;
				}
				$xvoucher = $_POST['xvoucher'];
				$keyfieldval="0";
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				$fsubacc = "";
				
				if($_POST['xaccsource']=="Sub Account")
					$fsubacc = 	$_POST['xaccsub'];
				if($_POST['xaccsource']=="Customer")
					$fsubacc = 	$_POST['xcus'];
				if($_POST['xaccsource']=="Supplier")
					$fsubacc = 	$_POST['xsup'];	
				
				try{
					if($_POST['xaccsource']=="Sub Account") {
						$sccsub = $this->model->getSubacc($_POST['xaccsub']);
						if(count($sccsub)==0)
							throw new Exception("Invalid Subaccount code!");
					}
					if($_POST['xaccsource']=="Customer") {
						$cus = $this->model->getCustomer($_POST['xcus']);
						if(count($cus)==0)
							throw new Exception("Invalid Customer code!");
					}					
					if($_POST['xaccsource']=="Supplier"){
						$sup = $this->model->getSupplier($_POST['xsup']);
						if(count($sup)==0)
							throw new Exception("Invalid Supplier code!");
					}
				
				$form	->post('xacc')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xvoucher')

						->post('xsite')	
				
						->post('xnarration')
						//->val('minlength', 1)
						->val('maxlength', 250)
						
						->post('xacctype')
						
						->post('xaccusage')
						
						->post('xaccsource')
						
						
				
						->post('xprime')
						->val('minlength', 1)
						->val('maxlength', 18)
						
						->post('xprimecr')
						->val('minlength', 1)
						->val('maxlength', 18)
						
						->post('xcur')
						->val('maxlength', 20);
						
						
				$form	->submit();
				
				$data = $form->fetch();
				
				$data['xaccsub']=$fsubacc;
				
				if($data['xcur']=="")
					$data['xcur']="BDT";
				
				$flag = "Debit";
				$prime = 0;
				if($data['xprime']>0)
					$prime = $data['xprime'];
				if($data['xprimecr']>0){
					$prime = "-".$data['xprimecr'];
					$flag = "Credit";
				}
				
				if($data['xvoucher'] == "")
					$keyfieldval = $this->model->getKeyValue("glheader","xvoucher",$prefix,"6");
				else
					$keyfieldval = $data['xvoucher'];
				
				if($data['xaccsource'] == "Sub Account" && $data['xaccsub']==""){
					throw new Exception("Sub Account Code Not Found!");
				}
					
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['xyear'] = $xyear;
				$data['xper'] = $per;
				$data['xvoucher'] = $keyfieldval;
				$data['xdate'] = $date;
				$data['xbranch'] = Session::get('sbranch');;
				$data['xdoctype'] = "GL Voucher";
				$data['xdocnum'] = $keyfieldval;
				
				$rownum = $this->model->getRow("gldetail","xvoucher",$data['xvoucher'],"xrow");
				
				$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,
				`xexch`,`xprime`,xflag";
				
				$vals = "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $rownum ."','". $data['xacc'] ."',
				'". $data['xacctype'] ."','". $data['xaccusage'] ."','". $data['xaccsource'] ."','". $data['xaccsub'] ."','". $data['xcur'] ."',
				'". $prime ."','1','". $prime ."','". $flag ."')";
				
				//print_r($data);die;				
				$success = $this->model->create($data, $cols, $vals);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					$keyfieldval = $_POST['xvoucher'];
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					$this->result = 'Voucher Created</br><a style="color:red" id="invnum" href="'.URL.'glrpt/glvoucher/Journal/'.$keyfieldval.'">Click To Print Voucher - '.$keyfieldval.'</a>';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Voucher! Reason: Could be Duplicate Account Code or system error!";
				
				 $this->showentry($keyfieldval, $this->result);			 
				 
				
		}
		
		public function editglvoucher(){
			
			if (!isset($_POST['xvoucher']) || empty($_POST['xvoucher'])){
					header ('location: '.URL.'gljvvou/gljvvouentry');
					exit;
				}
			$result = "";
			
			$hd = array();
			$dt = array();
			
				$yearoffset = Session::get('syearoffset');
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
				$xyear = 0;
				$per = 0;
				//print_r($this->model->getYearPer($yearoffset,intval($month))); die;
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$per = $key;
					$xyear = $val;
				}	
			
			
			$fsubacc = "";
				
				if($_POST['xaccsource']=="Sub Account")
					$fsubacc = 	$_POST['xaccsub'];
				if($_POST['xaccsource']=="Customer")
					$fsubacc = 	$_POST['xcus'];
				if($_POST['xaccsource']=="Supplier")
					$fsubacc = 	$_POST['xsup'];		
				
			
			$success=false;
			$voucher = $_POST['xvoucher'];
			$form = new Form();
				$data = array();
				
				try{
				
				    
						$sccacc = $this->model->getAccountDt($_POST['xacc']);
						if(count($sccacc)==0)
							throw new Exception("Invalid Account code!");
					
					if($_POST['xaccsource']=="Sub Account") {
						$sccsub = $this->model->getSubacc($_POST['xaccsub']);
						if(count($sccsub)==0)
							throw new Exception("Invalid Subaccount code!");
					}
					if($_POST['xaccsource']=="Customer") {
						$cus = $this->model->getCustomer($_POST['xcus']);
						if(count($cus)==0)
							throw new Exception("Invalid Customer code!");
					}					
					if($_POST['xaccsource']=="Supplier"){
						$sup = $this->model->getSupplier($_POST['xsup']);
						if(count($sup)==0)
							throw new Exception("Invalid Supplier code!");
					}
				
				$form	->post('xvoucher')
						->val('minlength', 7)
						->val('maxlength', 20)
						
						->post('xsite')
										
				
						->post('xnarration')
						//->val('minlength', 1)
						->val('maxlength', 160)
						
						->post('xacc')
						->val('minlength', 1)
						->val('maxlength', 20)
						
												
						->post('xacctype')
						
						->post('xaccusage')
						
						->post('xaccsource')
						
						->post('xrow')
						
						
				
						->post('xprime')
						->val('minlength', 1)
						->val('maxlength', 18)
						
						->post('xprimecr')
						->val('minlength', 1)
						->val('maxlength', 18)
						
						->post('xcur')
						->val('maxlength', 20);
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				$data['xaccsub']=$fsubacc;
				if($data['xcur']=="")
					$data['xcur']="BDT";
				
				$flag = "Debit";
				$prime = 0;
				if($data['xprime']>0)
					$prime = $data['xprime'];
				if($data['xprimecr']>0){
					$prime = "-".$data['xprimecr'];
					$flag = "Credit";
				}
				
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
				$data['xyear'] = $xyear;
				$data['xper'] = $per;
				$data['xdate'] = $date;
				$voucher = $data['xvoucher'];
				$accdt = $this->model->getAccountDt($data['xacc']);
				
				$hd = array (
					"xemail"=>$data['xemail'],
					"xsite"=>$data['xsite'],
					"zutime"=>$data['zutime'],
					"xyear"=>$data['xyear'],
					"xper"=>$data['xper'],
					"xdate"=>$data['xdate'],
					"xnarration"=>$data['xnarration']					
				);
				
				$dt = array (
					"zutime"=>$data['zutime'],
					"xacc"=>$data['xacc'],
					"xacctype"=>$accdt[0]['xacctype'],
					"xaccusage"=>$accdt[0]['xaccusage'],
					"xaccsource"=>$accdt[0]['xaccsource'],
					"xaccsub"=>$data['xaccsub'],
					"xprime"=>$prime,
					"xflag"=>$flag,
					"xcur"=>$data['xcur']
				);
				
				$success = $this->model->editglvoucher($hd,$dt,$voucher,$data['xrow']);
				
				
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
				
				 $this->showentry($voucher, $result);
				
		
		}
		
		public function showgljvvou($voucher, $row, $result=""){
		if($voucher=="" || $row==""){
			header ('location: '.URL.'gljvvou/gljvvouentry');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."gljvvou/gljvvouentry"
		);
		
		$tblvalues = $this->model->getVoucherHeader($voucher);
		$tbldtvals = $this->model->getSingleVoucherDt($voucher, $row);
		
		$prime = 0;
		$primecr = 0;

			if($tbldtvals[0]['xprime']>0)
				$prime = $tbldtvals[0]['xprime'];
			if($tbldtvals[0]['xprime']<0)
				$primecr = $tbldtvals[0]['xprime'];
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xvoucher"=>$tblvalues[0]['xvoucher'],
					"xnarration"=>$tblvalues[0]['xnarration'],
					"xsite"=>$tblvalues[0]['xsite'],
					"xacc"=>$tbldtvals[0]['xacc'],
					"xaccdesc"=>$tbldtvals[0]['xaccdesc'],
					"xacctype"=>$tbldtvals[0]['xacctype'],
					"xaccusage"=>$tbldtvals[0]['xaccusage'],
					"xaccsource"=>$tbldtvals[0]['xaccsource'],
					"xrow"=>$tbldtvals[0]['xrow'],
					"xaccsub"=>$tbldtvals[0]['xaccsub'],
					"xaccsubdesc"=>$tbldtvals[0]['xaccsubdesc'],
					"xcus"=>$tbldtvals[0]['xaccsub'],
					"xorg"=>$tbldtvals[0]['xaccsubdesc'],
					"xsup"=>$tbldtvals[0]['xaccsub'],
					"xsuporg"=>$tbldtvals[0]['xaccsubdesc'],
					"xcur"=>$tbldtvals[0]['xcur'],
					"xprime"=>$prime,
					"xprimecr"=>abs($primecr)
					);
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Journal Voucher", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createFormVoucher($this->fields, URL."gljvvou/savegljvvou/", "Save",$tblvalues, URL."gljvvou/showpost", URL."gljvvou/editglvoucher");
			
			$this->view->table = $this->renderTable($voucher);
			
			$this->view->renderpage('gljvvou/gljvvouentry');
		}
		
		
		
		public function showentry($voucher, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."gljvvou/gljvvouentry"
		);
		
		$tblvalues = $this->model->getVoucherHeader($voucher);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xvoucher"=>$tblvalues[0]['xvoucher'],
					"xnarration"=>$tblvalues[0]['xnarration'],
					"xsite"=>$tblvalues[0]['xsite'],
					"xacc"=>"",
					"xaccdesc"=>"",
					"xacctype"=>"",
					"xaccusage"=>"",
					"xaccsource"=>"",
					"xrow"=>"0",
					"xaccsub"=>"",
					"xaccsubdesc"=>"",
					"xcus"=>"",
					"xorg"=>"",
					"xsup"=>"",
					"xsuporg"=>"",
					"xcur"=>"BDT",
					"xprime"=>"0",
					"xprimecr"=>"0"
					);
			
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("GL Voucher", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createFormVoucher($this->fields, URL."gljvvou/savegljvvou", "Save",$tblvalues ,URL."gljvvou/showpost");
			
			$this->view->table = $this->renderTable($voucher);
			
			$this->view->renderpage('gljvvou/gljvvouentry');
		}
		
		function renderTable($voucher){
			$fields = array(
						"xrow-Sl",
						"xacc-Account",
						"xaccdesc-Account Description",
						"xaccsub-Sub Account",
						"xaccsubdesc-Sub Account Description",
						"xprimedr-Dr. Amount",
						"xprimecr-Cr. Amount"
						);
			$table = new Datatable();
			$row = $this->model->getvoucherdt($voucher);
			
			return $table->myTable($fields, $row, "xrow", URL."gljvvou/showgljvvou/".$voucher."/");
			
			
		}
		
		function gljvvoupicklist(){
			$this->view->table = $this->gljvvouPickTable();
			
			$this->view->renderpage('glchart/glchartpicklist', false);
		}
		
		function gljvvouPickTable(){
			$fields = array("xdate-Date","xvoucher-Voucher No","xnarration-Narration","xdoctype-Document Type","xdocno-Document No");
			$table = new Datatable();
			$row = $this->model->getVoucherList();
			
			return $table->picklistTable($fields, $row, "xvoucher");
		}
		
		function voucherlist(){
			$rows = $this->model->getVoucherList();
			$cols = array("xdate-Date","xvoucher-Voucher No","xnarration-Narration","xdoctype-Document Type","xdocno-Document No");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xvoucher",URL."gljvvou/showentry/",URL."gljvvou/deletevoucher/");
			$this->view->renderpage('gljvvou/gljvvoulist', false);
		}
		
		
		function gljvvouentry(){
				
		$btn = array(
			"Clear" => URL."gljvvou/gljvvouentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("GL Voucher",$btn);		
			
			$this->view->dynform = $dynamicForm->createFormVoucher($this->fields, URL."gljvvou/savegljvvou", "Save",$this->values, URL."gljvvou/showpost");
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('gljvvou/gljvvouentry', false);
		}
		
		public function deletevoucher($voucher){
			$where = "bizid=".Session::get('sbizid')." and xvoucher='". $voucher ."'";
			$this->model->delete($where);
			$this->view->message = "";
			$this->voucherlist();
		}
		
		public function showpost(){
		
		$voucher = $_POST['xvoucher'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."gljvvou/gljvvouentry"
		);
		
		$tblvalues = $this->model->getVoucherHeader($voucher);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xvoucher"=>$tblvalues[0]['xvoucher'],
					"xnarration"=>$tblvalues[0]['xnarration'],
					"xsite"=>$tblvalues[0]['xsite'],
					"xacc"=>"",
					"xaccdesc"=>"",
					"xacctype"=>"",
					"xaccusage"=>"",
					"xaccsource"=>"",
					"xrow"=>"0",
					"xaccsub"=>"",
					"xaccsubdesc"=>"",
					"xcus"=>"",
					"xorg"=>"",
					"xsup"=>"",
					"xsuporg"=>"",
					"xcur"=>"BDT",
					"xprime"=>"0",
					"xprimecr"=>"0"
					);
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Journal Entry", $btn,'<a style="color:red" id="invnum" href="'.URL.'glrpt/glvoucher/Journal/'.$voucher.'">Click To Print Voucher - '.$voucher.'</a>');		
			
			$this->view->dynform = $dynamicForm->createFormVoucher($this->fields, URL."gljvvou/savegljvvou", "Save",$tblvalues, URL."gljvvou/showpost", URL."gljvvou/editglvoucher");
			
			$this->view->table = $this->renderTable($voucher);
			
			$this->view->renderpage('gljvvou/gljvvouentry');
		}
		
		function getaccdt($acc){
			$where = " bizid=".Session::get('sbizid')." and xacc = ". $acc;
			$this->model->getAccDt($where);
		}
		function getsubaccdt($acc, $subacc){
			$where = " bizid=".Session::get('sbizid')." and xacc = '". $acc ."' and xaccsub = '". $subacc ."'";
			$this->model->getSubAccDt($where);
		}
}