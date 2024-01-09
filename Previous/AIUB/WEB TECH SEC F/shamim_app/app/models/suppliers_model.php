<?php 

class Suppliers_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
			
		$results = $this->db->insert('sesup', array(
			"bizid"=>$data['bizid'],
			"xsup"=>$data['xsup'],
			"xshort"=>$data['xshort'],
			"xorg"=>$data['xorg'],
			"xadd1"=>$data['xadd1'],
			"xadd2"=>$data['xadd2'],
			"xcity" => $data['xcity'],
			"xprovince" => $data['xprovince'],
			"xpostal" => $data['xpostal'],
			"xcountry" => $data['xcountry'],
			"xcontact" => $data['xcontact'],
			"xtitle" => $data['xtitle'],
			"xphone" => $data['xphone'],
			"xsupemail" => $data['xsupemail'],
			"xmobile" => $data['xmobile'],
			"xfax" => $data['xfax'],
			"xweburl" => $data['xweburl'],
			"xnid" => $data['xnid'],
			"xtaxno" => $data['xtaxno'],
			"xtaxscope" => $data['xtaxscope'],
			"xgsup" => $data['xgsup'],
			"xpricegroup" => $data['xpricegroup'],
			"xsuptype" => $data['xsuptype'],
			"xdiscountpct" => $data['xdiscountpct'],
			"xcreditlimit" => $data['xcreditlimit'],
			"xcreditterms" => $data['xcreditterms'],
			"zactive"=>$data['zactive']
			));
		
		return $results;	
	}
	
	public function editSupplier($data, $sup){
		$results = array(
			"xshort"=>$data['xshort'],
			"xorg"=>$data['xorg'],
			"xadd1"=>$data['xadd1'],
			"xadd2"=>$data['xadd2'],
			"xcity" => $data['xcity'],
			"xprovince" => $data['xprovince'],
			"xpostal" => $data['xpostal'],
			"xcountry" => $data['xcountry'],
			"xcontact" => $data['xcontact'],
			"xtitle" => $data['xtitle'],
			"xphone" => $data['xphone'],
			"xsupemail" => $data['xsupemail'],
			"xmobile" => $data['xmobile'],
			"xfax" => $data['xfax'],
			"xweburl" => $data['xweburl'],
			"xnid" => $data['xnid'],
			"xtaxno" => $data['xtaxno'],
			"xtaxscope" => $data['xtaxscope'],
			"xgsup" => $data['xgsup'],
			"xpricegroup" => $data['xpricegroup'],
			"xsuptype" => $data['xsuptype'],
			"xdiscountpct" => $data['xdiscountpct'],
			"xcreditlimit" => $data['xcreditlimit'],
			"xcreditterms" => $data['xcreditterms'],
			"zactive"=>$data['zactive']
			);
			
			/*if($itemauto=="NO")
				$results["xitemcode"] = $data['xitemcode']; print_r($results);die;*/
			
			
			
			if(Session::get('sbizsupauto')=='NO')
				$results["xsup"] = $data['xsup'];
			
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xsup = '". $sup."'";
			return $this->db->update('sesup', $results, $where);
	}
	
	public function getSingleSupplier($sup){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xsup = '". $sup."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("sesup", $fields, $where);
	}
	
	public function getSuppliersByLimit($limit=""){
		$fields = array("xsup", "xorg", "xadd1","xmobile", "xsupemail");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("sesup", $fields, $where, " order by xsup desc", $limit);
	}
	public function getSupplier($sup){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xsup = '". $sup."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		echo json_encode($this->db->select("sesup", $fields, $where));
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
		
		$this->db->update('sesup', $postdata, $where);
			
	}
	
}