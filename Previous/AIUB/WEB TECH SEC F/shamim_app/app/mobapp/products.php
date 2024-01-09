<?php
	//phpinfo();
	if (isset($_GET['zid'])){
		$zid = $_GET['zid'];
    $db = mysqli_connect("localhost", "dotbdsol_root", "dbs@)!&", "dotbdsol_erp") or die ("Could not connect to server\n"); 

	if (!$db) {
        die('Could not connect to db: ' . mysqli_error());
    }
	
    
    
    $result = mysqli_query($db,"select xitemcode,xdesc,xstdprice,xdp,xmrp from seitem where bizid='$zid'") or die("Cannot execute query: $query\n");  
    
	
    $json_response = (array());
    
    while ($row = mysqli_fetch_row($result)) {
		
        $row_array['xitem'] = $row[0];
        $row_array['xdesc'] = str_replace('"','', $row[1]);
        $row_array['price'] = $row[2];
		$row_array['dealerprice'] = $row[3];
        $row_array['mrpprice'] = $row[4];
        
        
    
        array_push($json_response,$row_array);
    }
    
	echo json_encode(array('products'=>$json_response));
    
    
	mysqli_close($db);
 }

?>