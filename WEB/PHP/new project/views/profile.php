<?php
include_once("../controller/view_userCheck.php");
include_once("../controller/userData.php");
//include_once("../controller/SessionCheck.php");

?>

<html>
    <head>
        <title>Profile</title>
    </head>
    <body>
    <center>
        <table  height=720 width=1080>
            <tr height=70>
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
						<legend> PROFILE </legend>
						<table>				
							<tr>
								<td>ID</td>
								<td align="left"> :<?php echo $user['id'] ?> </td>
                                                
                                <td colspan="2" rowspan="3"> <img src="profilepicture.png"> </td>
							</tr>
							<tr>
								<td>Name</td>
								<td>:<?php echo $user['name'] ?></td>
							</tr>					
								<tr>
								<td style="visibility: collapse">jfjfjf</td>
                                <td style="visibility: collapse">kckkkcv</td>
                                <td align="center"><a href="changeprofilepicture.php">Change </a> </td
							</tr><br>
							<tr>
							</tr>
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