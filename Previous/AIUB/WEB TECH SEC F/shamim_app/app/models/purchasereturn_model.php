<?php 

class Purchasereturn_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data, $dtcols, $dtdata){
		//print_r($data); die;	
		$mstdata = array(
			"bizid"=>$data['bizid'],
			"xporeturnnum"=>$data['xporeturnnum'],
			"xgrnnum"=>$data['xgrnnum'],
			"xwh"=>$data['xwh'],
			"xbranch"=>$data['xwh'],
			"xproj"=>$data['xwh'],
			"xstatus"=>"Created",
			"xdate" => $data['xdate'],
			"zemail"=>$data['zemail'],
			"xsup"=>$data['xsup'],
			"xfinyear"=>$data['xfinyear'],
			"xfinper"=>$data['xfinper']
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and xporeturnnum ='" . $data['xporeturnnum'] . "'";
		
		$results = $this->db->insertMasterDetail('poreturn',$mstdata,"poreturndet",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	
	
	public function edit($data,$dt,$grnnum,$row){
		$header = array(
			"xemail"=>Session::get('suser'),
			"zutime"=>date("Y-m-d H:i:s"),
			"xdate"=>$data['xdate'],
			"xsup"=>$data['xsup'],
			"xwh"=>$data['xwh'],
			"xbranch"=>$data['xwh'],
			"xproj"=>$data['xproj'],
			"xfinyear"=>$data['xfinyear'],
			"xfinper"=>$data['xfinper']
			);
		$detail = array(
					"xitemcode"=>$dt['xitemcode'],
					"xqtypur"=>$dt['xqty'],
					"xextqty"=>$dt['xextqty'],
					"xratepur"=>$dt['xratepur'],
					"xunitstk"=>$dt['xunitstk'],
					"xtypestk"=>$dt['xtypestk'],
					"xwh"=>$dt['xwh'],
					"xbranch"=>$dt['xwh'],
					"xproj"=>$dt['xproj'],
					"xdate"=>$dt['xdate']
		);	
		//print_r($header); die;// print_r($detail);die;
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xgrnnum = '". $grnnum."'";
			$this->db->update('pogrnmst', $header, $where);
			$where = "bizid = ". Session::get('sbizid') ." and xgrnnum = '". $grnnum."' and xrow=".$row;
			return ($this->db->update('pogrndet', $detail, $where));	
	}
	
	public function confirmgl($data, $dtcols, $dtdata){
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
			"zemail"=>$data['zemail']
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and xvoucher ='" . $data['xvoucher'] ."'";
		$results = $this->db->insertMasterDetail('glheader',$mstdata,"gldetail",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	
	public function getreturnForConfirm($txnnum){
		$fields = array("xrow","xsup",
		"xitemcode","xitemdesc",	
		"xqty","xratepur","xqty*xratepur as ta","xqty*(xtaxrate*xratepur/100) as tt","xqty*xdisc as id" );
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xporeturnnum = '". $txnnum ."'";	
		return $this->db->select("vporeturndet", $fields, $where, " order by xrow");
	}

	public function glinterface(){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xtypeinterface = 'PO Return Interface'";	
		return $this->db->select("glinterface", $fields, $where);
	}
	public function getAcc($acc){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xacc = '". $acc ."'";	
		return $this->db->select("glchart", $fields, $where);
	}
	public function getGrn($txnnum){
		$fields = array("*,(select xorg from sesup where sesup.bizid=pogrnmst.bizid and sesup.xsup=pogrnmst.xsup) as xorg");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xstatus='Confirmed' and bizid = ". Session::get('sbizid') ." and xgrnnum = '". $txnnum ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("pogrnmst", $fields, $where);
	}
	public function getReturn($txnnum){
		$fields = array("*","(select xorg from sesup where sesup.bizid=poreturn.bizid and sesup.xsup=poreturn.xsup) as xorg");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xporeturnnum = '". $txnnum ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("poreturn", $fields, $where);
	}
	public function getPoWiseGRN($txnnum){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xstatus='Confirmed' and bizid = ". Session::get('sbizid') ." and xponum = '". $txnnum ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vpogrndet", $fields, $where);
	}
	public function getSingleGrn($txnnum, $row){
		$fields = array("xgrndetsl",
		"xitemcode","xitemdesc",	
		"xqtypur","xreturnqty","xqtypur-xreturnqty as xbal","xratepur","xwh");
		
		$where = "bizid = ". Session::get('sbizid') ." and xgrnnum = '". $txnnum ."' and xgrndetsl = ". $row;	
		
		echo json_encode($this->db->select("vgrnreturndet", $fields, $where));
	}
	
	public function getSingleQty($txnnum, $row){
		$fields = array("xgrndetsl",
		"xitemcode","xitemdesc",	
		"xqtypur","xreturnqty","xqtypur-xreturnqty as xbal","xratepur","xwh");
		
		$where = "bizid = ". Session::get('sbizid') ." and xponum = '". $txnnum ."' and xrow = ". $row;	
		
		return $this->db->select("vporeturndet", $fields, $where);
	}
	
	public function getSingleReturnDt($txnnum, $row){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xporeturnnum = '". $txnnum ."' and xrow = ". $row;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vporeturndet", $fields, $where);
		
	}
	public function getgrndt($txnnum){
		$fields = array("xgrndetsl as xrow",
		"xitemcode","xitemdesc",	
		"xqtypur","xreturnqty","xratepur","xqtypur*xratepur as xtotal" );
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xstatus='Confirmed' and xgrnnum = '". $txnnum ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("vgrnreturndet", $fields, $where, " order by xrow");
	}
	
	public function getreturndt($txnnum){
		$fields = array("xrow",
		"xitemcode","(select xdesc from seitem where seitem.bizid=poreturndet.bizid and seitem.xitemcode=poreturndet.xitemcode) as xitemdesc",	
		"xqty","xratepur","xqty*xratepur as xtotal" );
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xporeturnnum = '". $txnnum ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("poreturndet", $fields, $where, " order by xrow");
	}

	public function getvreturndt($txnnum){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xporeturnnum = '". $txnnum ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("vporeturndet", $fields, $where, " order by xrow");
	}

	public function getSupplier($sup){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xsup = '". $sup ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("sesup", $fields, $where);
	}

	public function getGrnList(){
		$fields = array("distinct xgrnnum","date_format(xdate, '%d-%m-%Y') as xdate","xsup");
		
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xqtypur-xreturnqty>0 and xstatus = 'Confirmed'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("vgrnreturndet", $fields, $where, " order by xdate, xgrnnum");
	}
	
	public function getReturnList($status){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xporeturnnum","xgrnnum","xsup","(select xorg from sesup where sesup.bizid=poreturn.bizid and sesup.xsup=poreturn.xsup) as xsupname");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and xstatus='".$status."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("poreturn", $fields, $where);
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}

	public function getItemDetail($itm){
		return $this->db->getItemMaster("xitemcode",$itm);
	}
	
	public function getRow($table,$keyfield,$num, $xrow){
		
		return $this->db->rowIncrement($table,$keyfield,$num, $xrow);
	}
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}
	public function getItemStock($xitemcode, $xwh){
		return $this->db->getIMBalance($xitemcode, $xwh);
	}
	public function confirm($where){
		//echo $where;die;
		$postdata=array(
			"xstatus" => "Confirmed"			
			);
		
		$this->db->update('poreturn', $postdata, $where);
	}
	public function cancel($where){
		//echo $where;die;
		$postdata=array(
			"xstatus" => "Canceled"			
			);
		
		$this->db->update('poreturn', $postdata, $where);
	}
	public function recdelete($where){
		$this->db->dbdelete('poreturndet', $where);
	}
}