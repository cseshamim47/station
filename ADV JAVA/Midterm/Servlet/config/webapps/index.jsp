<%@ page import="java.util.Date" %>
<%@ page import="com.Utility" %>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
<%@ page isELIgnored="false" %>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>First App</title>
</head>
<body>

<h1>Second App</h1>

<!-- declaration -->
<%! String name = "Mir Md kawsur";
    String toUpper(String s1) {
        return s1.toUpperCase();
    }
    int i = 100;
%>

<!-- expression -->
<%= toUpper(name) + " " + i %>

<!-- scriptlet -->
<%
String name=(String)session.getAttribute("user");
out.print("Hello "+name);
%>

Today is: <%= new Date() %>

<br>

<%! Utility u = new Utility(); %>

<c:out value="${i}" />

<br><br>

<a href="first.jsp">First JSP Page</a>



</body>
</html>