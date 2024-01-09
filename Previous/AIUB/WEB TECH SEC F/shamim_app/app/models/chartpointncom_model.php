<?php 

class Chartpointncom_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	
	
	public function getstwisecomnpoint($stfrom, $stto){
		$fields = array("stno","totalpoint","xcom");
		$where = " stno between ".$stfrom." and ".$stto;	
		echo json_encode($this->db->select("vpointncom", $fields, $where));
	}
	public function getstwisecomnpointlist($stfrom, $stto){
		$fields = array("stno","totalpoint","xcom");
		$where = " 	stno between ".$stfrom." and ".$stto;	
		return $this->db->select("vpointncom", $fields, $where);
	}
	public function getmaxst(){
		$fields = array("max(stno) as currentst");
		$where = " 1=1";	
		return $this->db->select("mlmtotrep", $fields, $where);
	}
}