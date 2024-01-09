<?php

class Installment_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($cols, $vals){
		
		$results = 0;
		$results = $this->db->insertMultipleDetail("installmentmst",$cols, $vals);
		return $results;
	}
	
	public function editWaver($data, $inssl){
		
		$fields = array(
			
			"zutime"=>$data['zutime'],
			"xper"=>$data['xper'],
			"xcus" => $data['xcus'],
			"xagent" => $data['xagent'],
			"xagentcom" => $data['xagentcom'],
			"xinsnum" => $data['xinsnum'],
			"xquotnum" => $data['xquotnum'],
			"xamount" => $data['xamount'],
			"xyear" => $data['xyear'],
			"xdate" => $data['xdate'],
			"xemail" => $data['xemail']
			);
			
			$where = " bizid = ". Session::get('sbizid') ." and xbranch = '". Session::get('sbranch') ."' and xinsnum = '". $data['xinsnum'] ."' and xinssl = '". $inssl ."' and xcus = '". $data['xcus'] ."'";
			 $results = $this->db->update('installmentmst', $fields, $where);
			 return $results;
	}
	public function academicYear(){
		$fields = array("xcode");		
		$where = "xrecflag='Live' 
		and bizid = ". Session::get('sbizid') ." and xcodetype = 'Academic Year' order by xcode desc LIMIT 1";		
		return $this->db->select("secodes", $fields, $where);
	}
	public function getSingleWaver($enid){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xbranch = '". Session::get('sbranch') ."' and xyear=(select xcode from secodes where xcodetype='Academic Year' order by xcode desc limit 1) 
		and xyear=(select xcode from secodes where xcodetype='Academic Year' order by xcode desc limit 1) and xextraid = '". $enid."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vextradt", $fields, $where);
	}
	
	public function getRow($table,$keyfield,$num, $xrow){
		
		return $this->db->rowIncrement($table,$keyfield,$num, $xrow);
	}
	
	
	public function getPlanHeader($enid){
		$fields = array("xdate","xinsnum","xcus","xquotnum","xamount","");
		
		$where = "bizid = ". Session::get('sbizid') ." and xinsnum = '". $enid ."' and xbranch = '". Session::get('sbranch') ."'" ;	
		
		return $this->db->select("installmentmst", $fields, $where);
	}
	public function getPlanDt($enid){
		$fields = array("xextraid","xstudentid","xstuname", "xclass","xsection", "xshift", "xper","xamount");
		
		$where = "bizid = ". Session::get('sbizid') ." and xyear=(select xcode from secodes where xcodetype='Academic Year' order by xcode desc limit 1) and xstudentid = '". $enid ."' and xbranch = '". Session::get('sbranch') ."'" ;	
		
		return $this->db->select("vextradt", $fields, $where);
	}

	public function getInstallmentByLimit($limit=""){
		$fields = array("xinsnum", "xcus", "(select xorg from secus where secus.bizid=installmentmst.bizid and secus.xcus=installmentmst.xcus) as xorg", "(select xadd1 from secus where secus.bizid=installmentmst.bizid and secus.xcus=installmentmst.xcus) as xadd1","(select xmobile from secus where secus.bizid=installmentmst.bizid and secus.xcus=installmentmst.xcus) as xmobile");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("installmentmst", $fields, $where, " group by xinsnum", $limit);
	}

	public function getInstallment($seid){
		$fields = array("*");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xinsnum = '". $seid ."'" ;	
		//print_r($this->db->select("somst", $fields, $where));die;
		return $this->db->select("installmentmst", $fields, $where);
	}

	public function getInstallmentdt($seid){
		$fields = array("xinssl","date_format(xdate, '%d-%m-%Y') as xdate","xinsnum","xcus","xamount","(select xorg from secus where secus.bizid=installmentmst.bizid and secus.xcus=installmentmst.xcus) as xorg","xagent","(select xshort from agent where agent.xagent=installmentmst.xagent) as xagname","xagentcom");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xinsnum = '". $seid ."'" ;	
		//print_r($this->db->select("somst", $fields, $where));die;
		return $this->db->select("installmentmst", $fields, $where,"order by xsl asc");
	}

	public function getInstallmentdata($enid, $inssl){
		$fields = array("*","(select xorg from secus where secus.bizid=installmentmst.bizid and secus.xcus=installmentmst.xcus) as xorg", "(select xadd1 from secus where secus.bizid=installmentmst.bizid and secus.xcus=installmentmst.xcus) as xadd1");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xinssl = '". $inssl ."' and xinsnum = '". $enid ."'" ;	
		//print_r($this->db->select("somst", $fields, $where));die;
		return $this->db->select("installmentmst", $fields, $where);
	}
	
	
	public function getInsList(){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xinsnum","xcus","(select xshort from secus where secus.bizid=installmentmst.bizid and secus.xcus=installmentmst.xcus) as xshort", "(select xadd1 from secus where secus.bizid=installmentmst.bizid and secus.xcus=installmentmst.xcus) as xadd1","(select xmobile from secus where secus.bizid=installmentmst.bizid and secus.xcus=installmentmst.xcus) as xmobile");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("installmentmst", $fields, $where, "group by xinsnum");
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	
	public function delete($where){
			//echo $where;die;
		
		
		$this->db->dbdelete('installmentmst', $where);
			
	}
	
}