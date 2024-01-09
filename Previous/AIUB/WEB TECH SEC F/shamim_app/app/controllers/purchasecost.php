<?php
class Purchasecost extends Controller{
	
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
				if($menus["xsubmenu"]=="Additional Purchase Cost")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/pmbomcost/js/getitemdt.js');
		$dt = date("Y/m/d");
		$this->values = array(			
			"xsl"=>"",			
			"xponum"=>"",
			"xcosthead"=>"",
			"xamount"=>"0"			
			);
			
			$this->fields = array(
						array(
							"PO Detail-div"=>''													
							),
						array(
							"xponum-group_".URL."jsondata/purchasepicklist"=>'PO_maxlength="20"',
							"xsl-hidden"=>""											
							),
						array(
							"Cost Detail-div"=>''													
							),
						array(
							"xcosthead-select_PO Cost Head"=>'Cost Head_maxlength="20"',
							"xamount-text_digit"=>'Cost*~star_number="true" minlength="1" maxlength="18" required',
							)
						);
						
								
		}
		
		public function index(){
		
					
			$this->view->rendermainmenu('purchasecost/index');
			
		}
		
		public function save(){
				
								
				
				
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
					
				
				$form	->post('xponum')
						->val('minlength', 1)
						->val('maxlength', 20)

						->post('xcosthead')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('xamount')
						->val('checkdouble');
						
				$form	->submit();
				
				
					
				
				$data = $form->fetch();
				
				$po = $this->model->getPO($data["xponum"]);

				if(empty($po))
					throw new Excpetion("PO not found!");
					
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');				
				
								
					
				$success = $this->model->create($data);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					$this->result = 'PO Cost Created</br><a style="color:red" id="invnum" href="'.URL.'purchasecost/printcost/'.$data["xponum"].'">Click To Print PO Cost - '.$data["xponum"].'</a>';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create PO Cost! Reason: Could be Duplicate Trunsaction Code or system error!";
				if(!empty($data))
					$this->showentry($data["xponum"], $this->result);
				 else
					 $this->showentry(0, $this->result);
				 
				
		}
		
		public function edit(){
			
			$result = "";
			
			
			$success=false;
			
			$form = new Form();
				$data = array();
				
				try{
				
				
				$form	->post('xponum')
						->val('minlength', 1)
						->val('maxlength', 20)

						->post('xcosthead')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						->post('xamount')	

						->post('xsl');

				$form	->submit();
				
			
				
				$data = $form->fetch();	
						
								
				$success = $this->model->edit($data);
				
				
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
				
				 $this->showentry($data["xponum"], $result.'<br /><a style="color:red" id="invnum" href="'.URL.'purchasecost/printcost/'.$data["xponum"].'">Click To Print PO Cost - '.$data["xponum"].'</a>');
				
		
		}
		
		public function show($sl, $result=""){
		if($sl==""){
			header ('location: '.URL.'purchasecost/costentry');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."purchasecost/costentry"
		);
		
		
		
		$tblvalues = $this->model->getSinglePoCost($sl);
		$status="";
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					
					"xponum"=>$tblvalues[0]['xponum'],
					"xcosthead"=>$tblvalues[0]['xcosthead'],
					"xamount"=>$tblvalues[0]['xamount'],
					"xsl"=>$tblvalues[0]['xsl'],					
					);
			
		if($result=="")
			$result='<a style="color:red" id="invnum" href="'.URL.'purchasecost/printcost/'.$tblvalues["xponum"].'">Click To Print PO Cost - '.$tblvalues["xponum"].'</a>';
		
			
			$saveurl = URL."purchasecost/edit/";
			
		$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Purchase Cost", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, "Update",$tblvalues, URL."purchasecost/showpost");
			
			$this->view->table = $this->renderTable($tblvalues["xponum"]);
			
			$this->view->renderpage('purchasecost/costentry');
		}
		
		
		
		public function showentry($txnnum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."purchasecost/costentry"
		);
		if($result=="")
			$result='<a style="color:red" id="invnum" href="'.URL.'purchasecost/printcost/'.$txnnum.'">Click To print PO Cost - '.$txnnum.'</a>';
		
			$tblvalues=array(
					
					"xponum"=>$txnnum,					
					"xcosthead"=>"",
					"xamount"=>"0",
					"xsl"=>"0",
					
					);
			$this->view->balance = "";
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Purchase Cost", $btn, $result);		
			
			$saveurl = URL."purchasecost/save/";
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."purchasecost/save", "Save",$tblvalues ,URL."purchasecost/showpost");
			
			$this->view->table = $this->renderTable($txnnum);
			
			$this->view->renderpage('purchasecost/costentry');
		}
		
		
		
		function renderTable($ponum){
			
			$pur = $this->model->getPO($ponum);
			$status = "";
			if(!empty($pur))
				$status = $pur[0]["xstatus"];
			
			$delurl = URL."purchasecost/recdelete/";
			
			
			$fields = array(
						"xsl-Sl",
						"xcosthead-Cost Head",						
						"xamount-Amount"						
						);
			$table = new Datatable();
			$row = $this->model->getcostdt($ponum);
			
			return $table->myTable($fields, $row, "xsl", URL."purchasecost/show/", $delurl);
			
			
		}
		
		
		function polist(){
			$rows = $this->model->getPOList("Created");
			$cols = array("xponum-PO");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xponum",URL."purchasecost/showentry/");
			$this->view->renderpage('purchasecost/polist', false);
		}
		
			
		function costentry(){
				
		$btn = array(
			"Clear" => URL."purchasecost/costentry"
		);

		// form data
		$this->view->balance = "";
		
			$dynamicForm = new Dynamicform("Purchase Cost",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."purchasecost/save", "Save",$this->values, URL."purchasecost/showpost");
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('purchasecost/costentry', false);
		}
		
		
		public function showpost(){
		//echo 123;die;
		$txnnum = $_POST['xponum'];
			
		$tblvalues=array();
		
		$btn = array(
			"New" => URL."purchasecost/costentry"
		);
		
		$tblvalues=array(
					
					"xponum"=>$txnnum,					
					"xcosthead"=>"",
					"xamount"=>"0",
					"xsl"=>"0",
					
					);
			
		
			
		// form data
			$this->view->balance = "";
			
			$dynamicForm = new Dynamicform("Purchase Cost", $btn,'<a style="color:red" id="invnum" href="'.URL.'purchasecost/printcost/'.$txnnum.'">Click To Print PO Cost - '.$txnnum.'</a>');		
			
			$saveurl = URL."purchasecost/save/";
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $saveurl, "Save",$tblvalues ,URL."purchasecost/showpost");
			
			$this->view->table = $this->renderTable($txnnum);
			
			$this->view->renderpage('purchasecost/costentry');
		}
		function recdelete($sl){
			
			$pocost = $this->model->getSinglePoCost($sl);
			
			$this->model->recdelete(" WHERE xsl=".$sl);
			
			$this->showentry($pocost[0]["xponum"]);
		}
		function printcost($ponum){
			
			$values = $this->model->getcostdt($ponum);
			//print_r($values);die;
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li>PO Cost</li>							
						   </ul>';
			
			$this->view->ponum=$ponum;

			
			
			$costhead="";
			$totcost = 0;
			foreach($values as $key=>$val){
				
				$totcost+=$val['xamount'];
			}
				
			
			
			$this->view->totamount=$totcost;
			
			$this->view->vrow = $values;
			
			$this->view->vrptname = "Purchase Cost";
			$this->view->org=Session::get('sbizlong');
			
			$this->view->renderpage('purchasecost/printcost');		
		}
}