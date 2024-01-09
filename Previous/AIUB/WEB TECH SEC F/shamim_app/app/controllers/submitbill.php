<?php
class Submitbill extends Controller{
	
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
				if($menus["xsubmenu"]=="Bill Submit")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			//,'public/theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'
		$this->view->js = array('public/js/default.js','views/submitbill/js/jquery-1.12.4.min.js','views/submitbill/js/jquery-ui-1.12.1.min.js','views/submitbill/js/jquery.appendGrid-1.7.1.js','views/submitbill/js/schooldata.js','views/submitbill/js/jQuery.print.js','views/submitbill/js/formpost.js','views/submitbill/js/EasyAutocomplete/jquery.easy-autocomplete.min.js','public/js/jquery.dataTables.min.js','public/js/dataTables.bootstrap.min.js');
		$dt = date("Y/m/d");
		
		$date = date('Y-m-d', strtotime($dt));
		$year = date('Y',strtotime($date));
						
								
		}
		
		public function index(){
		
			$this->view->rendermainmenu('submitbill/index');
			
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
			$comment = "";

			if($_POST['xtxnnum'] == "")
				$keyfieldval = $this->model->getKeyValue("billmst","xtxnnum","BILL-","5");
			else
				$keyfieldval = $_POST['xtxnnum'];
			
			$status = "";
			$sostatus = $this->model->getSOStatus($keyfieldval);
			if(empty($sostatus)){
				$status = "New";
			}else{
				$status = $sostatus[0]["xstatus"];
				$comment = $sostatus[0]["xcomment"];
			}


			if($status == "New" || $status == "Created" || $status == "Canceled"){
				if($status == "Canceled" && $_POST['xcomment'] != ""){
					$comment .= "</br><b>Modified by: </b>".Session::get('suser').", <b>Date: </b>".date('d-m-Y h:i:s A')."</br><b>Comment: </b>".$_POST['xcomment'];
				}
				$rownum = $this->model->getRow("billdet","xtxnnum",$keyfieldval,"xrow");
				//Data made for Master Table billmst
				$mcols = "";
				$mvals = "";
				$mcols = "`zemail`,`bizid`,`xtxnnum`,`xdate`,`xsup`,`xmobile`,`xproject`,`xstatus`,`xcomment`";

				$mvals = "('". Session::get('suser') ."'," . Session::get('sbizid') . ",'". $keyfieldval ."','". $date ."','".$_POST['xsup']."','".$_POST['xmobile']."','".$_POST['xproject']."','Created','".$comment."')";

				//Data Made for dt Table billdet
				$cols = "`bizid`,`xrow`,`xtxnnum`,`xdate`,`xdesc`,`xquality`,`xprice`,`xqty`,`xremarks`,`xper`,`xyear`,`xcat`";
				if($_POST['ItemTable_rowOrder']!=null && $_POST['ItemTable_rowOrder']!=""){
					$lbl = explode(',',$_POST['ItemTable_rowOrder']);
					foreach($lbl as $k=>$v){

						$rowxdate = $_POST['ItemTable_xdate_'.$v];
						$rowdt = str_replace('/', '-', $rowxdate);
						$rowdate = date('Y-m-d', strtotime($rowdt));
						
						if($_POST['ItemTable_xprice_'.$v] != "" && $_POST['ItemTable_xrow_'.$v] != ""){
							//$_POST['ItemTable_xdesc_'.$v] != "" && 
							$vals .= "(" . Session::get('sbizid') . ",'". $_POST['ItemTable_xrow_'.$v] ."','". $keyfieldval ."','". $rowdate ."','". $_POST['ItemTable_xdesc_'.$v] ."','". $_POST['ItemTable_xquality_'.$v] ."','". $_POST['ItemTable_xprice_'.$v] ."','". $_POST['ItemTable_xqty_'.$v] ."','". $_POST['ItemTable_xremarks_'.$v] ."',".$month.",".$year.",'". $_POST['ItemTable_xcat_'.$v] ."'),";

						}else if($_POST['ItemTable_xprice_'.$v] != "" && $_POST['ItemTable_xrow_'.$v] == ""){
							//$_POST['ItemTable_xdesc_'.$v] != "" && 
							$vals .= "(" . Session::get('sbizid') . ",'". $rownum ."','". $keyfieldval ."','". $rowdate ."','". $_POST['ItemTable_xdesc_'.$v] ."','". $_POST['ItemTable_xquality_'.$v] ."','". $_POST['ItemTable_xprice_'.$v] ."','". $_POST['ItemTable_xqty_'.$v] ."','". $_POST['ItemTable_xremarks_'.$v] ."',".$month.",".$year.",'". $_POST['ItemTable_xcat_'.$v] ."'),";
							
							$rownum ++;
						}
					}
				}
				$vals = rtrim($vals,",");
				//	file_put_contents("qlog.txt","INSERT INTO billmst (`zemail`,`bizid`,`xtxnnum`,`xdate`,`xsup`,`xmobile`,`xproject`,`xstatus`) values($mvals)", FILE_APPEND | LOCK_EX);
                //print_r($mvals);die;
				$success = $this->model->create($mcols, $mvals, $cols, $vals);
			}
			echo $keyfieldval;
		}

		function deleteRow($sonum, $rownum){
			try{
				$tblvalues = $this->model->getBill($sonum);
				$result = "";
				$flag = "";
				if(count($tblvalues)>0){
					if($tblvalues[0]["xstatus"]=="Created" || $tblvalues[0]["xstatus"]=="Canceled"){
						$result = $this->model->recdelete(" where xtxnnum='".$sonum."' and xrow=".$rownum);
						$flag = "Bill Row Deleted Successfull";
					}else{
						$flag = "Already Bill Confirmed or Pending!";
					}
				}
			}catch(Exception $e){
				$flag = "An Exception";
			}
			echo json_encode($flag);
		}
	function confirmpost($sonum){
			$status = "Confirmed";
			$appstatus = "Confirmed";
			$approval = $this->model->getApproval();
			if(!empty($approval)){
				$status = "Pending";
				$appstatus = $approval[0]['xstatus'];
			}
			$getbill = $this->model->getBill($sonum);
			if($getbill[0]['xappstatus']){
				$appstatus = $getbill[0]['xappstatus'];
			}
			$postdata=array(
				"xstatus" => $status,
				"xdept" => Session::get('srole'),
				"xappstatus" => $appstatus
			);					
			$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '". $sonum ."'";
			$this->model->confirm($postdata,$where);
			echo json_encode("Success");
	}
	function cancelpost($sonum){
		$sta = "";
		$yearoffset = Session::get('syearoffset');
		$result = "";
		$postdata=array(
			"xstatus" => "Deleted"
			);				
		$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '". $sonum ."'";

		$this->model->confirm($postdata,$where);
		$sta = "Success";
		echo json_encode($sta);
	}
	
	
	function getBillMst($sonum){
		$this->model->getBillMst($sonum);
	}
	function getBillDet($sonum){
		$this->model->getBillDet($sonum);
	}
	function getBillList($status){
		$this->model->getBillList($status);
	}
	public function getItemData(){
		$this->model->getData();
	}
	function getBillForPrint($sonum){
		$this->model->getBillForPrint($sonum);
	}
		
}