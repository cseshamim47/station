<?php
class Distdelinfo extends Controller{
	
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
				if($menus["xsubmenu"]=="Delivery Information")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js');
		
		}
		
		public function index(){		
		
		$btn = array(
			"Clear" => URL."distdelinfo/index",
		);	
		
			
					
			$this->view->rendermainmenu('distdelinfo/index');
			
		}
		
		
					
	
	public	function renderTable(){
		
			$fields = array(
						"xdate-Date",						
						"xreqdelnum-Delivery No",
						"xdeldocnum-Courier & Doc No",
						"xdelorg-Courier"
						);
						
			$table = new Datatable();
			$row = $this->model->getDelivery();
			
			return $table->myTable($fields, $row, "xreqdelnum",URL."distdelinfo/showdt/");
						
		}
	
	
	public function delinfo(){
		
		$this->view->table = $this->renderTable();
		$this->view->renderpage('distdelinfo/delinfolist');
	}
		
	public function showdt($delnum){
		$fields = array(
						"xitemcode-Itemcode",						
						"xitemdesc-Description",
						"xqty-Quantity"
						);
						
			$table = new Datatable();
			$row = $this->model->getDeliverydt($delnum);
			
			$this->view->table=$table->myTable($fields, $row, "xitemcode");
			$this->view->renderpage('distdelinfo/delinfolist');
	}	
		
}