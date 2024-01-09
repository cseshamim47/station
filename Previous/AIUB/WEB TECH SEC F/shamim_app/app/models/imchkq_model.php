<?php 

class Imchkq_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
		
		$results = $this->db->insert('imchkq', array(
			"xdate"=>$data['xdate'],
			"bizid"=>$data['bizid'],
			"ximchkqnum"=>$data['ximchkqnum'],
			"xsup"=>$data['xsup'],
			"xdocnum"=>$data['xdocnum'],
			"xnote"=>$data['xnote'],
			"zemail"=>$data['zemail']
			));
		
		return $results;	
	}
	
	public function edit($data, $ximchkqnum){
		$results = array(
			"xdate"=>$data['xdate'],
			"bizid"=>$data['bizid'],
			"xsup"=>$data['xsup'],
			"xdocnum"=>$data['xdocnum'],
			"xnote"=>$data['xnote'],
			"xemail"=>$data['xemail'],
			"zutime"=>$data['zutime']
			);
			
						
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximchkqnum = '". $ximchkqnum ."'";
			return $this->db->update('imchkq', $results, $where);
	}
	
	public function getSingleRecord($imchkqnum){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximchkqnum = '". $imchkqnum."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("imchkq", $fields, $where);
	}
	
	public function getImchkseByLimit($limit=""){
		$fields = array("ximchkqnum", "xdate", "xdocnum","xsup");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("imchkq", $fields, $where, " order by ximchkqnum", $limit);
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	
	public function getRow($table,$keyfield,$num, $xrow){
		
		return $this->db->rowIncrement($table,$keyfield,$num, $xrow);
	}
	
	public function delete($where){
			//echo $where;die;
		$postdata=array(
			"xrecflag" => "Deleted",
			"xemail" => Session::get('suser'),
			"zutime" => date("Y-m-d H:i:s")
			);
		
		$this->db->update('imchkq', $postdata, $where);
			
	}
	
	public function GetDtListings($imchkqnum){
		$fields = array("xrow", "xitemcode","xitemdesc", "xqtychecked","xqtypassed", "xunit");
        $where = " ximchkqnum = '". $imchkqnum ."' and bizid = ". Session::get('sbizid');
		$orderby = " order by xrow";
        echo json_encode($this->db->select("vimchkqdetail", $fields, $where, $orderby));
	}
	public function insertDetail($data){
		$results = $this->db->insert('imchkqdt', array(
			"bizid"=>$data['bizid'],
			"xitemcode"=>$data['xitemcode'],
			"ximchkqnum"=>$data['ximchkqnum'],
			"xqtychecked"=>$data['xqtychecked'],
			"xqtypassed"=>$data['xqtypassed'],
			"xunit"=>$data['xunit'],
			"xnote"=>$data['xnote'],
			"xrow"=>$data['xrow']
			));
		
		$this->getSingleDetail($data['ximchkqnum'], $data['xrow']);
			
		
	}
	
	public function editDetail($data, $txnnum, $txnrow){
		$results = array(
			"xitemcode"=>$data['xitemcode'],
			"xqtychecked"=>$data['xqtychecked'],
			"xqtypassed"=>$data['xqtypassed'],
			"xunit"=>$data['xunit'],
			"xnote"=>$data['xnote']
			);
		$where = "bizid = ". Session::get('sbizid') ." and ximchkqnum = '". $txnnum ."' and xrow=".$txnrow;
		
		$results = $this->db->update('imchkqdt', $results, $where);
		
		$this->getSingleDetail($txnnum, $txnrow);
			
		
	}
	
	public function getSingleDetail($ximchkqnum, $xrow){
		$fields = array("xrow", "xitemcode","xitemdesc", "xqtychecked","xqtypassed", "xunit");
			$where = " ximchkqnum = '". $ximchkqnum ."' and bizid = ". Session::get('sbizid') ." and xrow = ". $xrow;
		
			echo json_encode($this->db->select("vimchkqdetail", $fields, $where));
	}
	
}