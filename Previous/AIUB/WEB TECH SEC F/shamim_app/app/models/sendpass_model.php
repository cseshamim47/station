<?php 

class Sendpass_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	
	public function getBizness($biz){
		$fields = array("bizid", "bizshort", "bizlong");
		
		$where = "bizid = ".$biz;	
		return $this->db->select("pabuziness", $fields, $where);
	}
	public function getMemeber($rin){
		$fields = array("distrisl","xmobile","xcusemail");
		
		$where = " bizid = 100 and xrdin='".$rin."'";	
		//print_r($this->db->select("pabuziness", $fields, $where));die;
		return $this->db->select("mlminfo", $fields, $where);
	}
	function update($data, $where){
		
		$data = array(
			"xpassword"=>$data['xpassword'],
			"xsquestion"=>$data['xsquestion']
		);
		return $this->db->update("mlminfo", $data, $where);
	}
	
}