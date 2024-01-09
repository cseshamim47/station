<?php
class Alltadarpt extends Controller{
	
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
				if($menus["xsubmenu"]=="All TA/DA Reports")
					$iscode=1;				
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
			
		$this->view->js = array('public/js/datatable.js','views/glrpt/js/getaccdt.js');
								
		}
		
		public function index(){
			$this->view->rendermainmenu('alltadarpt/index');
		}
		
		
		
		function porptmenu(){
			
			$menuarr = array(
			0 => array("Date wise TA/DA"=>URL."alltadarpt/datewisebill","Project wise TA/DA"=>URL."alltadarpt/prowisebill"),
			
			);
			$menutable='<table class="table" style="width:100%"><tbody>';
			foreach($menuarr as $key=>$value){
				$menutable.='<tr>';
					foreach($value as $k=>$val){
						$menutable.='<td><a style="width:100%" class="btn btn-info" href="'.$val.'" role="button"><span class="glyphicon glyphicon-open-file"></span>&nbsp;'.$k.'</a></td>';
					}
				$menutable.='</tr>';
				
			}
			
			$menutable.='</tbody></table>';
			$this->view->table = $menutable;
			$this->view->renderpage('alltadarpt/porptmenu', false);
		}
		
		
		function doubleGroupTable($cols, $rows, $groupval=array(), $totalfield=array()){
		
			$row = $rows;
			$cl = count($cols);
			$val1="";
			$val2="";
			if(count($groupval)>0 && count($groupval)<3){
				$val1=$groupval[0];
				$val2=$groupval[1];
			}
			$grouprec = [];
			$sgrouprec = [];
			foreach($row as $gkey=>$gval){
				$keyval = $gval[$val1];
				$grouprec[$keyval][]=$gval;
				foreach ($grouprec[$keyval] as $skey=>$sval){
								$skeyval = $sval[$val2];
								$sgrouprec[$keyval][$skeyval]= $sval;
							}
			}
			
												
			$table = '';
			$total=0;
			
			$table.= '<table id="grouptable" class="table table-bordered table-striped" style="width:100%">';	
				$table.= '<thead>';
				foreach ($cols as $col){
					$table.= '<th>'.$col.'</th>';
				}
				$table.= '</thead>';
				$table.= '<tbody>';
					foreach($sgrouprec as $key=>$sval ){
						$subtotal=0; //print_r($sval[]); die;
						$table.= '<tr rowspan="'.count($cols).'">';
							$table.= '<td><strong>'. $key .'</strong></td>';
							for ($i=0; $i<count($cols)-1; $i++){
								$table.= '<td></td>';
							}
						$table.= '</tr>';
						
							foreach($sval as $sk=>$val ){
							$subtotal=0;
							$table.= '<tr rowspan="'.count($cols).'">';
								$table.= '<td></td><td><strong>'. $sk .'</strong></td>';
								for ($i=0; $i<count($cols)-2; $i++){
									$table.= '<td></td>';
								}
							$table.= '</tr>';
							$table.= '<tr><td></td><td></td>';
							foreach($val as $k=>$v ){
									
									if ($k <> $val1 && $k <> $val2){
										$alin = "";
										if($k=="xqty")
											$alin = 'style="background-color:gray; text-align:center; color:white;"';
										
										$table.= '<td '.$alin.'>'. $v .'</td>';
									}
								
							}
							$table.= '</tr>';
					}
					}
				$table.= '</tbody></table>';
				
			
			return $table;
			
		}

		

		function datewisebill(){
			//echo "dddd";die;
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'alltadarpt/porptmenu">TA/DA Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."alltadarpt/datewisebill",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				//"xgitem"=>""
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								//"xgitem-select_Item Group"=>'Type*~star_maxlength="50"'
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."alltadarpt/showdatewisebill", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('alltadarpt/porptfilter', false);
		
		}

		public function showdatewisebill(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'alltadarpt/porptmenu">TA/DA Reports</a></li>
							<li><a href="'.URL.'alltadarpt/datewisebill">Report Filter Form</a></li>
							<li class="active">TA/DA List</li>
						   </ul>';
		
						
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));

			//$xgitem = $_POST['xgitem'];
				
			$tblvalues=array();			
			
				$tblvalues = $this->model->datewisebill($fdate, $tdate);
				//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Date wise TA/DA";
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array("0"=>"Date","1"=>"Description",2=>"By",3=>"Day",4=>"Person",5=>"Amount"),
				"groupfield"=>"Txn No~xtxnnum",
				"grouprecords"=>array("Date~mstdate","Name~xsup","Project~xproject","Submit By~zemail"), //database records columns to show in group
				"detailsection"=>array("xdate","xdesc","xby~center","xday~center","xperson~center","xamount~center"),
				//"buttons"=>array("Show"=>URL."test/","Delete"=>URL."test/"),
				//"urlvals"=>array("id","phone"),
				"sumfields"=>array("xqty","xamount"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('alltadarpt/reportpage');
		}
		
		function prowisebill(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'alltadarpt/porptmenu">TA/DA Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."alltadarpt/prowisebill",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xproject"=>""
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xproject-select_Project"=>'Project*~star_maxlength="50"'
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."alltadarpt/showprowisebill", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('alltadarpt/porptfilter', false);
		
		}

		public function showprowisebill(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'alltadarpt/porptmenu">TA/DA Reports</a></li>
							<li><a href="'.URL.'alltadarpt/prowisebill">Report Filter Form</a></li>
							<li class="active">TA/DA List</li>
						   </ul>';
		
						
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));

			$xproject = $_POST['xproject'];
				
			$tblvalues=array();			
			
				$tblvalues = $this->model->proWiseBill($fdate, $tdate, $xproject);
				//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Project wise TA/DA";
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array(0=>"Txn No","1"=>"Name","2"=>"Date","3"=>"Description",4=>"By",5=>"Day",6=>"Person",7=>"Amount",8=>"Submit By"),
				"groupfield"=>"Project~xproject",
				"grouprecords"=>array(), //database records columns to show in group
				"detailsection"=>array("xtxnnum","xsup","xdate","xdesc","xby~center","xday~center","xperson~center","xamount~center","zemail~left"),
				//"buttons"=>array("Show"=>URL."test/","Delete"=>URL."test/"),
				//"urlvals"=>array("id","phone"),
				"sumfields"=>array("xamount"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('alltadarpt/reportpage');
		}

		
		function catwisebill(){
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'alltadarpt/porptmenu">TA/DA Reports</a></li>
							<li class="active">Report Filter</li>
						   </ul>';
			$btn = array(
				"Clear" => URL."alltadarpt/catwisebill",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xfdate"=>$dt,
				"xtdate"=>$dt,
				"xcat"=>""
				);
				
				$fields = array(array(
								"xfdate-datepicker" => 'From_""',
								"xtdate-datepicker" => 'To_""',
								"xcat-select_Bill Category"=>'Category*~star_maxlength="50"'
								)
							);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."alltadarpt/showcatwisebill", "Show Report",$values);
				
				$this->view->table = "";
				
				$this->view->renderpage('alltadarpt/porptfilter', false);
		
		}

		public function showcatwisebill(){
		
			$this->view->breadcrumb = '<ul class="breadcrumb">
							<li><a href="'.URL.'alltadarpt/porptmenu">TA/DA Reports</a></li>
							<li><a href="'.URL.'alltadarpt/catwisebill">Report Filter Form</a></li>
							<li class="active">TA/DA List</li>
						   </ul>';
		
						
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
			
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));

			$xcat = $_POST['xcat'];
				
			$tblvalues=array();			
			
				$tblvalues = $this->model->catWiseBill($fdate, $tdate, $xcat);
				//print_r($tblvalues);die;
			
			$this->view->vfdate = $fdt;
			$this->view->vtdate = $tdt;
			$this->view->vrptname = "Category wise TA/DA";
			$this->view->org=Session::get('sbizlong');
			$tblsettings = array(
				"columns"=>array(0=>"Txn No","1"=>"Name","2"=>"Project","3"=>"Date","4"=>"Description",5=>"Quality",6=>"Price",7=>"Quentity",8=>"Amount",9=>"Remarks"),
				"groupfield"=>"Category~xcat",
				"grouprecords"=>array(), //database records columns to show in group
				"detailsection"=>array("xtxnnum","xsup","xproject","xdate","xdesc","xquality~center","xprice~center","xqty~center","xtotal~center","xremarks~center"),
				//"buttons"=>array("Show"=>URL."test/","Delete"=>URL."test/"),
				//"urlvals"=>array("id","phone"),
				"sumfields"=>array("xqty","xtotal"),
				);
			$table = new ReportingTable();
			$this->view->table = $table->SingleGroupReportingtbl($tblsettings, $tblvalues);
				
			$this->view->renderpage('alltadarpt/reportpage');
		}

		


		
	}