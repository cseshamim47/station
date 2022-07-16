package MetroTickets;

import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Date;

import Essentials.*;
import RegistrationDeclaration.Admin;

import java.time.LocalDate;
import java.util.Scanner;

public class Purchase {

    public static void userBuyATicket(TicketInfo ticketInfo, Admin adminRevoke){

        //********************************************************** OBJECT DECLARATION ***********************************************************************\\

        Scanner input = new Scanner(System.in);
        //********************************************************** TRAVEL INFO CLASS ***********************************************************************\\

        String option;
        System.out.println();
        Utility.cls();

        System.out.println("                                                    ---------------------------------------------------");        ///// 52 Spaces Right
        System.out.println("                                                    |                     Travel Info                  |");      ///// 71 Spaces Right
        System.out.println("                                                    ---------------------------------------------------");
        System.out.print("                                                                         Travel Date : ");

        for(;;){
            LocalDate today = LocalDate.now(); // Create a date object
            System.out.println("a. "  + today); // Display the current date
            System.out.println("b. "  + today.plusDays(1)); // Display the current+1 date
            System.out.println("c. "  + today.plusDays(2)); // Display the current+2 date

            DateFormat dateFormat = new SimpleDateFormat("yyyy-mm-dd"); // Date format for convering to string
            String strToday = dateFormat.format(today); // converting to string

            System.out.println("Enter an option : ");
            option = input.nextLine();
            if(option.equals("a")){
                ticketInfo.setTravelDate(strToday);
                break;
            }else {
                System.out.println("Dear Valued customer, Due to corona pendamic," +
                        "\nAll of servives are closed from "+today.plusDays(1)+ ". Please" +
                        " enter some other date.");
                Utility.pause();
            }

        }
    }



}
