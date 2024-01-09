<?php 

class Distbcchange_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($bin,$bc,$distrisl){
		
		$postdata=array(
			"distrisl" => $distrisl,
			"bc"=>$bc
			);
		$where = " bin=".$bin[0]["bin"];
		
		$this->update($postdata,$where);
		
		if($bin[0]["side"]=="A"){
			$sidedistrisl = "leftdistrisl";
		}else{
			$sidedistrisl = "rightdistrisl";
			}
		
		$postdata = array(
			$sidedistrisl => $distrisl
			);
		
		$where = " bin=".$bin[0]["upbin"];

		$this->update($postdata,$where);

		if($bin[0]["leftbin"]>0){
			
			$postdata = array(
				"updistrisl" => $distrisl
			);
		
		$where = " bin=".$bin[0]["leftbin"];

		$this->update($postdata,$where);
			
		}

		if($bin[0]["rightbin"]>0){
			
			$postdata = array(
				"updistrisl" => $distrisl
			);
		
		$where = " bin=".$bin[0]["rightbin"];

		$this->update($postdata,$where);
			
		}	
		
	return 1;		
	}
	
		
	
	public function getGenTree($bin){
		$fields = array("upbin");
		$where = " bizid = ". Session::get('sbizid') ." and bin = ". $bin ;	
		return $this->db->select("mlmtreegen", $fields, $where);
	}
	
	public function checkDownLine($bin, $upbin){
		$fields = array("upbin");
		$where = " bizid = ". Session::get('sbizid') ." and bin = ". $bin ." and upbin = ".$upbin ;	
		if(count($this->db->select("mlmtreegen", $fields, $where))>0)
			return true;
		else
			return false;
		
	}
	
	public function getRefTree($bin){
		$fields = array("refbin");
		$where = " bizid = ". Session::get('sbizid') ." and bin = ". $bin ;	
		return $this->db->select("mlmtreeref", $fields, $where);
	}
	
	
	public function getDistrislByDin($cus){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xrdin = '". $cus."'" ;	
		return $this->db->select("mlminfo", $fields, $where);
	}
	
	public function getPoint($cus){
		return $this->db->getCustomerPoint($cus);
		
	}
	
	public function getDistrislByBin($bin){
		$fields = array();
		$where = " bizid = ". Session::get('sbizid') ." and bin = ". $bin ;	
		return $this->db->select("mlmtree", $fields, $where);
	}
	public function getStatementNo(){
		
		return $this->db->getStatementNo();
	}
	
	public function getBinDetail($bin){
		$fields = array();
		$where = " bizid = ". Session::get('sbizid') ." and bin = ". $bin ;	
		echo json_encode($this->db->select("vmlminfotreedt", $fields, $where));
	}
	
	public function getInfoRinDetail($rin){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xrdin = '". $rin ."'";	
		echo json_encode($this->db->select("mlminfo", $fields, $where));
	}
	
	public function getTreeGeneology($bin){
		$fields = array("bin","xrdin","xorg","bc","side","leftbin","leftrin","leftbinname","rightbin","rightrin","rightbinname","upbin","uprin","uplinername","upbc");
		$where = "bizid = ". Session::get('sbizid') ." and bin in  (select bin from mlmtreegen where upbin=". $bin .") order by bin";	
		return $this->db->select("vmlminfotreedt", $fields, $where);
	}
	public function getTreePlacement($bins){
		$fields = array("bin","xrdin","xorg","bc","side","leftbin","leftrin","leftbinname","rightbin","rightrin","rightbinname","upbin","uprin","uplinername","upbc");
		$where = "bizid = ". Session::get('sbizid') ." and bin in  (". $bins .") order by bin";	
		return $this->db->select("vmlminfotreedt", $fields, $where);
	}
	public function getTreeRef($bin){
		$fields = array();
		$where = "bizid = ". Session::get('sbizid') ." and xbin in  (select bin from mlmtreeref where refbin=". $bin .")";	
		return $this->db->select("vmlminfotreedt", $fields, $where);
	}
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	
	public function update($postdata,$where){
			//echo $where;die;
		
		$this->db->update('mlmtree', $postdata, $where);
			
	}
	public function getRow($table,$keyfield,$num, $xrow){
		
		return $this->db->rowIncrement($table,$keyfield,$num, $xrow);
	}
}