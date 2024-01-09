<?php 

class Glchart_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
			
		$results = $this->db->insert('glchart', array(
			"bizid"=>$data['bizid'],
			"xacc"=>$data['xacc'],
			"xdesc"=>$data['xdesc'],
			"xacctype"=>$data['xacctype'],
			"xaccusage"=>$data['xaccusage'],
			"xaccsource"=>$data['xaccsource'],
			"xacclevel1" => $data['xacclevel1'],
			"xacclevel2" => $data['xacclevel2'],
			"xacclevel3" => $data['xacclevel3'],
			"zemail"=>$data['zemail']
			));
		
		return $results;	
	}
	
	public function editglchart($data, $acc){
		$results = array(
			"xacc"=>$data['xacc'],
			"xdesc"=>$data['xdesc'],
			"xacctype"=>$data['xacctype'],
			"xaccusage"=>$data['xaccusage'],
			"xaccsource"=>$data['xaccsource'],
			"xacclevel1" => $data['xacclevel1'],
			"xacclevel2" => $data['xacclevel2'],
			"xacclevel3" => $data['xacclevel3'],
			"xemail" => $data['xemail'],
			"zutime" => $data['zutime']
			);
			
			/*if($itemauto=="NO")
				$results["xitemcode"] = $data['xitemcode']; print_r($results);die;*/
			
			
			
			if(Session::get('sbizcusauto')=='NO')
				$results["xcus"] = $data['xcus'];
			
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xacc = '". $acc."'";
			return $this->db->update('glchart', $results, $where);
	}
	
	public function getSingleglchart($acc){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xacc = '". $acc ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("glchart", $fields, $where);
	}
	
	public function getGlchartByLimit($limit=""){
		$fields = array("xacc", "xdesc", "xacctype","xaccusage", "xaccsource");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("glchart", $fields, $where, " order by xacc desc", $limit);
	}
	public function getGlchartsubByLimit($limit=""){
		$fields = array("xacc", "xdesc", "xacctype","xaccusage", "xaccsource");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and xaccsource='Sub Account' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("glchart", $fields, $where, " order by xacc desc", $limit);
	}
	public function getGlchartSubList($limit=""){
		$fields = array("xacc","(select xdesc from glchart where glchart.xacc=glchartsub.xacc) as xaccdesc","xaccsub","xdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("glchartsub", $fields, $where, " order by xacc, xaccsub", $limit);
	}
	public function getGlchartcrByLimit($limit=""){
		$fields = array("xacc as xacccr", "xdesc", "xacctype","xaccusage", "xaccsource");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and xaccusage in ('Cash', 'Bank') and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("glchart", $fields, $where, " order by xacccr desc", $limit);
	}
	
	public function getGlchartexpByLimit($limit=""){
		$fields = array("xacc", "xdesc", "xacctype","xaccusage", "xaccsource");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and xacctype = 'Expenditure' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("glchart", $fields, $where, " order by xacc desc", $limit);
	}
	
	public function getGlchartincByLimit($limit=""){
		$fields = array("xacc", "xdesc", "xacctype","xaccusage", "xaccsource");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and xacctype = 'Income' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("glchart", $fields, $where, " order by xacc desc", $limit);
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
		
		$this->db->update('glchart', $postdata, $where);
			
	}
	
}