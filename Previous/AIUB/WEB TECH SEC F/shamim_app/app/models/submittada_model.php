<?php 

class Submittada_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}

	public function getSOStatus($sonum){
		$fields = array("xstatus","xcomment");
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xtxnnum = '". $sonum ."'";	
		return $this->db->select("tadamst", $fields, $where);
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	public function getRow($table,$keyfield,$num, $xrow){
		
		return $this->db->rowIncrement($table,$keyfield,$num, $xrow);
	}
	public function create($mcols, $mvals, $cols, $vals){
		$mresults = $this->db->insertMultipleDetail('tadamst',$mcols,$mvals," ON DUPLICATE KEY UPDATE xdate = VALUES(xdate),xsup = VALUES(xsup),xmobile = VALUES(xmobile),xproject = VALUES(xproject),xcomment = VALUES(xcomment)");
		$results = $this->db->insertMultipleDetail('tadadet',$cols,$vals," ON DUPLICATE KEY UPDATE xdate = VALUES(xdate),xdesc = VALUES(xdesc), xby = VALUES(xby), xday = VALUES(xday), xperson = VALUES(xperson), xamount = VALUES(xamount), xper = VALUES(xper), xyear = VALUES(xyear)");
		
		return $mresults;	
	}
	public function recdelete($where){
		$this->db->dbdelete('tadadet', $where);
	}
	public function getBill($sonum){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xtxnnum = '". $sonum ."'" ;	
		return $this->db->select("tadamst", $fields, $where);
	}
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	public function confirm($postdata,$where){
		
		$this->db->update('tadamst', $postdata, $where);
			
	}	
	public function getBillMst($sonum){
		$fields = array("xtxnnum","date_format(xdate,'%d/%m/%Y') as xdate","xsup","xproject","xstatus","xcomment","xappstatus");
		$where = "xrecflag='Live' and xtxnnum= '".$sonum."' and zemail='".Session::get('suser')."'";	
		echo json_encode($this->db->select("`tadamst`", $fields, $where));
	}
	
	public function getBillDet($sonum){
		$fields = array("date_format(xdate,'%d/%m/%Y') as xdate","xdesc","xby","xday","xperson","xamount","xrow");
		$where = "`bizid` = ".Session::get('sbizid')." and `xtxnnum`= '".$sonum."'";	
		echo json_encode($this->db->select("`tadadet`", $fields, $where));
	}
	public function getBillList($status){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xtxnnum","xsup","xproject","xcomment");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and zemail='".Session::get('suser')."' and xstatus='".$status."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		echo json_encode($this->db->select("tadamst", $fields, $where));
	}

	public function getApproval(){
		$fields = array("xlevel","xstatus");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "zactive='1' and xdept = '". Session::get('srole') ."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("paapproval", $fields, $where, " order by xlevel limit 1");
	}
	public function getData(){
		$fields = array("xdesc","xcat");
		//$where = " xitemcode like '%".$code."%' or xdesc LIKE '%".$code."%'";	
		$where = "bizid = ". Session::get('sbizid');
		$ar = $this->db->select("tadadet", $fields, $where, " group by xdesc");
		$return_arr = array();
		foreach($ar as $k=>$v) {
			$return_a = array("xitemcode"=>$v['xdesc']);
			array_push($return_arr, $return_a);
		  }
		  echo json_encode($return_arr);
	}
	public function getBillForPrint($sonum){
		$fields = array("`b`.`xtxnnum` as `xtxnnum`","date_format(`b`.`xdate`,'%d/%m/%Y') as `mstdate`","date_format(`c`.`xdate`,'%d/%m/%Y') as `xdate`","`b`.`xsup` as `xsup`","`b`.`xproject` as `xproject`", "`b`.`zemail` as `zemail`","`c`.`xrow` as `xrow`","`c`.`xdesc` as `xdesc`","`c`.`xby` as `xby`","`c`.`xday` as `xday`","`c`.`xperson` as `xperson`","`c`.`xamount` as `xamount`");
		$where = "`b`.`bizid` = `c`.`bizid` and `b`.`xtxnnum`= '".$sonum."' and `b`.`xtxnnum` = `c`.`xtxnnum`";	
		echo json_encode($this->db->select("`tadamst` `b` join `tadadet` `c`", $fields, $where));
	}
	
	public function getMails($module, $status){
		$fields = array("xuser","(SELECT zaltemail from pausers where pausers.zemail=paapproval.xuser) as zaltemail");
		$where = "zactive='1' and xmodule = '". $module ."' and xstatus='".$status."' and bizid = ". Session::get('sbizid') ;
		return $this->db->select("paapproval", $fields, $where);
	}
}







