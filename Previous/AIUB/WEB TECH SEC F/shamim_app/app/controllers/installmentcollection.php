<?php  
class Installmentcollection extends Controller{
	
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
				if($menus["xsubmenu"]=="Installment Collection")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/installmentcollection/js/codevalidator.js','views/installmentcollection/js/printinvoice.js','views/installmentcollection/js/getaccdt.js');
		$dt = date("Y/m/d");
		$date = date('Y-m-d', strtotime($dt));
		$year = date('Y',strtotime($date));
		$per = date('M',strtotime($date));
		$this->values = array(			
			"xcus"=>"",
			"xdate"=>$dt,
			"xorg"=>"",			
			"xadd1"=>"",
			"xmobile"=>"",		
			"xrcvby"=>"Cash",		
			"xchequeno"=>"",		
			"xchequedate"=>$dt,
			"xacccr"=>"",
			"xacccrdesc"=>"",
			"xacccrtype"=>"",
			"xacccrusage"=>"",
			"xacccrsource"=>"",
			"xnarration"=>"",
			"xcollectionno"=>"",
			"xprime"=>"0"
			);
			
			$this->fields = array(array(
							"xcus-group_".URL."customers/picklist"=>'Customer Code*~star_maxlength="20"',
							"xdate-datepicker" => 'Date_""'
							),
						array(
							"xorg-text"=>'Customer Name*~star_maxlength="100" readonly',
							"xadd1-text"=>'Address_maxlength="160" readonly',
							),
						array(
							"xmobile-text"=>'Mobile_maxlength="160" readonly',
							"xcollectionno-hidden"=>''
							),
						array(
							"xnarration-textarea"=>'Narration_maxlength="160"',
							"xrcvby-radio_Cash_Bank"=>'Received By_readonly',
							),
						array(
							"xacccr-group_".URL."jsondata/glchartpicklistcr"=>'Receive Account_maxlength="20" readonly',
							"xacccrdesc-text"=>'Account Desc_readonly',
							"xacccrtype-hidden"=>'',
							"xacccrusage-hidden"=>'',
							"xacccrsource-hidden"=>''
							),
						array(
							"xchequeno-text"=>'Cheque No*~star_maxlength="160"',
							"xchequedate-datepicker"=>'Cheque Date*~star_maxlength="160"'
							),
						array(
							"xprime-text_number"=>'Amount_readonly_number="true" minlength="1" maxlength="18" required'
						)
						);
		}
		 
		public function index(){
		
		
		$btn = array(
			"Clear" => URL."installmentcollection/stuenrollentry",
		);	
		
		
			$this->view->rendermainmenu('installmentcollection/index');
			
		}
		
		public function savecollection(){
				$dt = date("Y/m/d");				
				//echo $_POST['xstudentidro']."-".$_POST['xbalance']; die;
				$date = date('Y-m-d', strtotime($dt));
				$cus = $_POST['xcusro'];
				$xdate = $_POST['xdatero'];
				
				$xdat = date('Y-m-d', strtotime($xdate));
				$year = date('Y',strtotime($xdat));
				$month = date('n',strtotime($xdat));
				$keyfieldval="0";
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				$cus = $this->model->getsinglefees($cus, $year, $xdat)[0]["xcus"];
				$amount = $this->model->getsinglefees($cus, $year, $xdat)[0]["xamount"];
				$inssl = $this->model->getsinglefees($cus, $year, $xdat)[0]["xinssl"];
				$insnum = $this->model->getsinglefees($cus, $year, $xdat)[0]["xinsnum"];
				$commission = $this->model->getSingleCustomer($insnum, $inssl);
				$comamt = ($_POST['xamount']*$commission[0]['xagentcom'])/100;
				//print_r($amount); die;
				
				//echo $studentid." ".$year." ".$feesamt; die;
				

				try{
				
				$cusdt = $this->model->getCustomer($cus);
				$cusadd = $cusdt[0]['xadd1'];
				$org = $cusdt[0]['xorg'];
									
				if(!is_numeric($_POST['xamount'])){
					throw new Exception("Not a valid number!");
				}
				// if($_POST['xamount']>$amount){
				// 	throw new Exception("Amount Exceeded!");
				// }
				if($_POST['xamount']<=0){
					throw new Exception("0 or less amount. Could not save!");
				}


				$data['xdate']= $date;
				$data['xinssl']= $inssl;
				$data['xinsnum']= $insnum;
				$data['xcus'] = $cus;
				$data['xagent'] = $commission[0]['xagent'];
				$data['xcomamt'] = $comamt;
				$data['xamount'] = $_POST['xamount'];
				$data['bizid'] = Session::get('sbizid');
				$data['xrow'] = "1";
				$data['zemail'] = Session::get('suser');
				$data['xbranch'] = Session::get('sbranch');
				$data['xinsdate'] = $xdat;				
				$data['xper'] = $month;
				$data['xyear'] = $year;
				$success = $this->model->create($data);

				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				
				
				if($success>0)
					$colsl = $this->model->getColsl()[0]['xcollectionno'];
					$this->result = "Collected Created";
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Created Collect!";
				
				 $this->showentry($cus, $colsl, $this->result);
				 
				 
				
		}



		public function confirmcollection(){				
				//echo $_POST['xstudentidro']."-".$_POST['xbalance']; die;
				
				$cus = $_POST['xcus'];
				$date = $_POST['xdate'];
				$dt = str_replace('/', '-', $date);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('n',strtotime($date));
				$cxdate = $_POST['xchequedate'];
				$chxdate = str_replace('/', '-', $cxdate);
				$chexdate = date('Y-m-d', strtotime($chxdate));
				$keyfieldval="0";
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";
				$colsl = $_POST['xcollectionno'];
				//echo $colsl;die;
				
				$accdt = array();
				$payacc = array();

				$dbaccusage = "";
				$accc = "1029";
				if($_POST["xrcvby"]=='Bank')
					$accc = $_POST["xacccr"];

				$accdt = $this->model->getAccDt($accc);
					if(!empty($accdt)){
						$dbaccusage = $accdt[0]["xaccusage"];
					}
				
					//echo $accc;die;
				$rows = $this->model->getInsColldt($colsl);
 
				try{

					if($_POST["xrcvby"]=="Bank" && empty($_POST['xacccr'])) {
						
							throw new Exception("Please Enter Receive Account!");
					}

					if($_POST["xrcvby"]=="Bank" && empty($_POST['xchequeno'])) {
						
							throw new Exception("Please Enter Cheque No and Date!");
					}

				$glinterface = $this->model->glsalesinterface();
				
				$cusdt = $this->model->getCustomer($cus);
				$cusadd = $cusdt[0]['xadd1'];
				$org = $cusdt[0]['xorg'];
					
				$keyfieldval = $this->model->getKeyValue("glheader","xvoucher","INSV-","6");
				$postdata=array(
						"xdate" => $date,
						"xacccr" => $accc,
						"xstatus" => "Confirmed",
						"xtypecol" => $dbaccusage,			
						"xvoucher" => $keyfieldval,			
						);
						
				$where = " bizid = ". Session::get('sbizid') ." and xcollectionno='".$colsl."'";

				$data['xcus'] = $cus;
				$data['xorg'] = $org;
				$data['bizid'] = Session::get('sbizid');
				$data['xyear'] = $year;
				$data['xper'] = $month;
				$data['xbranch'] = Session::get('sbranch');
				$data['xdate'] = $date;
				$data['xchequedate'] = $chexdate;
				$data['xchequeno'] = $_POST['xchequeno'];
				$data['zemail'] = Session::get('suser');

				
				$data['xcolsl'] = $colsl;

				$data['xacccr'] = $accc;
				$data['xacccrdesc'] = $_POST['xacccrdesc'];
				$data['xacccrtype'] = $accdt[0]['xacctype'];
				$data['xacccrusage'] = $accdt[0]['xaccusage'];
				$data['xacccrsource'] = $accdt[0]['xaccsource'];

				$data['xvoucher'] = $keyfieldval;
				$data['xdoctype'] = "Installment Collection";				
				$data['xdocnum'] = $keyfieldval;
				$data['xnarration'] = "Received from customer: ".$cus."-".$org."-".$cusadd."-".$_POST['xnarration'];

				$postdatabank=array(
						"xstatus" => 'Processing',
						"xdate" => $date,
						"xacccr" => $data['xacccr'],
						"xchequeno" => $data['xchequeno'],
						"xchequedate" => $chexdate,
						"xtypecol" => $dbaccusage,	
						);
						
				$wherebank = " bizid = ". Session::get('sbizid') ." and xcollectionno='".$colsl."'";

				
				$globalvar = new Globalvar();
				foreach($glinterface as $key=>$val){
					
					$amt = $globalvar->getFormula($rows, $val["xformula"]);
					
					$debamt = $amt;
					if($val['xaction']=="Credit")
						$amt = "-".$amt;

					$acc = $this->model->getAccDt($val['xacc']);

				$data['xprime'] = $debamt;
				$data['xacc'] = $val['xacc'];
				$data['xaccdesc'] = $acc[0]['xdesc'];
				$data['xacctype'] = $acc[0]['xacctype'];
				$data['xaccusage'] = $acc[0]['xaccusage'];
				$data['xaccsource'] = $acc[0]['xaccsource'];
				
				if($_POST["xrcvby"]=="Cash") {
					
				$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,`xaccsub`,`xcur`,`xbase`,`xexch`,`xprime`,`xflag`";
				
				$vals = "(" . Session::get('sbizid') . ",'". $keyfieldval ."','1','". $val['xacc'] ."',
				'". $acc[0]['xacctype'] ."','". $acc[0]['xaccusage'] ."','". $acc[0]['xaccsource'] ."','". $data['xcus'] ."','BDT',
				'". $amt ."','1','". $amt ."','". $val['xaction'] ."'),
				(" . Session::get('sbizid') . ",'". $keyfieldval ."','2','". $accc ."',
				'". $data['xacccrtype'] ."','". $data['xacccrusage'] ."','". $data['xacccrsource'] ."','','BDT',
				'". $debamt ."','1','". $debamt ."','Debit')";

				// $file = fopen("C:/Users/kamrul/Desktop/testdoc.txt","w");
				// echo fwrite($file,$vals);
				// fclose($file);
				$success = $this->model->createCash($data, $cols, $vals);
				$this->model->colupdate($postdata, $where);

				}elseif ($_POST["xrcvby"]=="Bank") {
				//print_r($data);die;
				$success = $this->model->createBank($data);
				
				$this->model->colupdate($postdatabank, $wherebank);	
					
				}
			}
				if(empty($success))
					$success=0;
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				
				
				if($success>0)
					$this->result = "Installment Collection successfully";
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Installment Collection!";
				
				 $this->showconfirm($cus, $this->result);
				 
				 
				
		}

		public function showconfirm($enid, $result){
		$dt = date("Y/m/d");
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."installmentcollection/collectionentry"
		);
		
		$tblvalues = $this->model->getSingleEnroll($enid);

		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xcus"=>$tblvalues[0]['xcus'],
					"xdate"=>$dt,
					"xorg"=>$tblvalues[0]['xorg'],
					"xadd1"=>$tblvalues[0]['xadd1'],
					"xmobile"=>$tblvalues[0]['xmobile'],
					"xrcvby"=>"Cash",
					"xacccr"=>"",
					"xacccrdesc"=>"",
					"xacccrtype"=>"",
					"xacccrusage"=>"",
					"xacccrsource"=>"",
					"xnarration"=>"",
					"xchequeno"=>"",
					"xcollectionno"=>"",
					"xchequedate"=>$dt,
					"xprime"=>"0"
					);
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Installment Collection", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, "", "",$tblvalues ,URL."installmentcollection/showpost");
			
			$this->view->renderpage('installmentcollection/installmententry');
		}


		public function showentry($enid, $colsl, $result){
		$dt = date("Y/m/d");
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."installmentcollection/collectionentry"
		);
		
		$tblvalues = $this->model->getSingleEnroll($enid);
		$inscoldt = $this->model->getInsColldt($colsl);

		$conf=array(URL."installmentcollection/confirmcollection", "Confirm");

		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xcus"=>$tblvalues[0]['xcus'],
					"xdate"=>$dt,
					"xorg"=>$tblvalues[0]['xorg'],
					"xadd1"=>$tblvalues[0]['xadd1'],
					"xmobile"=>$tblvalues[0]['xmobile'],
					"xrcvby"=>"Cash",
					"xacccr"=>"",
					"xacccrdesc"=>"",
					"xacccrtype"=>"",
					"xacccrusage"=>"",
					"xacccrsource"=>"",
					"xnarration"=>"",
					"xchequeno"=>"",		
					"xchequedate"=>$dt,
					"xcollectionno"=>$colsl,
					"xprime"=>$inscoldt[0]['xamount']
					);
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Installment Collection", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, "", "",$tblvalues ,URL."installmentcollection/showpost", $conf);
			
			$this->view->renderpage('installmentcollection/installmententry');
		}

		public function editshow($colsl, $result=""){
		$dt = date("Y/m/d");
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."installmentcollection/collectionentry"
		);
		//echo $colsl;die;
		$inscoldt = $this->model->getInsColldtall($colsl);
		$tblvalues = $this->model->getSingleEnroll($inscoldt[0]['xcus']);

		$conf="";
		if($inscoldt[0]['xstatus']=='Created'){
		$conf=array(URL."installmentcollection/confirmcollection", "Confirm");
		}
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xcus"=>$tblvalues[0]['xcus'],
					"xdate"=>$dt,
					"xorg"=>$tblvalues[0]['xorg'],
					"xadd1"=>$tblvalues[0]['xadd1'],
					"xmobile"=>$tblvalues[0]['xmobile'],
					"xrcvby"=>"Cash",
					"xacccr"=>$inscoldt[0]['xacccr'],
					"xacccrdesc"=>"",
					"xacccrtype"=>"",
					"xacccrusage"=>"",
					"xacccrsource"=>"",
					"xnarration"=>"",
					"xchequeno"=>$inscoldt[0]['xchequeno'],		
					"xchequedate"=>$dt,
					"xcollectionno"=>$colsl,
					"xprime"=>$inscoldt[0]['xamount']
					);
			
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Installment Collection", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, "", "",$tblvalues ,URL."installmentcollection/showpost", $conf);
			
			$this->view->renderpage('installmentcollection/installmententry');
		}
		
		
		
		function renderTable($enid){
			$fields = array(
						"xper-Month",
						"xstudentid-Student ID",
						"xstuname-Student Name",
						"xbalance-Fees"
						);
			$table = new Datatable();
			$bizid=Session::get('sbizid');

			$branch=Session::get('sbranch');
			//echo $branch;die;
			$row = $this->model->getfeesdt($enid);
			//print_r($row);die;
			$action = URL."installmentcollection/savecollection";
			
			$table = "";
			$totaldue = 0;
			$table .= '<table class="table table-bordered table-striped table-responsive" style="width:100%">';
				$table .= '<thead><th>Date</th><th>Installment ID</th><th>Ins.Sl</th><th>Customer Code</th><th>Agent Code</th><th>Agent Commission</th><th>Due Amount</th><th>Collection Amount</th><th>Action</th></thead>';
				$table .= '<tbody>';
					foreach($row as $key=>$values){
						$table .= '<tr>';
						$table .= '<form class="form-horizontal" name="dynamicfrm" id="dynamicfrm" action="'.$action.'" method="post" enctype="multipart/form-data">';
							foreach($values as $k=>$v){
								//print_r($v);die;
								$table .= '<td><input class="form-control input-sm" type="text" id="'.$k.'ro" name="'.$k.'ro" value="'.$v.'" readonly></td>';								
							}
							$table .= '<td><input class="form-control input-sm" number="true" type="text" name="'.$k.'" value="'.$v.'"></td><td><input class="form-control input-sm" type="submit" value="Save"></td>';
						$table .= '</form>';
						$table .= '</tr>';
						$totaldue += $values["xamount"];
					}
					$table .= '<tr>';
					$table .= '<td></td><td></td><td></td><td></td><td></td><td><strong>Total Due</strong></td><td><strong>'.$totaldue.'</strong></td><td></td><td></td>';
					$table .= '</tr>';
				$table .= '</tbody>';
			$table .= '</table>';
			
			$table .= '
				<section>
					<div id="printdiv" style="display:none"></div>
					
				</section>
					';
			

			return $table;
			
			
		}
		
	
		function collectionentry(){
				
		$btn = array(
			"Clear" => URL."installmentcollection/collectionentry"
		);

		// form data
		
			$dynamicForm = new Dynamicform("Installment Collection",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, "", "",$this->values, URL."installmentcollection/showpost");
			
			$this->view->table = "";
			
			$this->view->renderpage('installmentcollection/collectionentry', false);
		}
		
		
		public function showpost(){
			$enid = $_POST['xcus'];
			$dt = date("Y/m/d");
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."installmentcollection/collectionentry"
		);
		
		$tblvalues = $this->model->getSingleEnroll($enid);
		//print_r($tblvalues);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xcus"=>$tblvalues[0]['xcus'],
					"xdate"=>$dt,
					"xorg"=>$tblvalues[0]['xorg'],
					"xadd1"=>$tblvalues[0]['xadd1'],
					"xmobile"=>$tblvalues[0]['xmobile'],
					"xrcvby"=>"Cash",
					"xacccr"=>"",
					"xacccrdesc"=>"",
					"xacccrtype"=>"",
					"xacccrusage"=>"",
					"xacccrsource"=>"",
					"xnarration"=>"",
					"xchequeno"=>"",		
					"xchequedate"=>$dt,
					"xcollectionno"=>"",
					"xprime"=>"0"
					);

			$dynamicForm = new Dynamicform("Installment Collection", $btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, "", "",$tblvalues,URL."installmentcollection/showpost");
			
			$this->view->table = $this->renderTable($enid);
			
			$this->view->renderpage('installmentcollection/collectionentry');
		}

		function inslist($status){
			$rows = $this->model->getInsList($status);
			$cols = array("xcollectionno-SL","xdate-Date","xinsnum-Installment No","xcus-Customer No","xamount-Amount");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xcollectionno",URL."installmentcollection/editshow/");
			$this->view->renderpage('installmentcollection/collectionlist', false);
		}
		
		function getstudentfees($cus, $xdate){
			$this->model->getheadcollection($cus, $xdate);
		}
}