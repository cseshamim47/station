<?php 

class Tadaapproval_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}

	public function getApprovalForUser(){
		$fields = array();
		$where = "zactive = '1' and bizid = ". Session::get('sbizid') ." and xuser='". Session::get('suser') ."'" ;	
		return $this->db->select("paapproval", $fields, $where);
	}
		
	public function getPur(){
		//echo $status;
		$fields = array("date_format(xdate, '%d %M %Y') as xdate","xtxnnum","zemail","xsup","xappstatus","xemail");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xappstatus in (select xstatus from paapproval where paapproval.bizid=tadamst.bizid and paapproval.xuser='".Session::get('suser')."' and paapproval.xdept=tadamst.xdept) and xstatus='Pending'";		
		return $this->db->select("tadamst", $fields, $where, " order by xtxnnum");
	}
			
	public function getSingleReq($reqnum){
		$fields = array("*","(select xlevel from paapproval where paapproval.bizid=tadamst.bizid and paapproval.xdept=tadamst.xdept and paapproval.xstatus=tadamst.xappstatus) as xlevel");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '".$reqnum."' and xstatus='Pending' and xappstatus in (select xstatus from paapproval where paapproval.bizid=tadamst.bizid and paapproval.xuser='".Session::get('suser')."' and paapproval.xdept=tadamst.xdept)";
		return $this->db->select("tadamst", $fields, $where);
	}

	public function getRequisitionByNum($reqnum){
		$fields = array("`b`.`xrow` as `xrow`", "date_format(`b`.`xdate`,'%d/%m/%Y') as `xdate`", "`b`.`xdesc` as `xdesc`", "`b`.`xby` as `xby`", "`b`.`xday` as `xday`", "`b`.`xperson` as `xperson`","`b`.`xamount` as `xamount`");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "`a`.`xtxnnum`=`b`.`xtxnnum` and `a`.`bizid`=`b`.`bizid` and `a`.`xstatus`='Pending' and `a`.`xappstatus` in (select xstatus from paapproval where paapproval.bizid=`a`.`bizid` and paapproval.xuser='".Session::get('suser')."' and paapproval.xdept=`a`.`xdept`) and `b`.`xtxnnum`='".$reqnum."'";	
		return $this->db->select("`tadamst` `a` join `tadadet` `b`", $fields, $where, " order by `b`.`xrow`");
	}
		
	public function getImStockDoc(){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "1=1";	
		return $this->db->select("vimtrndoc", $fields, $where);
	}

	public function getApproval($dept, $level){
		$fields = array();
		$where = "zactive='1' and bizid = ". Session::get('sbizid') ." and xdept = '".$dept."' and xlevel = ".$level."" ;
		return $this->db->select("paapproval", $fields, $where);
	}
	public function confirm($postdata,$where){
		
		$this->db->update('tadamst', $postdata, $where);
			
	}
	public function confirmConcat($updateCode,$where){
		
		$this->db->updateConcat('tadamst', $updateCode, $where);
			
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
	public function getApprovalLevel($dept){
		$fields = array("max(xlevel) as xlevel");
		$where = "zactive = '1' and bizid = ". Session::get('sbizid') ." and xdept ='". $dept ."'" ;	
		return $this->db->select("paapproval", $fields, $where);
	}
}
