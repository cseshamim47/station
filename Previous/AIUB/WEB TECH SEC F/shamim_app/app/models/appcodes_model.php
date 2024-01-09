<?php 

class Appcodes_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
		
	
	/*public function getCodeByType($codetp){
		$fields = array("xcode");
		$rolefield = array("zrole");
		$data  = array("xcode");
		
		if($codetp!="zrole"){		
		$where = "bizid = ". Session::get('sbizid') ." and xcodetype = '". $codetp ."' and xrecflag = 'Live'" ;	
		//print_r($this->db->select("secodes", $fields, $where));die;
		$data = $this->db->select("vsecodes", $fields, $where);
		}else{
			$where = "bizid = ". Session::get('sbizid') ." and xrecflag = 'Live'";	
		//print_r($this->db->select("secodes", $fields, $where));die;
		$data = $this->db->select("paroles", $rolefield, $where);
		}
		
		
		echo json_encode($data);
	}*/

	public function getCodeByType($codetp){
		$fields = array("xcode");
		$rolefield = array("zrole");
		$data  = array("xcode");
		
		if($codetp!="zrole"){		
		$where = "bizid = ". Session::get('sbizid') ." and xcodetype = '". $codetp ."'" ;	
		//print_r($this->db->select("secodes", $fields, $where));die;
		$data = $this->db->select("vsecodes", $fields, $where);
		}else{
			$where = "bizid = ". Session::get('sbizid') ." and xrecflag = 'Live'";	
		//print_r($this->db->select("secodes", $fields, $where));die;
		$data = $this->db->select("paroles", $rolefield, $where);
		}
		
		
		echo json_encode($data);
	}
	
}