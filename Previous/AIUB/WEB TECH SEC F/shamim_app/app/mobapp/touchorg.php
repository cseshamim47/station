<?php


$postdata=file_get_contents('php://input');

$db = mysqli_connect("localhost", "dotbdsol_root", "dbs@)!&", "dotbdsol_erp") or die ("Could not connect to server\n"); 
 
	if (!$db) {
        die('Could not connect to db: ');
    }
	
	
$today = date('Y-m-d');

$ztime = date('Y-m-d h:i:sa');

//echo "Today ".$today.  " Datetime ".$ztime; die;

$data = json_decode($postdata, true);
$xtime = "";
$terninal="";
$zid="100";
$usr="";
$username="";
$shopid = "";
$status = "";

$i = 0;
if (is_array($data['touchorg'])) { 
	foreach ($data['touchorg'] as $record){
	$xtime = date('Y-m-d h:i:s', strtotime($record['xtime'])); 	
	
	$terminal= $record['terminalid'];
	$zid = $record['zid'];
	
	$usr= $record['username'];
	$shopid = $record['shopid'];
	$status = $record['status'];
	$i+=1;
	
		}
	}
if ($usr == ""){
	echo "Error";
	exit();
}
$qstring="DELETE FROM emp_touch_customer_temp where bizid='$zid' and username='$usr'";
$sql = mysqli_query($db,$qstring);

if (is_array($data['touchorg'])) { 
	foreach ($data['touchorg'] as $recourd){
		
	$xtime  = $recourd['xtime'];	
	$terminal  = $recourd['terminalid'];
	$username = $recourd['username'];
    $shopid = $record['shopid'];
	$status = $record['status'];
	
	
	$sql=mysqli_query($db,"INSERT INTO emp_touch_customer_temp (bizid,username,xterminal,xdate,xcus,xstatus)
		VALUES ('$zid','$username','$terminal','$xtime', '$shopid','$status')") or die("Cannot execute query!");
		
	}
	
	$isql=mysqli_query($db,"INSERT INTO emp_touch_customer select * from 
	emp_touch_customer_temp o where o.bizid='$zid' and o.username='$username'");
	
	echo 'Success';
		
}else{
echo 'Error';
}



?>