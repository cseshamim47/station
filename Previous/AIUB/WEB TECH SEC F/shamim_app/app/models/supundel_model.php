<?php 

class Supundel_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
		
	public function getUndelivered(){
		$fields = array("ximsenum", "xrow", "xitemcode","xcusdt", "xoutlet", "(select xadd1 from secus where vsuplierview.bizid=secus.bizid and vsuplierview.xcus=secus.xcus) as xcusadd", "(select xmobile from secus where vsuplierview.bizid=secus.bizid and vsuplierview.xcus=secus.xcus) as xcusmobile","xqty","xpricepur","xqty*xpricepur as xtotal");
		
		$where = " bizid = ". Session::get('sbizid') ." and xstatus='Created' and xsup='".Session::get('sbin')."'";	
		return $this->db->select("vsuplierview", $fields, $where, " order by ximsenum");
	}
	
	public function getDeliveredList(){
		$fields = array("ximsenum", "xrow", "xitemcode","xdesc", "xoutlet", "xoutletadd", "xoutletmobile","xqty","xpricepur","xqty*xpricepur as xtotal");
		
		$where = " bizid = ". Session::get('sbizid') ." and xstatus='Supplier Delivery' and xsup='".Session::get('sbin')."'";	
		return $this->db->select("vsuplierview", $fields, $where, " order by ximsenum");
	}
	public function getSupDeliveredList(){
		$fields = array("(select xorg from sesup where vsuplierview.bizid=sesup.bizid and vsuplierview.xsup=sesup.xsup) as xsup","ximsenum","xrow", "xitemcode","xdesc", "xcusdt", "(select xadd1 from secus where vsuplierview.bizid=secus.bizid and vsuplierview.xcus=secus.xcus) as xcusadd",
		"(select xmobile from secus where vsuplierview.bizid=secus.bizid and vsuplierview.xcus=secus.xcus) as xcusmobile","xqty");
		
		$where = " bizid = ". Session::get('sbizid') ." and xstatus='Supplier Delivery'";	
		return $this->db->select("vsuplierview", $fields, $where);
	}
	public function createDel($where){
			//echo $where;die;
		$postdata=array(
			"xstatus" => "Supplier Delivery",
			"xemail" => Session::get('suser'),
			"zutime" => date("Y-m-d H:i:s")
			);
		
		$this->db->update('imsetxn', $postdata, $where);
			
	}
	public function confDel($where){
			//echo $where;die;
		$postdata=array(
			"xstatus" => "Confirmed"
			);
		
		$this->db->update('imsetxn', $postdata, $where);
			
	}
}

