package RegistrationImplementation;

import Essentials.*;
import RegistrationDeclaration.*;
import java.io.Console;
import java.util.Scanner;

public class UserLogin {

    static String username;

    public static boolean adminLogin(Admin adminRevoke){
        Scanner scanner = new Scanner(System.in);
        for(;;){
            Utility.cls();
            System.out.println();
            System.out.println("                                                    -----------------------------------------------------------------");
            System.out.println("                                                   |         HOME / REGISTRATION|LOGIN / LOGIN / ADMIN LOGIN         | ");
            System.out.println("                                                    -----------------------------------------------------------------");
            System.out.println();

            int count = 0;
            try{
                Console console = System.console();
                System.out.print("                                                              Enter Username  : ");
                if(adminRevoke.adminUsernameValidation(scanner.nextLine())){
                    System.out.print("                                                              Enter Password  : ");
                    char[] password = console.readPassword();
                    String strPassword = String.valueOf(password);
                    if(adminRevoke.adminPasswordValidation(strPassword)){
                        System.out.println("logged in");
                        return true;
                    }else{
                        System.out.println("                                                              Username or password mismatched!!");
                        Utility.pause();
                        return false;
                    }
                }else{
                    System.out.println("                                                              No such username found!!");
                    Utility.pause();
                    return false;
                }
            }catch (Exception ignored){
                count++;
            }
            finally {
                if(count>0){
                    System.out.print("                                                              Enter Username  : ");
                    if(adminRevoke.adminUsernameValidation(scanner.nextLine())){
                        System.out.print("                                                              Enter Password  : ");
                        if(adminRevoke.adminPasswordValidation(scanner.nextLine())){
                            System.out.println("logged in");
                            return true;
                        }else{
                            System.out.println("                                                              Username or password mismatched!!");
                            Utility.pause();
                            return false;
                        }
                    }else{
                        System.out.println("                                                              No such username found!!");
                        Utility.pause();
                        return false;
                    }
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
                Utility.pause();
                continue;
            }
            if(option.equals("2")){
                for(;;){

                    System.out.print("                                                              Enter Username  : ");
                    String username = scanner.nextLine();
                    if(adminRevoke.usernameValidation(username)){
                        adminRevoke.deleteUser(username);
                        System.out.println("                                                              User successfully removed!!");
                        Utility.pause();
                        break;
                    }
                    else System.out.println("                                                              User Not found!!");
                }
                continue;
            }
            if(option.equals("3")){
                for(;;){
                    System.out.print("                                                              Enter Username  : ");
                    String username = scanner.nextLine();
                    if(adminRevoke.usernameValidation(username)){
                        adminRevoke.searchUser(username);
                        Utility.pause();
                        break;
                    }
                    else{
                        System.out.println("                                                              User Not found!!");
                        Utility.pause();
                        break;
                    }
                }
                continue;
            }
            if(option.equals("4")){
                System.out.print("\n                                                              Successfully Logged Out!!! ");
                Utility.pause();
                break;
            }
        }
    }

    public static boolean userLogin(Admin adminRevoke){
        Scanner scanner = new Scanner(System.in);
        for(;;){
            Utility.cls();
            int count = 0;
            System.out.println();
            System.out.println("                                                    -----------------------------------------------------------------");
            System.out.println("                                                   |         HOME / REGISTRATION|LOGIN / LOGIN / USER LOGIN           | ");
            System.out.println("                                                    -----------------------------------------------------------------");
            System.out.println();

            try{
                Console console = System.console();
                System.out.print("                                                              Enter Username  : ");
                username = scanner.nextLine();
                if(adminRevoke.usernameValidation(username)){
                    System.out.print("                                                              Enter Password  : ");
                    char[] password = console.readPassword();
                    String strPassword = String.valueOf(password);
                    if(adminRevoke.passwordValidation(strPassword)){
                        System.out.println("logged in");
                        return true;
                    }else{
                        System.out.println("                                                              Username or password mismatched!!");
                        Utility.pause();
                        return false;
                    }
                }else{
                    System.out.println("                                                              No such username found!!");
                    Utility.pause();
                    return false;
                }
            }catch (Exception ignored){
                count++;
            }
            finally{
                if(count>0){
                    System.out.print("                                                              Enter Username  : ");
                    username = scanner.nextLine();
                    if(adminRevoke.usernameValidation(username)){
                        System.out.print("                                                              Enter Password  : ");
                        if(adminRevoke.passwordValidation(scanner.nextLine())){
                            System.out.println("logged in");
                            return true;
                        }else{
                            System.out.println("                                                              Username or password mismatched!!");
                            Utility.pause();
                            return false;
                        }
                    }else{
                        System.out.println("                                                              No such username found!!");
                        Utility.pause();
                        return false;
                    }
                }
            }
        }
    }

    public static void userInterface(Admin adminRevoke){
        Scanner scanner = new Scanner(System.in);
        for(;;){
            Utility.userUI();
            String option = scanner.nextLine();
            if(option.equals("1")){
                adminRevoke.searchUser(username);
                Utility.pause();
                continue;
            }
            if(option.equals("2")){
                // ticket purchased
                break;
            }
            if(option.equals("3")){
                System.out.print("\n                                                              Successfully Logged Out!!! ");
                Utility.pause();
                break;
            }
        }
    }
}
