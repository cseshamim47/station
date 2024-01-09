<?php 

class Role_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data,$nexttbl,$cols,$nextvals){
			
		$results = $this->db->insertMasterDetail('paroles', array(
			'bizid' => $data['bizid'],
			'zrole' => $data['zrole']
			),$nexttbl,$cols,$nextvals," WHERE bizid='".$data['bizid']."' zrole='".$data['zrole']."'");
		
		return $results;	
	}
	
	public function delete($where){
			//echo $where;die;
		$postdata=array(
			"xrecflag" => "Deleted",
			"xemail" => Session::get('suser'),
			"zutime" => date("Y-m-d h:i:sa")
			);
		
		$this->db->update('paroles', $postdata, $where);
			
	}
	
	public function edit($nexttbl,$cols,$nextvals,$where){
		$this->db->delete($nexttbl, $where);
			
		$results = $this->db->insertMultipleDetail($nexttbl,$cols,$nextvals);
		
		return $results;	
	}
	
	public function getRoles(){
		$fields = array("zrole");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xrecflag='Live'";	
		return $this->db->select("paroles", $fields, $where);
	}
	
	public function getUserMenus($role){
		$fields = array("xsubmenu");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') . " and zrole='". $role ."'";	
		return $this->db->select("pamenus", $fields, $where);
	}
}