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
$ln = "";
$lt = "";

$i = 0;
if (is_array($data['movement'])) { 
	foreach ($data['movement'] as $record){
	$xtime = date('Y-m-d h:i:s', strtotime($record['xtime'])); 	
	
	$terminal= $record['terminalid'];
	$zid = $record['zid'];
	
	$usr= $record['username'];
	$ln = $record['lt'];
	$lt = $record['ln'];
	$i+=1;
	
		}
	}
if ($usr == ""){
	echo "Error";
	exit();
}
$qstring="DELETE FROM emp_movement_temp where bizid='$zid' and username='$usr'";
$sql = mysqli_query($db,$qstring);

if (is_array($data['movement'])) { 
	foreach ($data['movement'] as $recourd){
		
	$xtime  = $recourd['xtime'];	
	$terminal  = $recourd['terminalid'];
	$username = $recourd['username'];
	$ln  = $recourd['ln'];
	$lt = $recourd['lt'];
	
	
	$sql=mysqli_query($db,"INSERT INTO emp_movement_temp (bizid,username,xterminal,xdate,xln,xlt)
		VALUES ('$zid','$username','$terminal','$xtime', '$ln','$lt')") or die("Cannot execute query!");
		
	}
	
	$isql=mysqli_query($db,"INSERT INTO emp_movement select * from 
	emp_movement_temp o where o.bizid='$zid' and o.username='$username'");
	
	echo 'Success';
		
}else{
echo 'Error';
}

/*


$postdata=file_get_contents('php://input');


$db = mysqli_connect("localhost", "dotbdsol_root", "dbs@)!&", "dotbdsol_erp") or die ("Could not connect to server\n");  
 
	if (!$db) {
        die('Could not connect to db: ');
    }
	
$today = date('Y-m-d');

$ztime = date('Y-m-d h:i:sa');	

$xtime = "";
$terninal="";
$zid="100";
$usr="";
$username="";
$ln = "";
$lt = "";
	
$data = json_decode($postdata, true);

if($data!=null){
if (is_array($data['movement'])) { 
	foreach ($data['movement'] as $record){
	$xtime = date('Y-m-d h:i:s', strtotime($record['xtime'])); 	
	
	$terminal= $record['terminalid'];
	$zid = $record['zid'];

	$usr= $record['username'];
	$ln = $record['lt'];
	$lt = $record['ln'];
	$i+=1;
	
		}
	}
if ($usr == ""){
	echo "Error";
	exit();
}


$sql=mysqli_query($db,"INSERT INTO emp_movement_temp (ztime,zid,username,xterminal,xdate,xln,xlt)
		VALUES ('$ztime','$zid','$username','$terminal','$xtime', '$ln','$lt')") or die("Cannot execute query!");


echo "Success";

}else{
echo "Error";
}
*/

?>