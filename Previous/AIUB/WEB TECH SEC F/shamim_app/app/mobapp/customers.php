<?php
	
	if (isset($_GET['zid']) && isset($_GET['empid'])){
	
	$zid=$_GET['zid'];
	$emp=$_GET['empid'];
	
	$db = mysqli_connect("localhost", "dotbdsol_root", "dbs@)!&", "dotbdsol_erp") or die ("Could not connect to server\n");  

	if (!$db) {
        die('Could not connect to db: ' . mysqli_error());
    }
	
    
    $result = mysqli_query($db,"select xcus,xorg,xadd1 as address,xmobile,xgcus,xlt,xln from secus where bizid='$zid' and xcontact='$emp' or xgcus='MRP'") or die("Cannot execute query: $query\n");  
    
	
    $json_response = (array());
    
    while ($row = mysqli_fetch_row($result)) {
		
        $row_array['xcus'] = $row[0];
        $row_array['xdesc'] = $row[1];
        $row_array['xadd'] = $row[2];
        $row_array['xmob'] = $row[3];
		$row_array['xgcus'] = $row[4];
        $row_array['lt'] = $row[5];
        $row_array['ln'] = $row[6];
    
        array_push($json_response,$row_array);
    }
    
	echo json_encode(array('customers'=>$json_response));
    
    
	mysqli_close($db);
 }

?>