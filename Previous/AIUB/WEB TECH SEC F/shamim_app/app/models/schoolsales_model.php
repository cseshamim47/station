<?php 

class Schoolsales_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}


	public function getBooks($xcus,$class){
		$fields = array("xitemcode", "xclass");
		
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xcus = '". $xcus ."' and xclass IN (".$class.")" ;	
		
		return $this->db->select("itemscmap", $fields, $where);
	}

	public function getSOStatus($sonum){
		$fields = array("xstatus");
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xsonum = '". $sonum ."'";	
		return $this->db->select("somst", $fields, $where);
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	public function getRow($table,$keyfield,$num, $xrow){
		
		return $this->db->rowIncrement($table,$keyfield,$num, $xrow);
	}
	public function getItemMaster($xitem,$xval){
		return $this->db->getItemMaster($xitem,$xval);
	}
	public function getItemcost($item){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xitemcode = '". $item ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vitemcost", $fields, $where);
	}
	public function create($mcols, $mvals, $cols, $vals){

		// $resultss = $this->db->insert('somst', array(
		// 	"bizid"=>$data['bizid'],
		// 	"xsonum"=>$data['xsonum'],
		// 	"xwh"=>$data['xwh'],
		// 	"xbranch"=>Session::get('sbranch'),
		// 	"xproj"=>Session::get('sbranch'),
		// 	"xstatus"=>"Created",
		// 	"xdate" => $data['xdate'],
		// 	"zemail"=>$data['zemail'],
		// 	"xcus"=>$data['xcus'],
		// 	"xcusbal"=>$data['xcusbal'],
		// 	"xrcvamt"=>$data['xrcvamt'],
		// 	"xnotes"=>$data['xnotes'],
		// 	"xquotnum"=>$data['xquotnum'],
		// 	"xgrossdisc"=>$data['xgrossdisc'],			
		// 	"xyear"=>$data['xyear'],
		// 	"xper"=>$data['xper']
		// 	));
			
		//$checkval = " bizid = " . $data['bizid'] . " and xsonum ='" . $data['xsonum'] . "'";
		$mresults = $this->db->insertMultipleDetail('somst',$mcols,$mvals," ON DUPLICATE KEY UPDATE xrcvamt = VALUES(xrcvamt),xcus = VALUES(xcus),xwh = VALUES(xwh),xquotnum = VALUES(xquotnum),xgrossdisc = VALUES(xgrossdisc),xrcvamt = VALUES(xrcvamt),xnotes = VALUES(xnotes),xyear = VALUES(xyear),xper = VALUES(xper),xpackcharge = VALUES(xpackcharge),xtranscost = VALUES(xtranscost)");
		$results = $this->db->insertMultipleDetail('sodet',$cols,$vals," ON DUPLICATE KEY UPDATE xitemcode = VALUES(xitemcode), xrate = VALUES(xrate), xqty = VALUES(xqty), xwh = VALUES(xwh), xdisc = VALUES(xdisc), xcus = VALUES(xcus), xyear = VALUES(xyear), xper = VALUES(xper), xdispct = VALUES(xdispct)");
		
		return $mresults;	
	}
	public function recdelete($where){
		$this->db->dbdelete('sodet', $where);
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
	public function getCustomer($cus){
		$fields = array("*");
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xcus = '". $cus ."'";	
		return $this->db->select("secus", $fields, $where);
	}
	public function getsalesForConfirm($sonum){
		$fields = array("xrow","xcus","xgrossdisc","xrcvamt","xpackcharge","xtranscost",
		"xitemcode","(select xdesc from seitem where vsalesdt.bizid=seitem.bizid and vsalesdt.xitemcode=seitem.xitemcode) as xitemdesc","xqty", "xrate","xqty*xrate*xexch as ta","xqty*(xtaxrate*xrate*xexch/100) as tt","xdisc as id" );
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xsonum = '". $sonum ."'";	
		return $this->db->select("vsalesdt", $fields, $where, " order by xrow");
	}
	public function glsalesinterface(){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xtypeinterface = 'GL Sales Interface'";	
		return $this->db->select("glinterface", $fields, $where);
	}
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
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
	public function confirm($postdata,$where){
		
		$this->db->update('somst', $postdata, $where);
			
	}
	public function getAcc($acc){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xacc = '". $acc ."'";	
		return $this->db->select("glchart", $fields, $where);
	}
	public function getsomilestone($txnnum){
		$fields = array("*");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xsonum = '". $txnnum ."'" ;	
		//print_r($this->db->select("somst", $fields, $where));die;
		return $this->db->select("vsomilestone", $fields, $where);
	}	
	public function getSalesList($status){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xsonum","xcus","(select xorg from secus where secus.bizid=somst.bizid and secus.xcus=somst.xcus) as xorg","xcusdoc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and xstatus='".$status."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("somst", $fields, $where);
	}

	
	
}