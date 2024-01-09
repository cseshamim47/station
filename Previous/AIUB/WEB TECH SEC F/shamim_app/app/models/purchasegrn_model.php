<?php

class Purchasegrn_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data, $dtcols, $dtdata){
		//print_r($data); die;	
		$mstdata = array(
			"bizid"=>$data['bizid'],
			"xponum"=>$data['xponum'],
			"xgrnnum"=>$data['xgrnnum'],
			"xwh"=>$data['xwh'],
			"xbranch"=>$data['xwh'],
			"xproj"=>$data['xproj'],
			"xtype"=>$data['xgitem'],
			"xstatus"=>"Created",
			"xdate" => $data['xdate'],
			"zemail"=>$data['zemail'],
			"xsup"=>$data['xsup'],
			"xfinyear"=>$data['xfinyear'],
			"xfinper"=>$data['xfinper']			
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and xgrnnum ='" . $data['xgrnnum'] . "'";
		
		$results = $this->db->insertMasterDetail('pogrnmst',$mstdata,"pogrndet",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}

	public function confirmgl($data, $dtcols, $dtdata){
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
			"xdate" => $data['xdate'],			
			"zemail"=>$data['zemail'],
			"xsite"=>$data['xsite']
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and xvoucher ='" . $data['xvoucher'] ."'";
		$results = $this->db->insertMasterDetail('glheader',$mstdata,"gldetail",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	
	
	public function edit($data,$dt,$grnnum,$row){
		$header = array(
			"xemail"=>Session::get('suser'),
			"zutime"=>date("Y-m-d H:i:s"),
			"xdate"=>$data['xdate'],
			"xsup"=>$data['xsup'],
			"xwh"=>$data['xwh'],
			"xbranch"=>$data['xwh'],
			"xproj"=>$data['xproj'],
			"xtype"=>$data['xgitem'],
			"xfinyear"=>$data['xfinyear'],
			"xfinper"=>$data['xfinper']
			);
		$detail = array(
					"xitemcode"=>$dt['xitemcode'],
					"xqtypur"=>$dt['xqty'],
					"xextqty"=>$dt['xextqty'],
					"xratepur"=>$dt['xratepur'],
					"xwh"=>$dt['xwh'],
					"xbranch"=>$dt['xwh'],
					"xproj"=>$dt['xproj'],
					"xpur"=>$dt['xpur'],
					"xdate"=>$dt['xdate'],
					"xstdcost"=>$dt['xstdcost']
		);	
		//print_r($header); die;// print_r($detail);die;
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xgrnnum = '". $grnnum."'";
			$this->db->update('pogrnmst', $header, $where);
			$where = "bizid = ". Session::get('sbizid') ." and xgrnnum = '". $grnnum."' and xrow=".$row;
			return ($this->db->update('pogrndet', $detail, $where));	
	}

	public function creategrnall($data, $dtcols, $dtdata){
		
		$checkval = " bizid = " . $data['bizid'] . " and xgrnnum ='" . $data['xgrnnum'] . "'";
		
		$results = $this->db->insertMasterDetail('pogrnmst',$data,"pogrndet",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}

	public function getPurchase($txnnum){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xstatus='Confirmed' and bizid = ". Session::get('sbizid') ." and xponum = '". $txnnum ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vpogrndet", $fields, $where);
	}

	public function getgrnForConfirm($grnnum){
		$fields = array("xrow","xsup",
		"xitemcode","(select xdesc from seitem where vgrndet.bizid=seitem.bizid and vgrndet.xitemcode=seitem.xitemcode) as xitemdesc",	
		"xqtypur","xratepur","xqtypur*xratepur as ta","xqtypur*(xtaxrate*xratepur/100) as tt","xqtypur*xdisc as id","xproj");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xgrnnum = '". $grnnum ."'";	
		return $this->db->select("vgrndet", $fields, $where, " order by xrow");
	}

	public function glgrninterface(){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xtypeinterface = 'GL GRN Interface'";	
		return $this->db->select("glinterface", $fields, $where);
	}

	public function getgrn($txnnum){
		$fields = array("*","(select xorg from sesup where sesup.bizid=pogrnmst.bizid and sesup.xsup=pogrnmst.xsup) as xorg");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xgrnnum = '". $txnnum ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("pogrnmst", $fields, $where);
	}
	public function getItemcost($item){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xitemcode = '". $item ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vitemcost", $fields, $where);
	}
	public function getpocost($po,$item){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xponum='".$po."' and xitemcode = '". $item ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vpocostdt", $fields, $where);
	}
	public function getPoWiseGRN($txnnum){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xstatus='Confirmed' and bizid = ". Session::get('sbizid') ." and xponum = '". $txnnum ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vpogrndet", $fields, $where);
	}
	public function getSinglePurchase($txnnum, $row){
		$fields = array("xrow","xitemcode","xitemdesc","xqty","xgrnqty","xqty-xgrnqty as xbal","xratepur*xexch as xratepur","xwh","xpur");
		
		$where = "bizid = ". Session::get('sbizid') ." and xponum = '". $txnnum ."' and xrow = ". $row;	
		
		echo json_encode($this->db->select("vpogrndet", $fields, $where));
	}
	
	public function getSingleQty($txnnum, $row){
		$fields = array("xrow",
		"xitemcode","xitemdesc",	
		"xqty","xgrnqty","xqty-xgrnqty as xbal","xratepur","xwh");
		
		$where = "bizid = ". Session::get('sbizid') ." and xponum = '". $txnnum ."' and xrow = ". $row;	
		
		return $this->db->select("vpogrndet", $fields, $where);
	}
	
	public function getSingleGrnDt($txnnum, $row){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xgrnnum = '". $txnnum ."' and xrow = ". $row;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vgrndet", $fields, $where);
		
	}
	public function getpurchasebytxn($txnnum){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xstatus='Confirmed' and bizid = ". Session::get('sbizid') ." and xponum = '". $txnnum ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("pomst", $fields, $where);
	}
	public function getpurchasedtbytxn($txnnum){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xponum = '". $txnnum ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("vpogrndet", $fields, $where, " order by xrow");
	}
	public function getpurchasedt($txnnum){
		$fields = array("xrow",
		"xitemcode","xitemdesc",	
		"xqty","xgrnqty","xratepur*xexch","xqty*xratepur*xexch as xtotal" );
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xstatus='Confirmed' and xponum = '". $txnnum ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("vpogrndet", $fields, $where, " order by xrow");
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
	public function getvgrndt($txnnum){
		$fields = array("*","(select xmrp from seitem where seitem.bizid = vgrndet.bizid and seitem.xitemcode = vgrndet.xitemcode) as xmrp");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xgrnnum = '". $txnnum ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("vgrndet", $fields, $where, " order by xrow");
	}
	public function getPurchaseList(){
		$fields = array("xponum","xsup","xorg","(SELECT xproj FROM pomst WHERE vpomilestone.xponum=pomst.xponum) as xproj","(SELECT xwh FROM pomst WHERE vpomilestone.xponum=pomst.xponum) as xwh","(SELECT xpur FROM podet WHERE vpomilestone.xponum=podet.xponum LIMIT 1) as xpur");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xmilestone='Milestone Not Completed' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vpomilestone", $fields, $where);
	}
	public function checkMilestone($xponum){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xponum='".$xponum."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vpomilestone", $fields, $where);
	}
	public function getGrnList($status){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xgrnnum","xponum","xsup","(select xorg from sesup where sesup.bizid=pogrnmst.bizid and sesup.xsup=pogrnmst.xsup) as xsupname","xsupdoc","xproj","xwh","(SELECT xpur FROM pogrndet WHERE pogrnmst.xgrnnum=pogrndet.xgrnnum LIMIT 1) as xpur");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and xstatus='".$status."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("pogrnmst", $fields, $where);
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	public function getItemDetail($itm){
		return $this->db->getItemMaster("xitemcode",$itm);
	}
	
	public function getRow($table,$keyfield,$num, $xrow){
		
		return $this->db->rowIncrement($table,$keyfield,$num, $xrow);
	}
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	
	public function confirm($where){
		//echo $where;die;
		$postdata=array(
			"xstatus" => "Confirmed"			
			);
		
		$this->db->update('pogrnmst', $postdata, $where);
	}
	public function cancel($where){
		//echo $where;die;
		$postdata=array(
			"xstatus" => "Canceled"			
			);
		
		$this->db->update('pogrnmst', $postdata, $where);
	}
	public function recdelete($where){
		$this->db->dbdelete('pogrndet', $where);
	}
	public function getAcc($acc){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xacc = '". $acc ."'";	
		return $this->db->select("glchart", $fields, $where);
	}
	public function getSupplier($sup){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xsup = '". $sup ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("sesup", $fields, $where);
	}
}