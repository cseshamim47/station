<?php 

class Purchasefreq_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data, $dtcols, $dtdata){
		//print_r($data); die;	
		$mstdata = array(
			"bizid"=>$data['bizid'],
			"xponum"=>$data['xponum'],
			"xwh"=>$data['xwh'],
			"xbranch"=>$data['xwh'],
			"xproj"=>$data['xwh'],
			"xstatus"=>"Created",
			"xdate" => $data['xdate'],
			"zemail"=>$data['zemail'],
			"xsup"=>$data['xsup'],
			"xfinyear"=>$data['xfinyear'],
			"xfinper"=>$data['xfinper']
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and xponum ='" . $data['xponum'] . "'";
		
		$results = $this->db->insertMasterDetail('pomst',$mstdata,"podet",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	
	
	public function edit($data,$dt,$ponum,$row){
		$header = array(
			"xemail"=>Session::get('suser'),
			"zutime"=>date("Y-m-d H:i:s"),
			"xdate"=>$data['xdate'],
			"xsup"=>$data['xsup'],
			"xwh"=>$data['xwh'],
			"xbranch"=>$data['xwh'],
			"xproj"=>$data['xproj'],
			"xsupdoc"=>$data['xsupdoc'],
			"xfinyear"=>$data['xfinyear'],
			"xfinper"=>$data['xfinper']
			);
		$detail = array(
					"xitemcode"=>$dt['xitemcode'],
					"xqty"=>$dt['xqty'],
					"xratepur"=>$dt['xratepur'],
					"xwh"=>$dt['xwh'],
					"xbranch"=>$dt['xwh'],
					"xproj"=>$dt['xproj'],
					"xdate"=>$dt['xdate'],
					"xunitpur"=>$dt['xunitpur'],
					"xconversion"=>$dt['xconversion'],
					"xunitstk"=>$dt['xunitstk']
		);	
		//print_r($header); print_r($detail);die;
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xponum = '". $ponum."'";
			$this->db->update('pomst', $header, $where);
			$where = "bizid = ". Session::get('sbizid') ." and xponum = '". $ponum."' and xrow=".$row;
			return ($this->db->update('podet', $detail, $where));	
	}
	public function creategrnall($mstfields, $mstdata,$intocols, $frmcols, $checkval, $where){
		$result = $this->db->insertAsFromTable("pogrnmst", $mstfields, $mstdata, "pogrndet",$intocols, $frmcols,"vpogrndet",$checkval, $where);
		return $result;
	}
	public function getPurchase($txnnum){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xponum = '". $txnnum ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vpodet", $fields, $where);
	}
	public function getgrn($txnnum){
		$fields = array("*","(select xorg from sesup where sesup.bizid=pogrnmst.bizid and sesup.xsup=pogrnmst.xsup) as xorg");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xgrnnum = '". $txnnum ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("pogrnmst", $fields, $where);
	}
	public function getPoWiseGRN($txnnum){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xstatus='Confirmed' and bizid = ". Session::get('sbizid') ." and xponum = '". $txnnum ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vpogrndet", $fields, $where);
	}
	
	public function getSinglePurchaseDt($txnnum, $row){
		$fields = array("*",
		"(select xdesc from seitem where podet.bizid=seitem.bizid and podet.xitemcode=seitem.xitemcode) as xdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xponum = '". $txnnum ."' and xrow = ". $row;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("podet", $fields, $where);
	}
	
	public function getSingleQty($itemcode){
		$fields = array("xitemcode","(select xdesc from seitem where seitem.bizid=vimstock.bizid and seitem.xitemcode=vimstock.xitemcode) as xitemdesc",	
		"xqtyreq-(xqtypo+xqty) as xqty","(select xpricepur from seitem where seitem.bizid=vimstock.bizid and seitem.xitemcode=vimstock.xitemcode) as xratepur");
		
		$where = "bizid = ". Session::get('sbizid') ." and xitemcode = '". $itemcode ."' LIMIT 1";	
		
		echo json_encode($this->db->select("vimstock", $fields, $where));
	}
	
	public function getSingleReq($itm){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xitemcode = '". $item ."'";	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vgrndet", $fields, $where);
		
	}
	public function getpurchasedt($txnnum){
		$fields = array("xrow",
		"xitemcode","xitemdesc",	
		"xqty","xratepur","xqty*xratepur as xtotal" );
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xponum = '". $txnnum ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("vpogrndet", $fields, $where, " order by xrow");
	}
	public function getreqdt($sup){
		$fields = array("xitemcode","(select xdesc from seitem where seitem.bizid=vimstock.bizid and seitem.xitemcode=vimstock.xitemcode) as xitemdesc",	
		"xqtyreq-(xqtypo+xqty) as xqty");
		
		$where = " bizid = ". Session::get('sbizid') ." and xsup = '". $sup ."' and xqtyreq-(xqtypo+xqty)>0";
		
		return $this->db->select("vimstock", $fields, $where, " order by xitemcode");
	}
	public function getvgrndt($txnnum){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xgrnnum = '". $txnnum ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("vgrndet", $fields, $where, " order by xrow");
	}
	public function getPurchaseList($status){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xponum","xsup","(select xorg from sesup where sesup.bizid=pomst.bizid and sesup.xsup=pomst.xsup) as xsupname","xsupdoc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and xstatus='".$status."' and bizid = ". Session::get('sbizid') ;
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("pomst", $fields, $where);
	}
	public function checkMilestone($xponum){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xponum='".$xponum."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vpomilestone", $fields, $where);
	}
	public function getReqList($sup=""){
		$fields = array("xsup","(select xorg from sesup where sesup.xsup=vreqlist.xsup) as xsupname");
		//print_r($this->db->select("pabuziness", $fields));die;
		if($sup!="")
			$where = " xsup='".$sup."'";
		else
			$where = " 1=1" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vreqlist", $fields, $where);
	}
	public function getItem($item){
		
		return $this->db->getItemMaster("xitemcode",$item); 
		
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
		
		$this->db->update('pomst', $postdata, $where);
	}
	public function recdelete($where){
		$this->db->dbdelete('podet', $where);
	}
}