<?php
class Distcomsms extends Controller{
	
	
	
	function __construct(){
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
			if($logged == false){
				Session::destroy();
				header('location: '.URL.'login');
				exit;
			}
			
		$usersessionmenu = 	Session::get('mainmenus');
		
		$iscode=0;
		foreach($usersessionmenu as $menus){
				if($menus["xsubmenu"]=="Send Commission SMS")
					$iscode=1;							
		}
		if($iscode==0)
			header('location: '.URL.'mainmenu');
		
		$this->values = array(
				"stno"=>""
			);
			
		$this->fields = array(array(
				"stno-text"=>'Statement No_""'
				)
			);
		
			
		$this->view->js = array('public/js/datatable.js',
		'views/imchkse/js/codevalidator.js','public/js/showpost.js');
		
		
		}
		
		public function index(){
			
			$btn = array(
			"Clear" => URL."distcomsms/smseditor"
			);

			$this->view->rendermainmenu('distcomsms/index');	
		}
		
		public function sendsms(){ 
			$stno = $_POST["stno"];
			
			$peoples = $this->model->getComDistributor($stno);
			$com = $this->model->getcommision($stno); 
			$sendsms = new Sendsms();
			$count = 0;
			$result = "";
			foreach($peoples as $key=>$val){
				try{
				$smsbody = "Statement-".$stno.", Dear Retailer - ";
				$mobilearr = $this->model->getmobile($val["distrisl"]);
				$mobile = ""; 
				if($mobilearr[0]["xmobile"]!=""){
					$mobile = $mobilearr[0]["xmobile"];
				}
				foreach($com as $comkey=>$comval){					
					if($val["distrisl"]==$comval["distrisl"]){
						$smsbody .= $comval["xcomtype"]." : ".$comval["xcom"]. " BDT,";
					}
				}
				$smsbody = rtrim($smsbody,",")." already credited to your account.";
				if($mobilearr[0]["xmobile"]!=""){					  
					$mobile="";
					if(strlen($mobilearr[0]["xmobile"])==11)
						$mobile="88".$mobilearr[0]["xmobile"];
					if(strlen($mobilearr[0]["xmobile"])==13)
						$mobile=$mobilearr[0]["xmobile"];
					$sendsms->sendSingleSms("https://api.mobireach.com.bd/SendTextMessage", "pure", "Akashnil@1234", "8801833318683", $mobile, $smsbody);
				
				}
				$count++;
				}catch(Exception $ex){
					$result .= $mobile."Failed, ";
				}
			}
			
			$result .= $count." sms send to destination.";
			$this->smseditor($result);
		}
				
		function smseditor($result=""){
			
		$btn = array(
			"Clear" => URL."distcomsms/smseditor"
			);
		// form data
		
			$dynamicForm = new Dynamicform("Send Commission SMS", $btn,$result);		
			
			
			$this->view->dynform = $dynamicForm->createForm($this->fields, URL."distcomsms/sendsms", "Send SMS",$this->values);
			
									
			$this->view->renderpage('distcomsms/smseditor');
		}	
		
		
}