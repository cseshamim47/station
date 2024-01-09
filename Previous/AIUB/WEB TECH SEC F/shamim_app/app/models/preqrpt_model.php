<?php 

class Preqrpt_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}

	public function dateWiseReq($fdt, $tdt, $xgitem=""){
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","ximreqnum","xitemcode","xitemdesc","xqty","xunitstk","xrate","xproject","xpur");
		if($xgitem=="")
			$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'Confirmed' and xdate between '". $fdt ."' and '". $tdt ."'";// and zemail='".Session::get('suser')."'
		else
			$where = " bizid = ". Session::get('sbizid') ." and xtype='".$xgitem."' and xstatus = 'Confirmed' and xdate between '". $fdt ."' and '". $tdt ."'";// and zemail='".Session::get('suser')."'
		
		return $this->db->select("vimreqdet", $fields, $where," order by ztime");
	}
	public function itemWiseReq($fdt, $tdt, $xitemcode){
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","ximreqnum","xitemcode","xitemdesc","xqty","xunitstk","xrate","xproject","xpur");

		$where = " bizid = ". Session::get('sbizid') ." and xitemcode = '".$xitemcode."' and xstatus = 'Confirmed' and xdate between '". $fdt ."' and '". $tdt ."'";// and zemail='".Session::get('suser')."'

		return $this->db->select("vimreqdet", $fields, $where, " ", " order by ztime");
	}
	
	public function propurreq($fdt, $tdt, $whe=""){
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","ximreqnum","xitemcode","xitemdesc","xqty","xunitstk","xrate","xproject","xpur");

		$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'Confirmed' and xdate between '". $fdt ."' and '". $tdt ."' ".$whe;// and zemail='".Session::get('suser')."'
		
		return $this->db->select("vimreqdet", $fields, $where," order by ztime");
	}
	
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	
		
}