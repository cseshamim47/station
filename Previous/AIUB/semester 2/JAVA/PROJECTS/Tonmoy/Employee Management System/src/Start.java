import Essentials.Utility;

import JobPortal.JobPortal;
import RegistrationDeclaration.*;
import RegistrationImplementation.*;


import java.util.Scanner;

public class Start
{
    public static int userIndex = 0;
    public static int adminIndex = 0;
    public static void main(String[] args)
    {
        Scanner input = new Scanner(System.in);

        // declaring main objects
        Admin[] adminObject = new Admin[10];
        Admin adminRevoke = new Admin();
        User[] usersObject = new User[100];

        /////////////////////////////////////////////////////////////

//        User[] demoUser = new User[10];
        usersObject[0] = new User();
        usersObject[0].setFullName("Md Shamim Ahmed");
        usersObject[0].setUsername("cseshamim47");
        usersObject[0].setMailAddress("cseshamim47@gmail.com");
        usersObject[0].setMobile("01878042329");
        usersObject[0].setAcademic("College / Equivalent");
        usersObject[0].setPassword("123");
        usersObject[0].setTotalEarning(1000);
        usersObject[0].setAvailableToWithdraw(800);

        usersObject[1] = new User();
        usersObject[1].setFullName("Tonmoy Dey");
        usersObject[1].setUsername("tonmoy");
        usersObject[1].setMailAddress("tonmoy@gmail.com");
        usersObject[1].setMobile("01931117419");
        usersObject[1].setAcademic("Undergraduate / Equivalent");
        usersObject[1].setPassword("123");
        usersObject[1].setTotalEarning(1200);
        usersObject[1].setAvailableToWithdraw(900);

		usersObject[2] = new User();
        usersObject[2].setFullName("Kashfia Azad Tuba");
        usersObject[2].setUsername("tuba");
        usersObject[2].setMailAddress("kashfia12.azad@gmail.com");
        usersObject[2].setMobile("01627765515");
        usersObject[2].setAcademic("Undergraduate / Equivalent");
        usersObject[2].setPassword("tuba");
        usersObject[2].setTotalEarning(1200);
        usersObject[2].setAvailableToWithdraw(900);

        adminRevoke.insertUser(usersObject[0]);
        adminRevoke.insertUser(usersObject[1]);
		adminRevoke.insertUser(usersObject[2]);

        Admin[] demoAdmin = new Admin[1];
        demoAdmin[0] = new Admin();
        demoAdmin[0].setUsername("admin");
        demoAdmin[0].setPassword("admin");

        adminRevoke.insertAdmin(demoAdmin[0]);
        /////////////////////////////////////////////////////////////


        for(;;){
            Utility.cls();
            Utility.mainMenu();
            String option = input.nextLine();
            if(option.equals("0")) break;
            if(option.equals("1")){
                Utility.cls();
                for(;;){
                    Utility.cls();
                    Utility.registrationLoginMenu();
                    option = input.nextLine();
                    if(option.equals("3")){
                        Utility.cls();
                        break;
                    }
                    if(option.equals("1")){
                        for(;;){
                            Utility.cls();
                            Utility.loginMenu();
                            option = input.nextLine();
                            if(option.equals("3")){
                                Utility.cls();
                                break;
                            }
                            if(option.equals("2")){
                                if(UserLogin.adminLogin(adminRevoke)) {
                                    UserLogin.adminInterface(adminRevoke);
                                }
                            }
                            if(option.equals("1")){
                                if(UserLogin.userLogin(adminRevoke)) {
                                    UserLogin.userInterface(adminRevoke);
                                }
                            }
                        }
                    }
                    // registration start
                    if(option.equals("2")){
                        for(;;) {
                            Utility.cls();
                            Utility.registrationMenu();
                            option = input.nextLine();
                            if (option.equals("3")) {
                                break;
                            }
                            if (option.equals("2")) {
                                adminObject[adminIndex] = new Admin();
                                UserRegistration.adminRegistration(adminObject[adminIndex], adminRevoke);
                                adminIndex++;
                            }
                            if (option.equals("1")) {
                                usersObject[userIndex] = new User();
                                UserRegistration.userRegistration(usersObject[userIndex],adminRevoke);
                                adminIndex++;
                            }
                        }
                    }
                    // registration end
                }
            }else if(option.equals("2")){
//                Utility.jobPortalM();
//                String jobPortalOption = input.nextLine();
//                    Utility.pause();
                    boolean trueOrFalse = JobPortal.loginJP(usersObject,adminRevoke);
                    adminRevoke.setUserReveneu(UserLogin.academicUserName,JobPortal.earning,JobPortal.reveneu);
                    JobPortal.earning = 0;
                    JobPortal.reveneu = 0;
                    System.out.println();
                    if(trueOrFalse) Utility.pause();
            }
            else if(option.equals("3")){

                Utility.cls();
                Utility.aboutUs();
                System.out.println("\n                                                           -------------------------------------------------------");
                Utility.typeWriteSingleTime("",                                                                    "SIFAT RAHMAN AHONA");
                System.out.println("\n                                                           -------------------------------------------------------");
                System.out.println("\n");
                Utility.pause();
            }
        }

        ////////////////////////////////////// THE END //////////////////////////////////////////////

    }
}
