<?php 

class Stuattupdate_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	
	
	// public function getRoutineByClass($cls, $shf, $sec){
	// 	$fields = array("xsl", "(select xname from edfaculty where edfaculty.bizid=clsroutine.bizid and edfaculty.xfacultyid=clsroutine.xfacultyid) AS xname","xsection","xshift","xday","xclass","xsubject","xstime");
	// 	//print_r($this->db->select("pabuziness", $fields));die;
	// 	$where = " xrecflag='Live' and xclass = '".$cls."' and xshift = '".$shf."' and xsection = '".$sec."' and xbranch = '". Session::get('sbranch') ."' and bizid = ". Session::get('sbizid') ."";	
	// 	return $this->db->select("clsroutine", $fields, $where, " order by xsl");
	// }
	
	public function getAttendance($stuid, $date){
		$fields = array("xattflag");
		$where = " xrecflag='Live' and xbranch = '". Session::get('sbranch') ."' and xstudentid = '".$stuid."' and xdate = '".$date."' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("edstuatt", $fields, $where);
	}
	
	public function updateAtt($data){
		$results = array(
			"xattflag"=>$data['xattflag'],
			"zemail"=>$data['zemail'] 
			);

			$where = " xrecflag='Live' and xstudentid = '".$data['xfacultyid']."' and xbranch = '". Session::get('sbranch') ."' and xdate = '".$data['xdate']."' and bizid = ". Session::get('sbizid') ."";	

			return $this->db->update('edstuatt', $results, $where);
	}
	
}