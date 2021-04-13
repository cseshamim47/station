import Registration.*;

import java.util.Scanner;

public class Start
{
    public static void main(String[] args)
    {
        Scanner input = new Scanner(System.in);

        Registration userEmptyObj = new User();

        Admin[] adminObject = new Admin[10];
        Admin adminRevoke = new Admin();
        User[] usersObject = new User[100];

//        usersObject[0] = new User();
//        UserRegistration.userRegistration(usersObject[0],adminObject);
//        usersObject[1] = new User();
//        UserRegistration.userRegistration(usersObject[1],adminObject);
//        adminObject.showAllUser();

        adminObject[0] = new Admin();
        UserRegistration.adminRegistration(adminObject[0],adminRevoke);
        adminObject[1] = new Admin();
        UserRegistration.adminRegistration(adminObject[1],adminRevoke);
        adminRevoke.showAlladmin();


    }




}
