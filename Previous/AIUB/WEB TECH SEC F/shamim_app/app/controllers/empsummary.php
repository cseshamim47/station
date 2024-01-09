<?php
class Empsummary extends Controller{
	
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
				if($menus["xsubmenu"]=="Employee Leave Report")
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
				"Clear" => URL."empsummary/stuattentry",
			);
			$this->view->rendermainmenu('empsummary/index');
		}

		
		
		function studentlist(){
			
			if(empty($_POST['xfacultyid']) || empty($_POST['xmonth']) || empty($_POST['xyear']))
			{
				header ('location: '.URL.'empsummary/stuattentry');
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

			$this->view->dynform = $dynamicForm->createForm($this->fields,"","",$frmvalues, URL."empsummary/studentlist");

			$empdetail=$this->model->getempdetail($selectemp,$selectmonth,$selectyear);
		  	$this->view->atttable=$this->renderTable($empdetail);

			
			$this->view->renderpage('empsummary/stuattentry', false);
		}
		
		function stuattentry(){
				
		$btn = array(
			"Clear" => URL."empsummary/stuattentry"
		);
		
			$dynamicForm = new Dynamicform("Filter Date",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields,"","",$this->values, URL."empsummary/studentlist");
			
			$this->view->atttable="";
			
			$this->view->renderpage('empsummary/stuattentry', false);
		}

		function renderTable($data){
			$monthe="";
					$year="";
					$empid="";
					$empname="";
					$monthName="";

			foreach ($data as $key => $value) {

					// $monthNum = sprintf("%02s", $value["xper"]);
					// $monthName = date("F", strtotime($monthNum));
					$monthe = $value['xper'];
					$dateObj   = DateTime::createFromFormat('!m', $monthe);
					$monthName = $dateObj->format('F');
					
					$year = $value['xyear'];
					$empid = $value['xfacultyid'];
					$empname = $value['xname'];
					

				}

			$table = '<table class="table table-bordered table-striped" style="width:100%">';
			$table.='<header style="font-size: 20px; text-align:center; margin-bottom:5px; font-weight:bold;">Employee Leave Report</header>';
			$table.='<div>';
			$table.='<div style="text-align:center; font-weight:bold;">Name: '.$empname.' </div><div style="text-align:center; font-weight:bold;">Employee ID: '.$empid.' </div><div style="text-align:center; font-weight:bold;">Year: '.$year.' </div><div style="text-align:center; font-weight:bold;">Month: '.$monthName.' </div>';
			$table.='</div>';
			$table.='<thead>';
			$table.='<th>Leave Type</th><th>From Date</th><th>To Date</th><th>Days</th></tr>';
			$table.='</thead>';
			$table.='<tbody>';
			$totalleave = 0;
			foreach ($data as $key => $value) {
				
			  	
			  		$table.='<tr>';
					$table.='<td>'.$value['xleavetype'].'</td>';
					$table.='<td>'.$value['xfromdate'].'</td>';
					$table.='<td>'.$value['xtodate'].'</td>';
					$table.='<td>'.$value['xnumdays'].'</td>';

			  		$totalleave += $value["xnumdays"];
			  		$table.='</tr>';

			  	
			}
				$table .= '<tr>';
					$table .= '<td><strong>Total :</strong></td><td></td><td></td><td><strong>'.$totalleave.'</strong></td>';
					$table .= '</tr>';

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