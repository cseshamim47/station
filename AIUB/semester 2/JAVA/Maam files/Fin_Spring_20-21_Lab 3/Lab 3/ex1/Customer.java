public class Customer
{
	private int nid;
	private String name;
	FixedAccount fa;
	SavingsAccount sa;
	
	public Customer(){}
	public Customer(int nid,String name,FixedAccount fa,SavingsAccount sa)
	{
		this.nid=nid;
		this.name=name;
		this.fa=fa;
		this.sa=sa;
	}
	
	public void setNid(int nid)
	{
		this.nid=nid;
	}
	public void setName(String name)
	{
		this.name=name;
	}
	public void setFixedAccount(FixedAccount fa)
	{
		this.fa=fa;
	}
	public void setSavingsAccount(SavingsAccount sa)
	{
		this.sa=sa;
	}
	public int getNid()
	{
		return nid;
	}
	public String getName()
	{
		return name;
	}
	public FixedAccount getFixedAccount()
	{
		return fa;
	}
	public SavingsAccount getSavingsAccount()
	{
		return sa;
	}
}