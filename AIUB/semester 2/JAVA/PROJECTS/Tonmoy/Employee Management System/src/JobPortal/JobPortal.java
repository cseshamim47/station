package JobPortal;

import Essentials.Utility;
import RegistrationDeclaration.Admin;
import RegistrationDeclaration.User;
import RegistrationImplementation.UserLogin;

import java.util.Scanner;

public class JobPortal {
    // method 1 : Login
    // method 2 : withdraw
    public static double reveneu;
    public static double earning;

    public static boolean loginJP(User[] users, Admin adminRevoke){
        Scanner scanner = new Scanner(System.in);
        for(;;) {
            if (UserLogin.userLogin(adminRevoke)) {
                Utility.cls();
                if (UserLogin.academicUser.equals("College / Equivalent")) {
                    Utility.collegeAvailableJobsM();
                    String option = scanner.nextLine();
                    if(option.equals("1") || option.equals("2") || option.equals("3")){
                        Utility.workingTimesM();
                        scanner.nextLine();

                        if(option.equals("1")){ earning = 400; }
                        if(option.equals("2")){ earning = 450; }
                        if(option.equals("3")){ earning = 500; }
                        System.out.print("\n                                                              " +
                                "Do you want to do overtime? (Y/N) : ");
                        String yesNo = scanner.nextLine();
                        if(yesNo.equalsIgnoreCase("y")){
                            Utility.overtimeM();
                            String overtimeOption = scanner.nextLine();
                            if(overtimeOption.equals("1")){ earning += 100; }
                            if(overtimeOption.equals("2")){ earning += 200; }
                            if(overtimeOption.equals("3")){ earning += 300; }
                        }

                        System.out.println("\n                                                              " +
                                "Congratulations you've earned "+earning+ " taka!!!");
                        reveneu = earning;
                        reveneu -= earning * (20d/100);
                        System.out.println("\n                                                              " +
                                "You've actually earned after portal revenue( 20% reduction ) : "+reveneu + " taka");
                        return true;
                    }
                }else if (UserLogin.academicUser.equals("Undergraduate / Equivalent")) {
                    Utility.undergradAvailableJobs();
                    String option = scanner.nextLine();
                    if(option.equals("1") || option.equals("2") || option.equals("3")){
                        Utility.workingTimesM();
                        scanner.nextLine();

                        if(option.equals("1")){ earning = 650; }
                        if(option.equals("2")){ earning = 750; }
                        if(option.equals("3")){ earning = 850; }
                        System.out.print("\n                                                              " +
                                "Do you want to do overtime? (Y/N) : ");
                        String yesNo = scanner.nextLine();
                        if(yesNo.equalsIgnoreCase("y")){
                            Utility.overtimeM();
                            String overtimeOption = scanner.nextLine();
                            if(overtimeOption.equals("1")){ earning += 150; }
                            if(overtimeOption.equals("2")){ earning += 250; }
                            if(overtimeOption.equals("3")){ earning += 350; }
                        }

                        System.out.println("\n                                                              " +
                                "Congratulations you've earned "+earning+ " taka!!!");
                        reveneu = earning;
                        reveneu -= earning * (20d/100);
                        System.out.println("\n                                                              " +
                                "You've actually earned after portal revenue( 20% reduction ) : "+reveneu + " taka");
                        return true;
                    }
                }else return false;
            }else return false;

        }
    }
}
