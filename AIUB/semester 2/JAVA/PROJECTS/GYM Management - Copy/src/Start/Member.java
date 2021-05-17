package Start;


public class Member implements AccountOperation{
    public String name;
    public String MId;
    public String Address;
    public String Dob;
    public int phoneno;
	public Account accounts[] = new Account [100];

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getMId() {
        return MId;
    }

    public void setMId(String MId) {
        this.MId = MId;
    }

    public String getAddress() {
        return Address;
    }

    public void setAddress(String Address) {
        this.Address = Address;
    }

    public String getDob() {
        return Dob;
    }

    public void setDob(String Dob) {
        this.Dob = Dob;
    }

    public int getPhoneno() {
        return phoneno;
    }

    public void setPhoneno(int phoneno) {
        this.phoneno = phoneno;
    }
    
	public  boolean insertAccount(Account a)
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
	
	public Account getAccount(String accNo)
	{
		Account a = null;
		
		for(int i=0; i<accounts.length; i++)
		{
			if(accounts[i] != null)
			{
				if(accounts[i].getAccountNumber().equals(accNo))
				{
					a = accounts[i];
					break;
				}
			}
		}
		return a;
	}
	
	public void showAllAccounts()
	{
		for(int i =0; i<accounts.length; i++)
		{
			if(accounts[i] != null)
			{	
				System.out.println("\n");
				System.out.println("Account Name   : "+ accounts[i].getAccholderName());
				System.out.println("Account No     : "+ accounts[i].getAccountNumber());
				System.out.println("Account Balance: "+ accounts[i].getBalance());

			}
		}
	}
	
   
}

