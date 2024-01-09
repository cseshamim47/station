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
$invno = "";
$terninal="";
$zid="100";
$usr="";
$username="";
$i = 0;
if (is_array($data['txnorder'])) { 
	foreach ($data['txnorder'] as $record){
	$invno  = $record['invoiceno'];
	$terminal= $record['terminalid'];
	$zid = $record['zid'];
	//$zid = 100001;
	$usr= $record['username'];
	$i+=1;
	
		}
	}
if ($invno == ""){
	echo "Error";
	exit();
}
$qstring="DELETE FROM order_transaction_temp where zid='$zid' and username='$usr'";
$sql = mysqli_query($db,$qstring);

if (is_array($data['txnorder'])) { 
	foreach ($data['txnorder'] as $recourd){
	$inv = $recourd['invoiceno'];
	
	$ssql=mysqli_query($db,"SELECT * FROM order_transaction WHERE invoiceno='$inv' and zid='$zid'");
	
	$numRows = mysqli_num_rows($ssql);
	if ($numRows == 0){
	
	$invoiceno  = $recourd['invoiceno'];
	$invoicesl = $recourd['invoicesl'];
	$terminal  = $recourd['terminalid'];
	$username = $recourd['username'];
	$shopid  = $recourd['shopid'];
	$shopname = $recourd['shopname'];
	$shopadd  = $recourd['shopadd'];
	$prdid = $recourd['prdid'];
	$prdname  = $recourd['prdname'];
	$qty = $recourd['qty'];
	$price = $recourd['price'];
	$salestype = $recourd['salestype'];
	
	
	
	
	$sql=mysqli_query($db,"INSERT INTO order_transaction_temp (ztime,invoiceno,invoicesl,zid,username,shopid,shopname,shopadd,prdid,prdname,qty,price,xstatusord,xordernum,xroword,xterminal,xdate,salestype)
		VALUES ('$ztime','$invoiceno','$invoicesl','$zid','$username','$shopid','$shopname','$shopadd','$prdid'
		,'$prdname','$qty','$price','New','',0,'$terminal','$today', '$salestype')") or die("Cannot execute query!");
		}
	}
	
	$isql=mysqli_query($db,"INSERT INTO order_transaction select * from 
	order_transaction_temp o where o.zid='$zid' and o.username='$username'");
	
	echo 'Success';
		
}else{
echo 'Error';
}



?>

