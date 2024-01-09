<?php 

class Itemscmap_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}

	public function create($cols, $vals){
		$results = $this->db->insertMultipleDetail('itemscmap',$cols,$vals," ON DUPLICATE KEY UPDATE xcur = VALUES(xcur), xmrp = VALUES(xmrp), xqty = VALUES(xqty), xdisc = VALUES(xdisc), xexch = VALUES(xexch), xdispct = VALUES(xdispct)");
		
		return $results;	
	}
	
	public function getHeader($xsl){
		$fields = array();
		
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xsl = '". $xsl ."'" ;	
		
		return $this->db->select("itemscmap", $fields, $where);
	}
	public function getSingleMapDt($xsl){
		$fields = array();
		
		$where = "bizid = ". Session::get('sbizid') ." and xsl = '". $xsl;	
		
		return $this->db->select("itemscmap", $fields, $where);
	}
	
	public function getMapdt($school){
		$fields = array("xsl","xcus","xclass","xitemcode");
		
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xcus = '". $school ."'";	
		return $this->db->select("itemscmap", $fields, $where);
	}
	
	public function getMapList(){
		$fields = array("xcus");
		
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid');	
		
		return $this->db->select("itemscmap", $fields, $where, "group by xcus");
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	
	
	public function recdelete($where){
		$this->db->dbdelete('itemscmap', $where);
	}
	
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	
}