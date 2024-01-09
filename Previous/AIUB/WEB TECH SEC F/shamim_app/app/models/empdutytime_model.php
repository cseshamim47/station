<?php

class Empdutytime_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
		//print_r($data); die;	
		$results = $this->db->insert('atttime', array(
			
			"bizid"=>$data['bizid'],
			"xoftime"=>$data['xoftime'],
			"xetime"=>$data['xetime'],
			"xptime"=>$data['xptime'],
			"xmaxetime"=>$data['xmaxetime'],
			"xshift"=>$data['xshift']

			));
		 
		return $results;	
	}
	
	public function getSingleEnployee($id){
		$fields = array();
		
		$where = "bizid = ". Session::get('sbizid') ." and xfacultyid = '". $id ."' and xbranch = '". Session::get('sbranch') ."'";	
		
		return $this->db->select("edfaculty", $fields, $where);
	}
	
	
	public function editSetTime($data,$xsl){
		$dt = array(

			"bizid"=>$data['bizid'],
			"xoftime"=>$data['xoftime'],
			"xetime"=>$data['xetime'],
			"xptime"=>$data['xptime'],
			"xmaxetime"=>$data['xmaxetime'],
			"xshift"=>$data['xshift']
			);
			$where = "bizid = ". Session::get('sbizid') ." and xsl = '". $xsl."'";
			return ($this->db->update('atttime', $dt, $where));	
	}

	public function getdutytime($oftime,$etime,$ptime,$maxetime,$shift){
		$fields = array("xnumdays");		
		$where = " bizid = ". Session::get('sbizid') ." and xleavetype='".$leavetype."' and xbranch = '". Session::get('sbranch') ."' and xyear='".$year."' and xgemp = '". Session::get('sgemp') ."'";	
		return $this->db->select("atttime", $fields, $where);

	}

	
	public function getSetTime($xsl){
		$fields = array();
		
		$where = "bizid = ". Session::get('sbizid') ." and xsl = '". $xsl ."'" ;	
		
		return $this->db->select("atttime", $fields, $where, " group by xsl desc");
	}
	
	public function getSetTimeLimit($limit){
		$fields = array("xsl","xoftime","xetime","xptime","xmaxetime","xshift");
		
		$where = "bizid = ". Session::get('sbizid') ."";	
		
		return $this->db->select("atttime", $fields, $where, " ORDER BY xsl DESC", $limit);
	}

	public function getSetTimeList(){
		$fields = array("xsl","xoftime","xetime","xptime","xmaxetime","xshift");
		
		$where = "bizid = ". Session::get('sbizid') ."";	
		
		return $this->db->select("atttime", $fields, $where, " ORDER BY xsl DESC");
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	
	public function deleteTime($where){
			//echo $where;die;
		$this->db->dbdelete("atttime", $where);
			
	}
	public function getFacultyByLimite($limit=""){
		$fields = array("xfacultyid as xrevealer", "xname", "xadd1","xmobile", "xfacemail");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xdesig='employee' and xbranch = '". Session::get('sbranch') ."'";	
		return $this->db->select("edfaculty", $fields, $where, " order by xfacultyid desc", $limit);
	}
}