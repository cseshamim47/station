<?php 

class Pbank_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
		//print_r($data); die;	
		$results = $this->db->insert('secus', array(
			"bizid"=>$data['bizid'],
			"xcus"=>$data['xcus'],
			"xshort"=>$data['xshort'],
			"xorg"=>$data['xorg'],
			"xadd1"=>$data['xadd1'],
			"xadd2"=>$data['xadd2'],
			"xbillingadd" => $data['xbillingadd'],
			"xdeliveryadd" => $data['xdeliveryadd'],
			"xcity" => $data['xcity'],
			"xprovince" => $data['xprovince'],
			"xpostal" => $data['xpostal'],
			"xcountry" => $data['xcountry'],
			"xcontact" => $data['xcontact'],
			"xtitle" => $data['xtitle'],
			"xphone" => $data['xphone'],
			"xcusemail" => $data['xcusemail'],
			"xmobile" => $data['xmobile'],
			"xfax" => $data['xfax'],
			"xnid" => $data['xnid'],
			"zactive"=>$data['zactive'],
			"zemail"=>$data['zemail']
			));
		
		return $results;	
	}
	
	public function editCustomer($data, $cus){
		$results = array(
			"xcus"=>$data['xcus'],
			"xshort"=>$data['xshort'],
			"xorg"=>$data['xorg'],
			"xadd1"=>$data['xadd1'],
			"xadd2"=>$data['xadd2'],
			"xbillingadd" => $data['xbillingadd'],
			"xdeliveryadd" => $data['xdeliveryadd'],
			"xcity" => $data['xcity'],
			"xprovince" => $data['xprovince'],
			"xpostal" => $data['xpostal'],
			"xcountry" => $data['xcountry'],
			"xcontact" => $data['xcontact'],
			"xtitle" => $data['xtitle'],
			"xphone" => $data['xphone'],
			"xcusemail" => $data['xcusemail'],
			"xmobile" => $data['xmobile'],
			"xfax" => $data['xfax'],
			"xnid" => $data['xnid'],
			"zactive" => $data['zactive']
			);
			
			/*if($itemauto=="NO")
				$results["xitemcode"] = $data['xitemcode']; print_r($results);die;*/
			
			
			
			if(Session::get('sbizcusauto')=='NO')
				$results["xcus"] = $data['xcus'];
			
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xcus = '". $cus."'";
			return $this->db->update('secus', $results, $where);
	}
	
	public function getSingleCustomer($cus){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xcus = '". $cus."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("secus", $fields, $where);
	}
	
	public function getCustomersByLimit($limit=""){
		$fields = array("xcus", "xorg", "xadd1","xmobile", "xcusemail");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("secus", $fields, $where, " order by xcus desc", $limit);
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
		
		$this->db->update('secus', $postdata, $where);
			
	}
	
}