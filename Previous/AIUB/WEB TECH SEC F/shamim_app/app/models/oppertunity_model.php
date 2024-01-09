<?php 

class Oppertunity_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
		//print_r($data); die;	
		$results = $this->db->insert('crmoppertunity', array(
			"bizid"=>$data['bizid'],
			"xlead"=>$data['xlead'],
			"xcldate"=>$data['xcldate'],
			"xexprevenew"=>$data['xexprevenew'],
			"xremarks"=>$data['xremarks'],
			"zemail" => $data['zemail'],
			"xsalesman" => $data['zemail'],
			"xstatus" => 'Live'
			));
		
		return $results;	
	}
	
	public function editCustomer($data, $lead){
		$results = array(
			"bizid"=>$data['bizid'],
			"xlead"=>$data['xlead'],
			"xcldate"=>$data['xcldate'],
			"xexprevenew"=>$data['xexprevenew'],
			"xremarks"=>$data['xremarks'],
			"zemail" => $data['zemail'],
			"xsalesman" => $data['zemail'],
			);
			
			
			$where = "xstatus='Live' and bizid = ". Session::get('sbizid') ." and xoppersl = '". $lead."'";
			return $this->db->update('crmoppertunity', $results, $where);
	}
	
	public function getSingleCustomer($lead){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xstatus='Live' and bizid = ". Session::get('sbizid') ." and xoppersl = '". $lead."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("crmoppertunity", $fields, $where);
	}
	
	public function getoppertunityByLimit($limit=""){
		$fields = array("xoppersl", "xlead", "xexprevenew","xcldate", "xremarks");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xstatus='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("crmoppertunity", $fields, $where, " order by xoppersl desc", $limit);
	}

	public function getLead(){
		$fields = array("xlead", "xorg", "xmobile");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("crmlead", $fields, $where, " order by xlead desc");
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
		
		$this->db->update('crmlead', $postdata, $where);
			
	}
	
}