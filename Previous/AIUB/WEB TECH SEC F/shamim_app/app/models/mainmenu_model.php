<?php 

class Mainmenu_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}	
	public function getMainMenu($where){
		$fields = array("xmenu","xsubmenu","xurl");
		//print_r($this->db->select("pabuziness", $fields));die;			
		return $this->db->select("pamenus", $fields, $where);
	}
	public function getTodaySales($tdate,$status){
		$fields=array("count(xsonum) AS tsales");
			$where = " bizid = ". Session::get('sbizid') ." and xstatus = '".$status."' and xdate ='".$tdate."'";		
		return $this->db->select("somst", $fields, $where," order by xdate");
	}
	public function getTodayPO($tdate,$status){
		$fields=array("count(xponum) AS tpo");
			$where = " bizid = ". Session::get('sbizid') ." and xstatus = '".$status."' and xdate ='".$tdate."'";
		
		return $this->db->select("pomst", $fields, $where," order by xdate");
	}
	public function totalexpen($wherer){
		$fields = array("sum(xprime) as xamount");		
		$where = " bizid = ". Session::get('sbizid') ." and ".$wherer." xacctype = 'Expenditure' and xrecflag = 'Live'";	
		return $this->db->select("gldetailview", $fields, $where);
	}
	public function totalincome($wherer){
		$fields = array("if(COALESCE(sum(xprime))<=0, abs(COALESCE(sum(xprime))), -1*COALESCE(sum(xprime))) as xamount");		
		$where = " bizid = ". Session::get('sbizid') ." and ".$wherer." xacctype = 'Income' and xrecflag = 'Live'";	
		return $this->db->select("gldetailview", $fields, $where);
	}
	public function getSales(){
		$fields = array("xper","(sum(xsubtotal)+sum(xtaxtotal)-sum(xdisctotal)) AS xtotal");		
		$where = " bizid = ". Session::get('sbizid') ." and xstatus='Confirmed' and xyear = '".date('Y', strtotime(date('Y-m-d H:i:s')))."'";		
		$dbr = $this->db->select("vsalesdt", $fields, $where, " group by xper");		
		echo json_encode($dbr);		
	}
	public function getPO(){
		$fields = array("xper","(sum(xtotal)+sum(xtotaltax)-sum(xtotaldisc)) AS xtotal");		
		$where = " bizid = ". Session::get('sbizid') ." and xstatus='Confirmed' and xyear = '".date('Y', strtotime(date('Y-m-d H:i:s')))."'";		
		$dbr = $this->db->select("vpodet", $fields, $where, " GROUP BY xper");		
		echo json_encode($dbr);		
	}
	public function getstock(){
		$fields = array("COALESCE(round(sum(xqty*xstdcost*xsign),2),0) as xtotal");		
		$where = " bizid = ". Session::get('sbizid');				
		return $this->db->select("vimtrn", $fields, $where);
		 		
	}		
	public function totalAp($wherer){
		$fields = array("if(COALESCE(sum(xprime))<=0, abs(round(COALESCE(sum(xprime),0),".session::get('sbizdecimals').")), round(-1*COALESCE(sum(xprime),0),".session::get('sbizdecimals').")) as xamount");		
		//$where = " bizid = ". Session::get('sbizid') ." and xaccusage = '".$wherer."' and xrecflag = 'Live' and YEAR(xdate) = '".date('Y', strtotime(date('Y-m-d H:i:s')))."'";
		return $this->db->select("gldetailview", $fields, $wherer);
	}
	public function totalAr($wherer){
		$fields = array("round(sum(xprime),".session::get('sbizdecimals').") as xamount");		
		//$where = " bizid = ". Session::get('sbizid') ." and xaccusage = '".$wherer."' and xrecflag = 'Live' and YEAR(xdate) = '".date('Y', strtotime(date('Y-m-d H:i:s')))."'";
		return $this->db->select("gldetailview", $fields, $wherer);
	}
	public function getCus(){
		$fields = array("count(xcus) AS totalcus");		
		$where = " bizid = ". Session::get('sbizid') ."";
		return $this->db->select("secus", $fields, $where);
	}
	public function getTopItem(){
		$fields = array("xitemcode", "(SELECT xdesc from seitem WHERE seitem.xitemcode=vsalesdt.xitemcode) AS xdesc", "xrate", "sum(xqty) as xqty");		
		$where = " bizid = ". Session::get('sbizid') ."";
		return $this->db->select("vsalesdt", $fields, $where, " GROUP BY xitemcode ORDER BY xqty DESC", " LIMIT 10");
	}
	public function getTopCus(){
		$fields = array("xcus", "(SELECT xorg from secus WHERE secus.xcus=vsalesdt.xcus) AS xorg", "(SELECT xadd1 from secus WHERE secus.xcus=vsalesdt.xcus) AS xadd1", "sum(xsubtotal+xtaxtotal-xdisctotal) as xtotal");		
		$where = " bizid = ". Session::get('sbizid') ."";
		return $this->db->select("vsalesdt", $fields, $where, "  GROUP BY xcus ORDER BY xtotal DESC", " LIMIT 10");
	}

	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
}