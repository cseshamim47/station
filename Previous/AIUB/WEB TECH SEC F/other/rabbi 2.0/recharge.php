<!-- <html>
    <body>
        <title>
            mobile recharge
        </title>
        <table align="center"  width = 40% >

            <tr align="left">
                <th>Enter Nummber</th>
                <th>Select operator</th>
                <th>Enter Amount</th>
            </tr>
            <tr align="left">
                <td>
                    <input type="number" name="mobile_no" value="number" >

                </td>
                <td>
                    <select name="operator" id="operator">
                        <option value="teletalk">teletalk</option>
                        <option value="gp">grameenphone</option>
                        <option value="robi">Robi</option>
                        <option value="bl">Banglalink</option>
                    </select>
                </td>
                <td>
                    <input type="number" name="amount" value="amount">
                </td>
            </tr>
            <tr align="center" >
                <td colspan="3" >
                  <input type="submit"  name="submit" value="submit" >
                </td>
            </tr>

        </table>
    </body>
</html>
-----------------------------------------
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
            <td> <b>Account</b>
                <hr>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="search.php">Search</a></li>
                    <li><a href="offer.php">Offer</a></li>
                    <li><a href="payment.php">payment</a></li>
                    <li><a href="changepassword.php">Change Password</a></li>
                    <li><a href="logout.php">LogOut</a></li>

                </ul>

            </td>
            <td>
            <table align="center"  width = 40% >

<tr align="left">
    <th>Enter Nummber</th>
    <th>Select operator</th>
    <th>Enter Amount</th>
</tr>
<tr align="left">
    <td>
        <input type="number" name="mobile_no" value="number" >

    </td>
    <td>
        <select name="operator" id="operator">
            <option value="teletalk">teletalk</option>
            <option value="gp">grameenphone</option>
            <option value="robi">Robi</option>
            <option value="bl">Banglalink</option>
        </select>
    </td>
    <td>
        <input type="number" name="amount" value="amount">
    </td>
</tr>
<tr align="center" >
    <td colspan="3" >
      <input type="submit"  name="submit" value="Confirmed!!!" >
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
