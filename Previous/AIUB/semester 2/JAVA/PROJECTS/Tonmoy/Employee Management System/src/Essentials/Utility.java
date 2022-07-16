package Essentials;
import java.util.Scanner;

public class Utility {


    public static void greeting(){
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                   |             W E L C O M E   T O   J O B   P O R T A L           | ");
        System.out.println("                                                    -----------------------------------------------------------------");
    }

    public static void academicMsg(){
        System.out.println();
        System.out.println("                                                              What is your academic status?");
        System.out.println("                                                              1. College or Equivalent");
        System.out.println("                                                              2. Undergraduate or Equivalent");
        System.out.print("\n                                                              Choose Your Option ---------> ");
    }

    public static void collegeAvailableJobsM(){
        System.out.println();
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                   |                AVAILABLE JOBS FOR COLLEGE LEVEL                 | ");
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                                          1. Cleaning ( 100tk per hour ) ");
        System.out.println("                                                                          2. Waiter ( 112tk per hour )");
        System.out.println("                                                                          3. Shopkeeper ( 125tk per hour )");
        System.out.print("\n                                                              Choose Your Option ---------> ");
    }

    public static void jobPortalM(){
        cls();
        System.out.println();
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                   |                             JOB PORTAL                          | ");
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                                          1. Login");
        System.out.println("                                                                          2. Withdraw");
        System.out.print("\n                                                              Choose Your Option ---------> ");
    }

    public static void undergradAvailableJobs(){
        System.out.println();
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                   |                AVAILABLE JOBS FOR COLLEGE LEVEL                 | ");
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                                          1. Receptionist ( 160tk per hour )");
        System.out.println("                                                                          2. Assistant ( 187tk per hour )");
        System.out.println("                                                                          3. Manager ( 212tk per hour )");
        System.out.print("\n                                                              Choose Your Option ---------> ");
    }

    public static void workingTimesM(){
        System.out.println();
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                   |                             AVAILABLE TIMES                     | ");
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                                          1.   8:00AM - 12:00PM");
        System.out.println("                                                                          2.   12:00PM - 4:00PM");
        System.out.println("                                                                          3.   4:00PM - 8:00PM");
        System.out.print("\n                                                              Choose Your Option ---------> ");
    }

    public static void overtimeM(){
        System.out.println();
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                   |                          AVAILABLE OVERTIMES                     | ");
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                                          1. One hours");
        System.out.println("                                                                          2. Two hours");
        System.out.println("                                                                          3. Three hours");
        System.out.print("\n                                                              Choose Your Option ---------> ");
    }

    public static void withdrawM(){
        System.out.println();
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                   |                              B O O T H                          | ");
        System.out.println("                                                    -----------------------------------------------------------------");
    }

    public static void transactionHistoryM(){
        System.out.println();
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                   |                         TRANSACTION HISTORY                     | ");
        System.out.println("                                                    -----------------------------------------------------------------");
    }

    public static void mainMenu(){
        System.out.println();
        greeting();
        System.out.println("                                                                          1. Login / Registration");
        System.out.println("                                                                          2. Job Portal");
        System.out.println("                                                                          3. About Us");
        System.out.print("\n                                                              Choose Your Option ( '0' to exit ) ---------> ");
    }


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
        System.out.println("                                                                          4. All Transaction History");
        System.out.println("                                                                          5. Logout");
        System.out.print("\n                                                              Choose Your Option ---------> ");
    }

    public static void userUI(){
        cls();
        System.out.println();
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                   |                             USER PORTAL                         | ");
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                                          1. Profile");
        System.out.println("                                                                          2. Withdraw");
        System.out.println("                                                                          3. Transaction History");
        System.out.println("                                                                          4. Logout");
        System.out.print("\n                                                              Choose Your Option ---------> ");
    }



    public static void aboutUs(){
        System.out.println("                                                    ----------------------------------------------------------------------");
        System.out.println("                                                   |                             ABOUT FETCH_FLEE                         | ");
        System.out.println("                                                    ----------------------------------------------------------------------");

        System.out.println("                                                                               Version : 1.0    \n\n");
        System.out.println("                                                           ----------------  D E V E L O P E R S  ---------------- \n");

        System.out.println("                                                                              Kashfia Azad Tuba");
        System.out.println("                                                                              MD Shamim Ahmed");
        System.out.println("                                                                              Samir Hasan");
        System.out.println("                                                                              Sudipta Kumar Das");
        System.out.println("\n                                                           -------------  I N S T R U C T E D   B Y  -------------  \n");


    }

    public static void typeWriteSingleTime(String text1,String text2) // for about us
    {

        int i;
            System.out.print("                                                                             "+text1);// 80 Spaces for middle
            for (i = 0; i < text2.length(); i++) {
                System.out.print(text2.charAt(i));
                try {
                    Thread.sleep(100);//0.5s pause between characters
                } catch (InterruptedException ex) { Thread.currentThread().interrupt(); }
            }


    }

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

    public static void typeWrite(String text1,String text2) //
    {
        cls();
        int i, j;
        for (j = 0; j < 3; j++) {
            System.out.print("\n\n\n\n\n\n\n\t\t\t\t\t\t\t\t\t"+text1); //// System.out.print("\n\n\n\n\t\t\t"+text1);
            for (i = 0; i < text2.length(); i++) {
                System.out.print(text2.charAt(i));
                try {
                    Thread.sleep(110);//0.5s pause between characters
                } catch (InterruptedException ex) { Thread.currentThread().interrupt(); }
            }
            cls();
        }
    }






}
