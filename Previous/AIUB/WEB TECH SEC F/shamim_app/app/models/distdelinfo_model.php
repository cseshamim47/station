<?php 

class Distdelinfo_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	
	
	public function getDelivery(){ 
		$fields = array("xdate","xreqdelnum","xdeldocnum","xdelorg");
		
		$where = " bizid = ". Session::get('sbizid') ." and xrdin = '". Session::get('suser') ."'" ;	
		
		return $this->db->select("distdelscope", $fields, $where);
	}
	
	public function getDeliverydt($txnnum){ 
		$fields = array("xitemcode","xitemdesc","xqty");
		
		$where = " bizid = ". Session::get('sbizid') ." and xreqdelnum='".$txnnum."' and xrdin = '". Session::get('suser') ."'" ;	
		
		return $this->db->select("vimreqdeldet", $fields, $where);
	}
	

}