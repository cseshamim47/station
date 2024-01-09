<?php 
class Approval_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
		//print_r($data); die;	
		$results = $this->db->insert('paapproval', array(
			"bizid"=>$data['bizid'],
			"xdept"=>$data['xdept'],
			"xuser"=>$data['xuser'],
			"xmodule"=>$data['xmodule'],
			"xlevel"=>$data['xlevel'],
			"xstatus"=>$data['xstatus'],
			"zemail"=>$data['zemail'],
			"zactive"=>$data['zactive']
			));
		
		return $results;	
	}
	
	public function editglchartsub($data, $sl){
		$results = array(
			"xuser"=>$data['xuser'],
			"xlevel"=>$data['xlevel'],
			"xstatus"=>$data['xstatus'],
			"xemail" => $data['xemail'],
			"zutime" => $data['zutime'],
			"zactive"=>$data['zactive']
			);
			
			$where = " bizid = ". Session::get('sbizid') ." and xsl= '". $sl."'";
			return $this->db->update('paapproval', $results, $where);
	}

	public function getSingleglAproval($xsl){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xsl = '". $xsl ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("paapproval", $fields, $where);
	}
	
	public function getApprovalByLimit($dept){
		$fields = array("xsl", "xdept", "xlevel", "xstatus", "xuser", "IF(zactive=1, 'Active', 'Deactive') as zactive");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid')." and xdept='".$dept."'";
		return $this->db->select("paapproval", $fields, $where, " order by xuser desc");
	}
	public function getApprovalForList($limit=""){
		$fields = array("xdept", "xlevel", "xstatus", "xuser");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid')." and zactive='1'";	
		return $this->db->select("paapproval", $fields, $where, " order by xdept,xlevel", $limit);
	}
	
	public function getUserList($limit=""){
		$fields = array("zemail as xuser", "zuserfullname", "zusermobile");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid');	
		return $this->db->select("pausers", $fields, $where, " order by zemail desc", $limit);
	}
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	
	public function delete($where){
		
		$this->db->dbdelete('paapproval', $where);
			
	}

	public function getDeptWiseApproval(){
		$fields = array("DISTINCT xdept", "xlevel", "xstatus", "xuser");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid')." and zactive =1";	
		return $this->db->select("paapproval", $fields, $where);
	}

	public function getDeptApproval($dept){
		$fields = array("xdept", "xlevel", "xstatus", "xuser");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid')." and zactive='1' and xdept='".$dept."'";	
		return $this->db->select("paapproval", $fields, $where);
	}
	
}