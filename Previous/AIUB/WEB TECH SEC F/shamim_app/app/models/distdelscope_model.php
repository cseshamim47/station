<?php 

class Distdelscope_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
		//print_r($data); die;	
		$mstdata = array(
			"bizid"=>$data['bizid'],
			"xreqdelnum"=>$data['xreqdelnum'],
			"xrdin"=>$data['xrdin'],
			"xorg"=>$data['xorg'],
			"xadd1"=>$data['xadd1'],
			"xmobile"=>"xmobile",
			"xdate" => $data['xdate'],
			"zemail" => $data['zemail'],
			"xdelorg"=>$data['xdelorg'],
			"xdeldocnum"=>$data['xdeldocnum']
			);
			
		
		
		$results = $this->db->insert('distdelscope',$mstdata);
		
		return $results;	
	}
	
	
	public function edit($data){
		$header = array(
					
			"xdelorg"=>$data['xdelorg'],
			"xdeldocnum"=>$data['xdeldocnum']			
			);
		
			$where = " bizid = ". Session::get('sbizid') ." and xsl = '". $data['xsl'] ."'";
			
			return ($this->db->update('distdelscope', $header, $where));	
	}
	
	public function creategrnall($mstfields, $mstdata,$intocols, $frmcols, $checkval, $where){
		$result = $this->db->insertAsFromTable("pogrnmst", $mstfields, $mstdata, "pogrndet",$intocols, $frmcols,"vpogrndet",$checkval, $where);
		return $result;
	}
	
	public function getDelivery($txnnum){ 
		$fields = array("*","(select xorg from mlminfo where mlminfo.xrdin=imreqdelmst.xrdin) as xorg"
		,"(select xadd1 from mlminfo where mlminfo.xrdin=imreqdelmst.xrdin) as xadd1"
		,"(select xmobile from mlminfo where mlminfo.xrdin=imreqdelmst.xrdin) as xmobile");
		
		$where = " bizid = ". Session::get('sbizid') ." and xreqdelnum = '". $txnnum ."' LIMIT 1" ;	
		
		return $this->db->select("imreqdelmst", $fields, $where);
	}
	
	
	
	
	public function getSingleQty($imreqnum, $row){
		$fields = array("ximreqnum","xrow","xitemcode","(select xdesc from seitem where seitem.bizid=vimreqdelbal.bizid and seitem.xitemcode=vimreqdelbal.xitemcode) as xitemdesc",	
		"xbal");
		
		$where = "bizid = ". Session::get('sbizid') ." and ximreqnum = '". $imreqnum ."' and xrow='".$row."' LIMIT 1";	
		
		echo json_encode($this->db->select("vimreqdelbal", $fields, $where));
	}
	
	
	public function getdeliverydt($txnnum){
		$fields = array("xsl","xdate",
		"xreqdelnum","xrdin","xorg","xmobile","xadd1","xdelorg","xdeldocnum"	
		);
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xsl = '". $txnnum ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("distdelscope", $fields, $where);
	}
	public function getdeldt(){
		$fields = array("xreqdelnum","xrdin","(select xorg from mlminfo where mlminfo.bizid=imreqdelmst	.bizid and mlminfo.xrdin=imreqdelmst.xrdin) as xorg",	
		"(select xmobile from mlminfo where mlminfo.bizid=imreqdelmst.bizid and mlminfo.xrdin=imreqdelmst.xrdin) as xmobile");
		
		$where = " bizid = ". Session::get('sbizid') ." and xreqdelnum not in (select xreqdelnum from distdelscope)";
		
		return $this->db->select("imreqdelmst", $fields, $where);
	}
	
	public function getDeliveryConfList(){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xsl","xreqdelnum","xrdin","(select xorg from mlminfo where mlminfo.bizid=distdelscope.bizid and mlminfo.xrdin=distdelscope.xrdin) as xorg","xdeldocnum","xdelorg");
		
		$where = " bizid = ". Session::get('sbizid') ;
		
		return $this->db->select("distdelscope", $fields, $where);
	}

	
	
	
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	

}