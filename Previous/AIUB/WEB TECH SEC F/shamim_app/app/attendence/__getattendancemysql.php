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
	$xdate=$record['_date'];
	$xtime=$record['_datetime'];
	$enrollid=$record['_enrollid'];	
	$mechineid=$record['_mechineid'];	
	$devicetime = date("H:i:s",strtotime($xdate));	
	
	$isql=mysqli_query($db,"INSERT INTO attdumptemp (ztime,bizid,xenrollid,xaction,xlocationid,xmechineid,xdate,xtime,xonlydate) 
			values('$timestamp','100','$enrollid','$action','$locationid','$mechineid','$xdate','$devicetime','$xdate')");	
	}
	
	$isql=mysqli_query($db,"INSERT INTO edstuatt(ztime,bizid,xid,xdate,xdatetime,xdevice,xbranch,xyear,xtime) select ztime,bizid,xenrollid,xdate,xdate,'Device','Main Campus',(select xcode from secodes where xcodetype='Academic Year' limit 1),xtime from attdumptemp");

		echo 'Success';
	
	}else{
		echo 'Error';
	}


?>