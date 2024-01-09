<?php 

class Cussatisfaction_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
			
		$results = $this->db->insert('crmcussatisfaction', array(
			"bizid" => $data['bizid'],
			"xitemcode" => $data['xitemcode'],
			"xcus" => $data['xcus'],
			"xadd1" => $data['xadd1'],
			"xquality" => $data['xquality'],
			"xdelper" => $data['xdelper'],
			"xvalprod"=> $data['xvalprod'],
			"xservcar"=> $data['xservcar'],
			"xcomment"=> $data['xcomment'],
			"xname"=> $data['xname'],
			"xtitle"=> $data['xtitle'],
			"xmobile"=> $data['xmobile'],
			"xphone"=> $data['xphone'],
			"xemail"=> $data['xemail'],
			"xconfidential"=> $data['xconfidential'],
			"xprepare"=> $data['xprepare'],
			"xapprove"=> $data['xapprove']
			));
		
		return $results;	
	}
	
	public function editItem($data, $id){
		$results = array(
			"xitemcode" => $data['xitemcode'],
			"xcus" => $data['xcus'],
			"xadd1" => $data['xadd1'],
			"xquality" => $data['xquality'],
			"xdelper" => $data['xdelper'],
			"xvalprod"=> $data['xvalprod'],
			"xservcar"=> $data['xservcar'],
			"xcomment"=> $data['xcomment'],
			"xname"=> $data['xname'],
			"xtitle"=> $data['xtitle'],
			"xmobile"=> $data['xmobile'],
			"xphone"=> $data['xphone'],
			"zemail"=> $data['zemail'],
			"xconfidential"=> $data['xconfidential'],
			"xprepare"=> $data['xprepare'],
			"xapprove"=> $data['xapprove']
		);
			
			/*if($itemauto=="NO")
				$results["xitemcode"] = $data['xitemcode']; print_r($results);die;*/
			
			$where = "bizid = ". Session::get('sbizid') ." and xsl = ". $id;
			return $this->db->update('crmcussatisfaction', $results, $where);
	}
	
	public function getSingleItem($id){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid') ." and xsl = ". $id;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("crmcussatisfaction", $fields, $where);
	}

	public function getCusDet($rin){
		$fields = array("*");
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xcus = '". $rin ."'";	
		echo json_encode($this->db->select("secus", $fields, $where));
	}
	
	public function getcussatisfactionByLimit($limit=""){
		$fields = array("xsl", "xcus", "xitemcode","xquality","xdelper", "xvalprod", "xservcar");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "bizid = ". Session::get('sbizid');	
		return $this->db->select("crmcussatisfaction", $fields, $where, " order by xsl", $limit);
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
		
		$this->db->update('crmcussatisfaction', $postdata, $where);
			
	}
	
}