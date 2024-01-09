<?php 

class Distcomsms_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function getComDistributor($stno){
		$fields = array("distinct distrisl as distrisl");
		
		$where = " bizid = ". Session::get('sbizid') ." and stno = '". $stno."'" ;	
		
		return $this->db->select("mlmtotrep", $fields, $where);
		
	}
	public function getmobile($distrisl){
		$fields = array("xmobile");
		
		$where = " bizid = ". Session::get('sbizid') ." and distrisl = ".$distrisl;	
		
		return $this->db->select("mlminfo", $fields, $where);
		
	}
	public function getcommision($stno){
		
		$fields = array("distrisl","xcomtype","xcom-(xcom*xsrctaxpct/100) as xcom");
		
		$where = " bizid = ". Session::get('sbizid') ." and stno = '". $stno."'" ;	
		
		return $this->db->select("mlmtotrep", $fields, $where);
		
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	
	public function getItemMaster($searchby, $val){
		
		$this->db->getItemMaster($searchby, $val);
	}
}