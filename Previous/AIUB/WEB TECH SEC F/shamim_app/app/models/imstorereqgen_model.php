<?php 

class Imstorereqgen_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data, $dtcols, $dtdata){
		//print_r($data); die;	
		$mstdata = array(
			"bizid"=>$data['bizid'],
			"ximreqnum"=>$data['ximreqnum'],
			"xnote"=>$data['xnote'],
			"xdeliveryto"=>$data['xdeliveryto'],
			"xstatus"=>"Created",
			"xbranch" => $data['xbranch'],
			"xdate" => $data['xdate'],
			"zemail"=>$data['zemail'],
			"xtype"=>"General Store",
			"xproject"=>$data['xproject'],
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and ximreqnum ='" . $data['ximreqnum'] . "'";
		
		$results = $this->db->insertMasterDetail('imstorereq',$mstdata,"imstorereqdet",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	
	
	public function edit($data,$dt,$reqnum,$row){
		$header = array(
			"xnote"=>$data['xnote'],
			"xdeliveryto"=>$data['xdeliveryto'],
			"xdate"=>$data['xdate'],
			"zutime"=>$data['zutime'],
			"xemail" => $data['xemail'],
			"xproject"=>$data['xproject'],
			);
		$detail = array(
			"xitemcode"=>$dt['xitemcode'],
			"xqty"=>$dt['xqty'],
			"xdate"=>$dt['xdate'],
			"xwh"=>$dt['xwh'],
			"xpur"=>$dt['xpur']
			//"xrate"=>$dt['xrate']
		);	
		//print_r($header); print_r($detail);die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximreqnum = '". $reqnum."'";
		$this->db->update('imstorereq', $header, $where);
		$where = "bizid = ". Session::get('sbizid') ." and ximreqnum = '". $reqnum."' and xrow=".$row;
		return ($this->db->update('imstorereqdet', $detail, $where));
	}
	
	public function getImreq($reqnum){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximreqnum = '". $reqnum ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("imstorereq", $fields, $where);
	}
	public function getSingleReqDt($reqnum, $row){
		$fields = array("*", "(select xdesc from seitem where imstorereqdet.bizid=seitem.bizid and imstorereqdet.xitemcode=seitem.xitemcode) as xitemdesc", "(select xunitstk from seitem where imstorereqdet.bizid=seitem.bizid and imstorereqdet.xitemcode=seitem.xitemcode) as xunitstk");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and ximreqnum = '". $reqnum ."' and xrow = ". $row;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("imstorereqdet", $fields, $where);
	}
	
	public function getimreqdt($reqnum){
		$fields = array("xrow","xitemcode", "(select xdesc from seitem where imstorereqdet.bizid=seitem.bizid and imstorereqdet.xitemcode=seitem.xitemcode) as xitemdesc", "xqty", "(select xunitstk from seitem where imstorereqdet.bizid=seitem.bizid and imstorereqdet.xitemcode=seitem.xitemcode) as xunitstk", "xwh");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximreqnum = '". $reqnum ."'";	
		return $this->db->select("imstorereqdet", $fields, $where, " order by xrow");
	}
	
	public function getImreqList($status=""){
		$where = "";
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","ximreqnum","xappstatus","xemail","xproject","xnote");
		//print_r($this->db->select("pabuziness", $fields));die;
		// if($status=="Confirmed")
		// 	$where = "xrecflag='Live' and (xstatus <> 'Created' and xstatus <> 'Canceled') and bizid = ". Session::get('sbizid') ." and zemail='". Session::get('suser') ."'" ;
		// else
			$where = "xrecflag='Live' and xstatus = '". $status ."' and bizid = ". Session::get('sbizid') ." and zemail='". Session::get('suser') ."' and xtype='General Store'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("imstorereq", $fields, $where);
	}

	public function getApproval(){
		$fields = array("xlevel","xstatus");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "zactive='1' and xdept = '". Session::get('srole') ."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("paapproval", $fields, $where, " order by xlevel limit 1");
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	
	public function delete($where){
			//echo $where;die;
		$postdata=array(
			"xrecflag" => "Deleted",
			"xemail" => Session::get('suser'),
			"zutime" => date("Y-m-d H:i:s")
			);
		
		$this->db->update('glheader', $postdata, $where);
			
	}
	
	
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	
	public function getRow($table,$keyfield,$num, $xrow){
		
		return $this->db->rowIncrement($table,$keyfield,$num, $xrow);
	}
	function dbdelete($where){
		return $this->db->dbdelete("imstorereqdet",$where);
	}

	public function confirm($postdata,$where){
		
		$this->db->update('imstorereq', $postdata, $where);
			
	}	
	
	public function getItemDetail($searchby, $val){
		return $this->db->getItemMaster($searchby, $val);
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
	public function getquotationdt($quotnum){
		$fields = array("xrow",
		"xitemcode","(select xdesc from seitem where soquotdet.bizid=seitem.bizid and soquotdet	.xitemcode=seitem.xitemcode) as xitemdesc",	
		"xqty","xrate","xqty*xrate as xsalestotal","xqty*xdisc as xdisctotal" );
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xquotnum = '". $quotnum ."'";	
		return $this->db->select("soquotdet", $fields, $where, " order by xrow");
	}
	
	public function getReq($num){
		$fields = array("*");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and ximreqnum = '". $num ."' and xtype='General Store'" ;	
		//print_r($this->db->select("somst", $fields, $where));die;
		return $this->db->select("vimstorereqdet", $fields, $where);
	}
}