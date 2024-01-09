import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.*;
import java.io.IOException;
import java.io.PrintWriter;

public class FirstServlet extends HttpServlet {

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException {
        response.setContentType("text/html");
        PrintWriter printWriter = response.getWriter();
        printWriter.write("<form method='post'>");
        printWriter.write("shamim: <input type='text' name='username'>");
        printWriter.write("<br><br>");
        printWriter.write("Password: <input type='password' name='password'>");
        printWriter.write("<br><br>");
        printWriter.write("<input type='submit'>");
        printWriter.write("</form>");

    }

    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        response.setContentType("text/html");
        String username = request.getParameter("username");
        String password = request.getParameter("password");
        PrintWriter printWriter = response.getWriter();
        if (username.equals("admin") && password.equals("admin")) {
            HttpSession session = request.getSession(true);
            Cookie cookie = new Cookie("color", "red");
            cookie.setMaxAge(3600);
            response.addCookie(cookie);
            session.setAttribute("username", username);
            System.out.println(session);
            response.sendRedirect("second");
            /*RequestDispatcher requestDispatcher = request.getRequestDispatcher("second");
            requestDispatcher.forward(request, response);*/
        }
        else {
            printWriter.write("Login Failed...");
        }
    }

}