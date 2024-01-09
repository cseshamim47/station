<?php 

class Pmfgr_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data, $dtcols, $dtdata){
		//print_r($data); die;	
		$mstdata = array(
				'bizid'=>$data['bizid'],
				'zemail'=>$data['zemail'],
				'xfgrnum'=>$data['xfgrnum'],
				'xitemcode'=>$data['xitemcode'],
				'xqty'=>$data['xqty'],
				'xwh'=>$data['xfwh'],
				'xrawwh'=>$data['xrawwh'],
				'xstdcost'=>$data['xstdcost'],
				'xdate'=>$data['xdate'],
				'xexpdate'=>$data['xexpdate'],
				'xbranch'=>$data['xbranch'],
				'xfinyear'=>$data['xfinyear'],
				'xfinper'=>$data['xfinper'],	
				'xstatus'=>'Created',
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and xfgrnum ='" . $data['xfgrnum'] . "'";
		
		$results = $this->db->insertMasterDetail('pmfgrmst',$mstdata,"pmfgrdet",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	
	
	public function edit($data,$dt,$fgrnum){

		$header = array(
				'xqty'=>$data['xqty'],
				'xwh'=>$data['xfwh'],
				'xrawwh'=>$data['xrawwh'],
				
				'xdate'=>$data['xdate'],
				'xexpdate'=>$data['xexpdate'],
				
				'xfinyear'=>$data['xfinyear'],
				'xfinper'=>$data['xfinper'],
			);
		$detail = array(
					
					'xwh'=>$data['xrawwh'],
					
		);	
		//print_r($header); print_r($detail);die;
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xfgrnum = '". $fgrnum."'";
			$this->db->update('pmfgrmst', $header, $where);
			$where = "bizid = ". Session::get('sbizid') ." and xitemtype='Raw Material' and xfgrnum = '". $fgrnum."'";
			return ($this->db->update('pmfgrdet', $detail, $where));	
	}
	
	public function getBom($item){
		$fields = array("*","(select xdesc from seitem where pmbommst.bizid=seitem.bizid and pmbommst.xitemcode=seitem.xitemcode) as xdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xitemcode = '". $item ."' and zactive=1" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("pmbommst", $fields, $where);
	}
	public function getFgr($fgrnum){
		$fields = array("*","(select xdesc from seitem where pmfgrmst.bizid=seitem.bizid and pmfgrmst.xitemcode=seitem.xitemcode) as xdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xfgrnum = '". $fgrnum ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("pmfgrmst", $fields, $where);
	}
	
	public function getFgrAll($status){
		$fields = array("xdate","xfgrnum","xitemcode","(select xdesc from seitem where pmfgrmst.bizid=seitem.bizid and pmfgrmst.xitemcode=seitem.xitemcode) as xdesc","xstdcost","xqty");
		//print_r($this->db->select("pabuziness", $fields));die;
	$where = " bizid = ". Session::get('sbizid') ." and xstatus='".$status."' order by xfgrsl desc" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("pmfgrmst", $fields, $where);
	}
	public function getItemStock($wh, $itemcode){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
	$where = " bizid = ". Session::get('sbizid') ." and xwh='".$wh."' and xitemcode='".$itemcode."'";	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vimstock", $fields, $where);
	}

	public function getvbomdt($item){
		$fields = array("m.xbomcode","m.xitemcode","(select xdesc from seitem where m.bizid=seitem.bizid and m.xitemcode=seitem.xitemcode) as xitemdesc","c.xrow","c.xrawitem","if(xitemtype='Raw Material',(select xdesc from seitem where c.bizid=seitem.bizid and c.xrawitem=seitem.xitemcode),'') as xrawdesc","c.xqty","c.xunit","if(xitemtype='Raw Material',COALESCE((select avgcost from vitemcost where c.bizid=vitemcost.bizid and c.xrawitem=vitemcost.xitemcode),0),xstdcost)*c.xqty as xstdcost,c.xitemtype");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " m.bizid = ". Session::get('sbizid') ." and m.xitemcode = '".$item."' 
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
		
		$this->db->update('pmfgrmst', $postdata, $where);
	}
	public function cancel($where){
		//echo $where;die;
		$postdata=array(
			"xstatus" => "Canceled"			
			);
		
		$this->db->update('pmfgrmst', $postdata, $where);
	}
	public function recdelete($where){
		$this->db->dbdelete('pmfgrdet', $where);
		$this->db->dbdelete('pmfgrmst', $where);
	}
}


