package ourPackage;
import java.util.Random;
import java.util.Scanner;

public abstract class Information{
	
	Random ran = new Random();
	Scanner input = new Scanner(System.in);
	static {
		System.out.println("\tWelcome to the official site of bookyourseat.com\n");
			}
	
	public void showOption () {
		System.out.println("\t\nSelect Service");
		System.out.println("1. Book seat");
		System.out.println("2. Seat availbility");
		System.out.println("3. Seat Price");
		System.out.println("4. Show Upcoming Matches");
		System.out.println("5. Exit");
	}
	
	abstract void booking();
	abstract void seatAvailbility();
	
	void seatCategory() {
		System.out.println("1. VIP (AC)\t\t 2000 BDT");
		System.out.println("2. VIP (Non-AC)\t\t 1500 BDT");
		System.out.println("3. Economy (AC)\t\t 1200 BDT");
		System.out.println("4. Economy (Non-AC)\t  800 BDT");
		System.out.println("5. Standard\t\t  500 BDT");
		System.out.println("");
	}
	static void seatPrice() { 			//  op3
		System.out.println("\n\tPrice of VIP (AC) per seat is\t\t: 2000 BDT");
		System.out.println("\tPrice of VIP (Non-AC) per seat is\t: 1500 BDT");
		System.out.println("\tPrice of Economy (AC) per seat is\t: 1200 BDT");
		System.out.println("\tPrice of Economy (Non-AC) per seat is\t: 800 BDT");
		System.out.println("\tPrice of Standard Category per seat is\t: 500 BDT\n");
		}
	void upcomingMatch() { 		// op4
		System.out.println("\n\tUpcoming Matches: ");
		System.out.println("1. 12/06/2021, 3:00 PM, Argentina vs Brazil");
		System.out.println("2. 14/06/2021, 6:00 PM, Spain vs Germany");
		System.out.println("3. 15/06/2021, 12:00 PM, Portugal vs England");
		System.out.println("4. 17/06/2021, 12:00 AM, Croatia vs France");
		System.out.println("5. 25/06/2021, 9:00 PM, SemiFinal 1 vs SemiFinal 3");
		System.out.println("6. 28/06/2021, 3:00 PM, SemiFinal 2 vs SemiFinal 4");
		System.out.println("7. 30/06/2021, 12:00 AM, Final 1 vs Final 2\n");
	}
	}
