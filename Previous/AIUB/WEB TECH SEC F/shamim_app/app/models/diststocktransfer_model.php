<?php 

class Diststocktransfer_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
		
	
	public function create($data, $dtcols, $dtdata){
		//print_r($data); die;	
		$mstdata = array(
			"xdate"=>$data['xdate'],
			"bizid"=>$data['bizid'],
			"ximptnum"=>$data['ximptnum'],
			"xsup"=>$data['xsup'],
			"xproj"=>$data['xbranch'],
			"xtxnwh"=>$data['xtxnwh'],
			"xstatus"=>"Created",
			"xbranch" => $data['xbranch'],
			"xdate" => $data['xdate'],
			"zemail"=>$data['zemail'],
			"xwh"=>$data['xwh'],
			"xdoctype"=>$data['xdoctype'],
			"xnote"=>$data['xnote'],
			"xyear"=>$data['xyear'],
			"xper"=>$data['xper'],
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and ximptnum ='" . $data['ximptnum'] . "'";
		
		$results = $this->db->insertMasterDetail('imtransfer',$mstdata,"imtransferdet",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	
	
	public function edit($data,$dt,$ptnum,$row){
		$header = array(			
			"xdate"=>$data['xdate'],
			"zutime"=>$data['zutime'],
			"xemail" => $data['xemail'],
			"xnote"=>$data['xnote'],
			"xyear" => $data['xyear'],
			"xper" => $data['xper']
			);
		$detail = array(
					"xitemcode"=>$dt['xitemcode'],
					"xunit"=>$dt['xunit'],
					"xtypestk"=>$dt['xtypestk'],
					"xstdcost"=>$dt['xstdcost'],
					"xqty"=>$dt['xqty'],
					"xdate"=>$dt['xdate'],
					"xyear" => $dt['xyear'],
					"xper" => $dt['xper']
		);	
		//print_r($header); print_r($detail);die;
			$where = " bizid = ". Session::get('sbizid') ." and ximptnum = '". $ptnum."'";
			$this->db->update('imtransfer', $header, $where);
			$where = " bizid = ". Session::get('sbizid') ." and ximptnum = '". $ptnum."' and xrow=".$row;
			return ($this->db->update('imtransferdet', $detail, $where));	
	}
	
	public function getImpt($ptnum){
		$fields = array("*");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and ximptnum = '". $ptnum ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("imtransfer", $fields, $where);
	}
	public function getSingleReqDt($reqnum, $row){
		$fields = array("*", "(select xdesc from seitem where imreqdet.bizid=seitem.bizid and imreqdet.xitemcode=seitem.xitemcode) as xitemdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and ximreqnum = '". $reqnum ."' and xrow = ". $row;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("imreqdet", $fields, $where);
	}
	
	public function getimtransferdt($ptnum){
		$fields = array("xrow","xitemcode",
		"(select xdesc from seitem where imtransferdet.bizid=seitem.bizid and imtransferdet.xitemcode=seitem.xitemcode) as xitemdesc", "xqty");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xdoctype='Stock Transfer' and ximptnum = '". $ptnum ."'";	
		return $this->db->select("imtransferdet", $fields, $where, " order by xrow");
	}
	public function getimtransferdtOne($ptnum, $xrow){
		$fields = array("*",
		"(select xdesc from seitem where imtransferdet.bizid=seitem.bizid and imtransferdet.xitemcode=seitem.xitemcode) as xitemdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xdoctype='Stock Transfer' and ximptnum = '". $ptnum ."' and xrow=".$xrow;	
		return $this->db->select("imtransferdet", $fields, $where, " order by xrow");
	}
	public function getItemStock($xitemcode, $xwh){
		return $this->db->getIMBalance($xitemcode, $xwh);
	}
	public function printchalan($ptnum){
		$fields = array("*",
		"(select xdesc from seitem where imtransferdet.bizid=seitem.bizid and imtransferdet.xitemcode=seitem.xitemcode) as xitemdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xdoctype='Stock Transfer' and ximptnum = '". $ptnum ."'";	
		return $this->db->select("imtransferdet", $fields, $where, " order by xrow");
	}
	public function printdorcv($ptnum){
		$fields = array("*","(select xorg from mlminfo where imtransferdet.bizid=mlminfo.bizid and imtransferdet.xrdinto=mlminfo.xrdin) as rinname",
		"(select xdesc from seitem where imtransferdet.bizid=seitem.bizid and imtransferdet.xitemcodeosp=seitem.xitemcode) as xitemdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xdoctype='Product Transfer Receive' and ximptnum = '". $ptnum ."'";	
		return $this->db->select("imtransferdet", $fields, $where, " order by xrow");
	}
	public function getImptList($status){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","ximptnum", "xwh", "xtxnwh");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xstatus='".$status."' and xdoctype='Stock Transfer'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("imtransfer", $fields, $where);
	}
	public function getImptRcvList($status){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","ximptnum");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xstatus='Confirmed' and xstatusrcv='".$status."' and xrdinto='". Session::get('suser') ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("imtransfer", $fields, $where);
	}
	public function getptnno($ptnno){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xstatus='Un-Confirmed' and xdocno='".$ptnno."' and xrdin='". Session::get('suser') ."' and xdoctype='Product Transfer'";	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("osptxn", $fields, $where);
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	
	public function confirm($ptnum){
		
		$postdata=array("xstatus" => "Confirmed");

		$this->db->update("imtransfer",$postdata," ximptnum='".$ptnum."'");

		$where = " where ximptnum='".$ptnum."' and xdoctype='Stock Transfer'";
		
		$intocols = "`bizid`,`ximptnum`,`xrow`,`xitemcode`,`xitembatch`,`xqty`,`xdate`,`xstdcost`,`zemail`,`xwh`,`xyear`,`xper`,`xtxnwh`,`xdoctype`,`xsign`,`xunit`,`xtypestk`";

		$fromcols = "`bizid`,`ximptnum`,`xrow`,`xitemcode`,`xitembatch`,`xqty`,`xdate`,`xstdcost`,`zemail`,`xtxnwh` as xwh,`xyear`,`xper`,`xwh` as xtxnwh,'Stock Receive' as `xdoctype`,1 as `xsign`,`xunit`,`xtypestk`";		
		
		return $this->db->insertAsFromSingleTable("imtransferdet",$intocols, $fromcols,"imtransferdet", $where);
	}

	public function cancel($ptnum){
			//echo $where;die;
		
		$postdata=array("xstatus" => "Canceled");

		return $this->db->update("imtransfer",$postdata," ximptnum='".$ptnum."'");

	}

	public function dbdelete($where){
			//echo $where;die;
		$this->db->dbdelete("imtransferdet", $where);
			
	}
	public function getStatementNo(){
		
		return $this->db->getStatementNo();
	}
	
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	
	public function getRow($table,$keyfield,$num, $xrow){
		
		return $this->db->rowIncrement($table,$keyfield,$num, $xrow);
	}
	
	public function getItemDetail($item){
		$fields = array("avgcost","(select xsup from seitem where seitem.bizid=vitemcost.bizid and seitem.xitemcode=vitemcost.xitemcode) as xsup","(select xunitstk from seitem where seitem.bizid=vitemcost.bizid and seitem.xitemcode=vitemcost.xitemcode) as xunitstk","(select xtypestk from seitem where seitem.bizid=vitemcost.bizid and seitem.xitemcode=vitemcost.xitemcode) as xtypestk");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xitemcode = '". $item ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vitemcost", $fields, $where);
	}
	public function getIMBalance($itemcode,$xwh){
		
		return $this->db->getOSPStock($itemcode,$xwh);
	}
	public function getSubAccDt($where){
		
		echo json_encode($this->db->select("glchartsub",array(),$where));
	}
	public function getmobileno(){
		$fields=array();
		$where = " bizid = ". Session::get('sbizid')." and xrdin='". Session::get('suser') ."'";
		return $this->db->select("mlminfo", $fields, $where);	
	}
}