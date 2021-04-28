import java.lang.*;
import classes.*;
import interfaces.*;
import java.util.*;
import fileio.*;
import java.util.Scanner;


import java.util.Scanner;

class Start {
    public static void main(String []args){
            int choice = 0;
            int subchoice=0;

                    System.out.println("--------------Welcome to the student managment application--------------\n");
		    Scanner sc = new Scanner(System.in);
		    University u=new University();
		    Student s=new Student();
                    Course c = new Course();
		    FileReadWriteDemo frwd=new FileReadWriteDemo();
            while(true){
            	try {
            		System.out.println("Here are Some Options for You: ");
    		        System.out.println("------------------------------");
    			System.out.println("1. Student Managment");
    			System.out.println("2. Course Management");
    			System.out.println("3. Student details");
    			System.out.println("4. Exit the Application");
    			System.out.println("What do you want to do? : ");
    			choice = sc.nextInt();
                        sc.nextLine();
    				
            	}
                catch(Exception e) {
            		System.out.println("Error occured.Please try again.");
            		break;
            	}
                switch(choice) {
                case 1 :{
                    while(true){
                    	try {
                    		System.out.println("\n#You have selected Student Management");
    				System.out.println("-----------------------------------");
    				System.out.println("Here are Some Options for You: ");
    				System.out.println("1.Insert New Students ");
    				System.out.println("2.Remove Existing Students");
    				System.out.println("3.See All Student");
    				System.out.println("4.Go Back");
    				System.out.println("What do you want to do? : ");
    				subchoice = sc.nextInt();
    		                sc.nextLine();
                    	}catch(Exception e) {
                    		System.out.println("Error occured.Please try again.");
                    		break;
                    	}
                        if(subchoice==1){
                        	try {
                        		System.out.println("#You have Selected to insert new student");
					System.out.println("---------------------------------------");
								
                                        System.out.println("You have Selected to create a new Student\n");
				        System.out.print("Enter Student Id: ");
				        String sId = sc.next();
				        System.out.print("Enter Student Name: ");
					String name = sc.next();
					System.out.println("Enter Student CGPA:");
					float lastSemisterCGPA=sc.nextFloat();
					System.out.println("Enter Total credit completed: ");
					int totalcompletedcredit =sc.nextInt();
							
					Student s1=new Student();
					s1.setSId(sId);
					s1.setName(name);
					s1.setLastSemisterCGPA(lastSemisterCGPA);
					s1.setTotalcompletedcredit(totalcompletedcredit);
					s1.checkstudentstatus();
					s1.graduationeligibilitycheck();
							
					u.insertStudent(s1);
				        frwd.writeInFile("Add Studentlist:\n"+"Student name: "+s1.getName()+"\n"+ "id:"+s1.getSId()+"\n"+"status:"+s1.checkstudentstatus()+"\n"+"graduation status"+s1.graduationeligibilitycheck());
                        	}catch(Exception e) {
                        		System.out.println("Error occured.Please try again.");
                        		break;
                        	}
                        }
                        else if(subchoice==2){
                        	try {
                        		System.out.println("#You have selected to remove existing student");
					System.out.println("-----------------------------------------------");
					System.out.println("You have Selected to remove an existing Student");
					System.out.print("Enter Student Id: ");
				        u.removeStudent(u.getStudent(sc.next()));
				        frwd.writeInFile("Remove Studentlist:\n"+"Student name: "+s.getName()+"\n"+ "Student id:"+ s.getSId());
                        	}catch(Exception e) {
                        		System.out.println("Error occured.Please try again.");
                        		break;
                        	}
                        }
                       
                        
                        else if(subchoice==3){
                        	System.out.println("#You have Selected to see all Student");
				System.out.println("------------------------------------");
				
				u.showAllStudents();
				
                        	break;
                            
                        }
                        else if(subchoice==4){
                        	System.out.println("Returned to homepage!");
				break;
                        }
                        
                        
                }
                    break;
                }
                
                case 2:{
                    while(true){
                    	try {
                    		System.out.println("#You have selected Course Management");
				System.out.println("-----------------------------------");
				System.out.println("Here are Some Options for You: ");
				System.out.println("1. Add courses");
				System.out.println("2. Drop courses");
				System.out.println("3. See all the courses");
				System.out.println("4. Go Back");
				System.out.print("What do you want to do? : ");
				subchoice = sc.nextInt();
    		                sc.nextLine();
						 
                    	}catch(Exception e) {
                    		System.out.println("Error occured.Please try again.");
                    		break;
                    	}
                        if(subchoice==1){
                        try {
                        	//Student s=new Student();
                           
                            System.out.println("Enter Student Id: ");
		                    u.getStudent(sc.next());
			            int courseNumber;
	                            System.out.println("How many course you want to add? :");
	                            courseNumber= sc.nextInt();
	                            
	                            c.adding(courseNumber);
						    
                                    
                        }catch(Exception e) {
                    		System.out.println("Error occured.Please try again.");
                    		break;
                    	}
                            
                        }
                        else if(subchoice==2){
                        try {
                        	
                               
                                System.out.println("Enter Student Id: ");
			        u.getStudent(sc.next());
			        int searchCN;
                                System.out.println( "How many courses do you want to drop?:");
                                searchCN = sc.nextInt();
                             
                                c.dropping(searchCN);
                                
                        	}catch(Exception e) {
                        		System.out.println("Error occured.Please try again.");
                        		break;
                        	}
                        }
                         else if(subchoice==3){
                         System.out.println("See all the Courses and Balance");
                         c.showInfo();
                         
			 break;
                        }
                         
                        else if(subchoice==4){
                        System.out.println("  Returned to homepage!");
    			break;
                        }
                        
                }
                    break;
                }
                
                case 3:{
                    while(true){
                    	try {
                    		System.out.println("#You have selected see Student Details");
   			        System.out.println("1.Show details");
   			        System.out.println("2. Payment");
   			        System.out.println("3.Go back");
                                System.out.print("What do you want to do? : ");
                                subchoice = sc.nextInt();
    		                sc.nextLine();
   						
						 
                    	}catch(Exception e) {
                    		System.out.println("Error occured.Please try again.");
                    		break;
                    	}
                        if(subchoice==1){
                        	try {
                        		
                        		 System.out.println("Enter Student Id: ");
     					 u.getStudent(sc.next());
     					 System.out.println("Show details: ");
     				       //Student s=new Student();
     					 u.showAllStudents();
     					 c.showInfo();
                                         
                        }catch(Exception e) {
                    		System.out.println("Error occured.Please try again.");
                    		break;
                    	}
                            
                        }
                        else if(subchoice==2){
                        	
                        	 System.out.println("you have selected payment option:");
                        	 c.paytuition();

	          	         break;
                        }
                       
                        else if(subchoice==3){
                        	
                       	 System.out.println("  Returned to homepage!");
	          	         break;
                       }
                }
                    break;
                }
           
                case 4:
                	System.exit(0);
                	break;
                default:
                	System.out.println("Invalid Option.");
                	break;
                }
                	
            
                }
    
            
            
        
        
    }
}