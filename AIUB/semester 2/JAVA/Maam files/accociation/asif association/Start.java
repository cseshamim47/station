class Start
{
	public static void main(String arg[])
	{
		EmpSalary empSalary = new EmpSalary( 30000.28,15000.77,12000.22) ;
		
		Employee e = new Employee( "Asif" , "A1523" , empSalary, "+88017373838331","asif@gmail.com") ;
		e.show() ;
		
	}
}
