import javax.servlet.*;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;
import java.io.IOException;
import java.io.PrintWriter;

@WebServlet("/add")
public class FirstServlet extends HttpServlet {
    public void doPost(HttpServletRequest req, HttpServletResponse res) throws IOException, ServletException {
        int a = Integer.parseInt(req.getParameter("num1"));
        int b = Integer.parseInt(req.getParameter("num2"));

        int c = a+b;
//        System.out.println(c);
        PrintWriter out = res.getWriter();
//        out.println("result is " + c);

        req.setAttribute("c",c);

//        RequestDispatcher rd = req.getRequestDispatcher("sq");
//        rd.forward(req,res);
        res.sendRedirect("sq?c="+c);
    }

    public void doGet(HttpServletRequest req, HttpServletResponse res) throws IOException {
        int a = Integer.parseInt(req.getParameter("num1"));
        int b = Integer.parseInt(req.getParameter("num2"));
        int c = a+b;

        PrintWriter out = res.getWriter();
        HttpSession session = req.getSession(true);

        session.setAttribute("shamim", "session: Shamim is cool!");
        String str = (String) session.getAttribute("shamim");
        out.println(str);

//        ServletContext ctx = getServletContext();
//        String phone = ctx.getInitParameter("phone");
//        out.println(phone);
//
//        ServletConfig cg = getServletConfig();
//        String name = cg.getInitParameter("name");
//        out.println(name);

    }
}