<?php
class Emplatereport extends Controller{
	
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
				if($menus["xsubmenu"]=="Employee Late Report")
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
			"xfacultyid"=>"",
			"xmonth"=>"",
			"xyear"=>$year
			);
			$this->fields = array(
						array(
							"xfacultyid-group_".URL."stuemployee/stufacultypicklist"=>'Employee ID_""',
							"xmonth-select_Month"=>'Month_""'
							),
						array(
							"xyear-select_Academic Year" => 'Year_""'
							)
						);
			
			 	
		}
		
		public function index(){
			$btn = array(
				"Clear" => URL."emplatereport/stuattentry",
			);
			$this->view->rendermainmenu('emplatereport/index');
		}

		
		
		function studentlist(){
			
			if(empty($_POST['xfacultyid']) || empty($_POST['xmonth']) || empty($_POST['xyear']))
			{
				header ('location: '.URL.'emplatereport/stuattentry');
				exit;
			}
			$selectemp = $_POST['xfacultyid'];
			$selectmonth = $_POST['xmonth'];
			$selectyear = $_POST['xyear'];
			
			
			$frmvalues=array(
					"xfacultyid"=>$selectemp,
					"xmonth"=>$selectmonth,
					"xyear"=>$selectyear
					);
		
			$this->view->org=Session::get('sbizlong');
			
			$dynamicForm = new Dynamicform("Filter Date",array());

			$this->view->dynform = $dynamicForm->createForm($this->fields,"","",$frmvalues, URL."emplatereport/studentlist");

			$empdetail=$this->model->getemplatedetail($selectemp,$selectmonth,$selectyear);
			//print_r($empdetail);
		  	$this->view->atttable=$this->renderTable($empdetail);

			
			$this->view->renderpage('emplatereport/stuattentry', false);
		}
		
		function stuattentry(){
				
		$btn = array(
			"Clear" => URL."emplatereport/stuattentry"
		);
		
			$dynamicForm = new Dynamicform("Filter Date",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields,"","",$this->values, URL."emplatereport/studentlist");
			
			$this->view->atttable="";
			
			$this->view->renderpage('emplatereport/stuattentry', false);
		}

		function renderTable($data){
					$monthe="";
					$year="";
					$empid="";
					$empname="";
					$shift="";
					$monthName="";

			foreach ($data as $key => $value) {

					
					$monthe = $value['xper'];
					$dateObj   = DateTime::createFromFormat('!m', $monthe);
					$monthName = $dateObj->format('F');
					$year = $value['xyear'];
					$empid = $value['xfacultyid'];
					$empname = $value['xname'];
					$shift = $value['xshift'];

}

			$table = '<table class="table table-bordered table-striped" style="width:100%">';
			$table.='<header style="font-size: 20px; text-align:center; margin-bottom:5px; font-weight:bold;">Employee Late Report</header>';
			$table.='<div>';
			$table.='<div style="text-align:center; font-weight:bold;">Name: '.$empname.' </div><div style="text-align:center; font-weight:bold;">Employee ID: '.$empid.' </div><div style="text-align:center; font-weight:bold;">Employee Shift: '.$shift.' </div><div style="text-align:center; font-weight:bold;">Year: '.$year.' </div><div style="text-align:center; font-weight:bold;">Month: '.$monthName.' </div>';
			$table.='</div>';
			$table.='<thead>';

			$table.='<tr><th>Date</th><th>In Time</th><th>Out Time</th><th>Late Time</th></tr>';
			$table.='</thead>';
			$table.='<tbody>';
			$totalleave = 0;
			foreach ($data as $key => $value) {
					$oftime = $value['xoftime'];
					$intime = $value['xintime'];
					$monthe = $value['xper'];
					// $latetime = SUBTIME($intime, $oftime);
					// echo $latetime;

					if ($intime>$oftime){
						
					
				
			  	
			  		$table.='<tr>';
			   		$table.='<td>'.$value['xdate'].'</td>';
					$table.='<td>'.$value['xintime'].'</td>';
					$table.='<td>'.$value['xouttime'].'</td>';
					$table.='<td>'.$value['latetime'].'</td>';

			  		//$totalleave += $value["xnumdays"];
			  		$table.='</tr>';
					
					
					}

			  	
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