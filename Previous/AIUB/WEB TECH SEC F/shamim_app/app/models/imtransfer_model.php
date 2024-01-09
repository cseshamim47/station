<?php 

class imtransfer_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	
	
	public function getrindt($rin){
		
		$fields = array("xrdin","bin");
		
		$where = " bizid = ". Session::get('sbizid') ." and xrdin='".$rin."' and bc='1'";	
		
		return $this->db->select("vmlminfotreedt", $fields, $where);
	}
	
	public function create($data, $dtcols, $dtdata){
		//print_r($data); die;	
		$mstdata = array(
			"bizid"=>$data['bizid'],
			"ximptnum"=>$data['ximptnum'],
			"xsup"=>$data['xsup'],
			"xwh"=>$data['xwh'],
			"xtxnwh"=>$data['xtxnwh'],
			"xstatus"=>"Created",
			"xbranch" => $data['xbranch'],
			"xproj" => $data['xproj'],			
			"xdate" => $data['xdate'],
			"zemail"=>$data['zemail'],
			"xyear"=>$data['xyear'],
			"xper"=>$data['xper'],			
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and ximptnum ='" . $data['ximptnum'] . "'";
		
		$results = $this->db->insertMasterDetail('imtransfer',$mstdata,"imtransferdet",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	
	
	public function edit($data,$dt,$reqnum,$row){
		$header = array(
			"xnote"=>$data['xnote'],
			"xdate"=>$data['xdate'],
			"zutime"=>$data['zutime'],
			"xemail" => $data['xemail']
			);
		$detail = array(
					"xitemcode"=>$dt['xitemcode'],
					"xqty"=>$dt['xqty'],
					"xdate"=>$dt['xdate']
		);	
		//print_r($header); print_r($detail);die;
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximreqnum = '". $reqnum."'";
			$this->db->update('imreq', $header, $where);
			$where = "bizid = ". Session::get('sbizid') ." and ximreqnum = '". $reqnum."' and xrow=".$row;
			return ($this->db->update('imreqdet', $detail, $where));	
	}

	public function getItemStock($wh, $itemcode){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
	$where = " bizid = ". Session::get('sbizid') ." and xwh='".$wh."' and xitemcode='".$itemcode."'";	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vimstock", $fields, $where);
	}

	
	public function getImpt($ptnum){
		$fields = array("*","(select xorg from mlminfo where imtransfer.bizid=mlminfo.bizid and imtransfer.xrdinto=mlminfo.xrdin) as rinname");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximptnum = '". $ptnum ."'" ;	
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
		$fields = array("xrow","xitemcodeosp",
		"(select xdesc from seitem where imtransferdet.bizid=seitem.bizid and imtransferdet.xitemcodeosp=seitem.xitemcode) as xitemdesc", "xqty","xsalesprice","xqty*xsalesprice as xsalestotal" );
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xdoctype='Product Transfer' and ximptnum = '". $ptnum ."'";	
		return $this->db->select("imtransferdet", $fields, $where, " order by xrow");
	}
	public function printdo($ptnum){
		$fields = array("*","(select xorg from mlminfo where imtransferdet.bizid=mlminfo.bizid and imtransferdet.xrdinto=mlminfo.xrdin) as rinname",
		"(select xdesc from seitem where imtransferdet.bizid=seitem.bizid and imtransferdet.xitemcodeosp=seitem.xitemcode) as xitemdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xdoctype='Product Transfer' and ximptnum = '". $ptnum ."'";	
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
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","ximptnum");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xstatus='".$status."' and zemail='". Session::get('suser') ."'" ;	
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
	
	public function confirm($where, $ptnno){
			//echo $where;die;
		$postdata=array(
			"xstatus" => "Confirmed"
			);
		
		$this->db->update('imtransfer', $postdata, $where);		
		$this->db->update('osptxn', $postdata, " xrdin='".Session::get('suser')."' and xdocno='".$ptnno."' and xdoctype='Product Transfer'");
			
	}
	public function confirmrcv($where, $ptnno){
			//echo $where;die;
		$postdata=array(
			"xstatusrcv" => "Confirmed"
			);
			$postdata=array("xstatusrcv" => "Confirmed");
		
		$this->db->update('imtransfer', $postdata, $where);		
		$this->db->update('imtransferder', array("xstatus" => "Confirmed"), " xrdin='".Session::get('suser')."' and xstatus='Open' and xdoctype='Product Transfer Receive'");
			
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
	public function getBalance(){
		$xrdin = explode ("@",Session::get('suser'));
		
		return $this->db->checkOSPBalance($xrdin[0]);
	}
	
	public function getItemDetail($searchby, $val){
		return $this->db->getItemMaster($searchby, $val);
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