public class Start
{
	public static void main(String args[])
	{
	FixedAccount fa1=new FixedAccount("fa1",1000,1);
	SavingsAccount sa1=new SavingsAccount("sa2",2000,5);
	Account a1=new Account("acc3",3000);
	
	Customer c1=new Customer(111,"Shakib",fa1,sa1);
	//c1.setAccount(a1);
	
	System.out.println(c1.getName());
	System.out.println(c1.getNid());
	
	System.out.println(c1.getFixedAccount().getAccountNo());
	System.out.println(c1.getFixedAccount().getBalance());
	System.out.println(c1.getFixedAccount().getTenureYear());
	
	System.out.println(c1.getSavingsAccount().getAccountNo());
	System.out.println(c1.getSavingsAccount().getBalance());
	System.out.println(c1.getSavingsAccount().getInterestRate());
	
	}
}
