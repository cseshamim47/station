import java.lang.*;
import java.util.Scanner;
import classes.*;
import fileio.*;

public class Start
{
	public static void main(String args[])
	{
		Scanner sc = new Scanner(System.in);
		Bank b = new Bank();
		FileReadWriteDemo frwd = new FileReadWriteDemo();
		
        System.out.println("Welcome to Dhaka Bank");
		
		boolean repeat = true;
		while(repeat)
		{
			System.out.println("What do you want to do?");
			System.out.println("\t1. Employee Management");
			System.out.println("\t2. Customer Management");
			System.out.println("\t3. Customer Account Management");
			System.out.println("\t4. Account Transactions");
			System.out.println("\t5. Exit\n");
			
			System.out.println("Enter Your Choice: ");
			int choice = sc.nextInt();
			switch(choice)
			{
				case 1:
					
					System.out.println("You Choose Employee Management\n");
					
					System.out.println("You have following options: \n");
					System.out.println("\t1. Insert New Employee");
					System.out.println("\t2. Remove Existing Employee");
					System.out.println("\t3. Search An Employee");
					System.out.println("\t4. Show All Employees");
					System.out.println("\t5. Go Back");
					
					System.out.println("Enter You Option: ");
					int option1 = sc.nextInt();
					
					switch(option1)
					{
						case 1:
							
							System.out.println("You Choose to Insert An Employee\n");
							
							System.out.println("Enter Employee ID: ");
							String empId1 = sc.next();
							System.out.println("Enter Employee Name: ");
							String name1 = sc.next();
							System.out.println("Enter Employe Salary: ");
							double salary1 = sc.nextDouble();
							
							Employee e1 = new Employee();
							e1.setEmpId(empId1);
							e1.setName(name1);
							e1.setSalary(salary1);
							
							if(b.insertEmployee(e1))
							{ 
						          System.out.println("Employee Inserted with ID: "+e1.getEmpId());
						    }
							else
							  {
								  System.out.println("Employee Can Not be Insertd......");
							}
							
							break;
							
						case 2:
							
							System.out.println("You Choose to Remove An Employee\n");
							
							System.out.println("Enter an Employee ID to Remove: ");
							String empId2 = sc.next();
							
							Employee e2 = b.searchEmployee(empId2);
							
							if(e2 != null)
							{
								if(b.removeEmployee(e2))
								{ 
							         System.out.println("Employee Removed with ID: "+e2.getEmpId());
							    }
								else
								{
									System.out.println("Employee Can Not be Removed......");
									}
							}
							else
							{
								System.out.println("Employee Does Not Exist");
							}
							break;
							
						case 3:
							
							System.out.println("You Choose to Search An Employee\n");
							
							System.out.println("Enter an Employee ID to Search: ");
							String empId3 = sc.next();
							
							Employee e3 = b.searchEmployee(empId3);
							
							if(e3 != null)
							{
								System.out.println("Employee Found");
								System.out.println("Employee ID: "+e3.getEmpId());
								System.out.println("Employee Name: "+e3.getName());
								System.out.println("Employee Salary: "+e3.getSalary());
								
							}
							else
							{
								System.out.println("Employee Does Not Exist");
							}
							
							break;
							
						case 4:
							
							System.out.println("You Choose to See All Employees\n");
							
							
							b.showAllEmployees();
							
							break;
						
						case 5:
							
							System.out.println("You Choose to Go Back.......");
							
							break;
							
						default:
							
							System.out.println("Invalid Choice.....\n");
							break;
						
					}   
					
					break;
				
				case 2: 
					
					System.out.println("You Choose Customer  Management\n");
					
					System.out.println("You have following options: \n");
					System.out.println("\t1. Insert New Customer");
					System.out.println("\t2. Remove Existing Customer");
					System.out.println("\t3. Search A Customer");
					System.out.println("\t4. Show All Customers");
					System.out.println("\t5. Go Back");
					
					System.out.println("Enter You Option: ");
					int option2 = sc.nextInt();
					
					switch(option2)
					{
						case 1:
						
							System.out.println("You Choose to Insert A Customer\n");
							
						    System.out.println("Enter Customer NID: ");
							int nid1 = sc.nextInt();
							System.out.println("Enter Customer Name: ");
							String name1 = sc.next();
							
							Customer c1 = new Customer();
							c1.setNid(nid1);
							c1.setName(name1);
							
							if(b.insertCustomer(c1))
							{
								System.out.println("Customer Inserted with NID: "+c1.getNid());
							}
							else
							{
								System.out.println("Customer can not be inserted");
							}
							
							break;
							
						case 2:
						
						System.out.println("You Choose to Remove Existing Customer");
							
							System.out.println("Enter Customer NID to Remove: ");
							int nid2 = sc.nextInt();
							System.out.println("Enter Customer Name to Remove: ");
							String name2 = sc.next();
							
						    Customer c2 = b.searchCustomer(nid2);
							
							if(c2 != null)
							{
								if(b.removeCustomer(c2))
								{ 
							         System.out.println("Customer Removed with NID: "+c2.getNid());
									 System.out.println("Customer Removed with Name: "+c2.getName());
							    }
								else
								{
									System.out.println("Customer Can Not be Removed......");
									}
							}
							else
							{
								System.out.println("Customer Does Not Exist");
							}
						
						    break;
							
						case 3:
							
							System.out.println("You Choose to Search a Customer\n");
							
						    System.out.println("Enter Customer NID: ");
							int nid3 = sc.nextInt();
							
							Customer c3 = b.searchCustomer(nid3);
							
							if(c3 != null)
							{
								System.out.println("Customer Found");
								System.out.println("Customer Name: "+c3.getName());
								System.out.println("Customer NID: "+c3.getNid());
								c3.showAllAccounts();
							}
							else
							{
								System.out.println("Customer Does Not Exist");
							}
							
							break;
							
						case 4:
						
						System.out.println("You choose to see All Customers\n");
						
						b.showAllCustomers();
						
							break;
							
						case 5:
						
						System.out.println("You choice to Go back");
						
							break;
							
						default:
							System.out.println("Invalid Option............");
							break;
					}
					
					break;
				
				case 3:
					
					System.out.println("You Choose Account Management/n");
					
					System.out.println("You have following options: \n");
					System.out.println("\t1. Insert New Account for a Customer");
					System.out.println("\t2. Go Back");
					
					System.out.println("Enter You Option: ");
					int option3 = sc.nextInt();
					
					switch(option3)
					{
						case 1:
							
							System.out.println("You Choose to Create an Account for a Customer\n");
							
							System.out.println("Enter Customer NID: ");
							int nid1 = sc.nextInt();
							
							if(b.searchCustomer(nid1) != null)
							{
								System.out.println("\tWhat type of account do you want to create?");
								System.out.println("\t1. Savings Account");
								System.out.println("\t2. Fixed Account");
								System.out.println("\t3. Go Back");
								
								System.out.println("Enter Account Type: ");
								int accountType = sc.nextInt();
								
								if(accountType == 1)
								{
									System.out.println("Enter Account Number: ");
									int an1 = sc.nextInt();
									System.out.println("Enter Account Balance: ");
									double b1 = sc.nextDouble();
									System.out.println("Enter Interest Rate: ");
									double ir = sc.nextDouble();
									
									SavingsAccount sa = new SavingsAccount();
									sa.setAccountNumber(an1);
									sa.setBalance(b1);
									sa.setInterestRate(ir);
									
									if(b.searchCustomer(nid1).insertAccount(sa))
									{
										System.out.println("Account Inserted for "+ nid1 + " with Account Number " + an1);
									}
									else
									{
										System.out.println("Account Can Not Be Inserted");
									}
									
									
								}
								else if(accountType == 2)
								{
									System.out.println("Enter Account Number: ");
									int an1 = sc.nextInt();
									System.out.println("Enter Account Balance: ");
									double b1 = sc.nextDouble();
									System.out.println("Enter Tenure Year: ");
									int ty = sc.nextInt();
									
									FixedAccount fa = new FixedAccount();
									fa.setAccountNumber(an1);
									fa.setBalance(b1);
									fa.setTenureYear(ty);
									
									if(b.searchCustomer(nid1).insertAccount(fa))
									{
										System.out.println("Account Inserted for "+ nid1 + " with Account Number " + an1);
									}
									else
									{
										System.out.println("Account Can Not Be Inserted");
									}
								}
								else if(accountType == 3)
								{
									System.out.println("Going Back.........");
								}
								else
								{
									System.out.println("Invalid Account Type");
								}
							}
							else
							{
								System.out.println("NID  CAN'T MATCH");
							}
							
							break;
						
						case 2:
						
						System.out.println("You Choice to Go Back");
						
							break;
							
						default:
						
						System.out.println("Invalid Option........");
							
							break;
					}
					
					break;
					
				case 4:
					
					System.out.println("You Choose Account-Transactions\n");
					
					
					System.out.println("You have following options: \n");
					System.out.println("\t1. Deposit Money");
					System.out.println("\t2. Withdraw Money");
					System.out.println("\t3. Show Tarnsaction History");
					System.out.println("\t4. Go Back");
					
					System.out.println("Enter You Option: ");
					int option4 = sc.nextInt();
					
					switch(option4)
					{
						case 1: 
							
					        System.out.println("You Choose to Deposit Money\n");
							
							System.out.println("Enter Customer NID: ");
							int nid = sc.nextInt();
							
							if(b.searchCustomer(nid) != null)
							{
								System.out.println("Enter Account Number: ");
								int an1 = sc.nextInt();
								
								if(b.searchCustomer(nid).searchAccount(an1) != null)
								{
									System.out.println("Enter Amount to Deposit: ");
									double am = sc.nextDouble();
									
									if(b.searchCustomer(nid).searchAccount(an1).deposit(am))
									{
										System.out.println("Deposit Successfull");
										frwd.writeInFile("Deposit: $"+ am +" in Account Number " + an1 + " by " + nid);
									}
									else
									{
										System.out.println("Can Not Deposit");
									}
								}
								else
								{
									System.out.println("Invalid Account Number");
								}
								
							}
							else
							{
								System.out.println("NID CAN'T MATCH");
							}
							
							break;
					
						case 2:
						
						System.out.println("You Choose to Withdraw Money\n");
							
							System.out.println("Enter Customer NID: ");
							int nid2 = sc.nextInt();
							
							if(b.searchCustomer(nid2) != null)
							{
								System.out.println("Enter Account Number: ");
								int an1 = sc.nextInt();
								
								if(b.searchCustomer(nid2).searchAccount(an1) != null)
								{
									System.out.println("Enter Amount to Withdraw: ");
									double am1 = sc.nextDouble();
									
									if(b.searchCustomer(nid2).searchAccount(an1).withdraw(am1))
									{
										System.out.println("Withdraw Successfull");
										frwd.writeInFile("Withdraw: $"+ am1 +" in Account Number " + an1 + " by " + nid2);
									}
									else
									{
										System.out.println("Can Not Withdraw");
									}
								}
								else
								{
									System.out.println("Invalid Account Number");
								}
								
							}
							else
							{
								System.out.println("NID CAN'T MATCH");
							}

							break;
							
						case 3:
							
							
							System.out.println("You Choose See Transaction History\n");
							
							frwd.readFromFile();
							
							break;
							
						case 4:
						
						System.out.println("You Choose to Go Back");
						
							break;
							
						default:
						
						System.out.println("Invalid Option.....");
						
							break;
					}
					
					break;
			
				
				case 5:
					
					System.out.println("You Choose Exit\n");
					
					repeat = false;
					break;
				
				default:
					
					System.out.println("Invalid Choice...../n");
					break;
			
			}

		}
	}
}
	


