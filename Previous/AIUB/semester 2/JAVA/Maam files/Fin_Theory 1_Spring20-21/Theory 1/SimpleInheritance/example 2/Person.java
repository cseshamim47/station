public class Person
{
	private String name;
	private int age;
	private String gender;
	Person()
	{
		System.out.println("Inside parent constructor");
	}
	Person(String name,int age,String gender)
	{
		
		this(name,age);
		this.gender=gender;
		System.out.println("Inside person 3 param");
		
	}
	Person(String name,int age)
	{
		this(name);
		this.age=age;
		System.out.println("Inside person 2 param");

	}
	Person(String name)
	{
		this.name=name;
		System.out.println("Inside person 1 param");

	}
	public void setName(String name)
	{
		this.name=name;
	}
	public void setAge(int age)
	{
		this.age=age;
	}
	public void setGender(String gender)
	{
		this.gender=gender;
	}
	public String getName()
	{
		return name;
	}
	public int getAge()
	{
		return age;
	}
	public String getGender()
	{
		return gender;
	}
}