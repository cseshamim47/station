<%@ page language="java" contentType="text/html; charset=UTF-8" import="java.util.*"%>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <%
        out.println(request.getParameter("name"));
    %>
</body>
</html>