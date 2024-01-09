<?php 

class Employeedeviceatt_Model extends Model{
	
	function __construct(){
		parent::__construct();		
	}
	
	// public function getClassAttended($date){
	// 	$fields = array("xfacultyid","'0' as xid","(select xname from edfaculty where edfaculty.xfacultyid = tempatt.xfacultyid) as xname","xdate","xintime as xtime","xouttime as xetime","'Device' as xdevice","attflag");
		
	// 	$where = "zemail = '".Session::get('suser')."'";
		
	// 	return $this->db->select("tempatt", $fields, $where);
	// }
	// public function getteacher(){
	// 	$fields = array("count(xfacultyid) AS toralteacher");
		
	// 	$where = "edfaculty.bizid = ". Session::get('sbizid') ." and edfaculty.xbranch = '". Session::get('sbranch') ."' and edfaculty.xrecflag = 'Live' and edfaculty.xdesig = 'employee'";
		
	// 	return $this->db->select("edfaculty", $fields, $where);
	// }
	public function attProcess($date, $edate){
		//$str = "CALL getDate('".$date."', '".$edate."', '".Session::get('suser')."')";
		$this->db->callprocedure("CALL getDate('".$date."', '".$edate."', '".Session::get('suser')."','".Session::get('sbizid')."')");
		return "";
	}

	public function getAllEmp(){
		$fields = array("xfacultyid","xname");

		$where = "xrecflag = 'Live' and bizid = ". Session::get('sbizid') ." and xbranch = '". Session::get('sbranch') ."'";
		return $this->db->select("edfaculty", $fields, $where);
	}

	public function getAllDate($date, $edate)
	{
		$fields = array("DISTINCT xdate");
		
		$where = "xdate BETWEEN '".$date."' and '".$edate."' and zemail = '".Session::get('suser')."' and bizid = '".Session::get('sbizid')."'";
		
		return $this->db->select("tempatt", $fields, $where);
	}

	public function getEmpAtt($date, $empid)
	{
		$fields = array("xdate", "attflag", "xintime", "xouttime");
		
		$where = "xdate = '".$date."' and xfacultyid = '".$empid."' and zemail = '".Session::get('suser')."' and bizid = '".Session::get('sbizid')."'";
		
		return $this->db->select("tempatt", $fields, $where);
	}
	
}