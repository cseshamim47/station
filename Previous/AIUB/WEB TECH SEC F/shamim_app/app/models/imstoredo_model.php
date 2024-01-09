<?php 

class Imstoredo_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data, $dtcols, $dtdata){
		//print_r($data); die;	
		$mstdata = array(
			"bizid"=>$data['bizid'],
			"xreqdelnum"=>$data['xreqdelnum'],
			"ximreqnum"=>$data['ximreqnum'],
			// "xwh"=>$data['xwh'],
			// "xbranch"=>$data['xwh'],
			 "xproj"=>$data['xproj'],
			"xstatus"=>"Created",
			"xdate" => $data['xdate'],
			"zemail"=>$data['zemail'],
			"xfinyear"=>$data['xfinyear'],
			"xfinper"=>$data['xfinper']
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and xreqdelnum ='" . $data['xreqdelnum'] . "'";
		
		$results = $this->db->insertMasterDetail('imstoredelmst',$mstdata,"imstoredeldet",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	
	public function savedelivery($data, $dtcols, $dtdata){
		//print_r($data); die;	
		$mstdata = array(
			"bizid"=>$data['bizid'],
			"xreqdelnum"=>$data['xreqdelnum'],
			"ximreqnum"=>$data['ximreqnum'],
			// "xwh"=>$data['xwh'],
			// "xbranch"=>$data['xbranch'],
			"xproj"=>$data['xproj'],
			"xstatus"=>$data['xstatus'],
			"xdate" => $data['xdate'],
			"zemail"=>$data['zemail'],
			"xfinyear"=>$data['xfinyear'],
			"xfinper"=>$data['xfinper']
			);
			//print_r($mstdata); die;
		$checkval = " bizid = " . $data['bizid'] . " and xreqdelnum ='" . $data['xreqdelnum'] . "'";
		
		$results = $this->db->insertMasterDetail('imstoredelmst',$mstdata,"imstoredeldet",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	public function edit($data,$dt,$donum,$row, $xitem){
		$header = array(
			"xemail"=>Session::get('suser'),
			"zutime"=>date("Y-m-d H:i:s"),
			"xdate"=>$data['xdate'],
			"xwh"=>$data['xwh'],
			"xbranch"=>$data['xwh'],
			"xproj"=>$data['xproj'],
			"xfinyear"=>$data['xfinyear'],
			"xfinper"=>$data['xfinper']
			);
		$detail = array(
					"xitemcode"=>$dt['xitemcode'],
					"xqty"=>$dt['xqty'],
					"xwh"=>$dt['xwh'],
					"xbranch"=>$dt['xwh'],
					//"xproj"=>$dt['xproj'],
					"xdate"=>$dt['xdate'],
					"xunit"=>$dt['xunit'],
					"xstdcost"=>$dt['xstdcost'],
					"xtypestk"=>$dt['xtypestk']
		);	
		//print_r($header); print_r($detail);die;
			$where = " bizid = ". Session::get('sbizid') ." and xreqdelnum = '". $donum."'";
			$this->db->update('imstoredelmst', $header, $where);
			$wheredt = " bizid = ". Session::get('sbizid') ." and xreqdelnum = '". $donum."' and xitemcode='".$xitem."' and xrow=".$row;
			return ($this->db->update('imstoredeldet', $detail, $wheredt));	
	}

	public function confirmgl($data, $dtcols, $dtdata){
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
			"zemail"=>$data['zemail']
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and xvoucher ='" . $data['xvoucher'] ."'";
		$results = $this->db->insertMasterDetail('glheader',$mstdata,"gldetail",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	public function creategrnall($mstfields, $mstdata,$intocols, $frmcols, $checkval, $where){
		$result = $this->db->insertAsFromTable("pogrnmst", $mstfields, $mstdata, "pogrndet",$intocols, $frmcols,"vpogrndet",$checkval, $where);
		return $result;
	}
	public function getReqheader($txnnum){
		$fields = array("*");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and ximreqnum = '". $txnnum ."' LIMIT 1" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("imstorereq", $fields, $where);
	}
	public function getDelivery($txnnum){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xreqdelnum = '". $txnnum ."' LIMIT 1" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("imstoredelmst", $fields, $where);
	}
	
	public function getSingleDeliveryDt($txnnum, $row){
		$fields = array("*",
		"(select xdesc from seitem where imstoredeldet.bizid=seitem.bizid and imstoredeldet.xitemcode=seitem.xitemcode) as xdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xreqdelnum = '". $txnnum ."' and xrow = ". $row;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("imstoredeldet", $fields, $where);
	}
	
	public function getSingleQty($req, $row){
		$fields = array("xitemcode","xitemdesc","(xqty-xdoqty) as xbal","xrow","xwh");
		
		$where = " bizid = ". Session::get('sbizid') ." and ximreqnum='".$req."' and xrow='".$row."'";
		
		echo json_encode($this->db->select("vimstorereqdet", $fields, $where));
	}
	
	public function getSingleReq($itm){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xitemcode = '". $item ."'";	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vgrndet", $fields, $where);
		
	}
	public function getdeliverydt($txnnum){
		$fields = array("xrow","xitemcode","xitemdesc","xqty","xunit");
		$where = " bizid = ". Session::get('sbizid') ." and xreqdelnum = '". $txnnum ."'";
		return $this->db->select("vimstoredeldet", $fields, $where, " order by xrow");
	}
	public function getreqdt($txnnum){
		$fields = array("xrow","xitemcode","xitemdesc","xqty","xdoqty");
		
		$where = " bizid = ". Session::get('sbizid') ." and ximreqnum='".$txnnum."'";
		
		return $this->db->select("vimstorereqdet", $fields, $where, " order by xrow");
	}
	public function getRequisition($sonum){
		$fields = array();
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ." and ximreqnum = '". $sonum ."'" ;	
		//print_r($this->db->select("somst", $fields, $where));die;
		return $this->db->select("imstorereq", $fields, $where);
	}
	public function getRequisitiondt($sonum){
		$fields = array("ximreqnum","xitemcode","(xqty-xdoqty) as xqty","xwh","xproject","xunitstk","zemail","xrow","xtypestk");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and ximreqnum = '". $sonum ."'";	
		return $this->db->select("vimstorereqdet", $fields, $where, " order by xrow");
	}
	public function getvdodt($txnnum){
		$fields = array("*");
		
		$where = " bizid = ". Session::get('sbizid') ." and xreqdelnum = '". $txnnum ."'";
		
		return $this->db->select("vimstoredeldet", $fields, $where, " order by xrow");
	}
	public function getDeliveryList($status){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xreqdelnum","ximreqnum");
		
		$where = " xstatus='".$status."' and bizid = ". Session::get('sbizid') ;
		
		return $this->db->select("imstoredelmst", $fields, $where);
	}
	public function checkMilestone($xponum){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xponum='".$xponum."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vstoredomilestone", $fields, $where);
	}
	public function getReqList($type){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","ximreqnum","zemail","(select xdeliveryto from imstorereq where imstorereq.ximreqnum = vstoredomilestone.ximreqnum) as xdeliveryto");
		//print_r($this->db->select("pabuziness", $fields));die;
		
		$where = " xmilestone='Milestone Not Completed' and xtype='".$type."' and bizid = ". Session::get('sbizid');
		
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vstoredomilestone", $fields, $where);
	}
	public function getItem($item){
		
		return $this->db->getItemMaster("xitemcode",$item); 
		
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
	
	public function confirm($where){
		//echo $where;die;
		$postdata=array(
			"xstatus" => "Confirmed"			
			);
		
		$this->db->update('imstoredelmst', $postdata, $where);
	}

	public function cancel($where){
		//echo $where;die;
		$postdata=array(
			"xstatus" => "Canceled"			
			);
		
		$this->db->update('imstoredelmst', $postdata, $where);
	}

	public function recdelete($where){
		$this->db->dbdelete('imstoredeldet', $where);
	}

	public function getAcc($acc){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xacc = '". $acc ."'";	
		return $this->db->select("glchart", $fields, $where);
	}
	
	public function getItemcost($item){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xitemcode = '". $item ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vitemcost", $fields, $where);
	}
	
		public function getItemStock($xitemcode, $xwh){
			return $this->db->getIMBalance($xitemcode, $xwh);
		}
}