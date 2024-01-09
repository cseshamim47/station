import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import java.io.IOException;
import java.sql.SQLException;

@WebServlet("/LoginServlet")
public class LoginServlet extends HttpServlet {
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        // Process login logic (validate credentials, check against the database)

        // For example:
        String email = request.getParameter("email");
        String password = request.getParameter("password");
        String fullName = "";

        try {
            fullName = Model.isValidUser(email,password);
        } catch (SQLException e) {
            throw new RuntimeException(e);
        } catch (ClassNotFoundException e) {
            throw new RuntimeException(e);
        }

        if (fullName.length() > 0) {
            HttpSession session = request.getSession();
            session.setAttribute("fullName", fullName);
            response.sendRedirect("welcome.jsp");
        } else {
            response.sendRedirect("login.jsp?error=1");
        }
    }



    private String getFullNameByEmail(String email) {
        // Retrieve full name from the database based on email (you need to implement this part)
        // Return the full name
        return "John Doe"; // Replace with the actual full name
    }
}
