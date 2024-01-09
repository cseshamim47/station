<?php 

class Distwithdraw_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
			
		$results = $this->db->insert('distpaynreq', array(
			"bizid"=>$data['bizid'],
			"zemail"=>$data['zemail'],
			"stno"=>$data['stno'],
			"xrdin"=>$data['xrdin'],
			"xdate"=>$data['xdate'],
			"xnote"=>$data['xnote'],
			"xtype"=>$data['xtype'],
			"xamount"=>$data['xamount'],
			"xbank"=>$data['xbank'],
			"xaccount"=>$data['xaccount'],
			"xdoctype"=>"Withdrawal Request",
			"xotn"=>$data['xotn'],
			"xbnkbr"=>$data['xbnkbr']
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
	
	public function getTxn($num){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xpaynreqnum = '". $num ."' and xdoctype='Withdrawal Request'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("distpaynreq", $fields, $where);
	}
	
	public function getmobileno(){
		$fields=array();
		$where = " bizid = ". Session::get('sbizid')." and xrdin='". Session::get('suser') ."'";
		return $this->db->select("mlminfo", $fields, $where);	
	}
	
	public function getList($limit=""){
		$fields = array("xpaynreqnum","date_format(xdate, '%d-%m-%Y') as xdate","xtype","xbank","xaccount","xamount");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid')." and zemail='". Session::get('suser') ."' and xdoctype='Withdrawal Request'" ;	
		//print_r($this->db->select("distpaynreq", $fields, $where," order by xpaynreqnum desc ", $limit));die;
		return $this->db->select("distpaynreq", $fields, $where," order by xpaynreqnum desc", $limit);
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