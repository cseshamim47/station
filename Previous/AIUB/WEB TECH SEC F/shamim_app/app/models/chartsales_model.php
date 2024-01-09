<?php 

class Chartsales_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	
	
	public function getTopItems($limit){
		$fields = array("xitemcode","sum(xqty) as xqty");
		$where = " bizid = ". Session::get('sbizid') ." group by xitemcode ".$limit."";	
		echo json_encode($this->db->select("imsetxn", $fields, $where));
	}
	
	public function getTopItemList($limit){
		$fields = array("xitemcode","xdesc","sum(xqty) as xqty");
		$where = " bizid = ". Session::get('sbizid') ." group by xitemcode,xdesc order by xqty desc ".$limit."";	
		return $this->db->select("imsetxn", $fields, $where);
	}
	
}