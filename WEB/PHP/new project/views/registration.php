<?php
include_once("../controller/registrationCheck.php")
?>

<html>
    <head>
          <title>Registration</title>
    </head>

<body>
    <center>
        <table height=720 width=1080>
            <tr height=70>
                <td>
                    <table width="800">
                        <tr>

                            <td align="right">
                                <a href="home.php">Home</a> <a href="login.php">| Login</a> <a
                                    href="registration.php">| Registration</a>
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>      
            <tr>
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

                                    <tr>
                                        <td>Email</td>
                                        <td>:<input type="email" name="email" value="<?php echo $email ?>" /><br /></td>
                                    </tr>


                                </table>    
                                
                                
                                

                                <fieldset>
                                        <Legend>Gender</Legend>

                                        <input type="radio" name="gender" value="Male" /> Male
                                        <input type="radio" name="gender" value="Female" /> Female
                                        <input type="radio" name="gender" value="Other" /> Other <br>
                                </fieldset><br>

                                  <fieldset>
                                  <Legend>Date of Birth</Legend>
                                          <input type="date" name="dob" value=""/> 
                                  </fieldset><br>
                                
                                   <fieldset>
                                   <Legend>User Type</Legend>

                                    <select id="type" name="type" required>
                                    <option value="User">USER</option>
                                    <option value="Admin">ADMIN</option>
                                    </select>

                                </fieldset>

                                <hr />
                                <input type="submit" value="Sign Up" name="submit" />
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
