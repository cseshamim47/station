<?php
class Loginmem extends Controller{
	
	function __construct(){
		parent::__construct();		
		}
		
		public function index($biz=""){
			
			if ($this->model->getBizness($biz)==null){
				header ('location: '.URL);
								
			}else{
			$this->view->bizness = $this->model->getBizness($biz);
			//$this->view->pass=Hash::create('sha256',"rajib",HASH_KEY);
			//$this->updpass();
			$this->view->renderlogin('loginmem/index');
			}			
		}
		
		function run($biz=""){
				
			$secret = "6LdHMyQUAAAAAAbRMo3i6x0dkY6239QZ3IOBy7Hk";
 
			// empty response
			$response = null;
			 
			// check secret key
			$reCaptcha = new ReCaptcha($secret);


			if ($_POST["g-recaptcha-response"]) {
				$response = $reCaptcha->verifyResponse(
					$_SERVER["REMOTE_ADDR"],
					$_POST["g-recaptcha-response"]
				);
			}	
			$this->model->run($biz);
			/* if ($response != null && $response->success) {
				$this->model->run($biz);
			 }else{
				 if ($this->model->getBizness($biz)==null){
				header ('location: '.URL);
								
			}else{
			$this->view->bizness = $this->model->getBizness($biz);
			//$this->view->pass=Hash::create('sha256',"rajib",HASH_KEY);
			//$this->updpass();
			$this->view->renderlogin('loginmem/index');
			}
			 }*/
		}
		
		function updpass(){
			$mems  = $this->model->getMemebers();
			for($i = 0; $i < count($mems); $i++){
			$pass = $this->randPass(8);
			$hashpass = Hash::create('sha256',$pass,HASH_KEY);
			$data=array(
				"xpassword"=>$hashpass,
				"xsquestion"=>$pass
			);
			//print_r($data);die;4f0bc25228829ebbab4f0d82ba3effe95f29e4508caddb94503e9eba144f7259-$Ejyne
			$where = " bizid = 100 and distrisl=".$mems[$i]['distrisl'];
			$this->model->update($data, $where);
			}
			$this->view->pass="Done";
		}
		
		function randPass($length, $strength=8) {
				$vowels = 'aeuy';
				$consonants = 'bdghjmnpqrstvz';
				if ($strength >= 1) {
					$consonants .= 'BDGHJLMNPQRSTVWXZ';
				}
				if ($strength >= 2) {
					$vowels .= "AEUY";
				}
				if ($strength >= 4) {
					$consonants .= '23456789';
				}
				if ($strength >= 8) {
					$consonants .= '@#$%';
				}

				$password = '';
				$alt = time() % 2;
				for ($i = 0; $i < $length; $i++) {
					if ($alt == 1) {
						$password .= $consonants[(rand() % strlen($consonants))];
						$alt = 0;
					} else {
						$password .= $vowels[(rand() % strlen($vowels))];
						$alt = 1;
					}
				}
    return $password;
}
}