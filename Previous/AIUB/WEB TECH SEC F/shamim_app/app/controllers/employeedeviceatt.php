<?php
class Employeedeviceatt extends Controller{
	
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
				if($menus["xsubmenu"]=="Monthly Attendance Report")
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
			"xmonth"=>"",
			"xyear"=>$year
			);
			$this->fields = array(
						array(
							"xmonth-select_Month"=>'Month_""',
							"xyear-select_Academic Year" => 'Year_""'
							)
						);
			
			 	
		}
		
		public function index(){
			$btn = array(
				"Clear" => URL."employeedeviceatt/stuattentry",
			);
			$this->view->rendermainmenu('employeedeviceatt/index');
		}

		
		
		function studentlist(){
			
			if(empty($_POST['xmonth']) || empty($_POST['xyear'])){
				header ('location: '.URL.'employeedeviceatt/stuattentry');
				exit;
			}
			$selectmonth = $_POST['xmonth'];
			$selectyear = $_POST['xyear'];
			$selectdate = $selectyear."-".$selectmonth."-1";
			//echo $selectdate;

			$dt = $selectdate;
			$edt = date("Y-m-t", strtotime($selectdate));

			$dat = str_replace('/', '-', $dt);
			$date = date('Y-m-d', strtotime($dat));

			$edat = str_replace('/', '-', $edt);
			$edate = date('Y-m-d', strtotime($edat));
			
			$frmvalues=array(
					"xmonth"=>$selectmonth,
					"xyear"=>$selectyear
					);
		
			$this->view->org=Session::get('sbizlong');
			
			$dynamicForm = new Dynamicform("Filter Date",array());

			$this->view->dynform = $dynamicForm->createForm($this->fields,"","",$frmvalues, URL."employeedeviceatt/studentlist");
		  	$this->view->atttable=$this->renderTable($date,$edate);
			
			$this->view->renderpage('employeedeviceatt/stuattentry', false);
		}
		
		function stuattentry(){
				
		$btn = array(
			"Clear" => URL."employeedeviceatt/stuattentry"
		);
		
			$dynamicForm = new Dynamicform("Filter Date",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields,"","",$this->values, URL."employeedeviceatt/studentlist");
			
			$this->view->atttable="";
			
			$this->view->renderpage('employeedeviceatt/stuattentry', false);
		}

		function renderTable($date,$edate){


			$this->model->attProcess($date, $edate);
			$allDate = $this->model->getAllDate($date, $edate);
			//print_r($allDate);

			$table = "";
			
			//echo $fstday."-".$sndday;
			//for($i=1;$i<=2;$i++){
			$table .= '<div style="text-align:center;    font-weight: 600;"><h4>Employee Attendance for the month of '.date("F", strtotime($date)).', '.date("Y", strtotime($date)).'</h4></div><div id="grouptable" class=""><table class="table table-bordered table-striped" style="line-height: 14px; font-size:11px;" border="1">';
			$table.='<thead>';

			//Header Print Start
			$table.='<tr style="text-align:center;"><th rowspan="3">ID</th><th rowspan="3">Name</th>';
			foreach($allDate as $key=>$value){
				$table.='<th colspan="2"><div>'. date('d', strtotime($value["xdate"])) .'</div></th>';
			}
			$table.='<th class="rotate" rowspan="3"><div>Present</div></th><th class="rotate" rowspan="3"><div>Absent</div></th><th class="rotate" rowspan="3"><div>Late</div></th><th class="rotate" rowspan="3"><div>Leave</div></th>';
			$table.='</tr><tr style="text-align:center;">';
			foreach($allDate as $key=>$value){
				$table.='<td class="rotate" colspan="2"><div>Flag</div></td>';
			}
			$table.='</tr><tr style="text-align:center;">';
			foreach($allDate as $key=>$value){
				$table.='<td class="rotate"><div>In</div></td><td class="rotate"><div>Out</div></td>';
			}
			$table.='</tr>';
			//Header print end

			$allemp = $this->model->getAllEmp();

			foreach($allemp as $key=>$value){

				$present = 0;
				$absent = 0;
				$leave = 0;
				$late = 0;

				$table.='<tr style="text-align:center;">';
				$table.='<td rowspan="2">'.$value["xfacultyid"].'</td>';
				$table.='<td rowspan="2">'.$value["xname"].'</td>';
				foreach($allDate as $ke=>$val){
					$singleatt = $this->model->getEmpAtt($val["xdate"], $value["xfacultyid"]);
					if($singleatt[0]["attflag"] == "Present")
						$present++;
					if($singleatt[0]["attflag"] == "Absent")
						$absent++;
					if($singleatt[0]["attflag"] == "Late")
						$late++;
					if($singleatt[0]["attflag"] == "Leave")
						$leave++;
					$table.='<td class="rotate" colspan="2" style="text-align:center;"><div>'.$singleatt[0]["attflag"].'</div></td>';
				}//date( 'g:ia', strtotime($val['xetime']))
				$table.='<td rowspan="2">'.$present.'</td><td rowspan="2">'.$absent.'</td><td rowspan="2">'.$late.'</td><td rowspan="2">'.$leave.'</td>';
				$table.='</tr><tr>';
				foreach($allDate as $ke=>$val){
					$singleatt = $this->model->getEmpAtt($val["xdate"], $value["xfacultyid"]);
					if($singleatt[0]["xintime"]!=null)
						$table.='<td class="rotate"><div>'.date( 'g:ia', strtotime($singleatt[0]["xintime"])).'</div></td>';
					else
						$table.='<td class="rotate"><div></div></td>';
					if($singleatt[0]["xouttime"]!=null)
						$table.='<td class="rotate"><div>'.date( 'g:ia', strtotime($singleatt[0]["xouttime"])).'</div></td>';
					else
						$table.='<td class="rotate"><div></div></td>';
				}
				$table.='</tr>';
			}

			$table.='</tbody>';
			$table.='</table></div>';
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