<?php 

class Disttree_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	
		
	public function getTreeByBin($bin){
		$fields = array();
		$where = " bizid = ". Session::get('sbizid') ." and bin = ". $bin ;	
		return $this->db->select("vmlminfotreedt", $fields, $where);
	}
	public function getLRPoint($bin){
		$llpoint = 0;
		$lrpoint = 0;
		$lr = $this->getTreeByBin($bin);
		
		$fields = array("COALESCE(sum(binpoint),0) as point");
		$lwhere = " bizid = ". Session::get('sbizid') ." and binpoint>0 and bin=". $lr[0]['leftbin'] ." or bin in (select bin from mlmtreegen where upbin= ". $lr[0]['leftbin'] .")";
		$rwhere = " bizid = ". Session::get('sbizid') ." and binpoint>0 and bin=". $lr[0]['rightbin'] ." or bin in (select bin from mlmtreegen where upbin= ". $lr[0]['rightbin'] .")";	
		$lpoint = $this->db->select("mlmtree", $fields, $lwhere);
		$rpoint = $this->db->select("mlmtree", $fields, $rwhere);
		$llpoint = $lpoint[0]['point'];
		$lrpoint = $rpoint[0]['point'];
		return array("lpoint"=>$llpoint,"rpoint"=>$lrpoint); 
	}
	public function getTreeByRefBin($bin){
		$fields = array();
		$where = " bizid = ". Session::get('sbizid') ." and refbin = ". $bin ;	
		return $this->db->select("vmlminfotreedt", $fields, $where);
	}
	
	
	public function showlist(){
		$fields = array("bin","lefthitpoint","righthitpoint","leftcurpoint","rightcurpoint","binstatus");
		$where = " bizid = ". Session::get('sbizid') ." and distrisl = ". $this->getdistrisl()[0]["distrisl"];	
		return $this->db->select("mlmtree", $fields, $where);
	}
	
	public function matchingnreq(){
		$fields = array("bin","binstatus","required","topmatching");
		$where = " distrisl = ". $this->getdistrisl()[0]["distrisl"];	
		return $this->db->select("vbvtopmatching", $fields, $where, " order by bin");
	}
	
	public function getdistrisl(){
		$fields = array("distrisl");
		$where = " bizid = ". Session::get('sbizid') ." and bin = ". Session::get('sbin');	
		return $this->db->select("mlmtree", $fields, $where);
	}
}