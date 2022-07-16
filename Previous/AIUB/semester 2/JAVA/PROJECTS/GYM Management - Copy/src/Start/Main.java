package Start;

import java.util.Scanner;
public class Main
{
    public static void main(String [] args)
    {
        Scanner sc = new Scanner(System.in);
		Gym m = new Gym();
		Member a = new Member();

        System.out.println("\n");
		System.out.println("*****   GYM Management Application   *****");
        
        while(true)
        {	
			System.out.println("\n");
            System.out.println("What do you want to do?");
			System.out.println("\t1. Employee Management.");
			System.out.println("\t2. Member Management.");
			System.out.println("\t3. Account Management.");
			System.out.println("\t4. Exit.");
            System.out.println();
            
            System.out.print("Enter Your Choice: ");
			int choice = sc.nextInt();
            System.out.println("\n");
            
            switch(choice)
            {
                case 1:
				{
					
					System.out.println("***** Welcome To Employee Management *****");
					System.out.println();
					boolean continue1 = true;
					while(continue1)
					{	
						System.out.println();
						System.out.println("What do you want to do?");
						System.out.println("\t1. Insert new employee");
						System.out.println("\t2. Remove Existing Employee");
						System.out.println("\t3. Show All Employees");
						System.out.println("\t4. Search an Employee");
						System.out.println("\t5. Go Back");
						System.out.println();

						System.out.print("Enter Your Choice: ");
						int choice1 = sc.nextInt();
						System.out.println();
					
						switch(choice1)
						{
							case 1:
							{
								System.out.println("You Choose to insert an Employee");
								System.out.println();
								System.out.print("Enter Employee's Name: ");
								String name1 = sc.next();
								System.out.print("Enter Employee's ID: ");
								String empId1 = sc.next();
								System.out.print("Enter Employe's Salary: ");
								double salary1 = sc.nextDouble();
								System.out.print("Enter Employee's DOB: ");
								String empDob1 = sc.next();
								System.out.print("Enter Employee's Address: ");
								String empAdd1 = sc.next();
								System.out.print("Enter Employee's Phn No: ");
								int empPhn1 = sc.nextInt();
								
							
								Employee e1 = new Employee();
							
								e1.setEmpId(empId1);
								e1.setName(name1);
								e1.setSalary(salary1);
								e1.setAddress(empAdd1);
								e1.setDob(empDob1);
								e1.setPhoneno(empPhn1);
							
								if(m.insertEmployee(e1))
								{ 
									System.out.println("\nEmployee " +e1.getName()+ " Inserted with ID: "+e1.getEmpId());
								}
								else
								{
									System.out.println("\nEmployee Can Not be Insertd!!!!!");
								}
							
								break;
							}
						
							case 2:
							{
								System.out.println("You Choose to Remove An Employee");
								System.out.println();
							
								System.out.print("Enter an Employee's ID to Remove : ");
								String empId2 = sc.next();
							
								Employee e2 = m.getEmployee(empId2);
							
								if(e2 != null)
								{
									if(m.removeEmployee(e2))
									{ 
										System.out.println("\nEmployee " +e2.getName()+ " Removed with ID: "+e2.getEmpId());
									}
									else
									{
										System.out.println("\nEmployee Can Not be Removed!!!!!");
									}
								}
								else
								{
									System.out.println("\nEmployee Does Not Exist!!!!");
								}
							
								break;
							}
						
							case 3:
							{
								System.out.println(" Showing All Employees.......");
							
								m.showAllEmployees();
							
								break;
							}
						
							case 4:
							{
								System.out.println("You Choose to Search An Employee");
								System.out.println();
							
								System.out.print("Enter an Employee's ID to Search : ");
								String empId3 = sc.next();
							
								Employee e3 = m.getEmployee(empId3);
							
								if(e3 != null)
								{
									System.out.println("Employee Found!!!!\n");
									System.out.println("Employee Name	: "+e3.getName());
									System.out.println("Employee ID     : "+e3.getEmpId());									
									System.out.println("Employee Salary	: "+e3.getSalary());
								}
								else
								{
									System.out.println("\nEmployee Does Not Exist!!!!!\n");
								}
							
								break;
							}
						
							case 5:
							{
								System.out.println(" Going Back......");
								continue1=false;
								break;
							}
							
							default :
							{
								System.out.println(" No Such Option!!!");
								
								break;
							}
							
						}
						
					}
					
					break;
				}
				
                case 2:
				{
					System.out.println("***** Welcome To Member Management *****\n");
					
					boolean continue2 = true;
					
					while(continue2)
					{
						System.out.println("What do you want to do?");
						System.out.println("\t1. Insert new Member.");
						System.out.println("\t2. Remove Existing Member.");
						System.out.println("\t3. Show All Member.");
						System.out.println("\t4. Search a Member.");
						System.out.println("\t5. Go Back.");
						System.out.println();
					
						System.out.print("Enter Your Choice: ");
						int choice2 = sc.nextInt();
						System.out.println();
					
						switch(choice2)
						{
							case 1:
							{
								System.out.println("You Choose to insert an Member");
								System.out.println();
								System.out.print("Enter Member's Name: ");
								String mName1 = sc.next();
								System.out.print("Enter Member's ID: ");
								String mId1 = sc.next();								
								System.out.print("Enter Member's DOB: ");
								String mDob1 = sc.next();
								System.out.print("Enter Member's Address: ");
								String mAdd1 = sc.next();
								System.out.print("Enter Member's Phn No: ");
								int mPhn1 = sc.nextInt();
							
								Member m1 = new Member();
								
								m1.setName(mName1);
								m1.setMId(mId1);
								m1.setAddress(mAdd1);
								m1.setDob(mDob1);
								m1.setPhoneno(mPhn1);
								
							
								if(m.insertCustomer(m1))
								{ 
									System.out.println("\nMember " +m1.getName()+ " Inserted with ID: "+m1.getMId());
								}
								else
								{
									System.out.println("\nMember Can Not be Insertd!!!!!");
								}
							
								break;
							}
						
							case 2:
							{
								System.out.println("You Choose to Remove An Member");
								System.out.println();
							
								System.out.print("Enter an Member's ID to Remove : ");
								String mId2 = sc.next();
							
								Member m2 = m.getMember(mId2);
							
								if(m2 != null)
								{
									if(m.removeCustomer(m2))
									{ 
										System.out.println("\nMember " +m2.getName()+ " Removed with ID: "+m2.getMId());
									}
									else
									{
										System.out.println("\nMember Can Not be Removed!!!!!");
									}
								}
								else
								{
									System.out.println("\nMember Does Not Exist!!!!");
								}
							
								break;
							}
						
							case 3:
							{
								System.out.println(" Showing All Members.......");
							
								m.showAllMember();
							
								break;
							}
						
							case 4:
							{
								System.out.println("You Choose to Search An Member");
								System.out.println();
							
								System.out.print("Enter an Member's ID to Search : ");
								String mId3 = sc.next();
							
								Member m3 = m.getMember(mId3);
							
								if(m3 != null)
								{
									System.out.println("Member Found!!!!\n");
									System.out.println("Member's Name   : "+m3.getName());
									System.out.println("Member's ID	    : "+m3.getMId());						
									System.out.println("Member's Phn No : "+m3.getPhoneno());
									System.out.println("Member's Address: "+m3.getAddress());
								}
								else
								{
									System.out.println("\nEmployee Does Not Exist!!!!!\n");
								}
							
								break;
							}
						
							case 5:
							{
								System.out.println(" Going Back.......");
								continue2 = false;
								break;
							}
							
							default :
							{
								System.out.println("No Such Option!!!!");
							}
						}
					}
					
					break;
				}
				case 3:
				{
					System.out.println("***** Welcome To Account Management *****\n");
					
					boolean continue3 = true;
					
					while(continue3)
					{
						System.out.println("What do you want to do?");
						System.out.println("\t1. Insert new Account.");
						System.out.println("\t2. Remove Existing Account.");
						System.out.println("\t3. Show All Account.");
						System.out.println("\t4. Search a Account.");
						System.out.println("\t5. Go Back.");
						System.out.println();
					
						System.out.print("Enter Your Choice: ");
						int choice3 = sc.nextInt();
						System.out.println();
					
						switch(choice3)
						{
							case 1:
							{
								System.out.println("You Choose to insert an Account");
								System.out.println();
								System.out.print("Enter Account Holder Name : ");
								String accName = sc.next();
								System.out.print("Enter Account Number : ");
								 String accNo = sc.next();
								System.out.print("Enter Account's Balance: ");
								double aBalance1 = sc.nextDouble();
							
								Account a1 = new Account();
							
								a1.setAccholderName(accName);
								a1.setAccountNumber(accNo);
								a1.setBalance(aBalance1);
							
								if(a.insertAccount(a1))
								{ 
									System.out.println("\nAccount :" +a1.getAccountNumber()+ " Inserted For : "+a1.getAccholderName());
								}
								else
								{
									System.out.println("\nAccount Can Not be Insertd!!!!!");
								}
							
								break;
							}
								
						
							case 2:
							{
								
								System.out.println("You Choose to Remove An Account");
								System.out.println();
							
								System.out.print("Enter an Account Number to Remove : ");
								String accNo2 = sc.next();
							
								Account a2 = a.getAccount(accNo2);
							
								if(a2 != null)
								{
									if(a.removeAccount(a2))
									{ 
										System.out.println("\nAccount For " +a2.getAccholderName()+ " Removed with Account No : "+a2.getAccountNumber());
									}
									else
									{
										System.out.println("\nAccount Can Not be Removed!!!!!");
									}
								}
								else
								{
									System.out.println("\nAccount Does Not Exist!!!!");
								}
							
								break;
							}
						
							case 3:
							{
								System.out.println(" Showing All Accounts.......");
								a.showAllAccounts();
								
								break;
							}
						
							case 4:
							{
								System.out.println("You Choose to Search An Account");
								System.out.println();
							
								System.out.print("Enter an Account's Number to Search : ");
								String accNo3 = sc.next();
							
								Account a3 = a.getAccount(accNo3);
							
								if(a3 != null)
								{
									System.out.println("Account Found!!!!\n");
									System.out.println("Account Name   : "+ a3.getAccholderName());
									System.out.println("Account No     : "+ a3.getAccountNumber());
									System.out.println("Account Balance: "+ a3.getBalance());
								
								}
								else
								{
									System.out.println("\nAccount Does Not Exist!!!!!\n");
								}
								
								break;
							}
						
							case 5:
							{
								System.out.println("Going Back.......");
								continue3 = false;
								break;
							}
						
							default:
							{
								System.out.println(" No Such Option!!!");

								break;
							}
						}
					}
					

					break;
				}

                case 4:
				{	
					System.out.println("Thank You for using our application!!");
					System.exit(0);
					break;
				}
                default:
				{
					System.out.println(" No Such Option!!!");

					break;
				}
            }

        }
		
    }
}