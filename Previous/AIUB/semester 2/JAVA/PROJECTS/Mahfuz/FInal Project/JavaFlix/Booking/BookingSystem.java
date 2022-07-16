package Booking;

import java.util.ArrayList;
import java.util.Scanner;

import Declaration.Admin;
import Declaration.User;
import Implementation.Login;
import UserInterface.UserInterface;

public class BookingSystem { // Fully Operational

    public static int movieIndex = 0;
    public static ArrayList<String> movieArrayList = new ArrayList<String>();
    public static String timingSelected;

    public static boolean TicketBook(User[] users, Admin functionCall) {
        Scanner scanner = new Scanner(System.in);

        for (;;) {
            if (Login.UserLogin(functionCall)) {

                UserInterface.cls();
                UserInterface.BookTickets();
                int movieInput = scanner.nextInt();
                if (movieInput <= 6) {
                    movieInput -= 1;
                    functionCall.AddMovie(Login.currUserNameForMovie, movieArrayList.get(movieInput));
                    movieIndex = movieInput;
                    System.out.println("Your Selected Movie: " + movieArrayList.get(movieIndex));
                    // scanner.nextInt();
                    UserInterface.cls(); // Choosing Timing.
                    UserInterface.Timing();
                    int timeInput = scanner.nextInt();
                    if (timeInput == 1) {
                        functionCall.AddTiming(Login.currUserNameForMovie, "1| Morning: 9:00 AM");
                    }
                    if (timeInput == 2) {
                        functionCall.AddTiming(Login.currUserNameForMovie, "2| Afternoon: 3:00 PM");
                    }
                    if (timeInput == 3) {
                        functionCall.AddTiming(Login.currUserNameForMovie, "3| Evening: 6:00 PM");
                    }

                    UserInterface.cls(); // Choosing #OfTickets & Adding Price.
                    UserInterface.TicketAmountBuy();
                    int ticketInput = scanner.nextInt();
                    if (ticketInput == 1) {
                        functionCall.AddPrice(Login.currUserNameForMovie, "$5");
                    }
                    if (ticketInput == 2) {
                        functionCall.AddPrice(Login.currUserNameForMovie, "$10");
                    }
                    if (ticketInput == 3) {
                        functionCall.AddPrice(Login.currUserNameForMovie, "$15");
                    }
                    if (ticketInput == 4) {
                        functionCall.AddPrice(Login.currUserNameForMovie, "$20");
                    }
                    if (ticketInput == 5) {
                        functionCall.AddPrice(Login.currUserNameForMovie, "$25");
                    }
                    if (ticketInput >= 7) {
                        System.out
                                .println("                                                             Invalid Input!");
                    }
                    Login.currUserNameForMovie = null;

                } else {
                    System.out.println(
                            "                                                            --------Invalid Number !--------");
                }

                UserInterface.cls();
                System.out.println(
                        "                                                    -----------------------------------------------------------------");
                System.out.println(
                        "                                                       |  |                     BOOKING COMPLETE                 |  | ");
                System.out.println(
                        "                                                    -----------------------------------------------------------------");
                System.out.println(" ");
                System.out.println(" ");
                System.out.println();

                return true;

            } else

                return false;
        }

    }
}
