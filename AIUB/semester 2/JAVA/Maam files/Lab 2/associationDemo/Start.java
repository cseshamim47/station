import java.lang.*;
public class Start
{
	public static void main(String args[])
	{
		Student s1=new Student("Shakib","11-21121-2",3.0);
		Address a1=new Address("house 17","road 15",111);
		s1.setAddress(a1);
		Student s2=new Student("Mushfiq","11-12212-2",4.0);
		s2.setAddress(a1);
		s1.showDetails();
		s2.showDetails();
		System.out.println("        -----------        ");
		System.out.println(s1.getAddress().getHouseno());
		System.out.println(s1.getAddress().getRoadno());
		System.out.println(s1.getAddress().getPostalco());
		
		
		
	}
}