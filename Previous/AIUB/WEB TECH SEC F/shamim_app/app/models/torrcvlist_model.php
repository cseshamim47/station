<?php 

class Torrcvlist_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	
	
	public function getTorReceiveList($branch=""){
		$fields = array("ximsenum","xdate", "xitemcode", "xsl","xitemdesc","xsup","xbranch","xtorbranch","xstdcost","xqty",);
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." $branch and xtxntype='Transfer Receive'";	
		return $this->db->select("imsetxn", $fields, $where, " order by ximsenum");
	}
	
	
}