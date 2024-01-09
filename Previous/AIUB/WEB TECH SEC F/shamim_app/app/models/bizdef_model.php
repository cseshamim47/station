<?php 

class Bizdef_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	
	public function editBizdef($data, $bizid){
		$results = array(
			"bizshort"=>$data['bizshort'],
			"bizlong"=>$data['bizlong'],
			"bizadd1"=>$data['bizadd1'],
			"bizadd2"=>$data['bizadd2'],
			"bizdistrict"=>$data['bizdistrict'],
			"bizthana"=>$data['bizthana'],
			"bizemail"=>$data['bizemail'],
			"bizfax"=>$data['bizfax'],
			"bizphone1"=>$data['bizphone1'],
			"bizphone2"=>$data['bizphone2'],
			"bizmobile"=>$data['bizmobile'],
			"bizcur"=>$data['bizcur'],
			"bizvatpct"=>$data['bizvatpct'],
			"bizchkinv"=>$data['bizchkinv'],
			"bizdecimals"=>$data['bizdecimals'],
			"bizitemauto"=>$data['bizitemauto'],
			"bizcusauto"=>$data['bizcusauto'],
			"bizsupauto"=>$data['bizsupauto'],
			"bizdateformat"=>$data['bizdateformat'],
			"bizyearoffset"=>$data['bizyearoffset']
			);
			
			$where = "bizid = ". Session::get('sbizid') ."";
			return $this->db->update('pabuziness', $results, $where);
	}
	
	public function getSingleDef(){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." LIMIT 1" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("pabuziness", $fields, $where);
	}
	
}