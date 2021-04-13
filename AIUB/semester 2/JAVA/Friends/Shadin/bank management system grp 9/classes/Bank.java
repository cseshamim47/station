package classes;
import java.lang.*;
import interfaces.*;

public class Bank implements CustomerOperations, EmployeeOperations
{
	private Customer customers[] = new Customer [500];
	private Employee employees[] = new Employee [100];
	
	public boolean insertCustomer(Customer c)
	{
		boolean flag = false;
		for(int i=0; i<customers.length; i++)
		{
			if(customers[i] == null)
			{
				customers[i] = c;
				flag = true;
				break;
			}
		}
		return flag;
	}
	
	public boolean removeCustomer(Customer c)
	{
		boolean flag = false;
		for(int i=0; i<customers.length; i++)
		{
			if(customers[i] == c)
			{
				customers[i] = null;
				flag = true;
				break;
			}
		}
		return flag;
	}
	public void showAllCustomers()
	{
		for(int i=0; i<customers.length; i++)
		{
			if(customers[i] != null)
			{
				System.out.println("Customer Name: "+ customers[i].getName());
				System.out.println("Customer NID: "+ customers[i].getNid());
				
				customers[i].showAllAccounts();
			}
		}
	}
	public Customer searchCustomer(int nid)
	{
		Customer c = null;
		
		for(int i=0; i<customers.length; i++)
		{
			if(customers[i] != null)
			{
				if(customers[i].getNid() == nid)
				{
					c = customers[i];
					break;
				}
			}
		}
		return c;
	}
	
	
	public boolean insertEmployee(Employee e)
	{
		boolean flag = false;
		for(int i=0; i<employees.length; i++)
		{
			if(employees[i] == null)
			{
				employees[i] = e;
				flag = true;
				break;
			}
		}
		return flag;
	}
	
	public boolean removeEmployee(Employee e)
	{
		boolean flag = false;
		for(int i=0; i<employees.length; i++)
		{
			if(employees[i] == e)
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
	}
	public Employee searchEmployee(String empId)
	{
		Employee e = null;
		
		for(int i=0; i<employees.length; i++)
		{
			if(employees[i] != null)
			{
				if(employees[i].getEmpId().equals(empId))
				{
					e = employees[i];
					break;
				}
			}
		}
		return e;
	}
}