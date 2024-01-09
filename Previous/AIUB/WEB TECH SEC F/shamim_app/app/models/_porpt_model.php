<?php 

class Porpt_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}

	public function dateWisePO($fdt, $tdt, $xgitem="", $project=""){
		$cond="";
		if($project!="")
			$cond = " and xproj='".$project."'";

		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xponum","xsup","xorg","xitemcode","xitemdesc","xqty","xratepur","xunitpur","xtotal");
		if($xgitem=="")
			$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'Confirmed' ".$cond." and xdate between '". $fdt ."' and '". $tdt ."'";
		else
			$where = " bizid = ". Session::get('sbizid') ." and xgitem='".$xgitem."' and xstatus = 'Confirmed' ".$cond." and xdate between '". $fdt ."' and '". $tdt ."'";
		
		return $this->db->select("vpodet", $fields, $where," order by ztime");
	}
	public function itemWisePO($fdt, $tdt, $xitemcode, $xgitem="", $project=""){
	    $cond="";
		if($project!="")
			$cond = " and xproj='".$project."'";
			
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xponum","xitemcode","xsup","xorg","xitemdesc","xqty","xratepur","xunitpur","xtotal");
		
		if($xgitem=="")
			$where = " bizid = ". Session::get('sbizid') ." and xitemcode = '".$xitemcode."' and xstatus = 'Confirmed' ".$cond." and xdate between '". $fdt ."' and '". $tdt ."'";
			else
			$where = " bizid = ". Session::get('sbizid') ." and xgitem='".$xgitem."' and xitemcode = '".$xitemcode."' and xstatus = 'Confirmed' ".$cond." and xdate between '". $fdt ."' and '". $tdt ."'";

		return $this->db->select("vpodet", $fields, $where, " ", " order by ztime");
	}
	
	public function supWisePO($fdt, $tdt, $sup="", $xgitem="", $project=""){
		$cond="";
		$proj="";
		if($sup!="")
			$cond = " and xsup='".$sup."'";
			
		if($project!="")
			$proj = " and xproj='".$project."'";

		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xponum","xsup","xorg","xitemcode","xitemdesc","xqty","xratepur","xunitpur","xtotal");
		
		if($xgitem=="")
			$where = " bizid = ". Session::get('sbizid') ." ".$proj." and xstatus = 'Confirmed' ".$cond." and xdate between '". $fdt ."' and '". $tdt ."'";
			else
			$where = " bizid = ". Session::get('sbizid') ." and xgitem='".$xgitem."' ".$proj." and xstatus = 'Confirmed' ".$cond." and xdate between '". $fdt ."' and '". $tdt ."'";
		
		return $this->db->select("vpodet", $fields, $where," order by ztime");
	}
	
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	
		
}