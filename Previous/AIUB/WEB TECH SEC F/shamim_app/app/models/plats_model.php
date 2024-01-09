<?php  

class Plats_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
			
		$results = $this->db->insert('seplat', array(
			"bizid" => $data['bizid'],
			"xplatcode" => $data['xplatcode'],
			"xdesc" => $data['xdesc'],
			"xlongdesc" => $data['xlongdesc'],
			"xlevel"=> $data['xlevel'],
			"xtype"=> $data['xtype'],
			"xsqurefit"=> $data['xsqurefit'],
			"xcat"=> "",
			"xunitpur"=> "PCS",
			"xunitsale"=> "PCS",
			"xunitstk"=> "PCS",
			"xpricepur"=> $data['xpricepur'],
			"xmrp"=> $data['xmrp'],
			"xstdcost"=> $data['xmrp'],
			"xstdprice"=> $data['xpricepur'],
			"zactive"=> $data['zactive'],
			"zemail"=> $data['zemail']
			));
		
		return $results;	
	}
	
	public function editplat($data, $id){
		$results = array(
			"bizid" => $data['bizid'],
			"xplatcode" => $data['xplatcode'],
			"xdesc" => $data['xdesc'],
			"xlongdesc" => $data['xlongdesc'],
			"xlevel"=> $data['xlevel'],
			"xtype"=> $data['xtype'],
			"xsqurefit"=> $data['xsqurefit'],
			"xcat"=> "",
			"xunitpur"=> "PCS",
			"xunitsale"=> "PCS",
			"xunitstk"=> "PCS",
			"xpricepur"=> $data['xpricepur'],
			"xmrp"=> $data['xmrp'],
			"xstdcost"=> $data['xmrp'],
			"xstdprice"=> $data['xpricepur'],
			"zactive"=> $data['zactive'],
			"xemail"=> $data['xemail'],
			"zutime"=> $data['zutime']
		);
			
			/*if($itemauto=="NO")
				$results["xitemcode"] = $data['xitemcode']; print_r($results);die;*/
			
			
			
			if(Session::get('sbizitemauto')=='NO')
				$results["xplatcode"] = $data['xplatcode'];
			
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xplatcode = '". $id."'";
			return $this->db->update('seplat', $results, $where);
	}
	
	public function getSinglePlat($id){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xplatcode = '". $id."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("seplat", $fields, $where);
	}
	
	public function getPlatByLimit($limit=""){
		$fields = array("xplatcode", "xdesc", "xlevel","xtype","xsqurefit");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid');	
		return $this->db->select("seplat", $fields, $where, " order by xsl desc", $limit);
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
		
		$this->db->update('seplat', $postdata, $where);
			
	}
	
}