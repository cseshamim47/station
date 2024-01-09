<?php
class Pmbomcost extends Controller{
	
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
				if($menus["xsubmenu"]=="BOM Additional Cost")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/pmbomcost/js/getitemdt.js');
		$dt = date("Y/m/d");
		$this->values = array(			
			"xbomcode"=>"",			
			"xitemcode"=>"",
			"xdesc"=>"",
			"xrawitem"=>"",	
			"xunit"=>"",			
			"xstdcost"=>"0",
			"xrow"=>"0",			
			);
			
			$this->fields = array(
						array(
							
							"xbomcode-text"=>'BOM Code_maxlength="20" readonly',
								
							),
						array(
							"xitemcode-group_".URL."itempicklist/picklist"=>'Item Code_maxlength="20" readonly',
							"xdesc-text"=>'Description_readonly'													
							),
						array(
							"Item Detail-div"=>''													
							),
						array(
							"xrawitem-select_BOM Cost Head"=>'Cost Head_maxlength="20"',
							"xunit-select_UOM"=>'Unit_maxlength="20"',							
							),
						array(							
							"xstdcost-text_digit"=>'Cost*~star_number="true" minlength="1" maxlength="18" required',
							"xrow-hidden"=>''
							)
						);			
		}
		
		public function index(){
		
					
			$this->view->rendermainmenu('pmbomcost/index');
			
		}
		
		public function save(){
				
								
				$xdate = date("Y/m/d");
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
				$yearoffset = Session::get('syearoffset');
				$txnnum = $_POST['xbomcode'];
				$keyfieldval="0";
				$form = new Form();
				$data = array();
				$success=0;
				$result = ""; 
				/*$xyear = 0;
				$xper = 0;
				//print_r($this->model->getYearPer($yearoffset,intval($month))); die;
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$xper = $key;
					$xyear = $val;
				}*/
				try{
					
				
				$form	->post('xitemcode')
						->val('minlength', 1)
						->val('maxlength', 20)

						->post('xrawitem')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('xbomcode')

						->post('xunit')	
						
						->post('xstdcost');
						
				$form	->submit();
				
				
					
				
				$data = $form->fetch();
				
				
				//$item = $this->model->getItem($data['xrawitem']);


				$bom = $this->model->getBom($data['xbomcode']);

				if(empty($bom))
					throw new Excpetion("BOM Code not found!");
				
				$keyfieldval = $data['xbomcode'];
				
					
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['xbomcode'] = $keyfieldval;
				$data['xitemcode'] = $data['xitemcode'];
				$data['xdate'] = $date;
				$data['xbranch'] = Session::get('sbranch');
				//$data['xfinyear'] = $xyear;
				//$data['xfinper'] = $xper;			
				//print_r($data); die;
				$rownum = $this->model->getRow("pmbomdet","xbomcode",$data['xbomcode'],"xrow");
				
				$cols = "`bizid`,`xbomcode`,`xrow`,`xrawitem`,`xitembatch`,`xqty`,`xconversion`,`xunit`,`xitemtype`,`xstdcost`";
				
				$vals = "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $rownum ."','". $data['xrawitem'] ."','',
				'1','1','". $data['xunit'] ."','Production Cost','". $data['xstdcost'] ."')";
				
					
				$success = $this->model->create($data, $cols, $vals);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					$this->result = 'Bill Of Material Created</br><a style="color:red" id="invnum" href="'.URL.'pmbomcost/printbom/'.$keyfieldval.'">Click To Print Bill Of Material - '.$keyfieldval.'</a>';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Bill Of Material! Reason: Could be Duplicate Trunsaction Code or system error!";
				
				 $this->showentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		public function edit(){
			
			$result = "";
			
			$hd = array();
			$dt = array();
			
				$yearoffset = Session::get('syearoffset');
				$xdate = date("Y/m/d");
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$month = date('m',strtotime($date)); 
				/*
				$xyear = 0;
				$xper = 0;
				//print_r($this->model->getYearPer($yearoffset,intval($month))); die;
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$xper = $key;
					$xyear = $val;
				}
				*/
			$success=false;
			$bomcode = $_POST['xbomcode'];
			$form = new Form();
				$data = array();
				
				try{
				
				
				$form	->post('xitemcode')
						->val('minlength', 1)
						->val('maxlength', 20)

						->post('xrawitem')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('xbomcode')	

						->post('xunit')	
						
						->post('xstdcost');

				$form	->submit();
				
			
				
				$data = $form->fetch();	
				//print_r($data);die;
				$item = $this->model->getItem($data['xitemcode']);
						
				$hd = array (
					"xitemcode"=>$data['xitemcode'],				
					
				);
				
				$dt = array (
					
					"xstdcost"=>$data['xstdcost'],
					"xunit"=>$data['xunit'],
				);
				
				$success = $this->model->edit($hd,$dt,$bomcode,$_POST['xrow']);
				
				
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
				
				 $this->showentry($bomcode, $result.'<br /><a style="color:red" id="invnum" href="'.URL.'pmbomcost/printbom/'.$bomcode.'">Click To Print Bill Of Material - '.$bomcode.'</a>');
				
		
		}
		
		public function show($txnnum, $row, $result=""){
		if($txnnum=="" || $row==""){
			header ('location: '.URL.'pmbom/bomentry');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."pmbomcost/bomentry"
		);
		if($result=="")
			$result='<a style="color:red" id="invnum" href="'.URL.'pmbomcost/printbom/'.$txnnum.'">Click To Print Bill Of Material - '.$txnnum.'</a>';
		
		$tblvalues = $this->model->getBom($txnnum);
		$tbldtvals = $this->model->getSingleBomDt($txnnum, $row);
		$status="";
		if(!empty($tblvalues))
			$status = $tblvalues[0]['xstatus']; //echo $status; die;
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					
					"xbomcode"=>$tblvalues[0]['xbomcode'],
					"xitemcode"=>$tblvalues[0]['xitemcode'],
					"xdesc"=>$tblvalues[0]['xdesc'],
					"xrawitem"=>$tbldtvals[0]['xrawitem'],
					"xstdcost"=>$tbldtvals[0]['xstdcost'],
					"xunit"=>$tbldtvals[0]['xunit'],
					"xrow"=>$tbldtvals[0]['xrow'],
					
					);
			
		// form data
		
			
			$saveurl = URL."pmbomcost/edit/";
			
		$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Bill Of Material", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, "Update",$tblvalues, URL."pmbomcost/showpost");
			
			$this->view->table = $this->renderTable($txnnum);
			
			$this->view->renderpage('pmbom/bomentry');
		}
		
		
		
		public function showentry($txnnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."pmbom/bomentry"
		);
		if($result=="")
			$result='<a style="color:red" id="invnum" href="'.URL.'pmbomcost/printbom/'.$txnnum.'">Click To Bill Of Material - '.$txnnum.'</a>';
		$tblvalues = $this->model->getBom($txnnum);
		$status="";
		if(!empty($tblvalues))
			$status = $tblvalues[0]['xstatus'];
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					
					"xbomcode"=>$tblvalues[0]['xbomcode'],					
					"xitemcode"=>$tblvalues[0]['xitemcode'],
					"xdesc"=>$tblvalues[0]['xdesc'],
					"xrawitem"=>"",	
					"xunit"=>"",				
					"xstdcost"=>"0",
					"xrow"=>"0",
					
					);
			$this->view->balance = "";
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Bill Of Material Extra Cost", $btn, $result);		
			
			$saveurl = URL."pmbomcost/save/";
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, "Save",$tblvalues ,URL."pmbomcost/showpost");
			
			$this->view->table = $this->renderTable($txnnum);
			
			$this->view->renderpage('pmbomcost/bomentry');
		}
		
		
		
		function renderTable($txnnum){
			
			$pur = $this->model->getBom($txnnum);
			$status = "";
			if(!empty($pur))
				$status = $pur[0]["xstatus"];
			
			$delurl = URL."pmbom/recdelete/".$txnnum."/";
			
			if($status=="Confirmed")
			{
				$delurl="";
			}			
			
			$fields = array(
						"xrow-Sl",
						"xrawitem-Item Code",						
						"xstdcost-Cost"						
						);
			$table = new Datatable();
			$row = $this->model->getbomdt($txnnum);
			
			return $table->myTable($fields, $row, "xrow", URL."pmbomcost/show/".$txnnum."/", $delurl);
			
			
		}
		
		
		function bomlist(){
			$rows = $this->model->getBomList("Created");
			$cols = array("xbomcode-BOM Code","xitemcode-Itemcode");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xbomcode",URL."pmbomcost/showentry/");
			$this->view->renderpage('pmbomcost/bomlist', false);
		}
		
			
		function bomentry(){
				
		$btn = array(
			"Clear" => URL."pmbomcost/bomentry"
		);

		// form data
		$this->view->balance = "";
		
			$dynamicForm = new Dynamicform("Bill Of Material Extra Cost",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."pmbomcost/save", "Save",$this->values, URL."pmbomcost/showpost");
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('pmbomcost/bomentry', false);
		}
		
		
		public function showpost(){
		//echo 123;die;
		$txnnum = $_POST['xbomcode'];
			
		$tblvalues=array();
		
		$btn = array(
			"New" => URL."pmbomcost/bomentry"
		);
		
		$tblvalues = $this->model->getBom($txnnum);
		$status="";
		if(!empty($tblvalues))
			$status = $tblvalues[0]['xstatus'];
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xbomcode"=>$tblvalues[0]['xbomcode'],					
					"xitemcode"=>$tblvalues[0]['xitemcode'],
					"xdesc"=>$tblvalues[0]['xdesc'],
					"xrawitem"=>"",	
					"xunit"=>"",					
					"xstdcost"=>"0",
					"xrow"=>"0",
					);
			
		
			
		// form data
			$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Bill Of Material", $btn,'<a style="color:red" id="invnum" href="'.URL.'pmbom/printbom/'.$txnnum.'">Click To Print Bill Of Material - '.$txnnum.'</a>');		
			
			$saveurl = URL."pmbom/save/";
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, "Save",$tblvalues ,URL."pmbom/showpost");
			
			$this->view->table = $this->renderTable($txnnum);
			
			$this->view->renderpage('pmbom/bomentry');
		}
		function recdelete($bomcode, $row){
			$grn = $this->model->getBom($bomcode);
			$status = "";
			if(!empty($grn))
				$status = $grn[0]["xstatus"];
			if($status=="Created")
				$this->model->recdelete(" WHERE xbomcode='".$bomcode."' and xrow=".$row);
			
			$this->showentry($bomcode);
		}
		function printbom($bomcode){
			
			$values = $this->model->getvbomdt($bomcode);
			//print_r($values);die;
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li>Bill Of Material</li>							
						   </ul>';
			
			$this->view->bomcode=$bomcode;

			$totqty = 0;
			$totcost = 0;
			$finisheditem="";
			
			$finisheditemdesc="";
			
			foreach($values as $key=>$val){
				
				$finisheditem=$val['xitemcode'];
				$finisheditemdesc=$val['xitemdesc'];
				
				$totqty+=$val['xqty'];
				$totcost+=$val['xstdcost'];
			}
			$this->view->finisheditem=$finisheditem;

			$this->view->finisheditemdesc=$finisheditemdesc;
				
			$this->view->totqty=$totqty;
			
			$this->view->totcost=$totcost;
			
			$this->view->vrow = $values;
			
			$this->view->vrptname = "Bill Of Material";
			$this->view->org=Session::get('sbizlong');
			
			$this->view->renderpage('pmbomcost/printbom');		
		}
}