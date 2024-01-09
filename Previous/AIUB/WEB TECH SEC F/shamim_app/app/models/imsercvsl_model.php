<?php 

class Imsercv_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
		
		$cols = "`xprefix`,`xdate`,`ximsenum`,`xrow`,`xsup`,`xdocnum`,`xbranch`,`xwh`,`xitemcode`,`xsl`,`xitemdesc`,`xcat`,`xcolor`,
		`xsize`,`xbrand`,`xqty`,`xuom`,`xvatpct`,`xdisc`,`xstdcost`,`xstdprice`,`xtxntype`,`xyear`,`xper`,`xsign`,`xstatus`,`bizid`,
		`zemail`";
		
		$vals = "('". $data['prefix'] ."','". $data['xdate'] ."','". $data['ximsenum'] ."','". $data['xrow'] ."','". $data['xsup'] ."',
		'". $data['xdocnum'] ."','". $data['xbranch'] ."','". $data['xwh'] ."','". $data['xitemcode'] ."','". $data['xsl'] ."',
		'". $data['xitemdesc'] ."','". $data['xcat'] ."','". $data['xcolor'] ."','". $data['xsize'] ."','". $data['xbrand'] ."',
		'". $data['xqty'] ."','". $data['xuom'] ."','". $data['xvatpct'] ."','". $data['xdisc'] ."','". $data['xstdcost'] ."',
		'". $data['xstdprice'] ."','". $data['xtxntype'] ."','". $data['xyear'] ."','". $data['xper'] ."','". $data['xsign'] ."',
		'". $data['xstatus'] ."','". $data['bizid'] ."','". $data['zemail'] ."'
		)";
		
		
		return $results;	
	}
	
	public function edit($data, $ximsenum, $itemcode){
		$results = array(
				"xdate"=>$data['xdate'],
				"xsup"=>$data['xsup'],
				"xdocnum"=>$data['xdocnum'],
				"xbranch"=>$data['xbranch'],
				"xwh"=>$data['xwh'],
				"xitemcode"=>$data['xitemcode'],
				"xsl"=>$data['xsl'],
				"xitemdesc"=>$data['xitemdesc'],
				"xcat"=>$data['xcat'],
				"xcolor"=>$data['xcolor'],
				"xsize"=>$data['xsize'],
				"xbrand"=>$data['xbrand'],
				"xqty"=>$data['xqty'],
				"xuom"=>$data['xuom'],
				"xvatpct"=>$data['xvatpct'],
				"xstdcost"=>$data['xstdcost'],
				"xstdprice"=>$data['xstdprice'],
				"xtxntype"=>$data['xtxntype'],
				"xyear"=>$data['xyear'],
				"xper"=>$data['xper']
			);
			
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximsenum = '". $ximsenum ."' and xitemcode = '". $itemcode."' and xtxntype='Inventory Receive'";
			//print_r($this->db->update("ximsenum",$results, $where)); die;
			return $this->db->update("imsetxn",$results, $where);
	}
	
	public function getSingleRecord($imsenum, $itemcode){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximsenum = '". $imsenum."' and xitemcode = '". $itemcode."' and xtxntype='Inventory Receive'";	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("imsetxn", $fields, $where);
	}
	
	public function getItemReceiveList($branch=""){
		$fields = array("ximsenum","xdate","xitemcode", "xsl", "xitemdesc", "xsup", "xwh", "xbranch", "xstdcost", "xqty");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xtxntype='Inventory Receive' $branch";	
		return $this->db->select("imsetxn", $fields, $where, " order by ximsenum");
	}
	
	public function getImseByLimit($limit=""){
		$fields = array("ximsenum", "xdate", "xsup");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xtxntype='Inventory Receive'";	
		return $this->db->selectDistinct("imsetxn", $fields, $where, " order by ximsenum", $limit);
	}
	
	public function getImSeReceive($imsenum){
		$fields = array("ximsenum","xrow", "xdate", "xitemcode", "xsl","xitemdesc","xqty","xstdcost", "xwh", "xbranch");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximsenum = '". $imsenum."' and xtxntype='Inventory Receive'";	
		return $this->db->select("imsetxn", $fields, $where, " order by ximsenum");
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrementNow($table,$keyfield,$prefix,$num);
	}
	
	public function getItemCode(){
		
		return $this->db->getItemCode();
	}
	
	public function getRow($table,$keyfield,$num, $xrow){
		
		return $this->db->rowIncrement($table,$keyfield,$num, $xrow);
	}
	
	
	public function delete($where){
			//echo $where;die;
		$postdata=array(
			"xrecflag" => "Deleted",
			"xemail" => Session::get('suser'),
			"zutime" => date("Y-m-d H:i:s")
			);
		
		$this->db->update('imsetxn', $postdata, $where);
			
	}
	
	
	
}