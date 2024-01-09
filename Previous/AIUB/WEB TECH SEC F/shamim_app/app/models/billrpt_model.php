<?php 

class Billrpt_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}

	public function datewisebill($fdt, $tdt, $xgitem=""){
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xcat","xtxnnum","mstdate","xsup","xproject","xdesc","xquality","xprice","xqty","(xprice*xqty) as xtotal","xremarks");
		
		$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'Confirmed' and mstdate between '". $fdt ."' and '". $tdt ."' and zemail='".Session::get('suser')."'";
		
		return $this->db->select("vbilldet", $fields, $where," order by ztime");
	}
	public function catWiseBill($fdt, $tdt, $xcat, $proj){
	    $cond = "";
	    if($xcat != ""){
	        $cond .= " and xcat = '".$xcat."'";
	    }
	    
	    if($proj != ""){
	        $cond .= " and xproject = '".$proj."'";
	    }
	    
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xcat","xtxnnum","mstdate","xsup","xproject","xdesc","xquality","xprice","xqty","(xprice*xqty) as xtotal","xremarks");
		
			$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'Confirmed' and mstdate between '". $fdt ."' and '". $tdt ."'".$cond;
		
		return $this->db->select("vbilldet", $fields, $where," order by ztime");
	}
	
	
	public function proWiseBill($fdt, $tdt, $xproject=""){
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xcat","xtxnnum","mstdate","xsup","xproject","xdesc","xquality","xprice","xqty","(xprice*xqty) as xtotal","xremarks");
		if($xproject=="")
			$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'Confirmed' and mstdate between '". $fdt ."' and '". $tdt ."' and zemail='".Session::get('suser')."'";
		else
			$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'Confirmed' and xproject='".$xproject."' and mstdate between '". $fdt ."' and '". $tdt ."' and zemail='".Session::get('suser')."'";
		
		return $this->db->select("vbilldet", $fields, $where," order by ztime");
	}
	
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	
		
}