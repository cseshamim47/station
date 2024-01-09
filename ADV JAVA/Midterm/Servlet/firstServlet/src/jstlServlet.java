import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.ServletRequest;
import javax.servlet.ServletResponse;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;

@WebServlet("/jstlIntro")
public class jstlServlet extends HttpServlet {
    public void doGet(HttpServletRequest req, HttpServletResponse res) throws IOException, ServletException {

        req.setAttribute("name","shamim");

        Student st = new Student(10,"md shamim ahmed");
        req.setAttribute("student",st);

        RequestDispatcher rd = req.getRequestDispatcher("jstlIntro.jsp");
        rd.forward(req,res);

    }

}