<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
<html>
<head>
    <title>Welcome</title>
</head>
<body>

    <h1>Welcome Page</h1>

    <c:choose>
        <c:when test="${not empty sessionScope.fullName}">
            <p>Welcome, ${sessionScope.fullName}!</p>
        </c:when>
        <c:otherwise>
            <p>You are not logged in. Please <a href="login.jsp">login</a>.</p>
        </c:otherwise>
    </c:choose>

</body>
</html>
