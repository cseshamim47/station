<?php 

class Supayapproval_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}

	public function getApprovalForUser($module){
		$fields = array();
		$where = "zactive = '1' and bizid = ". Session::get('sbizid') ." and xuser='". Session::get('suser') ."' and xmodule='".$module."'" ;	
		return $this->db->select("paapproval", $fields, $where);
	}
		
	public function getPur($status){
		//echo $status;
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xtxnnum","xemail","zemail","xponum","xsup","(select xorg from sesup where sesup.bizid=supplierpay.bizid and sesup.xsup=supplierpay.xsup) as xorg","xpobal","xamount");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xappstatus = '".$status."' and xstatus='Pending'";	
		return $this->db->select("supplierpay", $fields, $where, " order by xdate");
	}
			
	public function getSingleReq($reqnum, $appstatus){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '".$reqnum."' and xstatus='Pending' and xappstatus='".$appstatus."'";	
		return $this->db->select("supplierpay", $fields, $where);
	}

	public function getRequisitionByNum($reqnum, $status){
		$fields = array("`b`.`xrow` as `xrow`", "date_format(`b`.`xdate`,'%d/%m/%Y') as `xdate`", "`b`.`xdesc` as `xdesc`", "`b`.`xby` as `xby`", "`b`.`xday` as `xday`", "`b`.`xperson` as `xperson`","`b`.`xamount` as `xamount`");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "`a`.`xtxnnum`=`b`.`xtxnnum` and `a`.`bizid`=`b`.`bizid` and `a`.`xstatus`='Pending' and `a`.`xappstatus` = '".$status."' and `b`.`xtxnnum`='".$reqnum."'";	
		return $this->db->select("`tadamst` `a` join `tadadet` `b`", $fields, $where, " order by `b`.`xrow`");
	}
		
	public function getImStockDoc(){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "1=1";	
		return $this->db->select("vimtrndoc", $fields, $where);
	}

	public function getApproval($module, $status){
		$fields = array("xmodule","xlevel","xstatus");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "zactive='1' and xmodule = '". $module ."' and bizid = ". Session::get('sbizid') ." and xlevel=(SELECT xlevel+1 FROM `paapproval` WHERE xstatus='".$status."' limit 1)" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("paapproval", $fields, $where, " group by xlevel");
	}
	public function confirm($postdata,$where){
		
		$this->db->update('tadamst', $postdata, $where);
			
	}
	public function confirmConcat($updateCode,$where){
		
		$this->db->updateConcat('supplierpay', $updateCode, $where);
			
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
