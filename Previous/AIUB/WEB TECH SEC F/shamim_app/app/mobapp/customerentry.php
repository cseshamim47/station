<?php

$postdata=file_get_contents('php://input');

///if(isset($_GET['zid']) && isset($_GET['cusname']) && isset($_GET['mobile1']) && isset($_GET['emp'])){
$db = mysqli_connect("localhost", "dotbdsol_root", "dbs@)!&", "dotbdsol_erp") or die ("Could not connect to server\n");  
 
	if (!$db) {
        die('Could not connect to db: ');
    }
	

$zid="";
$cusname="";
$mob1="";
$mob2="";
$road="";
$point="";
$area="";
$contact="";
$owner="";
$emp="";
$cus=0;
$xcus="";	
$rout="";
$lt="";
$ln="";
	
$data = json_decode($postdata, true);

 if($data!=null){
	if (is_array($data['shopdt'])) { 
	foreach ($data['shopdt'] as $record){
		$zid=$record['zid'];
$cusname=$record['shopname'];
$mob1=$record['cellphone'];
$mob2=$record['cellphone2'];
$point=$record['xpoint'];
$road=$record['road'];
$area=$record['xarea'];
$contact=$record['xcontact'];
$owner=$record['xowner'];
$emp=$record['emp'];
$lt=$record['lt'];
$ln=$record['ln'];
$cus=0;
$xcus=$zid;
$rout=$record['rout'];
		}
	}



$result = mysqli_query($db,"select max(right(xcus,6)) from secus where bizid='$zid'") or die("Cannot execute query!"); 

$numrow=mysqli_num_rows($result);

if ($numrow>0){
		while ($row = mysqli_fetch_row($result)) {
		
        $cus = $row[0];
       
    }
	$cus=$cus+1;
    
}else{
	$cus = 1;
}

$xcus=$xcus.str_pad($cus,6,"0",STR_PAD_LEFT);


$sql=mysqli_query($db,"INSERT INTO secus (ztime,bizid,xcus,xorg,xadd1,xadd2,xpostal,xtitle,xweburl,xphone,xmobile,xgcus,xcontact, xbillingadd,xlt,xln)
		VALUES (now(),'$zid','$xcus','$cusname','$road','$point','$area','$owner','$contact','$mob1','$mob2','Retailer','$emp','$rout','$lt','$ln')");


echo "Success";

}else{
echo "Error";
}

?>