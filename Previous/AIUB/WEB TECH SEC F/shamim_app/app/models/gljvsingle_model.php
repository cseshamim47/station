<?php 

class Gljvsingle_Model extends Model{
	
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
			"xstatusjv"=>"Created",
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
	public function getGlchartByLimit($limit=""){
		$fields = array("xacc as xacccr", "xdesc", "xacctype","xaccusage", "xaccsource");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("glchart", $fields, $where, " order by xacc desc", $limit);
	}
	public function getvoucherdt($voucher){
		$fields = array("xrow","xacc", "xaccdesc", "xaccsub","xaccsubdesc", "(select if (xprime>0,xprime,'0')) as xprimedr", "(select if (xprime<0,abs(xprime),'0')) as xprimecr");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xvoucher = '". $voucher ."'";	
		return $this->db->select("gldetailview", $fields, $where, " order by xrow");
	}
	
	public function getVoucherList(){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xvoucher","xnarration","xdoctype","xdocnum");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and xdoctype='GL Single Entry' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("glheader", $fields, $where);
	}
	
	public function getSupplier($sup){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xsup = '". $sup ."'";	
		return $this->db->select("sesup", $fields, $where);
	}
	public function getCustomer($cus){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xcus = '". $cus ."'";	
		return $this->db->select("secus", $fields, $where);
	}
	public function getcrSupplier($sup){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xsup = '". $sup ."'";	
		return $this->db->select("sesup", $fields, $where);
	}
	public function getcrCustomer($cus){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xcus = '". $cus ."'";	
		return $this->db->select("secus", $fields, $where);
	}
	public function getSubacc($sub){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xaccsub = '". $sub ."'";	
		return $this->db->select("glchartsub", $fields, $where);
	}
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	
	
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	
}