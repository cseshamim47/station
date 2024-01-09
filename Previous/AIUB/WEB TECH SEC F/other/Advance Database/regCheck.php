<?php 
    // session_start();
    // print_r($_REQUEST);
    
    
    foreach($_REQUEST as $key=>$value)
    {
        if(empty($value))
        {
            header('location: reg.php');
            exit;
        }
        
    }

    $gender = "Male";
    $name = explode(' ',$_REQUEST['name']);
    $firstname = $name[0];
    $lastname = "";
    for($i = 1; $i < count($name); $i++)
    {
        $lastname = $lastname." ".$name[$i];
    }

    $date = $_REQUEST['dob'];
    $age = floor((time() - strtotime($date)) / 31556926);

    $phone = $_REQUEST['phone'];
    $email = strtolower(trim($_REQUEST['email']));
    $address = $_REQUEST['address'];
    $password = $_REQUEST['password'];
    $username = strtolower(trim($_REQUEST['username']));


    $conn = oci_connect('scott', 'tiger', 'localhost/xe');
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }

    $query = oci_parse($conn, "SELECT username from cred where username='{$username}'");
    oci_execute($query);
    $row = oci_fetch_array($query, OCI_ASSOC+OCI_RETURN_NULLS);
    if($row)
    {        
        header('location: reg.php?error');
        exit;
    }

    $query = oci_parse($conn, "SELECT email from person where email='{$email}'");
    oci_execute($query);
    $row = oci_fetch_array($query, OCI_ASSOC+OCI_RETURN_NULLS);
    if($row)
    {        
        header('location: reg.php?error');
        exit;
    }

    $query = oci_parse($conn, 'SELECT commonseq.nextval from dual');
    oci_execute($query);
    $row = oci_fetch_array($query, OCI_ASSOC+OCI_RETURN_NULLS);
    $nextval = $row['NEXTVAL'];

    $query = oci_parse($conn, "INSERT INTO CUSTMR VALUES(".$nextval.",'".$gender."',0,0,TO_DATE('".$date."','YY-MM-DD'),NULL)");
    oci_execute($query);

    $queryString = "INSERT INTO PERSON VALUES(".$nextval.",NULL,'".$firstname."','".$lastname."',TO_DATE('".$date."','YY-MM-DD'),".$age.",'".$phone."','".$email."','".$address."')";
    // echo $queryString;
    $query = oci_parse($conn, $queryString);
    oci_execute($query);

    $query = oci_parse($conn, "INSERT INTO CRED VALUES(".$nextval.",NULL,'".$username."','".$password."')");
    oci_execute($query);

    header('location: login.php');






    



?>