<?php 

class Workorder_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
		
	
	public function create($data){
		$results = $this->db->insert('workorder', array(
			"bizid" => $data['bizid'],
			"xref" => $data['xref'],
			"toname" => $data['toname'],
			"toorg" => $data['toorg'],
			"tomobile" => $data['tomobile'],
			"xsubject" => $data['xsubject'],
			"toadd"=> $data['toadd'],
			"xnotes"=> $data['xnotes'],
			"xamount"=> $data['xamount'],
			"zemail"=> $data['zemail'],
			"wonum"=> $data['wonum'],
			"xdate"=> $data['xdate'],
			"xbranch"=> $data['xbranch'],
			"xstatus"=> "Created",
			"xproject"=>$data['xproject']
			));
		
		return $results;	
	}
	
	
	public function edit($data, $id){
		$results = array(
			"xref" => $data['xref'],
			"toname" => $data['toname'],
			"toorg" => $data['toorg'],
			"tomobile" => $data['tomobile'],
			"xsubject" => $data['xsubject'],
			"toadd"=> $data['toadd'],
			"xnotes"=> $data['xnotes'],
			"xamount"=> $data['xamount'],
			"xdate"=> $data['xdate'],
			"xemail"=> $data['xemail'],
			"zutime"=> $data['zutime'],
			"xproject"=>$data['xproject']
		);
			
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xstatus='Created' and wonum = '". $id."'";
			return $this->db->update('workorder', $results, $where);
	}
	
	public function confirm($ptnum){
		
		$postdata=array("xstatus" => "Confirmed");

		return $this->db->update("workorder",$postdata," wonum='".$ptnum."'");
	}

	public function cancel($ptnum){
			//echo $where;die;
		
		$postdata=array("xstatus" => "Canceled");

		return $this->db->update("workorder",$postdata," wonum='".$ptnum."'");

	}
	public function getWorkOrder($limit){
		$fields = array("wonum", "date_format(xdate, '%d-%m-%Y') as xdate", "toname","toorg","xamount");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and xstatus<>'Canceled' and bizid = ". Session::get('sbizid');	
		return $this->db->select("workorder", $fields, $where, " order by ztime desc", $limit);
	}
	public function getWorkOrderList($status){
		$fields = array("wonum", "date_format(xdate, '%d-%m-%Y') as xdate", "toname","toorg","xamount");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and xstatus='".$status."' and bizid = ". Session::get('sbizid');	
		return $this->db->select("workorder", $fields, $where, " order by ztime desc");
	}
	public function createChartSub($data){
		$results = $this->db->insert('glchartsub', array(
			"bizid"=>$data['bizid'],
			"xacc"=>$data['xacc'],
			"xaccsub"=>$data['xaccsub'],
			"xdesc"=>$data['xdesc'],
			"zemail"=>$data['zemail']
			));
		return $results;	
	}
	
	public function getImpt($ptnum){
		$fields = array("*");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and wonum = '". $ptnum ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("workorder", $fields, $where);
	}
	public function printchalan($ptnum){
		$fields = array("*",
		"(select xdesc from seitem where imtransferdet.bizid=seitem.bizid and imtransferdet.xitemcode=seitem.xitemcode) as xitemdesc");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xdoctype='Stock Transfer' and ximptnum = '". $ptnum ."'";	
		return $this->db->select("imtransferdet", $fields, $where, " order by xrow");
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}

	public function dbdelete($where){
			//echo $where;die;
		$this->db->dbdelete("imtransferdet", $where);
			
	}
	
	public function getRow($table,$keyfield,$num, $xrow){
		return $this->db->rowIncrement($table,$keyfield,$num, $xrow);
	}
	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
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
			"xsite" => $data['xsite'],
			"xdocnum" => $data['xdocnum'],
			"xdate" => $data['xdate'],			
			"zemail"=>$data['zemail']
			);
			
		$checkval = " bizid = " . $data['bizid'] . " and xvoucher ='" . $data['xvoucher'] ."'";
		$results = $this->db->insertMasterDetail('glheader',$mstdata,"gldetail",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	public function getWorkOrderPrint($wonum){
		$fields = array("*");
		$where = " wonum = '".$wonum."' and xrecflag='Live' and xstatus<>'Canceled' and bizid = ". Session::get('sbizid');	
		return $this->db->select("workorder", $fields, $where);
	}
}