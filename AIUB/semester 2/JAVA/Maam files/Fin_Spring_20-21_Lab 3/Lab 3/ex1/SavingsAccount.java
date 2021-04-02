public class SavingsAccount extends Account
{
	
	private double interestRate;
	public SavingsAccount(){}
	public SavingsAccount(String accountNo,double balance,double interestRate)
	{
		super(accountNo,balance);
		this.interestRate=interestRate;
	}
	public void setInterestRate(double interestRate)
	{
		this.interestRate=interestRate;
	}
	public double getInterestRate()
	{
		return interestRate;
	}
}