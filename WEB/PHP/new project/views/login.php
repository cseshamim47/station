<?php
include_once("../controller/loginCheck.php")
?>

<html>

<head>
    <title>Login</title>
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
						<H2>LOGIN</H2>
						<form action="" method="POST" enctype="">
							<fieldset>
								<table>
									<tr>
										<td>User Id</td>
										<td>:<input type="text" name="id" value="<?php echo $id ?>" /><br></td>
								    </tr>
									<tr>
										<td>Password</td>
										<td>:<input type="password" name="password" value="<?php echo $password ?>" /><br></td>
								    </tr>
								</table>					   																	 
								<hr />
								<input type="submit" value="Login" name="submit">
							</fieldset>
						</form>
					</td>
				</tr>
				<tr>
					<td align="center"> <a href="https://www.google.com"><img src="googlesignin.png" height="50"
								width="300"></a></td>
				</tr>
				<tr>
					<td align="center"> <a href="https://www.facebook.com"><img src="fbsignin.png" height="50"
								width="300"></a></td>
				</tr>
				<tr height=40>
					<td align="center">Copyright © by Jahidul Islam 2023</td>
				</tr>		
            </table>			
        </center>
</body>

</html>

