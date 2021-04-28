package  classes;
import java.lang.*;
import interfaces.*;
import java.util.ArrayList;
import java.util.Scanner;


public class Course   implements Coursetransaction {
       
       int courseNumber;
       private int tuitionBalance=0;    
       private static int costofcourse=15000;
       String item;
       int qnt;
       Scanner in=new Scanner(System.in);
	   
       ArrayList<String>CAddingList = new ArrayList<String>(); // arr string = CAddingList
     
     public void setCourseNumber(int courseNumber) 
        {
   	 this.courseNumber = courseNumber;
   	}
       
	public int getCourseNumber() 
        {
		return courseNumber;
	}
	
	
	public void adding(int quantity) // 2
	{
		 
		for(int i=0;i<quantity;i++) // 2
		{
		     System.out.println("Insert course: "); //math oop
		     item = in.nextLine();
		     CAddingList.add(item); // math oop
		     tuitionBalance=tuitionBalance+costofcourse; //15000+15000 
		}
		
		System.out.println("Course added successfully");
			
	}
	public void dropping(int quantity) 
	{
		 
		 String cname;
	
		 for(int j=0;j<quantity;j++) {	  
			      
				 System.out.println("which course do you want to drop: ");
				 cname=in.next(); //math
			  
				 for(int i=0;i<CAddingList.size();i++) { //2
				 if((cname.equals(CAddingList.get(i))))
					{
					 
					    System.out.println("Course found");
					    System.out.println(CAddingList.get(i)+"\rdropped"); // math dropped
					    CAddingList.remove(i);
					    tuitionBalance=tuitionBalance-costofcourse; //15000
						      
					}
				 else {
					 System.out.println("You don't have this course");
				 }
			 }
		 } 
	}            		
	public void viewBalance()
	{
		System.out.println("your balance is: tk"+tuitionBalance);
	}
	
	public void paytuition()
	{
		viewBalance();
		System.out.println("Enter your payment: tk");
		 
	        Scanner sc = new Scanner( System.in );
	        int payment=sc.nextInt();
		tuitionBalance=tuitionBalance-payment;
		System.out.println("thank you for your payment tk"+payment);
		
	       viewBalance();
	}

	public void showInfo() {
		System.out.println("Courses are :"+CAddingList);
		viewBalance();
	        System.out.println("--------------------------");

   		}
	
	
	
	}	
	
	
	
	
	
	


	
	
	
	
	
	

