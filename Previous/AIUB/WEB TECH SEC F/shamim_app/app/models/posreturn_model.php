<?php 

class Posreturn_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($cols, $vals, $onduplicateupdt=""){
		
		$results = $this->db->insertMultipleDetail("imsetxn", $cols, $vals, $onduplicateupdt);
		
		return $results;	
	}
	
	public function edit($data, $ximsenum, $xrow){
		$results = array(
				"xitemcode"=>$data['xitemcode'],
				"xitemdesc"=>$data['xitemdesc'],
				"xcat"=>$data['xcat'],
				"xbrand"=>$data['xbrand'],
				"xcolor"=>$data['xcolor'],
				"xsize"=>$data['xsize'],
				"xsl"=>$data['xsl'],
				"xsup"=>$data['xsup'],
				"xsupdt"=>$data['xsupdt'],
				"xwh"=>$data['xwh'],
				"xbranch"=>$data['xbranch'],
				"xstdcost"=>$data['xstdcost'],
				"xstdprice"=>$data['xstdprice'],
				"xsalesprice"=>$data['xsalesprice'],
				"xupdstdcost"=>$data['xupdstdcost'],
				"xupdstdprice"=>$data['xupdstdprice'],
				"xupdqty"=>$data['xupdqty'],
				"xupdsalesprice"=>$data['xupdsalesprice'],
				"xuom"=>$data['xuom'],
				"xvatpct"=>$data['xvatpct'],
				"xdocument"=>$data['xdocument'],
				"xdate"=>$data['xdate'],
				"xyear"=>$data['xyear'],
				"xper"=>$data['xper'],			
				"bizid"=>$data['bizid'],
				"zemail"=>$data['zemail'],
			);
			
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximsenum = '". $ximsenum ."' and xrow=". $xrow."";
			//print_r($this->db->update("ximsenum",$results, $where)); die;
			return $this->db->update("imsetxn",$results, $where);
	}
	
	public function checkReturn($table,$agg,$where,$groupby=array()){
		
		return $this->db->selectAggregate($table,$agg,$where,$groupby);
	}
	
	public function getSingleRecord($imsenum, $xrow){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximsenum = '". $imsenum."' and xrow = '". $xrow ."' and xtxntype='Sales Return'";	
		//print_r($this->db->select("imsetxn", $fields, $where));die;
		return $this->db->select("imsetxn", $fields, $where);
	}
	
	public function posInvoicePickTable($branch,$limit=""){
		$fields = array("ximsenum", "xdate", "xcus", "xcusdt");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xtxntype='Sales Return' and xbranch = '". $branch ."'";	
		return $this->db->selectDistinct("imsetxn", $fields, $where, " order by ximsenum", $limit);
	}
	
	public function checkItemInvoice($imsenum,$itemcode){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xtxntype='Sales' and ximsenum = '". $imsenum ."' and xitemcode = '". $itemcode ."'";	
		return $this->db->select("imsetxn", $fields, $where);
	}
	
	public function getReturnByInv($imsenum, $branch){
		$fields = array("ximsenum","xreturnimsenum","xrow", "xitemcode", "xsl","xitemdesc","xqty","xsalesprice","xdisc","xvat","xsalestotal");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximsenum = '". $imsenum."' and xbranch='". $branch ."'";	
		return $this->db->select("vreturndt", $fields, $where, " order by xrow");
	}
	
	public function getUnconfirmedList($status, $branch){
		$fields = array("ximsenum", "xdate", "xcus", "xcusdt");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xtxntype='Sales Return' and xstatus = '". $status ."' and xbranch = '". $branch ."'";	
		return $this->db->selectDistinct("imsetxn", $fields, $where, " order by ximsenum");
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrementNow($table,$keyfield,$prefix,$num);
	}
	
	public function getItemCode(){
		
		return $this->db->getItemCode();
	}
	
	public function getRow($table,$keyfield,$num, $xrow){
		
		return $this->db->rowIncrement($table,$keyfield,$num, $xrow);
	}
	
	public function checkIMBalance($itemcode,$xbranch, $qty){
		
		return $this->db->checkIMBalance($itemcode,$xbranch,$qty);
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
	
	public function getItemDetail($searchby, $val){
		return $this->db->getItemDetail($searchby, $val);
	}
	
	public function getItemInfoForSale($searchby, $val){
		echo json_encode($this->db->getItemDetail($searchby, $val));
	}
	
}