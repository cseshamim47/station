
package Declaration;

import FileHandling.*;
import Implementation.Login;
import UserInterface.UserInterface;

public class Admin extends User { // inheritance

    // <----- Security Code For Employee Registration ----->
    final String securityCode = "8246";

    public String getSecurityCode() {
        return securityCode;
    }

    // <----- Arrays For Accounts ----->
    User users[] = new User[100]; // Array of object
    Admin admins[] = new Admin[10]; // Array of object
    FileHandling fileHandling = new FileHandling();
    MoviesReader moviesReader = new MoviesReader();

    // <----- User Account Functions -----> [Operational]

    public void AddUser(User user) {
        for (int i = 0; i < users.length; i++) {
            if (users[i] == null) {
                users[i] = user;
                break;
            }
        }
    }

    public void DeleteUser(String username) { // [Operational]
        int x = 100;
        for (int i = 0; i < users.length; i++) {
            if (users[i] != null && users[i].getUsername().equals(username)) {
                users[i] = users[i + 1];
                x = i;
            }
        }
        users[x] = null;
    }

    public void SearchUser(String username) {
        for (int i = 0; i < users.length; i++) {
            if (users[i] != null && users[i].getUsername().equals(username)) {
                UserInterface.cls();

                System.out.println(
                        "                                                    -----------------------------------------------------------------");
                System.out.println(
                        "                                                        |  |                 CUSTOMER INFORMATION           |  | ");
                System.out.println(
                        "                                                    -----------------------------------------------------------------");
                System.out.println(" ");
                System.out.println(" ");
                System.out.println();

                System.out.println();

                System.out.println("                                                               Full Name : "
                        + users[i].getFullName());
                System.out.println("                                                               User Name : "
                        + users[i].getUsername());
                System.out.println("                                                               Email : "
                        + users[i].getMailAddress());
                System.out.println("                                                               Mobile : "
                        + users[i].getMobile());

            }
        }
    }

    // <----- User Verifications ----->

    public boolean usernameVerification(String username) {
        for (int i = 0; i < users.length; i++) {
            if (users[i] != null && users[i].getUsername().equals(username))
                return true;
        }
        return false;
    }

    public boolean useremailVerification(String mail) {
        for (int i = 0; i < users.length; i++) {
            if (users[i] != null && users[i].getMailAddress().equals(mail))
                return true;
        }
        return false;
    }

    public boolean userpasswordVerification(String username, String password) {
        for (int i = 0; i < users.length; i++) {
            if (users[i] != null && users[i].getPassword().equals(password)
                    && users[i].getUsername().equals(username)) {
                Login.verifyUserName = users[i].getUsername();
                return true;
            }
        }
        return false;
    }

    // <----- Admin Accounts ----->

    public void AddAdmins(Admin admin) {
        for (int i = 0; i < admins.length; i++) {
            if (admins[i] == null) {
                admins[i] = admin;
                break;
            }
        }
    }

    // <----- Admin Verifications ----->

    public boolean AdminUsernameVerificatoin(String username) {
        for (int i = 0; i < admins.length; i++) {
            if (admins[i] != null && admins[i].getUsername().equals(username))
                return true;
        }
        return false;
    }

    public boolean AdminPasswordVerification(String password) {
        for (int i = 0; i < admins.length; i++) {
            if (admins[i] != null && admins[i].getPassword().equals(password))
                return true;
        }
        return false;
    }

    // <----- Movie Data ----->
    
    public void AddMovie(String userName, String Movie) {
        for (int i = 0; i < users.length; i++) {
            if (users[i] != null && users[i].getUsername().equals(userName)) {
                users[i].setMovie(Movie);
                break;
            }

        }

    }

    // <----- Timing Data ----->

    public void AddTiming(String userName, String timing) {
        for (int i = 0; i < users.length; i++) {
            if (users[i] != null && users[i].getUsername().equals(userName)) {
                users[i].setTiming(timing);
                break;
            }
        }

    }

    // <----- Price Data ----->

    public void AddPrice(String userName, String price) {
        for (int i = 0; i < users.length; i++) {
            if (users[i] != null && users[i].getUsername().equals(userName)) {
                users[i].setPrice(price);
                break;
            }
        }
    }

    // <----- MyTickets ----->
    public void MyTicket(String username) {

        // System.out.println();
        for (int i = 0; i < users.length; i++) {
            if (users[i] != null && users[i].getUsername().equals(username)) {

                System.out.println(
                        "                                                    -----------------------------------------------------------------");
                System.out.println(
                        "                                                        |  |                     MY TICKET                   |  | ");
                System.out.println(
                        "                                                    -----------------------------------------------------------------");
                System.out.println(" ");
                System.out.println(" ");
                System.out.println();

                System.out.println();
                System.out.println("                                                               Full Name : "
                        + users[i].getFullName());
                System.out.println("                                                               PhoneNumber : "
                        + users[i].getMobile());
                System.out.println("                                                               Movie : "
                        + users[i].getMovie());
                System.out.println("                                                               Timing : "
                        + users[i].getTiming());
                System.out.println("                                                               Price : "
                        + users[i].getPrice());

            }
        }
    }

    // <----- DeleteMyTicket ----->
    public void DeleteMyTicket(String username) {
        for (int i = 0; i < users.length; i++) {
            if (users[i] != null && users[i].getUsername().equals(username)) {
                users[i].setMovie("Not Selected");
                users[i].setPrice("Not Selected");
                users[i].setTiming("Not Selected");
            }
        }
    }

    // <----- CheckTicketsForAdmin ---->

    public void CheckTicket(String username) {
        for (int i = 0; i < users.length; i++) {
            if (users[i] != null && users[i].getUsername().equals(username)) {
                UserInterface.cls();

                System.out.println(
                        "                                                    -----------------------------------------------------------------");
                System.out.println(
                        "                                                        |  |                     CHECK TICKET                  |  | ");
                System.out.println(
                        "                                                    -----------------------------------------------------------------");
                System.out.println(" ");
                System.out.println(" ");
                System.out.println();

                System.out.println();
                System.out.println("                                                               Full Name : "
                        + users[i].getFullName());
                System.out.println("                                                               PhoneNumber : "
                        + users[i].getMobile());
                System.out.println("                                                               Movie : "
                        + users[i].getMovie());
                System.out.println("                                                               Timing : "
                        + users[i].getTiming());
                System.out.println("                                                               Price : "
                        + users[i].getPrice());

            }
        }
    }

    // <----- TicketPrint ----->
    public void printTicket(String username) {
        UserInterface.cls();
        for (int i = 0; i < users.length; i++) {
            if (users[i] != null && users[i].getUsername().equals(username)) {

                fileHandling.writeInFile("\nJavaFlix:\n" + "Customer Name: " + users[i].getFullName() + "\n"
                        + "PhoneNumber : " + users[i].getMobile() + "\n" + "Movie : " + users[i].getMovie() + "\n"
                        + "Timing : " + users[i].getTiming() + "\n" + "Price : " + users[i].getPrice());
                System.out.println(
                        "                                                    -----------------------------------------------------------------");
                System.out.println(
                        "                                                        |  |                   TICKET PRINTED               |  | ");
                System.out.println(
                        "                                                    -----------------------------------------------------------------");
                System.out.println(" ");
                System.out.println(" ");

            }
        }

    }

    // <----- Setting Ticket Environment ----->
    public void setTicketPrint(FileHandling fileHandling) {
        this.fileHandling = fileHandling;

    }

    public FileHandling getPrintTicket() {
        return fileHandling;

    }

    // <----- Setting Movie Reader Environment ----->

    public MoviesReader MovieReader() {
        return moviesReader;

    }

}
