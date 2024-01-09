<?php 

class Distregtemp_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
		//print_r($data); die;	
		$results = $this->db->insert('mlminfo', array(
			"bizid"=>$data['bizid'],
			"xrdin"=>$data['xrdin'],
			"xdob"=>$data['xdob'],
			"xorg"=>$data['xorg'],
			"xfname"=>$data['xfname'],
			"xmname"=>$data['xmname'],
			"xadd1"=>$data['xadd1'],
			"xadd2"=>$data['xadd2'],
			"xcity" => $data['xcity'],
			"xprovince" => $data['xprovince'],
			"xpostal" => $data['xpostal'],
			"xcusemail" => $data['xcusemail'],
			"xmobile" => $data['xmobile'],
			"xnid" => $data['xnid'],
			"zactive"=>$data['zactive'],
			"zemail"=>$data['zemail'],
			"xpassword"=>"1234",
			"zrole"=>"Default",
			"xsquestion"=>"No Question",
			"cbin"=>$data['cbin'],
			"xgender"=>$data['xgender']
			));
		
		return $results;	
	}
	
	public function editCustomer($data, $cus){
		$results = array(
			"xrdin"=>$data['xrdin'],
			"xdob"=>$data['xdob'],
			"xorg"=>$data['xorg'],
			"xadd1"=>$data['xadd1'],
			"xadd2"=>$data['xadd2'],
			"xcity" => $data['xcity'],
			"xprovince" => $data['xprovince'],
			"xpostal" => $data['xpostal'],
			"xfname"=>$data['xfname'],
			"xmname"=>$data['xmname'],
			"xcusemail" => $data['xcusemail'],
			"xmobile" => $data['xmobile'],
			"xnid" => $data['xnid'],
			"zactive" => $data['zactive'],
			"xgender"=>$data['xgender']
			);
			
			/*if($itemauto=="NO")
				$results["xitemcode"] = $data['xitemcode']; print_r($results);die;*/
			
			
			
			if(Session::get('sbizcusauto')=='NO')
				$results["xrdin"] = $data['xrdin'];
			
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xrdin = '". $cus."'";
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
	
	public function getCustomersByLimit($limit=""){
		$fields = array("xrdin", "xorg", "xadd1","xmobile", "xcusemail");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and cbin=".Session::get('sbin');	
		return $this->db->select("mlminfo", $fields, $where, " order by xrdin desc", $limit);
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
	
}