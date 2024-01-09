<?php 

class Purchasecost_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
		//print_r($data); die;	
		$mstdata = array(
			"bizid"=>$data['bizid'],
			"xponum"=>$data['xponum'],
			"xcosthead"=>$data['xcosthead'],
			"xstatus"=>"Created",
			"xamount"=>$data['xamount'],			
			"zemail"=>$data['zemail'],
			
			);
			
		
		
		$results = $this->db->insert('pocost',$mstdata);
		
		return $results;	
	}
	
	
	public function edit($data){
			
			$where = "bizid = ". Session::get('sbizid') ." and xsl=".$data["xsl"];
			return ($this->db->update('pocost', $data, $where));	
	}
	
	public function getPO($txnnum){
		$fields = array("*");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xponum = '". $txnnum ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("pomst", $fields, $where);
	}
	public function getSinglePoCost($sl){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
	$where = " bizid = ". Session::get('sbizid') ." and xsl=".$sl;
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("pocost", $fields, $where);
	}
		
	public function getcostdt($txnnum){
		$fields = array("xsl",
		"xcosthead",	
		"xamount");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xponum = '". $txnnum ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("pocost", $fields, $where, " order by xsl");
	}

	
	public function getPOList($status){
		$fields = array("distinct xponum");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xstatus='".$status."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("pocost", $fields, $where);
	}
	
	
	
	public function recdelete($where){
		$this->db->dbdelete('pocost', $where);
	}
}