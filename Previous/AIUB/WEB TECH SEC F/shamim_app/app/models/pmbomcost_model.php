<?php 

class Pmbomcost_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data, $dtcols, $dtdata){
		//print_r($data); die;	
		$mstdata = array(
			"bizid"=>$data['bizid'],
			"xbomcode"=>$data['xbomcode'],
			"xitemcode"=>$data['xitemcode'],
			"xstatus"=>"Created",			
			"zemail"=>$data['zemail'],
			
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and xbomcode ='" . $data['xbomcode'] . "'";
		
		$results = $this->db->insertMasterDetail('pmbommst',$mstdata,"pmbomdet",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	
	
	public function edit($data,$dt,$bomcode,$row){
		
		$detail = array(
					
					"xstdcost"=>$dt['xstdcost'],
					"xunit"=>$dt['xunit'],
					
		);	
		//print_r($header); print_r($detail);die;
			
			$where = "bizid = ". Session::get('sbizid') ." and xitemtype='Production Cost' and xbomcode = '". $bomcode."' and xrow=".$row;
			return ($this->db->update('pmbomdet', $detail, $where));	
	}
	
	public function getBom($txnnum){
		$fields = array("*","(select xdesc from seitem where pmbommst.bizid=seitem.bizid and pmbommst.xitemcode=seitem.xitemcode) as xdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xbomcode = '". $txnnum ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("pmbommst", $fields, $where);
	}
	public function getSingleBomDt($txnnum, $row){
		$fields = array("*",
		"(select xdesc from seitem where pmbomdet.bizid=seitem.bizid and pmbomdet.xrawitem=seitem.xitemcode) as xrawdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xitemtype='Production Cost' and xbomcode = '". $txnnum ."' and xrow=".$row;
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("pmbomdet", $fields, $where, " order by xrow");
	}
	
	public function getvbomdt($txnnum){
		$fields = array("m.xbomcode","m.xitemcode","(select xdesc from seitem where m.bizid=seitem.bizid and m.xitemcode=seitem.xitemcode) as xitemdesc","c.xrow","c.xrawitem","if(xitemtype='Raw Material',(select xdesc from seitem where c.bizid=seitem.bizid and c.xrawitem=seitem.xitemcode),'') as xrawdesc","c.xqty","c.xunit","if(xitemtype='Raw Material',COALESCE((select avgcost from vitemcost where c.bizid=vitemcost.bizid and c.xrawitem=vitemcost.xitemcode),0),xstdcost) as xstdcost");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " m.bizid = ". Session::get('sbizid') ." and m.xbomcode = '". $txnnum ."' 
		and m.bizid=c.bizid and m.xbomcode=c.xbomcode";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("pmbommst m, pmbomdet c", $fields, $where, " order by c.xrow");
	}
	
	public function getbomdt($txnnum){
		$fields = array("xrow",
		"xrawitem",	
		"xstdcost");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xitemtype='Production Cost' and xbomcode = '". $txnnum ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("pmbomdet", $fields, $where, " order by xrow");
	}

	public function getItem($item){
		
		return $this->db->getItemMaster("xitemcode",$item); 
		
	}
	public function getBomList($status){
		$fields = array("xbomcode","xitemcode","(select xdesc from seitem where pmbommst.bizid=seitem.bizid and pmbommst.xitemcode=seitem.xitemcode) as xdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xstatus='".$status."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("pmbommst", $fields, $where);
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	
	
	public function getRow($table,$keyfield,$num, $xrow){
		
		return $this->db->rowIncrement($table,$keyfield,$num, $xrow);
	}
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	
	public function confirm($where){
		//echo $where;die;
		$postdata=array(
			"xstatus" => "Confirmed"			
			);
		
		$this->db->update('pmbommst', $postdata, $where);
	}
	public function recdelete($where){
		$this->db->dbdelete('pmbomdet', $where);
	}
}