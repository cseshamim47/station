<?php 

class Distwallet_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	
	
	public function getBalanceByLimit($rin,$limit=""){
		$fields = array("xtype","abs((select if (xbalance<0,xbalance,'0'))) as amountdr","(select if (xbalance>0,xbalance,'0')) as amountcr");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xrdin='".$rin."'";	
		return $this->db->select("vospbaltype", $fields, $where, " order by xtype desc", $limit);
	}
	
	public function getBalanceDet($type){
		$fields = array("stno","DATE_FORMAT(xdate,'%d-%m-%Y')","xtxnnum","srctax+abs(amount) as total","srctax","abs(amount) as amount");
		
		$where = " bizid = ". Session::get('sbizid') ." and xrdin='".Session::get('suser')."' and xtype='".$type."'";	
		return $this->db->select("vosptxndt", $fields, $where, " order by stno");
	}
	
	public function getBalance(){
		$xrdin = Session::get('suser');
	
		return $this->db->checkOSPBalance($xrdin);
	}
	
}