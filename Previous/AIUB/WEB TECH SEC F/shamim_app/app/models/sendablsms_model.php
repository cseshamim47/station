<?php 

class Sendablsms_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
		
	public function getInfoRinDetail(){
		$fields = array("xmobile","xrdin","xsquestion");
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid');	
		return $this->db->select("mlminfo", $fields, $where);
	}
	
	public function update($where){
			//echo $where;die;
		$postdata=array(
			"xcreditterms" => 1
			);
		
		$this->db->update('mlminfo', $postdata, $where);
			
	}
}