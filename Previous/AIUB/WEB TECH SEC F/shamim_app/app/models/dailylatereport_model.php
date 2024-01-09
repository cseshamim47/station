<?php
 
class Dailylatereport_Model extends Model{
	
	function __construct(){
		parent::__construct();		
	}
	
	public function getemplatedetail($date){
		
		$this->db->callprocedure("call getDate('".$date."', '".$date."', '".Session::get('suser')."')");

		$fields = array("xfacultyid","(SELECT xname FROM edfaculty WHERE edfaculty.xfacultyid=tempatt.xfacultyid) AS xname", "xintime","xouttime","xlatetime","xdate");
		
		$where ="xdate='".$date."' and attflag='Late'";
		
		return $this->db->select("tempatt", $fields, $where);
	}
	public function getteacher(){
		$fields = array("count(xfacultyid) AS toralteacher");
		
		$where = "edfaculty.bizid = ". Session::get('sbizid') ." and edfaculty.xbranch = '". Session::get('sbranch') ."' and edfaculty.xrecflag = 'Live' and edfaculty.xdesig = 'employee'";
		
		return $this->db->select("edfaculty", $fields, $where);
	}
	
}