<?php 

class Distrefupdate_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	
	public function editRef($data){
		$results = array(						
			"refbin" => $data['refbin'],
			"refdistrisl" => $data['distrisl']	
			);
					
			$where = " bin = '". $data['bin']."'";
			return $this->db->update('mlmtree', $results, $where);
	}
	
	public function getbindt($bin){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bin = '".$bin."'";	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("mlmtree", $fields, $where);
	}
	public function getBinDetail($bin){
		$fields = array();
		$where = " bizid = ". Session::get('sbizid') ." and bin = ". $bin ;	
		echo json_encode($this->db->select("vmlminfotreedt", $fields, $where));
	}	
}