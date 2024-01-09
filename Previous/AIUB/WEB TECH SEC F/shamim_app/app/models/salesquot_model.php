<?php 

class Salesquot_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data, $dtcols, $dtdata){
		//(100,'QUOT3-000001','1',' BEL-IRN-CON-1051',' BEL-IRN-CON-1051', '0','2017-12-02','1248.00','0','0','1','BDT','None','None','rajib@pureapp.com','None','ABP-963-0014',2017,12)
		//print_r($data); die;	
		$mstdata = array(
			"bizid"=>$data['bizid'],
			"xquotnum"=>$data['xquotnum'],
			"xrefquot"=>$data['xquotnum'], 
			"xstatus"=>"Created",
			"xdate" => $data['xdate'],
			"zemail"=>$data['zemail'],
			"xcus"=>$data['xcus'],
			"xnotes"=>$data['xnotes'],			
			"xgrossdisc"=>$data['xgrossdisc'],
			"xproj"=>Session::get('sbranch'),
			"xbranch"=>Session::get('sbranch'),
			"xwh"=>Session::get('sbranch')
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and xquotnum ='" . $data['xquotnum'] . "'";
		
		$results = $this->db->insertMasterDetail('soquot',$mstdata,"soquotdet",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	public function savesales($data, $dtcols, $dtdata){
		//print_r($data); die;	
		$mstdata = array(
			"bizid"=>$data['bizid'],
			"xsonum"=>$data['xsonum'],
			"xwh"=>$data['xwh'],
			"xbranch"=>$data['xbranch'],
			"xproj"=>$data['xproj'],
			"xstatus"=>$data['xstatus'],
			"xdate" => $data['xdate'],
			"zemail"=>$data['zemail'],
			"xcus"=>$data['xcus'],
			"xnotes"=>$data['xnotes'],
			"xquotnum"=>$data['xquotnum'],
			"xgrossdisc"=>$data['xgrossdisc'],
			"xyear"=>$data['xyear'],
			"xper"=>$data['xper'],
			"xvoucher"=>$data['xvoucher']
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and xsonum ='" . $data['xsonum'] . "'";
		
		$results = $this->db->insertMasterDetail('somst',$mstdata,"sodet",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	
	public function edit($data,$dt,$quotnum,$row){
		$header = array(
			"xemail"=>Session::get('suser'),
			"zutime"=>date("Y-m-d H:i:s"),
			"xdate"=>$data['xdate'],
			"xcus"=>$data['xcus'],
			"xnotes"=>$data['xnotes'],
			"xgrossdisc"=>$data['xgrossdisc']
			);
		$detail = array(
					"xitemcode"=>$dt['xitemcode'],
					"xqty"=>$dt['xqty'],
					"xrate"=>$dt['xrate'],
					"xdate"=>$dt['xdate'],
					"xdisc"=>$dt['xdisc'],
					"xtypestk"=>$dt['xtypestk']
		);	
		//print_r($header); print_r($detail);die;
			$where = " bizid = ". Session::get('sbizid') ." and xquotnum = '". $quotnum."'";
			$this->db->update('soquot', $header, $where);
			$where = "bizid = ". Session::get('sbizid') ." and xquotnum = '". $quotnum."' and xrow=".$row;
			return ($this->db->update('soquotdet', $detail, $where));	
	}
	public function createrevise($mstfields, $mstdata,$intocols, $frmcols,  $where){
		$result = $this->db->insertAsFromTable("soquot", $mstfields, $mstdata, "soquotdet",$intocols, $frmcols,"soquotdet", $where);
		return $result;
	}
	public function getQuotation($quotnum){
		$fields = array("*","(select xorg from secus where secus.bizid=soquot.bizid and secus.xcus=soquot.xcus) as xorg",
		"(select xadd1 from secus where secus.bizid=soquot.bizid and secus.xcus=soquot.xcus) as xadd1",
		"(select xphone from secus where secus.bizid=soquot.bizid and secus.xcus=soquot.xcus) as xphone");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xquotnum = '". $quotnum ."'" ;	
		//print_r($this->db->select("somst", $fields, $where));die;
		return $this->db->select("soquot", $fields, $where);
	}

	public function getQuotationHistory($quotnum){
		$fields = array("xquotnum");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xrefquot = '". $quotnum ."'" ;	
		//print_r($this->db->select("somst", $fields, $where));die;
		return $this->db->select("soquot", $fields, $where);
	}
	
	public function getQuotmilestone($quotnum){
		$fields = array("*","(select xorg from secus where secus.bizid=vquotmilestone.bizid and secus.xcus=vquotmilestone.xcus) as xorg",
		"(select xadd1 from secus where secus.bizid=vquotmilestone.bizid and secus.xcus=vquotmilestone.xcus) as xadd1",
		"(select xphone from secus where secus.bizid=vquotmilestone.bizid and secus.xcus=vquotmilestone.xcus) as xphone");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xquotnum = '". $quotnum ."'" ;	
		//print_r($this->db->select("somst", $fields, $where));die;
		return $this->db->select("vquotmilestone", $fields, $where);
	}
	public function getAllQuotmilestone($status){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xquotnum","xcus","(select xorg from secus where secus.bizid=vquotmilestone.bizid and secus.xcus=vquotmilestone.xcus) as xorg","xsonum");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "";
		if($status=='Completed')
			$where = " bizid = ". Session::get('sbizid') ." and xsonum != '' and xstatus='Confirmed'" ;	
		else
			$where = " bizid = ". Session::get('sbizid') ." and xstatus='Confirmed' and xsonum is null" ;	
		//print_r($this->db->select("somst", $fields, $where));die;
		return $this->db->select("vquotmilestone", $fields, $where);
	}
	public function getSingleQuotDt($quotnum, $row){
		$fields = array("*",
		"(select xdesc from seitem where soquotdet.bizid=seitem.bizid and soquotdet.xitemcode=seitem.xitemcode) as xitemdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xquotnum = '". $quotnum ."' and xrow = ". $row;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("soquotdet", $fields, $where);
	}
	
	public function getquotationdt($quotnum){
		$fields = array("xrow",
		"xitemcode","(select xdesc from seitem where soquotdet.bizid=seitem.bizid and soquotdet	.xitemcode=seitem.xitemcode) as xitemdesc",	
		"xqty","xrate","xqty*xrate as xsalestotal","xqty*xdisc as xdisctotal" );
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xquotnum = '". $quotnum ."'";	
		return $this->db->select("soquotdet", $fields, $where, " order by xrow");
	}
	public function getquotationitem($quotnum){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xquotnum = '". $quotnum ."'";	
		return $this->db->select("soquotdet", $fields, $where, " order by xrow");
	}
	public function getQuotationList($status){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xquotnum","xcus","(select xorg from secus where secus.bizid=soquot.bizid and secus.xcus=soquot.xcus) as xorg");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xstatus='".$status."' and bizid = ". Session::get('sbizid');	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("soquot", $fields, $where);
	}
	public function getItemMaster($xitem,$xval){
		return $this->db->getItemMaster($xitem,$xval);
	}
	public function confirm($postdata,$where){
		
		$this->db->update('soquot', $postdata, $where);
			
	}
	public function getStock($item,$wh){
		return $this->db->getIMBalance($item,$wh);
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	
	
	public function getRow($table,$keyfield,$num, $xrow){
		
		return $this->db->rowIncrement($table,$keyfield,$num, $xrow);
	}
	public function recdelete($where){
		$this->db->dbdelete('soquotdet', $where);
	}
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	
	public function deletequot($where){
			//echo $where;die;
		$postdata=array(
			
			"xstatus" => "Deleted"
			);
		
		$this->db->update('soquot', $postdata, $where);
			
	}
}