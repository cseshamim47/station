package ourPackage;

import java.util.Random;
import java.util.Scanner;
import java.io.IOException;

public class Verification extends Payment {
	static Random ran = new Random();
	static Scanner input = new Scanner(System.in);
	
	static int  otp;
	static int antirob = ran.nextInt(10000);
	
	public static void randomVerify() {
		System.out.println("\tYour One Time Password is: " + antirob);
		System.out.print("\tEnter the OTP: ");
		otp = input.nextInt();
		System.out.println("");
		
		if(otp == antirob) {
			System.out.println("\tEmail address verified successfully.");
		}
		else {
			System.out.println("**--Robot detected! You will be kicked out of the program immediately!--**");
			System.exit(1);
		}
	}
}
