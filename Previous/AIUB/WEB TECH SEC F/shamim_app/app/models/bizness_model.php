<?php

class Bizness_Model extends Model{
	
	public function __construct(){
		parent::__construct();
		
	}
	
	public function showlist(){
		$fields = array("bizid", "bizshort", "bizlong", "bizadd1");
			
		return $this->db->select("bizness", $fields);
	}
	
		
}