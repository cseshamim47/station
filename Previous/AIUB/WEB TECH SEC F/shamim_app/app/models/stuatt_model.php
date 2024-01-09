<?php 

class Stuatt_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($cols, $vals, $ondulicateupdate){
		
		$results = $this->db->insertMultipleDetail('edstuatt',$cols,$vals, $ondulicateupdate);
		
		return $results;	
	}
	
	public function getAttended($xdate){
		$fields = array("xfacultyid", "xname", "xattflag");
		
		$where = " bizid = ". Session::get('sbizid') ." and xbranch = '". Session::get('sbranch') ."'and xdate = '".$xdate."' and xdevice='Manual'";		
		
		return $this->db->select("vempatt", $fields, $where);
	}
	public function getAttendanceBySl($sl){
		$fields = array("xdate","xsl","xstudentid",
		"(select xstuname from edstumst where vstuatt.bizid=edstumst.bizid and vstuatt.xstudentid=edstumst.xstudentid) as xstuname", "xpresent","xclass","xsection","xshift");
		
		$where = " bizid = ". Session::get('sbizid') ." and xbranch = '". Session::get('sbranch') ."' and xsl = ".$sl;		
		
		return $this->db->select("vstuatt", $fields, $where);
	}
	
	public function getEmployees(){
		$fields = array("xfacultyid", "xname","xmobile");
		
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xbranch = '". Session::get('sbranch')."'";	
		
		return $this->db->select("edfaculty", $fields, $where, " order by xfacultyid");
	}
	public function getEmp($id){
		$fields = array("xfacultyid","xname","xid");

		$where = "xfacultyid = '".$id."' and xrecflag = 'Live' and bizid = ". Session::get('sbizid') ." and xbranch = '". Session::get('sbranch') ."'";
		return $this->db->select("edfaculty", $fields, $where);
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	
	public function updateatt($where, $val){
			//echo $where;die;
		$postdata=array(
			"xattflag" => $val
			);
		
		$this->db->update('edstuatt', $postdata, $where);
			
	}
	
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	
}








// CREATE OR REPLACE 
// VIEW `vstuatt`  AS  select `c`.`bizid` AS `bizid`,`c`.`xdate` AS `xdate`,`c`.`xsl` AS `xsl`,`c`.`xstudentid` AS `xstudentid`,`c`.`xrecflag` AS `xrecflag`,`c`.`xdatetime` AS `xdatetime`,`c`.`xtype` AS `xtype`,`c`.`xattflag` AS `xattflag`,`c`.`xdevice` AS `xdevice`,`m`.`xclass` AS `xclass`,`m`.`xshift` AS `xshift`,`m`.`xsection` AS `xsection`,`m`.`xfmobile` AS `xfmobile`,`m`.`xmmobile` AS `xmmobile`,`c`.`xpresent` AS `xpresent`,`c`.`xbranch` AS `xbranch` from (`edstuatt` `c` join `vstuenrolldt` `m`) where ((`c`.`xstudentid` = `m`.`xstudentid`) and (`c`.`xyear` = `m`.`xyear`)) ;
