<?php 

class Distcashnbankpay_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
			
		$results = $this->db->insert('distcashnbankpay', array(
			"bizid"=>$data['bizid'],
			"zemail"=>$data['zemail'],
			"stno"=>$data['stno'],
			"xrdin"=>$data['xrdin'],
			"xdate"=>$data['xdate'],
			"xtype"=>"Cash",
			"xamount"=>$data['xamount'],
			"xdoctype"=>"Cash Payment",
			"xotn"=>$data['xotn'],
			"xbranch"=>Session::get('sbranch')
			));
		
		return $results;	
	}
	
	
	
	public function edit($data,$num){ //print_r($data); die;
		$header = array(
			"xnote"=>$data['xnote'],
			"zutime"=>$data['zutime'],
			"xemail" => $data['xemail'],
			"xbank"=>$data['xbank'],
			"xaccount"=>$data['xaccount']	
		);	
		
			$where = " bizid = ". Session::get('sbizid') ." and xpaynreqnum = '". $num."' and xdoctype='Withdrawal Request'";
			return $this->db->update('distpaynreq', $header, $where);
			
	}
	
	public function getWithdrawReq($otn){
		$fields = array("xrdin","xotn","sum(xamount*xsign) as xamount");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "  xotn='". $otn ."'  group by xrdin,xotn" ;	
		//print_r($this->db->select("distpaynreq", $fields, $where," order by xpaynreqnum desc ", $limit));die;
		return $this->db->select("vwithdrawaldt", $fields, $where);
	}
	public function getWithdrawReqjson($otn){
		$fields = array("xrdin","xotn","sum(xamount*xsign) as xamount");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "  xotn='". $otn ."' group by xrdin,xotn" ;	
		//print_r($this->db->select("vwithdrawaldt", $fields, $where));die;
		echo json_encode($this->db->select("vwithdrawaldt", $fields, $where));
	}
	
	public function getList($limit=""){
		$fields = array("xpaynum","date_format(xdate, '%d-%m-%Y') as xdate","xrdin","(select xorg from mlminfo where distcashnbankpay.xrdin=mlminfo.xrdin) as xorg","xamount");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid')." and zemail='". Session::get('suser') ."' and xbranch='". Session::get('sbranch') ."'" ;	
		//print_r($this->db->select("distpaynreq", $fields, $where," order by xpaynreqnum desc ", $limit));die;
		return $this->db->select("distcashnbankpay", $fields, $where," order by xpaynum desc", $limit);
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	
		
	public function getStatementNo(){
		
		return $this->db->getStatementNo();
	}
	
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	
	public function getBalance(){
		$xrdin = explode ("@",Session::get('suser'));
	
		return $this->db->checkOSPBalance($xrdin[0]);
	}
	
}