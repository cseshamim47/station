<?php
class Plats extends Controller{
	
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
				if($menus["xsubmenu"]=="Flat Entry")
					$iscode=1;							
		}
		//echo $iscode;
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','public/js/imageshow.js','views/plats/js/codevalidator.js');
		
		$this->values = array(
			"prefix"=>"",
			"xplatcode"=>"",
			"xdesc"=>"",
			"xlevel"=>"",
			"xlongdesc"=>"",
			"xtype"=>"",
			"xsqurefit"=>"",
			"xpricepur"=>"0",
			"xmrp"=>"0",
			"zactive"=>"1"
			);
			
		$this->fields = array(array(
							"prefix-select_Item Prefix"=>'Flat Prefix_maxlength="4"',
							),
						array(
							"xplatcode-group_".URL."plats/picklist"=>'Flat Code*~star_maxlength="20"',
							"xdesc-text"=>'Description*~star_maxlength="500"'
							),
						array(
							"xlongdesc-textarea"=>'Long Description_maxlength="500"'
							),
						array(
							"xlevel-select_Flat Level"=>'Level_maxlength="50"',
							"xtype-select_Flat Type"=>'Type_maxlength="50"'
							),
						array(
							"xsqurefit-text"=>'Squrefit_maxlength="50"',
							"xpricepur-text_number"=>'Purchase Price*~star_number="true" minlength="1" maxlength="18"'
							),
							array(
							"xmrp-text_number"=>'MRP*~star_number="true" minlength="1" maxlength="18"',
							"zactive-checkbox_1"=>'Active?_""'
							)
						);	
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."plats/platentry",
		);	
		
		
		// form data
		
			$dynamicForm = new Dynamicform("Flat",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."plats/saveplat", "Save",$this->values,URL."plats/showpost");
			
			$this->view->table = $this->renderTable();
			
			$this->view->rendermainmenu('plats/index');
			
		}
		
		public function saveplat(){
			$itemauto =	Session::get('sbizitemauto');
			//print_r($itemauto);die;
				
				if (empty($_POST['xplatcode']) && $itemauto=="NO"){
					header ('location: '.URL.'plats/platentry');
					exit;
				}

				$prefix = $_POST['prefix'];	
				$keyfieldval = $this->model->getKeyValue("seplat","xplatcode",$prefix,"6");	
		//print_r($keyfieldval);die;		
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				try{
					
				if($itemauto=="NO"){
				$form	->post('xplatcode')
						->val('minlength', 1)
						->val('maxlength', 20);
				}						
				
				$form	->post('xdesc')
						->val('minlength', 4)
						->val('maxlength', 500)
						
						->post('xlevel')
						
						->post('xlongdesc')
						->val('maxlength', 250)
						
						->post('xtype')
						
						->post('xsqurefit')
						
						->post('xpricepur')
						->val('checkdouble')
						
						->post('xmrp')
						->val('checkdouble')
						
						->post('zactive');
						
				$form	->submit();
				
				$data = $form->fetch();
				
				
				if($itemauto=="YES")
					$data['xplatcode'] = $keyfieldval;	
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
					$this->result = "Plat saved successfully";
					
					if ($_FILES['imagefield']["name"]){
						$imgupload = new ImageUpload();
						$imgupload->store_uploaded_image('images/products/prodlg/','imagefield', 400, 400, $data['xplatcode']);
						$imgupload->store_uploaded_image('images/products/prodsm/','imagefield', 171, 181, $data['xplatcode']);
					}
				}
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to save Plat!";
				
				 $this->showentry($data['xplatcode'], $this->result);
				 
				 
				
		}
		
		public function editplat($id){
			
			if (empty($_POST['xplatcode'])){
					header ('location: '.URL.'plats/platentry');
					exit;
				}
				
			$result = "";
			
			$success=false;
			$form = new Form();
				$data = array();
				
				try{
					
					
				
				$form	->post('xplatcode')
						->val('minlength', 1)
						->val('maxlength', 20)	
				
						->post('xdesc')
						->val('minlength', 4)
						->val('maxlength', 500)
						
						->post('xlevel')
						
						->post('xlongdesc')
						->val('maxlength', 250)
						
						->post('xtype')
						
						->post('xsqurefit')
						
						->post('xpricepur')
						->val('checkdouble')
						
						->post('xmrp')
						->val('checkdouble')
						
						->post('zactive');
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				$data['bizid'] = Session::get('sbizid');
				$data['xemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
				$success = $this->model->editplat($data, $id);
				
				
				}catch(Exception $e){
					//echo $e->getMessage();die;
					$result = $e->getMessage();
					
				}
				//var_dump($_POST); die;
				if($result==""){
				if($success){
					$result = "Edited successfully";
					$file = 'images/products/prodsm/'.$id.'.jpg';
					if ($_FILES['imagefield']["name"]){
						if(file_exists($file))
							unlink($file); 
						
						$imgupload = new ImageUpload();
						$imgupload->store_uploaded_image('images/products/prodlg/','imagefield', 400, 400, $id);
						$imgupload->store_uploaded_image('images/products/prodsm/','imagefield', 171, 181, $id);
						
					}
				}
				else
					$result = "Edit failed!";
				
				}
				 $this->showplatdata($id, $result);
				
		
		}
		
		public function showplatdata($id="", $result=""){
		if($id==""){
			header ('location: '.URL.'plats');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."plats/platentry"
		);
		
		$tblvalues = $this->model->getSinglePlat($id);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		$file = 'images/products/prodsm/'.$id.'.jpg';
		
		$imagename = "";	
		if(file_exists($file))
			$imagename = '../../'.$file;
		else
			$imagename = '../../images/products/noimage.jpg';
		
		$this->view->filename = $imagename;
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Flat", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."plats/editplat/".$id, "Edit",$tblvalues, URL."plats/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('plats/platentry');
		}
		
		public function showitem($id="", $result=""){
		if($id==""){
			header ('location: '.URL.'plats');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."plats/platentry"
		);
		
		$tblvalues = $this->model->getSinglePlat($id);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		$file = 'images/products/prodsm/'.$id.'.jpg';
		
		$imagename = "";	
		if(file_exists($file))
			$imagename = '../../../'.$file;
		else
			$imagename = '../../../images/products/noimage.jpg';
		
		$this->view->filename = $imagename;
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Flat", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."plats/editplat/".$id, "Edit",$tblvalues, URL."plats/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('plats/platentry');
		}
		
		
		public function showentry($id, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."plats/platentry"
		);
		
		$tblvalues = $this->model->getSinglePlat($id);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		$file = 'images/products/prodsm/'.$id.'.jpg';
		
		$imagename = "";
		
		if(file_exists($file))
			$imagename = '../'.$file;
		else
			$imagename = '../images/products/noimage.jpg';
		
		$this->view->filename = $imagename;
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Flat", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."plats/editplat/".$id, "Edit",$tblvalues ,URL."plats/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('plats/platentry');
		}
		
		function renderTable(){
			$fields = array(
						"xplatcode-Flat Code",
						"xdesc-Description",
						"xlevel-Level",
						"xtype-Type",	
						"xsqurefit-Squrefit"
						);
			$table = new Datatable();
			$row = $this->model->getPlatByLimit(" LIMIT 5");
			
			return $table->myTable($fields, $row, "xplatcode", URL."Plats/showplatdata/");
			
			
		}
		
		function platlist(){
			$btn = '<div>
				<a href="'.URL.'plats/allitems" class="btn btn-primary">Print Flat List</a>
				</div>
				<div>
				<hr/>
				</div>  ';
			$this->view->table = $btn.$this->platTable();
			
			$this->view->renderpage('plats/platlist', false);
		}
		
		function picklist(){
			$this->view->table = $this->platPickTable();
			
			$this->view->renderpage('plats/platpicklist', false);
		}
		
		function platPickTable(){
			$fields = array(
						"xplatcode-Flat Code",
						"xdesc-Description",
						"xlevel-Level",
						"xtype-Type",	
						"xsqurefit-Squrefit"	
						);
			$table = new Datatable();
			$row = $this->model->getPlatByLimit();
			
			return $table->picklistTable($fields, $row, "xplatcode");
		}
		
		function platTable(){
			$fields = array(
						"xplatcode-Flat Code",
						"xdesc-Description",
						"xlevel-Level",
						"xtype-Type",	
						"xsqurefit-Squrefit"
						);
			$table = new Datatable();
			$row = $this->model->getPlatByLimit();
			
			return $table->createTable($fields, $row, "xplatcode", URL."plats/showitem/", URL."plats/deleteplat/");
		}
		
		function allitems(){
			$fields = array(
						"xplatcode-Flat Code",
						"xdesc-Description",
						"xlevel-Level",
						"xtype-Type",	
						"xsqurefit-Squrefit"
						);
			$table = new Datatable();
			$row = $this->model->getPlatByLimit();
			$btn = '<div><a class="btn btn-primary" href="javascript:void(0);" onclick="window.print();" role="button">
			<span class="glyphicon glyphicon-print"></span>&nbsp;Print</a>
			</div><div id="printdiv">
			<div><img style="height: 94px; width: 100%;" src="'.URL.'public/images/company_header.jpg" alt="" /></div>
			<div style="text-align:center"><br/><strong>Flat List</strong></div></br>';
			$this->view->table=$btn.$table->myTable($fields, $row, "xplatcode").'<div><img style="height: 94px; width: 100%;" src="'.URL.'public/images/company_footer.jpg" alt="" /></div></div>';
			$this->view->renderpage('plats/platlist', false);
		}
		
		function platentry(){
				
		$btn = array(
			"Clear" => URL."plats/platentry"
		);

		// form data
			$dynamicForm = new Dynamicform("Flat",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."plats/saveplat", "Save",$this->values, URL."plats/showpost","","imagefield");
			
			$imagename = '../images/products/noimage.jpg';
			
			$this->view->filename = $imagename;
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('plats/platentry', false);
		}
		
		public function deleteplat($id){
			$where = "bizid=".Session::get('sbizid')." and xplatcode='".$id."'";
			$this->model->delete($where);
			$this->view->message = "";
			$this->platlist();
		}
		
		public function showpost(){
			$id = $_POST['xplatcode'];
			
		$tblvalues=array();
		$btn = array(
			"New" => URL."plats/platentry"
		);
		
		$tblvalues = $this->model->getSinglePlat($id);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=$tblvalues[0];
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Flat", $btn);	
			
			$file = 'images/products/prodsm/'.$id.'.jpg';
		
		$imagename = "";
		
		if(file_exists($file))
			$imagename = '../'.$file;
		else
			$imagename = '../images/products/noimage.jpg';
		
		$this->view->filename = $imagename;
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."plats/editplat/".$id, "Edit",$tblvalues, URL."plats/showpost","","imagefield");
			
			$this->view->table = $this->renderTable();
			
			$this->view->renderpage('plats/platentry');
		}
}