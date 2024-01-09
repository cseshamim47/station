<?php
class Jsondata extends Controller{
	
	
	
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
		
			if(empty($usersessionmenu)){
				header('location: '.URL.'mainmenu');
			}
		$this->view->js = array('public/js/datatable.js','views/suppliers/js/codevalidator.js');	
		}
	
		function getItemNamePrice($xitemcode){
			$this->model->getItemInfoForSale("xitemcode",$xitemcode);
		}
		function getWorkOrderDetail($wonum){
			$this->model->getWorkOrderDetail($wonum);
		}
		function getWoDtForWor($wonum){
			$this->model->getWoDtForWor($wonum);
		}
		
		function getPlatDetails($platcode){
			$this->model->getPlatDetails($platcode);
		}
		
		function getpoint($cus){
			if ($this->model->isMyCus($cus)){
				$this->model->getPoint($cus);
			}
			
		}
		function getcusgeoloc(){
			$this->model->cusgeoloc();
		}
		function getStock($itemcode,$wh){
			$this->model->getItemStock($itemcode, $wh);
		}
		
		function getcustomer($cus){
			$this->model->getCustomer($cus);
		}
		
		function getclass($cus, $group){
			$this->model->getclass($cus, $group);
		}
		function getSubject(){
			$this->model->getSubject();
		}



		// function getArrayTable($cus){

		// 	$arrayform = "";
		// 	$books=$this->model->getBooks($cus);
		// 	//print_r($books);die;
		// 	$fld = array();
		// 	if(!empty($books)){
		// 		for($i=0; $i<count($books); $i++){
		// 			array_push($fld,array("xitemcode~text~".$books[$i]['xitemcode']=>'Item Code~100_readonly', "xstuname~text~"=>'Name~300_', "xqty~text~"=>'Qty~50_', "xprice~text~"=>'Price~50_', "xa~text~"=>'XB~50_', "xb~text~"=>'XB~100_', "xc~text~"=>'XC~70_', "xd~text~"=>'XD~_'));				
		// 		}
		// 		$dynamicForm = new Dynamicform("Students List For Attendance",array());
		// 		$arrayform = $dynamicForm->createArrayFormTable($fld, URL."schoolsales/savesales", "Submit");
		// 	}
		// 	echo json_encode($arrayform);
		// }


		public function getItemData(){
			$this->model->getData();
		}
		public function getItemData2($wh=""){
			$this->model->getData2($wh);
		}
		public function getDataForAuto($code=""){
			$this->model->getDataForAuto($code);
		}
		public function getItemDataTest(){
			$this->model->getItemDataTest();
		}
		function getItem($id){
			$this->model->getItem($id);
		}

		//For School Sales
		function getAllItem($cus,$clsarr,$conv,$dis){

			$this->model->getAllItem($cus,$clsarr,$conv,$dis);
		}
		function getAllItemSta($cus,$clsarr,$conv,$dis){

			$this->model->getAllItemSta($cus,$clsarr,$conv,$dis);
		}
		function getSoItem($sonum){
			$this->model->getSoItem($sonum);
		}
		function getSoItemSta($sonum){
			$this->model->getSoItemSta($sonum);
		}
		function getSoDt($sonum){
			$this->model->getSoDt($sonum);
		}
		function getSalesItems($sonum){
			$this->model->getSalesItems($sonum);
		}
		public function getSalesList($status){
			$this->model->getSalesList($status);
		}

		
		//For Issue Free
		function getSalesItemsFree($sonum){
			$this->model->getSalesItemsFree($sonum);
		}
		function getSoDtFree($sonum){
			$this->model->getSoDtFree($sonum);
		}
		function getSoItemFree($sonum){
			$this->model->getSoItemFree($sonum);
		}
		// function getSoItemStaFree($sonum){
		// 	$this->model->getSoItemStaFree($sonum);
		// }
		public function getSalesListFree($status){
			$this->model->getSalesListFree($status);
		}
		// public function getPO($code){
		// 	$this->model->getPO($code);
		// }
		
		public function getSalesListTest($status, $index, $srow, $search=""){
			$ret = array();
			$ret["data"] = $this->model->getSalesListTest($status, $index, $srow, $search);
			$ret["totalrow"] = $this->model->getCount($status, $search)[0]['count'];
			echo json_encode($ret);
		}

		
		//For reject
		function getSalesItemsReject($sonum){
			$this->model->getSalesItemsReject($sonum);
		}
		function getSoDtReject($sonum){
			$this->model->getSoDtReject($sonum);
		}
		function getSoItemReject($sonum){
			$this->model->getSoItemReject($sonum);
		}
		function getSoItemStaReject($sonum){
			$this->model->getSoItemStaReject($sonum);
		}
		public function getSalesListReject($status){
			$this->model->getSalesListReject($status);
		}

		//for book list
		function getBooklist($sonum){
			$this->model->getBooklist($sonum);
		}
		function getBooklistDt($sonum){
			$this->model->getBooklistDt($sonum);
		}
		public function getBookListTable($status){
			$this->model->getBookListTable($status);
		}
		function getBookListReport($sonum){
			$this->model->getBookListReport($sonum);
		}
		function getFormaItem($sonum){
			$this->model->getFormaItem($sonum);
		}

		function getcustomerbal($cus){
			$this->model->getCustomerBal($cus);
		}
		function getPoBal($ponum){
			$this->model->getPoBal($ponum);
		}
		function getGrnBal($ponum){
			$this->model->getGrnBal($ponum);
		}
		function getWoBal($wonum){
			$this->model->getWoBal($wonum);
		}
		function getsupplier($sup){
			$this->model->getSupplier($sup);
		}
		function inforindt($rin){
			$this->model->getInfoRinDetail($rin);
		}

		//For Print Order
		function getPrintOrder($sonum){
			$this->model->getPrintOrder($sonum);
		}
		function getForma($sonum){
			$this->model->getForma($sonum);
		}
		public function getFormaList($status){
			$this->model->getFormaList($status);
		}


		public function getMapping($xcus, $xclass){
			$this->model->getMapping($xcus, $xclass);
		}
		
		public function getCusMap(){
			$this->model->getCusMap();
		}

		
		function customerpicklist(){
			$this->view->table = $this->customerPickTable();
			
			$this->view->renderpage('customers/customerpicklist', false);
		}
		
		function customerPickTable(){
			$fields = array(
						"xcus-Supplier Code",
						"xorg-Organization/Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xcusemail-Email"
						);
			$table = new Datatable();
			$row = $this->model->getCustomersByLimit();
			
			return $table->picklistTable($fields, $row, "xcus");
		}
		
		function schoolpicklist(){
			$this->view->table = $this->schoolPickTable();
			
			$this->view->renderpage('customers/customerpicklist', false);
		}
		
		function schoolPickTable(){
			$fields = array(
						"xcus-Supplier Code",
						"xorg-Organization/Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xcusemail-Email"
						);
			$table = new Datatable();
			$row = $this->model->getSchoolByLimit();
			
			return $table->picklistTable($fields, $row, "xcus");
		}
		function getWarehouse($type){
			$this->model->getWarehouse($type);
		}
		function getAccHead($type){
			$this->model->getAccHead($type);
		}
		
		function bookPickList(){
			$this->view->table = $this->bookPickTable();
			
			$this->view->renderpage('customers/customerpicklist', false);
		}
		
		function bookPickTable(){
			$fields = array(
						"xitemcode-Item Code",
						"xdesc-Description"
						);
			$table = new Datatable();
			$row = $this->model->getBookByLimit();
			
			return $table->picklistTable($fields, $row, "xitemcode");
		}
		
		function customercrpicklist(){
			$this->view->table = $this->customercrPickTable();
			
			$this->view->renderpage('customers/customerpicklist', false);
		}
		
		function customercrPickTable(){
			$fields = array(
						"xcuscr-Supplier Code",
						"xorg-Organization/Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xcusemail-Email"
						);
			$table = new Datatable();
			$row = $this->model->getcrCustomersByLimit();
			
			return $table->picklistTable($fields, $row, "xcuscr");
		}
		
		function supplierpicklist(){
			$this->view->table = $this->supplierPickTable();
			
			$this->view->renderpage('suppliers/supplierpicklist', false);
		}
		
		function supplierPickTable(){
			$fields = array(
						"xsup-Supplier Code",
						"xorg-Organization/Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xsupemail-Email"
						);
			$table = new Datatable();
			$row = $this->model->getSuppliersByLimit();
			
			return $table->picklistTable($fields, $row, "xsup");
		}

		function popicklist(){
			$this->view->table = $this->poPickTable();
			
			$this->view->renderpage('purchase/popicklist', false);
		}
		
		function poPickTable(){
			$fields = array(
						"xponum-PO Number",
						"xdate-Date PO",
						"xsup-Supplier",
						"xsup-Org/Name",
						"xproj-Project"
						);
			$table = new Datatable();
			$row = $this->model->getPOByLimit();
			
			return $table->picklistTable($fields, $row, "xponum");
		}

		function grnpicklist(){
			$this->view->table = $this->grnPickTable();
			
			$this->view->renderpage('purchasegrn/grnpicklist', false);
		}
		
		function grnPickTable(){
			$fields = array(
						"xgrnnum-GRN Number",
						"xdate-Date GRN",
						"xsup-Supplier",
						"xorg-Org/Name",
						"xproj-Project"
						);
			$table = new Datatable();
			$row = $this->model->getGrnByLimit();
			
			return $table->picklistTable($fields, $row, "xgrnnum");
		}

		function wopicklist(){
			$this->view->table = $this->woPickTable();
			
			$this->view->renderpage('workorder/wopicklist', false);
		}
		
		function woPickTable(){
			$fields = array(
						"wonum-Work Order Number",
						"xdate-Date",
						"toname-Name",
						"toorg-Org",
						"tomobile-Mobile",
						"xamount-Amount"
						);
			$table = new Datatable();
			$row = $this->model->getWoByLimit();
			
			return $table->picklistTable($fields, $row, "wonum");
		}
		
		function suppliercrpicklist(){
			$this->view->table = $this->suppliercrPickTable();
			
			$this->view->renderpage('suppliers/supplierpicklist', false);
		}
		
		function suppliercrPickTable(){
			$fields = array(
						"xsupcr-Supplier Code",
						"xorg-Organization/Name",
						"xadd1-Address",
						"xmobile-Mobile",
						"xsupemail-Email"
						);
			$table = new Datatable();
			$row = $this->model->getcrSuppliersByLimit();
			
			return $table->picklistTable($fields, $row, "xsupcr");
		}
		
		function purchasepicklist(){
			$this->view->table = $this->purchasePickTable();
			
			$this->view->renderpage('customers/customerpicklist', false);
		}
		
		function purchasePickTable(){
			$fields = array(
						"xdate-Date",
						"xponum-PO",
						"xsup-Supplier",
						"xsupname-Org/Name",
						"xsupdoc-Document"
						);
			$table = new Datatable();
			$row = $this->model->getPurchaseList();
			
			return $table->picklistTable($fields, $row, "xponum");
		}
		
		function outletbysuppick($sup){
			
			$this->view->table = $this->outletSupPickTable($sup);
			$this->view->caption = "Outlet List";
			$this->view->renderpage('items/itempicklist', false);
		}
		
		function outletSupPickTable($sup){			
			$fields = array(
						"xoutlet-Outlet Code",
						"xdesc-Description",
						"xadd1-Address"
						);
			$table = new Datatable();
			$row = $this->model->getoutletbysup($sup);
			
			return $table->picklistTable($fields, $row, "xoutlet");
		}

		//GL List Area

		function glchartpicklistcr(){
			$this->view->table = $this->glchartPickTablecr();
			
			$this->view->renderpage('glchart/glchartpicklistcr', false);
		}
		
		
		function glchartpicklist(){
			$this->view->table = $this->glchartPickTable();
			
			$this->view->renderpage('glchart/glchartpicklist', false);
		}

		function glchartpicklistsub(){
			$this->view->table = $this->glchartPickTableSub();
			
			$this->view->renderpage('glchart/glchartpicklist', false);
		}
		
		function glchartpicklistexp(){
			$this->view->table = $this->glchartPickTableexp();
			
			$this->view->renderpage('glchart/glchartpicklist', false);
		}
		
		function glchartpicklistinc(){
			$this->view->table = $this->glchartPickTableinc();
			
			$this->view->renderpage('glchart/glchartpicklist', false);
		}
		
		function glchartPickTablecr(){
			$fields = array(
						"xacccr-Account Code",
						"xdesc-Account Description",
						"xacctype-Account Type",
						"xaccusage-Use Of The Account",
						"xaccsource-Account Source"
						);
			$table = new Datatable();
			$row = $this->model->getGlchartcrByLimit2();
			
			return $table->picklistTable($fields, $row, "xacccr");
		}
		
		function glchartpicklistcr2($id){
			$this->view->table = $this->glchartPickTablecr2($id);
			
			$this->view->renderpage('glchart/glchartpicklistcr', false);
		}
		function glchartPickTablecr2($id){
			$fields = array(
						"xacccr-Account Code",
						"xdesc-Account Description",
						"xacctype-Account Type",
						"xaccusage-Use Of The Account",
						"xaccsource-Account Source"
						);
			$table = new Datatable();
			$row = $this->model->getGlchartcrByLimit2();
			
			return $table->picklistTable2($fields, $row, "xacccr","","",$id);
		}
		
		function glchartPickTable(){
			$fields = array(
						"xacc-Account Code",
						"xdesc-Account Description",
						"xacctype-Account Type",
						"xaccusage-Use Of The Account",
						"xaccsource-Account Source"
						);
			$table = new Datatable();
			$row = $this->model->getGlchartByLimit();
			
			return $table->picklistTable($fields, $row, "xacc");
		}
		function glchartPickTableSub(){
			$fields = array(
						"xacc-Account Code",
						"xdesc-Account Description",
						"xacctype-Account Type",
						"xaccusage-Use Of The Account",
						"xaccsource-Account Source"
						);
			$table = new Datatable();
			$row = $this->model->getGlchartsubByLimit();
			
			return $table->picklistTable($fields, $row, "xacc");
		}
		function glchartPickTableexp(){
			$fields = array(
						"xacc-Account Code",
						"xdesc-Account Description",
						"xacctype-Account Type",
						"xaccusage-Use Of The Account",
						"xaccsource-Account Source"
						);
			$table = new Datatable();
			$row = $this->model->getGlchartexpByLimit();
			
			return $table->picklistTable($fields, $row, "xacc");
		}
		
		function glchartPickTableinc(){
			$fields = array(
						"xacc-Account Code",
						"xdesc-Account Description",
						"xacctype-Account Type",
						"xaccusage-Use Of The Account",
						"xaccsource-Account Source"
						);
			$table = new Datatable();
			$row = $this->model->getGlchartincByLimit();
			
			return $table->picklistTable($fields, $row, "xacc");
		}
}