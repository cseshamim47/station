<?php 

class Progress_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data, $dtcols, $dtdata){
		//print_r($data); die;	
		$mstdata = array(
			"bizid"=>$data['bizid'],
			"xpronum"=>$data['xpronum'],
			"xquotnum"=>$data['xquotnum'],
			"xlead"=>$data['xlead'],
			"zemail"=>$data['zemail'],
			"xemail"=>$data['zemail'],
			"xdate" => $data['xdate']
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and xpronum ='" . $data['xpronum'] . "'";
		
		$results = $this->db->insertMasterDetail('crmworkprogressmst',$mstdata,"crmworkprogress",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	
	
	public function edit($data,$dt,$ponum,$row){
		$header = array(
			"xemail"=>Session::get('suser'),
			"zutime"=>date("Y-m-d H:i:s")
			);
		$detail = array(
			"xprogresspct"=>$dt['xprogresspct'],
			"xremarks"=>$dt['xremarks'],
			"xfeedback"=>$dt['xfeedback']
		);	
		//print_r($header); print_r($detail);die;
			$where = "xstatus ='Created' and bizid = ". Session::get('sbizid') ." and xpronum = '". $ponum."'";
			$this->db->update('crmworkprogressmst', $header, $where);
			$where = "bizid = ". Session::get('sbizid') ." and xpronum = '". $ponum."' and xrow=".$row;
			return ($this->db->update('crmworkprogress', $detail, $where));	
	}

	public function updateFlag($pronum){
		$fields = array(
			"xstatus"=>"Completed"
		);
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xpronum = '".$pronum."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->update('crmworkprogressmst', $fields, $where);
	}

	public function getTotalPct($qutnum, $type, $pronum){
		$fields = array("COALESCE(sum(xprogresspct),0) as xtot");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xprogresstype = '". $type."' and xquotnum ='".$qutnum."' and xpronum = '".$pronum."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("crmworkprogress", $fields, $where);
	}
	
	public function getprogress($txnnum){
		$fields = array("*");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xpronum = '". $txnnum ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("crmworkprogressmst", $fields, $where);
	}
	public function getSingleprogressDt($txnnum, $row){
		$fields = array("*");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xpronum = '". $txnnum ."' and xrow = ". $row;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("crmworkprogress", $fields, $where);
	}
	
	public function getvpodt($txnnum){
		$fields = array("xpronum","xrow","xprogresstype","xprogresspct","xquotnum","xlead","xfeedback","xremarks");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xpronum = '". $txnnum ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("crmworkprogress", $fields, $where, " order by xrow");
	}

	public function getDetails($intsl){
		$fields = array("xcus");
		$where = "bizid =".Session::get('sbizid')." and xsonum = '".$intsl."' and xstatus= 'Confirmed'";
		echo json_encode($this->db->select('somst', $fields, $where));
	}


	
	public function getpurchasedt($txnnum){
		$fields = array("xrow",
		"xitemcode","(select xdesc from seitem where podet.bizid=seitem.bizid and podet.xitemcode=seitem.xitemcode) as xdesc",	
		"xqty","xratepur","xqty*xratepur as xtotal" );
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xponum = '". $txnnum ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("podet", $fields, $where, " order by xrow");
	}
	public function getItem($item){
		
		return $this->db->getItemMaster("xitemcode",$item); 
		
	}
	public function getprogressList($status){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xpronum","xquotnum","xlead");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xstatus='".$status."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("crmworkprogressmst", $fields, $where);
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
		
		$this->db->update('pomst', $postdata, $where);
	}

	public function getOppertunity(){
		$fields = array("xsonum as xquotnum","xcus as xlead", "xdate");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xstatus= 'Confirmed'";	
		return $this->db->select("somst", $fields, $where);
	}
	public function cancel($where){
		//echo $where;die;
		$postdata=array(
			"xstatus" => "Canceled"			
			);
		
		$this->db->update('pomst', $postdata, $where);
	}
	public function recdelete($where){
		$this->db->dbdelete('crmworkprogress', $where);
	}
}