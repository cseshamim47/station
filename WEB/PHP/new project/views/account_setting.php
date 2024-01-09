<?php
include_once("../controller/view_userCheck.php");
include_once("../controller/userData.php");

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
                    <li> <a href="librarian_dashboard.php">Liabrarian Dashboard</a></li>										                  
                    <li> <a href="profile.php">Profile</a></li>
                    <li> <a href="catalog.php">Catalogue</a></li> 
					<li> <a href="search.php">Search</a></li> 
                    <li> <a href="event.php">Event</a></li>
                    <li> <a href="account_setting.php">Account Settings</a></li>					  					
                    <li> <a href="../controller/logout.php">Logout</a></li>
                </ul>
                </td>
                <td>                    
				<fieldset>
                    <legend>Settings</legend>
                    <li><a href="editprofile.php">Edit Profile</a></li>
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