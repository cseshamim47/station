import java.lang.*;
public class Student
{
	
	private String name;
	private String id;
	Course courses[];
	
	public Student()
	{
		
	}
	
	public Student(String name,String id,int size)
	{
		this.name=name;
		this.id=id;
		courses=new Course[size];
		
	}
	
	public void setName(String name)
	{
		this.name=name;
	}
	public void setId(String i)
	{
		this.id=id;
	}
	
	/*
	public void setCourse(Course c[])    
	{
			courses=c;
		
	}
	*/
	public void setCourse(Course c)    
	{
		int flag=0;
		for(int i=0;i<courses.length;i++)
		{
			if(courses[i]==null)
			{
					courses[i]=c;
					flag=1;
					break;
			}
		
		}
		if(flag==0)
				{
					System.out.println("course could not be inserted");

				}
		else
				{
					System.out.println("course inserted");
				}
		
			
		
	}
	
	public void getCourse()
	{
		
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
					flag=1;
				}
				
			}
			
		}
				if(flag==0)
				{
					System.out.println("The course does not exist");

				}
				else
				{
					System.out.println("The course exists");
				}
		
	}
	
	
	public void removeCourse(Course c)    
	{
		int flag=0;
		for(int i=0;i<courses.length;i++)
		{
			if(courses[i]== c)
			{
					courses[i]= null;
					flag=1;
					break;
			}
		
		}
		if(flag==0)
				{
					System.out.println("course could not be removed");

				}
		else
				{
					System.out.println("course removed");
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