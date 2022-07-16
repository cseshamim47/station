package ourPackage;
import java.util.Random;
import java.util.Scanner;

public class Payment extends Process {
	
	int bkash;
	int bill;
	int pin;
	int otpp;
	Random ran = new Random();
	int otp = ran.nextInt(10000);
	
	
	public void Payment() {
		int flag=1;
	
		System.out.println("Select Payment Option: ");
		System.out.println("1. Bkash");
		System.out.println("2. Nogod");
		System.out.println("3. Card");
		do {
try {
		System.out.print("\n\tOption:");
		Scanner op = new Scanner(System.in);
		int p = op.nextInt();
		if (p==1) {
			
try {
			System.out.print("Enter Bkash Number : +880");
			this.bkash = op.nextInt();
	
			System.out.println("\tEnter the OTP sent to your phone: " + otp);
			System.out.print("\tEnter the OTP: ");
			this.otpp = input.nextInt();
			if (otpp==otp){
			
			System.out.print("\nEnter your bkash pin to verify Payment: ");
			this.pin = op.nextInt();
			flag=2;
			}
			else {
				System.out.print("Invalid OTP, try again\n");
				this.Payment ();
			}
			
			}
catch (Exception e) {
			      System.out.println(e);
			     
		} }
		else if (p==2) {
			try {
				System.out.print("Enter Nogod Number : +880");
				this.bkash = op.nextInt();
		
				System.out.println("\tEnter the OTP sent to your phone: " + otp);
				System.out.print("\tEnter the OTP: ");
				this.otpp = input.nextInt();
				if (otpp==otp){
				
				System.out.print("\nEnter your Nogod pin to verify Payment: ");
				this.pin = op.nextInt();
				flag=2;
				}
				else {
					System.out.print("Invalid OTP, try again\n");
					this.Payment ();
				}
				
				}
	catch (Exception e) {
				      System.out.println(e);
				      
			} } 
else if (p==3) {
	try {
		System.out.print("Enter Credit Card Number :");
		this.bkash = op.nextInt();

		System.out.println("\tEnter the OTP sent to your phone: " + otp);
		System.out.print("\tEnter the OTP: ");
		this.otpp = input.nextInt();
		if (otpp==otp){
		
		System.out.print("\nEnter your CVV to verify Payment: ");
		this.pin = op.nextInt();
		flag=2;
		}
		else {
			System.out.print("Invalid OTP, try again\n");
			this.Payment ();
		}
		
		
		}
catch (Exception e) {
		      System.out.println(e);
		     
	} } 
}
catch (Exception e) {
	      
	      System.out.println(e);
	    } 
finally {
	if (flag==2) {
		System.out.println("\nCongratulations, your payment is done");
		
	}
	else
	{
		System.out.println("\nException Occured. You might try again\n");
		this.Payment ();
}
	    }
	   }
	  while (flag==1);
	}}

