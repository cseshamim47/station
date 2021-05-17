package ourPackage;

public class stadiumServices extends Information {
		
	int vipac = ran.nextInt(350);
	int vipnac = ran.nextInt(500);
	int ecoac = ran.nextInt(700);
	int econac = ran.nextInt(1000);
	int std = ran.nextInt(2000);
	int mat;	//match
	int cat;	//category
	
	

	
	void booking() {
				//overridden in process class					// op 1
		}
			
	void seatAvailbility() {		// op2
		super.upcomingMatch();
		System.out.print("\n\tSelect Match :");
		this.mat = input.nextInt();
if (mat<8)
{
		System.out.println("\nShowing seat information for match "+mat);
		System.out.println("\nCurrent situation of VIP (AC) is\t\t: " +vipac+ " seats available.");
		System.out.println("Current situation of VIP (Non-AC) is\t\t: " +vipnac + " seats available.");
		System.out.println("Current situation of Economy (AC) is\t\t: "+ecoac+ " seats available.");
		System.out.println("Current situation of Economy (Non-AC) is\t: "+econac+ " seats available.");
		System.out.println("Current situation of Standard category is\t: "+std+ " seats available.\n");
}
else {
	System.out.println("Wrong inpout, Plase try again\n");
	this.seatAvailbility();
}
	}	
}