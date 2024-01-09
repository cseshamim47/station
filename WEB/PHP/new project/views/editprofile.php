<?php
include_once("../controller/view_userCheck.php");
include_once("../controller/userData.php");

?>


<html>
<head>  
    <title>edit profile</title>
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
				<fieldset>
                     <legend>EDIT PROFILE</legend>
                     <table>
                         <form action="" method="POST" >                   
                            <tr>
                                <td>Your Id</td>
                                <td>
                                    :<input type="text" name="id" id=""><br>
                                </td>
                            </tr>
                             <tr>
                                    <td>Name</td>
                                    <td>:<input type="text" name="name" value="" /><br /></td>
                                    </tr>
                            <tr>
                                <td>Current Password</td>
                                <td>
                                    :<input type="password" name="password" id=""></br>
                                </td>
                            </tr>
                            <tr>
                                <td>New Password</td>
                                <td>
                                    :<input type="password" name="newpassword" id=""><br>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <input type="submit" name="submit" value="submit" align="center">
                                </td>
                            </tr>                    
                        </form>
                    </table>
                </fieldset>
                </td>
            </tr>
            <tr height=40>
                <td align="center">Copyright © by Jahidul Islam 2023</td>
            </tr>
        </table>
    </center>
    </body>


</html>