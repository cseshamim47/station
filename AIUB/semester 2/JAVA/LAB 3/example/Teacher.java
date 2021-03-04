class Teacher extends Person
{
	private String id;
	private double salary;
	Teacher()
	{
	System.out.println("Inside child class");	
	}
	Teacher(String i,double s)
	{
	id=i;
	salary=s;
	System.out.println("Inside child class param cons");	
	}
	
	public void setId(String i)
	{
		id=i;
	}
	public void setSalary(double s)
	{
		salary=s;
	}
	public String getId()
	{
		return id;
	}
	public double getSalary()
	{
		return salary;
	}
	

}
