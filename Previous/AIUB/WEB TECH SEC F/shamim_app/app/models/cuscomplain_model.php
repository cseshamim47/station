<?php 

class Cuscomplain_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
			
		$results = $this->db->insert('crmcompact', array(
			"bizid" => $data['bizid'],
			"xdate" => $data['xdate'],
			"xcus" => $data['xcus'],
			"xcomplain" => $data['xcomplain'],
			"xremark" => $data['xremark'],
			"xemail" => $data['xemail']
			));
		
		return $results;	
	}
	
	public function editItem($data, $id){
		$results = array(
			"xcomplain" => $data['xcomplain'],
			"xremark" => $data['xremark'],
			"xdate" => $data['xdate']
		);
			
			/*if($itemauto=="NO")
				$results["xitemcode"] = $data['xitemcode']; print_r($results);die;*/
			
			$where = "bizid = ". Session::get('sbizid') ." and xsl = ". $id;
			return $this->db->update('crmcompact', $results, $where);
	}
	
	public function getSingleItem($id){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xsl = ". $id;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("crmcompact", $fields, $where);
	}

	public function getCusDet($rin){
		$fields = array("*");
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xcus = '". $rin ."'";	
		echo json_encode($this->db->select("secus", $fields, $where));
	}
	
	public function getcuscomplainByLimit($limit=""){
		$fields = array("xsl", "xdate", "xcus","xcomplain","xremark");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid');	
		return $this->db->select("crmcompact", $fields, $where, " order by xsl", $limit);
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
		
		$this->db->update('crmcussatisfaction', $postdata, $where);
			
	}
	
}