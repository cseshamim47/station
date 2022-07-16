package Classes;
import java.lang.*;
import Interfaces.*;

public class FoodCourt implements RestaurantOperations, EmployeeOperations
{
	private Restaurant restaurants[] = new Restaurant [10];
	private Employee employees[] = new Employee [200];
	
	public boolean insertRestaurant(Restaurant res)
	{
		boolean flag = false;
		for(int i=0; i<restaurants.length; i++)
		{
			if(restaurants[i] == null)
			{
				restaurants[i] = res;
				flag = true;
				break;
			}
		}
		return flag;
	}
	
	public boolean removeRestaurant(Restaurant res)
	{
		boolean flag = false;
		for(int i=0; i<restaurants.length; i++)
		{
			if(restaurants[i] == res)
			{
				restaurants[i] = null;
				flag = true;
				break;
			}
		}
		return flag;		
	}

	public void showAllRestaurants()
	{
		System.out.println("____________________*____________________");
		System.out.println();
		
		for(int i=0; i<restaurants.length; i++)
		{
			if(restaurants[i] != null)
			{
				System.out.println("Restaurant Name: "+ restaurants[i].getName());
				System.out.println("Restaurant ID: "+ restaurants[i].getRid());
				System.out.println();
			}
		}

		System.out.println("____________________*____________________");
	}
	
	public Restaurant searchRestaurant(String resId)
	{	
		Restaurant res = null;
		
		for(int i=0; i<restaurants.length; i++)
		{
			if(restaurants[i] != null)
			{
				if (restaurants[i].getRid().equals(resId))
				{
					res = restaurants[i];
					break;
				}
			}
		}
		return res;
	}
	
	public boolean insertEmployee(Employee emp)
	{
		boolean flag = false;
		for(int i=0; i<employees.length; i++)
		{
			if(employees[i] == null)
			{
				employees[i] = emp;
				flag = true;
				break;
			}
		}
		return flag;
	}
	
	public boolean removeEmployee(Employee emp)
	{
		boolean flag = false;
		for(int i=0; i<employees.length; i++)
		{
			if(employees[i] == emp)
			{
				employees[i] = null;
				flag = true;
				break;
			}
		}
		return flag;
	}
	
	public void showAllEmployees()
	{
		System.out.println("____________________*____________________");
		System.out.println();

		for(int i=0; i<employees.length; i++)
		{
			if(employees[i] != null)
			{
				System.out.println("Employee Name: "+ employees[i].getName());
				System.out.println("Employee ID: "+ employees[i].getEmpId());
				System.out.println("Salary: "+ employees[i].getSalary());
				System.out.println();
			}
		}
		
		System.out.println("____________________*____________________");
	}
	
	public Employee searchEmployee(String empId)
	{
		Employee emp = null;
		
		for(int i=0; i<employees.length; i++)
		{
			if(employees[i] != null)
			{
				if(employees[i].getEmpId().equals(empId))
				{
					emp = employees[i];
					break;
				}
			}
		}
		return emp;
	}
}