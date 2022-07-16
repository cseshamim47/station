package  classes;
import java.lang.*;
import interfaces.*;
public class University implements  StudentOperations
{
	
	private Student students[] = new Student [100];
	
	
	
	
	public void insertStudent(Student s)
	{
		int flag = 0;
		for(int i=0; i<students.length; i++)
		{
			if(students[i] == null)
			{
				students[i] = s;
				flag = 1;
				break;
			}
		}
		if(flag == 1)
		{
			System.out.println("Student Inserted");
		}
		else
		{
			System.out.println("Can Not Insert");
		}
	}
	
	public void removeStudent(Student s)
	{
		int flag = 0;
		for(int i=0; i<students.length; i++)
		{
			if(students[i] == s)
			{
				students[i] = null;
				flag = 1;
				break;
			}
		}
		if(flag == 1){System.out.println("Student Removed");}
		else{System.out.println("Can Not Remove");}
	}
	public void showAllStudents()
	{
		System.out.println("_______________________________________");
		for(Student s : students)
		{
			if(s != null)
			{
				System.out.println("Student Name: "+ s.getName());
				System.out.println("Student ID: "+ s.getSId());
				System.out.println("Last semister CGPA: "+ s.getLastSemisterCGPA());
				System.out.println("Total credit completed: "+ s.getTotalcompletedcredit());
				System.out.println("Student Status : "+s.checkstudentstatus() );
				System.out.println("Graduation Status : "+s.graduationeligibilitycheck() );
				
				System.out.println("______________________________________________________");
			}
		}
		
	}
	public Student getStudent(String sId)
	{
		Student s = null;
		
		for(int i=0; i<students.length; i++)
		{
			if(students[i] != null)
			{
				if(students[i].getSId().equals(sId))
				{
					s = students[i];
					break;
				}
			}
		}
		if(s != null)
		{
			System.out.println("Student Found");
		}
		else
		{
			System.out.println("Student Not Found");
		}
		return s;
	}
}