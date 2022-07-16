package Interfaces;
import java.lang.*;
import Classes.Employee;

public interface EmployeeOperations
{
	boolean insertEmployee(Employee emp);
	boolean removeEmployee(Employee emp);
	Employee searchEmployee(String empId);
	void showAllEmployees();
}