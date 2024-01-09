<?php
class Customers extends Controller{
	
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
				if($menus["xsubmenu"]=="Customer Database")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','public/js/imageshow.js','views/customers/js/codevalidator.js','views/customers/js/getaccdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"prefix"=>"",
			"xcus"=>"",
			"xshort"=>"",
			"xorg"=>"",
			"xadd1"=>"",
			"xadd2"=>"",
			"xbillingadd"=>"",
			"xdeliveryadd"=>"",
			"xcity"=>"",
			"xprovince"=>"",
			"xcountry"=>"",
			"xcontact"=>"",
			"xphone"=>"",
			"xcusemail"=>"",
			"xmobile"=>"",
			"xnid"=>"",
			"xagent"=>"",
			"xagentcom"=>"0.00",
			"xbookcom"=>"0.00",
			"zactive"=>"1",
			"xplatcode"=>"",
			"xdesc"=>"",
			"xoccupation"=>"",
			"xdob"=>$dt,
			"xreligion"=>"",
			"xnoname"=>"",
			"xnorelation"=>"",
			"xnoage"=>$dt,
			"nofather"=>"",
			"xnoadd"=>"",
			"xnonid"=>"",
			"xlevel"=>"",
			"xplattype"=>"",
			"xsqurefit"=>"",
			"xdownpay"=>"0.00",
			"xbookpay"=>"0.00",
			"xnotes"=>"",
			"xinsnum"=>"",
			"xinsdate"=>$dt,
			"xquotnum"=>"",
			"xtype"=>"At A Time",
			"xmonth"=>"",
			"xmonthint"=>"",
			"xchequeno"=>"",
			"xchequedate"=>$dt,
			"xrow"=>"0",
			"xrate"=>"0.00"
			);
			
			$this->fields = array(array(
							"prefix-select_Customer Prefix"=>'Customer Prefix_maxlength="4"',
							"xcus-group_".URL."customers/picklist"=>'Customer Code_maxlength="20"'
							),
						array(
							"xshort-text"=>'Name_maxlength="160"',
							"xorg-text"=>'Description_maxlength="100"'
							),
						array(
							"xbillingadd-text"=>'Father/Husband_maxlength="160"',
							"xdeliveryadd-text"=>'Mother Name_maxlength="160"'
							),
						array(
							"xadd1-text"=>'Present Address_maxlength="160"',
							"xadd2-text"=>'Parmanent Address_maxlength="160"'
							),
						array(
							"xoccupation-select_Occupation"=>'Occupation_maxlength="160"',
							"xcountry-select_Country"=>'Nationality_maxlength="160"'
							),
						array(
							"xdob-datepicker"=>'Date Of Birth_""',
							"xreligion-select_Religion"=>'Religion_maxlength="160"'
							),		
						array(
							"xagent-group_".URL."agent/picklist"=>'Agent_maxlength="50"',
							"xcontact-text"=>'Contact_maxlength="50"'
							),
						array(
							"xcity-text"=>'PS_maxlength="50"',
							"xprovince-text"=>'District_maxlength="100"'
							),
						array(
							"xmobile-text"=>'Phone_maxlength="50"',
							"xphone-text"=>'Mobile_maxlength="50"'
							),
						array(
							"xcusemail-text"=>'Email_maxlength="50" email="true"',
							"xnid-text"=>'NID/PP/BIRTH_maxlength="50"'
							),		
						array(
							"zactive-checkbox_1"=>'Active?_""'
							),
						array(
							"Nominee Detail-div"=>''		
							),
						array(
							"xnoname-text"=>'Nominee Name_maxlength="160"',
							"xnorelation-text"=>'Relation_maxlength="100"'
							),
						array(
							"xnoage-datepicker"=>'Date Of Birth_""',
							"nofather-text"=>'Father/Husband_maxlength="160"'
							),
						array(
							"xnoadd-text"=>'Nominee Address_maxlength="160"',
							"xnonid-text"=>'Nominee NID_maxlength="50"'
							),
						array(
							"Sales Detail-div"=>''		
							),
						array(
							"xplatcode-group_".URL."customers/platpicklist"=>'Flat No*~star_maxlength="20"',
							"xdate-datepicker" => 'Sales Date_""'							
							),
						array(
							"xdesc-text"=>'Description_readonly',
							"xlevel-text"=>'Level_readonly_maxlength="160"'							
							),
						array(
							"xplattype-text"=>'Type_readonly_maxlength="160"',
							"xsqurefit-text"=>'Squrefit_readonly_maxlength="160"'
							),
						array(
							"xrate-text_number"=>'Total Amount_readonly_number="true" minlength="1" maxlength="18"',
							"xbookpay-text_number"=>'Booking Payment._number="true" minlength="1" maxlength="18" required'
							),
						array(
							"xdownpay-text_number"=>'Down Payment._number="true" minlength="1" maxlength="18" required',
							"xbookcom-text_number"=>'Booking Commission_number="true" minlength="1" maxlength="18"'
							),
						array(
							"xagentcom-text_number"=>'Agent Commission(%)_number="true" minlength="1" maxlength="18"',
							"xchequeno-text"=>'Cheque No_maxlength="160"'
							),
						array(
							"xchequedate-datepicker"=>'Cheque Date_maxlength="160"'
							),
						array(
							"xnotes-textarea"=>'Additional Notes_""'
							),
						array(
							"Installment Detail-div"=>''		
							),
						array(
							"xinsnum-group_".URL."installment/picklist"=>'Installment No_maxlength="20" readonly',
							"xinsdate-datepicker" => 'Date_""'
							),
						array(							
							"xquotnum-text"=>'Quotation No_maxlength="50"',
							"xmonthint-text"=>'Month Interval_maxlength="50"'
							),
						array(
							"xtype-radio_At A Time_Multiple Month"=>'_readonly',
							"xmonth-text"=>'Month Number_maxlength="50"',
							"xrow-hidden"=>'_""'
							)
						);
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."customers/customerentry",
		);	
		
		
		// form data
		//$this->createopbal();
			$dynamicForm = new Dynamicform("Customer",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."customers/savecustomers", "Save",$this->values,URL."customers/showpost");
			$this->view->table ="";
			//$this->view->table = $this->renderTable();
			
			$this->view->rendermainmenu('customers/index');
			
		}
		
		public function savecustomers(){
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date));

				$xmonth = $_POST['xmonth'];
				//echo $xmonth;die;
				$xinsdate = $_POST['xinsdate'];
				$insdt = str_replace('/', '-', $xinsdate);
				$insdate = date('Y-m-d', strtotime($insdt));
				$insyear = date('Y',strtotime($insdate));
				$insmonth = date('m',strtotime($insdate));

				$xdob = $_POST['xdob'];
				$cdob = str_replace('/', '-', $xdob);
				$dob = date('Y-m-d', strtotime($cdob));

				$xnodob = $_POST['xnoage'];
				$nodob = str_replace('/', '-', $xnodob);
				$dobno = date('Y-m-d', strtotime($nodob));

				$xchedate = $_POST['xchequedate'];
				$chedt = str_replace('/', '-', $xchedate);
				$chedate = date('Y-m-d', strtotime($chedt));

				$yearoffset = Session::get('syearoffset');
				$xyear = 0;
				$per = 0;
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$per = $key;
					$xyear = $val;
				}

				if (!isset($_POST['xcus'])){
					header ('location: '.URL.'customers');
					exit;
				}
				$cusauto =	Session::get('sbizcusauto');	
				$prefix = $_POST['prefix'];
				$keyfieldval="0";
				
				//print_r($keyfieldso);die;
				$form = new Form();
				$data = array();
				$inssuccess=0;
				$success=0;
				$result = "";
				try{
					
				
				$form	->post('xcus')
						->val('maxlength', 20)
									
				
						->post('xshort')
						->val('maxlength', 160)
				
						->post('xorg')
						->val('maxlength', 160)
						
						->post('xadd1')
						->val('maxlength', 160)
						
						->post('xadd2')
						->val('maxlength', 160)
						
						->post('xbillingadd')
						->val('maxlength', 160)
						
						->post('xdeliveryadd')
						->val('maxlength', 160)
						
						->post('xcity')
						->val('maxlength', 50)
						
						->post('xprovince')
						
						->post('xcountry')
						
						->post('xcontact')
						->val('maxlength', 50)
						
						->post('xphone')
						->val('maxlength', 15)
						
						->post('xmobile')
						->val('maxlength', 14)
						
						->post('xcusemail')
						->val('maxlength', 100)
						
						->post('xnid')
						->val('maxlength', 20)
						
						->post('xagent')
						->val('maxlength', 20)
						
						->post('xagentcom')
						->val('checkdouble')

						->post('xbookcom')
						->val('checkdouble')

						->post('xoccupation')						
						->val('maxlength', 100)

						->post('xdob')

						->post('xreligion')						
						->val('maxlength', 100)

						->post('xnoname')						
						->val('maxlength', 160)

						->post('xnorelation')						
						->val('maxlength', 100)

						->post('xnoage')						
						->val('maxlength', 10)

						->post('nofather')						
						->val('maxlength', 150)

						->post('xnoadd')						
						->val('maxlength', 150)
						
						->post('xnonid')						
						->val('maxlength', 50)

						->post('xbookpay')

						->post('xplatcode')
						->val('minlength', 1)
						->val('maxlength', 20)

						->post('xrate')
						->val('checkdouble')

						->post('xdownpay')

						->post('xnotes')						
						->val('maxlength', 100)

						->post('xinsnum')

						->post('xtype')
						
						->post('xmonth')

						->post('xmonthint')
						
						->post('xquotnum')

						->post('xchequeno')
						
						->post('zactive');
						
				$form	->submit();
				
				$data = $form->fetch();

				if($data['xcus'] == "")
				$keyfieldval = $this->model->getKeyValue("secus","xcus",$prefix,"6");
				else
				$keyfieldval = $data['xcus'];
				
				$data['xcus'] = $keyfieldval;
				$data['xdate'] = $date;
				$data['xdob'] = $dob;
				$data['xnoage'] = $dobno;
				$data['xinsdate'] = $insdate;
				$data['xchequedate'] = $chedate;
				$data['xyear'] = $year;
				$data['xper'] = $month;
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');

				$platdetail = $this->model->getPlatDetail($data['xplatcode']);

				$rownum = $this->model->getRow("salesdt","xcus",$data['xcus'],"xrow");
				// $file = fopen("C:/Users/kamrul/Desktop/testdoc.txt","w");
				// echo fwrite($file,$cvals);
				// fclose($file);
				
				$cols = "`bizid`,`xcus`,`xrow`,`xplatcode`,`xplatbatch`,`xlevel`,`xplattype`,`xsqurefit`,`xdate`,`xcost`,`xrate`,`xwh`,`xbranch`,`xproj`,`xtaxrate`,`xdisc`,`xexch`,`xcur`,`xtaxcode`,`xtaxscope`,`zemail`,`xunitsale`,`xyear`,`xper`,`xtypestk`";
				
				$vals = "(" . Session::get('sbizid') . ",'". $data['xcus'] ."','". $rownum ."','". $data['xplatcode'] ."','". $data['xplatcode'] ."','". $platdetail[0]['xlevel'] ."','". $platdetail[0]['xtype'] ."','". $platdetail[0]['xsqurefit'] ."','". $date ."','0','". $platdetail[0]['xmrp'] ."','None','". Session::get('sbranch') ."','". Session::get('sbranch') ."','0','0','1','BDT','". Session::get('sbizcur') ."','None','".$data['zemail']."','".$platdetail[0]['xunitsale']."','".$xyear."','".$per."','".$platdetail[0]['xtypestk']."')";

				//print_r($data);die;

				$success = $this->model->create($data,$cols,$vals);
				//$getitem = $this->model->getitem($keyfieldval,$rownum);
				//print_r($getitem);die;
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0){
					$this->model->saleItem($data['xplatcode']);
					$this->result = 'Customer saved successfully<br><a style="color:red" id="invnum" href="'.URL.'customers/showinvoice/'.$keyfieldval.'">Click To Print Invoice - '.$keyfieldval.'</a>';
					if ($_FILES['imagefield']["name"]){
						$imgupload = new ImageUpload();
						$imgupload->store_uploaded_image('images/nominee/nomilg/','imagefield', 400, 400,$keyfieldval);
						$imgupload->store_uploaded_image('images/nominee/nomism/','imagefield', 171, 181,$keyfieldval);
					}
					if ($_FILES['imagefield2']["name"]){
						$imgupload2 = new ImageUpload();
						$imgupload2->store_uploaded_image('images/customers/cuslg/','imagefield2', 400, 400,$keyfieldval);
						$imgupload2->store_uploaded_image('images/customers/cussm/','imagefield2', 171, 181,$keyfieldval);
					}
				}
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to save customer!";
				
				 $this->showentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		public function editcustomer(){
			
			if (!isset($_POST['xcus'])){
					header ('location: '.URL.'customers');
					exit;
				}
			$result = "";
			$xdate = $_POST['xdate'];
			$dt = str_replace('/', '-', $xdate);
			$date = date('Y-m-d', strtotime($dt));
			$year = date('Y',strtotime($date));
			$month = date('m',strtotime($date));

			$xmonth = $_POST['xmonth'];
			//echo $xmonth;die;
			$xinsdate = $_POST['xinsdate'];
			$insdt = str_replace('/', '-', $xinsdate);
			$insdate = date('Y-m-d', strtotime($insdt));
			$insyear = date('Y',strtotime($insdate));
			$insmonth = date('m',strtotime($insdate));

			$xdob = $_POST['xdob'];
			$cdob = str_replace('/', '-', $xdob);
			$dob = date('Y-m-d', strtotime($cdob));

			$xnodob = $_POST['xnoage'];
			$nodob = str_replace('/', '-', $xnodob);
			$dobno = date('Y-m-d', strtotime($nodob));

			$xchedate = $_POST['xchequedate'];
			$chedt = str_replace('/', '-', $xchedate);
			$chedate = date('Y-m-d', strtotime($chedt));
			
			$success=false;
			$cus = $_POST['xcus'];
			$form = new Form();
				$data = array();
				
				try{
					
					
				
				
				$form	->post('xcus')
						->val('maxlength', 20)
									
				
						->post('xshort')
						->val('maxlength', 160)
				
						->post('xorg')
						->val('maxlength', 160)
						
						->post('xadd1')
						->val('maxlength', 160)
						
						->post('xadd2')
						->val('maxlength', 160)
						
						->post('xbillingadd')
						->val('maxlength', 160)
						
						->post('xdeliveryadd')
						->val('maxlength', 160)
						
						->post('xcity')
						->val('maxlength', 50)
						
						->post('xprovince')
						
						->post('xcountry')
						
						->post('xcontact')
						->val('maxlength', 50)
						
						->post('xphone')
						->val('maxlength', 15)
						
						->post('xmobile')
						->val('maxlength', 14)
						
						->post('xcusemail')
						->val('maxlength', 100)
						
						->post('xnid')
						->val('maxlength', 20)
						
						->post('xagent')
						->val('maxlength', 20)
						
						->post('xagentcom')
						->val('checkdouble')

						->post('xbookcom')
						->val('checkdouble')

						->post('xoccupation')						
						->val('maxlength', 100)

						->post('xdob')

						->post('xreligion')						
						->val('maxlength', 100)

						->post('xnoname')						
						->val('maxlength', 160)

						->post('xnorelation')						
						->val('maxlength', 100)

						->post('xnoage')						
						->val('maxlength', 10)

						->post('nofather')						
						->val('maxlength', 150)

						->post('xnoadd')						
						->val('maxlength', 150)
						
						->post('xnonid')						
						->val('maxlength', 50)

						->post('xbookpay')

						->post('xplatcode')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xdownpay')
						
						->post('xrate')

						->post('xnotes')						
						->val('maxlength', 100)

						->post('xinsnum')

						->post('xtype')
						
						->post('xmonth')

						->post('xmonthint')
						
						->post('xquotnum')

						->post('xchequeno')
						
						->post('zactive');
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				$data['xdate'] = $date;
				$data['xdob'] = $dob;
				$data['xnoage'] = $dobno;
				$data['xinsdate'] = $insdate;
				$data['xchequedate'] = $chedate;
				$data['xyear'] = $year;
				$data['xper'] = $month;
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
				$platdetail = $this->model->getPlatDetail($data['xplatcode']);

				$saledt = array (
					"xplatcode"=>$data['xplatcode'],
					"xplatbatch"=>$platdetail[0]['xplatcode'],
					"xlevel"=>$platdetail[0]['xlevel'],
					"xplattype"=>$platdetail[0]['xtype'],
					"xsqurefit"=>$platdetail[0]['xsqurefit'],
					"xcost"=>$platdetail[0]['xpricepur'],
					"xrate"=>$platdetail[0]['xmrp'],
					"xdisc"=>'0',
					"xtypestk"=>$platdetail[0]['xtypestk'],
					"xunitsale"=>$platdetail[0]['xunitsale'],
					"xwh"=>'None',
					"xbranch"=>Session::get('sbranch'),
					"xproj"=>Session::get('sbranch'),
					"xdate"=>$date,
					"xyear" => $year,
					"xper" => $month
				);
				$getitem = $this->model->getitem($cus,$_POST['xrow']);

				$this->model->itemupdate($getitem[0]['xplatcode']);

				$success = $this->model->editCustomer($data, $saledt, $cus, $_POST['xrow']);
				$item = $this->model->getitem($cus,$_POST['xrow']);
				
				}catch(Exception $e){
					//echo $e->getMessage();die;
					$result = $e->getMessage();
					
				}
				if($result==""){
				if($success){
					//print_r($item);die;
					$this->model->saleItem($item[0]['xplatcode']);
					$result = 'Customer Edit successfully<br><a style="color:red" id="invnum" href="'.URL.'customers/showinvoice/'.$cus.'">Click To Print Invoice - '.$cus.'</a>';
					$file1 = 'images/nominee/nomism/'.$cus.'.jpg';
					$file2 = 'images/customers/cussm/'.$cus.'.jpg';
					if ($_FILES['imagefield']["name"]){
						if(file_exists($file1))
							unlink($file1); 
						
						$imgupload = new ImageUpload();
						$imgupload->store_uploaded_image('images/nominee/nomilg/','imagefield', 400, 400,$cus);
						$imgupload->store_uploaded_image('images/nominee/nomism/','imagefield', 171, 181,$cus);
					}
					if ($_FILES['imagefield2']["name"]){
						if(file_exists($file2))
							unlink($file2); 
						
						$imgupload2 = new ImageUpload();
						$imgupload2->store_uploaded_image('images/customers/cuslg/','imagefield2', 400, 400,$cus);
						$imgupload2->store_uploaded_image('images/customers/cussm/','imagefield2', 171, 181,$cus);
					}
				}
				else
					$result = "Edit failed!";
				
				}
				 $this->showcustomer($cus, $result);
				
		
		}
		
		public function showcustomer($cus="", $result=""){
		if($cus==""){
			header ('location: '.URL.'customers');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."customers/customerentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($cus);
		$totamt = $this->model->getsalesdata($cus);

		$conf="";
		$sv="";
		$svbtn = "Save";
		if(count($tblvalues)>0){	
			if($tblvalues[0]['xstatus']=="Created"){
				$conf=array(URL."customers/confirmpost", "Confirm");
				$sv=URL."customers/savecustomers/";
			}		
			if($tblvalues[0]['xstatus']=="Confirmed"){
				$sv="";
				$conf=array(URL."customers/cancelpost", "Cancel");

			}		
		}
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
				"xcus"=>$tblvalues[0]['xcus'],
				"xshort"=>$tblvalues[0]['xshort'],
				"xorg"=>$tblvalues[0]['xorg'],
				"xadd1"=>$tblvalues[0]['xadd1'],
				"xadd2"=>$tblvalues[0]['xadd2'],
				"xbillingadd"=>$tblvalues[0]['xbillingadd'],
				"xdeliveryadd"=>$tblvalues[0]['xdeliveryadd'],
				"xcity"=>$tblvalues[0]['xcity'],
				"xprovince"=>$tblvalues[0]['xprovince'],
				"xcountry"=>$tblvalues[0]['xcountry'],
				"xcontact"=>$tblvalues[0]['xcontact'],
				"xphone"=>$tblvalues[0]['xphone'],
				"xcusemail"=>$tblvalues[0]['xcusemail'],
				"xmobile"=>$tblvalues[0]['xmobile'],
				"xnid"=>$tblvalues[0]['xnid'],
				"xagent"=>$tblvalues[0]['xagent'],
				"xagentcom"=>$tblvalues[0]['xagentcom'],
				"xbookcom"=>$tblvalues[0]['xbookcom'],
				"zactive"=>$tblvalues[0]['zactive'],
				"xoccupation"=>$tblvalues[0]['xoccupation'],
				"xdob"=>$tblvalues[0]['xdob'],
				"xreligion"=>$tblvalues[0]['xreligion'],
				"xnoname"=>$tblvalues[0]['xnoname'],
				"xnorelation"=>$tblvalues[0]['xnorelation'],
				"xnoage"=>$tblvalues[0]['xnoage'],
				"nofather"=>$tblvalues[0]['nofather'],
				"xnoadd"=>$tblvalues[0]['xnoadd'],
				"xnonid"=>$tblvalues[0]['xnonid'],
				"xplatcode"=>"",
				"xdate"=>$tblvalues[0]['xdate'],
				"xdesc"=>"",
				"xrate"=>"0.00",
				"xlevel"=>"",
				"xplattype"=>"",
				"xsqurefit"=>"",
				"xdownpay"=>$tblvalues[0]['xdownpay'],
				"xbookpay"=>$tblvalues[0]['xbookpay'],
				"xnotes"=>$tblvalues[0]['xnotes'],
				"xinsnum"=>"",
				"xinsdate"=>$tblvalues[0]['xinsdate'],
				"xquotnum"=>$tblvalues[0]['xquotnum'],
				"xtype"=>$tblvalues[0]['xtype'],
				"xmonth"=>$tblvalues[0]['xmonth'],
				"xmonthint"=>$tblvalues[0]['xmonthint'],
				"xchequeno"=>$tblvalues[0]['xchequeno'],
				"xchequedate"=>$tblvalues[0]['xchequedate'],
				"xrow"=>"0"
			);
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Customer", $btn, $result);
			$file = 'images/customers/cussm/'.$cus.'.jpg';
			$file2 = 'images/nominee/nomism/'.$cus.'.jpg';
		
		$imagename = "";	
		$imagename2 = "";	
		if(file_exists($file))
			$imagename = '../../../'.$file;
		else
			$imagename = '../../../images/customers/noimage.jpg';
			
		if(file_exists($file2))
			$imagename2 = '../../../'.$file2;
		else
			$imagename2 = '../../../images/nominee/noimage.jpg';

			$this->view->filename1 = $imagename;
			$this->view->filename2 = $imagename2;
			$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, $svbtn,$tblvalues ,URL."customers/showpost",$conf,"imagefield","imagefield2");
			
			$this->view->table = $this->renderTable($cus);
			
			$this->view->renderpage('customers/customerentry');
		}


		public function editshowcus($cus="", $row="", $result=""){
		if($cus==""){
			header ('location: '.URL.'customers');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."customers/customerentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($cus);
		$singlecus = $this->model->getsinglesalesdt($cus,$row);

		$conf="";
		$sv="";
		$svbtn = "Update";
		if(count($tblvalues)>0){	
			if($tblvalues[0]['xstatus']=="Created"){
				$conf=array(URL."customers/confirmpost", "Confirm");
				$sv=URL."customers/editcustomer/";
			}		
			if($tblvalues[0]['xstatus']=="Confirmed"){
				$sv="";
				$conf=array(URL."customers/cancelpost", "Cancel");

			}		
		}
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
				"xcus"=>$tblvalues[0]['xcus'],
				"xshort"=>$tblvalues[0]['xshort'],
				"xorg"=>$tblvalues[0]['xorg'],
				"xadd1"=>$tblvalues[0]['xadd1'],
				"xadd2"=>$tblvalues[0]['xadd2'],
				"xbillingadd"=>$tblvalues[0]['xbillingadd'],
				"xdeliveryadd"=>$tblvalues[0]['xdeliveryadd'],
				"xcity"=>$tblvalues[0]['xcity'],
				"xprovince"=>$tblvalues[0]['xprovince'],
				"xcountry"=>$tblvalues[0]['xcountry'],
				"xcontact"=>$tblvalues[0]['xcontact'],
				"xphone"=>$tblvalues[0]['xphone'],
				"xcusemail"=>$tblvalues[0]['xcusemail'],
				"xmobile"=>$tblvalues[0]['xmobile'],
				"xnid"=>$tblvalues[0]['xnid'],
				"xagent"=>$tblvalues[0]['xagent'],
				"xagentcom"=>$tblvalues[0]['xagentcom'],
				"xbookcom"=>$tblvalues[0]['xbookcom'],
				"zactive"=>$tblvalues[0]['zactive'],
				"xoccupation"=>$tblvalues[0]['xoccupation'],
				"xdob"=>$tblvalues[0]['xdob'],
				"xreligion"=>$tblvalues[0]['xreligion'],
				"xnoname"=>$tblvalues[0]['xnoname'],
				"xnorelation"=>$tblvalues[0]['xnorelation'],
				"xnoage"=>$tblvalues[0]['xnoage'],
				"nofather"=>$tblvalues[0]['nofather'],
				"xnoadd"=>$tblvalues[0]['xnoadd'],
				"xnonid"=>$tblvalues[0]['xnonid'],
				"xplatcode"=>$singlecus[0]['xplatcode'],
				"xdate"=>$tblvalues[0]['xdate'],
				"xdesc"=>$singlecus[0]['xdesc'],
				"xrate"=>$singlecus[0]['xrate'],
				"xlevel"=>$singlecus[0]['xlevel'],
				"xplattype"=>$singlecus[0]['xplattype'],
				"xsqurefit"=>$singlecus[0]['xsqurefit'],
				"xdownpay"=>$tblvalues[0]['xdownpay'],
				"xbookpay"=>$tblvalues[0]['xbookpay'],
				"xnotes"=>$tblvalues[0]['xnotes'],
				"xinsnum"=>"",
				"xinsdate"=>$tblvalues[0]['xinsdate'],
				"xquotnum"=>$tblvalues[0]['xquotnum'],
				"xtype"=>$tblvalues[0]['xtype'],
				"xmonth"=>$tblvalues[0]['xmonth'],
				"xmonthint"=>$tblvalues[0]['xmonthint'],
				"xchequeno"=>$tblvalues[0]['xchequeno'],
				"xchequedate"=>$tblvalues[0]['xchequedate'],
				"xrow"=>$singlecus[0]['xrow']
			);
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Customer", $btn, $result);
			$file = 'images/customers/cussm/'.$cus.'.jpg';
			$file2 = 'images/nominee/nomism/'.$cus.'.jpg';
		
		$imagename = "";	
		$imagename2 = "";	
		if(file_exists($file))
			$imagename = '../../../'.$file;
		else
			$imagename = '../../../images/customers/noimage.jpg';
			
		if(file_exists($file2))
			$imagename2 = '../../../'.$file2;
		else
			$imagename2 = '../../../images/nominee/noimage.jpg';

			$this->view->filename1 = $imagename;
			$this->view->filename2 = $imagename2;
			$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, $svbtn,$tblvalues ,URL."customers/showpost",$conf,"imagefield","imagefield2");
			
			$this->view->table = $this->renderTable($cus);
			
			$this->view->renderpage('customers/customerentry');
		}
		
		
		
		public function showentry($cus, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."customers/customerentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($cus);
		$tblvaluesins = $this->model->getSingleInsdt($cus);
		$totamt = $this->model->getsalesdata($cus);
		
		$conf="";
		$sv="";
		$svbtn = "Save";
		if(count($tblvalues)>0){	
			if($tblvalues[0]['xstatus']=="Created"){
				$conf=array(URL."customers/confirmpost", "Confirm");
				$sv=URL."customers/savecustomers/";
			}		
			if($tblvalues[0]['xstatus']=="Confirmed"){
				$sv="";
				$conf=array(URL."customers/cancelpost", "Cancel");

			}		
		}

		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
				"xcus"=>$tblvalues[0]['xcus'],
				"xshort"=>$tblvalues[0]['xshort'],
				"xorg"=>$tblvalues[0]['xorg'],
				"xadd1"=>$tblvalues[0]['xadd1'],
				"xadd2"=>$tblvalues[0]['xadd2'],
				"xbillingadd"=>$tblvalues[0]['xbillingadd'],
				"xdeliveryadd"=>$tblvalues[0]['xdeliveryadd'],
				"xcity"=>$tblvalues[0]['xcity'],
				"xprovince"=>$tblvalues[0]['xprovince'],
				"xcountry"=>$tblvalues[0]['xcountry'],
				"xcontact"=>$tblvalues[0]['xcontact'],
				"xphone"=>$tblvalues[0]['xphone'],
				"xcusemail"=>$tblvalues[0]['xcusemail'],
				"xmobile"=>$tblvalues[0]['xmobile'],
				"xnid"=>$tblvalues[0]['xnid'],
				"xagent"=>$tblvalues[0]['xagent'],
				"xagentcom"=>$tblvalues[0]['xagentcom'],
				"xbookcom"=>$tblvalues[0]['xbookcom'],
				"zactive"=>$tblvalues[0]['zactive'],
				"xoccupation"=>$tblvalues[0]['xoccupation'],
				"xdob"=>$tblvalues[0]['xdob'],
				"xreligion"=>$tblvalues[0]['xreligion'],
				"xnoname"=>$tblvalues[0]['xnoname'],
				"xnorelation"=>$tblvalues[0]['xnorelation'],
				"xnoage"=>$tblvalues[0]['xnoage'],
				"nofather"=>$tblvalues[0]['nofather'],
				"xnoadd"=>$tblvalues[0]['xnoadd'],
				"xnonid"=>$tblvalues[0]['xnonid'],
				"xbookpay"=>$tblvalues[0]['xbookpay'],
				"xplatcode"=>"",
				"xdesc"=>"",
				"xdate"=>$tblvalues[0]['xdate'],
				"xrate"=>"0.00",
				"xlevel"=>"",
				"xplattype"=>"",
				"xsqurefit"=>"",
				"xdownpay"=>$tblvalues[0]['xdownpay'],
				"xnotes"=>$tblvalues[0]['xnotes'],
				"xinsnum"=>"",
				"xinsdate"=>$tblvalues[0]['xinsdate'],
				"xquotnum"=>$tblvalues[0]['xquotnum'],
				"xtype"=>$tblvalues[0]['xtype'],
				"xmonth"=>$tblvalues[0]['xmonth'],
				"xmonthint"=>$tblvalues[0]['xmonthint'],
				"xchequeno"=>$tblvalues[0]['xchequeno'],
				"xchequedate"=>$tblvalues[0]['xchequedate'],
				"xrow"=>"0"
			);
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Customer", $btn, $result);	
				$file = 'images/customers/cussm/'.$cus.'.jpg';
				$file2 = 'images/nominee/nomism/'.$cus.'.jpg';
		
		$imagename = "";	
		$imagename2 = "";	
		if(file_exists($file))
			$imagename = '../'.$file;
		else
			$imagename = '../images/customers/noimage.jpg';
			
		if(file_exists($file2))
			$imagename2 = '../'.$file2;
		else
			$imagename2 = '../images/nominee/noimage.jpg';

			$this->view->filename1 = $imagename;
			$this->view->filename2 = $imagename2;
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, $svbtn,$tblvalues ,URL."customers/showpost",$conf,"imagefield","imagefield2");
			
			$this->view->table = $this->renderTable($cus);
			
			$this->view->renderpage('customers/customerentry');
		}
		
		function renderTable($txnnum){
			
			$sales = $this->model->getCusSale($txnnum);
			$status = "";
			if(!empty($sales))
				$status = $sales[0]["xstatus"];
			
			$delbtn = "";
			if(count($sales)>0){
			if($sales[0]["xstatus"]=="Created")
				$delbtn = URL."customers/deletesales/".$txnnum."/";
				
			}
			
			$row = $this->model->getvsalesdt($txnnum);
			
			$table = '<table class="table table-striped table-bordered">';
				$table .='<thead>
							<th></th><th></th><th>Sl.</th><th>Plat Code</th><th>Description</th><th>Level</th><th>Type</th><th>Squrefit</th><th style="text-align:right">Rate</th>
						</thead>';
						$totalqty = 0;
						$totalextqty = 0;
						$total = 0;
						$totaltax = 0;
						$totaldisc = 0;
						$table .='<tbody>';

						foreach($row as $key=>$val){
							$showurl = URL."customers/editshowcus/".$txnnum."/".$val['xrow'];
							$table .='<tr>';
							
							$table.='<td><a class="btn btn-info" id="btnshow" href="'.$showurl.'" role="button">Show</a></td>';
							if($delbtn!="")
								$table.='<td><a id="delbtn" class="btn btn-danger" href="'.$delbtn."/".$val['xrow'].'" role="button">Delete</a></td>';
							else
								$table.='<td></td>';

								$table .= "<td>".$val['xrow']."</td>";
								$table .= "<td>".$val['xplatcode']."</td>";
								$table .= "<td>".$val['xdesc']."</td>";
								$table .= "<td>".$val['xlevel']."</td>";
								$table .= "<td>".$val['xplattype']."</td>";
								$table .= "<td>".$val['xsqurefit']."</td>";
								$table .='<td align="right">'.$val['xrate'].'</td>';
								$total+=$val['xrate'];
								
							$table .="</tr>";
						}
							$table .='<tr><td align="right" colspan="8"><strong>Total</strong></td><td align="right"><strong>'.number_format($total,2).'</strong></td></tr>';
							
							if(!empty($sales)){
							$table .='<tr><td align="right" colspan="8"><strong>Received Amt.</strong></td><td align="right"><strong>'.$sales[0]["xbookpay"].'</strong></td></tr>';
							}	
					$table .="</tbody>";			
			$table .= "</table>";
			
			return $table;
			
			
		}
 
		function showinvoice($txnnum=""){
			
			$values = $this->model->getSingleCustomer($txnnum);
			$value = $this->model->getSalesDt($txnnum);
			$getplot = $this->model->getSalesPlot($txnnum);

			$valu = $this->model->getItemDt($value[0]['xplatcode']);
			//print_r($valu);die;
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li>Sales Invoice</li>							
						   </ul>';
			
			$this->view->cus=$txnnum;
			//$totqty = 0;			
			//$xdate="";
			$xcus="";
			$name="";
			$fname="";
			$fname="";
			$pradd="";
			$paradd="";
			$occupation="";
			$dob="";
			$nationality="";
			$nid="";
			$xmobile="";
			$religion="";
			$noname="";
			$norelation="";
			$noage="";
			$nofather="";
			$noadd="";
			$insmonth="";
			$bookpay="";
			$block="";
			$rod="";
			$plot="";
			$katha="";
				
				// if($rodqty[0]["xqty"]!=0)	
				// 	$narretion = " Rod ".number_format($rodqty[0]["xqty"],2)." KG And ".$rodqty[0]["xextqty"]." Bundle<br/>";
				// if($cementqty[0]["xqty"]!=0)	
				// 	$narretion .= " Cement ".$cementqty[0]["xqty"]." BAG ";
			
			foreach($values as $key=>$val){
				//$xdate=$val['xdate'];
				$xcus=$val['xcus'];
				$name=$val['xshort'];
				$fname=$val['xbillingadd'];
				$mname=$val['xdeliveryadd'];
				//$truckamt=$val['xtruckfair'];
				$pradd=$val['xadd1'];
				$paradd=$val['xadd2'];
				$occupation=$val['xoccupation'];
				$dob=$val['xdob'];
				$nationality=$val['xcountry'];
				$nid=$val['xnid'];
				$xmobile=$val['xphone'];
				$religion=$val['xreligion'];
				$noname=$val['xnoname'];
				$norelation=$val['xnorelation'];
				$noage=$val['xnoage'];
				$nofather=$val['nofather'];
				$noadd=$val['xnoadd'];
				$insmonth=$val['xmonth'];
				$bookpay=$val['xbookpay'];
				$chequeno=$val['xchequeno'];
				$chequedate=$val['xdate'];

				
			}
				$totrate = 0;
			foreach($value as $key=>$val){
				$totrate += $val['xrate'];

				
			}
			
			$this->view->getplot=$getplot;
			$this->view->cus=$xcus;
			$this->view->name=$name;
			$this->view->fname=$fname;
			$this->view->mname=$mname;
			$this->view->pradd=$pradd;
			$this->view->paradd=$paradd;
			$this->view->occupation=$occupation;
			$this->view->dob=$dob;
			$this->view->nationality=$nationality;
			$this->view->nid=$nid;
			$this->view->xmobile=$xmobile;		
			$this->view->religion=$religion;	
			$this->view->noname=$noname;
			$this->view->norelation=$norelation;
			$this->view->noage=$noage;
			$this->view->nofather=$nofather;
			$this->view->noadd=$noadd;
			$this->view->insmonth=$insmonth;
			$this->view->bookpay=$bookpay;
			$this->view->salesdt=$value;
			$this->view->chequeno=$chequeno;
			$this->view->chequedate=$chequedate;
			$this->view->totrate=$totrate;
			//$cur = new Currency();
			
			//$this->view->vrow = $values;
			$cur = new Currency();
			$this->view->bookinword=$cur->get_bd_amount_in_text($bookpay);
			$this->view->totalinword=$cur->get_bd_amount_in_text($totrate);
			//$this->view->inword="In Words: ";
			$this->view->vrptname = "Invoice/Bill";
			$this->view->org=Session::get('sbizlong');
			$this->view->add=Session::get('sbizadd');
			
			$this->view->renderpage('customers/printinvoice');		
		}

		function confirmpost(){
			$voucher ="";
			$cus = $_POST['xcus'];
			
			$cofcus=array();
			$cofcus = $this->model->getSingleCustomer($cus);

			if ($cofcus[0]['xbookpay']>0) {
				$comamt=$cofcus[0]['xbookcom'];
				$comtype='Booking Commission';
			}elseif($cofcus[0]['xdownpay']>0){
				$comamt=$cofcus[0]['xbookcom'];
				$comtype='Down Payment Commission';
			}else{
				$comtype="";
			}

			$postdata=array(
					"xstatus" => "Confirmed",
					"xcomamt" => $comamt,
					"xcomtype" => $comtype
					);
			$where = " bizid = ". Session::get('sbizid') ." and xcus = '". $cus ."'";

			$yearoffset = Session::get('syearoffset');
			$narretion = "";
			$xinsdate = $cofcus[0]['xinsdate'];
			$insdt = str_replace('/', '-', $xinsdate);
			$insdate = date('Y-m-d', strtotime($insdt));
			$insyear = date('Y',strtotime($insdate));
			$insmonth = date('m',strtotime($insdate));
			$inssuccess=0;



			if($cofcus[0]['xstatus']=="Confirmed"){
					$result='Customer Already Confirmed!';
				}

				$rows = $this->model->getsalesForConfirm($cus);
				//print_r($rows);die;
				$glinterface = $this->model->glsalesinterface();

				if(!empty($glinterface)){

					$xdate = $_POST['xdate'];
					$dt = str_replace('/', '-', $xdate);
					$date = date('Y-m-d', strtotime($dt));
					$year = date('Y',strtotime($date));
					$month = date('m',strtotime($date)); 
						//glheader goes here
						$xyear = 0;
						$per = 0;
						//print_r($this->model->getYearPer($yearoffset,intval($month))); die;
						foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
							$per = $key;
							$xyear = $val;
						}
						$voucher = $this->model->getKeyValue("glheader","xvoucher","SINV".Session::get('suserrow')."-","6");
						
						$data = array();

						$data['bizid'] = Session::get('sbizid');
						$data['zemail'] = Session::get('suser');
						$data['xnarration'] = $cus."-".$cofcus[0]['xshort']."-".$cofcus[0]['xadd1'];
						$data['xyear'] = $xyear;
						$data['xper'] = $per;
						$data['xvoucher'] = $voucher;
						$data['xdate'] = $date;
						$data['xstatusjv'] = 'Confirmed';
						$data['xbranch'] = Session::get('sbranch');
						$data['xdoctype'] = "Sales Voucher";
						$data['xdocnum'] = $cus;

						$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,`xexch`,`xprime`,`xflag`";

						$vals = "";	

						$i = 0;	
						$globalvar = new Globalvar();
						foreach($glinterface as $key=>$val){
							$i++;
							$amt = $globalvar->getFormula($rows,$val["xformula"], $rows[0]['xgrossdisc'], $rows[0]['xrcvamt']);
							
							if($val['xaction']=="Credit")
								$amt = "-".$amt;

							$acc = $this->model->getAcc($val['xacc']);
							$subacc = "";
							if($acc[0]['xaccsource']=="Customer")
								$subacc = $rows[0]['xcus'];
							else
								$subacc = "";
							if($amt<>0)
									$vals .= "(" . Session::get('sbizid') . ",'". $voucher ."','". $i ."','". $val['xacc'] ."','". $acc[0]['xacctype'] ."','". $acc[0]['xaccusage'] ."','". $acc[0]['xaccsource'] ."','". $subacc ."','".Session::get('sbizcur')."','". $amt ."','1','". $amt ."','". $val['xaction'] ."'),";
							
						}
						//echo $vals;die;
									$vals = rtrim($vals, ",");

					$success = $this->model->confirmgl($data, $cols, $vals);
					if($cofcus[0]['xbookpay']>0){
								
						$i1 = $i+1;
						$i2 = $i+2;
						$bacc = $this->model->getAcc('9100');
						$cacc = $this->model->getAcc('1029');

							$bcols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,`xexch`,`xprime`,xflag,xremarks";
						
							$bvals .= "(" . Session::get('sbizid') . ",'". $voucher ."','".$i1."','1029','". $cacc[0]['xacctype'] ."','". $cacc[0]['xaccusage'] ."','". $cacc[0]['xaccsource'] ."','','".Session::get('sbizcur')."','". $cofcus[0]['xbookpay'] ."','1','". $cofcus[0]['xbookpay'] ."','Debit',''),
							(" . Session::get('sbizid') . ",'". $voucher ."','".$i2."','9100','". $bacc[0]['xacctype'] ."','". $bacc[0]['xaccusage'] ."','". $bacc[0]['xaccsource'] ."','','".Session::get('sbizcur')."','-". $cofcus[0]['xbookpay'] ."','1','-". $cofcus[0]['xbookpay'] ."','Credit','')";

							$this->model->confirmbpay($data, $bcols, $bvals);
						}
					
				}
				
				$keyfieldins = $this->model->getKeyValue("installmentmst","xinsnum","INS-","6");
				$saledt = $this->model->getsalesdata($cus);
				//print_r($saledt);die;
				$inssl = $this->model->getRow("installmentmst","xinsnum",$keyfieldins,"xinssl");
				//print_r($inssl);die;
				$icols = "bizid,xcus,xagent,xagentcom,xquotnum,xinssl,xdate,xinsnum,xpct,xamount,zemail,xbranch,xyear,xper";
				$ivals ="";
				if ($cofcus[0]['xmonth']!="") {
					$amt = ($saledt[0]['xrate']-$cofcus[0]['xdownpay'])/$cofcus[0]['xmonth'];
				}else{
					$amt = ($saledt[0]['xrate']-$cofcus[0]['xdownpay'])/1;
				}
				//print_r($amt);die;
				if($cofcus[0]['xtype']=='Multiple Month' && $cofcus[0]['xmonth']>1){
					$invm = $cofcus[0]['xmonthint'];
					for($i=1; $i<=$cofcus[0]['xmonth']; $i++){

						$dte = date('Y-m-d', strtotime($saledt[0]['xdate'].'+'.$invm.' month'));
						$mnth = date('n',strtotime($dte));
						$yar = date('Y',strtotime($dte));
						$ivals .= "(" . Session::get('sbizid') . ",'". $cofcus[0]['xcus'] ."','". $cofcus[0]['xagent'] ."','". $cofcus[0]['xagentcom'] ."','". $cofcus[0]['xquotnum'] ."',
						'".$inssl."', '".$dte."', '". $keyfieldins ."','0','". $amt ."','". Session::get('suser') ."','". Session::get('sbranch') ."',
						'". $yar ."','". $mnth ."'),";

						$invm = $invm+$cofcus[0]['xmonthint'];
						$inssl++;
					}
				}elseif($cofcus[0]['xtype']=='At A Time'){
						$ivals = "(" . Session::get('sbizid') . ",'". $cofcus[0]['xcus'] ."','". $cofcus[0]['xagent'] ."','". $cofcus[0]['xagentcom'] ."','". $cofcus[0]['xquotnum'] ."','".$inssl."',
						'". $cofcus[0]['xinsdate'] ."', '". $keyfieldins ."','0','". $amt ."','". Session::get('suser') ."','". Session::get('sbranch') ."',
						'". $insyear ."','". $insmonth ."')";
				}
						$ivals = rtrim($ivals,",");

			$this->model->confirm($postdata,$where);

			$tblvalues=array();
			$tblvalues = $this->model->getSingleCustomer($cus);
			if($tblvalues[0]['xstatus']=="Confirmed"){

				$inssuccess = $this->model->InsCreate($icols,$ivals);
				if ($inssuccess>0) {
					$result='Customer Confirmed!';
				}
				
			}else{
				$result="Confirm Failed";
			}
			$this->showentry($cus, $result);

		}

		function cancelpost(){
			$cus = $_POST['xcus'];
			$cuscan=array();
			$cuscan = $this->model->getSingleCustomer($cus);
			if($cuscan[0]['xstatus']=="Canceled"){
					$result='Customer Already Canceled!';
				}else{
					$postdata=array(
					"xstatus" => "Canceled"
					);				
					$where = " bizid = ". Session::get('sbizid') ." and xcus = '". $cus ."'";

					$insdata=array(
					"xactive" => "Canceled"
					);				
					$inswhere = " bizid = ". Session::get('sbizid') ." and xcus = '". $cus ."'";

					$this->model->confirm($postdata,$where);
					$tblvalues=array();
					$tblvalues = $this->model->getSingleCustomer($cus);
					if($tblvalues[0]['xstatus']=="Canceled"){

						$this->model->Cancel($insdata,$inswhere);
						$result='Customer Canceled!';
					}else{
						$result='Canceled Failed!';
					}
				}
				$this->showentry($cus, $result);
		}
		
		function customerlist($status){ 
			$btn = '<div>
				<a href="'.URL.'customers/allcustomers" class="btn btn-primary">Print Customer List</a>
				<a href="'.URL.'customers/printinvoiceblank" class="btn btn-primary">Blank Invoice Print</a>
				</div>
				<div>
				<hr/>
				</div>';
			$this->view->table = $btn.$this->itemTable($status);
			
			$this->view->renderpage('customers/customerlist', false);
		}
		
		function picklist(){
			$this->view->table = $this->customerPickTable();
			
			$this->view->renderpage('customers/customerpicklist', false);
		}
		
		function customerPickTable(){
			$fields = array(
						"xcus-Customer No",
						"xshort-Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xcustype-Customer Type"
						);
			$table = new Datatable();
			$row = $this->model->getCustomersByLimit();
			
			return $table->picklistTable($fields, $row, "xcus");
		}
		
		function itemTable($status){
			$fields = array(
						"xcus-Customer No",
						"xshort-Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xcustype-Customer Type"
						);
			$table = new Datatable();
			$row = $this->model->getCustomers($status);
			
			return $table->createTable($fields, $row, "xcus", URL."customers/showcustomer/");
		}

		function platpicklist(){
			$this->view->table = $this->platPickTable();
			
			$this->view->renderpage('customers/customerpicklist', false);
		}
		
		function platPickTable(){
			$fields = array(
						"xplatcode-Plat Code",
						"xdesc-Description",
						"xlevel-Level",
						"xtype-Type",
						"xsqurefit-Squrefit"
						);
			$table = new Datatable();
			$row = $this->model->getplatsByLimit();
			
			return $table->picklistTable($fields, $row, "xplatcode");
		}

		function plotwisesales(){ 
			
			$this->view->table = $this->plotTable();
			
			$this->view->renderpage('customers/customerlist', false);
		}
		function plotTable(){
			$fields = array(
						"xcus-Customer No",
						"xshort-Name",
						"xplatcode-Item",
						"xdesc-Description",
						"xblock-Block",
						"xroad-Road",
						"xplot-Plot",
						"xlevel-Level"
						);
			$table = new Datatable();
			$row = $this->model->getPlotDetail();
			
			return $table->createTable($fields, $row, "xcus", URL."customers/showcustomer/");
		}
		
		function printinvoiceblank(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li>Sales Invoice</li>							
						   </ul>';
			
			$this->view->renderpage('customers/printinvoiceblank', false);
		}

		function allcustomers(){
			$fields = array(
						"xcus-Customer No",
						"xshort-Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xcustype-Customer Type"
						);
			$table = new Datatable();
			$row = $this->model->getCustomersByLimit();
			$btn = '<div><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button">
			<span class="glyphicon glyphicon-print"></span>&nbsp;Print</a>
			</div><div id="printdiv">
			<div><img style="height: 94px; width: 100%;" src="'.URL.'public/images/company_header.jpg" alt="" /></div>
			<div style="text-align:center"><br/><strong>Customer List</strong></div></br>';
			$this->view->table=$btn.$table->myTable($fields, $row, "xcus").'<div><img style="height: 94px; width: 100%;" src="'.URL.'public/images/company_footer.jpg" alt="" /></div></div>';
			$this->view->renderpage('customers/customerlist', false);
		}
		
		function customerentry(){
				
		$btn = array(
			"Clear" => URL."customers/customerentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Customer",$btn);		
			$imagename1 = '../images/customers/noimage.jpg';
			$imagename2 = '../images/nominee/noimage.jpg';
			
			$this->view->filename1 = $imagename1;
			$this->view->filename2= $imagename2;
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."customers/savecustomers	", "Save",$this->values, URL."customers/showpost","","imagefield","imagefield2");
			$this->view->table ="";
			//$this->view->table = $this->renderTable();
			
			$this->view->renderpage('customers/customerentry', false);
		}
		
		public function deletesales($cus, $row){
			$tblvalues = $this->model->getCusSale($cus);
			$item = $this->model->getitem($cus, $row);
			$result = "";
			if(count($tblvalues)>0){
			if($tblvalues[0]["xstatus"]=="Created")
				$result = $this->model->delete(" where xcus='".$cus."' and xrow=".$row);
			$this->model->itemupdate($item[0]['xplatcode']);
			}
			$this->showcustomer($cus, $result);
		}
		
		public function showpost(){
		$cus = $_POST['xcus'];
		//print_r($cus);die;
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."customers/customerentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($cus);
		$totamt = $this->model->getsalesdata($cus);
		$conf="";
		$sv="";
		$svbtn = "Save";
		if(count($tblvalues)>0){	
			if($tblvalues[0]['xstatus']=="Created"){
				$conf=array(URL."customers/confirmpost", "Confirm");
				$sv=URL."customers/savecustomers/";
			}		
			if($tblvalues[0]['xstatus']=="Confirmed"){
				$sv="";
				$conf=array(URL."customers/cancelpost", "Cancel");

			}		
		}
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
				"xcus"=>$tblvalues[0]['xcus'],
				"xshort"=>$tblvalues[0]['xshort'],
				"xorg"=>$tblvalues[0]['xorg'],
				"xadd1"=>$tblvalues[0]['xadd1'],
				"xadd2"=>$tblvalues[0]['xadd2'],
				"xbillingadd"=>$tblvalues[0]['xbillingadd'],
				"xdeliveryadd"=>$tblvalues[0]['xdeliveryadd'],
				"xcity"=>$tblvalues[0]['xcity'],
				"xprovince"=>$tblvalues[0]['xprovince'],
				"xcountry"=>$tblvalues[0]['xcountry'],
				"xcontact"=>$tblvalues[0]['xcontact'],
				"xphone"=>$tblvalues[0]['xphone'],
				"xcusemail"=>$tblvalues[0]['xcusemail'],
				"xmobile"=>$tblvalues[0]['xmobile'],
				"xnid"=>$tblvalues[0]['xnid'],
				"xagent"=>$tblvalues[0]['xagent'],
				"xagentcom"=>$tblvalues[0]['xagentcom'],
				"xbookcom"=>$tblvalues[0]['xbookcom'],
				"zactive"=>$tblvalues[0]['zactive'],
				"xoccupation"=>$tblvalues[0]['xoccupation'],
				"xdob"=>$tblvalues[0]['xdob'],
				"xreligion"=>$tblvalues[0]['xreligion'],
				"xnoname"=>$tblvalues[0]['xnoname'],
				"xnorelation"=>$tblvalues[0]['xnorelation'],
				"xnoage"=>$tblvalues[0]['xnoage'],
				"nofather"=>$tblvalues[0]['nofather'],
				"xnoadd"=>$tblvalues[0]['xnoadd'],
				"xnonid"=>$tblvalues[0]['xnonid'],
				"xbookpay"=>$tblvalues[0]['xbookpay'],
				"xplatcode"=>"",
				"xdesc"=>"",
				"xdate"=>$tblvalues[0]['xdate'],
				"xrate"=>"0.00",
				"xlevel"=>"",
				"xplattype"=>"",
				"xsqurefit"=>"",
				"xdownpay"=>$tblvalues[0]['xdownpay'],
				"xnotes"=>$tblvalues[0]['xnotes'],
				"xinsnum"=>"",
				"xinsdate"=>$tblvalues[0]['xinsdate'],
				"xquotnum"=>$tblvalues[0]['xquotnum'],
				"xtype"=>$tblvalues[0]['xtype'],
				"xmonth"=>$tblvalues[0]['xmonth'],
				"xmonthint"=>$tblvalues[0]['xmonthint'],
				"xchequeno"=>$tblvalues[0]['xchequeno'],
				"xchequedate"=>$tblvalues[0]['xchequedate'],
				"xrow"=>"0"
			);
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Customer", $btn,'<a style="color:red" id="invnum" href="'.URL.'customers/showinvoice/'.$cus.'">Click To Print Invoice - '.$cus.'</a>');
			$file = 'images/customers/cussm/'.$cus.'.jpg';
				$file2 = 'images/nominee/nomism/'.$cus.'.jpg';
		
		$imagename = "";	
		$imagename2 = "";	
		if(file_exists($file))
			$imagename = '../'.$file;
		else
			$imagename = '../images/customers/noimage.jpg';
			
		if(file_exists($file2))
			$imagename2 = '../'.$file2;
		else
			$imagename2 = '../images/nominee/noimage.jpg';

			$this->view->filename1 = $imagename;
			$this->view->filename2 = $imagename2;
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, $svbtn,$tblvalues ,URL."customers/showpost",$conf,"imagefield","imagefield2");
			
			$this->view->table = $this->renderTable($cus);
			
			$this->view->renderpage('customers/customerentry');
		}
		
		function createopbal(){
			
			$mstdata = array(
			"bizid"=>"100",
			"xvoucher"=>"OP--000001",
			"xnarration"=>"Customer Opening Balance",
			"xyear"=>"2018",
			"xper"=>"7",
			"xstatusjv"=>"Created",
			"xbranch" => "Head Office",
			"xdoctype" => "Opening Balance",
			"xdocnum" => "OP--000001",
			"xdate" => "2019-01-02",
			"xsite" => "",
			"zemail"=>"System"
			);
			
						
			$amt  = 0;
			$amtnot = 0;
			$data = $this->data();
			foreach ($data as $key=>$val){
				if($val>0)
					$amt += $val;
				if($val<0)
					$amtnot += $val;
				
			}
			
		//$checkval = " bizid = " . $data['bizid'] . " and xvoucher ='" . $data['xvoucher'] ."'";
			$i=1;
				$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,
				`xexch`,`xprime`,xflag";
				$vals = "(100,'OP--000001',".$i.",'2035',
					'Liability','Ledger','None','','BDT',
					'-". $amt ."','1','-". $amt ."','Credit'),";
				$i+=1;
				$vals .= "(100,'OP--000001',".$i.",'2035',
					'Liability','Ledger','None','','BDT',
					'". abs($amtnot) ."','1','". abs($amtnot) ."','Debit'),";	
					
				foreach ($data as $key=>$val){
				$i++;
					if($val>0){
					
					$vals .= "(100,'OP--000001',".$i.",'1010',
					'Asset','AR','Customer','". $key ."','BDT',
					'". $val ."','1','". $val ."','Debit'),";
					}
					
					if($val<0){
					
					$vals .= "(100,'OP--000001',".$i.",'1010',
					'Asset','AR','Customer','". $key ."','BDT',
					'". $val ."','1','". $val ."','Credit'),";
					}
					
				}
				
				$vals = rtrim($vals,",");
				//echo $vals; die;
				echo $this->model->createopeningbal($mstdata, $cols, $vals);
		}
		
		function data(){
			return array(
				'AKS-000152'=>4700.6,




	
			);
		}
		
}