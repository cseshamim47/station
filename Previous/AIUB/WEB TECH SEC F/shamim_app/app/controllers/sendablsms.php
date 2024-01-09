<?php
class Sendablsms extends Controller{
	
	
	
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
		
			if(empty($usersessionmenu)){
				header('location: '.URL.'mainmenu');
			}
		}
		
		function sendbulksms(){//8801621177777
			$sendsms = new Sendsms();
			/*$smsdata = array(0=>array(
				"xmobile"=>"8801841923270",
				"xrdin"=>"ABL-789-00001",
				"xsquestion"=>"testpass"
			),
			1=>array(
				"xmobile"=>"01621177777",
				"xrdin"=>"ABL-777-00007",
				"xsquestion"=>"testpass"
			));*/
			$smsdata = $this->model->getInfoRinDetail();
			$count = 0;
			foreach($smsdata as $key=>$val){
					
					$count++;
					
					if($count<1432)
						$this->model->update(" bizid=100 and xrdin='". $val['xrdin'] ."'");
					else
						exit($count." SMS send updated!");
						
					/*$smstext = 'Welcome to Amarbazar Ltd. Login to http://37.34.252.0/amarbazarltd/loginmem/index/100 Your User is '.$val['xrdin'].' and Password is '. $val['xsquestion']; //echo $tonum.' '.$smstext; die;
					if(strlen($val['xmobile'])==11){
						$tonum = "88".$val['xmobile'];
						$sendsms->sendSingleSms("https://bmpws.robi.com.bd/ApacheGearWS/SendTextMessage", "pure", "D2kpass@)!&", "8801833318683", $tonum, $smstext);
						$count++;
					}
					if(strlen($val['xmobile'])==13){
						$tonum = $val['xmobile'];
						$sendsms->sendSingleSms("https://bmpws.robi.com.bd/ApacheGearWS/SendTextMessage", "pure", "D2kpass@)!&", "8801833318683", $tonum, $smstext);
						$count++;
					}*/
				}
				//echo $count." SMS send success!";
			}
			
}		