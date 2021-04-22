import java.io.File;
import java.io.FileWriter;
import java.util.Scanner;


class IDB
{	
	boolean found = false;
	public Scanner x;
	public Scanner y;
	public Scanner z;
	String tempSL1;
	String tempSL2;
	String tempResult1;
	String tempResult2;
	String agmnt;
    private String filepath;
    private String filepath2; 
    String tsls;
	String f1;
	String f2;
	String f3;
	String f4;
	String f5;
	String f6;
	String f7;
	String f8;
	String f9;
		
     public String sl;
   void IDB() {
	   
	   filepath = "DB.txt";
	   filepath2 = "DB2.txt";
	   Scanner input1 = new Scanner(System.in);
	   System.out.println("Please Enter Serial Number: ");
	   this.sl = input1.nextLine();
		 
		 try
			{
				x = new Scanner(new File(this.filepath));
				x.useDelimiter("[,\n]");
				
				while(x.hasNext() && !found)
				{	tempSL1 = x.next();
					tempResult1 = x.next();
						
					if (tempSL1.trim().equals(sl.trim()))
					{
						
						try
						{							
							y = new Scanner(new File(this.filepath2));
							y.useDelimiter("[,\n]");
							
							while(y.hasNext() && !found)
							{	
									tempSL2 = y.next();
									tempResult2 = y.next();
									agmnt = y.next();
																
								if (tempSL1.trim().equals(sl.trim()) && tempSL2.trim().equals(sl.trim()))
								{
									found = true;
								
								}
								
							}
									
						}
						
						catch(Exception e)
						{		
							System.out.println("Error! Wrong ID\nPlease retry. If you think something is wrong please contact with IT support team.\nThanks\n");			
							
						}
						
					
					}
					
				}
						
			}
			
			catch(Exception e)
			{		
				System.out.println("Error! Wrong ID\nPlease retry. If you think something is wrong please contact with IT support team.\nThanks\n");			
				
			}
			
	  
		if(found) {
			char rs1 = tempResult1.charAt(0);
			char rs2 = tempResult2.charAt(0);
			
			int ag =Integer.parseInt(agmnt);  
			if (rs1 == 'p' && rs2 == 'n' && ag == 1) {
				
				System.out.println("Plasma Donor Added");			
				IDB2(sl);
				
			}
		}
		else {
			System.out.println("Not found");
		}
		
		}
   
 final void IDB2(String psl) {
	 boolean found = false;
		
	   
	   filepath = "DB.txt";
		
		try
		{
			z = new Scanner(new File(this.filepath));
			z.useDelimiter("[,\n]");
			
			
			while(z.hasNext())
			{
				tsls = z.next();
				f1 = z.next();
				f2 = z.next();
				f3 = z.next(); // BG
				f4 = z.next();  // Name
				f5 = z.next(); // 
				f6 = z.next();
				f7 = z.next();
				f8 = z.next(); // Area
				f9 = z.next(); // Phone
				
			
				
				if (tsls.trim().equals(psl.trim()))
				{
					found = true;
					
					try
					  {
					      String filename = "Donor.txt";
					      FileWriter fw = new FileWriter(filename,true); //the true will append the new data
					      fw.write(tsls + " " + f4 + " " + f3  + " " + f8  + " " + f9 + "\n");//appends the string to the file
					      fw.close();
					  }
					  catch(Exception e)
					  {
						  System.out.print("Error: Must be Numaric value.");
					  }
				}}
					
		}
		
		catch(Exception e)
		{		
			System.out.println("Error! Wrong ID\nPlease retry. If you think something is wrong please contact with IT support team.\nThanks\n");			
			
		}
	  
		if(found) {

			  
		}
		x.close();
		y.close();
		z.close();
		
		}
 
  }