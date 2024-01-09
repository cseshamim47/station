<?php 

class Agent_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function createopeningbal($mstdata, $dtcols, $dtdata){
		//print_r($data); die;	
		
			
		$checkval = " bizid = 100 and xvoucher ='OP--000001'";
		$results = $this->db->insertMasterDetail('glheader',$mstdata,"gldetail",$dtcols, $dtdata,$checkval);
		
		return $results;	
	}
	public function create($data){



		$mstdata = $this->db->insert('agent', array(
			"bizid"=>$data['bizid'],
			"xagent"=>$data['xagent'],
			"xshort"=>$data['xshort'],
			"xorg"=>$data['xorg'],
			"xadd1"=>$data['xadd1'],
			"xadd2"=>$data['xadd2'],
			"xbillingadd" => $data['xbillingadd'],
			"xdeliveryadd" => $data['xdeliveryadd'],
			"xcountry" => $data['xcountry'],
			"xphone" => $data['xphone'],
			"xcusemail" => $data['xcusemail'],
			"xmobile" => $data['xmobile'],
			"xnid" => $data['xnid'],
			"zactive"=>$data['zactive'],
			"zemail"=>Session::get('suser'),
			"xoccupation"=>$data['xoccupation'],
			"xdob"=>$data['xdob'],
			"xreligion"=>$data['xreligion'],
			"xstatus"=>'Created'
			));
		
		return $mstdata;
		
	}

	
	public function editCustomer($data, $agent){
		$results = array(
			"bizid"=>$data['bizid'],
			//"xagent"=>$data['xagent'],
			"xshort"=>$data['xshort'],
			"xorg"=>$data['xorg'],
			"xadd1"=>$data['xadd1'],
			"xadd2"=>$data['xadd2'],
			"xbillingadd" => $data['xbillingadd'],
			"xdeliveryadd" => $data['xdeliveryadd'],
			"xcountry" => $data['xcountry'],
			"xphone" => $data['xphone'],
			"xcusemail" => $data['xcusemail'],
			"xmobile" => $data['xmobile'],
			"xnid" => $data['xnid'],
			"zactive"=>$data['zactive'],
			"xoccupation"=>$data['xoccupation'],
			"xdob"=>$data['xdob'],
			"xreligion"=>$data['xreligion'],
			"xemail"=>$data['xemail'],
			"zutime"=>$data['zutime']
			);
			
			/*if($itemauto=="NO")
				$results["xitemcode"] = $data['xitemcode']; print_r($results);die;*/
			
			
			
			if(Session::get('sbizcusauto')=='NO')
				$results["xagent"] = $data['xagent'];
			
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xagent = '". $agent."'";
			return $this->db->update('agent', $results, $where);
	}
	
	public function getSingleCustomer($agent){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xagent = '". $agent."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("agent", $fields, $where);
	}

	public function getSingleInsdt($cus){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xcus = '". $cus."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("installmentmst", $fields, $where);
	}
	
	public function getCustomersByLimit($limit=""){
		$fields = array("xagent", "xshort", "xadd1","xmobile");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("agent", $fields, $where, " order by xagent desc", $limit);
	}
	
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	
	public function delete($where){
			//echo $where;die;
		$postdata=array(
			"xrecflag" => "Deleted",
			"xemail" => Session::get('suser'),
			"zutime" => date("Y-m-d H:i:s")
			);
		
		$this->db->update('agent', $postdata, $where);
			
	}

	public function getItemMaster($xitem,$xval){
		return $this->db->getItemMaster($xitem,$xval);
	}

	public function getYearPer($year, $per){
		return $this->db->getYearPer($year,$per);
	}

	public function getRow($table,$keyfield,$num, $xrow){
		
		return $this->db->rowIncrement($table,$keyfield,$num, $xrow);
	}

	public function getSales($sonum){
		$fields = array("*","(select xorg from secus where secus.bizid=somst.bizid and secus.xcus=somst.xcus) as xorg",
		"(select xadd1 from secus where secus.bizid=somst.bizid and secus.xcus=somst.xcus) as xadd1",
		"(select xphone from secus where secus.bizid=somst.bizid and secus.xcus=somst.xcus) as xphone");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xcus = '". $sonum ."'" ;
		//print_r($this->db->select("somst", $fields, $where));die;
		return $this->db->select("somst", $fields, $where);
	}

	public function getvsalesdt($sonum){
		$fields = array("*",
		"(select xdesc from seitem where vsalesdt.bizid=seitem.bizid and vsalesdt.xitemcode=seitem.xitemcode) as xitemdesc","(select xorg from secus where secus.bizid=vsalesdt.bizid and secus.xcus=vsalesdt.xcus) as xorg"
		,"(select xadd1 from secus where secus.bizid=vsalesdt.bizid and secus.xcus=vsalesdt.xcus) as xadd"
		,"(select xphone from secus where secus.bizid=vsalesdt.bizid and secus.xcus=vsalesdt.xcus) as xphone");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " bizid = ". Session::get('sbizid') ." and xcus = '". $sonum ."'";	
		return $this->db->select("vsalesdt", $fields, $where, " order by xrow");
	}
	
}