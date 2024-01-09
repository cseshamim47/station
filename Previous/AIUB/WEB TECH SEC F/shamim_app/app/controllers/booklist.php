<?php
class Booklist extends Controller{
	
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
				if($menus["xsubmenu"]=="Specimen Entry")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('views/booklist/js/jquery-1.12.4.min.js','views/booklist/js/jquery-ui-1.12.1.min.js','views/booklist/js/jquery.appendGrid-1.7.1.js','views/booklist/js/schooldata.js','views/booklist/js/jQuery.print.js','views/booklist/js/formpost.js','views/booklist/js/EasyAutocomplete/jquery.easy-autocomplete.min.js','public/js/default.js','public/theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js','public/js/jquery.dataTables.min.js','public/js/dataTables.bootstrap.min.js');
		$dt = date("Y/m/d");
		
		$date = date('Y-m-d', strtotime($dt));
		$year = date('Y',strtotime($date));
		$this->values = array(
			"xschool"=>"",			
			"xclass"=>"",
			"xitemcode"=>"",
			"xsl"=>"0"
			);
			
			$this->fields = array(
						array(							
							"xschool-select_School" => 'School*~star_minlength="4" required',
							"xclass-select_Class" => 'Class*~star_minlength="4" required'
							),
						array(							
							"xitemcode-group_".URL."items/picklist"=>'Item Code*~star_maxlength="20"'
							),
						array(
							"xsl-hidden"=>'_""'
							)
						);
						
								
		}
		
		public function index(){
		
		
		// $btn = array(
		// 	"Clear" => URL."booklist/itemscentry",
		// );
			//$this->view->unconfirmedinv=$this->model->getSalesList("Created");
			//$this->view->confirmedinv=$this->model->getSalesList("Confirmed");
			$this->view->rendermainmenu('booklist/index');
			
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
			$success = 0;



			if($_POST['xsonum'] == "")
				$keyfieldval = $this->model->getKeyValue("booklist","xdocnum","DOCB-","6");
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
				$rownum = $this->model->getRow("booklistdet","xdocnum",$keyfieldval,"xrow");
				//Data made for Master Table sofreemst
				$mcols = "";
				$mvals = "";
				$mcols = "`bizid`,`xdate`,`xcus`,`xquotnum`,`xnotes`,`zemail`,`xdocnum`,`xyear`,`xper`,`xstatus`";

				$mvals = "(" . Session::get('sbizid') . ",'". $date ."','". $_POST['xcus'] ."','". $_POST['xquotnum'] ."','". $_POST['xnotes'] ."','". Session::get('suser') ."','". $keyfieldval ."',".$year.",".$month.",'Created')";

				//Data Made for dt Table sofreedet
				$cols = "`bizid`,`xdocnum`,`xrow`,`xitemcode`,`xqty`,`xdate`,`xrate`,`xdisc`,`xexch`,`xcur`,`zemail`,`xcus`,`xyear`,`xper`,`xdispct`,`xsubject`,`xschoolpur`,`xschoolsale`,`xclass`";
				if($_POST['tblAppendGrid_rowOrder']!=null && $_POST['tblAppendGrid_rowOrder']!=""){
					$lbl = explode(',',$_POST['tblAppendGrid_rowOrder']);
					foreach($lbl as $k=>$v){
						$sublbl = explode(',',$_POST['tblSubGrid_'.$v.'_rowOrder']);
						foreach($sublbl as $ke=>$val){
							if($_POST['tblSubGrid_'.$v.'_xitemcode_'.$val] != "" && $_POST['tblSubGrid_'.$v.'_xrow_'.$val] == ""){
								$vals .= "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $rownum ."','". $_POST['tblSubGrid_'.$v.'_xitemcode_'.$val] ."','". $_POST['tblSubGrid_'.$v.'_xqty_'.$val] ."','". $date ."','". $_POST['tblSubGrid_'.$v.'_xmrp_'.$val] ."','". $_POST['tblSubGrid_'.$v.'_xdisc_'.$val] ."','". $_POST['tblSubGrid_'.$v.'_xcurconversion_'.$val] ."','','".Session::get('suser')."','". $_POST['xcus'] ."',".$year.",".$month.",'". $_POST['tblSubGrid_'.$v.'_xdispct_'.$val] ."','". $_POST['tblAppendGrid_xsubjectname_'.$v] ."','". $_POST['tblSubGrid_'.$v.'_xschoolpur_'.$val] ."','". $_POST['tblSubGrid_'.$v.'_xschoolsale_'.$val] ."','". $_POST['tblAppendGrid_xclass_'.$v] ."'),";
								$rownum++;
							}else if($_POST['tblSubGrid_'.$v.'_xitemcode_'.$val] != "" && $_POST['tblSubGrid_'.$v.'_xrow_'.$val] != ""){
								$vals .= "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $_POST['tblSubGrid_'.$v.'_xrow_'.$val] ."','". $_POST['tblSubGrid_'.$v.'_xitemcode_'.$val] ."','". $_POST['tblSubGrid_'.$v.'_xqty_'.$val] ."','". $date ."','". $_POST['tblSubGrid_'.$v.'_xmrp_'.$val] ."','". $_POST['tblSubGrid_'.$v.'_xdisc_'.$val] ."','". $_POST['tblSubGrid_'.$v.'_xcurconversion_'.$val] ."','','".Session::get('suser')."','". $_POST['xcus'] ."',".$year.",".$month.",'". $_POST['tblSubGrid_'.$v.'_xdispct_'.$val] ."','". $_POST['tblAppendGrid_xsubjectname_'.$v] ."','". $_POST['tblSubGrid_'.$v.'_xschoolpur_'.$val] ."','". $_POST['tblSubGrid_'.$v.'_xschoolsale_'.$val] ."','". $_POST['tblAppendGrid_xclass_'.$v] ."'),";
							}
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
				$result = "";
				//if(count($tblvalues)>0){
					//if($tblvalues[0]["xstatus"]=="Created"){
						$result = $this->model->recdelete(" where xdocnum='".$sonum."' and xrow=".$rownum);
						$flag = "Book Deleted Successfull";
					//}else{
						//$flag = "Already Invoice Confirmed or Canceled!";
					//}
				//}
			}catch(Exception $e){
				$flag = "An Exception";
			}
			echo json_encode($flag);
		}
		function confirmpost($sonum,$disc,$cus){
			$voucher = "";	
			$org = $this->model->getCustomer($cus)[0]['xorg'];
			// echo json_encode($ee="Success");
			// $file = fopen("C:/Users/DBS/Desktop/testdoc.txt","w");
			// echo fwrite($file,$sonum." - ".$disc." - ".$cus." - ".$org);
			// fclose($file);

			$yearoffset = Session::get('syearoffset');
			$result = "";
			$postdata=array(
				"xstatus" => "Confirmed",
				"xgrossdisc"=>$disc,
				"xvoucher"=>$voucher
				);				
			$where = " bizid = ". Session::get('sbizid') ." and xsonum = '". $sonum ."'";
			$this->model->confirm($postdata,$where);

			// $rows = $this->model->getsalesForConfirm($sonum);

			// if(!empty($rows)){

			// $glinterface = $this->model->glsalesinterface(); 

			// if(!empty($glinterface)){
				
			// 	$xdate = date("Y/m/d");
			// 	$dt = str_replace('/', '-', $xdate);
			// 	$date = date('Y-m-d', strtotime($dt));
			// 	$year = date('Y',strtotime($date));
			// 	$month = date('m',strtotime($date)); 
			// 		//glheader goes here
			// 		$xyear = 0;
			// 		$per = 0;
			// 		//print_r($this->model->getYearPer($yearoffset,intval($month))); die;
			// 		foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
			// 			$per = $key;
			// 			$xyear = $val;
			// 		}
			// 		$voucher = $this->model->getKeyValue("glheader","xvoucher","SINV".Session::get('suserrow')."-","6");
					
			// 		$data = array();
					
			// 		$data['bizid'] = Session::get('sbizid');
			// 		$data['zemail'] = Session::get('suser');
			// 		$data['xnarration'] = "Created by system! Sales Order:".$sonum." Customer: ".$cus."-".$org;
			// 		$data['xyear'] = $xyear;
			// 		$data['xper'] = $per;
			// 		$data['xvoucher'] = $voucher;
			// 		$data['xdate'] = $date;
			// 		$data['xstatusjv'] = 'Confirmed';
			// 		$data['xbranch'] = Session::get('sbranch');;
			// 		$data['xdoctype'] = "Sales Voucher";
			// 		$data['xdocnum'] = $sonum;
					
			// 		$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,
			// 			`xexch`,`xprime`,xflag";

			// 		$vals = "";	
					
			// 		$i = 0;	
					
			// 		$globalvar = new Globalvar();
					
			// 		foreach($glinterface as $key=>$val){
			// 			$i++; 
			// 			$amt = $globalvar->getFormula($rows,$val["xformula"], $rows[0]['xgrossdisc'], $rows[0]['xrcvamt']
			// 			, $rows[0]['xpackcharge'], $rows[0]['xtranscost']);
						
			// 			if($val['xaction']=="Credit")
			// 				$amt = "-".$amt; 

			// 			$acc = $this->model->getAcc($val['xacc']); 
			// 			$subacc = "";
			// 			if($acc[0]['xaccsource']=="Customer")
			// 				$subacc = $rows[0]['xcus'];
			// 			else
			// 				$subacc = "";
			// 			if($amt<>0)
			// 				$vals .= "(" . Session::get('sbizid') . ",'". $voucher ."','". $i ."','". $val['xacc'] ."',
			// 				'". $acc[0]['xacctype'] ."','". $acc[0]['xaccusage'] ."','". $acc[0]['xaccsource'] ."','". $subacc ."','".Session::get('sbizcur')."',
			// 				'". $amt ."','1','". $amt ."','". $val['xaction'] ."'),";
			// 		}

			// 		$vals = rtrim($vals, ",");
					
			// 		$success = $this->model->confirmgl($data, $cols, $vals);

			// 		$this->model->confirm($postdata,$where);

			// }else{
			// 	$this->model->confirm($postdata,$where);
			// }
			
			// $tblvalues=array();
			// $tblvalues = $this->model->getSales($sonum);
			
			// $result="Confirm Failed";
			
			// if($tblvalues[0]['xstatus']=="Confirmed"){
			// 	$result='Confirmed!<br/><a style="color:red" id="invnum" href="'.URL.'sales/showinvoice/'.$sonum.'">Click To Print Invoice - '.$sonum.'</a>';
			// }
			echo json_encode("Success");
		//}
			//$this->showentry($sonum, $result);
			//echo json_encode($su="Success");
	
	}
	function cancelpost($sonum,$disc,$cus){
		$sta = "";
		//echo "rttt";
		$org = $this->model->getCustomer($cus)[0]['xorg'];
		//$sonum = $_POST['xsonum'];
			//echo json_encode($sta);
		// $milistone = $this->model->getsomilestone($sonum); 
		// if(count($milistone)>0){
		// 	if($milistone[0]['xdelcount']<>0){
				
		// 		$sta = "Could not canceled! DO Created!";
		// 		echo $sta;
		// 		return;
		// 	}
		// }

		$voucher = "";
		
		// $disc = $_POST['xgrossdisc'];
		// $cus = $_POST['xcus'];	
		$yearoffset = Session::get('syearoffset');
		$result = "";
		$postdata=array(
			"xstatus" => "Canceled"
			);				
		$where = " bizid = ". Session::get('sbizid') ." and xsonum = '". $sonum ."'";

		$rows = $this->model->getsalesForConfirm($sonum);

		if(!empty($rows)){

		$glinterface = $this->model->glsalesinterface();

		if(!empty($glinterface)){

			$xdate = date("Y/m/d");
			$dt = str_replace('/', '-', $xdate);
			$date = date('Y-m-d', strtotime($dt));
			$year = date('Y',strtotime($date));
			$month = date('m',strtotime($date)); 
				//glheader goes here
				$xyear = 0;
				$per = 0;
				//print_r($this->model->getYearPer($yearoffset,intval($month))); die;
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$per = $key;
					$xyear = $val;
				}
				$voucher = $this->model->getKeyValue("glheader","xvoucher","SCNL-","6");
				
				$data = array();

				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['xnarration'] = "Created by system! Cancelation of Sales Order:".$sonum." canceled by ". Session::get('suser') ."Customer: ".$cus."-".$org;
				$data['xyear'] = $xyear;
				$data['xper'] = $per;
				$data['xvoucher'] = $voucher;
				$data['xdate'] = $date;
				$data['xstatusjv'] = 'Confirmed';
				$data['xbranch'] = Session::get('sbranch');;
				$data['xdoctype'] = "Sales Cancel Voucher";
				$data['xdocnum'] = $sonum;

				$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,
					`xexch`,`xprime`,xflag";

				$vals = "";	

				$i = 0;	
				$globalvar = new Globalvar();
				foreach($glinterface as $key=>$val){
					$i++;
					$amt = $globalvar->getFormula($rows,$val["xformula"], $rows[0]['xgrossdisc'], $rows[0]['xrcvamt'], $rows[0]['xpackcharge'], $rows[0]['xtranscost']);
					$flag = "";
					if($val['xaction']=="Credit"){
						$amt = $amt;
						$flag = "Debit";
					}else{
						$amt = "-".$amt;
						$flag = "Credit";
					}

					$acc = $this->model->getAcc($val['xacc']);
					$subacc = "";
					if($acc[0]['xaccsource']=="Customer")
						$subacc = $rows[0]['xcus'];
					else
						$subacc = "";
					if($amt<>0)
						$vals .= "(" . Session::get('sbizid') . ",'". $voucher ."','". $i ."','". $val['xacc'] ."',
						'". $acc[0]['xacctype'] ."','". $acc[0]['xaccusage'] ."','". $acc[0]['xaccsource'] ."','". $subacc ."','".Session::get('sbizcur')."',
						'". $amt ."','1','". $amt ."','". $flag ."'),";
				}

				$vals = rtrim($vals, ",");

				$success = $this->model->confirmgl($data, $cols, $vals);

				$this->model->confirm($postdata,$where);

		}else{
			$this->model->confirm($postdata,$where);
		}
		$sta = "Success";
		echo json_encode($sta);
		
		// $tblvalues=array();
		// $tblvalues = $this->model->getSales($sonum);
		
		// $result="Cancel Failed";
		
		// if($tblvalues[0]['xstatus']=="Canceled"){
		// 	$result='Canceled!<br/><a style="color:red" id="invnum" href="'.URL.'sales/showinvoice/'.$sonum.'">Click To Print Invoice - '.$sonum.'</a>';
		// }
	}
		//$this->showentry($sonum, $result);

}
		
		
		
}