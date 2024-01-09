<?php 

class Distjoin_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function create($data, $type){
		//create tree and get BIN no as return
		$binresults="";
								
		$dt = array(
			"bizid"=>$data['bizid'],
			"distrisl"=>$data['distrisl'],
			"upbin"=>$data['upbin'],
			"updistrisl"=>$data['updistrisl'],
			"refbin"=>$data['refbin'],
			"refdistrisl"=>$data['refdistrisl'],
			"upbc"=>$data['upbc'],
			"side"=>$data['side'],
			"bc" => $data['bc'],
			"xuser"=>$data['zemail'],
			"newentry"=>$data['newentry'],
			"binstatus"=>$data['binstatus'],
			"xcus" => $data['xcus'],
			"xpoint"=>$data['xpoint'],
			"binpoint"=>$data['binpoint'],
			"stno"=>$data['stno']
			);
		$results = $this->db->insert('mlmtree', $dt);
		
		if($results>0){	
				$prnt=array("bin"=>$results,"distrisl"=>$data['distrisl'],"side"=>$data['side']);
				$this->updateParent($prnt, $data['upbin']);
			}
		
		if($type == "Turbo"){	
		
			
				$dt["upbin"]= $results;
				$dt["updistrisl"]= $data['distrisl'];
				$dt["refbin"]=$results;
				$dt["refdistrisl"]= $data['distrisl'];
				$dt["upbc"]=$data['bc'];
				$dt["bc"]=$data["bc"]+1;
				$dt["side"]='A';

				$resultA = $this->db->insert('mlmtree', $dt);
				$prnt=array("bin"=>$resultA,"distrisl"=>$dt['distrisl'],"side"=>$dt['side']);
				$this->updateParent($prnt, $dt['upbin']);
				
				
				$dt["bc"]=$dt["bc"]+1;
				$dt["side"]='B';

				$resultB = $this->db->insert('mlmtree', $dt);
				
				$prnt=array("bin"=>$resultB,"distrisl"=>$dt['distrisl'],"side"=>$dt['side']);
				$this->updateParent($prnt, $dt['upbin']);	
				
		}
		
		if($type == "S Turbo"){	
			// A B Node
				$dt["upbin"]= $results;
				$dt["updistrisl"]= $data['distrisl'];
				$dt["refbin"]=$results;
				$dt["refdistrisl"]= $data['distrisl'];
				$dt["upbc"]=$data['bc'];
				$dt["bc"]=$data["bc"]+1;
				$dt["side"]='A';
				$abc=$dt["bc"];
				$resultA = $this->db->insert('mlmtree', $dt);
				$prnt=array("bin"=>$resultA,"distrisl"=>$dt['distrisl'],"side"=>$dt['side']);
				$this->updateParent($prnt, $dt['upbin']);

				
				$dt["bc"]=$dt["bc"]+1;
				$dt["side"]='B';
				$bbc=$dt["bc"];
				$resultB = $this->db->insert('mlmtree', $dt);
				
				$prnt=array("bin"=>$resultB,"distrisl"=>$dt['distrisl'],"side"=>$dt['side']);
				$this->updateParent($prnt, $dt['upbin']);
				
				//C D Node
				$dt["upbin"]= $resultA;
				$dt["updistrisl"]= $dt['distrisl'];
				$dt["upbc"]=$abc;
				$dt["bc"]=$dt["bc"]+1;
				$dt["side"]='A';

				$resultC = $this->db->insert('mlmtree', $dt);
				
				$prnt=array("bin"=>$resultC,"distrisl"=>$dt['distrisl'],"side"=>$dt['side']);
				$this->updateParent($prnt, $dt['upbin']);
				//D Node
				$dt["upbin"]= $resultA;
				$dt["updistrisl"]= $dt['distrisl'];
				$dt["upbc"]=$abc;
				$dt["bc"]=$dt["bc"]+1;
				$dt["side"]='B';

				$resultD = $this->db->insert('mlmtree', $dt);
				
				$prnt=array("bin"=>$resultD,"distrisl"=>$dt['distrisl'],"side"=>$dt['side']);
				$this->updateParent($prnt, $dt['upbin']);

				//F F Node
				$dt["upbin"]= $resultB;
				$dt["updistrisl"]= $dt['distrisl'];
				$dt["upbc"]=$bbc;
				$dt["bc"]=$dt["bc"]+1;
				$dt["side"]='A';

				$resultE = $this->db->insert('mlmtree', $dt);
				
				$prnt=array("bin"=>$resultE,"distrisl"=>$dt['distrisl'],"side"=>$dt['side']);
				$this->updateParent($prnt, $dt['upbin']);
				//F Node
				$dt["upbin"]= $resultB;
				$dt["updistrisl"]= $dt['distrisl'];
				$dt["upbc"]=$bbc;
				$dt["bc"]=$dt["bc"]+1;
				$dt["side"]='B';

				$resultF = $this->db->insert('mlmtree', $dt);
				
				$prnt=array("bin"=>$resultF,"distrisl"=>$dt['distrisl'],"side"=>$dt['side']);
				$this->updateParent($prnt, $dt['upbin']);	
		}
		
		if($type == "Single")
			$binresults = $results;
			
		if($type == "Turbo")
			$binresults = $results.",".$resultA.",".$resultB;
		
		if($type == "S Turbo")
			$binresults = $results.",".$resultA.",".$resultB.",".$resultC.",".$resultD.",".$resultE.",".$resultF;
		
		return $binresults;	
	}
	
		
	
	public function getGenTree($bin){
		$fields = array("upbin");
		$where = " bizid = ". Session::get('sbizid') ." and bin = ". $bin ;	
		return $this->db->select("mlmtreegen", $fields, $where);
	}
	
	public function checkDownLine($bin, $upbin){
		$fields = array("upbin");
		$where = " bizid = ". Session::get('sbizid') ." and bin = ". $bin ." and upbin = ".$upbin ;	
		if(count($this->db->select("mlmtreegen", $fields, $where))>0)
			return true;
		else
			return false;
		
	}
	
	public function getRefTree($bin){
		$fields = array("refbin");
		$where = " bizid = ". Session::get('sbizid') ." and bin = ". $bin ;	
		return $this->db->select("mlmtreeref", $fields, $where);
	}
	
	
	public function getDistrislByDin($cus){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xrdin = '". $cus."'" ;	
		return $this->db->select("mlminfo", $fields, $where);
	}
	
	public function getPoint($cus){
		return $this->db->getCustomerPoint($cus);
		
	}
	
	public function getDistrislByBin($bin){
		$fields = array();
		$where = " bizid = ". Session::get('sbizid') ." and bin = ". $bin ;	
		return $this->db->select("mlmtree", $fields, $where);
	}
	public function getStatementNo(){
		
		return $this->db->getStatementNo();
	}
	
	public function getBinDetail($bin){
		$fields = array();
		$where = " bizid = ". Session::get('sbizid') ." and bin = ". $bin ;	
		echo json_encode($this->db->select("vmlminfotreedt", $fields, $where));
	}
	
	public function getInfoRinDetail($rin){
		$fields = array();
		$where = "xrecflag='Live' and bizid = ". Session::get('sbizid') ." and xrdin = '". $rin ."'";	
		echo json_encode($this->db->select("mlminfo", $fields, $where));
	}
	
	public function getTreeGeneology($bin){
		$fields = array("bin","xrdin","xorg","bc","side","leftbin","leftrin","leftbinname","rightbin","rightrin","rightbinname","upbin","uprin","uplinername","upbc");
		$where = "bizid = ". Session::get('sbizid') ." and bin in  (select bin from mlmtreegen where upbin=". $bin .") order by bin";	
		return $this->db->select("vmlminfotreedt", $fields, $where);
	}
	public function getTreePlacement($bins){
		$fields = array("bin","xrdin","xorg","bc","side","leftbin","leftrin","leftbinname","rightbin","rightrin","rightbinname","upbin","uprin","uplinername","upbc");
		$where = "bizid = ". Session::get('sbizid') ." and bin in  (". $bins .") order by bin";	
		return $this->db->select("vmlminfotreedt", $fields, $where);
	}
	public function getTreeRef($bin){
		$fields = array();
		$where = "bizid = ". Session::get('sbizid') ." and xbin in  (select bin from mlmtreeref where refbin=". $bin .")";	
		return $this->db->select("vmlminfotreedt", $fields, $where);
	}
	public function getKeyValue($table,$keyfield,$prefix,$num){
		
		return $this->db->keyIncrement($table,$keyfield,$prefix,$num);
	}
	public function updateParent($data, $bin){
			//echo $where;die;
		$postdata=array();
		if ($data['side']=="A"){			
			$postdata=array(
				"leftbin" => $data['bin'],
				"leftdistrisl" => $data['distrisl']
				
				);
				
		}
		if ($data['side']=="B"){	
		$postdata=array(
				"rightbin" => $data['bin'],
				"rightdistrisl" => $data['distrisl']
				
				);
		}
		
		$where = " bizid = ". Session::get('sbizid') ." and bin=".$bin;
		$this->db->update('mlmtree', $postdata, $where);
			
	}
	public function delete($where){
			//echo $where;die;
		$postdata=array(
			"xrecflag" => "Deleted",
			"xemail" => Session::get('suser'),
			"zutime" => date("Y-m-d H:i:s")
			);
		
		$this->db->update('mlminfo', $postdata, $where);
			
	}
	public function getRow($table,$keyfield,$num, $xrow){
		
		return $this->db->rowIncrement($table,$keyfield,$num, $xrow);
	}
}