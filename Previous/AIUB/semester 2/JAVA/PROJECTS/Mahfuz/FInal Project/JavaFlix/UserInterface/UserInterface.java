package UserInterface;

import java.util.Scanner;
import Booking.BookingSystem;

public class UserInterface { // Fully Operational

        public static void Greetings() {
                System.out.println(
                                "                                                    -----------------------------------------------------------------");
                System.out.println(
                                "                                                         |||      W E L C O M E   T O   J a v a F l i x      |||   ");
                System.out.println(
                                "                                                    -----------------------------------------------------------------");
                System.out.println(" ");
                System.out.println(" ");

        }

        public static void MainMenu() {

                System.out.println(
                                "                                                    -----------------------------------------------------------------");
                System.out.println(
                                "                                                        |  |                     MAIN MENU                 |  | ");
                System.out.println(
                                "                                                    -----------------------------------------------------------------");
                System.out.println(" ");
                System.out.println(" ");
                System.out.println(
                                "                                                                            |1| Now Showing");
                System.out.println(
                                "                                                                            |2| Sign In / Sign Up");
                System.out.println(
                                "                                                                            |3| Book Ticket");
                System.out.println(
                                "                                                                            |4| About us");
                System.out.println(
                                "                                                                            |0| Exit");

                System.out.print("\n\n -------|| Please Select An Option ||---> ");

        }

        public static void LoginOrRegistrationMenu() {

                System.out.println(
                                "                                                    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -");
                System.out.println(
                                "                                                         |  |                      LOGIN MENU               |  | ");
                System.out.println(
                                "                                                    -----------------------------------------------------------------");
                System.out.println(" ");
                System.out.println(" ");
                System.out.println(
                                "                                                                             |1| Login");
                System.out.println(
                                "                                                                             |2| Registration");
                System.out.println(
                                "                                                                             |3| Main Menu");
                System.out.println();
                System.out.print("\n\n -------|| Please Select An Option ||---> ");

        }

        public static void loginMenu() {

                System.out.println(
                                "                                                    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -");
                System.out.println(
                                "                                                         |  |                    LOGIN MENU                 |  | ");
                System.out.println(
                                "                                                    -----------------------------------------------------------------");
                System.out.println(" ");
                System.out.println(" ");
                System.out.println(
                                "                                                                            |1| Customer Login");
                System.out.println(
                                "                                                                            |2| Employee Login");
                System.out.println(
                                "                                                                            |3| Go Back");
                System.out.println();

                System.out.print("\n\n -------|| Please Select An Option ||---> ");

        }

        public static void registrationMenu() {

                System.out.println(
                                "                                                    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -");
                System.out.println(
                                "                                                          |  |               REGISTRATION MENU                | | ");
                System.out.println(
                                "                                                    -----------------------------------------------------------------");
                System.out.println(" ");
                System.out.println(" ");
                System.out.println(
                                "                                                                           |1| Customer Registration");
                System.out.println(
                                "                                                                           |2| Employee Registration");
                System.out.println(
                                "                                                                           |3| Go Back");
                System.out.println();
                System.out.print("\n\n -------|| Please Select An Option ||---> ");

        }

        public static void AdminUserInterface() {

                System.out.println(
                                "                                                    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -");
                System.out.println(
                                "                                                          |  |                EMPLOYEE MENU                | | ");
                System.out.println(
                                "                                                    -----------------------------------------------------------------");
                System.out.println(" ");
                System.out.println(" ");

                System.out.println(
                                "                                                                           |1| Check Ticket");
                System.out.println(
                                "                                                                           |2| Cancel Tickets");
                System.out.println(
                                "                                                                           |3| Print Customer's Ticket");
                System.out.println(
                                "                                                                           |4| Log Out");
                System.out.println();
                System.out.print("\n\n -------|| Please Select An Option ||---> ");

        }

        public static void UserUserInterface() {

                System.out.println(
                                "                                                    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -");
                System.out.println(
                                "                                                          |  |               CUSTOMER MENU                | | ");
                System.out.println(
                                "                                                    -----------------------------------------------------------------");
                System.out.println(" ");
                System.out.println(" ");
                System.out.println(
                                "                                                                            |1| Account Information");
                System.out.println(
                                "                                                                            |2| Now Showing");
                System.out.println(
                                "                                                                            |3| My Ticket");
                System.out.println(
                                "                                                                            |4| Cancel Ticket");
                System.out.println(
                                "                                                                            |5| Close Account");
                System.out.println(
                                "                                                                            |6| Logout");
                System.out.println();
                System.out.print("\n\n -------|| Please Select An Option ||---> ");

        }

        public static void NowShowing() {
                UserInterface.cls();
                System.out.println(
                                "                                                    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -");
                System.out.println(
                                "                                                         |  |                   NOW SHOWING...               |  | ");
                System.out.println(
                                "                                                    -----------------------------------------------------------------");
                System.out.println(" ");
                for (int i = 0; i < BookingSystem.movieArrayList.size(); i++) {
                        System.out.println("                                                               " + (i + 1)
                                        + " ||  " + BookingSystem.movieArrayList.get(i));
                }

        }

        public static void BookTickets() {
                System.out.println(
                                "                                                    -----------------------------------------------------------------");
                System.out.println(
                                "                                                        |  |                 TICKETS AVAILABLE               |  | ");
                System.out.println(
                                "                                                    -----------------------------------------------------------------");
                System.out.println(" ");
                System.out.println(" ");
                for (int i = 0; i < BookingSystem.movieArrayList.size(); i++) {
                        System.out.println(
                                        "                                                                            "
                                                        + (i + 1) + ". " + BookingSystem.movieArrayList.get(i));
                }

                System.out.print("\n\n -------|| Please Select An Option ||---> ");

        }

        public static void Timing() {

                System.out.println(
                                "                                                    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -");
                System.out.println(
                                "                                                         |  |                  MOVIE TIMING                 |  | ");
                System.out.println(
                                "                                                    -----------------------------------------------------------------");
                System.out.println(" ");
                System.out.println(
                                "                                                                       |1| Morning: [9:00]");
                System.out.println(
                                "                                                                       |2| Afternoon: [3:00]");
                System.out.println(
                                "                                                                       |3| Evening: [6:00]");
                System.out.print("\n\n || Select One Timing || ---> ");

        }

        public static void TicketAmountBuy() {
                System.out.println(
                                "                                                    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -");
                System.out.println(
                                "                                                         |  |                 TICKET BOOKING                 |  | ");
                System.out.println(
                                "                                                    -----------------------------------------------------------------");
                System.out.println(" ");
                System.out.println(
                                "                                                               How Many Ticket Do You Want To Buy? ");
                System.out.println();
                System.out.println(
                                "                                                               Maximum Purchase At A Time: 5");
                System.out.print(
                                "                                                               Enter Ticket Amount Here ---> ");

        }

        public static void AboutUs() {
                System.out.println();
                System.out.println(
                                "                                                    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -");
                System.out.println(
                                "                                                         |  |                   About JavaFlix               |  | ");
                System.out.println(
                                "                                                    -----------------------------------------------------------------");
                System.out.println();

                System.out.println(
                                "                                                                            Version : 3.0.1");
                System.out.println(
                                "                                                                      ||___Developers Involved___||");
                System.out.println();
                System.out.println();
                System.out.println(
                                "                                                                           Middat Ghani Fahim");
                System.out.println(
                                "                                                                           Mahfuzur Rahman Ferdous");
                System.out.println(
                                "                                                                           Sajid Alam");
                System.out.println();
                System.out.println(
                                "                                                    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -");
                System.out.println(
                                "                                                          |  |                  INSTRUCTED BY               |  | ");
                System.out.println(
                                "                                                    -----------------------------------------------------------------");
                System.out.println();
                System.out.println(
                                "                                                                        MD. Mazid-Ul-Haque (Sir)");

        }

        public static void cls() {
                try {
                        new ProcessBuilder("cmd", "/c", "cls", "clear").inheritIO().start().waitFor();
                } catch (Exception ignored) {
                }
        }

        public static void pause() {
                Scanner scanner = new Scanner(System.in);
                System.out.print(
                                "\n                                                                      || Press Any Key To Continue... "
                                                + scanner.nextLine());

        }
}
