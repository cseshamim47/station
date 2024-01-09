<?php
class Imstock extends Controller{
	
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
				if($menus["xsubmenu"]=="Stock Status")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
		
		
			
		$this->view->js = array('public/js/datatable.js','views/glrpt/js/getaccdt.js','views/distreg/js/codevalidator.js');
		}
		
		public function index(){
			
			//$this->view->table = $this->renderTable();
			
			$this->view->rendermainmenu('imstock/index');	
		}

		
		function datewisepo(){
			$gitem = "";
			if(isset($_POST["xgitem"]))
				$gitem=$_POST["xgitem"];
			$xcat = "";
			if(isset($_POST["xcat"]))
				$xcat=$_POST["xcat"];
			$wh = "";
			if(isset($_POST["xwh"]))
				$wh=$_POST["xwh"];
			$itemcode = "";
			if(isset($_POST["xitemcode"]))
				$itemcode=$_POST["xitemcode"];

			$this->view->breadcrumb = '';
			$btn = array(
				"Clear" => URL."imstock/datewisepo",
			);	
			$dt = date("Y/m/d");
			
			$values = array(
				"xgitem"=>$gitem,
				"xcat"=>$xcat,
				"xwh"=>$wh,
				"xitemcode"=>$itemcode
				);
				
				$fields = array(
						array(
							"xgitem-select_Item Group"=>'Type_maxlength="50"',
							"xcat-select_Item Category"=>'Category_maxlength="50"',
							"xwh-select_Warehouse"=>'Warehouse_maxlength="200"',
							"xitemcode-group_".URL."itempicklist/picklist"=>'Item Code_maxlength="20"',
							)
						);
			
				$dynamicForm = new Dynamicform("Report Filter Form",$btn);		
				
				$this->view->dynform = $dynamicForm->createFourColumnFormGen($fields, URL."imstock/datewisepo", "Show",$values);
				
				$btn = '<div>
							<form action="'.URL.'imstock/stocklist" method="POST">
								<input type="hidden" id="xgitem" name="xgitem" value="'.$gitem.'">
								<input type="hidden" id="xcat" name="xcat" value="'.$xcat.'">
								<input type="hidden" id="xwh" name="xwh" value="'.$wh.'">
								<input type="hidden" id="xitemcode" name="xitemcode" value="'.$itemcode.'">
								<button type="submit" class="btn btn-primary">Print Stock List</button>
							</form>
						</div>
						<div>
						<hr/>
						</div>';

				$this->view->table = $btn.$this->renderTable("", $gitem,$xcat,$wh,$itemcode);
				
				$this->view->renderpage('imstock/porptfilter', false);
		}
		
		function stocklist(){

			$gitem = "";
			if(isset($_POST["xgitem"]))
				$gitem=$_POST["xgitem"];
			$xcat = "";
			if(isset($_POST["xcat"]))
				$xcat=$_POST["xcat"];
			$wh = "";
			if(isset($_POST["xwh"]))
				$wh=$_POST["xwh"];
			$itemcode = "";
			if(isset($_POST["xitemcode"]))
				$itemcode=$_POST["xitemcode"];

			$this->view->breadcrumb = '';

			$table = new ReportingTable();
			$tblvalues=array();
			$tblvalues = $this->model->getImStock($branch="", $gitem, $xcat,$wh,$itemcode);

			$typ = "";
			$categoy = "";
			$whouse = "";
			$itm = "";
			$all = "";
			
			if($gitem != "")
				$typ = "</br> Type : ".$gitem;
			if($xcat != "")
				$categoy = "</br> Category : ".$xcat;
			if($wh != "")
				$whouse = "</br> Warehouse : ".$wh;
			if($itemcode != "")
				$itm = "</br> Item Code : ".$itemcode;
			if($gitem == "" && $xcat == "" && $wh == "" && $itemcode == "")
				$all = "</br> All";
			$this->view->vfdate ="";
			$this->view->vtdate = "";
			$this->view->vrptname = "Warehouse Stock Report".$all.$typ.$categoy.$itm;
			$this->view->tabletitle = $whouse;
			$this->view->org=Session::get('sbizlong');


			$tblsettings = array(
				"columns"=>array(0=>"Warehouse",1=>"Item Code",2=>"Item Name",3=>"PO",4=>"GRN",5=>"Pur. Return",6=>"Del. Return",7=>"Sales",8=>"Reject",9=>"Store Delivery",10=>"Av. Stock",11=>"UOM"),
				"buttons"=>array(),
				"urlvals"=>array(),
				"sumfields"=>array(),
				);
			$this->view->table=$table->reportingtbl($tblsettings, $tblvalues);
			$this->view->renderpage('imstock/reportpage');
		}
		
		function renderTable($branch="", $gitem,$xcat,$wh,$itemcode){
			$fields = array(
						"xwh-Warehouse",
						"xitemcode-Item Code",
						"xdesc-Item Name",
						"qtypo-PO",
						"qtygrn-GRN",
						//"balgrn-Stock In Balance",
						"qtyreturn-Pur. Return",
						//"balreturn-P.Return Balance",
						"qtydret-Del. Return",
						//"baldret-D.Return Balance",
						"qtyso-Sales",
						//"balso-Sales Balance",
						//"qtyfree-Specimen",
						//"balfree-Specimen Balance",
						"qtyreject-Reject",
						"qtystoredel-Store Delivery",
						//"balreject-Reject Balance",
						"xqty-Av. Stock",
						"xunitstk-UOM",
						//"baltotal-Av. Balance"
						);
			$table = new Datatable();
			$row = $this->model->getImStock($branch, $gitem, $xcat, $wh,$itemcode);
			//print_r($row); die;
			return $table->createTable($fields, $row, "xitemcode");
			
			
		}

		function renderTableDoc(){
			$arr = array();
			$row = $this->model->getImStockDoc();

			foreach($row as $key=>$value){
				$keycol="";
				if($value["xdoctype"]=="Goods Receipt Note"){
					$keycol="grnqty";
				}
				if($value["xdoctype"]=="Sales Order"){
					$keycol="soqty";
				}
				if($value["xdoctype"]=="Free Issue"){
					$keycol="freeqty";
				}
				if($value["xdoctype"]=="Reject"){
					$keycol="rejectqty";
				}
				if($value["xdoctype"]=="Purchase Return"){
					$keycol="prqty";
				}	
				
				$arr[$value['xwh']][$value['xitemcode']][$keycol]=$value['xqty'];
				
			}

			$table='';
			$table.='<table id="grouptable" border="1" class="table table-bordered table-striped"><tr><th>wh</th><th>Item</th><th>grnqty</th><th>grnqty</th></tr>';

			foreach($arr as $key=>$value){
				//for($j=0; $j<count($arr[$key]); $j++){
					$table.='<tr>';
					$table.='<td rowspan="'.count($arr[$key]).'">'.$key.'</td>';

					foreach($value as $ke=>$val){
						$table.='<td>rtre</td>';
					}
					
					// //print_r($value);
					// foreach($value as $ke=>$val){
					// 	$table.='<td>'.$ke.'</td>';
					// }
					
					$table.='</tr>';
				}
			//}
			$table.='</table>';
			print_r($arr);
			return $table;
		}
		
		
		function picklist(){
			$this->view->table = $this->imstockPickTable();
			
			$this->view->renderpage('imstock/picklist', false);
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