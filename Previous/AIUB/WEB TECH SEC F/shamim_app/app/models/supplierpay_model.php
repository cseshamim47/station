<?php 

class Supplierpay_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){			
		$results = $this->db->insert('supplierpay', array(
			"bizid" => $data['bizid'],
			"zemail"=> $data['zemail'],
			"xtxnnum" => $data['xtxnnum'],
			"xdate" => $data['xdate'],
			"xsup" => $data['xsup'],
			"xstatus" => "Created",
			"xrecflag" => "Live",
			"xgrnnum"=> $data['xgrnnum'],
			"xamount"=> $data['xamount'],
			"xpobal"=> $data['xpobal'],
			"xprepay"=> $data['xprepay'],
			"xnote"=> $data['xnote']
			));		
		return $results;	
	}
	public function edit($data, $txnnum){
		$results = array(
			"xdate" => $data['xdate'],
			"xsup" => $data['xsup'],
			"xgrnnum"=> $data['xgrnnum'],
			"xamount"=> $data['xamount'],
			"xpobal"=> $data['xpobal'],
			"xprepay"=> $data['xprepay'],
			"xnote"=> $data['xnote'],
			"xcomment"=> $data['xcomment']
		);
			
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xtxnnum = '". $txnnum."'";
		return $this->db->update('supplierpay', $results, $where);	
	}

	public function savedelivery($data, $dtcols, $dtdata){
		//print_r($data); die;	
		$mstdata = array(
			"bizid"=>$data['bizid'],
			"xreqdelnum"=>$data['xreqdelnum'],
			"xsonum"=>$data['xsonum'],
			"xwh"=>$data['xwh'],
			"xbranch"=>$data['xbranch'],
			"xproj"=>$data['xproj'],
			"xstatus"=>$data['xstatus'],
			"xdate" => $data['xdate'],
			"xsalesdate" => $data['xsalesdate'],
			"zemail"=>$data['zemail'],
			"xcus"=>$data['xcus'],						
			"xgrossdisc"=>$data['xgrossdisc'],
			"xfinyear"=>$data['xfinyear'],
			"xfinper"=>$data['xfinper']
			);
			//print_r($mstdata); die;
		$checkval = " bizid = " . $data['bizid'] . " and xreqdelnum ='" . $data['xreqdelnum'] . "'";
		
		$results = $this->db->insertMasterDetail('imreqdelmst',$mstdata,"imreqdeldet",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	
	public function getSupplierPay($txnnum){
		$fields = array("*","(select xorg from sesup where sesup.bizid=supplierpay.bizid and sesup.xsup=supplierpay.xsup) as xorg","(select xproj from pogrnmst where pogrnmst.bizid=supplierpay.bizid and pogrnmst.xgrnnum=supplierpay.xgrnnum) as xproj");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xtxnnum = '". $txnnum ."'" ;	
		//print_r($this->db->select("somst", $fields, $where));die;
		return $this->db->select("supplierpay", $fields, $where);
	}

	public function getPayListByPO($ponum){
		$fields = array("*","(select xorg from sesup where sesup.bizid=supplierpay.bizid and sesup.xsup=supplierpay.xsup) as xorg","(select xproj from pogrnmst where pogrnmst.bizid=supplierpay.bizid and pogrnmst.xgrnnum=supplierpay.xgrnnum) as xproj");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xgrnnum = '". $ponum ."'" ;	
		//print_r($this->db->select("somst", $fields, $where));die;
		return $this->db->select("supplierpay", $fields, $where);
	}
	public function getSalesList($status){
		$fields = array("xdate","xtxnnum","xgrnnum","(select xproj from pogrnmst where pogrnmst.bizid=supplierpay.bizid and pogrnmst.xgrnnum=supplierpay.xgrnnum) as xproj","xpobal","xsup","(select xorg from sesup where sesup.bizid=supplierpay.bizid and sesup.xsup=supplierpay.xsup) as xorg","xamount");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xstatus = '". $status ."'" ;	
		//print_r($this->db->select("somst", $fields, $where));die;
		return $this->db->select("supplierpay", $fields, $where);
	}
	
	public function confirm($postdata,$where){
		
		return $this->db->update('supplierpay', $postdata, $where);
			
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	public function recdelete($where){
		return $this->db->dbdelete('supplierpay', $where);
	}

	public function getApproval(){
		$fields = array("xlevel","xstatus");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "zactive='1' and xdept = '". Session::get('srole') ."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("paapproval", $fields, $where, " order by xlevel limit 1");
	}
	
	public function getMails($module, $status){
		$fields = array("xuser","(SELECT zaltemail from pausers where pausers.zemail=paapproval.xuser) as zaltemail");
		$where = "zactive='1' and xmodule = '". $module ."' and xstatus='".$status."' and bizid = ". Session::get('sbizid') ;
		return $this->db->select("paapproval", $fields, $where);
	}
	public function getgrn($txnnum){
		$fields = array("*","(select xorg from sesup where sesup.bizid=pogrnmst.bizid and sesup.xsup=pogrnmst.xsup) as xorg");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xgrnnum = '". $txnnum ."' and xstatus='Confirmed'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("pogrnmst", $fields, $where);
	}
	public function getGrnBal($ponum){
		$fields = array("xgrnnum", "xsup", "((SELECT sum(xqtypur*xratepur*xexch) from pogrndet where pogrndet.xgrnnum=pogrnmst.xgrnnum)-IFNULL((SELECT sum(xamount) from supplierpay where supplierpay.xgrnnum=pogrnmst.xgrnnum and xstatus<>'Created' and xstatus<>'Canceled'),0)) as xgrnbal");
		$where = " bizid = ". Session::get('sbizid') ." and xgrnnum = '". $ponum ."' and xstatus='Confirmed' ";	
		return $this->db->select("pogrnmst", $fields, $where);
	}
	
	public function getgrndt($txnnum){
		$fields = array("xrow",
		"xitemcode","xitemdesc","xstatus","xunitstk","xsup","xorg","xtotaltax","xtotaldisc",	
		"xqtypur","xratepur","xtotal" );
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xgrnnum = '". $txnnum ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("vgrndet", $fields, $where, " order by xrow");
	}

	public function getGrnBalDt($grnnum){
		$fields = array("xgrnnum", "xsup", "((SELECT sum(xqtypur*xratepur*xexch) from pogrndet where pogrndet.xgrnnum=pogrnmst.xgrnnum)-IFNULL((SELECT sum(xamount) from supplierpay where supplierpay.xgrnnum=pogrnmst.xgrnnum and xstatus<>'Created' and xstatus<>'Canceled'),0)) as xgrnbal", "IFNULL((SELECT sum(xamount) from supplierpay where supplierpay.xgrnnum=pogrnmst.xgrnnum and xstatus='Confirmed'),0) as xprepay", "(select xorg from sesup where sesup.xsup = pogrnmst.xsup) as xorg");
		$where = " bizid = ". Session::get('sbizid') ." and xgrnnum = '". $grnnum ."' and xstatus='Confirmed' ";	
		return($this->db->select("pogrnmst", $fields, $where));
	}
}