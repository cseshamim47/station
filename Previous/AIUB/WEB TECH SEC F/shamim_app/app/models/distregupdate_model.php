<?php 

class Distregupdate_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	
	public function editCustomer($data){
		$results = array(
			
			"xmobile" => $data['xmobile'],
			"xcusemail" => $data['xcusemail']
			);
			
				
			
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xrdin = '". $data['xrdin']."'";
			return $this->db->update('mlminfo', $results, $where);
	}
	
	public function getSingleCustomer($cus){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xrdin = '". $cus."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("mlminfo", $fields, $where);
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
	
	public function checkCustomer($cus){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xcus='".$cus."'";	
		return $this->db->select("mlminfo", $fields, $where);
	}
		
	public function getCustomersByLimit($limit=""){
		$xrdin = explode('@',Session::get('suser'));
		$fields = array("xrdin", "xorg", "xadd1","xmobile", "xcusemail");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and zemail='". $xrdin[0] ."' and cbin=".Session::get('sbin');	
		return $this->db->select("mlminfo", $fields, $where, " order by xrdin desc", $limit);
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	
	public function getRINNo($table,$keyfield,$bin){
		
		return $this->db->getRINNo($table,$keyfield,$bin);
	}
	
	public function getPoint($cus){
		return $this->db->getCustomerPoint($cus);
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
	
}