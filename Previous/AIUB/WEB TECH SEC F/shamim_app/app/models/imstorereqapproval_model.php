<?php 

class Imstorereqapproval_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function getApprovalForUser(){
		$fields = array();
		$where = "zactive = '1' and bizid = ". Session::get('sbizid') ." and xuser='". Session::get('suser') ."'" ;	
		return $this->db->select("paapproval", $fields, $where);
	}		
	public function getStoreReq($appstatus){
		$fields = array("date_format(xdate, '%d %M %Y') as xdate","ximreqnum","zemail","xtype","xappstatus", "xemail");
		$where = " bizid = ". Session::get('sbizid') ." and xappstatus = '".$appstatus."' and xstatus='Pending'";
		return $this->db->select("imstorereq", $fields, $where, " order by ximreqnum");
	}			
	public function getSingleReq($reqnum, $appstatus){
		$fields = array("*");
		$where = " bizid = ". Session::get('sbizid') ." and ximreqnum = '".$reqnum."' and xstatus='Pending' and xappstatus = '".$appstatus."'";	
		return $this->db->select("imstorereq", $fields, $where);
	}
	public function getRequisitionByNum($reqnum, $appstatus){
		$fields = array("`a`.`ximreqnum` as `ximreqnum`", "`b`.`xitemcode` as `xitemcode`", "(SELECT xdesc from seitem where seitem.xitemcode=b.xitemcode and seitem.bizid=b.bizid) as xdesc", "`b`.`xwh` as `xwh`", "`b`.`xqty` as `xqty`");
		$where = "`a`.`ximreqnum`=`b`.`ximreqnum` and `a`.`bizid`=`b`.`bizid` and `a`.`xstatus`='Pending' and `a`.`xappstatus` = '".$appstatus."' and `b`.`ximreqnum`='".$reqnum."'";	
		return $this->db->select("`imstorereq` `a` join `imstorereqdet` `b`", $fields, $where, " order by ximreqnum");
	}		
	public function getImStockDoc(){
		$fields = array();
		$where = "1=1";	
		return $this->db->select("vimtrndoc", $fields, $where);
	}
	public function getItemList($branch=""){
		$fields = array("xwh","xitemcode", "(select xdesc from seitem where vimstock.bizid=seitem.bizid and vimstock.xitemcode=seitem.xitemcode) as xdesc","xqty");
		$where = " bizid = ". Session::get('sbizid') ." and xqtypo<>0 or xqty<>0 or xqtyso<>0 $branch";	
		return $this->db->select("vimstock", $fields, $where, " order by xitemcode");
	}
	public function getApproval($dept, $level){
		$fields = array();
		$where = "zactive='1' and bizid = ". Session::get('sbizid') ." and xdept = '".$dept."' and xlevel = ".$level."" ;
		return $this->db->select("paapproval", $fields, $where);
	}
	public function confirm($postdata,$where){
		$this->db->update('imstorereq', $postdata, $where);
	}
	public function confirmConcat($updateCode,$where){
		$this->db->updateConcat('imstorereq', $updateCode, $where);
	}
	public function getReq($num){
		$fields = array("*");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and ximreqnum = '". $num ."'" ;	
		//print_r($this->db->select("somst", $fields, $where));die;
		return $this->db->select("vimstorereqdet", $fields, $where);
	}
	public function getImreq($reqnum){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximreqnum = '". $reqnum ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("imstorereq", $fields, $where);
	}
	public function getimreqdt($reqnum){
		$fields = array("xrow","xitemcode", "(select xdesc from seitem where imstorereqdet.bizid=seitem.bizid and imstorereqdet.xitemcode=seitem.xitemcode) as xitemdesc", "xqty", "(select xunitstk from seitem where imstorereqdet.bizid=seitem.bizid and imstorereqdet.xitemcode=seitem.xitemcode) as xunitstk",
		"xrate","xqty*xrate as xsalestotal" );
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximreqnum = '". $reqnum ."'";	
		return $this->db->select("imstorereqdet", $fields, $where, " order by xrow");
	}
}
