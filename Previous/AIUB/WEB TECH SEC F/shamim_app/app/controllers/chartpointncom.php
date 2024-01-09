<?php
class Chartpointncom extends Controller{
	
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
				if($menus["xsubmenu"]=="Business Analysis")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','public/js/loader.js','views/chartpointncom/js/stwisepointncom.js'
		);					
								
		}
					
		
		public function stwisepointnsales(){
			$stt = $this->model->getmaxst()[0]["currentst"]-1;
			$stfrm = $stt-30; 
			$this->model->getstwisecomnpoint($stfrm,$stt);
		}
		public function stwiseanalysis(){
			
			$table = new ReportingTable();
			$tblsettings = array(
							"columns"=>array("0"=>"Statement No",1=>"Point",2=>"Commission"),
							);
			$stt = $this->model->getmaxst()[0]["currentst"]-1;
			$stfrm = $stt-30;		
			//$row = $this->model->getstwisecomnpointlist($stfrm,$stt);
			//$this->view->table = $table->reportingtbl($tblsettings,$row);
			$this->view->stfrom = $stfrm;
			$this->view->stto = $stt;
			$this->view->renderpage('chartpointncom/reportpage');
		}
		
}