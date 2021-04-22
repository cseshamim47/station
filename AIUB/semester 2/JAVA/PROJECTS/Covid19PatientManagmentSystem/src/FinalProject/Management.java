package FinalProject;

//import java.io.BufferedReader;
import java.io.*;
import java.util.Scanner;

public class Management extends Login {
	
	
	private Scanner x;
	private Scanner y;
	public void verify() {
		filepath = "Employee.txt";	
		 Scanner input2 = new Scanner(System.in);
		 System.out.println("System Login\n");
		 System.out.print("ID: ");
		 id = input2.nextLine();
		 System.out.print("Password: ");
	     password = input2.nextLine();
		
		// Exception to verify id
		try
		{
			x = new Scanner(new File(filepath));
			x.useDelimiter("[,\n]");
			
			while(x.hasNext() && !found)
			{
				tempID= x.next();
				tempPassword = x.next();
				
				if (tempID.trim().equals(id.trim()) && tempPassword.trim().equals(password.trim()))
				{
					found = true;
					Managment1(id);
				}
				
			}
					
		}
		
		catch(Exception e)
		{		
			System.out.println("Error!");			
		}
		
		if (!found) {
			System.out.println("Wrong ID or password.\n Please retry. If you think something is wrong please contact with IT support team.");			
			verify();
		}

		x.close();
		//input2.close();
	}
	
	
	public void Managment1(String id) {
		
		String type = id.substring(0,1);
		int itype = Integer.parseInt(type);
		//System.out.print("|" + itype + "|");
		
		if(itype == 1) {
			System.out.println("-----------------------");
			System.out.println("successfully logged in!\n");
			System.out.println("Account Type: Pathologists\n" + "ID: " +id);
			System.out.println("-----------------------");
			Pathologist();
		}
		
		else if(itype == 2) {
			System.out.println("-----------------------");
			System.out.println("successfully logged in!\n");
			System.out.println("Account Type: Offilcal\n" + "ID: " +id);
			System.out.println("-----------------------");
			offical();
		}
		else {
			
			System.out.println("Wrong input\n");
			
		}
		
	}
	
	
	public void offical() {
		
		Scanner inputOFF = new Scanner(System.in);
		int in;
		
		 System.out.print("1. Add Employee. \n2. Check and Add Donor \n3. Exit\n");
		 in = inputOFF.nextInt();
	 
		 switch(in){
		  case 1:
			  addManagment();
			    break;
		  case 2:
			  addDonar();
			    break;
		  case 3:
			  exit();
			    break;
		 }
		 offical();
	}
	
	
	
	public void addManagment() {
		
		String id;
		String pass;
		Scanner inputADD = new Scanner(System.in);
		
		 System.out.print("==============================================================\n");
		System.out.println("Creat new user.\n");
		System.out.print("ID: ");
		id = inputADD.nextLine();
		System.out.print("Password: ");
		pass = inputADD.nextLine();
		
		  try
		  {
		      String filename= "Employee.txt";
		      FileWriter fw = new FileWriter(filename,true); //the true will append the new data
		      fw.write("\n"+id + ","+ pass);//appends the string to the file
		      fw.close();
		  }
		  catch(Exception e)
		  {
			  System.out.print("Error: ");
		  }
		  System.out.print("==============================================================\n");
	}
	
	public void Pathologist() {
		
		
		Scanner inputPATH = new Scanner(System.in);
		 
		System.out.println("Publish Results of Test Number 1 or 2: "); 
		System.out.println("Reply 3 Exit\\n");
		int res;
		
		res = inputPATH.nextInt();
        if (res == 1){
		 
        	addpatient("PatientSL1.txt");}
        else if (res == 2) {
        	addpatient("PatientSL2.txt");
        }
        else if (res == 3) {
        	exit();
        }
        else {
        	
        	String newf; newf = "PatientSL"+res+".txt";
        	
        	try {
        	      File myObj = new File(newf);
        	      if (myObj.createNewFile()) {
        	        System.out.println("File created: " + myObj.getName());
        	      } else {
        	        System.out.println("File already exists.");
        	      }
        	    } catch (IOException e) {
        	      System.out.println("An error occurred.");
        	      e.printStackTrace();
        	    }
        	//System.out.println("Wrong Value. Try Again\n");
        	addpatient(newf);
        }
        System.out.print("==============================================================\n");
	}
	
	
	public void addpatient(String filename) {
		
		String sl;
		String result;
		Scanner inputADDP = new Scanner(System.in);
		
		System.out.print("==============================================================\n");
		System.out.println("Publish Result\n");
		System.out.print("SL: ");
		sl = inputADDP.nextLine();
		System.out.print("Test Result: ");
		result = inputADDP.nextLine();
		 
		
		  try
		  {
		     // String filename= "PatientSL.txt";
		      FileWriter fw = new FileWriter(filename,true); //the true will append the new data
		      fw.write("\n"+sl+","+result);//appends the string to the file
		      fw.close();
		  }
		  catch(Exception e)
		  {
			  System.out.print("Error: ");
			  verify();
		  }
		
	}
	
	
	void addDonar(){
		boolean here = false;
		try
		{
			y = new Scanner(new File("PatientSL2.txt"));
			y.useDelimiter("[,\n]");
			System.out.println("------------Results for Today--------------");	
			while(y.hasNext() && !here)
			{
				String PSL= y.next();
				String Res = y.next();
				System.out.println(PSL + "\t-\t" + Res);
				System.out.println("");	
			}
			System.out.println("-------------------------------------------");			
		}
		
		catch(Exception e)
		{		
			System.out.println("Error!");			
		}
		
		 IDB();
	}
	
	void exit(){
		System.exit(0);
	}

}
