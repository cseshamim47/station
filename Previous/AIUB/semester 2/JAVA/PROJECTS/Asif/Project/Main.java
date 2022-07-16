import java.lang. *;
import java.util.Scanner;
import Module1.*;
import Module2.*;

public class Main 
{
	 static int size;
	 
     public static void main(String[] args) 
	
	 throws Exception
	 {
		 
         Scanner obj=new Scanner(System.in);

         int choice =0;
 
         while(choice !=4)	 
		 {

             System.out.println("Enter 1- for Admin \nEnter 2- for Customer");
			 System.out.println("*************");
			 System.out.println("For Customer Bill Enter -3");

             choice = obj.nextInt();

             if (choice == 1) 
			 {
			     System.out.print("Enter your Name: ");
				 obj.nextLine();
                 String adName=obj.nextLine();
	   
	             System.out.print("Enter your Password: ");
                 String adId=obj.nextLine();
				 
				 
				 Person a1= new Admin(adName,adId); 
	      
		         System.out.println("Admin Name: "+a1.getName());
		         System.out.println("Admin Password: "+a1.getId());
				 
				 if(a1.getId().equals("2345")||a1.getId().equals("2346"))
				 {
					 System.out.println("***** Welcome Admin *****");
					 System.out.println("You can not add more than 6 books in one time");
				     System.out.print("How many book you Add: ");
					 try
					 {
						 size=obj.nextInt();
						 obj.nextLine();
		                 if(size==0)
		                 System.out.println("The value of Size is: 0");
		             }
			
		             
					 catch(Exception e)
		             {
			             System.out.println("exception occured runtime...");
		             }
					 
	                 finally
		             {
						 if(size > 5 || size < 1)
		                 System.out.println("Please select 1 to 5 number");
		             }
					 
					 if(size>6)
					 
					 {
						  System.out.println("----- Invalid Value -----");
					 }
					 else
					 {
				         Admin a2=new Admin();
					     Book bo[]=new Book[6];
					 
					     for(int i=0; i<size; i++)
					     {
						     System.out.print("Enter Book Name: ");
                             String bName1=obj.nextLine();
	                     
						     System.out.print("Enter Book Id: ");
                             String bId1=obj.nextLine();
				             bo[i]= new Book(bName1,bId1);
					     }

				         a2.addBook(bo);
				         a2.getBook();
					 }
				 }
				 else
				 {
					 System.out.print("You'r Password is not correcect. Please try Again\n");
				 }
			 }
			
			 else if (choice == 2)
			 
			 {
				 int choice1 =0;
                 
				 while(choice1 !=4)
		         {
					 System.out.print("********  Welcome to our shop  **********\n\n");
					 System.out.print("********  OFFER  **********\n");
					 System.out.print("****  Buy more then 5 books and get 10% discount ****\n");
                     System.out.println("Enter 1- for Text Book \nEnter 2- for Story Book \nEnter 3- for Science Fiction Book");
                     choice1=obj.nextInt();
					 if(choice1==1)
					 {
						 TextBook t1= new TextBook();
						 t1.showAll();
						 continue;
					 }
					 if(choice1==2)
					 {
						 StoryBooks S1= new StoryBooks();
						 S1.showAll();
						 continue;
					 }
					 if(choice1==3)
					 {
						 ScienceFiction S2= new ScienceFiction();
						 S2.showAll();
						 break;
					 }
					   
				 }
             
             }
			
     	     else if (choice == 3)
			 
			 {
				 System.out.print("Enter Customer Name: ");
				 obj.nextLine();
                 String custName=obj.nextLine();
	   
	             System.out.print("Date: ");
                 String date=obj.nextLine();
				 
				 System.out.print("Mobile No: ");
                 String mobNo=obj.nextLine();
				 
				 Person c1= new Customer(custName,date,mobNo);
                 Customer co1= new Customer();
				 co1.setMobileNo(mobNo);
				 
		         System.out.println("Customer Name: "+c1.getName());
		         System.out.println("Date: "+c1.getId());
				 System.out.println("Mobile Number: "+co1.getMobileNo());
				 co1.Show();
			 }

         }

     }
}

