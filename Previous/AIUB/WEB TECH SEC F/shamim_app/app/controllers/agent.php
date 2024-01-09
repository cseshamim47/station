<?php
class Agent extends Controller{
	
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
				if($menus["xsubmenu"]=="Agent Entry")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','public/js/imageshow.js','views/agent/js/codevalidator.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xagent"=>"",
			"xshort"=>"",
			"xorg"=>"",
			"xadd1"=>"",
			"xadd2"=>"",
			"xbillingadd"=>"",
			"xdeliveryadd"=>"",
			"xcountry"=>"",
			"xphone"=>"",
			"xcusemail"=>"",
			"xmobile"=>"",
			"xnid"=>"",
			"xdob"=>$dt,
			"xreligion"=>"",
			"xoccupation"=>"",
			"zactive"=>"1"
			);
			
			$this->fields = array(array(
							"xagent-group_".URL."agent/picklist"=>'Agent Code_maxlength="20"'
							),
						array(
							"xshort-text"=>'Name_maxlength="160"',
							"xorg-text"=>'Description_maxlength="100"'
							),
						array(
							"xbillingadd-text"=>'Father Name_maxlength="160"',
							"xdeliveryadd-text"=>'Mother Name_maxlength="160"'
							),
						array(
							"xadd1-text"=>'Present Address_maxlength="160"',
							"xadd2-text"=>'Parmanent Address_maxlength="160"'
							),
						array(
							"xoccupation-text"=>'Occupation_maxlength="160"',
							"xcountry-select_Country"=>'Nationality_maxlength="160"'
							),
						array(
							"xdob-datepicker"=>'Date Of Birth_""',
							"xreligion-select_Religion"=>'Religion_maxlength="160"'
							),
						array(
							"xmobile-text"=>'Phone_maxlength="50"',
							"xphone-text"=>'Mobile_maxlength="50"'
							),
						array(
							"xcusemail-text"=>'Email_maxlength="50"',
							"xnid-text"=>'NID_maxlength="50"'
							),		
						array(
							"zactive-checkbox_1"=>'Active?_""'
							)
						);
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."agent/customerentry",
		);	
		
		
		// form data
		//$this->createopbal();
			$dynamicForm = new Dynamicform("Agent",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."agent/savecustomers", "Save",$this->values,URL."agent/showpost");
			$this->view->table ="";
			//$this->view->table = $this->renderTable();
			
			$this->view->rendermainmenu('agent/index');
			
		}
		
		public function savecustomers(){

				$date = date('Y-m-d');
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date));
				
				$yearoffset = Session::get('syearoffset');
				$xyear = 0;
				$per = 0;
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$per = $key;
					$xyear = $val;
				}

				if (!isset($_POST['xagent'])){
					header ('location: '.URL.'agent');
					exit;
				}
				$cusauto =	Session::get('sbizcusauto');
				$keyfieldval="0";
				
				//print_r($keyfieldso);die;
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				try{
					
				
				$form	->post('xagent')
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

						->post('xcountry')
						
						->post('xphone')
						->val('maxlength', 15)
						
						
						->post('xmobile')
						->val('maxlength', 14)
						
						->post('xcusemail')
						->val('maxlength', 100)
						
						
						->post('xnid')
						->val('maxlength', 20)
						
						
						->post('xoccupation')						
						->val('maxlength', 100)

						->post('xdob')

						->post('xreligion')						
						->val('maxlength', 100)
						
						->post('zactive');
						
				$form	->submit();
				
				$data = $form->fetch();

				if($data['xagent'] == "")
				$keyfieldval = $this->model->getKeyValue("agent","xagent","AG-","6");
				else
				$keyfieldval = $data['xagent'];
				

				$data['xagent'] = $keyfieldval;
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');



				// $file = fopen("C:/Users/kamrul/Desktop/testdoc.txt","w");
				// echo fwrite($file,$cvals);
				// fclose($file);


				$success = $this->model->create($data);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0){
					$this->result = "Agent saved successfully";
					if ($_FILES['imagefield']["name"]){
						$imgupload = new ImageUpload();
						$imgupload->store_uploaded_image('images/agent/cuslg/','imagefield', 400, 400,$keyfieldval);
						$imgupload->store_uploaded_image('images/agent/cussm/','imagefield', 171, 181,$keyfieldval);
					}
					
				}
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to save Agent!";
				
				 $this->showentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		public function editcustomer($agent){
			
			if (!isset($_POST['xagent'])){
					header ('location: '.URL.'agent');
					exit;
				}
			$result = "";
			
			$success=false;
			$form = new Form();
				$data = array();
				
				try{
					
					
				
				
				$form	->post('xagent')
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

						->post('xcountry')
						
						->post('xphone')
						->val('maxlength', 15)
						
						
						->post('xmobile')
						->val('maxlength', 14)
						
						->post('xcusemail')
						->val('maxlength', 100)
						
						
						->post('xnid')
						->val('maxlength', 20)
						
						
						->post('xoccupation')						
						->val('maxlength', 100)

						->post('xdob')

						->post('xreligion')						
						->val('maxlength', 100)
						
						->post('zactive');
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
				$success = $this->model->editCustomer($data, $agent);
				
				
				}catch(Exception $e){
					//echo $e->getMessage();die;
					$result = $e->getMessage();
					
				}
				if($result==""){
				if($success){
					$result = "Edited successfully";
					$file = 'images/agent/cussm/'.$agent.'.jpg';
					if ($_FILES['imagefield']["name"]){
						if(file_exists($file))
							unlink($file); 
						
						$imgupload = new ImageUpload();
						$imgupload->store_uploaded_image('images/agent/cuslg/','imagefield', 400, 400, $agent);
						$imgupload->store_uploaded_image('images/agent/cussm/','imagefield', 171, 181, $agent);
						
					}
				}
				else
					$result = "Edit failed!";
				
				}
				 $this->showcustomerdata($agent, $result);
				
		
		}

		public function showcustomerdata($agent="", $result=""){
		if($agent==""){
			header ('location: '.URL.'agent');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."agent/customerentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($agent);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
				"xagent"=>$tblvalues[0]['xagent'],
				"xshort"=>$tblvalues[0]['xshort'],
				"xorg"=>$tblvalues[0]['xorg'],
				"xadd1"=>$tblvalues[0]['xadd1'],
				"xadd2"=>$tblvalues[0]['xadd2'],
				"xbillingadd"=>$tblvalues[0]['xbillingadd'],
				"xdeliveryadd"=>$tblvalues[0]['xdeliveryadd'],
				"xcountry"=>$tblvalues[0]['xcountry'],
				"xphone"=>$tblvalues[0]['xphone'],
				"xcusemail"=>$tblvalues[0]['xcusemail'],
				"xmobile"=>$tblvalues[0]['xmobile'],
				"xnid"=>$tblvalues[0]['xnid'],
				"xoccupation"=>$tblvalues[0]['xoccupation'],
				"xdob"=>$tblvalues[0]['xdob'],
				"xreligion"=>$tblvalues[0]['xreligion'],
				"zactive"=>$tblvalues[0]['zactive']
			);
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Agent", $btn, $result);
			
			$file = 'images/agent/cussm/'.$agent.'.jpg';
		
		$imagename = "";	
		if(file_exists($file))
			$imagename = '../../'.$file;
		else
			$imagename = '../../images/products/noimage.jpg';
			
			$this->view->filename1 = $imagename;
		
		$this->view->filename = $imagename;
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."agent/editcustomer/".$agent, "Edit",$tblvalues, URL."agent/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('agent/customerentry');
		}
		
		public function showcustomer($agent="", $result=""){
		if($agent==""){
			header ('location: '.URL.'agent');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."agent/customerentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($agent);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
				"xagent"=>$tblvalues[0]['xagent'],
				"xshort"=>$tblvalues[0]['xshort'],
				"xorg"=>$tblvalues[0]['xorg'],
				"xadd1"=>$tblvalues[0]['xadd1'],
				"xadd2"=>$tblvalues[0]['xadd2'],
				"xbillingadd"=>$tblvalues[0]['xbillingadd'],
				"xdeliveryadd"=>$tblvalues[0]['xdeliveryadd'],
				"xcountry"=>$tblvalues[0]['xcountry'],
				"xphone"=>$tblvalues[0]['xphone'],
				"xcusemail"=>$tblvalues[0]['xcusemail'],
				"xmobile"=>$tblvalues[0]['xmobile'],
				"xnid"=>$tblvalues[0]['xnid'],
				"xoccupation"=>$tblvalues[0]['xoccupation'],
				"xdob"=>$tblvalues[0]['xdob'],
				"xreligion"=>$tblvalues[0]['xreligion'],
				"zactive"=>$tblvalues[0]['zactive']
			);
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Agent", $btn, $result);
			
			$file = 'images/agent/cussm/'.$agent.'.jpg';
		
		$imagename = "";	
		if(file_exists($file))
			$imagename = '../../../'.$file;
		else
			$imagename = '../../../images/products/noimage.jpg';
			
			$this->view->filename1 = $imagename;
		
		$this->view->filename = $imagename;
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."agent/editcustomer/".$agent, "Edit",$tblvalues, URL."agent/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('agent/customerentry');
		}
		
		
		
		public function showentry($agent, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."agent/customerentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($agent);
		

		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
				"xagent"=>$tblvalues[0]['xagent'],
				"xshort"=>$tblvalues[0]['xshort'],
				"xorg"=>$tblvalues[0]['xorg'],
				"xadd1"=>$tblvalues[0]['xadd1'],
				"xadd2"=>$tblvalues[0]['xadd2'],
				"xbillingadd"=>$tblvalues[0]['xbillingadd'],
				"xdeliveryadd"=>$tblvalues[0]['xdeliveryadd'],
				"xcountry"=>$tblvalues[0]['xcountry'],
				"xphone"=>$tblvalues[0]['xphone'],
				"xcusemail"=>$tblvalues[0]['xcusemail'],
				"xmobile"=>$tblvalues[0]['xmobile'],
				"xnid"=>$tblvalues[0]['xnid'],
				"xoccupation"=>$tblvalues[0]['xoccupation'],
				"xdob"=>$tblvalues[0]['xdob'],
				"xreligion"=>$tblvalues[0]['xreligion'],
				"zactive"=>$tblvalues[0]['zactive']
			);
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Customer", $btn, $result);	
				$file = 'images/agent/cussm/'.$agent.'.jpg';
		
		$imagename = "";
		if(file_exists($file))
			$imagename = '../'.$file;
		else
			$imagename = '../images/agent/noimage.jpg';
			
		
			$this->view->filename1 = $imagename;
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."agent/editcustomer/".$agent, "Edit",$tblvalues, URL."agent/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('agent/customerentry');
		}
		
		function renderTable(){
			$fields = array(
						"xagent-Agent Code",
						"xshort-Name",
						"xadd1-Address",
						"xmobile-Mobile"
						);
			$table = new Datatable();
			$row = $this->model->getCustomersByLimit(" LIMIT 5");
			
			return $table->myTable($fields, $row, "xagent", URL."agent/showcustomer/");
			
			
		}
		
		function customerlist(){
			$btn = '<div>
				<a href="'.URL.'agent/allcustomers" class="btn btn-primary">Print Agent List</a>
				</div>
				<div>
				<hr/>
				</div>';
			$this->view->table = $btn.$this->itemTable();
			
			$this->view->renderpage('agent/customerlist', false);
		}
		
		function picklist(){
			$this->view->table = $this->customerPickTable();
			
			$this->view->renderpage('agent/customerpicklist', false);
		}
		
		function customerPickTable(){
			$fields = array(
						"xagent-Agent No",
						"xshort-Name",
						"xadd1-Address",
						"xmobile-Mobile"
						);
			$table = new Datatable();
			$row = $this->model->getCustomersByLimit();
			
			return $table->picklistTable($fields, $row, "xagent");
		}
		
		function itemTable(){
			$fields = array(
						"xagent-Agent No",
						"xshort-Name",
						"xadd1-Address",
						"xmobile-Mobile"
						);
			$table = new Datatable();
			$row = $this->model->getCustomersByLimit();
			
			return $table->createTable($fields, $row, "xagent", URL."agent/showcustomer/", URL."agent/deletecustomer/");
		}
		
		function allcustomers(){
			$fields = array(
						"xagent-Agent No",
						"xshort-Name",
						"xadd1-Address",
						"xmobile-Mobile"
						);
			$table = new Datatable();
			$row = $this->model->getCustomersByLimit();
			$btn = '<div><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button">
			<span class="glyphicon glyphicon-print"></span>&nbsp;Print</a>
			</div><div id="printdiv">
			<div><img style="height: 94px; width: 100%;" src="'.URL.'public/images/company_header.jpg" alt="" /></div>
			<div style="text-align:center"><br/><strong>Agent List</strong></div></br>';
			$tbl=$btn.$table->myTable($fields, $row, "xagent");
			$this->view->table=$tbl.'<div><img style="height: 94px; width: 100%;" src="'.URL.'public/images/company_footer.jpg" alt="" /></div></div>';
			$this->view->renderpage('agent/customerlist', false);
		}
		
		function customerentry(){
				
		$btn = array(
			"Clear" => URL."agent/customerentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Agent",$btn);		
			$imagename1 = '../images/products/noimage.jpg';
			
			$this->view->filename1 = $imagename1;
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."agent/savecustomers	", "Save",$this->values, URL."agent/showpost","","imagefield");
			//$this->view->table ="";
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('agent/customerentry', false);
		}
		
		public function deletecustomer($agent){
			$where = "bizid=".Session::get('sbizid')." and xagent='".$agent."'";
			$this->model->delete($where);
			$this->view->message = "";
			$this->customerlist();
		}
		
		public function showpost(){
			$agent = $_POST['xagent'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."agent/customerentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($agent);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
				"xagent"=>$tblvalues[0]['xagent'],
				"xshort"=>$tblvalues[0]['xshort'],
				"xorg"=>$tblvalues[0]['xorg'],
				"xadd1"=>$tblvalues[0]['xadd1'],
				"xadd2"=>$tblvalues[0]['xadd2'],
				"xbillingadd"=>$tblvalues[0]['xbillingadd'],
				"xdeliveryadd"=>$tblvalues[0]['xdeliveryadd'],
				"xcountry"=>$tblvalues[0]['xcountry'],
				"xphone"=>$tblvalues[0]['xphone'],
				"xcusemail"=>$tblvalues[0]['xcusemail'],
				"xmobile"=>$tblvalues[0]['xmobile'],
				"xnid"=>$tblvalues[0]['xnid'],
				"xoccupation"=>$tblvalues[0]['xoccupation'],
				"xdob"=>$tblvalues[0]['xdob'],
				"xreligion"=>$tblvalues[0]['xreligion'],
				"zactive"=>$tblvalues[0]['zactive']
			);
		// form data
		
			
			$dynamicForm = new Dynamicform("Agent", $btn);
			$file = 'images/agent/cussm/'.$agent.'.jpg';
		
		$imagename = "";	
		if(file_exists($file))
			$imagename = '../'.$file;
		else
			$imagename = '../images/products/noimage.jpg';
			
			$this->view->filename1 = $imagename;
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."agent/editcustomer/".$agent, "Edit",$tblvalues,URL."agent/showpost","","imagefield");
			
			$this->view->table = "";
			
			$this->view->renderpage('agent/customerentry');
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