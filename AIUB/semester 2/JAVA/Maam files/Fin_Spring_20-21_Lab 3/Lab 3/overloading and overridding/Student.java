public class Student extends Person
{
	private String id;
	public Student(){}
	public Student(String id)
	{
		this.id=id;
	}
	public void setId(String id)
	{
		this.id=id;
	}
	public String getId()
	{
		return id;
	}
	
	public void display2()
	{
		System.out.println("Inside Student class display-2");
	}
	
	public void display()
	{		
		System.out.println("Inside display Student");
	}
	
	/*
	public double display(int i)
	{
		System.out.println("Inside Student class display");
		return 0.0;
	}
	*/
}