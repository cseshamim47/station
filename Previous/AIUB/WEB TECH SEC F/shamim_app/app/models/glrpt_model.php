<?php 

class Glrpt_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	
	public function getArApExpInc($fdt, $tdt, $type, $project){
		$site = "";
		
		if($project!=""){
			$site = " and xsite='".$project."'";
		}
		
		$fields = array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xacc","xaccdesc","xbranch","xvoucher","xlong","xnarration","xprime");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' ".$site." and bizid = ". Session::get('sbizid') ." and xdate between '". $fdt ."' and '". $tdt ."' and ".$type." and xstatus='Balanced'";	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("gldetailview", $fields, $where," order by ztime");
	}

	public function getOpArApExpInc($type, $fdate, $project){
		$site = "";
		
		if($project!=""){
			$site = " and xsite='".$project."'";
		}
		$fields = array("xacc","xdesc","(select COALESCE(sum(xprime),0) as xprime from gldetailview
		where glchart.xacc=gldetailview.xacc and glchart.bizid=gldetailview.bizid and ".$site." xdate<'".$fdate."' and xstatus='Balanced') as xprime");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ".$type."";	
		return $this->db->select("glchart", $fields, $where);
	}
	

	public function getvoucher($vou){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xvoucher = '". $vou ."'";	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("gldetailview", $fields, $where);
	}
	public function dayBook($fdt, $tdt, $acc){
		$fields = array("DATE_FORMAT(xdate,'%d-%m-%Y')","xvoucher","concat(xacc,'-',xaccdesc) as xacc","concat(xaccsub,'-',xaccsubdesc) as xaccsub","xnarration","(select if (xprime>0,xprime,'0')) as xprimedr", "(select if (xprime<0,abs(xprime),'0')) as xprimecr");
		//print_r($this->db->select("pabuziness", $fields));die;
		if($acc!="")
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xstatus='Balanced' and xdate between '". $fdt ."' and '". $tdt ."' and xacc = '". $acc ."'";	
		else
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xstatus='Balanced' and xdate between '". $fdt ."' and '". $tdt ."'";
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("gldetailview", $fields, $where," order by ztime");
	}
	public function getjournal($vou){
		$fields = array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xrow","xbranch","xvoucher","xacc","xaccdesc","xaccsub","xaccsubdesc","xcheque","xnarration","(select if (xprime>0,xprime,'0')) as xprimedr", "(select if (xprime<0,abs(xprime),'0')) as xprimecr","xsite","xemail","zemail", "xmanager");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xvoucher = '". $vou ."'";	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("gldetailview", $fields, $where," order by xrow");
	}
	public function getAccType($acc){
		
		$fields = array("xacctype");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xacc='". $acc ."' LIMIT 1";	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("glchart", $fields, $where);
	}
	public function getledger($fdt, $tdt, $acc, $project=""){
		$site = "";
		
		if($project!=""){
			$site = " and xsite='".$project."'";
		}
		
		$fields = array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xbranch","xvoucher","xnarration","(select if (xprime>0,xprime,'0')) as xprimedr", "(select if (xprime<0,abs(xprime),'0')) as xprimecr");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' ".$site." and bizid = ". Session::get('sbizid') ." and xdate between '". $fdt ."' and '". $tdt ."' and xacc = '". $acc ."' and xstatus='Balanced'";	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("gldetailview", $fields, $where," order by ztime");
	}
	public function getcashbankbook($fdt, $tdt, $type, $project=""){
		$site = "";
		
		if($project!=""){
			$site = " and xsite='".$project."'";
		}
		
		$fields = array("DATE_FORMAT(xdate,'%d-%m-%Y') as xdate","xacc","xaccdesc","xbranch","xvoucher","xnarration","xprime");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' ".$site." and bizid = ". Session::get('sbizid') ." and xdate between '". $fdt ."' and '". $tdt ."' and xaccusage = '".$type."' and xstatus='Balanced'";	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("gldetailview", $fields, $where," order by xdate");
	}
	public function getsubledger($fdt, $tdt, $acc, $accsub, $project=""){
		$site = "";
		
		if($project!=""){
			$site = " and xsite='".$project."'";
		}
		$fields = array("DATE_FORMAT(xdate,'%d-%m-%Y')","xbranch","xvoucher","xnarration","(select if (xprime>0,xprime,'0')) as xprimedr", "(select if (xprime<0,abs(xprime),'0')) as xprimecr");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' ".$site."  and bizid = ". Session::get('sbizid') ." and xstatus='Balanced' and xdate between '". $fdt ."' and '". $tdt ."' and xacc = '". $acc ."' and xaccsub = '". $accsub ."'";	
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

	
	public function getopbalcashbank($type, $fdate, $project=""){
		$site = "";
		
		if($project!=""){
			$site = " and xsite='".$project."'";
		}
		$fields = array("xacc","xdesc","(select COALESCE(sum(xprime),0) as xprime from gldetailview
		where glchart.xacc=gldetailview.xacc and glchart.bizid=gldetailview.bizid and ".$site." xdate<'".$fdate."' and xstatus='Balanced' and xrecflag='Live') as xprime");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xaccusage='".$type."'";	
		return $this->db->select("glchart", $fields, $where);
	}
	
	public function getsubopbal($acc,$subacc,$fdate, $project=""){
		$site = "";
		
		if($project!=""){
			$site = " and xsite='".$project."'";
		}
		$fields = array("sum"=>array("xprime_xprime"));
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " where xrecflag='Live' ".$site."  and bizid = ". Session::get('sbizid') ." and xstatus='Balanced' and xacc='".$acc."' and xaccsub='".$subacc."'  and xdate<'".$fdate."'";	
		return $this->db->selectAggregate("gldetailview", $fields, $where);
	}
	
	public function getcusopbal($cus,$fdate){
		$fields = array("sum"=>array("xprime_xprime"));
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " where xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xaccsource='Customer' and xaccsub='".$cus."'  and xdate<'".$fdate."'";	
		return $this->db->selectAggregate("gldetailview", $fields, $where);
	}
	
	public function getsupopbal($sup,$fdate){
		$fields = array("sum"=>array("xprime_xprime"));
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " where xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xaccsource='Supplier' and xaccsub='".$sup."'  and xdate<'".$fdate."'";	
		return $this->db->selectAggregate("gldetailview", $fields, $where);
	}
	
	public function getcussupledger($fdt, $tdt, $accsub, $type){
		$fields = array("DATE_FORMAT(xdate,'%d-%m-%Y')","xbranch","xvoucher","xnarration","(select if (xprime>0,xprime,'0')) as xprimedr", "(select if (xprime<0,abs(xprime),'0')) as xprimecr");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xstatus='Balanced' and xdate between '". $fdt ."' and '". $tdt ."' and xaccsource = '". $type ."' and xaccsub = '". $accsub ."'";	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("gldetailview", $fields, $where," order by ztime");
	}
	public function getmatching($st,$type){
		$fields = array("DATE_FORMAT(xdate,'%d-%m-%Y')","xrdin","(select xorg from mlminfo where mlmtotrep.xrdin=mlminfo.xrdin and mlmtotrep.bizid=mlminfo.bizid) as xorg","bin","round(xcom,2) as xcom","round((xcom*xsrctaxpct)/100,2) as xtax", "round(xcom-((xcom*xsrctaxpct)/100),2) as xtotal");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and stno='". $st ."' and xcomtype='".$type."'";	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("mlmtotrep", $fields, $where," order by bin");
	}
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	
	
	
}