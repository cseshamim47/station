<?php 

class Glrptstatement_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
		
	public function getmatching($st,$type){
		$fields = array("DATE_FORMAT(xdate,'%d-%m-%Y')","xrdin","(select xorg from mlminfo where imsetxn.xrdin=mlminfo.xrdin and imsetxn.bizid=mlminfo.bizid) as xorg","xspotcom as xcom","(xspotcom*xsrctaxpct)/100 as xtax", "xspotcom-((xspotcom*xsrctaxpct)/100) as xtotal");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and stno='". $st ."'";	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("imsetxn", $fields, $where," order by xrdin");
	}
	
	public function withdrawalreq($fdt, $tdt,$type,$bank){
		$fields=array();		
		
		//print_r($this->db->select("pabuziness", $fields));die;
		if ($type=="Cash"){
			$fields = array("DATE_FORMAT(xdate,'%d-%m-%Y')","xrdin","(select xorg from mlminfo where distpaynreq.xrdin=mlminfo.xrdin and distpaynreq.bizid=mlminfo.bizid) as xorg","xamount as xcom","xcost as xtax", "xamount-xcost as xtotal");
			$where = "bizid = ". Session::get('sbizid') ." and xdate between '". $fdt ."' and '". $tdt ."' and xtype='".$type."'";
		}else{			
			$fields = array("DATE_FORMAT(xdate,'%d-%m-%Y')","xrdin","concat((select xorg from mlminfo where distpaynreq.xrdin=mlminfo.xrdin and distpaynreq.bizid=mlminfo.bizid),'- Account:',xaccount,' -Branch') as xorg","xamount as xcom","xcost as xtax", "xamount-xcost as xtotal");
			$where = "bizid = ". Session::get('sbizid') ." and xdate between '". $fdt ."' and '". $tdt ."' and xtype='".$type."' and xbank='".$bank."'";
		}//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("distpaynreq", $fields, $where," order by xdate, xrdin");
	}
	public function getWithdrawlistUnpaid(){
		$fields = array("xrdin","(select xorg from mlminfo where vwithdrawalcashdue.xrdin=mlminfo.xrdin) as xorg","xotn","xamount as xcom", "0 as xtax", "xamount as xtotal");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "  xamount>0" ;	
		//print_r($this->db->select("distpaynreq", $fields, $where," order by xpaynreqnum desc ", $limit));die;
		return $this->db->select("vwithdrawalcashdue", $fields, $where);
	}
	public function getWithdrawlistPaid($fdt, $tdt){
		$fields = array("xrdin","(select xorg from mlminfo where distcashnbankpay.xrdin=mlminfo.xrdin) as xorg","xotn","xamount as xcom", "0 as xtax", "xamount as xtotal");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xdate between '". $fdt ."' and '". $tdt ."'" ;	
		//print_r($this->db->select("distpaynreq", $fields, $where," order by xpaynreqnum desc ", $limit));die;
		return $this->db->select("distcashnbankpay", $fields, $where);
	}
	public function dailyreq($fdt, $tdt){
		$fields = array("DATE_FORMAT(xdate,'%d-%m-%Y')","xrdin","xreqby","xrate as xcom","xqty as xtax", "xrate*xqty as xtotal");
		//print_r($this->db->select("pabuziness", $fields));die;		
			$where = "bizid = ". Session::get('sbizid') ." and xdate between '". $fdt ."' and '". $tdt ."'";
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vimreqdet", $fields, $where," order by xdate, xrdin");
	}
	public function sttotalpoint($fstno, $tstno){
		$fields = array("sum(centerpoint) as totalpoint");
			
			$where = " bizid = ". Session::get('sbizid') ." and stno between '". $fstno ."' and '". $tstno ."'";
		
		return $this->db->select("mlmtree", $fields, $where);
	}
	public function trialbalopening($fdate, $project=""){
		$whrproject = "";
		if($project!=""){
			$whrproject = " and xsite='".$project."'";
		}
		$fields = array("xacc","xaccdesc","(if(sum(xprime)>=0, sum(xprime), 0)) as opdramt","(if(sum(xprime)<=0, sum(xprime), 0)) as opcramt","0 as opdramtcur","0 as opcramtcur");
		$where = " bizid = ". Session::get('sbizid') ." and xstatus='Balanced' and xdate<'". $fdate ."'".$whrproject." group by xacc,xaccdesc";
		return $this->db->select("gldetailview", $fields, $where);
	}
	public function trialbalcur($fdate,$tdate, $project=""){
		$whrproject = "";
		if($project!=""){
			$whrproject = " and xsite='".$project."'";
		}
		$fields = array("xacc","xaccdesc","0 as opdramt","0 as opcramt","(if(sum(xprime)>=0, sum(xprime), 0)) as opdramtcur","(if(sum(xprime)<=0, sum(xprime), 0)) as opcramtcur");
		$where = " bizid = ". Session::get('sbizid') ." and xstatus='Balanced' and xdate between '". $fdate ."' and '". $tdate ."'".$whrproject." group by xacc";
		return $this->db->select("gldetailview", $fields, $where);
	}

	public function rcptpaybalopening($fdate, $project=""){
		$whrproject = "";
		if($project!=""){
			$whrproject = " and xsite='".$project."'";
		}
		$fields = array("xaccusage","sum(xprime) as xprime");
		$where = " bizid = ". Session::get('sbizid') ." and xdate<'". $fdate ."'".$whrproject." group by xaccusage";
		return $this->db->select("vrecnpaycb", $fields, $where);
	}
	public function rcptpaybalclosing($tdate, $project=""){
		$whrproject = "";
		if($project!=""){
			$whrproject = " and xsite='".$project."'";
		}
		$fields = array("xaccusage","sum(xprime) as xprime");
		$where = " bizid = ". Session::get('sbizid') ." and xdate<='". $tdate ."'".$whrproject." group by xaccusage";
		return $this->db->select("vrecnpaycb", $fields, $where);
	}
	public function tblvaluesrcptpay($fdate,$tdate,$project=""){
		$whrproject = "";
		if($project!=""){
			$whrproject = " and xsite='".$project."'";
		}
		$fields = array("xacc","xaccdesc","sum(xprime) as xprime");
		$where = " bizid = ". Session::get('sbizid') ."  and xdate between '". $fdate ."' and '". $tdate ."'".$whrproject." group by xacc,xaccdesc";
		return $this->db->select("vrecnpay", $fields, $where);
	}
/*
	public function plopening($xyear, $xper, $type, $project=""){
		$whrproject = "";
		if($project!=""){
			$whrproject = " and xsite='".$project."'";
		}
		$fields = array("xacc","xaccdesc","sum(xprime) as opamt", "0 as xcuramt");
		$where = " bizid = ". Session::get('sbizid') ." and xstatus='Balanced'".$whrproject." and xacctype='".$type."' and xyear=". $xyear ." and xper<". $xper ." group by xacc,xaccdesc";
		return $this->db->select("gldetailview", $fields, $where);
	}
	public function plcur($xyear, $xper, $type, $project=""){
		$whrproject = "";
		if($project!=""){
			$whrproject = " and xsite='".$project."'";
		}
		$fields = array("xacc","xaccdesc","0 as opamt", "sum(xprime) as xcuramt");
		$where = " bizid = ". Session::get('sbizid') ." and xstatus='Balanced'".$whrproject." and xacctype='".$type."' and xyear=". $xyear ." and xper=". $xper ." group by xacc,xaccdesc";
		return $this->db->select("gldetailview", $fields, $where);
	}*/
	public function getopeningstock($fdate){
		$fields = array("COALESCE(sum((xqty*xsign)*xstdcost),0) as opstock");
		$where = " bizid = ". Session::get('sbizid') ."  and xdate<'". $fdate ."'";

		return $this->db->select("vimtrn", $fields, $where);
	}
	public function getclosingstock(){
		$fields = array("COALESCE(sum((xqty*xsign)*xstdcost),0) as clstock");
		$where = " bizid = ". Session::get('sbizid');
		return $this->db->select("vimtrn", $fields, $where);
	}
	public function plopeningbydate($fdate, $type, $project=""){
		$whrproject = "";
		if($project!=""){
			$whrproject = " and xsite='".$project."'";
		}
		$fields = array("xacc","xaccdesc","sum(xprime) as opamt", "0 as xcuramt");
		$where = " bizid = ". Session::get('sbizid') ." and xstatus='Balanced'".$whrproject." and xacctype='".$type."' and xdate<'". $fdate ."' group by xacc,xaccdesc";
		return $this->db->select("gldetailview", $fields, $where);
	}
	public function plcurbydate($fdate, $tdate, $type, $project=""){
		$whrproject = "";
		if($project!=""){
			$whrproject = " and xsite='".$project."'";
		}
		$fields = array("xacc","xaccdesc","0 as opamt", "sum(xprime) as xcuramt");
		$where = " bizid = ". Session::get('sbizid') ." and xstatus='Balanced'".$whrproject." and xacctype='".$type."' and xdate between '". $fdate ."' and '". $tdate ."' group by xacc,xaccdesc";
		return $this->db->select("gldetailview", $fields, $where);
	}
	public function bsopening($fdate, $type){
		$fields = array("xacc","xaccdesc","sum(xprime) as opamt", "0 as xcuramt");
		$where = " bizid = ". Session::get('sbizid') ." and xstatus='Balanced' and xacctype='".$type."' and xdate<'". $fdate ."' group by xacc,xaccdesc";
		return $this->db->select("gldetailview", $fields, $where);
	}
	public function bscur($fdate, $tdate, $type){
		$fields = array("xacc","xaccdesc","0 as opamt", "sum(xprime) as xcuramt");
		$where = " bizid = ". Session::get('sbizid') ." and xstatus='Balanced' and xacctype='".$type."' and xdate between '". $fdate ."' and '". $tdate ."' group by xacc,xaccdesc";
		//print_r($this->db->select("gldetailview", $fields, $where)); die;

		return $this->db->select("gldetailview", $fields, $where);
	}
	private function bsincomeop($fdate){
		$fields = array("sum(xprime) as pofitbf");
		$where = " bizid = ". Session::get('sbizid') ." and xstatus='Balanced' and xacctype in ('Income') and xdate<'". $fdate ."'";
		return $this->db->select("gldetailview", $fields, $where);
	}
	private function bsexpenseop($fdate){
		$fields = array("sum(xprime) as pofitbf");
		$where = " bizid = ". Session::get('sbizid') ." and xstatus='Balanced' and xacctype in ('Expenditure') and xdate<'". $fdate ."'";
		return $this->db->select("gldetailview", $fields, $where);
	}
	public function profitbf($fdate){
		$income = $this->bsincomeop($fdate)[0]['pofitbf'];
		$expense = $this->bsexpenseop($fdate)[0]['pofitbf'];
		$opstock = $this->getopeningstock($fdate)[0]['opstock'];
		$result = $income-$opstock+$expense;
		return $result;
	}
	private function bsincomecur($fdate, $tdate){
		$fields = array("sum(xprime) as pofitbf");
		$where = " bizid = ". Session::get('sbizid') ." and xstatus='Balanced' and xacctype in ('Income') and xdate between '". $fdate ."' and '". $tdate ."'";
		return $this->db->select("gldetailview", $fields, $where);
	}
	private function bsexpensecur($fdate, $tdate){
		$fields = array("sum(xprime) as pofitbf");
		$where = " bizid = ". Session::get('sbizid') ." and xstatus='Balanced' and xacctype in ('Expenditure') and xdate between '". $fdate ."' and '". $tdate ."'";
		return $this->db->select("gldetailview", $fields, $where);
	}
	public function profitcr($fdate, $tdate){
		$income = $this->bsincomecur($fdate, $tdate)[0]['pofitbf'];
		$expense = $this->bsexpensecur($fdate, $tdate)[0]['pofitbf'];
		$opstock = $this->getclosingstock()[0]['clstock'];
		$result = $income-$opstock+$expense;
		return $result;
	}
	public function customerbal(){
		$fields = array("xaccsub","(select xorg from secus where vcustomerbal.bizid=secus.bizid and vcustomerbal.xaccsub=secus.xcus) as xorg",
		"(select xadd1 from secus where vcustomerbal.bizid=secus.bizid and vcustomerbal.xaccsub=secus.xcus) as xadd1",
		"(select xmobile from secus where vcustomerbal.bizid=secus.bizid and vcustomerbal.xaccsub=secus.xcus) as xmobile","xbal");
		$where = " bizid = ". Session::get('sbizid');
		return $this->db->select("vcustomerbal", $fields, $where);
	}
	public function supplierbal(){
		$fields = array("xaccsub","(select xorg from sesup where vsupplierbal.bizid=sesup.bizid and vsupplierbal.xaccsub=sesup.xsup) as xorg",
		"(select xadd1 from sesup where vsupplierbal.bizid=sesup.bizid and vsupplierbal.xaccsub=sesup.xsup) as xadd1",
		"(select xmobile from sesup where vsupplierbal.bizid=sesup.bizid and vsupplierbal.xaccsub=sesup.xsup) as xmobile","if(xbal<0, abs(xbal), xbal) as xbal");
		$where = " bizid = ". Session::get('sbizid');
		return $this->db->select("vsupplierbal", $fields, $where);
	}
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	
	
	
}