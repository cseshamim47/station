import java.lang.*;
public class Student
{
	
	private String name;
	private String id;
	Course courses[];
	
	public Student()
	{
		
	}
	
	public Student(String name,String id)
	{
		this.name=name;
		this.id=id;
		
	}
	
	public void setName(String name)
	{
		this.name=name;
	}
	public void setId(String i)
	{
		this.id=id;
	}
	
	
	public void setCourse(Course c[])    
	{
			courses=c;
		
	}
	
	public void getCourse()
	{
		
		int count=courses.length;
		System.out.println("You have "+count+ " Courses");
		for(int i=0;i<courses.length;i++)
		{
			if (courses[i]!=null)
			{
		System.out.println("Course name is: "+courses[i].getCname());
		System.out.println("Course id is: "+ courses[i].getCid());
			}
		}
		
		
	}
	public void searchCourse(String cid)
	
	{
		int flag=0;
		for(int i=0;i<courses.length;i++)
		{
			if (courses[i]!=null)
			{
				if (courses[i].getCid().equals(cid))
				{
					System.out.println("shamim : Course name is: "+courses[i].getCname());
		System.out.println("Shamim : Course id is: "+ courses[i].getCid());
						flag=1;
				}
				
			}
			
		}
				if(flag==0)
				{
					System.out.println("The book does not exist");

				}
				else
				{
					System.out.println("The book exists");
				}
		
	}
	
	public String getName()
	{
		return name;
	}
	public String getId()
	{
		return id;
	}
	
	
}
