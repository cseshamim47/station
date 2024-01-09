<?php

class Holiday_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
		//print_r($data); die;	
		$results = $this->db->insert('empholiday', array(
			
			"bizid"=>$data['bizid'],
			"zemail"=>$data['zemail'],
			"xholiday"=>$data['xholiday'],
			"xfromdate"=>$data['xfromdate'],
			"xtodate"=>$data['xtodate'],
			"xdate"=>$data['xdate'],
			"xnumdays"=>$data['xnumdays'],
			"xyear"=>$data['xyear'],
			"xper"=>$data['xper']

			));
		 
		return $results;	
	}
	
	public function getSingleEnployee($id){
		$fields = array();
		
		$where = "bizid = ". Session::get('sbizid') ." and xfacultyid = '". $id ."' and xbranch = '". Session::get('sbranch') ."'";	
		
		return $this->db->select("edfaculty", $fields, $where);
	}
	
	
	public function editholiday($data,$xsl){
		$dt = array(
			"xemail"=>$data['xemail'],
			"zutime"=>$data['zutime'],
			"xholiday"=>$data['xholiday'],
			"xfromdate"=>$data['xfromdate'],
			"xtodate"=>$data['xtodate'],
			"xnumdays"=>$data['xnumdays']
			);
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xsl = '". $xsl."'";
			return ($this->db->update('empholiday', $dt, $where));	
	}

	public function getleavedays($year,$leavetype){
		$fields = array("xnumdays");		
		$where = " bizid = ". Session::get('sbizid') ." and xleavetype='".$leavetype."' and xbranch = '". Session::get('sbranch') ."' and xyear='".$year."' and xgemp = '". Session::get('sgemp') ."'";	
		return $this->db->select("empleavepolicy", $fields, $where);

	}

	public function getleavedayapp($year,$leavetype){
		$fields = array("sum(xnumdays) as xnumdays");		
		$where = " bizid = ". Session::get('sbizid') ." and xleavetype='".$leavetype."' and xbranch = '". Session::get('sbranch') ."' and xyear='".$year."' and xfacultyid = '". Session::get('suser') ."'";	
		return $this->db->select("empleavedetail", $fields, $where);

	}

	// public function getleavedate($fdate,$tdate){
	// 	$fields = array("xfromdate","xtodate");		
	// 	$where = " bizid = ". Session::get('sbizid') ." and xfromdate='".$fdate."' and xtodate='".$tdate."' and xbranch = '". Session::get('sbranch') ."'  and xfacultyid = '". Session::get('suser') ."'";	
	// 	return $this->db->select("empleavedetail", $fields, $where);

	// }
	
	public function getLeaveApply($xsl){
		$fields = array();
		
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xsl = '". $xsl ."'" ;	
		
		return $this->db->select("empholiday", $fields, $where, " group by xsl desc");
	}
	public function getSingleLeaveApply($xsl){
		$fields = array();
		
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xsl = '". $xsl ."' and xbranch = '". Session::get('sbranch') ."' and xstatus ='Approved'" ;	
		
		return $this->db->select("empleavedetail", $fields, $where);
	}

	public function getSingleLeaveReport($xsl){
		$fields = array();
		
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xsl = '". $xsl ."' and xbranch = '". Session::get('sbranch') ."' and xstatus ='Reported'" ;	
		
		return $this->db->select("empleavedetail", $fields, $where);
	}
	
	public function getApplyByLimit($limit){
		$fields = array("xsl","xholiday","xfromdate","xtodate","xnumdays","xper","xyear");
		
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		
		return $this->db->select("empholiday", $fields, $where, " ORDER BY xsl DESC", $limit);
	}
	public function getLeaveApplyList(){
		$fields = array("xsl","xholiday","xfromdate","xtodate","xnumdays","xper","xyear");
		
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		
		return $this->db->select("empholiday", $fields, $where, " ORDER BY xsl DESC");
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	
	public function deleteholiday($where){
			//echo $where;die;
		$this->db->dbdelete("empholiday", $where);
			
	}
	public function getFacultyByLimite($limit=""){
		$fields = array("xfacultyid as xrevealer", "xname", "xadd1","xmobile", "xfacemail");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xdesig='employee' and xbranch = '". Session::get('sbranch') ."'";	
		return $this->db->select("edfaculty", $fields, $where, " order by xfacultyid desc", $limit);
	}
}