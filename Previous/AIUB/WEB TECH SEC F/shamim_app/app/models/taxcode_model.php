<?php 

class Taxcode_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
			
		$results = $this->db->insert('setax', array(
			"bizid"=>$data['bizid'],
			"xtaxcode" => $data['xtaxcode'],
			"xtaxcodealt" => $data['xtaxcodealt'],
			"xtaxpct" => $data['xtaxpct'],
			"zemail" => $data['zemail']
			));
		
		return $results;	
	}
	
	public function editTex($data, $xsl){
		$results = array(
			"bizid"=>$data['bizid'],
			"xtaxcode" => $data['xtaxcode'],
			"xtaxcodealt" => $data['xtaxcodealt'],
			"xtaxpct" => $data['xtaxpct'],
			"xemail" => $data['xemail'],
			"zutime" => $data['zutime']
			);
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xsl = '". $xsl."'";
			return $this->db->update('setax', $results, $where);
	}
	
	public function getSingleTax($taxid){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xsl = '". $taxid."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("setax", $fields, $where);
	}
	
	public function getTaxByLimit($limit=""){
		$fields = array("xsl", "xtaxcode", "xtaxcodealt","xtaxpct");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("setax", $fields, $where, " order by xsl", $limit);
	}
	
	public function delete($where){
			//echo $where;die;
				
		$this->db->dbdelete('setax', $where);
			
	}
	
}