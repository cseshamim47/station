<?php

class Emplatereport_Model extends Model{
	
	function __construct(){
		parent::__construct();		
	}
	
	public function getemplatedetail($selectemp,$selectmonth,$selectyear){
		$fields = array("xfacultyid","(SELECT xname FROM edfaculty WHERE edfaculty.xfacultyid=vempinout.xfacultyid) AS xname", "(Select xoftime from atttime where vempinout.xshift=atttime.xshift) AS xoftime", "xper","xyear","xdate","xshift","xintime","xouttime","(SELECT TIMEDIFF(xintime, xoftime)) AS latetime");
		
		$where = "xfacultyid='".$selectemp."' and xper='".$selectmonth."' and xyear='".$selectyear."'";
		
		return $this->db->select("vempinout", $fields, $where);
	}
	public function getteacher(){
		$fields = array("count(xfacultyid) AS toralteacher");
		
		$where = "edfaculty.bizid = ". Session::get('sbizid') ." and edfaculty.xbranch = '". Session::get('sbranch') ."' and edfaculty.xrecflag = 'Live' and edfaculty.xdesig = 'employee'";
		
		return $this->db->select("edfaculty", $fields, $where);
	}
	
}