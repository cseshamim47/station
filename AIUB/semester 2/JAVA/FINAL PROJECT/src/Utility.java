import java.util.Scanner;

public class Utility {
    public static void cls()
    {
        /// For Clear Screen
        try { new ProcessBuilder("cmd", "/c", "cls").inheritIO().start().waitFor(); }
        catch (Exception e){ System.out.println(e); }
    }

    public static void pauseWithMessage(){
        Scanner scanner = new Scanner(System.in);
        System.out.print("                  Press any key to continue >>> ");
        scanner.nextLine();
    }
    public static void pause(){
        Scanner scanner = new Scanner(System.in);
        scanner.nextLine();
    }
}
