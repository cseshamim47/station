<?php
class Itempicklist extends Controller{
	
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
		
		if(empty($usersessionmenu)){
				header('location: '.URL.'mainmenu');
			}			
		$this->view->js = array('public/js/datatable.js','views/items/js/getitemdt.js');
		
		}
		
				
		public function getItemNamePrice($itemcode){
			
			$this->model->getItemInfoForSale("xitemcode", $itemcode);
		}
		
		function picklist(){
			$this->view->table = $this->itemPickTable();
			$this->view->caption = "Item List";
			$this->view->renderpage('items/itempicklist', false);
		}
		
		function picklistGroup($group){
			$this->view->table = $this->itemPickTableGroup($group);
			$this->view->caption = "Item List";
			$this->view->renderpage('items/itempicklist', false);
		}
		
		function itemPickTable(){
			$fields = array(
						"xitemcode-Item Code",
						"xitemcodealt-Alternate Code",
						"xdesc-Description",						
						"xmrp-Sales Price"
						);
			$table = new Datatable();
			$row = $this->model->getItemsByLimit();
			
			return $table->picklistTable($fields, $row, "xitemcode");
		}
		function itemPickTableGroup($group){
			$fields = array(
						"xitemcode-Item Code",
						"xdesc-Description",						
						"xcat-Category",						
						"xmrp-Sales Price"
						);
			$table = new Datatable();
			$row = $this->model->getItemsByLimitGroup($group);
			
			return $table->picklistTable($fields, $row, "xitemcode");
		}
		function productTable(){
			$fields = array(
						"xitemcode-Item Code",
						"xdesc-Description",
						"xstdprice-Retailer Price",
						"xmrp-MRP",
						"xdp-Point",
						);
			$table = new Datatable();
			$row = $this->model->getItemsByLimit();
			
			return $table->myTable($fields, $row,"");
		}
		
		function index(){
			
			$this->view->rendermainmenu('itempicklist/index');
		}
		
		function poductlist(){ 
			$this->view->table = $this->productTable();
			$this->view->caption = "Product List"; 
			$this->view->renderpage('itempicklist/productlist', false);
		}
		
		function ospitempicklist(){
			
			$this->view->table = $this->ospStockPickTable();
			$this->view->caption = "Item List";
			$this->view->renderpage('items/itempicklist', false);
		}
		function ospStockPickTable(){
			$xrdin = Session::get('suser');
			$fields = array(
						"xitemcodeosp-Item Code",
						"xdesc-Description",
						"xbalance-Stock"
						);
			$table = new Datatable();
			$row = $this->model->getospitemlist($xrdin);
			
			return $table->picklistTable($fields, $row, "xitemcodeosp");
		}
		function ospitems(){
			
			$this->view->table = $this->ospTable();
			$this->view->caption = "Item List";
			$this->view->renderpage('items/itempicklist', false);
		}
		
		function rawitempicklist(){
			
			$this->view->table = $this->rawItemPickTable();
			$this->view->caption = "Raw Material List";
			$this->view->renderpage('items/itempicklist', false);
		}
		
		function rawItemPickTable(){
			$xrdin = Session::get('suser');
			$fields = array(
						"xrawitem-Item Code",
						"xdesc-Description",
						
						);
			$table = new Datatable();
			$row = $this->model->getrawitemlist();
			
			return $table->picklistTable($fields, $row, "xrawitem");
		}
		
		function corpitembysuppick($sup){
			
			$this->view->table = $this->corpItemBySupPickTable($sup);
			$this->view->caption = "Item List";
			$this->view->renderpage('items/itempicklist', false);
		}
		
		function corpItemBySupPickTable($sup){
			$xrdin = Session::get('suser');
			$fields = array(
						"xitemcode-Item Code",
						"xdesc-Description",
						"xmrp-MRP",
						"xpoint-Point"
						);
			$table = new Datatable();
			$row = $this->model->getcorpitemlistbysup($sup);
			
			return $table->picklistTable($fields, $row, "xitemcode");
		}
		
		function ospTable(){
			$xrdin = Session::get('suser');
			$fields = array(
						"xitemcode-Item Code",
						"xdesc-Description",
						"xmrp-MRP",
						"xpoint-Point"
						);
			$table = new Datatable();
			$row = $this->model->getospitem();
			
			return $table->picklistTable($fields, $row, "xitemcode");
		}
		
		
		
}