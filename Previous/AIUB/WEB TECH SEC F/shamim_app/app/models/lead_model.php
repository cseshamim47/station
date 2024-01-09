<?php 

class Lead_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
		//print_r($data); die;	
		$results = $this->db->insert('crmlead', array(
			"bizid"=>$data['bizid'],
			"xlead"=>$data['xlead'],
			"xshort"=>$data['xshort'],
			"xorg"=>$data['xorg'],
			"xadd"=>$data['xadd'],
			"xdeladd" => $data['xdeliveryadd'],
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
			"xweburl" => $data['xweburl'],
			"xnid" => $data['xnid'],
			"zactive"=>$data['zactive'],
			"zemail"=>Session::get('suser'),
			));
		
		return $results;	
	}
	
	public function editCustomer($data, $lead){
		$results = array(
			"xshort"=>$data['xshort'],
			"xorg"=>$data['xorg'],
			"xadd"=>$data['xadd'],
			"xdeladd" => $data['xdeliveryadd'],
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
			"xweburl" => $data['xweburl'],
			"xnid" => $data['xnid'],
			"zactive" => $data['zactive']
			);
			
			/*if($itemauto=="NO")
				$results["xitemcode"] = $data['xitemcode']; print_r($results);die;*/
			
			
			
			// if(Session::get('sbizcusauto')=='NO')
			// 	$results["xcus"] = $data['xcus'];
			
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xlead = '". $lead."'";
			return $this->db->update('crmlead', $results, $where);
	}
	
	public function getSingleCustomer($lead){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xlead = '". $lead."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("crmlead", $fields, $where);
	}
	
	public function getleadByLimit($limit=""){
		$fields = array("xlead", "xorg", "xadd","xmobile");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("crmlead", $fields, $where, " order by xlead desc", $limit);
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
		
		$this->db->update('crmlead', $postdata, $where);
			
	}
	
}