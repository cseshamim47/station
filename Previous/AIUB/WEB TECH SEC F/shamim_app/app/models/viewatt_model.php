<?php 

class Viewatt_Model extends Model{
	
	function __construct(){
		parent::__construct();		
	}
	
	public function getClassAttended($date){
		$fields = array("xfacultyid","min(xtime) xtime","xname","xdevice","xdate");
		
		$where = "bizid = ". Session::get('sbizid') ." and xdate='".$date."'";
		
		return $this->db->select("vempatt", $fields, $where, "GROUP by xdate,xfacultyid,xname,xdevice");
	}
	
	public function getAttTime(){
		$fields = array("*");
		
		$where = "bizid = ". Session::get('sbizid') ."";
		
		return $this->db->select("atttime", $fields, $where);
	}
	
}