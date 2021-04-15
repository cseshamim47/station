package RegistrationImplementation;

import RegistrationDeclaration.*;

import java.util.Scanner;

public class UserRegistration {
    public static void adminRegistration(Admin admin, Admin adminRevoke){
        Scanner scanner = new Scanner(System.in);
        System.out.println("-----------------------------------------------------------------");
        System.out.println("|                       ADMIN REGISTRATION                       | ");
        System.out.println("-----------------------------------------------------------------");
        System.out.println();
        int hacker = 0;
        for(;;){
            System.out.print("                 Please Enter secret passphrase : " );
            if(admin.getMasterKey().equals(scanner.nextLine())){
                System.out.print("                     Enter Username  : ");
                for(;;){
                    String username = scanner.nextLine();
                    if(!adminRevoke.adminUsernameValidation(username)){
                        admin.setUsername(username);
                        break;
                    }
                    else System.out.println("Enter Unique username : ");
                }

                for(;;){
                    System.out.print("                     Enter Password : ");
                    String password = scanner.nextLine();
                    System.out.print("                     Re-enter Password : ");
                    if(password.equals(scanner.nextLine())){
                        admin.setPassword(password);
                        break;
                    }
                    else System.out.println("                     Password not matched!! Try Again.");
                }
                adminRevoke.insertAdmin(admin);
                break;
            }else{
                System.out.println("Paraphrase mismatched!!!");
                hacker++;
            }
            if(hacker==3){
                System.out.println("You stupid hacker stay away from us!!");
                break;
            }
        }
    }

    public static void userRegistration(User users, Admin admin){
        Scanner scanner = new Scanner(System.in);
        System.out.println("-----------------------------------------------------------------");
        System.out.println("|                        USER REGISTRATION                       | ");
        System.out.println("-----------------------------------------------------------------");
        System.out.println();
        System.out.print("                     Enter Full Name : ");
        users.setFullName(scanner.nextLine());
        System.out.print("                     Enter Username  : ");
        for(;;){
            String username = scanner.nextLine();
            if(!admin.usernameValidation(username)){
                users.setUsername(username);
                break;
            }
            else System.out.println("Enter Unique username : ");
        }
        System.out.print("                     Enter Mail Address : ");
        for(;;){
            String email = scanner.nextLine();
            if(!admin.emailValidation(email)){
                users.setMailAddress(email);
                break;
            }
            else System.out.println("Enter Unique Mail Address : ");
        }

        for(;;){
            System.out.print("                      Enter 11 digit Mobile : +88 ");
            String mobile = scanner.nextLine();
            if(mobile.length() == 11){
                users.setMobile(mobile);
                break;
            }
            else System.out.println("               Wrong mobile number format!!");
        }

        for(;;){
            System.out.print("                     Enter Password : ");
            String password = scanner.nextLine();
            System.out.print("                     Re-enter Password : ");
            if(password.equals(scanner.nextLine())){
                users.setPassword(password);
                break;
            }
            else System.out.println("                     Password not matched!! Try Again.");
        }
        admin.insertUser(users);
    }
}
