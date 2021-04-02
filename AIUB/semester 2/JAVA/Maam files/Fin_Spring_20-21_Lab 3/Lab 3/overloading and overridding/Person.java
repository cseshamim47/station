public class Person
{
	private String name;
	private int age;
	public Person(){}
	public Person(String name, int age)
	{
		this.name=name;
		this.age=age;
	}
	public Person(String name)
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
	
	public void display()
	{
		
		System.out.println("inside display Person");

	}
	
	
	public void display1()
	{
		System.out.println("inside display1 Person");
		
	}
	
	/*
	public int display(int i)
	{
		System.out.println("Value of i is: "+i);
		return 0;
	}
	*/
}
