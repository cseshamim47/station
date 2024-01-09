<?php
class Forma extends Controller{
	
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
				if($menus["xsubmenu"]=="Forma & Cover Print")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('views/forma/js/jquery-1.12.4.min.js','views/forma/js/jquery-ui-1.12.1.min.js','views/forma/js/jquery.appendGrid-1.7.1.js','views/forma/js/schooldata.js','views/forma/js/jQuery.print.js','views/forma/js/formpost.js','views/forma/js/EasyAutocomplete/jquery.easy-autocomplete.min.js','public/js/default.js','public/theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js','public/js/jquery.dataTables.min.js','public/js/dataTables.bootstrap.min.js');		
		}
		
		public function index(){
			$this->view->rendermainmenu('forma/index');
		}

		public function savesales(){
			$xdate = $_POST['xdate'];
			$dt = str_replace('/', '-', $xdate);
			$date = date('Y-m-d', strtotime($dt));
			$year = date('Y',strtotime($date));
			$month = date('m',strtotime($date));  
			$keyfieldval="0";
			$vals = "";
			$crow = 1;
			$rownum = 0;

			if($_POST['xsonum'] == "")
				$keyfieldval = $this->model->getKeyValue("formamst","xordernum","OR-","5");
			else
				$keyfieldval = $_POST['xsonum'];
			
			$status = "";
			$sostatus = $this->model->getSOStatus($keyfieldval);
			if(empty($sostatus)){
				$status = "New";
			}else{
				$status = $sostatus[0]["xstatus"];
			}


			if($status == "New" || $status == "Created"){
				// $file = fopen("C:/Users/DBS/Desktop/testdoc.txt","w");
				// echo fwrite($file,$status);
				// fclose($file);
				$rownum = $this->model->getRow("formadet","xordernum",$keyfieldval,"xrow");
				//Data made for Master Table sofreemst
				$mcols = "";
				$mvals = "";
				$mcols = "`bizid`,`xdate`,`xpress`,`xquotnum`,`xnotes`,`zemail`,`xordernum`,`xyear`,`xper`,`xstatus`";

				$mvals = "(" . Session::get('sbizid') . ",'". $date ."','". $_POST['xpress'] ."','','". $_POST['xnotes'] ."','". Session::get('suser') ."','". $keyfieldval ."',".$year.",".$month.",'Created')";

				//Data Made for dt Table sofreedet
				$cols = "`bizid`,`xordernum`,`xpress`,`xrow`,`xitemcode`,`xprintqty`,`xforma`,`xdate`,`zemail`,`xformaplate`,`xpapername`,`xpaperqty`,`xboardname`,`xboardqty`,`xcoverplate`,`xyear`,`xper`";
				if($_POST['ItemTable_rowOrder']!=null && $_POST['ItemTable_rowOrder']!=""){
					$lbl = explode(',',$_POST['ItemTable_rowOrder']);
					foreach($lbl as $k=>$v){
						
						if($_POST['ItemTable_xitemcode_'.$v] != "" && $_POST['ItemTable_xrow_'.$v] != ""){
							
							$vals .= "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $_POST['xpress'] ."','". $_POST['ItemTable_xrow_'.$v] ."','". $_POST['ItemTable_xitemcode_'.$v] ."','". $_POST['ItemTable_xprintqty_'.$v] ."','". $_POST['ItemTable_xforma_'.$v] ."','". $date ."','".Session::get('suser')."','". $_POST['ItemTable_xformaplate_'.$v] ."','". $_POST['ItemTable_xpapername_'.$v] ."','". $_POST['ItemTable_xpaperqty_'.$v] ."','". $_POST['ItemTable_xboardname_'.$v] ."','". $_POST['ItemTable_xboardqty_'.$v] ."','". $_POST['ItemTable_xcoverplate_'.$v] ."',".$year.",".$month."),";

						}else if($_POST['ItemTable_xitemcode_'.$v] != "" && $_POST['ItemTable_xrow_'.$v] == ""){
							$vals .= "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $_POST['xpress'] ."','". $rownum ."','". $_POST['ItemTable_xitemcode_'.$v] ."','". $_POST['ItemTable_xprintqty_'.$v] ."','". $_POST['ItemTable_xforma_'.$v] ."','". $date ."','".Session::get('suser')."','". $_POST['ItemTable_xformaplate_'.$v] ."','". $_POST['ItemTable_xpapername_'.$v] ."','". $_POST['ItemTable_xpaperqty_'.$v] ."','". $_POST['ItemTable_xboardname_'.$v] ."','". $_POST['ItemTable_xboardqty_'.$v] ."','". $_POST['ItemTable_xcoverplate_'.$v] ."',".$year.",".$month."),";
							
							$rownum ++;
						}
					}
				}
				$vals = rtrim($vals,",");

				$success = $this->model->create($mcols, $mvals, $cols, $vals);
			}
			echo $keyfieldval;
		}

		function deleteRow($sonum, $rownum){
			$flag = "";
			try{
				//$tblvalues = $this->model->getSales($sonum);
				//$result = "";
				//if(count($tblvalues)>0){
				//	if($tblvalues[0]["xstatus"]=="Created"){
						$result = $this->model->recdelete(" where xordernum='".$sonum."' and xrow=".$rownum);
						$flag = "Invoice Item Deleted Successfull";
					//}else{
					//	$flag = "Already Invoice Confirmed or Canceled!";
					//}
				//}
			}catch(Exception $e){
				$flag = "An Exception";
			}
			echo json_encode($flag);
		}
		
		
		
}