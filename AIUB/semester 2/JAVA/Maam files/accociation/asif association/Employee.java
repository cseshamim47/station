class Employee 
{
	public String name;
	public String ID;
    	private EmpSalary empSalary;
    	private String phoneNo;
    	public String email;
	
	public Employee()
	{
	}
	
	public Employee( String name,String ID,EmpSalary empSalary,String phoneNo,String email )
	{
		this.name=name;
		this.ID=ID;
		this.empSalary=empSalary;
		this.phoneNo=phoneNo;
		this.email=email;
	}
	
	public String getphoneNo()
	{
		return this.phoneNo ;
	}
	public void show()
	{
		System.out.println("Name: " + name) ;
		System.out.println("ID: " + ID) ;
		System.out.println("Phone Number: " +this.phoneNo) ;
		System.out.println("Email: " + email) ;
		System.out.println("Basic Amount: " + empSalary.getbasicAmount()) ;
		System.out.println("Festival Bonus: " + empSalary.getfestivalBonus()) ;
		System.out.println("Overtime Amount: " + empSalary.getovertimeAmount()) ;
		
	}
}
