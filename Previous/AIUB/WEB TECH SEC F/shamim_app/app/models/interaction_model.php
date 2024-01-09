<?php 

class Interaction_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
		//print_r($data); die;	
		$results = $this->db->insert('crminteraction', array(
			"bizid"=>$data['bizid'],
			"xdate"=>$data['xdate'],
			"xinteractiontype"=>$data['xinteractiontype'],
			"xoppersl"=>$data['xoppersl'],
			"xlead"=>$data['xlead'],
			"xremarks" => $data['xremarks'],
			"xfeedback" => $data['xfeedback'],
			"zemail" => $data['zemail']
			
			));
		
		return $results;	
	}
	
	public function editCustomer($data, $lead){
		$results = array(
			"bizid"=>$data['bizid'],
			"xdate"=>$data['xdate'],
			"xinteractiontype"=>$data['xinteractiontype'],
			"xremarks" => $data['xremarks'],
			"xfeedback" => $data['xfeedback'],
			"zemail" => $data['zemail']
			);
			
			$where = "bizid = ". Session::get('sbizid') ." and xintsl = ". $lead;
			return $this->db->update('crminteraction', $results, $where);
	}
	
	public function getSingleCustomer($intsl){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xintsl = ". $intsl ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("crminteraction", $fields, $where);
	}
	
	public function getinteractionByLimit($limit=""){
		$fields = array("xdate","xintsl", "xinteractiontype","xlead", "xfeedback", "xremarks");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("crminteraction", $fields, $where, " order by xintsl desc", $limit);
	}

	public function getOppertunity(){
		$fields = array("xoppersl","xlead", "xexprevenew","xsalesman");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("crmoppertunity", $fields, $where);
	}

	public function getDetails($intsl){
		$fields = array("xlead");
		$where = "bizid =".Session::get('sbizid')." and xoppersl = ".$intsl;
		echo json_encode($this->db->select('crmoppertunity', $fields, $where));
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