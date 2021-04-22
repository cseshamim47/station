import java.io.File;
import java.io.FileWriter;
import java.util.Scanner;

public class Patient extends Login implements Form {
	
	public Scanner x;
	public Scanner y;
	String tempSL;
	//String filepath = "PatientSL.txt";
	String filepath2 = "";
	public String inp;
	String name;
	int testNum;
	String date;
	String bG;
	String occ;
	String curAdd;
	String  age;
	String ph;
	int pa;
	String tempResult;
	String filepath;
	char tr;
	
public void main () {
		Scanner input1 = new Scanner(System.in);
		System.out.println("Test Number: ");
		System.out.println("Reply x to exit." );
		System.out.println("Reply anything to go back.\n" );

		inp = input1.nextLine();
		
		if (inp == "x") {
			 System.exit(0);
		}
		else if (inp == "back") {
			//break;
		}
		else if (inp == "1") {
			this.filepath = "PatientSL.txt";
			  verify();
		}
		else {
			
			 this.filepath = "PatientSL"+inp+ ".txt";
			  verify();
			
		}
		
	}
	
	
public void verify() {	
		
		//String filepath2 = filepath2;
		Scanner input1 = new Scanner(System.in);
		System.out.println("Please Enter Serial Number: ");
		sl = input1.nextLine();
		//System.out.println(filepath);
		try
		{
			x = new Scanner(new File(this.filepath));
			x.useDelimiter("[,\n]");
			
			while(x.hasNext() && !found)
			{
				tempSL= x.next();
				this.tempResult = x.next();
				
				if (tempSL.trim().equals(sl.trim()) )
				{
					found = true;
					
					form();
					
				}
				
			}
					
		}
		
		catch(Exception e)
		{		
			System.out.println("Error! Wrong ID\nPlease retry. If you think something is wrong please contact with IT support team.\nThanks\n");			
			verify();
		}
		
		if(!found) {
			System.out.println("Wrong SL or Youre result is not yet published. Please Enter SL that was provided by the office.\n");
			verify();
		}
	}
	
	void exit(){
		System.exit(0);
	}
	
	public void form() {
		
		this.tr = tempResult.charAt(0);
		int inp = Integer.parseInt(this.inp);  ;
		
		if (inp == 2) {		
			plasma ();
		}
		
		else if (inp == 1) {
		
		plasma ("DB.txt");
		append();
		result();
		}
	
		}

	void append() {
		
		Scanner input2 = new Scanner(System.in);
		
		  try
		  {	  System.out.print("Blood Group: ");
			  bG = input2.nextLine();
			  System.out.print("Name: ");
			  name = input2.nextLine();
			  System.out.print("Test Date: (DAY/MON/YEAR) ");
			  date = input2.nextLine();
			  System.out.print("Age: ");
			  age = input2.nextLine();
			  System.out.print("Occupation: ");
			  occ = input2.nextLine();
			  System.out.println("Current Living Area: ");
			  curAdd = input2.nextLine();
			  System.out.print("Contact Number: ");
			  ph = input2.nextLine();
			  
			  String line = bG + "," + name + "," + date + "," + age + "," + occ + "," + curAdd + "," + ph; 
		      String filename = "DB.txt";
		     
		      FileWriter fw = new FileWriter(filename,true); //the true will append the new data
		      fw.write(line);//appends the string to the file
		      fw.close();
		  }
		  catch(Exception e)
		  {
			  System.out.print("Error: Must be Numaric value.");
			  append ();
		  }
		
	}
	
	public void result() {
		
		if (this.tr == 'n') {
		System.out.println("------------------------------------");
		System.out.println("ABCD Covid Test Center\n");
		System.out.println("Patient Name: " + name );
		System.out.println("Sl: " + sl );
		System.out.println("You are COVID-19 NEGATIVE" );
		System.out.println("------------------------------------");
		}
		
		if (this.tr == 'p') {
		System.out.println("------------------------------------");
		System.out.println("ABCD Covid Test Center\n");
		System.out.println("Patient Name: " + name );
		System.out.println("Sl: " + sl );
		System.out.println("You are COVID-19 POSSITIVE\n" );
		System.out.println("Please Contact Our Helth Center and Visit Plasma Bank.");
		System.out.println("------------------------------------");
		}
		
		
	}
	


	

	public void testNum () {
		
		Scanner input2 = new Scanner(System.in);
	
		  try
		  {
			  testNum = input2.nextInt();
		      String filename = "DB.txt";
		      FileWriter fw = new FileWriter(filename,true); //the true will append the new data
		      fw.write(testNum+ ",");//appends the string to the file
		      fw.close();
		      if (testNum == 2) {
		    	  Scanner input3 = new Scanner(System.in);
		    	  int agr;
		    	  System.out.println("Do You Want to Donate Plasma If Youre Eligible?\nReply 1 If Yes.Reply 2 If No");
		    	  agr = input3.nextInt();
				  
				  if (agr == 1) {
					
				  }
				  
				  
			  }
		  }
		  catch(Exception e)
		  {
			  System.out.print("Error: Must be Numaric value.");
			  testNum ();
		  }
		  
		  
	}


	public void plasma () {
		
		Scanner input2 = new Scanner(System.in);
		  System.out.println("------------------------------------------------------------------------------");
	      System.out.println("\nAre you fully recovered from a verified COVID-19 diagnosis? If so, \nthe plasma in your blood may contain COVID-19 antibodies that can attack \nthe virus. This convalescent plasma is being evaluated as a possible \ntreatment for currently ill COVID-19 patients, so your donation could help \nsave the lives of patients battling this disease!");
	      System.out.println("------------------------------------------------------------------------------");
		  try
		  {	  System.out.println("\nDo you want to donate pasma if you are eligible? \nReply 1 if YES and 0 if NO");
		  	  pa = input2.nextInt();
		      String filenamePD = "DB2.txt";
		      //the true will append the new data
		      FileWriter fw2 = new FileWriter(filenamePD,true); 
		      fw2.write("\n"+ sl +","+ tr +"," + pa);//appends the string to the file
		      fw2.close();
		  }
		  catch(Exception e)
		  {
			  System.out.print("Error: Must be Numaric value.");
			  plasma();
		  }	  
		  result();
		  
	}
public void plasma (String filename) {
		
		  Scanner input2 = new Scanner(System.in);
		  System.out.println("------------------------------------------------------------------------------");
	      System.out.println("Are you fully recovered from a verified COVID-19 diagnosis? If so, \nthe plasma in your blood may contain COVID-19 antibodies that can attack \nthe virus. This convalescent plasma is being evaluated as a possible \ntreatment for currently ill COVID-19 patients, so your donation could help \nsave the lives of patients battling this disease!");
	      System.out.println("------------------------------------------------------------------------------"); 
		  try
		  {	  System.out.println("\nDo you want to donate pasma if you are eligible? \nReply 1 if YES and 0 if NO");
		  
		  	  pa = input2.nextInt();
		      //String filename = filename;
		      FileWriter fw = new FileWriter(filename,true); //the true will append the new data
		     // bG (); phone (); curAdd ();
		      fw.write("\n"+ sl +","+ tr +"," + pa +",");//appends the string to the file
		      fw.close();
		  }
		  catch(Exception e)
		  {
			  System.out.print("Error: Must be Numaric value.");
			  plasma();
		  }	  
	
	
}}
