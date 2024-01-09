<?php 

class Loginmem_Model extends Model{
	
	function __construct(){
		parent::__construct();
		
	}
	public function run($biz){ 
		$sth = $this->db->prepare("SELECT bizid, xrdin, 'DEFAULT' as zrole, bin FROM vmlminfotreedt 
							WHERE xrdin = :login and xpassword = :password and bizid = :bizid and bc=1"); 
		$sth->execute(array(
			':login' => $_POST['login'],
			':password' => Hash::create('sha256',$_POST['password'],HASH_KEY),
			':bizid' => $biz
		));
		
		$data = $sth->fetch();
		
		$where = "bizid = ". $data['bizid'] ." and zrole = '". $data['zrole'] ."' and xmenutype='Main Menu'";
		
		$menus = $this->getMainMenu($where);
		
		$bizdata = $this->getBizness($biz);
		//print_r($bizdata); die;
		
		
		$count = $sth->rowCount();
		
		
		
		if($count>0){
			
			Session::destroy();
			
			Session::init();
			Session::set('suser', $data['xrdin']);
			Session::set('srole', $data['zrole']);
			Session::set('sbranch', $data['xrdin']);
			Session::set('suserrow', '0');
			Session::set('sbin', $data['bin']);
			Session::set('sbizid', $data['bizid']);
			Session::set('sbizshort', 'ABL');
			Session::set('sbizlong', 'Amarbazar Limited');
			Session::set('sbizadd', 'House # 14, Road# 2, Block# D,Mohanagor Project, Rampura Dhaka');
			Session::set('svatpct', '15');
			Session::set('sbizcur', 'BDT');
			Session::set('schkinv', 'Yes');
			Session::set('sbizdecimals', '2');
			Session::set('sbizitemauto', 'NO');
			Session::set('sbizcusauto', 'YES');
			Session::set('sbizsupauto', 'NO');
			Session::set('sbizdateformat', 'dd-mm-YYYY');
			Session::set('syearoffset', '6');
			Session::set('loggedIn', true);
			Session::set('mainmenus', $menus);
			
			
			header('location: '. URL .'mainmenu/members');
		}else{
			header('location: '. URL .'loginmem/index/'.$biz);
		}
	}
	
	public function getBizness($biz){
		$fields = array("bizid", "bizshort", "bizlong", "bizcur", "bizdecimals","bizitemauto","bizcusauto","bizsupauto","bizdateformat",
		"bizadd1", "bizvatpct", "bizchkinv","bizyearoffset");
		
		$where = "bizid = ".$biz;	
		//print_r($this->db->select("pabuziness", $fields, $where));die;
		return $this->db->select("pabuziness", $fields, $where);
	}
	
	public function getMemebers(){
		$fields = array("distrisl");
		
		$where = " bizid = 100 and xpassword='1234'";	
		//print_r($this->db->select("pabuziness", $fields, $where));die;
		return $this->db->select("mlminfo", $fields, $where);
	}
	function update($data, $where){
		
		$data = array(
			"xpassword"=>$data['xpassword'],
			"xsquestion"=>$data['xsquestion']
		);
		return $this->db->update("mlminfo", $data, $where);
	}
		public function getMainMenu($where){
		$fields = array("xmenu","xsubmenu","xurl");
		//print_r($this->db->select("pamenus", $fields));die;
			
		return $this->db->select("pamenus", $fields, $where);
	}
}