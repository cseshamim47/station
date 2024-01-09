<%@ page language="java" contentType="text/html; charset=UTF-8" import="java.util.*" errorPage="error.jsp"%>
<%@ include file="header.jsp" %>
<%-- <%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %> --%>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <%
        int a = 1;
        int b = 2;
        out.println(a+b);
    %>

    <br>

    sum is : <%= a+b %>


    <%
        int k = 10/0;
    %>
</body>
</html>