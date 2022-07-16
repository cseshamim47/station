package RegistrationImplementation;

import Essentials.Utility;
import RegistrationDeclaration.*;

import java.util.Scanner;

public class UserRegistration {
    public static void adminRegistration(Admin admin, Admin adminRevoke){
        Scanner scanner = new Scanner(System.in);
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                   |                       ADMIN REGISTRATION                        | ");
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println();
        int hacker = 0;
        for(;;){
            System.out.print("                                                              Please Enter secret key : " );
            String key = scanner.nextLine();
            if(admin.getMasterKey().equals(key)){
                System.out.print("                                                              Enter Username  : ");
                for(;;){
                    String username = scanner.nextLine();
                    if(!adminRevoke.adminUsernameValidation(username)){
                        admin.setUsername(username);
                        break;
                    }
                    else System.out.print("                                                              Enter Unique username : ");
                }

                for(;;){
                    System.out.print("                                                              Enter Password : ");
                    String password = scanner.nextLine();
                    System.out.print("                                                              Re-enter Password : ");
                    if(password.equals(scanner.nextLine())){
                        admin.setPassword(password);
                        break;
                    }
                    else System.out.println("                                                              Password not matched!! Try Again.");
                }
                System.out.println("\n                                                              Registration Successfully completed!!");
                Utility.pause();
                adminRevoke.insertAdmin(admin);
                break;
            }else if(key.equals("0")){
                break;
            }else{
                System.out.println("                                                              Secret Key Mismatched! Try again or enter 0 to exit");
                hacker++;
            }
            if(hacker==3){
                System.out.println();
                System.out.println("                                                              You stupid hacker stay away from us!!");
                System.out.println();
                Utility.pause();
                break;
            }
        }
    }

    public static void userRegistration(User users, Admin admin){
        Utility.cls();
        Scanner scanner = new Scanner(System.in);
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                   |                        USER REGISTRATION                        | ");
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println();
        System.out.print("                                                              Enter Full Name : ");
        users.setFullName(scanner.nextLine());
        System.out.print("                                                              Enter Username  : ");
        for(;;){
            String username = scanner.nextLine();
            if(!admin.usernameValidation(username)){
                users.setUsername(username);
                break;
            }
            else System.out.print("                                                              Enter Unique username : ");
        }
        System.out.print("                                                              Enter Mail Address : ");
        for(;;){
            String email = scanner.nextLine();
            if(email.contains("@")) {
                if (!admin.emailValidation(email)) {
                    users.setMailAddress(email);
                    break;
                } else {
                    System.out.println("\n                                                              This mail is already registered!! ");
                    System.out.print("                                                              Enter Unique Mail Address : ");
                }
            }else{
                System.out.println("\n                                                              The mail you entered is invalid!! ");
                System.out.print("                                                              Enter Valid Mail Address : ");
            }

    }

        for(;;){
            System.out.print("                                                              Enter 11 digit Mobile : +88 ");
            String mobile = scanner.nextLine();
            if(mobile.length() == 11){
                users.setMobile(mobile);
                break;
            }
            else System.out.println("                                                              Wrong mobile number format!! Try Again.");
        }

        for(;;){
            System.out.print("                                                              Enter Password : ");
            String password = scanner.nextLine();
            System.out.print("                                                              Re-enter Password : ");
            if(password.equals(scanner.nextLine())){
                users.setPassword(password);
                System.out.println("\n                                                              Registration Successfully completed!!");
                Utility.pause();
                break;
            }
            else System.out.println("                                                              Password not matched!! Try Again.");
        }
        admin.insertUser(users);
    }
}
