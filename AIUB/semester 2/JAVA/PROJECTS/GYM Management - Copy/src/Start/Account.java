package Start;

public class Account{

	public  String accountNumber;
	public double balance;
	public String accHolderName;
	
	public void setAccholderName(String accHolderName)
	{
		this.accHolderName=accHolderName;
	}
	
	public void setAccountNumber( String accountNumber)
	{
		this.accountNumber = accountNumber;
	}
	public void setBalance(double balance)
	{
		this.balance = balance;
	}
	
	public String getAccholderName()
	{
		return accHolderName;
	}
	
	public String getAccountNumber()
	{
		return accountNumber;
	}
	public double getBalance()
	{
		return balance;
	}
	
}