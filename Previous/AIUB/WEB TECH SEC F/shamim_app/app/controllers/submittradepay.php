<?php
class Submittradepay extends Controller{
	
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
		$this->view->js = array('public/js/default.js','views/submittradepay/js/jquery-1.12.4.min.js','views/submittradepay/js/jquery-ui-1.12.1.min.js','views/submittradepay/js/jquery.appendGrid-1.7.1.js','views/submittradepay/js/schooldata.js','views/submittradepay/js/jQuery.print.js','views/submittradepay/js/formpost.js','views/submittradepay/js/EasyAutocomplete/jquery.easy-autocomplete.min.js','public/js/jquery.dataTables.min.js','public/js/dataTables.bootstrap.min.js');
		$dt = date("Y/m/d");
		
		$date = date('Y-m-d', strtotime($dt));
		$year = date('Y',strtotime($date));
						
								
		}
		
		public function index(){
		
			$this->view->rendermainmenu('submittradepay/index');
			
		}

		public function savesales(){
			$xdate = $_POST['xdate'];
			$dt = str_replace('/', '-', $xdate);
			$date = date('Y-m-d', strtotime($dt));
			$year = date('Y',strtotime($date));
			$month = date('m',strtotime($date));  
			$keyfieldval="0";


			//test start..........................
			// 	$file = fopen("C:/Users/DBS/Desktop/testdoc.txt","w");
			// 	echo fwrite($file,"Fail");
			// 	fclose($file);
			//test end...........................


			if($_POST['xtxnnum'] == "")
				$keyfieldval = $this->model->getKeyValue("payments","xtxnnum","Payment-","5");
			else
				$keyfieldval = $_POST['xtxnnum'];
			
			$status = "";
			$sostatus = $this->model->getSOStatus($keyfieldval);
			if(empty($sostatus)){
				$status = "New";
			}else{
				$status = $sostatus[0]["xstatus"];
			}


			if($status == "New" || $status == "Created" || $status == "Canceled"){
				
				//Data made for Master Table billmst
				$mcols = "";
				$mvals = "";
				$mcols = "`zemail`,`bizid`,`xtxnnum`,`xdate`,`xsup`,`xproject`,`xstatus`";

				$mvals = "('". Session::get('suser') ."'," . Session::get('sbizid') . ",'". $keyfieldval ."','". $date ."','".$_POST['xsup']."','".$_POST['xproject']."','Created')";

				$success = $this->model->create($mcols, $mvals);
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
			$yearoffset = Session::get('syearoffset');
			$result = "";

			
			$status = "Confirmed";
			$appstatus = "Confirmed";
			$approval = $this->model->getApproval("Bill Submit");
			if(!empty($approval)){
				$status = "Pending";
				$appstatus = $approval[0]['xstatus'];

				$sendMails = $this->model->getMails("Bill Submit", $approval[0]['xstatus']);
				$mailer = new Mailer();
				$messagae = '<h4>Bill Number : '.$sonum.'</h4></br><p>To Approve this bill <a href="'.URL.'billapproval/showreq/'.$sonum.'">Click Here</a></p>';
				$emails = "";
				if(!empty($sendMails)){
					foreach($sendMails as $key=>$value){
						$emails .= $value['zaltemail'].",";	
					}
					$emails = rtrim($emails,",");
				}
				$res = $mailer->sendbyemail($emails, "Bill Submited by ".Session::get('suser'), $messagae, "");
			}
			$postdata=array(
				"xstatus" => $status,
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
			"xstatus" => "Canceled"
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