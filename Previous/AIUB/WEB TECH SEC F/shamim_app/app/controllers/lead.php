<?php
class Lead extends Controller{
	
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
				if($menus["xsubmenu"]=="Lead Entry")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','public/js/imageshow.js','views/lead/js/codevalidator.js');
		
		$this->values = array(
			"xleadprefix"=>"",
			"xlead"=>"",
			"xshort"=>"",
			"xorg"=>"",
			"xadd"=>"",
			"xbillingadd"=>"",
			"xdeliveryadd"=>"",
			"xcity"=>"",
			"xprovince"=>"",
			"xpostal"=>"",
			"xcountry"=>"",
			"xcontact"=>"",
			"xtitle"=>"",
			"xphone"=>"",
			"xcusemail"=>"",
			"xmobile"=>"",
			"xfax"=>"",
			"xweburl"=>"",
			"xnid"=>"",
			"zactive"=>"1"
			);
			
			$this->fields = array(array(
							"xleadprefix-select_Lead Prefix"=>'Lead Prefix_maxlength="4"',
							"xlead-group_".URL."lead/picklist"=>'Lead Code_maxlength="20"'
							),
						array(
							"xshort-text"=>'Short_maxlength="20"',
							"xorg-text"=>'Description_maxlength="100"'
							),		
						array(
							"xadd-textarea"=>'Address_maxlength="160"'
							),
						array(
							"xbillingadd-text"=>'Billing Address_maxlength="160"',
							"xdeliveryadd-text"=>'Delivery Address_maxlength="160"'
							),
						array(
							"xcity-select_City"=>'City_maxlength="50"',
							"xprovince-select_Province"=>'District_maxlength="100"'
							),
						array(
							"xpostal-text"=>'Postal Code_maxlength="50"',
							"xcountry-select_Country"=>'Country_maxlength="50"'
							),		
						array(
							"xcontact-text"=>'Contact_maxlength="50"',
							"xtitle-text"=>'Title_maxlength="50"'
							),
						array(
							"xphone-text"=>'Phone_maxlength="50"',
							"xmobile-text"=>'Mobile_maxlength="50"'
							),
						array(
							"xcusemail-text"=>'Email_maxlength="50" email="true"',
							"xfax-text"=>'Fax_maxlength="50"'
							),
						array(
							"xweburl-text"=>'Web Site_maxlength="50"',
							"xnid-text"=>'NID_maxlength="50"'
							),
						array(
							"zactive-checkbox_1"=>'Active?_""'
							)	
						);
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."lead/customerentry",
		);	
		
		
		// form data
		
			$dynamicForm = new Dynamicform("Lead",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."lead/savelead", "Save",$this->values,URL."lead/showpost");
			
			$this->view->table = $this->renderTable();
			
			$this->view->rendermainmenu('lead/index');
			
		}
		
		public function savelead(){
				// if (!isset($_POST['xlead'])){
				// 	header ('location: '.URL.'lead');
				// 	exit;
				// }
		$cusauto =	Session::get('sbizcusauto');	
		$prefix = $_POST['xleadprefix'];	
		$keyfieldval = $this->model->getKeyValue("crmlead","xlead",$prefix,"6");			
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				try{
					
				if($cusauto=="NO"){
				$form	->post('xlead')
						->val('minlength', 1)
						->val('maxlength', 20);
				}						
				
				$form	->post('xshort')
						->val('maxlength', 20)
				
						->post('xorg')
						->val('minlength', 4)
						->val('maxlength', 160)
						
						->post('xadd')
						->val('maxlength', 160)
						
						->post('xbillingadd')
						->val('maxlength', 160)
						
						->post('xdeliveryadd')
						->val('maxlength', 160)
						
						->post('xcity')
						->val('maxlength', 50)
						
						->post('xprovince')
						
						->post('xpostal')
						->val('maxlength', 20)
						
						->post('xcountry')
						
						->post('xcontact')
						->val('maxlength', 50)
						
						->post('xtitle')
						->val('maxlength', 50)
						
						->post('xphone')
						->val('maxlength', 15)
						
						->post('xfax')
						->val('maxlength', 20)
						
						->post('xmobile')
						->val('maxlength', 14)
						
						->post('xcusemail')
						->val('maxlength', 100)
						
						->post('xweburl')
						->val('maxlength', 50)
						
						->post('xnid')
						->val('maxlength', 20)
						
						->post('xleadprefix')
						
						->post('zactive');
						
				$form	->submit();
				
				$data = $form->fetch();
				//if($cusauto=="YES")
				$data['xlead'] = $keyfieldval;	
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				//print_r($data);die;				
				$success = $this->model->create($data);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				
				
				if($success>0){
					$this->result = "Lead saved successfully";
					if ($_FILES['imagefield']["name"]){
						$imgupload = new ImageUpload();
						$imgupload->store_uploaded_image('images/lead/cuslg/','imagefield', 400, 400,$keyfieldval);
						$imgupload->store_uploaded_image('images/lead/cussm/','imagefield', 171, 181,$keyfieldval);
					}
				}
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to save lead!";
				
				 $this->showentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		public function editcustomer($lead){
			//echo "hi"; die;
			if (!isset($_POST['xlead'])){
					header ('location: '.URL.'lead');
					exit;
				}
			$result = "";
			
			$success=false;
			$form = new Form();
				$data = array();
				
				try{
					
					
				
				
				$form	->post('xlead')
						->val('minlength', 1)
						->val('maxlength', 20)
										
				
						->post('xshort')
						->val('maxlength', 20)
				
						->post('xorg')
						->val('minlength', 4)
						->val('maxlength', 160)
						
						->post('xadd')
						->val('maxlength', 160)
						
						->post('xbillingadd')
						->val('maxlength', 160)
						
						->post('xdeliveryadd')
						->val('maxlength', 160)
						
						->post('xcity')
						->val('maxlength', 50)
						
						->post('xprovince')
						
						->post('xpostal')
						->val('maxlength', 20)
						
						->post('xcountry')
						
						->post('xcontact')
						->val('maxlength', 50)
						
						->post('xtitle')
						->val('maxlength', 50)
						
						->post('xphone')
						->val('maxlength', 15)
						
						->post('xfax')
						->val('maxlength', 20)
						
						->post('xmobile')
						->val('maxlength', 14)
						
						->post('xcusemail')
						->val('maxlength', 100)
						
						->post('xweburl')
						->val('maxlength', 50)
						
						->post('xnid')
						->val('maxlength', 20)
						
						
						->post('zactive');
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
				$success = $this->model->editCustomer($data, $lead);
				
				
				}catch(Exception $e){
					//echo $e->getMessage();die;
					$result = $e->getMessage();
					
				}
				if($result==""){
				if($success){
					$result = "Edited successfully";
					$file = 'images/lead/cussm/'.$lead.'.jpg';
					if ($_FILES['imagefield']["name"]){
						if(file_exists($file))
							unlink($file); 
						
						$imgupload = new ImageUpload();
						$imgupload->store_uploaded_image('images/lead/cuslg/','imagefield', 400, 400, $lead);
						$imgupload->store_uploaded_image('images/lead/cussm/','imagefield', 171, 181, $lead);
						
					}
				}
				else
					$result = "Edit failed!";
				
				}
				 $this->showcustomer($lead, $result);
				
		
		}
		
		public function showcustomer($lead="", $result=""){
		if($lead==""){
			header ('location: '.URL.'lead');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."lead/customerentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($lead);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Lead", $btn, $result);
			
			$file = 'images/lead/cussm/'.$lead.'.jpg';
		
		$imagename = "";	
		if(file_exists($file))
			$imagename = '../../'.$file;
		else
			$imagename = '../../images/products/noimage.jpg';
			
			$this->view->filename = $imagename;
		
		$this->view->filename = $imagename;
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."lead/editcustomer/".$lead, "Edit",$tblvalues, URL."lead/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('lead/customerentry');
		}
		
		
		
		public function showentry($lead, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."lead/customerentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($lead);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Lead", $btn, $result);	
				$file = 'images/lead/cussm/'.$lead.'.jpg';
		
		$imagename = "";	
		if(file_exists($file))
			$imagename = '../../'.$file;
		else
			$imagename = '../../images/products/noimage.jpg';
			
			$this->view->filename = $imagename;
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."lead/savelead", "Save",$tblvalues ,URL."lead/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('lead/customerentry');
		}
		
		function renderTable(){
			$fields = array(
						"xlead-Lead No",
						"xorg-Organization/Name",
						"xadd-Address",
						"xmobile-Mobile"
						);
			$table = new Datatable();
			$row = $this->model->getleadByLimit(" LIMIT 5");
			
			return $table->myTable($fields, $row, "xlead", URL."lead/showcustomer/");
			
			
		}
		
		function customerlist(){
			$btn = '<div>
				<a href="'.URL.'lead/alllead" class="btn btn-primary">Print Lead List</a>
				</div>
				<div>
				<hr/>
				</div>';
			$this->view->table = $btn.$this->itemTable();
			
			$this->view->renderpage('lead/customerlist', false);
		}
		
		function picklist(){
			$this->view->table = $this->leadPickTable();
			
			$this->view->renderpage('lead/customerpicklist', false);
		}
		
		function leadPickTable(){
			$fields = array(
						"xlead-Lead No",
						"xorg-Organization/Name",
						"xadd-Address",
						"xmobile-Mobile",
						"xcustype-Lead Type"
						);
			$table = new Datatable();
			$row = $this->model->getleadByLimit();
			
			return $table->picklistTable($fields, $row, "xlead");
		}
		
		function itemTable(){
			$fields = array(
						"xlead-Lead No",
						"xorg-Organization/Name",
						"xadd-Address",
						"xmobile-Mobile",
						"xcustype-Lead Type"
						);
			$table = new Datatable();
			$row = $this->model->getleadByLimit();
			//print_r($row); die;
			return $table->createTable($fields, $row, "xlead", URL."lead/showcustomer/", URL."lead/deletecustomer/");
		}
		
		function alllead(){
			$fields = array(
						"xlead-Lead No",
						"xorg-Organization/Name",
						"xadd-Address",
						"xmobile-Mobile",
						"xcustype-Lead Type"
						);
			$table = new Datatable();
			$row = $this->model->getleadByLimit();
			$btn = '<div><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button">
			<span class="glyphicon glyphicon-print"></span>&nbsp;Print</a>
			</div><div id="printdiv"><div style="text-align:center">'.Session::get('sbizlong').'<br/>Lead List</div><hr/>';
			$this->view->table=$btn.$table->myTable($fields, $row, "xlead")."</div>";
			$this->view->renderpage('lead/customerlist', false);
		}
		
		function customerentry(){
				
		$btn = array(
			"Clear" => URL."lead/customerentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Lead",$btn);		
			$imagename = '../images/products/noimage.jpg';
			
			$this->view->filename = $imagename;
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."lead/savelead	", "Save",$this->values, URL."lead/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('lead/customerentry', false);
		}
		
		public function deletecustomer($lead){
			$where = "bizid=".Session::get('sbizid')." and xlead='".$lead."'";
			$this->model->delete($where);
			$this->view->message = "";
			$this->customerlist();
		}
		
		public function showpost(){
			$lead = $_POST['xlead'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."lead/customerentry"
		);
		
		$tblvalues = $this->model->getSingleCustomer($lead);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Lead", $btn);
			$file = 'images/lead/cussm/'.$lead.'.jpg';
		
		$imagename = "";	
		if(file_exists($file))
			$imagename = '../../'.$file;
		else
			$imagename = '../../images/products/noimage.jpg';
			
			$this->view->filename = $imagename;
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."lead/savelead", "Save",$tblvalues,URL."lead/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('lead/customerentry');
		}
		
		function createopbal(){
			
			$mstdata = array(
			"bizid"=>"100",
			"xvoucher"=>"OP--000001",
			"xnarration"=>"Customer Opening Balance",
			"xyear"=>"2017",
			"xper"=>"11",
			"xstatusjv"=>"Created",
			"xbranch" => "Head Office",
			"xdoctype" => "Opening Balance",
			"xdocnum" => "OP--000001",
			"xdate" => "2018-05-20",
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
		
		
		
}