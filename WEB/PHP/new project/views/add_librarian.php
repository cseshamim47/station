<?php
include_once("../controller/view_userCheck.php");
include_once("../controller/userData.php");
include_once("../controller/registrationCheck.php")

?>


<html>
<head>  
    <title>change password</title>
</head>

<body>
    <center>
        <table  height=720 width=1080>
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
				<form action="" method="POST" enctype="">
                            <fieldset>
                                <legend>
                                    <h3>REGISTRATION</h3>
                                </legend>
                                <table>
                                    <tr>
                                        <td>Id</td>
                                        <td>:<input type="text" name="id" value="<?php echo $id ?>" /><br /></td>
                                    </tr>

                                    <tr>
                                        <td>Password</td>
                                        <td>:<input type="password" name="password" value="<?php echo $password ?>" /><br /></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>Confirm Password</td>
                                        <td>:<input type="password" name="confirmPassword" value="<?php echo $confirmPassword ?>" /><br /></td>
                                    </tr>

                                    <tr>
                                        <td>Name</td>
                                        <td>:<input type="text" name="name" value="<?php echo $name ?>" /><br /></td>
                                    </tr>
                                </table>    
                                
                                
                                

                                <fieldset>
                                        <Legend>Gender</Legend>

                                        <input type="radio" name="gender" value="Male" /> Male
                                        <input type="radio" name="gender" value="Female" /> Female
                                        <input type="radio" name="gender" value="Other" /> Other <br>
                                </fieldset><br>

                                <hr />
                                <input type="submit" value="Add" name="submit" />
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