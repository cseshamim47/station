<?php 

class Alltada_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}

	public function getApprovalForUser($module){
		$fields = array();
		$where = "zactive = '1' and bizid = ". Session::get('sbizid') ." and xuser='". Session::get('suser') ."' and xmodule='".$module."'" ;	
		return $this->db->select("paapproval", $fields, $where);
	}
		
	public function getPur($fdate, $tdate, $xcat=""){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xtxnnum","zemail","xsup","xproject","(CASE WHEN (xappstatus = 'Confirmed' and xstatus='Pending') THEN 'Checking' WHEN (xappstatus = 'Confirmed' and xstatus='Confirmed') THEN 'Checked' WHEN xappstatus = '1st Approval' THEN '1st Approval' WHEN xappstatus = '2nd Approval' THEN 'Confirmed' WHEN xappstatus = 'Canceled' THEN 'Modified' END) as xappstatus","xpaystatus");
		
		$where = "";
		if($xcat!="")
			$where = "xstatus<>'Created' and xdate between '". $fdate ."' and '". $tdate ."' and xappstatus='".$xcat."' and bizid = ". Session::get('sbizid');	
		else
			$where = "xstatus<>'Created' and xdate between '". $fdate ."' and '". $tdate ."' and bizid = ". Session::get('sbizid');	

		return $this->db->select("tadamst", $fields, $where, " order by xtxnnum");
	}
			
	public function getSingleReq($reqnum){
		//echo $status;
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '".$reqnum."'";	
		return $this->db->select("tadamst", $fields, $where);
	}

	public function getRequisitionByNum($reqnum){
		$fields = array("`b`.`xrow` as `xrow`", "date_format(`b`.`xdate`,'%d/%m/%Y') as `xdate`", "`b`.`xdesc` as `xdesc`", "`b`.`xby` as `xby`", "`b`.`xday` as `xday`", "`b`.`xperson` as `xperson`","`b`.`xamount` as `xamount`");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "`a`.`xtxnnum`=`b`.`xtxnnum` and `a`.`bizid`=`b`.`bizid` and `b`.`xtxnnum`='".$reqnum."'";	// and `a`.`xstatus`='Pending' and `a`.`xappstatus` = '".$status."' 
		return $this->db->select("`tadamst` `a` join `tadadet` `b`", $fields, $where, " order by `b`.`xrow`");
	}
		
	public function getImStockDoc(){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "1=1";	
		return $this->db->select("vimtrndoc", $fields, $where);
	}

	public function getItemList($branch=""){
		$fields = array("xwh","xitemcode", "(select xdesc from seitem where vimstock.bizid=seitem.bizid and vimstock.xitemcode=seitem.xitemcode) as xdesc","xqty");
		$where = " bizid = ". Session::get('sbizid') ." and xqtypo<>0 or xqty<>0 or xqtyso<>0 $branch";	
		return $this->db->select("vimstock", $fields, $where, " order by xitemcode");
	}

	public function getApproval($module, $status){
		$fields = array("xmodule","xlevel","xstatus");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "zactive='1' and xmodule = '". $module ."' and bizid = ". Session::get('sbizid') ." and xlevel=(SELECT xlevel+1 FROM `paapproval` WHERE xstatus='".$status."' limit 1)" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("paapproval", $fields, $where, " group by xlevel");
	}
	public function confirm($postdata,$where){
		
		$this->db->update('billmst', $postdata, $where);
			
	}
	
	public function getMails($module, $status){
		$fields = array("xuser","(SELECT zaltemail from pausers where pausers.zemail=paapproval.xuser) as zaltemail");
		$where = "zactive='1' and xmodule = '". $module ."' and xstatus='".$status."' and bizid = ". Session::get('sbizid') ;
		return $this->db->select("paapproval", $fields, $where);
	}
	
	public function billTotal($reqnum){
	    $fields = array("sum(xamount) as xtotal");
		$where = " xtxnnum = '". $reqnum ."'" ;
		return $this->db->select("tadadet", $fields, $where);
	}
}
