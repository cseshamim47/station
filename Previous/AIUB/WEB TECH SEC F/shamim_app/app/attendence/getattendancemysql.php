<?php

//$postdata=file_get_contents('php://input');

$postdata = json_decode(stripslashes($_POST["att"]));

$db = mysqli_connect("localhost", "nnselcom_root", "kothinpwd2017"); 
mysqli_select_db($db,"nnselcom_app");
if (!$db) {
        die('Could not connect to db: ' . mysqli_error());
    }	
$encod=json_encode($postdata);

$data = json_decode($encod, true);

$locationid=$_GET["locationid"];

$psql=mysqli_query($db,"delete from attdumptemp where bizid='100' and xlocationid='$locationid'");

$action="";
$xdate = "";
$xtime="";
$enrollid="";
$mechineid="";
$timestamp = date('Y-m-d G:i:s');
$now = date('Y-m-d');

if (is_array($data)) { 
	foreach ($data as $record){
		
	$action=$record['_action'];
	$date=$record['_date'];
	$xdate = date('Y-m-d', strtotime($date));
	$xtime=$record['_datetime'];
	$enrollid=$record['_enrollid'];	
	$mechineid=$record['_mechineid'];	
	$devicetime = date("H:i:s",strtotime($date));	
	
	$isql=mysqli_query($db,"INSERT INTO attdumptemp (ztime,bizid,xenrollid,xaction,xlocationid,xmechineid,xdate,xtime,xonlydate) 
			values('$timestamp','100','$enrollid','$action','$locationid','$mechineid','$xdate','$devicetime','$date')");	
	}
	
// 		file_put_contents("qlog.txt","INSERT INTO attdumptemp (ztime,bizid,xenrollid,xaction,xlocationid,xmechineid,xdate,xtime,xonlydate)values('$timestamp','100','$enrollid','$action','$locationid','$mechineid','$xdate','$devicetime','$date')", FILE_APPEND | LOCK_EX);
	
	$isql=mysqli_query($db,"INSERT INTO edstuatt(ztime,bizid,xid,xdate,xdatetime,xdevice,xbranch,xyear,xtime) select ztime,bizid,xenrollid,xdate,xonlydate,'Device','Main Campus',YEAR(xdate),xtime from attdumptemp");

		echo 'Success';


		// $file = fopen("C:/Users/kamrul/Desktop/testdoc.txt","w");
		// echo fwrite($file,$isql);
		// fclose($file);
		
	// try{
	// 	$ParentsNumberForPA = mysqli_query($db,"select `c`.`xstudentid` AS `xstudentid`,`c`.`xfmobile` AS `xfmobile`,`c`.`xmmobile` AS `xmmobile`, `m`.`xtime` AS `detime`, `m`.`xdate` AS `dedate`, (select xptime from atttime where `c`.`xshift`=atttime.xshift) AS xptime, (select xetime from atttime where `c`.`xshift`=atttime.xshift) AS xetime from (`vstuenrolldt` `c` JOIN `attdumptemp` `m`) where (`c`.`xid` = `m`.`xenrollid`)");

	// 	foreach ($ParentsNumberForPA as $key => $value) {
	// 		$messagetext="";
	// 		$messagenumber=array();
	// 		if($value['detime'] <= $value['xptime']){
	// 			//present
	// 			$smstext=mysqli_query($db,"SELECT smsbody FROM smslog where xactive=1 and bizid=100 and xsmsfor='Present' LIMIT 1");
	// 			foreach($smstext as $ke=>$val){
	// 				if($val['smsbody']!=null)
	// 					$messagetext .= $val['smsbody'];
	// 			}
	// 			array_push($messagenumber, array('xmobile' => $value['xfmobile']));
	// 			array_push($messagenumber, array('xmobile' => $value['xmmobile']));
	// 			$numbers="";
	// 			foreach($messagenumber as $ke=>$val){
	// 				if($val['xmobile']!=null)
	// 					$numbers .= $val['xmobile'].",";
	// 			}
	// 			$numbers = rtrim($numbers, ',');

	// 		}
	// 		else if($value['detime'] >= $value['xetime']){
	// 			//exit
	// 			$smstext=mysqli_query($db,"SELECT smsbody FROM smslog where xactive=1 and bizid=100 and xsmsfor='Leave' LIMIT 1");
	// 			foreach($smstext as $ke=>$val){
	// 				if($val['smsbody']!=null)
	// 					$messagetext .= $val['smsbody'];
	// 			}
	// 			array_push($messagenumber, array('xmobile' => $value['xfmobile']));
	// 			array_push($messagenumber, array('xmobile' => $value['xmmobile']));
	// 			$numbers="";
	// 			foreach($messagenumber as $ke=>$val){
	// 				if($val['xmobile']!=null)
	// 					$numbers .= $val['xmobile'].",";
	// 			}
	// 			$numbers = rtrim($numbers, ',');
	// 		}
	// 		else if($value['detime'] > $value['xptime'] && $value['detime'] < $value['xetime']){
	// 			//late
	// 			$smstext=mysqli_query($db,"SELECT smsbody FROM smslog where xactive=1 and bizid=100 and xsmsfor='Late' LIMIT 1");
	// 			foreach($smstext as $ke=>$val){
	// 				if($val['smsbody']!=null)
	// 					$messagetext .= $val['smsbody'];
	// 			}
	// 			array_push($messagenumber, array('xmobile' => $value['xfmobile']));
	// 			array_push($messagenumber, array('xmobile' => $value['xmmobile']));
	// 			$numbers="";
	// 			foreach($messagenumber as $ke=>$val){
	// 				if($val['xmobile']!=null)
	// 					$numbers .= $val['xmobile'].",";
	// 			}
	// 			$numbers = rtrim($numbers, ',');
	// 		}
	// 		$sendsms = new Sendsms();
	// 		$smsresult = "";
	// 		//$smsresult = $sendsms->send_ayub_sms($messagetext,$numbers);
	// 		$isqll=mysqli_query($db,"INSERT INTO testtable (numbers,message) 
	// 		values('$numbers','$messagetext')");
	// 	}

	// }catch(Exception $e){

	// }
	
	}else{
		echo 'Error';
}

class Sendsms{
	
	
	function validate_msisdn($msisdn)
	{
	  $msisdn = trim(preg_replace("/[^0-9]+/", "", $msisdn));
	  $msisdn = preg_replace("/^(00)?(88)?0/", "", $msisdn);
	  if (strlen($msisdn) != 10 || strncmp($msisdn, "1", 1) != 0)
		return false;

	  $msisdn = "880" . $msisdn;
	  return $msisdn;
	}
	
	function send_ayub_sms($sms_text, $recipients, $ta='pv', $mask='', $type='text')
		{
			
		  $destination = '';
		  if ($ta == 'pv') { # private message (to numbers)
			if (!is_array($recipients)) { # one or more numbers specified in string, comma delimited
			  $recipients = explode(',', $recipients); # make array of numbers
			}
			//print_r(array_filter($recipients, array($this,"validate_msisdn")));die;
			$destination = implode(',', array_filter($recipients, array($this,"validate_msisdn"))); # filter out invalid numbers
			
		  } else { # broadcast message (to group)
			$destination = strtoupper(trim($recipients));
		  }

		
		  if ($destination == '') return false;
		  if ($type != 'flash') $type = 'text';

		  $url = "http://sms.nixtecsys.com/index.php?app=webservices&ta=$ta&u=rajibd2k"
			. "&h=cf433f78aa2da3d4fdf3d9fdef0fbd24771b4c6d&to=" . rawurlencode($destination)
			. "&msg=" . rawurlencode($sms_text) . "&mask=" . rawurlencode($mask)
			. "&type=$type";
		  return @file_get_contents($url);
		  
		  
			
		}
}


?>