package Implementations;
import java.util.Scanner;

public class Utility {


    public static void greeting(){
        System.out.println("                                                    -----------------------------------------------------------------");
        System.out.println("                                                   |           W E L C O M E   T O   A I U B   P R I S O N           | ");
        System.out.println("                                                    -----------------------------------------------------------------");
    }

    public static void mainMenu(){
        System.out.println();
        greeting();
        System.out.println("                                                                          Press 0 : Exit Program");
        System.out.println("                                                                          Press 1 : Build a master table");
        System.out.println("                                                                          Press 2 : List a table");
        System.out.println("                                                                          Press 3 : Insert a new entry");
        System.out.println("                                                                          Press 4 : Delete old entry");
        System.out.println("                                                                          Press 5 : Edit an entry");
        System.out.println("                                                                          Press 6 : Search for record");
        System.out.println("                                                                          Press 7 : Check Attendance");
        System.out.println("                                                                          Press 8 : Release Prisoner");
        System.out.println("                                                                          Press 9 : About This Program");
        System.out.print("\n                                                                       Choose Your Option ---------> ");
    }

    public static void masterTable(){
    System.out.println("                                                            ----------------------------------------------------------------------");
    System.out.println("                                                            |                              MASTER TABLE                            | ");
    System.out.println("                                                            ----------------------------------------------------------------------");
    }

    public static void firstRow(){
        System.out.println();
        System.out.println("                               Cell-No\t   Name\t\t\tAge\t   Height\tEyecolor      Punishment Duration    Attendance\n");
        System.out.println();
    }

    public static void listTable(){
        System.out.println("                                                    ----------------------------------------------------------------------");
        System.out.println("                                                   |                               TABLE LIST                             | ");
        System.out.println("                                                    ----------------------------------------------------------------------");
    }

    public static void singleUser(){
        System.out.println("                                                    ----------------------------------------------------------------------");
        System.out.println("                                                   |                               SINGLE USER                             | ");
        System.out.println("                                                    ----------------------------------------------------------------------");
    }

    public static void editAnEntry(){
        System.out.println("                                                    ----------------------------------------------------------------------");
        System.out.println("                                                   |                             EDIT AN ENTRY                             | ");
        System.out.println("                                                    ----------------------------------------------------------------------");
    }

    public static void editPrisonerOptions(){
        System.out.println("                                                                          Press 0 : Main Menu");
        System.out.println("                                                                          Press 1 : Edit Name");
        System.out.println("                                                                          Press 2 : Edit Age");
        System.out.println("                                                                          Press 3 : Edit Height");
        System.out.println("                                                                          Press 4 : Edit Eyecolor");
        System.out.println("                                                                          Press 5 : Edit Punishment Duration");
        System.out.print("\n                                                                       Choose Your Option ---------> ");

    }


    public static void releasePrisoner(){
        System.out.println("                                                    ----------------------------------------------------------------------");
        System.out.println("                                                   |                           RELEASE PRISONER                            | ");
        System.out.println("                                                    ----------------------------------------------------------------------");
    }

    public static void checkAttMsg(){
        System.out.println("                                                    ----------------------------------------------------------------------");
        System.out.println("                                                   |                           CHECK ATTENDANCE                            | ");
        System.out.println("                                                    ----------------------------------------------------------------------");
    }



    public static void aboutUs(){
        System.out.println("                                                    ----------------------------------------------------------------------");
        System.out.println("                                                   |                            ABOUT AIUB PRISON                         | ");
        System.out.println("                                                    ----------------------------------------------------------------------");

        System.out.println("                                                                               Version : 1.0    \n\n");
        System.out.println("                                                           ----------------  D E V E L O P E R S  ---------------- \n");

        System.out.println("                                                                              You");
        System.out.println("                                                                              Your friend");
        System.out.println("                                                                              Your friend er friend");
        System.out.println("                                                                              Your friend er friend");
        System.out.println("\n                                                           -------------  I N S T R U C T E D   B Y  -------------  \n");


    }

    public static void cls() // console based clear screen method
    {
        try { new ProcessBuilder("cmd", "/c", "cls").inheritIO().start().waitFor(); }
        catch (Exception ignored){}
    }

    public static void pause(){
        Scanner scanner = new Scanner(System.in);
        System.out.print("\n                                                                        Press any key to continue >>>> ");
        scanner.nextLine();
    }


    public static void typeWriteSingleTime(String text1,String text2)
    {

        int i;
        System.out.print("                                                                             "+text1);// 80 Spaces for middle
        for (i = 0; i < text2.length(); i++) {
            System.out.print(text2.charAt(i));
            try {
                Thread.sleep(100);//0.1s pause between characters
            } catch (InterruptedException ex) { Thread.currentThread().interrupt(); }
        }
    }
}
