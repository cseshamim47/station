<?php

 
if(isset($_GET['license']) && isset($_GET['emi'])){

$license=$_GET['license'];
$emi=$_GET['emi'];
$json_response = (array());


$db = mysqli_connect("localhost", "dotbdsol_root", "dbs@)!&", "dotbdsol_erp") or die ("Could not connect to server\n");  

	if (!$db) {
        die('Could not connect to db: ' . mysqli_error());
    }
	
$result = mysqli_query($db,"select zactive from seuserlic where xlicnum='$license'") or die("Cannot execute query!");  
$active='2';
$numrows = mysqli_num_rows($result);
if ($numrows>0){
while ($row = mysqli_fetch_row($result)) {
		
        $active = $row[0];
       
    }
}

if($active=='0'){ 
//$sql=mysqli_query($db,"update seuserlic set xemino='$emi', zactive='1'
		//where xlicnum='$license'") or die(mysqli_error($db));
		
$result = mysqli_query($db,"select bizid,xlicnum,xterminal,xterminaluser,xemino from seuserlic where xlicnum='$license'") or die("Cannot execute query!");  
    
	
    
    
    while ($row = mysqli_fetch_row($result)) {
		
        $row_array['zid'] = $row[0];
        $row_array['xlicnum'] = $row[1];
		$row_array['xterminal'] = $row[2];
		$row_array['xterminaluser'] = $row[3];
		$row_array['xemino'] = $row[4];
        
        array_push($json_response,$row_array);
    }
    
	   
    
	mysqli_close($db);
	

}else{
	echo "error";
}
}
echo json_encode(array('userlic'=>$json_response));
?>