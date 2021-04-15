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

        for(;;){
            Utility.cls();
            Utility.mainMenu();
            String option = input.nextLine();

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
                                adminRevoke.showAlladmin();
                                System.out.println("----------");
                                adminRevoke.showAllUser();
                                Utility.pause();
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

            }
        }



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
