<?php
class Bizdef extends Controller{
	
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
				if($menus["xsubmenu"]=="Business Page")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','public/js/imageshow.js','views/studentmst/js/codevalidator.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"bizshort"=>"",
			"bizlong"=>"",
			"bizadd1"=>"",
			"bizadd2"=>"",
			"bizdistrict"=>"",
			"bizthana"=>"",
			"bizemail"=>"",
			"bizfax"=>"",
			"bizphone1"=>"",
			"bizphone2"=>"",
			"bizmobile"=>"",
			"bizcur"=>"",
			"bizvatpct"=>"",
			"bizchkinv"=>"YES",
			"bizdecimals"=>"",
			"bizitemauto"=>"YES",
			"bizcusauto"=>"YES",
			"bizsupauto"=>"YES",
			"bizdateformat"=>"",
			"bizyearoffset"=>"",
			"bizid"=>"0"
			);
			
			$this->fields = array(
						array(
							"bizshort-text"=>'Business Short Name_maxlength="6"',
							"bizlong-text"=>'Business Long Name_maxlength="150"'
							),
						array(
							"bizadd1-textarea"=>'Address 1_maxlength="250"'
							),
						array(
							"bizadd2-textarea"=>'Address 2_maxlength="250"'
							),	
						array(
							"bizdistrict-text"=>'District_maxlength="30"',
							"bizthana-text"=>'Thana_maxlength="50"'
							),		
						array(
							"bizemail-text"=>'Email_maxlength="50"',
							"bizfax-text"=>'Fax_maxlength="20"'
							),		
						array(
							"bizphone1-text"=>'Phone 1_maxlength="20"',
							"bizphone2-text"=>'Phone 2_maxlength="20"'
							),		
						array(
							"bizmobile-text"=>'Mobile_maxlength="14"',
							"bizcusauto-radio_YES_NO"=>'Customer Code Auto_""'
							),
						array(
							"bizvatpct-text"=>'Vat PCT_maxlength="18"',
							"bizchkinv-radio_YES_NO"=>'Inventory Check_""'
							),	
						array(
							"bizdecimals-text"=>'Decimals_maxlength="18"',
							"bizitemauto-radio_YES_NO"=>'Item Code Auto_""'
							),
						array(
							"bizcur-select_Currency"=>'Currency_maxlength="3"',
							"bizsupauto-radio_YES_NO"=>'Suplier Code Auto_""'
							),
						array(
							"bizdateformat-text"=>'Date Format_maxlength="11"',
							"bizyearoffset-text"=>'Year Offset_maxlength="2"'
							),		
						array(
							"bizid-hidden"=>'_""'
							)
						);
		
		}
		
		public function editbizdef(){
			
			$bizid = $_POST['bizid'];
			$result = "";
			
			$success=false;
			$form = new Form();
				$data = array();
				
				try{
			
				$form	->post('bizshort')
						->val('maxlength', 6)
						
						->post('bizlong')
						->val('maxlength', 150)
						
						->post('bizadd1')
						->val('maxlength', 250)
						
						->post('bizadd2')
						->val('maxlength', 250)
						
						->post('bizdistrict')
						->val('maxlength', 30)
						
						->post('bizthana')
						->val('maxlength', 50)
						
						->post('bizemail')
						->val('maxlength', 50)
						
						->post('bizfax')
						->val('maxlength', 20)
						
						->post('bizphone1')
						->val('maxlength', 20)
						
						->post('bizphone2')
						->val('maxlength', 20)
						
						->post('bizmobile')
						->val('maxlength', 14)
						
						->post('bizcusauto')
						
						->post('bizvatpct')
						->val('maxlength', 18)
						
						->post('bizchkinv')
						
						->post('bizdecimals')
						->val('maxlength', 18)
						
						->post('bizitemauto')
						
						->post('bizcur')
						->val('maxlength', 3)
						
						->post('bizsupauto')
						
						->post('bizdateformat')
						->val('maxlength', 11)
						
						->post('bizyearoffset')
						->val('maxlength', 2);
						
				$form	->submit();
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['zutime'] = date("Y-m-d H:i:s");
				$success = $this->model->editBizdef($data, $bizid);
				
				
				}catch(Exception $e){
					//echo $e->getMessage();die;
					$result = $e->getMessage();
					
				}finally{
				if($result==""){
				if($success){
					$result = "Edited successfully";
					$file = 'public/images/bizdir/'.Session::get('sbizid').'.png';
					if ($_FILES['imagefield']["name"]){
						if(file_exists($file))
							unlink($file); 
						
						$imgupload = new ImageUpload();
						$imgupload->store_uploaded_image('public/images/bizdir/','imagefield', 64, 62, Session::get('sbizid'));
					}
				}
				else
					$result = "Edit failed!";
				
				}
				 $this->showdef($result);
				
				}
		}
		public function showdef($result=""){
			$tblvalues=array();
			$btn = array(	
			);
			$file = 'public/images/bizdir/'.Session::get('sbizid').'.jpg';
			
			$imagename = "";	
			if(file_exists($file))
				$imagename = '../public/images/bizdir/'.Session::get('sbizid').'.jpg';
			else
				$imagename = '../public/images/bizdir/directory.png';
			
			$this->view->filename = $imagename;
			
			$tblvalues = $this->model->getSingleDef();
			
			if(empty($tblvalues))
				$tblvalues=$this->values;
			else
				$tblvalues=$tblvalues[0];
				
				$dynamicForm = new Dynamicform("Business Defaults", $btn, $result);		
				
				$this->view->dynform = $dynamicForm->createForm($this->fields, URL."bizdef/editbizdef", "Edit",$tblvalues,"","","imagefield");
				//$this->fields, URL."stufaculty/editfaculty/".$tchr, "Edit",$tblvalues ,URL."stufaculty/showpost","","imagefield"
				
				$this->view->table = "";//$this->renderTable();
				
				$this->view->renderpage('bizdef/defentry');
			}
		
			public function index(){
		
		
				$btn = array(
					"Clear" => URL."stufaculty/stufacultyentry",
				);	
				
				
				// form data
				
					$dynamicForm = new Dynamicform("Teacher",$btn);		
					
					$this->view->dynform = $dynamicForm->createForm($this->fields, URL."stufaculty/savefaculty", "Save",$this->values,URL."stufaculty/showpost","imagefield");
					
					//$this->view->table = $this->renderTable();
					
					$this->view->rendermainmenu('bizdef/index');
					
				}
		
		
}