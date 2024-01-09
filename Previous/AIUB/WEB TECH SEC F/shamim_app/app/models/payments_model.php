<?php 

class Payments_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
		
		// $fields = array("xwh", "xitemcode", "(select xdesc from seitem where vimstock.bizid=seitem.bizid and vimstock.xitemcode=seitem.xitemcode) as xdesc","qtygrn","TRUNCATE(balgrn,2)","qtyreturn","TRUNCATE(balreturn,2)","qtydret","TRUNCATE(baldret,2)","qtyso","TRUNCATE(balso,2)","qtyfree","TRUNCATE(balfree,2)","qtyreject","TRUNCATE(balreject,2)","xqty","TRUNCATE((balgrn-balreturn+baldret-balso-balfree-balreject),2) as baltotal");
	public function getPayments($branch="", $doctype){
		$gwhere = "";
		if($doctype!="")
			$gwhere .= " and xdoctype='".$doctype."' ";

		$fields = array("xdoctype", "date_format(xdate, '%d-%m-%Y') as xdate", "xtxnnum", "zemail", "paidto", "xorg", "xamount");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xstatus='confirmed' and xpaystatus='Pending' and bizid = ". Session::get('sbizid') ." ".$gwhere;	
		return $this->db->select("vpayments", $fields, $where, " order by xdate");
	}
	public function getPaymentsPaid($branch="", $doctype){
		$gwhere = "";
		if($doctype!="")
			$gwhere .= " and xdoctype='".$doctype."' ";

		$fields = array("xdoctype", "date_format(xdate, '%d-%m-%Y') as xdate", "xtxnnum", "zemail", "paidto", "xorg", "xamount","(SELECT xvoucher from glheader where glheader.xdocnum=vpayments.xtxnnum) as xvoucher");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xstatus='confirmed' and xpaystatus='Paid' and bizid = ". Session::get('sbizid') ." ".$gwhere;	
		return $this->db->select("vpayments", $fields, $where, " order by xdate");
	}

	public function updatePayment($txn, $table){
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

	public function getSupayment($txn){
		return $this->db->select("supplierpay", array("*"), "xtxnnum='".$txn."' and xstatus='Confirmed' and xpaystatus='Pending' and bizid = ". Session::get('sbizid'));
	}
	public function getWoPayment($txn){
		return $this->db->select("wopay", array("*"), "xtxnnum='".$txn."' and xstatus='Confirmed' and xpaystatus='Pending' and bizid = ". Session::get('sbizid'));
	}
	public function getwo($ptnum){
		$fields = array("*","((IFNULL(sum(xamount),0))+ (IFNULL((select sum(xamount) from worevise where wonum='".$ptnum."' and xstatus='Confirmed'),0))) as xamount");
		$where = " bizid = ". Session::get('sbizid') ." and wonum = '". $ptnum ."' and xstatus='Confirmed'" ;
		return $this->db->select("workorder", $fields, $where);
	}
	public function getgrn($txnnum){
		$fields = array("*","(select xorg from sesup where sesup.bizid=pogrnmst.bizid and sesup.xsup=pogrnmst.xsup) as xorg");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xgrnnum = '". $txnnum ."' and xstatus='Confirmed'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("pogrnmst", $fields, $where);
	}

	public function getBillDt($txn){
		return $this->db->select("billdet", array(), " xtxnnum='".$txn."' and bizid = ". Session::get('sbizid'));
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
	public function getWorkOrder($reqnum){
		//echo $status;
		$fields = array("xdate","xtxnnum","xemail","zemail","paidby","(select toname from workorder where workorder.wonum = wopay.wonum) as xname","(select tomobile from workorder where workorder.wonum = wopay.wonum) as xmobile","(select xproject from workorder where workorder.wonum = wopay.wonum) as xproject","xpaystatus");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '".$reqnum."'";	
		return $this->db->select("wopay", $fields, $where);
	}

	public function getWoDetails($reqnum){
		//echo $status;
		$fields = array("xdate","wonum","xnote","xamount");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '".$reqnum."'";	
		return $this->db->select("wopay", $fields, $where);
	}
	
	public function billTotal($reqnum){
	    $fields = array("sum(xprice*xqty) as xtotal");
		$where = " xtxnnum = '". $reqnum ."'" ;
		return $this->db->select("billdet", $fields, $where);
	}

	public function getBillByNum($reqnum){
		$fields = array("`b`.`xrow` as `xrow`", "date_format(`b`.`xdate`,'%d/%m/%Y') as `xdate`", "`b`.`xdesc` as `xdesc`", "`b`.`xquality` as `xquality`", "`b`.`xprice` as `xprice`", "`b`.`xqty` as `xqty`","(`b`.`xprice`*`b`.`xqty`) as xtotal", "`b`.`xremarks` as `xremarks`");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "`a`.`xtxnnum`=`b`.`xtxnnum` and `a`.`bizid`=`b`.`bizid` and `b`.`xtxnnum`='".$reqnum."'";// `a`.`xappstatus` = '".$status."' and
		//$where = " bizid = ". Session::get('sbizid') ." and xappstatus = '".$status."' and xstatus='Pending'";	
		return $this->db->select("`billmst` `a` join `billdet` `b`", $fields, $where, " order by `b`.`xrow`");
	}
	public function getSupplier($reqnum){
		//echo $status;
		$fields = array("xdate","xtxnnum","xemail","zemail","paidby","(select xorg from sesup where sesup.xsup = supplierpay.xsup) as xname","(select xphone from sesup where sesup.xsup = supplierpay.xsup) as xmobile","(select xproj from pogrnmst where pogrnmst.xgrnnum = supplierpay.xgrnnum) as xproject","xpaystatus");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '".$reqnum."'";	
		return $this->db->select("supplierpay", $fields, $where);
	}
	public function getSupPayment($reqnum){
		$fields = array("xdate","xgrnnum","xnote","xamount");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '".$reqnum."'";	// and `a`.`xstatus`='Pending' and `a`.`xappstatus` = '".$status."' 
		return $this->db->select("supplierpay", $fields, $where);
	}
	public function TADATotal($reqnum){
	    $fields = array("sum(xamount) as xtotal");
		$where = " xtxnnum = '". $reqnum ."'" ;
		return $this->db->select("tadadet", $fields, $where);
	}
}