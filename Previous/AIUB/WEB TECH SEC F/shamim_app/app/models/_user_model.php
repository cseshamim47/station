<?php 

class User_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data){
			
		$results = $this->db->insert('pausers', array(
			"bizid" => $data['bizid'],
			"xuserrow" => $data['xuserrow'],
			"zemail" => $data['zemail'],
			"zuserfullname" => $data['zuserfullname'],
			"zusermobile" => $data['zusermobile'],
			"zaltemail" => $data['zaltemail'],
			"zpassword" => Hash::create('sha256',$data['zpassword'],HASH_KEY),
			"zuseradd" => $data['zuseradd'],
			"zcomments" => $data['zcomments'],
			"zrole" => $data['zrole'],
			"xbranch" => $data['xbranch'],
			"zactive" => $data['zactive']
			));
		
		return $results;	
	}
	
	public function editUser($data, $user){
		$results = array(
			"zemail" => $data['zemail'],
			"zuserfullname" => $data['zuserfullname'],
			"zusermobile" => $data['zusermobile'],
			"zaltemail" => $data['zaltemail'],
			"zpassword" => Hash::create('sha256',$data['zpassword'],HASH_KEY),
			"zuseradd" => $data['zuseradd'],
			"zcomments"=> $data['zcomments'],
			"zrole" => $data['zrole'],
			"xbranch" => $data['xbranch'],
			"zactive"=> $data['zactive']);
			
			$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and zemail = '". $user ."'";
			return $this->db->update('pausers', $results, $where);
	}
	
	public function getSingleUser($user){
		$fields = array();
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and zemail = '". $user ."'" ;	
		//print_r($this->db->select("seitem", $fields, $where));die;
		return $this->db->select("pausers", $fields, $where);
	}
	
	public function getUsersByLimit($limit=""){
		$fields = array("zemail", "zuserfullname", "zusermobile","xbranch", "zrole");
		//print_r($this->db->select("pabuziness", $fields));die;
		$where = " xrecflag='Live' and bizid = ". Session::get('sbizid') ."";	
		return $this->db->select("pausers", $fields, $where, " order by zemail", $limit);
	}
	
	public function rowplus($table, $col){
		return $this->db->rowplus($table, $col);
	}
		
	public function delete($where){
			//echo $where;die;
		$postdata=array(
			"xrecflag" => "Deleted",
			"xemail" => Session::get('suser'),
			"zutime" => date("Y-m-d H:i:s")
			);
		
		$this->db->update('pausers', $postdata, $where);
			
	}
	
}