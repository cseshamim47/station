<?php
class Itemscmap extends Controller{
	
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
				if($menus["xsubmenu"]=="School wise Item Mapping")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('views/itemscmap/js/jquery-1.12.4.min.js','views/itemscmap/js/jquery-ui-1.12.1.min.js','views/itemscmap/js/jquery.appendGrid-1.7.1.js','views/itemscmap/js/schooldata.js','views/itemscmap/js/jQuery.print.js','views/itemscmap/js/formpost.js','views/itemscmap/js/EasyAutocomplete/jquery.easy-autocomplete.min.js','public/js/default.js','public/theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js','public/js/jquery.dataTables.min.js','public/js/dataTables.bootstrap.min.js');
		$dt = date("Y/m/d");
		
		$date = date('Y-m-d', strtotime($dt));
		$year = date('Y',strtotime($date));
		$this->values = array(
			"xcus"=>"",		
			"xorg"=>"",	
			"xclass"=>"",
			"xitemcode"=>"",
			"xsl"=>"0"
			);
			
			$this->fields = array(
						array(
							"xcus-group_".URL."jsondata/schoolpicklist"=>'School Code*~star_maxlength="20"',
							"xorg-text"=>'School Name*~star_maxlength="100" readonly'
							),
						array(	
							"xclass-select_Class" => 'Class*~star_minlength="4" required',						
							"xitemcode-group_".URL."jsondata/bookPickList"=>'Item Code*~star_maxlength="20"'
							),
						array(
							"xsl-hidden"=>'_""'
							)
						);
						
								
		}
		
		public function index(){
		
			$this->view->rendermainmenu('itemscmap/index');
			
		}
		
		public function savemap(){
				
				
				$xdate = date("Y/m/d");
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
				
				$cols = "";
				$vals = "";
				//Data Made for dt Table rejectdet
				$cols = "`bizid`,`xitemcode`,`xqty`,`xmrp`,`xdisc`,`xexch`,`xcur`,`zemail`,`xcus`,`xdispct`,`xclass`";
				if($_POST['ItemTable_rowOrder']!=null && $_POST['ItemTable_rowOrder']!=""){
					$lbl = explode(',',$_POST['ItemTable_rowOrder']);
					foreach($lbl as $k=>$v){
						
						if($_POST['ItemTable_xitemcode_'.$v] != "" && $_POST['ItemTable_xqty_'.$v] != ""){

							$vals .= "(" . Session::get('sbizid') . ",'". $_POST['ItemTable_xitemcode_'.$v] ."','". $_POST['ItemTable_xqty_'.$v] ."','". $_POST['ItemTable_xmrp_'.$v] ."','". $_POST['ItemTable_xdisc_'.$v] ."','". $_POST['ItemTable_xexch_'.$v] ."','". $_POST['ItemTable_xcur_'.$v] ."','".Session::get('suser')."','". $_POST['xcus'] ."','". $_POST['ItemTable_xdispct_'.$v] ."','". $_POST['xclass'] ."'),";

						}
					}
				}
				$vals = rtrim($vals,",");

				$success = $this->model->create($cols, $vals);
				$ret = "";
				$ret = $_POST['xcus']."*".$_POST['xclass'];

				echo $ret;
				
		}

		function deleteRow($xcus, $class, $xitem){
			try{
				$flag = "";
				$result = $this->model->recdelete(" where xcus='".$xcus."' and xclass='".$class."' and xitemcode='".$xitem."'");
				$flag = "Deleted Successfull";
			}catch(Exception $e){
				$flag = "An Exception";
			}
			echo json_encode($flag);
		}
		
		public function deleteItemMap($xsl){
			$tblvalues = $this->model->getHeader($xsl);
			$where = "where bizid=".Session::get('sbizid')." and xsl=". $xsl;
			$this->model->delete($where);
			$this->view->message = "";
			 
			$this->showlist($tblvalues[0]['xcus']);
		}
		
}