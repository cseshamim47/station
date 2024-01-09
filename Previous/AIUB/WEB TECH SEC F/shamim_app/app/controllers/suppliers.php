<?php
class Suppliers extends Controller{
	
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
				if($menus["xsubmenu"]=="Supplier Database")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','public/js/imageshow.js');
		
		$this->values = array(
			"prefix"=>"",
			"xsup"=>"",
			"xshort"=>"",
			"xorg"=>"",
			"xadd1"=>"",
			"xadd2"=>"",
			"xcity"=>"",
			"xprovince"=>"",
			"xpostal"=>"",
			"xcountry"=>"",
			"xcontact"=>"",
			"xtitle"=>"",
			"xphone"=>"",
			"xsupemail"=>"",
			"xmobile"=>"",
			"xfax"=>"",
			"xweburl"=>"",
			"xnid"=>"",
			"xtaxno"=>"",
			"xtaxscope"=>"",
			"xgsup"=>"",
			"xpricegroup"=>"",
			"xsuptype"=>"",
			"xdiscountpct"=>"0",
			"xcreditlimit"=>"0",
			"xcreditterms"=>"0",
			"zactive"=>"1"
			);
			
	$this->fields = array(array(
							"prefix-select_Supplier Prefix"=>'Supplier Prefix_maxlength="4"',
							"xsup-group_".URL."suppliers/picklist"=>'Supplier Code_maxlength="20"'
							),
						array(
							"xorg-text"=>'Organization_maxlength="100"',
							"xadd1-text"=>'Address_maxlength="160"'
							),
						array(
							"xshort-text"=>'Contact Person 1_maxlength="50"',
							"xphone-text"=>'Mobile 1_maxlength="50"'
							),
						array(
							"xcontact-text"=>'Contact Person 2_maxlength="50"',
							"xmobile-text"=>'Mobile 2_maxlength="50"'
							),
						array(
							"xcity-select_Divition"=>'Divition_maxlength="50"',
							"xprovince-select_District"=>'District_maxlength="100"'
							),
						array(
							"xpostal-text"=>'Postal Code_maxlength="50"',
							"xcountry-select_Country"=>'Country_maxlength="50"'
							),
						array(
							"xsupemail-text"=>'Email_maxlength="50" email="true"',
							"xdiscountpct-text_number"=>'Discount (%)_number="true" minlength="1" maxlength="18"'
							),		
						array(
							"xcreditlimit-text_number"=>'Credit Limit_number="true" minlength="1" maxlength="18"',
							"xcreditterms-text_digit"=>'Credit Limit(days)_digit="true" minlength="1" maxlength="3"'
							),
						array(
							"zactive-checkbox_1"=>'Active?_""'
						),





						array(
							"xadd2-hidden"=>'',
							),		
						array(
							//"xcontact-hidden"=>'',
							"xtitle-hidden"=>'',
							),
						array(
							//"xphone-hidden"=>'',
							),
						array(
							"xfax-hidden"=>'',
							),
						array(
							"xweburl-hidden"=>'',
							"xnid-hidden"=>'',
							),
						array(
							"xtaxno-hidden"=>'',
							"xtaxscope-hidden"=>'',
							),
						array(
							"xgsup-hidden"=>'',
							"xpricegroup-hidden"=>'',
							),		
						array(
							"xsuptype-hidden"=>'',
							),	




						
						// array(
						// 	"xadd1-text"=>'Address_maxlength="160"',
						// 	"xadd2-text"=>'Address2_maxlength="160"'
						// 	),		
						// array(
						// 	"xcontact-text"=>'Contact_maxlength="50"',
						// 	"xtitle-text"=>'Title_maxlength="50"'
						// 	),
						// array(
						// 	"xphone-text"=>'Phone_maxlength="50"'
						// 	),
						// array(
						// 	"xfax-text"=>'Fax_maxlength="50"'
						// 	),
						// array(
						// 	"xweburl-text"=>'Web Site_maxlength="50"',
						// 	"xnid-text"=>'NID_maxlength="50"'
						// 	),
						// array(
						// 	"xtaxno-text"=>'Tax No_maxlength="50"',
						// 	"xtaxscope-select_Tax Scope"=>'Tax Scope_maxlength="50"'
						// 	),
						// array(
						// 	"xgsup-select_Supplier Group"=>'Supplier Group_maxlength="50"',
						// 	"xpricegroup-select_Supplier Price Group"=>'Price Group_maxlength="50"'
						// 	),		
						// array(
						// 	"xsuptype-select_Supplier Type"=>'Supplier Type_maxlength="50"',
						// 	),	
						);		
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."suppliers/supplierentry",
		);	
		
		
		
		// form data
		
			$dynamicForm = new Dynamicform("Supplier",$btn);		
					
			$imagename = '../images/products/noimage.jpg';
			
			$this->view->filename = $imagename;
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."suppliers/savesuppliers", "Save",$this->values,URL."suppliers/showpost","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->rendermainmenu('suppliers/index');
			
		}
		
		public function savesuppliers(){
				if (!isset($_POST['xsup'])){
					header ('location: '.URL.'suppliers');
					exit;
				}
		$supauto =	Session::get('sbizsupauto');	
		$prefix = $_POST['prefix'];	
		$keyfieldval = $this->model->getKeyValue("sesup","xsup",$prefix,"6");			
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				try{
					
				if($supauto=="NO"){
				$form	->post('xsup')
						->val('minlength', 1)
						->val('maxlength', 20);
				}						
				
				$form	->post('xshort')
						->val('maxlength', 50)
				
						->post('xorg')
						->val('minlength', 4)
						->val('maxlength', 160)
						
						->post('xadd1')
						->val('maxlength', 160)
						
						->post('xadd2')
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
						
						->post('xsupemail')
						->val('maxlength', 100)
						
						->post('xweburl')
						->val('maxlength', 50)
						
						->post('xnid')
						->val('maxlength', 20)
						
						->post('xtaxno')
						->val('maxlength', 20)
						
						->post('xtaxscope')
						
						->post('xgsup')
						
						->post('xpricegroup')
						
						->post('xsuptype')
						
												
						->post('xdiscountpct')
						->val('checkdouble')
						
												
						->post('xcreditlimit')
						->val('checkdouble')
						
						->post('xcreditterms')
						->val('digit')
						
						->post('zactive');
						
				$form	->submit();
				
				$data = $form->fetch();
				if($supauto=="YES")
					$data['xsup'] = $keyfieldval;	
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
					$this->result = "Supplier saved successfully";
					if ($_FILES['imagefield']["name"]){
						$imgupload = new ImageUpload();
						$imgupload->store_uploaded_image('images/customers/cuslg/','imagefield', 400, 400,$keyfieldval);
						$imgupload->store_uploaded_image('images/customers/cussm/','imagefield', 171, 181,$keyfieldval);
					}
				}
				if($success == 0 && empty($this->result))
					$this->result = "Failed to save supplier!";
				
				 $this->showentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		public function editsuppliers($sup){
			
			if (!isset($_POST['xsup'])){ 
					header ('location: '.URL.'suppliers');
					exit;
				}
			$result = "";
			
			$success=false;
			$form = new Form();
				$data = array();
				
				try{
					
					
				
				
				$form	->post('xsup')
						->val('minlength', 1)
						->val('maxlength', 20)
										
				
						->post('xshort')
						->val('maxlength', 50)
				
						->post('xorg')
						->val('minlength', 4)
						->val('maxlength', 160)
						
						->post('xadd1')
						->val('maxlength', 160)
						
						->post('xadd2')
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
						
						->post('xsupemail')
						->val('maxlength', 100)
						
						->post('xweburl')
						->val('maxlength', 50)
						
						->post('xnid')
						->val('maxlength', 20)
						
						->post('xtaxno')
						->val('maxlength', 20)
						
						->post('xtaxscope')
						
						->post('xgsup')
						
						->post('xpricegroup')
						
						->post('xsuptype')
						
												
						->post('xdiscountpct')
						->val('checkdouble')
						
												
						->post('xcreditlimit')
						->val('checkdouble')
						
						->post('xcreditterms')
						->val('digit')
						
						->post('zactive');
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
				$success = $this->model->editSupplier($data, $sup);
				
				
				}catch(Exception $e){
					//echo $e->getMessage();die;
					$result = $e->getMessage();
					
				}
				if($result==""){
				if($success){
					$result = "Edited successfully";
					$file = 'images/customers/cussm/'.$sup.'.jpg';
					if ($_FILES['imagefield']["name"]){
						if(file_exists($file))
							unlink($file); 
						
						$imgupload = new ImageUpload();
						$imgupload->store_uploaded_image('images/customers/cuslg/','imagefield', 400, 400, $sup);
						$imgupload->store_uploaded_image('images/customers/cussm/','imagefield', 171, 181, $sup);
						
					}
				}
				else
					$result = "Edit failed!";
				
				}
				 $this->showsupplier($sup, $result);
				
		
		}
		
		public function showsupplier($sup="", $result=""){
		if($sup==""){
			header ('location: '.URL.'suppliers');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."suppliers/supplierentry"
		);
		
		$tblvalues = $this->model->getSingleSupplier($sup);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Supplier", $btn, $result);	
			$file = 'images/customers/cussm/'.$sup.'.jpg';
		
			$imagename = "";	
			if(file_exists($file))
				$imagename = '../../'.$file;
			else
				$imagename = '../../images/products/noimage.jpg';
				
				$this->view->filename = $imagename;	
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."suppliers/editsuppliers/".$sup, "Edit",$tblvalues, URL."suppliers/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('suppliers/supplierentry');
		}
		
		
		
		public function showentry($sup, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."suppliers/supplierentry"
		);
		
		$tblvalues = $this->model->getSingleSupplier($sup);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Supplier", $btn, $result);	
			$file = 'images/customers/cussm/'.$sup.'.jpg';
			$imagename = "";	
			if(file_exists($file))
				$imagename = '../../'.$file;
			else
				$imagename = '../../images/products/noimage.jpg';
				
				$this->view->filename = $imagename;	
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."suppliers/savesuppliers", "Save",$tblvalues ,URL."suppliers/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('suppliers/supplierentry');
		}
		
		function renderTable(){
			$fields = array(
						"xsup-Supplier Code",
						"xorg-Organization/Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xsupemail-Email"
						);
			$table = new Datatable();
			$row = $this->model->getSuppliersByLimit(" LIMIT 5");
			
			return $table->myTable($fields, $row, "xsup", URL."suppliers/showsupplier/");
			
			
		}
		
		function supplierlist(){
			$btn = '<div>
				<a href="'.URL.'suppliers/allsuppliers" class="btn btn-primary">Print Supplier List</a>
				</div>
				<div>
				<hr/>
				</div>';
			$this->view->table = $btn.$this->supplierTable();
			
			$this->view->renderpage('suppliers/supplierlist', false);
		}
		
		function picklist(){
			$this->view->table = $this->supplierPickTable();
			
			$this->view->renderpage('suppliers/supplierpicklist', false);
		}
		
		function supplierPickTable(){
			$fields = array(
						"xsup-Supplier Code",
						"xorg-Organization/Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xsupemail-Email"
						);
			$table = new Datatable();
			$row = $this->model->getSuppliersByLimit();
			
			return $table->picklistTable($fields, $row, "xsup");
		}
		
		function supplierTable(){
			$fields = array(
						"xsup-Supplier Code",
						"xorg-Organization/Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xsupemail-Email"
						);
			$table = new Datatable();
			$row = $this->model->getSuppliersByLimit();
			
			return $table->createTable($fields, $row, "xsup", URL."suppliers/showsupplier/", URL."suppliers/deletesupplier/");
		}

		function allsuppliers(){
			$fields = array(
						"xsup-Supplier Code",
						"xorg-Organization/Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xsupemail-Email"
						);
			$table = new Datatable();
			$row = $this->model->getSuppliersByLimit();
			$btn = '<div><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button">
			<span class="glyphicon glyphicon-print"></span>&nbsp;Print</a>
			</div><div id="printdiv">
			<div><img style="height: 94px; width: 100%;" src="'.URL.'public/images/company_header.jpg" alt="" /></div>
			<div style="text-align:center"><br/><strong>Suppliers List</strong></div></br>';
			$tbl=$btn.$table->myTable($fields, $row, "xagent");
			$this->view->table=$tbl.'<div><img style="height: 94px; width: 100%;" src="'.URL.'public/images/company_footer.jpg" alt="" /></div></div>';
			$this->view->renderpage('suppliers/supplierlist', false);
		}
		
		function supplierentry(){
				
		$btn = array(
			"Clear" => URL."suppliers/supplierentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Supplier",$btn);		
			$imagename = '../images/products/noimage.jpg';
			
			$this->view->filename = $imagename;
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."suppliers/savesuppliers	", "Save",$this->values, URL."suppliers/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('suppliers/supplierentry', false);
		}
		
		public function deletesupplier($sup){
			$where = "bizid=".Session::get('sbizid')." and xsup='".$sup."'";
			$this->model->delete($where);
			$this->view->message = "";
			$this->supplierlist();
		}
		
		public function getsupplier($sup){
			$this->model->getSupplier($sup);
		}
		
		public function showpost(){
			$sup = $_POST['xsup'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."suppliers/supplierentry"
		);
		
		$tblvalues = $this->model->getSingleSupplier($sup);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Supplier", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."suppliers/savesuppliers", "Save",$tblvalues, URL."suppliers/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('suppliers/supplierentry');
		}
}