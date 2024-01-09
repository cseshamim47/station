<?php
include_once("../controller/view_userCheck.php");
include_once("../controller/userData.php");

?>

<?php
//session_start();
if(isset($_SESSION['flag'])){
    $_SESSION['pp']="profilepicture.png";
?>



<?php 
if(isset($_POST['submit']))
{
    //$file = $_FILES['file'];
    $filename = $_FILES['file']['name'];

   $tempname = $_FILES['file']['tmp_name'];
    
    move_uploaded_file($tempname,$filename);
    $_SESSION['pp']=$filename;
    //header('location: changeprofilepicture.php?success'); 
}
?>


<html>
<head>
    <title>Change Profile Picture</title>
</head>
<body>
    <center>
        <table height=720 width=1080>
            <tr height=60>
                <td colspan="2"> 
                    <table width = "800">
                    <tr>  
                        <td align="right">
                        <h2>Logged in as || <?php echo $user['name'] ?></h2> 
                        </td>    
                    </tr>    
                    </table>
                </td>
            </tr>
            <tr>
                <td  width="300">   
                <ul>                   
                   <li> <a href="profile.php">Profile</a></li>
					<li> <a href="librarian_dashboard.php">Liabrarian Dashboard</a></li>
					<li> <a href="search.php">Search</a></li> 
                    <li> <a href="account_setting.php">Account Settings</a></li>
					<li> <a href="#">Event Management</a></li>  					
                    <li> <a href="../controller/logout.php">Logout</a></li>
                </ul>
                </td>
                <td>
                <form action="" method="POST" enctype="multipart/form-data">
                      <fieldset>
                        <legend>PROFILE PICTURE</legend>
                        <table>
                           <img height="200" width="200" src="<?php echo $_SESSION['pp'];?>"> <br>
                        <input type="file" name="file" value=""/> <br>
                        <hr>
                        <input type="submit" name="submit" value="Submit"/>
                        </table>
                        
                            
                      </fieldset>
                </form>
                </td>
            </tr>
            <tr height=40>
                <td align="center">Copyright © by Jahidul Islam 2023</td>
            </tr>
        </table>
    </center>
    </body>
</html>

<?php
}else{
    header('location: login.php'); 
}
?>