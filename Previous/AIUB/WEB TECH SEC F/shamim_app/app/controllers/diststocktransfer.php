<?php 
class Diststocktransfer extends Controller{
	
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
				if($menus["xsubmenu"]=="Invoice")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/diststocktransfer/js/getitemdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"ximptnum"=>"",
			"xtxnwh"=>"",
			"xwh"=>"",
			"xitemcode"=>"",
			"xdesc"=>"",
			"xqty"=>"0",
			"xrow"=>"0",
			"xnote"=>"",
			"xstdcost"=>"0.00"
			);
			
			$this->fields = array(array(
							"xdate-datepicker" => 'Date_""',
							"ximptnum-text"=>'Transfer No_maxlength="20" readonly',
							"xrow-hidden"=>''
							),array(
							"xwh-select_Warehouse"=>'From Warehouse*~star_maxlength="20"',
							"xtxnwh-select_Warehouse"=>'To Warehouse*~star_readonly'
							),
						array(
							"xitemcode-group_".URL."itempicklist/picklist"=>'Item Code*~star_maxlength="20"',
							"xdesc-text"=>'Description_readonly'							
							),
						array(
							"xqty-text_digit"=>'Quantity*~star_number="true" minlength="1" maxlength="18" required',
							"xnote-text"=>'Note_maxlength="50"',
							)
						);
						
								
		}
		
		public function index(){
		
		
					
			$this->view->rendermainmenu('diststocktransfer/index');
			
		}
		
		public function savedistreq(){
					
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
				
				$keyfieldval="0";
				$form = new Form();
				$data = array();
				$success=0;
				$result = ""; 
				$itemdetail = $this->model->getItemDetail($_POST['xitemcode']);
				
				try{
				
					
				$form	->post('xitemcode')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('ximptnum')

						->post('xwh')
						->val('minlength', 1)

						->post('xtxnwh')
						->val('minlength', 1)

						->post('xnote')
			
						->post('xqty');
						
				$form	->submit();
				
				$data = $form->fetch();


				
				if($data['ximptnum'] == "")
					$keyfieldval = $this->model->getKeyValue("imtransfer","ximptnum","STRN".Session::get('sbin')."-","5");
				else
					$keyfieldval = $data['ximptnum'];

				$stock = $this->model->getItemStock($data['xitemcode'],$data['xwh']);

				if(!empty($stock)){
					if($stock[0]["xbalance"]<$data['xqty']){
						throw new Exception("Not enough stock! Available stock is ".$stock[0]['xbalance']."<br/>");
					}
				}else{
					throw new Exception("No stock detail found!");
				}

					$data['xstdcost']=$itemdetail[0]['avgcost'];
				
				
				if($_POST['xqty']<=0){
					throw new Exception("Product quantity must be greater than 0!");
				}
				if($_POST['xwh']==""){
					throw new Exception("From warehouse Not found!");
				}
				if($_POST['xtxnwh']==""){
					throw new Exception("To warehouse Not found!");
				}
				
				
				
				$data['xsup'] = $itemdetail[0]['xsup'];
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['ximptnum'] = $keyfieldval;
				$data['xdate'] = $date;
				$data['xbranch'] = Session::get('sbranch');
				$data['xdoctype'] = "Stock Transfer";
				$data['xyear'] = $year;
				$data['xper'] = $month;
				
				
				$vals = "";
				
				$rownum = $this->model->getRow("imtransferdet","ximptnum",$data['ximptnum'],"xrow");
				$nextrow = $rownum+1;
				
				$cols = "`bizid`,`ximptnum`,`xrow`,`xitemcode`,`xitembatch`,`xqty`,`xdate`,`xstdcost`,`zemail`,`xwh`,`xyear`,`xper`,`xtxnwh`,`xdoctype`,`xsign`,`xunit`,`xtypestk`";
				
				$vals .= "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $rownum ."','". $data['xitemcode'] ."','". $data['xitemcode'] ."','". $data['xqty'] ."','". $date ."','". $data['xstdcost'] ."','". Session::get('suser') ."','". $data['xwh'] ."','". $year ."','". $month ."','". $data['xtxnwh'] ."','Stock Transfer',-1,'". $itemdetail[0]['xunitstk'] ."','". $itemdetail[0]['xtypestk'] ."'),";

				$vals .= "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". ($rownum+1) ."','". $data['xitemcode'] ."','". $data['xitemcode'] ."','". $data['xqty'] ."','". $date ."','". $data['xstdcost'] ."','". Session::get('suser') ."','". $data['xtxnwh'] ."','". $year ."','". $month ."','". $data['xwh'] ."','Stock Transfer',1,'". $itemdetail[0]['xunitstk'] ."','". $itemdetail[0]['xtypestk'] ."')";
				
				//echo $vals;die;
				$success = $this->model->create($data, $cols, $vals);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					$this->result = 'Stock Transfered';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Stock Transfer! Reason: Could be Duplicate Account Code or system error!";
				
				
				
				 $this->showentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		public function edit(){
			
			if (empty($_POST['ximptnum'])){
					header ('location: '.URL.'diststocktransfer/distreqentry');
					exit;
				}
			$result = "";
			
			$hd = array();
			$dt = array();
			
				
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y', strtotime($date));
				$per = date('m', strtotime($date));
				
			$success=false;
			$ptnum = $_POST['ximptnum'];
			$form = new Form();
				$data = array();
				
				try{
				
				
				$form	->post('xitemcode')
						->val('minlength', 1)
						->val('maxlength', 20)

						->post('ximptnum')
						->val('minlength', 1)

						->post('xwh')
						->val('minlength', 1)

						->post('xnote')
										
						->post('xqty');
						
						
				$form	->submit();
				
			
				
				$data = $form->fetch();

				$getfit = $this->model->getImpt($ptnum);
				if($getfit[0]['xstatus']=='Confirmed'){
					throw new Exception("Update failed! </br> Already Confirmed!");
				}
				
				$stock = $this->model->getItemStock($data['xitemcode'],$data['xwh']);

				$itemdetail = $this->model->getItemDetail($data['xitemcode']);

				if(!empty($stock)){
					if($stock[0]["xbalance"]<$data['xqty']){
						throw new Exception("Not enough stock! Available stock is ".$stock[0]['xbalance']."<br/>");
					}
				}else{
					throw new Exception("No stock detail found!");
				}
								
				$hd = array (
					"xemail"=>Session::get('suser'),
					"zutime"=>date("Y-m-d H:i:s"),
					"xnote"=>$data['xnote'],
					"xdate"=>$date,
					"xyear"=>$year,
					"xper"=>$per,
								
				);
				
				$dt = array (
					"xitemcode"=>$data['xitemcode'],
					"xunit"=>$itemdetail[0]['xunitstk'],
					"xtypestk"=>$itemdetail[0]['xtypestk'],
					"xstdcost"=>$itemdetail[0]['avgcost'],					
					"xqty"=>$data['xqty'],
					"xdate"=>$date,
					"xyear"=>$year,
					"xper"=>$per,
				);
				
				$success = $this->model->edit($hd,$dt,$ptnum,$_POST['xrow']);
				
				
				}catch(Exception $e){
					//echo $e->getMessage();die;
					$result = $e->getMessage();
					
				}
				if($result==""){
				if($success)
					$result = "Edited successfully";
				else
					$result = "Edit failed!";
				
				}
				
				 $this->showentry($ptnum, $result);
				
		
		}
		
		
		public function showitem($ptnum, $row, $result=""){
		if($ptnum=="" || $row==""){
			header ('location: '.URL.'diststocktransfer/distreqentry');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."diststocktransfer/distreqentry"
		);
		
		$tblvalues = $this->model->getImpt($ptnum);
		$tbldtvals = $this->model->getimtransferdtOne($ptnum, $row);
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"ximptnum"=>$tblvalues[0]['ximptnum'],
					"xnote"=>$tblvalues[0]['xnote'],
					"xwh"=>$tblvalues[0]['xwh'],
					"xtxnwh"=>$tblvalues[0]['xtxnwh'],
					"xitemcode"=>$tbldtvals[0]['xitemcode'],
					"xdesc"=>$tbldtvals[0]['xitemdesc'],
					"xqty"=>$tbldtvals[0]['xqty'],
					"xrow"=>$tbldtvals[0]['xrow']
					);
		

		// form data
			
			$dynamicForm = new Dynamicform("Stock Transfer", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields,  URL."diststocktransfer/edit", "Update",$tblvalues, URL."diststocktransfer/showpost");
			
			$this->view->table = $this->renderTable($ptnum);
			
			$this->view->renderpage('diststocktransfer/distreqentry');
		}
		
		
		
		public function showentry($ptnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."diststocktransfer/distreqentry"
		);
		
		$tblvalues = $this->model->getImpt($ptnum);
		$status = "";
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else{
			$status = $tblvalues[0]['xstatus'];
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"ximptnum"=>$tblvalues[0]['ximptnum'],
					"xnote"=>$tblvalues[0]['xnote'],
					"xwh"=>$tblvalues[0]['xwh'],
					"xtxnwh"=>$tblvalues[0]['xtxnwh'],
					"xitemcode"=>"",
					"xdesc"=>"",
					"xqty"=>"0",
					"xrow"=>"0"
					);
						
		}
		$confirmurl = "";
		$saveurl = "";
		$opbtn = "Save";
		if($status=="Created"){
			$confirmurl = array(URL."diststocktransfer/confirmrec", "Confirm");
			$saveurl = URL."diststocktransfer/savedistreq";
			$opbtn="Save";
		}
		if($status=="Confirmed"){
			$confirmurl = array(URL."diststocktransfer/cancelrec", "Cancel");
			$saveurl = "";
			$opbtn="";
		}
		
						
			$dynamicForm = new Dynamicform("Stock Transfer", $btn, $result.'<a href='.URL.'diststocktransfer/printchalan/'.$ptnum.'>'.$ptnum.'</a>');		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, $opbtn,$tblvalues,URL."diststocktransfer/showpost",$confirmurl);
			
			$this->view->table = $this->renderTable($ptnum);
			
			$this->view->renderpage('diststocktransfer/distreqentry');
		}
		
		function renderTable($ptnum){
			$getfit = $this->model->getImpt($ptnum);
			$del = "";
			if(!empty($getfit)){
				if($getfit[0]['xstatus']=='Created'){
					$del = URL."diststocktransfer/deleteitem/".$ptnum."/";
				}
			}
			$fields = array(
						"xrow-Sl",
						"xitemcode-Item Code",
						"xitemdesc-Description",
						"xqty-Quantity"
						);
			$table = new Datatable();
			$row = $this->model->getimtransferdt($ptnum);
			
			return $table->myTable($fields, $row, "xrow",URL."diststocktransfer/showitem/".$ptnum."/",$del);
			
			
		}
		
		
		function imptlist($status="Confirmed"){
			$rows = $this->model->getImptList($status); 
			$cols = array("xdate-Date","ximptnum-Transfer No","xwh-From Warehouse","xtxnwh-To Warehouse");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "ximptnum",URL."diststocktransfer/showentry/");
			
			$this->view->renderpage('diststocktransfer/distreqlist', false);
		}
		
		
				
		function printchalan($ptnum){
			
			$rows = $this->model->printchalan($ptnum);
			
			$rptname = "Transfer Chalan";
			$txnno = "";
			$xwh = "";
			$dt = "";
			$xtxnwh = "";
			$totalqty = 0;
			
			foreach($rows as $key=>$value){
				
				
				$xwh = $value["xwh"];
				$dt = $value["xdate"];
				$xtxnwh = $value["xtxnwh"];
				$totalqty += $value["xqty"];
				
			}
			
			$this->view->vrow = $rows;
			$this->view->org = Session::get("sbizlong");
			$this->view->vrptname = $rptname;
			$this->view->txnno = $ptnum;
			$this->view->xtxnwh = $xtxnwh;
			$this->view->xwh = $xwh;
			$this->view->dt = $dt;
			$this->view->totqty = $totalqty;
			
						
			$this->view->renderpage('diststocktransfer/printchalan', false);
		}
		
		function distreqentry($message=""){
				
		$btn = array(
			"Clear" => URL."diststocktransfer/distreqentry"
		);

		
			$dynamicForm = new Dynamicform("Product Transfer",$btn,$message);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."diststocktransfer/savedistreq", "Save",$this->values, URL."diststocktransfer/showpost");
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('diststocktransfer/distreqentry', false);
		}
		
		
		
		public function confirmrec(){
			if(!isset($_POST["ximptnum"])){
				header ('location: '.URL.'diststocktransfer/distreqentry');
				exit;
			}
			$ptnum = $_POST['ximptnum'];

			$tblvalues = $this->model->getImpt($ptnum);
			$message = "Could not Confirmed!";
			if(!empty($tblvalues)){
				if($tblvalues[0]["xstatus"]=="Created"){
					$message = " Confirmed!";					
					$this->model->confirm($ptnum);
				}else if($tblvalues[0]["xstatus"]=="Confirmed"){
					$message = "Already Confirmed!";
				}else{
					$message = "Document Canceled!";
				}
			}
				
				
			$this->showentry($ptnum, $message);
			
		}
		public function cancelrec(){
			if(!isset($_POST["ximptnum"])){
				header ('location: '.URL.'diststocktransfer/distreqentry');
				exit;
			}
			$ptnum = $_POST['ximptnum'];

			$tblvalues = $this->model->getImpt($ptnum);
			$message = "Could not Cancel document!";
			if(!empty($tblvalues)){
				if($tblvalues[0]["xstatus"]=="Confirmed"){
					$message = "Document Canceled!";					
					$this->model->cancel($ptnum);
				}else if($tblvalues[0]["xstatus"]=="Canceled"){
					$message = "Already Canceled!";
				}
			}
				
				
			$this->showentry($ptnum, $message);
			
		}
		function deleteitem($ptnum, $rw){

			$where = " where bizid=".Session::get('sbizid')." and ximptnum='".$ptnum."' and xrow=".$rw;

			$result = $this->model->dbdelete($where);

			
			$this->showentry($ptnum, "Deleted Successfully!");
			
		}

		public function showpost(){
		//echo 123;die;
		$ptnum = $_POST['ximptnum'];
			
		$tblvalues=array();
		
		$btn = array(
			"New" => URL."diststocktransfer/distreqentry"
		);
		
		$tblvalues = $this->model->getImpt($ptnum);
		$status = "";
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else{
			$status = $tblvalues[0]['xstatus'];
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"ximptnum"=>$tblvalues[0]['ximptnum'],
					"xnote"=>$tblvalues[0]['xnote'],
					"xwh"=>$tblvalues[0]['xwh'],
					"xtxnwh"=>$tblvalues[0]['xtxnwh'],
					"xitemcode"=>"",
					"xdesc"=>"",
					"xqty"=>"0",
					"xrow"=>"0"
					);
						
		}
		$confirmurl = "";
		$saveurl = "";
		$opbtn = "Save";
		if($status=="Created"){
			$confirmurl = array(URL."diststocktransfer/confirmrec", "Confirm");
			$saveurl = URL."diststocktransfer/savedistreq";
			$opbtn="Save";
		}
		if($status=="Confirmed"){
			$confirmurl = array(URL."diststocktransfer/cancelrec", "Cancel");
			$saveurl = "";
			$opbtn="";
		}	
		
						
			$dynamicForm = new Dynamicform("Stock Transfer", $btn, '<a href='.URL.'diststocktransfer/printchalan/'.$ptnum.'>'.$ptnum.'</a>');		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, $opbtn,$tblvalues,URL."diststocktransfer/showpost",$confirmurl);
			
			$this->view->table = $this->renderTable($ptnum);
			
			$this->view->renderpage('diststocktransfer/distreqentry');
		}
		
}