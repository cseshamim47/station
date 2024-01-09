<?php 

class Glchartsub_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
		$results = $this->db->insert('glchartsub', array(
			"bizid"=>$data['bizid'],
			"xacc"=>$data['xacc'],
			"xaccsub"=>$data['xaccsub'],
			"xdesc"=>$data['xdesc'],
			"zemail"=>$data['zemail']
			));
		return $results;	
	}
	
	public function editglchartsub($data, $sl){
		$results = array(
			"xacc"=>$data['xacc'],
			"xaccsub"=>$data['xaccsub'],
			"xdesc"=>$data['xdesc'],
			"xemail" => $data['xemail'],
			"zutime" => $data['zutime']
			);
			
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and sl= '". $sl."'";
			return $this->db->update('glchartsub', $results, $where);
	}
	
	public function getSingleglchartsub($acc, $accsub){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xacc = '". $acc ."' and xaccsub = '". $accsub ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("glchartsub", $fields, $where);
	}
	
	public function getGlchartsubByLimit($acc,$limit=""){
		$fields = array("xacc", "xaccsub", "xdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xacc = ". $acc ."";	
		return $this->db->select("glchartsub", $fields, $where, " order by xaccsub desc", $limit);
	}
	
	public function getGlchartsublist($acc,$limit=""){
		$fields = array("xaccsub", "xdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xacc = '". $acc ."'";	
		return $this->db->select("glchartsub", $fields, $where, " order by xaccsub desc", $limit);
	}
	public function getcrGlchartsublist($acc,$limit=""){
		$fields = array("xaccsub as xaccsubcr", "xdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xacc = '". $acc ."'";	
		return $this->db->select("glchartsub", $fields, $where, " order by xaccsub desc", $limit);
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
		
		$this->db->update('glchartsub', $postdata, $where);
			
	}
	
}