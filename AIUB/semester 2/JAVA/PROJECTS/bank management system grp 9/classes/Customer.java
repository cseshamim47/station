package classes;
import java.lang.*;
import interfaces.*;


public class Customer implements AccountOperations
{
	private String name;
	private int nid;
	private Account accounts[] = new Account [10];
	
	
	public void setName(String name)
	{
		this.name = name;
	}
	public void setNid(int nid)
	{
		this.nid = nid;
	}
	
	
	public String getName()
	{
		return name;
	}
	public int getNid()
	{
		return nid;
	}
	
	public boolean insertAccount(Account a)
	{
		boolean flag = false;
		for(int i=0; i<accounts.length; i++)
		{
			if(accounts[i] == null)
			{
				accounts[i] = a;
				flag = true;
				break;
			}
		}
		return flag;
	}
	
	public boolean removeAccount(Account a)
	{
		boolean flag = false;
		for(int i=0; i<accounts.length; i++)
		{
			if(accounts[i] == a)
			{
				accounts[i] = null;
				flag = true;
				break;
			}
		}
		return flag;
	}
	public void showAllAccounts()
	{
		for(int i =0; i<accounts.length; i++)
		{
			if(accounts[i] != null)
			{
				accounts[i].showInfo();
			}
		}
	}
	public Account searchAccount(int accountNumber)
	{
		Account a = null;
		
		for(int i=0; i<accounts.length; i++)
		{
			if(accounts[i] != null)
			{
				if(accounts[i].getAccountNumber() == accountNumber)
				{
					a = accounts[i];
					break;
				}
			}
		}
		return a;
	}
}