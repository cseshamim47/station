package ourPackage;
import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;  
public final class Final extends Payment {

	public void login() {
		personalInfo.input();
		personalInfo.randomVerify();
		personalInfo.introMessage();
	}
	
	public void reciept() {
			try{
				File f1 = new File("Reciept.txt");
				FileWriter fw = new FileWriter(f1);
				fw.write("\t\t****Reciept****\n");
				fw.write("Name: "+personalInfo.name+"\n");
				fw.write("Email: "+personalInfo.email+"\n");
				fw.write("Unique Code: "+personalInfo.uid+"\n");
				fw.write("Paid ammount: "+tk+".\n");
				fw.write("Booking information: "+n+" number of seats are booked for "+catg+" category for "+match+" .\n");
				fw.write("You Need to show this reciept to enter the stadium.\n Maintain Social Distance \tTake Care\n");

			      fw.close();
			      BufferedReader br = new BufferedReader(new FileReader("Reciept.txt"));
			      String line;
			      while ((line = br.readLine()) != null) {
			    	  System.out.println("\n");
			        System.out.println(line);
			      }
			      
			}
				catch(Exception e){
					System.out.println(e);
					
				}
	}
}
