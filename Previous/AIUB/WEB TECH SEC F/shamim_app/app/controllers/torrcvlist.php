<?php
class Torrcvlist extends Controller{

	
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
				if($menus["xsubmenu"]=="Transfer Receive List")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','public/js/default.js');
		
		
		}
		
		public function index(){
			
			$this->rcvlist();	
		}
		
				
		function rcvlist(){
			
			$branch = Session::get('sbranch');
			
			if($branch=="Head Office")				
				$this->view->table = $this->renderTorReceive();
			else
				$this->view->table = $this->renderTorReceive(" and xbranch = '".$branch ."'");
			
			$this->view->rendermainmenu('torrcvlist/imtorrcvlist');	
		}
		
		function renderTorReceive($branch=""){
			$fields = array(
						"ximsenum-Receive No",
						"xdate-date",
						"xitemcode-Item Code",
						"xsl-Serial",
						"xitemdesc-Item Description",
						"xsup-Supplier",
						"xbranch-Branch",
						"xtorbranch-From Branch",
						"xstdcost-Cost",
						"xqty-Quantity"
						);
			$table = new Datatable();
			$row = $this->model->getTorReceiveList($branch);
			
			return $table->createTable($fields, $row, "xitemcode");
			
			
		}
		
}