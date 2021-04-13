import java.util.Scanner;
/*
BUG LIST GOES HERE
*/

/*
        1. Login
        2. Registration
        3. TravelLocation
           i) Starting From
           ii) Destination
        4. Choose Root
            i) Bus
           ii) Train
          iii) Plane
           iv) Ship
        5. Cost Calculation
        6. Confirmation Payment
        7. Print Ticket
*/

public class Start {

    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);
        // LOGIN START //

        try{ Login login = new Login(); }
        catch (Exception ignored){}
        Utility.pauseWithMessage();
        Utility.cls();

        // LOGIN END //

        // RESERVATION START //
        Reservation reservation = new Reservation(1);
        System.out.print("Enter Any Key to Continue.......");
        input.nextLine();
        Utility.cls();
        
        
        System.out.println("              ----------------------------------------------------");
        System.out.println("              |                    CHOOSE ROOT                    |");
        System.out.println("              ----------------------------------------------------");
        
        
        System.out.println("                              Choose Your Root --> ");
        System.out.println("                                     1. Bus");
        System.out.println("                                     2. Train");
        System.out.println("                                     3. Plane");
        System.out.println("                                     4. Ship");
        System.out.print("                                Enter Your Choice : ");
        int root = input.nextInt();
        Utility.cls(); 
        
        ChooseRoot chooseRoot = new ChooseRoot(root);
        System.out.print("Enter Any Key to Continue.......");
        input.nextLine();
        input.nextLine();
        Utility.cls();
        
        CostCalculation cc = new CostCalculation();
        
        
        System.out.println("              ----------------------------------------------------");
        System.out.println("             |                      PAYMENT                        |");
        System.out.println("              ----------------------------------------------------");
        

        System.out.println("                               Choose Payment Method -->");
        System.out.println("                                       1. Bkash");
        System.out.println("                                       2. Rocket");
        System.out.println("                                       3. Credit/Visa");
        System.out.print("                                  Enter Your Choice : ");
        int choice = input.nextInt();
        //Utility.cls();
        Payment p = new Payment(choice);
        System.out.println("Enter Any Key to Continue.......");
        input.nextLine();
        input.nextLine();
        Utility.cls();
        PrintTicket pt = new PrintTicket();
        //System.out.println("Enter Any Key to Continue.......");
        //input.nextLine();
    }

}
