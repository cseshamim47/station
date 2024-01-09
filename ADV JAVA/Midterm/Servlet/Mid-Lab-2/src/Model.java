import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.stream.Collectors;
import java.util.stream.Stream;

public class Model {

    public static String isValidUser(String email, String pass) throws SQLException, ClassNotFoundException {
        Connection connection = ConnectionManager.getConnection();
        String sql = "SELECT name FROM user where email = ? AND password = ?";
        PreparedStatement preparedStatement = connection.prepareStatement(sql);
        preparedStatement.setString(1, email);
        preparedStatement.setString(2, pass);
        ResultSet resultSet = preparedStatement.executeQuery();
        if(resultSet.next())
        {
            return resultSet.getString("name");
        }else return "";

    }
    public static void create(String email, String name, String pass) throws SQLException, ClassNotFoundException {
        Connection connection = ConnectionManager.getConnection();
        String sql = "INSERT INTO user SET email = ?, name = ?, password = ?";
        PreparedStatement preparedStatement = connection.prepareStatement(sql);
        preparedStatement.setString(1, email);
        preparedStatement.setString(2, name);
        preparedStatement.setString(3, pass);
        preparedStatement.execute();
    }


}