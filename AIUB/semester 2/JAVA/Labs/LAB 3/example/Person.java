class Person
{
	private String name;
	private int age;
	private String gender;
	Person()
	{
	
	System.out.println("Inside parent class");	
	
	}
	Person(String n,int a,String g)
	{
		name=n;
		age=a;
		gender=g;
	}
	public void setName(String n)
	{
		name=n;
	}
	public void setAge(int a)
	{
		age=a;
	}
	public void setGender(String g)
	{
		gender=g;
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
