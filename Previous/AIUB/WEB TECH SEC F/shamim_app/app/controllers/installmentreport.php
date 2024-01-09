<?php 
class Installmentreport extends Controller{
	
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
				if($menus["xsubmenu"]=="Installment Reports")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/distreg/js/codevalidator.js','views/glrpt/js/getaccdt.js');
								
		}
		
		public function index(){
					
			
			$this->view->rendermainmenu('installmentreport/index');
			
		}
		
		
		
		function glrptmenu(){
			
			$menuarr = array(
			
			0 => array("Installment Schedule"=>URL."installmentreport/cusinstallment","Installment collection Report"=>URL."installmentreport/inscollrpt"),
			//"Salesman Target collection"=>URL."installmentreport/salesmantarcol"
			1 => array("Commission Schedule"=>URL."installmentreport/commshedule","Commission Paid Report"=>URL."installmentreport/commpaid")
			);
			$menutable='<div class="table-responsive"><table class="table" style="width:100%"><tbody>';
			foreach($menuarr as $key=>$value){
				$menutable.='<tr>';
					foreach($value as $k=>$val){
						$menutable.='<td><a style="width:100%" class="btn btn-info" href="'.$val.'" role="button"><span class="glyphicon glyphicon-open-file"></span>&nbsp;'.$k.'</a></td>';
					}
				$menutable.='</tr>';
				
			}
			$menutable.='</tbody></table></div>';
			$this->view->table = $menutable;
			$this->view->renderpage('installmentreport/glrptmenu', false);
		}


		function cusinstallment(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'installmentreport/glrptmenu">Installment Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."installmentreport/cusinstallment",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xcus"=>"",
				"xorg"=>"",
				);
				
				$fields = array(
								array(	
									"xfdate-datepicker" => 'From Date_""',
									"xtdate-datepicker" => ' To Date_""',							
									"xcus-group_".URL."jsondata/customerpicklist"=>'Customer Code_maxlength="20"'
								)
							);
				
				$dynamicForm = new Dynamicform("Customer Balance Report Filter",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."installmentreport/shocusinstallment", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('installmentreport/glrptfilter', false);
		
		}

		function shocusinstallment(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'installmentreport/glrptmenu">Installment Reports</a></li>
							<li><a href="'.URL.'installmentreport/cusinstallment">Report Filter</a></li>
							<li class="active">Installment Schedule</li>
						   </ul>';
			

			$xfdate = $_POST['xfdate'];			
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));


			$xagent = "";
			if(isset($_POST['xagent']))
				$xagent = $_POST['xagent'];

			$totalpoint = "";			
			$this->view->vfdate = $xfdate;
			$this->view->vtdate = $xtdate;
			$this->view->tabletitle = "Name : ".$xagent;
			$this->view->vrptname = "Customer Installment Schedule Report </br>";
			$this->view->org=Session::get('sbizlong');
			$this->view->add1="20/4 Shyama Prosad Chowdhury Lane, Laxmi Bazar, Dhaka-1100.";
			$this->view->table = $this->instable($fdate,$tdate,$xagent);
				
			$this->view->renderpage('installmentreport/reportpage');
		
		}

		public function instable($fdate,$tdate,$xagent){
		$table="";
		$insdt = $this->model->getinsdetail($fdate,$tdate,$xagent);

		
		$table.= '<div class=""><table id="grouptable" border="1" class="table table-bordered table-striped">';
			$table.='<thead>';
				$table.='<tr>';
					$table.='<td><strong>Installment No</strong></td><td><strong>Customer Code</strong></td><td><strong>Name</strong></td><td><strong>Address</strong></td><td><strong>Mobile</strong></td><td><strong>Amount</strong></td>';
				$table.='</tr>';
				$table.='</thead>';
				$table.='<tbody>';
					$table.='<tr>';
					$total=0;
					foreach ($insdt as $key => $value) {
						
						$table.='<td>'.$value['xinsnum'].'</td>';
						$table.='<td>'.$value['xcus'].'</td>';
						$table.='<td>'.$value['xorg'].'</td>';
						$table.='<td>'.$value['xadd1'].'</td>';
						$table.='<td>'.$value['xmobile'].'</td>';
						$table.='<td>'.$value['xamount'].'</td>';
					
						
					$table.='</tr>';
					$total += $value['xamount'];
				}
					$table.='<tr>';
						$table.='<td><strong>Total</strong></td><td></td><td></td><td></td><td></td>';
						$table.='<td>'.$total.'</td>';
					$table.='</tr>';


				$table.='</tbody>';
				$table.='</table></div';
				return  $table;	
		}

		function inscollrpt(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'installmentreport/glrptmenu">Installment Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."installmentreport/inscollrpt",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				);
				
				$fields = array(
								array(	
									"xfdate-datepicker" => 'From Date_""',
									"xtdate-datepicker" => ' To Date_""'
								)
							);
				
				$dynamicForm = new Dynamicform("Installment Collection Report Filter",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."installmentreport/showinscollrpt", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('installmentreport/glrptfilter', false);
		
		}

		function showinscollrpt(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'installmentreport/glrptmenu">Installment Reports</a></li>
							<li><a href="'.URL.'installmentreport/inscollrpt">Report Filter</a></li>
							<li class="active">Installment Collection Report</li>
						   </ul>';
			

			$xfdate = $_POST['xfdate'];			
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));


			$totalpoint = "";			
			$this->view->vfdate = $xfdate;
			$this->view->vtdate = $xtdate;
			$this->view->tabletitle = "";
			$this->view->vrptname = "Installment Collection Report </br>";
			$this->view->org=Session::get('sbizlong');
			$this->view->add1="20/4 Shyama Prosad Chowdhury Lane, Laxmi Bazar, Dhaka-1100.";
			$this->view->table = $this->inscolltable($fdate,$tdate);
				
			$this->view->renderpage('installmentreport/reportpage');
		
		}

		public function inscolltable($fdate,$tdate){
		$table="";
		$insdt = $this->model->getinscolldetail($fdate,$tdate);
		//print_r($insdt);die;
		
		$table.= '<div class=""><table id="grouptable" border="1" class="table table-bordered table-striped">';
			$table.='<thead>';
				$table.='<tr>';
					$table.='<td><strong>Date</strong></td><td><strong>Installment No</strong></td><td><strong>Customer Code</strong></td><td><strong>Name</strong></td><td><strong>Address</strong></td><td><strong>Mobile</strong></td><td><strong>Amount</strong></td>';
				$table.='</tr>';
				$table.='</thead>';
				$table.='<tbody>';
					$table.='<tr>';
					$total=0;
					foreach ($insdt as $key => $value) {
						
						$table.='<td>'.$value['xdate'].'</td>';
						$table.='<td>'.$value['xinsnum'].'</td>';
						$table.='<td>'.$value['xcus'].'</td>';
						$table.='<td>'.$value['xshort'].'</td>';
						$table.='<td>'.$value['xadd1'].'</td>';
						$table.='<td>'.$value['xmobile'].'</td>';
						$table.='<td align="right">'.number_format(floatval($value['xamount']), 2, '.', '').'</td>';
					
						
					$table.='</tr>';
					$total += $value['xamount'];
				}
					$table.='<tr>';
						$table.='<td><strong>Total</strong></td><td></td><td></td><td></td><td></td><td></td>';
						$table.='<td align="right"><strong>'.number_format(floatval($total), 2, '.', '').'</strong></td>';
					$table.='</tr>';


				$table.='</tbody>';
				$table.='</table></div';
				return  $table;	
		}

		function salesmantarcol(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'installmentreport/glrptmenu">GL Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."installmentreport/salesmantarcol",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xagent"=>""	
				);
				
				$fields = array(
								array(	
									"xfdate-datepicker" => 'From Date_""',
									"xtdate-datepicker" => ' To Date_""',							
									"xagent-select_Salesman"=>'Salesman_""'
								)
							);
				
				$dynamicForm = new Dynamicform("Customer Balance Report Filter",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."installmentreport/shosalesmantarcol", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('installmentreport/glrptfilter', false);
		
		}

		function shosalesmantarcol(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'installmentreport/glrptmenu">GL Reports</a></li>
							<li><a href="'.URL.'installmentreport/salesmantarcol">Report Filter</a></li>
							<li class="active">Salesman Target Collection</li>
						   </ul>';

			$xfdate = $_POST['xfdate'];			
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			$ffdate = date('d-F-Y', strtotime($fdate));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
			$ttdate = date('d-F-Y', strtotime($tdate));

			$xagent = "";
			if(isset($_POST['xagent']))
				$xagent = $_POST['xagent'];

			$totalpoint = "";			
			$this->view->vfdate = $ffdate;
			$this->view->vtdate = $ttdate;
			$this->view->tabletitle = "Name : ".$xagent;
			$this->view->vrptname = "Salesman Target Collection Report </br>";
			$this->view->org=Session::get('sbizlong');
			$this->view->table = $this->tartable($xagent, $fdate, $tdate);
				
			$this->view->renderpage('installmentreport/reportpage');
		
		}

		public function tartable($xagent, $fdate, $tdate){
		$table="";
			$row = $this->model->salesbybrand($xagent, $fdate, $tdate);
			//print_r($row);die;
			$cusareabal = $this->model->salescusareabal($xagent, $fdate)[0]['xbal'];
			$salcolbal = $this->model->salesmancolbal($xagent, $fdate, $tdate)[0]['xbal'];
			$saltarbal = $this->model->salesmantarbal($xagent, $fdate, $tdate)[0]['xamount'];
			$saltarpre = $this->model->salesmantarbal($xagent, $fdate, $tdate)[0]['xprecement'];
			$saltarrod = $this->model->salesmantarbal($xagent, $fdate, $tdate)[0]['xrod'];
			$saltarsc = $this->model->salesmantarbal($xagent, $fdate, $tdate)[0]['xscancement'];

		
		$table.= '<div class=""><table id="grouptable" border="1" class="table table-bordered table-striped">';
			$table.='<thead>';
				$table.='<tr>';
					$table.='<td><strong>Item</strong></td><td><strong>Target Qty</strong></td><td><strong>Unit</strong></td><td><strong>Sales Qty</strong></td><td><strong>Unit</strong></td><td><strong>Sales Amount</strong></td><td><strong>Sale Percent (%)</strong></td>';
				$table.='</tr>';
				$table.='</thead>';
				$table.='<tbody>';
					$table.='<tr>';
					$total=0;
					foreach ($row as $key => $value) {
						
						$table.='<td>'.$value['xbrand'].'</td>';
						if ($value['xbrand']=='Premier Cement') {
							
						$table.='<td>'.$saltarpre.'</td>';
						$table.='<td>'.$value['xunitsale'].'</td>';
						
						}
						if ($value['xbrand']=='Rod') {
							
						$table.='<td>'.$saltarrod.'</td>';
						$table.='<td>'.$value['xunitsale'].'</td>';
						}
						if ($value['xbrand']=='Scan Cement') {
							
						$table.='<td>'.$saltarsc.'</td>';
						$table.='<td>'.$value['xunitsale'].'</td>';
						}
						$table.='<td>'.$value['xqty'].'</td>';
						$table.='<td>'.$value['xunitsale'].'</td>';
						$table.='<td>'.$value['xbal'].'</td>';

						if ($value['xbrand']=='Premier Cement') {
							$aa='0.00';
							if ($saltarpre!="") {
								$aa=round($value['xqty']*100/$saltarpre,2);
							}
						$table.='<td>'.$aa.'%'.'</td>';
						}
						if ($value['xbrand']=='Rod') {
							$bb='0.00';
							if ($saltarrod!="") {
								$bb=round($value['xqty']*100/$saltarrod,2);
							}
						$table.='<td>'.$bb.'%'.'</td>';
						}
						if ($value['xbrand']=='Scan Cement') {
							$cc='0.00';
							if ($saltarsc!="") {
								$cc=round($value['xqty']*100/$saltarsc,2);
							}
						$table.='<td>'.$cc.'%'.'</td>';
						}
						
						//$table.='<td>'.$value['xmobile'].'</td>';
						//$table.='<td>'.$value['xamount'].'</td>';
					
						
					$table.='</tr>';
					$total += $value['xbal'];
				}
					$table.='<tr>';
						$table.='<td><strong>Total</strong></td><td></td><td></td><td></td><td></td><td></td>';
						$table.='<td><strong>'.$total.'</strong></td>';
					$table.='</tr>';
					$table.='<tr>';
						$table.='<td><strong>Previous Due</strong></td><td></td><td></td><td></td><td></td><td></td>';
						$table.='<td><strong>'.$cusareabal.'</strong></td>';
					$table.='</tr>';
					$table.='<tr>';
						$table.='<td><strong>Target Amount</strong></td><td></td><td></td><td></td><td></td><td></td>';
						$table.='<td><strong>'.$saltarbal.'</strong></td>';
					$table.='</tr>';
					$table.='<tr>';
						$table.='<td><strong>Collection Amount</strong></td><td></td><td></td><td></td><td></td><td></td>';
						$table.='<td><strong>'.$salcolbal.'</strong></td>';
					$table.='</tr>';
					$perc="";
					if ($saltarbal!="" && $salcolbal!="") {
						$perc = $salcolbal*100/$saltarbal;
					}
					$table.='<tr>';
						$table.='<td><strong>Collection Percent (%)</strong></td><td></td><td></td><td></td><td></td><td></td>';
						$table.='<td><strong>'.round($perc,2).'%'.'</strong></td>';
					$table.='</tr>';


				$table.='</tbody>';
				$table.='</table></div';
				return  $table;	
		}

		function commshedule(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'installmentreport/glrptmenu">Commission Schedule Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."installmentreport/commshedule",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xagent"=>"",
				"xcomtype"=>""	
				);
				
				$fields = array(
								array(	
									"xfdate-datepicker" => 'From Date_""',
									"xtdate-datepicker" => ' To Date_""',							
									"xagent-group_".URL."agent/picklist"=>'Agent_maxlength="20"',
									"xcomtype-select_Commission Type"=>'Commission Type_""'
								)
							);
				
				$dynamicForm = new Dynamicform("Commission Schedule Report Filter",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."installmentreport/shocommshedule", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('installmentreport/glrptfilter', false);
		
		}

		function shocommshedule(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'installmentreport/glrptmenu">Commission Reports</a></li>
							<li><a href="'.URL.'installmentreport/commshedule">Report Filter</a></li>
							<li class="active">Installment Schedule</li>
						   </ul>';
			

			$xfdate = $_POST['xfdate'];			
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));


			$xagent = "";
			$xcomtype = "";
			if(isset($_POST['xagent']))
				$xagent = $_POST['xagent'];
			if(isset($_POST['xcomtype']))
				$xcomtype = $_POST['xcomtype'];
			$agentdt = $this->model->getagentdt($xagent);
			$totalpoint = "";			
			$this->view->vfdate = $xfdate;
			$this->view->vtdate = $xtdate;
			if ($xagent=="") {
			$this->view->tabletitle = "";
			}else{
			$this->view->tabletitle = "Agent No : ".$xagent.", Name : ".$agentdt[0]['xshort'];
			}
			
			if ($xcomtype=="") {
			$this->view->vrptname ="All Commission Schedule Report </br>";
			}else{
			$this->view->vrptname =$xcomtype." Schedule";
			}
			$this->view->org=Session::get('sbizlong');
			$this->view->add1="20/4 Shyama Prosad Chowdhury Lane, Laxmi Bazar, Dhaka-1100.";
			$this->view->table = $this->comtable($fdate,$tdate,$xagent,$xcomtype);
				
			$this->view->renderpage('installmentreport/reportpage');
		
		}
		public function comtable($fdate,$tdate,$xagent,$xcomtype){
		$table="";
		$insdt = $this->model->getcomdetail($fdate,$tdate,$xagent,$xcomtype);

		
		$table.= '<div class=""><table id="grouptable" border="1" class="table table-bordered table-striped">';
			$table.='<thead>';
				$table.='<tr>';
					$table.='<td><strong>Date</strong></td>';
					if($xagent=="" && ($xcomtype=='Installment Commission' || $xcomtype=="")){
					$table.='<td><strong>Agent No</strong></td><td><strong>Agent Name</strong></td>';
					}
					$table.='<td><strong>Customer No</strong></td><td><strong>Customer Name</strong></td>';


					if($xcomtype==""){
					$table.='<td><strong>Com. Type</strong></td>';
					}
					if($xcomtype=='Installment Commission' || $xcomtype==""){
					$table.='<td><strong>Ins. Amount</strong></td>';
					}else{
					$table.='<td><strong>Payment Amount</strong></td>';
					}
					if($xcomtype=='Installment Commission' || $xcomtype==""){
					$table.='<td><strong>Com.(%)</strong></td>';
					}
				$table.='<td><strong>Com. Amount</strong></td>';
				$table.='</tr>';
				$table.='</thead>';
				$table.='<tbody>';
					$table.='<tr>';
					$total=0;
					foreach ($insdt as $key => $value) {
						
						$table.='<td>'.$value['xdate'].'</td>';
						if($xagent=="" && ($xcomtype=='Installment Commission' || $xcomtype=="")){
						$table.='<td>'.$value['xagent'].'</td>';
						$table.='<td>'.$value['xshort'].'</td>';
						}
						$table.='<td>'.$value['xcus'].'</td>';
						$table.='<td>'.$value['xcusname'].'</td>';
						if($xcomtype==""){
						$table.='<td>'.$value['xcomtype'].'</td>';
						}
						$table.='<td>'.number_format(floatval($value['xinsamt']), 2, '.', '').'</td>';
						if($xcomtype=='Installment Commission' || $xcomtype==""){
						$table.='<td>'.$value['xagentcom'].'%</td>';
						}
						$table.='<td>'.number_format(floatval($value['xcomamt']), 2, '.', '').'</td>';
					
						
					$table.='</tr>';
					$total += $value['xcomamt'];
				}
					$table.='<tr>';
						$table.='<td><strong>Total</strong></td><td></td><td></td><td></td>';
						if($xagent=="" && ($xcomtype=='Installment Commission' || $xcomtype=="")){
						$table.='<td></td><td></td>';
						}
						if($xcomtype==""){
						$table.='<td></td>';
						}
						if($xcomtype=='Installment Commission' || $xcomtype==""){
						$table.='<td></td>';
						}
						$table.='<td><strong>'.number_format(floatval($total), 2, '.', '').'</strong></td>';
					$table.='</tr>';


				$table.='</tbody>';
				$table.='</table></div';
				return  $table;	
		}

				function commpaid(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'installmentreport/glrptmenu">Commission Paid Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."installmentreport/commpaid",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xagent"=>"",
				"xcomtype"=>""	
				);
				
				$fields = array(
								array(	
									"xfdate-datepicker" => 'From Date_""',
									"xtdate-datepicker" => ' To Date_""',							
									"xagent-group_".URL."agent/picklist"=>'Agent_maxlength="20"',
									"xcomtype-select_Commission Type"=>'Commission Type_""'
								)
							);
				
				$dynamicForm = new Dynamicform("Commission Paid Report Filter",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."installmentreport/shocommpaid", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('installmentreport/glrptfilter', false);
		
		}

		function shocommpaid(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'installmentreport/glrptmenu">Commission Reports</a></li>
							<li><a href="'.URL.'installmentreport/commpaid">Report Filter</a></li>
							<li class="active">Installment Schedule</li>
						   </ul>';
			

			$xfdate = $_POST['xfdate'];			
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));


			$xagent = "";
			$xcomtype = "";
			if(isset($_POST['xagent']))
				$xagent = $_POST['xagent'];
			if(isset($_POST['xcomtype']))
				$xcomtype = $_POST['xcomtype'];

			$totalpoint = "";			
			$this->view->vfdate = $xfdate;
			$this->view->vtdate = $xtdate;
			if ($xagent=="") {
			$this->view->tabletitle = "";
			}else{
			$this->view->tabletitle = "Agent : ".$xagent;
			}
			
			if ($xcomtype=="") {
			$this->view->vrptname ="All Commission Paid Report </br>";
			}else{
			$this->view->vrptname =$xcomtype." Paid Report";
			}
			$this->view->org=Session::get('sbizlong');
			$this->view->add1="20/4 Shyama Prosad Chowdhury Lane, Laxmi Bazar, Dhaka-1100.";
			$this->view->table = $this->compaidtable($fdate,$tdate,$xagent,$xcomtype);
				
			$this->view->renderpage('installmentreport/reportpage');
		
		}
		public function compaidtable($fdate,$tdate,$xagent,$xcomtype){
		$table="";
		$insdt = $this->model->getcompaiddetail($fdate,$tdate,$xagent,$xcomtype);

		
		$table.= '<div class=""><table id="grouptable" border="1" class="table table-bordered table-striped">';
			$table.='<thead>';
				$table.='<tr>';
					$table.='<td><strong>Date</strong></td><td><strong>Agent No</strong></td><td><strong>Agent Name</strong></td><td><strong>Amount</strong></td>';
				$table.='</tr>';
				$table.='</thead>';
				$table.='<tbody>';
					$table.='<tr>';
					$total=0;
					foreach ($insdt as $key => $value) {
						
						$table.='<td>'.$value['xdate'].'</td>';
						$table.='<td>'.$value['xagent'].'</td>';
						$table.='<td>'.$value['xshort'].'</td>';
						$table.='<td>'.$value['xamount'].'</td>';
					
						
					$table.='</tr>';
					$total += $value['xamount'];
				}
					$table.='<tr>';
						$table.='<td><strong>Total</strong></td><td></td><td></td>';
						$table.='<td>'.$total.'</td>';
					$table.='</tr>';


				$table.='</tbody>';
				$table.='</table></div';
				return  $table;	
		}
		
	
	}