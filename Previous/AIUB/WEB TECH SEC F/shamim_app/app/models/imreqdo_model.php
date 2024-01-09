<?php 

class Imreqdo_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data, $dtcols, $dtdata){
		//print_r($data); die;	
		$mstdata = array(
			"bizid"=>$data['bizid'],
			"xreqdelnum"=>$data['xreqdelnum'],
			"xsonum"=>$data['xsonum'],
			"xwh"=>$data['xwh'],
			"xbranch"=>$data['xwh'],
			"xproj"=>$data['xwh'],
			"xstatus"=>"Created",
			"xdate" => $data['xdate'],
			"zemail"=>$data['zemail'],
			"xcus"=>$data['xcus'],
			"xgrossdisc"=>$data['xgrossdisc'],
			"xfinyear"=>$data['xfinyear'],
			"xfinper"=>$data['xfinper'],
			"xsalesdate"=>$data['xsalesdate']
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and xreqdelnum ='" . $data['xreqdelnum'] . "'";
		
		$results = $this->db->insertMasterDetail('imreqdelmst',$mstdata,"imreqdeldet",$dtcols, $dtdata,$checkval);
		
		return $results;	
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
	public function edit($data,$dt,$donum,$row, $xitem){
		$header = array(
			"xemail"=>Session::get('suser'),
			"zutime"=>date("Y-m-d H:i:s"),
			"xdate"=>$data['xdate'],
			"xcus"=>$data['xcus'],
			"xgrossdisc"=>$data['xgrossdisc'],
			"xwh"=>$data['xwh'],
			"xbranch"=>$data['xwh'],
			"xproj"=>$data['xproj'],
			"xfinyear"=>$data['xfinyear'],
			"xfinper"=>$data['xfinper']
			);
		$detail = array(
					"xitemcode"=>$dt['xitemcode'],
					"xqty"=>$dt['xqty'],
					"xdisc"=>$dt['xdisc'],
					"xrate"=>$dt['xrate'],
					"xratepur"=>$dt['xratepur'],
					"xwh"=>$dt['xwh'],
					"xbranch"=>$dt['xwh'],
					"xproj"=>$dt['xproj'],
					"xdate"=>$dt['xdate'],
					"xunit"=>$dt['xunit'],
					"xstdcost"=>$dt['xstdcost'],
					"xtypestk"=>$dt['xtypestk']
		);	
		//print_r($header); print_r($detail);die;
			$where = " bizid = ". Session::get('sbizid') ." and xreqdelnum = '". $donum."'";
			$this->db->update('imreqdelmst', $header, $where);
			$wheredt = " bizid = ". Session::get('sbizid') ." and xreqdelnum = '". $donum."' and xitemcode='".$xitem."' and xrow=".$row;
			return ($this->db->update('imreqdeldet', $detail, $wheredt));	
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
			"zemail"=>$data['zemail']
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and xvoucher ='" . $data['xvoucher'] ."'";
		$results = $this->db->insertMasterDetail('glheader',$mstdata,"gldetail",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	public function creategrnall($mstfields, $mstdata,$intocols, $frmcols, $checkval, $where){
		$result = $this->db->insertAsFromTable("pogrnmst", $mstfields, $mstdata, "pogrndet",$intocols, $frmcols,"vpogrndet",$checkval, $where);
		return $result;
	}
	public function getSalesheader($txnnum){
		$fields = array("*","(select xorg from secus where secus.xcus=somst.xcus and secus.bizid=somst.bizid) as xorg");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xsonum = '". $txnnum ."' LIMIT 1" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("somst", $fields, $where);
	}
	public function getdoForConfirm($reqdelnum){
		$fields = array("xrow","xcus","xgrossdisc",
		"xitemcode","(select xdesc from seitem where vimreqdeldet.bizid=seitem.bizid and vimreqdeldet.xitemcode=seitem.xitemcode) as xitemdesc",	
		"xqty","xrate","xqty*xrate as ta","xqty*(xtaxrate*xrate/100) as tt","xqty*xdisc as id" );
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xreqdelnum = '". $reqdelnum ."'";	
		return $this->db->select("vimreqdeldet", $fields, $where, " order by xrow");
	}

	public function gldointerface(){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xtypeinterface = 'GL DO Interface'";	
		return $this->db->select("glinterface", $fields, $where);
	}
	public function getDelivery($txnnum){
		$fields = array("*","(select xorg from secus where secus.xcus=imreqdelmst.xcus and secus.bizid=imreqdelmst.bizid) as xorg");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xreqdelnum = '". $txnnum ."' LIMIT 1" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("imreqdelmst", $fields, $where);
	}
	
	public function getSingleDeliveryDt($txnnum, $row){
		$fields = array("*",
		"(select xdesc from seitem where imreqdeldet.bizid=seitem.bizid and imreqdeldet.xitemcode=seitem.xitemcode) as xdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xreqdelnum = '". $txnnum ."' and xrow = ". $row;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("imreqdeldet", $fields, $where);
	}
	
	public function getSingleQty($sl){
		$fields = array("sosl","xitemcode","(select xdesc from seitem where seitem.bizid=vsalesdodt.bizid and seitem.xitemcode=vsalesdodt.xitemcode) as xitemdesc","xqty-xdoqty as xbal","xrate"
		);
		
		$where = "bizid = ". Session::get('sbizid') ." and sosl='".$sl."' LIMIT 1";	
		
		echo json_encode($this->db->select("vsalesdodt", $fields, $where));
	}
	
	public function getSingleReq($itm){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xitemcode = '". $item ."'";	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vgrndet", $fields, $where);
		
	}
	public function getdeliverydt($txnnum){
		$fields = array("xrow","xgrossdisc",
		"xitemcode","xitemdesc",	
		"xqty","xunit","xrate","xtaxamt","xdiscamt","(xqty*xrate)+xtaxamt-xdiscamt as xtotal");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xreqdelnum = '". $txnnum ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("vimreqdeldet", $fields, $where, " order by xrow");
	}
	public function getreqdt($txnnum){
		$fields = array("sosl",
		"xitemcode","(select xdesc from seitem where seitem.bizid=vsalesdodt.bizid and seitem.xitemcode=vsalesdodt.xitemcode) as xitemdesc",	
		"xqty","xdoqty");
		
		$where = " bizid = ". Session::get('sbizid') ." and xsonum='".$txnnum."'";
		
		return $this->db->select("vsalesdodt", $fields, $where, " order by sosl");
	}
	public function getSales($sonum){
		$fields = array("*","(select xorg from secus where secus.bizid=somst.bizid and secus.xcus=somst.xcus) as xorg",
		"(select xadd1 from secus where secus.bizid=somst.bizid and secus.xcus=somst.xcus) as xadd1",
		"(select xphone from secus where secus.bizid=somst.bizid and secus.xcus=somst.xcus) as xphone");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xsonum = '". $sonum ."'" ;	
		//print_r($this->db->select("somst", $fields, $where));die;
		return $this->db->select("somst", $fields, $where);
	}
	public function getvsalesdt($sonum){
		$fields = array("*",
		"(select xdesc from seitem where vsalesdt.bizid=seitem.bizid and vsalesdt.xitemcode=seitem.xitemcode) as xitemdesc","(select xorg from secus where secus.bizid=vsalesdt.bizid and secus.xcus=vsalesdt.xcus) as xorg"
		,"(select xadd1 from secus where secus.bizid=vsalesdt.bizid and secus.xcus=vsalesdt.xcus) as xadd"
		,"(select xmobile from secus where secus.bizid=vsalesdt.bizid and secus.xcus=vsalesdt.xcus) as xmobile");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xsonum = '". $sonum ."'";	
		return $this->db->select("vsalesdt", $fields, $where, " order by xrow");
	}
	public function getvdodt($txnnum){
		$fields = array("*","(select xorg from secus where secus.bizid=vimreqdeldet.bizid and secus.xcus=vimreqdeldet.xcus) as xorg"
		,"(select xadd1 from secus where secus.bizid=vimreqdeldet.bizid and secus.xcus=vimreqdeldet.xcus) as xadd"
		,"(select xmobile from secus where secus.bizid=vimreqdeldet.bizid and secus.xcus=vimreqdeldet.xcus) as xmobile");
		
		$where = " bizid = ". Session::get('sbizid') ." and xreqdelnum = '". $txnnum ."'";
		
		return $this->db->select("vimreqdeldet", $fields, $where, " order by xrow");
	}
	public function getDeliveryList($status){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xreqdelnum","xsonum","xcus","(select xorg from secus where secus.bizid=imreqdelmst.bizid and secus.xcus=imreqdelmst.xcus) as xorg");
		
		$where = " xstatus='".$status."' and bizid = ". Session::get('sbizid') ;
		
		return $this->db->select("imreqdelmst", $fields, $where);
	}
	public function checkMilestone($xponum){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xponum='".$xponum."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vpomilestone", $fields, $where);
	}
	public function getReqList(){
		$fields = array("distinct xsonum","date_format(xdate, '%d-%m-%Y') as xdate","xcus","(select xorg from secus where secus.bizid=vsalesdodt.bizid and secus.xcus=vsalesdodt.xcus) as xorg");
		//print_r($this->db->select("pabuziness", $fields));die;
		
			$where = " xqty-xdoqty>0 and bizid = ". Session::get('sbizid');
		
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vsalesdodt", $fields, $where);
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
		
		$this->db->update('imreqdelmst', $postdata, $where);
	}

	public function cancel($where){
		//echo $where;die;
		$postdata=array(
			"xstatus" => "Canceled"			
			);
		
		$this->db->update('imreqdelmst', $postdata, $where);
	}

	public function recdelete($where){
		$this->db->dbdelete('imreqdeldet', $where);
	}

	public function getAcc($acc){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xacc = '". $acc ."'";	
		return $this->db->select("glchart", $fields, $where);
	}
	
	public function getItemcost($item){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xitemcode = '". $item ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vitemcost", $fields, $where);
	}
	
		public function getItemStock($xitemcode, $xwh){
			return $this->db->getIMBalance($xitemcode, $xwh);
		}
}