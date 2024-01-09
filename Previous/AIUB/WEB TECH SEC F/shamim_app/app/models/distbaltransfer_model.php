<?php 

class Distbaltransfer_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function createttn($data){
		//print_r($data); die;	
		$results = $this->db->insert('osptxn', array(
			"bizid"=>$data['bizid'],
			"xrdin"=>$data['zemail'], //from transfer 
			"xemail"=>$data['xrdin'], //to transfer
			"xdate"=>$data['xdate'],
			"xamount"=>$data['xamount'],
			"xyear"=>$data['xyear'],
			"xper"=>$data['xper'],
			"zemail"=>$data['zemail'],
			"xtxntype"=>"Transfer Charge",
			"xstatus"=>"Un-Confirmed",
			"xsign"=>"-1",
			"stno"=>$data['stno'],
			"xdocno"=>$data['xdocno'],
			"xdoctype"=>"Balance Transfer"
			));
		
		return $results;	
	}
	
	public function checkDownLine($bin, $upbin){
		$fields = array("upbin");
		$where = " bizid = ". Session::get('sbizid') ." and bin = ". $bin ." and upbin = ".$upbin ;	
		if(count($this->db->select("mlmtreegen", $fields, $where))>0)
			return true;
		else
			return false;
		
	}
	
	public function confirmtxn($cols,$vals){
		//print_r($data); die;	
		$results = $this->db->inserttemp("osptxn", $cols, $vals);		
		return $results;	
	}
	
	
	public function getmobileno(){
		$fields=array();
		$where = " bizid = ". Session::get('sbizid')." and xrdin='". Session::get('suser') ."'";
		return $this->db->select("mlminfo", $fields, $where);	
	}
	public function getSinglettn($ttnnum){
		$fields = array("xsl","xrdin","xdate","xemail");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xdocno = '". $txnnum."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("osptxn", $fields, $where);
	}
	public function getTransferList($txn=""){
		$fields = array("xsl","xdate","xemail","(select xorg from mlminfo where mlminfo.xrdin=osptxn.xemail) as rinname","xamount");
		//print_r($this->db->select("pabuziness", $fields));die;
		if($txn!="")
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xtxntype = 'Balance Transfer' and zemail='".Session::get('suser')."' and xsl=".$txn."" ;
		else	
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xtxntype = 'Balance Transfer' and zemail='".Session::get('suser')."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("osptxn", $fields, $where);
	}
	public function getAddedList($txn=""){
		$fields = array("xsl","xdate","xemail","(select xorg from mlminfo where mlminfo.xrdin=osptxn.xemail) as rinname","xamount");
		//print_r($this->db->select("pabuziness", $fields));die;
		
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xtxntype = 'Balance Transfer' and zemail='".Session::get('suser')."' and xsl=".$txn."" ;
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("osptxn", $fields, $where);
	}
	public function getSingleBal($txnnum){
		$fields = array("xsl","xrdin","xdate","0 as xamount","(select xorg from mlminfo where mlminfo.xrdin=osptxn.xrdin) as rinname","'' as xdocno");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xsl = '". $txnnum."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("osptxn", $fields, $where);
	}
	
	public function getrindt($rin){
		
		$fields = array("xrdin","bin");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xrdin='".$rin."' and bc='1'";	
		
		return $this->db->select("vmlminfotreedt", $fields, $where);
	}
	
	
	public function getttndt($ttnno){
		$fields = array("xsl", "xemail","xrdin");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and zemail='". Session::get('suser') ."' and xstatus='Un-Confirmed' and xtxntype='Transfer Charge' and xdocno=".$ttnno;	
		return $this->db->select("osptxn", $fields, $where);
	}
	
	public function getUnConList($limit=""){
		$fields = array("xsl", "xemail", "xdate");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and zemail='". Session::get('suser') ."' and xstatus='Un-Confirmed' and xtxntype='Transfer Charge'";	
		return $this->db->select("osptxn", $fields, $where, " order by xsl desc", $limit);
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	
	public function getRINNo($table,$keyfield,$bin){
		
		return $this->db->getRINNo($table,$keyfield,$bin);
	}
	
	public function delete($where){
			//echo $where;die;
		$postdata=array(
			"xrecflag" => "Deleted",
			"xemail" => Session::get('suser'),
			"zutime" => date("Y-m-d H:i:s")
			);
		
		$this->db->update('mlminfo', $postdata, $where);
			
	}
	
	public function getRin($rin){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xrdin = '". $rin ."'";	
		return $this->db->select("mlminfo", $fields, $where);
	}
	
	public function getInfoRinDetail($rin){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xrdin = '". $rin ."'";	
		echo json_encode($this->db->select("mlminfo", $fields, $where));
	}
	
	public function getVoucherDetail($vou){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xaccsource='Customer' and xdoctype='Trade Receipt' and xvoucher = '". $vou ."'";	
		echo json_encode($this->db->select("gldetailview", $fields, $where));
	}
	public function getStatementNo(){
		
		return $this->db->getStatementNo();
	}
	public function updatestatus($where){
			//echo $where;die;
		$postdata=array(
			"xstatus" => "Confirmed"
			);
		
		$this->db->update('osptxn', $postdata, $where);
			
	}
	
	public function getBalance(){
		$xrdin = Session::get('suser');
	
		return $this->db->checkOSPBalance($xrdin);
	}
}