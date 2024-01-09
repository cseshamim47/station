<?php 

class Profile_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	
	
	public function editUser($data, $user){
		$results = array(
			"zemail" => $data['zemail'],
			"zuserfullname" => $data['zuserfullname'],
			"zusermobile" => $data['zusermobile'],
			"zaltemail" => $data['zaltemail'],
			"zpassword" => Hash::create('sha256',$data['zpassword'],HASH_KEY),
			"zpasshint" => $data['zpassword'],
			"zuseradd" => $data['zuseradd']);
			
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and zemail = '". $user ."'";
			return $this->db->update('pausers', $results, $where);
	}
	
	public function getSingleUser($user){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and zemail = '". $user ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("pausers", $fields, $where);
	}
	
	
	
}