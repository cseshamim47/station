<?php
    // Connects to the XE service (i.e. database) on the "localhost" machine
    $conn = oci_connect('scott', 'tiger', 'localhost/xe');
    if (!$conn) {
        $e = oci_error();
        trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $query = oci_parse($conn, "SELECT username from cred where username='{$username}' and password='{$password}'");
    oci_execute($query);
    $row = oci_fetch_array($query, OCI_ASSOC+OCI_RETURN_NULLS);
    if($row == 0)
    {        
        echo "<b>Username & passowrd Does not match</b></br>";
        ?>
            <a href="login.php">Go back</a>
<?php 
        exit;
    }else 
    {
        echo "logged in!!";
    }
    
?>