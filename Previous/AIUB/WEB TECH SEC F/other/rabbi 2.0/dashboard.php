

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<body>
    <table border="1" width=70% align="center">
        <tr style="height:50px"" >
            <th width=20%> <a href=" home.php"><img src="pic.png" alt="logo"></a> </th>
            <th width=60%></th>
            <th width=20%>
       <!--       <?php session_start(); 
                 echo $_REQUEST['name'];?>  -->
                 
                <a href="login.php">Logged in as <?php echo $_SESSION['name'];?> </a> |
                <a href="logout.php">LogOut</a>

            </th>

        </tr>

        <tr style="height:200px">
            <td> <b>Account</b>
                <hr>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="editprofile.php">Edit profile</a></li>
                    <li><a href="search.php">Search</a></li>
                    <li><a href="offer.php">Offer</a></li>
                    <li><a href="payment.php">payment</a></li>
                    <li><a href="changepassword.php">Change Password</a></li>
                    <li><a href="logout.php">LogOut</a></li>

                </ul>

            </td>
            <td>
            
                <h2 >Welcome , Dear <?php echo $_SESSION['name'];?></h2>
              
                
               
            </td>

            <td>

            </td>


        </tr>
        <tr style="height:50px">
            <td colspan=3 align="center">coppy right (C) 2017</td>
        </tr>


    </table>

</body>

</html>