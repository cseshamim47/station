<?php
class Sales extends Controller{
	
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
				if($menus["xsubmenu"]=="Sales Order")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/sales/js/getitemdt.js','views/sales/js/getaccdt.js');
		$dt = date("Y/m/d");
		$this->values = array(
			"xdate"=>$dt,
			"xsonum"=>"",
			"xcus"=>"",
			"xorg"=>"",
			"xwh"=>"",
			"xquotnum"=>"",
			"xitemcode"=>"",
			"xitemdesc"=>"",
			"xqty"=>"0",
			"xrow"=>"0",
			"xrate"=>"0.00",
			"xgrossdisc"=>"0.00",
			"xnotes"=>"",
			"xdisc"=>"0.000",
			"xdiscpct"=>"0.000",
			"xcusbal"=>"0",
			"xrcvamt"=>"0.00",
			);
			
			$this->fields = array(array(
							"Header Section-div"=>''													
							),array(
							"xsonum-text"=>'SO No_maxlength="20"',
							"xdate-datepicker" => 'Date_""',
							"xrow-hidden"=>''
							),
						array(
							"xcus-group_".URL."jsondata/customerpicklist"=>'Customer Code*~star_maxlength="20"',
							"xorg-text"=>'Customer Name*~star_maxlength="100" readonly'
							),
						array(
							"xwh-select_Warehouse"=>'Warehouse*~star_maxlength="50"',
							"xquotnum-text"=>'Quotation No*~star_maxlength="50"'														
							),
						array(
							"xcusbal-text_number"=>'Prev. Balance_number="true" minlength="1" maxlength="18" required readonly',
						
							),array(
							"Invoice Closing Section-div"=>''													
							),
						array(
							
							"xgrossdisc-text_number"=>'Discount on total value_number="true" minlength="1" maxlength="18" required',
							"xrcvamt-text_number"=>'Receive Amount_number="true" minlength="1" maxlength="18" required',
							),
						array(
							
							"xnotes-textarea"=>'Additional Notes_""'							
							),array(
							"Sales Detail-div"=>''													
							),
						array(
							"xitemcode-group_".URL."itempicklist/picklist"=>'Item Code*~star_maxlength="20"',
							"xitemdesc-text"=>'Description_readonly'							
							),
						array(
							"xrate-text_number"=>'Rate_number="true" minlength="1" maxlength="18" required',
							"xqty-text_digit"=>'Quantity*~star_number="true" minlength="1" maxlength="18" required'							
							),
						array(
							"xdiscpct-text_number"=>'Discount(%)_number="true" minlength="1" maxlength="18"',
							"xdisc-text_number"=>'Discount Amt_number="true" minlength="1" maxlength="18"',						
							)
						);
						
								
		}
		
		public function index(){
		
					
			$this->view->rendermainmenu('sales/index');
			
		}
		
		public function savesales(){
				
								
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
				$xyear = 0;
				$per = 0;
				$yearoffset = Session::get('syearoffset');
				$xsonum = $_POST['xsonum'];
				$keyfieldval="0";
				$form = new Form();
				$data = array();
				$success=0;
				$result = "";

				//print_r($this->model->getYearPer($yearoffset,intval($month))); die;
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$per = $key;
					$xyear = $val;
				}	
					
				
				try{
					if($_POST['xwh']==""){
						throw new Exception("Select Warehouse!");
					}
				
				
				$form	->post('xitemcode')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xsonum')	
						
						->post('xcus')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xquotnum')
						->val('maxlength', 20)
						
						->post('xcusbal')
						
						->post('xrcvamt')

						->post('xorg')
						->val('minlength', 1)
						->val('maxlength', 20)	

						->post('xnotes')						
						->val('maxlength', 20)
						
						->post('xgrossdisc')
				
						->post('xwh')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						
						->post('xqty')
						
						->post('xrate')
						
						->post('xdisc');
						
				$form	->submit();
				
				
					
				
				$data = $form->fetch();
				
				//print_r($data); die;
				if($data['xsonum'] == "")
					$keyfieldval = $this->model->getKeyValue("somst","xsonum","SORD-","5");
				else
					$keyfieldval = $data['xsonum'];


				$stock = $this->model->getItemStock($data['xitemcode'],$data['xwh']);
				
				if(!empty($stock)){
					if($stock[0]["xbalance"]<$data['xqty']){
						throw new Exception("Not enough stock! Available stock is ".$stock[0]['xbalance']."<br/>");
					}
				}else{
					throw new Exception("No stock detail found!");
				}
				
				//echo $keyfieldval; die;
				$stock = 10;//$this->model->getStock($data["xitemcode"],$data["xwh"]) - $data['xqty'];
				//echo $stock; die;
				if($stock<0){
					throw new Exception("Stock not available!");
				}
					
				$data['bizid'] = Session::get('sbizid');
				$data['zemail'] = Session::get('suser');
				$data['xsonum'] = $keyfieldval;
				$data['xdate'] = $date;
				$data['xyear'] = $xyear;
				$data['xper'] = $per;


				$itemdetail = $this->model->getItemMaster("xitemcode",$data['xitemcode']);
				
				$itemcost = $this->model->getItemcost($data['xitemcode']);
				

				$cost = $itemdetail[0]['xstdcost'];
				
				if(!empty($itemcost)){
					
					$cost = $itemcost[0]['avgcost'];
				}	
				


				$rownum = $this->model->getRow("sodet","xsonum",$data['xsonum'],"xrow");
				
				$cols = "`bizid`,`xsonum`,`xrow`,`xitemcode`,`xitembatch`,`xqty`,`xdate`,`xcost`,`xrate`,`xwh`,`xbranch`,`xproj`,`xtaxrate`,`xdisc`,`xexch`,`xcur`,`xtaxcode`,`xtaxscope`,`zemail`,`xunitsale`,`xcus`,`xyear`,`xper`,`xtypestk`";
				
				$vals = "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $rownum ."','". $data['xitemcode'] ."','". $data['xitemcode'] ."',
				'". $data['xqty'] ."','". $date ."',".$cost.",'". $data['xrate'] ."','". $data['xwh'] ."','". Session::get('sbranch') ."','". Session::get('sbranch') ."','0','". $data['xdisc'] ."','1','".Session::get('sbizcur')."','None','None','".$data['zemail']."','".$itemdetail[0]['xunitsale']."','". $data['xcus'] ."',".$xyear.",".$per.",'".$itemdetail[0]['xtypestk']."')";
				
					
				$success = $this->model->create($data, $cols, $vals);
				
				if(empty($success))
					$success=0;
				
				
				}catch(Exception $e){
					
					$this->result = $e->getMessage();
					
				}
				
				if($success>0)
					$this->result = 'Sales Order Created<br><a style="color:red" id="invnum" href="'.URL.'sales/showinvoice/'.$keyfieldval.'">Click To Print Invoice - '.$keyfieldval.'</a><br>
			<a style="color:red" id="invnum" href="'.URL.'sales/showchalan/'.$keyfieldval.'">Click To Print Chalan - '.$keyfieldval.'</a>';
				
				if($success == 0 && empty($this->result))
					$this->result = "Failed to Create Sales Order! Reason: Could be Duplicate Account Code or system error!";
				
				 $this->showentry($keyfieldval, $this->result);
				 
				 
				
		}
		
		public function editsales(){
			
			
			$result = "";
			
			$hd = array();
			$dt = array();
			
				$yearoffset = Session::get('syearoffset');
				$xdate = $_POST['xdate'];
				$dt = str_replace('/', '-', $xdate);
				$date = date('Y-m-d', strtotime($dt));
				
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
				$xyear = 0;
				$per = 0;	
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$per = $key;
					$xyear = $val;
				}
			$success=false;
			$sonum = $_POST['xsonum'];
			$form = new Form();
				$data = array();
				
				try{
				
				
				$form	->post('xitemcode')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xsonum')

						->post('xquotnum')		
						
						->post('xcus')
						->val('minlength', 1)
						->val('maxlength', 20)
						
						->post('xcusbal')

						->post('xorg')						
						->val('maxlength', 20)						
				
						->post('xwh')
						->val('minlength', 1)
						->val('maxlength', 50)
						
						
						->post('xnotes')						
						->val('maxlength', 20)
						
						->post('xgrossdisc')
						
						->post('xrcvamt')
						
						->post('xqty')
						
						->post('xrate')
						
						->post('xdisc');
						
				$form	->submit();
				
			
				
				$data = $form->fetch();	
				//print_r($data);die;
				
				$stock = $this->model->getItemStock($data['xitemcode'],$data['xwh']);

				if(!empty($stock)){
					if($stock[0]["xbalance"]<$data['xqty']){
						throw new Exception("Not enough stock! Available stock is ".$stock[0]['xbalance']."<br/>");
					}
				}else{
					throw new Exception("No stock detail found!");
				}

				$itemdetail = $this->model->getItemMaster("xitemcode",$data['xitemcode']);
				
				$itemcost = $this->model->getItemcost($data['xitemcode']);
				

				$cost = $itemdetail[0]['xstdcost'];
				
				if(!empty($itemcost)){
					
					$cost = $itemcost[0]['avgcost'];
				}	
								
				$hd = array (
					"xemail"=>Session::get('suser'),
					"zutime"=>date("Y-m-d H:i:s"),
					"xdate"=>$date,
					"xitemcode"=>$data['xitemcode'],
					"xcus"=>$data['xcus'],
					"xnotes"=>$data['xnotes'],
					"xgrossdisc"=>$data['xgrossdisc'],
					"xwh"=>$data['xwh'],
					"xbranch"=>$data['xwh'],
					"xproj"=>$data['xwh'],
					"xquotnum"=>$data['xquotnum'],
					"xyear" => $xyear,
					"xper" => $per
				);
				
				$dt = array (
					"xitemcode"=>$data['xitemcode'],
					"xqty"=>$data['xqty'],
					"xcost"=>$cost,
					"xrate"=>$data['xrate'],
					"xdisc"=>$data['xdisc'],
					"xtypestk"=>$itemdetail[0]['xtypestk'],
					"xunitsale"=>$itemdetail[0]['xunitsale'],
					"xwh"=>$data['xwh'],
					"xbranch"=>$data['xwh'],
					"xproj"=>$data['xwh'],
					"xdate"=>$date,
					"xyear" => $xyear,
					"xper" => $per
				);
				
				$success = $this->model->edit($hd,$dt,$sonum,$_POST['xrow']);
				
				
				}catch(Exception $e){
					//echo $e->getMessage();die;
					$result = $e->getMessage();
					
				}
				if($result==""){
				if($success)
					$result = 'Edited successfully<br/><a style="color:red" id="invnum" href="'.URL.'sales/showinvoice/'.$sonum.'">Click To Print Invoice - '.$sonum.'</a><br>
			<a style="color:red" id="invnum" href="'.URL.'sales/showchalan/'.$sonum.'">Click To Print Chalan - '.$sonum.'</a>';
				else
					$result = "Edit failed!";
				
				}
				
				 $this->showentry($sonum, $result);
				
		
		}
		
		public function showsales($sonum, $row, $result=""){
		if($sonum=="" || $row==""){
			header ('location: '.URL.'sales/salesentry');
			exit;
		}
		$tblvalues=array();
		$btn = array(
			"New" => URL."sales/salesentry"
		);
		
		$tblvalues = $this->model->getSales($sonum);
		$tbldtvals = $this->model->getSingleSalesDt($sonum, $row);
		
		$conf="";
		$sv="";
		$svbtn = "Update";
		if(count($tblvalues)>0){	
			if($tblvalues[0]['xstatus']=="Created"){
				$conf=array(URL."sales/confirmpost", "Confirm");
				$sv=URL."sales/editsales/";
			}		
			if($tblvalues[0]['xstatus']=="Confirmed"){
				$sv="";
				$conf=array(URL."sales/cancelpost", "Cancel");

				$milistone = $this->model->getsomilestone($sonum); 
				if(count($milistone)>0){
					if($milistone[0]['xdelcount']==0){
						//$sv=URL."sales/createdelivery";
						$sv="";
						$svbtn = "";	
					}
				}
			}		
		}
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xsonum"=>$tblvalues[0]['xsonum'],
					"xquotnum"=>$tblvalues[0]['xquotnum'],
					"xcus"=>$tblvalues[0]['xcus'],
					"xcusbal"=>$tblvalues[0]['xcusbal'],
					"xrcvamt"=>$tblvalues[0]['xrcvamt'],
					"xorg"=>$tblvalues[0]['xorg'],
					"xnotes"=>$tblvalues[0]['xnotes'],
					"xwh"=>$tblvalues[0]['xwh'],
					"xgrossdisc"=>$tblvalues[0]['xgrossdisc'],
					"xitemcode"=>$tbldtvals[0]['xitemcode'],
					"xitemdesc"=>$tbldtvals[0]['xitemdesc'],
					"xqty"=>$tbldtvals[0]['xqty'],
					"xrow"=>$tbldtvals[0]['xrow'],
					"xrate"=>$tbldtvals[0]['xrate'],
					"xdiscpct"=>"0.000",
					"xdisc"=>$tbldtvals[0]['xdisc']
					);
		
			
		// form data
		
			
			$dynamicForm = new Dynamicform("Sales Order", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, $svbtn,$tblvalues, URL."sales/showpost",$conf);
			
			$this->view->table = $this->renderTable($sonum);
			
			$this->view->renderpage('sales/salesentry');
		}
		
		
		
		public function showentry($sonum, $result=""){
		
		$tblvalues=array();
		$btn = array(
			"Clear" => URL."sales/salesentry"
		);
		
		$tblvalues = $this->model->getSales($sonum);
		
		$conf="";
		$sv="";
		$svbtn = "Save";
		if(count($tblvalues)>0){	
			if($tblvalues[0]['xstatus']=="Created"){
				$conf=array(URL."sales/confirmpost", "Confirm");
				$sv=URL."sales/savesales/";
			}		
			if($tblvalues[0]['xstatus']=="Confirmed"){
				$sv="";
				$conf=array(URL."sales/cancelpost", "Cancel");

				$milistone = $this->model->getsomilestone($sonum); 
				if(count($milistone)>0){
					if($milistone[0]['xdelcount']==0){
						//$sv=URL."sales/createdelivery";
						$sv="";
						$svbtn = "";	
					}
				}
			}		
		}
		//print_r($tblvalues); die;
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xsonum"=>$tblvalues[0]['xsonum'],
					"xquotnum"=>$tblvalues[0]['xquotnum'],
					"xcus"=>$tblvalues[0]['xcus'],
					"xcus"=>$tblvalues[0]['xcus'],
					"xcusbal"=>$tblvalues[0]['xcusbal'],
					"xrcvamt"=>$tblvalues[0]['xrcvamt'],
					"xorg"=>$tblvalues[0]['xorg'],
					"xnotes"=>$tblvalues[0]['xnotes'],
					"xwh"=>$tblvalues[0]['xwh'],
					"xgrossdisc"=>$tblvalues[0]['xgrossdisc'],
					"xitemcode"=>"",
					"xitemdesc"=>"",
					"xqty"=>"0",
					"xrow"=>"0",
					"xrate"=>"0",
					"xdiscpct"=>"0.000",
					"xdisc"=>"0.000"
					);
					
			if($result=="")
				$result='<a style="color:red" id="invnum" href="'.URL.'sales/showinvoice/'.$sonum.'">Click To Print Invoice - '.$sonum.'</a><br>
			<a style="color:red" id="invnum" href="'.URL.'sales/showchalan/'.$sonum.'">Click To Print Chalan - '.$sonum.'</a>';
			
			//$this->view->balance = $this->model->getBalance("");
			//print_r($tblvalues); die;
			$dynamicForm = new Dynamicform("Sales Order", $btn, $result);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, $svbtn,$tblvalues ,URL."sales/showpost",$conf);
			
			$this->view->table = $this->renderTable($sonum);
			
			$this->view->renderpage('sales/salesentry');
		}
		
		function renderTable($txnnum){
			
			$sales = $this->model->getSales($txnnum);
			$status = "";
			if(!empty($sales))
				$status = $sales[0]["xstatus"];
			
			$delbtn = "";
			if(count($sales)>0){
			if($sales[0]["xstatus"]=="Created")
				$delbtn = URL."sales/deletesales/".$txnnum."/";
				
			}
			
			$row = $this->model->getvsalesdt($txnnum);
			
			$table = '<table class="table table-striped table-bordered">';
				$table .='<thead>
							<th></th><th></th><th>Sl.</th><th>Itemcode</th><th>Description</th><th style="text-align:right">Rate</th><th style="text-align:right">Qty</th><th>UOM</th><th style="text-align:right">Tax</th><th style="text-align:right">Discount</th><th style="text-align:right">Total</th>
						</thead>';
						$totalqty = 0;
						$total = 0;
						$totaltax = 0;
						$totaldisc = 0;
						$table .='<tbody>';

						foreach($row as $key=>$val){
							$showurl = URL."sales/showsales/".$txnnum."/".$val['xrow'];
							$table .='<tr>';
							
							$table.='<td><a class="btn btn-info" id="btnshow" href="'.$showurl.'" role="button">Show</a></td>';
							if($delbtn!="")
								$table.='<td><a id="delbtn" class="btn btn-danger" href="'.$delbtn."/".$val['xrow'].'" role="button">Delete</a></td>';
							else
								$table.='<td></td>';

								$table .= "<td>".$val['xrow']."</td>";
								$table .= "<td>".$val['xitemcode']."</td>";
								$table .= "<td>".$val['xitemdesc']."</td>";
								$table .='<td align="right">'.$val['xrate'].'</td>';		
								$table .='<td align="right">'.$val['xqty'].'</td>';
								$table .='<td>'.$val['xunitsale'].'</td>';
								$table .='<td align="right">'.$val['xtaxtotal'].'</td>';
								$table .='<td align="right">'.$val['xdisctotal'].'</td>';
								$table .='<td align="right">'.$val['xsubtotal'].'</td>';
								$total+=$val['xsubtotal']+$val['xtaxtotal']-$val['xdisctotal'];
								$totalqty+=	$val['xqty'];
								$totaltax +=$val['xtaxtotal'];
								$totaldisc+= $val['xdisctotal'];
								
							$table .="</tr>";
						}
							$table .='<tr><td align="right" colspan="6"><strong>Total</strong></td><td align="right"><strong>'.$totalqty.'</strong></td><td></td><td align="right"><strong>'.$totaltax.'</strong></td><td align="right"><strong>'.$totaldisc.'</strong></td><td align="right"><strong>'.$total.'</strong></td></tr>';
							$net=0;
							if(!empty($row)){
								$table .='<tr><td align="right" colspan="10"><strong>Fixed Discount</strong></td><td align="right"><strong>'.$row[0]["xgrossdisc"].'</strong></td></tr>';
								
								$net = $total-$row[0]["xgrossdisc"];
							}
							$table .='<tr><td align="right" colspan="10"><strong>Net Total</strong></td><td align="right"><strong>'.$net.'</strong></td></tr>';
							 	
					$table .="</tbody>";			
			$table .= "</table>";
			
			return $table;
			/*$tblvalues = $this->model->getSales($sonum);
			$fields = array(
						"xrow-Sl",
						"xitemcode-Item Code",
						"xitemdesc-Description",
						"xqty-Quantity",
						"xrate-Rate",
						"xsalestotal-Total",
						"xtotaldisc-Total Discount"
						);
			$table = new Datatable();
			$row = $this->model->getsalesdt($sonum);
			
			$delbtn = "";
			if(count($tblvalues)>0){
			if($tblvalues[0]["xstatus"]=="Created")
				$delbtn = URL."sales/deletesales/".$sonum."/";
				
			}
			return $table->myTable($fields, $row, "xrow", URL."sales/showsales/".$sonum."/", $delbtn);
			*/
			
		}
		
		
		function solist($status){
			$rows = $this->model->getSalesList($status);
			$cols = array("xdate-Date","xsonum-Requisition No","xrdin-RIN","rinname-Name","xcusdoc-Requisition");
			$table = new Datatable();
			$this->view->table = $table->createTable($cols, $rows, "xsonum",URL."sales/showentry/");
			$this->view->renderpage('sales/solist', false);
		}
		//	$rows is the table data
		//	$formula is from glinterface xformula
		// 	$fd = fixed discount amount
		/*function getFormula($rows,$formula, $fd=0){
			


			$ta = array_sum(array_column($rows,"ta")); 

			$tt = array_sum(array_column($rows,"tt"));

			$id = array_sum(array_column($rows,"id"));

			
			$calstring = str_replace("ta", $ta, $formula);

			$calstring = str_replace("tt", $tt, $calstring); 

			$calstring = str_replace("id", $id, $calstring); 

			$calstring = str_replace("fd", $fd, $calstring); 
			
			$result = 0;
			
			$res = @eval('$result = (' . $calstring . ');'. "; return true;");

			if(!$res)
				eval( '$result = (' . $calstring . ');' );

			return $result;

		}*/

		function salesentry(){

		$btn = array(
			"Clear" => URL."sales/salesentry"
		);
			
					
			$dynamicForm = new Dynamicform("Sales Order",$btn);		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."sales/savesales", "Save",$this->values, URL."sales/showpost");
			
			
			$this->view->table = $this->renderTable("");
			
			$this->view->renderpage('sales/salesentry', false);
		}
		
		
		public function showpost(){
		//echo 123;die;
		$sonum = $_POST['xsonum'];
			
		$tblvalues=array();
		
		$btn = array(
			"New" => URL."sales/salesentry"
		);
		
		$tblvalues = $this->model->getSales($sonum);
		
		$conf="";
		$svbtn = "Save";
		$sv=URL."sales/savesales/";
		if(count($tblvalues)>0){	
			if($tblvalues[0]['xstatus']=="Created"){
				$conf=array(URL."sales/confirmpost", "Confirm");

			}		
			if($tblvalues[0]['xstatus']=="Confirmed"){
				$sv="";
				$conf=array(URL."sales/cancelpost", "Cancel");

				$milistone = $this->model->getsomilestone($sonum); 
				if(count($milistone)>0){
					if($milistone[0]['xdelcount']==0){
						//$sv=URL."sales/createdelivery";
						$sv="";
						$svbtn = "";	
					}
				}
			}		
		}	
		
		if(empty($tblvalues))
			$tblvalues=$this->values;
		else
			$tblvalues=array(
					"xdate"=>$tblvalues[0]['xdate'],
					"xsonum"=>$tblvalues[0]['xsonum'],
					"xquotnum"=>$tblvalues[0]['xquotnum'],
					"xcus"=>$tblvalues[0]['xcus'],
					"xcusbal"=>$tblvalues[0]['xcusbal'],
					"xrcvamt"=>$tblvalues[0]['xrcvamt'],
					"xorg"=>$tblvalues[0]['xorg'],
					"xnotes"=>$tblvalues[0]['xnotes'],
					"xwh"=>$tblvalues[0]['xwh'],
					"xgrossdisc"=>$tblvalues[0]['xgrossdisc'],
					"xitemcode"=>"",
					"xitemdesc"=>"",
					"xqty"=>"0",
					"xrow"=>"0",
					"xrate"=>"0",
					"xdiscpct"=>"0.000",
					"xdisc"=>"0.000"
					);
			
		
			
		// form data
			
			
			$dynamicForm = new Dynamicform("Sales Order", $btn,'<a style="color:red" id="invnum" href="'.URL.'sales/showinvoice/'.$sonum.'">Click To Print Invoice - '.$sonum.'</a><br>
			<a style="color:red" id="invnum" href="'.URL.'sales/showchalan/'.$sonum.'">Click To Print Chalan - '.$sonum.'</a>');		
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, $sv, $svbtn,$tblvalues, URL."sales/showpost",$conf);
			
			$this->view->table = $this->renderTable($sonum);
			
			$this->view->renderpage('sales/salesentry');
		}
		function showinvoice($txnnum=""){
			
			$values = $this->model->getvsalesdt($txnnum);
			//print_r($values);die;
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li>Sales Invoice</li>							
						   </ul>';
			
			$this->view->sono=$txnnum;
			$totqty = 0;			
			$xdate="";
			$xcus="";
			$xcusbal="";
			$xrcvamt="";
			$xorg="";
			$xadd="";
			$xmobile="";
			$grossdisc=0;
			
			$taxamt = 0;
			$discamt = 0;
			$total = 0;
			
			foreach($values as $key=>$val){
				$xdate=$val['xdate'];
				$xcus=$val['xcus'];
				$xcusbal=$val['xcusbal'];
				$xrcvamt=$val['xrcvamt'];
				$xorg=$val['xorg'];
				$xadd=$val['xadd'];
				$xmobile=$val['xmobile'];				
				$totqty+=$val['xqty'];
				$taxamt+=$val['xtaxtotal'];
				$discamt+=$val['xdisctotal'];
				$total +=($val['xqty']*$val['xrate'])+$val['xtaxtotal']-$val['xdisctotal'];
				$grossdisc=$val['xgrossdisc'];	
			}
			$this->view->xdate=$xdate;
			$this->view->cus=$xcus;
			$this->view->cusbal=$xcusbal;
			$this->view->rcvamt=$xrcvamt;
			$this->view->xorg=$xorg;
			$this->view->xadd=$xadd;
			$this->view->xmobile=$xmobile;
			$this->view->grossdisc=$grossdisc;
			$this->view->taxamt=$taxamt;
			$this->view->discamt=$discamt;
			$this->view->total=$total;
					
			$this->view->totqty=$totqty;
			
			
			$cur = new Currency();
			
			$this->view->vrow = $values;
			
			$this->view->vrptname = "Invoice/Bill";
			$this->view->org=Session::get('sbizlong');
			$this->view->add=Session::get('sbizadd');
			
			$this->view->renderpage('sales/printinvoice');		
		}
		/*function showinvoice_old($invoicenum=""){
			
			$tblvalues = $this->model->getSales($invoicenum);
			//print_r($tblvalues);die;
			$this->view->xdate = $tblvalues[0]["xdate"];
			$this->view->xorg = $tblvalues[0]["xorg"];
			$this->view->xref = $tblvalues[0]["xsonum"];
			$this->view->xaddress= $tblvalues[0]["xadd1"];
			$this->view->xphone = $tblvalues[0]["xphone"];
			$this->view->xnotes = $tblvalues[0]["xnotes"];
			$this->view->xgrossdisc = $tblvalues[0]["xgrossdisc"];
			
			$gtotal = 0;
			$gdisc =0;
			$detail = $this->model->getsalesdt($invoicenum); //print_r($detail); die;
			foreach($detail as $key=>$val){
				$gtotal += $val["xsalestotal"];
				$gdisc += $val["xtotaldisc"];
			}
			$this->view->xgrossdisc = $tblvalues[0]["xgrossdisc"]+$gdisc;
			$cur = new Currency();
			$netotal = $gtotal-$tblvalues[0]["xgrossdisc"]+$gdisc;
			
			$this->view->inword= $cur->get_bd_amount_in_text($netotal);
			$this->view->rows=$this->model->getsalesdt($invoicenum);
			
			$this->view->renderpage('sales/strategicinvoice');
		}
		*/
		function showchalan($invoicenum=""){
			
			$tblvalues = $this->model->getSales($invoicenum);
			//print_r($tblvalues);die;
			$this->view->xdate = $tblvalues[0]["xdate"];
			$this->view->xorg = $tblvalues[0]["xorg"];
			$this->view->xref = $tblvalues[0]["xsonum"];
			$this->view->xaddress= $tblvalues[0]["xadd1"];
			$this->view->xphone = $tblvalues[0]["xphone"];
			$this->view->xnotes = $tblvalues[0]["xnotes"];
			$this->view->xgrossdisc = $tblvalues[0]["xgrossdisc"];
			
			$gtotal = 0;
			$detail = $this->model->getsalesdt($invoicenum);
			foreach($detail as $key=>$val){
				$gtotal += $val["xsalestotal"];
			}
			$this->view->nettotal = $gtotal-$tblvalues[0]["xgrossdisc"];
			$this->view->rows=$this->model->getsalesdt($invoicenum);
			
			$this->view->renderpage('sales/chalan');
		}
		
		function confirmpost(){
				$voucher = "";
				$sonum = $_POST['xsonum'];
				$disc = $_POST['xgrossdisc'];
				$cus = $_POST['xcus'];	
				$yearoffset = Session::get('syearoffset');
				$result = "";
				$postdata=array(
					"xstatus" => "Confirmed",
					"xgrossdisc"=>$disc,
					"xvoucher"=>$voucher
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
						$voucher = $this->model->getKeyValue("glheader","xvoucher","SINV-","5");
						
						$data = array();
                        
						$data['bizid'] = Session::get('sbizid');
						$data['zemail'] = Session::get('suser');
						$data['xnarration'] = "C/S SO:".$sonum." Cus: ".$cus."-".$_POST["xorg"];
						$data['xyear'] = $xyear;
						$data['xper'] = $per;
						$data['xvoucher'] = $voucher;
						$data['xdate'] = $date;
						$data['xstatusjv'] = 'Confirmed';
						$data['xbranch'] = Session::get('sbranch');;
						$data['xdoctype'] = "Sales Voucher";
						$data['xdocnum'] = $sonum;
                        
						$cols = "`bizid`,`xvoucher`,`xrow`,`xacc`,`xacctype`,`xaccusage`,`xaccsource`,xaccsub,`xcur`,`xbase`,
							`xexch`,`xprime`,xflag";

						$vals = "";	
                        
						$i = 0;	
						
						$globalvar = new Globalvar();
						
						foreach($glinterface as $key=>$val){
							$i++; 
							$amt = $globalvar->getFormula($rows,$val["xformula"], $rows[0]['xgrossdisc'], $rows[0]['xrcvamt']);
							
							if($val['xaction']=="Credit")
								$amt = "-".$amt; 

							$acc = $this->model->getAcc($val['xacc']); 
							$subacc = "";
							if($acc[0]['xaccsource']=="Customer")
								$subacc = $rows[0]['xcus'];
							else
								$subacc = "";
							if($amt<>0)
								$vals .= "(" . Session::get('sbizid') . ",'". $voucher ."','". $i ."','". $val['xacc'] ."',
								'". $acc[0]['xacctype'] ."','". $acc[0]['xaccusage'] ."','". $acc[0]['xaccsource'] ."','". $subacc ."','".Session::get('sbizcur')."',
								'". $amt ."','1','". $amt ."','". $val['xaction'] ."'),";
						}

						$vals = rtrim($vals, ",");
                        
						$success = $this->model->confirmgl($data, $cols, $vals);

						$this->model->confirm($postdata,$where);

				}else{
					$this->model->confirm($postdata,$where);
				}
				
				$tblvalues=array();
				$tblvalues = $this->model->getSales($sonum);
				
				$result="Confirm Failed";
				
				if($tblvalues[0]['xstatus']=="Confirmed"){
					$result='Confirmed!<br/><a style="color:red" id="invnum" href="'.URL.'sales/showinvoice/'.$sonum.'">Click To Print Invoice - '.$sonum.'</a>';
				}
			}
				$this->showentry($sonum, $result);
		
		}

		function cancelpost(){
				$sonum = $_POST['xsonum'];
				$milistone = $this->model->getsomilestone($sonum); 
				if(count($milistone)>0){
					if($milistone[0]['xdelcount']<>0){
						$this->showentry($sonum, "Could not canceled! DO Created!");
						return;
					}
				}

				$voucher = "";
				
				$disc = $_POST['xgrossdisc'];
				$cus = $_POST['xcus'];	
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
						$voucher = $this->model->getKeyValue("glheader","xvoucher","SCNL-","5");
						
						$data = array();

						$data['bizid'] = Session::get('sbizid');
						$data['zemail'] = Session::get('suser');
						$data['xnarration'] = "C/S CSO:".$sonum." canceled by ". Session::get('suser') ."Cus: ".$cus."-".$_POST["xorg"];
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
							$amt = $globalvar->getFormula($rows,$val["xformula"], $rows[0]['xgrossdisc'], $rows[0]['xrcvamt']);
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
				
				$tblvalues=array();
				$tblvalues = $this->model->getSales($sonum);
				
				$result="Cancel Failed";
				
				if($tblvalues[0]['xstatus']=="Canceled"){
					$result='Canceled!<br/><a style="color:red" id="invnum" href="'.URL.'sales/showinvoice/'.$sonum.'">Click To Print Invoice - '.$sonum.'</a>';
				}
			}
				$this->showentry($sonum, $result);
		
		}

		function deletesales($sonum, $row){
			$tblvalues = $this->model->getSales($sonum);
			$result = "";
			if(count($tblvalues)>0){
			if($tblvalues[0]["xstatus"]=="Created")
				$result = $this->model->recdelete(" where xsonum='".$sonum."' and xrow=".$row);
			}
			$this->showentry($sonum, $result);
		}

		/*function createdelivery(){
			$sonum = $_POST['xsonum'];
			$yearoffset = Session::get('syearoffset');
			$dt = date("Y/m/d"); 
			$date = date('Y-m-d', strtotime($dt));
				$year = date('Y',strtotime($date));
				$month = date('m',strtotime($date)); 
			$xyear = 0;
			$per = 0;	
				foreach ($this->model->getYearPer($yearoffset,intval($month)) as $key=>$val){
					$per = $key;
					$xyear = $val;
				}	
				
			
			//$voucher = $this->model->getKeyValue("imreqdelmst","xvoucher","SINV".Session::get('suserrow')."-","6");
			$keyfieldval = $this->model->getKeyValue("imreqdelmst","xreqdelnum","SODO","6");
			$tblvalues = $this->model->getSales($sonum);
			$detail = $this->model->getvsalesdt($sonum);
			$data = array();
			$data['bizid']=Session::get('sbizid');
			$data['xreqdelnum']=$keyfieldval;			
			$data['xwh']=$tblvalues[0]['xwh'];
			$data['xbranch']=Session::get('sbranch');
			$data['xproj']=Session::get('sbranch');
			$data['xstatus']="Created";
			$data['xdate']=$date;
			$data['xsalesdate']=$tblvalues[0]['xdate'];
			$data['zemail']=Session::get('suser');
			$data['xcus']=$tblvalues[0]['xcus'];
			//$data['xnotes']=$tblvalues[0]['xnotes'];
			$data['xsonum']=$tblvalues[0]['xsonum'];
			$data['xgrossdisc']=$tblvalues[0]['xgrossdisc'];
			$data['xfinyear']=$xyear;
			$data['xfinper']=$per;
			
			
			
			$cols = "`bizid`,`xreqdelnum`,`xsonum`,`xrowtrn`,`xrow`,`xitemcode`,`xitembatch`,`xqty`,`xdate`,`xrate`,`xratepur`,`xwh`,`xbranch`,`xproj`,`xtaxrate`,`xdisc`,`xexch`,`xcur`,`xtaxcode`,`xtaxscope`,`zemail`,`xunit`,`xcus`,`xstdcost`,`xtypestk`";
			
			$vals =	"";
			$i=0; //print_r($detail); die;
			foreach($detail as $key=>$value){
			$itemcost = $this->model->getItemcost($value['xitemcode']);
				

				$cost = 0;
				
				if(!empty($itemcost)){
					
					$cost = $itemcost[0]['avgcost'];
				}	
			$i++;	
				
				$vals .= "(" . Session::get('sbizid') . ",'". $keyfieldval ."','". $value['xsonum'] ."',". $value['xrow'] .",". $i .",'". $value['xitemcode'] ."','". $value['xitemcode'] ."',
				'". $value['xqty'] ."','". $date ."','". $value['xrate'] ."','0','". $value['xwh'] ."','". Session::get('sbranch') ."','". Session::get('sbranch') ."','". $value['xtaxrate'] ."','". $value['xdisc'] ."',". $value['xexch'] .",'". $value['xcur'] ."','". $value['xtaxcode'] ."','". $value['xtaxscope'] ."','".$value['zemail']."','". $value['xunitsale'] ."','". $value['xcus'] ."',".$cost.",'". $value['xtypestk'] ."'),";
				
			}
			
			$vals = rtrim($vals,",");
			
			$success = 0;
			
			$result = "";
			try{
			
			$success=$this->model->savedelivery($data,$cols,$vals);
			
			}catch(Exception $e){
				$$this->result = $e->getMessage();
			}
			if($success>0)
					$this->result = 'Delivery Order Created</br><a style="color:red" id="invnum" href="'.URL.'imreqdo/printdo/'.$keyfieldval.'">Print Delivery Order - '.$keyfieldval.'</a></br><a style="color:red" id="invnum" href="'.URL.'imreqdo/printchalan/'.$keyfieldval.'">Print Delivery Chalan - '.$keyfieldval.'</a>';
				
			if($success == 0 && empty($this->result))
				$this->result = "Failed to Create Sales Order! Reason: Could be Duplicate Account Code or system error!";
			
			header ('location: '.URL.'imreqdo/showdoentry/'.$keyfieldval);
		}*/
}