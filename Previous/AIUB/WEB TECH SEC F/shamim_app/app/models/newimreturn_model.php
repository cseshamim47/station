<?php 

class Newimreturn_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}

	public function getStatus($num){
		$fields = array("xstatus");
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xdoreturnnum = '". $num ."'";	
		return $this->db->select("imdoreturn", $fields, $where);
	}
	public function create($data, $dtcols, $dtdata){
		//print_r($data); die;	
		$mstdata = array(
			"bizid"=>$data['bizid'],
			"xreqdelnum"=>$data['xreqdelnum'],
			"xdoreturnnum"=>$data['xdoreturnnum'],
			"xwh"=>$data['xwh'],
			"xbranch"=>$data['xwh'],
			"xproj"=>$data['xwh'],
			"xstatus"=>"Created",
			"xdate" => $data['xdate'],
			"zemail"=>$data['zemail'],
			"xcus"=>$data['xcus'],
			"xfinyear"=>$data['xfinyear'],
			"xfinper"=>$data['xfinper'],
			"xdodate"=>$data['xdodate']
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and xdoreturnnum ='" . $data['xdoreturnnum'] . "'";
		
		$results = $this->db->insertMasterDetail('imdoreturn',$mstdata,"imdoreturndet",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	
	
	public function edit($data,$dt,$donum,$row, $xitem){
		$header = array(
			"xemail"=>Session::get('suser'),
			"zutime"=>date("Y-m-d H:i:s"),
			"xdate"=>$data['xdate'],
			"xcus"=>$data['xcus'],
			"xwh"=>$data['xwh'],
			"xbranch"=>$data['xwh'],
			"xproj"=>$data['xproj'],
			"xfinyear"=>$data['xfinyear'],
			"xfinper"=>$data['xfinper']
			);
		$detail = array(
					"xitemcode"=>$dt['xitemcode'],
					"xqty"=>$dt['xqty'],
					"xrate"=>$dt['xrate'],
					"xratepur"=>$dt['xratepur'],
					"xstdcost"=>$dt['xstdcost'],
					"xwh"=>$dt['xwh'],
					"xbranch"=>$dt['xwh'],
					"xproj"=>$dt['xproj'],
					"xdate"=>$dt['xdate'],
					"xunit"=>$dt['xunit'],
					"xtypestk"=>$dt['xtypestk'],
		);	
		
			$where = " bizid = ". Session::get('sbizid') ." and xdoreturnnum = '". $donum."'";
			$this->db->update('imdoreturn', $header, $where);
			$wheredt = " bizid = ". Session::get('sbizid') ." and xdoreturnnum = '". $donum."' and xitemcode='".$xitem."' and xrow=".$row; 
			return ($this->db->update('imdoreturndet', $detail, $wheredt));	  
	}
	public function creategrnall($mstfields, $mstdata,$intocols, $frmcols, $checkval, $where){
		$result = $this->db->insertAsFromTable("pogrnmst", $mstfields, $mstdata, "pogrndet",$intocols, $frmcols,"vpogrndet",$checkval, $where);
		return $result;
	}

	public function confirmgl($data, $dtcols, $dtdata){
		//print_r($data); die;	
		$mstdata = array(
			"bizid"=>$data['bizid'],
			"xvoucher"=>$data['xvoucher'],
			"xnarration"=>$data['xnarration'],
			"xyear"=>$data['xyear'],
			"xper"=>$data['xper'],
			"xstatusjv"=>"Created",
			"xbranch" => $data['xbranch'],
			"xdoctype" => $data['xdoctype'],
			"xdocnum" => $data['xdocnum'],
			"xdate" => $data['xdate'],			
			"zemail"=>$data['zemail']
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and xvoucher ='" . $data['xvoucher'] ."'";
		$results = $this->db->insertMasterDetail('glheader',$mstdata,"gldetail",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	
	public function getreturnForConfirm($returnnum){
		$fields = array("xrow","xcus",
		"xitemcode","xitemdesc",	
		"xqty","xrate","xqty*xrate as ta","xqty*(xtaxrate*xrate/100) as tt","xqty*xdisc as id" );
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xdoreturnnum = '". $returnnum ."'";	
		return $this->db->select("vimreturndet", $fields, $where, " order by xrow");
	}

	public function gldoreturninterface(){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xtypeinterface = 'DO Return Interface'";	
		return $this->db->select("glinterface", $fields, $where);
	}

	public function getAcc($acc){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xacc = '". $acc ."'";	
		return $this->db->select("glchart", $fields, $where);
	}

	public function getReturnheader($txnnum){
		$fields = array("*","(select xorg from secus where secus.xcus=somst.xcus and secus.bizid=somst.bizid) as xorg");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xsonum = '". $txnnum ."' LIMIT 1" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("somst", $fields, $where);
	}
	
	public function getReturn($txnnum){
		$fields = array("*","(select xorg from secus where secus.xcus=imdoreturn.xcus and secus.bizid=imdoreturn.bizid) as xorg");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xdoreturnnum = '". $txnnum ."' LIMIT 1" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("imdoreturn", $fields, $where);
	}
	
	public function getSingleReturnDt($txnnum, $row){
		$fields = array("*",
		"(select xdesc from seitem where imdoreturndet.bizid=seitem.bizid and imdoreturndet.xitemcode=seitem.xitemcode) as xdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xdoreturnnum = '". $txnnum ."' and xrow = ". $row;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("imdoreturndet", $fields, $where);
	}
	
	public function getSingleQty($sl){
		$fields = array("xrow","xitemcode","(select xdesc from seitem where seitem.bizid=vsalesdt.bizid and seitem.xitemcode=vsalesdt.xitemcode) as xitemdesc","xqty as xbal","xrate"
		);
		
		$where = "bizid = ". Session::get('sbizid') ." and sosl='".$sl."' LIMIT 1";	
		
		echo json_encode($this->db->select("vsalesdt", $fields, $where));
	}
	
	public function getSingleReq($itm){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xitemcode = '". $item ."'";	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vgrndet", $fields, $where);
		
	}
	public function getreturndt($txnnum){
		$fields = array("xrow",
		"xitemcode","xitemdesc",	
		"xqty");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xdoreturnnum = '". $txnnum ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("vimreturndet", $fields, $where, " order by xrow");
	}

	public function getreqdt($txnnum){
		$fields = array("sosl",
		"xitemcode","(select xdesc from seitem where seitem.bizid=vsalesdt.bizid and seitem.xitemcode=vsalesdt.xitemcode) as xitemdesc",	
		"xqty","0 as xreturnqty");
		
		$where = " bizid = ". Session::get('sbizid') ." and xsonum='".$txnnum."'";
		
		return $this->db->select("vsalesdt", $fields, $where, " order by sosl");
	}

	public function getvreturndt($txnnum){
		$fields = array();
		
		$where = " bizid = ". Session::get('sbizid') ." and xdoreturnnum = '". $txnnum ."'";
		
		return $this->db->select("vimreturndet", $fields, $where, " order by xrow");
	}
	public function getReturnList($status){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xreqdelnum","xdoreturnnum","xreqdelnum","xcus","(select xorg from secus where secus.bizid=imdoreturn.bizid and secus.xcus=imdoreturn.xcus) as xorg");
		
		$where = " xstatus='".$status."' and bizid = ". Session::get('sbizid') ;
		
		return $this->db->select("imdoreturn", $fields, $where);
	}
	public function getItemcost($item){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xitemcode = '". $item ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vitemcost", $fields, $where);
	}

	// public function getReqList(){
	// 	$fields = array("distinct xreqdelnum","date_format(xdate, '%d-%m-%Y') as xdate","xcus","(select xorg from secus where secus.bizid=vdoreturndt.bizid and secus.xcus=vdoreturndt.xcus) as xorg");
	// 	//print_r($this->db->select("pabuziness", $fields));die;
		
	// 		$where = " xqty-xreturnqty>0 and bizid = ". Session::get('sbizid');
		
	// 	//print_r($this->db->select("seitem", $fields, $where));die;
	// 	return $this->db->select("vdoreturndt", $fields, $where);
	// }

	public function getReqList(){
		$fields = array("distinct xsonum","date_format(xdate, '%d-%m-%Y') as xdate","xcus","(select xorg from secus where secus.bizid=vsalesdt.bizid and secus.xcus=vsalesdt.xcus) as xorg");
		//print_r($this->db->select("pabuziness", $fields));die;
		
			$where = " xqty>0 and bizid = ". Session::get('sbizid');
		
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vsalesdt", $fields, $where);
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
		
		$this->db->update('imdoreturn', $postdata, $where);
	}
	public function cancel($where){
		
		$postdata=array(
			"xstatus" => "Canceled"			
			);
		
		$this->db->update('imdoreturn', $postdata, $where);
	}
	public function recdelete($where){
		$this->db->dbdelete('imreqdeldet', $where);
	}

	public function getCustomer($cus){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xcus = '". $cus ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("secus", $fields, $where);
	}
}