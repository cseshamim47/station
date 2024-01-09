<?php
class Supundel extends Controller{
	
	private $values = array();
	private $fields = array();
	private $valuesdt = array();
	private $fieldsdt = array();
	
	
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
				if($menus["xsubmenu"]=="Ordered List" || $menus["xsubmenu"]=="Confirm Delivery")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
		
		
			
		$this->view->js = array('public/js/datatable.js');
		
		
		}
		
		public function index(){
			
			$this->view->table = $this->renderTable();
			$this->view->caption = "Ordered List";
			$this->view->rendermainmenu('supundel/index');	
		}
		
		
		function renderTable(){
			$fields = array(
						"ximsenum-Txn No",
						"xrow-SL",
						"xitemcode-Itemcode",
						"xcusdt-Customer",
						"xoutlet-Outlet",						
						"Xcusadd-Customer Address",
						"xcusmobile-Customer Mobile",
						"xqty-Qty",
						"xpricepur-Rate",
						"xtotal-Total"
						);
			$table = new Datatable();
			$row = $this->model->getUndelivered();
			
			return $table->createTableWithStatus($fields, $row, array("ximsenum","xrow"),URL."supundel/createdel/");			
			
		}
		
		public function undel(){
			
			$this->view->table = $this->renderUndelTable();
			$this->view->caption = "Delivered List";
			$this->view->rendermainmenu('supundel/index');	
		}
		
		
		function renderUndelTable(){
			$fields = array(
						"ximsenum-Txn No",
						"ztime-Date/Time",
						"xitemcode-Itemcode",
						"xdesc-Description",
						"xoutlet-Outlet",						
						"xoutletadd-Outlet Address",
						"xoutletmobile-Outlet Mobile",
						"xqty-Qty",
						"xpricepur-Rate",
						"xtotal-Total"
						);
			$table = new Datatable();
			$row = $this->model->getDeliveredList();
			
			return $table->createTable($fields, $row, "xitemcode");			
			
		}
		
		
		function createdel($imsenum, $row){
			$this->model->createDel(" ximsenum='".$imsenum."' and xrow='".$row."' and xsup='".Session::get('sbin')."'");
			$this->view->table = $this->renderTable();	
			$this->view->caption = "Ordered List";			
			$this->view->rendermainmenu('supundel/index');	
		}
		
		public function confirmdel(){
			
			$this->view->table = $this->confRenderTable();
			$this->view->caption = "Un-Confirmed List";
			$this->view->rendermainmenu('supundel/index');	
		}
		
		
		function confRenderTable(){
			$fields = array(
						"xsup-Supplier",
						"ximsenum-Txn No",
						"xrow-SL",
						"xitemcode-Itemcode",
						"xdesc-Item Description",
						"xcusdt-Customer",				
						"Xcusadd-Customer Address",
						"xcusmobile-Customer Mobile",
						"xqty-Qty"
						);
			$table = new Datatable();
			$row = $this->model->getSupDeliveredList();
			
			return $table->createTableWithStatus($fields, $row, array("ximsenum","xrow"),URL."supundel/confirmdellivery/");			
			
		}
		
		function confirmdellivery($imsenum, $row){
			$this->model->confDel(" ximsenum='".$imsenum."' and xrow='".$row."' and xstatus='Supplier Delivery'");
			$this->view->table = $this->confRenderTable();	
			$this->view->caption = "Un-Confirmed List";	
			$this->view->rendermainmenu('supundel/index');	
		}
				
}