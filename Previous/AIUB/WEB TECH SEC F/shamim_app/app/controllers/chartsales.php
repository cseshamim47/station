<?php
class Chartsales extends Controller{
	
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
			
		$this->view->js = array('public/js/datatable.js','public/js/loader.js','views/chartsales/js/itemsalepichart.js');					
								
		}
		
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."chartsales/saleschartmenu",
		);	
		
					
			$this->view->rendermainmenu('chartsales/index');
			
		}
		
		public function toptenitems(){
			$this->model->getTopItems("LIMIT 20");
		}
		function saleschartmenu(){
			
			$menuarr = array(
			0 => array("Top Selling Items"=>URL."chartsales/itemsalepichart","Statement Analysis"=>URL."chartpointncom/stwiseanalysis"),
			
			);
			$menutable='<table class="table" style="width:100%"><tbody>';
			foreach($menuarr as $key=>$value){
				$menutable.='<tr>';
					foreach($value as $k=>$val){
						$menutable.='<td><a style="width:100%" class="btn btn-info" href="'.$val.'" role="button"><span class="glyphicon glyphicon-open-file"></span>&nbsp;'.$k.'</a></td>';
					}
				$menutable.='</tr>';
				
			}
			$menutable.='</tbody></table>';
			$this->view->table = $menutable;
			$this->view->renderpage('chartsales/saleschartmenu', false);
		}
		public function itemsalepichart(){
			$table = new ReportingTable();
			$tblsettings = array(
							"columns"=>array("0"=>"Item Code",1=>"Description",2=>"Qty"),
							);
			$row = $this->model->getTopItemList("LIMIT 20");
			$this->view->table = $table->reportingtbl($tblsettings,$row);
			$this->view->renderpage('chartsales/reportpage');
		}
		
		
}