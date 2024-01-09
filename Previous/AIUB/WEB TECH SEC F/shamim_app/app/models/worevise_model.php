<?php 

class Worevise_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
		
	
	public function create($data){
		$results = $this->db->insert('worevise', array(
			"bizid" => $data['bizid'],
			"xref" => $data['xref'],
			"toname" => $data['toname'],
			"toorg" => $data['toorg'],
			"tomobile" => $data['tomobile'],
			"xsubject" => $data['xsubject'],
			"toadd"=> $data['toadd'],
			"xnotes"=> $data['xnotes'],
			"xamount"=> $data['xamount'],
			"xprevamount"=> $data['xprevamount'],
			"zemail"=> $data['zemail'],
			"wornum"=> $data['wornum'],
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
			"xprevamount"=> $data['xprevamount'],
			"wonum"=> $data['wonum'],
			"xdate"=> $data['xdate'],
			"xemail"=> $data['xemail'],
			"zutime"=> $data['zutime'],
			"xproject"=>$data['xproject']
		);
			
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xstatus='Created' and wornum = '". $id."'";
			return $this->db->update('worevise', $results, $where);
	}
	
	public function confirm($ptnum){
		
		$postdata=array("xstatus" => "Confirmed");

		return $this->db->update("worevise",$postdata," wornum='".$ptnum."'");
	}

	public function cancel($ptnum){
			//echo $where;die;
		
		$postdata=array("xstatus" => "Canceled");

		return $this->db->update("worevise",$postdata," wornum='".$ptnum."'");

	}
	public function getworevise($limit){
		$fields = array("wornum", "wonum", "date_format(xdate, '%d-%m-%Y') as xdate", "toname","toorg","xamount");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and xstatus<>'Canceled' and bizid = ". Session::get('sbizid');	
		return $this->db->select("worevise", $fields, $where, " order by ztime desc", $limit);
	}
	public function getworeviseList($status){
		$fields = array("wornum", "wonum", "date_format(xdate, '%d-%m-%Y') as xdate", "toname","toorg","xamount");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and xstatus='".$status."' and bizid = ". Session::get('sbizid');	
		return $this->db->select("worevise", $fields, $where, " order by ztime desc");
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
	
	public function getImpt($wornum){
		$fields = array("*","(xamount + xprevamount) as xtotamount");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and wornum = '". $wornum ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("worevise", $fields, $where);
	}

	public function getChartSub($wonum){
		$fields = array("*");
		$where = " bizid = ". Session::get('sbizid') ." and xaccsub = '". $wonum ."'" ;	
		return $this->db->select("glchartsub", $fields, $where);
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
		$where = " wornum = '".$wonum."' and xrecflag='Live' and xstatus<>'Canceled' and bizid = ". Session::get('sbizid');	
		return $this->db->select("worevise", $fields, $where);
	}
}