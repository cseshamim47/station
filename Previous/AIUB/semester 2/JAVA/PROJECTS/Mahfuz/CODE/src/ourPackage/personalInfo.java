package ourPackage;

public class personalInfo extends Verification {
	
	static String name;
	static double nid;
	static String email;
	static int uid = ran.nextInt(1000);
	
	public static void input() {
		System.out.print("\tEnter your Name: ");
		name = input.nextLine();
		System.out.print("\tEnter your National ID: ");
		nid = input.nextDouble();
		System.out.print("\tEnter your E-mail address: ");
		email = input.next();
	}
	public static void introMessage() {
		System.out.println("\n\tHello, " + name  + ", your Unique ID is " + uid + "." + "\tVerified Email: " + email);
		}
}

