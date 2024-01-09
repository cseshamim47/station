<?php 

class Customertemp_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($cols, $vals){
		$results = $this->db->inserttemp('secus',$cols,$vals);	
		/*$results = $this->db->inserttemp('secus', array(
			"bizid"=>$data['bizid'],
			"xcus"=>$data['xcus'],			
			"xorg"=>$data['xorg'],
			"zemail" => $data['zemail'],
			"xagent" => $data['xagent']
			));*/
		
		return $results;	
	}
	
	
	
	public function getSingleCustomer($cus){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xrdin = '". $cus."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("mlminfo", $fields, $where);
	}
	
	public function getCustomersByLimit($limit=""){
		$fields = array("xcus", "xorg", "xagent","xmobile", "xcusemail");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and zemail='". Session::get('suser') ."'";	
		return $this->db->select("secus", $fields, $where, " order by xcus desc", $limit);
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	
	public function update($postdata,$where){
			//echo $where;die;
		
		
		$this->db->update('mlminfo', $postdata, $where);
			
	}
	
}