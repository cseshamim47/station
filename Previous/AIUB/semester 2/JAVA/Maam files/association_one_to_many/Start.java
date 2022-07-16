import java.lang.*;
public class Start
{
	public static void main(String args[])
	{
		Student s1=new Student("Shakib","11-21121-2");
		
		Course c1=new Course("math-1","101");
		Course c2=new Course("cse-1","201");
		Course c3=new Course("english-1","301");
		
		Course c[]=new Course[5];
		c[0]=c1;
		c[1]=c2;
		c[4]=c3;
		
		s1.setCourse(c);		
		
		System.out.println("        -----------        ");
		System.out.println("Student name is : "+s1.getName());
		System.out.println("Student ID is: "+s1.getId());
		
		System.out.println("        -----------        ");
		s1.getCourse();
		
		System.out.println();
		
		s1.searchCourse("101");
		s1.searchCourse("201");
		s1.searchCourse("501");
		
	}
}
