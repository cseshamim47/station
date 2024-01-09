<?php 

class Glrcptvou_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data, $dtcols, $dtdata){
		//print_r($data); die;	
		$mstdata = array(
			"bizid"=>$data['bizid'],
			"xvoucher"=>$data['xvoucher'],
			"xnarration"=>$data['xnarration'],
			"xyear"=>$data['xyear'],
			"xper"=>$data['xper'],
			"xstatusjv"=>$data['xstatusjv'],
			"xbranch" => $data['xbranch'],
			"xdoctype" => $data['xdoctype'],
			"xdocnum" => $data['xdocnum'],
			"xdate" => $data['xdate'],
			"xsite" => $data['xsite'],
			"zemail"=>$data['zemail']
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and xvoucher ='" . $data['xvoucher'] ."'";
		$results = $this->db->insertMasterDetail('glheader',$mstdata,"gldetail",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	
	
	public function editglvoucher($data,$dt,$vou,$row){
		$header = array(
			"xnarration"=>$data['xnarration'],
			"xdate"=>$data['xdate'],
			"xyear"=>$data['xyear'],
			"xper"=>$data['xper'],
			"zutime"=>$data['zutime'],
			"xemail" => $data['xemail']
			);
		$detail = array(
					"xacc"=>$dt['xacc'],
					"xacctype"=>$dt['xacctype'],
					"xaccusage"=>$dt['xaccusage'],
					"xaccsource"=>$dt['xaccsource'],
					"xaccsub"=>$dt['xaccsub'],
					"xbase"=>$dt['xprime'],
					"xprime"=>$dt['xprime'],
					"xflag"=>$dt['xflag'],
					"xcur"=>$dt['xcur']
		);	
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xvoucher = '". $vou."'";
			$this->db->update('glheader', $header, $where);
			$where = "bizid = ". Session::get('sbizid') ." and xvoucher = '". $vou."' and xrow=".$row;
			return ($this->db->update('gldetail', $detail, $where));	
	}
	
	public function getVoucherHeader($vou){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xvoucher = '". $vou ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("glheader", $fields, $where);
	}
	public function getSingleVoucherDt($vou, $row){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xvoucher = '". $vou ."' and xrow = ". $row;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("gldetailview", $fields, $where);
	}
	public function getAccDt($acc){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xacc = '". $acc ."'";	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("glchart", $fields, $where);
	}
	
	public function getvoucherdt($voucher){
		$fields = array("xrow","xacc", "xaccdesc", "xaccsub","xaccsubdesc", "(select if (xprime>0,xprime,'0')) as xprimedr", "(select if (xprime<0,abs(xprime),'0')) as xprimecr");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xvoucher = '". $voucher ."'";	
		return $this->db->select("gldetailview", $fields, $where, " order by xrow");
	}
	
	public function getVoucherList($status=""){
		$swhere="";
		if($status!=""){
			$swhere=" and xstatusjv='".$status."'";
		}
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xvoucher","xnarration","xdoctype","xdocnum");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and xdoctype='Receipt Voucher' and bizid = ". Session::get('sbizid') .$swhere ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("glheader", $fields, $where);
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}

	public function confirm($postdata,$where){
		
		$this->db->update('glheader', $postdata, $where);
			
	}
	
	
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	public function getAccDtJson($where){
		
		echo json_encode($this->db->select("glchart",array(),$where));
	}
	public function getSubAccDt($where){
		
		echo json_encode($this->db->select("glchartsub",array(),$where));
	}
	public function getApproval($module){
		$fields = array("xmodule","xlevel","xstatus");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "zactive='1' and xmodule = '". $module ."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("paapproval", $fields, $where, " order by xlevel limit 1");
	}
	
	public function getMails($module, $status){
		$fields = array("xuser","(SELECT zaltemail from pausers where pausers.zemail=paapproval.xuser) as zaltemail");
		$where = "zactive='1' and xmodule = '". $module ."' and xstatus='".$status."' and bizid = ". Session::get('sbizid') ;
		return $this->db->select("paapproval", $fields, $where);
	}
	
}