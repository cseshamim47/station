package Essentials;
import java.util.Scanner;

public class Utility {


    public static void cls()
    {
        try { new ProcessBuilder("cmd", "/c", "cls").inheritIO().start().waitFor(); }
        catch (Exception ignored){}
    }

    public static void pause(){
        Scanner scanner = new Scanner(System.in);
        System.out.print("\n                                                              Press any key to continue >>>> ");
        scanner.nextLine();
    }

    public static void greeting(){
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                   |            W E L C O M E   T O   F L E T C H _ F L E E          | ");
        System.out.println("                                                    -----------------------------------------------------------------");
    }

    public static void mainMenu(){
        System.out.println();
        greeting();
        System.out.println("                                                                          1. Login / Registration");
        System.out.println("                                                                          2. Buy a Ticket");
        System.out.println("                                                                          3. Verify a ticket");
        System.out.println("                                                                          4. About us");
        System.out.print("\n                                                              Choose Your Option ( '0' to exit ) ---------> ");
    }

    // case 1
    public static void registrationLoginMenu(){
        System.out.println();
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                   |                    HOME / REGISTRATION|LOGIN                    | ");
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                                          1. Login");
        System.out.println("                                                                          2. Registration");
        System.out.println("                                                                          3. Main Menu");
        System.out.print("\n                                                              Choose Your Option ---------> ");
    }
//    case 1.1
    public static void loginMenu(){
        System.out.println();
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                   |                 HOME / REGISTRATION|LOGIN / LOGIN               | ");
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                                          1. User Login");
        System.out.println("                                                                          2. Admin Login");
        System.out.println("                                                                          3. Last Menu");
        System.out.print("\n                                                              Choose Your Option ---------> ");
    }

    public static void registrationMenu(){
        System.out.println();
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                   |              HOME / REGISTRATION|LOGIN / REGISTRATION           | ");
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                                          1. User Registration");
        System.out.println("                                                                          2. Admin Registration");
        System.out.println("                                                                          3. Last Menu");
        System.out.print("\n                                                              Choose Your Option ---------> ");
    }

    public static void adminUI(){
        cls();
        System.out.println();
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                   |                           ADMIN PORTAL                          | ");
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                                          1. See all users");
        System.out.println("                                                                          2. Delete a user");
        System.out.println("                                                                          3. Search a user");
        System.out.println("                                                                          4. Logout");
        System.out.print("\n                                                              Choose Your Option ---------> ");
    }

    public static void userUI(){
        cls();
        System.out.println();
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                   |                             USER PORTAL                         | ");
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                                          1. Profile");
        System.out.println("                                                                          2. Ticket Purchased");
        System.out.println("                                                                          3. Logout");
        System.out.print("\n                                                              Choose Your Option ---------> ");
    }

}
