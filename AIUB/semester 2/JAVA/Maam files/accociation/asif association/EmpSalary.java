class EmpSalary
{
    private double basicAmount;
    private double festivalBonus;
    private double overtimeAmount;
    	
    public EmpSalary(){}
	
    public EmpSalary(double basicAmount, double festivalBonus,double overtimeAmount)
    {
	 this.basicAmount = basicAmount;
	 this.festivalBonus = festivalBonus;
	 this.overtimeAmount = overtimeAmount;
    }
   	 public double getbasicAmount()
    	 {
	 return this.basicAmount ;
	 }
	 
	 public double getfestivalBonus()
	 {
	 return this.festivalBonus;
	 }
	 
	 public double getovertimeAmount()
	 {
	 return this.overtimeAmount ;
	 }
}
