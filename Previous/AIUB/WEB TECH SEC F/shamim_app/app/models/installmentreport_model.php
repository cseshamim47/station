<?php 
 
class Installmentreport_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	

	public function getinsdetail($fdate,$tdate,$xagent){
		$temp = "";
		if($xagent!="")
			$temp = " and xagent ='".$xagent."'";
		
		$fields = array("xinsnum", "xcus", "(SELECT xorg from secus WHERE secus.xcus=installmentmst.xcus) AS xorg","(SELECT xadd1 from secus WHERE secus.xcus=installmentmst.xcus) AS xadd1","(SELECT xmobile from secus WHERE secus.xcus=installmentmst.xcus) AS xmobile", "xamount");		
		$where = "xactive='Active' and xdate between '".$fdate."' and '".$tdate."' and bizid = ". Session::get('sbizid').$temp;
		return $this->db->select("installmentmst", $fields, $where);
	}

	public function getinscolldetail($fdate,$tdate){
		
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xinsnum", "xcus", "(SELECT xshort from secus WHERE secus.xcus=installmentcoll.xcus) AS xshort","(SELECT xadd1 from secus WHERE secus.xcus=installmentcoll.xcus) AS xadd1","(SELECT xmobile from secus WHERE secus.xcus=installmentcoll.xcus) AS xmobile", "xamount");		
		$where = "xstatus='Confirmed' and bizid = ". Session::get('sbizid') ." and xdate between '".$fdate."' and '".$tdate."'";
		return $this->db->select("installmentcoll", $fields, $where,"order by xdate");
	}

	public function salesmancolbal($xagent, $fdate, $tdate){
		
		
		$fields = array("abs(round(sum(xprime),2)) AS xbal");
		$where = "xflag='Credit' and xdate between '".$fdate."' and '".$tdate."' and (SELECT xagent from secus where secus.bizid = gldetailview.bizid and secus.xcus = gldetailview.xaccsub)='".$xagent."'";
		return $this->db->select("gldetailview", $fields, $where);
	}

	public function salesbybrand($xagent, $fdate, $tdate){
		
		
		$fields = array("xbrand","round(sum(xqty)) as xqty", "xunitsale", "round(sum(xsubtotal),2) as xbal", "(SELECT xagent from secus where secus.bizid = vsalesdt.bizid and secus.xcus = vsalesdt.xcus) as xagent");
		$where = "xdate between '".$fdate."' and '".$tdate."' and (SELECT xagent from secus where secus.bizid = vsalesdt.bizid and secus.xcus = vsalesdt.xcus)='".$xagent."'AND xbrand in ('Premier Cement','Rod','Scan Cement')";
		return $this->db->select("vsalesdt", $fields, $where, " group by xbrand");
	}

	public function salesmantarbal($xagent, $fdate, $tdate){
		
		$fields = array("xamount","xprecement","xscancement","xrod");
		$where = "xfdate='".$fdate."' and xtdate='".$tdate."' and  xagent ='".$xagent."'";
		return $this->db->select("salesmantarget", $fields, $where);
	}

	public function salescusareabal($xagent, $fdate){
		
		
		$fields = array("round(sum(xprime),2) AS xbal");
		$where = "xdate<'".$fdate."' and (SELECT xagent from secus where secus.bizid = gldetailview.bizid and secus.xcus = gldetailview.xaccsub)='".$xagent."'";
		return $this->db->select("gldetailview", $fields, $where);
	}

	public function getcomdetail($fdate,$tdate,$xagent,$xcomtype){
		$temp = "";
		$comtype = "";
		if($xagent!="")
			$temp = " and xagent ='".$xagent."'";
		if($xcomtype!="")
			$comtype = " and xcomtype ='".$xcomtype."'";
		
		$fields = array("xagent", "xshort", "xcus", "(SELECT xshort from secus WHERE secus.xcus=vcommissiondt.xcus) AS xcusname", "xcomamt","xcomtype","date_format(xdate, '%d-%m-%Y') as xdate","xinsamt","xagentcom");
		$where = "xdate between '".$fdate."' and '".$tdate."' and bizid = ". Session::get('sbizid').$temp.$comtype;
		return $this->db->select("vcommissiondt", $fields, $where);
	}

	public function getagentdt($xagent){
		
		$fields = array("*");
		$where = "bizid = ". Session::get('sbizid') ." and xagent='".$xagent."'";
		return $this->db->select("agent", $fields, $where);
	}

	public function getcompaiddetail($fdate,$tdate,$xagent,$xcomtype){
		$temp = "";
		$comtype = "";
		if($xagent!="")
			$temp = " and xagent ='".$xagent."'";
		if($xcomtype!="")
			$comtype = " and xcommtype ='".$xcomtype."'";
		
		$fields = array("xagent", "(select xshort from agent where agent.bizid=commission.bizid and agent.xagent=commission.xagent) as xshort", "xamount","xcommtype","date_format(xdate, '%d-%m-%Y') as xdate");		
		$where = "xdate between '".$fdate."' and '".$tdate."' and bizid = ". Session::get('sbizid').$temp.$comtype;
		return $this->db->select("commission", $fields, $where);
	}
	
	
	
}