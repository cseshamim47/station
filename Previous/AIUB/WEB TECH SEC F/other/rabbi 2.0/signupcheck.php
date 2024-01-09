<?php 
//require_once '../models/operation.php';
$con = mysqli_connect('localhost','root','','db');
session_start();

/* if(isset($_REQUEST['submit'])){
    
    $name = $_REQUEST['u_name'];
    $email = $_REQUEST['u_email'];
    $pass = $_REQUEST['password'];
    $repass = $_REQUEST['retypepassword']; */
    if (isset($_POST['submit'])) {
          
        $name = $_POST['u_name'];
        $email = $_POST['u_email'];
        $pass = $_POST['password'];
        $repass= $_POST['retypepassword'];

    
if($name == "" || empty($email) || empty($pass) || empty($repass)){
       echo "NUll INPUT";
    }
    elseif ($pass != $repass){
        echo "password not match";
    }
    elseif(strlen(trim($pass))< 2){
        echo "Password should not less then 8 characters ";
    }

    else {
        $qury="INSERT INTO `who` (`name`, `email`, `password`) VALUES ('$name', '$email', '$pass')";
        $result= mysqli_query($con,$qury);
    }



/* else{

        

        $insert = ['u_name'=> $name,'u_email'=> $email, 'password'=> $pass ];
        $status = adduser($insert);

        if($status){

            header('location: ../views/signin.php');
            
        }else{
            echo "DB error, try again";
        }
}



}
else{
echo "invalid request...";
 */
header("location: signin.php "); 

}
    ?>
