<?php
class Sendsms{
	
	public function sendSingleSms($url, $username, $password, $fromnumber, $tonumber, $message){
		$URL = $url;
	
		$postdata = http_build_query(
			array(
			'Username' => $username,
			'Password' => $password,
			'From' => $fromnumber,
			'To' => $tonumber,
			'Message' => $message
			)
		);

		$opts = array('http' => array('method'  => 'POST', 'header'  => 'Content-type: application/x-www-form-urlencoded', 'timeout'=>5,'content' => $postdata),
		"ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        )
		);

		$context  = stream_context_create($opts);

		$result = file_get_contents($URL, false, $context);
		return $result;	
	}
	
}