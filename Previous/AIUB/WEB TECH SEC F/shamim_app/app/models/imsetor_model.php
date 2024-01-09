<?php 

class Imsetor_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($cols, $vals, $onduplicateupdt=""){
		
		$results = $this->db->insertMultipleDetail("imsetxn", $cols, $vals, $onduplicateupdt);
		
		return $results;	
	}
	
	public function edit($data, $ximsenum, $itemcode){
		$results = array(
				"xdate"=>$data['xdate'],
				"xsup"=>$data['xsup'],
				"xdocnum"=>$data['xdocnum'],
				"xbranch"=>$data['xbranch'],
				"xwh"=>$data['xwh'],
				"xitemcode"=>$data['xitemcode'],
				"xsl"=>$data['xsl'],
				"xitemdesc"=>$data['xitemdesc'],
				"xcat"=>$data['xcat'],
				"xcolor"=>$data['xcolor'],
				"xsize"=>$data['xsize'],
				"xbrand"=>$data['xbrand'],
				"xqty"=>$data['xqty'],
				"xuom"=>$data['xuom'],
				"xvatpct"=>$data['xvatpct'],
				"xdisc"=>$data['xdisc'],
				"xstdcost"=>$data['xstdcost'],
				"xstdprice"=>$data['xstdprice'],
				"xtxntype"=>$data['xtxntype'],
				"xyear"=>$data['xyear'],
				"xper"=>$data['xper']
			);
			
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximsenum = '". $ximsenum ."' and xitemcode = '". $itemcode."' and xtxntype='Inventory Receive'";
			//print_r($this->db->update("ximsenum",$results, $where)); die;
			return $this->db->update("imsetxn",$results, $where);
	}
	
	public function getSingleRecord($imsenum, $xrow){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximsenum = '". $imsenum."' and xrow = '". $xrow ."' and xtxntype='Inventory Transfer'";	
		//print_r($this->db->select("imsetxn", $fields, $where));die;
		return $this->db->select("imsetxn", $fields, $where);
	}
	
	public function getImtorByLimit($limit=""){
		$fields = array("ximsenum", "xdate", "xsup", "xbranch", "xtorbranch");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xtxntype='Inventory Transfer'";	
		return $this->db->selectDistinct("imsetxn", $fields, $where, " order by ximsenum", $limit);
	}
	
	public function getImTransfer($imsenum){
		$fields = array("ximsenum","xrow", "xdate", "xitemcode", "xsl","xitemdesc","xbranch","xtorbranch","xqty",);
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximsenum = '". $imsenum."' and xtxntype='Inventory Transfer'";	
		return $this->db->select("imsetxn", $fields, $where, " order by xrow");
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrementNow($table,$keyfield,$prefix,$num);
	}
	
	public function getItemCode($table,$keyfield,$num, $xrow){
		
		return $this->db->rowIncrement($table,$keyfield,$num, $xrow);
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
	
}