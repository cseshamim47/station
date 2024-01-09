<?php 
 
class Dailyabsentreport_Model extends Model{
	
	function __construct(){
		parent::__construct();		
	}
	
	public function getempabsentdetail($date){
		
		 $this->db->callprocedure("call getDate('".$date."', '".$date."', '".Session::get('suser')."')");

		$fields = array("xfacultyid","(SELECT xname FROM edfaculty WHERE edfaculty.xfacultyid=tempatt.xfacultyid) AS xname","(SELECT xdesignation FROM edfaculty WHERE edfaculty.xfacultyid=tempatt.xfacultyid) AS xdesignation","xdate");
		
		$where ="xdate='".$date."' and attflag='Absent'";
		
		return $this->db->select("tempatt", $fields, $where);

	}
	public function getteacher(){
		$fields = array("count(xfacultyid) AS toralteacher");
		
		$where = "edfaculty.bizid = ". Session::get('sbizid') ." and edfaculty.xbranch = '". Session::get('sbranch') ."' and edfaculty.xrecflag = 'Live' and edfaculty.xdesig = 'employee'";
		
		return $this->db->select("edfaculty", $fields, $where);
	}
	
}