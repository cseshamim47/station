package classes;
import java.lang.*;
import interfaces.*;

public abstract class Account implements ITransactions
{
	protected int accountNumber;
	protected double balance;
	
	public void setAccountNumber(int accountNumber)
	{
		this.accountNumber = accountNumber;
	}
	public void setBalance(double balance)
	{
		this.balance = balance;
	}
	
	public int getAccountNumber()
	{
		return accountNumber;
	}
	public double getBalance()
	{
		return balance;
    }
	
	public abstract void showInfo();
	
	public boolean deposit(double amount)
	{
		if(amount>0)
		{
			System.out.println("Previous Balance: "+ balance);
			System.out.println("Deposit Amount: "+ amount);
			balance += amount;
			//balance = balance + amount;
			System.out.println("Current Balance: "+ balance);
			return true;
		}
		else
		{
			return false;
		}
	}
	public boolean withdraw(double amount)
	{
		if(amount>0 && amount<=balance)
		{
			System.out.println("Previous Balance:	"+ balance);
			System.out.println("Withdraw Amount:	"+ amount);
			balance -= amount;
			//balance = balance - amount;
			System.out.println("Current Balance:	"+ balance);
			return true;
		}
		else
		{
			return false;
		}
	}	
}