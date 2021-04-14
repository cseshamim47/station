import Registration.*;
import com.sun.security.jgss.GSSUtil;

import java.io.Console;
import java.util.Scanner;

public class UserLogin {
    public static void adminLogin(Admin adminRevoke){
        Scanner scanner = new Scanner(System.in);
        for(;;){
            int count = 0;
            try{
                Console console = System.console();
                console.readLine("Press any key to continue : ");
                System.out.print("                     Enter Username  : ");
                if(adminRevoke.adminUsernameValidation(scanner.nextLine())){
                    System.out.print("                     Enter Password  : ");
                    char[] password = console.readPassword();
                    String strPassword = String.valueOf(password);
                    if(adminRevoke.adminPasswordValidation(strPassword)){
                        System.out.println("logged in");
                        break;
                    }else System.out.println("Username or password mismatched!!");
                }else System.out.println("No such username found!!");
            }catch (Exception ignored){
                count++;
            }
            finally {
                if(count>0){
                    System.out.print("                     Enter Username  : ");
                    if(adminRevoke.adminUsernameValidation(scanner.nextLine())){
                        System.out.print("                     Enter Password  : ");
                        if(adminRevoke.adminPasswordValidation(scanner.nextLine())){
                            System.out.println("logged in");
                            break;
                        }else System.out.println("Username or password mismatched!!");
                    }else System.out.println("No such username found!!");
                }
            }
        }
    }

    public static void adminInterface(Admin adminRevoke){
        Scanner scanner = new Scanner(System.in);
        for(;;){
            Utility.adminUI();
            String option = scanner.nextLine();
            if(option.equals("1")){
                adminRevoke.showAllUser();
                break;
            }
            if(option.equals("2")){
                for(;;){
                    System.out.print("                     Enter Username  : ");
                    String username = scanner.nextLine();
                    if(adminRevoke.usernameValidation(username)){
                        adminRevoke.deleteUser(username);
                        System.out.println("User removed!!");
                        break;
                    }
                    else System.out.println("User Not found!!");
                }
                break;
            }
            if(option.equals("3")){
                for(;;){
                    System.out.print("                     Enter Username  : ");
                    String username = scanner.nextLine();
                    if(adminRevoke.usernameValidation(username)){
                        adminRevoke.searchUser(username);
                        break;
                    }
                    else System.out.println("User Not found!!");
                }
                break;
            }
        }
    }
}
