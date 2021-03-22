public class Person
{
	private String name;
	private int age;
	Person()
	{
		System.out.println("Inside parent constructor");
	}
	Person(String name,int age,String gender)
	{
		
		this.name=name;
		this.age=age;
		System.out.println("Inside person 3 param");
		
	}
	Person(String name,int age)
	{
		this.name=name;
		this.age=age;
		
	}
	Person(String name)
	{
		this.name=name;
	}
		
	
	public void setName(String name)
	{
		this.name=name;
	}
	public void setAge(int age)
	{
		this.age=age;
	}
	
	public String getName()
	{
		return name;
	}
	public int getAge()
	{
		return age;
	}
	public void showInfo()
	{

		System.out.println("Name is :"+getName());
		System.out.println("Age is :"+getAge());

	}
	
}