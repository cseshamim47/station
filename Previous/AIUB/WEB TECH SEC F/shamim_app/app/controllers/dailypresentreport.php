<?php  
class Dailypresentreport extends Controller{
	
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
				if($menus["xsubmenu"]=="Daily Present Report")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js');
		$dt = date("Y/m/d");		
		$date = date('Y-m-d', strtotime($dt));
		$year = date('Y',strtotime($date));
		$month = date('M',strtotime($date));
		$this->values = array(
			"xdate"=>$dt,
			);
			$this->fields = array(
						array(
							"xdate-datepicker" => 'Date_""'
							)
						);
			
			 	
		}
		
		public function index(){
			$btn = array(
				"Clear" => URL."dailypresentreport/stuattentry",
			);
			$this->view->rendermainmenu('dailypresentreport/index');
		}

		
		
		function studentlist(){
			
			if(empty($_POST['xdate']))
			{
				header ('location: '.URL.'dailypresentreport/stuattentry');
				exit;
			}
			$dt = $_POST['xdate'];
			$dat = str_replace('/', '-', $dt);
			$date = date('Y-m-d', strtotime($dat));
			
			
			$frmvalues=array(
					"xdate"=>$date,
					);
		
			$this->view->org=Session::get('sbizlong');
			
			$dynamicForm = new Dynamicform("Filter Date",array());

			$this->view->dynform = $dynamicForm->createForm($this->fields,"","",$frmvalues, URL."dailypresentreport/studentlist");

			$empdetail=$this->model->getemplatedetail($date);
			//print_r($empdetail);
		  	$this->view->atttable=$this->renderTable($empdetail);

			
			$this->view->renderpage('dailypresentreport/stuattentry', false);
		}
		
		function stuattentry(){
				
		$btn = array(
			"Clear" => URL."dailypresentreport/stuattentry"
		);
		
			$dynamicForm = new Dynamicform("Filter Date",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields,"","",$this->values, URL."dailypresentreport/studentlist");
			
			$this->view->atttable="";
			
			$this->view->renderpage('dailypresentreport/stuattentry', false);
		}

		function renderTable($data){
					
					$date="";

			foreach ($data as $key => $value) {

					
					$date = $value['xdate'];
					

}

			$table = '<table class="table table-bordered table-striped" style="width:100%">';
			$table.='<header style="font-size: 20px; text-align:center; margin-bottom:5px; font-weight:bold;">Daily Present Report</header>';
			$table.='<div>';
			$table.='<div style="text-align:center; margin-bottom:5px; font-weight:bold;">Date: '.$date.' </div>';
			$table.='</div>';
			$table.='<thead>';

			$table.='<tr><th>Employee ID</th><th>Employee Name</th><th>In Time</th><th>Out Time</th></tr>';
			$table.='</thead>';
			$table.='<tbody>';
			$totalleave = 0;
			foreach ($data as $key => $value) {
					
			  		$table.='<tr>';
			   		$table.='<td>'.$value['xfacultyid'].'</td>';
					$table.='<td>'.$value['xname'].'</td>';
					$table.='<td>'.$value['xintime'].'</td>';
					$table.='<td>'.$value['xouttime'].'</td>';
					

			  		//$totalleave += $value["xnumdays"];
			  		$table.='</tr>';
					
					
					

			  	
			}
				

			$table.='</tbody>';
			$table.='</table>';
			return $table;
		}

			
		
		
}

					// if($value['xtime']!=null){
					// $table.='<td>'.$value['xtime'].'</td>';
					// }else{
					// 	$table.='<td>Absent</td>';
					// }
					// if($value['xtime'] != $value['xetime']){
					// 	$table.='<td>'.$value['xetime'].'</td>';
					// }else{
					// 	$table.='<td></td>';
					// }