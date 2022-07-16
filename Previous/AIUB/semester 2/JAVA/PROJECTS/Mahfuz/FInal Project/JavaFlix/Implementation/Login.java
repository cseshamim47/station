package Implementation;

import UserInterface.*;
import Declaration.*;
import java.io.Console;
import java.util.Scanner;

public class Login {

        static String username;
        public static String VerifyUser;
        public static String verifyUserName;
        public static String currUserNameForMovie = null;

        // <----- Admin Login Process -----> [Fully Operational]
        public static boolean AdminLogin(Admin functionCall) {
                Scanner scanner = new Scanner(System.in);
                for (;;) {
                        UserInterface.cls();
                        System.out.println();
                        System.out.println(
                                        "                                                    -----------------------------------------------------------------");
                        System.out.println(
                                        "                                                        |  |                ADMINISTRATIVE LOGIN             |  | ");
                        System.out.println(
                                        "                                                    -----------------------------------------------------------------");
                        System.out.println(" ");
                        System.out.println(" ");
                        System.out.println();

                        int count = 0;
                        try {// Will Repeat If Failed...
                                Console console = System.console(); // Password Protection
                                System.out.print(
                                                "                                                       Enter Username:   ");
                                if (functionCall.AdminUsernameVerificatoin(scanner.nextLine())) {
                                        System.out.print(
                                                        "                                                       Enter Password:   ");
                                        char[] password = console.readPassword(); // Hiding Password On Console
                                        String stringPass = String.valueOf(password);
                                        if (functionCall.AdminPasswordVerification(stringPass)) { // Password
                                                                                                  // Verification
                                                UserInterface.cls();
                                                return true;
                                        } else {
                                                System.out.println();

                                                System.out.println(
                                                                "                                                                  Username/Password Incorrect!");
                                                UserInterface.pause();
                                                return false;
                                        }
                                } else {
                                        System.out.println();
                                        System.out.println(
                                                        "                                                                          !!Incorrect Username!!");
                                        UserInterface.pause();
                                        return false;
                                }
                        } catch (Exception ignored) {
                                count++;
                        } finally { // Retry System
                                if (count > 0) {

                                        System.out.print(
                                                        "                                               Enter Username: ");
                                        if (functionCall.AdminUsernameVerificatoin(scanner.nextLine())) {
                                                System.out.print(
                                                                "                                           Enter Password: ");
                                                if (functionCall.AdminPasswordVerification(scanner.nextLine())) {
                                                        System.out.println("logged in");
                                                        return true;
                                                } else {
                                                        System.out.println("Username/Password Incorrect!");
                                                        UserInterface.pause();
                                                        return false;
                                                }
                                        } else {
                                                System.out.println("Incorrect Username");
                                                UserInterface.pause();
                                                return false;
                                        }
                                }
                        }

                }

        }

        // <----- Admin After Login -----> [Fully Operational] // CheckTicket, Print [1
        // Problem left]
        // Ticket, Delete Ticket
        // Active Tickets
        public static void AdminInterface(Admin functionCall) { // After Login
                Scanner scanner = new Scanner(System.in);
                for (;;) {
                        UserInterface.AdminUserInterface();
                        String option = scanner.nextLine();
                        if (option.equals("1")) { // CheckTicket [Operational]
                                UserInterface.cls();
                                System.out.println(
                                                "                                                    -----------------------------------------------------------------");
                                System.out.println(
                                                "                                                        |  |                      CHECK TICKET                 |  | ");
                                System.out.println(
                                                "                                                    -----------------------------------------------------------------");
                                System.out.println(" ");
                                System.out.println(" ");
                                System.out.print(
                                                "                                               Enter Customer Username: ");
                                String search = scanner.nextLine();
                                functionCall.CheckTicket(search);
                                UserInterface.pause();
                                UserInterface.cls();
                                continue;
                        }
                        if (option.equals("2")) { // DeleteTickets [Operationa]
                                UserInterface.cls();

                                System.out.println(
                                                "                                                    -----------------------------------------------------------------");
                                System.out.println(
                                                "                                                        |  |                     CANCEL TICKET                 |  | ");
                                System.out.println(
                                                "                                                    -----------------------------------------------------------------");
                                System.out.println(" ");
                                System.out.println(" ");
                                System.out.print(
                                                "                                               Enter Customer Username : ");
                                String search = scanner.nextLine();
                                functionCall.DeleteMyTicket(search);
                                UserInterface.cls();
                                System.out.println(
                                                "                                                    -----------------------------------------------------------------");
                                System.out.println(
                                                "                                                        |  |             TICKET CANCELLED SUCCESSFULLY          |  | ");
                                System.out.println(
                                                "                                                    -----------------------------------------------------------------");
                                System.out.println(" ");
                                System.out.println(" ");
                                UserInterface.pause();
                                UserInterface.cls();
                                continue;
                        }
                        if (option.equals("3")) { // PrintTickets [Operational]
                                UserInterface.cls();
                                System.out.println(
                                                "                                                    -----------------------------------------------------------------");
                                System.out.println(
                                                "                                                        |  |                PRINT CUSTOMER TICKET              |  | ");
                                System.out.println(
                                                "                                                    -----------------------------------------------------------------");
                                System.out.println(" ");
                                System.out.println(" ");
                                System.out.println();
                                System.out.print(
                                                "                                               Enter Customer Username To Print Ticket: ");

                                String nameSearch = scanner.nextLine();
                                functionCall.printTicket(nameSearch);
                                UserInterface.pause();
                                UserInterface.cls();
                                continue;
                        }

                        if (option.equals("4")) {// Log Out [Operational]
                                UserInterface.cls();
                                System.out.println(
                                                "                                                    -----------------------------------------------------------------");
                                System.out.println(
                                                "                                                        |  |              Account Logout Successful           |  | ");
                                System.out.println(
                                                "                                                    -----------------------------------------------------------------");
                                System.out.println(" ");
                                System.out.println(" ");
                                System.out.println();
                                UserInterface.pause();
                                break;
                        }
                }
        }

        // <----- User Login Process -----> [Fully Operational]
        public static boolean UserLogin(Admin functionCall) {
                Scanner scanner = new Scanner(System.in);
                for (;;) {
                        UserInterface.cls();
                        int count = 0;
                        System.out.println(
                                        "                                                    -----------------------------------------------------------------");
                        System.out.println(
                                        "                                                        |  |                     CUSTOMER LOGIN                |  | ");
                        System.out.println(
                                        "                                                    -----------------------------------------------------------------");
                        System.out.println(" ");
                        System.out.println(" ");

                        try {
                                Console console = System.console();
                                System.out.print(
                                                "                                                       Enter Username:   ");
                                username = scanner.nextLine();
                                if (functionCall.usernameVerification(username)) {
                                        System.out.print(
                                                        "                                                       Enter Password:   ");
                                        char[] password = console.readPassword();
                                        String stringPass = String.valueOf(password);
                                        if (functionCall.userpasswordVerification(username, stringPass)) {
                                                // System.out.println("logged in");
                                                currUserNameForMovie = username;
                                                UserInterface.cls();
                                                return true;
                                        } else {
                                                System.out.println();

                                                System.out.println(
                                                                "                                                                  Username/Password Incorrect!");
                                                UserInterface.pause();
                                                return false;
                                        }
                                } else {
                                        System.out.println();

                                        System.out.println(
                                                        "                                                                          !!Incorrect Username!!");
                                        UserInterface.pause();
                                        return false;
                                }
                        } catch (Exception ignored) {
                                count++;
                        } finally { // Retry System
                                if (count > 0) {
                                        System.out.print(
                                                        "                                              Enter Username:   ");
                                        username = scanner.nextLine();
                                        if (functionCall.usernameVerification(username)) {
                                                System.out.print(
                                                                "                                              Enter Password:   ");
                                                if (functionCall.userpasswordVerification(username,
                                                                scanner.nextLine())) {
                                                        System.out.println(
                                                                        "                                                               - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -");
                                                        System.out.println(
                                                                        "                                                                        |  |               LOGGED IN                | | ");
                                                        System.out.println(
                                                                        "                                                               -----------------------------------------------------------------");
                                                        System.out.println(" ");
                                                        System.out.println(" ");
                                                        return true;
                                                } else {
                                                        System.out.println(
                                                                        "                                                                   Username/Password Incorrect!");
                                                        UserInterface.pause();
                                                        return false;
                                                }
                                        } else {
                                                System.out.println(
                                                                "                                                                            Incorrect Username");
                                                UserInterface.pause();
                                                return false;
                                        }
                                }
                        }
                }
        }

        // <----- Customer After Login -----> [Not Ready] //Now Showing, Book Ticket,

        public static void UserInterface(Admin functionCall) { // [Fully Operational]
                Scanner scanner = new Scanner(System.in);
                for (;;) {
                        UserInterface.UserUserInterface();
                        String option = scanner.nextLine();
                        if (option.equals("1")) { // Account Information: [Operational]
                                functionCall.SearchUser(username);
                                UserInterface.pause();
                                UserInterface.cls();
                        }
                        if (option.equals("2")) { // Now Showing: [Operational]
                                UserInterface.NowShowing();
                                UserInterface.pause();
                                UserInterface.cls();

                        }
                        if (option.equals("3")) { // Show Booked Ticket: [Operational]
                                UserInterface.cls();
                                functionCall.MyTicket(username);
                                UserInterface.pause();
                                UserInterface.cls();

                        }
                        if (option.equals("4")) { // Delete Ticket [Operational]
                                UserInterface.cls();
                                functionCall.DeleteMyTicket(username);
                                System.out.println(
                                                "                                                    -----------------------------------------------------------------");
                                System.out.println(
                                                "                                                        |  |                  Ticket Cancelled                |  | ");
                                System.out.println(
                                                "                                                    -----------------------------------------------------------------");
                                System.out.println(" ");
                                System.out.println(" ");
                                System.out.println();
                                UserInterface.pause();
                                UserInterface.cls();

                        }
                        if (option.equals("5")) { // Close Account [Operational]
                                UserInterface.cls();

                                try {

                                        functionCall.DeleteUser(username);
                                        System.out.println(
                                                        "                                                    -----------------------------------------------------------------");
                                        System.out.println(
                                                        "                                                        |  |                  Close Your Account               |  | ");
                                        System.out.println(
                                                        "                                                    -----------------------------------------------------------------");
                                        System.out.println(" ");
                                        System.out.println(" ");
                                        System.out.println();
                                        System.out.print(
                                                        "                                                         Do you want to Delete Your Account? Y/N : ");
                                        String YN = scanner.nextLine();
                                        if (YN.equals("Y")) {
                                                UserInterface.cls();
                                                functionCall.DeleteUser(username);
                                                System.out.println(
                                                                "                                                    -----------------------------------------------------------------");
                                                System.out.println(
                                                                "                                                        |  |                  Account Closed!               |  | ");
                                                System.out.println(
                                                                "                                                    -----------------------------------------------------------------");
                                                System.out.println(" ");
                                                System.out.println(" ");
                                                System.out.println();
                                                break;

                                        } else {
                                                System.out.println(
                                                                "                                                                   || Thank You For Staying ! :) || ");

                                                System.out.println(
                                                                "\n                                                                 || See You Not For Mind||");
                                        }
                                        UserInterface.pause();
                                        break;

                                } catch (Exception e) {
                                        System.out.println(
                                                        "                                                    -----------------------------------------------------------------");
                                        System.out.println(
                                                        "                                                        |  |              Account Closed Successfully           |  | ");
                                        System.out.println(
                                                        "                                                    -----------------------------------------------------------------");
                                        System.out.println(" ");
                                        System.out.println(" ");
                                        System.out.println();
                                        UserInterface.pause();
                                        break;
                                }

                        }
                        if (option.equals("6")) {// Log Out [Operational]
                                UserInterface.cls();
                                System.out.println(
                                                "                                                    -----------------------------------------------------------------");
                                System.out.println(
                                                "                                                        |  |              Account Logout Successful            |  | ");
                                System.out.println(
                                                "                                                    -----------------------------------------------------------------");
                                System.out.println(" ");
                                System.out.println(" ");
                                System.out.println();
                                UserInterface.pause();
                                break;

                        }
                }
        }
}
