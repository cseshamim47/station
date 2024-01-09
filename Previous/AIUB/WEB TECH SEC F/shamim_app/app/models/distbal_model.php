<?php 

class Distbal_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
		//print_r($data); die;	
		$results = $this->db->insert('osptxn', array(
			"bizid"=>$data['bizid'],
			"xrdin"=>$data['xrdin'],
			"xdate"=>$data['xdate'],
			"xamount"=>$data['xamount'],
			"xyear"=>$data['xyear'],
			"xper"=>$data['xper'],
			"zemail"=>$data['zemail'],
			"xtxntype"=>"Balance Receive",
			"xsign"=>"1"
			));
		
		return $results;	
	}
	
	public function editospbal($data, $txn){
		$results = array(
			"xrdin"=>$data['xrdin'],
			"xdate"=>$data['xdate'],
			"xamount"=>$data['xamount'],
			"xyear"=>$data['xyear'],
			"xper"=>$data['xper'],
			"xemail"=>$data['xemail'],
			"zutime"=>$data['zutime']
			);
			
						
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xsl = '". $txn."'";
			return $this->db->update('osptxn', $results, $where);
	}
	
	public function getSingleBal($txnnum){
		$fields = array("*, '' as rinname");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xsl = '". $txnnum."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("osptxn", $fields, $where);
	}
	
	public function checkRinByNID($nid){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xnid = '". $nid."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		if (count ($this->db->select("mlminfo", $fields, $where))>0){
			return true;
		}else{
			return false;
		}
	}
	
	
	
	public function getBalanceByLimit($limit=""){
		$fields = array("xsl", "xrdin", "xamount","xdate");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid');	
		return $this->db->select("osptxn", $fields, $where, " order by xsl desc", $limit);
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	
	public function getRINNo($table,$keyfield,$bin){
		
		return $this->db->getRINNo($table,$keyfield,$bin);
	}
	
	public function delete($where){
			//echo $where;die;
		$postdata=array(
			"xrecflag" => "Deleted",
			"xemail" => Session::get('suser'),
			"zutime" => date("Y-m-d H:i:s")
			);
		
		$this->db->update('mlminfo', $postdata, $where);
			
	}
	
	public function getRin($rin){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xrdin = '". $rin ."'";	
		return $this->db->select("mlminfo", $fields, $where);
	}
	
	public function getInfoRinDetail($rin){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xrdin = '". $rin ."'";	
		echo json_encode($this->db->select("mlminfo", $fields, $where));
	}
	
	public function getVoucherDetail($vou){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xaccsource='Customer' and xdoctype='Trade Receipt' and xvoucher = '". $vou ."'";	
		echo json_encode($this->db->select("gldetailview", $fields, $where));
	}
	
}