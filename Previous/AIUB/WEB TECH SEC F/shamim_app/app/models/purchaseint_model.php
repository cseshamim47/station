<?php 

class Purchaseint_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data, $dtcols, $dtdata){
		//print_r($data); die;	
		$mstdata = array(
			"bizid"=>$data['bizid'],
			"xponum"=>$data['xponum'],
			"xwh"=>$data['xwh'],
			"xbranch"=>$data['xbranch'],
			"xproj"=>$data['xbranch'],
			"xstatus"=>"Created",
			"xdate" => $data['xdate'],
			"zemail"=>$data['zemail'],
			"xsup"=>$data['xsup'],
			"xsupdoc"=>$data['xsupdoc'],
			"xnote"=>$data['xnote'],
			"xfinyear"=>$data['xfinyear'],
			"xfinper"=>$data['xfinper'],
			"xpotype"=>"International Purchase",
			"xlcno"=>$data['xlcno'],			
			"xpino"=>$data['xpino'],
			"xcur"=>$data['xcur'],
			"xexch"=>$data['xexch'],
			"xcorto"=>$data['xcorto'],
			"xcoradd"=>$data['xcoradd'],
			"xcoremail"=>$data['xcoremail'],
			"xcorphone"=>$data['xcorphone'],
			);

			if($data['xlcdate']!=""){
				$dt = str_replace('/', '-', $data['xlcdate']);
				$mstdata["xlcdate"]=date('Y-m-d', strtotime($dt));
			}
			if($data['xghodate']!=""){
				$dt = str_replace('/', '-', $data['xghodate']);
				$mstdata["xghodate"]=date('Y-m-d', strtotime($dt));
			}
			if($data['xpidate']!=""){
				$dt = str_replace('/', '-', $data['xpidate']);
				$mstdata["xpidate"]=date('Y-m-d', strtotime($dt));
			}
			if($data['xdeldate']!=""){
				$dt = str_replace('/', '-', $data['xdeldate']);
				$mstdata["xdeldate"]=date('Y-m-d', strtotime($dt));
			}
			if($data['xetd']!=""){
				$dt = str_replace('/', '-', $data['xetd']);
				$mstdata["xetd"]=date('Y-m-d', strtotime($dt));
			}
			if($data['xeta']!=""){
				$dt = str_replace('/', '-', $data['xeta']);
				$mstdata["xeta"]=date('Y-m-d', strtotime($dt));
			}

			
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
			"xsupdoc"=>$data['xsupdoc'],
			"xfinyear"=>$data['xfinyear'],
			"xfinper"=>$data['xfinper'],
			"xlcno"=>$data['xlcno'],			
			"xpino"=>$data['xpino'],
			"xcur"=>$data['xcur'],
			"xexch"=>$data['xexch'],
			"xcorto"=>$data['xcorto'],
			"xcoradd"=>$data['xcoradd'],
			"xcoremail"=>$data['xcoremail'],
			"xcorphone"=>$data['xcorphone'],
			"xshipterm"=>$data['xshipterm'],
			"xshipvia"=>$data['xshipvia'],
			);
		if($data['xlcdate']!=""){
				$det = str_replace('/', '-', $data['xlcdate']);
				$header["xlcdate"]=date('Y-m-d', strtotime($det));
			}
			if($data['xghodate']!=""){
				$det = str_replace('/', '-', $data['xghodate']);
				$header["xghodate"]=date('Y-m-d', strtotime($det));
			}
			if($data['xpidate']!=""){
				$det = str_replace('/', '-', $data['xpidate']);
				$header["xpidate"]=date('Y-m-d', strtotime($det));
			}
			if($data['xdeldate']!=""){
				$det = str_replace('/', '-', $data['xdeldate']);
				$header["xdeldate"]=date('Y-m-d', strtotime($det));
			}
			if($data['xetd']!=""){
				$det = str_replace('/', '-', $data['xetd']);
				$header["xetd"]=date('Y-m-d', strtotime($det));
			}
			if($data['xeta']!=""){
				$det = str_replace('/', '-', $data['xeta']);
				$header["xeta"]=date('Y-m-d', strtotime($det));
			}

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
					"xtypestk"=>$dt['xtypestk']
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
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xpotype='International Purchase' and xponum = '". $txnnum ."'" ;	
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
		"xqty","xratepur","xunitpur","xbasetotal-xbasetotaldisc as xtotal","xcur","xshipterm","xshipvia","xlcno","xlcdate",
  "xghodate","xdeldate","xetd","xeta","xcorto","xcoradd","xcorphone","xcoremail","xpino","xpidate",);
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xpotype='International Purchase' and xponum = '". $txnnum ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("vpodet", $fields, $where, " order by xrow");
	}


	
	public function getpurchasedt($txnnum){
		$fields = array("xrow",
		"xitemcode","(select xdesc from seitem where podet.bizid=seitem.bizid and podet.xitemcode=seitem.xitemcode) as xdesc",	
		"xqty","xratepur","xqty*xratepur as xtotal" );
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xpotype='International Purchase' and xponum = '". $txnnum ."'";
		//print_r($this->db->select("podet", $fields, $where, " order by xrow"));die;	
		return $this->db->select("podet", $fields, $where, " order by xrow");
	}
	public function getItem($item){
		
		return $this->db->getItemMaster("xitemcode",$item); 
		
	}
	public function getPurchaseList($status){
		$fields = array("date_format(xdate, '%d-%m-%Y') as xdate","xponum","xsup","(select xorg from sesup where sesup.bizid=pomst.bizid and sesup.xsup=pomst.xsup) as xsupname","xsupdoc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and xstatus='".$status."' and xpotype='International Purchase' and bizid = ". Session::get('sbizid') ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("pomst", $fields, $where);
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
}