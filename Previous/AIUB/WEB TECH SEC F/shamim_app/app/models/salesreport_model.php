<?php 

class Salesreport_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function getItemWiseSales($fdt, $tdt, $item){
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xsonum","xcus","xitemcode","xrate","sum(xqty) AS xqty","sum(xdisctotal) AS xdisctotal","sum(xqty*xrate-xdisctotal) AS xtotal");
			$where = " bizid = ". Session::get('sbizid') ." and xitemcode = '".$item."' and xstatus = 'Confirmed' and xdate between '". $fdt ."' and '". $tdt ."'";
		
		return $this->db->select("vsalesdt", $fields, $where," group by xdate, xrate", " order by xdate");
	}
	public function getAllItemSales($fdt, $tdt){
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xsonum","xcus","xitemcode","xrate","sum(xqty) AS xqty","sum(xdisctotal) AS xdisctotal","sum(xqty*xrate-xdisctotal) AS xtotal");
			$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'Confirmed' and xdate between '". $fdt ."' and '". $tdt ."'";
		
		return $this->db->select("vsalesdt", $fields, $where," group by xdate, xrate", " order by xdate");
	}
	public function getInvoiceWiseSales($fdt, $tdt){
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xsonum","xcus","xitemcode","xrate","xqty","xdisctotal","(xqty*xrate-xdisctotal) AS xtotal");
			$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'Confirmed' and xdate between '". $fdt ."' and '". $tdt ."'";
		//print_r($this->db->select("vsalesdt", $fields, $where," order by xdate"));die;
		return $this->db->select("vsalesdt", $fields, $where," order by xdate");
	}
	public function getCusWiseSales($fdt, $tdt, $cus){
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xsonum","xcus","xitemcode","xrate","xqty","xdisctotal","(xqty*xrate-xdisctotal) AS xtotal");
			$where = " bizid = ". Session::get('sbizid') ." and xcus = '".$cus."' and xstatus = 'Confirmed' and xdate between '". $fdt ."' and '". $tdt ."'";
		//print_r($this->db->select("vsalesdt", $fields, $where," order by xdate"));die;
		return $this->db->select("vsalesdt", $fields, $where," order by xdate");
	}
	
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	
	
	
}