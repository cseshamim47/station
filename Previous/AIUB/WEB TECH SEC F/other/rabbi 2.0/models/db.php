<?php

$dbhost = "127.0.0.1";
$dbuser = "root";
$dbpass = "";
$dbname = "db";

function getConnection(){
    global $dbhost;
    global $dbuser;
    global $dbpass;
    global $dbname;

     $con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
     return $con;
}

?>