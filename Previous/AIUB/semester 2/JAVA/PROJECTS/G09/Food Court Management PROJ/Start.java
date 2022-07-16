import java.lang.*;
import java.util.Scanner;
import Classes.*;
import fileio.*;

public class Start
{
	public static void main(String args[])
	{
		Scanner sc = new Scanner(System.in);
		FoodCourt fooco = new FoodCourt();
		FileReadWriteDemo frwd = new FileReadWriteDemo();
		
		System.out.println("____________________*____________________");
		System.out.println();
		System.out.println("WELCOME TO " + "ESHO AMRA TRIO KHELI (RUDE) " + "FOOD COURT\n");				
		System.out.println("____________________*____________________\n");
		
		boolean cycle = true;
		
		while(cycle)
		{
			System.out.println("What Do You Want To Do: \n");
			System.out.println("\t1. Employee Management");
			System.out.println("\t2. Restaurant Management");
			System.out.println("\t3. Restaurant Food Item Management");
			System.out.println("\t4. Food Item Quantity Add-Sell");
			System.out.println("\t5. Exit \n");
			System.out.println("--------------"); 
			System.out.print("Enter Your Choice: ");
			int choice = sc.nextInt();
		
			switch(choice)
			{
				case 1:
				
					System.out.println("***");
					System.out.println("Employee Management");
					System.out.println("***");
					
					System.out.println("You Have The Following Options: \n");				 
					System.out.println("\t1. Insert New Employee");
					System.out.println("\t2. Remove Existing Employee");
					System.out.println("\t3. Show All Employees");
					System.out.println("\t4. Search An Employee");
					System.out.println("\t5. Go Back \n");
					System.out.println("--------------"); 
					System.out.print("Enter Your Prefered Option: ");
					int option1 = sc.nextInt();
					
					switch(option1)
					{
						case 1:
						
							System.out.println("***");
							System.out.println("Insert An Employee");
							System.out.println("***");
							System.out.print("Enter Employee ID: ");
							String empins = sc.next();
							System.out.print("Enter Employee Name: ");
							sc.nextLine();
							String nameins = sc.nextLine();
							System.out.print("Enter Employee Salary: "); 									
							double salaryins = sc.nextDouble();
							
							Employee eins = new Employee();
							eins.setEmpId(empins);
							eins.setName(nameins);
							eins.setSalary(salaryins);
							
							if(fooco.insertEmployee(eins))
							{
								System.out.println("Employee Inserted With ID: "+eins.getEmpId());
							}

							else
							{
								System.out.println("Sorry! Employee Can Not Be Inserted..!");
							}
							break;
							
						case 2:
						
							System.out.println("***");
							System.out.println("Remove An Employee");
							System.out.println("***");
							
							System.out.print("Enter An Employee ID To Remove: ");
							String emprem = sc.next();
							
							Employee erem = fooco.searchEmployee(emprem);
							                                                                                 
							if(erem != null)
							{
								if(fooco.removeEmployee(erem))
								{
									System.out.println("Employee Removed With ID: "+erem.getEmpId());
								}

								else
								{
									System.out.println("Sorry! Employee Couldnt Not Be Removed..!");
								}
							}

							else
							{
								System.out.println("There Aint No Such Goddamn Employee! -.-");
							}
							break;
							
						case 3:
						
							System.out.println("***");
							System.out.println("See All Employees");           
							System.out.println("***");
							fooco.showAllEmployees();
							break;
							
						case 4:
							
							System.out.println("***");
							System.out.println("Search An Employee");
							System.out.println("***");
							
							System.out.print("Enter An Employee ID To Search: ");
							String empser = sc.next();
							
							Employee eser = fooco.searchEmployee(empser);
																							
							if(eser != null)
							{
								System.out.println("Employee Found");
								System.out.println("Employee ID: "+eser.getEmpId());
								System.out.println("Employee Name: "+eser.getName());
								System.out.println("Employee Salary: "+eser.getSalary());
							}

							else
							{
								System.out.println("There Aint No Such Goddamn Employee! -.-");
							}
							break;
						
						case 5:
						
							System.out.println("***");
							System.out.println("You Choose To Go Back...");                      
							System.out.println("***");
							break;
							
						default:
						
							System.out.println("<>");                    
							System.out.println("Invalid Option! Please Be a little more educated or careful! -.-");
							break;
					}
					break;
				
				case 2: 
				
					System.out.println("***");
					System.out.println("Restaurant Management");
					System.out.println("***");
				
					System.out.println("You Have The Following Options: \n");                        
					System.out.println("\t1. Insert New Restaurant");
					System.out.println("\t2. Remove Existing Restaurant");
					System.out.println("\t3. Show All Restaurants");
					System.out.println("\t4. Search A Restaurant");
					System.out.println("\t5. Go Back \n");
					System.out.print("Enter Your Prefered Option: ");
					int option2 = sc.nextInt();
					
					switch(option2)
					{
						case 1:
						
							System.out.println("***");
							System.out.println("Insert New Restaurant");
							System.out.println("***");
							System.out.print("Enter Restaurant's ID: ");
							String ridrins = sc.next();
							System.out.print("Enter Restaurant's Name: ");
							String namerins = sc.next();											   
							Restaurant rins = new Restaurant();
							rins.setRid(ridrins);
							rins.setName(namerins);
							
							if(fooco.insertRestaurant(rins))
							{
								System.out.println("Restaurant Inserted With ID: "+rins.getRid());
							}

							else{
								System.out.println("Sorry! Restaurant Couldnt Be Inserted..!");
							}
							break;
							
						case 2:
						
							System.out.println("***");
							System.out.println("Remove A Restaurant");
							System.out.println("***");
							
							System.out.print("Enter A Restaurant ID To Remove: ");                     
							String ridrem = sc.next();
							
							Restaurant rrem = fooco.searchRestaurant(ridrem);                                   
							
							if(rrem != null)
							{
								if(fooco.removeRestaurant(rrem))
								{
									 System.out.println("Restaurant Removed With ID: "+rrem.getRid());
								}

								else
								{
									System.out.println("Sorry! Restaurant Couldnt Not Be Removed..!");}
								}
							else
							{
								System.out.println("There Aint No Such Goddamn Restaurant! -.-");
							}
							break;
							
						
						case 3:
							
							System.out.println("***");
							System.out.println("See All Restaurants");                 
							System.out.println("***"); 
							
							fooco.showAllRestaurants();
							break;
							
						case 4:
							
							System.out.println("***");
							System.out.println("Search A Restaurant");
							System.out.println("***");
							
							System.out.print("Enter Restaurant ID: ");
							String ridser = sc.next();
							Restaurant rser = fooco.searchRestaurant(ridser);
							
							if(rser != null)                                        
							{
								System.out.println("Restaurant Found");
								System.out.println("Restaurant Name: "+rser.getName());
								System.out.println("Restaurant ID: "+rser.getRid());
								
							}
							else
							{
								System.out.println("There Aint No Such Goddamn Restaurant! -.-");
							}
							break;
							
						case 5:
						
							System.out.println("***");
							System.out.println("You Choose To Go Back...");                                            
							System.out.println("***");
							break;
							
						default:

							System.out.println("<>");
							System.out.println("Invalid Option! Be a little more educated or careful! -.-");                           
							break;
					}
					
					break;
				
				case 3:
				
					System.out.println("***");
					System.out.println("Restaurant Food Item Management");
					System.out.println("***");
					
					System.out.println("You Have Following Options: \n");
					System.out.println("\t1. Insert New Food Item");
					System.out.println("\t2. Remove Existing Food Item");										
					System.out.println("\t3. Show All Food Items");
					System.out.println("\t4. Search A Food Item");
					System.out.println("\t5. Go Back \n");
					System.out.print("Enter Your Prefered Option: ");
					int option3 = sc.nextInt();
				
				switch(option3)
					{
						
						case 1:
							
							System.out.println("***");
							System.out.println("Insert A Food Item For A Restaurant");
							System.out.println("***");
							
							System.out.print("Enter Restaurant ID: ");
							String ridcres = sc.next();
							
							if(fooco.searchRestaurant(ridcres) != null)
							{
								System.out.println("\tWhat type of Food Item do you want to insert?");
								System.out.println("\t1. MainDish");
								System.out.println("\t2. Appetizers");
								System.out.println("\t3. Go Back \n");
								System.out.print("Enter Food Item Type: ");
								int FoodOpt = sc.nextInt();
								
								if(FoodOpt == 1)
								{
									System.out.print("Enter Food ID: ");
									String foodidin = sc.next();
									System.out.print("Enter Food Name: ");
									String foodnamein = sc.next();
									System.out.print("Enter Food Quantity: ");
									int quantityin = sc.nextInt();
									System.out.print("Enter Price: ");
									double pricein = sc.nextDouble();
									System.out.print("Enter Food Category: ");
									String categoryin = sc.next();
							
									MainDish mad = new MainDish();
									mad.setFid(foodidin);
									mad.setName(foodnamein);
									mad.setAvailableQuantity(quantityin);
									mad.setPrice(pricein);
									mad.setCategory(categoryin);
									
									if(fooco.searchRestaurant(ridcres).insertFoodItem(mad))
									{
										System.out.println("Food Item Inserted For "+ ridcres + " With Food ID " + foodidin);
									}
									else
									{
										System.out.println("Sorry! Food Item Couldnt Be Inserted!");
									}
									
								}
								else if(FoodOpt == 2)
								{
									System.out.print("Enter Food ID: ");
									String foodidin = sc.next();
									System.out.print("Enter Food Name: ");
									String foodnamein = sc.next();
									System.out.print("Enter Food Quantity: ");
									int quantityin = sc.nextInt();
									System.out.print("Enter Price: ");
									double pricein = sc.nextDouble();
									System.out.print("Enter Size: ");
									String sizein = sc.next();
									
									Appetizers apz = new Appetizers();
									apz.setFid(foodidin);
									apz.setName(foodnamein);
									apz.setAvailableQuantity(quantityin);
									apz.setPrice(pricein);
									apz.setSize(sizein);
									
									if(fooco.searchRestaurant(ridcres).insertFoodItem(apz))
									{
										System.out.println("Food Item Inserted For "+ ridcres + " With Food ID " + foodidin);
									}
									else
									{
										System.out.println("Sorry!Food Item Couldnt Be Inserted!");
									}
								}
								else if(FoodOpt == 3)
								{
									System.out.println("Going Back...");
								}
								
							}
							else
							{
								System.out.println("There Aint No Goddamn Restaurant With This ID! -.-");           
							}
							break;
							
						case 2:
						
							System.out.println("***");
							System.out.println("Remove A Food Item From A Restaurant");
							System.out.println("***");
						
							System.out.print("Enter Restaurant ID: ");
							String ridserr = sc.next();
							System.out.print("Enter Food ID: ");
							String foodidinn = sc.next();
							
							Restaurant rs = fooco.searchRestaurant(ridserr);
							FoodItem finn = rs.searchFoodItem(foodidinn);

							
							if(finn != null)
							{
								if(rs.removeFoodItem(finn)){
									 System.out.println("Food Item Removed with ID: "+foodidinn);
									}

								else
								{
									System.out.println("Sorry! Food Item Couldnt be Removed..!");}
							    }
							else
							{
								System.out.println("There Aint No Such Goddamn Food Item! -.-");
							}
							break;
							
						case 3:
							
							System.out.println("***");
							System.out.println("See All Food Items Of A Restaurant");
							System.out.println("***");
							System.out.print("Enter Restaurant ID: ");
                            String red = sc.next();
							
							fooco.searchRestaurant(red).showAllFoodItems();
							break;
							
						case 4:
							
							System.out.println("***");
							System.out.println("Search A Food Item");
							System.out.println("***");
							
							System.out.print("Enter Restaurant ID: ");
                            String ridd = sc.next();
							System.out.print("Enter Food ID To Search: ");
							String fidd = sc.next();												
							
							FoodItem FIt = fooco.searchRestaurant(ridd).searchFoodItem(fidd);

							if(FIt != null)
							{
								System.out.println("Sorry! Food Item Found!");
								FIt.showInfo();
							}
							else
							{
								System.out.println("There Aint No Such Goddamn Food Item! -.-");
							}
							
							break;
						
						case 5:
						
							System.out.println("***");
							System.out.println("You Choose to Go Back...");
							System.out.println("***");
							break;
																									
						default:
							
							System.out.println("<>");
							System.out.println("Invalid Option! Be a little more educated or careful! -.-");
							break;
					}
					break;
					
				case 4:
				
					System.out.println("***");
					System.out.println("FoodItem Quantity Add-Sell");
					System.out.println("***");
					
					System.out.println("You Have The Following Options: \n");
					System.out.println("\t1. Add Food Item");
					System.out.println("\t2. Sell Food Item");
					System.out.println("\t3. Show Add Sell History");
					System.out.println("\t4. Go Back \n");
					
					System.out.print("Enter Your Prefered Option: ");
					int option4 = sc.nextInt();
					
					switch(option4)
					{
						case 1: 
							
							System.out.println("***");
							System.out.println("Add Food Item");
							System.out.println("***");
							
							System.out.print("Enter Restaurant ID: ");
							String ridser = sc.next();
							
							if(fooco.searchRestaurant(ridser) != null)
							{
								System.out.print("Enter Food ID: ");
								String fidser = sc.next();
								
								if(fooco.searchRestaurant(ridser).searchFoodItem(fidser) != null)
								{
									System.out.print("Enter Amount To Add: ");
									int am = sc.nextInt();
									
									if(fooco.searchRestaurant(ridser).searchFoodItem(fidser).addQuantity(am))
									{
										System.out.println("Congo! Item Added Successfully!");
										frwd.writeInFile("Added: "+ am +" Unit/Units" + "\nFood ID: " + fidser + "\n Restaurant: " + ridser+ "\n");
									}
									else
									{
										System.out.println("Sorry! Can Not Add The Amount!");
									}
								}
								else
								{
									System.out.println("There Aint No Such Food ID! -.-");
								}
								
							}
							else
							{
								System.out.println("There Aint No Such Restaurant! -.-");
							}
							
							break;
							
						case 2:
						
							System.out.println("***");
							System.out.println("Sell Food Item");
							System.out.println("***");
							
							System.out.print("Enter Restaurant ID: ");
							String ridser2 = sc.next();
							
							if(fooco.searchRestaurant(ridser2) != null)
							{
								System.out.print("Enter Food ID: ");
								String fid = sc.next();
								
								if(fooco.searchRestaurant(ridser2).searchFoodItem(fid) != null)
								{
									System.out.print("Enter Amount To Sell: ");
									int ams = sc.nextInt();

									if(fooco.searchRestaurant(ridser2).searchFoodItem(fid).sellQuantity(ams))
									{
										System.out.println("Sold Successfully");
										frwd.writeInFile("Sold: "+ ams + " Unit/Units" + "\nFood ID: " + fid + "\nRestaurant: " + ridser2+ "\n");
									}

									else
									{
										System.out.println("Sorry! Can Not Sell Anymore!");
									}
								}
								else
								{
									System.out.println("There Aint No Such Goddamn Food ID! -.-");
								}
								
							}
							else
							{
								System.out.println("There Aint No Such Restaurant! -.-");
							}
							
							break;
							
						case 3:
							
							System.out.println("***");
							System.out.println("Add Sell History");
							System.out.println("***");
							
							frwd.readFromFile();
							
							break;
							
			
						case 4:
						
						System.out.println("***");
						System.out.println("You Choose to Go Back...");
						System.out.println("***");
						break;
					
						default:
					
							System.out.println("<>");
							System.out.println("Invalid Option! Be a little more educated or careful! -.-");
							break;
					
					}
					
					break;
			
			case 5:
							System.out.println();

							for (int i = 1; i < 6; i++)
							{
								for (int j = 0; j < i; j++)
								{
									System.out.print("*");
								}
								System.out.println();
							}

							System.out.println();

							System.out.println("_________________________________________");
							System.out.println("\t*****  Thank You For Eating Here! Hope You May Never Come Back Again ^_^ *****");
							System.out.println("_________________________________________");
							cycle = false;
							break;
					
						default:
					
							System.out.println("<>");
							System.out.println("Invalid Option! Be a little more educated or careful! -.-");
							break;
			}
			System.out.println();
		}
	}
}