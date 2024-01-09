<?php 

class Distsearch_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	
	
	
	public function getCustomer($where){
		$fields = array("xcus","xorg", "xmobile","xadd1","(select xpoint from vpointcus where secus.xcus=vpointcus.xcus) as xpoint");
		//echo $where; die;
		return $this->db->select("secus", $fields, $where," order by xcus");
	}
	
	
	
}