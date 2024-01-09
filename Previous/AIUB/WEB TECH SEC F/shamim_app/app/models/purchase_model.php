<?php 

class Purchase_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data, $dtcols, $dtdata){
		//print_r($data); die;	
		$mstdata = array(
			"bizid"=>$data['bizid'],
			"xponum"=>$data['xponum'],
			"xwh"=>$data['xwh'],
			"xbranch"=>$data['xwh'],
			"xproj"=>$data['xproj'],
			"xstatus"=>"Created",
			"xdate" => $data['xdate'],
			"zemail"=>$data['zemail'],
			"xsup"=>$data['xsup'],
			"xsupdoc"=>$data['xsupdoc'],
			"ximreqnum"=>$data['ximreqnum'],
			"xnote"=>$data['xnote'],
			"xtype"=>$data['xgitem'],
			"xfinyear"=>$data['xfinyear'],
			"xfinper"=>$data['xfinper']
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and xponum ='" . $data['xponum'] . "'";
		
		$results = $this->db->insertMasterDetail('pomst',$mstdata,"podet",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	
	
	public function edit($data,$dt,$ponum,$row){
		$header = array(
			"xemail"=>Session::get('suser'),
			"zutime"=>date("Y-m-d H:i:s"),
			"xdate"=>$data['xdate'],
			"xsup"=>$data['xsup'],
			"xwh"=>$data['xwh'],
			"xbranch"=>$data['xwh'],
			"xnote"=>$data['xnote'],
			"xproj"=>$data['xproj'],
			"xtype"=>$data['xgitem'],
			"xsupdoc"=>$data['xsupdoc'],
			"ximreqnum"=>$data['ximreqnum'],
			"xfinyear"=>$data['xfinyear'],
			"xfinper"=>$data['xfinper']
			);
		$detail = array(
					"xitemcode"=>$dt['xitemcode'],
					"xqty"=>$dt['xqty'],
					"xratepur"=>$dt['xratepur'],
					"xwh"=>$dt['xwh'],
					"xbranch"=>$dt['xwh'],
					"xproj"=>$dt['xproj'],
					"xdate"=>$dt['xdate'],
					"xunitpur"=>$dt['xunitpur'],
					"xconversion"=>$dt['xconversion'],
					"xunitstk"=>$dt['xunitstk'],
					"xtypestk"=>$dt['xtypestk'],
					"xpur"=> $dt['xpur']
		);	
		//print_r($header); print_r($detail);die;
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xponum = '". $ponum."'";
			$this->db->update('pomst', $header, $where);
			$where = "bizid = ". Session::get('sbizid') ." and xponum = '". $ponum."' and xrow=".$row;
			return ($this->db->update('podet', $detail, $where));	
	}
	
	public function getPurchase($txnnum){
		$fields = array("*","(select xorg from sesup where sesup.bizid=pomst.bizid and sesup.xsup=pomst.xsup) as xsupname");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xponum = '". $txnnum ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("pomst", $fields, $where);
	}
	public function getSinglePurchaseDt($txnnum, $row){
		$fields = array("*",
		"(select xdesc from seitem where podet.bizid=seitem.bizid and podet.xitemcode=seitem.xitemcode) as xdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xponum = '". $txnnum ."' and xrow = ". $row;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("podet", $fields, $where);
	}
	
	public function getvpodt($txnnum){
		$fields = array("xponum","xdate","xorg","xsupadd","xsupphone","xsupdoc","xnote","xrow",
		"xitemcode","xitemdesc","xtotaltax","xtotaldisc","xstatus",	
		"xqty","xratepur","xunitpur","xtotal+xtotaltax-xtotaldisc as xtotal","(select xmrp from seitem where seitem.xitemcode = vpodet.xitemcode) as xmrp","xsup","xproj");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xponum = '". $txnnum ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("vpodet", $fields, $where, " order by xrow");
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
	public function getPurchaseList($status){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xponum","xsup","(select xorg from sesup where sesup.bizid=pomst.bizid and sesup.xsup=pomst.xsup) as xsupname","xsupdoc","xwh","xproj","(SELECT xpur FROM podet WHERE pomst.xponum=podet.xponum LIMIT 1) as xpur");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and xstatus='".$status."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("pomst", $fields, $where);
	}
	public function getRequisionList($status,$type){
		$fields = array("distinct ximreqnum","date_format(xdate, '%d-%m-%Y') as xdate","(SELECT xproject FROM imreq WHERE vreqmilestone.ximreqnum=imreq.ximreqnum LIMIT 1) as xproject","(SELECT xwh FROM imreq WHERE vreqmilestone.ximreqnum=imreq.ximreqnum LIMIT 1) as xwh","(SELECT xpur FROM imreqdet WHERE vreqmilestone.ximreqnum=imreqdet.ximreqnum LIMIT 1) as xpur","zemail");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xmilestone='Milestone Not Completed' and xtype='".$type."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vreqmilestone", $fields, $where);
	}
	public function getReqItemList($reqnum){
		$fields = array("xrow","xitemcode","xitemdesc","xqty","xpoqty","xrate");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xstatus='Confirmed' and ximreqnum='".$reqnum."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vimreqdet", $fields, $where);
	}
	public function getSingleReq($reqnum, $row){
		$fields = array("xrow","xitemcode","xitemdesc","xpur","(xqty-xpoqty) as xqty","xrate");
		
		$where = "xrecflag='Live' and ximreqnum='".$reqnum."' and bizid = ". Session::get('sbizid') ." and xrow='".$row."'";	
		
		echo json_encode($this->db->select("vimreqdet", $fields, $where));
	}

	public function getImreq($reqnum){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xstatus='Confirmed' and ximreqnum='".$reqnum."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("imreq", $fields, $where);
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
	public function cancel($where){
		//echo $where;die;
		$postdata=array(
			"xstatus" => "Canceled"			
			);
		
		$this->db->update('pomst', $postdata, $where);
	}
	public function recdelete($where){
		$this->db->dbdelete('podet', $where);
	}

	public function getSupplier($sup){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xsup = '". $sup ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("sesup", $fields, $where);
	}
	public function checkMilestone($xponum){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " ximreqnum='".$xponum."' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("vreqmilestone", $fields, $where);
	}
}