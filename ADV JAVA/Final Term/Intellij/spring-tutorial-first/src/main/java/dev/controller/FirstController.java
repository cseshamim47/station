package dev.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;

@Controller
public class FirstController {
    @RequestMapping("/first")
    public void first(HttpServletRequest request, HttpServletResponse response) throws IOException{
        String name = request.getParameter("name") == null ? "" : request.getParameter("name");
        PrintWriter pr = response.getWriter();
        pr.write("<h1>Hello Sping wolrd <h1>" + name);
    }

    @RequestMapping("/second")
    public String second()
    {
//        System.out.println("second revoked");
        return "second";
    }

    @RequestMapping("/third")
    public String third(Model model)
    {
        model.addAttribute("name","shamim ahmed shanto");
        return "third";
    }
}
