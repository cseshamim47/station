package Buy_A_Ticket;
import java.util.Scanner;
import Essentials.*;

public class BuyATicket
{
    public void userBuyATicket()
    {


//********************************************************** OBJECT DECLARATION ***********************************************************************\\
        //Utility personal_util = new Utility();
        TrainInfo train = new TrainInfo();
        TravelInfo ti = new TravelInfo();
         Scanner input = new Scanner(System.in);
//********************************************************** TRAVEL INFO CLASS ***********************************************************************\\

        System.out.println();
        Utility.cls();

        System.out.println("                                                    ---------------------------------------------------");        ///// 52 Spaces Right
        System.out.println("                                                    |                     Travel Info                  |");      ///// 71 Spaces Right
        System.out.println("                                                    ---------------------------------------------------");
        System.out.print("                                                                         Travel Date : ");
        String date = input.nextLine();
        //input.nextLine();
        ti.setTravelDate(date);


        System.out.println();
        System.out.println("                                                    ---------------------------------------------------");
        System.out.println("                                                    |                 AVAILABLE Locations               | ");
        System.out.println("                                                    ---------------------------------------------------");
        System.out.println("                                                                         1. Dhaka");
        System.out.println("                                                                         2. Rajshahi");
        System.out.println("                                                                         3. Khulna");
        System.out.println("                                                                         4. Barishal");
        System.out.println("                                                                         5. Chittagong");
        System.out.println("                                                                         6. Sylhet");
        System.out.println("                                                                         7. Mymensingh");
        System.out.println("                                                                         8. Rangpur");



//*******Starting Point*************\\

        System.out.println();
        int flag =0;
        String  from ;

        do {
            System.out.print("                                                              From : ");
            int  startPoint = input.nextInt();

            switch (startPoint)
            {
                case 1:{ti.setStartPoint("Dhaka");from="Dhaka";flag++;break;}
                case 2:{ti.setStartPoint("Rajshahi");from="Rajshahi";flag++;break;}
                case 3:{ti.setStartPoint("Khulna");from="Khulna";flag++;break;}
                case 4:{ti.setStartPoint("Barishal");from="Barishal";flag++;break;}
                case 5:{ti.setStartPoint("Chittagong");from="Chittagong";flag++;break;}
                case 6:{ti.setStartPoint("Sylhet");from="Sylhet";flag++;break;}
                case 7:{ti.setStartPoint("Mymensingh");from="Mymensingh";flag++;break;}
                case 8:{ti.setStartPoint("Rangpur");from="Rangpur";flag++;break;}
                default:{ti.setStartPoint("X");from="X";break;}

            }
            ti.travelLocation(from);
        }
        while(flag == 0);

//*******Ending Point*************\\

        int flag2 =0;
        String to;

        do {
            System.out.print("                                                              To : ");
            int  endPoint = input.nextInt();
            switch (endPoint)
            {
                case 1:{ti.setEndPoint("Dhaka");to="Dhaka";flag2++;break;}
                case 2:{ti.setEndPoint("Rajshahi");to="Rajshahi";flag2++;break;}
                case 3:{ti.setEndPoint("Khulna");to="Khulna";flag2++;break;}
                case 4:{ti.setEndPoint("Barishal");to="Barishal";flag2++;break;}
                case 5:{ti.setEndPoint("Chittagong");to="Chittagong";flag2++;break;}
                case 6:{ti.setEndPoint("Sylhet");to="Sylhet";flag2++;break;}
                case 7:{ti.setEndPoint("Mymensingh");to="Mymensingh";flag2++;break;}
                case 8:{ti.setEndPoint("Rangpur");to="Rangpur";flag2++;break;}
                default:{ti.setEndPoint("X");to="X";break;}

            }


            if (from.equalsIgnoreCase(to))
            {
                ti.setTicketPrice(100);
            }
            else {
                ti.travelLocation(to); /* Passing Ending point to travelLocation inside TravelInfo class*/
            }


        }
        while(flag2 == 0);






        System.out.print("                                                              Number of Members : ");
        int member = input.nextInt();
        ti.setMember(member);
        String[] seats = new String[member];



        Utility.pause();
        input.nextLine();
        //******* CLEAR SCREEN*********\\
        Utility.cls();

        System.out.println();
        System.out.println("                                                    ---------------------------------------------------");
        System.out.println("                                                    |                     CLASS SELECTION              |    ");
        System.out.println("                                                    ---------------------------------------------------");
        System.out.println("                                                                         1.First Class");
        System.out.println("                                                                         2.Business Class");
        System.out.println("                                                                         3.Economic Class");
        System.out.print("\n                                                              Enter Your choice : ");

        int classChoice = input.nextInt();
        ti.classSelect(classChoice); /* Passing value to classSelect inside TravelInfo class*/

        Utility.pause();
        input.nextLine();
        //******* CLEAR SCREEN*********\\
        Utility.cls();

        System.out.println();
        System.out.println("                                                    ---------------------------------------------------");
        System.out.println("                                                    |                     AVAILABLE TIMES              |    ");
        System.out.println("                                                    ---------------------------------------------------");
        System.out.println("\n                                                                         1. 8:00 AM");
        System.out.println("                                                                         2. 12:00 PM");
        System.out.println("                                                                         3. 8:00 PM");
        System.out.print("\n                                                              Enter Your choice : ");

        int timeChoice = input.nextInt();
        input.nextLine();
        ti.selectAvailableTime(timeChoice);

        System.out.print("                                                              Search for Available Trains?? (Y/N) : ");
        String findAns = input.nextLine();
        findAns = findAns.toLowerCase();
        if (findAns.equals("y")) {


            /** ******* USING UTILITY CLASS TYPE WRITING EFFECT ******/

            Utility.typeWrite("Searching",".............");



            System.out.println();
            System.out.println("                                                    ---------------------------------------------------");
            System.out.println("                                                   |                   AVAILABLE TRAINS                 |    ");
            System.out.println("                                                    ---------------------------------------------------");


            train.showTrainList();
            System.out.print("\n                                                              Enter Desired Train No : ");
            int trainName = input.nextInt();

            switch (trainName) //// Setting Train Name
            {
                case 1:{train.setVehicleName("Subarna Express");break;}
                case 2:{train.setVehicleName("Ekota Express");break;}
                case 3:{train.setVehicleName("Parabat Express");break;}
                case 4:{train.setVehicleName("Jayantika Express");break;}
                case 5:{train.setVehicleName("Sundarban Express");break;}
            }
            input.nextLine();

            System.out.print("\n                                                              AC/Non-AC (A/N) : ");

            String acAns = input.nextLine();
            acAns = acAns.toLowerCase();
            if (acAns.equals("a")) { train.setAc("AC");train.setAcCost(200); }
            else {train.setAc("Non-AC"); train.setAcCost(0);}

            Utility.pause();
            //******* CLEAR SCREEN*********\\
            Utility.cls();

            System.out.println();
            System.out.println("                                                    ---------------------------------------------------");
            System.out.println("                                                   |                     SEAT_PLAN                      |  ");
            System.out.println("                                                    ---------------------------------------------------");

            train.showTrainSeatPlan();

            String seat="" ;
            int flag3=0;
            while(true) {
                System.out.println("\n                                                                   Type Your Desired Seat : ");


                for (int i = 0; i < member; i++) {
                    System.out.print("                                                                  Enter seat [" + (i + 1) + "] : ");
                    seats[i] = input.nextLine();
                    //seat = seat + " " + seats[i];



                    //int i = 0;

                    if (seats[i].equals("1C") || seats[i].equals("1c") || seats[i].equals("2F") || seats[i].equals("2f") || seats[i].equals("3D") || seats[i].equals("3d") || seats[i].equals("4H") || seats[i].equals("4h")) {
                        System.out.println("                                                      Seat Has Already Been Booked. Try Something Else.");
                        break;
                        //System.exit(1);
                    } else {
                        for (int j = 0; j < member; j++) {
                            seat = seats[j]+" ";
                            flag3++;
                        }
                        train.setSeatNo(seat);
                    }

                }
                break;

            }


            System.out.println();
            System.out.println("                                                    ---------------------------------------------------");
            System.out.println("                                                   |                 THANKS FOR BOOKING !!              |   ");
            System.out.println("                                                    ---------------------------------------------------");
        }
        else{System.exit(0);} ///// While merging in Switch it should break;


        Utility.pause();
        //******* CLEAR SCREEN*********\\
        Utility.cls();
        System.out.println();
        System.out.println("                                                    ---------------------------------------------------");
        System.out.println("                                                   |                 PAYMENT OPTIONS                    |   ");
        System.out.println("                                                    ---------------------------------------------------");

        System.out.println("                                                                     Total Price : "+ti.trainPayment(train)); /// ****** Calculation for Payment *********\\\\\
        System.out.println("                                                                      1. BKash");
        System.out.println("                                                                      2. Rocket");
        System.out.println("                                                                      3. Credit Card");
        System.out.print("\n                                                              Enter Your choice : ");
        int paymentChoice = input.nextInt();
        input.nextLine();

        switch (paymentChoice)
        {
            case 1:
            {
                System.out.print("                                                              Enter 11 digit BKash Number : +88");
                String num = input.nextLine();
                System.out.print("                                                              Enter BKash Pin : ");
                String bkashPin = input.nextLine();
                ti.setPhoneNumber(num);
                break;
            }
            case 2:
            {
                System.out.print("                                                              Enter 11 digit BKash Number : +88");
                String num = input.nextLine();
                System.out.print("                                                              Enter Rocket Pin : ");
                String rocketPin = input.nextLine();
                ti.setPhoneNumber(num);
                break;
            }
            case 3:
            {
                System.out.print("                                                              Enter Credit Card Number : ");
                String num = input.nextLine();
                ti.setPhoneNumber(num);
                break;
            }
            default:{
                System.out.println("                                                              Please Choose a valid Option..............");
            }
        }
        System.out.println();


        System.out.println("                                                    ---------------------------------------------------");
        System.out.println("                                                   |                  PAYMENT SUCCESSFUL                |   ");
        System.out.println("                                                    ---------------------------------------------------");



        Utility.pause();
        //******* CLEAR SCREEN*********\\
        Utility.cls();
        Utility.typeWrite("Loading",">>>>>>>>>>>>>");

        System.out.println("                                                    ----------------------------------------------------------------");
        System.out.println("                                                   |                           PRINT TICKET                          |    ");
        System.out.println("                                                    ----------------------------------------------------------------");

        System.out.print("                                                    Train Name      : "+train.getVehicleName()+"     Seat No        : "); for (int k=0;k<member;k++){ System.out.print(seats[k]+" "); }
        System.out.println("                                                                                                       " +
                "\t\t\t\t\tDeparture Date  : "+ti.getTravelDate()+"               Departure Time : "+ti.getAvailableTime());
        System.out.println("                                                    Departure From  : "+ti.getStartPoint()+"                 Destination     : "+ti.getEndPoint());
        System.out.println("                                                    AC/Non-AC       : "+train.getAc()+"                    Passengers         : "+ti.getMember());
        System.out.println("                                                    Ticket Price    : "+ti.getTicketPrice()+"                 Total Cost     : "+ti.getTotalPrice());
        System.out.println("                                                    Class           : "+ti.getClassType()+"        Verification Code : "+ti.getPhoneNumber());

        System.out.println();
        train.showMySeat(seats,member); //// Call to show the seat I've chosen


                /*
                /////// ******************************************** TESTING ************************************************************\\


                System.out.println("\n\n\nTour Details---------------------------------------");
                System.out.println("Tax = "+ti.getTax());
                System.out.println("Total Price = "+ti.getTotalPrice());
                System.out.println("Phone Number = "+ti.getPhoneNumber());
                System.out.println("Date = "+ti.getTravelDate());
                System.out.println("Start Point = "+ti.getStartPoint());
                System.out.println("End Point = "+ti.getEndPoint());
                System.out.println("Ticket Price = "+ti.getTicketPrice());
                System.out.println("Departure Time = "+ti.getAvailableTime());
                System.out.println("Member = "+ti.getMember());
                System.out.println("Class Name : "+ti.getClassType());

                System.out.println("*****************************************************");

                System.out.println("\nTrain Details-----------------------------------------");
                System.out.println("AC/Non-AC = "+train.getAc());
                System.out.println("Seat No = "+train.getSeatNo());
                System.out.println("Food Cost = "+train.getFoodCost());
                System.out.println("Vehicle Name = "+train.getVehicleName());
                System.out.println("Vehicle Type = "+train.getVehicleType());
                System.out.println("Ac Cost = "+train.getAcCost());
                System.out.println("Train Seat = "+train.getSeatNo());
                ///////********* Class Insertion ********\\
                System.out.println("Total Price Part 2 == == ==     "+ ti.getTotalPrice());
                /// ****************** Verification Code ***************************\\\\\\\
                try{ System.out.println("Verification Code = "+ti.getPhoneNumber().substring(6,10));}catch(Exception e){System.out.println();}
                 */


    }
}
