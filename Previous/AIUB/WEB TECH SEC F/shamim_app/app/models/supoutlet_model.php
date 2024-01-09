<?php 

class Supoutlet_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
			
		$results = $this->db->insert('sesupoutlet', array(
			"bizid"=>$data['bizid'],
			"xsup"=>$data['xsup'],
			"xsuffix"=>$data['xsuffix'],
			"xoutlet"=>$data['xoutlet'],
			"xdesc"=>$data['xdesc'],
			"xadd1"=>$data['xadd1'],
			"xdistrict" => $data['xdistrict'],
			"xthana" => $data['xthana'],
			"xmobile" => $data['xmobile'],
			"xphone" => $data['xphone'],
			"zemail" => $data['zemail']
			));
		
		return $results;	
	}
	
	public function editOutlet($data){
		$results = array(
			"xsup"=>$data['xsup'],
			"xsuffix"=>$data['xsuffix'],
			"xoutlet"=>$data['xoutlet'],
			"xdesc"=>$data['xdesc'],
			"xadd1"=>$data['xadd1'],
			"xdistrict" => $data['xdistrict'],
			"xthana" => $data['xthana'],
			"xmobile" => $data['xmobile'],
			"xphone" => $data['xphone']
			);
			
		
			$where = " bizid = ". Session::get('sbizid') ." and xoutletsl = '". $data['xoutletsl'] ."'";
			return $this->db->update('sesupoutlet', $results, $where);
	}
	
	public function getSingleOutlet($outletsl){
		$fields = array();
		
		$where = " bizid = ". Session::get('sbizid') ." and xoutletsl = '". $outletsl ."'" ;	
		
		return $this->db->select("sesupoutlet", $fields, $where);
	}
	
	public function getSuppliersByLimit(){
		$fields = array("distinct xsup as xsup");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid');	
		return $this->db->select("sesupoutlet", $fields, $where);
	}
	public function getOutlets($sup){
		$fields = array("xoutletsl","xoutlet","xdesc","xmobile","xadd1");
		
		$where = " bizid = ". Session::get('sbizid') ." and xsup = '". $sup ."'" ;	
		
		return $this->db->select("sesupoutlet", $fields, $where);
	}
	public function getSupOutlets($sup){
		$fields = array();
		
		$where = " bizid = ". Session::get('sbizid') ." and xsup = '". $sup ."'" ;	
		
		return $this->db->select("sesupoutlet", $fields, $where);
	}
}