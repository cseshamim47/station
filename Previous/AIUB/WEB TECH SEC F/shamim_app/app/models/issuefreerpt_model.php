<?php 

class Issuefreerpt_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}

	public function dateWiseso($fdt, $tdt){
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xsonum","xcus","(select xorg from secus where vissuefreedt.bizid=secus.bizid and vissuefreedt.xcus=secus.xcus) as xorg","xitemcode","(select xdesc from seitem where vissuefreedt.bizid=seitem.bizid and vissuefreedt.xitemcode=seitem.xitemcode) as xitemdesc","xqty","xrate","xsubtotal","xcost","xcosttotal");
			$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'Confirmed' and xdate between '". $fdt ."' and '". $tdt ."'";
		
		return $this->db->select("vissuefreedt", $fields, $where," order by ztime");
	}
	public function itemsales($fdt, $tdt, $itemcode){
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xsonum","(select xorg from secus where secus.xcus=vissuefreedt.xcus) as xorg","xcost","xrate","xqty","(xrate-xcost) as xprofit","((xrate-xcost)*xqty) as xnetprofit","0 as xavgprofit","xcost","xcosttotal","xnotes");
		$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'Confirmed' and xitemcode='".$itemcode."' and xdate between '". $fdt ."' and '". $tdt ."'";

		return $this->db->select("vissuefreedt", $fields, $where, " ", " order by ztime");
	}
	public function cuswiseso($fdt, $tdt, $cus=""){
		$cond="";
		if($cus!="")
			$cond = " and xcus='".$cus."'";

		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xsonum","xcus","(select xorg from secus where vissuefreedt.bizid=secus.bizid and vissuefreedt.xcus=secus.xcus) as xorg","xitemcode","(select xdesc from seitem where vissuefreedt.bizid=seitem.bizid and vissuefreedt.xitemcode=seitem.xitemcode) as xitemdesc","xqty","xcost","xrate","xunitsale","xsubtotal","xcosttotal");
			$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'Confirmed' ".$cond." and xdate between '". $fdt ."' and '". $tdt ."'";
		
		return $this->db->select("vissuefreedt", $fields, $where," order by ztime");
	}
	
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	
		
}