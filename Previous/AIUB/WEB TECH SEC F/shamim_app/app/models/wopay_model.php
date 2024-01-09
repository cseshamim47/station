<?php 

class Wopay_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data, $dtcols, $dtdata){
		
		$mstdata = array(
			"bizid" => $data['bizid'],
			"zemail"=> $data['zemail'],
			"xtxnnum" => $data['xtxnnum'],
			"xdate" => $data['xdate'],
			"xstatus" => "Created",
			"xrecflag" => "Live",
			"wonum"=> $data['wonum'],
			"xamount"=> $data['xamount'],
			"xwobal"=> $data['xwobal'],
			"xprepay"=> $data['xprepay'],
			"xnote"=> $data['xnote']
			);
			
		$checkval = "xtxnnum ='". $data['xtxnnum'] ."'";
		
		$results = $this->db->insertMasterDetail('wopay',$mstdata,"wopaydt",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}

	public function edit($data, $dtcols, $dtdata){
		$mstdata = array(
			"xdate" => $data['xdate'],
			"wonum"=> $data['wonum'],
			"xamount"=> $data['xamount'],
			"xwobal"=> $data['xwobal'],
			"xprepay"=> $data['xprepay'],
			"xnote"=> $data['xnote'],
			"xcomment"=> $data['xcomment']
		);
			
		$checkval = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xtxnnum = '". $data['xtxnnum']."'";
		$results = $this->db->insertMasterDetail('wopay',$mstdata,"wopaydt",$dtcols, $dtdata,$checkval);
		if(!$results){
			$results = $this->update($data);
		}else{
			$results = $this->update($data);
		}
		return $results;
	}

	public function update($data){
		$mstdata = array(
			"xdate" => $data['xdate'],
			"wonum"=> $data['wonum'],
			"xamount"=> $data['xamount'],
			"xwobal"=> $data['xwobal'],
			"xprepay"=> $data['xprepay'],
			"xnote"=> $data['xnote'],
			"xcomment"=> $data['xcomment']
		);

		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xtxnnum = '". $data['xtxnnum']."'";
		return $this->db->update('wopay', $mstdata, $where);
	}
	
	public function getSupplierPay($txnnum){
		$fields = array("*","(select toname from workorder where workorder.bizid=wopay.bizid and workorder.wonum=wopay.wonum) as toname","(select xproject from workorder where workorder.bizid=wopay.bizid and workorder.wonum=wopay.wonum) as xproject","(select toorg from workorder where workorder.bizid=wopay.bizid and workorder.wonum=wopay.wonum) as toorg");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xtxnnum = '". $txnnum ."'" ;	
		//print_r($this->db->select("somst", $fields, $where));die;
		return $this->db->select("wopay", $fields, $where);
	}

	public function getPayListByPO($txnnum){
		$fields = array("*","(select xstatus from wopay where wopay.xtxnnum=wopaydt.xtxnnum) as xstatus");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xtxnnum = '". $txnnum ."'" ;	
		//print_r($this->db->select("somst", $fields, $where));die;
		return $this->db->select("wopaydt", $fields, $where);
	}
	public function getSalesList($status){
		$fields = array("xdate","xtxnnum","wonum","xwobal","(select toname from workorder where workorder.bizid=wopay.bizid and workorder.wonum=wopay.wonum) as toname","(select xproject from workorder where workorder.bizid=wopay.bizid and workorder.wonum=wopay.wonum) as xproject","(select toorg from workorder where workorder.bizid=wopay.bizid and workorder.wonum=wopay.wonum) as toorg","xamount");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xstatus = '". $status ."'" ;	
		//print_r($this->db->select("somst", $fields, $where));die;
		return $this->db->select("wopay", $fields, $where);
	}
	
	public function confirm($postdata,$where){
		
		$this->db->update('wopay', $postdata, $where);
			
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	public function recdelete($where){
		$this->db->dbdelete('wopaydt', $where);
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
	
}