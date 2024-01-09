<?php 

class Profilemem_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	
	
	public function editUser($data, $user){
		$results = array(
			"xorg" => $data['xorg'],
			"xmobile" => $data['xmobile'],
			"xcusemail" => $data['xcusemail'],
			"xpassword" => Hash::create('sha256',$data['xpassword'],HASH_KEY),
			"xadd1" => $data['xadd1']);
			
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xrdin = '". $user ."'";
			return $this->db->update('mlminfo', $results, $where);
	}
	
	public function getSingleUser($user){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xrdin = '". $user ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("mlminfo", $fields, $where);
	}
	
	
	
}