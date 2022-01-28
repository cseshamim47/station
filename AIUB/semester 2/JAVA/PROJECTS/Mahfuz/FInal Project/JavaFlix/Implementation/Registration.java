package Implementation;

import Declaration.*;
import UserInterface.*;
import java.util.Scanner;

public class Registration {

    public static void AdminRegistration(Admin admin, Admin functionCall) {
        UserInterface.cls();
        Scanner scanner = new Scanner(System.in);
        System.out.println(
                "                                                    -----------------------------------------------------------------");
        System.out.println(
                "                                                        |  |                 ADMIN REGISTRATION              |  | ");
        System.out.println(
                "                                                    -----------------------------------------------------------------");
        System.out.println(" ");
        System.out.println(" ");
        int LoginAttempt = 0;
        for (;;) {
            System.out.print("                                                    Enter Security Key:   ");
            String key = scanner.nextLine();
            System.out.println();
            if (admin.getSecurityCode().equals(key)) {
                System.out.print("                                                    Enter Username:   ");
                for (;;) {
                    String username = scanner.nextLine();
                    if (!functionCall.AdminUsernameVerificatoin(username)) {
                        admin.setUsername(username);
                        break;
                    } else
                        System.out.print("                                            Enter Different Username:    ");
                }
                for (;;) {
                    System.out.print("                                                    Enter Password :   ");
                    String password = scanner.nextLine();
                    System.out.print("                                                    Re-enter Password :   ");
                    if (password.equals(scanner.nextLine())) {
                        admin.setPassword(password);
                        break;
                    } else
                        System.out.println(
                                "                                                             Password Incorrect, Try Again...");
                }
                System.out.println(
                        "                                                    -----------------------------------------------------------------");
                System.out.println(
                        "                                                        |  |                REGISTRATION COMPLETED           |  | ");
                System.out.println(
                        "                                                    -----------------------------------------------------------------");
                System.out.println(" ");
                System.out.println(" ");
                UserInterface.pause();
                functionCall.AddAdmins(admin);
                break;
            } else if (key.equals("0")) {
                break;
            } else {
                System.out.println(
                        "                                                   Security Code Incorrect, Try Again or Exit Menu "
                                + "0");
                LoginAttempt++;
            }
            if (LoginAttempt == 3) {
                System.out.println();
                System.out.println(
                        "                                                   Multiple Login Failed, Forced Exit Executed");
                System.out.println();
                UserInterface.pause();
                break;
            }

        }

    }

    public static void UserRegistration(User admin, Admin functionCall) {

        UserInterface.cls();
        Scanner scanner = new Scanner(System.in);
        System.out.println(
                "                                                    -----------------------------------------------------------------");
        System.out.println(
                "                                                        |  |                     CUSTOMER REGISTRATION                 |  | ");
        System.out.println(
                "                                                    -----------------------------------------------------------------");
        System.out.println(" ");
        System.out.println(" ");
        System.out.println();
        System.out.print("                                                             Enter Full Name: ");
        admin.setFullName(scanner.nextLine());
        System.out.print("                                                             Enter Username: ");
        for (;;) {
            String username = scanner.nextLine(); // tonmoy
            if (!functionCall.usernameVerification(username)) { // mil pai taile true : !true = false // !false = true
                admin.setUsername(username);
                break;
            } else
                System.out.print("                                                     Enter Different Username : ");
        }
        System.out.print("                                                             Enter Mail Address: ");
        for (;;) {
            String email = scanner.nextLine();
            if (email.contains("@")) {
                if (!functionCall.useremailVerification(email)) {
                    admin.setMailAddress(email);
                    break;
                } else {
                    System.out.println(
                            "\n                                               Email Address Already In Use, Either Login Or Use A Different Email Address ");
                    System.out
                            .print("                                                 Enter Different Mail Address : ");
                }
            } else {
                System.out.println(
                        "\n                                                                    The Email You Entered Is Invalid");
                System.out.print("                                                     Enter Valid Email Address : ");
            }
        }

        for (;;) {
            System.out.print(
                    "                                                             Enter 11 digit Mobile Number: +88 ");
            String mobile = scanner.nextLine();
            if (mobile.length() == 11) {
                admin.setMobile(mobile);
                break;
            } else
                System.out.println(
                        "                                                                       Incorrect Mobile Number, Try Again...");
        }

        for (;;) {
            System.out.print("                                                         Enter Password : ");
            String password = scanner.nextLine();
            System.out.print("                                                         Re-enter Password : ");
            if (password.equals(scanner.nextLine())) {
                admin.setPassword(password);
                System.out.println(
                        "\n                                                 Registration Successfully completed!!");
                UserInterface.pause();
                break;
            } else
                System.out.println(
                        "                                                                        Passwords Did Not Match, Try Again...");
        }
        functionCall.AddUser(admin);

    }

}
