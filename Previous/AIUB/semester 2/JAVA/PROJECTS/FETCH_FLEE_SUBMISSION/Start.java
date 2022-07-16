import Buy_A_Ticket.BuyATicket;
import Essentials.Utility;

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

        User[] demoUser = new User[10];
        demoUser[0] = new User();
        demoUser[0].setFullName("Md Shamim Ahmed");
        demoUser[0].setUsername("cseshamim47");
        demoUser[0].setMailAddress("cseshamim47@gmail.com");
        demoUser[0].setMobile("01878042329");
        demoUser[0].setPassword("123");

        demoUser[1] = new User();
        demoUser[1].setFullName("Sudipta Kumar Das");
        demoUser[1].setUsername("yaarian");
        demoUser[1].setMailAddress("dip.kumar020@gmail.com");
        demoUser[1].setMobile("01931117419");
        demoUser[1].setPassword("yaarian");

		demoUser[2] = new User();
        demoUser[2].setFullName("Kashfia Azad Tuba");
        demoUser[2].setUsername("tuba");
        demoUser[2].setMailAddress("kashfia12.azad@gmail.com");
        demoUser[2].setMobile("01627765515");
        demoUser[2].setPassword("tuba");

        adminRevoke.insertUser(demoUser[0]);
        adminRevoke.insertUser(demoUser[1]);
		adminRevoke.insertUser(demoUser[2]);

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
                BuyATicket bat = new BuyATicket();
                bat.userBuyATicket();
                Utility.pause();
            }else if(option.equals("3")){

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
