<html>
    <body>

   <fieldset align="center" width=70%  >
    <legend>
        Signup
        </legend>
        <form action="signupcheck.php" method="post" >
   <table align="center" >
    <tr> 
        <td>Name </td>
        <td>: <input type="text" name="u_name" value="" placeholder="User name" > </td>
    </tr>
    <tr>
        <td>Email</td>
        <td>: <input type="email" name="u_email" value="" placeholder="User Email" ></td>
    </tr>
    <tr>
        <td>password</td>
        <td> : <input type="password" name="password" value="" placeholder="Enter password" > </td>
    </tr>
    <tr>
        <td>re-type password</td>
        <td> : <input type="password" name="retypepassword" value="" placeholder="password"> </td>
    <!-- </tr>
    <tr>
        <td>
            User type
        </td>
        <td >
        
        <input type="radio" name="who" value="user">user
        <input type="radio" name="who" value="Admin">Admin

        </td>
    </tr> -->
    <tr>

                                <td>
                                    <input type="submit" name="submit" value="submit"> &nbsp;
                                    <a href="signin.php">sign in</a>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
   </table>
   </form>
   </fieldset>
    </body>
</html>