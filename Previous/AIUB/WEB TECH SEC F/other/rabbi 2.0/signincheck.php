<?php
$con = mysqli_connect('localhost','root','','db');


session_start();
if (isset($_POST['signin'])) {
          
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if( empty($email) || empty($pass) ){
        echo "NUll INPUT";
     }

    $query = "SELECT * FROM who WHERE email='{$email}'";
    $result = mysqli_query($con,$query);
  $row = mysqli_fetch_assoc($result);
  $dbemail=$row['email'];
 $dbpass=$row['password'];
 $name=$row['name'];
     

if ($email != $dbemail){
    echo "email not match";

}

elseif ($pass != $dbpass){
    echo "password not match";

}
if($email == $dbemail && $pass == $dbpass){
    $_SESSION['name']=$name;
    $_SESSION['email']=$dbemail;
   // echo  $_SESSION['email'];
  
  header("location: term_condition.php "); 

}



}
?>