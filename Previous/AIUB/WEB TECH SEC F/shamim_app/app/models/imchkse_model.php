<?php 

class Imchkse_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
		
		$results = $this->db->insert('imchkse', array(
			"xdate"=>$data['xdate'],
			"bizid"=>$data['bizid'],
			"ximchksenum"=>$data['ximchksenum'],
			"xsup"=>$data['xsup'],
			"xdocnum"=>$data['xdocnum'],
			"xnote"=>$data['xnote'],
			"zemail"=>$data['zemail']
			));
		
		return $results;	
	}
	
	public function edit($data, $ximchksenum){
		$results = array(
			"xdate"=>$data['xdate'],
			"bizid"=>$data['bizid'],
			"xsup"=>$data['xsup'],
			"xdocnum"=>$data['xdocnum'],
			"xnote"=>$data['xnote'],
			"xemail"=>$data['xemail'],
			"zutime"=>$data['zutime']
			);
			
						
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximchksenum = '". $ximchksenum ."'";
			return $this->db->update('imchkse', $results, $where);
	}
	
	public function getSingleRecord($imchksenum){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximchksenum = '". $imchksenum."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("imchkse", $fields, $where);
	}
	
	public function getImchkseByLimit($limit=""){
		$fields = array("ximchksenum", "xdate", "xdocnum","xsup");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("imchkse", $fields, $where, " order by ximchksenum", $limit);
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
		
		$this->db->update('secus', $postdata, $where);
			
	}
	
	public function GetDtListings($imchksenum){
		$fields = array("xrow", "xitemcode","xitemdesc", "xqtychecked","xqtypassed", "xunit");
        $where = " ximchksenum = '". $imchksenum ."' and bizid = ". Session::get('sbizid');
		$orderby = " order by xrow";
        echo json_encode($this->db->select("vimchksedetail", $fields, $where, $orderby));
	}
	public function insertDetail($data){
		$results = $this->db->insert('imchksedt', array(
			"bizid"=>$data['bizid'],
			"xitemcode"=>$data['xitemcode'],
			"ximchksenum"=>$data['ximchksenum'],
			"xqtychecked"=>$data['xqtychecked'],
			"xqtypassed"=>$data['xqtypassed'],
			"xunit"=>$data['xunit'],
			"xnote"=>$data['xnote'],
			"xrow"=>$data['xrow']
			));
		
		$this->getSingleDetail($data['ximchksenum'], $data['xrow']);
			
		
	}
	
	public function editDetail($data, $txnnum, $txnrow){
		$results = array(
			"xitemcode"=>$data['xitemcode'],
			"xqtychecked"=>$data['xqtychecked'],
			"xqtypassed"=>$data['xqtypassed'],
			"xunit"=>$data['xunit'],
			"xnote"=>$data['xnote']
			);
		$where = "bizid = ". Session::get('sbizid') ." and ximchksenum = '". $txnnum ."' and xrow=".$txnrow;
		
		$results = $this->db->update('imchksedt', $results, $where);
		
		$this->getSingleDetail($txnnum, $txnrow);
			
		
	}
	
	public function getSingleDetail($ximchknum, $xrow){
		$fields = array("xrow", "xitemcode","xitemdesc", "xqtychecked","xqtypassed", "xunit");
			$where = " ximchksenum = '". $ximchknum ."' and bizid = ". Session::get('sbizid') ." and xrow = ". $xrow;
		
			echo json_encode($this->db->select("vimchksedetail", $fields, $where));
	}
	
}