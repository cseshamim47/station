<?php
class Distsearch extends Controller{
	
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
				if($menus["xsubmenu"]=="CIN Search")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js');
								
		}
		
		public function index(){
					
			
			$this->view->rendermainmenu('distsearch/index');
			
		}
		
			
				
		function customersearch(){
			$btn = array(
				"Clear" => URL."distsearch/customersearch",
			);	
			
			
			$values = array(
				"xorg"=>"",
				"xmobile"=>""
				);
				
				$fields = array(array(
								"xorg-text" => 'Name_""',
								"xmobile-text" => 'Mobile_""',
								)
							);
			
				$dynamicForm = new Dynamicform("Search Customer",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."distsearch/search", "Search",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('distsearch/searchpage', false);
		
		}
		
		public function search(){
		
			if(empty($_POST['xorg']) && empty($_POST['xmobile'])){
				header('location: '.URL."distsearch/customersearch");
				exit;
			}
		
			$btn = array(
				"Clear" => URL."distsearch/customersearch",
			);	
						
			$xname = $_POST['xorg'];
			$xmobile = $_POST['xmobile'];	
			
			$where = " bizid = ". Session::get('sbizid');	
			if ($xname!=""){
				$where .= " and xorg like '%".$xname."%'";
			}
			
			if ($xmobile!=""){
				$where .= " and xmobile like '%".$xmobile."%'";
			}
			
			
				$row = $this->model->getCustomer($where);
				
				$fields = array(
						"xcus-CIN",
						"xorg-Name",
						"xmobile-Mobile",
						"xadd1-Address",
						"xpoint-Point"
						);
			$table = new Datatable();
			$this->view->table = $table->myTable($fields, $row, "xcus");
			
			$values = array(
				"xorg"=>"",
				"xmobile"=>""
				);
				
				$fields = array(array(
								"xorg-text" => 'Name_""',
								"xmobile-text" => 'Mobile_""',
								)
							);
			
				$dynamicForm = new Dynamicform("Search Customer",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."distsearch/search", "Search",$values);
				
				
			$this->view->renderpage('distsearch/searchpage');
		}
		
	}