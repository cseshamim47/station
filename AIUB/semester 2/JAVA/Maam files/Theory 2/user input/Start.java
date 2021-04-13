import java.util.Scanner;
public class Start 
{
	public static void main(String args[])
	{
		Scanner input=new Scanner(System.in);
		int id;
		double sal;
		String name;
		
		Person p1=new Person();
		
		

		System.out.print("Enter your id : ");
		id=input.nextInt();
		p1.setId(id);
		
		System.out.print("Enter your salary : ");
		sal=input.nextDouble();
		p1.setSalary(sal);
		
		System.out.print("Enter your Name : ");
		input.nextLine();
		name=input.nextLine();
		p1.setName(name);
				
		System.out.println("Name: "+p1.getName());
		System.out.println("Id: "+p1.getId());
		System.out.println("Salary: "+p1.getSalary());
		
		
		
	}
}