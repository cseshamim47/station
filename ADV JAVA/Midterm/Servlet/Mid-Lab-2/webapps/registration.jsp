<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
<html>
<head>
    <title>Registration</title>
</head>
<body>

    <h1>Registration Page</h1>

    <form action="RegisterServlet" method="post">
        Email: <input type="text" name="email" required><br>
        Full Name: <input type="text" name="fullName" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Register">
    </form>

</body>
</html>
