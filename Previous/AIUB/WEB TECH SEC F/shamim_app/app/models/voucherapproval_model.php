<?php 

class Voucherapproval_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}

	public function getApprovalForUser($module){
		$fields = array();
		$where = "zactive = '1' and bizid = ". Session::get('sbizid') ." and xuser='". Session::get('suser') ."' and xmodule='".$module."'" ;	
		return $this->db->select("paapproval", $fields, $where);
	}
		
	public function getPur($appstatus){
		// echo $appstatus;
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xvoucher","zemail","xnarration","xsite","xemail");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xstatusjv='Pending'  and xappstatus='".$appstatus."'";//  and xappstatus='".$appstatus."'
		//echo $where;
		return $this->db->select("glheader", $fields, $where, " order by xdate");
	}
			
	public function getSingleReq($reqnum, $appstatus){
		//echo $status;
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xvoucher = '".$reqnum."' and xappstatus='".$appstatus."'";//  and xappstatus='".$appstatus."'
		return $this->db->select("glheader", $fields, $where);
	}

	public function getRequisitionByNum($reqnum, $status){
		$fields = array("`a`.`xtxnnum` as `xtxnnum`", "date_format(`b`.`xdate`,'%d/%m/%Y') as `xdate`", "`b`.`xcat` as `xcat`", "`b`.`xdesc` as `xdesc`", "`b`.`xquality` as `xquality`", "`b`.`xprice` as `xprice`", "`b`.`xqty` as `xqty`","(`b`.`xprice`*`b`.`xqty`) as xtotal", "`b`.`xremarks` as `xremarks`");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "`a`.`xtxnnum`=`b`.`xtxnnum` and `a`.`bizid`=`b`.`bizid` and `a`.`xstatus`='Pending' and `a`.`xappstatus` = '".$status."' and `b`.`xtxnnum`='".$reqnum."'";
		//$where = " bizid = ". Session::get('sbizid') ." and xappstatus = '".$status."' and xstatus='Pending'";	
		return $this->db->select("`billmst` `a` join `billdet` `b`", $fields, $where, " order by xtxnnum");
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
	public function confirmConcat($updateCode,$where){
		
		$this->db->updateConcat('billmst', $updateCode, $where);
			
	}
	
	public function getMails($module, $status){
		$fields = array("xuser","(SELECT zaltemail from pausers where pausers.zemail=paapproval.xuser) as zaltemail");
		$where = "zactive='1' and xmodule = '". $module ."' and xstatus='".$status."' and bizid = ". Session::get('sbizid') ;
		return $this->db->select("paapproval", $fields, $where);
	}
	
	public function billTotal($reqnum){
	    $fields = array("sum(xprice*xqty) as xtotal");
		$where = " xtxnnum = '". $reqnum ."'" ;
		return $this->db->select("billdet", $fields, $where);
	}

	public function getvoucherdt($voucher){
		$fields = array("xrow","xacc", "xaccdesc", "xaccsub","xaccsubdesc", "(select if (xprime>0,xprime,'0')) as xprimedr", "(select if (xprime<0,abs(xprime),'0')) as xprimecr");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xvoucher = '". $voucher ."'";	
		return $this->db->select("gldetailview", $fields, $where, " order by xrow");
	}
}
