package ourPackage;

import java.util.Scanner;

public class Process extends stadiumServices{
	int n;
	double tk;
	String catg;
	String match;
	public void selectOption() {
	
		{
			System.out.print("\tSelect option: ");
			int op = input.nextInt();
			if (op==1) 
			{
				this.booking();
				System.out.println("\n\nAmmount to be paid: " +tk);
				System.out.println("\nPlease procced to payment system.");
			}
			else if (op==2) 
			{
				super.seatAvailbility();
				this.selectOption();
			}
			else if (op==3) 
			{
				super.seatPrice();
				this.selectOption();
			}
			else if (op==4) 
			{
				super.upcomingMatch();
				this.selectOption();
			}
			else if (op==5) 
			{
				System.out.print("\n\nExiting");
				System.exit(1);
			}
			else {
				System.out.println("Wrong Input. Please try again.");
				this.selectOption();
			}}}
	

	void booking() {
		super.upcomingMatch();
		System.out.println("Available Category :");
		super.seatCategory();
		System.out.print("\n\tSelect Match :");
		this.mat = input.nextInt();
		if (mat==1) {
			this.match="12/06/2021, 3:00 PM, Argentina vs Brazil";
		}
		else if (mat==2) {
			this.match="14/06/2021, 6:00 PM, Spain vs Germany";
		}
		else if (mat==3) {
			this.match="15/06/2021, 12:00 PM, Portugal vs England";
		}
		else if (mat==4) {
			this.match="17/06/2021, 12:00 AM, Croatia vs France";
		}
		else if (mat==5) {
			this.match="25/06/2021, 9:00 PM, SemiFinal 1 vs SemiFinal 3";
		}
		else if (mat==6) {
			this.match="28/06/2021, 3:00 PM, SemiFinal 2 vs SemiFinal 4";
		}
		else if (mat==7) {
			this.match="30/06/2021, 12:00 AM, Final 1 vs Final 2";
		}
		
	if (mat<8) 
		{
		System.out.print("\tSelect Category :");
		this.cat = input.nextInt();
		if (cat<6) 
		{
		System.out.print("\tHow many seats you want to book:");
		Scanner num = new Scanner(System.in);
		this.n = num.nextInt();
		
	if (cat==1) {
		this.tk=n*2000;
		this.catg="VIP (AC)";
		System.out.print(n + " numbers of VIP (AC) seat is booked for match " + mat +".");
	}
	else if (cat==2) {
		this.tk=n*1500;
		this.catg="VIP (Non-AC)";
		System.out.print(n+ " numbers of VIP (Non-AC) seat is booked for match " + mat +".");
	}
	else if (cat==3) {
		this.tk=n*1200;
		this.catg="Economy (AC)";
		System.out.print(n+ " numbers of Economy (AC) seat is booked for match " +mat+".");
	}
	else if (cat==4) {
		this.tk=n*800;
		this.catg="Economy (Non-AC)";
		System.out.print(n+ " numbers of Economy (Non-AC) seat is booked for match " +mat+".");
	}
	else if (cat==5) {
		this.tk=n*500;
		this.catg="Standard";
		System.out.print(n+ " numbers of Standard seat is booked for match " +mat+".");
	}
	else {
		System.out.print("Wrong input of Category. Please try again\n\n");
		this.booking();
	}
	}
		else {
			System.out.print("\t Wrong input, try again");
			this.booking();
		}
		}
	else {
		System.out.print("Wrong input of Match. Please try again\n\n");
		this.booking();
		}
	}
}