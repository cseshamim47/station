<?php
class Movementmap extends Controller{
	
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
				if($menus["xsubmenu"]=="Employee Movement Map")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/movementmap/js/getmapdt.js','views/movementmap/js/getlocationdt.js');
								
		}	
		
		public function index(){
			
			$this->view->rendermainmenu('movementmap/index');
			
		}
		
		
		function getcusgeoloc($usr, $dt){
			$d = substr($dt,0,2);
			$m = substr($dt,2,2);
			$y = substr($dt,4,4);			
			$this->model->cusgeoloc($usr,$y."-".$m."-".$d);
		}
		function showmap(){
			
			$this->view->renderpage('movementmap/mappage');
			
			
		}
		
		function showlocations(){
			
		
			$cols = array("xtime-Time","xloc-Location");
			$rows=array();
			$table = new Datatable();
			$this->view->table = $table->myTable($cols, $rows, "xsonum");
			$this->view->renderpage('movementmap/locationpage');
		}
		
	}