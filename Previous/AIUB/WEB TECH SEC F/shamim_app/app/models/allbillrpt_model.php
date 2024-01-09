<?php 

class Allbillrpt_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}

	public function datewisebill($fdt, $tdt, $xgitem=""){
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xcat","xtxnnum","mstdate","xsup","xproject","xdesc","xquality","xprice","xqty","(xprice*xqty) as xtotal","xremarks","zemail");
		
		$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'Confirmed' and mstdate between '". $fdt ."' and '". $tdt ."'";
		
		return $this->db->select("vbilldet", $fields, $where," order by xtxnnum");
	}
	public function catWiseBill($fdt, $tdt, $xcat=""){
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xcat","xtxnnum","mstdate","xsup","xproject","xdesc","xquality","xprice","xqty","(xprice*xqty) as xtotal","xremarks","zemail");
		if($xcat=="")
			$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'Confirmed' and mstdate between '". $fdt ."' and '". $tdt ."'";
		else
			$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'Confirmed' and xcat='".$xcat."' and mstdate between '". $fdt ."' and '". $tdt ."'";
		
		return $this->db->select("vbilldet", $fields, $where," order by xtxnnum");
	}
	
	
	public function proWiseBill($fdt, $tdt, $xproject=""){
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xcat","xtxnnum","mstdate","xsup","xproject","xdesc","xquality","xprice","xqty","(xprice*xqty) as xtotal","xremarks","zemail");
		if($xproject=="")
			$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'Confirmed' and mstdate between '". $fdt ."' and '". $tdt ."'";
		else
			$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'Confirmed' and xproject='".$xproject."' and mstdate between '". $fdt ."' and '". $tdt ."'";
		
		return $this->db->select("vbilldet", $fields, $where," order by xtxnnum");
	}
	
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	
		
}