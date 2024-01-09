<?php 

class Billandtada_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
		
		// $fields = array("xwh", "xitemcode", "(select xdesc from seitem where vimstock.bizid=seitem.bizid and vimstock.xitemcode=seitem.xitemcode) as xdesc","qtygrn","TRUNCATE(balgrn,2)","qtyreturn","TRUNCATE(balreturn,2)","qtydret","TRUNCATE(baldret,2)","qtyso","TRUNCATE(balso,2)","qtyfree","TRUNCATE(balfree,2)","qtyreject","TRUNCATE(balreject,2)","xqty","TRUNCATE((balgrn-balreturn+baldret-balso-balfree-balreject),2) as baltotal");
	public function getBillTada($branch="", $doctype){
		$gwhere = "";
		if($doctype!="")
			$gwhere .= " and xdoctype='".$doctype."' ";

		$fields = array("xdoctype", "date_format(xdate, '%d-%m-%Y') as xdate", "xtxnnum", "xproject","zemail","total");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xpaystatus = 'Pending' and bizid = ". Session::get('sbizid') ." ".$gwhere;	
		return $this->db->select("vbillandtada", $fields, $where, " order by xdate");
	}
	// and (`nnservice`.`billmst`.`xpaystatus` = 'Pending')
	public function getBillTadaPaid($branch="", $doctype){
		$gwhere = "";
		if($doctype!="")
			$gwhere .= " and xdoctype='".$doctype."' ";

		$fields = array("xdoctype", "date_format(xdate, '%d-%m-%Y') as xdate", "xtxnnum", "xproject","zemail","total","(SELECT xvoucher from glheader where glheader.xdocnum=vbillandtada.xtxnnum) as xvoucher");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xpaystatus = 'Paid' and bizid = ". Session::get('sbizid') ." ".$gwhere;
		
		return $this->db->select("vbillandtada", $fields, $where, " order by xdate");
	}

	public function UpdateBillOrTada($txn, $table){
		$results = array(
			"xpaystatus"=>"Paid",
			"paidby"=>Session::get('suser')
			);
			
		$where = " bizid = ". Session::get('sbizid') ." and xtxnnum= '". $txn."' and xstatus='Confirmed' and xpaystatus='Pending'";
		return $this->db->update($table, $results, $where);
	}

	public function getAccDetail($acc){
		return $this->db->select("glchart", array(), " xrecflag='Live' and xacc='".$acc."' and bizid = ". Session::get('sbizid'));
	}

	public function getBillMst($txn){
		return $this->db->select("billmst", array(), " xtxnnum='".$txn."' and xstatus='Confirmed' and xpaystatus='Pending' and bizid = ". Session::get('sbizid'));
	}

	public function getTadaMst($txn){
		return $this->db->select("tadamst", array("*", "(SELECT sum(xamount) FROM tadadet where tadadet.xtxnnum=tadamst.xtxnnum) as total"), " xtxnnum='".$txn."' and xstatus='Confirmed' and xpaystatus='Pending' and bizid = ". Session::get('sbizid'));
	}

	public function getBillDt($txn){
		return $this->db->select("billdet", array(), " xtxnnum='".$txn."' and bizid = ". Session::get('sbizid'));
	}
	
	public function getTadaDt($txn){
		return $this->db->select("tadadet", array(), " xtxnnum='".$txn."' and bizid = ". Session::get('sbizid'));
	}
	public function getKeyValue($table,$keyfield,$prefix,$num){
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	public function create($data, $dtcols, $dtdata){
		//print_r($data); die;	
		$mstdata = array(
			"bizid"=>$data['bizid'],
			"xvoucher"=>$data['xvoucher'],
			"xnarration"=>$data['xnarration'],
			"xlong"=>$data['xlong'],
			"xyear"=>$data['xyear'],
			"xper"=>$data['xper'],
			"xstatusjv"=>$data['xstatusjv'],
			"xbranch" => $data['xbranch'],
			"xdoctype" => $data['xdoctype'],
			"xdocnum" => $data['xdocnum'],
			"xsite" => $data['xsite'],
			"xdate" => $data['xdate'],
			"zemail"=>$data['zemail'],		
			"xemail"=>$data['xemail'],
			"xmanager"=>$data['xmanager']
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and xvoucher ='" . $data['xvoucher'] ."'";
		$results = $this->db->insertMasterDetail('glheader',$mstdata,"gldetail",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	public function getSingleBill($reqnum){
		//echo $status;
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '".$reqnum."'";	
		return $this->db->select("billmst", $fields, $where);
	}
	
	public function billTotal($reqnum){
	    $fields = array("sum(xprice*xqty) as xtotal");
		$where = " xtxnnum = '". $reqnum ."'" ;
		return $this->db->select("billdet", $fields, $where);
	}

	public function getBillByNum($reqnum){
		$fields = array("`b`.`xrow` as `xrow`", "date_format(`b`.`xdate`,'%d/%m/%Y') as `xdate`", "`b`.`xcat` as `xcat`", "`b`.`xdesc` as `xdesc`", "`b`.`xquality` as `xquality`", "`b`.`xprice` as `xprice`", "`b`.`xqty` as `xqty`","(`b`.`xprice`*`b`.`xqty`) as xtotal", "`b`.`xremarks` as `xremarks`");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "`a`.`xtxnnum`=`b`.`xtxnnum` and `a`.`bizid`=`b`.`bizid` and `b`.`xtxnnum`='".$reqnum."'";// `a`.`xappstatus` = '".$status."' and
		//$where = " bizid = ". Session::get('sbizid') ." and xappstatus = '".$status."' and xstatus='Pending'";	
		return $this->db->select("`billmst` `a` join `billdet` `b`", $fields, $where, " order by `b`.`xrow`");
	}
	public function getSingleTADA($reqnum){
		//echo $status;
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '".$reqnum."'";	
		return $this->db->select("tadamst", $fields, $where);
	}
	public function getTADAByNum($reqnum){
		$fields = array("`b`.`xrow` as `xrow`", "date_format(`b`.`xdate`,'%d/%m/%Y') as `xdate`", "`b`.`xdesc` as `xdesc`", "`b`.`xby` as `xby`", "`b`.`xday` as `xday`", "`b`.`xperson` as `xperson`","`b`.`xamount` as `xamount`");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "`a`.`xtxnnum`=`b`.`xtxnnum` and `a`.`bizid`=`b`.`bizid` and `b`.`xtxnnum`='".$reqnum."'";	// and `a`.`xstatus`='Pending' and `a`.`xappstatus` = '".$status."' 
		return $this->db->select("`tadamst` `a` join `tadadet` `b`", $fields, $where, " order by `b`.`xrow`");
	}
	public function TADATotal($reqnum){
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