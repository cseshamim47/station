<?php 

class Items_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
			
		$results = $this->db->insert('seitem', array(
			"bizid" => $data['bizid'],
			"xitemcode" => $data['xitemcode'],
			"xitemcodealt" => $data['xitemcodealt'],
			"xdesc" => $data['xdesc'],
			"xcat" => $data['xcat'],
			"xlongdesc" => $data['xlongdesc'],
			"xbrand"=> $data['xbrand'],
			"xgitem"=> $data['xgitem'],
			"xcitem"=> $data['xcitem'],
			"xtaxcodepo"=> $data['xtaxcodepo'],
			"xtaxcodesales"=> $data['xtaxcodesales'],
			"xcountryoforig"=> $data['xcountryoforig'],
			"xunitpur"=> $data['xunitstk'],
			"xunitsale"=> $data['xunitstk'],
			"xunitstk"=> $data['xunitstk'],
			"xsup"=> $data['xsup'],
			"xconversion"=> "1",
			"xreorder"=> $data['xreorder'],
			"xmandatorybatch"=> $data['xmandatorybatch'],
			"xserialconf"=> $data['xserialconf'],
			"xpricepur"=> $data['xpricepur'],
			"xstdcost"=> $data['xstdcost'],
			"xmrp"=> $data['xmrp'],
			"xcp"=> $data['xcp'],
			"xdp"=> $data['xdp'],
			"xstdprice"=> $data['xmrp'],
			"zactive"=> $data['zactive'],
			"xcolor"=> $data['xcolor'],
			"xsize"=> $data['xsize'],
			"zemail"=> $data['zemail'],
			"xsource"=> $data['xsource'],
			"xcur"=> $data['xcur'],
			"xcurconversion"=> $data['xcurconversion']
			));
		
		return $results;	
	}
	
	public function editItem($data, $id){
		$results = array(
			"bizid" => $data['bizid'],
			//"xitemcode" => $data['xitemcode'],
			"xitemcodealt" => $data['xitemcodealt'],
			"xdesc" => $data['xdesc'],
			"xcat" => $data['xcat'],
			"xlongdesc" => $data['xlongdesc'],
			"xbrand"=> $data['xbrand'],
			"xgitem"=> $data['xgitem'],
			"xcitem"=> $data['xcitem'],
			"xtaxcodepo"=> $data['xtaxcodepo'],
			"xtaxcodesales"=> $data['xtaxcodesales'],
			"xcountryoforig"=> $data['xcountryoforig'],
			"xunitpur"=> $data['xunitstk'],
			"xunitsale"=> $data['xunitstk'],
			"xunitstk"=> $data['xunitstk'],
			"xsup"=> $data['xsup'],
			"xconversion"=> "1",
			"xreorder"=> $data['xreorder'],
			"xmandatorybatch"=> $data['xmandatorybatch'],
			"xserialconf"=> $data['xserialconf'],
			"xpricepur"=> $data['xpricepur'],
			"xstdcost"=> $data['xstdcost'],
			"xmrp"=> $data['xmrp'],
			"xcp"=> $data['xcp'],
			"xdp"=> $data['xdp'],
			"xstdprice"=> $data['xmrp'],
			"zactive"=> $data['zactive'],
			"xcolor"=> $data['xcolor'],
			"xsize"=> $data['xsize'],
			"xemail"=> $data['xemail'],
			"xsource"=> $data['xsource'],
			"zutime"=> $data['zutime'],
			"xcur"=> $data['xcur'],
			"xcurconversion"=> $data['xcurconversion']);
			
			/*if($itemauto=="NO")
				$results["xitemcode"] = $data['xitemcode']; print_r($results);die;*/
			
			
			
			if(Session::get('sbizitemauto')=='NO')
				$results["xitemcode"] = $data['xitemcode'];
			
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xitemcode = '". $id."'";
			return $this->db->update('seitem', $results, $where);
	}
	
	public function getSingleItem($id){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xitemcode = '". $id."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("seitem", $fields, $where);
	}
	
	public function getItemsByLimit($limit=""){
		$fields = array("xitemcode", "xdesc", "xstdcost","xmrp","xsource", "xdp");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid');	
		return $this->db->select("seitem", $fields, $where, " order by xitemid desc", $limit);
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
		
		$this->db->update('seitem', $postdata, $where);
			
	}
	
}