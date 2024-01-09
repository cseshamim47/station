<?php 

class Imstock_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
		
		// $fields = array("xwh", "xitemcode", "(select xdesc from seitem where vimstock.bizid=seitem.bizid and vimstock.xitemcode=seitem.xitemcode) as xdesc","qtygrn","TRUNCATE(balgrn,2)","qtyreturn","TRUNCATE(balreturn,2)","qtydret","TRUNCATE(baldret,2)","qtyso","TRUNCATE(balso,2)","qtyfree","TRUNCATE(balfree,2)","qtyreject","TRUNCATE(balreject,2)","xqty","TRUNCATE((balgrn-balreturn+baldret-balso-balfree-balreject),2) as baltotal");
	public function getImStock($branch="", $xgitem, $xcat, $wh, $itemcode){
		$gwhere = "";
		if($xgitem!="")
			$gwhere .= " and (SELECT xgitem from seitem where vimstock.bizid=seitem.bizid and vimstock.xitemcode=seitem.xitemcode)='".$xgitem."' ";
		if($xcat!="")
			$gwhere .= " and (SELECT xcat from seitem where vimstock.bizid=seitem.bizid and vimstock.xitemcode=seitem.xitemcode)='".$xcat."' ";
		if($wh!="")
			$gwhere .= " and xwh='".$wh."' ";
		if($itemcode!="")
			$gwhere .= " and xitemcode='".$itemcode."' ";

		$fields = array("xwh", "xitemcode", "(select xdesc from seitem where vimstock.bizid=seitem.bizid and vimstock.xitemcode=seitem.xitemcode) as xdesc","TRUNCATE(xqtypo,0) as xqtypo","TRUNCATE(qtygrn,0) as qtygrn","TRUNCATE(qtyreturn,0) as qtyreturn","TRUNCATE(qtydret,0) as qtydret","TRUNCATE(qtyso,0) as qtyso","TRUNCATE(qtyreject,0) as qtyreject","TRUNCATE(qtystoredel,0) as qtystoredel","TRUNCATE(xqty,0) as xqty","(select xunitstk from seitem where vimstock.bizid=seitem.bizid and vimstock.xitemcode=seitem.xitemcode) as xunitstk");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." ".$gwhere." and (xqtypo<>0 or xqty<>0 or xqtyso<>0 or qtygrn<>0 or qtyreturn<>0 or qtyso<>0)";	
		return $this->db->select("vimstock", $fields, $where, " order by xitemcode");
	}
		
	public function getImStockDoc(){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "1=1";	
		return $this->db->select("vimtrndoc", $fields, $where);
	}
	
	
	
	public function getItemList($branch=""){
		$fields = array("xwh","xitemcode", "(select xdesc from seitem where vimstock.bizid=seitem.bizid and vimstock.xitemcode=seitem.xitemcode) as xdesc","xqty");
		$where = " bizid = ". Session::get('sbizid') ." and xqtypo<>0 or xqty<>0 or xqtyso<>0 $branch";	
		return $this->db->select("vimstock", $fields, $where, " order by xitemcode");
	}
	
}
