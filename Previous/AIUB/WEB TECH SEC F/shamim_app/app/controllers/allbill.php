<?php
class Allbill extends Controller{
	
	private $values = array();
	private $fields = array();
	private $valuesdt = array();
	private $fieldsdt = array();
	
	
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
				if($menus["xsubmenu"]=="All Bill")
					$iscode=1;							
		}

		if($iscode==0)
			header('location: '.URL.'mainmenu');
		
		
			
		$this->view->js = array('public/js/datatable.js');
		
		
	}
		
	public function index($flag=""){
		
		// $this->view->flag=$flag;
		
		$this->view->rendermainmenu('allbill/index');	
	}

	function datewisepo(){
		$dt = date("Y-m-d");
		$xcat = "";
		$fdate = $dt;
		$tdate = $dt;
		if(isset($_POST["xcat"]))
			$xcat=$_POST["xcat"];

		if(isset($_POST["xfdate"])){
			$xfdate = $_POST['xfdate'];
			$fdt = str_replace('/', '-', $xfdate);
			$fdate = date('Y-m-d', strtotime($fdt));
		}
		if(isset($_POST["xtdate"])){
			$xtdate = $_POST['xtdate'];
			$tdt = str_replace('/', '-', $xtdate);
			$tdate = date('Y-m-d', strtotime($tdt));
		}
		$this->view->breadcrumb = '';
		$btn = array(
			"Clear" => URL."allbill/datewisepo",
		);	
		
		$values = array(
			"xfdate"=>$fdate,
			"xtdate"=>$tdate,
			"xcat"=>$xcat
			);
			
			$fields = array(
					array(
						"xfdate-datepicker" => 'From_""',
						"xtdate-datepicker" => 'To_""',
						"xcat-select_Approval Status"=>'Status_maxlength="50"'
						)
					);
		
			$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
			
			$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."allbill/datewisepo", "Show",$values);
			
			$this->view->table = $this->renderTable($fdate, $tdate, $xcat);
			
			$this->view->renderpage('allbill/porptfilter', false);
	}
		
	function renderTable($fdate, $tdate, $xcat){
		$fields = array(
					"xdate-Date",
					"xtxnnum-Bill No",
					"zemail-Created By",
					"xsup-Name",
					"xproject-Project",
					"xappstatus-Approval Status",
					"xpaystatus-Pay Status"
					);
		$row = $this->model->getPur($fdate, $tdate, $xcat);
		//print_r($row); die;
		return $this->createTable($fields, $row, "xtxnnum", URL."allbill/showreq/", URL."allbill/approve/", URL."allbill/cancel/");
		
		
	}

	function showreq($reqnum){
		$this->view->backUrl=URL."allbill/datewisepo";

		$reqmst = $this->model->getSingleReq($reqnum);
		$this->view->reqmst = $reqmst;

		$this->view->table=$this->renderTable2($reqnum);
		$this->view->renderpage('allbill/itemreceivelist', false);
	}

	function renderTable2($reqnum){
		$fields = array(
					"xrow-SL.NO",
					"xdate-DATE",
					"xdesc-DESCRIPTION",
					"xquality-QUALITY",
					"xprice-UNIT PRICE IN TAKA",
					"xqty-QUANTITY",
					"xtotal-AMOUNT	",
					"xremarks-REMARKS"
					);
		$table = new Datatable();
		$billtotal = $this->model->billTotal($reqnum);
				
		$row = $this->model->getRequisitionByNum($reqnum);
		
		return $table->myTable2("",$fields, $row, "xitemcode","","",$billtotal[0]['xtotal']);
	}

		public function createTable($fields, $row, $keyval, $actionurledit="", $actionurldelete="",$actionurlbtn2="",$actionbtn="Approve",$actionbtn2="Cancel"){
		
				
			$head = array();
			foreach($fields as $str){
				$st=explode('-',$str);
				
				$head[] = $st[1];
			}
			$table = '<div class="table-responsive"><table id="dtbl" class="table table-striped table-bordered" cellspacing="0" width="100%">';
			$table.='<thead>';
			$table.='<tr>';
			foreach($head as $hd){
				$table.='<th>'.$hd.'</th>';
			}
				$table.='<th>Show</th>';
			$table.='</tr>';
			$table.='</thead>';
			$table.='<tbody>';
			
			foreach($row as $key=>$value){
				$table.='<tr>';
				foreach($value as $str){
					$keyofval =  array_search($str, $value); 
					$table.='<td>'.htmlentities($str).'</td>';
				}
				$t=time();
					$table.='<td><a class="btn btn-info" id="'.$value[$keyval].'"  href="'.$actionurledit.$value[$keyval].'/'.$t.'" role="button">Show</a></td>';
				$table.='</tr>';
			}
			$table.='</tbody>';
			$table.='</table></div>';
			
			return $table;	
		}
		
		
		function picklist(){
			$this->view->table = $this->imstockPickTable();
			
			$this->view->renderpage('allbill/picklist', false);
		}
		
		function imstockPickTable(){
			
			$fields = array(
						"xwh-Warehouse",
						"xitemcode-Item Code",
						"xdesc-Item Name",
						"xqty-Stock",
						);
			$table = new Datatable();
			$row = $this->model->getItemList(" and xbranch = '". Session::get('sbranch') ."'");
			
			return $table->picklistTable($fields, $row, "xitemcode");
		}


		
				
}