import java.io.Console;
public class Login
{
    Login()
    {
        for(;;)
        {
            
            System.out.println("              -----------------------------------------------");
            System.out.println("             |                     LOGIN                      |  ");
            System.out.println("              ------------------------------------------------");
            
            Console console = System.console();
            String username = console.readLine("                             Your Username : ");
            char[] pwd = console.readPassword("                             Your Password : ");
            
            String user_one = "cseshamim47";
            String user_two = "admin";
            String user_one_pwd = "hackedit";
            String user_two_pwd = "admin";
            
            String password = new String(pwd);
            
            if (user_one.equals(username) && user_one_pwd.equals(password) || user_two.equals(username) && user_two_pwd.equals(password) )
            {
                System.out.println();

                System.out.println("              -----------------------------------------------");
                System.out.println("             |              LOGIN SUCCESSFUL !!!              |  ");
                System.out.println("              ------------------------------------------------");

                System.out.println("                             Your Username : " + username);
                System.out.println("                             Your Password : " + password);
                System.out.println();

                break;
            } 
            else
            {
                System.out.println("\n              Incorrect Username or Password. Please try again! \n");
            }
                
               
        }
    }

}
