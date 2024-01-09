<html>
    <head>
        <title>Registrationg</title>
    </head>
    <body>
        <table border="0" width=100%>
            <tr height=100px>
                <td width=30%></td>
                <td></td>
                <td width=30%></td>
            </tr>
            <tr height=400px>
                <td width=30%></td>
                <td>
                    <form action="regCheck.php" method="post">
                    <table border="1" width=100%>
                        <tr>
                            <td>
                                Name : 
                            </td>
                            <td>
                                <input type="text" name="name" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Username : 
                            </td>
                            <td>
                                <input type="text" name="username" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Email : 
                            </td>
                            <td>
                                <input type="email" name="email" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                password : 
                            </td>
                            <td>
                                <input type="password" name="password" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Phone : 
                            </td>
                            <td>
                                <input type="number" name="phone" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Date of Birth : 
                            </td>
                            <td>
                                <input type="date" name="dob" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Address : 
                            </td>
                            <td>
                                <textarea name="address" cols="20" rows="3"></textarea>
                            </td>
                        </tr>
                        <tr height=50px>
                            <td>
                                <input type="submit" name="submit" value="Register">
                            </td>  
                            <td>
                            <a href="login.php">Already have account?</a>
                            </td>                          
                        </tr>
                    </table>
                    </form>
                </td>
                <td width=30%></td>
            </tr>
            <tr height=100px>
                <td width=30%></td>
                <td></td>
                <td width=30%></td>
            </tr>
        </table>
    </body>
</html>