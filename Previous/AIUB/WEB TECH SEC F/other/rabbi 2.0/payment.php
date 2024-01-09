<!-- <html>
    <body>
        <title>payment</title>
        
        <table align="center" border="1"  width="60%" >
            <tr style="height: 100;">
                <td >
                   <p align="center" >  <a href="addmone.php">Add money from bank</a> </p>  

                </td>
                <td>
                <p align="center" >   <a href="transfer_money.php">Transfer money to bank</a>  </p> 
                </td>
            </tr>
            <tr style="height: 100;" >
                <td colspan="2" >
                <p align="center" >    <a href="recharge.php">mobile recharge</a> </p> 
                </td>
            </tr>
        </table>
    </body>
</html>

-----------------------------------------------------
-->

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

                <a href="login.php">Logged in as  </a> |
                <a href="logout">LogOut</a>

            </th>

        </tr>

        <tr style="height:200px">
            <td>
            <b>Account</b>
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
            <td>
              

                <table align="center" border="1"  width="60%" >
            <tr style="height: 100;">
                <td >
                   <p align="center" >  <a href="addmoney.php">Add money from bank</a> </p>  

                </td>
                <td>
                <p align="center" >   <a href="transfer_money.php">Transfer money to bank</a>  </p> 
                </td>
            </tr>
            <tr style="height: 100;" >
                <td colspan="2" >
                <p align="center" >    <a href="recharge.php">mobile recharge</a> </p> 
                </td>
            </tr>
        </table>





            </td>
            <td>
                <!-- <?php

                        session_start();
                        if (isset($_SESSION['name'])) {
                            echo "<p>Welcome back," . $_SESSION['name'] . "!</p>";
                        }

                        ?>  --></p>
            </td>


        </tr>
        <tr style="height:50px">
            <td colspan=3 align="center">coppy right (C) 2017</td>
        </tr>


    </table>

</body>

</html>