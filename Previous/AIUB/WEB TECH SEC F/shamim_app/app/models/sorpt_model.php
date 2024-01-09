<?php 

class Sorpt_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}

	public function dateWiseso($fdt, $tdt){
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xsonum","xcus","(select xorg from secus where vsalesdt.bizid=secus.bizid and vsalesdt.xcus=secus.xcus) as xorg","xitemcode","(select xdesc from seitem where vsalesdt.bizid=seitem.bizid and vsalesdt.xitemcode=seitem.xitemcode) as xitemdesc","xrate","xexch","xdisc","((xrate*xexch)-(xdisc)/xqty) as nprice","xqty","(xsubtotal-xdisc) as xtotal");
			$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'Confirmed' and xdate between '". $fdt ."' and '". $tdt ."'";
		
		return $this->db->select("vsalesdt", $fields, $where," order by ztime");
	}
	public function itemWiseso($fdt, $tdt){
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xsonum","xcus","(select xorg from secus where vsalesdt.bizid=secus.bizid and vsalesdt.xcus=secus.xcus) as xorg","xitemcode","(select xdesc from seitem where vsalesdt.bizid=seitem.bizid and vsalesdt.xitemcode=seitem.xitemcode) as xitemdesc","xqty","xrate","xunitsale","xsubtotal");
			$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'Confirmed' and xdate between '". $fdt ."' and '". $tdt ."'";

		return $this->db->select("vsalesdt", $fields, $where, " ", " order by ztime");
	}
	public function itemsales($fdt, $tdt, $itemcode){
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xsonum","(select xorg from secus where vsalesdt.bizid=secus.bizid and vsalesdt.xcus=secus.xcus) as xorg","xcost","xrate","((xrate*xexch)-(xdisc/xqty)) as netprice","(((xrate*xexch)-(xdisc/xqty))*xqty) as xtotalprice","xqty","(((xrate*xexch)-(xdisc/xqty))-xcost) as xprofit","(((xrate-(xdisc/xqty))-xcost)*xqty) as xnetprofit","0 as xavgprofit");
		$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'Confirmed' and xitemcode='".$itemcode."' and xdate between '". $fdt ."' and '". $tdt ."'";

		return $this->db->select("vsalesdt", $fields, $where, " ", " order by ztime");
	}
	public function usertouchedpoint($fdt, $tdt, $user){
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","username","(select xorg from secus where c.bizid=secus.bizid and c.xcus=secus.xcus) as xorg",
		"(select xadd1 from secus where c.bizid=secus.bizid and c.xcus=secus.xcus) as xadd",
		"DATE_FORMAT(xdate,'%H:%i') as xtime",);
			$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'true' and lower(username)=lower('".$user."') and DATE_FORMAT(xdate,'%Y-%m-%d') between '". $fdt ."' and '". $tdt ."'";
		
		return $this->db->select("emp_touch_customer c", $fields, $where," order by xdate");
	}
	public function cuswiseso($fdt, $tdt, $cus=""){
		$cond="";
		if($cus!="")
			$cond = " and xcus='".$cus."'";

		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xsonum","xcus","(select xorg from secus where vsalesdt.bizid=secus.bizid and vsalesdt.xcus=secus.xcus) as xorg","xitemcode","(select xdesc from seitem where vsalesdt.bizid=seitem.bizid and vsalesdt.xitemcode=seitem.xitemcode) as xitemdesc","xrate","xexch","(xdisc/xqty) as xdisc","((xrate*xexch)-(xdisc)/xqty) as nprice","xqty","(xsubtotal-xdisc) as xtotal");
			$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'Confirmed' ".$cond." and xdate between '". $fdt ."' and '". $tdt ."'";
		
		return $this->db->select("vsalesdt", $fields, $where," order by ztime");
	}
	public function retailerorder($fdt, $tdt){
		$fields=array("invoiceno","shopname","shopadd","prdid","prdname","price","qty","qty*price as xsubtotal");
			$where = " zid = ". Session::get('sbizid') ." and salestype = 'Retailer' and xdate between '". $fdt ."' and '". $tdt ."'";
		
		return $this->db->select("order_transaction", $fields, $where," order by xsl");
	}
	public function retailerreturn($fdt, $tdt){
		$fields=array("invoiceno","shopname","shopadd","prdid","prdname","price","qty","qty*price as xsubtotal");
			$where = " zid = ". Session::get('sbizid') ." and salestype = 'Return' and xdate between '". $fdt ."' and '". $tdt ."'";
		
		return $this->db->select("order_transaction", $fields, $where," order by xsl");
	}
	public function dealerorder($fdt, $tdt){
		$fields=array("invoiceno","shopname","shopadd","prdid","prdname","price","qty","qty*price as xsubtotal");
			$where = " zid = ". Session::get('sbizid') ." and salestype = 'Dealer' and xdate between '". $fdt ."' and '". $tdt ."'";
		
		return $this->db->select("order_transaction", $fields, $where," order by xsl");
	}
	public function dealerreturn($fdt, $tdt){
		$fields=array("invoiceno","shopname","shopadd","prdid","prdname","price","qty","qty*price as xsubtotal");
			$where = " zid = ". Session::get('sbizid') ." and salestype = 'Dealer Return' and xdate between '". $fdt ."' and '". $tdt ."'";
		
		return $this->db->select("order_transaction", $fields, $where," order by xsl");
	}
		public function mrporder($fdt, $tdt){
		$fields=array("invoiceno","shopname","shopadd","prdid","prdname","price","qty","qty*price as xsubtotal");
			$where = " zid = ". Session::get('sbizid') ." and salestype = 'MRP' and xdate between '". $fdt ."' and '". $tdt ."'";
		
		return $this->db->select("order_transaction", $fields, $where," order by xsl");
	}
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	
		
}