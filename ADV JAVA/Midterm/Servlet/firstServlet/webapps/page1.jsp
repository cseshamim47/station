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
       <form method="get" action="page2.jsp">
               <input type="text" name="name">
               <input type="submit" name="submit">
       </form>

       <c:out value="Hello, JSP!" />


       <%
           Connection connection = null;
           PreparedStatement preparedStatement = null;
           ResultSet resultSet = null;

           try {
               // Load the JDBC driver
               Class.forName("com.mysql.cj.jdbc.Driver");

               // Establish a connection
               String url = "jdbc:mysql://localhost:3308/test";
               String username = "root";
               String password = "";
               connection = DriverManager.getConnection(url, username, password);

               // Execute a query
               String sql = "SELECT * FROM user_info";
               preparedStatement = connection.prepareStatement(sql);
               resultSet = preparedStatement.executeQuery();

               // Process the result set
               while (resultSet.next()) {
                   String data = resultSet.getString("name");
                   out.println(data);
                   // Process the retrieved data as needed
               }
           } catch (ClassNotFoundException | SQLException e) {
               e.printStackTrace();
           } finally {
               // Close resources in a finally block to ensure they are closed even if an exception occurs
               if (resultSet != null) {
                   try { resultSet.close(); } catch (SQLException e) { /* ignored */ }
               }
               if (preparedStatement != null) {
                   try { preparedStatement.close(); } catch (SQLException e) { /* ignored */ }
               }
               if (connection != null) {
                   try { connection.close(); } catch (SQLException e) { /* ignored */ }
               }
           }
       %>
</body>
</html>