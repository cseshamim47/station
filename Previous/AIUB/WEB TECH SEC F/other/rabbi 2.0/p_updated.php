<?php
        $con = mysqli_connect('localhost', 'root', '', 'db');

        session_start();
        if(isset($_POST['up'])){
          $email = $_SESSION['email'];
          $query = "SELECT * FROM who WHERE email='{$email}'";
          $result = mysqli_query($con,$query);
        $row = mysqli_fetch_assoc($result);
              
    // $dbemail=$row['email'];  email ='{$dbemail}',
     $dbpass=$row['password'];
     $dbname=$_SESSION['name'];
     $dbage=$row['age'];
       }

            
  
     $up = "UPDATE who SET name='{$dbname}', password='{$dbpass}', age='{$dbage}'  WHERE name= '{$dbname}' ";
     $result = mysqli_query($con, $up);

    
   if($result) {echo "updated!!!";}
      
       
        ?>
