import Buy_A_Ticket.BuyATicket;
import Essentials.Utility;

import MetroTickets.Purchase;
import MetroTickets.*;
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
        TicketInfo ticketInfo = new TicketInfo();

        /////////////////////////////////////////////////////////////

        User[] demoUser = new User[2];
        demoUser[0] = new User();
        demoUser[0].setFullName("Md Shamim Ahmed");
        demoUser[0].setUsername("cseshamim");
        demoUser[0].setMailAddress("shamim@mail.com");
        demoUser[0].setMobile("01878042329");
        demoUser[0].setPassword("123");

        demoUser[1] = new User();
        demoUser[1].setFullName("Ahmed Shanto");
        demoUser[1].setUsername("shanto");
        demoUser[1].setMailAddress("shamim@mail.com");
        demoUser[1].setMobile("01878042329");
        demoUser[1].setPassword("123");

        adminRevoke.insertUser(demoUser[0]);
        adminRevoke.insertUser(demoUser[1]);

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
                System.out.println("\n                                        --------------------------------UNDER CONSTRUCTION--------------------------------");
                Utility.pause();
            }
        }

        ////////////////////////////////////////////////////////////////////////////////////



//        usersObject[0] = new User();
//        RegistrationImplementation.UserRegistration.userRegistration(usersObject[0],adminRevoke);
//        usersObject[1] = new User();
////        RegistrationImplementation.UserRegistration.userRegistration(usersObject[1],adminRevoke);
//
//
//        adminObject[0] = new Admin();
//        RegistrationImplementation.UserRegistration.adminRegistration(adminObject[0],adminRevoke);
////        adminObject[1] = new Admin();
////        RegistrationImplementation.UserRegistration.adminRegistration(adminObject[1],adminRevoke);
////        adminRevoke.showAlladmin();
//
//        UserLogin.adminLogin(adminRevoke);
//        UserLogin.adminInterface(adminRevoke);
//        UserLogin.userLogin(adminRevoke);
//        UserLogin.userInterface(adminRevoke);

    }
}
