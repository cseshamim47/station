<?php 

class Porpt_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}

	public function dateWisePO($fdt, $tdt, $xgitem="", $project=""){
		$cond="";
		if($project!="")
			$cond = " and xproj='".$project."'";

		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xponum","xsup","xorg","xitemcode","xitemdesc","xqty","xratepur","xunitpur","xtotal");
		if($xgitem=="")
			$where = " bizid = ". Session::get('sbizid') ." and xstatus = 'Confirmed' ".$cond." and xdate between '". $fdt ."' and '". $tdt ."'";
		else
			$where = " bizid = ". Session::get('sbizid') ." and xgitem='".$xgitem."' and xstatus = 'Confirmed' ".$cond." and xdate between '". $fdt ."' and '". $tdt ."'";
		
		return $this->db->select("vpodet", $fields, $where," order by ztime");
	}
	public function itemWisePO($fdt, $tdt, $xitemcode, $xgitem="", $project=""){
	    $cond="";
		if($project!="")
			$cond = " and xproj='".$project."'";
			
		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xponum","xitemcode","xsup","xorg","xitemdesc","xqty","xratepur","xunitpur","xtotal");
		
		if($xgitem=="")
			$where = " bizid = ". Session::get('sbizid') ." and xitemcode = '".$xitemcode."' and xstatus = 'Confirmed' ".$cond." and xdate between '". $fdt ."' and '". $tdt ."'";
			else
			$where = " bizid = ". Session::get('sbizid') ." and xgitem='".$xgitem."' and xitemcode = '".$xitemcode."' and xstatus = 'Confirmed' ".$cond." and xdate between '". $fdt ."' and '". $tdt ."'";

		return $this->db->select("vpodet", $fields, $where, " ", " order by ztime");
	}
	
	public function supWisePO($fdt, $tdt, $sup="", $xgitem="", $project=""){
		$cond="";
		$proj="";
		if($sup!="")
			$cond = " and xsup='".$sup."'";
			
		if($project!="")
			$proj = " and xproj='".$project."'";

		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xponum","xsup","xorg","xitemcode","xitemdesc","xqty","xratepur","xunitpur","xtotal");
		
		if($xgitem=="")
			$where = " bizid = ". Session::get('sbizid') ." ".$proj." and xstatus = 'Confirmed' ".$cond." and xdate between '". $fdt ."' and '". $tdt ."'";
			else
			$where = " bizid = ". Session::get('sbizid') ." and xgitem='".$xgitem."' ".$proj." and xstatus = 'Confirmed' ".$cond." and xdate between '". $fdt ."' and '". $tdt ."'";
		
		return $this->db->select("vpodet", $fields, $where," order by ztime");
	}

	public function getinvrcv($fdt, $tdt, $itemcondition="", $xgitem="", $project=""){
		$proj="";
		$gitem="";
		if($project!="")
			$proj = " and xproj='".$project."'";

		if($xgitem!="")
		$gitem = " and xtxnnum=(SELECT xgrnnum from pogrnmst WHERE pogrnmst.xgrnnum=vimtrn.xtxnnum AND pogrnmst.xtype='".$xgitem."')";

		$fields=array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xdoctype","xtxnnum","xsup","(SELECT xorg from sesup where vimtrn.bizid=sesup.bizid and vimtrn.xsup=sesup.xsup) as xsupname","xitemcode","xitemdesc","replace(format(xratepur,".session::get('sbizdecimals')."),',','') as xstdcost","xqty","(SELECT xunitstk from seitem where vimtrn.bizid=seitem.bizid and vimtrn.xitemcode=seitem.xitemcode) as xunitstk","replace(format(xratepur*xqty,".session::get('sbizdecimals')."), ',','') as xtotal");
			$where = " bizid = ". Session::get('sbizid') ." and xqty<>0 ".$itemcondition." and xsign=1 ".$proj." ".$gitem." and xdate between '". $fdt ."' and '". $tdt ."'";

		return $this->db->select("vimtrn", $fields, $where, " ", " order by ztime");
	}

	public function getAccType($acc){
		
		$fields = array("xacctype");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xacc='". $acc ."' LIMIT 1";	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("glchart", $fields, $where);
	}

	public function getledger($fdt, $tdt, $acc, $project="", $xgitem, $vtype){
		$site = "";
		$gitem = "";
		
		if($project!="")
			$site = " and xsite='".$project."'";
		
		if($vtype=="GRN"){
			$xvtype = " and xdocnum like 'GRN%'";
		}elseif($vtype=="PAY"){
			$xvtype = " and xvoucher like 'PAY-%'";
		}else{
			$xvtype = "";
		}

		if($xgitem!="" && $vtype=="GRN")
			$gitem = " and xdocnum=(SELECT xgrnnum from pogrnmst WHERE pogrnmst.xgrnnum=gldetailview.xdocnum AND pogrnmst.xtype='".$xgitem."')";
		
		$fields = array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xbranch","xvoucher","xnarration","(select if (xprime>0,xprime,'0')) as xprimedr", "(select if (xprime<0,abs(xprime),'0')) as xprimecr");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' ".$site." and bizid = ". Session::get('sbizid') ." ".$xvtype." ".$gitem." and xdate between '". $fdt ."' and '". $tdt ."' and xacc = '". $acc ."' and xstatus='Balanced'";
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("gldetailview", $fields, $where," order by ztime");
	}

	public function getopbal($acc, $fdate, $project=""){
		$site = "";
		
		if($project!=""){
			$site = " and xsite='".$project."'";
		}
		$fields = array("sum"=>array("xprime_xprime"));
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " where xrecflag='Live' ".$site."  and bizid = ". Session::get('sbizid') ." and xstatus='Balanced' and xacc='".$acc."' and xdate<'".$fdate."'";	
		return $this->db->selectAggregate("gldetailview", $fields, $where);
	}
	
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	
		
}