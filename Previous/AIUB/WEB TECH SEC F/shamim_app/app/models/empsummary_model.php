<?php 

class Empsummary_Model extends Model{
	
	function __construct(){
		parent::__construct();		
	}
	
	public function getempdetail($selectemp,$selectmonth,$selectyear){
		$fields = array("xfacultyid","(SELECT xname FROM edfaculty WHERE edfaculty.xfacultyid=empleavedetail.xfacultyid) AS xname", "xper","xyear","xleavetype","xfromdate","xtodate","xnumdays");
		
		$where = "bizid = '". Session::get('sbizid') ."' and xbranch = '". Session::get('sbranch') ."' and xfacultyid='".$selectemp."' and xper='".$selectmonth."' and xyear='".$selectyear."' and xstatus='Approved' ";
		
		return $this->db->select("empleavedetail", $fields, $where);
	}
	public function getteacher(){
		$fields = array("count(xfacultyid) AS toralteacher");
		
		$where = "edfaculty.bizid = ". Session::get('sbizid') ." and edfaculty.xbranch = '". Session::get('sbranch') ."' and edfaculty.xrecflag = 'Live' and edfaculty.xdesig = 'employee'";
		
		return $this->db->select("edfaculty", $fields, $where);
	}
	
}