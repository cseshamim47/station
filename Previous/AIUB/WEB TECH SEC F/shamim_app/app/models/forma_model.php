<?php 

class Forma_Model extends Model{
	
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
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xordernum = '". $sonum ."'";	
		return $this->db->select("formamst", $fields, $where);
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
		$where = "bizid = ". Session::get('sbizid') ." and xitemcode = '". $item ."'" ;	
		return $this->db->select("vitemcost", $fields, $where);
	}
	public function create($mcols, $mvals, $cols, $vals){

		// $file = fopen("C:/Users/DBS/Desktop/testdoc.txt","w");
		// echo fwrite($file,$mcols."--".$mvals."--".$cols."--".$vals);
		// fclose($file);

		$mresults = $this->db->insertMultipleDetail('formamst',$mcols,$mvals," ON DUPLICATE KEY UPDATE xdate = VALUES(xdate),xpress = VALUES(xpress),xquotnum = VALUES(xquotnum),xnotes = VALUES(xnotes),xyear = VALUES(xyear),xper = VALUES(xper)");
		$results = $this->db->insertMultipleDetail('formadet',$cols,$vals," ON DUPLICATE KEY UPDATE xitemcode = VALUES(xitemcode),xpress = VALUES(xpress), xprintqty = VALUES(xprintqty), xforma = VALUES(xforma), xformaplate = VALUES(xformaplate), xpapername = VALUES(xpapername), xpaperqty = VALUES(xpaperqty), xboardname = VALUES(xboardname), xboardqty = VALUES(xboardqty), xcoverplate = VALUES(xcoverplate), xyear = VALUES(xyear), xper = VALUES(xper)");
		
		return $mresults;	
	}
	public function recdelete($where){
		$this->db->dbdelete('formadet', $where);
	}
	public function getSales($sonum){
		$fields = array("*","(select xorg from secus where secus.bizid=sofreemst.bizid and secus.xcus=sofreemst.xcus) as xorg",
		"(select xadd1 from secus where secus.bizid=sofreemst.bizid and secus.xcus=sofreemst.xcus) as xadd1",
		"(select xphone from secus where secus.bizid=sofreemst.bizid and secus.xcus=sofreemst.xcus) as xphone");
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xsonum = '". $sonum ."'" ;	
		return $this->db->select("sofreemst", $fields, $where);
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
		
		$this->db->update('sofreemst', $postdata, $where);
			
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
		//print_r($this->db->select("sofreemst", $fields, $where));die;
		return $this->db->select("vsomilestone", $fields, $where);
	}	
	public function getSalesList($status){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xsonum","xcus","(select xorg from secus where secus.bizid=sofreemst.bizid and secus.xcus=sofreemst.xcus) as xorg","xcusdoc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and xstatus='".$status."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("sofreemst", $fields, $where);
	}

	
	
}