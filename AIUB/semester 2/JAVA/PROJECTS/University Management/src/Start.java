import java.lang.* ;
import java.util.* ;//input
import java.io.* ;
import classes.* ;
import interfaces.* ;


public class Start
{
	private University uni;
	
	public Start()
	{
		uni = new University () ;
	}
	
	public static void main(String args[]) // main method
	{
		Start s = new Start() ;
		
		System.out.println("") ;
		System.out.println("") ;

		System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		System.out.println("             UNIVERSITY MANAGEMENT SYSTEM") ;
		System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;

		s.main() ;
	}
	
	public void main() // overload
	{
		Scanner input = new Scanner(System.in) ;
		int option = 0 ;
		
		
		System.out.println("") ;
		System.out.println("") ;
		
		System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		System.out.println("                        Main Menu") ;
		System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		System.out.println("Choose An Option") ;
		System.out.println("1. Faculty Management") ;
		System.out.println("2. Student Managemnet") ;
		System.out.println("3. Course Transaction") ;
		System.out.println("4. Exit") ;
		System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		
		System.out.println("") ;
	    System.out.println("") ;

		System.out.print("Option: ") ;
		
		System.out.println("") ;

		try
		{
		 option = input.nextInt() ;
		}
		catch(InputMismatchException i)
		{
			System.out.print(" ") ;
			System.out.print("Invalid Input!") ;
		}
		
		if(option == 1)
		{
			
                int option1 = 0 ;		
				
				
				System.out.println("") ;
				System.out.println("") ;
				System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
				System.out.println("                  Faculty Management Menu") ;
				System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
				System.out.println("Choose An Option") ;
		        System.out.println("1. Insert New Faculty") ;
		        System.out.println("2. Remove Existing Faculty") ;
		        System.out.println("3. Show All Faculty") ;
		        System.out.println("4. Back to Main Menu") ;
				System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
				
				
				System.out.println("") ;
				System.out.println("") ;

				System.out.print("Option: ") ;

				System.out.println("") ;
				

				
				try
				{
					option1 = input.nextInt() ;
				}
				catch(InputMismatchException i)
				{
					System.out.print(" ") ;
//			        System.out.print("Invalid Input!") ;
				}
				
				if(option1 == 1)
				{
					Faculty f1 = new Faculty() ;
					
					System.out.println("") ;
		            System.out.println("") ;
					
					System.out.print("Enter Faculty Name:  ") ;
					String name = input.next() ;
					f1.setName(name) ;
					
					System.out.print("Enter Faculty ID:  ") ;
					String fid = input.next() ;
					f1.setFId(fid) ;
					
					System.out.print("Enter Faculty Salary:  ") ;
					double salary = input.nextDouble() ;
					f1.setSalary(salary) ;
					
					uni.insertFaculty(f1) ;
					main() ;
				}
				
				else if(option1 == 2)
				{
					
					System.out.println("") ;
		            System.out.println("") ;
					
					System.out.print("Enter Faculty ID You Want To Remove:  ") ;
					String fid2 = input.next() ;
					
					
					uni.removeFaculty(uni.getFaculty(fid2));
					main() ;
					
				}
				
				else if(option1 == 3)
				{
					System.out.println("") ;
		            System.out.println("") ;
					
					uni.showAllFaculty() ;
					main() ;
				}
				
				else if (option1 == 4)
				{
					main() ;
				}
				
				else
				{
					System.out.println("Invalid Option") ;
					main() ;
				}
		}
		
		else if(option == 2)
		{
			
			    System.out.println("") ;
				System.out.println("") ;

			    System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
				System.out.println("                Student Management Menu") ;
				System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
				System.out.println("Choose An Option") ;
		        System.out.println("1. Insert New Student") ;
		        System.out.println("2. Remove Existing Student") ;
		        System.out.println("3. Show All Student") ;
		        System.out.println("4. Back to Main Menu") ;
				System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
				
				
				System.out.println("") ;
				System.out.println("") ;

				System.out.print("Option:  ") ;

				System.out.println("") ;
			

				
				int option2 = 0 ;
				
				try
				{
					option2 = input.nextInt() ;
				}
				catch(InputMismatchException i)
				{
					System.out.print(" ") ;
			        System.out.print("Invalid Input!") ;
				}
				
				if(option2 == 1)
				{
					Student s1 = new Student() ;
					
					System.out.println("") ;
	             	System.out.println("") ;
					
					System.out.print("Enter Student Name:  ") ;
					String name = input.next() ;
					s1.setName(name) ;
					
					System.out.print("Enter Student ID:  ") ;
					String sid = input.next() ;
					s1.setSid(sid) ;
					
					uni.insertStudent(s1) ;
					
					Course c1 = new Course() ;
					
					System.out.println("Course Details:  ") ;
					
					System.out.print("Enter Course Number:  ") ;
					int cn = input.nextInt() ;
					c1.setCourseNumber(cn) ;
					
					System.out.print("Enter Total Credit: ") ;
					int cr = input.nextInt() ;
					c1.setCredit(cr) ;
					
					uni.getStudent(sid).insertCourse(c1) ;
					main() ;
				}
				
				else if(option2 == 2)
				{
					
		 			System.out.println("") ;
		            System.out.println("") ;
					
					System.out.print("Enter Student ID You Want To Remove:  ") ;
					String sid2 = input.next() ;
					
					
					uni.removeStudent(uni.getStudent(sid2));
					main() ;
					
				}
				
				else if(option2 == 3)
				{
					System.out.println("") ;
		            System.out.println("") ;
					
					uni.showAllStudents() ;
					main() ;
				}
				
				else if (option2 == 4)
				{
					main() ;
				}
				
				else
				{
					System.out.println("Invalid Option") ;
					main() ;
				}
		}
		
		else if(option == 3)
		{
			
			
                int option3 = 0 ;		
				
				
				System.out.println("") ;
				System.out.println("") ;

				System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
				System.out.println("              Course Transaction Menu") ;
				System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
				System.out.println("Choose An Option") ;
		        System.out.println("1. Add Course") ;
		        System.out.println("2. Drop Course") ;
		        System.out.println("3. Back To Main Menu") ;
				System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
				
				System.out.println("") ;
				System.out.println("") ;

				System.out.print("Option:  ") ;
		        
				System.out.println("") ;
				

				Student s2 = new Student() ;
				Course c1 = new Course() ;
				
				
				try
				{
					option3 = input.nextInt() ;
				}
				catch(InputMismatchException i)
				{
					System.out.print(" ") ;
			        System.out.print("Invalid Input!") ;
				}
				
				if(option3 == 1)
				{
					System.out.println("") ;
		            System.out.println("") ;
					
					System.out.print("Enter Student ID:  ") ;
					String sid3 = input.next();
				
					
					//System.out.println("Enter Course Number") ;
					//int cn = input.nextInt() ;
					
					
					System.out.print("Enter Number Of Credits: ") ;
					int cr = input.nextInt() ;
					
						//c1.setCourseNumber(cn) ;
						c1.adding(cr,sid3) ;
				
					main() ;
				}
				
				else if(option3 == 2)
				{
					System.out.println("") ;
		            System.out.println("") ;
					
					System.out.print("Enter Student ID:  ") ;
					String sid4 = input.next() ;
				
					
					//System.out.println("Enter Course Number") ;
					//int cn1 = input.nextInt() ;
					
					
					System.out.print("Enter Number Of Credits:  ") ;
					int cr1 = input.nextInt() ;
					
					
						//s2 = uni.getStudent(sid4) ;
						c1.dropping(cr1,sid4) ;
						
					main() ;	
				
					
				}
				
				else if(option3 == 3)
				{
					
					main() ;
				}
				
				
				
				else
				{
					System.out.println("Invalid Option") ;
					main() ;
				}

		}
		
		else if(option == 4)
		{
			System.out.println("") ;
		    System.out.println("") ;
			
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
			System.out.println("           Thank You For Using the Program") ;
			System.out.println("                 Program Terminated") ;
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		}
		
		else
		{
		    System.out.println("");
            System.out.println("");
			
		    System.out.println("Option Entered Is Not Valid.");
		    System.out.println("Choose Between 1 to 4!");
		    main();
		}
		
		
	}
	
}
