<?php 

class Itempicklist_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	
		
	public function getItemsByLimit($limit=""){
		$fields = array("xitemcode","xitemcodealt", "xdesc", "xmrp");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " zactive=1 and xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("seitem", $fields, $where, " order by xitemcode desc", $limit);
	}
		
	public function getItemsByLimitGroup($group,$limit=""){
		$fields = array("xitemcode", "xdesc", "xcat", "xmrp");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " zactive=1 and xrecflag='Live' and xgitem='".$group."' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("seitem", $fields, $where, " order by xitemcode desc", $limit);
	}
	
	public function getospitemlist($xwh){
		$fields = array("xitemcode as xitemcodeosp", "(select xdesc from seitem where vospstock.bizid=seitem.bizid and vospstock.xitemcode=seitem.xitemcode) as xdesc", "xbalance");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xwh = '". $xwh ."'";	
		return $this->db->select("vospstock", $fields, $where, " order by xitemcode desc");
	}
	
	public function getospitem(){
		$fields = array("xitemcode","xdesc", "xmrp","xdp as xpoint");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " zactive=1 and bizid = ". Session::get('sbizid') ." and xsource='OSP' and zactive='1'";	
		return $this->db->select("seitem", $fields, $where, " order by xitemcode desc");
	}
	
	public function getrawitemlist(){
		$fields = array("xitemcode as xrawitem","xdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " zactive=1 and bizid = ". Session::get('sbizid') ." and xgitem='Raw Material'";	
		return $this->db->select("seitem", $fields, $where, " order by xitemcode desc");
	}
	public function getcorpitemlistbysup($sup){
		$fields = array("xitemcode","xdesc", "xmrp","xdp as xpoint");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " zactive=1 and bizid = ". Session::get('sbizid') ." and xsource='Corporate' and xsup='".$sup."'";	
		return $this->db->select("seitem", $fields, $where, " order by xitemcode desc");
	}
	
	public function getItemInfoForSale($searchby, $val){
		echo json_encode($this->db->getItemMaster($searchby, $val));
	}
	
}