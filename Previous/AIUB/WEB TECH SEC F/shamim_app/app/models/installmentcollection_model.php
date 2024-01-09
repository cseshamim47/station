<?php  

class Installmentcollection_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
		
		$inscoll = array(
				"xdate"=> $data['xdate'],				
				"xcus" => $data['xcus'],
				"xagent" => $data['xagent'],
				"xcomamt" => $data['xcomamt'],
				"xinsnum" => $data['xinsnum'],
				"xinssl" => $data['xinssl'],
				"xamount"=>$data['xamount'],				
				"bizid"=>$data['bizid'],
				"xinsdate"=>$data['xinsdate'],
				"xrow"=>$data['xrow'],
				"zemail"=>$data['zemail'],
				"xbranch"=>$data['xbranch'],				 
				"xstatus"=>'Created',				 
				"xper"=>$data['xper'],
				"xyear"=>$data['xyear']
			);

		
		$results = $this->db->insert('installmentcoll', $inscoll);
		
		return $results;	
	}

	public function createCash($data, $dtcols, $dtdata){
		
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
			"zemail"=>$data['zemail']
			);
		
		$checkval = " bizid = " . $data['bizid'] . " and xvoucher ='" . $data['xvoucher'] ."'";
		$results = $this->db->insertMasterDetail('glheader',$mstdata,"gldetail",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}

	public function createBank($data){
		
		$value = array(
				"bizid"=> $data['bizid'],				
				"zemail" => $data['zemail'],
				"xdate" => $data['xdate'],
				"xchequedate" => $data['xchequedate'],
				"xbranch"=>$data['xbranch'],				
				"xstatus"=>'Created',
				"xnarration"=>$data['xnarration'],

				"xacccr"=>$data['xacc'],
				"xacccrdesc"=>$data['xaccdesc'],
				"xacccrtype"=>$data['xacctype'],
				"xacccrusage"=>$data['xaccusage'],
				"xacccrsource"=>$data['xaccsource'],

				"xacc"=>$data['xacccr'],		 
				"xaccdesc"=>$data['xacccrdesc'],
				"xacctype"=>$data['xacccrtype'],
				"xaccusage"=>$data['xacccrusage'],
				"xaccsource"=>$data['xacccrsource'],

				"xaccsubcr"=>$data['xcus'],
				"xaccsubdesccr"=>$data['xorg'],
				"xchequeno"=>$data['xchequeno'],
				"xprime"=>$data['xprime'],
				"xcolsl"=>$data['xcolsl'],
				"xoptype"=>'Receive',
				"xcur"=>'BDT'
			);

		
		$results = $this->db->insert('glchequereg', $value);
		
		return $results;	
	}
	
	public function editEnroll($data, $enid){
		
		$results = array(
			"xstudentid"=>$data['xstudentid'],
			"xdate"=>$data['xdate'],
			"xclass"=>$data['xclass'],
			"xsection"=>$data['xsection'],
			"xshift"=>$data['xshift'],
			"xroll" => $data['xroll'],
			"xversion" => $data['xversion'],
			"xtxndate" => $data['xtxndate'],
			"xfeesplan" => "1",
			"xyear" => $data['xyear']
			);
			
			$where = " bizid = ". Session::get('sbizid') ." and xbranch = '". Session::get('sbranch') ."' and xenrollsl = '". $enid."'";
			return $this->db->update('edstuenroll', $results, $where);
	}

	public function getfeesdt($enid){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xinsnum","xinssl","xcus","xagent","xagentcom","xamount");
		
		$where = " bizid = ". Session::get('sbizid') ." and xcus='".$enid."' and xamount>0";
		//print_r($where);die;
		return $this->db->select("vinscollsummary", $fields, $where);
	}

	public function glsalesinterface(){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xtypeinterface = 'Installment Interface'";	
		return $this->db->select("glinterface", $fields, $where);
	}

	public function getInsColldt($colsl){
		$fields = array("xamount as ta","xamount");
		
		$where = " bizid = ". Session::get('sbizid') ." and xcollectionno = '".$colsl."'";
		//print_r($where);die;
		return $this->db->select("installmentcoll", $fields, $where);
	}

	public function getInsColldtall($colsl){
		$fields = array();
		
		$where = " bizid = ". Session::get('sbizid') ." and xcollectionno = '".$colsl."'";
		//print_r($where);die;
		return $this->db->select("installmentcoll", $fields, $where);
	}

	public function getColsl(){
		$fields = array("xcollectionno");
		
		$where = " bizid = ". Session::get('sbizid') ."";
		//print_r($where);die;
		return $this->db->select("installmentcoll", $fields, $where,"order by xcollectionno desc limit 1");
	}
	
	public function getSingleEnroll($enid){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xcus = '". $enid."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("secus", $fields, $where);
	}
	
	
	
	public function getsinglefees($cus, $year, $xdate){
		$fields = array("xcus","xamount","xinsnum","xinssl");		
		$where = " bizid = '". Session::get('sbizid') ."' and xcus='".$cus."' and xyear='".$year."' and xdate='".$xdate."'";
		return $this->db->select("vinscollsummary", $fields, $where);
	}
	
	public function getEnrollByLimitPick($limit=""){
		$fields = array("xstudentid","xstuname","xroll", "xclass","xsection", "xshift", "xversion");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and xyear=(select xcode from secodes where xcodetype='Academic Year' order by xcode desc limit 1) and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("vstuenrolldt", $fields, $where, " order by xenrollsl desc", $limit);
	}
	public function getYear(){
		$fields = array("xcode");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xcodetype = 'Academic Year' order by xcode desc LIMIT 1";	
		return $this->db->select("secodes", $fields, $where)[0]["xcode"];
	}
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	public function getheadcollection($cus, $xdate){
		$fields = array("xcus");
		$where = " bizid = ". Session::get('sbizid') ." and xcus='".$cus."' and xdate='".$xdate."'";
		echo json_encode($this->db->select("installmentmst", $fields, $where));
	}
	
	// public function getsingleDue($enid, $year, $per){
	// 	$fields = array("xbalance");		
	// 	$where = " bizid = ". Session::get('sbizid') ." and xyear=(select xcode from secodes where xcodetype='Academic Year' limit 1) and xbranch = '". Session::get('sbranch') ."' and xstudentid='".$enid."' and xper=".$per;	
	// 	echo json_encode($this->db->select("vfeessumary", $fields, $where));
	// }

	public function getAccDt($acc){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xacc = '". $acc ."'";	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("glchart", $fields, $where);
	}

	public function getCustomer($cus){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xcus = '". $cus ."'";	
		return $this->db->select("secus", $fields, $where);
	}

	public function delete($where){
			//echo $where;die;
		$postdata=array(
			"xrecflag" => "Deleted",
			"xemail" => Session::get('suser'),
			"zutime" => date("Y-m-d H:i:s")
			);
		
		$this->db->update('edstuenroll', $postdata, $where);
			
	}

	public function getInsList($status){
		
		$fields = array("xcollectionno","date_format(xdate, '%d-%m-%Y') as xdate","xinsnum","xcus","xamount");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xstatus='".$status."' and xbranch = '". Session::get('sbranch') ."' and bizid = ". Session::get('sbizid');	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("installmentcoll", $fields, $where);
	}

	public function colupdate($postdata, $where){
		$this->db->update('installmentcoll', $postdata, $where);
	}

	public function getSingleCustomer($insnum, $inssl){
		$fields = array("xagent","xagentcom");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xinsnum = '". $insnum."' and xinssl= '".$inssl."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vinscollsummary", $fields, $where);
	}
	
}