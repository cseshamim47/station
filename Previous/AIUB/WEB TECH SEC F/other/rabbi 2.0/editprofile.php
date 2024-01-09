<form action="p_updated.php" method="post">
    <fieldset>
        <legend>Edit Profile</legend>

        <?php
        $con = mysqli_connect('localhost', 'root', '', 'db');

        // print_r($_REQUEST);
      // if(isset($_REQUEST['email'])){
        $email=$_SESSION['email'];

     //   $name = $_REQUEST['name'];
      

        //session_start();

        //$_SESSION["name"] = $row['name'];

        $query = "SELECT * FROM who WHERE email ='{$email}'";
        $result = mysqli_query($con,$query);
      $row = mysqli_fetch_assoc($result);
     // $name = $_SESSION['name'];
      $dbemail=$row['email'];
     $dbpassword=$row['password'];
     $dbname=$row['name'];
     $dbage=$row['age'];
     echo $dbname;
      // }
        ?>


                 name ---  email --- password --- age <br>
                <input type="text" name="name" value="<?php echo $dbname ?>">
       <!--       <input type="number" name="email" value="<?php echo $dbemail ?>"> -->
             <input type="number" name="password" value="<?php echo $dbpass ?>">
                <input type="number" name="age" value="<?php echo $dbage ?>">
                <input type="submit" name="up" value="update">

            </fieldset>
            
        </form>


        


    </fieldset>
</form>