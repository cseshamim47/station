import java.util.Scanner;

public class Utility {


    public static void cls()
    {
        try { new ProcessBuilder("cmd", "/c", "cls").inheritIO().start().waitFor(); }
        catch (Exception ignored){}
    }

    public static void pause(){
        Scanner scanner = new Scanner(System.in);
        System.out.println("Press any key to continue >>>> ");
        scanner.nextLine();
    }

    public static void greeting(){
        System.out.println("-----------------------------------------------------------------");
        System.out.println("|                      WELCOME TO FETCH FLEE                    | ");
        System.out.println("-----------------------------------------------------------------");
    }

    public static void mainMenu(){
        System.out.println("                    Choose Your Option --------->");
        System.out.println("                    1. Registration/Login");
        System.out.println("                    2. Purchase A Ticket");
        System.out.println("                    3. Verify a Ticket");
        System.out.println("                    4. Contact Us");
    }

    public static void registrationLoginMenu(){
        System.out.println("                    Choose Your Option --------->");
        System.out.println("                    1. Login");
        System.out.println("                    2. Registration");
        System.out.println("                    3. Main Menu");
    }

    public static void LoginMenu(){
        System.out.println("                    Choose Your Option --------->");
        System.out.println("                    1. User Login");
        System.out.println("                    2. Admin Login");
        System.out.println("                    3. Main Menu");
    }

    public static void registrationMenu(){
        System.out.println("                    Choose Your Option --------->");
        System.out.println("                    1. User Registration");
        System.out.println("                    2. Admin Registration");
        System.out.println("                    3. Main Menu");
    }

}
