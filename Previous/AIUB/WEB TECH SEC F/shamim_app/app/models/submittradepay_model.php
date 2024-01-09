<?php 

class Submittradepay_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}

	public function getSOStatus($sonum){
		$fields = array("xstatus");
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xtxnnum = '". $sonum ."'";	
		return $this->db->select("payments", $fields, $where);
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	public function getRow($table,$keyfield,$num, $xrow){
		
		return $this->db->rowIncrement($table,$keyfield,$num, $xrow);
	}
	public function create($mcols, $mvals, $cols, $vals){
		$mresults = $this->db->insertMultipleDetail('billmst',$mcols,$mvals," ON DUPLICATE KEY UPDATE xdate = VALUES(xdate),xsup = VALUES(xsup),xproject = VALUES(xproject)");
		$results = $this->db->insertMultipleDetail('billdet',$cols,$vals," ON DUPLICATE KEY UPDATE xdate = VALUES(xdate),xdesc = VALUES(xdesc), xquality = VALUES(xquality), xprice = VALUES(xprice), xqty = VALUES(xqty), xremarks = VALUES(xremarks), xper = VALUES(xper), xyear = VALUES(xyear), xcat = VALUES(xcat)");
		
		return $mresults;	
	}
	public function recdelete($where){
		$this->db->dbdelete('billdet', $where);
	}
	public function getBill($sonum){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xtxnnum = '". $sonum ."'" ;	
		return $this->db->select("billmst", $fields, $where);
	}
	public function getsalesForConfirm($sonum){
		$fields = array("xrow","xcus","xgrossdisc","xrcvamt","xpackcharge","xtranscost",
		"xitemcode","(select xdesc from seitem where vsalesdt.bizid=seitem.bizid and vsalesdt.xitemcode=seitem.xitemcode) as xitemdesc","xqty", "xrate","xqty*xrate*xexch as ta","xqty*(xtaxrate*xrate*xexch/100) as tt","xdisc as id" );
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '". $sonum ."'";	
		return $this->db->select("vsalesdt", $fields, $where, " order by xrow");
	}
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	public function confirm($postdata,$where){
		
		$this->db->update('billmst', $postdata, $where);
			
	}	
	public function getBillMst($sonum){
		$fields = array("xtxnnum","date_format(xdate,'%d/%m/%Y') as xdate","xsup","xproject","xstatus");
		$where = "xrecflag='Live' and xtxnnum= '".$sonum."' and zemail='".Session::get('suser')."'";	
		echo json_encode($this->db->select("`billmst`", $fields, $where));
	}
	
	public function getBillDet($sonum){
		$fields = array("date_format(xdate,'%d/%m/%Y') as xdate","xcat","xdesc","xquality","xprice","xqty","(xprice*xqty) as xtotal","xremarks","xrow");
		$where = "`bizid` = ".Session::get('sbizid')." and `xtxnnum`= '".$sonum."'";	
		echo json_encode($this->db->select("`billdet`", $fields, $where));
	}
	public function getBillList($status){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xtxnnum","xsup","xproject");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and zemail='".Session::get('suser')."' and xstatus='".$status."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		echo json_encode($this->db->select("billmst", $fields, $where));
	}

	public function getApproval($module){
		$fields = array("xmodule","xlevel","xstatus");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "zactive='1' and xmodule = '". $module ."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("paapproval", $fields, $where, " order by xlevel limit 1");
	}
	public function getData(){
		$fields = array("xdesc","xcat");
		//$where = " xitemcode like '%".$code."%' or xdesc LIKE '%".$code."%'";	
		$where = "bizid = ". Session::get('sbizid');
		$ar = $this->db->select("billdet", $fields, $where, " group by xdesc");
		$return_arr = array();
		foreach($ar as $k=>$v) {
			$return_a = array("xitemcode"=>$v['xdesc']);
			array_push($return_arr, $return_a);
		  }
		  echo json_encode($return_arr);
	}
	public function getBillForPrint($sonum){
		$fields = array("`b`.`xtxnnum` as `xtxnnum`","date_format(`b`.`xdate`,'%d/%m/%Y') as `mstdate`","date_format(`c`.`xdate`,'%d/%m/%Y') as `xdate`","`b`.`xsup` as `xsup`","`b`.`xproject` as `xproject`", "`b`.`zemail` as `zemail`","`c`.`xrow` as `xrow`","`c`.`xdesc` as `xdesc`","`c`.`xquality` as `xquality`","`c`.`xprice` as `xprice`","`c`.`xqty` as `xqty`","(`c`.`xprice`*`c`.`xqty`) as xtotal","`c`.`xremarks` as `xremarks`","`c`.`xcat` as `xcat`","`c`.`xper` as `xper`");
		$where = "`b`.`bizid` = `c`.`bizid` and `b`.`xtxnnum`= '".$sonum."' and `b`.`xtxnnum` = `c`.`xtxnnum`";	
		echo json_encode($this->db->select("`billmst` `b` join `billdet` `c`", $fields, $where));
	}
	
	public function getMails($module, $status){
		$fields = array("xuser","(SELECT zaltemail from pausers where pausers.zemail=paapproval.xuser) as zaltemail");
		$where = "zactive='1' and xmodule = '". $module ."' and xstatus='".$status."' and bizid = ". Session::get('sbizid') ;
		return $this->db->select("paapproval", $fields, $where);
	}
}







