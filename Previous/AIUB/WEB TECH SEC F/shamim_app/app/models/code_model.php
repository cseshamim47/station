<?php 

class Code_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
			
		$results = $this->db->insert('secodes', array(
			'bizid' => $data['bizid'],
			'xcodetype' => $data['xcodetype'],
			'xcode' => $data['xcode'],
			'xdesc' => $data['xdesc'],
			'zemail' => $data['zemail']
			));
		
		return $results;	
	}
	
	public function update($data, $where){
			//echo $where;die;
		$postdata=array(
			'xcode' => $data['xcode'],
			'xdesc' => $data['xdesc']
			);
		
		$this->db->update('secodes', $postdata, $where);
			
	}
	
	public function deletecode($where){
			//echo $where;die;
				
		$this->db->dbdelete('secodes', $where);
			
	}
	
	public function getCode($codetp, $result){
		$fields = array("codeid", "xcode", "xdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xcodetype = '". $codetp."' and xcode = '". $result."'";	
		return $this->db->select("secodes", $fields, $where);
	}
	
	public function getAllcodes($codetp, $fields){
		$field = array();
		
		foreach($fields as $str){
			$st=explode('-',$str);
			$field[] = $st[0];
		}
		
		$where = "bizid = ". Session::get('sbizid') ." and xcodetype = '". $codetp."' and xrecflag='Live'";
		$orderby = " order by codeid desc";
		return $this->db->select("secodes", $field, $where, $orderby);
		
	}
}