<?php 

class Glinterface_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
			
		$results = $this->db->insert('glinterface', array(
			'bizid' => $data['bizid'],
			'xtypeinterface' => $data['xtypeinterface'],
			'xacc' => $data['xacc'],
			'xformula' => $data['xformula'],
			'xaction' => $data['xaction']
			));
		
		return $results;	
	}
	
	public function update($data, $where){
			//echo $where;die;
		$postdata=array(
			'xacc' => $data['xacc'],
			'xformula' => $data['xformula'],
			'xaction' => $data['xaction'],
			);
		
		$this->db->update('glinterface', $postdata, $where);
			
	}
	
	public function deletecode($where){
			//echo $where;die;
		
		$this->db->dbdelete('glinterface', $postdata, $where);
			
	}
	
	public function getCode($codetype, $acc){
		$fields = array("xacc", "xformula", "xaction");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xtypeinterface='".$codetype."' and xacc = '". $acc ."'";	
		return $this->db->select("glinterface", $fields, $where);
	}
	
	public function getAllcodes($codetp, $fields){
		$field = array("xsl","xacc","(select xdesc from glchart where glinterface.xacc=glchart.xacc and glinterface.bizid=glchart.bizid) as xdesc","xaction","xformula");
		
		
		
		$where = "bizid = ". Session::get('sbizid') ." and xtypeinterface = '". $codetp."'";
		$orderby = " order by xsl desc";
		return $this->db->select("glinterface", $field, $where, $orderby);
		
	}
}