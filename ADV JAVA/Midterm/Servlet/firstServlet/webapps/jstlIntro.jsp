<%@ page language="java" contentType="text/html; charset=UTF-8"
import="java.util.*, java.sql.*"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
       ${name}

       <br>

       <c:out value="I'm using c:out now" />
      <%--  <c:import url="https://www.google.com/"></c:import> --%>

       <br>
       ${student}      <---- this is hash code
        <br>

       ${student.name}

       ${student}
</body>
</html>