<?php 

class Imrpt_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}

	
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	
	public function getinvrcv($fdt, $tdt, $itemcondition="", $wproj=""){
	   
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xdoctype","xtxnnum","xitemcode","xitemdesc","replace(format(xratepur,".session::get('sbizdecimals')."),',','') as xstdcost","xqty","(SELECT xunitstk from seitem where vimtrn.bizid=seitem.bizid and vimtrn.xitemcode=seitem.xitemcode) as xunitstk","replace(format(xratepur*xqty,".session::get('sbizdecimals')."), ',','') as xtotal");
			$where = " bizid = ". Session::get('sbizid') ." and xqty<>0 ".$itemcondition." and xsign=1  and xdate between '". $fdt ."' and '". $tdt ."'".$wproj;

		return $this->db->select("vimtrn", $fields, $where, " ", " order by ztime");
	}

	public function getinvdetail($fdt, $tdt, $item){
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xdoctype","xtxnnum","replace(format(xstdcost,".session::get('sbizdecimals')."),',','') as xstdcost","if((xqty*xsign)>=0, xqty, 0) as xqtydr", "if((xqty*xsign)<0, xqty, 0) as xqtycr");
			$where = " bizid = ". Session::get('sbizid') ." and xqty<>0 and xitemcode='".$item."' and xdate between '". $fdt ."' and '". $tdt ."'";

		return $this->db->select("vimtrn", $fields, $where, " ", " order by ztime");
	}

	public function getinvissrcv($fdt, $tdt , $itemcondition=""){
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xdoctype","xtxnnum","xitemcode","xitemdesc","replace(format(xstdcost,".session::get('sbizdecimals')."),',','') as xstdcost","if((xqty*xsign)>=0, xqty, 0) as xqtydr", "if((xqty*xsign)<0, xqty, 0) as xqtycr");
			$where = " bizid = ". Session::get('sbizid') ."  $itemcondition and xqty<>0 and xdate between '". $fdt ."' and '". $tdt ."'";

		return $this->db->select("vimtrn", $fields, $where, " ", " order by ztime");
	}
	public function getopbal($fdt, $item){
		$fields=array("COALESCE(sum(xqty*xsign),0) as xbal","COALESCE(sum(qtygrn),0) as xbalgrn","COALESCE(sum(qtyreturn),0) as xbalreturn","COALESCE(sum(qtydret),0) as xbaldret","COALESCE(sum(qtyso),0) as xbalso","COALESCE(sum(qtyfree),0) as xbalfree","COALESCE(sum(qtyreject),0) as xbalreject");
			$where = " bizid = ". Session::get('sbizid') ." and xqty<>0 and xitemcode='".$item."' and xdate<'". $fdt ."'";

		return $this->db->select("vimtrn", $fields, $where);
	}
	
	public function getinvissue($fdt, $tdt , $itemcondition=""){
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xdoctype","xtxnnum","xitemcode","xitemdesc","replace(format(xstdcost,".session::get('sbizdecimals')."),',','') as xstdcost","xqty","(SELECT xunitstk from seitem where vimtrn.bizid=seitem.bizid and vimtrn.xitemcode=seitem.xitemcode) as xunitstk","replace(format(xstdcost*xqty,".session::get('sbizdecimals')."), ',','') as xtotal");
			$where = " bizid = ". Session::get('sbizid') ."  $itemcondition and xqty<>0 and xsign=-1 and xdate between '". $fdt ."' and '". $tdt ."'";

		return $this->db->select("vimtrn", $fields, $where, " ", " order by ztime");
	}

	public function getImStock($wh=""){
		$fields = array("xwh", "xitemcode", "(select xdesc from seitem where vimstock.bizid=seitem.bizid and vimstock.xitemcode=seitem.xitemcode) as xitemdesc", "xqtypo","xqty","xqtyso");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xqtypo<>0 or xqty<>0 or xqtyso<>0 $wh";	
		return $this->db->select("vimstock", $fields, $where, " order by xitemcode");
	}
	
	public function getImStockpt($where="", $xwh){
	    $wh="";
		if($xwh !="")
		$wh="and xwh='".$xwh."'";
		$fields = array("xwh", "xitemcode", "(select xdesc from seitem where vimstock.bizid=seitem.bizid and vimstock.xitemcode=seitem.xitemcode) as xdesc","xqtypo","qtygrn","TRUNCATE(balgrn,2) as balgrn","qtyreturn","TRUNCATE(balreturn,2) as balreturn","qtydret","TRUNCATE(baldret,2) as baldret","qtyso","TRUNCATE(balso,2) as balso","qtyfree","TRUNCATE(balfree,2) as balfree","qtyreject","TRUNCATE(balreject,2) as balreject","qtystoredel","round(xqty,0) as xqty","TRUNCATE((balgrn-balreturn+baldret-balso-balfree-balreject),2) as baltotal","(SELECT xunitstk from seitem where vimstock.bizid=seitem.bizid and vimstock.xitemcode=seitem.xitemcode) as xunitstk");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." ".$wh." and (xqtypo<>0 or xqty<>0 or xqtyso<>0 or qtygrn<>0 or qtyreturn<>0 or qtyso<>0 or qtyfree<>0 or qtyreject<>0)".$where;
		return $this->db->select("vimstock", $fields, $where, " order by xitemcode");
	}

	public function getWarehouseStock($wh=""){
		$fields = array("xitemcode", "(select xdesc from seitem where vimstock.bizid=seitem.bizid and vimstock.xitemcode=seitem.xitemcode) as xitemdesc","xqty");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xqtypo<>0 or xqty<>0 or xqtyso<>0 $wh";	
		return $this->db->select("vimstock", $fields, $where, " order by xitemcode");
	}
	
	public function getBill(){
		$fields = array("xdocnum");
		$where = " bizid = ". Session::get('sbizid') ." and xdocnum = (SELECT xtxnnum FROM tadamst WHERE tadamst.xtxnnum=glheader.xdocnum)";	
		return $this->db->select("glheader", $fields, $where);
	}
	public function getbilldt($xtxn){
		$fields = array("xdesc");
		$where = " bizid = ". Session::get('sbizid') ." and xtxnnum = '".$xtxn."'";	
		return $this->db->select("tadadet", $fields, $where);
	}

	public function updateVoucher($xtxn,$alldt){
		$postdata=array(
			"xlong" => $alldt
			);
		$where = " bizid = ". Session::get('sbizid') ." and xdocnum = '".$xtxn."'";	
		return $this->db->update("glheader", $postdata, $where);
	}
	
}