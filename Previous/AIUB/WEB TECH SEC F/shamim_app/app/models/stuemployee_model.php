<?php 

class Stuemployee_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
		
		$results = $this->db->insert('edfaculty', array(
			"bizid"=>$data['bizid'],
			"xfacultyid"=>$data['xfacultyid'],
			"xname"=>$data['xname'],
			"xdob"=>$data['xdob'],
			"xnationality"=>$data['xnationality'],
			"xreligion"=>$data['xreligion'],
			"xgender" => $data['xgender'],
			"xadd1" => $data['xadd1'],
			"xadd2" => $data['xadd2'],
			"xbg" => $data['xbg'],
			"xnid" => $data['xnid'],
			"xshift" => $data['xshift'],
			"xfname" => $data['xfname'],
			"xdesignation" => $data['xdesignation'],
			"xmobile" => $data['xmobile'],
			"xfacemail" => $data['xfacemail'],
			"xsscyear" => $data['xsscyear'],
			"xsscgroup" => $data['xsscgroup'],
			"xsscresult" => $data['xsscresult'],
			"xhscyear" => $data['xhscyear'],
			"xhscgroup" => $data['xhscgroup'],
			"xhscresult" => $data['xhscresult'],
			"xgraduateyear" => $data['xgraduateyear'],
			"xgraduategroup" => $data['xgraduategroup'],
			"xgraduateresult" => $data['xgraduateresult'],
			"xpostgraduateyear" => $data['xpostgraduateyear'],
			"xpostgraduatesub" => $data['xpostgraduatesub'],
			"xpostgraduateresult" => $data['xpostgraduateresult'],
			"xbranch" => $data['xbranch'],
			"xfacultytype"=>"Faculty",
			"zemail"=>$data['zemail'],
			"xsscboard"=>$data['xsscboard'],
			"xhscboard"=>$data['xhscboard'],
			"xuniversity"=>$data['xuniversity'],
			"xpostuniversity"=>$data['xpostuniversity'],
			"xsalarytype"=>$data['xsalarytype'],
			"xpackage"=>$data['xpackage'],
			"xsalary"=>$data['xsalary'],
			"xid"=>$data['xid'],
			"xjoindate"=>$data['xjoindate'],
			"xdesig"=>"employee",
			"xreporto"=>$data['xreporto'],
			"xapproveby"=>$data['xapproveby'],
			"xgemp"=>$data['xgemp'],
			"xsennum"=>$data['xsennum'],
			"xactive"=>$data['xactive']
			
			));
		
		return $results;	
	}
	
	public function editFaculty($data, $tchr){
		
		$results = array(
			"xname"=>$data['xname'],
			"xdob"=>$data['xdob'],
			"xnationality"=>$data['xnationality'],
			"xreligion"=>$data['xreligion'],
			"xgender" => $data['xgender'],
			"xadd1" => $data['xadd1'],
			"xadd2" => $data['xadd2'],
			"xbg" => $data['xbg'],
			"xnid" => $data['xnid'],
			"xshift" => $data['xshift'],
			"xfname" => $data['xfname'],
			"xdesignation" => $data['xdesignation'],
			"xmobile" => $data['xmobile'],
			"xfacemail" => $data['xfacemail'],
			"xsscyear" => $data['xsscyear'],
			"xsscgroup" => $data['xsscgroup'],
			"xsscresult" => $data['xsscresult'],
			"xhscyear" => $data['xhscyear'],
			"xhscgroup" => $data['xhscgroup'],
			"xhscresult" => $data['xhscresult'],
			"xgraduateyear" => $data['xgraduateyear'],
			"xgraduategroup" => $data['xgraduategroup'],
			"xgraduateresult" => $data['xgraduateresult'],
			"xpostgraduateyear" => $data['xpostgraduateyear'],
			"xpostgraduatesub" => $data['xpostgraduatesub'],
			"xpostgraduateresult" => $data['xpostgraduateresult'],
			"xsscboard"=>$data['xsscboard'],
			"xhscboard"=>$data['xhscboard'],
			"xuniversity"=>$data['xuniversity'],
			"xpostuniversity"=>$data['xpostuniversity'],
			"xsalarytype"=>$data['xsalarytype'],
			"xpackage"=>$data['xpackage'],
			"xsalary"=>$data['xsalary'],
			"xid"=>$data['xid'],
			"xjoindate"=>$data['xjoindate'],
			"xreporto"=>$data['xreporto'],
			"xapproveby"=>$data['xapproveby'],
			"xgemp"=>$data['xgemp'],
			"xsennum"=>$data['xsennum'],
			"xactive"=>$data['xactive']
			);
			
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xdesig='employee' and xbranch = '". Session::get('sbranch') ."' and xfacultyid = '". $tchr."'";
			return $this->db->update('edfaculty', $results, $where);
	}
	
	public function getSingleFaculty($tchr){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xdesig='employee' and xbranch = '". Session::get('sbranch') ."' and xfacultyid = '". $tchr."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("edfaculty", $fields, $where);
	}
	
	public function getFacultyByLimit($limit=""){
		$fields = array("xsennum", "xfacultyid", "xname", "xadd1","xmobile", "xfacemail");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xdesig='employee' and xbranch = '". Session::get('sbranch') ."'";	
		return $this->db->select("edfaculty", $fields, $where, " order by xfacultyid desc", $limit);
	}
	public function getFacultyAll(){
		$fields = array("xsennum", "xfacultyid", "xname", "xadd1","xmobile", "xfacemail","xactive");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xdesig='employee' and xbranch = '". Session::get('sbranch') ."'";	
		return $this->db->select("edfaculty", $fields, $where, " order by xfacultyid desc");
	}
	
	public function getFacultyByLimite($limit=""){
		$fields = array("xfacultyid as xreporto", "xname", "xadd1","xmobile", "xfacemail");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xdesig='employee' and xbranch = '". Session::get('sbranch') ."'";	
		return $this->db->select("edfaculty", $fields, $where, " order by xfacultyid desc", $limit);
	}
	
	public function getFacultyByLimitap($limit=""){
		$fields = array("xfacultyid as xapproveby", "xname", "xadd1","xmobile", "xfacemail");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xdesig='employee' and xbranch = '". Session::get('sbranch') ."'";	
		return $this->db->select("edfaculty", $fields, $where, " order by xfacultyid desc", $limit);
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	
	public function delete($where){
			//echo $where;die;
		$postdata=array(
			"xrecflag" => "Deleted",
			"xemail" => Session::get('suser'),
			"zutime" => date("Y-m-d H:i:s")
			);
		
		$this->db->update('edfaculty', $postdata, $where);
			
	}
	
}