<?php
class Sendpass extends Controller{
	
	function __construct(){
		parent::__construct();		
		}
		function index($biz=""){
			$this->view->biz = $this->model->getBizness($biz);
			$this->view->rslt = "";
			$this->view->renderlogin('sendpass/index');	
		}

		
	public function sendbyemail($biz,$rin,$email){
			
				require 'mailer/PHPMailer-master/PHPMailerAutoload.php';

					$mail = new PHPMailer;

					//$mail->SMTPDebug = 3;                               // Enable verbose debug output
					$pass = $this->updemailpass($rin,$email);
					$this->view->rslt = "RIN and Email did not match!";
					if ($pass!="Not Found"){
					
					$mail->isSMTP();                                      // Set mailer to use SMTP
					$mail->Host = 'server.hostmatra.com';  // Specify main and backup SMTP servers
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail->Username = 'support@amarbazarltd.com';                 // SMTP username
					$mail->Password = 'AmarSupport@)!&';                           // SMTP password
					$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 25;                                    // TCP port to connect to

					$mail->setFrom('support@amarbazarltd.com', 'Amarbazar Ltd.');
					$mail->addAddress($email, 'Rajib');     // Add a recipient
					//$mail->addAddress('ellen@example.com');               // Name is optional
					//$mail->addReplyTo('info@example.com', 'Information');
					//$mail->addCC('cc@example.com');
					//$mail->addBCC('bcc@example.com');

					//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
					//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
					$mail->isHTML(true);                                  // Set email format to HTML

					$mail->Subject = 'Password changed notification from Amarbazar Ltd.';
					$mail->Body    = '<div><h3>Amarbazar Ltd.</h3></div>Dear User,<br />'.$rin.'
										<p>As you requested, your password for our Retailer login has now been reset.
										Now your password is <strong>'.$pass.'</strong>. <br />
										If it was not your request, then please contact support immediately.</p>';
					$mail->AltBody = 'Dear User,'.$rin.'
										As you requested, your password for our Retailer login has now been reset.
										Now your password is '.$pass.'. 
										If it was not at your request, then please contact support immediately.';
					$success = "";
					if(!$mail->send()) {
						
						$this->view->rslt = "Could not send email!";
					} else {
						$this->view->rslt = "Email sent, Please Check! If you don't find, please check your email spam also.";
					}
					}
					$this->view->biz = $this->model->getBizness($biz);
					
					$this->view->renderlogin('sendpass/index');	
				
	}
	
	function updemailpass($rin,$email){
			require 'libs/Hash.php';
			$result = "";
			$mems  = $this->model->getMemeber($rin);
			if(!empty($mems)){	
				
				if($email == $mems[0]['xcusemail']){ 
			
			
					$pass = $this->randPass(8);
					$hashpass = Hash::create('sha256',$pass,HASH_KEY);
					$data=array(
						"xpassword"=>$hashpass,
						"xsquestion"=>$pass
					);
					
					$where = " bizid = 100 and distrisl=".$mems[0]['distrisl'];
					if( $this->model->update($data, $where)){
						$result = $pass;
					}
				}else{
					$result = "Not Found";
				}
			}
			return $result;
		}	
	
	function sendpassword($biz=""){
			if(!isset($_POST['xrdin']) || !isset($_POST['xmobile'])){
				header ('location: '.URL.'sendpass/index');
					exit;
			}
			$rin = $_POST['xrdin'];
			$mobile = $_POST['xmobile'];
			if($_POST['sendpass']=="sms"){
			$pass = $this->updpass($rin,$mobile);
			
			$sendsms = new Sendsms();
				if($pass!=""){			
				
				
						$smstext = 'Your password changed. Your new password is '. $pass; //echo $tonum.' '.$smstext; die;
						
							
						$sendsms->sendSingleSms("https://api.mobireach.com.bd/SendTextMessage", "pure", "Akashnil@1234", "8801833318683", "88".$mobile, $smstext);
							
						
					
					$this->view->rslt = "Password sent!";
				}else{
					$this->view->rslt = "RIN or Password did not match!";
				}
				$this->view->biz = $this->model->getBizness($biz);
				$this->view->renderlogin('sendpass/index');	
			}
			if($_POST['sendpass']=="email"){
					$this->sendbyemail($biz,$rin,$_POST['xmobile']);
				}	
			}
			
			function updpass($rin,$mobile){
			$result = "";
			$mems  = $this->model->getMemeber($rin);
			if(!empty($mems)){	
			$dbmobile = $mems[0]['xmobile']; 
			if (substr($dbmobile, 0, 1) === '+'){
				$dbmobile=str_replace("+","",$dbmobile);
			}
			if(strlen($dbmobile)==11){
				$dbmobile="88".$dbmobile;
			}
			if($dbmobile=="88".$mobile){
				$pass = $this->randPass(8);
				$hashpass = Hash::create('sha256',$pass,HASH_KEY);
				$data=array(
					"xpassword"=>$hashpass,
					"xsquestion"=>$pass
				);
				
				$where = " bizid = 100 and distrisl=".$mems[0]['distrisl'];
				if( $this->model->update($data, $where)){
					$result = $pass;
				}
			}
			}
			return $result;
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