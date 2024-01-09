<?php
class Mailer{
	public function sendbyemail($email, $subject, $body, $attachment){


				// $file = fopen("C:/Users/DBS/Desktop/testdoc.txt","w");
				// echo fwrite($file,$email);
				// fclose($file);
			
				require 'mailer/PHPMailer-master/PHPMailerAutoload.php';

					$mail = new PHPMailer;
					
					
					
					$mail->isSMTP(); 
					
					// Set mailer to use SMTP
					//$mail->Host = 'tls://smtp.gmail.com:587';
					$mail->Host = 'mail.nnsel.com';
					$mail->SMTPOptions = array(
					   'ssl' => array(
						 'verify_peer' => false,
						 'verify_peer_name' => false,
						 'allow_self_signed' => true
						)
					);
					
					
					$mail->SMTPAuth = true;                               // Enable SMTP authentication
					$mail->Username = 'mattraerp@nnsel.com';                 // SMTP username
					$mail->Password = 'mattra@nnsel';                           // SMTP password
					//$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
					$mail->Port = 26;                                    // TCP port to connect to

					$mail->setFrom('mattraerp@nnsel.com', 'MattraERP Alert');

					$mailArray = explode(',', $email);
					foreach($mailArray as $val){
						$mail->addAddress($val);
					}

					// $mail->addAddress($email);     // Add a recipient
					//$mail->addAddress('ellen@example.com');               // Name is optional
					//$mail->addReplyTo('info@example.com', 'Information');
					//$mail->addCC('cc@example.com');
					//$mail->addBCC('bcc@example.com');

					$mail->addAttachment($attachment);         // Add attachments
					//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
					$mail->isHTML(true);                                  // Set email format to HTML

					$mail->Subject = $subject;
					$mail->Body    = $body;
					//$mail->AltBody = 'Dear User,
						//				As you requested. 
							//			If it was not at your request, then please contact support immediately.';
					$success = "";
					if(!$mail->send()) {
						
						return "Could not send email!".$mail->ErrorInfo;
					} else {
						return "Success";
					}
					
									
	}
}



// require '../mailer/PHPMailer-master/PHPMailerAutoload.php';

// $mail = new PHPMailer;

// //$mail->SMTPDebug = 3;                               // Enable verbose debug output

// $mail->isSMTP();                                      // Set mailer to use SMTP
// $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
// $mail->SMTPAuth = true;                               // Enable SMTP authentication
// $mail->Username = 'mdrajibd2k@gmail.com';                 // SMTP username
// $mail->Password = 'akashnil123';                           // SMTP password
// $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
// $mail->Port = 587;                                    // TCP port to connect to

// $mail->setFrom('mdrajibd2k@gmail.com', 'Mailer');
// $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
// $mail->isHTML(true);                                  // Set email format to HTML

// $mail->Subject = 'Here is the subject';
// $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

// if(!$mail->send()) {
//     echo 'Message could not be sent.';
//     echo 'Mailer Error: ' . $mail->ErrorInfo;
// } else {
//     echo 'Message has been sent';
// }