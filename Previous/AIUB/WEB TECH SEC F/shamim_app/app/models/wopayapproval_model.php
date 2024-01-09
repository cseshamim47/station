<?php 

class Wopayapproval_Model extends Model{
	
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
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xtxnnum","xappstatus","xemail","zemail","wonum","(select toname from workorder where workorder.bizid=wopay.bizid and workorder.wonum=wopay.wonum) as toname","(select toorg from workorder where workorder.bizid=wopay.bizid and workorder.wonum=wopay.wonum) as toorg","(select xproject from workorder where workorder.bizid=wopay.bizid and workorder.wonum=wopay.wonum) as xproject","(select xamount from workorder where workorder.bizid=wopay.bizid and workorder.wonum=wopay.wonum) as woamount","(SELECT IFNULL(sum(xprime),0) FROM gldetail w WHERE w.xaccsub=wopay.wonum and xprime > 0) as wopay","xamount");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xappstatus in (select xstatus from paapproval where paapproval.bizid=wopay.bizid and paapproval.xuser='".Session::get('suser')."' and paapproval.xdept=wopay.xdept) and xstatus='Pending'";	
		return $this->db->select("wopay", $fields, $where, " order by xdate");
	}
			
	public function getSingleReq($reqnum){
		$fields = array("*","(select xlevel from paapproval where paapproval.bizid=wopay.bizid and paapproval.xdept=wopay.xdept and paapproval.xstatus=wopay.xappstatus) as xlevel");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '".$reqnum."' and xstatus='Pending' and xappstatus in (select xstatus from paapproval where paapproval.bizid=wopay.bizid and paapproval.xuser='".Session::get('suser')."' and paapproval.xdept=wopay.xdept)";	
		return $this->db->select("wopay", $fields, $where);
	}

	public function getRequisitionByNum($reqnum){
		$fields = array("xdate","xdescription","xqty","xunit","xprice","xremarks","(xqty*xprice) as xamount");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xtxnnum='".$reqnum."'";	
		return $this->db->select("wopaydt", $fields, $where);
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
		
		$this->db->updateConcat('wopay', $updateCode, $where);
			
	}
	
	public function getMails($module, $status){
		$fields = array("xuser","(SELECT zaltemail from pausers where pausers.zemail=paapproval.xuser) as zaltemail");
		$where = "zactive='1' and xmodule = '". $module ."' and xstatus='".$status."' and bizid = ". Session::get('sbizid') ;
		return $this->db->select("paapproval", $fields, $where);
	}
	
	public function billTotal($reqnum){
	    $fields = array("sum(xqty*xprice) as xtotal");
		$where = " xtxnnum = '". $reqnum ."'" ;
		return $this->db->select("wopaydt", $fields, $where);
	}
	
	public function getSupplierPay($txnnum){
		$fields = array("*","(select toname from workorder where workorder.bizid=wopay.bizid and workorder.wonum=wopay.wonum) as toname","(select xproject from workorder where workorder.bizid=wopay.bizid and workorder.wonum=wopay.wonum) as xproject","(select toorg from workorder where workorder.bizid=wopay.bizid and workorder.wonum=wopay.wonum) as toorg");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xtxnnum = '". $txnnum ."' and xstatus='Pending' and xappstatus in (select xstatus from paapproval where paapproval.bizid=wopay.bizid and paapproval.xuser='".Session::get('suser')."' and paapproval.xdept=wopay.xdept)" ;	
		//print_r($this->db->select("somst", $fields, $where));die;
		return $this->db->select("wopay", $fields, $where);
	}
	public function getApprovalLevel($dept){
		$fields = array("max(xlevel) as xlevel");
		$where = "zactive = '1' and bizid = ". Session::get('sbizid') ." and xdept ='". $dept ."'" ;	
		return $this->db->select("paapproval", $fields, $where);
	}
}
