package Module1;
import java . lang. *;
import java.util.Scanner;

public class Customer extends Person
{
	 Scanner obj=new Scanner(System.in);
	 String Custname;
	 String Date;
	 String MobileNo;
	 
	 public Customer()
	 {
		 
	 }
	 
	 public Customer(String Custname,String Date,String MobileNo) 
	 {
		 super(Custname,Date);
		 this.MobileNo=MobileNo;
	 
	 }
	 public void setMobileNo(String MobileNo)
	 {
		 this.MobileNo=MobileNo;
	 }
	 public String getMobileNo()
	 {
		 return MobileNo;
	 }
	 public void Show()
	 {
	     System.out.print("How Many Book Customer Buy: ");
         int size= obj.nextInt(); 
	     obj.nextLine();
	     int a2[]=new int [size];
		 if(size>=6)
		 {
	         for(int i=0; i<size; i++)
	             {
					 System.out.print("Enter Book Id: ");
                     int num=obj.nextInt();
			         System.out.print("Enter Price: ");
                     int num1=obj.nextInt();
					
		             a2[i]= num1;
		         }
	
		         int sum2=0;
				 double disc=0;
		         for(int index=0;index<a2.length;index++)
		         {
			         sum2= sum2+a2[index];
			         disc= sum2-(sum2*0.1);
			
		         }
		         System.out.println("****You got 10% discount****\n  Thank You");
		         System.out.println("Amount: "+sum2);
				 System.out.println("Total Amount after 10% discount: "+disc);
	     }
	     else
		 {
	         for(int i=0; i<size; i++)
	             {
					 System.out.print("Enter Book Id: ");
                     int num=obj.nextInt();
			         System.out.print("Enter Price: ");
                     int num1=obj.nextInt();
					 
		             a2[i]= num1;
		         }
		         int sum2=0;
		         for(int index=0;index<a2.length;index++)
		         {
			         sum2= sum2+a2[index];
			
		         }
		         System.out.println("Total Amount: "+sum2);
	     }
     }
}