<?php 

class Posentrycorp_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($cols, $vals, $onduplicateupdt=""){
		
		$results = $this->db->insertMultipleDetail("imsetxn", $cols, $vals, $onduplicateupdt);
		
		return $results;	
	}
	
	public function insertCollection($data){
		$results = $this->db->insert('imsetxncash', array(
			"bizid"=>$data['bizid'],
			"ximsenum"=>$data['ximsenum'],
			"xcus"=>$data['xcus'],
			"xcusdt"=>$data['xcusdt'],
			"xcashamt"=>$data['xcashamt'],
			"xcardamt"=>$data['xcardamt'],
			"xdisc"=>$data['xdisc'],
			"xbank"=>$data['xbank'],
			"xtxntype"=>$data['xtxntype'],
			"xdocument"=>$data['xdocument'],
			"xdocumentrow"=>$data['xdocumentrow'],
			"xstatus"=>$data['xstatus'],
			"xsign"=>$data['xsign'],
			"xdate"=>$data['xdate'],
			"xyear"=>$data['xyear'],
			"xper"=>$data['xper'],
			"xrow"=>$data['xrow'],
			"zemail"=>$data['zemail'],
			"xwh"=>$data['xwh'],
			"xbranch"=>$data['xbranch'],
			"xprefix"=>$data['xprefix']
			));
		
		$this->getSingleCollections($data['ximsenum'],$data['xrow']);
			
		
	}
	
	public function edit($data, $ximsenum, $itemcode, $xrow){
		$results = array(
				"xsup"=>$data['xsup'],
				"xsupdt"=>$data['xsupdt'],
				"xbranch"=>$data['xbranch'],
				"xwh"=>$data['xwh'],
				"xsl"=>$data['xsl'],
				"xdesc"=>$data['xdesc'],
				"xcat"=>$data['xcat'],
				"xcolor"=>$data['xcolor'],
				"xsize"=>$data['xsize'],
				"xbrand"=>$data['xbrand'],
				"xqty"=>$data['xqty'],
				"xuom"=>$data['xuom'],
				"xsalesprice"=>$data['xsalesprice'],
				"xvatpct"=>$data['xvatpct'],
				"xpoint"=>$data['xpoint'],
				"xstdcost"=>$data['xstdcost'],
				"xstdprice"=>$data['xstdprice'],
				"xupdcost"=>$data['xupdstdcost'],
				"xupdprice"=>$data['xupdstdprice'],
				"xupdqty"=>$data['xupdqty'],
				"xupdsalesprice"=>$data['xupdsalesprice']
			);
			
		$headerupdate = array(
			"xdate"=>$data['xdate'],
			"xcus"=>$data['xcus'],
			"xcusdt"=>$data['xcusdt'],
			"xyear"=>$data['xyear'],
			"xper"=>$data['xper']
		);	
			
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximsenum = '". $ximsenum ."' and xitemcode = '". $itemcode."' and xdocumentrow=". $xrow."";
			$headerwhere = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximsenum = '". $ximsenum ."'";
			$this->db->update("imsetxn",$headerupdate, $headerwhere);
			//print_r($this->db->update("ximsenum",$results, $where)); die;
			return $this->db->update("imsetxn",$results, $where);
	}
	
	public function getSingleCollections($imsenum, $xrow){
		$fields = array("xrow","xbank","xcashamt+xcardamt+xdisc as xamt");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximsenum = '". $imsenum."' and xrow=".$xrow." and xtxntype='Collection'";	
		echo json_encode($this->db->select("imsetxn", $fields, $where));
		
	}
		
	public function getCollections($imsenum){
		$fields = array("xrow","xbank","xcashamt as xamt");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and ximsenum = '". $imsenum."' and xtxntype='OSP Collection'";	
		return json_encode($this->db->select("imsetxncash", $fields, $where, " order by xrow"));
		
	}
	
	public function getSingleRecord($imsenum, $xrow){
		$fields = array("*","xsupdt as xoutlet");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximsenum = '". $imsenum."' and xrow = '". $xrow ."' and xtxntype='Corporate Sales' and zemail='". Session::get('suser') ."'";	
		//print_r($this->db->select("imsetxn", $fields, $where));die;
		return $this->db->select("imsetxn", $fields, $where);
	}
	
	public function posInvoicePickTable($branch,$limit=""){
		$fields = array("ximsenum", "xdate", "xcus", "xcusdt");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xtxntype='Sales' and xbranch = '". $branch ."' and zemail='". Session::get('suser') ."' and xtxntype='Corporate Sales'";	
		return $this->db->selectDistinct("imsetxn", $fields, $where, " order by ximsenum", $limit);
	}
	
	public function getSalesByInv($imsenum){
		$fields = array("ximsenum","xrow", "xdesc","xqty","xsalesprice","xdisc","xpoint as xpoint","xtotprice as xsalestotal");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximsenum = '". $imsenum."' and xtxntype='Corporate Sales' and zemail='". Session::get('suser') ."'";	
		return $this->db->select("vsalesdt", $fields, $where, " order by xrow");
	}
	
	public function getSalesNCollection($imsenum){
		$fields = array("ximsenum","xcus","xcusdt","xdate","xrow", "xitemcode", "xsl","xdesc","xqty","xsalesprice","xtotdisc","xtotvat","xtotprice","xdisc","xtxntype","xcashamt","xcardamt","xbank","xpoint");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximsenum = '". $imsenum."' and xtxntype='Corporate Sales' and zemail='". Session::get('suser') ."'";	
		return $this->db->select("vsalesdt", $fields, $where, " order by xtxntype");
	}
	
	public function getSingleRin($rin){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xrdin = '". $rin."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("mlminfo", $fields, $where);
	}
	public function getSingleCustomer($cus){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xcus = '". $cus ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("secus", $fields, $where);
	}
	
	public function getInvSales($imsenum){
		$fields = array("xdesc","xqty","xsalesprice","xpoint","xdisc","xsalestotal");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximsenum = '". $imsenum."' and xtxntype='Corporate Sales' and zemail='". Session::get('suser') ."'";	
		return $this->db->select("vsalesdt", $fields, $where, " order by xrow");
	}
	
	public function getUnconfirmedList($status, $branch){
		$fields = array("ximsenum", "xdate", "xcus", "xcusdt");
		//print_r($this->db->select("pabuziness", $fields));die;
		if($status!="")
			$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xtxntype='Corporate Sales' and xstatus = '". $status ."' and xbranch = '". $branch ."' and zemail='". Session::get('suser') ."'";	
		else
			$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xtxntype='Corporate Sales' and xbranch = '". $branch ."' and zemail='". Session::get('suser') ."'";	
		
		return $this->db->selectDistinct("imsetxn", $fields, $where, " order by ximsenum");
	}
	
	public function getBanks(){
		$fields = array("xcode");
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xcodetype='Bank'";
		return $this->db->select("secodes", $fields, $where);		
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	
	public function getItemCode(){
		
		return $this->db->getItemCode();
	}
	
	public function getRow($table,$keyfield,$num, $xrow){
		
		return $this->db->rowIncrement($table,$keyfield,$num, $xrow);
	}
	
	public function getIMBalance($itemcode,$xwh){
		
		return $this->db->getOSPStock($itemcode,$xwh);
	}
	
	public function delete($where){
			//echo $where;die;
		$postdata=array(
			"xrecflag" => "Deleted",
			"xemail" => Session::get('suser'),
			"zutime" => date("Y-m-d H:i:s")
			);
		
		$this->db->update('imsetxn', $postdata, $where);
			
	}
	public function getStatementNo(){
		
		return $this->db->getStatementNo();
	}
	public function getBalance(){
		$xrdin = Session::get('suser');
	
		return $this->db->checkOSPBalance($xrdin);
	}
	
	public function getItemDetail($searchby, $val){
		return $this->db->getItemMaster($searchby, $val);
	}
	
	public function getItemInfoForSale($searchby, $val){
		echo json_encode($this->db->getItemMaster($searchby, $val));
	}
	
}