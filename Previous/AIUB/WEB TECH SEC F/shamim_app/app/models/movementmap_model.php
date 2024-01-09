<?php 

class Movementmap_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function cusgeoloc($usr,$dt){
		$fields = array("*","DATE_FORMAT(xdate,'%H:%i') as xtime");
		$where = " DATE_FORMAT(xdate,'%Y-%m-%d')='".$dt."' and lower(username)=lower('".$usr."')";	
		echo json_encode($this->db->select("emp_movement", $fields, $where));
	}
	public function cusmovement($usr,$dt){
		$fields = array("*","DATE_FORMAT(xdate,'%H:%i') as xtime");
		$where = " DATE_FORMAT(xdate,'%Y-%m-%d')='".$dt."' and lower(username)=lower('".$usr."') order by xdate LIMIT 100";	
		return $this->db->select("emp_movement", $fields, $where);
	}
		
}