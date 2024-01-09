import javax.servlet.http.*;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.Arrays;

public class SecondServlet extends HttpServlet {

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException {
        response.setContentType("text/html");
        PrintWriter writer = response.getWriter();
        HttpSession session = request.getSession();
        Cookie[] cookies = request.getCookies();
        /*for(Cookie c: cookies) {
            System.out.println(c.getValue());
        }*/
        String username = (String) session.getAttribute("username");
        writer.write("Welcome to Home Page " + username + " " + cookies[1].getValue());

    }

    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException {
        response.setContentType("text/html");
        PrintWriter writer = response.getWriter();
        writer.write("Welcome to Home Page");
    }
}
